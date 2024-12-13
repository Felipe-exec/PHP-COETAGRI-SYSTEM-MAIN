<?php

require_once("conecta_bd.php");

function listaProdutos() {
    $conexao = conecta_bd();
    $produtos = array();
    $query = "SELECT p.*, c.nome AS categoria_nome FROM produto p 
              LEFT JOIN categoria c ON p.categoria_id = c.cod 
              ORDER BY p.nome";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($dados = $resultado->fetch_assoc()) {
        $produtos[] = $dados;
    }

    $stmt->close();
    $conexao->close();
    return $produtos;
}

function buscaProduto($codigo) {
    $conexao = conecta_bd();
    $query = "SELECT * FROM produto WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $codigo);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $dados = $resultado->fetch_assoc();

    $stmt->close();
    $conexao->close();
    return $dados;
}

function cadastraProduto($nome, $categoria_id, $descricao, $valor) {
    $conexao = conecta_bd();
    $query = "INSERT INTO produto (nome, categoria_id, descricao, valor) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("sisd", $nome, $categoria_id, $descricao, $valor);
    $stmt->execute();

    $codigo = $stmt->insert_id ? $stmt->insert_id : 0;

    $stmt->close();
    $conexao->close();
    return $codigo;
}

function removeProduto($codigo) {
    $conexao = conecta_bd();
    $query = "DELETE FROM produto WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $codigo);
    $stmt->execute();
    $dados = $stmt->affected_rows;

    $stmt->close();
    $conexao->close();
    return $dados;
}

function buscaProdutoEditar($codigo) {
    $conexao = conecta_bd();
    $query = "SELECT * FROM produto WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $codigo);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $dados = $resultado->fetch_assoc();

    $stmt->close();
    $conexao->close();
    return $dados;
}

function contarProdutos() {
    $conexao = conecta_bd();
    $query = "SELECT COUNT(*) AS quantidade FROM produto";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $dados = $resultado->fetch_assoc();

    $stmt->close();
    $conexao->close();
    return $dados['quantidade'];
}

function editarProduto($codigo, $nome, $descricao, $valor, $categoria_id) {
    $conexao = conecta_bd();

    $query_verifica_categoria = "SELECT COUNT(*) AS count FROM categoria WHERE cod = ?";
    $stmt_categoria = $conexao->prepare($query_verifica_categoria);
    $stmt_categoria->bind_param("i", $categoria_id);
    $stmt_categoria->execute();
    $resultado_categoria = $stmt_categoria->get_result();
    $row = $resultado_categoria->fetch_assoc();

    if ($row['count'] == 0) {
        $stmt_categoria->close();
        $conexao->close();
        return 0;
    }
    $stmt_categoria->close();

    $query = "UPDATE produto SET nome = ?, descricao = ?, valor = ?, categoria_id = ? WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("ssdii", $nome, $descricao, $valor, $categoria_id, $codigo);
    $stmt->execute();
    $dados = $stmt->affected_rows;

    $stmt->close();
    $conexao->close();
    return $dados > 0 ? 1 : 0;
}

?>
