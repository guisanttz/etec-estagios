<?php 

    // verifica se o id da url é diferente de vazio, ou seja, se existe
    if (!empty($_GET['id'])) {

        // inclui o arquivo de conexão com o banco de dados
        include_once('conexao.php');
        
        // armazena o id da url em uma variável
        $idVaga = $_GET['id'];

        // deleta um registro da tabela vagas de acordo com o id da vaga
        $sqlDelete = "DELETE FROM vagas WHERE id_vaga = $idVaga";

        // executa o delete
        $resultadoDelete = mysqli_query($conexao, $sqlDelete);

        // se o delete for executado com sucesso, envia o usuario para a tela minhasVagas.php
        if ($resultadoDelete) {
            header('Location: minhasVagas.php?status=delsucesso');
            exit;
        }
    }

?>