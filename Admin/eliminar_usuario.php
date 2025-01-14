<?php
include("./conexao.php");


if (isset($_GET['id'])) {

    $id = intval($_GET['id']);

 
    if ($id > 0) {
        try {
     
            $sql = "DELETE FROM usuario WHERE id = :id";
            $stmt = $conn->prepare($sql);

  
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

 
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
