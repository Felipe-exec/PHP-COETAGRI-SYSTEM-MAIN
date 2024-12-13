<?php
require_once('../bd/conecta_bd.php');
require_once('../bd/bd_produto.php');
require_once('../bd/bd_categoria.php');

$categorias = listaCategorias();
$produtos = listaProdutos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>COETAGRI - Loja</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./assets/img/favicon.ico" rel="icon">
  <link href="./assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="home.php" class="logo"><img src="assets/img/coetagri.png" alt="Logo da COETAGRI" class="img-fluid"></a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="home.php">Início</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Produtos</a></li>
          <li><a class="nav-link scrollto" href="#footer">Contato</a></li>
        </ul>
        <li><a class="getstarted scrollto" href="#about" id="view-cart" style="position: relative; top: -10px;">Carrinho <i class="bi bi-cart2"></i></a></li>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>LOJA</h2>
          <ol>
            <li><a href="home.php">Início</a></li>
            <li>Loja</li>
          </ol>
        </div>
      </div>
    </section>

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Produtos</h2>
          <p>Bem-vindo a nossa loja!</p>
        </div>

        <!-- Filtros Dinâmicos da Seção de Portfólio -->
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Todos</li>
              <?php foreach ($categorias as $categoria): ?>
                <li data-filter=".filter-<?php echo strtolower(str_replace(' ', '-', $categoria['nome'])); ?>">
                  <?php echo htmlspecialchars($categoria['nome']); ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>

        <!-- Exibição dos Produtos -->
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <?php foreach ($produtos as $produto): ?>
            <div
              class="col-lg-4 col-md-6 filter-<?php echo strtolower(str_replace(' ', '-', $produto['categoria_nome'])); ?>">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">
                    <?php echo htmlspecialchars($produto['nome']); ?>
                  </h5>

                  <?php
                  $imagemPathBase = '../sistema/produto/uploads/' . $produto['cod'] . '_*';
                  $imagemPath = '';
                  $possiveisImagens = glob($imagemPathBase . '.{jpg,png,jpeg}', GLOB_BRACE);

                  if (!empty($possiveisImagens)) {
                    $imagemPath = $possiveisImagens[0];
                  }
                  ?>

                  <?php if ($imagemPath): ?>
                    <img src="<?php echo $imagemPath; ?>" alt="Imagem do <?php echo htmlspecialchars($produto['nome']); ?>"
                      class="img-fluid fixed-size-image">
                  <?php else: ?>
                    <img src="assets/img/placeholder.png" alt="Imagem não disponível" class="img-fluid fixed-size-image">
                  <?php endif; ?>

                  <p class="card-text">
                    Descrição:
                    <?php echo htmlspecialchars($produto['descricao']); ?><br><br>
                    Valor: R$
                    <?php echo number_format($produto['valor'], 2, ',', '.'); ?>
                  </p>
                  <button type="button" class="add-to-cart btn btn-outline-success"
                    data-product="<?php echo htmlspecialchars($produto['nome']); ?>" title="Adicionar ao carrinho">
                    <i class="bi bi-cart2"></i> Adicionar ao carrinho
                  </button>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </section>
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Informações úteis</h3>
              <p>
                Rod. Machado - Paraguaçu<br>
                km 3 - Guaipava, Machado - MG<br><br>
                <strong>Telefone:</strong> +55 (35)3295-9716<br>
                <strong>E-mail:</strong> coetagri@mch.ifsuldeminas.edu.br<br>
              </p>
              <div class="social-links mt-3">
                <a target="blank" href="https://www.facebook.com/Coetagri/" class="facebook"><i
                    class="bx bxl-facebook"></i></a>
                <a target="blank" href="https://www.instagram.com/coetagri/" class="instagram"><i
                    class="bx bxl-instagram"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Úteis</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="https://linktr.ee/coetagri.machado">Linktree</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Redirecionamentos</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="home.php">Início</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Obrigado por nos visitar!</h4>
            <img src="./assets/img/coetagri.png" width="50%" alt="" srcset="">
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Dewi</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    const filters = document.querySelectorAll('#portfolio-flters li');
    const portfolioItems = document.querySelectorAll('.portfolio-item');

    filters.forEach(filter => {
      filter.addEventListener('click', function () {
        const filterValue = this.getAttribute('data-filter');

        filters.forEach(filter => filter.classList.remove('filter-active'));

        this.classList.add('filter-active');

        portfolioItems.forEach(item => {
          if (filterValue === '*' || item.classList.contains(filterValue.replace('.', ''))) {
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        });
      });
    });
  </script>
  <!-- Cart Popup -->
  <div id="cart-popup">
    <h4>Itens no Carrinho</h4>
    <div id="cart-items"></div>
    <button class="btn btn-secondary" id="close-cart-popup">Fechar</button>
    <button class="btn btn-success" id="comprar">Comprar <i class="bi bi-whatsapp"></i></button>
  </div>
  <!-- Carrinho Script -->
  <script src="./assets/js/chart.js"></script>

</body>

</html>