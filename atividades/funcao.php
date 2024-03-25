<?php
function conectar ( ) : object { 
    $localServidor = "localhost";
    $nomeBaseDados = "inf3am";
    $usuario = "root";
    $senha = "";

    try{
        
    $conexao = new PDO("mysql:host=localhost;dbname=$nomeBaseDados",$usuario, $senha);
    }catch(PDOException $e){
        echo "Falha na conexao: ".$e->getMessage();
    }
    return $conexao;
}

function inserirProduto(PDO $auxConexao, string $nome, $descricao, $arquivo_blob, $data): bool {
    $comandoSQL = "insert into produtos (nome, descricao, imagem, data) values (?, ?, ?, ?)";
    $dados = $auxConexao->prepare($comandoSQL);
    $dados->bindParam(1, $nome);
    $dados->bindParam(2, $descricao);
    $dados->bindParam(3, $arquivo_blob);
    $dados->bindParam(4, $data);

    if ($dados->execute()) {
        return true;
    } else {
        return false;
    }
}

    
function mostrarProdutosComImagens(object $conexao):void{
    $comandoSQL = "select * from produtos";
    $retornoDoBanco = $conexao->prepare($comandoSQL);
    $retornoDoBanco->execute();
    $registros = $retornoDoBanco->fetchAll(PDO::FETCH_OBJ);
    foreach($registros as $linha){
        if($linha->imagem<>null){
            echo "<figure>";
            echo '<img src ="data:;base64,'.base64_encode($linha->imagem).'"width="200" height="" />';


            echo "</figure>";
        }
    }
    return;
}
   ?>