<?php session_start(); ?>
<?php include_once "config/conexao.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Cadastrar</title>
</head>
<body>

<h1>Cadastrar Usuário</h1>
<?php 
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>

<form action="functions/function-cadastrar.php" method="post">
    <label for="nome">Nome: </label>
    <input type="text" name="nome" placeholder="Digite o nome completo" required="required"><br> <br>

    <label for="nome">Email: </label>
    <input type="email" name="email" placeholder="Digite um email válido" required="required"><br> <br>

    <input type="submit" value="Cadastrar">
</form>

</body>
</html>