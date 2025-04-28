<?php 

if (isset($_GET['tipo'])) {
    
    $tipo = $_GET['tipo'];

    if ($tipo === 'usuario') {
        $logout = "<meta http-equiv=refresh content='3;URL=logout.php?tipo=usuario'>";
    } elseif ($tipo === 'empresa') {
        $logout = "<meta http-equiv=refresh content='3;URL=logout.php?tipo=empresa'>";
    } elseif ($tipo === 'administrador') {
        $logout = "<meta http-equiv=refresh content='3;URL=logout.php?tipo=administrador'>";
    }

}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETEC Estágios - Saindo</title>
    <link rel="stylesheet" href="assets/css/saindo.css">
    <link rel="icon" href="img/eteclogo.png" type="image/png">
</head>

<body>

    <div class="mensagem-saindo">
        <h1>Saindo da conta, <br> aguarde enquanto a sua sessão é finalizada.</h1>
    </div>

    <?php echo $logout;  ?>

</body>

</html>