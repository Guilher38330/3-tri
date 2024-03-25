<?php
include "funcoes.php";
$nome = $_POST['nome'];
$email = $_POST['contato'];
$duvida = $_POST['duvida'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $conexao=conectar();
    $retornoDaFuncaoFaleConosco = inserirFaleConosco($conexao, $nome, $email, $duvida);
    if($retornoDaFuncaoFaleConosco == true){
        echo "Sua duvida foi mandada com sucesso!!!!";
    }else{
    echo "Erro ao mandar as informações!!!!!";
    }
    echo"<br>";
    $conexao=null;
    ?>
    <br>
    <a href="paginaPrincipal.html">Voltar para pagina principal</a>
</body>
</html>