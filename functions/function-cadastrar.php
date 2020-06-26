<?php 
session_start();
include_once "../config/conexao.php";

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$sql = "INSERT INTO usuarios (nome, email, created) VALUES ('$nome', '$email', NOW())";
$execute = mysqli_query($conn, $sql);

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color: green; font-weight:bold;'> Usuário cadastrado com sucesso! </p>";
    header("Location: ../index.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
    header("Location: ../cadastrar.php");
}

?>