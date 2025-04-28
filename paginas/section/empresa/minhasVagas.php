<section>
    <?php

    if (mysqli_num_rows($executaConsulta) > 0) {
        while ($dado_vaga = mysqli_fetch_assoc($executaConsulta)) {

            $horaEntrada = date("G\h\r", strtotime($dado_vaga['hora_entrada']));
            $horaSaida = date("G\h\r", strtotime($dado_vaga['hora_saida']));

    ?>
            <div class="vaga">

                <div class="informacoes-vaga">

                    <div class="dado-vaga">
                        <div class="celula">
                            <p>Status</p>
                        </div>
                        <div class="celula">
                            <p><?php echo $dado_vaga['status_vaga']; ?></p>
                        </div>
                    </div>

                    <div class="dado-vaga">
                        <div class="celula">
                            <p>Área</p>
                        </div>
                        <div class="celula">
                            <p><?php echo $dado_vaga['area'] ?></p>
                        </div>
                    </div>

                    <div class="dado-vaga">
                        <div class="celula">
                            <p>Cargo</p>
                        </div>
                        <div class="celula">
                            <p><?php echo $dado_vaga['cargo'] ?></p>
                        </div>
                    </div>

                    <div class="dado-vaga">
                        <div class="celula">
                            <p>Empresa</p>
                        </div>
                        <div class="celula">
                            <p><?php echo $dado_vaga['nome_fantasia'] ?></p>
                        </div>
                    </div>

                    <div class="dado-vaga">
                        <div class="celula">
                            <p>Remuneração</p>
                        </div>
                        <div class="celula">
                            <p>R$ <?php echo $dado_vaga['valor'] ?></p>
                        </div>
                    </div>

                    <div class="dado-vaga">
                        <div class="celula">
                            <p>Período</p>
                        </div>
                        <div class="celula">
                            <p><?php echo $dado_vaga['periodo'] ?></p>
                        </div>
                    </div>

                    <div class="dado-vaga">
                        <div class="celula">
                            <p>Horário de Entrada/Saída</p>
                        </div>
                        <div class="celula">
                            <p><?php echo $horaEntrada . " - " . $horaSaida ?></p>
                        </div>
                    </div>

                    <div class="dado-vaga">
                        <div class="celula">
                            <p>Cidade</p>
                        </div>
                        <div class="celula">
                            <p><?php echo $dado_vaga['cidade'] ?></p>
                        </div>
                    </div>

                    <div class="dado-vaga">
                        <div class="celula">
                            <p>Endereço</p>
                        </div>
                        <div class="celula">
                            <p><?php echo $dado_vaga['endereco'] ?></p>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="<?php $dado_vaga['id_vaga'] ?>">

                    <div class="btn-vaga">
                        <a href="detalhesVaga.php?&id=<?php echo $dado_vaga['id_vaga'] ?>">
                            <button class="mais-detalhes" id="mais-detalhes">Mais Detalhes</button>
                        </a>
                    </div>
                </div>
            </div>

        <?php };
    } else { ?>

        <div class="mensagem">
            <h1>Não há vagas cadastradas ainda</h1><br>
            <a href="empresa.php">
                <button>Cadastrar Vaga</button>
            </a>
        </div>

    <?php } ?>

    <input type="hidden" id="tipo" value="<?php echo $_SESSION['tipo']; ?>">

</section>