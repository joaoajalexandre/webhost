<?php
session_start();
include("conexao.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="../img/logo.png"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <?php
        include("sidebar.php");
        ?>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.php" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <?php

include("navbar.php");

?>
          <!-- End Navbar -->
        </div>

        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">Painel Administrativo</h6>
              </div>
              
            </div>
            <?php
          
            // Consultas SQL
            
            // 1. Total de Clientes
            $queryClientes = "SELECT COUNT(*) AS total_clientes FROM tb_cliente";
            $stmtClientes = $conn->prepare($queryClientes);
            $stmtClientes->execute();
            $totalClientes = $stmtClientes->fetch(PDO::FETCH_ASSOC)['total_clientes'];
            
            // 2. Total de Vendas
            $queryVendas = "SELECT SUM(total_compra) AS total_vendas FROM tb_compra";
            $stmtVendas = $conn->prepare($queryVendas);
            $stmtVendas->execute();
            $totalVendas = $stmtVendas->fetch(PDO::FETCH_ASSOC)['total_vendas'];
            
            // 3. Vendas de Hoje
            $queryVendasHoje = "SELECT SUM(total_compra) AS vendas_hoje FROM tb_compra WHERE DATE(data) = CURDATE()";
            $stmtVendasHoje = $conn->prepare($queryVendasHoje);
            $stmtVendasHoje->execute();
            $vendasHoje = $stmtVendasHoje->fetch(PDO::FETCH_ASSOC)['vendas_hoje'];
            ?>
            
            <div class="row">
                <!-- Card 1: Clientes -->
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Clientes</p>
                                        <h4 class="card-title"><?php echo $totalClientes; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Card 2: Vendas Totais -->
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="fas fa-luggage-cart"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Vendas</p>
                                        <h4 class="card-title">AOA <?php echo number_format($totalVendas, 0, ',', '.'); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Card 3: Vendas de Hoje -->
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                        <i class="fas fa-luggage-cart"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Vendas de Hoje</p>
                                        <h4 class="card-title">AOA <?php echo number_format($vendasHoje, 0, ',', '.'); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
            <div class="col-md-13">
  <div class="card card-round">
    <div class="card-header">
      <div class="card-head-row">
        <div class="card-title">Estatísticas</div>
        <div class="card-tools">
          <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
            <span class="btn-label">
              <i class="fa fa-pencil"></i>
            </span>
            Export
          </a>
          <a href="#" class="btn btn-label-info btn-round btn-sm">
            <span class="btn-label">
              <i class="fa fa-print"></i>
            </span>
            Print
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="chart-container">
        <canvas id="barChart"></canvas>
      </div>
    </div>
  </div>
</div>
            </div>
          </div>
        </div>

        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    Empresa
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> ajuda </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Licenças </a>
                </li>
              </ul>
            </nav>
            <div class="copyright">
              2025, feito com <i class="fa fa-heart heart text-danger"></i> por
              <a href="#">Empresa</a>
            </div>
            <div>
              Distribuido por
              <a target="_blank" href="#">empresa</a>.
            </div>
          </div>
        </footer>
      </div>

      <!-- Custom template | don't include it in your project! -->
     
      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- Adicionando Chart.js via CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script>

    <script>
  // Criando o gráfico de barras com Chart.js
  var ctx = document.getElementById('barChart').getContext('2d');
  var barChart = new Chart(ctx, {
    type: 'bar', // Tipo do gráfico
    data: {
      labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'], // Rótulos dos eixos X
      datasets: [{
        label: 'Vendas',
        data: [12, 19, 3, 5, 2, 3], // Dados do gráfico
        backgroundColor: 'rgba(75, 192, 192, 0.2)', // Cor de fundo das barras
        borderColor: 'rgba(75, 192, 192, 1)', // Cor da borda das barras
        borderWidth: 1
      }]
    },
    options: {
      responsive: true, // Gráfico responsivo
      scales: {
        y: {
          beginAtZero: true // Inicia o eixo Y a partir de zero
        }
      }
    }
  });
</script>

   
  </body>
</html>
