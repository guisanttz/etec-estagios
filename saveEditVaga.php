<?php
include_once('conexao.php');

if (isset($_POST['update'])) {

    function enviarArquivo($error, $size, $name, $tmp_name, $destino)
    {
        // Verifica se houve erro no upload
        if ($error !== UPLOAD_ERR_OK) {
            return false;
        }

        // Restante do código permanece igual
        if ($size > 2097152) {
            return "Arquivo muito grande! Max: 2MB";
        }

        $extensao = strtolower(pathinfo($name, PATHINFO_EXTENSION));

        if (!in_array($extensao, ['jpg', 'png', 'jpeg'])) {
            return "Tipo de arquivo não aceito";
        }

        $novoNomeDoArquivo = uniqid() . "." . $extensao;
        $path = $destino . $novoNomeDoArquivo;

        if (move_uploaded_file($tmp_name, $path)) {
            return $novoNomeDoArquivo;
        } else {
            return false;
        }
    }

    $id = $_POST['id'];
    $statusVaga = $_POST['status-vaga'];
    $area = $_POST['area'];
    $cargo = $_POST['cargo'];
    $email = $_POST['email'];
    $remunerado = $_POST['remunerado'];
    $valor = $_POST['valor'];
    $valor = str_replace('.', '', $valor); // Remove os pontos (separadores de milhar)
    $valor = str_replace(',', '.', $valor); // Troca os vírgulas por pontos
    $periodo = $_POST['periodo'];
    $cidade = $_POST['cidade'];
    $endereco = $_POST['endereco'];
    $descricaoEmpresa  = $_POST['descricao-empresa'];
    $descricaoVaga = $_POST['descricao-vaga'];
    /* $horaEntrada = date("G\h\r", strtotime($_POST_vaga['hora_entrada']));
                $horaSaida = date("G\h\r", strtotime($_POST_vaga['hora_saida'])); */
    $horaEntrada =  $_POST['hora-entrada'];
    $horaSaida =  $_POST['hora-saida'];

    $sqlUpdate = "UPDATE vagas SET area = '$area', cargo = '$cargo', email = '$email', remunerado = '$remunerado', valor = '$valor', cidade = '$cidade', endereco = '$endereco', periodo = '$periodo', hora_entrada = '$horaEntrada', hora_saida = '$horaSaida', descricao_empresa = '$descricaoEmpresa', descricao_vaga = '$descricaoVaga', status_vaga = '$statusVaga' WHERE id_vaga = '$id'";

    $updateSuccess = false;

    if (!empty($_FILES['logo']['name'])) {
        $logo = enviarArquivo(
            $_FILES['logo']['error'],
            $_FILES['logo']['size'],
            $_FILES['logo']['name'],
            $_FILES['logo']['tmp_name'],
            'img/logos-artes/'
        );

        if ($logo) {
            // Verifica se já existe registro de logo para esta vaga
            $sqlVerificaLogo = "SELECT COUNT(*) as count FROM imagens WHERE id_vaga = '$id' AND tipo = 'logo'";
            $resultVerificaLogo = mysqli_query($conexao, $sqlVerificaLogo);
            $logoExiste = mysqli_fetch_assoc($resultVerificaLogo)['count'];

            if ($logoExiste > 0) {
                // Se logo existe, atualiza
                $sqlBuscaLogoAntiga = "SELECT path FROM imagens WHERE id_vaga = '$id' AND tipo = 'logo'";
                $resultBuscaLogoAntiga = mysqli_query($conexao, $sqlBuscaLogoAntiga);
                $logoAntiga = mysqli_fetch_assoc($resultBuscaLogoAntiga)['path'];

                // Remove logo antiga do servidor
                if (file_exists($logoAntiga)) {
                    unlink($logoAntiga);
                }

                // Atualiza registro da logo
                $sqlUpdateLogo = "UPDATE imagens 
                                SET nome = '$logo', 
                                    path = 'img/logos-artes/$logo' 
                                WHERE id_vaga = '$id' AND tipo = 'logo'";
                $resultUpdateLogo = mysqli_query($conexao, $sqlUpdateLogo);
            } else {
                // Se logo não existe, insere novo registro
                $sqlInsertLogo = "INSERT INTO imagens (id_vaga, nome, path, tipo) 
                                VALUES ('$id', '$logo', 'img/logos-artes/$logo', 'logo')";
                $resultUpdateLogo = mysqli_query($conexao, $sqlInsertLogo);
            }

            if ($resultUpdateLogo) {
                $updateSuccess = true;
            } else {
                error_log("Erro ao atualizar/inserir logo: " . mysqli_error($conexao));
            }
        }
    }

    // Verificação e upload de arte (mesma lógica da logo)
    if (!empty($_FILES['art']['name'])) {
        $art = enviarArquivo(
            $_FILES['art']['error'],
            $_FILES['art']['size'],
            $_FILES['art']['name'],
            $_FILES['art']['tmp_name'],
            'img/logos-artes/'
        );

        if ($art) {
            // Verifica se já existe registro de arte para esta vaga
            $sqlVerificaArte = "SELECT COUNT(*) as count FROM imagens WHERE id_vaga = '$id' AND tipo = 'arte'";
            $resultVerificaArte = mysqli_query($conexao, $sqlVerificaArte);
            $arteExiste = mysqli_fetch_assoc($resultVerificaArte)['count'];

            if ($arteExiste > 0) {
                // Se arte existe, atualiza
                $sqlBuscaArteAntiga = "SELECT path FROM imagens WHERE id_vaga = '$id' AND tipo = 'arte'";
                $resultBuscaArteAntiga = mysqli_query($conexao, $sqlBuscaArteAntiga);
                $arteAntiga = mysqli_fetch_assoc($resultBuscaArteAntiga)['path'];

                // Remove arte antiga do servidor
                if (file_exists($arteAntiga)) {
                    unlink($arteAntiga);
                }

                // Atualiza registro da arte
                $sqlUpdateArt = "UPDATE imagens 
                               SET nome = '$art', 
                                   path = 'img/logos-artes/$art' 
                               WHERE id_vaga = '$id' AND tipo = 'arte'";
                $resultUpdateArt = mysqli_query($conexao, $sqlUpdateArt);
            } else {
                // Se arte não existe, insere novo registro
                $sqlInsertArte = "INSERT INTO imagens (id_vaga, nome, path, tipo) 
                                VALUES ('$id', '$art', 'img/logos-artes/$art', 'arte')";
                $resultUpdateArt = mysqli_query($conexao, $sqlInsertArte);
            }

            if ($resultUpdateArt) {
                $updateSuccess = true;
            }
        }
    }
    $resultado = mysqli_query($conexao, $sqlUpdate);
}
header("Location: minhasVagas.php?status=editsucesso");
exit;