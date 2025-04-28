<?php

ini_set("display_errors", 0);
include_once("conexao.php");
session_start();

if (isset($_GET['token'])) {

    $tokenGet = $_GET['token'];
    $consulta = "SELECT id_usuario, tipo_usuario, utilizado, token FROM recuperacao_senha WHERE token = '$tokenGet'";
    $executaConsulta = mysqli_query($conexao, $consulta);
    $dado = mysqli_fetch_assoc($executaConsulta);

    if ($dado) {

        $idUsuario = $dado['id_usuario'];
        $tipoUsuario = $dado['tipo_usuario'];
        $utilizado = $dado['utilizado'];
        $tokenTabela = $dado['token'];

        switch ($tipoUsuario) {
            case 'aluno':
                $tabela = "usuarios";
                $redirecionamento = "<meta http-equiv='refresh' content='2;URL=login.php'>";
                break;

            case 'empresa':
                $tabela = "empresas";
                $redirecionamento = "<meta http-equiv='refresh' content='2;URL=loginEmpresa.php'>";
                break;

            default:
                $tabela = "administradores";
                $redirecionamento = "<meta http-equiv='refresh' content='2;URL=loginAdmin.php'>";
                break;
        }

        if (empty($tokenGet) || $utilizado === "s") {
            $mensagem = "<p>Seu token é inválido</p>";
            $redirecionamento = "<meta http-equiv='refresh' content='2;URL=recuperarSenha.php'>";
        }

        if (isset($_POST['submit'])) {

            $senha = $_POST['senha'];
            $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
            $selectSenha = "SELECT senha FROM $tabela";
            $executaSelectSenha = mysqli_query($conexao, $selectSenha);

            while ($dadoSenha = mysqli_fetch_assoc($executaSelectSenha)) {
                if (password_verify($senha, $dadoSenha['senha'])) {
                    $senhaExistente = true;
                    break;
                }
            }

            if ($senhaExistente) {
                $mensagem = "A senha inserida já existe, por favor, digite uma senha diferente";
                $recarregaPagina = "<meta http-equiv='refresh' content='2;URL=alterarSenha.php?token=$tokenGet'>";
            } else {
                $updateRecuperacaoSenha = "UPDATE recuperacao_senha SET utilizado = 's', data_utilizado = NOW() WHERE token = '$tokenGet'";
                $updateSenha = "UPDATE $tabela
                                JOIN recuperacao_senha ON recuperacao_senha.id_usuario = $tabela.id
                                SET $tabela.senha = '$senhaCriptografada'
                                WHERE recuperacao_senha.token = '$tokenGet' AND recuperacao_senha.id_usuario = '$idUsuario'";
                $executaUpdate = mysqli_query($conexao, $updateRecuperacaoSenha);
                $executaUpdateSenha = mysqli_query($conexao, $updateSenha);

                if ($executaUpdateSenha) {
                    $mensagem = "Senha alterada com sucesso";
                }
            }
        }
    }
} else {
    echo "<script>window.location.href = 'index.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Recuperar Senha</title>
    <link rel="stylesheet" href="assets/css/alterarSenha.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once("paginas/header/header.php") ?>

    <div class="txt">
        <h1>Alterar Senha</h1>
    </div>

    <?php include_once("paginas/section/alterarSenha.php") ?>
    <?php include_once("paginas/footer/footer.php") ?>
</body>

</html>
<script src="assets/js/alterarSenha.js"></script>