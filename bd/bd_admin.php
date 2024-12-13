<?php

require_once("conecta_bd.php");

function checaAdmin($email, $senha) {
    $conexao = conecta_bd();
    $senhaMd5 = md5($senha);
    $query = "SELECT * FROM admin WHERE email = ? AND senha = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("ss", $email, $senhaMd5);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $dados = $resultado->fetch_assoc();

    $stmt->close();
    $conexao->close();
    return $dados;
}

function listaAdmin() {
    $conexao = conecta_bd();
    $admins = array();
    $query = "SELECT * FROM admin ORDER BY nome";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($dados = $resultado->fetch_assoc()) {
        $admins[] = $dados;
    }

    $stmt->close();
    $conexao->close();
    return $admins;
}

function buscaAdmin($email) {
    $conexao = conecta_bd();
    $query = "SELECT * FROM admin WHERE email = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    $dados = $resultado->num_rows > 0;

    $stmt->close();
    $conexao->close();
    return $dados ? $resultado : false;
}

function cadastraAdmin($nome, $email, $senha, $status, $perfil) {
    $conexao = conecta_bd();
    $query = "INSERT INTO admin (nome, email, senha, status, perfil) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("ssssi", $nome, $email, $senha, $status, $perfil);
    $stmt->execute();
    $dados = $stmt->affected_rows;

    $stmt->close();
    $conexao->close();
    return $dados;
}

function removeAdmin($codigo) {
    $conexao = conecta_bd();
    $query = "DELETE FROM admin WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $codigo);
    $stmt->execute();
    $dados = $stmt->affected_rows;

    $stmt->close();
    $conexao->close();
    return $dados;
}

function buscaAdminEditar($codigo) {
    $conexao = conecta_bd();
    $query = "SELECT * FROM admin WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $codigo);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $dados = $resultado->fetch_assoc();

    $stmt->close();
    $conexao->close();
    return $dados;
}

function editarAdmin($codigo, $nome, $email, $status) {
    $conexao = conecta_bd();
    $query = "UPDATE admin SET nome = ?, email = ?, status = ? WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("sssi", $nome, $email, $status, $codigo);
    $stmt->execute();
    $dados = $stmt->affected_rows;

    $stmt->close();
    $conexao->close();
    return $dados > 0 ? 1 : 0;
}

function editarSenhaAdmin($codigo, $senha) {
    $conexao = conecta_bd();
    $query = "UPDATE admin SET senha = ? WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("si", $senha, $codigo);
    $stmt->execute();
    $dados = $stmt->affected_rows;

    $stmt->close();
    $conexao->close();
    return $dados > 0;
}

function editarPerfilAdmin($codigo, $nome, $email) {
    $conexao = conecta_bd();
    $query = "UPDATE admin SET nome = ?, email = ? WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("ssi", $nome, $email, $codigo);
    $stmt->execute();
    $dados = $stmt->affected_rows;

    $stmt->close();
    $conexao->close();
    return $dados;
}

?>
