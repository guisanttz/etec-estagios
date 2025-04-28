<section class="formulario">
    <div class="form">
        <form action="recuperarSenha.php" method="POST">
            <h1>Informe o e-mail utilizado em seu cadastro.</h1>

            <label>
                <p>E-mail</p>
                <input class="input" id="email" name="email" type="email" placeholder="E-mail" required>
            </label>

            <div class="mensagem">
                <?php
                if (!isset($mensagem)) {
                    echo " ";
                } else {
                    echo $mensagem;
                }
                ?>
            </div>

            <input type="hidden" name="tipo" value="<?php echo $tipo ?>">

            <div class="verificar-voltar">
                <input type="submit" id="recuperar" name="enviar" value="Enviar">
                <button id="btn-voltar" type="button">Voltar</button>
            </div>
        </form>
    </div>
</section>