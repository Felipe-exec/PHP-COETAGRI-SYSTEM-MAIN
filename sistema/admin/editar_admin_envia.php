<?php
require_once("../acesso/valida_session.php");
require_once("../../bd/bd_admin.php");

$codigo = $_POST["cod"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$status = $_POST["status"];

$dados = editarAdmin($codigo, $nome, $email, $status);
if ($dados == 1){
    $_SESSION['texto_sucesso'] = 'Os dados do usuário foram alterados no sistema.';
    header ("Location: admin.php");
} else {
    $_SESSION['texto_erro'] = 'Os dados do usuário não foram alterados no sistema!';
    header ("Location: admin.php");
}
?>
