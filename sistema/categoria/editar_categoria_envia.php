<?php
require_once("../acesso/valida_session.php");
require_once("../../bd/bd_categoria.php");

$cod = $_POST["cod"];
$nome = $_POST["nome"];

$resultado = editarCategoria($cod, $nome);

if ($resultado == 1) {
    $_SESSION['texto_sucesso'] = 'Os dados da categoria foram atualizados com sucesso.';
    header("Location: categoria.php");
    exit();
} else {
    $_SESSION['texto_erro'] = 'Os dados da categoria não foram atualizados.';
    header("Location: editar_categoria.php?cod=" . $cod);
    exit();
}
?>
