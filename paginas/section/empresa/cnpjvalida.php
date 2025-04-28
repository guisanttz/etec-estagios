<section class="formulario">
    <div class="form" id="form">

        <!-- <form action="cnpjvalida.php" method="POST">
                <h1>Validar CNPJ</h1>
                <div class="flex">
                    <label>
                        <p>CNPJ</p>
                        <input class="input" type="text" name="cnpj" placeholder="Somente números" required>
                        <input type="submit" id="envia" name="envia" onclick="return validarCNPJ()" value="Validar">
                        <div class="fazer-login">
                                <p>
                                    Já possui uma conta? <a href="login-empresa.php">Faça Login</a>
                                </p>
                            </div>
                    </label>
                </div>
            </form> -->

        <form action="cadastro-empresa.php" method="POST">
            <h1>Validar CNPJ</h1>
            <div class="flex">
                <label>
                    <p>CNPJ</p>
                    <input class="input" type="text" name="cnpj" id="cnpj" placeholder="CNPJ (Somente números)" onkeypress="if(this.value.length==14) return false;" required>
                    <input type="submit" id="envia" name="envia" onclick="return validarCNPJ()" value="Validar">
                </label>
            </div>
        </form>

</section>