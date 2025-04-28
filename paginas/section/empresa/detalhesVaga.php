<section>

    <div class="tabela">

        <div class="topo-tabela">
            <div class="btn-voltar">
                <button id="btn-voltar" type="button">Voltar</button>
            </div>

            <div class="titulo">
                <h1>Detalhes da Vaga</h1>
            </div>
            
            <div class="acoes">
                <a href="editarVaga.php?id=<?php echo $idVaga ?>">
                    <button id="editar"><i class='bx bxs-edit'></i></button>
                </a>
                <button class="deletar" id="deletar" tipoTabela='vagas' type="button" idRegistro='<?php echo $idVaga ?>'><i class='bx bxs-trash-alt'></i></button>
            </div>
        </div>

        <div class="informacoes-tabela">

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
                    <p>Período</p>
                </div>
                <div class="celula">
                    <p><?php echo $periodo ?></p>
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
                    <p>Descrição da Vaga</p>
                </div>
                <div class="celula">
                    <p><?php echo $descricaoVaga ?></p>
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

        </div>
    </div>

</section>