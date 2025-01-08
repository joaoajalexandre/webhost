<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itecma WebHost</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .card-domain {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            width: 250px;
            margin-bottom: 20px;
        }
        .card-domain:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card-body {
            text-align: center;
            padding: 20px;
        }
        .input-group {
            max-width: 500px;
            margin-bottom: 20px;
            margin: 0 auto;
        }
        .zona-disponivel p {
            font-size: 1.1rem;
            font-weight: 600;
        }
        .zona-disponivel {
            text-align: center;
        }
        .card-deck {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php
include("header.php");
?>
    <section class="topo">
        <div class="container-fluid"></div>
    </section>
    <section class="py-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h2 class="text-center mb-4">Pesquisar Domínio</h2>
                    <form class="input-group shadow-sm" method="post" action="config-dominio.php">
                        <span class="input-group-text bg-primary text-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input class="form-control" type="search" placeholder="Digite o domínio que deseja pesquisar" aria-label="Pesquisar" name="pesquisarDominio">
                        <button class="btn btn-primary" type="submit">Pesquisar</button>
                    </form>
                    <div class="zona-disponivel">
                        <h4 class="text-center mb-3">Zonas Disponíveis</h4>
                        <div class="card-deck">
                            <div class="card card-domain">
                                <div class="card-body">
                                    <h5 class="card-title">.AO</h5>
                                    <p class="card-text">Domínio nacional de Angola</p>
                                </div>
                            </div>
                            <div class="card card-domain">
                                <div class="card-body">
                                    <h5 class="card-title">.EDU.AO</h5>
                                    <p class="card-text">Domínio educacional de Angola</p>
                                </div>
                            </div>
                            <div class="card card-domain">
                                <div class="card-body">
                                    <h5 class="card-title">.ORG.AO</h5>
                                    <p class="card-text">Domínio para organizações de Angola</p>
                                </div>
                            </div>
                            <div class="card card-domain">
                                <div class="card-body">
                                    <h5 class="card-title">.CO.AO</h5>
                                    <p class="card-text">Domínio comercial de Angola</p>
                                </div>
                            </div>
                            <div class="card card-domain">
                                <div class="card-body">
                                    <h5 class="card-title">.IT.AO</h5>
                                    <p class="card-text">Domínio para tecnologia e inovação em Angola</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($erro)): ?>
                <div class="alert alert-danger mt-3"><?= $erro ?></div>
            <?php endif; ?>
        </div>
    </section>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
