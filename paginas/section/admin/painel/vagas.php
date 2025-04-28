<section id="painel">
    <div class="topo-painel">
        <div class="nome-admin">
            <p>Olá, <?php echo $_SESSION['nome_admin'] ?></p>
            <i class="bx bx-user-circle"></i>
        </div>
    </div>
    <section id="conteudo-painel">
        <div class="topo-tabela">
            <p>Vagas cadastradas</p>
            <div class="pesquisa">
                <input type="text" class="input" id="pesquisa" name="pesquisa" placeholder="Pesquisar Vaga">
                <input class="btn-pesquisa" value="Pesquisar" type="submit" onclick="pesquisarVaga()">
            </div>
            <div>
                <button class="btn-modal-cadastro" id="btn-modal-cadastro">Cadastrar Vaga</button>
            </div>
        </div>

        <div class="tabela">

            <div class="tabela-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Área</th>
                            <th>Cargo</th>
                            <th>Nome da Empresa</th>
                            <th>Email</th>
                            <th>Remunerado</th>
                            <th>Valor</th>
                            <th>Cidade</th>
                            <th>Endereço</th>
                            <th>Horário de Entrada/Saída</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (mysqli_num_rows($executaConsulta) > 0) {
                            while ($dadoVaga = mysqli_fetch_assoc($executaConsulta)) {

                                $horaEntrada = date("G\h\r", strtotime($dadoVaga['hora_entrada']));
                                $horaSaida = date("G\h\r", strtotime($dadoVaga['hora_saida']));

                                $cidadeVaga = !empty($dadoVaga['cidade']) ? $dadoVaga['cidade'] : (!empty($dadoVaga['cidade_empresa']) ? $dadoVaga['cidade_empresa'] : 'Cidade não informada');
                                // Verifica se o endereço da vaga está preenchido, se não exibe o endereço da empresa
                                $enderecoVaga = !empty($dadoVaga['endereco']) ? $dadoVaga['endereco'] : (!empty($dadoVaga['endereco_empresa']) ? $dadoVaga['endereco_empresa'] : 'Endereço não informado');
                                // Verifica se o email da vaga está preenchido, se não exibe o email da empresa
                                $emailVaga = !empty($dadoVaga['email']) ? $dadoVaga['email'] : (!empty($dadoVaga['email_empresa']) ? $dadoVaga['email_empresa'] : 'E-mail não informado');

                        ?>
                                <tr>
                                    <td><?php echo $dadoVaga['id_vaga'] ?></td>
                                    <td><?php echo $dadoVaga['area'] ?></td>
                                    <td><?php echo $dadoVaga['cargo'] ?></td>
                                    <td>
                                        <a href="informacoesTabela.php?tabela=empresas&id=<?php echo $dadoVaga['id_empresa']; ?>">
                                            <?php echo $dadoVaga['nome_fantasia'] ?>
                                        </a>
                                    </td>
                                    <td><?php echo $emailVaga ?></td>
                                    <td><?php echo $dadoVaga['remunerado'] ?></td>
                                    <td>R$ <?php echo $dadoVaga['valor'] ?></td>
                                    <td><?php echo $cidadeVaga ?></td>
                                    <td><?php echo $enderecoVaga ?></td>
                                    <td><?php echo $horaEntrada ?> - <?php echo  $horaSaida ?></td>
                                    <td><?php echo $dadoVaga['status_vaga'] ?></td>
                                    <td>
                                        <a href="informacoesTabela.php?tabela=vagas&id=<?php echo $dadoVaga['id_vaga'] ?>">
                                            <button id="btn-ver-mais">Ver Mais</button>
                                        </a>
                                    </td>
                                </tr>

                        <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <input type="hidden" id="tipo" value="<?php echo $_SESSION['tipo']; ?>">

</section>