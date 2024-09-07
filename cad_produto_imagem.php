<?php
require_once('valida_session.php');
require_once('header.php');
require_once('sidebar.php');

$codigo = $_GET['cod']; // Obtém o código do produto
?>

<!-- Main Content -->
<div id="content">

    <?php require_once('navbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ENVIAR IMAGEM DO PRODUTO</h6>
            </div>
            <div class="card-body">
                <!-- Formulário de Envio de Imagem -->
                <form class="user" action="cad_produto_imagem_envia.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="imagem" class="form-label">Imagem do Produto</label>
                        <br>
                        <input type="file" class="btn btn-primary" id="imagem" name="imagem" accept="image/*" required>
                        <small class="form-text text-muted">Selecione uma imagem para o produto (formatos permitidos: JPG, PNG).</small>
                    </div>
                    <input type="hidden" name="codigo" value="<?= $codigo ?>">

                    <div class="card-footer text-muted">
                        <div class="text-right">
                            <a title="Voltar" href="produto.php"><button type="button" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>&nbsp;Voltar</button></a>
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
require_once('footer.php');
?>
