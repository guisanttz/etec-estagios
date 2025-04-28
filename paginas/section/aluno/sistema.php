<section class="vagas">

    <?php
    if (count($vagasAleatorias) > 0) {
        foreach ($vagasAleatorias as $dadoVaga) {
            $horaEntrada = date("G\h\r", strtotime($dadoVaga['hora_entrada']));
            $horaSaida = date("G\h\r", strtotime($dadoVaga['hora_saida']));
    ?>
            <div class="vaga">
                <div class="informacoes-vaga">
                    <div class="dado-vaga">
                        <div class="celula">
                            <p>Área</p>
                        </div>
                        <div class="celula">
                            <p><?php echo $dadoVaga['area'] ?></p>
                        </div>
                    </div>

                    <div class="dado-vaga">
                        <div class="celula">
                            <p>Cargo</p>
                        </div>
                        <div class="celula">
                            <p><?php echo $dadoVaga['cargo'] ?></p>
                        </div>
                    </div>

                    <div class="dado-vaga">
                        <div class="celula">
                            <p>Empresa</p>
                        </div>
                        <div class="celula">
                            <p><?php echo $dadoVaga['nome_fantasia'] ?></p>
                        </div>
                    </div>

                    <div class="dado-vaga">
                        <div class="celula">
                            <p>Valor</p>
                        </div>
                        <div class="celula">
                            <p>R$ <?php echo $dadoVaga['valor'] ?></p>
                        </div>
                    </div>

                    <div class="dado-vaga">
                        <div class="celula">
                            <p>Período</p>
                        </div>
                        <div class="celula">
                            <p><?php echo $dadoVaga['periodo'] ?></p>
                        </div>
                    </div>

                    <div class="dado-vaga">
                        <div class="celula">
                            <p>Horário de Entrada/Saída</p>
                        </div>
                        <div class="celula">
                            <p><?php echo  $horaEntrada ?> - <?php echo $horaSaida ?></p>
                        </div>
                    </div>

                    <div class="dado-vaga">
                        <div class="celula">
                            <p>Cidade</p>
                        </div>
                        <div class="celula">
                            <p><?php echo $dadoVaga['cidade'] ?></p>
                        </div>
                    </div>

                    <div class="dado-vaga">
                        <div class="celula">
                            <p>Endereço</p>
                        </div>
                        <div class="celula">
                            <p><?php echo $dadoVaga['endereco'] ?></p>
                        </div>
                    </div>
                </div>

                <div class="btn-vaga">
                    <a href="informacoesVaga.php?id=<?php echo $dadoVaga['id_vaga'] ?>">
                        <button>Ver Informações da Vaga</button>
                    </a>
                </div>
            </div>
    <?php
        }
    } else {
        echo "<p style='color: var(--ciano)'>Nenhuma vaga disponível no momento.</p>";
    }
    ?>

    <div class="btn-mais-vagas">
        <a href="vagas.php">
            <button>Ver Mais Vagas</button>
        </a>
    </div>

    <input type="hidden" id="tipo" value="<?php echo isset($_SESSION['tipo']) ? $_SESSION['tipo'] : ''; ?>">

</section>