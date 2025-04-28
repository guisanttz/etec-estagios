<section class="perfil">

    <div class="informacoes-perfil">
        <div class="informacoes-tabela">
            <!-- <div class="topo-tabela">
                    <a href="">
                        <button id="editar"><i class='bx bxs-edit'></i></button>
                    </a>
                </div> -->
            <div class="dado-tabela">
                <div class="celula">
                    <p>Razão Social</p>
                </div>
                <div class="celula">
                    <p><?php echo $razao_social ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>Nome Fantasia</p>
                </div>
                <div class="celula">
                    <p><?php echo $nome_fantasia ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>CNPJ</p>
                </div>
                <div class="celula">
                    <p><?php echo $cnpj ?></p>
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
                    <p>Ramo de Atividade</p>
                </div>
                <div class="celula">
                    <p><?php echo $ramo_atividade ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>Inscrição Estadual</p>
                </div>
                <div class="celula">
                    <p><?php echo $inscricao_estadual ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>Endereço</p>
                </div>
                <div class="celula">
                    <p><?php echo $endereco . ", " . $numero . ", " .  $cidade . ", " . $estado ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>CEP</p>
                </div>
                <div class="celula">
                    <p><?php echo $cep ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>Nome do Representante</p>
                </div>
                <div class="celula">
                    <p><?php echo $nome_representante ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>Data de Fundação</p>
                </div>
                <div class="celula">
                    <p><?php echo $data_fundacao ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>Contato Whatsapp</p>
                </div>
                <div class="celula">
                    <p><?php echo $contato_whatsapp ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>Contato Telefone</p>
                </div>
                <div class="celula">
                    <p><?php echo $contato_telefone ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>Instagram</p>
                </div>
                <div class="celula">
                    <p><?php echo $perfilInstagram ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>Facebook</p>
                </div>
                <div class="celula">
                    <p><?php echo $perfilFacebook ?></p>
                </div>
            </div>

            <div class="dado-tabela">
                <div class="celula">
                    <p>LinkedIn</p>
                </div>
                <div class="celula">
                    <p><?php echo $perfilLinkedin ?></p>
                </div>
            </div>

            <div class="btn-edita-perfil">
                <a href="editarPerfilEmpresa.php?id=<?php echo $idEmpresa; ?>">
                    <button>Editar Perfil</button>
                </a>
            </div>

        </div>
    </div>

    <input type="hidden" id="tipo" value="<?php echo $_SESSION['tipo']; ?>">

</section>