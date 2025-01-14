<?php 
session_start();
include("conexao.php");

if (isset($_GET['plano'])) {
    $idPlanoHosp = (int) $_GET['plano'];

    // Inicializa o carrinho se não existir
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    // Verifica se o plano já está no carrinho
    if (isset($_SESSION['carrinho'][$idPlanoHosp])) {
        echo "<script>alert('Esse plano já está no carrinho!');</script>";
    } else {
        // Busca detalhes do plano no banco de dados
        $sqlPlano = "SELECT * FROM planos_hospedagem WHERE id = ?";
        $stmt = $conexao->prepare($sqlPlano);
        $stmt->bind_param("i", $idPlanoHosp);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $plano = $result->fetch_assoc();
            // Adiciona o plano ao carrinho
            $_SESSION['carrinho'][$idPlanoHosp] = [
                'id' => $plano['id'],
                'nome' => $plano['nome_plano'],
                'preco' => $plano['preco_mensal']
            ];
            echo "<script>alert('Plano adicionado ao carrinho com sucesso!');</script>";
        } else {
            echo "<script>alert('Plano não encontrado.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospedagem</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        /* Custom CSS para melhorar os cards */
        .card-custom {
            border-radius: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
            min-height: 500px;
        }

        .card-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header-custom {
            font-size: 1.5rem;
            padding: 20px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-body ul {
            font-size: 1.1rem;
        }

        .pricing-card-title {
            font-size: 2rem;
            font-weight: bold;
        }

        .btn-custom {
            padding: 15px 30px;
            border-radius: 50px;
            font-size: 1.2rem;
        }

        .card-body {
            padding: 40px;
        }
    </style>
</head>
<body>
<?php
include("header.php");
?>

<section class="topo text-center text-white bg-dark py-5">
    <div class="container">
        <h1 class="display-4">Pacotes de Hospedagem</h1>
        <p>Escolha o plano de hospedagem perfeito para o seu site com suporte 24/7 e servidores rápidos.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row text-center">
            
            
            <!-- Pacotes-->
            <?php 
                $planos_hospedagem = "SELECT * FROM planos_hospedagem";
                $resultPlanoBasico = $conexao->query($planos_hospedagem);
                

                while ($fetchPlano = $resultPlanoBasico->fetch_assoc()) {
             ?>
            <div class="col-md-4 mb-5">
                <div class="card card-custom shadow-sm">
                    <div class="card-header bg-success text-white card-header-custom">
                        <?php echo $fetchPlano['nome_plano']; ?>
                    </div>
                    <div class="card-body">
                        <h4 class="pricing-card-title"><?php echo number_format($fetchPlano['preco_mensal'], 2, ',', '.') ; ?> <small class="text-muted">/ mês</small></h4>
                        <h3 class=""><?php echo number_format($fetchPlano['preco_anual'], 2, ',', '.') ; ?> <small class="text-muted">/ Anual</small></h3>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><?php echo $fetchPlano['recursos']; ?></li>
                        </ul>
                        <a href="hospedagem.php?plano=<?php echo $fetchPlano['id']; ?>" class="btn btn-success btn-custom">Escolher Pacote</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
