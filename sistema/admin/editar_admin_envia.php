<?php
require_once("../acesso/valida_session.php");
require_once ("../../bd/bd_admin.php");
	     
$codigo = $_POST["cod"];
$status = $_POST["status"];
$data=date("y/m/d");

$dados = editarAdmin($codigo,$status,$data);
if ($dados == 1){
	$_SESSION['texto_sucesso'] = 'Os dados do usuário foram alterados no sistema.';
	header ("Location: admin.php");
}else{
	$_SESSION['texto_erro'] = 'Os dados do usuário não foram alterados no sistema!';
	header ("Location: admin.php");
}

		
?>