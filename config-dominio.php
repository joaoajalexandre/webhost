<?php 
    session_start();
    include("conexao.php");

    if (isset($_POST['pesquisarDominio'])) {
        $_SESSION['tempDominio'] = $_POST['pesquisarDominio'];
    }

    if (empty($_POST['pesquisarDominio']) AND empty($_SESSION['tempDominio'])) {
        header("Location:index.php");
    }
    
     

    if(isset($_POST['btn_registrar'])){
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_SESSION['tempDominio'])) {

                $nameserver1 = $_POST['nameserver1'];
                $nameserver2 = $_POST['nameserver2'];
                $nameserver3 = $_POST['nameserver3'];
                $descricao = $_POST['pesquisarDominio'];


                if (str_ends_with($_SESSION['tempDominio'], "it.ao")) {
                    if (!isset($_SESSION['carrinho'])) {
                        $_SESSION['carrinho'] = [];
                    }
                    $_SESSION['carrinho'][] = ['dominio' => $_SESSION['tempDominio'], 'preco' => 5000, 'tipo'=>'Dominio', 'descricao'=>$_SESSION['tempDominio'], 'nameserver1' => $nameserver1, 'nameserver2' => $nameserver2, 'nameserver3' => $nameserver3, 'ciclo'=>' 1 ano'];
                    header("Location: carrinho.php");
                }
                elseif (str_ends_with($_SESSION['tempDominio'], ".ao")) {
                    if (!isset($_SESSION['carrinho'])) {
                        $_SESSION['carrinho'] = [];
                    }
                    $_SESSION['carrinho'][] = ['dominio' => $_SESSION['tempDominio'], 'preco' => 25000, 'tipo'=>'Dominio', 'descricao'=>$_SESSION['tempDominio'], 'nameserver1' => $nameserver1, 'nameserver2' => $nameserver2, 'nameserver3' => $nameserver3, 'ciclo'=>' 1 ano'];
                    header("Location: carrinho.php");
                } else {
                    echo "<script>alert('Extensão não disponível. Escolha uma extensão nacional.')</script>";
                }
            }
    }
 ?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itecma WebHost</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>

                <!-- Toggler for mobile view -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu and User Section -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Left Menu -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="/itecma/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Dominios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Hospedagens</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Website</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacto</a>
                        </li>
                    </ul>

                    <!-- Right Section -->
                    <ul class="navbar-nav">
                        <!-- Cart Icon -->
                        <li class="nav-item">
                            <a class="nav-link" href="/itecma/carrinho.php">
                                <i class="bi bi-cart"></i>
                            </a>
                        </li>

                        <!-- User Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://via.placeholder.com/30" alt="Avatar" class="rounded-circle me-2">
                                Alexandre
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <li><a class="dropdown-item" href="#">Configuração</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Terminar Sessão</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container my-5">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
          <li class="breadcrumb-item">
            <a class="link-body-emphasis" href="/www">
            </a>
          </li>
          <li class="breadcrumb-item">
            <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">Library</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Data
          </li>
        </ol>
      </nav>
    </div>


   <!-- Domain Search Section -->
   <section class="py-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="text-center"><?php if(true){ echo "<span style='color: orange'>".$_SESSION['tempDominio']. "</span> está disponivel <br><hr><br>";} ?></h2>
                    <h2 class="text-center m-4">Configuração do dominio <span class="dominio"></span></h2>
                    <h4 class="text-center mt-4">Nameservers</h4>
                    <p>Se deseja utilizar outro nameserver para apontar o seu domínio para um outro provedor, faça a alteração abaixo. Por padrão, os domínios são registados com os nossos nameservers, apontados para a Itecma Webhost:</p>
                    <form class="input-group" method="post" action="">
                        <div class="row"> 
                            <div class="col-4">
                                <label for="inputNs1">Nameserver 1</label>
                                <input type="text" class="form-control" name="nameserver1" value="ns1.itecma.co.ao" />
                            </div>
                            <div class="col-4">
                                <label for="inputNs1">Nameserver 2</label>
                                <input type="text" class="form-control" name="nameserver2" value="ns2.itecma.co.ao" />
                            </div>
                            <div class="col-4">
                                <label for="inputNs1">Nameserver 3</label>
                                <input type="text" class="form-control" name="nameserver3" value="ns3.itecma.co.ao" />
                            </div>
                            <button class="btn btn-primary mt-3" name="btn_registrar">Continuar</button>
                        </div>
                    </form>
                    
                </div>  
            </div>
            <?php 

            ?>
        </div>
    </section>



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</body>
</html>
