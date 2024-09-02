<?php

require_once("conecta_bd.php");

function checaFuncionario($email, $senha) {
    $conexao = conecta_bd();
    $senhaMd5 = md5($senha);
    $query = "select *
              from funcionario
              where email='$email' and
                    senha='$senhaMd5'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;
}

function listaFuncionarios(){
    $conexao = conecta_bd();
    $funcionarios = array();
    $query = "select *
              from funcionario
              order by nome";

    $resultado = mysqli_query($conexao, $query);
    while ($dados = mysqli_fetch_array($resultado)){
        array_push($funcionarios, $dados);
    }
    return $funcionarios;
}

function buscaFuncionario($email) {
    $conexao = conecta_bd();
    $query = "select * from funcionario where email='$email'";
    return mysqli_query($conexao, $query);
    //$resultado = mysqli_query($conexao, $query);
    //$dados = mysqli_num_rows($resultado);

    //return $dados;
}

function cadastraFuncionario($nome, $email, $senha, $cep, $endereco, $numero, $bairro, $cidade, $uf, $telefone, $status, $perfil, $data){
    $conexao = conecta_bd();

    $query = "insert into funcionario (nome, email, senha, cep, endereco, numero, bairro, cidade, uf, telefone, status, perfil, data) 
              values ('$nome', '$email', '$senha', '$cep', '$endereco', '$numero', '$bairro', '$cidade', '$uf', '$telefone', '$status', '$perfil', '$data')";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);

    return $dados;
}

function removeFuncionario($codigo){
    $conexao = conecta_bd();
    $query = "delete from funcionario where cod = '$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);

    return $dados;
}

function buscaFuncionarioEditar($codigo){
    $conexao = conecta_bd();
    $query = "select *
              from funcionario
              where cod='$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;
}

function contarFuncionarios() {
    $conexao = conecta_bd();
    $query = "SELECT COUNT(*) AS quantidade FROM funcionario";
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_assoc($resultado);
    mysqli_close($conexao);
    return $dados['quantidade'];
}

function editarFuncionario($codigo, $status, $data){
    $conexao = conecta_bd();
    $query = "select *
              from funcionario
              where cod='$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_num_rows($resultado);
    if($dados == 1){
        $query = "update funcionario
                  set status = '$status', data = '$data'
                  where cod = '$codigo'";
        $resultado = mysqli_query($conexao, $query);
        $dados = mysqli_affected_rows($conexao);
        return $dados;
    }
}

function editarSenhaFuncionario($codigo, $senha) {
    $conexao = conecta_bd();
    $query = "update funcionario set senha='$senha' where cod='$codigo'";
    mysqli_query($conexao, $query);
    return mysqli_affected_rows($conexao) > 0;
}

function editarPerfilFuncionario($codigo, $nome, $email, $endereco, $numero, $bairro, $cidade, $telefone, $data){
    $conexao = conecta_bd();

    $query = "select *
              from funcionario
              where cod = '$codigo'";
                     
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_num_rows($resultado);
    if($dados == 1)
    {
        $query = "update funcionario
                  set nome = '$nome', email = '$email', endereco = '$endereco', numero = '$numero', bairro = '$bairro', cidade = '$cidade', telefone = '$telefone', data = '$data'
                  where cod = '$codigo'";
        $resultado = mysqli_query($conexao, $query);
        $dados = mysqli_affected_rows($conexao);
        return $dados;      
    }
}
?>