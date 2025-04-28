<dialog id="modal-cadastro">
    <form action="painel-contratos.php" method="POST">
        <h1>Cadastro de Contrato</h1><br>
        <div class="flex">

            <label>
                <p>Número do Contrato</p>
                <input class="input" type="text" name="numero-contrato" id="numero-contrato" placeholder="Número do Contrato" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
            </label>

            <label>
                <p>ID/RM do Aluno</p>
                <input list="id_alunos" class="input" type="text" name="id-rm-aluno" id="id" placeholder="ID/RM do Aluno">
                <datalist name="id" id="id_alunos" class="input">
                    <?php
                    if (mysqli_num_rows($executaIdAlunos) > 0) {
                        while ($idsAlunos = mysqli_fetch_assoc($executaIdAlunos)) { ?>
                            <option><?php echo $idsAlunos['id'] . ' - ' . $idsAlunos['rm']; ?></option>
                    <?php }
                    } ?>
                </datalist>
            </label>

            <label>
                <p>ID/Cargo da Vaga</p>
                <input list="id_vagas" class="input" type="text" name="id-vaga-cargo" id="id" placeholder="Id/Cargo da Vaga">
                <datalist name="vaga" id="id_vagas" class="input">
                    <?php
                    if (mysqli_num_rows($executaIdVagas) > 0) {
                        while ($idsVagas = mysqli_fetch_assoc($executaIdVagas)) { ?>
                            <option><?php echo $idsVagas['id_vaga'] . ' - ' . $idsVagas['cargo']; ?></option>
                    <?php }
                    }
                    ?>
                </datalist>
            </label>
        </div>

        <div class="flex">

            <label>
                <p>Data de Início</p>
                <input class="input" type="date" name="data-inicio" id="data-inicio">
            </label>

            <label>
                <p>Data de Término</p>
                <input class="input" type="date" name="data-termino" id="data-termino">
            </label>

        </div>

        <div class="flex">

            <div class="cancela-cadastra">
                <button class="btn-modal" id="btn-fecha-modal">Cancelar</button>

                <button class="btn-modal" id="btn-cadastro">
                    <input type="submit" id="submit" name="submit" value="Cadastrar">
                </button>

            </div>

        </div>

    </form>

</dialog>