<section class="formulario">
    <div class="form" id="form">

        <form action="cadastro.php" method="POST">
            <h1>Cadastre-se</h1><br>
            <div class="flex">


                <label>
                    <p>RM</p>
                    <input class="input" type="text" name="rm" id="rm" minlength="5" maxlength="5" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="RM" required>
                </label>

                <label>
                    <p>Nome</p>
                    <input class="input" type="text" name="nome" id="nome" placeholder="Nome" required>
                </label>
            </div>

            <div class="flex">
                <label>
                    <p>E-mail</p>
                    <input class="input" type="email" name="email" placeholder="E-mail" required>
                </label>

                <label>
                    <p>Curso</p>
                    <select class="input" name="curso" id="curso" required title="Por favor, selecione um curso.">
                    <option value="Administração" <?php if ($curso == "Administração") echo 'selected'; ?>>Administração</option>
                    <option value="Administração | AMS | M-Tec" <?php if ($curso == "Administração | AMS | M-Tec") echo 'selected'; ?>>Administração | AMS | M-Tec</option>
                    <option value="Informática para Internet | M-Tec" <?php if ($curso == "Informática para Internet | M-Tec") echo 'selected'; ?>>Informática para Internet | M-Tec</option>
                    <option value="Marketing" <?php if ($curso == "Marketing") echo 'selected'; ?>>Marketing</option>
                    <option value="Marketing | AMS | M-Tec" <?php if ($curso == "Marketing | AMS | M-Tec") echo 'selected'; ?>>Marketing | AMS | M-Tec</option>
                    <option value="Contabilidade" <?php if ($curso == "Contabilidade") echo 'selected'; ?>>Contabilidade</option>
                    <option value="Programação de Jogos Digitais" <?php if ($curso == "Programação de Jogos Digitais") echo 'selected'; ?>>Programação de Jogos Digitais</option>
                    <option value="Redes de Computadores" <?php if ($curso == "Redes de Computadores") echo 'selected'; ?>>Redes de Computadores</option>
                    <option value="Serviços Jurídicos" <?php if ($curso == "Serviços Jurídicos") echo 'selected'; ?>>Serviços Jurídicos</option>
                    <option value="Transações Imobiliárias" <?php if ($curso == "Transações Imobiliárias") echo 'selected'; ?>>Transações Imobiliárias</option>
                    <option value="Recursos Humanos" <?php if ($curso == "Recursos Humanos") echo 'selected'; ?>>Recursos Humanos</option>
                </select>
                </label>

            </div>

            <label>
                <p>Senha</p>
                <input class="input" type="password" id="senha" name="senha" placeholder="Senha" required>
            </label>

            <label>
                <p>Confirme a senha</p>
                <input class="input" type="password" id="confirma-senha" name="confirma-senha" placeholder="Confirme a senha" required>
            </label>

            <div class="fazer-login">
                <p>
                    Já possui uma conta? <a href="login.php">Faça Login</a>
                </p>
            </div>

            <div class="mensagem">
                <?php
                echo $mensagem;
                echo $redirecionamento;
                ?>
            </div>

            <div class="criar-conta">
                <a href="conexao.php">
                    <input type="submit" id="submit" name="submit" onclick="return validarSenha()" value="Cadastrar-se">
                </a>
            </div>
        </form>
    </div>
</section>