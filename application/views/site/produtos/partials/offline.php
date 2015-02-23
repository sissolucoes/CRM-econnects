<div id="produtos_offline">

    <div class="offline wrap clearfix " id="produtoDescricao">
        <nav>
            <div style="text-align: right; margin-top: 10px; width: 582px;">
                <a href="<?php echo site_url('produtos');?>" id="botao_voltar" title="Voltar" class="voltar"><img src="<?php echo app_assets_url('images/botao_voltar.png', 'site');?>"></a>
            </div>
        </nav>
        <div style="margin-top: -44px;">

            <div class="icone_categoria_offline <?php echo $categoria['css_class_icone'];?>_categoria"></div>
            <h2><?php echo $categoria['titulo'];?></h2>
            <h1><?php echo $produto['titulo'];?></h1>
            <?php echo $produto['conteudo'];?>
        </div>

    </div>
    <br clear="all">
</div>