<?php
require_once("../acesso/valida_session.php");
require_once ("../../bd/bd_admin.php");
         
$codigo = $_POST["cod"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$data=date("y/m/d");

$dados = editarPerfilAdmin($codigo, $nome, $email, $endereco, $numero, $bairro, $cidade, $telefone, $data);
if ($dados == 1){
    $_SESSION['nome_usu'] = $nome;
    $_SESSION['texto_sucesso'] = 'Os dados do usuário foram alterados no sistema.';
    header ("Location: editar_perfil_admin.php");
}else{
    $_SESSION['texto_erro'] = 'Os dados do usuário não foram alterados no sistema!';
    header ("Location: editar_perfil_admin.php");
}

        
?>