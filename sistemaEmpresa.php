<?php

session_start();

$logado = $_SESSION['id_empresa'];

if (empty($logado)) {
    header('Location: erro.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Sistema Empresa</title>
    <link rel="stylesheet" href="assets/css/sistemaEmpresa.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <?php include_once('paginas/header/empresa.php') ?>

    <div class="txt-boas-vindas">
        <h1>Olá, <?php echo $_SESSION['nome_fantasia'] ?></h1>
    </div>

    <?php

    include_once('paginas/section/empresa/sistema.php');
    include_once('paginas/footer/footer.php');

    ?>

</body>

</html>
<script src="assets/js/sair.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>