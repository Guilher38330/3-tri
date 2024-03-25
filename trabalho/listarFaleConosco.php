<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Fale Conosco</title>
</head>
<body>
    <h1>Listar Fale Conosco</h1>
    <br>
    <?php
    include ("funcoes.php");
    echo "<br>";
    $conexao = conectar();
    listarFaleConosco($conexao);
    $conexao = null;
    ?>
     <br>
    <a href="principalADM.html">Voltar para pagina principal</a>
</body>
</html>