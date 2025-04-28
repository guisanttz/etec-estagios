<?php

session_start();
include_once('conexao.php');

if (empty($_SESSION)) {
  header('Location: erro.php');
  exit;
}

// aramzena o id e o tipo de tabela em variaveis
$id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : null);
$tabela = isset($_GET['tabela']) ? $_GET['tabela'] : (isset($_POST['tabela']) ? $_POST['tabela'] : null);

// verifica se o botao de salvar foi clicado
if (isset($_POST['update'])) {


  function enviarArquivo($error, $size, $name, $tmp_name, $destino){
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



  // se a tabela for X, executa o codigo abaixo
  if ($tabela === 'administradores') {

    // armazena os dadso do formulario em variaveis
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // verifica se a senha foi alterada
    if (!empty($senha)) {
      // criptrografa a senha
      $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
      //  atualiza os dados
      $sqlUpdate = "UPDATE administradores SET nome='$nome',email='$email',senha='$senhaCriptografada',usuario='$usuario' WHERE id='$id'";
    } else {
      // atualiza os dados sem alterar a senha
      $sqlUpdate = "UPDATE administradores SET nome='$nome',email='$email',usuario='$usuario' WHERE id='$id'";
    }
    // msm coisa do codigo de cima
  } elseif ($tabela === 'usuarios') {

    $rm = $_POST['rm'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sexo = $_POST['sexo'];
    $serie = $_POST['serie'];
    $curso = $_POST['curso'];
    $anoInicioTermino = $_POST['ano-inicio-termino'];

    if (!empty($senha)) {
      $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
      $sqlUpdate = "UPDATE usuarios SET nome='$nome',rm='$rm',telefone='$telefone',email='$email',senha='$senhaCriptografada',sexo='$sexo',serie='$serie',curso='$curso',ano_inicio_termino='$anoInicioTermino' WHERE id='$id'";
    } else {
      $sqlUpdate = "UPDATE usuarios SET nome='$nome',rm='$rm',telefone='$telefone',email='$email',sexo='$sexo',serie='$serie',curso='$curso',ano_inicio_termino='$anoInicioTermino' WHERE id='$id'";
    }
  } elseif ($tabela === 'empresas') {

    $razaoSocial = $_POST['razao-social'];
    $nomeFantasia = $_POST['nome-fantasia'];
    $cnpj = $_POST['cnpj'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $contatoTelefone = $_POST['contato-telefone'];
    $inscricaoEstadual = $_POST['inscricao-estadual'];
    $ramoAtividade = $_POST['ramo-atividade'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $dataFundacao = $_POST['data-fundacao'];
    /* $dataFundacao = date('d/m/Y', strtotime($dataFundacao)); */
    $dataFundacao = date('Y/m/d', strtotime($dataFundacao));
    $nomeRepresentante = $_POST['nome-representante'];
    $contatoWhatsapp = $_POST['contato-whatsapp'];
    $perfilInstagram = $_POST['perfil-instagram'];
    $perfilFacebook = $_POST['perfil-facebook'];
    $perfilLinkedin = $_POST['perfil-linkedin'];

    if (!empty($senha)) {
      $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
      $sqlUpdate = "UPDATE empresas SET razao_social='$razaoSocial',nome_fantasia='$nomeFantasia',cnpj='$cnpj',email='$email',senha='$senhaCriptografada',inscricao_estadual='$inscricaoEstadual',contato_telefone='$contatoTelefone',contato_whatsapp='$contatoWhatsapp',perfil_instagram='$perfilInstagram',perfil_facebook='$perfilFacebook',perfil_linkedin='$perfilLinkedin',ramo_atividade='$ramoAtividade',endereco='$endereco',numero='$numero',bairro='$bairro',cidade='$cidade',estado='$estado',cep='$cep',data_fundacao='$dataFundacao',nome_representante='$nomeRepresentante' WHERE id='$id'";
    } else {
      $sqlUpdate = "UPDATE empresas SET razao_social='$razaoSocial',nome_fantasia='$nomeFantasia',cnpj='$cnpj',email='$email',inscricao_estadual='$inscricaoEstadual',contato_telefone='$contatoTelefone',contato_whatsapp='$contatoWhatsapp',perfil_instagram='$perfilInstagram',perfil_facebook='$perfilFacebook',perfil_linkedin='$perfilLinkedin',ramo_atividade='$ramoAtividade',endereco='$endereco',numero='$numero',bairro='$bairro',cidade='$cidade',estado='$estado',cep='$cep',data_fundacao='$dataFundacao',nome_representante='$nomeRepresentante' WHERE id='$id'";
    }
  } elseif ($tabela === "vagas") {

    $statusVaga = $_POST['status-vaga'];
    $area = $_POST['area'];
    $cargo = $_POST['cargo'];
    $email = $_POST['email'];
    $remunerado = $_POST['remunerado'];
    $valor = $_POST['valor'];
    $valor = str_replace('.', '', $valor); // Remove os pontos (separadores de milhar)
    $valor = str_replace(',', '.', $valor); // Troca os vírgulas por pontos
    $cidade = $_POST['cidade'];
    $endereco = $_POST['endereco'];
    $periodo = $_POST['periodo'];
    $horaEntrada = $_POST['hora-entrada'];
    $horaSaida = $_POST['hora-saida'];
    $descricaoEmpresa = $_POST['descricao-empresa'];
    $descricaoVaga = $_POST['descricao-vaga'];

    // Update dos dados da vaga
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
        } else {
          error_log("Erro ao atualizar/inserir arte: " . mysqli_error($conexao));
        }
      }
    }
  } elseif ($tabela === 'contratos') {

    $numeroContrato = $_POST['numero-contrato'];
    $idRmAluno = $_POST['id-rm-aluno'];
    $idAluno = explode(" -", $idRmAluno)[0];
    $idVagaCargo = $_POST['id-vaga-cargo'];
    $idVaga = explode(" -", $idVagaCargo)[0];
    $dataInicio = $_POST['data-inicio'];
    $dataTermino = $_POST['data-termino'];

    $sqlUpdate = "UPDATE contratos SET numero_contrato='$numeroContrato', id_aluno='$idAluno', id_vaga='$idVaga', data_inicio='$dataInicio', data_termino='$dataTermino' WHERE id='$id'";
  }
  $resultado = mysqli_query($conexao, $sqlUpdate);
}
header("Location: painel-{$tabela}.php?status=editsucesso");
exit;
