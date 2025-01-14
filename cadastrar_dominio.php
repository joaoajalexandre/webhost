<?php
session_start();
include("conexao.php");

// Variáveis para mensagens
$mensagem = "";
$erro = "";

// Verificar se foi feita uma pesquisa
if (isset($_POST['pesquisarDominio'])) {
    $nomeDominio = trim($_POST['nomeDominio']);
    
    if (!empty($nomeDominio)) {
        // Verificar se o domínio já está cadastrado no banco
        $queryPesquisar = "SELECT * FROM tb_dominio WHERE nome = '$nomeDominio'";
        $resultadoPesquisa = $conexao->query($queryPesquisar);
        
        if ($resultadoPesquisa->num_rows > 0) {
            $dominio = $resultadoPesquisa->fetch_assoc();
            if ($dominio['status'] == 'disponível') {
                $mensagem = "O domínio '$nomeDominio' está disponível para cadastro.";
            } else {
                $erro = "O domínio '$nomeDominio' já está registrado ou reservado.";
            }
        } else {
            $mensagem = "O domínio '$nomeDominio' não existe no banco e pode ser cadastrado.";
        }
    } else {
        $erro = "Por favor, insira um nome de domínio para pesquisar.";
    }
}

// Verificar se foi feito o cadastro de um domínio
if (isset($_POST['cadastrarDominio'])) {
    $nomeDominio = trim($_POST['nomeDominio']);
    $precoDominio = floatval($_POST['precoDominio']);
    
    if (!empty($nomeDominio) && $precoDominio > 0) {
        // Verificar novamente se o domínio já existe
        $queryVerificar = "SELECT * FROM tb_dominio WHERE nome = '$nomeDominio'";
        $resultadoVerificar = $conexao->query($queryVerificar);
        
        if ($resultadoVerificar->fetch_assoc() == 0) {
            // Cadastrar o domínio
            $queryCadastrar = "INSERT INTO tb_dominio (nome, preco, status) VALUES ('$nomeDominio', $precoDominio, 'disponível')";
            if ($conexao->query($queryCadastrar)) {
                $mensagem = "Domínio '$nomeDominio' cadastrado com sucesso!";
            } else {
                $erro = "Erro ao cadastrar o domínio. Tente novamente.";
            }
        } else {
            $erro = "O domínio '$nomeDominio' já existe no banco.";
        }
    } else {
        $erro = "Insira um nome de domínio válido e um preço maior que 0.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar e Cadastrar Domínio</title>
</head>
<body>
    <h1>Pesquisar e Cadastrar Domínio</h1>
    
    <!-- Mensagens -->
    <?php if ($mensagem): ?>
        <p style="color: green;"><?= $mensagem ?></p>
    <?php endif; ?>
    <?php if ($erro): ?>
        <p style="color: red;"><?= $erro ?></p>
    <?php endif; ?>

    <!-- Formulário de Pesquisa -->
    <h2>Pesquisar Domínio</h2>
    <form method="post">
        <label for="nomeDominio">Nome do Domínio:</label>
        <input type="text" id="nomeDominio" name="nomeDominio" placeholder="exemplo.com" required>
        <button type="submit" name="pesquisarDominio">Pesquisar</button>
    </form>

    <!-- Formulário de Cadastro -->
    <h2>Cadastrar Novo Domínio</h2>
    <form method="post">
        <label for="nomeDominio">Nome do Domínio:</label>
        <input type="text" id="nomeDominio" name="nomeDominio" placeholder="exemplo.com" required>
        <label for="precoDominio">Preço (R$):</label>
        <input type="number" id="precoDominio" name="precoDominio" step="0.01" min="0.01" required>
        <button type="submit" name="cadastrarDominio">Cadastrar</button>
    </form>
</body>
</html>
