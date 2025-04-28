<section class="formulario">
    <div class="form">
        <form action="contato.php" method="POST">
            <h1>Formulário de Contato</h1><br>

            <label>
                <p>Nome</p>
                <input class="input" type="text" name="nome" id="nome" placeholder="Nome" required>
            </label>

            <label>
                <p>E-mail</p>
                <input class="input" type="email" name="email" placeholder="E-mail" required>
            </label>

            <label>
                <p>Assunto</p>
                <select class="input" name="assunto" id="assunto" required>
                    <option value="Reportar erro">Reportar erro</option>
                    <option value="Sugestões">Sugestões</option>
                    <option value="Outro">Outro</option>
                </select>
            </label>

            <label>
                <p>Mensagem</p>
                <textarea class="input" name="mensagem" id="mensagem" placeholder="Digite sua mensagem" maxlength="2000" required></textarea>
            </label>

            <div class="mensagem">
                <?php
                if (isset($mensagem)) {
                    echo $mensagem;
                    echo $redirecionamento;
                }
                ?>
            </div>

            <div class="enviar">
                <button id="submit" name="submit">Enviar</button>
            </div>
        </form>
    </div>
</section>