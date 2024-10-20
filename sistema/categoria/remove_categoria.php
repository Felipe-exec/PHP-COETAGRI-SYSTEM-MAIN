<?php
require_once("../acesso/valida_session.php");
require_once("../../bd/bd_categoria.php");

$cod = $_GET["cod"];

$resultado = removeCategoria($cod);

if ($resultado == 1) {
    $_SESSION['texto_sucesso'] = 'A categoria foi removida com sucesso.';
} else {
    $_SESSION['texto_erro'] = 'A categoria não foi removida.';
}

header("Location: categoria.php");
exit();
?>
