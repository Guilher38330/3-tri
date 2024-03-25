<?php
    include "funcao.php";
    $auxConexao = conectar();
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $arquivo = $_FILES['arquivo_imagem'];
    $nome = $dados['nome'];
    $data = $dados['data'];
    $arquivo_blob = file_get_contents($arquivo['tmp_name']);

    $retornoDaFuncaoInserir = inserirProduto($auxConexao, $nome, $arquivo, $arquivo_blob, $data);
    if($retornoDaFuncaoInserir){
        echo "Incerido com sucesso";

    }else{
        echo "Nao foi possivel incerir";
    }

?>