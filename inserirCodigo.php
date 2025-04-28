<?php

include_once("conexao.php");
session_start();

if (isset($_GET['token'])) {
    $tokenGet = $_GET['token'];

    if (isset($_POST['verificar'])) {
        $codigo = $_POST['codigo'];
        $consulta = "SELECT codigo, utilizado, token FROM recuperacao_senha WHERE token = '$tokenGet'";
        $executaConsulta = mysqli_query($conexao, $consulta);
        $dado = mysqli_fetch_assoc($executaConsulta);

        if ($dado) {

            $codigoTabela = $dado['codigo'];
            $utilizado = $dado['utilizado'];
            $tokenTabela = $dado['token'];

            if ($utilizado === "s") {
                $mensagem = "<p>O código inserido já foi utilizado</p>";
                $redirecionamento = "<meta http-equiv='refresh' content='2;URL=inserirCodigo.php?token=$tokenGet'>";
            }
            if ($codigo != $codigoTabela) {
                $mensagem = "<p>O código inserido está incorreto</p>";
                $redirecionamento = "<meta http-equiv='refresh' content='2;URL=inserirCodigo.php?token=$tokenGet'>";
            }

            if ($tokenGet !== $tokenTabela) {
                $mensagem = "<p>Seu token é inválido</p>";
                $redirecionamento = "<meta http-equiv='refresh' content='2;URL=inserirCodigo.php?token=$tokenGet'>";
            }

            // Adiciona verificação do código
            if ($utilizado === "n" && $tokenGet === $tokenTabela && $codigo === $codigoTabela) {
                header("Location: alterarSenha.php?token=$tokenGet");
                exit;
            } else {
                $mensagem = "<p>Ocorreu um erro inesperado</p>";
                $redirecionamento = "<meta http-equiv='refresh' content='2;URL=inserirCodigo.php?token=$tokenGet'>";
            }
        } else {
            $mensagem = "<p>Token inválido ou expirado</p>";
            $redirecionamento = "<meta http-equiv='refresh' content='2;URL=recuperarSenha.php>";
        }
    }
} else {
    echo "<script>window.history.back(1);</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Recuperar Senha</title>
    <link rel="stylesheet" href="assets/css/inserirCodigo.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once("paginas/header/header.php") ?>

    <div class="txt">
        <h1>Recuperar Senha</h1>
    </div>

    <?php include_once("paginas/section/inserirCodigo.php") ?>
    <?php include_once("paginas/footer/footer.php") ?>
</body>

</html>