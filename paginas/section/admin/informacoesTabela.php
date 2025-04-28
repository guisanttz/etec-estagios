<section>

    <div class="tabela">

        <div class="topo-tabela">
            <div class="btn-voltar">
                <button id="btn-voltar">Voltar</button>
            </div>

            <div class="titulo">
                <?php
                if ($tabela === 'empresas') { ?>
                    <h1>Informações da Empresa</h1>
                <?php } elseif ($tabela === 'vagas') { ?>
                    <h1>Informações da Vaga</h1>
                <?php } elseif ($tabela === 'usuarios') { ?>
                    <h1>Informações do Aluno</h1>
                <?php } elseif ($tabela === 'contratos') { ?>
                    <h1>Informações do Contrato</h1>
                <?php } ?>
            </div>

            <div class="acoes">
                <?php

                if ($tabela === 'empresas') { ?>

                    <a href="edit.php?tabela=empresas&id=<?php echo $idEmpresa ?>">
                        <button id="editar"><i class='bx bxs-edit'></i></button>
                    </a>
                    <button class="deletar" id="deletar" tipoTabela='empresas' idRegistro='<?php echo $idEmpresa ?>'><i class='bx bxs-trash-alt'></i></button>

                <?php } elseif ($tabela === 'vagas') { ?>

                    <a href="edit.php?tabela=vagas&id=<?php echo $idVaga ?>">
                        <button id="editar"><i class='bx bxs-edit'></i></button>
                    </a>
                    <button class="deletar" id="deletar" tipoTabela='vagas' idRegistro='<?php echo $idVaga ?>'><i class='bx bxs-trash-alt'></i></button>

                <?php } elseif ($tabela === 'usuarios') {
                    echo "";
                } ?>
            </div>
        </div>

        <div class="informacoes-tabela">

            <?php if ($tabela === 'empresas') { ?>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>ID</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $idEmpresa ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Razão Social</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $razaoSocial ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Nome Fantasia</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $nomeFantasia ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>CNPJ</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $cnpj ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>E-mail</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $email ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Telefone</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $contatoTelefone ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Inscrição Estadual</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $inscricaoEstadual ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Ramo de Atividade</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $ramoAtividade ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Endereço</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $endereco ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Número</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $numero ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Bairro</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $bairro ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Cidade</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $cidade ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Estado</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $estado ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>CEP</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $cep ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Data de Fundação</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $dataFundacao ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Representante</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $nomeRepresentante ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>WhatsApp</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $contatoWhatsapp ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Instagram</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $perfilInstagram ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Facebook</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $perfilFacebook ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>LinkedIn</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $perfilLinkedin ?></p>
                    </div>
                </div>

            <?php } elseif ($tabela === 'vagas') { ?>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>ID</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $idVaga ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Status</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $statusVaga ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Área</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $area ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Cargo</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $cargo ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Empresa</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $nomeEmpresa ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>E-mail</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $email ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Remunerado</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $remunerado ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Valor</p>
                    </div>
                    <div class="celula">
                        <p>R$ <?php echo $valor ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Cidade</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $cidade ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Endereço</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $endereco ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Hora de Entrada/Saída</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $horaEntradaFormatada . " - " . $horaSaidaFormatada ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Descrição da Empresa</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $descricaoEmpresa ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Descrição da Vaga</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $descricaoVaga ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Logo da Empresa</p>
                    </div>
                    <div class="celula" style="display: flex; justify-content: center">
                        <img width="200" height="200" src="<?php echo $logoEmpresa ?>">
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Arte da Vaga</p>
                    </div>
                    <div class="celula" style="display: flex; justify-content: center">
                        <img width="200" height="200" src="<?php echo $arteVaga ?>">
                    </div>
                </div>

            <?php } elseif ($tabela === 'usuarios') { ?>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>ID</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $idAluno ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>RM</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $rm ?></p>
                    </div>
                </div>
                <div class="dado-tabela">
                    <div class="celula">
                        <p>Nome</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $nome ?></p>
                    </div>
                </div>
                <div class="dado-tabela">
                    <div class="celula">
                        <p>Telefone</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $telefone ?></p>
                    </div>
                </div>
                <div class="dado-tabela">
                    <div class="celula">
                        <p>E-mail</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $email ?></p>
                    </div>
                </div>
                <div class="dado-tabela">
                    <div class="celula">
                        <p>Sexo</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $sexo ?></p>
                    </div>
                </div>
                <div class="dado-tabela">
                    <div class="celula">
                        <p>Série</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $serie ?></p>
                    </div>
                </div>
                <div class="dado-tabela">
                    <div class="celula">
                        <p>Curso</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $curso ?></p>
                    </div>
                </div>
                <div class="dado-tabela">
                    <div class="celula">
                        <p>Ano de Início/Término</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $anoInicioTermino ?></p>
                    </div>
                </div>


            <?php } elseif ($tabela === 'contratos') { ?>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>ID</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $idContrato ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Número do Contrato</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $numeroContrato ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>ID/RM do Aluno</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $idDoAluno . ' - ' . $rmAluno ?></p>
                    </div>
                </div>

                <div class="dado-tabela">
                    <div class="celula">
                        <p>Data de Início</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $dataInicio?></p>
                    </div>
                </div>
                
                <div class="dado-tabela">
                    <div class="celula">
                        <p>Data de Término</p>
                    </div>
                    <div class="celula">
                        <p><?php echo $dataTermino?></p>
                    </div>
                </div>

        </div>
    <?php } ?>

    </div>

    </div>

</section>