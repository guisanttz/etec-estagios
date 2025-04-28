<?php
date_default_timezone_set('America/Sao_Paulo');

// Utilizando a biblioteca PHPMailer
require_once('phpmailer/src/PHPMailer.php');
require_once('phpmailer/src/SMTP.php');
require_once('phpmailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $assunto = $_POST['assunto'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];
    $data = date('d/m/Y H:i:s');

    $mail = new PHPMailer();
    // Configurando o servidor
    $mail->isSMTP();                    // Uso de SMTP no envio de email
    $mail->SMTPAuth = true;             // Habilita a autenticação SMTP
    $mail->Host = 'smtp.gmail.com';     // Servidor SMTP do gmail
    $mail->Port = 587;                  // Porta utilizada
    $mail->Username = 'etecestagios@gmail.com';
    $mail->Password = 'icgemunuidbsmixu';
    // Remetente (Quem está enviando o email)
    $mail->setFrom('etecestagios@gmail.com', $nome);
    // Destinatário (Quem está recebendo o email)
    $mail->addAddress('etecestagios@gmail.com');
    // Conteúdo do E-mail
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);
    $mail->Subject = "Contato";
    $conteudoEmail = "Nome: {$nome}<br>
                      Email: {$email}<br>
                      Assunto: {$assunto}<br>
                      Mensagem: {$mensagem}<br>
                      Data/Hora: {$data}
        ";
    $mail->Body = $conteudoEmail;
    if ($mail->send()) {
        $mensagem = "E-mail enviado com sucesso";
        $redirecionamento = "<meta http-equiv=refresh content='3;URL=contato.php'>";
    } else {
        $mensagem = "E-mail não enviado.";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Contato</title>
    <link rel="stylesheet" href="assets/css/contato.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>
    <?php include_once('paginas/header/header.php') ?>
    <div class="txt">
        <h1>Contato</h1>
    </div>
    <?php
    include_once('paginas/section/contato.php');
    include_once('paginas/footer/footer.php');
    ?>

</body>

</html>