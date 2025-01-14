<?php
    session_start();
    include 'conexao.php';


    function semLogin(){ ?>
        <form method="post" enctype="multipart/form-data" action="processar_confirmar.php">
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

   
<?php  } ?>
    
   

<!DOCTYPE html>
<html lang="pt">
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
    <?php include("header.php"); ?>

    <div class="container my-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a class="link-body-emphasis" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="link-body-emphasis" href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Carrinho</li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>
    </div>

    <section class="py-3">
        <div class="container">
            <div class="row justify-content-center">
               <div class="col-sm-7">
                    <?php if (isset($_SESSION['logado'])) {
                        
                    }
                    else{
                        semLogin();
                    } ?>
                </div>
                <div class="col-sm-4">
                    <div class="bg-light p-3">
                        <h2>Resumo do Carrinho</h2>
                        <?php $totalPreco = 0; if(isset($_SESSION['carrinho'])){ foreach ($_SESSION['carrinho'] as $key => $value) { ?>
                            <div class="cada-produto mt-2 p-2">
                                <div><span><?php echo(isset($value['dominio'])) ? "Dominio: <br> <span  style='color: orange'>".$value['dominio']."</span>" : "Hospedagem: <span  style='color: orange'>".$value['nome']."</span>"; ;; ?></span></div>
                                <div><span>Periodo: 1 ano</span> | <span>Preço Unitário: <?php echo number_format($value['preco'], 2, ',', '.')."Kz"; ?></span></div>
                            </div>
                        <?php $totalPreco += $value['preco']; }} ?>
                        <hr>
                        <h4><span style='color: orange;'>Total:</span> <?php echo number_format($totalPreco, 2, ',','.')."Kz"; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
