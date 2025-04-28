<?php

session_start();

$logado = $_SESSION['id_empresa'];

if (empty($logado)) {
    header('Location: erro.php');
    exit;
}

if (!empty($_GET['id'])) {

    include_once('conexao.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM vagas WHERE id_vaga = $id";
    $resultado = mysqli_query($conexao, $sqlSelect);

    if (mysqli_num_rows($resultado) > 0) {
        $vaga = mysqli_fetch_assoc($resultado);

        $sqlSelect = "SELECT vagas.*, empresas.nome_fantasia, empresas.email, empresas.cidade AS cidade_empresa, empresas.endereco AS endereco_empresa 
                      FROM vagas 
                      JOIN empresas ON vagas.id_empresa = empresas.id 
                      WHERE vagas.id_vaga = $id";

        $resultado = mysqli_query($conexao, $sqlSelect);

        if (mysqli_num_rows($resultado) > 0) {

            while ($dado = mysqli_fetch_assoc($resultado)) {

                $statusVaga = $dado['status_vaga'];
                $area = $dado['area'];
                $cargo = $dado['cargo'];
                $nomeEmpresa = $dado['nome_fantasia'];
                $email = $dado['email'];
                $remunerado = $dado['remunerado'];
                $valor = $dado['valor'];
                $periodo = $dado['periodo'];
                $cidade = $dado['cidade'];
                $endereco = $dado['endereco'];
                $descricaoEmpresa  = $dado['descricao_empresa'];
                $descricaoVaga = $dado['descricao_vaga'];
                /* $horaEntrada = date("G\h\r", strtotime($dado_vaga['hora_entrada']));
                $horaSaida = date("G\h\r", strtotime($dado_vaga['hora_saida'])); */
                $horaEntrada =  $dado['hora_entrada'];
                $horaSaida =  $dado['hora_saida'];
            }
        }
        // faz um select para as imagens, onde o id de quem postou as imagens é igual o id da vaga. fazendo outro select na tabela vagas e resgatando o id dela
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
    <title>ETEC Estágios - Editar Vaga</title>
    <link rel="stylesheet" href="assets/css/editarVaga.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once('paginas/section/empresa/editarVaga.php'); ?>

</body>

</html>
<script src="assets/js/editarVaga.js"></script>