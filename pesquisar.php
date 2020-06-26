<?php include_once "config/conexao.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Pesquisar</title>
</head>
<body>
<a href="index.php">Home </a> 
<a href="cadastrar.php">Cadastrar </a> <br>

<h1>Pesquisar Usuário</h1>

<form action="" method="post">
    <label for="nome">Nome: </label>
    <input type="text" name="nome" placeholder="Digite o nome " required="required"><br> <br>

    <input type="submit" value="Pesquisar" name="sendPesquisar">
</form>

<?php 

    $sendPesquisa = filter_input(INPUT_POST, 'sendPesquisar', FILTER_SANITIZE_STRING);

    if($sendPesquisa){
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $query = "SELECT * FROM usuarios WHERE nome LIKE '%$nome%' ";
        $resultado = mysqli_query($conn, $query);

        while($row_usuario = mysqli_fetch_assoc($resultado)){
            echo "<br> Nome: " .$row_usuario['nome']. "<br>";
            echo "Email: " .$row_usuario['email']. "<br>";
            echo "<a href='functions/function-editar.php?id="  .$row_usuario['id']. "'> Editar </a>";
            echo "<a href='functions/function-delete.php?id=" .$row_usuario['id']. "'>Apagar</a>";
            echo "<hr>";
        }
    }    

?>

</body>
</html>