<?php
require_once('valida_session.php');
require_once('header.php'); 
require_once('sidebar.php'); 
require_once("bd/bd_categoria.php");

// Recupera o código da categoria a ser editada
$cod = $_GET['cod'];

// Busca os dados da categoria para edição
$dados = buscaCategoria($cod);
$nome = $dados["nome"];
?>

<!-- Main Content -->
<div id="content">
    <?php require_once('navbar.php'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-8">
                        <h6 class="m-0 font-weight-bold text-primary" id="title">ATUALIZAR DADOS DA CATEGORIA</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <form class="user" action="editar_categoria_envia.php" method="post">
                <input type="hidden" name="cod" value="<?= $cod ?>">
                <div class="form-group">
                    <label> Nome da Categoria </label>
                    <input type="text" class="form-control form-control-user" id="nome" name="nome" value="<?= $nome ?>" required>
                </div>

                <div class="card-footer text-muted" id="btn-form">
                    <div class="text-right">
                        <a title="Voltar" href="categoria.php"><button type="button" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>&nbsp;Voltar</button></a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-edit">&nbsp;</i>Atualizar</button>
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
