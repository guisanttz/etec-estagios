<?php

session_start();

// verifica se o id da url é diferente de vazio, ou seja, se existe
if (!empty($_GET['id'])) {

    // inclui o arquivo de conexão com o banco de dados
    include_once('conexao.php');

    // pega o id da url e armazena em uma variável
    $id = $_GET['id'];
    // faz um select na tabela vagas, combinando informacoes de duas tabelas, ja que o id da empreas é chave estrangeira da tabela vagas e é chave primaria na tabela empresas
   /*  $sqlSelect = "SELECT * FROM vagas JOIN empresas ON vagas.id_empresa = empresas.id WHERE vagas.id_vaga = $id"; */
   $sqlSelect = "SELECT vagas.*, empresas.nome_fantasia, empresas.email AS email_empresa FROM vagas JOIN empresas ON vagas.id_empresa = empresas.id WHERE vagas.id_vaga = $id";
    // executa o select
    $resultado = mysqli_query($conexao, $sqlSelect);

    // verifica se houve resultados
    if (mysqli_num_rows($resultado) > 0) {

        // cria um array associativo com os dados da vaga
        while ($dadoTabela = mysqli_fetch_assoc($resultado)) {

            // armazena os dados da vaga em variáveis
            $area = $dadoTabela['area'];
            $cargo = $dadoTabela['cargo'];
            $nomeEmpresa = $dadoTabela['nome_fantasia'];
            $emailVaga = $dadoTabela['email'];
            $emailEmpresa = $dadoTabela['email_empresa'];
            $remunerado = $dadoTabela['remunerado'];
            $valor = $dadoTabela['valor'];
            $cidade = $dadoTabela['cidade'];
            $endereco = $dadoTabela['endereco'];
            $horaEntrada = $dadoTabela['hora_entrada'];
            $horaSaida = $dadoTabela['hora_saida'];
            $horaEntradaFormatada = date("G\h\r", strtotime($horaEntrada));
            $horaSaidaFormatada = date("G\h\r", strtotime($horaSaida));
            $descricaoEmpresa = $dadoTabela['descricao_empresa'];
            $descricaoVaga = $dadoTabela['descricao_vaga'];
            /* $logoEmpresa = $dadoTabela['logo_empresa'];
            $arteVaga = $dadoTabela['arte_vaga']; */
        }
    } else {
        header("Location: vagas.php");
        exit;
    }

}

$emailExibido = !empty($emailVaga) ? $emailVaga : $emailEmpresa;

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Informações da Vaga</title>
    <link rel="stylesheet" href="assets/css/informacoesVaga.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once('paginas/header/aluno.php'); ?>

    <div class="txt">
        <h1>Informações da Vaga</h1>
    </div>

    <?php
    include_once('paginas/section/aluno/informacoesVaga.php');
    include_once('paginas/footer/footer.php');

    ?>

</body>

</html>

<script src="assets/js/sair.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>