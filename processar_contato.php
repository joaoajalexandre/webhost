<?php
session_start();
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados do formulário
    $motivo = $_POST['motivo'];
    $mensagem = $_POST['mensagem'];

    // Verifica se o usuário está logado
    if (isset($_SESSION['logado']['id_cliente'])) {
        // Se o usuário estiver logado, pega o ID do cliente da sessão
        $id_cliente = $_SESSION['logado']['id_cliente'];

        // Consulta o nome e o email do cliente na tabela clientes
        $sql = "SELECT nome, email FROM tb_cliente WHERE id_cliente = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id_cliente);
        $stmt->execute();
        $stmt->bind_result($nome, $email);
        $stmt->fetch();
        $stmt->close();
    } else {
        // Se não estiver logado, usa o email e nome informados no formulário
        $id_cliente = NULL;
        $email = $_POST['email'];
        $nome = $_POST['nome'];
    }

    // Insere os dados na tabela de mensagens
    $cmd = "INSERT INTO tb_mensagens (id_cliente, motivo, nome, email, mensagem) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($cmd);
    
    // Bind dos parâmetros
    $stmt->bind_param("issss", $id_cliente, $motivo, $nome, $email, $mensagem);

    // Verifica se a inserção foi bem-sucedida
    if ($stmt->execute()) {
        echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Erro ao enviar mensagem. Tente novamente.');</script>";
    }

    // Fecha a declaração
    $stmt->close();
}
?>
