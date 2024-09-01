<?php
require_once("valida_session.php");
require_once("bd/bd_produto.php");

// Obtém o código do produto a ser excluído
$codigo = $_GET["cod"];

// Remove o produto
$resultado = removeProduto($codigo);

if ($resultado == 1) {
    $_SESSION['texto_sucesso'] = 'O produto foi removido com sucesso.';
} else {
    $_SESSION['texto_erro'] = 'O produto não foi removido.';
}

// Redireciona para a página de listagem de produtos
header("Location: produto.php");
exit();
?>
