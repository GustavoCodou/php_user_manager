<?php
include "partials/header.php";
/*Por ter o include do header já puxa os includes que o header tinha */
include "partials/navigation.php";

if(!is_user_logged_in()){
    redirect("login.php");
}

/* Se não estiver logado redireciona para a pagina de login */
 
$result = mysqli_query($conn, "SELECT id, username, email, reg_date FROM users");

/*  O result vai ser um objeto do mysqli que vai conter os dados*/


/*  '$_SERVER uma variavel do  php é um array associativo 
    Faz a requisição do servidor dos dados por metodo post
*/
if($_SERVER['REQUEST_METHOD'] === "POST") {

    if(isset($_POST['edit_user'])){

        /* O isset é uma função que verifica se a variavel está definida e não é nula
            O post edit user vai pegar a variavel com o nem edit user
        */

        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $new_username = mysqli_real_escape_string($conn, $_POST['username']);
        $new_email = mysqli_real_escape_string($conn, $_POST['email']);

        /* Tem que usar o escape string porque alguem poderia colocar uma sintaxe slq de ataque
        Ai daria ruim, essa função impede essas coisas.
        $username = "Kaiba'; DROP TABLE users; --";
        */


        $sql = "UPDATE users SET email = '$new_email', username = '$new_username' WHERE id = $user_id";
        $result = mysqli_query($conn, $sql);
        $query_status = check_query($result);

        /* 
            Aqui faz a sql aplica e mostra se funcionou
        */

        if($query_status === true){
            $_SESSION['message'] = "User updated successfully to {$new_username}";
            $_SESSION['msg_type'] = "success";
            redirect("admin.php");
        }

        /* 
            $_SESSION é um array que permite guardar dados que permanecem entre páginas.
            Então provavelmente aquilo vai ser printado em outro lugar depois
        */

    } elseif(isset($_POST['delete_user'])){
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $sql = "DELETE FROM users WHERE id = $user_id";
        $result = mysqli_query($conn, $sql);
        $query_status = check_query($result);
        if($query_status === true){

            $_SESSION['message'] = "User deleted successfully record with ID:{$user_id}";
            $_SESSION['msg_type'] = "success";
            redirect("admin.php");
        }

        /* 
            Se entendeu o resto isso aqui tu entende tb
        */

    }

}
?>
<h1>Manage Users</h1>
<div class="container">

    <?php if(isset($_SESSION['message'])): ?>
        <div class="notification <?php echo $_SESSION['msg_type']; ?>">
            <?php

                echo $_SESSION['message'];
                unset($_SESSION['message']);
                unset($_SESSION['msg_type'])

                
        /* 
            Aqui analisa se tem a messagem para enviar se tiver envia
        */

            ?>
        </div>
    <?php endif; ?>
    <table class="user-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Registration Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

<!-- 
<table> → cria uma tabela na página.
<thead> → define o cabeçalho da tabela (onde ficam os títulos das colunas).
<tr> → significa table row → uma linha da tabela.
<th> → significa table header → é uma célula de cabeçalho (em negrito e centralizada por padrão).
<tbody> → agrupa o corpo da tabela, ou seja, as linhas com os dados de verdade (usuários, produtos 
    <td> → Table Data (célula de dados)
-->

        <?php while ($user = mysqli_fetch_assoc($result)): ?>
<!-- 
A função mysqli_fetch_assoc($result) faz o seguinte:
Ela pega uma linha do resultado de uma consulta SQL ($result)
E retorna essa linha como um array associativo → ou seja, um array onde as chaves são os nomes das colunas do banco.
-->

        <tr>
            <td><?php echo $user['id'];  ?></td>
            <td><?php echo $user['username'];  ?></td>
            <td><?php echo $user['email'];  ?></td>
            
            <td><?php echo full_month_date($user['reg_date']); ?>
            </td>
            <td>
                <form method="POST" style="display:inline-block;">
                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                    <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
                    <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
                    <button class="edit" type="submit" name="edit_user">Edit</button>
                </form>
                <form method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                    <button class="delete" type="submit" name="delete_user">Delete</button>
                </form>
            </td>
        </tr>

        <?php endwhile; ?>



        <!-- Additional user rows can go here -->
        </tbody>
    </table>
</div>

<!-- Include Footer -->
<?php

include "partials/footer.php";

?>