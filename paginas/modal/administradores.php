<dialog id="modal-cadastro">
    <form action="painel-administradores.php" method="POST">
        <h1>Cadastro de Administrador</h1><br>
        <div class="flex">

            <label>
                <p>Nome</p>
                <input class="input" type="text" name="nome" id="nome" placeholder="Nome" required>
            </label>


            <label>
                <p>E-mail</p>
                <input class="input" type="email" name="email" placeholder="E-mail" required>
            </label>

        </div>

        <div class="flex">

            <label>
                <p>Usuário</p>
                <input class="input" type="text" name="usuario" id="usuario" placeholder="Usuário" required>
            </label>

            <label>
                <p>Senha</p>
                <input class="input" type="text" id="senha" name="senha" placeholder="Senha" required>
            </label>

        </div>

        <div class="flex">

            <div class="cancela-cadastra">
                <button class="btn-modal" id="btn-fecha-modal">Cancelar</button>

                <button class="btn-modal" id="btn-cadastro">
                    <input type="submit" id="submit" name="submit" value="Cadastrar">
                </button>

            </div>

        </div>

    </form>

</dialog>