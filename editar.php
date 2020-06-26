<?php 
session_start(); 
include_once "config/conexao.php"; 

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$execute = mysqli_query($conn, $sql);
$row_usuario = mysqli_fetch_assoc($execute);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Editar Usuário</title>
</head>
<body>

<h1>Editar Usuário</h1>
<?php 
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>

<form action="functions/function-editar.php" method="post">
<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
    <label for="nome">Nome: </label>
    <input type="text" name="nome" placeholder="Digite o nome completo" 
    value="<?php echo $row_usuario['nome']; ?>" required="required"><br> <br>

    <label for="nome">Email: </label>
    <input type="email" name="email" placeholder="Digite um email válido" 
    value="<?php echo $row_usuario['email']; ?>" required="required"><br> <br>

    <input type="submit" value="Editar">
</form>

</body>
</html>