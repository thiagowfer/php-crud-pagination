<?php 
session_start();
include_once "../config/conexao.php";

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){
    $query = "DELETE FROM usuarios WHERE id = $id";
    $deletar = mysqli_query($conn, $query);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:red;'>Usuário apagado com sucesso! </p>";
        header("Location: ../index.php");
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao tentar apagar usuário! </p>";
        header("Location: ../index.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário para poder deletar! </p>";
    header("Location: index.php");
}



?>