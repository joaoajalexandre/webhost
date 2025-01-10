<?php 
    session_start();
    include("conexao.php");
    if (isset($_POST['btnConfirmar'])) {
        if (false) {
            if(isset($_SESSION['carrinho'])){
                foreach ($_SESSION['carrinho'] as $key => $value) {
                    $dominio = $value['dominio'];
                    $preco = $value['preco'];
                    $nameserver1 = $value['nameserver1'];
                    $nameserver2 = $value['nameserver2'];
                    $nameserver3 = $value['nameserver3'];
                    $idCliente = 1;
                    $bilhete_nif = "22323523LA044";
                    $insertCarrinho = $conexao->query("INSERT INTO tb_dominio_comprado(dominio, nameserver1, nameserver2, nameserver3, id_cliente, bilhete_nif) VALUES('$dominio', '$nameserver1', '$nameserver2', '$nameserver3', $idCliente, '$bilhete_nif' )");
                    if($insertCarrinho === true){
                        echo "Compra finalizada com sucesso!";
                        unset($_SESSION['carrinho']);
                    }
                    else{
                        echo "Erro a finalizar a compra!";
                    }
                }
            } 
            else{
                echo "<script>alert('O carrinho está vazio, adicione serviços no carrinho para continuar a compra!')</script>";
            }
        }
        else{
            if(isset($_SESSION['carrinho'])){
                foreach ($_SESSION['carrinho'] as $key => $value) {
                    $dominio = $value['dominio'];
                    $preco = $value['preco'];
                    $nameserver1 = $value['nameserver1'];
                    $nameserver2 = $value['nameserver2'];
                    $nameserver3 = $value['nameserver3'];
                    $idCliente = 1;
                    $bilhete_nif = $_POST['bilhete_nif'];
                    $insertCarrinho = $conexao->query("INSERT INTO tb_dominio_comprado(dominio, nameserver1, nameserver2, nameserver3, id_cliente, bilhete_nif) VALUES('$dominio', '$nameserver1', '$nameserver2', '$nameserver3', $idCliente, '$bilhete_nif' )");
                    if($insertCarrinho === true){
                        echo "Compra finalizada com sucesso!";
                    }
                    else{
                        echo "Erro a finalizar a compra!";
                    }
                }

                //Cadastrar o usuario no banco de dados
                $nome = $_POST['nome'];
                $sobrenome = $_POST['sobrenome'];
                $email = $_POST['email'];
                $telefone = $_SESSION['telefone'];
                $bi = $_POST['bi'];
                $nome_empresa = $_POST['nome_empresa'];
                $nif_empresa = $_POST['nif_empresa'];
                $provincia = $_POST['provincia'];
                $municipio = $_POST['municipio'];
                $endereco = $_POST['endereco'];
                $passe = md5($_POST['passe']);

                $queryUsuario = "INSERT INTO tb_cliente(nome, sobrenome, email,telefone, bi, nome_empresa, nif_empresa, provincia, municipio, endereco, arquivo_bi_nif, passe) VALUES('$nome', '$sobrenome', '$email','$telefone' '$bi', '$nome_empresa', '$nif_empresa', '$provincia', '$municipio', '$endereco', '$arquivo_bi_nif', '$passe')";
                $cadastrarUsuario = $conexao->query($queryUsuario);
                if($cadastrarUsuario === true){
                    $ultimoId_usuario = $conexao->insert_id;
                    echo "Usuario cadastrados com sucesso!";
                }
                else{
                    echo "Erro ao cadastrar o usuario no banco de dados!";
                }


                //Cadastrar na tabela comprado
                
                $total_produto = count($_SESSION['carrinho']);
                $id_usuario = $ultimoId_usuario;
                $metodo_pagamento = $_POST['metodo_pagamento'];
                unset($_SESSION['carrinho']);

                echo "O ultimo: $id_usuario, total de produto: $total_produto e total da compra: $totalPreco via $metodo_pagamento";



            } 
            else{
                echo "<script>alert('O carrinho está vazio, adicione serviços no carrinho para continuar a compra!')</script>";
            }

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

                    <!--  -->
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

    <!-- Domain Search Section -->
   

   <div class="container my-5">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
          <li class="breadcrumb-item">
            <a class="link-body-emphasis" href="#">
              <svg class="bi" width="16" height="16"><use xlink:href="#house-door-fill"></use></svg>
              <span class="visually-hidden">Home</span>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">Library</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Carrinho
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Checkout
          </li>
        </ol>
      </nav>
    </div>


   <!-- Domain Search Section -->
   <section class="py-3">
        <div class="container">
            <div class="row justify-content-center">
                <?php  ?>
                <div class="col-sm-7">
                    <a href="/itecma/login.php"><button class="btn btn-primary">Já tens uma conta?</button></a>
                    <form method="post">
                        <div class="row">
                            <h3 class="mt-3">Dados do Cliente</h3>
                            <div class="col-sm-6">
                                <label>Primeiro Nome</label>
                                <input type="text" name="nome" placeholder="Primeiro Nome" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>Sobrenome</label>
                                <input type="text" name="sobrenome" placeholder="Ultimo Nome" class="form-control">
                            </div>

                            <div class="col-sm-6 mt-2">
                                <label>Email</label>
                                <input type="text" name="email" placeholder="Digite o teu e-mail" class="form-control">
                            </div>

                            <div class="col-sm-6 mt-2">
                                <label>Telefone</label>
                                <input type="text" name="telefone" placeholder="Digite o teu contacto" class="form-control">
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label>Bilhete de Identidade</label>
                                <input type="text" name="bi" placeholder="Digite o número do bilhete de identidade" class="form-control">
                            </div>

                            <div class="col-sm-12 mt-2">
                                <label>Nome da Empresa</label>
                                <input type="text" name="nome_empresa" placeholder="Digite o nome da empresa (opcional)" class="form-control">
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label>NIF da Empresa</label>
                                <input type="text" name="nif_empresa" placeholder="Digite o NIF da empresa" class="form-control">
                            </div>


                            <div class="col-sm-6 mt-3">
                                <label>Província</label>
                                <select class="form-control" name="provincia">
                                    <option id="">Luanda</option>
                                </select>
                            </div>

                            <div class="col-sm-6 mt-3">
                                <label>Municipo</label>
                                <select class="form-control" name="municipio">
                                    <option id="">Viana</option>
                                    <option id="">Cazenga</option>
                                    <option id="">Cacuaco</option>
                                </select>
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label>Endereço Fisico</label>
                                <input type="text" name="endereco" placeholder="Digite o Endereço fisico" class="form-control">
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label>Fazer Uploads do B.I ou Alvará Cormercial</label>
                                <input type="file" name="arquivo_bi_nif" class="form-control">
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label>Criar senha</label>
                                <input type="password" name="passe" placeholder="Crie uma senha" class="form-control">
                            </div>
                            

                            <h4 class="mt-3">Metodo de Pagamento</h4>

                          <div class="">
                            <div class="form-check">
                              <input id="TransferenciaBancaria" name="metodo_pagamento" value="Transferência Bancaria" type="radio" class="form-check-input" checked required>
                              <label class="form-check-label" for="TransferenciaBancaria">Tranferência Bancaria</label>
                            </div>
                            <div class="form-check">
                              <input id="Express" name="metodo_pagamento" value="Transferência Express" type="radio" class="form-check-input" required>
                              <label class="form-check-label" for="Express">Tranferência Express</label>
                            </div>
                            <div class="form-check">
                              <input id="Referencia" name="metodo_pagamento" value="Pagamento por Referência" type="radio" class="form-check-input" required>
                              <label class="form-check-label" for="Referencia">Pagamento por Referência</label>
                            </div>
                          </div>

                            <div class="mt-3">
                                <button class="btn btn-primary" name="btnConfirmar"> Confirmar Agora</button>
                            </div>
                        </div>
                    </form>
                    <a href="carrinho.php"><button class="btn btn-warning"> Voltar</button></a>
                </div>
                <div class="col-sm-4">
                    <div class="bg-light p-3">
                        <h2>Resumo do Carrinho</h2>
                        <?php $totalPreco = 0; if(isset($_SESSION['carrinho'])){ foreach ($_SESSION['carrinho'] as $key => $value) {?>
                            <div class="cada-produto mt-2 p-2">
                                <div>
                                    <span style="color: orange"><?php echo $value['dominio']; ?></span>
                                </div>
                                <div>
                                    <span>Periodo: 1 ano</span> | <span>Preço Unitário: <?php echo number_format($value['preco'], 2, ',', '.')."Kz"; ?></span>
                                </div>
                            </div>
                        <?php $totalPreco += $value['preco']; }} ?>
                        <hr>
                        <?php echo "<h4><span style='color: orange;'>Total:</span> ". number_format($totalPreco, 2, ',','.')."Kz</h4>"; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</body>
</html>
