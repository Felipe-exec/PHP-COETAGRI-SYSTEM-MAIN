<?php

require_once("conecta_bd.php");

function listaProdutos() {
    $conexao = conecta_bd();
    $produtos = array();
    $query = "SELECT p.*, c.nome AS categoria_nome FROM produto p 
              LEFT JOIN categoria c ON p.categoria_id = c.cod 
              ORDER BY p.nome";
   
    $resultado = mysqli_query($conexao, $query);
    while ($dados = mysqli_fetch_array($resultado)) {
        array_push($produtos, $dados);
    }

    mysqli_close($conexao);
    return $produtos;
}

function buscaProduto($codigo) {
    $conexao = conecta_bd();
    $query = "SELECT * FROM produto WHERE cod='$codigo'";
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    mysqli_close($conexao);
    return $dados;
}

function cadastraProduto($nome, $categoria_id, $descricao, $valor) {
    $conexao = conecta_bd();
    $query = "INSERT INTO produto (nome, categoria_id, descricao, valor) 
              VALUES ('$nome', '$categoria_id', '$descricao', '$valor')";

    $resultado = mysqli_query($conexao, $query);

    if ($resultado) {
        $codigo = mysqli_insert_id($conexao); // ID do produto recém-inserido
    } else {
        $codigo = 0; // Em caso de falha
    }

    mysqli_close($conexao);
    return $codigo;
}

function removeProduto($codigo) {
    $conexao = conecta_bd();
    $query = "DELETE FROM produto WHERE cod='$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);

    mysqli_close($conexao);
    return $dados;
}

function buscaProdutoEditar($codigo) {
    $conexao = conecta_bd();
    $query = "SELECT * FROM produto WHERE cod='$codigo'";
    
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

    mysqli_close($conexao);
    return $dados;
}

function contarProdutos() {
    $conexao = conecta_bd();
    $query = "SELECT COUNT(*) AS quantidade FROM produto";
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_assoc($resultado);
    mysqli_close($conexao);
    return $dados['quantidade'];
}

function editarProduto($codigo, $nome, $descricao, $valor, $categoria_id) {
    $conexao = conecta_bd();
    
    // Verifica se a categoria existe
    $sql_verifica_categoria = "SELECT COUNT(*) AS count FROM categoria WHERE cod = $categoria_id";
    $resultado = mysqli_query($conexao, $sql_verifica_categoria);
    $row = mysqli_fetch_assoc($resultado);

    if ($row['count'] == 0) {
        return 0; // Categoria não encontrada
    }

    // Atualiza o produto
    $sql = "UPDATE produto SET nome = '$nome', descricao = '$descricao', valor = $valor, categoria_id = $categoria_id WHERE cod = $codigo";
    
    if (mysqli_query($conexao, $sql)) {
        return 1;
    } else {
        return 0;
    }
}
?>