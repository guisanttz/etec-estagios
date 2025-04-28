<?php 

// starta sessao
session_start();
// remove variaveis de sessao
unset($_SESSION['rm']);
unset($_SESSION['nome_usuario']);
unset($_SESSION['telefone_usuario']);
unset($_SESSION['email_usuario']);
unset($_SESSION['senha']);
// destroi a sessao
session_destroy();
// redireciona pra tela de inicio
header("Location: index.php");
exit;

?>