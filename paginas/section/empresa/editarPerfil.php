<section>

    <form action="saveEditEmpresa.php?id=<?php echo $idEmpresa ?>" method="post">

        <div class="flex">
            <label>
                <p>Razão Social</p>
                <input class="input" type="text" name="razao-social" id="razao-social" value="<?php echo $razaoSocial ?>" required>
            </label>

            <label>
                <p>Nome Fantasia</p>
                <input class="input" type="text" name="nome-fantasia" id="nome-fantasia" value="<?php echo $nomeFantasia ?>" required>
            </label>

            <label>
                <p>CNPJ</p>
                <input class="input" type="text" name="cnpj" id="cnpj" pattern="\d{2}\.\d{3}\.\d{3}/\d{4}-\d{2}" value="<?php echo $cnpj ?>" required>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
                <script type="text/javascript">
                    $("#cnpj").mask("00.000.000/0000-00");
                </script>
            </label>

            <label>
                <p>Email</p>
                <input class="input" type="email" name="email" value="<?php echo $email ?>" required>
            </label>

            <label>
                <p>Telefone</p>
                <input class="input" type="tel" name="contato-telefone" id="telefone" pattern="[0-9]{4}-[0-9]{4}" value="<?php echo $contatoTelefone ?>" required>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
                <script type="text/javascript">
                    $("#telefone").mask("0000-0000");
                </script>
            </label>

        </div>

        <div class="flex">

            <label>
                <p>Inscrição Estadual</p>
                <input class="input" type="text" name="inscricao-estadual" id="inscricao-estadual" pattern="[0-9]{3}\.[0-9]{3}\.[0-9]{3}\.[0-9]{3}" value="<?php echo $inscricaoEstadual ?>" required>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
                <script type="text/javascript">
                    $("#inscricao-estadual").mask("000.000.000.000");
                </script>
            </label>

            <label>
                <p>Endereço</p>
                <input class="input" type="text" name="endereco" id="endereco" value="<?php echo $endereco ?>" required>
            </label>

            <label>
                <p>Número</p>
                <input class="input" type="text" name="numero" id="numero" value="<?php echo $numero ?>">
            </label>

            <label>
                <p>Bairro</p>
                <input class="input" type="text" name="bairro" id="bairro" value="<?php echo $bairro ?>" required>
            </label>

            <label>
                <p>Cidade</p>
                <input class="input" type="text" name="cidade" id="cidade" value="<?php echo $cidade ?>" required>
            </label>

        </div>

        <div class="flex">

            <label>
                <p>Estado (Sigla)</p>
                <input class="input" type="text" name="estado" id="estado" value="<?php echo $estado ?>" required>
            </label>

            <label>
                <p>CEP</p>
                <input class="input" type="text" name="cep" id="cep" value="<?php echo $cep ?>" pattern="\d{5}-\d{3}" required>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
                <script type="text/javascript">
                    $("#cep").mask("00000-000");
                </script>
            </label>

            <label>
                <p>Ramo de Atividade</p>
                <input class="input" type="text" name="ramo-atividade" id="ramo-atividade" value="<?php echo $ramoAtividade ?>" required>
            </label>

            <label>
                <p>Data de Fundação</p>
                <input class="input" type="date" name="data-fundacao" id="data-fundacao" value="<?php echo date('Y-m-d', strtotime($dataFundacao)) ?>" required>
            </label>

        </div>

        <div class="flex">

            <label>
                <p>Nome Representante</p>
                <input class="input" type="text" name="nome-representante" id="nome-representante" value="<?php echo $nomeRepresentante ?>" required>
            </label>

            <label>
                <p>WhatsApp</p>
                <input class="input" type="tel" name="contato-whatsapp" id="whatsapp" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}" value="<?php echo $contatoWhatsapp ?>" />
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

                <script type="text/javascript">
                    $("#whatsapp").mask("(00) 00000-0000");
                </script>
            </label>

            <label>
                <p>Instagram</p>
                <input class="input" type="text" name="perfil-instagram" id="instagram" value="<?php echo $perfilInstagram ?>" required>
            </label>

            <label>
                <p>Facebook</p>
                <input class="input" type="text" name="perfil-facebook" id="facebook" value="<?php echo $perfilFacebook ?>" required>
            </label>

        </div>

        <div class="flex">

            <label>
                <p>LinkedIn</p>
                <input class="input" type="text" name="perfil-linkedin" id="linkedin" value="<?php echo $perfilLinkedin ?>" required>
            </label>

            <label>
                <p>Nova Senha</p>
                <input class="input" type="text" name="senha" id="senha">
            </label>

            <input type="hidden" name="id" value="<?php echo $id ?>">

            <div class="cancela-cadastra">
                <button class="btn-modal" id="btn-fecha-modal">Voltar</button>
                <input type="submit" id="submit" name="update" value="Salvar">
            </div>
        </div>

    </form>

    <input type="hidden" id="tipo" value="<?php echo $_SESSION['tipo']; ?>">

</section>