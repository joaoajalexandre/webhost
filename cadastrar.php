<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Cliente</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
	<main class="col-lg-6 m-auto">
		<form method="post" action="processar_cadastro.php" enctype="multipart/form-data">
			<h1 class="h3 text-center">Cadastro de Cliente</h1>
			<div class="row p-3 rounded-3 shadow-lg">
				<div class="col-sm-6 mt-3">
					<label>Primeiro Nome</label>
					<input type="text" name="nome" placeholder="Digite o teu primeiro nome" class="form-control" required>
				</div>

				<div class="col-sm-6 mt-3">
					<label>Último Nome</label>
					<input type="text" name="sobrenome" placeholder="Digite o último nome" class="form-control" required>
				</div>

				<div class="col-sm-6 mt-3">
					<label>BI</label>
					<input type="text" name="bi" placeholder="Digite o número do BI" class="form-control" required>
				</div>

				<div class="col-sm-6 mt-3">
					<label>Nome da Empresa</label>
					<input type="text" name="nome_empresa" placeholder="Nome da Empresa" class="form-control" required>
				</div>

				<div class="col-sm-6 mt-3">
					<label>NIF da Empresa</label>
					<input type="text" name="nif_empresa" placeholder="NIF da Empresa" class="form-control" required>
				</div>

				<div class="col-sm-6 mt-3">
					<label>Província</label>
					<input type="text" name="provincia" placeholder="Digite a Província" class="form-control" required>
				</div>

				<div class="col-sm-6 mt-3">
					<label>Município</label>
					<input type="text" name="municipio" placeholder="Digite o Município" class="form-control" required>
				</div>

				<div class="col-sm-12 mt-3">
					<label>Endereço</label>
					<input type="text" name="endereco" placeholder="Digite o Endereço" class="form-control" required>
				</div>

				<div class="col-sm-12 mt-3">
					<label>Arquivo do BI/NIF</label>
					<input type="file" name="arquivo_bi_nif" class="form-control" required>
				</div>

				<div class="col-sm-6 mt-3">
					<label>E-mail</label>
					<input type="email" name="email" placeholder="Digite o teu email" class="form-control" required>
				</div>
				
				<div class="col-sm-6 mt-3">
					<label>Palavra-passe</label>
					<input type="password" name="passe" placeholder="Digite a tua Palavra-passe" class="form-control" required>
				</div>

				<div class="col-sm-12 mt-3">
					<input type="submit" name="btnCadastrar" value="Cadastrar" class="btn btn-primary w-100">
				</div>
			</div>
		</form>
	</main>

</body>
</html>
