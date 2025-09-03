<?php
include 'db.php';
include "functions.php";

/* ini_set('display_errors', 1); – Liga a exibição de erros durante a execução do script.

ini_set('display_startup_errors', 1); – Mostra erros que acontecem durante a inicialização do PHP.

error_reporting(E_ALL); – Faz com que todos os tipos de erros e avisos sejam exibidos.*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

/* Inicia uma sessão do PHP.

Sessões permitem que você armazene dados do usuário entre páginas, 
como o login do usuário, carrinho de compras, etc.*/

?>


<!-- <!doctype html> – Declara que o documento é HTML5.

<html lang="en"> – Define que o idioma principal da página é inglês.Po
<meta charset="UTF-8"> – Define a codificação de caracteres como UTF-8.
<meta name="viewport" ...> – Responsivo, garante que a página se ajuste bem a dispositivos móveis.
<meta http-equiv="X-UA-Compatible" content="ie=edge"> – Ajuda compatibilidade com navegadores antigos, especialmente o Internet Explorer.
<title> – Define o título da aba do navegador.
<link rel="stylesheet" href="..."> – Inclui arquivos CSS para estilizar a página. -->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login App with SQL and PHP</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body class="<?php echo getPageClass()?>">

