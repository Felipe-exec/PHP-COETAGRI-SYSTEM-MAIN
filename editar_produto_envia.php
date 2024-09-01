<?php
require_once("valida_session.php");
require_once("bd/bd_produto.php");

// Obtém os dados do formulário
$codigo = $_POST["cod"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$valor = $_POST["valor"];

// Atualiza o produto
$resultado = editarProduto($codigo, $nome, $descricao, $valor);

if ($resultado == 1) {
    $_SESSION['texto_sucesso'] = 'Os dados do produto foram atualizados com sucesso.';
    header("Location: produto.php");
    exit();
} else {
    $_SESSION['texto_erro'] = 'Os dados do produto não foram atualizados.';
    header("Location: editar_produto.php?cod=" . $codigo);
    exit();
}
?>
