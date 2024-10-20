<?php
    require_once("../acesso/valida_session.php");
    require_once ("../../bd/bd_funcionario.php");

    $codigo = $_GET['cod'];

    if( $_SESSION['cod_usu'] != $codigo){

    $dados = removeFuncionario($codigo);

    if($dados == 0){
        $_SESSION['texto_erro'] = 'Os dados do funcionario não foram excluidos do sistema!';
        header ("Location:funcionario.php");
    }else{
        $_SESSION['texto_sucesso'] = 'Os dados do funcionario foram excluidos do sistema.';
        header ("Location:funcionario.php");
    }
}else{
    $_SESSION['texto_erro'] = 'O funcionario não pode ser excluído do sistema, pois está logado!';
        header ("Location:funcionario.php");

}

?>