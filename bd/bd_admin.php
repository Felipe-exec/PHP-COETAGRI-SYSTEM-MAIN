<?php

require_once("conecta_bd.php");

function checaAdmin($email, $senha) {
    $conexao = conecta_bd();
    $senhaMd5 = md5($senha);
    $query = "select *
              from admin
              where email='$email' and
                    senha='$senhaMd5'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    mysqli_close($conexao);
    return $dados;
}

function listaAdmin(){
    $conexao = conecta_bd();
    $admins = array();
    $query = "select *
              from admin
              order by nome";
   
    $resultado = mysqli_query($conexao, $query);
    while($dados = mysqli_fetch_array($resultado)) {
        array_push($admins, $dados);
    }

    mysqli_close($conexao);
    return $admins;
}

function buscaAdmin($email) {
    $conexao = conecta_bd();
    $query = "SELECT * FROM admin WHERE email='$email'";
    $resultado = mysqli_query($conexao, $query);
    
    if (mysqli_num_rows($resultado) > 0) {
        return $resultado;
    } else {
        return false;
    }
    
    mysqli_close($conexao);
}


function cadastraAdmin($nome, $email, $senha, $cep, $endereco, $numero, $bairro, $cidade, $uf, $status, $perfil, $data){
    $conexao = conecta_bd();
    $query = "insert into admin (nome, email, senha, cep, endereco, numero, bairro, cidade, uf, status, perfil, data) 
              values ('$nome', '$email', '$senha', '$cep', '$endereco', '$numero', '$bairro', '$cidade', '$uf', '$status', '$perfil', '$data')";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);

    mysqli_close($conexao);
    return $dados;
}

function removeAdmin($codigo){
    $conexao = conecta_bd();
    $query = "delete from admin where cod = '$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);

    mysqli_close($conexao);
    return $dados;
}

function buscaAdminEditar($codigo){
    $conexao = conecta_bd();
    $query = "select *
              from admin
              where cod='$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    mysqli_close($conexao);
    return $dados;
}

function editarAdmin($codigo, $status, $data){
    $conexao = conecta_bd();
    $query = "select *
              from admin
              where cod='$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_num_rows($resultado);
    if($dados == 1){
        $query = "update admin
                  set status = '$status', data = '$data'
                  where cod = '$codigo'";
        $resultado = mysqli_query($conexao, $query);
        $dados = mysqli_affected_rows($conexao);

        mysqli_close($conexao);
        return $dados;
    }
}

function editarSenhaAdmin($codigo, $senha) {
    $conexao = conecta_bd();
    $query = "update admin set senha='$senha' where cod='$codigo'";
    mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao) > 0;
    mysqli_close($conexao);
    return $dados;
}

function editarPerfilAdmin($codigo, $nome, $email, $endereco, $numero, $bairro, $cidade, $telefone, $data){
    $conexao = conecta_bd();

    $query = "select *
              from admin
              where cod = '$codigo'";
                     
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_num_rows($resultado);
    if($dados == 1) {
        $query = "update admin
                  set nome = '$nome', email = '$email', endereco = '$endereco', numero = '$numero', bairro = '$bairro', cidade = '$cidade', data = '$data'
                  where cod = '$codigo'";
        $resultado = mysqli_query($conexao, $query);
        $dados = mysqli_affected_rows($conexao);

        mysqli_close($conexao);
        return $dados;      
    }
}
?>