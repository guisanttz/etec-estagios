<?php

include_once('conexao.php');
session_start();

// Utilizando a biblioteca PHPMailer
require_once('phpmailer/src/PHPMailer.php');
require_once('phpmailer/src/SMTP.php');
require_once('phpmailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// verifica se existe o tipo de usuario na url
if (isset($_GET['tipo'])) {
    // pega o tipo de usuario da url e armazena numa variavel
    $tipo = $_GET['tipo'];
} elseif (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];
} else {
    echo "<script>window.location.href = 'index.php';</script>";
}

// verifica se o botao enviar do formulario foi clicado
if (isset($_POST['enviar'])) {

    // pega o email inserido pra recuperar a senha e armazena na variável
    $emailInserido = $_POST['email'];

    // verifica se a variavel tipo de usuario é diferente de vazia 
    if (!empty($tipo)) {
        
        // faz um switch com base no tipo de usuario
        switch ($tipo) {
            // caso o tipo for aluno, atribui o nome da tabela e o nome do campo correspondente ao nome 
            case 'aluno':
                $tabela = 'usuarios';
                $nome_campo = 'nome';
                break;
            case 'empresa':
                $tabela = 'empresas';
                $nome_campo = 'nome_fantasia';
                break;
            default:
                $tabela = 'administradores';
                $nome_campo = 'nome';
                break;
        }

        // faz uma consulta pegando o id, email e o nome da tabela correespondente, onde o campo email é igual ao email inserido
        $consulta = "SELECT id, email, $nome_campo FROM $tabela WHERE email = '$emailInserido'";
        // executa a consulta no banco de dados
        $executaConsulta = mysqli_query($conexao, $consulta);

        // verifica se houve algum resultado na consulta
        if (mysqli_num_rows($executaConsulta) > 0) {
            // pega o resultado da consulta e armazena eem uma variavel, podendo acessar aos dados como se fosse um array
            $dado = mysqli_fetch_assoc($executaConsulta);
            // armazena os dados da tabela em variáveis
            $id = $dado['id'];
            $email = $dado['email'];
            $nome = $dado[$nome_campo]; 
            // cria um código aleatório de 6 digitos
            $codigo = rand(100000, 999999);
            // cria um token unico com base no id do usuario e no código
            $token = md5($id . $codigo);

            // faz um insert na tabela recupeeracao_senha com os dados do usuario e o token
            $sqlInsert = "INSERT INTO recuperacao_senha (tipo_usuario, id_usuario, codigo, email, nome, data, utilizado, data_utilizado, token)
                          VALUES ('$tipo', '$id', '$codigo', '$email', '$nome', NOW(), 'n', ' ', '$token')";
            $executaSqlInsert = mysqli_query($conexao, $sqlInsert);

            if ($executaSqlInsert) {

                $mail = new PHPMailer(true);

                try {
                    // Configurando o servidor
                    $mail->isSMTP();                    // Uso de SMTP no envio de email
                    $mail->SMTPAuth = true;             // Habilita a autenticação SMTP
                    $mail->Host = 'smtp.gmail.com';     // Servidor SMTP do gmail                         
                    $mail->Port = 587;                  // Porta utilizada
                    $mail->Username = 'etecestagios@gmail.com';
                    $mail->Password = 'icgemunuidbsmixu';
                    // Remetente (Quem está enviando o email)
                    $mail->setFrom('etecestagios@gmail.com', 'ETEC Estágios');
                    // Destinatário (Quem está recebendo o email)
                    $mail->addAddress($email, $nome);
                    // Conteúdo do E-mail
                    $mail->CharSet = 'UTF-8';
                    $mail->isHTML(true);
                    $mail->Subject = 'Recuperação de Senha';
                    /* $conteudoEmail = "
                    <p>
                        Olá, {$nome},
                        Você solicitou a recuperação de sua senha.
                        Para recuperá-la, clique <a href='localhost/etecestagios/alterarSenha.php?token={$token}'>aqui</a>
                    </p>"; */
                    $conteudoEmail = "
                    <p>
                    Olá, {$nome},<br>
                    Você solicitou a recuperação de sua senha.<br>
                    Seu código é: {$codigo}.
                    ";
                    $mail->Body = $conteudoEmail;
                    $mail->send();
                    
                    

                } catch (Exception $e) {
                    $mensagem = "O e-mail não foi enviado.";
                    $redirecionamento = "<meta http-equiv='refresh' content='3;URL=recuperarSenha.php?tipo=$tipo>";
                }

                $mensagem = "<meta http-equiv='refresh' content='0;URL=inserirCodigo.php?token=$token'>";

            } else {
                $mensagem = "Erro ao processar a solicitação. Tente novamente.";
                $redirecionamento = "<meta http-equiv='refresh' content='3;URL=recuperarSenha.php?tipo=$tipo>";
            }
        } else {
            $mensagem = "O e-mail inserido não foi encontrado.";
            $redirecionamento = "<meta http-equiv='refresh' content='3;URL=recuperarSenha.php?tipo=$tipo>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Recuperar Senha</title>
    <link rel="stylesheet" href="assets/css/recuperarSenha.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once('paginas/header/header.php') ?>

    <div class="txt">
        <h1>Recuperar Senha</h1>
    </div>

    <?php
    include_once('paginas/section/recuperarSenha.php');
    include_once('paginas/footer/footer.php');
    ?>
</body>

</html>
<script src="assets/js/recuperarSenha.js"></script>