<?php

require_once("conecta_bd.php");

function listaCategorias() {
    $conexao = conecta_bd();
    $categorias = array();
    $query = "SELECT * FROM categoria ORDER BY nome";
   
    $resultado = mysqli_query($conexao, $query);
    while ($dados = mysqli_fetch_array($resultado)) {
        array_push($categorias, $dados);
    }

    mysqli_close($conexao);
    return $categorias;
}

function buscaCategoria($cod) {
    $conexao = conecta_bd();
    $query = "SELECT * FROM categoria WHERE cod='$cod'";
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    mysqli_close($conexao);
    return $dados;
}

function buscaCategoriaPorNome($nome) {
    $conexao = conecta_bd();
    $nome = mysqli_real_escape_string($conexao, $nome);
    $query = "SELECT * FROM categoria WHERE nome='$nome'";
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    mysqli_close($conexao);
    return $dados;
}

function cadastraCategoria($nome) {
    $conexao = conecta_bd();
    $query = "INSERT INTO categoria (nome) VALUES ('$nome')";

    $resultado = mysqli_query($conexao, $query);

    $cod = ($resultado) ? mysqli_insert_id($conexao) : 0;

    mysqli_close($conexao);
    return $cod;
}

function editarCategoria($cod, $nome) {
    $conexao = conecta_bd();
    $query = "UPDATE categoria SET nome='$nome' WHERE cod='$cod'";

    $resultado = mysqli_query($conexao, $query);

    mysqli_close($conexao);

    return ($resultado) ? 1 : 0;
}

function removeCategoria($cod) {
    $conexao = conecta_bd();
    $query = "DELETE FROM categoria WHERE cod='$cod'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);

    mysqli_close($conexao);
    return $dados;
}

?>