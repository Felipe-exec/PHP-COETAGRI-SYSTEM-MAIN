<?php
require_once("valida_session.php");
require_once("bd/bd_categoria.php");

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST["nome"];

    // Verifica se a categoria já existe
    $dados = buscaCategoriaPorNome($nome);

    if ($dados) {
        $_SESSION['texto_erro'] = 'Esta categoria já está cadastrada no sistema!';
        header("Location: cad_categoria.php");
        exit();
    } else {
        // Salva a categoria no banco de dados
        $codigo = cadastraCategoria($nome);

        if ($codigo) {
            $_SESSION['texto_sucesso'] = 'Categoria cadastrada com sucesso!';
        } else {
            $_SESSION['texto_erro'] = 'A categoria não foi adicionada no sistema!';
        }

        header("Location: categoria.php");
        exit();
    }
} else {
    $_SESSION['texto_erro'] = 'Método de requisição inválido!';
    header("Location: cad_categoria.php");
    exit();
}
?>
