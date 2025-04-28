<section id="painel">
    <div class="topo-painel">
        <div class="nome-admin">
            <p>Olá, <?php echo $_SESSION['nome_admin'] ?></p>
            <i class="bx bx-user-circle"></i>
        </div>
    </div>
    <section id="conteudo-painel">

        <div class="topo-tabela">
            <p>Alunos cadastrados</p>
            <div class="pesquisa">
                <input type="text" class="input" id="pesquisa" name="pesquisa" placeholder="Pesquisar Aluno">
                <input class="btn-pesquisa" value="Pesquisar" type="submit" onclick="pesquisarAluno()">
            </div>
            <div>
                <button class="btn-modal-cadastro" id="btn-modal-cadastro">Cadastrar Aluno</button>
            </div>
        </div>

        <div class="tabela">

            <div class="tabela-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>RM</th>
                            <th>Nome</th>
                            <th>Sexo</th>
                            <th>Email</th>
                            <th>Série</th>
                            <th>Curso</th>
                            <th>Ano de Início/Término</th>
                            <th>Telefone</th>
                            <th>ID do Contrato</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (mysqli_num_rows($executaConsulta) > 0) {
                            while ($dadoUsuario = mysqli_fetch_assoc($executaConsulta)) {
                                $idContratoExibicao = ($dadoUsuario['id_contrato'] == 0) ? " " : $dadoUsuario['id_contrato'];
                        ?>

                                <tr>
                                    <td><?php echo $dadoUsuario['id'] ?></td>
                                    <td><?php echo $dadoUsuario['rm']; ?></td>
                                    <td><?php echo $dadoUsuario['nome']; ?></td>
                                    <td><?php echo $dadoUsuario['sexo']; ?></td>
                                    <td><?php echo $dadoUsuario['email']; ?></td>
                                    <td><?php echo $dadoUsuario['serie']; ?></td>
                                    <td><?php echo $dadoUsuario['curso']; ?></td>
                                    <td><?php echo $dadoUsuario['ano_inicio_termino'] ?></td>
                                    <td><?php echo $dadoUsuario['telefone']; ?></td>
                                    <td>
                                        <a href="informacoesTabela.php?tabela=contratos&id=<?php echo $idContratoExibicao ?>">
                                            <?php echo $idContratoExibicao; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="edit.php?tabela=usuarios&id=<?php echo $dadoUsuario['id'] ?>">
                                            <button id="editar"><i class='bx bxs-edit'></i></button>
                                        </a>
                                        <!-- <a href="delete.php?tabela=usuarios&id=<?php echo $dadoUsuario['id'] ?>">
                        <button id="deletar"><i class='bx bxs-trash-alt'></i></button>
                      </a> -->
                                        <button id="deletar" class="deletar" data-id="<?php echo $dadoUsuario['id']; ?>"><i class='bx bxs-trash-alt'></i></button>
                                    </td>
                                </tr>

                        <?php
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
            <!-- <ul class="pagination">
                <li><a href="?pageno=1">First</a></li>
                <li class="<?php if ($pageno <= 1) {
                                echo 'disabled';
                            } ?>">
                    <a href="<?php if ($pageno <= 1) {
                                    echo '#';
                                } else {
                                    echo "?pageno=" . ($pageno - 1);
                                } ?>">Prev</a>
                </li>
                <li class="<?php if ($pageno >= $total_pages) {
                                echo 'disabled';
                            } ?>">
                    <a href="<?php if ($pageno >= $total_pages) {
                                    echo '#';
                                } else {
                                    echo "?pageno=" . ($pageno + 1);
                                } ?>">Next</a>
                </li>
                <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
            </ul> -->
        </div>
    </section>

    <input type="hidden" id="tipo" value="<?php echo $_SESSION['tipo']; ?>">

</section>