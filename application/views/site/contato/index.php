<section id="quem-somos">

    <?php $header_page_contato = app_get_cms_bloco('header-page-contato');  ?>

    <h1><?php echo $header_page_contato['titulo'];?><span><?php echo strip_tags($header_page_contato['conteudo']);?></span></h1>
    <div id="form_contato">

        <div id="message_box">
        </div>

        <form id="formContato" method="post" action="<?php echo site_url('contato/proccess_form')?>">
            <fieldset>
                <input type="text" name="nome" id="" placeholder="<?=lang('contato.nome')?>:">
                <input type="text" name="assunto" id="" placeholder="<?=lang('contato.assunto')?>:">
            </fieldset>
            <fieldset class="field_form">
                <input type="text" name="email" id="" placeholder="<?=lang('contato.email')?>:">
            </fieldset>
            <fieldset class="field_form">
                <input type="text" name="telefone" id="" placeholder="<?=lang('contato.telefone')?>:">
            </fieldset>
            <fieldset class="field_form">
                <input type="text" name="celular" id="" placeholder="<?=lang('contato.celular')?>:">
            </fieldset>
            <fieldset class="field_form">
                <input type="text" name="horario_contato" id="" placeholder="<?=lang('contato.horario_contato')?>">
            </fieldset>
            <fieldset class="text_form">
                <textarea name="mensagem" cols="68" rows="15" placeholder="<?=lang('contato.mensagem')?>:"></textarea>
            </fieldset>
            <fieldset>
                <button type="submit" id="encaminha_email" value="enviar" class="contato_enviar botoes">
                    <span class="span_botoes sprite"><?=lang('contato.enviar')?></span>
                </button>
            </fieldset>
        </form>
    </div>
</section>