<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Tenho Interesse</title>
</head>
<body>
    <h1>Formulário Tenho Interesse</h1>
    <br>
    <form action="processarTenhoInteresse.php" method="get">
        <label for="nome">Nome:</label>
        <input type="text" name="nome"><br>
        
        <label for="contato">Telefone: </label>
        <input type="tel" name="contato"><br>

        <input type="hidden" name="nomeProduto" value="<?php echo isset($_GET['nomeProduto']) ? $_GET['nomeProduto'] : ''; ?>">

        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>
</html>
