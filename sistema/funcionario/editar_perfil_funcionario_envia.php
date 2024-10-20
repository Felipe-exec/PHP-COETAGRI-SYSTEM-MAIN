<?php
require_once("../acesso/valida_session.php");
require_once ("../../bd/bd_funcionario.php");
         
$codigo = $_POST["cod"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$telefone = $_POST["telefone"];

$dados = editarPerfilFuncionario($codigo,$nome,$email);
if ($dados == 1){
    $_SESSION['nome_usu'] = $nome;
    $_SESSION['texto_sucesso'] = 'Os dados do funcionario foram alterados no sistema.';
    header ("Location:editar_perfil_funcionario.php");
}else{
    $_SESSION['texto_erro'] = 'Os dados do funcionario não foram alterados no sistema!';
    header ("Location:editar_perfil_funcionario.php");
}

        
?>