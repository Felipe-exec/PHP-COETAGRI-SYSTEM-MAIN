<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="v
    iewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style-sidebar.css">
</head>
<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/PHP-COETAGRI-SYSTEM-MAIN/sistema/estrutura/home.php">
        <div class="mx-3"> <img class="img-dashbord" src="../../images/coetagri-simbolo.png"></img> <span> System</span> </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/PHP-COETAGRI-SYSTEM-MAIN/sistema/estrutura/home.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Painel de Controle</span>
        </a>
    </li>

    <?php
    if ($_SESSION['perfil'] == 1) {
        // Perfil 1: Administrador
    ?>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Administradores -->
        <li class="nav-item active">
            <a class="nav-link" href="/PHP-COETAGRI-SYSTEM-MAIN/sistema/admin/admin.php">
                <i class="fa fa-user-circle"></i>
                <span>Administradores</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Funcionários -->
        <li class="nav-item active">
            <a class="nav-link" href="/PHP-COETAGRI-SYSTEM-MAIN/sistema/funcionario/funcionario.php">
                <i class="fa fa-handshake"></i>
                <span>Funcionários</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Categorias -->
        <li class="nav-item active">
            <a class="nav-link" href="/PHP-COETAGRI-SYSTEM-MAIN/sistema/categoria/categoria.php">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
                <span>Categorias</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Produtos -->
        <li class="nav-item active">
            <a class="nav-link" href="/PHP-COETAGRI-SYSTEM-MAIN/sistema/produto/produto.php">
                <i class="fas fa-boxes"></i>
                <span>Produtos</span>
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
            <a class="nav-link" href="/PHP-COETAGRI-SYSTEM-MAIN/sistema/produto/produto.php">
                <i class="fas fa-boxes"></i>
                <span>Produtos</span>
            </a>
        </li>

        <!-- Nav Item - Categorias -->
        <li class="nav-item active">
            <a class="nav-link" href="/PHP-COETAGRI-SYSTEM-MAIN/sistema/categoria/categoria.php">
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
        <button class="rounded-circle border-0" id="sidebarToggle">
            <i class=""></i>
        </button>
    </div>


</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidebar = document.querySelector('#accordionSidebar');
            var toggleButton = document.querySelector('#sidebarToggle');

            toggleButton.addEventListener('click', function() {
                var spans = sidebar.querySelectorAll('span');
                var icons = sidebar.querySelectorAll('i');

                if (sidebar.classList.contains('minimized')) {
                    spans.forEach(function(span) {
                        span.style.display = 'inline';
                    });
                    icons.forEach(function(icon) {
                        icon.style.fontSize = '1rem';
                    });
                    sidebar.classList.remove('minimized');
                } else {
                    spans.forEach(function(span) {
                        span.style.display = 'none';
                    });
                    icons.forEach(function(icon) {
                        icon.style.fontSize = '1rem';
                    });
                    sidebar.classList.add('minimized');
                }
            });
        });
    </script>