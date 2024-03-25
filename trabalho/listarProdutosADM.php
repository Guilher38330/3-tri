<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar produtos</title>
</head>
<body>
    <h1>Produtos inseridos</h1>
    <?php
    include ("funcoes.php");
    
    echo "<br>";
    $conexao = conectar();
    listarProdutos($conexao);
    
    
    if (isset($_GET['acao']) && $_GET['acao'] == 'excluir' && isset($_GET['id'])) { 
        // O isset serve vara verificar se o valor informado é diferente de null
        //a função isset é usada para verificar se as variáveis $_GET['acao'] e $_GET['id'] estão 
        //definidas antes de usa-las. Se ambas as variáveis estiverem definidas e $_GET['acao'] for 
        //igual a excluir, o código exclui o produto com o id correspondente do banco de dados
        $id = $_GET['id'];
    
        $stmt = $conexao->prepare("DELETE FROM produtos WHERE idProduto = :idProduto");
        $stmt->bindParam(':idProduto', $id, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            echo "Produto excluído com sucesso.";
        } else {
            echo "Erro ao excluir o produto.";
        }
    }
    $conexao = null;
    ?>
    <br>
    <a href="principalADM.html">Voltar para pagina principal</a>
</body>
</html>