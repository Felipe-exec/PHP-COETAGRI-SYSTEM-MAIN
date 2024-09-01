<?php
session_start();
require_once("bd/bd_admin.php");
require_once("bd/bd_cliente.php");
require_once("bd/bd_funcionario.php");

if (empty($_POST['email']) || empty($_POST['nova_senha'])) {
    $_SESSION['mensagem_erro'] = 'Por favor, preencha todos os campos!';
    header("Location: troca_senha_form.php");
    exit();
}

$email = $_POST["email"];
$nova_senha = md5($_POST["nova_senha"]);

$adminExiste = buscaAdmin($email);
if ($adminExiste) {
    $dadosAdmin = mysqli_fetch_assoc($adminExiste);
    $resultado = editarSenhaAdmin($dadosAdmin['cod'], $nova_senha);
    if ($resultado) {
        $_SESSION['mensagem_sucesso'] = 'Senha alterada com sucesso!';
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['mensagem_erro'] = 'Erro ao alterar a senha do usuário.';
        header("Location: troca_senha_form.php");
        exit();
    }
}

$funcionarioExiste = buscaFuncionario($email);
if ($funcionarioExiste) {
    $dadosFuncionario = mysqli_fetch_assoc($funcionarioExiste);
    $resultado = editarSenhaFuncionario($dadosFuncionario['cod'], $nova_senha);
    if ($resultado) {
        $_SESSION['mensagem_sucesso'] = 'Senha alterada com sucesso!';
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['mensagem_erro'] = 'Erro ao alterar a senha do funcionario.';
        header("Location: troca_senha_form.php");
        exit();
    }
}

$_SESSION['mensagem_erro'] = 'Email não encontrado!';
header("Location: troca_senha_form.php");
exit();
?>
