<?php
    include "funcao.php";
    $auxConexao = conectar();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de produtos</title>
</head>
<body>
    <?php

    echo "Imagens dos produtos no Banco de Dados:<br>";
    mostrarProdutosComImagens($auxConexao);
    ?>
    
</body>
</html>