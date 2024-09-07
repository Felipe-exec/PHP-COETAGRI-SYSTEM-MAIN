<?php
require_once("valida_session.php");
require_once("bd/bd_produto.php");

$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$valor = $_POST["valor"];

// Verifica se o produto já existe
$dados = buscaProduto($nome);

if ($dados) {
    $_SESSION['texto_erro'] = 'Este produto já está cadastrado no sistema!';
    $_SESSION['nome'] = $nome;
    $_SESSION['descricao'] = $descricao;
    $_SESSION['valor'] = $valor;
    header("Location: cad_produto.php");
    exit();
}

// Salva o produto no banco de dados (sem imagem nesta etapa)
$codigo = cadastraProduto($nome, $descricao, $valor);

if ($codigo) {
    $_SESSION['texto_sucesso'] = 'Produto adicionado com sucesso. Agora envie a imagem do produto.';
    // Redireciona para a página de envio de imagem com o código correto
    header("Location: cad_produto_imagem.php?cod=" . $codigo);
    exit();
} else {
    $_SESSION['texto_erro'] = 'O produto não foi adicionado no sistema!';
    $_SESSION['nome'] = $nome;
    $_SESSION['descricao'] = $descricao;
    $_SESSION['valor'] = $valor;
    header("Location: cad_produto.php");
    exit();
}
?>
