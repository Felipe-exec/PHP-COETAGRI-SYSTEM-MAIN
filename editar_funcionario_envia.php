<?php
require_once("valida_session.php");
require_once ("bd/bd_funcionario.php");
	     
$codigo = $_POST["cod"];
$status = $_POST["status"];
$data=date("y/m/d");

$dados = editarFuncionario($codigo,$status,$data);

if ($dados == 1){
	$_SESSION['texto_sucesso'] = 'Os dados do funcionario foram alterados no sistema.';
	header ("Location:funcionario.php");
}else{
	$_SESSION['texto_erro'] = 'Os dados do funcionario não foram alterados no sistema!';
	header ("Location:funcionario.php");
}

		
?>