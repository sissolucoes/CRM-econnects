<div id="produtos_online_form">
<article>
<h1>FAÇA JÁ SUA COTAÇÃO</h1>
<img src="<?php echo app_assets_url('images/passo-a-passo-seguro-auto-01.png', 'site');?>" class="right" style="margin-right: 30px;"><br clear="all">
<h2>DADOS DO SEGURADO</h2>
<form action="produto_offline_pag-02.php">
<fieldset>
    <input type="text" name="nome" id="nome" placeholder="Nome:">
    <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome:">
</fieldset>
<fieldset>
    <input type="email" name="email" id="email" placeholder="E-mail">
    <input type="email" name="confirma-email" id="confirma-email" placeholder="Confirmar e-mail:">
</fieldset>
<fieldset>
    <input type="text" name="telefone" id="telefone" placeholder="Telefone:" class="dados_off01">
    <input type="text" name="nascimento" id="nascimento" placeholder="Nascimento:" class="dados_off01 datepicker_online02">
    <button class="datepicker_online02 btn-datepicker" value="nascimento"></button>
    <input type="text" name="rg" id="rg" placeholder="RG:" class="dados_off01" style="margin-left: 12px ! important;">
    <input type="text" name="emissao" id="emissao" placeholder="Emissão:" class="dados_off01 datepicker_online02">
    <button class="datepicker_online02 btn-datepicker" value="emissao"></button>
</fieldset>
<fieldset>
    <input type="text" name="cpf" id="cpf" placeholder="CPF:" class="dados_off01">
    <input type="text" name="cnh" id="cnh" placeholder="CNH:" class="dados_off01">
    <input type="text" name="primeira_cnh" id="primeira_cnh" placeholder="Data 1º hab.:" class="dados_off01 datepicker_online02">
    <button class="datepicker_online02 btn-datepicker" value="primeira_cnh"></button>
</fieldset>
<fieldset>
    <input type="text" name="endereco" id="endereco" placeholder="Endereço:">
    <input type="text" name="cep" id="cep" placeholder="CEP:" class="dados_off01">

    <dl id="sample" class="dropdown correntista">
        <dt><a href="#"><span>Correntista do banco</span></a></dt>
        <dd>
            <ul>
                <li><a href="#">Opção 01</a></li>
                <li><a href="#">Opção 02</a></li>
                <li><a href="#">Opção 03</a></li>
            </ul>
        </dd>
    </dl>
    <span id="result"></span>

</fieldset>
<fieldset>

    <dl id="sample" class="dropdown personalite">
        <dt><a href="#"><span>É cliente Itaú Personalité?</span></a></dt>
        <dd>
            <ul>
                <li><a href="#">Sim</a></li>
                <li><a href="#">Não</a></li>
            </ul>
        </dd>
    </dl>
    <span id="result"></span>

</fieldset><br><br>

<h2>DADOS DO PERFIL DO CONDUTOR</h2>
<fieldset>
    <input type="text" name="nome" id="nome" placeholder="Nome:">
    <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome:">
</fieldset>
<fieldset>
    <input type="text" name="nascimento02" id="nascimento02" placeholder="Nascimento:" class="dados_off01 datepicker_online02">
    <button class="datepicker_online02 btn-datepicker" value="nascimento02"></button>
    <input type="text" name="rg" id="rg" placeholder="RG:" class="dados_off01">
    <input type="text" name="emissao" id="emissao" placeholder="Emissão:" class="dados_off01 off_emissao">
    <input type="text" name="cpf" id="cpf" placeholder="CPF:" class="dados_off01">
</fieldset>
<fieldset>
    <input type="text" name="cnh" id="cnh" placeholder="CNH:" class="dados_off01">
    <input type="text" name="primeira_cnh02" id="primeira_cnh02" placeholder="Data 1º hab.:" class="dados_off01 datepicker_online02">
    <button class="datepicker_online02 btn-datepicker" value="primeira_cnh02"></button>

    <dl id="sample" class="dropdown estado_civil">
        <dt><a href="#"><span>Estado Civil</span></a></dt>
        <dd>
            <ul>
                <li><a href="#">Casado (a)</a></li>
                <li><a href="#">Solteiro (a)</a></li>
            </ul>
        </dd>
    </dl>
    <span id="result"></span>


    <dl id="sample" class="dropdown rel_segurado">
        <dt><a href="#"><span>Relação com segurado</span></a></dt>
        <dd>
            <ul>
                <li><a href="#">Opção 01</a></li>
                <li><a href="#">Opção 02</a></li>
            </ul>
        </dd>
    </dl>
    <span id="result"></span>

</fieldset>
<fieldset>

    <dl id="sample" class="dropdown util_veiculo">
        <dt><a href="#"><span>Utilização do veículo</span></a></dt>
        <dd>
            <ul>
                <li><a href="#">Opção 01</a></li>
                <li><a href="#">Opção 02</a></li>
            </ul>
        </dd>
    </dl>
    <span id="result"></span>

    <dl id="sample" class="dropdown garagem_work">
        <dt><a href="#"><span>Garagem no trabalho?</span></a></dt>
        <dd>
            <ul>
                <li><a href="#">Sim</a></li>
                <li><a href="#">Não</a></li>
            </ul>
        </dd>
    </dl>
    <span id="result"></span>

    <dl id="sample" class="dropdown garagem_work">
        <dt><a href="#"><span>Garagem na residência?</span></a></dt>
        <dd>
            <ul>
                <li><a href="#">Sim</a></li>
                <li><a href="#">Não</a></li>
            </ul>
        </dd>
    </dl>
    <span id="result"></span>

</fieldset>
<fieldset>
    <input type="text" name="estuda" id="estuda" placeholder="Estuda:" class="dados_off01">

    <dl id="sample" class="dropdown garagem_work">
        <dt><a href="#"><span>Período</span></a></dt>
        <dd>
            <ul>
                <li><a href="#">Manhã</a></li>
                <li><a href="#">Tarde</a></li>
                <li><a href="#">Noite</a></li>
            </ul>
        </dd>
    </dl>
    <span id="result"></span>

    <dl id="sample" class="dropdown garagem_work">
        <dt><a href="#"><span>Tem garagem?</span></a></dt>
        <dd>
            <ul>
                <li><a href="#">Sim</a></li>
                <li><a href="#">Não</a></li>
            </ul>
        </dd>
    </dl>
    <span id="result"></span>
</fieldset>

<fieldset>
    <input type="text" name="casa_trabalho" id="casa_trabalho" placeholder="Distância casa/trab.:" class="dados_off01">
    <input style="margin-right: 26px;" type="text" name="km_mensal" id="km_mensal" placeholder="Km mensal:" class="dados_off01">

    <dl id="sample" class="dropdown veiculo_roubado">
        <dt><a href="#"><span>Veículo roubado nos últimos 2 anos?</span></a></dt>
        <dd>
            <ul>
                <li><a href="#">Sim</a></li>
                <li><a href="#">Não</a></li>
            </ul>
        </dd>
    </dl>
    <span id="result"></span>
</fieldset>

<fieldset>

    <dl id="sample" class="dropdown util_veiculo">
        <dt><a href="#"><span>Reside com menores de 26 anos?</span></a></dt>
        <dd>
            <ul>
                <li><a href="#">Sim</a></li>
                <li><a href="#">Não</a></li>
            </ul>
        </dd>
    </dl>
    <span id="result"></span>

    <dl id="sample" class="dropdown garagem_work">
        <dt><a href="#"><span>Dirigem o veículo?</span></a></dt>
        <dd>
            <ul>
                <li><a href="#">Sim</a></li>
                <li><a href="#">Não</a></li>
            </ul>
        </dd>
    </dl>
    <span id="result"></span>

</fieldset>

<fieldset>
    <input type="text" name="idade" id="idade" placeholder="Idade:" class="dados_off01">

    <dl id="sample" class="dropdown garagem_work">
        <dt><a href="#"><span>Sexo</span></a></dt>
        <dd>
            <ul>
                <li><a href="#">Masculino</a></li>
                <li><a href="#">Feminino</a></li>
            </ul>
        </dd>
    </dl>
    <span id="result"></span>

    <input type="text" name="obs" id="obs" placeholder="Obs:">
</fieldset>
<fieldset>
    <button type="submit" class="botao_avancar botoes" id="botao_avancar" value="Avançar">
        <span class="span_botoes sprite">Avançar</span> </button>
</fieldset>
</form>
</article>
</div>