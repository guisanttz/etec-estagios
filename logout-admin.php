<?php 

    // starta sessao
    session_start();
    // remove variaveis de sessao
    unset($_SESSION['usuario_admin']);
    unset($_SESSION['nome_admin']);
    // destroi a sessao
    session_destroy();
    // redireciona para a pagina saindo.php
    header("Location: saindo.php");
    exit;

?>