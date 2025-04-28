<section id="painel">
    <div class="topo-painel">
        <div class="nome-admin">
            <p>Olá, <?php echo $_SESSION['nome_admin'] ?></p>
            <i class="bx bx-user-circle"></i>
        </div>
    </div>
    <section id="conteudo-painel">
        <div class="topo-tabela">
            <p>Contratos cadastrados</p>
            <div class="pesquisa">
                <input type="text" class="input" id="pesquisa" name="pesquisa" placeholder="Pesquisar Contratos">
                <input class="btn-pesquisa" value="Pesquisar" type="submit" onclick="pesquisarContrato()">
            </div>
            <div>
                <button class="btn-modal-cadastro" id="btn-modal-cadastro">Cadastrar Contrato</button>
            </div>
        </div>

        <div class="tabela">
            <div class="tabela-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Número do Contrato</th>
                            <th>ID/RM do Aluno</th>
                            <th>ID/Cargo da Vaga</th>
                            <th>Data de Início</th>
                            <th>Data de Término</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (mysqli_num_rows($executaConsulta) > 0) {
                            while ($dadoContrato = mysqli_fetch_assoc($executaConsulta)) {

                                $dadoContrato['data_inicio'] = date('d/m/Y', strtotime($dadoContrato['data_inicio']));
                                $dadoContrato['data_termino'] = date('d/m/Y', strtotime($dadoContrato['data_termino']));

                        ?>
                                <tr>
                                    <td><?php echo $dadoContrato['id'] ?></td>
                                    <td><?php echo $dadoContrato['numero_contrato'] ?></td>
                                    <td>
                                        <a href="informacoesTabela.php?tabela=usuarios&id=<?php echo $dadoContrato['id_aluno'] ?>">
                                            <?php echo $dadoContrato['id_aluno'] . ' - ' . $dadoContrato['rm_aluno'] ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="informacoesTabela.php?tabela=vagas&id=<?php echo $dadoContrato['id_vaga'] ?>">
                                            <?php echo $dadoContrato['id_vaga'] . ' - ' . $dadoContrato['cargo_vaga'] ?>
                                        </a>
                                    </td>
                                    <td><?php echo $dadoContrato['data_inicio'] ?></td>
                                    <td><?php echo $dadoContrato['data_termino'] ?></td>
                                    <td>
                                        <a href="edit.php?tabela=contratos&id=<?php echo $dadoContrato['id']; ?>" id="link">
                                            <button id="editar"><i class='bx bxs-edit'></i></button>
                                        </a>
                                        <button id="deletar" class="deletar" data-id="<?php echo $dadoContrato['id']; ?>"><i class='bx bxs-trash-alt'></i></button>
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