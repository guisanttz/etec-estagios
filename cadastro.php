<?php

ini_set("display_errors", 0);
include_once("conexao.php");
session_start();

$logado = $_SESSION['rm'];

$result = 0;

// Se o botão submit do formulário for clicado, executa o código

if (isset($_POST['submit'])) {

    // obtendo dados inseridos no formulário
    $nome = $_POST['nome'];
    $rm = $_POST['rm'];
    $curso = $_POST['curso'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // criptografando a senha
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    // verificando se o RM já existe no banco de dados
    $checkRmQuery = "SELECT * FROM usuarios WHERE rm = '$rm'";
    // executando a verificação da existência do RM
    $checkRmResult = mysqli_query($conexao, $checkRmQuery);

    $checkEmail = "SELECT email FROM usuarios WHERE email = '$email'
    UNION
    SELECT email FROM administradores WHERE email = '$email'
    UNION
    SELECT email FROM empresas WHERE email = '$email'";
    $checkEmailResult = mysqli_query($conexao, $checkEmail);

    // se o RM já existe, executa o código abaixo
    if (mysqli_num_rows($checkRmResult) > 0) {
        // exibe uma mensagem de erro
        $mensagem = "<center><div class='alert alert-danger' role='alert'>Erro: RM já cadastrado!</div></center>";
        // redireciona o usuário pra tela de cadastro
        $redirecionamento = "<meta http-equiv=refresh content='3;URL=cadastro.php'>";
        // se o RM não existir no banco, significa que ainda não tem cadastro
    } elseif (mysqli_num_rows($checkEmailResult) > 0) {
        $mensagem = "<center><div class='alert alert-danger' role='alert'>Erro: E-mail já cadastrado!</div></center>";
        // redireciona o usuário pra tela de cadastro
        $redirecionamento = "<meta http-equiv=refresh content='3;URL=cadastro.php'>";
    } else {
        // faz o insert pra tabela usuários com os campos inseridos no formulário
        $sql = "INSERT INTO usuarios(nome,rm,email,curso,senha)
                            VALUES ('$nome','$rm','$email','$curso','$senhaCriptografada')";
        // executa o insert na tabela
        $result = mysqli_query($conexao, $sql);
    }

    // se der certo o cadastro, executa o código abaixo
    if ($result) {
        // exibe uma mensagem de sucesso
        $mensagem = "<center><div class='alert alert-success' role='alert'>Cadastro realizado com sucesso!</div></center>";
        // redireciona o usuário pra tela de login
        $redirecionamento = "<meta http-equiv=refresh content='2;URL=login.php'>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Cadastro</title>
    <link rel="stylesheet" href="assets/css/cadastro.css">
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

    <?php include_once('paginas/section/aluno/cadastro.php');
    } else {
    ?>

        <div class="mensagem-logado">
            <h1>Você já está logado, <br> aguarde ser redirecionado para a tela inicial</h1>
        </div>

        <meta http-equiv=refresh content='2;URL=index.php'>

    <?php
    }

    include_once('paginas/footer/footer.php');

    ?>

</body>

</html>

<script src="assets/js/cadastro.js"></script>