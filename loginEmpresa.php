<?php

ini_set("display_errors", 0);
include_once('conexao.php');
session_start();

// verifica se o botao submit foi clicado e se o email e senha são diferentes de vazio
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {

    // armazena os dados inseridos no formulario em variáveis
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // faz um select pra senha da tabela empresas onde o email é igual o email inserido no formulario
    $sql = "SELECT senha FROM empresas WHERE email = '$email'";
    // executa o select
    $result = mysqli_query($conexao, $sql);

    // se houver resultados, executa o codigo abaixo
    if ($result && mysqli_num_rows($result) > 0) {

        // armazena cada linha do resultado em um array
        $row = mysqli_fetch_assoc($result);

        // pega a senha criptografada da primeira linha do resultado e armazena em uma variável
        $senhaCriptografada = $row['senha'];

        // verifica se a senha inserida no formulario é igual a senha criptografada
        if (password_verify($senha, $senhaCriptografada)) {

            // cria uma sessão com o email e a senha da empresa
            $_SESSION['email_empresa'] = $email;
            $_SESSION['senha_empresa'] = $senhaCriptografada;

            // faz um select completo onde o email é igual o email inserido no formulario e a senha é igual a senha criptografada
            $consultaCompleta = "SELECT * FROM empresas WHERE email = '$email' AND senha = '$senhaCriptografada'";
            // executa o select completo
            $resultConsultaCompleta = mysqli_query($conexao, $consultaCompleta);

            // se houver resultados, executa o codigo abaixo
            if ($resultConsultaCompleta && mysqli_num_rows($resultConsultaCompleta) > 0) {

                //  armazena cada linha do resultado em um objeto
                $rowCompleto = mysqli_fetch_assoc($resultConsultaCompleta);
                // cria mais sessão com o id, cnpj e o nome fantasia da empresa
                $_SESSION['id_empresa'] = $rowCompleto['id'];
                $_SESSION['cnpj'] = $rowCompleto['cnpj'];
                $_SESSION['nome_fantasia'] = $rowCompleto['nome_fantasia'];

                $tipo = "empresa";
                $_SESSION['tipo'] = $tipo;
            }

            // redireciona pra tela de sistema da empresa
            header("Location: sistemaEmpresa.php");
            exit;
        } else {

            // exibe mensagem de senha incorreta e redireciona o usuario pra tela de login da empresa
            $mensagem = "<div class='alert alert-danger' role='alert'>Senha incorreta!</div>
            <meta http-equiv=refresh content='3;URL=loginEmpresa.php'>";
        }
    } else {

        // exibe mensagem "empresa nao encontrada" e redireciona o usuario pra tela de login da empresa
        $mensagem = "<div class='alert alert-danger' role='alert'>Empresa não encontrada!</div>
        <meta http-equiv=refresh content='3;URL=loginEmpresa.php'>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Login Empresa</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>
    <?php
    if (empty($logado)) {
    ?>

        <?php include_once('paginas/header/header.php') ?>

        <div class="txt">
            <h1>Empresa</h1>
        </div>

        <?php

        include_once('paginas/section/empresa/login.php');
        include_once('paginas/footer/footer.php');

        ?>
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

        <meta http-equiv=refresh content='2;URL=sistemaEmpresa.php'>
    <?php } ?>

</body>

</html>