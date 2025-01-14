<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços de WebSites</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php include("header.php"); ?>

    <!-- Seção Hero com uma imagem de fundo e chamada para ação -->
    <section class="hero bg-primary text-white text-center py-5" style="background-image: url('https://via.placeholder.com/1600x600?text=Criação+de+Websites'); background-size: cover;">
        <div class="container">
            <h1 class="display-4">Criação de Websites Profissionais</h1>
            <p class="lead">Transforme sua presença online com um site moderno e responsivo. Entre em contato agora e
                crie seu site conosco!</p>
            <a href="contactos.php" class="btn btn-light btn-lg">Solicite seu Orçamento</a>
        </div>
    </section>

    <!-- Seção de Serviços -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Nossos Serviços</h2>
            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="https://via.placeholder.com/350x200?text=Site+Institucional" class="card-img-top" alt="Website Institucional">
                        <div class="card-body">
                            <h5 class="card-title">Site Institucional</h5>
                            <p class="card-text">Criamos websites institucionais para empresas que buscam uma presença
                                online sólida e profissional.</p>
                            <a href="contato.php" class="btn btn-primary">Saiba Mais</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="https://via.placeholder.com/350x200?text=Loja+Virtual" class="card-img-top" alt="Loja Virtual">
                        <div class="card-body">
                            <h5 class="card-title">Loja Virtual</h5>
                            <p class="card-text">Desenvolvemos lojas virtuais completas para você vender seus produtos
                                online com segurança e praticidade.</p>
                            <a href="contato.php" class="btn btn-primary">Saiba Mais</a>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="https://via.placeholder.com/350x200?text=Site+Responsivo" class="card-img-top" alt="Site Responsivo">
                        <div class="card-body">
                            <h5 class="card-title">Design Responsivo</h5>
                            <p class="card-text">Garantimos que seu site seja totalmente adaptável a qualquer dispositivo,
                                proporcionando uma experiência perfeita em desktop e mobile.</p>
                            <a href="contato.php" class="btn btn-primary">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Testemunhos -->
<section class="py-5 bg-dark text-white">
    <div class="container">
        <h2 class="text-center mb-4">O que dizem nossos clientes</h2>
        <div id="carouselTestemunhos" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Testemunho 1 -->
                <div class="carousel-item active">
                    <div class="row justify-content-center">
                        <div class="col-md-4 text-center">
                            <img src="https://via.placeholder.com/150?text=João+Silva" class="rounded-circle mb-3" alt="João Silva" width="150">
                            <p class="lead">"A equipe foi incrível! Meu site ficou do jeito que eu sempre sonhei, e o processo foi rápido e fácil."</p>
                            <footer>- João Silva, Empresário</footer>
                        </div>
                    </div>
                </div>
                <!-- Testemunho 2 -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-md-4 text-center">
                            <img src="https://via.placeholder.com/150?text=Maria+Oliveira" class="rounded-circle mb-3" alt="Maria Oliveira" width="150">
                            <p class="lead">"Profissionais altamente qualificados! Meu e-commerce está gerando ótimos resultados, e o suporte é sempre excelente."</p>
                            <footer>- Maria Oliveira, Dona de Loja Online</footer>
                        </div>
                    </div>
                </div>
                <!-- Testemunho 3 (exemplo adicional) -->
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-md-4 text-center">
                            <img src="https://via.placeholder.com/150?text=Carlos+Mendes" class="rounded-circle mb-3" alt="Carlos Mendes" width="150">
                            <p class="lead">"O suporte foi incrível e o site ficou muito mais rápido após as melhorias. Super recomendo!"</p>
                            <footer>- Carlos Mendes, Cliente Satisfeito</footer>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Controles do Carrossel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselTestemunhos" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselTestemunhos" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Seção de Contato -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-4">Entre em Contato Conosco</h2>
            <p class="lead">Se você está pronto para dar o próximo passo e criar seu site ou loja virtual, entre
                em contato conosco agora!</p>
            <a href="contato.php" class="btn btn-primary btn-lg">Entre em Contato</a>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>
