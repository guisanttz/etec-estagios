<?php

session_start();
include_once('conexao.php');

// verifica se o rm na url é diferente de vazio, ou seja, se ele existe
if (!empty($_GET['rm'])) {

    // inclui o arquivo de conexao do banco de dados
    include_once('conexao.php');

    // pega o rm da url e armazena em uma variável
    $rmGet = $_GET['rm'];

    // faz o select na tabela de usuarios onde o rm é iguak o rm da url
    $sqlSelect = "SELECT * FROM usuarios WHERE rm = $rmGet";

    // executa o select
    $resultado = mysqli_query($conexao, $sqlSelect);

    // se tiver algum resultado, executa o código abaixo
    if (mysqli_num_rows($resultado) > 0) {

        // enquanto houver linha de resultados, executa o codigo abaixo
        while ($dado = mysqli_fetch_assoc($resultado)) {

            // pega todos os campos do registro e armazena em variáveis
            $id = $dado['id'];
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
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Editar Perfil</title>
    <link rel="stylesheet" href="assets/css/editarPerfilUsuario.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once('paginas/header/aluno.php'); ?>

    <div class="txt">
        <h1>Editar Perfil</h1>
    </div>

    <?php 
    
    include_once('paginas/section/aluno/editarPerfil.php');
    include_once('paginas/footer/footer.php');

    ?>

</body>

</html>
<script src="assets/js/sair.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
<script>
    document.getElementById('btn-fecha-modal').addEventListener('click', function() {
        window.location.href = "perfilUsuario.php";
    });
</script>