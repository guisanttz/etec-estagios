<section class="formulario">
    <div class="form">
        <form action="alterarSenha.php?token=<?php echo $tokenGet ?>" method="POST">

            <label>
                <p>Nova senha</p>
                <input class="input" id="senha" name="senha" placeholder="Nova senha" type="password">
            </label>

            <label>
                <p>Confirmar nova senha</p>
                <input class="input" id="confirma-senha" placeholder="Confirmar nova senha" type="password">
            </label>

            <div class="mensagem">
                <?php

                if (!empty($mensagem) && $senhaExistente == true) {
                    echo $mensagem;
                    echo $recarregaPagina;
                } elseif (!empty($mensagem) && !isset($senhaExistente)) {
                    echo $mensagem;
                    echo $redirecionamento;
                } 
                else {
                    echo " ";
                }

                ?>
            </div>

            <div class="alterar-senha">
                <input type="submit" id="submit" name="submit" value="Alterar Senha">
            </div>
        </form>
    </div>
</section>