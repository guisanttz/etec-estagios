<?php

session_start();
include_once("conexao.php");

ini_set('display_errors', 1);
/* NÃO EXIBIRÁ ESSA PÁGINA CASO NÃO FOR UM ADMINISTRADOR */
$logado = $_SESSION['usuario_admin'];

if (empty($logado)) {
  header('Location: erro.php');
  exit;
}

$sqlSelectIdNomeEmpresa = "SELECT id, nome_fantasia FROM empresas";
$resultadoSelectIdNomeEmpresa = mysqli_query($conexao, $sqlSelectIdNomeEmpresa);

if (isset($_POST['submit'])) {

  $area = $_POST['area'];
  $cargo = $_POST['cargo'];
  $email = $_POST['email'];
  $remunerado = $_POST['remunerado'];
  $valor = $_POST['valor'];
  $valor = str_replace('.', '', $valor); // Remove os pontos (separadores de milhar)
  $valor = str_replace(',', '.', $valor); // Troca os vírgulas por pontos
  $periodo = $_POST['periodo'];
  $cidade = $_POST['cidade'];
  $endereco = $_POST['endereco'];
  $descricaoEmpresa  = $_POST['descricao-empresa'];
  $descricaoVaga = $_POST['descricao-vaga'];
  $horaEntrada =  $_POST['horario-entrada'];
  $horaSaida =  $_POST['horario-saida'];

  // Cria uma função para enviar os arquivos
  function enviarArquivo($error, $size, $name, $tmp_name, $destino)
  {
    // Se o tamanho do arquivo exceder 2MB
    if ($size > 2097152) {
      return "Arquivo muito grande! Max: 2MB";
    }

    // Converte a extensão do arquivo para letras minúsculas
    $extensao = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    // Verifica se a extensão do arquivo é diferente de jpg, png ou jpeg
    if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg") {
      return "Tipo de arquivo não aceito";
    }

    // Dá um novo nome ao arquivo
    $novoNomeDoArquivo = uniqid() . "." . $extensao; // uniqid() gera um id para cada imagem, evitando nomes duplicados
    // Define o caminho do arquivo
    $path = $destino . $novoNomeDoArquivo;

    // Verifica se o arquivo foi movido com sucesso para o caminho
    if (move_uploaded_file($tmp_name, $path)) {
      return $novoNomeDoArquivo; // Retorna o novo nome do arquivo
    } else {
      return false; // Retorna false caso o upload falhe
    }
  }

  $logo = null;
  $art = null;
  $erroLogo = null;
  $erroArt = null;

  // Verifica se a logo foi enviada e realiza o upload
  if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
    $logo = enviarArquivo($_FILES['logo']['error'], $_FILES['logo']['size'], $_FILES['logo']['name'], $_FILES['logo']['tmp_name'], 'img/logos-artes/');
  }

  // Verifica se a arte foi enviada e realiza o upload
  if (isset($_FILES['art']) && $_FILES['art']['error'] == 0) {
    $art = enviarArquivo($_FILES['art']['error'], $_FILES['art']['size'], $_FILES['art']['name'], $_FILES['art']['tmp_name'], 'img/logos-artes/');
  }

  if (isset($_POST['empresa'])) {
    $nomeEmpresa = $_POST['empresa'];
    $sqlEmpresa = "SELECT id FROM empresas WHERE nome_fantasia = '$nomeEmpresa'";
    $resultadoEmpresa = mysqli_query($conexao, $sqlEmpresa);

    if ($resultadoEmpresa && mysqli_num_rows($resultadoEmpresa) > 0) {
    $empresa = mysqli_fetch_assoc($resultadoEmpresa);
    $idEmpresa = $empresa['id'];
} else {
    // Inserir a nova empresa no banco de dados
    $sqlInsertEmpresa = "INSERT INTO empresas (nome_fantasia) VALUES ('$nomeEmpresa')";
    if (mysqli_query($conexao, $sqlInsertEmpresa)) {
        // Pegar o id da nova empresa inserida
        $idEmpresa = mysqli_insert_id($conexao);
    } else {
        // Tratar erro de inserção
        $idEmpresa = 0;
    }
}
}

  // Faz o insert da vaga na tabela vagas
  $sqlVaga = "INSERT INTO vagas (id_empresa, email, cargo, area, remunerado, valor, cidade, endereco, periodo, hora_entrada, hora_saida, descricao_empresa, descricao_vaga, status_vaga)
                VALUES ('$idEmpresa', '$email', '$cargo', '$area', '$remunerado', '$valor', '$cidade', '$endereco', '$periodo', '$horaEntrada', '$horaSaida', '$descricaoEmpresa', '$descricaoVaga','Disponível')";

  // Executa o insert na tabela vagas no banco de dados
  $resultVaga = mysqli_query($conexao, $sqlVaga);

  if ($resultVaga) {
    // Obtém o ID da última vaga inserida
    $idVaga = mysqli_insert_id($conexao);

    // Verifica se as imagens foram enviadas e cria a consulta SQL
    if ($logo && $art) {
      // Se logo e arte foram enviadas
      $sqlImagens = "INSERT INTO imagens (id_vaga, nome, path, tipo)
                       VALUES ('$idVaga', '$logo', 'img/logos-artes/$logo', 'logo'),
                              ('$idVaga', '$art', 'img/logos-artes/$art', 'arte')";
    } elseif ($logo) {
      // Se só logo foi enviada
      $sqlImagens = "INSERT INTO imagens (id_vaga, nome, path, tipo)
                       VALUES ('$idVaga', '$logo', 'img/logos-artes/$logo', 'logo')";
    } elseif ($art) {
      // Se só arte foi enviada
      $sqlImagens = "INSERT INTO imagens (id_vaga, nome, path, tipo)
                       VALUES ('$idVaga', '$art', 'img/logos-artes/$art', 'arte')";
    } else {
      // Não há imagens, então a variável $sqlImagens permanece nula
      $sqlImagens = null;
    }

    // Executa o insert das imagens no banco, se necessário
    if ($sqlImagens && mysqli_query($conexao, $sqlImagens)) {
      // Exibe a mensagem de sucesso e redireciona
      header('Location: painel-vagas.php?status=cadsucesso');
      exit;
    } else {
      header('Location: painel-vagas.php?status=cadsucesso');
      exit;
    }
  } else {
    // Se a vaga não foi cadastrada, mostra o erro
    header('Location: painel-vagas.php?status=caderro');
    exit;
  }
}

// verifica a pesquisa na url for diferente de vazio
if (!empty($_GET['pesquisa'])) {
  // armazena o termo pesquisado na url em uma variavel
  $pesquisa = $_GET['pesquisa'];
  // faz um select  na tabela de vagas, buscando os dados que contenham o termo pesquisado
  $sqlSelect = "SELECT * FROM vagas 
              JOIN empresas ON vagas.id_empresa = empresas.id 
              WHERE empresas.nome_fantasia LIKE '%$pesquisa%' 
                 OR vagas.area LIKE '%$pesquisa%' 
                 OR empresas.email LIKE '%$pesquisa%' 
                 OR vagas.cargo LIKE '%$pesquisa%' 
                 OR vagas.cidade LIKE '%$pesquisa%'
                 OR empresas.endereco LIKE '%$pesquisa%'
                 OR vagas.status_vaga LIKE '%$pesquisa'";
} else {
  // caso não tenha pesquisa, executa um select na tabela de vagas com todos os dados
  $sqlSelect = "SELECT vagas.*, empresas.nome_fantasia, empresas.email AS email_empresa FROM vagas JOIN empresas ON vagas.id_empresa = empresas.id";
}

// execuda o select
$executaConsulta = mysqli_query($conexao, $sqlSelect);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ETEC Estágios - Painel do Administrador</title>
  <link rel="stylesheet" href="assets/css/admin/global-painel.css" />
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
    padding: 15px;
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
    /* width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    transition: border-color 0.3s; */
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

  .custum-file-upload {
    height: 200px;
    width: auto;
    display: flex;
    flex-direction: column;
    align-items: space-between;
    gap: 20px;
    cursor: pointer;
    align-items: center;
    justify-content: center;
    border: 2px dashed #000000;
    background-color: var(--cinza);
    padding: 1.5rem;
    border-radius: 10px;
  }

  .custum-file-upload .icon {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .custum-file-upload .icon svg {
    height: 80px;
    fill: var(--ciano);
  }

  .custum-file-upload .text {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .custum-file-upload .text span {
    font-weight: 400;
    color: var(--ciano);
  }

  .custum-file-upload input {
    display: none;
  }

  .cancela-cadastra {
    display: flex;
    justify-content: space-between;
    width: 100%;
    padding: 23px 0 0;
  }

  .cancela-cadastra button {
    width: 48%;
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

  tbody a {
    text-decoration: none;
  }
</style>

<body>
  <?php

  include_once('paginas/aside/vagas.php');
  include_once('paginas/section/admin/painel/vagas.php');
  include_once('paginas/modal/vagas.php');

  ?>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
<script src="assets/js/global-painel.js"></script>
<script src="assets/js/painel-vagas.js"></script>