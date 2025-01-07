<?php
include("conexao.php");

if (isset($_POST['btnCadastrar'])) {
	// Captura os dados do formulário
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$bi = $_POST['bi'];
	$nome_empresa = $_POST['nome_empresa'];
	$nif_empresa = $_POST['nif_empresa'];
	$provincia = $_POST['provincia'];
	$municipio = $_POST['municipio'];
	$endereco = $_POST['endereco'];
	$email = $_POST['email'];
	$passe = md5($_POST['passe']); // Senha criptografada

	// Tratamento do arquivo de BI/NIF
	$arquivo_bi_nif = $_FILES['arquivo_bi_nif']['name'];
	$arquivo_temp = $_FILES['arquivo_bi_nif']['tmp_name'];
	$destino = "uploads/" . $arquivo_bi_nif; // Pasta onde o arquivo será salvo
	move_uploaded_file($arquivo_temp, $destino);

	// Inserção no banco de dados
	$sql = "INSERT INTO tb_cliente (nome, sobrenome, bi, nome_empresa, nif_empresa, provincia, municipio, endereco, arquivo_bi_nif, email, passe)
			VALUES ('$nome', '$sobrenome', '$bi', '$nome_empresa', '$nif_empresa', '$provincia', '$municipio', '$endereco', '$arquivo_bi_nif', '$email', '$passe')";

	if ($conexao->query($sql) === TRUE) {
		echo "<script>alert('Cadastro realizado com sucesso!');window.location.href='login.php';</script>";
	} else {
		echo "<script>alert('Erro ao cadastrar! Tente novamente.');window.history.back();</script>";
	}
}
?>
