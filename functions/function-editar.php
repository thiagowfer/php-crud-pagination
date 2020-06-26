<?php 
session_start();
include_once "../config/conexao.php";

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$inserir = "UPDATE usuarios SET nome = '$nome', email = '$email', 
modified = NOW() WHERE id = '$id'";

$resultado = mysqli_query($conn, $inserir);

if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style='color: green; font-weight:bold;'> Usuário atualizado com sucesso! </p>";
    header("Location: ../index.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'> Erro ao tentar atualizar </p>";
    header("Location: ../editar.php?id=$id");
}

?>