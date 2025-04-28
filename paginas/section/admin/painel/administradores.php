<section id="painel">
    <div class="topo-painel">
        <div class="nome-admin">
            <p>Olá, <?php echo $_SESSION['nome_admin'] ?></p>
            <i class="bx bx-user-circle"></i>
        </div>
    </div>
    <section id="conteudo-painel">
        <div class="topo-tabela">
            <p>Administradores cadastrados</p>
            <div class="pesquisa">
                <input type="text" class="input" id="pesquisa" name="pesquisa" placeholder="Pesquisar Administrador">
                <input class="btn-pesquisa" value="Pesquisar" type="submit" onclick="pesquisarAdministrador()">
            </div>
            <div>
                <button class="btn-modal-cadastro" id="btn-modal-cadastro">Cadastrar Administrador</button>
            </div>
        </div>

        <div class="tabela">
            <div class="tabela-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Usuário</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (mysqli_num_rows($executaConsulta) > 0) {

                            while ($dadoAdministrador = mysqli_fetch_assoc($executaConsulta)) {
                        ?>
                                <tr>
                                    <td><?php echo $dadoAdministrador['id'] ?></td>
                                    <td><?php echo $dadoAdministrador['nome'] ?></td>
                                    <td><?php echo $dadoAdministrador['email'] ?></td>
                                    <td><?php echo $dadoAdministrador['usuario'] ?></td>
                                    <td>
                                        <a href="edit.php?tabela=administradores&id=<?php echo $dadoAdministrador['id']; ?>">
                                            <button id="editar"><i class='bx bxs-edit'></i></button>
                                        </a>
                                        <button id="deletar" class="deletar" data-id="<?php echo $dadoAdministrador['id']; ?>"><i class='bx bxs-trash-alt'></i></button>
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