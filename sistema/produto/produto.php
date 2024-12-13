<?php
require_once('../acesso/valida_session.php');
require_once('../estrutura/header.php'); 
require_once('../estrutura/sidebar.php'); 

unset($_SESSION['nome']);
unset($_SESSION['email']);
unset($_SESSION['senha']);
?>

<link rel="stylesheet" href="../../css/adjustment-table.css">

<!-- Main Content -->
<div id="content">

    <?php require_once('../estrutura/navbar.php');?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-2">
            <div class="card-header py-3">

                <div class="row">
                    <div class="col-md-8">
                        <h6 class="m-0 font-weight-bold text-primary" id="title">GERENCIAR INFORMAÇÕES DOS PRODUTOS</h6>
                    </div>
                    <div class="col-md-4 card_button_title">
                        <a title="Adicionar novo produto" href="cad_produto.php">
                            <button type="button" class="btn btn-primary btn-sm card_button_title" data-toggle="modal">
                                <i class="fas fa-boxes">&nbsp;</i> Adicionar Produto
                            </button>
                        </a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['texto_erro'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?= $_SESSION['texto_erro'] ?></strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php unset($_SESSION['texto_erro']); ?>
                <?php endif; ?>

                <?php if (isset($_SESSION['texto_sucesso'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-check"></i>&nbsp;&nbsp;<?= $_SESSION['texto_sucesso'] ?></strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php unset($_SESSION['texto_sucesso']); ?>
                <?php endif; ?>


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="display:none;">Código</th>
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Descrição</th>
                                <th>Valor</th>
                                <th class="text-center" data-orderable="false">Atualizar</th>
                                <th class="text-center" data-orderable="false">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            require_once("../../bd/bd_produto.php");
                            $produtos = listaProdutos();
                            foreach($produtos as $dados): 
                            ?>
                                <tr>
                                    <td style="display:none;"><?= $dados['cod'] ?></td>
                                    <td><?= htmlspecialchars($dados['nome']) ?></td>
                                    <td class="adjustment-category">
                                        <span class="badge badge-info"><?= htmlspecialchars($dados['categoria_nome']) ?></span>
                                    </td>
                                    <td><?= htmlspecialchars($dados['descricao']) ?></td>
                                    <td>R$ <?= number_format($dados['valor'], 2, ',', '.') ?></td>
                                    <td class="text-center"> 
                                        <a title="Atualizar" href="editar_produto.php?cod=<?=$dados['cod']; ?>" class="btn btn-sm btn-success">
                                            <i class="fas fa-edit">&nbsp;</i>Atualizar
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a title="Excluir" href="remove_produto.php" data-toggle="modal" data-target="#excluir-<?=$dados['cod'];?>" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash-alt">&nbsp;</i>Excluir
                                        </a>
                                    </td> 
                                </tr>

                                <!-- Modal de exclusão -->
                                <div class="modal fade" id="excluir-<?=$dados['cod'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Excluir categoria</h5>
                                            </div>
                                            <div class="modal-body">Deseja realmente excluir esta categoria?</div>
                                            <div class="modal-footer">
                                                <a href="remove_produto.php?cod=<?=$dados['cod'];?>">
                                                    <button class="btn btn-primary btn-user" type="button">Confirmar</button>
                                                </a>
                                                <button class="btn btn-danger btn-user" type="button" data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>   
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    <?php require_once('../estrutura/footer.php'); ?>
