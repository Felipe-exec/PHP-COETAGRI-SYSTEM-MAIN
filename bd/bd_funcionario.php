<?php

require_once("conecta_bd.php");

function checaFuncionario($email, $senha) {
    $conexao = conecta_bd();
    $senhaMd5 = md5($senha);
    $query = "SELECT * FROM funcionario WHERE email = ? AND senha = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("ss", $email, $senhaMd5);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $dados = $resultado->fetch_assoc();

    $stmt->close();
    $conexao->close();
    return $dados;
}

function listaFuncionarios(){
    $conexao = conecta_bd();
    $funcionarios = array();
    $query = "SELECT * FROM funcionario ORDER BY nome";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($dados = $resultado->fetch_assoc()) {
        $funcionarios[] = $dados;
    }

    $stmt->close();
    $conexao->close();
    return $funcionarios;
}

function buscaFuncionario($email) {
    $conexao = conecta_bd();
    $query = "SELECT * FROM funcionario WHERE email = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $dados = $resultado->num_rows;

    $stmt->close();
    $conexao->close();
    return $dados;
}

function cadastraFuncionario($nome, $email, $senha, $status, $perfil){
    $conexao = conecta_bd();
    $query = "INSERT INTO funcionario (nome, email, senha, status, perfil) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("ssssi", $nome, $email, $senha, $status, $perfil);
    $stmt->execute();
    $dados = $stmt->affected_rows;

    $stmt->close();
    $conexao->close();
    return $dados;
}

function removeFuncionario($codigo){
    $conexao = conecta_bd();
    $query = "DELETE FROM funcionario WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $codigo);
    $stmt->execute();
    $dados = $stmt->affected_rows;

    $stmt->close();
    $conexao->close();
    return $dados;
}

function buscaFuncionarioEditar($codigo){
    $conexao = conecta_bd();
    $query = "SELECT * FROM funcionario WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $codigo);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $dados = $resultado->fetch_assoc();

    $stmt->close();
    $conexao->close();
    return $dados;
}

function contarFuncionarios() {
    $conexao = conecta_bd();
    $query = "SELECT COUNT(*) AS quantidade FROM funcionario";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $dados = $resultado->fetch_assoc();

    $stmt->close();
    $conexao->close();
    return $dados['quantidade'];
}

function editarFuncionario($codigo, $nome, $email, $status) {
    $conexao = conecta_bd();
    $query = "UPDATE funcionario SET nome = ?, email = ?, status = ? WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("sssi", $nome, $email, $status, $codigo);
    $stmt->execute();
    $dados = $stmt->affected_rows;

    $stmt->close();
    $conexao->close();
    return $dados > 0 ? 1 : 0;
}

function editarSenhaFuncionario($codigo, $senha) {
    $conexao = conecta_bd();
    $query = "UPDATE funcionario SET senha = ? WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("si", $senha, $codigo);
    $stmt->execute();
    $dados = $stmt->affected_rows;

    $stmt->close();
    $conexao->close();
    return $dados > 0;
}

function editarPerfilFuncionario($codigo, $nome, $email){
    $conexao = conecta_bd();
    $query = "UPDATE funcionario SET nome = ?, email = ? WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("ssi", $nome, $email, $codigo);
    $stmt->execute();
    $dados = $stmt->affected_rows;

    $stmt->close();
    $conexao->close();
    return $dados;
}

?>
