<section id="quem-somos">

    <?php $header_page_contato = app_get_cms_bloco('header-page-contato');  ?>

    <h1><?php echo $header_page_contato['titulo'];?><span><?php echo strip_tags($header_page_contato['conteudo']);?></span></h1>
    <div id="form_contato">
        <form>
            <fieldset>
                <input type="text" name="contato_nome" id="contato_nome" placeholder="Nome:">
                <input type="text" name="contato_assunto" id="contato_assunto" placeholder="Assunto:">
            </fieldset>
            <fieldset class="field_form">
                <input type="email" name="contato_email" id="contato_email" placeholder="E-mail:">
            </fieldset>
            <fieldset class="field_form">
                <input type="text" name="contato_telefone" id="contato_telefone" placeholder="(DDD) Telefone:">
            </fieldset>
            <fieldset class="text_form">
                <textarea cols="68" rows="15" placeholder="Mensagem:"></textarea>
            </fieldset>
            <fieldset>
                <button type="submit" id="encaminha_email" value="enviar" class="contato_enviar botoes">
                    <span class="span_botoes sprite">ENVIAR</span>
                </button>
            </fieldset>
        </form>
    </div>
</section>