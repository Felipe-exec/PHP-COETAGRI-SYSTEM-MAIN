<?php

require_once("conecta_bd.php");

function listaCategorias() {
    $conexao = conecta_bd();
    $categorias = array();
    $query = "SELECT * FROM categoria ORDER BY nome";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($dados = $resultado->fetch_assoc()) {
        $categorias[] = $dados;
    }

    $stmt->close();
    $conexao->close();
    return $categorias;
}

function buscaCategoria($cod) {
    $conexao = conecta_bd();
    $query = "SELECT * FROM categoria WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $cod);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $dados = $resultado->fetch_assoc();

    $stmt->close();
    $conexao->close();
    return $dados;
}

function buscaCategoriaPorNome($nome) {
    $conexao = conecta_bd();
    $query = "SELECT * FROM categoria WHERE nome = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $dados = $resultado->fetch_assoc();

    $stmt->close();
    $conexao->close();
    return $dados;
}

function cadastraCategoria($nome) {
    $conexao = conecta_bd();
    $query = "INSERT INTO categoria (nome) VALUES (?)";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("s", $nome);
    $stmt->execute();

    $cod = ($stmt->affected_rows > 0) ? $stmt->insert_id : 0;

    $stmt->close();
    $conexao->close();
    return $cod;
}

function editarCategoria($cod, $nome) {
    $conexao = conecta_bd();
    $query = "UPDATE categoria SET nome = ? WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("si", $nome, $cod);
    $stmt->execute();

    $dados = $stmt->affected_rows > 0;

    $stmt->close();
    $conexao->close();
    return $dados ? 1 : 0;
}

function removeCategoria($cod) {
    $conexao = conecta_bd();
    $query = "DELETE FROM categoria WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $cod);
    $stmt->execute();

    $dados = $stmt->affected_rows;

    $stmt->close();
    $conexao->close();
    return $dados;
}

?>
