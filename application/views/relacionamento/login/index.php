<section class="recuperar_login">
    <div class="pag_login">
        <h1>ÁREA DE RELACIONAMENTO PERSONALIZADA</h1>
        <p style="text-align: justify">Aqui você pode gerenciar suas apólices, pagamentos, acompanhar suas cotações e sinistros, entre outros serviços, de maneira fácil e rápida. TUDO EM UM ÚNICO LUGAR!</p>
        <form id="loginForm" method="post" action="<?php echo $login_form_url;?>">
            <fieldset>
                <input type="email" required name="login" id="email_login" placeholder="E-mail:">
            </fieldset>
            <fieldset>
                <input type="password" required name="password" id="senha_login" placeholder="Senha:">
            </fieldset>
            <fieldset class="cadastre_se">
                <p><a class="esqueci-minha-senha" href="#">Esqueci minha senha</a></p>
            </fieldset>
            <fieldset class="cadastre_se" style="margin-top: -26px;">
                <p>Se ainda não possui cadastro, <a class="cadastre-se" href="#">clique aqui.</a></p>
            </fieldset>
            <fieldset>
                <p style="margin-top: 0;"><a class="area-personalizada botao_entrar botoes" href="#"><span class="span_botoes sprite">Entrar</span></a></p>
            </fieldset>
        </form>
    </div>

    <div class="area_personalizada" id="area-relacionamento" style="display: none;">
        <h1>Perfil de acesso</h1>
        <p>Identificamos que você possui mais de um perfil de acesso.<br>
            Selecione abaixo o perfil desejado.</p>

        <div style="width: 442px; margin-left: 30px; margin-top: -15px;">

            <div class="itens_login">
                <img src="images/aba_login.png">
                <div class="vc_login">
                    <a href="./relacionamento/relacionamento_home.php"><h2>MARCELLO DIORIO</h2>
                        <span class="cnpj">CPF: 123.456.789 - 00</span></a>
                </div>
            </div>
            <div class="itens_login">
                <img src="images/aba_login_empresa.png">
                <div class="segurados_login">
                    <a href="./relacionamento/relacionamento_home.php"><h2>CORCOVADO CORRETORA DE SEGUROS E AGENCIA DE VIAGENS LTDA</h2>
                        <span class="cnpj">CNPJ: 08.303.528/0001-41</span></a>
                </div>
                <div class="segurados_login">
                    <a href="./relacionamento/relacionamento_home.php"><h2>CORCOVADO CORRETORA DE SEGUROS E AGENCIA DE VIAGENS LTDA</h2>
                        <span class="cnpj">CNPJ: 08.303.528/0001-41</span></a>
                </div>
                <div class="segurados_login">
                    <a href="./relacionamento/relacionamento_home.php"><h2>CORCOVADO CORRETORA DE SEGUROS E AGENCIA DE VIAGENS LTDA</h2>
                        <span class="cnpj">CNPJ: 08.303.528/0001-41</span></a>
                </div>
            </div>
        </div>
    </div>


    <div class="pag_login" id="pag_esqueci_senha" style="display: none;">
        <h1 style="padding-bottom: 18px;">ESQUECI MINHA SENHA</h1>
        <p>Preencha o campo abaixo com o e-mail cadastrado e envie. Dentro de instantes você receberá uma nova senha.</p>
        <form>
            <fieldset>
                <input type="email" placeholder="E-mail:" id="esqueci_senha" name="esqueci_senha" style="margin-top: -4px;">
            </fieldset>
            <fieldset>
                <button type="submit" value="Enviar" id="entrar" class="botao_entrar02 botoes">
                    <span class="span_botoes sprite">Enviar</span>
                </button>
            </fieldset>
        </form>
    </div>

    <div class="pag_cadastre" style="display: none;">
        <h1>CADASTRE-SE</h1>
        <form>
            <fieldset>
                <input type="text" name="nome" id="nome" placeholder="Nome:" class="cadastre_row">
                <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome:" class="cadastre_row">
            </fieldset>
            <fieldset>
                <input type="text" name="nascimento" id="nascimento" placeholder="Nascimento:" class="cadastre_row datepicker_online02"><button class="datepicker_online02 btn-datepicker" value="nascimento"></button>
                <input type="text" name="cpf" id="cpf" placeholder="CPF:" class="cadastre_row">
            </fieldset>
            <fieldset>
                <input type="email" name="email_cadastrar" id="email_cadastrar" placeholder="E-mail:">
            </fieldset>
            <fieldset>
                <input type="email" name="email_confirmar" id="email_confirmar" placeholder="Confirmação de e-mail:">
            </fieldset>
            <fieldset>
                <input type="password" name="senha" id="senha" placeholder="Senha:" class="cadastre_row">
                <input type="password" name="repita_senha" id="repita_senha" placeholder="Confirme a senha:" class="cadastre_row">
            </fieldset>
            <fieldset>
                <button type="submit" value="Cadastrar" id="entrar" class="botao_cadastrar botoes">
                    <span class="span_botoes sprite">Cadastrar</span>
                </button>
            </fieldset>
        </form>
    </div>
</section> <br clear="all">