<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style.css">
	<title>Página Principal</title>
</head>
    <style>
        .cabecalho {
        background-color:  #057c2e;
        padding: 20px;
        text-align: center;
        }
        ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #276732;
        }

        li {
        float: left;
        }

        li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        li a:hover:not(.active) {
        background-color: #316028;
        }

        .active {
        background-color: #04AA6D;
        }
        .rodape {
        background-color: #276732;
        color: #fff;
        text-align: center;
        padding: 30px 0;
        }

        
    </style>
<body>
    <div class="cabecalho">
        <img src="imagem/Logo deitado.png" alt="">
    </div>
    <ul>
        <li><a href="paginaPrincipal.html">PRINCIPAL</a></li>
        <li><a class="active" href="paginaProdutos.php">PRODUTOS</a></li>
        <li><a href="formularioFaleConosco.php">FALE CONOSCO</a></li>
      </ul>

	  <?php
	include("funcoes.php");
	echo "<br>";
	$conexao = conectar();
	mostrarProdutosComImagens($conexao);
	$conexao = null;
	?>

      <footer class="rodape">
        <div class="interface">
            <p>Desenvolvido por: Aline e Guilherme</p>
        </div>
    </footer>
</body>
</html>
	