<section class="formulario">
    <div class="form" id="form">

        <form action="cadastro-empresa.php" method="POST">
            <h1>Cadastre-se</h1>
            <div class="flex">

                <label>
                    <p>CNPJ</p>
                    <input class="input" type="text" name="cn" id="cnpj" pattern="[0-9]{2}\.[0-9]{3}\.[0-9]{3}/[0-9]{4}-[0-9]{2}" value="<?php echo htmlspecialchars($data['cnpj']); ?>">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
                    <script type="text/javascript">
                        $("#cnpj").mask("00.000.000/0000-00");
                    </script>
                </label>

                <label>
                    <p>Nome Fantasia</p>
                    <input class="input" type="text" name="nomefantasia" required value="<?php echo htmlspecialchars($data['fantasia']); ?>">
                </label>

                <label>
                    <p>Telefone</p>
                    <input class="input" type="text" name="telefone" id="telefone" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{3, 4}" value="<?php echo htmlspecialchars($data['telefone']); ?>">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

                    <script type="text/javascript">
                        $("#telefone").mask("(00) 0000-0000");
                    </script>
                </label>

            </div>

            <div class="flex">
                <label>
                    <p>Razão Social</p>
                    <input class="input" type="text" name="razaosocial" required value="<?php echo htmlspecialchars($data['nome']); ?>">
                </label>

                <label class="labela">
                    <p class="pe">E-mail</p>
                    <input class="inputi" type="email" name="email" required value="<?php echo htmlspecialchars($data['email']); ?>">
                </label>
            </div>

            <div class="flex">
                <label class="labelas">
                    <p class="pi">CEP</p>
                    <input class="input" type="text" name="cep" id="cep" pattern="[0-9]{5}-[0-9]{3}" value="<?php echo htmlspecialchars($data['cep']); ?>" />
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
                    <script type="text/javascript">
                        $("#cep").mask("00000-000");
                    </script>
                </label>
                <label class="numero">
                    <p class="pn">Número</p>
                    <input class="inputn" type="text" id="numero" name="numero" value="<?php echo htmlspecialchars($data['numero']); ?>">
                </label>
                <label>
                    <p>Bairro</p>
                    <input class="input" type="text" id="bairro" name="bairro" value="<?php echo htmlspecialchars($data['bairro']); ?>">
                </label>
                <label>
                    <p>Cidade</p>
                    <input class="input" type="text" id="cidade" name="cidade" value="<?php echo htmlspecialchars($data['municipio']); ?>">
                </label>
            </div>

            <div class="flex">
                <label class="email">
                    <p>Endereço</p>
                    <input class="input" type="text" name="endereco" value="<?php echo htmlspecialchars($data['logradouro']); ?>">
                </label>
                <label class="labelas">
                    <p class="pi">Fundação</p>
                    <input class="inpute" type="date" id="dtfundacao" name="dtfundacao">
                </label>
                <label class="estado">
                    <p class="pm">Estado</p>
                    <!-- <input class="inputm" type="text" id="estado" name="estado" value="<?php echo htmlspecialchars($data['uf']); ?>"> -->
                    <select class="input" name="estado" id="estado">
                        <option value="AP" <?php if (htmlspecialchars($data['uf']) == "AP") echo 'selected'; ?>>AP</option>
                        <option value="AM" <?php if (htmlspecialchars($data['uf']) == "AM") echo 'selected'; ?>>AM</option>
                        <option value="BA" <?php if (htmlspecialchars($data['uf']) == "BA") echo 'selected'; ?>>BA</option>
                        <option value="CE" <?php if (htmlspecialchars($data['uf']) == "CE") echo 'selected'; ?>>CE</option>
                        <option value="DF" <?php if (htmlspecialchars($data['uf']) == "DF") echo 'selected'; ?>>DF</option>
                        <option value="ES" <?php if (htmlspecialchars($data['uf']) == "ES") echo 'selected'; ?>>ES</option>
                        <option value="GO" <?php if (htmlspecialchars($data['uf']) == "GO") echo 'selected'; ?>>GO</option>
                        <option value="MA" <?php if (htmlspecialchars($data['uf']) == "MA") echo 'selected'; ?>>MA</option>
                        <option value="MT" <?php if (htmlspecialchars($data['uf']) == "MT") echo 'selected'; ?>>MT</option>
                        <option value="MS" <?php if (htmlspecialchars($data['uf']) == "MS") echo 'selected'; ?>>MS</option>
                        <option value="MG" <?php if (htmlspecialchars($data['uf']) == "MG") echo 'selected'; ?>>MG</option>
                        <option value="PA" <?php if (htmlspecialchars($data['uf']) == "PA") echo 'selected'; ?>>PA</option>
                        <option value="PB" <?php if (htmlspecialchars($data['uf']) == "PB") echo 'selected'; ?>>PB</option>
                        <option value="PR" <?php if (htmlspecialchars($data['uf']) == "PR") echo 'selected'; ?>>PR</option>
                        <option value="PE" <?php if (htmlspecialchars($data['uf']) == "PE") echo 'selected'; ?>>PE</option>
                        <option value="PI" <?php if (htmlspecialchars($data['uf']) == "PI") echo 'selected'; ?>>PI</option>
                        <option value="RJ" <?php if (htmlspecialchars($data['uf']) == "RJ") echo 'selected'; ?>>RJ</option>
                        <option value="RN" <?php if (htmlspecialchars($data['uf']) == "RN") echo 'selected'; ?>>RN</option>
                        <option value="RS" <?php if (htmlspecialchars($data['uf']) == "RS") echo 'selected'; ?>>RS</option>
                        <option value="RO" <?php if (htmlspecialchars($data['uf']) == "RO") echo 'selected'; ?>>RO</option>
                        <option value="RR" <?php if (htmlspecialchars($data['uf']) == "RR") echo 'selected'; ?>>RR</option>
                        <option value="SC" <?php if (htmlspecialchars($data['uf']) == "SC") echo 'selected'; ?>>SC</option>
                        <option value="SP" <?php if (htmlspecialchars($data['uf']) == "SP") echo 'selected'; ?>>SP</option>
                        <option value="SE" <?php if (htmlspecialchars($data['uf']) == "SE") echo 'selected'; ?>>SE</option>
                        <option value="TO" <?php if (htmlspecialchars($data['uf']) == "TO") echo 'selected'; ?>>TO</option>
                    </select>

                </label>
            </div>

            <div class="flex">
                <label>
                    <p>Nome do Representante</p>
                    <input class="input" type="text" id="representante" name="representante" placeholder="Nome do representante" required>
                </label>
                <label>
                    <p>Ramo de atividade</p>
                    <input class="input" type="text" id="ramo" name="ramo" value="<?php echo htmlspecialchars($data['atividade_principal']['0']['text']); ?>">
                </label>
            </div>

            <div class="flex">
                <label>
                    <p>Senha</p>
                    <input class="input" type="password" id="senha" name="senha" placeholder="Senha" required>
                </label>
                <label>
                    <p>Confirmar senha</p>
                    <input class="input" type="password" id="confirma-senha" name="confirma-senha" placeholder="Confirmar senha" required>
                </label>
            </div>

            <div class="fazer-login">
                <p>
                    Já possui uma conta? <a href="loginEmpresa.php">Faça Login</a>
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
                    <input type="submit" name="submit" id="submit" value="Cadastrar">
                </a>
            </div>

        </form>
    </div>
</section>