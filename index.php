<?php session_start(); ?>
<?php include_once "conexao.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Listar</title>
</head>
<body>

<a href="cadastrar.php">Cadastrar</a>

<h1>Lista de Usuários</h1>
<?php 
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    // Receber o número da página
    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual) ? $pagina_atual : 1);

    // Setar a quantidade de itens por página
    $qtd_result_pag = 3;

    // Calcular o início da visualização
    $inicio = ($qtd_result_pag * $pagina) - $qtd_result_pag;

    // Query
    $listar = "SELECT * FROM usuarios LIMIT $inicio, $qtd_result_pag";
    $resultado = mysqli_query($conn, $listar);

    
    // Exibir resultados
    while($row_usuarios = mysqli_fetch_assoc($resultado)){
        echo "ID: " .$row_usuarios['id']. "<br>";
        echo "Nome: " .$row_usuarios['nome']. "<br>";
        echo "Email: " .$row_usuarios['email']. "<br>";
        echo "<a href='editar.php?id="  .$row_usuarios['id']. "'> Editar </a>";
        echo "<hr>";
    }

    // Paginação - Somar a quantidade de usuários
    $query_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
    $result_pg = mysqli_query($conn, $query_pg);
    $row_pg = mysqli_fetch_assoc($result_pg);
    // echo $row_pg['num_result'];

    // Quantidade de página
    $quantidade_pg = ceil($row_pg['num_result'] / $qtd_result_pag);

    $max_links = 2;

    // Exibir paginação
    echo "<a href='index.php?pagina=1'> Primeira </a>";

    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
        if($pag_ant >= 1){
            echo "<a href='index.php?pagina=$pag_ant'> $pag_ant </a>";
        }
    }

    echo "$pagina";

    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
        if($pag_dep <= $quantidade_pg){
            echo "<a href='index.php?pagina=$pag_dep'> $pag_dep </a>";
        }
    }

    echo "<a href='index.php?pagina=$quantidade_pg'> Última </a>";

?>


</body>
</html>