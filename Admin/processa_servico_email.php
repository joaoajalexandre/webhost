<?php
include("conexao.php");
// Capturando os dados enviados via POST
$nome_servico = $_POST['nome_servico'];
$descricao = $_POST['descricao'];
$limite_contas_email = $_POST['limite_contas_email'] ? $_POST['limite_contas_email'] : NULL;
$preco_mensal = $_POST['preco_mensal'];
$preco_anual = $_POST['preco_anual'] ? $_POST['preco_anual'] : NULL;
$status = $_POST['status'];

// SQL para inserir os dados na tabela `servicos_email`
$sql = "INSERT INTO servicos_email (nome_servico, descricao, limite_contas_email, preco_mensal, preco_anual, status)
        VALUES ('$nome_servico', '$descricao', $limite_contas_email, '$preco_mensal', '$preco_anual', '$status')";

// Executando a query e verificando se deu certo
if ($conn->query($sql) === TRUE) {
    echo "Serviço de email inserido com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fechando a conexão
$conn->close();
?>
