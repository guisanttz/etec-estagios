<?php

// define as variaveis que serão utilizadas para conectar com o banco
$dbHost = "localhost";
$user = "root";
$password = "";
$dbName = "etecestagios";

$conexao = new mysqli($dbHost, $user, $password, $dbName);
// verifica se deu erro na conexao
if ($conexao->connect_errno) {
    // exibe mensagem de falha junto com o erro que ocorreu
    echo "Falha ao conectar: (" . $conexao->connect_errno . ") " . $conexao->connect_error;
} else {
    /* echo "Conectado!"; */
}
?>