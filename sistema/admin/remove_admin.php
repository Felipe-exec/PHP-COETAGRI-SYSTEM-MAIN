<?php
    require_once("../acesso/valida_session.php");
    require_once ("../../bd/bd_admin.php");

    $codigo = $_GET['cod'];

    if( $_SESSION['cod_usu'] != $codigo){

    $dados = removeAdmin($codigo);

    if($dados == 0){
        $_SESSION['texto_erro'] = 'Os dados do usuário não foram excluidos do sistema!';
        header ("Location: admin.php");
    }else{
        $_SESSION['texto_sucesso'] = 'Os dados do usuário foram excluidos do sistema.';
        header ("Location: admin.php");
    }
}else{
    $_SESSION['texto_erro'] = 'O usuário não pode ser excluído do sistema, pois está logado!';
        header ("Location: admin.php");

}

?>