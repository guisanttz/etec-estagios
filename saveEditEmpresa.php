<?php

include_once('conexao.php');

// verifica se o botao salvar foi clicado
if (isset($_POST['update'])) {
    // armazena os dados em variáveis
    $id = $_POST['id'];
    $razaoSocial = $_POST['razao-social'];
    $nomeFantasia = $_POST['nome-fantasia'];
    $cnpj = $_POST['cnpj'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $contatoTelefone = $_POST['contato-telefone'];
    $inscricaoEstadual = $_POST['inscricao-estadual'];
    $ramoAtividade = $_POST['ramo-atividade'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $dataFundacao = $_POST['data-fundacao'];
    /* $dataFundacao = date('d/m/Y', strtotime($dataFundacao)); */
    $dataFundacao = date('Y/m/d', strtotime($dataFundacao));
    $nomeRepresentante = $_POST['nome-representante'];
    $contatoWhatsapp = $_POST['contato-whatsapp'];
    $perfilInstagram = $_POST['perfil-instagram'];
    $perfilFacebook = $_POST['perfil-facebook'];
    $perfilLinkedin = $_POST['perfil-linkedin'];

    // verifica se a senha foi alterada
    if (!empty($senha)) {

        // criptografa a senha
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        // atualiza os dados na tabela empresas no banco de dados
        $sqlUpdate = "UPDATE empresas SET razao_social='$razaoSocial',nome_fantasia='$nomeFantasia',cnpj='$cnpj',email='$email',senha='$senhaCriptografada',inscricao_estadual='$inscricaoEstadual',contato_telefone='$contatoTelefone',contato_whatsapp='$contatoWhatsapp',perfil_instagram='$perfilInstagram',perfil_facebook='$perfilFacebook',perfil_linkedin='$perfilLinkedin',ramo_atividade='$ramoAtividade',endereco='$endereco',numero='$numero',bairro='$bairro',cidade='$cidade',estado='$estado',cep='$cep',data_fundacao='$dataFundacao',nome_representante='$nomeRepresentante' WHERE id='$id'";
    } else {

        // atualiza os dados na tabela empresas no banco de dados sem alterar a senha
        $sqlUpdate = "UPDATE empresas SET razao_social='$razaoSocial',nome_fantasia='$nomeFantasia',cnpj='$cnpj',email='$email',inscricao_estadual='$inscricaoEstadual',contato_telefone='$contatoTelefone',contato_whatsapp='$contatoWhatsapp',perfil_instagram='$perfilInstagram',perfil_facebook='$perfilFacebook',perfil_linkedin='$perfilLinkedin',ramo_atividade='$ramoAtividade',endereco='$endereco',numero='$numero',bairro='$bairro',cidade='$cidade',estado='$estado',cep='$cep',data_fundacao='$dataFundacao',nome_representante='$nomeRepresentante' WHERE id='$id'";
    }

    // executa o update
    $resultado = mysqli_query($conexao, $sqlUpdate);
}
if ($resultado) {
    header("Location: perfilEmpresa.php?status=editsucesso");
    exit;
} else {
    header("Location: perfilEmpresa.php");
    exit;
}