<?php
session_start();


?>
<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - Sistema de Cadastro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="login d-flex align-items-center justify-content-center vh-100">
	<main class="col-lg-3 m-auto">
		<!-- Define o action para processar_login.php -->
		<form method="post" action="processar_login.php" class="">
			<h1 class="h3 text-center">Sistema de Login</h1>
			<div class="row p-3 rounded-3 shadow-lg">
				
				<!-- Exibe a mensagem de erro, se houver -->
				<?php if (isset($_SESSION['erro'])): ?>
					<div class="col-sm-12 mt-3">
						<div class="alert alert-danger text-center">
							<?= $_SESSION['erro']; ?>
						</div>
					</div>
					<?php unset($_SESSION['erro']); // Limpa a mensagem de erro após exibir  ?>
				<?php endif; ?>

				<div class="col-sm-12 mt-3">
					<label for="email">E-mail</label>
					<input type="email" id="email" name="email" placeholder="Digite o teu email" class="form-control" required>
				</div>
				<div class="col-sm-12 mt-3">
					<label for="passe">Palavra-passe</label>
					<input type="password" id="passe" name="passe" placeholder="Digite a tua palavra-passe" class="form-control" required>
				</div>
				<div class="col-sm-12 mt-3">
					<input type="submit" name="btnLogin" value="Entrar" class="btn btn-primary w-100">
				</div>
				<p class="my-2 text-center">Esqueceu a palavra-passe? <a href="recuperar.php">Recuperar</a></p>
			</div>
			<p class="my-2 text-center">Não tens uma conta? <a href="cadastrar.php">Criar Agora</a></p>
		</form>
	</main>
</body>
</html>
