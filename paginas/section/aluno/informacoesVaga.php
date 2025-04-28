<section>
    <div class="informacoes-vaga">
        <div class="informacoes-tabela">

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
                    <p>Nome da Empresa</p>
                </div>
                <div class="celula">
                    <p><?php echo $nomeEmpresa ?></p>
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
                    <p><?php echo $horaEntradaFormatada ?> - <?php echo $horaSaidaFormatada ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula-maior">
                    <p>Descrição da Empresa</p>
                </div>
                <div class="celula-maior">
                    <p><?php echo $descricaoEmpresa ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula-maior">
                    <p>Descrição da Vaga</p>
                </div>
                <div class="celula-maior">
                    <p><?php echo $descricaoVaga ?></p>
                </div>
            </div>

            <!-- <div class="dado-tabela">
                <div class="celula">
                    <p>Logo da Empresa</p>
                </div>
                <div class="celula">
                    <p><?php echo $logoEmpresa ?></p>
                </div>
            </div>
            
            <div class="dado-tabela">
                <div class="celula">
                    <p>Arte da Vaga</p>
                </div>
                <div class="celula">
                    <p><?php echo $arteVaga ?></p>
                </div>
            </div> -->

            <div class="email">
                <h1>Envie o seu currículo para o e-mail abaixo: </h1>
                <br>
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $emailExibido ?>&su=Envio%20de%20Currículo" target="_blank">
                    <h3>
                        <?php echo $emailExibido ?>
                    </h3>
                </a>
            </div>

            <input type="hidden" id="tipo" value="<?php echo $_SESSION['tipo']; ?>">

        </div>
    </div>
</section>