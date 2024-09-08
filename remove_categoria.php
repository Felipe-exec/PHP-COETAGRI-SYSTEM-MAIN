<?php
require_once("valida_session.php");
require_once("bd/bd_categoria.php");

// Obtém o ID da categoria a ser excluída
$cod = $_GET["cod"];

// Remove a categoria
$resultado = removeCategoria($cod);

if ($resultado == 1) {
    $_SESSION['texto_sucesso'] = 'A categoria foi removida com sucesso.';
} else {
    $_SESSION['texto_erro'] = 'A categoria não foi removida.';
}

// Redireciona para a página de listagem de categorias
header("Location: categoria.php");
exit();
?>
