<?php
session_start();
include("../conexao.php");

if(!isset($_SESSION['logado'])){
  header("Location: ../login.php");
}


$id_cliente = $_SESSION['logado']['id_cliente'];
$cmdCliente = "SELECT * FROM tb_cliente WHERE id_cliente = '$id_cliente' ";
$queryCliente = $conexao->query($cmdCliente);
$dadosCliente = $queryCliente->fetch_assoc();


//Actualizar as informações do usuarios
if (isset($_POST['btnActualizar'])) {
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $bi = $_POST['bi'];
  $nome_empresa = $_POST['nome_empresa'];
  $nif_empresa = $_POST['nif_empresa'];
  $provincia = $_POST['provincia'];
  $municipio = $_POST['municipio'];
  $endereco = $_POST['endereco'];
  $email = $_POST['email'];


  $cmd = "UPDATE tb_cliente SET nome='$nome', sobrenome='$sobrenome', bi='$bi', nome_empresa='$nome_empresa', nif_empresa='$nif_empresa', provincia='$provincia', municipio='$municipio', endereco='$endereco', email='$email' WHERE id_cliente = '$id_cliente' ";
    $actualizarCliente = $conexao->query($cmd);
    if ($actualizarCliente === true) {
      echo "<script>alert('Informãções do usuario aditado com sucesso!')</script>";
    }
    else{
      echo "<script>alert('Erro ao editar as Informãções do usuario!')</script>";
    }
}

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
        <!-------------------------Inicio do container--------------------------->
        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Minhas Informações</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="fa fa-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">
                    <i class="fa fa-user"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">
                    <i class="fa fa-info"></i>
                  </a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <form method="post" class="row">

                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Informações Pessoal</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6 mt-3">
                          <label for="nome">Primeiro nome</label>
                          <input type="text" name="nome" value="<?php echo $dadosCliente['nome']; ?>" class="form-control" id="nome">
                        </div>
                        <div class="col-md-6 mt-3">
                          <label for="sobrenome">Ultimo nome</label>
                          <input type="text" name="sobrenome" value="<?php echo $dadosCliente['sobrenome']; ?>" class="form-control" id="sobrenome">
                        </div>
                        <div class="col-md-4 mt-3">
                          <label for="email">E-mail</label>
                          <input type="text" name="email" value="<?php echo $dadosCliente['email']; ?>" class="form-control" id="email">
                        </div>
                        <div class="col-md-4 mt-3">
                          <label for="telefone">Telefone</label>
                          <input type="text" name="telefone" value="<?php echo $dadosCliente['telefone']; ?>" class="form-control" id="telefone">
                        </div>
                        <div class="col-md-4 mt-3">
                          <label for="telefone">Nº do Bilhete</label>
                          <input type="text" name="bi" value="<?php echo $dadosCliente['bi']; ?>" class="form-control" id="telefone">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Endereço</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-3 mt-3">
                          <label for="provincia">Provincia</label>
                          <input type="text" name="provincia" value="<?php echo $dadosCliente['provincia']; ?>" class="form-control" id="provincia">
                        </div>
                        <div class="col-md-3 mt-3">
                          <label for="sobrenome">Municipio</label>
                          <input type="text" name="municipio" value="<?php echo $dadosCliente['municipio']; ?>" class="form-control" id="municipio">
                        </div>
                        <div class="col-md-6 mt-3">
                          <label for="endereco">Endereço</label>
                          <input type="text" name="endereco" value="<?php echo $dadosCliente['endereco']; ?>" class="form-control" id="endereco">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Informações da Empresa</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-4 mt-3">
                          <label for="nome">Empresa</label>
                          <input type="text" name="nome_empresa" value="<?php echo $dadosCliente['nome_empresa']; ?>" class="form-control" id="nome">
                        </div>
                        <div class="col-md-4 mt-3">
                          <label for="sobrenome">NIF da Empresa</label>
                          <input type="text" name="nif_empresa" value="<?php echo $dadosCliente['nif_empresa']; ?>" class="form-control" id="sobrenome">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="">
                    <input type="submit" name="btnActualizar" value="Actualizar" class="btn btn-primary fluid">
                  </div>

                </form>
              </div>             
            </div>
          </div>
        </div>
        <!-------------------------Final do container--------------------------->

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
      <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
          <div class="switcher">
            <div class="switch-block">
              <h4>Logo Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="selected changeLogoHeaderColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="selected changeLogoHeaderColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeLogoHeaderColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Navbar Header</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="white"
                ></button>
                <br />
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="dark2"
                ></button>
                <button
                  type="button"
                  class="selected changeTopBarColor"
                  data-color="blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="purple2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="light-blue2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="green2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="orange2"
                ></button>
                <button
                  type="button"
                  class="changeTopBarColor"
                  data-color="red2"
                ></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Sidebar</h4>
              <div class="btnSwitch">
                <button
                  type="button"
                  class="selected changeSideBarColor"
                  data-color="white"
                ></button>
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="dark"
                ></button>
                <button
                  type="button"
                  class="changeSideBarColor"
                  data-color="dark2"
                ></button>
              </div>
            </div>
          </div>
        </div>
        <div class="custom-toggle">
          <i class="icon-settings"></i>
        </div>
      </div>
      <!-- End Custom template -->
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
