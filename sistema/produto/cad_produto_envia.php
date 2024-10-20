<?php
require_once("../acesso/valida_session.php");
require_once("../../bd/bd_produto.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $categoria_id = $_POST["categoria"]; // Captura a categoria selecionada
    $imagem = $_FILES['imagem'];

    $dados = buscaProduto($nome);

    if ($dados) {
        $_SESSION['texto_erro'] = 'Este produto já está cadastrado no sistema!';
        header("Location: cad_produto.php");
        exit();
    } else {
        $codigo = cadastraProduto($nome, $categoria_id, $descricao, $valor); // Passa a categoria

        if ($codigo) {
            if (isset($imagem) && $imagem['error'] === UPLOAD_ERR_OK) {
                $nome_imagem = $codigo . '_' . basename($imagem['name']);
                
                if (!is_dir('uploads')) {
                    mkdir('uploads', 0755, true);
                }

                $caminho_imagem = 'uploads/' . $nome_imagem;

                if (move_uploaded_file($imagem['tmp_name'], $caminho_imagem)) {
                    $_SESSION['texto_sucesso'] = 'Produto cadastrado com sucesso!';
                } else {
                    $_SESSION['texto_erro'] = 'Erro ao enviar a imagem.';
                }
            } else {
                $_SESSION['texto_erro'] = 'Nenhuma imagem foi enviada.';
            }
        } else {
            $_SESSION['texto_erro'] = 'O produto não foi adicionado no sistema!';
        }

        header("Location: produto.php");
        exit();
    }
} else {
    $_SESSION['texto_erro'] = 'Método de requisição inválido!';
    header("Location: cad_produto.php");
    exit();
}

?>
