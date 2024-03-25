<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Fale Conosco</title>
</head>
<body>
    <h1>Formulario Fale Conosco</h1>
    <br>
    <form action="processarFaleConosco.php" method="post">
    <label for="nome">Nome:</label>
        <input type="text" name="nome"><br><br>
        <label for="contato">E-mail:</label>
        <input type="email" name="contato"><br><br>
        <label for="duvida">Dúvida:</label>
        <textarea name="duvida"></textarea>
        <br><br>
        <button type="submit">Enviar</button>
    </form>
    <br>
    <a href="paginaPrincipal.html">Voltar para pagina principal</a>

</body>
</html>