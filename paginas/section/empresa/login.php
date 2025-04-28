<section class="formulario">
    <div class="form">
        <form action="loginEmpresa.php" method="POST">
            <h1>Faça Login</h1><br>

            <label>
                <p>E-mail</p>
                <input class="input" type="email" name="email" id="email" placeholder="E-mail" required>
            </label>

            <label>
                <p>Senha</p>
                <input class="input" id="senha" name="senha" type="password" placeholder="Senha" required>
                <p class="esqueceu-senha">Esqueceu a senha? <a href="recuperarSenha.php?tipo=empresa">Clique aqui</a></p>
            </label>

            <div class="cadastro">
                <p>
                    Não tem uma conta? <a href="cnpjvalida.php">Cadastre-se</a>
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
                <a href="loginEmpresa.php">
                    <input type="submit" id="submit" name="submit" value="Entrar">
                </a>
            </div>
        </form>
    </div>
</section>