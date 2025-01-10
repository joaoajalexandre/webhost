<?php
session_start();
include("./conexao.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <title>Email</title>
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
    <link rel="stylesheet" href="./assets/css/style_modal.css" />

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
            <div class="page-header">
              <h3 class="fw-bold mb-3">Email</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#"></a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#"></a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Serviços de Email</h4>
                    <!-- Botão que abre o modal -->
                    <button id="openModal">+</button>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                    <?php

// Consulta SQL para unir as tabelas
$query = "SELECT nome_servico, limite_contas_email, preco_mensal, preco_anual, status, data_criacao FROM servicos_email";
$stmt = $conn->prepare($query);
$stmt->execute();

// Obter os resultados
$emails = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table
    id="basic-datatables"
    class="display table table-striped table-hover"
>
    <thead>
        <tr>
            <th>Nome do Serviço</th>
            <th>Limite de Contas</th>
            <th>Preço Mensal</th>
            <th>Preço Anual</th>
            <th>Status</th>
            <th>Data</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Nome do Serviço</th>
            <th>Limite de Contas</th>
            <th>Preço Mensal</th>
            <th>Preço Anual</th>
            <th>Status</th>
            <th>Data</th>
            <th>Ação</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        // Exibir os dados dinamicamente na tabela
        if (!empty($emails)) {
            foreach ($emails as $email) {
                echo "<tr>";
                echo "<td>{$email['nome_servico']}</td>";
                echo "<td>{$email['limite_contas_email']}</td>";
                echo "<td>{$email['preco_mensal']}</td>";
                echo "<td>{$email['preco_anual']}</td>";
                echo "<td>{$email['status']}</td>";
                echo "<td>{$email['data_criacao']}</td>";
                echo '<td style="display:flex;width:70px; justify-content:space-around">
                <a href="ver.php?id=' . $cliente['id_cliente'] . '"  aria-label="Ver Detalhes">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="editar.php?id=' . $cliente['id_cliente'] . '"  aria-label="Editar">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="eliminar.php?id=' . $cliente['id_cliente'] . '"  aria-label="Eliminar" onclick="return confirm(\'Tem certeza que deseja eliminar este item?\');">
                    <i class="fa fa-trash"></i>
                </a>
              </td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Nenhum Plano de Email encontrado</td></tr>";
        }
        ?>
    </tbody>
</table>
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



    
<!-- Modal formulario -->
<div id="modalForm" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Cadastro de Plano de Hospedagem</h2>
        <form id="formPlanoHospedagem">
            <label for="nome_plano">Nome do Plano:</label><br>
            <input type="text" id="nome_plano" name="nome_plano" required><br><br>

            <label for="descricao">Descrição:</label><br>
            <textarea id="descricao" name="descricao"></textarea><br><br>

            <label for="preco_mensal">Preço Mensal:</label><br>
            <input type="number" step="0.01" id="preco_mensal" name="preco_mensal" required><br><br>

            <label for="preco_anual">Preço Anual:</label><br>
            <input type="number" step="0.01" id="preco_anual" name="preco_anual"><br><br>

            <label for="recursos">Recursos:</label><br>
            <textarea id="recursos" name="recursos"></textarea><br><br>

            <label for="status">Status:</label><br>
            <select id="status" name="status" required>
                <option value="ativo">Ativo</option>
                <option value="inativo">Inativo</option>
            </select><br><br>

            <input type="submit" value="Salvar">
        </form>
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
      <script>
       // Abrir o modal
 var modal = document.getElementById("modalForm");
 var btn = document.getElementById("openModal");
 var span = document.getElementsByClassName("close")[0];

 btn.onclick = function() {
     modal.style.display = "block";
 }

 // Fechar o modal quando clicar no 'x'
 span.onclick = function() {
     modal.style.display = "none";
 }

 // Fechar o modal quando clicar fora da janela
 window.onclick = function(event) {
     if (event.target == modal) {
         modal.style.display = "none";
     }
 }

 // Enviar o formulário (aqui você pode fazer uma requisição para o backend em PHP, por exemplo)
 document.getElementById("formPlanoHospedagem").onsubmit = function(event) {
     event.preventDefault(); // Evitar o reload da página

     // Capturar os dados do formulário
     var nome_plano = document.getElementById("nome_plano").value;
     var descricao = document.getElementById("descricao").value;
     var preco_mensal = document.getElementById("preco_mensal").value;
     var preco_anual = document.getElementById("preco_anual").value;
     var recursos = document.getElementById("recursos").value;
     var status = document.getElementById("status").value;

     // Aqui você pode fazer uma requisição AJAX ou fetch para salvar os dados no backend
     console.log({
         nome_plano,
         descricao,
         preco_mensal,
         preco_anual,
         recursos,
         status
     });

     // Fechar o modal após salvar os dados
     modal.style.display = "none";
 }
    </script>
  </body>
</html>
