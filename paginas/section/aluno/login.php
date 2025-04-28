<section class="formulario">
    <div class="form">
        <form action="login.php" method="POST">
            <h1>Faça Login</h1><br>

            <label>
                <p>RM</p>
                <input class="input" id="rm" name="rm" type="text" minlength="5" maxlength="5" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" id="rm" placeholder="RM" required>
            </label>

            <label>
                <p>Senha</p>
                <input class="input" id="senha" name="senha" type="password" placeholder="Senha" required>
                <p class="esqueceu-senha">Esqueceu a senha? <a href="recuperarSenha.php?tipo=aluno">Clique aqui</a></p>
            </label>

            <div class="cadastro">
                <p>
                    Não tem uma conta? <a href="cadastro.php">Cadastre-se</a>
                </p>
            </div>

            <div class="mensagem">
                <?php
                if (isset($mensagem)) {
                    echo $mensagem;
                    echo $redirecionamento;
                }
                ?>
            </div>

            <div class="login">
                <a href="login.php">
                    <input type="submit" id="submit" name="submit" value="Entrar">
                </a>
            </div>
        </form>
    </div>
</section>