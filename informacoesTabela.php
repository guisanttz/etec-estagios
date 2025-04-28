<?php

session_start();

// se o id e o tipo da tabela for diferente de vazio, executa o código abaixo
if ((!empty($_GET['id']) || !empty($_GET['rm'])) && $_GET['tabela']) {

    // inclui o arquivo de conexão com o banco de dados
    include_once('conexao.php');

    // armazena o id e o tipo da tabela da url em variáveis
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $tabela = isset($_GET['tabela']) ? $_GET['tabela'] : null;

    // se o tipo da tabela for empresas, executa o coidgo abaixo
    if ($tabela === 'empresas') {

        // faz o select na tabela empresas onde o id é igual o id da url
        $sqlSelect = "SELECT * FROM empresas WHERE id = '$id'";

        // executa o select
        $resultado = mysqli_query($conexao, $sqlSelect);
        // se houver resultados, executa o codigo abaixo
        if (mysqli_num_rows($resultado) > 0) {

            // enquanto houver linha de resultados, executa o código abaixo
            while ($dadoTabela = mysqli_fetch_assoc($resultado)) {

                // armazena os campos do registro  em variáveis
                $idEmpresa = $dadoTabela['id'];
                $razaoSocial = $dadoTabela['razao_social'];
                $nomeFantasia = $dadoTabela['nome_fantasia'];
                $cnpj = $dadoTabela['cnpj'];
                $endereco = $dadoTabela['endereco'];
                $email = $dadoTabela['email'];
                $contatoTelefone = $dadoTabela['contato_telefone'];
                $inscricaoEstadual = $dadoTabela['inscricao_estadual'];
                $ramoAtividade = $dadoTabela['ramo_atividade'];
                $numero = $dadoTabela['numero'];
                $bairro = $dadoTabela['bairro'];
                $cidade = $dadoTabela['cidade'];
                $estado = $dadoTabela['estado'];
                $cep = $dadoTabela['cep'];
                $dataFundacao = $dadoTabela['data_fundacao'];
                $dataFundacao = date('d/m/Y', strtotime($dataFundacao));
                $nomeRepresentante = $dadoTabela['nome_representante'];
                $contatoWhatsapp = $dadoTabela['contato_whatsapp'];
                $perfilInstagram = $dadoTabela['perfil_instagram'];
                $perfilFacebook = $dadoTabela['perfil_facebook'];
                $perfilLinkedin = $dadoTabela['perfil_linkedin'];
            }
        }
        // se o tipo da tabela for diferente de empresas, executa o msm codigo de cima praticamente
    } elseif ($tabela === 'vagas') {

        $sqlSelect = "SELECT vagas.*, empresas.nome_fantasia, empresas.email AS email_empresa FROM vagas JOIN empresas ON vagas.id_empresa = empresas.id WHERE vagas.id_vaga = $id";

        $resultado = mysqli_query($conexao, $sqlSelect);

        if (mysqli_num_rows($resultado) > 0) {

            while ($dadoTabela = mysqli_fetch_assoc($resultado)) {

                $idVaga = $dadoTabela['id_vaga'];
                $statusVaga = $dadoTabela['status_vaga'];
                $area = $dadoTabela['area'];
                $cargo = $dadoTabela['cargo'];
                $nomeEmpresa = $dadoTabela['nome_fantasia'];
                $email = $dadoTabela['email'];
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
            }
        }

        // faz o select na tabela imagens, onde o id da vaga da img (q empresa enviou) é igual o id da empresa salvo no banco
        $sqlImagens = "SELECT * FROM imagens WHERE id_vaga = (SELECT id_vaga FROM vagas WHERE id_vaga = $id)";
        // executa o select das imagens
        $executaSqlImagens = mysqli_query($conexao, $sqlImagens);
        // define variaveis para as imgs como vazio
        $logoEmpresa = '';
        $arteVaga = '';

        // enquanto houver resultados de imagens, executa o codigo abaixo
        while ($imagem = mysqli_fetch_assoc($executaSqlImagens)) {
            // verifica se o tipo da img é logo
            if ($imagem['tipo'] == 'logo') {
                // armazena o caminho da logo na variável logoEmpresa
                $logoEmpresa = $imagem['path'];
                // senao, se o tipo da img é arte
            } elseif ($imagem['tipo'] == 'arte') {
                // armazena o caminho da arte na variável arteVaga
                $arteVaga = $imagem['path'];
            }
        }
    } elseif ($tabela === 'usuarios') {

        $sqlSelect = "SELECT * FROM usuarios WHERE id = '$id'";

        $resultado = mysqli_query($conexao, $sqlSelect);

        if (mysqli_num_rows($resultado) > 0) {
            while ($dadoTabela = mysqli_fetch_assoc($resultado)) {

                $idAluno = $dadoTabela['id'];
                $rm = $dadoTabela['rm'];
                $nome = $dadoTabela['nome'];
                $email = $dadoTabela['email'];
                $telefone = $dadoTabela['telefone'];
                $sexo = $dadoTabela['sexo'];
                $serie = $dadoTabela['serie'];
                $curso = $dadoTabela['curso'];
                $anoInicioTermino = $dadoTabela['ano_inicio_termino'];
            }
        }
    } elseif ($tabela === 'contratos') {
        $sqlSelect = "SELECT 
                contratos.numero_contrato, 
                contratos.id_aluno, 
                usuarios.rm AS rm_aluno, 
                contratos.id_vaga, 
                vagas.cargo AS cargo_vaga,
                contratos.data_inicio, 
                contratos.data_termino
              FROM contratos
              JOIN vagas ON contratos.id_vaga = vagas.id_vaga
              JOIN usuarios ON contratos.id_aluno = usuarios.id WHERE contratos.id = '$id'";

        $resultado = mysqli_query($conexao, $sqlSelect);

        if (mysqli_num_rows($resultado) > 0) {
            while ($dadoTabela = mysqli_fetch_assoc($resultado)) {

                $idContrato = $_GET['id'];
                $numeroContrato = $dadoTabela['numero_contrato'];
                $idDoAluno = $dadoTabela['id_aluno'];
                $rmAluno = $dadoTabela['rm_aluno'];
                $idVaga = $dadoTabela['id_vaga'];
                $dataInicio = $dadoTabela['data_inicio'];
                $dataTermino = $dadoTabela['data_termino'];
                $dataInicio = date('d/m/Y', strtotime($dataInicio));
                $dataTermino = date('d/m/Y', strtotime($dataTermino));

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
    <title>ETEC Estágios - Informações da Tabela</title>
    <link rel="stylesheet" href="assets/css/admin/informacoesTabela.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once('paginas/section/admin/informacoesTabela.php') ?>

</body>

</html>
<script src="assets/js/informacoesTabela.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>