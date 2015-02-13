<section id="produtos">
    <div class="left">
        <img id="img_produto" src="<?php echo app_assets_url("produtos/{$produto['produto_id']}/{$produto['imagem']}" , 'uploads')?>">
    </div>
    <div id="produtos_online">
        <nav>
            <div class="wrap clearfix">
                <a class="active dis_selection" title="Bom para você" id="aba_pf">TURISMO</a>
                <a class="dis_selection" title="Bom para sua empresa" id="aba_pj">NEGÓCIO</a>
                <a class="dis_selection" title="Bom para sua empresa" id="aba_pe">ESTUDOS</a>
                <a style="position: relative; right: -33px;" class="voltar" title="Voltar" id="botao_voltar" href="<?php echo site_url('produtos');?>"><img src="<?php echo app_assets_url('images/botao_voltar.png', 'site');?>"></a>
            </div>
        </nav>
        <div class="publico wrap clearfix" id="pf" style="position: relative; top: -14px; left: 1px; width: 569px; height: 339px;">
            <img src="<?php echo app_assets_url('images/icone-beneficios.png', 'site');?>" class="imgs_destaques">
            <h2>Benefícios</h2>
            <h1 style="margin-bottom: -7px;">Seguro Viagem<span style="color: #5b5c5e;"> - Turismo</span></h1>
            <p>Chegou o dia da grande viagem. Voc&ecirc; desembarca no seu destino e n&atilde;o localiza a bagagem. Procura o balc&atilde;o da companhia a&eacute;rea e &eacute; informado que ela foi para outro lugar e, se for encontrada, dever&aacute; chegar &agrave;s suas m&atilde;os em dois dias. Como resolver uma situa&ccedil;&atilde;o dessas?</p>

            <p>Na compra do Seguro Viagem, a cobertura por demora na localiza&ccedil;&atilde;o de bagagem garante o reembolso de despesas com a reposi&ccedil;&atilde;o de itens de primeira necessidade at&eacute; que ela seja encontrada. Mas se mesmo assim ela n&atilde;o chegar em suas m&atilde;o, voc&ecirc; conta com a indeniza&ccedil;&atilde;o por extravio de bagagem, al&eacute;m de outras coberturas, como por exemplo, atendimento m&eacute;dico.</p>

            <p>Voc&ecirc; s&oacute; precisa de um telefonema para ter acesso a esse e outros benef&iacute;cios 24h por dia, 365 dias nos 5 continentes e no seu idioma.</p>

            <p><strong>Viaje tranquilo e traga na bagagem somente boas lembran&ccedil;as!</strong></p>

        </div>

        <div class="publico hidden wrap clearfix" id="pj" style="position: relative; top: -14px; left: 1px; width: 569px; height: 339px;">
            <img src="<?php echo app_assets_url('images/icone-beneficios.png', 'site');?>" class="imgs_destaques">
            <h2>Benefícios</h2>
            <h1 style="margin-bottom: -7px;">Seguro Viagem<span style="color: #5b5c5e;"> - Negócios</span></h1>
            <p>A organiza&ccedil;&atilde;o de uma viagem de neg&oacute;cios n&atilde;o deve considerar somente passagem a&eacute;rea, hotel e loca&ccedil;&atilde;o de ve&iacute;culo para o executivo que ir&aacute; representar a empresa.</p>

            <p>&Eacute; importante pensar nos imprevistos. Se durante o per&iacute;odo da viagem ocorrer algum acidente que impossibilite o representante da empresa a comparecer &agrave; reuni&atilde;o de fechamento de um neg&oacute;cio importante, o que pode ser feito?</p>

            <p>Comprando o Seguro Viagem, al&eacute;m de prestar assist&ecirc;ncia m&eacute;dica necess&aacute;ria ao colaborador acidentado, a empresa conta tamb&eacute;m com a cobertura de traslado de executivo, que organiza a emiss&atilde;o de uma passagem a&eacute;rea de ida e volta, para substitui-lo por outro representante. Para ter acesso a esses e outros benef&iacute;cios voc&ecirc; s&oacute; precisa de um telefonema e ser&aacute; atendidido 24h por dia, 365 dias nos 5 continentes e no seu idioma.</p>
        </div>

        <div class="publico hidden wrap clearfix" id="pe" style="position: relative; top: -14px; left: 1px; width: 569px; height: 339px;">
            <img src="<?php echo app_assets_url('images/icone-beneficios.png', 'site');?>" class="imgs_destaques">
            <h2>Benefícios</h2>
            <h1 style="margin-bottom: -7px;">Seguro Viagem<span style="color: #5b5c5e;"> - Estudos</span></h1>
            <p>O planejamento de uma viagem de estudo e de longa dura&ccedil;&atilde;o deve considerar que imprevistos acontecem. Em um pa&iacute;s com costumes, cultura, idioma e legisla&ccedil;&atilde;o diferentes, se voc&ecirc; tiver algum problema de sa&uacute;de a quem ir&aacute; recorrer? Consultas, exames e tratamento para uma simples gripe somam altos custos. Al&eacute;m disso, para adquirir medicamentos, voc&ecirc; precisa apresentar a receita m&eacute;dica. Nestes casos, de que forma voc&ecirc; ter&aacute; acesso a servi&ccedil;os m&eacute;dicos?</p>

            <p>Na compra do Seguro Viagem a cobertura de assist&ecirc;ncia m&eacute;dica ir&aacute; lhe oferecer o suporte necess&aacute;rio frente a situa&ccedil;&otilde;es como estas. Com apenas um telefonema, voc&ecirc; ter&aacute; a garantia de facilidades que v&atilde;o de um simples reembolso de medicamentos at&eacute; o aux&iacute;lio financeiro. Tudo isso 24h por dia, 365 dias nos 5 continentes e no seu idioma.</p>

            <p><strong>Viaje tranquilo e traga na bagagem somente boas lembran&ccedil;as!</strong></p>
        </div>

        <br clear="all">

        <div id="boxes">

            <?php $bloco_box_telefone = app_get_cms_bloco('produto-box-telefone');?>
            <?php if($bloco_box_telefone) :?>
                <div id="cotacao_tel">
                    <div class="cotacao_tel">
                        <h1><?php echo $bloco_box_telefone['titulo'];?></h1>
                        <p><?php echo strip_tags($bloco_box_telefone['conteudo']);?></p>
                    </div>
                    <div class="img_cotacao_tel">
                        <img src="<?php echo app_assets_url('images/img_cotacao_tel.png', 'site');?>" style="width: 497px;">
                    </div>
                </div>
            <?php endif;?>
            <br clear="all">



            <div id="boxes_bottom_produtos">

                <?php
                $bloco_produto_tipo = false;

                if($produto['tipo_pessoa'] == 'PF') {

                    $bloco_produto_tipo = app_get_cms_bloco('produto-bom-pra-vc');

                }elseif($produto['tipo_pessoa'] == 'PJ') {
                    $bloco_produto_tipo = app_get_cms_bloco('produto-bom-pra-empresa');
                }

                ?>

                <?php if($bloco_produto_tipo) : ?>
                    <div class="box_aviso left">
                        <img src="<?php echo app_assets_url('images/img_box_aviso.png', 'site');?>" style="width: 160px; height: 164px;">
                        <h1 class="aviso_h1"><?php echo $bloco_produto_tipo['titulo'];?></h1>
                        <p><?php echo $bloco_produto_tipo['conteudo'];?></p>
                        <a href="<?php echo site_url('produtos')?>"><img  style="position: relative; top: -11px;" src="<?php echo app_assets_url('images/ico_saiba_mais.png', 'site');?>"></a>
                    </div>
                <?php endif;?>

                <?php $bloco_box_duvidas = app_get_cms_bloco('produto-box-duvidas');?>
                <div class="box_faq right">
                    <a href="<?php echo site_url('sac')?>">
                        <img src="<?php echo app_assets_url('images/img_box_faq.png', 'site');?>" style="width: 160px; height: 164px;">
                        <h1><?php echo $bloco_box_duvidas['titulo'];?></h1>

                        <?php echo $bloco_box_duvidas['conteudo'];?>

                    </a>
                </div>
                <br clear="all">
            </div>

</section>