<?php

session_start();
include_once('conexao.php');

/* if (empty($logado)) {
    header("Location: erro.php");
    exit;
} */

// verifica se o id da url é diferente de vazio. ou seja, se existe
if (!empty($_GET['id'])) {

    // inclui o arquivo de conexao com o banco de daddso
    include_once('conexao.php');

    // armazena o id da url em uma variável
    $id = $_GET['id'];

    // faz um select na tabela de empresas onde o id do registro na tabela é igual o id da url
    $sqlSelect = "SELECT * FROM empresas WHERE id = $id";

    // executa o select 
    $resultado = mysqli_query($conexao, $sqlSelect);

    // se tiver algum resultado, executa o código abaixo
    if (mysqli_num_rows($resultado) > 0) {

        // enquanto houver linha de resultados, executa o código abaixo
        while ($dado = mysqli_fetch_assoc($resultado)) {

            // pega todos os cammpos do registro no banco de dados e armazena em variáveis
            $idEmpresa = $dado['id'];
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
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Editar Perfil</title>
    <link rel="stylesheet" href="assets/css/editarPerfilEmpresa.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once('paginas/header/empresa.php') ?>

    <div class="txt">
        <h1>Editar Perfil</h1>
    </div>

    <?php

    include_once('paginas/section/empresa/editarPerfil.php');
    include_once('paginas/footer/footer.php');

    ?>

</body>

</html>
<script src="assets/js/sair.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
<script>
    document.getElementById('btn-fecha-modal').addEventListener('click', function() {
        window.location.href = "perfilEmpresa.php";
    });
</script>