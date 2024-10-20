<?php
require_once("../acesso/valida_session.php");
require_once("../../bd/bd_produto.php");

$codigo = $_POST["cod"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$valor = $_POST["valor"];
$categoria_id = $_POST["categoria"];

$resultado = editarProduto($codigo, $nome, $descricao, $valor, $categoria_id);

if ($resultado == 1) {
    if (!is_dir('uploads')) {
        mkdir('uploads', 0755, true);
    }
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        array_map('unlink', glob('uploads/' . $codigo . '_*'));
        
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
