<?php
session_start();

// Remover item do carrinho
if (isset($_GET['remover'])) {
    $indice = $_GET['remover'];
    if (isset($_SESSION['carrinho'][$indice])) {
        unset($_SESSION['carrinho'][$indice]);
        $_SESSION['carrinho'] = array_values($_SESSION['carrinho']); // Reindexa o array
    }
}

// Calcula o total do carrinho
$totalCarrinho = 0;
if (!empty($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $item) {
        $totalCarrinho += $item['preco'];
    }
}

// Redireciona para evitar reenvio de formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Location: carrinho.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - Itecma WebHost</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link active" href="/itecma/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Domínios</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Hospedagens</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Website</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contato</a></li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="/itecma/carrinho.php"><i class="bi bi-cart"></i></a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://via.placeholder.com/30" alt="Avatar" class="rounded-circle me-2">Alexandre
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
        <h1 class="text-center mb-4">Carrinho</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Domínio</th>
                        <th>Preço Unitário</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($_SESSION['carrinho'])): ?>
                        <?php foreach ($_SESSION['carrinho'] as $indice => $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['dominio']) ?></td>
                                <td><?= number_format($item['preco'], 2, ',', '.') ?>Kz</td>
                                <td>
                                    <a href="?remover=<?= $indice ?>" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2" class="text-end"><strong>Total do Carrinho:</strong></td>
                            <td><strong><?= number_format($totalCarrinho, 2, ',', '.') ?> Kz</strong></td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">O carrinho está vazio.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-warning">Continuar Comprando</a>
            <a href="confirmar.php" class="btn btn-primary">Continuar</a>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
