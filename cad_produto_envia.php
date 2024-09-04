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

// Verifica se o arquivo de imagem foi enviado
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $imagem = $_FILES['imagem'];
    
    // Diretório para salvar as imagens
    $dir_upload = 'uploads/';
    if (!is_dir($dir_upload)) {
        mkdir($dir_upload, 0755, true);
    }
    
    // Gera um nome único para a imagem com base no nome do produto
    $nome_imagem = uniqid() . '_' . basename($imagem['name']);
    $caminho_imagem = $dir_upload . $nome_imagem;
    
    // Move o arquivo para o diretório de uploads
    if (move_uploaded_file($imagem['tmp_name'], $caminho_imagem)) {
        // Salva o produto no banco de dados (sem o caminho da imagem)
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
    } else {
        $_SESSION['texto_erro'] = 'Erro ao salvar a imagem do produto.';
        $_SESSION['nome'] = $nome;
        $_SESSION['descricao'] = $descricao;
        $_SESSION['valor'] = $valor;
        header("Location: cad_produto.php");
        exit();
    }
} else {
    $_SESSION['texto_erro'] = 'Nenhuma imagem foi enviada.';
    $_SESSION['nome'] = $nome;
    $_SESSION['descricao'] = $descricao;
    $_SESSION['valor'] = $valor;
    header("Location: cad_produto.php");
    exit();
}
?>
