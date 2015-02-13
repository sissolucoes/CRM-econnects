<footer>
    <section id="mapa">
        <div class="wrap clearfix sitemap">
            <nav id="main_links" class="left">
                <?php if($menu_footer) : ?>
                    <?php foreach( $menu_footer as  $menu_footer_item) :?>
                        <a href="<?php echo app_get_url_menu_item($menu_footer_item['link']);?>" class="" target="<?php echo $menu_footer_item['target'];?>"><?php echo $menu_footer_item['nome'];?></a>
                    <?php endforeach?>
                <?php endif;?>
            </nav>

            <article id="links_voce" class="clearfix left">
                <h1><?=lang('core.bom_para_vc');?></h1>

                <?php $c = 1; $total = count($menu_bom_pra_vc); foreach($menu_bom_pra_vc as $menu_bom_pra_vc_item): ?>
                    <nav class="<?php echo ($c == $total) ? 'last': '';?>">
                        <h2><?php echo $menu_bom_pra_vc_item['titulo']?></h2>
                        <?php if($menu_bom_pra_vc_item['filhos']) :?>

                                <?php foreach($menu_bom_pra_vc_item['filhos'] as $filho_item) :?>
                                  <a href="<?php echo app_get_url_menu_item($filho_item['link']);?>"><?php echo $filho_item['titulo'];?></a>
                                <?php endforeach;?>

                        <?php endif?>

                    </nav>
                <?php $c++; endforeach;?>

            </article>

            <article id="links_empresa" class="clearfix right">
                <h1><?= lang('core.bom_para_empresa');?></h1>
                <?php $c = 1; $total = count($menu_para_sua_empresa); foreach($menu_para_sua_empresa as $menu_para_sua_empresa_item): ?>
                    <nav class="<?php echo ($c == $total) ? 'last': '';?>">
                        <h2><?php echo $menu_para_sua_empresa_item['titulo']?></h2>
                        <?php if($menu_para_sua_empresa_item['filhos']) :?>

                            <?php foreach($menu_para_sua_empresa_item['filhos'] as $filho_item) :?>
                                <a href="<?php echo app_get_url_menu_item($filho_item['link']);?>"><?php echo $filho_item['titulo'];?></a>
                            <?php endforeach;?>

                        <?php endif?>

                    </nav>
                <?php $c++; endforeach;?>

            </article>
        </div>
    </section>

    <section id="copy">
        <div class="wrap clearfix sitemap_row2">
            <article id="assinatura" class="left clearfix">
                <img src="<?php echo app_assets_url('images/logotipo-corcovado-footer.png', 'site');?>" width="49" height="56" alt="Logotipo Corcovado"
                     title="Corcovado" class="left"/>

                <p class="left">Corcovado<br>
                    Corretora de Seguros<br>
                    Todos os direitos reservados. &copy;2013</p>
            </article>

            <nav class="social right clearfix">
                <a href="<?php echo app_get_configuracao('url_page_facebook');?>" class="ico_facebook sprite"></a>
                <!--<a href="#" class="ico_twitter sprite"></a>-->
                <a href="<?php echo app_get_configuracao('url_page_linkedin');?>" class="ico_linkedin sprite"></a>
                <a href="<?php echo app_get_configuracao('url_page_google_plus');?>" class="ico_google sprite"></a>
            </nav>

            <nav class="menu_secundario right clearfix">
                <a href="<?php echo site_url('sac');?>" class="sac tootlip" title="Página de SAC">SAC</a>
                <a href="<?php echo site_url('sac');?>" class="ico_chat sac sprite tootlip" title="Chat"></a>
                <a href="<?php echo site_url('contato');?>" class="ico_email sac sprite tootlip" title="E-mail"></a>
                <a href="#" class="ico_tel sac sprite tootlip" title="Telefone"></a>

                <p>(11) 3017-8380</p>
            </nav>
        </div>
    </section>

</footer>