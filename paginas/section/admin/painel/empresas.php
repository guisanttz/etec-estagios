<section id="painel">
    <div class="topo-painel">
        <div class="nome-admin">
            <p>Olá, <?php echo $_SESSION['nome_admin'] ?></p>
            <i class="bx bx-user-circle"></i>
        </div>
    </div>
    <section id="conteudo-painel">
        <div class="topo-tabela">
            <p>Empresas cadastradas</p>
            <div class="pesquisa">
                <input type="text" class="input" id="pesquisa" name="pesquisa" placeholder="Pesquisar Empresa">
                <input class="btn-pesquisa" value="Pesquisar" type="submit" onclick="pesquisarEmpresa()">
            </div>
            <div>
                <button class="btn-modal-cadastro" id="btn-modal-cadastro">Cadastrar Empresa</button>
            </div>
        </div>

        <div class="tabela">
            <div class="tabela-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Razão Social</th>
                            <th>Nome Fantasia</th>
                            <th>CNPJ</th>
                            <th>Email</th>
                            <th>Ramo de Atividade</th>
                            <th>Endereço</th>
                            <th>Cidade</th>
                            <th>Representante</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (mysqli_num_rows($executaConsulta) > 0) {

                            while ($dadoEmpresa = mysqli_fetch_assoc($executaConsulta)) {

                        ?>

                                <tr>
                                    <td><?php echo $dadoEmpresa['id'] ?></td>
                                    <td><?php echo $dadoEmpresa['razao_social'] ?></td>
                                    <td><?php echo $dadoEmpresa['nome_fantasia'] ?></td>
                                    <td><?php echo $dadoEmpresa['cnpj'] ?></td>
                                    <td><?php echo $dadoEmpresa['email'] ?></td>
                                    <td><?php echo $dadoEmpresa['ramo_atividade'] ?></td>
                                    <td><?php echo $dadoEmpresa['endereco'] . ', ' . $dadoEmpresa['numero'] . ', ' . $dadoEmpresa['bairro'] ?></td>
                                    <td><?php echo $dadoEmpresa['cidade'] ?></td>
                                    <td><?php echo $dadoEmpresa['nome_representante'] ?></td>
                                    <td>
                                        <a href="informacoesTabela.php?tabela=empresas&id=<?php echo $dadoEmpresa['id'] ?>">
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