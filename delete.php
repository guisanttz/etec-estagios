<?php

// se o id e o tipo da tabela for diferente de vazio, executa o código abaixo
if (!empty($_GET['id']) && !empty($_GET['tabela'])) {

    // inclui o arquivo de conexão ocm o banco de dados
    include_once('conexao.php');

    // pega o id e o tipo da tabela da url da página e armazena em variáveis
    $id = $_GET['id'];
    $tabela = $_GET['tabela'];

    // verifica se a tabela é X, se for, faz um select onde o id é igual o id da url
    if ($tabela === 'administradores') {
        $sqlSelect = "SELECT * FROM administradores WHERE id = $id";
    } elseif ($tabela === 'usuarios') {
        $sqlSelect = "SELECT * FROM usuarios WHERE id = $id";
    } elseif ($tabela === 'empresas') {
        $sqlSelect = "SELECT * FROM empresas WHERE id = $id";
    } elseif ($tabela === 'vagas') {
        $sqlSelect = "SELECT * FROM vagas WHERE id_vaga = $id";
    } elseif ($tabela === 'contratos') {
        $sqlSelect = "SELECT * FROM contratos WHERE id = $id";
    }

    // executa o select
    $resultado = mysqli_query($conexao, $sqlSelect);

    // se tiver algum resultado, executa o código abaixo
    if (mysqli_num_rows($resultado) > 0) {

        // enquanto houver linha de resultados no banco de dados, executa o código abaixo
        while ($row = mysqli_fetch_assoc($resultado)) {

            // verifica se a tabela é X, se for, faz um delete onde o id é igual o id da url
            if ($tabela === 'administradores') {
                $sqlDelete = "DELETE FROM administradores WHERE id='$id'";
            } elseif ($tabela === 'usuarios') {
                $sqlDelete = "DELETE FROM usuarios WHERE id='$id'";
            } elseif ($tabela === 'empresas') {
                $sqlDelete = "DELETE FROM empresas WHERE id='$id'";
            } elseif ($tabela === 'vagas') {
                $sqlDelete = "DELETE FROM vagas WHERE id_vaga='$id'";
            } elseif ($tabela === 'contratos') {
                $sqlDelete = "DELETE FROM contratos WHERE id='$id'";
                $resultadoDelete = mysqli_query($conexao, $sqlDelete);
                if ($resultadoDelete) {
                    $sqlUpdateUsuario = "UPDATE usuarios SET id_contrato = NULL WHERE id_contrato = '$id'";
                    $resultadoUpdateUsuario = mysqli_query($conexao, $sqlUpdateUsuario);
                }

            }

            // executa o delete
            $resultadoDelete = mysqli_query($conexao, $sqlDelete);
        }
    }
}

// verifica se a tabela é X, se for, envia o usuário pro painel do tipo de tabela
if ($resultadoDelete) {
    if ($tabela === 'administradores') {
        header("Location: painel-administradores.php?status=delsucesso");
    } elseif ($tabela === 'usuarios') {
        header("Location: painel-usuarios.php?status=delsucesso");
    } elseif ($tabela === 'empresas') {
        header("Location: painel-empresas.php?status=delsucesso");
    } elseif ($tabela === 'vagas') {
        header("Location: painel-vagas.php?status=delsucesso");
    } elseif ($tabela === 'contratos') {
        header("Location: painel-contratos.php?status=delsucesso");
    }
    exit;
}
