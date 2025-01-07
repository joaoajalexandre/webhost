<?php
// Inicia a sessão caso ainda não tenha sido iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Destrói todas as variáveis de sessão
session_unset();

// Destroi a sessão
session_destroy();

// Redireciona para a página de login ou página inicial
header("Location: login.php"); // Substitua "login.php" pela página que deseja redirecionar
exit();
?>
