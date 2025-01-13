<?php
session_start();
require 'conexao.php'; // Inclui o arquivo de conexão

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnCadastrar'])) {
    // Obtendo os dados do formulário
    $nome = trim($_POST['nome']);
    $sobrenome = trim($_POST['sobrenome']);
    $email = trim($_POST['email']);
    $bi = trim($_POST['bi']);
    $nome_empresa = trim($_POST['nome_empresa']);
    $nif_empresa = trim($_POST['nif_empresa']);
    $provincia = trim($_POST['provincia']);
    $municipio = trim($_POST['municipio']);
    $endereco = trim($_POST['endereco']);
    $senha = trim($_POST['passe']);
    $arquivo = $_FILES['arquivo_bi_nif'];

    // Validação do arquivo enviado
    $diretorioDestino = 'uploads/'; // Pasta para salvar os arquivos
    if (!is_dir($diretorioDestino)) {
        mkdir($diretorioDestino, 0777, true); // Cria o diretório se não existir
    }

    $nomeArquivo = uniqid() . "_" . basename($arquivo['name']);
    $caminhoCompleto = $diretorioDestino . $nomeArquivo;

    if (move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
        // Arquivo enviado com sucesso, prosseguir com o cadastro
        try {
            // Inicia a transação
            $conexao->begin_transaction();

            // Usando MD5 para criptografar a senha
            $senhaHash = md5($senha); // Usando MD5 para criptografar a senha

            // Inserção na tabela `tb_cliente`
            $sqlCliente = "INSERT INTO tb_cliente (nome, sobrenome, email, bi, nome_empresa, nif_empresa, provincia, municipio, endereco, arquivo_bi_nif, passe, data) 
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
            $stmtCliente = $conexao->prepare($sqlCliente);
            $stmtCliente->bind_param(
                "sssssssssss",
                $nome,
                $sobrenome,
                $email,
                $bi,
                $nome_empresa,
                $nif_empresa,
                $provincia,
                $municipio,
                $endereco,
                $nomeArquivo,
                $senhaHash
            );

            if (!$stmtCliente->execute()) {
                throw new Exception("Erro ao cadastrar cliente: " . $stmtCliente->error);
            }

            // Confirma a transação
            $conexao->commit();
            $_SESSION['sucesso'] = "Cliente cadastrado com sucesso!";
            header("Location: login.php"); // Redireciona para a página de sucesso
            exit;
        } catch (Exception $e) {
            // Reverte a transação em caso de erro
            $conexao->rollback();
            $_SESSION['erro'] = $e->getMessage();
            header("Location: cadastro_cliente.php"); // Redireciona de volta ao formulário
            exit;
        }
    } else {
        $_SESSION['erro'] = "Erro ao enviar o arquivo.";
        header("Location: cadastro_cliente.php");
        exit;
    }
} else {
    $_SESSION['erro'] = "Método de requisição inválido.";
    header("Location: cadastro_cliente.php");
    exit;
}
?>
