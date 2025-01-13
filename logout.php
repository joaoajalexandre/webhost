<?php
session_start(); // Inicia a sessão

// Verifica se existe uma sessão ativa, e se sim, destrói a sessão
if (isset($_SESSION['logado'])) {
    // Remove todas as variáveis da sessão
    session_unset();
    
    // Destrói a sessão
    session_destroy();
    
    // Redireciona para a página de login
    header("Location: login.php");
    exit;
} else {
    // Se não houver uma sessão ativa, redireciona diretamente para o login
    header("Location: login.php");
    exit;
}
?>
