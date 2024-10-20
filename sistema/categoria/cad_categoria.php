<?php
require_once('../acesso/valida_session.php');
require_once('../estrutura/header.php');
require_once('../estrutura/sidebar.php');
?>

<!-- Main Content -->
<div id="content">

    <?php require_once('../estrutura/navbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ADICIONAR CATEGORIA</h6>
            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['texto_erro'])):
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?= $_SESSION['texto_erro'] ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                    unset($_SESSION['texto_erro']);
                endif;
                ?>
                <?php
                if (isset($_SESSION['texto_sucesso'])):
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-check"></i>&nbsp;&nbsp;<?= $_SESSION['texto_sucesso'] ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                    unset($_SESSION['texto_sucesso']);
                endif;
                ?>

                <!-- Formulário de Cadastro de Categoria -->
                <form class="user" action="cad_categoria_envia.php" method="post">
                    <div class="form-group">
                        <label> Nome da Categoria </label>
                        <input type="text" class="form-control form-control-user" id="nome" name="nome" placeholder="Nome da Categoria" required>
                    </div>

                    <div class="card-footer text-muted">
                        <div class="text-right">
                            <a title="Voltar" href="./categoria.php"><button type="button" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>&nbsp;Voltar</button></a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save">&nbsp;</i>Finalizar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
require_once('../estrutura/footer.php');
?>
