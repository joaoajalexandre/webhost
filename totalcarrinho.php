<?php 
	session_start();

	$totalCarrinho = count($_SESSION['carrinho']);
	echo "Total de produto é $totalCarrinho produtos";

 ?>