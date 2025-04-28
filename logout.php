<?php

session_start();

// verifica se existe o tipo de usuario na url
if (isset($_GET['tipo'])) {

    // armazena o tipo em uma variavel
    $tipo = $_GET['tipo'];

    // se o tipo for usuario, executa o codigo abaixo
    if ($tipo === 'usuario') {
                                                                /* unset($_SESSION['rm']);
                                                                unset($_SESSION['nome_usuario']);
                                                                unset($_SESSION['telefone_usuario']);
                                                                unset($_SESSION['email_usuario']);
                                                                unset($_SESSION['senha']);
                                                                unset($_SESSION['tipo']); */
        // remove todas as variaveis de sessoes
        session_unset();
        // destroi a sessao
        session_destroy();
        // redireciona para a pagina inicial do sistema
        header("Location: index.php");
        exit;
    } elseif ($tipo === 'empresa') {
                                                                /* unset($_SESSION['cnpj']);
                                                                unset($_SESSION['nome_fantasia']);
                                                                unset($_SESSION['email_empresa']);
                                                                unset($_SESSION['senha_empresa']);
                                                                unset($_SESSION['tipo']); */
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit;
    } elseif ($tipo === 'administrador') {
                                                                /* unset($_SESSION['usuario_admin']);
                                                                unset($_SESSION['nome_admin']);
                                                                unset($_SESSION['tipo']); */
        session_unset();
        session_destroy();
        header("Location: loginAdmin.php");
        exit;
    }
}
