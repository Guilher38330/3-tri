<?php
function conectar(): object
{
	$usuario = "root";
	$senha = "";
	$conexao = new PDO("mysql:host=localhost; dbname=cafeteria", $usuario, $senha);
	return $conexao;
}

function inserirProduto(PDO $auxConexao, string $nome, $descricao, $arquivo_blob, $data): bool
{
	$comandoSQL = "INSERT INTO  produtos (nome, descricao, imagem, data) VALUES (?, ?, ?, ?)";
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

function listarProdutos(object $conexao): void
{
	$stmt = $conexao->prepare("SELECT * FROM produtos");
	$stmt->execute();
	$arrayDadosProdutos = $stmt->fetchAll(PDO::FETCH_OBJ);

	echo '<table>
				<tr>
					<th>Nome</th>
					<th>Data</th>
					<th>Descrição</th>
					<th>Ações</th>
				</tr>';

	foreach ($arrayDadosProdutos as $produtos) {
		echo '<tr>';
		echo '<td>' . $produtos->nome . '</td>';
		echo '<td>' . $produtos->data . '</td>';
		echo '<td>' . $produtos->descricao . '</td>';
		echo '<td>
					<a href="?acao=excluir&id=' . $produtos->idProduto . '">Excluir</a>
					<a href="atualizarProduto.php?id=' . $produtos->idProduto . '">Atualizar</a>
				  </td>';
		echo '</tr>';
	}

	echo '</table>';
	return;
}



function mostrarProdutosComImagens(object $conexao): void
{
	$comandoSQL = "SELECT * FROM produtos";
	$stmt = $conexao->prepare($comandoSQL);
	$stmt->execute();
	$registros = $stmt->fetchAll(PDO::FETCH_OBJ);

	foreach ($registros as $linha) {
		if ($linha->imagem !== null) {
			echo "<figure>";
			echo '<a href="detalhesProduto.php?idProduto=' . $linha->idProduto . '">';
			echo '<img src="data:;base64,' . base64_encode($linha->imagem) . '" width="200" height="" alt="Imagem do Produto">';
			echo '</a>';
			echo '<figcaption>' . $linha->nome . '</figcaption>';
			echo "</figure>";
			echo "<br>";
		}
	}
}




function inserirFaleConosco(object $conexao, string $nome, string $contato, string $duvida): bool
{
	$stmt = $conexao->prepare("INSERT INTO conosco (nome, contato, duvida) VALUES (?,?,?)");
	$stmt->bindParam(1, $nome, PDO::PARAM_STR);
	$stmt->bindParam(2, $contato, PDO::PARAM_STR);
	$stmt->bindParam(3, $duvida, PDO::PARAM_STR);

	if ($stmt->execute()) {
		return true;
	} else {
		return false;
	}
}

function listarFaleConosco(object $conexao): void
{
	$stmt = $conexao->prepare("SELECT * FROM conosco");
	$stmt->execute();
	$arrayDadosFC = $stmt->fetchAll(PDO::FETCH_OBJ);

	echo "<table>
            <tr>
                <th>Nome</th>
                <th>Contato(e-mail)</th>
                <th>Dúvida</th>
            </tr>";

	foreach ($arrayDadosFC as $conosco) {
		echo "<tr>
                <td>{$conosco->nome}</td>
                <td>{$conosco->contato}</td>
                <td>{$conosco->duvida}</td>
              </tr>";
	}
	echo "</table>";
	return;
}

function inserirTenhoInteresse(object $conexao, string $nome, string $contato, string $idProduto): bool
{
	$stmt = $conexao->prepare("INSERT INTO interesse (nome, contato, produto) VALUES (?,?,?)");
	// pegar o idProduto
	$stmt->bindParam(1, $nome, PDO::PARAM_STR);
	$stmt->bindParam(2, $contato, PDO::PARAM_STR);
	$stmt->bindParam(3, $idProduto, PDO::PARAM_STR);

	if ($stmt->execute()) {
		return true;
	} else {
		return false;
	}
}

function listarTenhoInteresse(object $conexao): void
{
	$stmt = $conexao->prepare("select * from interesse");
	$stmt->execute();
	$arrayDadosTI = $stmt->fetchAll(PDO::FETCH_OBJ);

	echo "<table>
            <tr>
                <th>Nome</th>
                <th>Contato</th>
                <th>Produto</th>
            </tr>";

	foreach ($arrayDadosTI as $interesse) {
		echo "<tr>
                <td>{$interesse->nome}</td>
                <td>{$interesse->contato}</td>
                <td>{$interesse->produto}</td>
              </tr>";
	}
	echo "</table>";
	return;
}


function atualizarProduto(PDO $conexao, $idProduto, $nome, $data, $descricao): bool
{
	try {
		$stmt = $conexao->prepare("UPDATE produtos SET nome=?, data=?, descricao=? WHERE idProduto=?");
		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $data);
		$stmt->bindParam(3, $descricao);
		$stmt->bindParam(4, $idProduto, PDO::PARAM_INT);

		return $stmt->execute();
	} catch (PDOException $e) {
		echo "Erro ao atualizar o produto: " . $e->getMessage();
		return false;
	}
}
