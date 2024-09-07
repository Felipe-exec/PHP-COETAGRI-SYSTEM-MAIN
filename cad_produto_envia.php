<?php
require_once("valida_session.php");
require_once("bd/bd_produto.php");

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $imagem = $_FILES['imagem'];

    // Verifica se o produto já existe
    $dados = buscaProduto($nome);

    if ($dados) {
        $_SESSION['texto_erro'] = 'Este produto já está cadastrado no sistema!';
        header("Location: cad_produto.php");
        exit();
    } else {
        // Salva o produto no banco de dados
        $codigo = cadastraProduto($nome, $descricao, $valor);

        if ($codigo) {
            // Verifica se o arquivo de imagem foi enviado
            if (isset($imagem) && $imagem['error'] === UPLOAD_ERR_OK) {
                // Nome da imagem com base no código do produto
                $nome_imagem = $codigo . '_' . basename($imagem['name']);
                
                // Verifica se a pasta 'uploads' existe, se não, cria
                if (!is_dir('uploads')) {
                    mkdir('uploads', 0755, true);
                }

                $caminho_imagem = 'uploads/' . $nome_imagem;

                // Move a nova imagem para a pasta 'uploads'
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
