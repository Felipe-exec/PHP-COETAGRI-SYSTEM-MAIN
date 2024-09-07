<?php
require_once("valida_session.php");

$codigo = $_POST['codigo']; // Recebe o código do produto

// Verifica se o arquivo de imagem foi enviado
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    // Nome da imagem com base no código do produto
    $imagem = $_FILES['imagem'];
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

// Redireciona de volta para a página de produtos
header("Location: produto.php");
exit();
?>
