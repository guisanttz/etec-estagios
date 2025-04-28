<?php

session_start();
include_once('conexao.php');

// armazena a sessao id_empresa em uma variavel
$idEmpresa = $_SESSION['id_empresa'];
// faz um select na tabela empresas onde o id da empresa é igual o id da empresa armazenado na sessao
$sqlSelect = "SELECT * FROM empresas WHERE id = '$idEmpresa'";

// executa o select
$resultado = mysqli_query($conexao, $sqlSelect);

// se houver algum resultado, executa o código abaixo
if (mysqli_num_rows($resultado) > 0) {
    // enquanto houver uma linha de resultados, executa o código abaixo
    while ($dadoEmpresa = mysqli_fetch_assoc($resultado)) {
        // armazena os dados em variáveis
        $idEmpresa = $dadoEmpresa['id'];
        $razao_social = $dadoEmpresa['razao_social'];
        $nome_fantasia = $dadoEmpresa['nome_fantasia'];
        $cnpj = $dadoEmpresa['cnpj'];
        $email = $dadoEmpresa['email'];
        $numero = $dadoEmpresa['numero'];
        $ramo_atividade = $dadoEmpresa['ramo_atividade'];
        $endereco = $dadoEmpresa['endereco'];
        $cidade = $dadoEmpresa['cidade'];
        $nome_representante = $dadoEmpresa['nome_representante'];
        $contato_whatsapp = $dadoEmpresa['contato_whatsapp'];
        $contato_telefone = $dadoEmpresa['contato_telefone'];
        $inscricao_estadual = $dadoEmpresa['inscricao_estadual'];
        $data_fundacao = $dadoEmpresa['data_fundacao'];
        $data_fundacao = date('d/m/Y', strtotime($data_fundacao));
        $cep = $dadoEmpresa['cep'];
        $estado = $dadoEmpresa['estado'];
        $perfilInstagram = $dadoEmpresa['perfil_instagram'];
        $perfilFacebook = $dadoEmpresa['perfil_facebook'];
        $perfilLinkedin = $dadoEmpresa['perfil_linkedin'];
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Meu Perfil</title>
    <link rel="stylesheet" href="assets/css/perfilEmpresa.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once('paginas/header/empresa.php') ?>

    <div class="txt">
        <h1>Meu Perfil</h1>
    </div>

    <?php 
    
    include_once('paginas/section/empresa/perfil.php');
    include_once('paginas/footer/footer.php');

    ?>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
<script src="assets/js/sair.js"></script>
<script src="assets/js/perfilEmpresa.js"></script>