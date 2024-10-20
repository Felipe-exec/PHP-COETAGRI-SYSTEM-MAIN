<?php
require_once('../acesso/valida_session.php');
require_once('./header.php');
require_once('./sidebar.php');
require_once("../../bd/conecta_bd.php");
require_once("../../bd/bd_produto.php");
require_once("../../bd/bd_funcionario.php");

$quantidadeProdutos = contarProdutos();

$quantidadeFuncionarios = contarFuncionarios();

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
        <div class="col-xl-6 col-lg-6 col-md-12 mb-4 space-between-cards">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Produtos Cadastrados -> <?= $quantidadeProdutos ?>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <div id="product-list-container">
                                    <?php
                                    $produtos = listaProdutos();
                                    if (!empty($searchTerm)) {
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

        <!-- Funcionários Cadastrados -->
        <div class="col-xl-6 col-lg-6 col-md-12 mb-4 space-between-cards">
            <div class="card border-left-primary shadow h-100 py-2" id="employee-list">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Funcionários Cadastrados -> <?= $quantidadeFuncionarios ?>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <div id="employee-list-container">
                                    <?php
                                    $funcionarios = listaFuncionarios();
                                    if (count($funcionarios) > 0) {
                                        echo "<ul id='employee-list'>";
                                        foreach ($funcionarios as $funcionario) {
                                            echo "<li>" . $funcionario['nome'] . " - " . $funcionario['email'] . "</li>";
                                        }
                                        echo "</ul>";
                                    } else {
                                        echo "Nenhum funcionário cadastrado.";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>

<?php
require_once('./footer.php');
?>
