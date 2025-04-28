<section>
    <div class="informacoes-perfil">
        <div class="informacoes-tabela">
            <div class="dado-tabela">
                <div class="celula">
                    <p>RM</p>
                </div>
                <div class="celula">
                    <p><?php echo $rm ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>Nome</p>
                </div>
                <div class="celula">
                    <p><?php echo $nome ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>Sexo</p>
                </div>
                <div class="celula">
                    <p><?php echo $sexo ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>Telefone</p>
                </div>
                <div class="celula">
                    <p><?php echo $telefone ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>Email</p>
                </div>
                <div class="celula">
                    <p><?php echo $email ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>Senha</p>
                </div>
                <div class="celula">
                    <p>***************</p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>Série</p>
                </div>
                <div class="celula">
                    <p><?php echo $serie ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>Curso</p>
                </div>
                <div class="celula">
                    <p><?php echo $curso ?> </p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>Ano de Início/Término</p>
                </div>
                <div class="celula">
                    <p><?php echo $anoInicioTermino ?></p>
                </div>
            </div>

            <div class="btn-edita-perfil">
                <a href="editarPerfilUsuario.php?rm=<?php echo $rm; ?>">
                    <button>Editar Perfil</button>
                </a>
            </div>

        </div>
    </div>

    <input type="hidden" id="tipo" value="<?php echo $_SESSION['tipo']; ?>">

</section>