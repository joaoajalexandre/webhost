<?php 
    session_start();
    include("conexao.php");

    

    if(isset($_POST['btn_registrar'])){
        if (isset($_POST['aceitarTermo'])) {

            
        }
        else{
            echo "<script>alert('Leia e aceite o termo se desejas continuar com o cadasttro do dominio!')</script>";
        }
    }
 ?>
<!DOCTYPE html>
<html lang="en">
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
   <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="text-center mb-4">O seu domínio <span class="dominio"> ?></span> esta disponivel </h2>
                    <form class="input-group" method="post" action="">
                        <div class="row"> 
                            <div class="col-md-4 mt-3">
                                <input type="text" class="form-control" placeholder="<?php echo $_SESSION['carrinho'][$indice]['dominio']; ?>" disabled>
                            </div>
                            <div class="col-md-4 mt-3">
                                <select class="form-control">
                                    <option>1 ano</option>
                                    <option>2 anos</option>
                                </select>
                            </div>
                            <div class="col-md-4 mt-3">
                                <input type="text" class="form-control" placeholder="<?php echo $_SESSION['carrinho'][$indice]['preco'] ?>" disabled>   
                            </div>

                            <div class="col-sm-12 mt-4 text-center">
                                <input type="checkbox" name="aceitarTermo">
                                <span class=""> Li os Termos e aceito na integra as Condições de registo de Domínio .AO na Itecma Webhost.</span>
                            </div>
                            <button class="btn btn-primary mt-3" name="btn_registrar">Registrar Agora</button>
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
