<?php
session_start();


 
// Remover item do carrinho
if (isset($_GET['remover'])) {
    $indice = $_GET['remover'];
    if (isset($_SESSION['carrinho'][$indice])) {
        unset($_SESSION['carrinho'][$indice]);
        $_SESSION['carrinho'] = array_values($_SESSION['carrinho']); 
    }
}

if (isset($_POST[''])) {
    // code...
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
    <?php
        include("header.php");
    ?>

<form method="post"> 
    <div class="container my-5">
        <h1 class="text-center mb-4">Carrinho</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Serviços</th>
                        <th>Preço / Ciclo</th>
                    </tr>
                </thead>
                <tbody>
        <?php if (!empty($_SESSION['carrinho'])): ?>
        <?php foreach ($_SESSION['carrinho'] as $indice => $item): 
            if (!isset($item['nome']) || empty($item['nome'])) {
                if (isset($item['dominio']) && !empty($item['dominio'])) {
                    $item['nome'] = $item['dominio'];
                }
            }
        ?>
            <tr data-indice="<?= $indice ?>">
                <td><?= htmlspecialchars($item['nome']) ?></td>
                <td>
                    <div class="col-4">
                    <select name="<?php echo $item['preco']; ?>" class="ciclo-select form-select" data-preco-base="<?= $item['preco'] ?>" data-indice="<?= $indice ?>">
                        <option value="1" selected>1 Mês</option>
                        <option value="3">3 Meses</option>
                        <option value="6">6 Meses</option>
                        <option value="12">1 Ano</option>
                        <option value="24">2 anos</option>
                    </select>
                    <span class="preco-item">
                        <?= number_format($item['preco'], 2, ',', '.') ?> Kz
                    </span>
                </div>
                </td>
                <td>
                    <a href="?remover=<?= $indice ?>" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="2" class="text-end"><strong>Total do Carrinho:</strong></td>
            <td><strong id="total-carrinho"><?= number_format($totalCarrinho, 2, ',', '.') ?> Kz</strong></td>
        </tr>
    <?php else: ?>
        <tr>
            <td colspan="3" class="text-center">O carrinho está vazio.</td>
        </tr>
    <?php endif; ?>
    <button type="submit">Continuar</button>
</form>
</tbody>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cicloSelects = document.querySelectorAll('.ciclo-select');
        const totalCarrinhoElement = document.getElementById('total-carrinho');

        function atualizarPrecos() {
            let totalCarrinho = 0;

            cicloSelects.forEach(select => {
                const precoBase = parseFloat(select.dataset.precoBase);
                const ciclo = parseInt(select.value);
                const precoAtualizado = precoBase * ciclo;

                // Atualiza o preço do item
                const precoItemElement = select.parentElement.querySelector('.preco-item');
                precoItemElement.textContent = `${precoAtualizado.toFixed(2).replace('.', ',')} Kz`;

                // Soma ao total do carrinho
                totalCarrinho += precoAtualizado;
            });

            // Atualiza o total do carrinho
            totalCarrinhoElement.textContent = `${totalCarrinho.toFixed(2).replace('.', ',')} Kz`;
        }

        // Adiciona o evento de mudança nos selects
        cicloSelects.forEach(select => {
            select.addEventListener('change', atualizarPrecos);
        });

        // Inicializa os preços
        atualizarPrecos();
    });
</script>

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
