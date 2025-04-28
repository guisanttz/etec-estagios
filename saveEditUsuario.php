<?php

include_once('conexao.php');

// verifica se o botao salvar foi clicado 
if (isset($_POST['update'])) {

    // armazena os dados em variaveis
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $serie = $_POST['serie'];
    $curso = $_POST['curso'];
    $anoInicioTermino = $_POST['ano-inicio-termino'];
    $senha = $_POST['senha'];

    // verifica se a senha foi alterada
    if (!empty($senha)) {

        // criptografa a senha
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
        //  atualiza o registro no banco de dados
        $sqlUpdate = "UPDATE usuarios SET nome='$nome', telefone='$telefone', email='$email', sexo='$sexo', serie='$serie', curso='$curso', ano_inicio_termino='$anoInicioTermino', senha='$senhaCriptografada' WHERE id='$id'";
    } else {

        // atualiza o registro no banco de dados sem alterar a senha
        $sqlUpdate = "UPDATE usuarios SET nome='$nome', telefone='$telefone', email='$email', sexo='$sexo', serie='$serie', curso='$curso', ano_inicio_termino='$anoInicioTermino' WHERE id='$id'";
    }

    // executa o update
    $resultado = mysqli_query($conexao, $sqlUpdate);
}
if ($resultado) {
    header("Location: perfilUsuario.php?status=editsucesso");
    exit;
} else {
    header("Location: perfilUsuario.php");
    exit;
}