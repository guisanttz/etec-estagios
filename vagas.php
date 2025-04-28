<?php

include_once('conexao.php');
session_start();
/* ini_set("display_errors", 0); */

$logado = $_SESSION['rm'];

if (empty($logado)) {
    header('Location: erro.php');
    exit;
}

$sqlCursoAluno = "SELECT curso FROM usuarios WHERE rm = '$logado'";
$resultadoCursoAluno = mysqli_query($conexao, $sqlCursoAluno);
$dadoCursoAluno = mysqli_fetch_assoc($resultadoCursoAluno);
$cursoAluno = $dadoCursoAluno['curso'];

if ($cursoAluno == "Informática para Internet") {
    $cursoAluno = "Informática";
}

// verifica a pesquisa na url for diferente de vazio
if (!empty($_GET['pesquisa'])) {

    // armazena o termo pesquisado na url em uma variavel
    $pesquisa = $_GET['pesquisa'];
    // faz um select  na tabela de usuarios, buscando os dados que contenham o termo pesquisado
    $sqlSelect = "SELECT * FROM vagas 
              JOIN empresas ON vagas.id_empresa = empresas.id 
              WHERE (empresas.nome_fantasia LIKE '%$pesquisa%'
                 OR empresas.email LIKE '%$pesquisa%'
                 OR vagas.periodo LIKE '%$pesquisa%' 
                 OR vagas.cargo LIKE '%$pesquisa%' 
                 OR vagas.cidade LIKE '%$pesquisa%')";
} else {
    // caso não tenha pesquisa, executa um select na tabela de vagas com todos os dados
    $sqlSelect = "SELECT vagas.*, empresas.nome_fantasia, empresas.email FROM vagas 
              JOIN empresas ON vagas.id_empresa = empresas.id WHERE vagas.status_vaga = 'Disponível'";
              /* $sqlSelect = "SELECT vagas.*, empresas.nome_fantasia, empresas.email FROM vagas 
              JOIN empresas ON vagas.id_empresa = empresas.id 
              WHERE vagas.area = '$cursoAluno'"; */
}

// executa o select
$executaConsulta = mysqli_query($conexao, $sqlSelect);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Vagas</title>
    <link rel="stylesheet" href="assets/css/vagas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once('paginas/header/aluno.php'); ?>

    <div class="txt">
        <h1>Vagas</h1>
    </div>

    <div class="pesquisa">
        <input type="text" class="input" id="pesquisa" name="pesquisa" placeholder="Pesquisar Vaga">
        <input class="btn-pesquisa" value="Pesquisar" type="submit" onclick="pesquisarVaga()">
    </div>

    <?php 
    
    include_once('paginas/section/aluno/vagas.php');
    include_once('paginas/footer/footer.php');

    ?>

</body>

</html>
<script src="assets/js/sair.js"></script>
<script src="assets/js/vagas.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>