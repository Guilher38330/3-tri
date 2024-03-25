<?php
include 'funcoes.php';
$conexao = conectar();

// Recupere o ID do produto da consulta GET
$idProduto = isset($_GET['idProduto']) ? $_GET['idProduto'] : null;

if ($idProduto) {
    // aqui estou consultando o id no banco de dados
    $comandoSQL = "SELECT * FROM produtos WHERE idProduto = :idProduto";
    $stmt = $conexao->prepare($comandoSQL);
    $stmt->bindParam(':idProduto', $idProduto, PDO::PARAM_INT);
    $stmt->execute();
    $detalhesProduto = $stmt->fetch(PDO::FETCH_OBJ);

    if ($detalhesProduto) {
        // aqui estou exibindo os detalhes do produto
        echo '<img src="data:;base64,' . base64_encode($detalhesProduto->imagem) . '" width="200" height="" alt="Imagem do Produto">';
        echo "<h1>{$detalhesProduto->nome}</h1>";
        echo "<p>Descrição: {$detalhesProduto->descricao}</p>";
        echo "<p>Data: {$detalhesProduto->data}</p>";

        echo '<a href="formTenhoInteresse.php?nomeProduto=' . urlencode($detalhesProduto->nome) . '">Tenho Interesse</a>';
    } else {
        echo "Produto não encontrado.";
    }
} else {
    echo "ID do produto não fornecido.";
}
$conexao = null;
?>
