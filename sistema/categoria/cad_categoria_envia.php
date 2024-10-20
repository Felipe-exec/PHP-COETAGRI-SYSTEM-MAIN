<?php
require_once("../acesso/valida_session.php");
require_once("../../bd/bd_categoria.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST["nome"];

    $dados = buscaCategoriaPorNome($nome);

    if ($dados) {
        $_SESSION['texto_erro'] = 'Esta categoria já está cadastrada no sistema!';
        header("Location: cad_categoria.php");
        exit();
    } else {
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
