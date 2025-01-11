<?php
include("./conexao.php");

// Capturando os dados enviados via POST
$nome_plano = $_POST['nome_plano'];
$descricao = $_POST['descricao'];
$preco_mensal = $_POST['preco_mensal'];
$preco_anual = $_POST['preco_anual'];
$recursos = $_POST['recursos'];
$status = $_POST['status'];

// SQL para inserir os dados na tabela
$sql = "INSERT INTO planos_hospedagem (nome_plano, descricao, preco_mensal, preco_anual, recursos, status)
        VALUES ('$nome_plano', '$descricao', '$preco_mensal', '$preco_anual', '$recursos', '$status')";

// Executando a query e verificando se deu certo
if ($conn->query($sql) === TRUE) {
    echo "Plano inserido com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fechando a conexão
$conn->close();
?>
