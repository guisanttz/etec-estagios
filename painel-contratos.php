<?php

session_start();
include_once("conexao.php");
ini_set("display_errors", 1);
$logado = $_SESSION['usuario_admin'];

if (empty($logado)) {
  header('Location: erro.php');
  exit;
}

$sqlSelect = "SELECT 
                contratos.id, 
                contratos.numero_contrato, 
                contratos.id_aluno, 
                usuarios.rm AS rm_aluno, 
                contratos.id_vaga, 
                vagas.cargo AS cargo_vaga,
                contratos.data_inicio, 
                contratos.data_termino
              FROM contratos
              JOIN vagas ON contratos.id_vaga = vagas.id_vaga
              JOIN usuarios ON contratos.id_aluno = usuarios.id;";

$sqlIdVagas = "SELECT id_vaga, cargo FROM vagas WHERE status_vaga = 'Disponível'";
$sqlIdAlunos = "SELECT id, rm FROM usuarios WHERE id_contrato = 0";

$executaConsulta = mysqli_query($conexao, $sqlSelect);
$executaIdVagas = mysqli_query($conexao, $sqlIdVagas);
$executaIdAlunos = mysqli_query($conexao, $sqlIdAlunos);

if (isset($_POST['submit'])) {

  $numeroContrato = $_POST['numero-contrato'];
  $idRmAluno = $_POST['id-rm-aluno'];
  $idAluno = explode(" -", $idRmAluno)[0];
  $idVagaCargo = $_POST['id-vaga-cargo'];
  $idVaga = explode(" -", $idVagaCargo)[0];
  $dataInicio = $_POST['data-inicio'];
  $dataTermino = $_POST['data-termino'];

  $selectContrato = "SELECT numero_contrato FROM contratos WHERE numero_contrato = '$numeroContrato'";
  $executaselectContrato = mysqli_query($conexao, $selectContrato);
  $selectRmaluno = "SELECT id_aluno FROM contratos WHERE id_aluno = '$idAluno'";
  $executaselectRmaluno = mysqli_query($conexao, $selectRmaluno);

  if (mysqli_num_rows($executaselectContrato) > 0 || mysqli_num_rows($executaselectRmaluno) > 0) {
    header("Location: painel-contratos.php?status=cadexiste");
    exit;
  } else {
    $sqlInsert = "INSERT INTO contratos (numero_contrato, id_aluno, id_vaga, data_inicio, data_termino) VALUES ('$numeroContrato', '$idAluno', '$idVaga', '$dataInicio', '$dataTermino')";
    $executaSqlInsert = mysqli_query($conexao, $sqlInsert);

    if ($executaSqlInsert) {
      $idContrato = mysqli_insert_id($conexao);
      $updateAluno = "UPDATE usuarios SET id_contrato = '$idContrato' WHERE id = '$idAluno'";
      $executaUpdateAluno = mysqli_query($conexao, $updateAluno);

      if ($executaUpdateAluno) {
        header("Location: painel-contratos.php?status=cadsucesso");
        exit;
      } else {
        header("Location: painel-contratos.php?status=caderro");
        exit;
      }
    }
  }
}

if (!empty($_GET['pesquisa'])) {
  // armazena o termo pesquisado na url em uma variavel
  $pesquisa = $_GET['pesquisa'];
  // faz um select na tabela de administradores, buscando os dados que contenham o termo pesquisado
  $sqlSelect = "SELECT 
                  contratos.id, 
                  contratos.numero_contrato, 
                  contratos.id_aluno, 
                  usuarios.rm AS rm_aluno, 
                  contratos.id_vaga, 
                  vagas.cargo AS cargo_vaga, 
                  contratos.data_inicio, 
                  contratos.data_termino 
                FROM contratos 
                JOIN vagas ON contratos.id_vaga = vagas.id_vaga 
                JOIN usuarios ON contratos.id_aluno = usuarios.id
                WHERE contratos.numero_contrato LIKE '%$pesquisa%' 
                OR contratos.id_aluno LIKE '%$pesquisa%'  
                OR contratos.id_vaga LIKE '%$pesquisa%'
                OR usuarios.rm LIKE '%$pesquisa%'
                OR vagas.cargo LIKE '%$pesquisa%'
                OR contratos.data_inicio LIKE '%$pesquisa%'
                OR contratos.data_termino LIKE '%$pesquisa%'";
} else {
  // caso não tenha pesquisa, executa um select na tabela de administradores com todos os dados
  $sqlSelect = "SELECT 
                contratos.id, 
                contratos.numero_contrato, 
                contratos.id_aluno, 
                usuarios.rm AS rm_aluno, 
                contratos.id_vaga, 
                vagas.cargo AS cargo_vaga, 
                contratos.data_inicio, 
                contratos.data_termino
              FROM contratos
              JOIN vagas ON contratos.id_vaga = vagas.id_vaga
              JOIN usuarios ON contratos.id_aluno = usuarios.id;";
}

// executa o select
$executaConsulta = mysqli_query($conexao, $sqlSelect);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ETEC Estágios - Painel do Administrador</title>
  <link rel="stylesheet" href="assets/css/admin/global-painel.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">

  <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<style>
  /* Estilizando o modal */
  dialog {
    border: none;
    border-radius: 8px;
    padding: 20px;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: var(--branco);
    box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
  }

  dialog::backdrop {
    background: rgba(0, 0, 0, 0.5);
  }

  form {
    background-color: var(--branco);
    padding: 20px;
    border-radius: 8px;
  }

  h1 {
    font-size: 30px;
    margin-bottom: 20px;
    text-align: center;
    color: var(--ciano);
  }

  .flex {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    gap: 15px;
    width: 100%;
  }

  label {
    display: block;
    width: 48%;
  }

  label p {
    margin-bottom: 3px;
    font-size: 1em;
    color: var(--ciano);
  }

  form .input {
    background: var(--cinza);
    color: var(--ciano);
    width: 100%;
    padding: 4.5px 15px 5px 10px;
    height: 40px;
    border: 1px solid rgba(105, 105, 105, 0.397);
    border-radius: 7px;
  }

  .input:focus {
    border-color: #007BFF;
  }

  .cancela-cadastra {
    display: flex;
    justify-content: space-between;
    width: 100%;
    /* padding: 23px 0 0 7px; */
  }

  .cancela-cadastra button {
    width: 49%;
    height: 100%;
  }

  .cancela-cadastra input {
    cursor: pointer;
    border: none;
    background: transparent;
    width: 100%;
    height: 100%;
    color: var(--branco);
    font-size: 15px;
  }

  .btn-modal {
    text-align: center;
    height: 37px;
    background: var(--azul);
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  #btn-cadastro:hover {
    background-color: var(--azulEscuro);
  }

  #btn-fecha-modal {
    background-color: var(--vermelho);
  }

  #btn-fecha-modal:hover {
    background-color: var(--vermelhoEscuro);
  }
</style>

<body>
  <?php

  include_once('paginas/aside/contratos.php');
  include_once('paginas/section/admin/painel/contratos.php');
  include_once('paginas/modal/contratos.php');

  ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
<script src="assets/js/painel-contratos.js"></script>
<script src="assets/js/global-painel.js"></script>

</html>