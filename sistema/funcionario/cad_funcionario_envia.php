<?php

session_start();

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = md5($_POST["senha"]);
$status = $_POST["status"];
$perfil = 2;

require_once ("../../bd/bd_funcionario.php");

$dados = buscaFuncionario($email);

if($dados != 0){
	$_SESSION['texto_erro'] = 'Este email já existe cadastrado no sistema!';
	$_SESSION['nome'] = $nome;
	$_SESSION['email'] = $email;
	header ("Location:cad_funcionario.php");
}else{

	$dados = cadastraFuncionario($nome,$email,$senha,$status,$perfil);

	if($dados == 1){
		$_SESSION['texto_sucesso'] = 'Dados adicionados com sucesso.';
		unset($_SESSION['texto_erro']);
		unset ($_SESSION['nome']);
		unset ($_SESSION['email']);
		unset ($_SESSION['senha']);
		header ("Location:funcionario.php");
	}else{
		$_SESSION['texto_erro'] = 'O dados não foram adicionados no sistema!';
		$_SESSION['nome'] = $nome;
		$_SESSION['email'] = $email;
		header ("Location:cad_funcionario.php");
	}
}

?>