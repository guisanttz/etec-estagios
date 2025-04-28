<section>

    <form action="saveEditUsuario.php?rm=<?php echo $rmGet ?>" method="post">

        <div class="flex">

            <label>
                <p>RM</p>
                <input class="input" type="text" name="rm" id="rm" value="<?php echo $rm ?>" disabled>
            </label>

            <label>
                <p>Nome</p>
                <input class="input" type="text" name="nome" id="nome" value="<?php echo $nome ?>" required>
            </label>

            <label>
                <p>Sexo</p>
                <!-- <input class="input" type="text" name="sexo" id="sexo" value="" required> -->
                <select class="input" name="sexo" id="sexo" required>
                    <option value="Masculino" <?php if ($sexo == "Masculino") echo 'selected'; ?>>Masculino</option>
                    <option value="Feminino" <?php if ($sexo == "Feminino") echo 'selected'; ?>>Feminino</option>
                    <option value="Outro" <?php if ($sexo == "Outro") echo 'selected'; ?>>Outro</option>
                </select>
            </label>

            <label>
                <p>E-mail</p>
                <input class="input" type="email" name="email" value="<?php echo $email ?>" required>
            </label>

        </div>

        <div class="flex">

            <label>
                <p>Telefone</p>
                <input class="input" type="tel" name="telefone" id="telefone" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}" value="<?php echo $telefone ?>" />
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
                <script type="text/javascript">
                    $("#telefone").mask("(00) 00000-0000");
                </script>
            </label>

            <label>
                <p>Série</p>
                <select class="input" name="serie" id="serie" required>
                    <option value="1º Ano" <?php if ($serie == "1º Ano") echo 'selected'; ?>>1º Ano</option>
                    <option value="2º Ano" <?php if ($serie == "2º Ano") echo 'selected'; ?>>2º Ano</option>
                    <option value="3º Ano" <?php if ($serie == "3º Ano") echo 'selected'; ?>>3º Ano</option>
                </select>
            </label>

            <label>
                <p>Curso</p>
                <select class="input" name="curso" id="curso">
                    <!-- <option value="Administração" <?php if ($curso == "Administração") echo 'selected'; ?>>Administração</option>
                    <option value="Administração | AMS | M-Tec" <?php if ($curso == "Administração | AMS | M-Tec") echo 'selected'; ?>>Administração | AMS | M-Tec</option>
                    <option value="Informática para Internet | M-Tec" <?php if ($curso == "Informática para Internet | M-Tec") echo 'selected'; ?>>Informática para Internet | M-Tec</option>
                    <option value="Marketing" <?php if ($curso == "Marketing") echo 'selected'; ?>>Marketing</option>
                    <option value="Marketing | AMS | M-Tec" <?php if ($curso == "Marketing | AMS | M-Tec") echo 'selected'; ?>>Marketing | AMS | M-Tec</option>
                    <option value="Contabilidade" <?php if ($curso == "Contabilidade") echo 'selected'; ?>>Contabilidade</option>
                    <option value="Programação de Jogos Digitais" <?php if ($curso == "Programação de Jogos Digitais") echo 'selected'; ?>>Programação de Jogos Digitais</option>
                    <option value="Redes de Computadores" <?php if ($curso == "Redes de Computadores") echo 'selected'; ?>>Redes de Computadores</option>
                    <option value="Serviços Jurídicos" <?php if ($curso == "Serviços Jurídicos") echo 'selected'; ?>>Serviços Jurídicos</option>
                    <option value="Transações Imobiliárias" <?php if ($curso == "Transações Imobiliárias") echo 'selected'; ?>>Transações Imobiliárias</option>
                    <option value="Recursos Humanos" <?php if ($curso == "Recursos Humanos") echo 'selected'; ?>>Recursos Humanos</option> -->
                    <option value="Informática para Internet" <?php if ($curso == "Informática para Internet") echo 'selected'; ?>>Informática para Internet</option>
                    <option value="Administração" <?php if ($curso == "Administração") echo 'selected'; ?>>Administração</option>
                    <option value="Marketing" <?php if ($curso == "Marketing") echo 'selected'; ?>>Marketing</option>
                </select>
            </label>

            <label>
                <p>Início/Término</p>
                <input class="input" type="text" name="ano-inicio-termino" id="ano-inicio-termino" pattern="[0-9]{4} - [0-9]{4}" value="<?php echo $anoInicioTermino ?>" placeholder="0000 - 0000" required>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
                <script type="text/javascript">
                    $("#ano-inicio-termino").mask("0000 - 0000");
                </script>
            </label>


        </div>

        <div class="flex">
            <label>
                <p>Nova Senha</p>
                <input class="input" type="text" id="senha" name="senha">
            </label>

            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" id="tipo" value="<?php echo $_SESSION['tipo']; ?>">

            <div class="cancela-cadastra">
                <a href="perfilUsuario.php">
                    <button class="btn-modal" id="btn-fecha-modal">Voltar</button>
                </a>

                <input type="submit" id="submit" name="update" value="Salvar" style="background-color: #0298cf; color: white; width: 48%; padding: 10px;">

            </div>

        </div>

    </form>
</section>