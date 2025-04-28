<section class="formis">
    <div class="formulario">
        <form class="dispo" action="empresa.php" method="post" enctype="multipart/form-data">

            <div class="empresa">
                <div class="cargo">
                    <h2>Cargo</h2>
                    <input type="text" name="cargo" id="inputs" placeholder="Cargo" required>
                </div>

                <div class="email">
                    <h2>Área</h2>
                    <input type="text" name="area" class="input" id="inputs" placeholder="Área" required>
                    <!-- <select class="input" name="area" id="inputs" required>
                        <option value="Administração" <?php if ($curso == "Administração") echo 'selected'; ?>>Administração</option>
                        <option value="Administração | AMS | M-Tec" <?php if ($curso == "Administração | AMS | M-Tec") echo 'selected'; ?>>Administração | AMS | M-Tec</option>
                        <option value="Informática para Internet | M-Tec" <?php if ($curso == "Informática para Internet | M-Tec") echo 'selected'; ?>>Informática para Internet | M-Tec</option>
                        <option value="Marketing" <?php if ($curso == "Marketing") echo 'selected'; ?>>Marketing</option>
                        <option value="Marketing | AMS | M-Tec" <?php if ($curso == "Marketing | AMS | M-Tec") echo 'selected'; ?>>Marketing | AMS | M-Tec</option>
                        <option value="Contabilidade" <?php if ($curso == "Contabilidade") echo 'selected'; ?>>Contabilidade</option>
                        <option value="Programação de Jogos Digitais" <?php if ($curso == "Programação de Jogos Digitais") echo 'selected'; ?>>Programação de Jogos Digitais</option>
                        <option value="Redes de Computadores" <?php if ($curso == "Redes de Computadores") echo 'selected'; ?>>Redes de Computadores</option>
                        <option value="Serviços Jurídicos" <?php if ($curso == "Serviços Jurídicos") echo 'selected'; ?>>Serviços Jurídicos</option>
                        <option value="Transações Imobiliárias" <?php if ($curso == "Transações Imobiliárias") echo 'selected'; ?>>Transações Imobiliárias</option>
                        <option value="Recursos Humanos" <?php if ($curso == "Recursos Humanos") echo 'selected'; ?>>Recursos Humanos</option>
                    </select> -->
                </div>
            </div>

            <div class="vaga">
                <div class="email">
                    <h2>E-mail</h2>
                    <input type="text" name="email" id="inputs" placeholder="E-mail" required>
                </div>

                <div class="remunerado">
                    <h2>Remuneração</h2>
                    <select name="escolha" class="value">
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>

                <div class="valor">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

                    <h2>Valor Salarial</h2>
                    <div class="Reais">
                        <label for="dinheiro" style="color: var(--ciano)">R$</label>
                        <input type="text" class="value" placeholder="Valor Salarial" id="Valor" name="valor"><br>
                    </div>

                    <script type="text/javascript">
                        $("#Valor").mask('#.##0,00', {
                            reverse: true
                        });
                    </script>
                </div>
            </div>

            <div class="local">
                <div class="cidade">
                    <h2>Cidade</h2>
                    <input type="text" name="cidade" id="cida" placeholder="Cidade" required>
                </div>

                <div class="endereco">
                    <h2>Endereço</h2>
                    <input type="text" name="endereco" id="ende" placeholder="Endereço" required>
                </div>
            </div>

            <div class="periodo-hora">
                <div class="periodo">
                    <h2>Período</h2>
                    <select name="periodo" id="periodo">
                        <option value="Manhã" selected>Manhã</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noite">Noite</option>
                        <option value="Integral">Integral</option>
                    </select>
                </div>
                <div class="hora">
                    <h2>Horário</h2>
                    <label for="entra" style="color: var(--ciano)">Entrada</label>
                    <input type="time" name="horaentra" id="horario" class="horario1">
                    <label for="entra" style="color: var(--ciano)">Saída</label>
                    <input type="time" name="horasai" id="horario" class="horario2">
                </div>
            </div>

            <div class="descricao">
                <div class="desepm">
                    <h2>Descrição da Empresa</h2>
                    <textarea style="resize: none; padding: 10px;" name="descriempresa" required></textarea>
                </div>

                <div class="descargo">
                    <h2>Descrição da Vaga</h2>
                    <textarea style="resize: none; padding: 10px;" name="descricargo" required></textarea>
                </div>
            </div>

            <div class="foto">
                <div class="logo">
                    <h2>Logo da Empresa</h2>
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
                </div>

                <div class="art">
                    <h2>Arte da Vaga</h2>
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
                </div>
            </div>
            <div class="buttons">
                <!-- <input type="submit" class="voltar" value="VOLTAR"> -->
                <a href="conexao.php" class="alinhar">
                    <input type="submit" id="submit" name="submit" value="Cadastrar Vaga">
                </a>
            </div>
        </form>
    </div>

    <input type="hidden" id="tipo" value="<?php echo $_SESSION['tipo']; ?>">

</section>