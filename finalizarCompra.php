<?php
session_start();
include 'conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['logado'])) {
    $_SESSION['erro'] = 'Você precisa estar logado para concluir a compra!';
    header('Location: login.php');
    exit();
}

// Verifica se há itens no carrinho
if (!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) == 0) {
    $_SESSION['erro'] = 'Carrinho vazio! Adicione itens ao carrinho antes de continuar.';
    header('Location: carrinho.php');  // Redireciona para a página do carrinho
    exit();
}

// Processa o pagamento e cadastra os domínios no banco de dados
if (isset($_POST['btnConfirmarCompra'])) {
    $id_cliente = $_SESSION['logado']['id_cliente'];  // ID do cliente logado
    $metodo_pagamento = $_POST['metodo_pagamento'] ?? '';

    // Inserir dados de cada domínio do carrinho na tabela tb_dominio_comprado
    foreach ($_SESSION['carrinho'] as $key => $value) {
        $dominio = $value['dominio'];
        $preco = $value['preco'];
        $data_vencimento = date('Y-m-d H:i:s', strtotime('+1 year'));  // A data de vencimento é 1 ano a partir da data de compra
        $arquivo_comprovante = ''; // Caso precise de arquivo de comprovante

        // Se necessário, faça o upload do comprovante aqui, como no exemplo anterior
        if (isset($_FILES['arquivo_comprovante']) && $_FILES['arquivo_comprovante']['error'] == 0) {
            $comprovante = 'uploads/' . basename($_FILES['arquivo_comprovante']['name']);
            move_uploaded_file($_FILES['arquivo_comprovante']['tmp_name'], $comprovante);
        }

        // Inserir o domínio comprado na tabela tb_dominio_comprado
        $sqlCadastrarDominio = "INSERT INTO tb_dominio_comprado (id_cliente, dominio, data_compra, data_vencimento, preco, forma_pagamento, arquivo_comprovante)
                                VALUES ('$id_cliente', '$dominio', NOW(), '$data_vencimento', '$preco', '$metodo_pagamento', '$comprovante')";

        if (!mysqli_query($conexao, $sqlCadastrarDominio)) {
            $_SESSION['erro'] = 'Erro ao registrar domínio: ' . mysqli_error($conexao);
            header('Location: carrinho.php');  // Caso ocorra erro, redireciona para o carrinho
            exit();
        }
    }

    // Limpar o carrinho após a compra
    unset($_SESSION['carrinho']);
    $_SESSION['sucesso'] = 'Compra realizada com sucesso!';
    header('Location: painel.php');  // Redireciona para a página de sucesso ou painel
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container my-5">
        <h3>Finalizar Compra</h3>

        <!-- Exibe mensagens de erro ou sucesso -->
        <?php if (isset($_SESSION['erro'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['erro']; unset($_SESSION['erro']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['sucesso'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['sucesso']; unset($_SESSION['sucesso']); ?>
            </div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            <h4>Dados do Carrinho</h4>
            <?php $totalPreco = 0; ?>
            <ul class="list-group mb-4">
                <?php foreach ($_SESSION['carrinho'] as $key => $value): ?>
                    <li class="list-group-item">
                        <strong><?php echo $value['dominio']; ?></strong> - <?php echo number_format($value['preco'], 2, ',', '.'); ?> Kz
                    </li>
                    <?php $totalPreco += $value['preco']; ?>
                <?php endforeach; ?>
            </ul>

            <h4>Método de Pagamento</h4>
            <div class="form-check">
                <input type="radio" id="TransferenciaBancaria" name="metodo_pagamento" value="Transferência Bancária" class="form-check-input" required>
                <label class="form-check-label" for="TransferenciaBancaria">Transferência Bancária</label>
            </div>
            <div class="form-check">
                <input type="radio" id="Express" name="metodo_pagamento" value="Transferência Express" class="form-check-input" required>
                <label class="form-check-label" for="Express">Transferência Express</label>
            </div>
            <div class="form-check">
                <input type="radio" id="Referencia" name="metodo_pagamento" value="Pagamento por Referência" class="form-check-input" required>
                <label class="form-check-label" for="Referencia">Pagamento por Referência</label>
            </div>

            <div class="mb-3 mt-3">
                <label for="arquivo_comprovante" class="form-label">Upload do Comprovante de Pagamento (opcional)</label>
                <input type="file" class="form-control" id="arquivo_comprovante" name="arquivo_comprovante">
            </div>

            <div>
                <button type="submit" class="btn btn-primary" name="btnConfirmarCompra">Confirmar Compra</button>
            </div>
        </form>

        <h4 class="mt-3">Total: <?php echo number_format($totalPreco, 2, ',', '.'); ?> Kz</h4>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
