<?php
session_start();


?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
                <div class="col-md-8">
                    <h2 class="text-center mb-4">Pesquisar Domínio</h2>
                    <form class="input-group shadow-sm" method="post" action="config-dominio.php">
                        <span class="input-group-text bg-primary text-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input class="form-control" type="search" placeholder="Digite o domínio que deseja pesquisar" aria-label="Pesquisar" name="pesquisarDominio">
                        <button class="btn btn-primary" type="submit">Pesquisar</button>
                    </form>
                    <div class="zona-disponivel">
                        <p>Zonas disponíveis: .AO, .EDU.AO, .ORG.AO, .CO.AO, .IT.AO</p>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
