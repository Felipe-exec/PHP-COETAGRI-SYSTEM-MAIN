<?php
require_once("valida_session.php");
require_once("bd/bd_produto.php");

// Obtém os dados do formulário
$codigo = $_POST["cod"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$valor = $_POST["valor"];

// Atualiza o produto
$resultado = editarProduto($codigo, $nome, $descricao, $valor);

if ($resultado == 1) {
    // Verifica se a pasta 'uploads' existe, se não, cria
    if (!is_dir('uploads')) {
        mkdir('uploads', 0755, true);
    }
    // Verifica se foi enviada uma nova imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        // Excluir a imagem anterior
        array_map('unlink', glob('uploads/' . $codigo . '_*'));
        
        // Salvar a nova imagem
        $imagem = $_FILES['imagem'];
        $nome_imagem = $codigo . '_' . basename($imagem['name']);
        $caminho_imagem = 'uploads/' . $nome_imagem;

        move_uploaded_file($imagem['tmp_name'], $caminho_imagem);
    }

    $_SESSION['texto_sucesso'] = 'Os dados do produto foram atualizados com sucesso.';
    header("Location: produto.php");
    exit();
} else {
    $_SESSION['texto_erro'] = 'Os dados do produto não foram atualizados.';
    header("Location: editar_produto.php?cod=" . $codigo);
    exit();
}
?>
