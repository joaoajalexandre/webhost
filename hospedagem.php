<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospedagem</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        /* Custom CSS para melhorar os cards */
        .card-custom {
            border-radius: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
            min-height: 500px;
        }

        .card-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header-custom {
            font-size: 1.5rem;
            padding: 20px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-body ul {
            font-size: 1.1rem;
        }

        .pricing-card-title {
            font-size: 2rem;
            font-weight: bold;
        }

        .btn-custom {
            padding: 15px 30px;
            border-radius: 50px;
            font-size: 1.2rem;
        }

        .card-body {
            padding: 40px;
        }
    </style>
</head>
<body>
<?php
include("header.php");
?>

<section class="topo text-center text-white bg-dark py-5">
    <div class="container">
        <h1 class="display-4">Pacotes de Hospedagem</h1>
        <p>Escolha o plano de hospedagem perfeito para o seu site com suporte 24/7 e servidores rápidos.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row text-center">
            <!-- Pacote Básico -->
            <div class="col-md-4 mb-5">
                <div class="card card-custom shadow-sm">
                    <div class="card-header bg-primary text-white card-header-custom">
                        Pacote Básico
                    </div>
                    <div class="card-body">
                        <h2 class="pricing-card-title">5.000 Kz <small class="text-muted">/ mês</small></h2>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>1 Site</li>
                            <li>10 GB de Armazenamento</li>
                            <li>Suporte 24/7</li>
                            <li>1 Banco de Dados</li>
                        </ul>
                        <a href="checkout.php?plano=basico" class="btn btn-primary btn-custom">Escolher Pacote</a>
                    </div>
                </div>
            </div>
            
            <!-- Pacote Intermediário -->
            <div class="col-md-4 mb-5">
                <div class="card card-custom shadow-sm">
                    <div class="card-header bg-success text-white card-header-custom">
                        Pacote Intermediário
                    </div>
                    <div class="card-body">
                        <h2 class="pricing-card-title">10.000 Kz <small class="text-muted">/ mês</small></h2>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>5 Sites</li>
                            <li>50 GB de Armazenamento</li>
                            <li>Suporte 24/7</li>
                            <li>5 Bancos de Dados</li>
                        </ul>
                        <a href="checkout.php?plano=intermediario" class="btn btn-success btn-custom">Escolher Pacote</a>
                    </div>
                </div>
            </div>
            
            <!-- Pacote Avançado -->
            <div class="col-md-4 mb-5">
                <div class="card card-custom shadow-sm">
                    <div class="card-header bg-danger text-white card-header-custom">
                        Pacote Avançado
                    </div>
                    <div class="card-body">
                        <h2 class="pricing-card-title">20.000 Kz <small class="text-muted">/ mês</small></h2>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Sites Ilimitados</li>
                            <li>100 GB de Armazenamento</li>
                            <li>Suporte 24/7</li>
                            <li>Bancos de Dados Ilimitados</li>
                        </ul>
                        <a href="checkout.php?plano=avancado" class="btn btn-danger btn-custom">Escolher Pacote</a>
                    </div>
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
