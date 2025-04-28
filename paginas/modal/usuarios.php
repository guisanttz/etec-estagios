<dialog id="modal-cadastro">
    <form action="painel-usuarios.php" method="POST">
        <h1>Cadastro de Aluno</h1><br>
        <div class="flex">

            <label>
                <p>RM</p>
                <input class="input" type="text" name="rm" id="rm" minlength="5" maxlength="5" oninput="this.value = this.value.replace(/\D/g, '');" placeholder="RM" required>
                <!-- <input class="input" type="number" name="rm" id="rm" minlength="5" maxlength="5" required> -->
            </label>

            <label>
                <p>Nome</p>
                <input class="input" type="text" name="nome" id="nome" placeholder="Nome" required>
            </label>

            <label>
                <p>Sexo</p>
                <select class="input" name="sexo" id="sexo" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro</option>
                </select>
            </label>

            <label>
                <p>E-mail</p>
                <input class="input" type="email" name="email" placeholder="E-mail" required>
            </label>

        </div>

        <div class="flex">
            <label>
                <p>Telefone</p>
                <input class="input" type="tel" name="telefone" id="telefone" placeholder="Telefone" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}" />
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
                <script type="text/javascript">
                    $("#telefone").mask("(00) 00000-0000");
                </script>
            </label>

            <label>
                <p>Série</p>
                <select class="input" name="serie" id="serie" required>
                    <option value="1º Ano">1º Ano</option>
                    <option value="2º Ano">2º Ano</option>
                    <option value="3º Ano">3º Ano</option>
                </select>
            </label>

            <label>
                <p>Curso</p>
                <select class="input" name="curso" id="curso">
                    <option value="Informática para Internet">Informática para Internet</option>
                    <option value="Administração">Administração</option>
                    <option value="Marketing">Marketing</option>
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
                <p>Senha</p>
                <input class="input" type="text" id="senha" name="senha" placeholder="Senha" required>
            </label>

            <div class="cancela-cadastra">
                <button class="btn-modal" id="btn-fecha-modal">Cancelar</button>

                <button class="btn-modal" id="btn-cadastro">
                    <input type="submit" id="submit" name="submit" value="Cadastrar">
                </button>

            </div>
        </div>

    </form>
</dialog>