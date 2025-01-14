<?php
include("./conexao.php");

// Verificar se o ID foi passado via GET
if (isset($_GET['id'])) {
    // Garantir que o ID seja um número inteiro
    $id = intval($_GET['id']);

    // Verificar se o ID é válido
    if ($id > 0) {
        try {
            // Preparar a instrução SQL usando PDO
            $sql = "DELETE FROM servicos_email WHERE id = :id";
            $stmt = $conn->prepare($sql);

            // Vincular o parâmetro
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Executar a instrução SQL
            if ($stmt->execute()) {
                
                echo "Registro excluído com sucesso!";
            } else {
                echo "Erro ao excluir o registro.";
            }

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    } else {
        echo "ID inválido!";
    }
} else {
    echo "ID não fornecido!";
}

// Fechar a conexão com o banco de dados
$conn = null;
?>
