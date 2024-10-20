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


function cadastraAdmin($nome, $email, $senha, $status, $perfil){
    $conexao = conecta_bd();
    $query = "insert into admin (nome, email, senha, status, perfil) 
              values ('$nome', '$email', '$senha', '$status', '$perfil')";

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

function editarAdmin($codigo, $nome, $email, $status){
    $conexao = conecta_bd();
    $query = "SELECT * FROM admin WHERE cod='$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_num_rows($resultado);
    if ($dados == 1) {
        $query = "UPDATE admin
                  SET nome = '$nome', email = '$email', status = '$status'
                  WHERE cod = '$codigo'";
        $resultado = mysqli_query($conexao, $query);
        $dados = mysqli_affected_rows($conexao);

        mysqli_close($conexao);
        return $dados;
    }
    mysqli_close($conexao);
    return 0;
}

function editarSenhaAdmin($codigo, $senha) {
    $conexao = conecta_bd();
    $query = "update admin set senha='$senha' where cod='$codigo'";
    mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao) > 0;
    mysqli_close($conexao);
    return $dados;
}

function editarPerfilAdmin($codigo, $nome, $email){
    $conexao = conecta_bd();

    $query = "select *
              from admin
              where cod = '$codigo'";
                     
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_num_rows($resultado);
    if($dados == 1) {
        $query = "update admin
                  set nome = '$nome', email = '$email'
                  where cod = '$codigo'";
        $resultado = mysqli_query($conexao, $query);
        $dados = mysqli_affected_rows($conexao);

        mysqli_close($conexao);
        return $dados;      
    }
}
?>