<?php


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
        <h1>Contactos</h1>
    </section>
    <section class="py-3">
        <div class="container">
            <div class="row justify-content-center">
            <section class="py-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center mb-4">Entre em Contato</h3>
                <form action="processar_contato.php" method="POST">
                    <!-- Campo de Seleção de Motivo -->
                    <div class="mb-3">
                        <label for="motivo" class="form-label">Motivo do Contato</label>
                        <select class="form-select" id="motivo" name="motivo" required>
                            <option value="">Selecione um motivo</option>
                            <option value="suporte">Suporte Técnico</option>
                            <option value="vendas">Informações de Vendas</option>
                            <option value="feedback">Feedback</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                    
                    <!-- Campo de Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Seu Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@dominio.com" required>
                    </div>
                    
                    <!-- Campo de Mensagem -->
                    <div class="mb-3">
                        <label for="mensagem" class="form-label">Sua Mensagem</label>
                        <textarea class="form-control" id="mensagem" name="mensagem" rows="5" placeholder="Escreva aqui sua mensagem" required></textarea>
                    </div>
                    
                    <!-- Botão de Envio -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
                    </div>
                </form>
            </div>
        </div>
        <?php if (isset($erro)): ?>
            <div class="alert alert-danger mt-3"><?= $erro ?></div>
        <?php endif; ?>
    </div>
</section>

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
