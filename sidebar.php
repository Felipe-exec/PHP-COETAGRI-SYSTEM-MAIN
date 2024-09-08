<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="v
    iewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style-sidebar.css">
</head>
<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
        <div class="sidebar-brand-text mx-3"><img class="img-dashbord" src="./images/coetagri-simbolo.png"> System</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="home.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Painel de Controle</span>
        </a>
    </li>

    <?php
    // Verifica o perfil do usuário e exibe itens conforme apropriado
    if ($_SESSION['perfil'] == 1) {
        // Perfil 1: Administrador
        ?>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Administradores -->
        <li class="nav-item active">
            <a class="nav-link" href="admin.php">
                <i class="fa fa-user-circle"></i>
                <span>Administradores</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Funcionários -->
        <li class="nav-item active">
            <a class="nav-link" href="funcionario.php">
                <i class="fa fa-handshake"></i>
                <span>Funcionários</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Produtos -->
        <li class="nav-item active">
            <a class="nav-link" href="produto.php">
                <i class="fas fa-boxes"></i>
                <span>Produtos</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Categorias -->
        <li class="nav-item active">
            <a class="nav-link" href="categoria.php">
            <i class="fa fa-list-alt" aria-hidden="true"></i>
                <span>Categorias</span>
            </a>
        </li>

        <?php
    } elseif ($_SESSION['perfil'] == 2) {
        // Perfil 2: Funcionario
        ?>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Produtos -->
        <li class="nav-item active">
            <a class="nav-link" href="produto.php">
                <i class="fas fa-boxes"></i>
                <span>Produtos</span>
            </a>
        </li>

        <!-- Nav Item - Categorias -->
        <li class="nav-item active">
            <a class="nav-link" href="categoria.php">
            <i class="fa fa-list-alt" aria-hidden="true"></i>
                <span>Categorias</span>
            </a>
        </li>
        <?php
    }
    ?>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
