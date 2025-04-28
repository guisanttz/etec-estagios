<?php

include_once('conexao.php');
session_start();

// verifica se o botao submit do formulario foi clicado
if (isset($_POST['submit'])) {

    // pega os dados inseridos no formulario de login
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // faz um select na tabela administradores em que o usuario é igual o usuario inserido no formulario
    $sql = "SELECT * FROM administradores 
            WHERE usuario = '$usuario'";

    // executa o select
    $result = $conexao->query($sql);

    // se tiver resultado, executa o codigo abaixo
    if ($result && $result->num_rows > 0) {

        // armazena cada linha do resultado em um objeto
        $row = $result->fetch_assoc();
        // armazena a senha criptografada em uma variavel
        $senhaCriptografada = $row['senha'];

        // verifica se a senha inserida no formulario é igual a senha criptografada no banco de dados
        if (password_verify($senha, $senhaCriptografada)) {

            // inicia uma sessão com o usuario e o nome do admin
            $_SESSION['usuario_admin'] = $usuario;
            $_SESSION['nome_admin'] = $row['nome'];
            $tipo = "administrador";
            $_SESSION['tipo'] = $tipo;

            // redireciona para o painel de usuarios se a senha tiver correta
            header("Location: painel-usuarios.php");
            exit;
        } else {
            // exibe uma mensagem de erro e redireciona para a tela de login
            $mensagem = "<div class='alert alert-success' role='alert'>Usuário e/ou senha incorretos!</div>";
            $redirecionamento = "<meta http-equiv=refresh content='3;URL=loginAdmin.php'>";
        }
    } else {
        // exibe uma mensagem de erro e redireciona para a tela de login
        $mensagem = "<div class='alert alert-success' role='alert'>Usuário e/ou senha incorretos!</div>";
        $redirecionamento = "<meta http-equiv=refresh content='3;URL=loginAdmin.php'>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Login Administrador</title>
    <link rel="stylesheet" href="assets/css/admin/loginAdmin.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>
    <?php
    
    include_once('paginas/header/admin.php');
    include_once('paginas/section/admin/login.php');
    include_once('paginas/footer/footer.php');
    
    ?>

</body>

</html>