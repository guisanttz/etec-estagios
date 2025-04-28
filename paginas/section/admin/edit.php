<section>

    <form action="saveEdit.php" method="POST" enctype="multipart/form-data">

        <h1>Editar <?php echo $nomeTabela ?></h1><br>

        <?php if ($tabela === 'administradores') { ?>

            <div class="flex">

                <label>
                    <p>Nome</p>
                    <input class="input" type="text" name="nome" id="nome" value="<?php echo $nome ?>" required>
                </label>


                <label>
                    <p>E-mail</p>
                    <input class="input" type="email" name="email" value="<?php echo $email ?>" required>
                </label>

            </div>

            <div class="flex">

                <label>
                    <p>Usuário</p>
                    <input class="input" type="text" name="usuario" id="usuario" value="<?php echo $usuario ?>" required>
                </label>

                <label>
                    <p>Nova Senha</p>
                    <input class="input" type="text" id="senha" name="senha" value="">
                </label>

            </div>

            <div class="flex">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="tabela" value="administradores">

                <div class="cancela-cadastra">
                    <button type="button" class="btn-modal" id="btn-fecha-modal">Voltar</button>

                    <button class="btn-modal" id="btn-cadastro">
                        <input type="submit" id="submit" name="update" value="Salvar">
                    </button>

                </div>

            </div>

        <?php } elseif ($tabela === 'usuarios') { ?>

            <div class="flex">

                <label>
                    <p>RM</p>
                    <input class="input" type="text" name="rm" id="rm" minlength="5" maxlength="5" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?php echo $rm ?>" required>
                </label>

                <label>
                    <p>Nome</p>
                    <input class="input" type="text" name="nome" id="nome" value="<?php echo $nome ?>" required>
                </label>

                <label>
                    <p>Sexo</p>
                    <select class="input" name="sexo" id="sexo" required>
                        <option value="Masculino" <?php if ($sexo == "Masculino") echo 'selected'; ?>>Masculino</option>
                        <option value="Feminino" <?php if ($sexo == "Feminino") echo 'selected'; ?>>Feminino</option>
                        <option value="Outro" <?php if ($sexo == "Outro") echo 'selected'; ?>>Outro</option>
                    </select>
                </label>

                <label>
                    <p>E-mail</p>
                    <input class="input" type="email" name="email" value="<?php echo $email ?>" required>
                </label>

            </div>

            <div class="flex">

                <label>
                    <p>Telefone</p>
                    <input class="input" type="tel" name="telefone" id="telefone" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}" value="<?php echo $telefone ?>" />
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
                    <script type="text/javascript">
                        $("#telefone").mask("(00) 00000-0000");
                    </script>
                </label>

                <label>
                    <p>Série</p>
                    <select class="input" name="serie" id="serie" required>
                        <option value="1º Ano" <?php if ($serie == "1º Ano") echo 'selected'; ?>>1º Ano</option>
                        <option value="2º Ano" <?php if ($serie == "2º Ano") echo 'selected'; ?>>2º Ano</option>
                        <option value="3º Ano" <?php if ($serie == "3º Ano") echo 'selected'; ?>>3º Ano</option>
                    </select>
                </label>

                <label>
                    <p>Curso</p>
                    <select class="input" name="curso" id="curso">
                        <!-- <option value="Administração" <?php if ($curso == "Administração") echo 'selected'; ?>>Administração</option>
                    <option value="Administração | AMS | M-Tec" <?php if ($curso == "Administração | AMS | M-Tec") echo 'selected'; ?>>Administração | AMS | M-Tec</option>
                    <option value="Informática para Internet | M-Tec" <?php if ($curso == "Informática para Internet | M-Tec") echo 'selected'; ?>>Informática para Internet | M-Tec</option>
                    <option value="Marketing" <?php if ($curso == "Marketing") echo 'selected'; ?>>Marketing</option>
                    <option value="Marketing | AMS | M-Tec" <?php if ($curso == "Marketing | AMS | M-Tec") echo 'selected'; ?>>Marketing | AMS | M-Tec</option>
                    <option value="Contabilidade" <?php if ($curso == "Contabilidade") echo 'selected'; ?>>Contabilidade</option>
                    <option value="Programação de Jogos Digitais" <?php if ($curso == "Programação de Jogos Digitais") echo 'selected'; ?>>Programação de Jogos Digitais</option>
                    <option value="Redes de Computadores" <?php if ($curso == "Redes de Computadores") echo 'selected'; ?>>Redes de Computadores</option>
                    <option value="Serviços Jurídicos" <?php if ($curso == "Serviços Jurídicos") echo 'selected'; ?>>Serviços Jurídicos</option>
                    <option value="Transações Imobiliárias" <?php if ($curso == "Transações Imobiliárias") echo 'selected'; ?>>Transações Imobiliárias</option>
                    <option value="Recursos Humanos" <?php if ($curso == "Recursos Humanos") echo 'selected'; ?>>Recursos Humanos</option> -->
                        <option value="Informática para Internet" <?php if ($curso == "Informática para Internet") echo 'selected'; ?>>Informática para Internet</option>
                        <option value="Administração" <?php if ($curso == "Administração") echo 'selected'; ?>>Administração</option>
                        <option value="Marketing" <?php if ($curso == "Marketing") echo 'selected'; ?>>Marketing</option>
                    </select>
                </label>

                <label>
                    <p>Início/Término</p>
                    <input class="input" type="text" name="ano-inicio-termino" id="ano-inicio-termino" pattern="[0-9]{4} - [0-9]{4}" value="<?php echo $anoInicioTermino ?>" placeholder="0000 - 0000" required>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
                    <script type="text/javascript">
                        $("#ano-inicio-termino").mask("0000 - 0000");
                    </script>
                </label>


            </div>


            <div class="flex">
                <label>
                    <p>Nova Senha</p>
                    <input class="input" type="text" id="senha" name="senha">
                </label>

                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="tabela" value="usuarios">

                <div class="cancela-cadastra">
                    <button type="button" class="btn-modal" id="btn-fecha-modal">Voltar</button>

                    <button class="btn-modal" id="btn-cadastro">
                        <input type="submit" id="submit" name="update" value="Salvar">
                    </button>

                </div>

            </div>

        <?php } elseif ($tabela === 'empresas') { ?>

            <div class="flex">
                <label>
                    <p>Razão Social</p>
                    <input class="input" type="text" name="razao-social" id="razao-social" value="<?php echo $razaoSocial ?>" required>
                </label>

                <label>
                    <p>Nome Fantasia</p>
                    <input class="input" type="text" name="nome-fantasia" id="nome-fantasia" value="<?php echo $nomeFantasia ?>" required>
                </label>

                <label>
                    <p>CNPJ</p>
                    <input class="input" type="text" name="cnpj" id="cnpj" pattern="\d{2}\.\d{3}\.\d{3}/\d{4}-\d{2}" value="<?php echo $cnpj ?>" required>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
                    <script type="text/javascript">
                        $("#cnpj").mask("00.000.000/0000-00");
                    </script>
                </label>

                <label>
                    <p>Email</p>
                    <input class="input" type="email" name="email" value="<?php echo $email ?>" required>
                </label>

                <label>
                    <p>Telefone</p>
                    <input class="input" type="tel" name="contato-telefone" id="telefone" pattern="\d{4}-\d{4}" value="<?php echo $contatoTelefone ?>" required>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
                    <script type="text/javascript">
                        $("#telefone").mask("0000-0000");
                    </script>
                </label>

            </div>

            <div class="flex">

                <label>
                    <p>Inscrição Estadual</p>
                    <input class="input" type="text" name="inscricao-estadual" id="inscricao-estadual" value="<?php echo $inscricaoEstadual ?>" required>
                </label>

                <label>
                    <p>Endereço</p>
                    <input class="input" type="text" name="endereco" id="endereco" value="<?php echo $endereco ?>" required>
                </label>

                <label>
                    <p>Número</p>
                    <input class="input" type="text" name="numero" id="numero" value="<?php echo $numero ?>">
                </label>

                <label>
                    <p>Bairro</p>
                    <input class="input" type="text" name="bairro" id="bairro" value="<?php echo $bairro ?>" required>
                </label>

                <label>
                    <p>Cidade</p>
                    <input class="input" type="text" name="cidade" id="cidade" value="<?php echo $cidade ?>" required>
                </label>

            </div>

            <div class="flex">

                <label>
                    <p>Estado (Sigla)</p>
                    <select class="input" name="estado" id="estado">
                        <option value="AC" <?php if ($estado == "AC") echo 'selected'; ?>>Acre (AC)</option>
                        <option value="AL" <?php if ($estado == "AL") echo 'selected'; ?>>Alagoas (AL)</option>
                        <option value="AP" <?php if ($estado == "AP") echo 'selected'; ?>>Amapá (AP)</option>
                        <option value="AM" <?php if ($estado == "AM") echo 'selected'; ?>>Amazonas (AM)</option>
                        <option value="BA" <?php if ($estado == "BA") echo 'selected'; ?>>Bahia (BA)</option>
                        <option value="CE" <?php if ($estado == "CE") echo 'selected'; ?>>Ceará (CE)</option>
                        <option value="DF" <?php if ($estado == "DF") echo 'selected'; ?>>Distrito Federal (DF)</option>
                        <option value="ES" <?php if ($estado == "ES") echo 'selected'; ?>>Espírito Santo (ES)</option>
                        <option value="GO" <?php if ($estado == "GO") echo 'selected'; ?>>Goiás (GO)</option>
                        <option value="MA" <?php if ($estado == "MA") echo 'selected'; ?>>Maranhão (MA)</option>
                        <option value="MT" <?php if ($estado == "MT") echo 'selected'; ?>>Mato Grosso (MT)</option>
                        <option value="MS" <?php if ($estado == "MS") echo 'selected'; ?>>Mato Grosso do Sul (MS)</option>
                        <option value="MG" <?php if ($estado == "MG") echo 'selected'; ?>>Minas Gerais (MG)</option>
                        <option value="PA" <?php if ($estado == "PA") echo 'selected'; ?>>Pará (PA)</option>
                        <option value="PB" <?php if ($estado == "PB") echo 'selected'; ?>>Paraíba (PB)</option>
                        <option value="PR" <?php if ($estado == "PR") echo 'selected'; ?>>Paraná (PR)</option>
                        <option value="PE" <?php if ($estado == "PE") echo 'selected'; ?>>Pernambuco (PE)</option>
                        <option value="PI" <?php if ($estado == "PI") echo 'selected'; ?>>Piauí (PI)</option>
                        <option value="RJ" <?php if ($estado == "RJ") echo 'selected'; ?>>Rio de Janeiro (RJ)</option>
                        <option value="RN" <?php if ($estado == "RN") echo 'selected'; ?>>Rio Grande do Norte (RN)</option>
                        <option value="RS" <?php if ($estado == "RS") echo 'selected'; ?>>Rio Grande do Sul (RS)</option>
                        <option value="RO" <?php if ($estado == "RO") echo 'selected'; ?>>Rondônia (RO)</option>
                        <option value="RR" <?php if ($estado == "RR") echo 'selected'; ?>>Roraima (RR)</option>
                        <option value="SC" <?php if ($estado == "SC") echo 'selected'; ?>>Santa Catarina (SC)</option>
                        <option value="SP" <?php if ($estado == "SP") echo 'selected'; ?>>São Paulo (SP)</option>
                        <option value="SE" <?php if ($estado == "SE") echo 'selected'; ?>>Sergipe (SE)</option>
                        <option value="TO" <?php if ($estado == "TO") echo 'selected'; ?>>Tocantins (TO)</option>
                    </select>
                </label>

                <label>
                    <p>CEP</p>
                    <input class="input" type="text" name="cep" id="cep" value="<?php echo $cep ?>" pattern="\d{5}-\d{3}" required>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
                    <script type="text/javascript">
                        $("#cep").mask("00000-000");
                    </script>
                </label>

                <label>
                    <p>Ramo de Atividade</p>
                    <input class="input" type="text" name="ramo-atividade" id="ramo-atividade" value="<?php echo $ramoAtividade ?>" required>
                </label>

                <label>
                    <p>Data de Fundação</p>
                    <input class="input" type="date" name="data-fundacao" id="data-fundacao" value="<?php echo $dataFundacao ?>" required>
                </label>


            </div>

            <div class="flex">

                <label>
                    <p>Nome Representante</p>
                    <input class="input" type="text" name="nome-representante" id="nome-representante" value="<?php echo $nomeRepresentante ?>" required>
                </label>

                <label>
                    <p>WhatsApp</p>
                    <input class="input" type="tel" name="contato-whatsapp" id="whatsapp" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}" value="<?php echo $contatoWhatsapp ?>" />
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

                    <script type="text/javascript">
                        $("#whatsapp").mask("(00) 00000-0000");
                    </script>
                </label>

                <label>
                    <p>Instagram</p>
                    <input class="input" type="text" name="perfil-instagram" id="instagram" value="<?php echo $perfilInstagram ?>" required>
                </label>

                <label>
                    <p>Facebook</p>
                    <input class="input" type="text" name="perfil-facebook" id="facebook" value="<?php echo $perfilFacebook ?>" required>
                </label>

            </div>

            <div class="flex">

                <label>
                    <p>LinkedIn</p>
                    <input class="input" type="text" name="perfil-linkedin" id="linkedin" value="<?php echo $perfilLinkedin ?>" required>
                </label>

                <label>
                    <p>Nova Senha</p>
                    <input class="input" type="text" name="senha" id="senha">
                </label>

                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="tabela" value="empresas">

                <div class="cancela-cadastra">
                    <button type="button" class="btn-modal" id="btn-fecha-modal">Voltar</button>

                    <button class="btn-modal" id="btn-cadastro">
                        <input type="submit" id="submit" name="update" value="Salvar">
                    </button>

                </div>
            </div>

        <?php } elseif ($tabela === 'vagas') { ?>

            <div class="flex">

                <label>
                    <p>Status</p>
                    <select class="input" name="status-vaga" id="status-vaga" required>
                        <option value="Disponível" <?php if ($statusVaga == "Disponível") echo 'selected'; ?>>Disponível</option>
                        <option value="Ocupada" <?php if ($statusVaga == "Ocupada") echo 'selected'; ?>>Ocupada</option>
                    </select>
                </label>

                <label>
                    <p>Área</p>
                    <input class="input" type="text" name="area" id="area" value="<?php echo $area ?>" required>
                </label>

                <label>
                    <p>Cargo</p>
                    <input class="input" type="text" name="cargo" id="cargo" value="<?php echo $cargo ?>" required>
                </label>

                <label>
                    <p>Email</p>
                    <input class="input" type="email" name="email" id="email" value="<?php echo $email ?>" required>
                </label>


                <label>
                    <p>Remunerado</p>
                    <select class="input" name="remunerado" id="remunerado" required>
                        <option value="Sim" <?php if ($remunerado == "Sim") echo 'selected'; ?>>Sim</option>
                        <option value="Não" <?php if ($remunerado == "Não") echo 'selected'; ?>>Não</option>
                    </select>
                </label>

                <label>
                    <p>Valor</p>
                    <input class="input" type="text" name="valor" id="valor" pattern="^\d{1,3}(\.\d{3})*,\d{2}$" value="<?php echo $valor ?>" />

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
                    <script type="text/javascript">
                        $("#valor").mask('#.##0,00', {
                            reverse: true
                        });
                    </script>
                </label>
            </div>

            <div class="flex">
                <label>
                    <p>Cidade</p>
                    <input class="input" type="text" name="cidade" id="cidade" value="<?php echo $cidadeVaga ?>" required>
                </label>

                <label>
                    <p>Endereço</p>
                    <input class="input" type="text" name="endereco" id="endereco" value="<?php echo $enderecoVaga ?>" required>
                </label>

                <label>
                    <p>Período</p>
                    <select class="input" name="periodo" id="periodo" required>
                        <option value="Manhã" <?php if ($periodo == "Manhã") echo 'selected'; ?>>Manhã</option>
                        <option value="Tarde" <?php if ($periodo == "Tarde") echo 'selected'; ?>>Tarde</option>
                        <option value="Noite" <?php if ($periodo == "Noite") echo 'selected'; ?>>Noite</option>
                        <option value="Integral" <?php if ($periodo == "Integral") echo 'selected'; ?>>Integral</option>
                    </select>
                </label>

                <label>
                    <p>Hora Entrada</p>
                    <input class="input" type="time" name="hora-entrada" id="hora-entrada" value="<?php echo $horaEntrada ?>" required>
                </label>

                <label>
                    <p>Hora Saída</p>
                    <input class="input" type="time" name="hora-saida" id="hora-saida" value="<?php echo $horaSaida ?>" required>
                </label>
            </div>

            <div class="flex">
                <label>
                    <p>Descrição da Empresa</p>
                    <textarea class="input" name="descricao-empresa" id="descricao-empresa"><?php echo $descricaoEmpresa ?></textarea>
                </label>

                <label>
                    <p>Descrição da Vaga</p>
                    <textarea class="input" name="descricao-vaga" id="descricao-vaga"><?php echo $descricaoVaga ?></textarea>
                </label>
            </div>


            <div class="flex">
                <label>
                    <p>Logo da Empresa</p>
                    <label for="file-logo" class="custum-file-upload">
                        <div class="icon">
                            <svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" fill=""></path>
                                </g>
                            </svg>
                        </div>
                        <div class="text">
                            <span id="file-name-logo">Clique para fazer o upload</span>
                        </div>
                        <input id="file-logo" type="file" name="logo" accept="image/jpeg,image/png">
                    </label>
                </label>

                <label>
                    <p>Arte da Vaga</p>
                    <label for="file-art" class="custum-file-upload">
                        <div class="icon">
                            <svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" fill=""></path>
                                </g>
                            </svg>
                        </div>
                        <div class="text">
                            <span id="file-name-art">Clique para fazer o upload</span>
                        </div>
                        <input id="file-art" type="file" name="art" accept="image/jpeg,image/png">
                    </label>
                </label>
            </div>

            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="tabela" value="vagas">

            <div class="cancela-cadastra">
                <button type="button" class="btn-modal" id="btn-fecha-modal">Voltar</button>

                <button class="btn-modal" id="btn-cadastro">
                    <input type="submit" id="submit" name="update" value="Salvar">
                </button>
            </div>


        <?php } elseif ($tabela === 'contratos') { ?>

            <div class="flex">

                <label>
                    <p>Número do Contrato</p>
                    <input class="input" type="text" name="numero-contrato" id="numero-contrato" placeholder="Número do Contrato" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?php echo $numeroContrato ?>" required>
                </label>

                <label>
                    <p>ID/RM do Aluno</p>
                    <input list="id_alunos" class="input" type="text" name="id-rm-aluno" id="id-aluno" placeholder="ID/RM do Aluno" value="<?php echo $idAluno . ' - ' . $rmAluno ?>" required>
                    <datalist name="id" id="id_alunos" class="input">
                        <?php
                        if (mysqli_num_rows($executaIdAlunos) > 0) {
                            while ($idAlunos = mysqli_fetch_assoc($executaIdAlunos)) { ?>
                                <option><?php echo $idAlunos['id'] . ' - ' . $idAlunos['rm'] ?></option>
                        <?php }
                        } ?>
                    </datalist>
                </label>

                <label>
                    <p>ID/Cargo da Vaga</p>
                    <input list="id_vagas" class="input" type="text" name="id-vaga-cargo" id="id" placeholder="Id/Cargo da Vaga" value="<?php echo $idVaga . ' - ' . $cargoVaga ?>">
                    <datalist name="vaga" id="id_vagas" class="input">
                        <?php
                        if (mysqli_num_rows($executaIdVagas) > 0) {
                            while ($idsVagas = mysqli_fetch_assoc($executaIdVagas)) { ?>
                                <option><?php echo $idsVagas['id_vaga'] . ' - ' . $idsVagas['cargo'] ?></option>
                        <?php }
                        }
                        ?>
                    </datalist>
                </label>
            </div>

            <div class="flex">

                <label>
                    <p>Data de Início</p>
                    <input class="input" type="date" name="data-inicio" id="data-inicio" value="<?php echo $dataInicio ?>">
                </label>

                <label>
                    <p>Data de Término</p>
                    <input class="input" type="date" name="data-termino" id="data-termino" value="<?php echo $dataTermino ?>">
                </label>

            </div>

            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="tabela" value="contratos">

            <div class="flex">

                <div class="cancela-cadastra">
                    <button type="button" class="btn-modal" id="btn-fecha-modal">Voltar</button>

                    <button class="btn-modal" id="btn-cadastro">
                        <input type="submit" id="submit" name="update" value="Salvar">
                    </button>
                </div>

            </div>

        <?php } ?>

    </form>
</section>