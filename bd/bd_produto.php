<?php

require_once("conecta_bd.php");

function listaProdutos() {
    $conexao = conecta_bd();
    $produtos = array();
    $query = "SELECT * FROM produto ORDER BY nome";
   
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

function cadastraProduto($nome, $descricao, $valor) {
    $conexao = conecta_bd();
    $query = "INSERT INTO produto (nome, descricao, valor) VALUES ('$nome', '$descricao', '$valor')";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);

    mysqli_close($conexao);
    return $dados;
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

function editarProduto($codigo, $nome, $descricao, $valor) {
    $conexao = conecta_bd();
    $query = "UPDATE produto SET 
                nome='$nome', 
                descricao='$descricao', 
                valor='$valor'
              WHERE cod='$codigo'";

    $resultado = mysqli_query($conexao, $query);

    mysqli_close($conexao);

    return ($resultado) ? 1 : 0;
}

?>
