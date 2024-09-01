<?php
require_once('valida_session.php');
require_once('header.php');
require_once('sidebar.php');
require_once("bd/conecta_bd.php"); // Conexão com o banco de dados
require_once("bd/bd_produto.php"); // Arquivo contendo as funções para produtos

// Obtém a quantidade de produtos
$quantidadeProdutos = contarProdutos();

// Verifica se há um termo de pesquisa
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
?>

<link rel="stylesheet" href="./css/style-home.css">

<!-- Main Content -->
<div id="content">
    <?php require_once('navbar.php');?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Content Row -->
        <div class="row">

            <!-- Produtos Cadastrados -->
            <div class="col-xl-12 col-md-12 mb-4" id="cards-notice">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Produtos Cadastrados -> <?= $quantidadeProdutos ?>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <!-- Formulário de Pesquisa -->
                                    <form method="get" action="">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="search" value="<?= htmlspecialchars($searchTerm) ?>" placeholder="Pesquisar produtos...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">Pesquisar</button>
                                                <?php if (!empty($searchTerm)) : ?>
                                                    <a class="btn btn-secondary ml-2" href="home.php">Resetar</a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </form>

                                    <div id="product-list-container">
                                        <?php
                                        // Listando os produtos com base no termo de pesquisa
                                        $produtos = listaProdutos(); // Obtém todos os produtos
                                        if (!empty($searchTerm)) {
                                            // Filtra os produtos com base no termo de pesquisa
                                            $produtos = array_filter($produtos, function($produto) use ($searchTerm) {
                                                return stripos($produto['nome'], $searchTerm) !== false;
                                            });
                                        }

                                        if (count($produtos) > 0) {
                                            echo "<ul id='product-list'>";
                                            foreach ($produtos as $produto) {
                                                echo "<li>" . $produto['nome'] . " - R$ " . number_format($produto['valor'], 2, ',', '.') . "</li>";
                                            }
                                            echo "</ul>";
                                        } else {
                                            echo "Nenhum produto encontrado.";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->

</div>

<?php
require_once('footer.php');
?>
