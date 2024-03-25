<?php
include 'funcoes.php';
$conexao = conectar();

if (isset($_GET['id'])) {
    $idProduto = $_GET['id'];

    // Consulta para obter as informações do produto
    $stmt = $conexao->prepare("SELECT * FROM produtos WHERE idProduto = :id");
    $stmt->bindParam(':id', $idProduto, PDO::PARAM_INT);
    $stmt->execute();
    
    $produto = $stmt->fetch(PDO::FETCH_OBJ);

    if (!$produto) {
        echo "Produto não encontrado.";
        exit();
    }
} else {
    echo "ID do produto não fornecido.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Produto</title>
</head>
<body>

    <h2>Atualizar Produto</h2>

    <form action="processarAtualizar.php" method="POST">
        <input type="hidden" name="idProduto" value="<?php echo $produto->idProduto; ?>">
        <br>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $produto->nome; ?>" required>
        <br>
        <label for="data">Data:</label>
        <input type="date" name="data" value="<?php echo $produto->data; ?>" required>
        <br>
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" required><?php echo $produto->descricao; ?></textarea>
        <br>
        <button type="submit">Atualizar Produto</button>
    </form>

</body>
</html>
