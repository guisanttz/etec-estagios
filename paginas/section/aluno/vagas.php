<section class="vagas">

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
                            <p>Valor</p>
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

                </div>

                <div class="btn-vaga">
                    <a href="informacoesVaga.php?id=<?php echo $dado_vaga['id_vaga'] ?>">
                        <button>Ver Informações da Vaga</button>
                    </a>
                </div>
            </div>

    <?php
        }
    }
    ?>

    <input type="hidden" id="tipo" value="<?php echo $_SESSION['tipo']; ?>">

</section>