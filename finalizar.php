<?php
session_start();
include("conexao.php");

// Inicializar o carrinho
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Função para calcular o total do carrinho
function calcularTotalCarrinho() {
    $total = 0;
    foreach ($_SESSION['carrinho'] as $item) {
        $total += $item['preco'];
    }
    return $total;
}

// Processar adição ao carrinho
if (isset($_POST['adicionar_carrinho'])) {
    $item = [
        "dominio" => $_POST['dominio'],
        "preco" => floatval($_POST['preco']),
        "nameserver1" => $_POST['nameserver1'],
        "nameserver2" => $_POST['nameserver2'],
        "nameserver3" => $_POST['nameserver3']
    ];
    $_SESSION['carrinho'][] = $item;
    $_SESSION['mensagem'] = "Item adicionado ao carrinho!";
}

// Processar checkout
if (isset($_POST['finalizar_compra'])) {
    // Validar dados do cliente
    $dadosCliente = [
        "nome" => $_POST['nome'],
        "sobrenome" => $_POST['sobrenome'],
        "email" => $_POST['email'],
        "bi" => $_POST['bi'],
        "nome_empresa" => $_POST['nome_empresa'],
        "nif_empresa" => $_POST['nif_empresa'],
        "provincia" => $_POST['provincia'],
        "municipio" => $_POST['municipio'],
        "endereco" => $_POST['endereco'],
        "passe" => md5($_POST['passe'])
    ];

    foreach ($dadosCliente as $campo => $valor) {
        if (empty($valor)) {
            $_SESSION['mensagem'] = "Preencha todos os campos obrigatórios!";
            header("Location: index.php");
            exit;
        }
    }

    // Upload de arquivo
    if (isset($_FILES['arquivo_bi_nif'])) {
        $arquivo = $_FILES['arquivo_bi_nif'];
        $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'pdf'];

        if (!in_array($extensao, $extensoes_permitidas)) {
            $_SESSION['mensagem'] = "Formato de arquivo inválido!";
            header("Location: index.php");
            exit;
        }

        $nomeArquivo = uniqid() . '.' . $extensao;
        $caminho = "uploads/" . $nomeArquivo;

        if (!move_uploaded_file($arquivo['tmp_name'], $caminho)) {
            $_SESSION['mensagem'] = "Erro ao salvar o arquivo!";
            header("Location: index.php");
            exit;
        }
        $dadosCliente['arquivo_bi_nif'] = $caminho;
    }

    // Inserir cliente no banco
    $stmt = $conexao->prepare("INSERT INTO tb_cliente(nome, sobrenome, email, bi, nome_empresa, nif_empresa, provincia, municipio, endereco, arquivo_bi_nif, passe) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", ...array_values($dadosCliente));
    if (!$stmt->execute()) {
        $_SESSION['mensagem'] = "Erro ao cadastrar cliente!";
        header("Location: index.php");
        exit;
    }

    $idCliente = $stmt->insert_id;

    // Inserir compras
    foreach ($_SESSION['carrinho'] as $item) {
        $stmt = $conexao->prepare("INSERT INTO tb_dominio_comprado(dominio, nameserver1, nameserver2, nameserver3, id_cliente, bilhete_nif) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $item['dominio'], $item['nameserver1'], $item['nameserver2'], $item['nameserver3'], $idCliente, $dadosCliente['bi']);
        $stmt->execute();
    }

    // Limpar carrinho
    $_SESSION['carrinho'] = [];
    $_SESSION['mensagem'] = "Compra finalizada com sucesso!";
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda de Domínios</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Venda de Domínios</h2>
    <?php if (isset($_SESSION['mensagem'])): ?>
        <div class="alert alert-info"><?= $_SESSION['mensagem'] ?></div>
        <?php unset($_SESSION['mensagem']); ?>
    <?php endif; ?>

    <!-- Formulário de Adição ao Carrinho -->
    <form method="post" class="mt-4">
        <h3>Adicionar Domínio</h3>
        <input type="text" name="dominio" placeholder="Domínio" class="form-control mb-2" required>
        <input type="number" name="preco" placeholder="Preço" class="form-control mb-2" required>
        <input type="text" name="nameserver1" placeholder="NameServer 1" class="form-control mb-2">
        <input type="text" name="nameserver2" placeholder="NameServer 2" class="form-control mb-2">
        <input type="text" name="nameserver3" placeholder="NameServer 3" class="form-control mb-2">
        <button type="submit" name="adicionar_carrinho" class="btn btn-primary">Adicionar ao Carrinho</button>
    </form>

    <!-- Exibir Carrinho -->
    <h3 class="mt-5">Carrinho</h3>
    <?php if (!empty($_SESSION['carrinho'])): ?>
        <?php foreach ($_SESSION['carrinho'] as $item): ?>
            <p>Domínio: <?= $item['dominio'] ?> | Preço: <?= number_format($item['preco'], 2, ',', '.') ?> Kz</p>
        <?php endforeach; ?>
        <h4>Total: <?= number_format(calcularTotalCarrinho(), 2, ',', '.') ?> Kz</h4>
    <?php else: ?>
        <p>Seu carrinho está vazio!</p>
    <?php endif; ?>

    <!-- Formulário de Checkout -->
    <form method="post" enctype="multipart/form-data" class="mt-4">
        <h3>Finalizar Compra</h3>
        <input type="text" name="nome" placeholder="Nome" class="form-control mb-2" required>
        <input type="text" name="sobrenome" placeholder="Sobrenome" class="form-control mb-2" required>
        <input type="email" name="email" placeholder="E-mail" class="form-control mb-2" required>
        <input type="text" name="bi" placeholder="Bilhete de Identidade" class="form-control mb-2" required>
        <input type="text" name="nome_empresa" placeholder="Nome da Empresa" class="form-control mb-2" required>
        <input type="text" name="nif_empresa" placeholder="NIF da Empresa" class="form-control mb-2" required>
        <input type="text" name="provincia" placeholder="Província" class="form-control mb-2" required>
        <input type="text" name="municipio" placeholder="Município" class="form-control mb-2" required>
        <input type="text" name="endereco" placeholder="Endereço" class="form-control mb-2" required>
        <input type="password" name="passe" placeholder="Senha" class="form-control mb-2" required>
        <label>Upload do BI ou NIF:</label>
        <input type="file" name="arquivo_bi_nif" class="form-control mb-2" required>
        <button type="submit" name="finalizar_compra" class="btn btn-success">Finalizar Compra</button>
    </form>
</div>
</body>
</html>
