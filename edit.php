<?php

session_start();

// se o id e o tipo da tabela for diferente de vazio, executa o código abaixo
if (!empty($_GET['id']) && !empty($_GET['tabela'])) {

    // inclui o arquivo de conexão com o banco de dados
    include_once('conexao.php');

    // armazena o id e o tipo da tabela da url em variáveis
    $id = $_GET['id'];
    $tabela = $_GET['tabela'];

    // se o tipo da tabela for X, executa o coidgo abaixo
    if ($tabela === 'administradores') {

        // armaznea o nome da tabela
        $nomeTabela = "Administrador";

        // faz o select na tabela onde o id é igual o id da url
        $sqlSelect = "SELECT * FROM administradores WHERE id = $id";

        // executa o select
        $resultado = mysqli_query($conexao, $sqlSelect);

        // se tiver algum resultado, executa o codigo abaixo
        if (mysqli_num_rows($resultado) > 0) {

            // enquanto houver linha de resultados, executa o código abaixo

            $dado = mysqli_fetch_assoc($resultado);

            // armazena os dados em variáveis
            $nome = $dado['nome'];
            $email = $dado['email'];
            $usuario = $dado['usuario'];
        }

        // senao, se a tabela for Y, executa a mesma coisa do codigo de cima
    } elseif ($tabela === 'usuarios') {

        $nomeTabela = "Aluno";

        $sqlSelect = "SELECT * FROM usuarios WHERE id = $id";

        $resultado = mysqli_query($conexao, $sqlSelect);

        if (mysqli_num_rows($resultado) > 0) {

            $dado = mysqli_fetch_assoc($resultado);

            $rm = $dado['rm'];
            $nome = $dado['nome'];
            $telefone = $dado['telefone'];
            $email = $dado['email'];
            $sexo = $dado['sexo'];
            $serie = $dado['serie'];
            $curso = $dado['curso'];
            $anoInicioTermino = $dado['ano_inicio_termino'];
            $senha = $dado['senha'];
        }
    } elseif ($tabela === 'empresas') {

        $nomeTabela = "Empresa";

        $sqlSelect = "SELECT * FROM empresas WHERE id = $id";

        $resultado = mysqli_query($conexao, $sqlSelect);

        if (mysqli_num_rows($resultado) > 0) {

            $dado = mysqli_fetch_assoc($resultado);

            $razaoSocial = $dado['razao_social'];
            $nomeFantasia = $dado['nome_fantasia'];
            $cnpj = $dado['cnpj'];
            $email = $dado['email'];
            $contatoTelefone = $dado['contato_telefone'];
            $inscricaoEstadual = $dado['inscricao_estadual'];
            $ramoAtividade = $dado['ramo_atividade'];
            $endereco = $dado['endereco'];
            $numero = $dado['numero'];
            $bairro = $dado['bairro'];
            $cidade = $dado['cidade'];
            $estado = $dado['estado'];
            $cep = $dado['cep'];
            $dataFundacao = $dado['data_fundacao'];
            $nomeRepresentante = $dado['nome_representante'];
            $contatoWhatsapp = $dado['contato_whatsapp'];
            $perfilInstagram = $dado['perfil_instagram'];
            $perfilFacebook = $dado['perfil_facebook'];
            $perfilLinkedin = $dado['perfil_linkedin'];
        }
    } elseif ($tabela === 'vagas') {

        $nomeTabela = "Vaga";

        // faz um select para pegar os dados da vaga pelo id e da empresa relacionada
        $sqlSelect = "SELECT vagas.*, empresas.nome_fantasia, empresas.email AS email_empresa, empresas.cidade AS cidade_empresa, empresas.endereco AS endereco_empresa 
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
                $cidadeVaga = $dado['cidade'];
                $enderecoVaga = $dado['endereco'];
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
    } elseif ($tabela === 'contratos') {

        $nomeTabela = "Contrato";

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

        $sqlIdVagas = "SELECT id_vaga, cargo FROM vagas";
        $sqlIdAlunos = "SELECT id, rm FROM usuarios";

        $executaConsulta = mysqli_query($conexao, $sqlSelect);
        $executaIdVagas = mysqli_query($conexao, $sqlIdVagas);
        $executaIdAlunos = mysqli_query($conexao, $sqlIdAlunos);

        if (mysqli_num_rows($executaConsulta) > 0) {

            $dado = mysqli_fetch_assoc($executaConsulta);

            $numeroContrato = $dado['numero_contrato'];
            $idAluno = $dado['id_aluno'];
            $rmAluno = $dado['rm_aluno'];
            $idVaga = $dado['id_vaga'];
            $cargoVaga = $dado['cargo_vaga'];
            $dataInicio = $dado['data_inicio'];
            $dataTermino = $dado['data_termino'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Editar</title>
    <link rel="stylesheet" href="assets/css/admin/edit.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once('paginas/section/admin/edit.php') ?>

</body>

</html>
<script src="assets/js/edit.js"></script>
<script>
    let arquivoLogo = document.getElementById('file-logo');
    let nomeArquivoLogo = document.getElementById('file-name-logo');
    let arquivoArt = document.getElementById('file-art');
    let nomeArquivoArt = document.getElementById('file-name-art');

    // cria lista de eventos e utiliza o evento change
    arquivoLogo.addEventListener('change', function() {
        // cria variavel pro nome do arquuivo
        let nomeArquivo;
        // verifica se tem  algum arquivo selecionado
        if (arquivoLogo.files.length > 0) {
            // define nomeArquivo como o nome do arquivo selecionado
            nomeArquivo = arquivoLogo.files[0].name;
        } else {
            //  se não tiver arquivo selecionado, define nomeArquivo como vazio

            nomeArquivo = 'Nenhum arquivo selecionado';
        }
        // altera o conteudo do texto para o nome do arquivo selecionado
        nomeArquivoLogo.textContent = nomeArquivo;
    });

    // msm coisa do codigo de cima
    arquivoArt.addEventListener('change', function() {
        let nomeArquivo;
        if (arquivoArt.files.length > 0) {
            nomeArquivo = arquivoArt.files[0].name;
        } else {
            nomeArquivo = 'Nenhum arquivo selecionado';
        }
        nomeArquivoArt.textContent = nomeArquivo;
    });
</script>