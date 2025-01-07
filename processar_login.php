<?php
include("conexao.php");
session_start();

if (isset($_POST['btnLogin'])) {
    if (empty($_POST['email']) || empty($_POST['passe'])) {
        $_SESSION['erro'] = 'Use o teu e-mail e palavra-passe cadastrado para fazer login!';
        header("Location: login.php");
        exit();
    } else {
        $email = $_POST['email'];
        $passe = md5($_POST['passe']); // Use uma função de hash mais segura como password_hash()
        $cmd = "SELECT * FROM tb_cliente WHERE email = '$email' AND passe = '$passe'";
        $loginExec = $conexao->query($cmd);

        if ($loginExec->num_rows > 0) {
            $logado = $loginExec->fetch_assoc();

            $_SESSION['logado']['id_cliente'] = $logado['id_cliente'];
            $_SESSION['logado']['nome'] = $logado['nome'];
            $_SESSION['logado']['email'] = $logado['email'];

            // Redirecionar para a página inicial ou dashboard
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['erro'] = 'Credenciais inválidas, verifique e tente novamente!';
            header("Location: login.php");
            exit();
        }
    }
}
?>
