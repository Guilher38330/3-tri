<?php
include 'funcoes.php';
$conexao = conectar();


    $idProduto = $_POST['idProduto'];
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $descricao = $_POST['descricao'];

    if (atualizarProduto($conexao, $idProduto, $nome, $data, $descricao)) {
        echo "Produto atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar o produto.";
    }


$conexao = null;


?>
<br>
<a href="principalADM.html">Voltar para pagina principal</a>
