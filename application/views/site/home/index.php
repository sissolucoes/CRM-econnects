<?php $this->load->view('site/home/slide-destaque');?>

<section id="dropdown" class="wrap clearfix">

    <article class="coluna left">
        <h1 id="but_pf"><?=lang('core.bom_para_vc');?> <span class="seta branca sprite right"></span></h1>
        <ul id="dropdown_pf">
            <?php foreach($produto_categorias_pf as $produto_categoria_pf) :?>
                <li>
                    <h2><?php echo $produto_categoria_pf['titulo']?></h2>
                    <?php if($produto_categoria_pf['produtos']) :?>
                        <ul class="categoria">
                            <?php foreach($produto_categoria_pf['produtos'] as $produto_pf) :?>
                                <li><a href="<?php echo app_get_url_produto($produto_pf);?>" title=""><?php echo $produto_pf['titulo']?></a></li>
                            <?php endforeach;?>
                        </ul>
                    <?php endif?>
                </li>
            <?php endforeach;?>
        </ul>

    </article>

    <article class="coluna right">
        <h1 id="but_pj"><?= lang('core.bom_para_empresa');?> <span class="seta branca sprite right"></span></h1>
        <ul id="dropdown_pj">
            <?php foreach($produto_categorias_pj as $produto_categoria_pj) :?>
                <li>
                    <h2><?php echo $produto_categoria_pj['titulo']?></h2>
                    <?php if($produto_categoria_pj['produtos']) :?>
                        <ul class="categoria">
                            <?php foreach($produto_categoria_pj['produtos'] as $produto_pj) :?>
                                <li><a href="<?php echo app_get_url_produto($produto_pj);?>" title=""><?php echo $produto_pj['titulo']?></a></li>
                            <?php endforeach;?>
                        </ul>
                    <?php endif?>
                </li>
            <?php endforeach;?>
        </ul>

    </article>

</section>

<section id="content" class="wrap clearfix">
    <article class="window um clearfix">

        <?php $bloco_parceiros = app_get_cms_bloco('home-parceiros-estrategicos');  ?>
        <div class="text-banner coluna left">
            <h2 class="parceiros parceiros_estrategico"><span><?php echo $bloco_parceiros['titulo'];?></span></h2>
            <h1 class="segurados_conceituadas"><?php echo $bloco_parceiros['subtitulo'];?></h1>
            <p class="p_parceiros_estrategico">
                <?php echo strip_tags($bloco_parceiros['conteudo']);?>
            </div>
        </div>
        <?php $this->load->view('site/home/slide-produtos');?>
    </article>

    <?php $bloco_home_seguroviagem = app_get_cms_bloco('home-seguro-viagem');  ?>
    <article class="window dois left article_class">
        <img src="<?php echo app_assets_url('img_placeholders/seguro-viagem-negocios.jpg', 'site');?>" width="355" height="485" alt="" />
        <div class="text right">
            <h2 class="h2-bloco_home"><img src="<?php echo app_assets_url('images/icone-beneficios.png', 'site');?>" border="0"><span class="span_class"><?php echo $bloco_home_seguroviagem['titulo']?></span></h2>
            <h1 class="h1-bloco_home"><?php echo $bloco_home_seguroviagem['subtitulo'];?></h1>
            <?php echo $bloco_home_seguroviagem['conteudo'];?>

            <nav class="left clearfix">
                <a href="#" class="botao more"><?= lang('core.saiba_mais');?></a>
                <a href="produto_online_pag-01.php" class="botao online sprite"><?= lang('core.comprar');?></a>
                <a href="#" class="botao"><?= lang('core.planos');?></a>
            </nav>
        </div>
    </article>

    <?php $bloco_home_quemsomos = app_get_cms_bloco('home-quem-somos');  ?>
    <article class="window tres right">
        <img src="<?php echo app_assets_url('img_placeholders/conteudo_3.png', 'site');?>" width="225" height="172" alt="" />
        <div class="text text_01">
            <h2><img src="<?php echo app_assets_url('images/ico-quem-somos.png', 'site');?>" border="0"><span class="span_class02"><?php echo $bloco_home_quemsomos['titulo'];?></span></h2>
            <h1><?php echo $bloco_home_quemsomos['subtitulo'];?></h1>
            <p> <?php echo strip_tags($bloco_home_quemsomos['conteudo']);?> <a href="<?php echo site_url('quem-somos'); ?>" class="link"><?= lang('core.confira')?>.</a></p>
        </div>
    </article>
</section>
<section id="nossos_produtos">
<nav>
    <div class="wrap clearfix">
        <h1><?= lang('core.nossos_produtos');?>:</h1>
        <a id="aba_pf" title="Bom para você" class="active dis_selection"><?= lang('core.bom_para_vc');?></a>
        <a id="aba_pj" title="Bom para sua empresa" class="dis_selection"><?= lang('core.bom_para_empresa');?></a>
    </div>
</nav>

<div id="pf" class="publico wrap clearfix">

    <?php
        /**
         * Divide as categorias em duas colunas
         */
        $colunas = array_chunk($produto_categorias_pf, (count($produto_categorias_pf) + 1) / 2 ) ;
        $coluna_left = (!empty($colunas) && isset($colunas[0])) ? $colunas[0] : array() ;
        $coluna_right = (!empty($colunas) && isset($colunas[1])) ? $colunas[1] : array() ;
    ?>

    <div class="coluna left">


        <?php foreach($coluna_left as $produto_categoria_pf) :?>

            <article class="categoria">
                <h1><span class="sprite <?php echo $produto_categoria_pf['css_class_icone'];?> ico_m left"></span><?php echo $produto_categoria_pf['titulo']?></h1>

                    <?php if($produto_categoria_pf['produtos']) :?>
                        <ul class="produtos">
                        <?php foreach($produto_categoria_pf['produtos'] as $produto_pf) :?>
                            <li>
                                <h2><?php echo $produto_pf['titulo']?> <span class="seta sprite"></span></h2>
                                <div class="content clearfix">
                                    <p><?php echo strip_tags($produto_pf['resumo']);?></p>
                                    <a href="<?php echo app_get_url_produto($produto_pf);?>" class="botao more right"><?= lang('core.saiba_mais');?></a>
                                </div>
                            </li>
                        <?php endforeach;?>
                        </ul>
                    <?php endif?>

            </article>
        <?php endforeach;?>
    </div>
    <div class="coluna right">

        <?php foreach($coluna_right as $produto_categoria_pf) :?>

            <article class="categoria">
                <h1><span class="sprite <?php echo $produto_categoria_pf['css_class_icone'];?> ico_m left"></span><?php echo $produto_categoria_pf['titulo']?></h1>

                <?php if($produto_categoria_pf['produtos']) :?>
                    <ul class="produtos">
                        <?php foreach($produto_categoria_pf['produtos'] as $produto_pf) :?>
                            <li>
                                <h2><?php echo $produto_pf['titulo']?> <span class="seta sprite"></span></h2>
                                <div class="content clearfix">
                                    <p><?php echo strip_tags($produto_pf['resumo']);?></p>
                                    <a href="<?php echo app_get_url_produto($produto_pf);?>" class="botao more right"><?= lang('core.saiba_mais');?></a>
                                </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                <?php endif?>

            </article>
        <?php endforeach;?>

    </div>
</div>

<div id="pj" class="publico hidden wrap clearfix">

    <?php
        /**
         * Divide as categorias em duas colunas
         */
        $colunas = array_chunk($produto_categorias_pj, (count($produto_categorias_pj) + 1) / 2 ) ;
        $coluna_left = (!empty($colunas) && isset($colunas[0])) ? $colunas[0] : array() ;
        $coluna_right = (!empty($colunas) && isset($colunas[1])) ? $colunas[1] : array() ;

        
    ?>
    <div class="coluna left">
        <?php foreach($coluna_left as $produto_categoria_pj) :?>

            <article class="categoria ">
                <h1><span class="sprite <?php echo $produto_categoria_pj['css_class_icone'];?> ico_m left"></span><?php echo $produto_categoria_pj['titulo']?></h1>
                <ul class="produtos">
                    <?php if($produto_categoria_pj['produtos']) :?>
                        <?php foreach($produto_categoria_pj['produtos'] as $produto_pj) :?>
                            <li>
                                <h2><?php echo $produto_pj['titulo']?> <span class="seta sprite"></span></h2>
                                <div class="content clearfix">
                                    <p><?php echo strip_tags($produto_pj['resumo']);?></p>
                                    <a href="<?php echo app_get_url_produto($produto_pj);?>" class="botao more right"><?= lang('core.saiba_mais');?></a>
                                </div>
                            </li>
                        <?php endforeach;?>
                    <?php endif?>
                </ul>
            </article>
        <?php endforeach;?>
    </div>
    <div class="coluna right">
        <?php foreach($coluna_right as $produto_categoria_pj) :?>

            <article class="categoria ">
                <h1><span class="sprite <?php echo $produto_categoria_pj['css_class_icone'];?> ico_m left"></span><?php echo $produto_categoria_pj['titulo']?></h1>
                <ul class="produtos">
                    <?php if($produto_categoria_pj['produtos']) :?>
                        <?php foreach($produto_categoria_pj['produtos'] as $produto_pj) :?>
                            <li>
                                <h2><?php echo $produto_pj['titulo']?> <span class="seta sprite"></span></h2>
                                <div class="content clearfix">
                                    <p><?php echo strip_tags($produto_pj['resumo']);?></p>
                                    <a href="<?php echo app_get_url_produto($produto_pj);?>" class="botao more right"><?= lang('core.saiba_mais');?></a>
                                </div>
                            </li>
                        <?php endforeach;?>
                    <?php endif?>
                </ul>
            </article>
        <?php endforeach;?>

    </div>
</div>

</section>