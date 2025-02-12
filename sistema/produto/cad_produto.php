<?php
require_once('../acesso/valida_session.php');
require_once('../estrutura/header.php');
require_once('../estrutura/sidebar.php');
require_once("../../bd/bd_produto.php");
require_once("../../bd/bd_categoria.php");

$categorias = listaCategorias();
?>

<!-- Main Content -->
<div id="content">

    <?php require_once('../estrutura/navbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ADICIONAR PRODUTO</h6>
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

                <!-- Formulário de Cadastro de Produto -->
                <form class="user" action="cad_produto_envia.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Nome do Produto </label>
                            <input type="text" class="form-control form-control-user" id="nome" name="nome" placeholder="Nome do Produto" required>
                        </div>
                        <div class="col-sm-6">
                            <label> Valor </label>
                            <input type="number" step="0.01" class="form-control form-control-user" id="valor" name="valor" placeholder="Valor" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label> Descrição </label>
                        <textarea class="form-control form-control-user" id="descricao" name="descricao" placeholder="Descrição do Produto"></textarea>
                    </div>
                    <div class="form-group">
                        <label> Categoria </label>
                        <select class="form-control" id="categoria" name="categoria" required>
                            <?php foreach ($categorias as $categoria): ?>
                                <option value="<?= $categoria['cod'] ?>">
                                    <?= $categoria['nome'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="imagem" class="form-label">Imagem do Produto</label>
                        <br>
                        <input type="file" class="btn btn-primary" id="imagem" name="imagem" accept="image/*" required>
                        <small class="form-text text-muted">Selecione uma imagem para o produto (formatos permitidos: JPG, PNG).</small>
                    </div>

                    <div class="card-footer text-muted">
                        <div class="text-right">
                            <a title="Voltar" href="./produto.php"><button type="button" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>&nbsp;Voltar</button></a>
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