<?php

include_once('conexao.php');
session_start();

$result = 0;

// Se o botão submit estiver declarado (receber clique), executa o código abaixo
if (isset($_POST['submit'])) {

    // Pega todos os campos inseridos no formulário e armazena em variáveis
    $idEmpresa = $_SESSION['id_empresa'];
    $email = $_POST['email'];
    $area = $_POST['area'];
    $cargo = $_POST['cargo'];
    $escolha = $_POST['escolha'];
    $valor = ($escolha == "Não") ? 0 : $_POST['valor']; // Definindo valor baseado na escolha
    $valor = str_replace('.', '', $valor); // Remove os pontos (separadores de milhar)
    $valor = str_replace(',', '.', $valor);
    $cidade = $_POST['cidade'];
    $endereco = $_POST['endereco'];
    $periodo = $_POST['periodo'];
    $horaentrada = $_POST['horaentra'];
    $horasaida = $_POST['horasai'];
    $descricaoempresa = $_POST['descriempresa'];
    $descricaovaga = $_POST['descricargo'];

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

    // Inicializa variáveis para logo e arte
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

    // Faz o insert da vaga na tabela vagas
    $sqlVaga = "INSERT INTO vagas (id_empresa, email, cargo, area, remunerado, valor, cidade, endereco, periodo, hora_entrada, hora_saida, descricao_empresa, descricao_vaga, status_vaga)
                VALUES ('$idEmpresa', '$email', '$cargo', '$area', '$escolha', '$valor', '$cidade', '$endereco', '$periodo', '$horaentrada', '$horasaida', '$descricaoempresa', '$descricaovaga','Disponível')";

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
            header('Location: minhasVagas.php?status=cadsucesso');
            exit;
        } else {
            header('Location: minhasVagas.php?status=cadsucesso');
            exit;
        }
    } else {
        // Se a vaga não foi cadastrada, mostra o erro
        header('Location: minhasVagas.php?status=caderro');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Cadastrar Vaga</title>
    <link rel="stylesheet" href="assets/css/empresa.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once('paginas/header/empresa.php') ?>

    <div class="txt">
        <h1>Cadastrar Vaga</h1>
    </div>

    <?php

    include_once('paginas/section/empresa/empresa.php');
    include_once('paginas/footer/footer.php');

    ?>

</body>

</html>
<script src="assets/js/sair.js"></script>
<script src="assets/js/empresa.js"></script>