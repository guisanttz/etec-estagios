<?php

session_start();
include_once('conexao.php');

// armazena a sessao rm em uma variavel
$rm = $_SESSION['rm'];
// faz um select na tabela usuarios onde o rm é igual o rm armazenado na sessao
$sqlSelect = "SELECT * FROM usuarios WHERE rm = '$rm'";
// executa o select
$resultado = mysqli_query($conexao, $sqlSelect);

// se houver algum resultado, executa o código abaixo
if (mysqli_num_rows($resultado) > 0) {

    // enquanto houver linhas de resultados, executa o código abaixo
    while ($dadoUsuario = mysqli_fetch_assoc($resultado)) {

        // armazena os dados em variaveis
        $rm = $dadoUsuario['rm'];
        $nome = $dadoUsuario['nome'];
        $telefone = $dadoUsuario['telefone'];
        $email = $dadoUsuario['email'];
        $senha = $dadoUsuario['senha'];
        $sexo = $dadoUsuario['sexo'];
        $serie = $dadoUsuario['serie'];
        $curso = $dadoUsuario['curso'];
        $anoInicioTermino = $dadoUsuario['ano_inicio_termino'];
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Meu Perfil</title>
    <link rel="stylesheet" href="assets/css/perfilUsuario.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once('paginas/header/aluno.php'); ?>

    <div class="txt">
        <h1>Meu Perfil</h1>
    </div>

    <?php

    include_once('paginas/section/aluno/perfil.php');
    include_once('paginas/footer/footer.php');

    ?>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
<script src="assets/js/sair.js"></script>
<script src="assets/js/perfilUsuario.js"></script>