<dialog id="modal-cadastro">
    <form action="painel-vagas.php" method="POST" enctype="multipart/form-data">
        <h1>Cadastro de Vaga</h1><br>
        <div class="flex">

            <label>
                <p>Cargo</p>
                <input type="text" class="input" name="cargo" id="cargo" placeholder="Cargo" required>
            </label>

            <label>
                <p>Área</p>
                <input type="text" name="area" class="input" id="area" placeholder="Área" required>
            </label>

            <label>
                <p>Nome da Empresa</p>
                <input list="empresas" id="empresa" name="empresa" placeholder="Nome da Empresa" required class="input">
                <datalist id="empresas">
                    <?php
                    while ($nomesEmpresas = mysqli_fetch_assoc($resultadoSelectIdNomeEmpresa)) {
                        echo "<option value='" . $nomesEmpresas['nome_fantasia'] . "'>";
                    }
                    ?>
                </datalist>
            </label>

            <label>
                <p>E-mail</p>
                <input class="input" type="email" name="email" placeholder="E-mail" required>
            </label>

        </div>

        <div class="flex">

            <label>
                <p>Remuneração</p>
                <select name="remunerado" class="input">
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                </select>
            </label>

            <label>
                <p>Valor</p>
                <input class="input" type="text" name="valor" id="valor" pattern="^\d{1,3}(\.\d{3})*,\d{2}$" placeholder="R$ 0.000,00" />

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
                <script type="text/javascript">
                    $("#valor").mask('#.##0,00', {
                        reverse: true
                    });
                </script>
            </label>

            <label>
                <p>Período</p>
                <select name="periodo" id="periodo" class="input">
                    <option value="Manhã" selected>Manhã</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noite">Noite</option>
                    <option value="Integral">Integral</option>
                </select>
            </label>

            <label>
                <p>Horário de Entrada</p>
                <input class="input" type="time" name="horario-entrada" id="horario-entrada" required>
            </label>

            <label>
                <p>Horário de Saída</p>
                <input class="input" type="time" name="horario-saida" id="horario-saida" required>
            </label>
        </div>

        <div class="flex">

            <label>
                <p>Cidade</p>
                <input type="text" name="cidade" class="input" id="cida" placeholder="Cidade" required>
            </label>

            <label>
                <p>Endereço</p>
                <input class="input" type="text" name="endereco" id="endereco" placeholder="Endereço" required>
            </label>

        </div>

        <div class="flex">



        </div>

        </div>

        <div class="flex">

            <label>
                <p>Descrição da Empresa</p>
                <textarea style="resize: vertical; padding: 10px; min-height: 150px;" class="input" name="descricao-empresa" id="descricao-empresa"></textarea>
            </label>

            <label>
                <p>Descrição da Vaga</p>
                <textarea style="resize: vertical; padding: 10px; min-height: 150px;" class="input" name="descricao-vaga" id="descricao-vaga"></textarea>
            </label>

        </div>

        <div class="flex">


            <label>
                <p>Logo da Empresa</p>
                <label for="file-logo" class="custum-file-upload">
                    <div class="icon">
                        <svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" fill=""></path>
                            </g>
                        </svg>
                    </div>
                    <div class="text">
                        <span id="file-name-logo">Clique para fazer o upload</span>
                    </div>
                    <input id="file-logo" type="file" name="logo" accept="image/jpeg,image/png">
                </label>
            </label>

            <label>
                <p>Arte da Vaga</p>
                <label for="file-art" class="custum-file-upload">
                    <div class="icon">
                        <svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" fill=""></path>
                            </g>
                        </svg>
                    </div>
                    <div class="text">
                        <span id="file-name-art">Clique para fazer o upload</span>
                    </div>
                    <input id="file-art" type="file" name="art" accept="image/jpeg,image/png">
                </label>
            </label>

        </div>

        <div class="cancela-cadastra">
            <button class="btn-modal" id="btn-fecha-modal">Cancelar</button>

            <button class="btn-modal" id="btn-cadastro">
                <input type="submit" id="submit" name="submit" value="Cadastrar">
            </button>

        </div>
        </div>

    </form>

    </div>