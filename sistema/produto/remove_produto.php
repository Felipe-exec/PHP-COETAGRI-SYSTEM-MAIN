<?php
require_once("../acesso/valida_session.php");
require_once("../../bd/bd_produto.php");

$codigo = $_GET["cod"];

$resultado = removeProduto($codigo);

if ($resultado == 1) {
    $_SESSION['texto_sucesso'] = 'O produto foi removido com sucesso.';
} else {
    $_SESSION['texto_erro'] = 'O produto não foi removido.';
}

header("Location: produto.php");
exit();
?>
