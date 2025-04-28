<dialog id="modal-cadastro">
    <form action="painel-empresas.php" method="POST">
        <h1>Cadastro de Empresa</h1><br>
        <div class="flex">

            <label>
                <p>Razão Social</p>
                <input class="input" type="text" name="razao-social" id="razao-social" placeholder="Razão Social" required>
            </label>

            <label>
                <p>Nome Fantasia</p>
                <input class="input" type="text" name="nome-fantasia" id="nome-fantasia" placeholder="Nome Fantasia" required>
            </label>

            <label>
                <p>CNPJ</p>
                <input class="input" type="text" name="cnpj" id="cnpj" pattern="\d{2}\.\d{3}\.\d{3}/\d{4}-\d{2}" placeholder="CNPJ" required>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
                <script type="text/javascript">
                    $("#cnpj").mask("00.000.000/0000-00");
                </script>
            </label>

            <label>
                <p>E-mail</p>
                <input class="input" type="email" name="email" placeholder="E-mail" required>
            </label>

            <label>
                <p>Telefone</p>
                <input class="input" type="tel" name="contato-telefone" id="telefone" pattern="\d{4}-\d{4}" placeholder="Telefone" required>
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
                <input class="input" type="text" name="inscricao-estadual" id="inscricao-estadual" pattern="[0-9]{3}\.[0-9]{3}\.[0-9]{3}\.[0-9]{3}" placeholder="Inscrição Estadual" required>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
                <script type="text/javascript">
                    $("#inscricao-estadual").mask("000.000.000.000");
                </script>
            </label>

            <label>
                <p>Endereço</p>
                <input class="input" type="text" name="endereco" id="endereco" placeholder="Endereço" required>
            </label>

            <label>
                <p>Número</p>
                <input class="input" type="number" name="numero" id="numero" placeholder="Número">
            </label>

            <label>
                <p>Bairro</p>
                <input class="input" type="text" name="bairro" id="bairro" placeholder="Bairro" required>
            </label>

            <label>
                <p>Cidade</p>
                <input class="input" type="text" name="cidade" id="cidade" placeholder="Cidade" required>
            </label>

        </div>

        <div class="flex">

            <label>
                <p>Estado (Sigla)</p>
                <select class="input" name="estado" id="estado">
                    <option value="AC">Acre (AC)</option>
                    <option value="AL">Alagoas (AL)</option>
                    <option value="AP">Amapá (AP)</option>
                    <option value="AM">Amazonas (AM)</option>
                    <option value="BA">Bahia (BA)</option>
                    <option value="CE">Ceará (CE)</option>
                    <option value="DF">Distrito Federal (DF)</option>
                    <option value="ES">Espírito Santo (ES)</option>
                    <option value="GO">Goiás (GO)</option>
                    <option value="MA">Maranhão (MA)</option>
                    <option value="MT">Mato Grosso (MT)</option>
                    <option value="MS">Mato Grosso do Sul (MS)</option>
                    <option value="MG">Minas Gerais (MG)</option>
                    <option value="PA">Pará (PA)</option>
                    <option value="PB">Paraíba (PB)</option>
                    <option value="PR">Paraná (PR)</option>
                    <option value="PE">Pernambuco (PE)</option>
                    <option value="PI">Piauí (PI)</option>
                    <option value="RJ">Rio de Janeiro (RJ)</option>
                    <option value="RN">Rio Grande do Norte (RN)</option>
                    <option value="RS">Rio Grande do Sul (RS)</option>
                    <option value="RO">Rondônia (RO)</option>
                    <option value="RR">Roraima (RR)</option>
                    <option value="SC">Santa Catarina (SC)</option>
                    <option value="SP">São Paulo (SP)</option>
                    <option value="SE">Sergipe (SE)</option>
                    <option value="TO">Tocantins (TO)</option>
                </select>
            </label>

            <label>
                <p>CEP</p>
                <input class="input" type="text" name="cep" id="cep" pattern="\d{5}-\d{3}" placeholder="CEP" required>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
                <script type="text/javascript">
                    $("#cep").mask("00000-000");
                </script>
            </label>

            <label>
                <p>Ramo de Atividade</p>
                <input class="input" type="text" name="ramo-atividade" id="ramo-atividade" placeholder="Ramo de Atividade" required>
            </label>

            <label>
                <p>Data de Fundação</p>
                <input class="input" type="date" name="data-fundacao" id="data-fundacao">
            </label>


        </div>

        <div class="flex">

            <label>
                <p>Nome Representante</p>
                <input class="input" type="text" name="nome-representante" id="nome-representante" placeholder="Nome Representante" required>
            </label>

            <label>
                <p>WhatsApp</p>
                <input class="input" type="tel" name="contato-whatsapp" id="whatsapp" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}" placeholder="WhatsApp">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

                <script type="text/javascript">
                    $("#whatsapp").mask("(00) 00000-0000");
                </script>
            </label>

            <label>
                <p>Instagram</p>
                <input class="input" type="text" name="instagram" id="instagram" placeholder="Instagram" required>
            </label>

            <label>
                <p>Facebook</p>
                <input class="input" type="text" name="facebook" id="facebook" placeholder="Facebook" required>
            </label>

        </div>

        <div class="flex">

            <label>
                <p>LinkedIn</p>
                <input class="input" type="text" name="linkedin" id="linkedin" placeholder="LinkedIn" required>
            </label>

            <label>
                <p>Senha</p>
                <input class="input" type="text" name="senha" id="senha" placeholder="Senha" required>
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