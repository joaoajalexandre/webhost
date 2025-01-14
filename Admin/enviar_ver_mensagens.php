<?php
include("conexao.php");

    // Verifica se o POST contém o id_cliente
    if (isset($_GET['id_cliente'])) {
      $id_cliente = $_GET['id_cliente'];

        // Consulta SQL para buscar as mensagens do cliente
        $sql = "SELECT m.mensagem, m.data_envio, m.entidade, c.nome 
                FROM tb_mensagens m
                JOIN tb_cliente c ON m.id_cliente = c.id_cliente
                WHERE m.id_cliente = :id_cliente
                ORDER BY m.data_envio DESC";

        // Prepara a consulta
        $stmt = $conn->prepare($sql);

        // Vincula o parâmetro id_cliente
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);

        // Executa a consulta
        $stmt->execute();

        // Obtém o resultado
        $mensagens = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } else {
        die("ID do cliente não fornecido.");
    }



// Não esqueça de fechar a conexão (opcional com PDO)
$conn = null;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <title>Clientes</title>
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
    <script src="./assets/js/plugin/webfont/webfont.min.js"></script>
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
          urls: ["./assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/plugins.min.css" />
    <link rel="stylesheet" href="./assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="./assets/css/demo.css" />
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
              <a href="./index.php" class="logo">
                <img
                  src="./assets/img/kaiadmin/logo_light.svg"
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

include("./navbar.php");

?>
            <!-- End Navbar -->
        </div>

        <div class="container">
          <div class="page-inner">
           
            <div class="row">
            <div class="col-md-12">
    <ul class="timeline">
        <?php foreach ($mensagens as $mensagem): ?>
            <?php if ($mensagem['entidade'] == 'Admin'): ?>
                <!-- Mensagem do Admin -->
                <li class="timeline-inverted receptor">
                    <div class="timeline-badge warning">
                        <i class="far fa-bell"></i>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title"><?php echo htmlspecialchars($mensagem['nome']); ?></h4>
                        </div>
                        <div class="timeline-body">
                            <p><?php echo htmlspecialchars($mensagem['mensagem']); ?></p>
                        </div>
                    </div>
                </li>
            <?php else: ?>
                <!-- Mensagem do Cliente -->
                <li class="emissor">
                    <div class="timeline-badge">
                        <i class="far fa-paper-plane"></i>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="timeline-title"><?php echo htmlspecialchars($mensagem['nome']); ?></h4>
                            <p>
                                <small class="text-muted">
                                    <i class="far fa-paper-plane"></i> <?php echo $mensagem['data_envio']; ?>
                                </small>
                            </p>
                        </div>
                        <div class="timeline-body">
                            <p><?php echo htmlspecialchars($mensagem['mensagem']); ?></p>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <!-- Input para enviar nova mensagem -->
    <div class="form-group">
        <div class="input-icon">
            <input type="text" class="form-control" placeholder="mensagem..." />
            <span class="input-icon-addon">
                <i class="far fa-paper-plane"></i>
            </span>
        </div>
    </div>
</div>

       
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="./assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="./assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="./assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- Kaiadmin JS -->
    <script src="./assets/js/kaiadmin.min.js"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="./assets/js/setting-demo2.js"></script>
    <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });
    </script>
  </body>
</html>
