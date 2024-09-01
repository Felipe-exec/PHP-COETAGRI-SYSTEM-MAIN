<?php
require_once("valida_session.php");
require_once("bd/bd_produto.php");

$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$valor = $_POST["valor"];

$dados = buscaProduto($nome);

if ($dados) {
    $_SESSION['texto_erro'] = 'Este produto já está cadastrado no sistema!';
    $_SESSION['nome'] = $nome;
    $_SESSION['descricao'] = $descricao;
    $_SESSION['valor'] = $valor;
    header("Location: cad_produto.php");
    exit();
} else {
    $dados = cadastraProduto($nome, $descricao, $valor);

    if ($dados == 1) {
        $_SESSION['texto_sucesso'] = 'Produto adicionado com sucesso.';
        unset($_SESSION['texto_erro']);
        unset($_SESSION['nome']);
        unset($_SESSION['descricao']);
        unset($_SESSION['valor']);
        header("Location: produto.php");
        exit();
    } else {
        $_SESSION['texto_erro'] = 'O produto não foi adicionado no sistema!';
        $_SESSION['nome'] = $nome;
        $_SESSION['descricao'] = $descricao;
        $_SESSION['valor'] = $valor;
        header("Location: cad_produto.php");
        exit();
    }
}
?>
