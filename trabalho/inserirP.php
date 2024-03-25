<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir</title>
</head>
<body>
    <h1>Inserir Produto/Serviço</h1>
    <br>
    <form action="processarIncerir.php" method="post" enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" name="nome"><br>
        <label for="data">Data:</label>
        <input type="date" name="data"><br>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao"><br>
        <label for="imagem">Imagem:</label>
        <input type="file" name="arquivo_imagem"><br>
        <button type="submit">Enviar</button>
    </form><br>
    <button class="button" onclick="window.location.href='principalADM.html'">Voltar Pág. Principal Admin</button>
</body>
</html>