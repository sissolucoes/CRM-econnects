<section id="produtos">
    <div class="left">
        <img src="<?php echo app_assets_url('images/torre_produto_online.jpg', 'site');?>">
    </div>
    <div id="produtos_offline">
        <div class="offline wrap clearfix" id="pf">
            <nav>
                <div style="text-align: right; margin-top: 10px; width: 582px;">
                    <a href="#" id="botao_voltar" title="Voltar" class="voltar"><img src="<?php echo app_assets_url('images/botao_voltar.png', 'site');?>"></a>
                </div>
            </nav>
            <div style="margin-top: -44px;">
                <img src="<?php echo app_assets_url('images/icone-patrimonio.png', 'site');?>"class="img_offline">
                <h2><?php echo $categoria['titulo'];?></h2>
                <h1><?php echo $produto['titulo'];?></h1>
                <?php echo $produto['conteudo'];?>
            </div>
            <div class="conheca">
                <p> <a href="#dialog" name="modal">Conheça cobertura e limite dos planos</a></p>
            </div>
        </div> <br clear="all">

        <div id="boxes">


            <div id="cotacao_tel">
                <div class="cotacao_tel">
                    <h1>Você também pode fazer sua cotação por telefone</h1>
                    <p>A Corcovado conta com uma equipe altamente qualificada e treinada para atendê-lo e fazer a sua cotação, dando todo o suporte que você precisa. Ligue para a Central de Relacionamento de segunda à sexta-feira das 9h às 18h.</p>
                </div>
                <div class="img_cotacao_tel">
                    <img src="<?php echo app_assets_url('images/img_cotacao_tel.png', 'site');?>" style="width: 497px;">
                </div>
            </div>
            <br clear="all">



            <div id="boxes_bottom_produtos">
                <div class="box_aviso left">
                    <img src="<?php echo app_assets_url('images/img_box_aviso.png', 'site');?>" style="width: 160px; height: 164px;">
                    <h1 style="margin-bottom: -4px !important; position: relative; top: -9px">BOM PARA SUA EMPRESA</h1>
                    <p style="position: relative; top: -11px;">Conheça o portfólio de seguros disponíveis para sua empresa que permite assumir maiores riscos de maneira controlada.</p>
                    <a href="produtos.php"><img  style="position: relative; top: -11px;" src="<?php echo app_assets_url('images/ico_saiba_mais.png', 'site');?>"></a>
                </div>
                <div class="box_faq right">
                    <a href="sac.php">
                        <img src="<?php echo app_assets_url('images/img_box_faq.png', 'site');?>" style="width: 160px; height: 164px;">
                        <h1 style="margin-bottom: -4px !important; position: relative; top: -9px">DÚVIDAS</h1>
                        <p style="position: relative; top: -11px;">No FAQ você encontra as respostas para as perguntas mais frequentes, que naturalmente surgem no momento da compra de seguros.</p>
                        <p style="position: relative; top: -18px;">Você pode consulta-lo ou contar com o apoio da Central de Relacionamento para obter informações.</p>
                    </a>
                </div><br clear="all">
            </div>

</section>