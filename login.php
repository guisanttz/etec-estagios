<?php

ini_set("display_errors", 0);
include_once('conexao.php');
session_start();

$logado = $_SESSION['rm'];

// verifica se o botao submit recebeu click e se o rm e a senha são diferentes de vazio
if (isset($_POST['submit']) && !empty($_POST['rm']) && !empty($_POST['senha'])) {

    // obtem o rm e a senha inseridos no formulario de login
    $rm = (isset($_POST['rm'])) ? $_POST['rm'] : "";
    $senha = (isset($_POST['senha'])) ? $_POST['senha'] : "";

    // faz um select onde o rm do registro na tabela é igual o rm inserido no formulario
    $sql = "SELECT senha FROM usuarios WHERE rm = '$rm'";
    // executa o select
    $result = mysqli_query($conexao, $sql);

    // se tiver algum resultado, executa o codigo abaixo
    if ($result && mysqli_num_rows($result) > 0) {

        // armazena cada linha do resultado em um array
        $row = mysqli_fetch_assoc($result);
        // obtem a senha criptografada do registro
        $senhaCriptografada = $row['senha'];

        // verifica se a senha inserida no formulario é igual a senha criptografada do registro
        if (password_verify($senha, $senhaCriptografada)) {

            // cria uma sessao com o rm do usuario e sua senha
            $_SESSION['rm'] = $rm;
            $_SESSION['senha'] = $senhaCriptografada;

            // faz um select na tabela usuarios onde o rm é igual o rm inserido e a senha é igual a senha criptografada do registro
            $consultaCompleta = "SELECT * FROM usuarios WHERE rm = '$rm' AND senha = '$senhaCriptografada'";

            // executa o select
            $resultConsultaCompleta = mysqli_query($conexao, $consultaCompleta);

            // verifica se houve linha de resultados            
            if ($resultConsultaCompleta && mysqli_num_rows($resultConsultaCompleta) > 0) {

                // armazena cada linha do resultado em array
                $rowCompleto = mysqli_fetch_assoc($resultConsultaCompleta);
                // cria uma sessao com os dados do usuario
                $_SESSION['nome_usuario'] = $rowCompleto['nome'];
                $tipo = "usuario";
                $_SESSION['tipo'] = $tipo;
            }
            // redireciona pro sistema do aluno
            header("Location: sistema.php");
            exit;
        } else {
            // exibe mensagem de senha incorreta e redireciona pra tela de login
            $mensagem = "<div class='alert alert-danger' role='alert'>Senha incorreta!</div>
            <meta http-equiv=refresh content='3;URL=login.php'>";
        }
    } else {

        // exibe mensagem de RM não encontrado e redireciona pra tela de login
        $mensagem = "<div class='alert alert-danger' role='alert'>RM não encontrado!</div>
        <meta http-equiv=refresh content='3;URL=login.php'>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php
    if (empty($logado)) {
    ?>

        <?php include_once('paginas/header/header.php') ?>

        <div class="txt">
            <h1>Aluno</h1>
        </div>

        <?php include_once('paginas/section/aluno/login.php') ?>
        
    <?php
    } else {
    ?>

        <div class="mensagem-logado">
            <h1>Você já está logado, <br> aguarde ser redirecionado para a tela do sistema</h1>
        </div>

        <style>
            .mensagem-logado {
                text-align: center;
                display: flex;
                justify-content: center;
                align-items: center;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .mensagem-logado h1 {
                font-size: 24px;
                color: var(--ciano);
            }
        </style>

        <meta http-equiv=refresh content='2;URL=sistema.php'>

    <?php
    }

    include_once('paginas/footer/footer.php');

    ?>

</body>

</html>