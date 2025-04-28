<?php

include_once('conexao.php');
session_start();

$idEmpresa = $_SESSION['id_empresa'];

if (empty($idEmpresa)) {
    header("Location: erro.php");
    exit;
}

// faz um select detalhado, procurando por cada campo da tabela de vagas onde o id da empresa na tabela vagas é igual o id da empresa armazenado na sessao
$consulta = "SELECT vagas.id_vaga, vagas.cargo, empresas.nome_fantasia, vagas.area, vagas.email, vagas.remunerado, vagas.valor, vagas.cidade, vagas.endereco, vagas.periodo, vagas.hora_entrada, vagas.hora_saida, vagas.descricao_empresa, vagas.descricao_vaga, vagas.status_vaga FROM vagas JOIN empresas ON vagas.id_empresa = empresas.id WHERE vagas.id_empresa = $idEmpresa;";

// executa a consulta no banco de dados
$executaConsulta = mysqli_query($conexao, $consulta);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Sistema Empresa</title>
    <link rel="stylesheet" href="assets/css/minhasVagas.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once('paginas/header/empresa.php') ?>

    <div class="txt">
        <h1>Minhas Vagas</h1>
    </div>

    <?php

    include_once('paginas/section/empresa/minhasVagas.php');
    include_once('paginas/footer/footer.php');


    ?>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
<script src="assets/js/sair.js"></script>
<script src="assets/js/minhasVagas.js"></script>