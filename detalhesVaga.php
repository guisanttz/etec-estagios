<?php

session_start();

// se o id for diferente de vazio, executa o código abaixo
if (!empty($_GET['id'])) {

    // inclui o arquivo de conexão com o banco de dados
    include_once('conexao.php');

    // pega o id da url da página e armazena em uma variável
    $id = $_GET['id'];

    // faz um select onde o id da vaga é igual o id da url
    $sqlSelect = "SELECT * FROM vagas WHERE id_vaga = $id";
    // executa o select
    $resultado = mysqli_query($conexao, $sqlSelect);

    // se tiver algum resultado, executa o código abaixo
    if (mysqli_num_rows($resultado) > 0) {

        // enquanto houver linha de resultados no bacnco de dados, executa o código abaixo
        while ($dadoTabela = mysqli_fetch_assoc($resultado)) {

            // pega todos os dados da vaga e armazena em variáveis
            $idVaga = $dadoTabela['id_vaga'];
            $statusVaga = $dadoTabela['status_vaga'];
            $area = $dadoTabela['area'];
            $cargo = $dadoTabela['cargo'];
            $remunerado = $dadoTabela['remunerado'];
            $valor = $dadoTabela['valor'];
            $cidade = $dadoTabela['cidade'];
            $endereco = $dadoTabela['endereco'];
            $periodo = $dadoTabela['periodo'];
            $horaEntrada = $dadoTabela['hora_entrada'];
            $horaSaida = $dadoTabela['hora_saida'];
            $horaEntradaFormatada = date("G\h\r", strtotime($horaEntrada));
            $horaSaidaFormatada = date("G\h\r", strtotime($horaSaida));
            $descricaoEmpresa = $dadoTabela['descricao_empresa'];
            $descricaoVaga = $dadoTabela['descricao_vaga'];
        }

        // faz um select para as imagens, onde o id de quem postou as imagens é igual o id da empresa. fazendo outro select na tabela empresas e resgatando o id dela
        $sqlImagens = "SELECT * FROM imagens WHERE id_vaga = (SELECT id_vaga FROM vagas WHERE id_vaga = $id)";
        // executa o select das imagens
        $executaSqlImagens = mysqli_query($conexao, $sqlImagens);
        // inicializa em vazio as variáveis que armazenarão os paths(caminho) das logos e das artes das empresas
        $logoEmpresa = '';
        $arteVaga = '';

        // enquanto houver linhas de resultados no banco de dados, executa o código abaixo
        while ($imagem = mysqli_fetch_assoc($executaSqlImagens)) {
            // se a imagem for do tipo logo
            if ($imagem['tipo'] == 'logo') {
                // armazena o path da logo na variável $logoEmpresa
                $logoEmpresa = $imagem['path'];
                // senao, se o tipo da imagem for uma arte de vaga
            } elseif ($imagem['tipo'] == 'arte') {
                // armazena o path(caminho) da arte na variável $arteVaga
                $arteVaga = $imagem['path'];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Informações da Vaga</title>
    <link rel="stylesheet" href="assets/css/detalhesVaga.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once('paginas/section/empresa/detalhesVaga.php') ?>

</body>

</html>
<script src="assets/js/detalhesVaga.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>