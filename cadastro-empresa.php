<?php

include_once("conexao.php");
session_start();
ini_set("display_errors", 0);

// Função para validar se o CNPJ é numérico e tem 14 dígitos
function validarCNPJ($cnpj)
{
    return preg_match('/^\d{14}$/', $cnpj);
}

// Verifica se o formulário foi enviado e o campo CNPJ está presente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cnpj'])) {

    $cnpj = trim($_POST['cnpj']);

    // Valida o CNPJ
    if (!validarCNPJ($cnpj)) {
        echo "<div class='aviso'>
                    CNPJ inválido. Por favor, insira um CNPJ válido com 14 dígitos!
                  </div>
                  <style>
                  .aviso { 
                  display: flex;
                  width: 100%;
                  font-size: 30px;
                  align-items: center;
                  justify-content: center;
                  }
                  </style>";
        echo "<form action='cnpjvalida.php' method='GET'>
                  <div class='criar-conta'>
                        <input type='submit' id='submit' name='submit' value='VOLTAR'>
                  </div>
                  </form>";
        exit;
    }

    // Inicializa cURL
    $curl = curl_init();

    // Configura as opções do cURL
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://receitaws.com.br/v1/cnpj/{$cnpj}",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Accept: application/json"
        ],
    ]);

    // Executa a requisição cURL
    $response = curl_exec($curl);
    $err = curl_error($curl);

    // Fecha a conexão cURL
    curl_close($curl);

    // Exibe a resposta ou erro
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        // Tenta decodificar a resposta JSON
        $data = json_decode($response, true);

        // Verifica se a resposta JSON é válida e exibe os dados
        if (json_last_error() === JSON_ERROR_NONE) {
        } else {
            echo "Erro ao processar a resposta da API.";
        }
    }
}

if (isset($_POST['submit'])) {

    $nomefantasia = $_POST['nomefantasia'];
    $cnpj = $_POST['cn'];
    $telefone = $_POST['telefone'];
    $razao = $_POST['razaosocial'];
    $email = $_POST['email'];
    $dataFundacao = $_POST['dtfundacao'];
    $dataFundacao = date('Y/m/d', strtotime($dataFundacao));
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $representante = $_POST['representante'];
    $ramo = $_POST['ramo'];
    $senha = $_POST['senha'];
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $checkcnpjQuery = "SELECT * FROM empresas WHERE cnpj = '$cnpj'";
    $checkcnpjResult = mysqli_query($conexao, $checkcnpjQuery);

    $checkEmail = "SELECT email FROM empresas WHERE email = '$email'
    UNION
    SELECT email FROM administradores WHERE email = '$email'
    UNION
    SELECT email FROM usuarios WHERE email = '$email'";
    $checkEmailResult = mysqli_query($conexao, $checkEmail);

    if (mysqli_num_rows($checkcnpjResult) > 0) {
        $mensagem = "<center><div class='alert alert-danger' role='alert'>Erro: CNPJ já cadastrado!</div></center>";
        $redirecionamento .= "<meta http-equiv=refresh content='3;URL=cadastro-empresa.php'>";
    } elseif (mysqli_num_rows($checkEmailResult) > 0) {
        $mensagem = "<center><div class='alert alert-danger' role='alert'>Erro: E-mail já cadastrado!</div></center>";
        // redireciona o usuário pra tela de cadastro
        $redirecionamento = "<meta http-equiv=refresh content='3;URL=cadastro-empresa.php'>";
    } else {
        $sql = "INSERT INTO empresas(razao_social,nome_fantasia,email,senha,cnpj,contato_telefone,ramo_atividade,endereco,numero,bairro,cidade,estado,cep,data_fundacao,nome_representante)
                VALUES ('$razao','$nomefantasia','$email','$senhaCriptografada','$cnpj','$telefone','$ramo','$endereco','$numero','$bairro','$cidade','$estado','$cep','$dataFormatada','$representante')";

        $result = mysqli_query($conexao, $sql);
    }

    if ($result) {
        $mensagem = "<center><div class='alert alert-success' role='alert'>Cadastro realizado com sucesso!</div></center>";
        $redirecionamento .= "<meta http-equiv=refresh content='3;URL=loginEmpresa.php'>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Cadastro</title>
    <link rel="stylesheet" href="assets/css/cadastro-empresa.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once('paginas/header/header.php') ?>

    <div class="txt">
        <h1>Empresa</h1>
    </div>

    <?php
    include_once('paginas/section/empresa/cadastro.php');
    include_once('paginas/footer/footer.php');
    ?>

</body>

</html>

<script src="assets/js/cadastro.js"></script>