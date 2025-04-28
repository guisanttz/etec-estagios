<section>
    <div class="conteudo">
        <form action="loginAdmin.php" method="POST">
            <h1>Login Administrador</h1><br>

            <label>
                <p>Usuário</p>
                <input class="input" id="usuario" name="usuario" type="text" placeholder="Usuário" required>
            </label>

            <label>
                <p>Senha</p>
                <input class="input" id="senha" name="senha" type="password" placeholder="Senha" required>
                <p class="esqueceu-senha">Esqueceu a senha? <a href="recuperarSenha.php?tipo=administrador">Clique aqui</a></p>
            </label>

            <div class="mensagem">

                <?php
                if (isset($mensagem)) {
                    echo $mensagem;
                    echo $redirecionamento;
                }
                ?>

            </div>

            <div class="login">
                <input type="submit" id="submit" name="submit" value="Entrar">
            </div>
        </form>
    </div>

</section>