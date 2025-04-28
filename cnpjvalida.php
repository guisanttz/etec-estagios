<?php
include_once("conexao.php");
session_start();
ini_set("display_errors", 0);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Valida CNPJ</title>
    <link rel="stylesheet" href="assets/css/cnpjvalida.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
    <!-- <style>
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;

        }

        input[type=number] {
            -moz-appearance: textfield;
            appearance: textfield;

        }
    </style> -->
</head>

<body>

    <?php include_once('paginas/header/header.php') ?>

    <div class="txt">
        <h1>Empresa</h1>
    </div>

    <?php
    
    include_once('paginas/section/empresa/cnpjvalida.php');
    include_once('paginas/footer/footer.php');

    ?>
    
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
<script src="assets/js/cnpjvalida.js"></script>
