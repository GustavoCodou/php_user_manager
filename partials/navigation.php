<nav>
    <ul>
        <li>
            <a class="<?php echo setActiveCLass('index.php');  ?>"  href="index.php">Home</a></li>

        <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
            <li>
                <a href="admin.php">Admin</a>
            </li>
            <li>
                <a href="logout.php">Logout</a>
            </li>
        <?php else: ?>
            <li>
                <a class="<?php echo setActiveCLass('register.php');  ?>"  href="register.php">Register</a>
            </li>
            <li>
                <a class="<?php echo setActiveCLass('login.php');  ?>" href="login.php">Login</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>

<!-- <nav> → indica uma área de navegação da página (menu).

<ul> → lista não ordenada.

<li> → item da lista.

<a> → link para outra página.

class="?php echo setActiveCLass('index.php'); ?>" → aqui, a função PHP setActiveCLass() ]
define dinamicamente a classe CSS do link “Home”. 
Singifica que se o usuario tiver na apgina ativa a classe ative e assim vai ficar marcado
que nas opções a pagina certa que ele está.

-->