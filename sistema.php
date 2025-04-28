<?php

ini_set("display_errors", 0);
include_once('conexao.php');
session_start();

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

// faz um select detalhado na tabela de vagas
$sqlSelect = "SELECT vagas.*, empresas.nome_fantasia, empresas.email FROM vagas 
              JOIN empresas ON vagas.id_empresa = empresas.id WHERE vagas.area = '$cursoAluno' AND vagas.status_vaga = 'Disponível'";
// executa o select detalhada
$executaConsulta = mysqli_query($conexao, $sqlSelect);
// pega os resultados do select e armazena em um array $vagas, com as vagas do banco de dados
$vagas = mysqli_fetch_all($executaConsulta, MYSQLI_ASSOC);
// cria um array vazio para armazenar as vagas aleatorias
$vagasAleatorias = [];

// verifica se há alguma vaga cadastrada no banco de dados, se sim, executa o código abaixo
if (count($vagas) > 0) {
    // usa a funcao shuffle pra embaralhar a ordem das vagas do banco de dados
    shuffle($vagas);

    // usa a função array_slice pra selecionar as 3 primeiras vagas cadastradas no banco de dados e armazena no array
    $vagasAleatorias = array_slice($vagas, 0, 3);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Sistema</title>
    <link rel="stylesheet" href="assets/css/sistema.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once('paginas/header/aluno.php'); ?>

    <div class="txt-boas-vindas">
        <h1>Olá, <?php echo $_SESSION['nome_usuario'] ?></h1>
    </div>

    <br>

    <div class="txt">
        <h2>Aqui estão algumas vagas sugeridas para você:</h2>
    </div>

    <?php

    include_once('paginas/section/aluno/sistema.php');
    include_once('paginas/footer/footer.php')

    ?>

</body>

</html>
<script src="assets/js/sair.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>