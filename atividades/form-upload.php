<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para carregar imagem</title>
</head>
<body>
    <form action="processarform.php" method="POST" enctype="multipart/form-data">
        <h1></h1>
        <label for="nome">Nome:</label>
        <input type="text" name="nome"><br>
        <label for="data">Data:</label>
        <input type="date" name="data"><br>
        <label for="imagem">Imagem:</label>
        <input type="file" name="arquivo_imagem"><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html> 