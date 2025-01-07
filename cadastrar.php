<?php 
	include("conexao.php");
	if(isset($_POST['btnLogin'])){
		if (empty($_POST['email']) OR empty($_POST['passe'])) {
			echo "<script>alert('Use o teu e-mail e palavra-passe cadastrado para fazer login!')</script>";
		}
		else{
			$email = $_POST['email'];
			$passe = md5($_POST['passe']);
			$cmd = "SELECT * FROM tb_cliente WHERE email = '$email' AND passe = '$passe' ";
			$loginExec = $conexao->query($cmd);
			if ($loginExec->num_rows > 0) {

				$logado = $loginExec->fetch_assoc();

				if (!isset($_SESSION['logado'])) {
					session_start();
				}

				$_SESSION['logado']['id_usuario'] = $logado['id_usuario'];
				$_SESSION['logado']['nome'] = $logado['nome'];
				$_SESSION['logado']['email'] = $logado['email'];

			}
			else{
				echo "<script>alert('Credenciais invalida, verifica e tente novamente!')</script>";
			}
		}

	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pagina de Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">
    	body main.login{

    	}
    </style>
</head>
<body class="login d-flex align-items-center justify-content-center vh-100">
	<main class="col-lg-4 m-auto">
		<form method="post" class="">
			<h1 class="h3 text-center">Sistema de Cadastro</h1>
			<div class="row p-3 rounded-3 shadow-lg">
				<div class="col-sm-6 mt-3">
					<label>Primeiro Nome</label>
					<input type="email" name="email" placeholder="Digite o teu primeiro nome" class="form-control">
				</div>

				<div class="col-sm-6 mt-3">
					<label>Ultimo Nome</label>
					<input type="email" name="email" placeholder="Digite o ultimo nome" class="form-control">
				</div>

				<div class="col-sm-12 mt-3">
					<label>Telefone</label>
					<input type="text" name="telefone" placeholder="Digite o teu contacto" class="form-control">
				</div>

				<div class="col-sm-6 mt-3">
					<label>E-mail</label>
					<input type="email" name="email" placeholder="Digite o teu email" class="form-control">
				</div>
				<div class="col-sm-6 mt-3">
					<label>Palavra-passe</label>
					<input type="password" name="passe" placeholder="Digite a tua Palavra-passe" class="form-control">
				</div>
				<div class="col-sm-12 mt-3">
					<input type="submit" name="btnLogin" value="Entrar" class="btn btn-primary w-100">
				</div>
				<p class="my-2 text-center">Esqueceu a palavra-passe <a href="recuperar.php">Recuperar</a></p>
			</div>
				<p class="my-2 text-center">Não tens uma conta? <a href="cadstrar.php">Criar Agora</a></p>
		</form>
	</main>

</body>
</html>