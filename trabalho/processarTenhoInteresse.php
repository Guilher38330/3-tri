<?php
include "funcoes.php";


    $nome = isset($_GET['nome']) ? $_GET['nome'] : '';
    $contato = isset($_GET['contato']) ? $_GET['contato'] : '';
    $nomeProduto = isset($_GET['nomeProduto']) ? $_GET['nomeProduto'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenho Interesse</title>
</head>
<body>
    <?php
    $conexcao= conectar();
    $retornoDaFuncaoTenhoInteresse = inserirTenhoInteresse($conexcao, $nome, $contato, $nomeProduto);
    if($retornoDaFuncaoTenhoInteresse == true){
        echo "Obrigado pela preferencia!!!!";
    }else{
    echo "Erro ao mandar as informações!!!!!";
    }
    echo"<br>";
    $a = null;
    ?>
    <a href="paginaPrincipal.html">Voltar para pagina principal</a>
</body>
</html>