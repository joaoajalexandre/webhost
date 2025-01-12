
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
                  <li>
                    <div class="timeline-badge">
                      <i class="far fa-paper-plane"></i>
                    </div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4 class="timeline-title">Mussum ipsum cacilds1</h4>
                        <p>
                          <small class="text-muted"
                            ><i class="far fa-paper-plane"></i> 11 hours ago via
                            Twitter</small
                          >
                        </p>
                      </div>
                      <div class="timeline-body">
                        <p>
                          Far far away, behind the word mountains, far from the
                          countries Vokalia and Consonantia, there live the
                          blind texts.
                        </p>
                      </div>
                    </div>
                  </li>
                  <li class="timeline-inverted">
                    <div class="timeline-badge warning">
                      <i class="far fa-bell"></i>
                    </div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4 class="timeline-title">Mussum ipsum cacilds2</h4>
                      </div>
                      <div class="timeline-body">
                        <p>
                          Far far away, behind the word mountains, far from the
                          countries Vokalia and Consonantia, there live the
                          blind texts.
                        </p>
                      </div>
                    </div>
                  </li>
                 
                </ul>
                <div class="form-group">
                          <div class="input-icon">
                            <input
                              type="text"
                              class="form-control"
                              placeholder="mensagem..."
                            />
                            <span class="input-icon-addon">
                              <i class="far fa-paper-plane"></i>
                            </span>
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
