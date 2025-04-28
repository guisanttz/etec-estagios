<section class="formulario">
    <div class="form">
        <form action="inserirCodigo.php?token=<?php echo $tokenGet ?>" method="post">
            <h1>Verifique seu e-mail e digite o código enviado</h1><br>
            <label>
                <p>Código</p>
                <input class="input" type="text" name="codigo" id="codigo" minlength="6" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
            </label>
            <div class="mensagem">
                <?php
                if (empty($mensagem)) {
                    echo " ";
                } else {
                    echo $mensagem;
                    echo $redirecionamento;
                }
                ?>
            </div>
            <div class="verificar">
                <input type="submit" id="verificar" name="verificar" value="Verificar">
            </div>
        </form>
    </div>
</section>