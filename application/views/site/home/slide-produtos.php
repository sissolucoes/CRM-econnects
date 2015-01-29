<div class="slider-wrapper slides_banners">
    <?php if($slide_home_produtos): ?>
        <div id="slider-2" class="nivoSlider">
            <!--img src="<?php echo app_assets_url('images/banner-assistencia-24h.png', 'site');?>" border="0">
            <img src="<?php echo app_assets_url('images/banner-beneficios.png', 'site');?>" border="0">
            <img src="<?php echo app_assets_url('images/banner-consorcio.png', 'site');?>" border="0">
            <img src="<?php echo app_assets_url('images/banner-patrimoniais.png', 'site');?>" border="0">
            <img src="<?php echo app_assets_url('images/banner-responsabilidade.png', 'site');?>" border="0">
            <img src="<?php echo app_assets_url('images/banner-riscos-financeiros.png', 'site');?>" border="0"-->

            <?php foreach($slide_home_produtos['itens'] as $item) : ?>

                <a href="<?php echo $item['url'];?>" title="<?php echo $item['titulo'];?>">
                    <img src="<?php echo app_assets_url("slides/{$slide_home_produtos['cms_slide_id']}/{$item['cms_slide_item_id']}/{$item['imagem']}" , 'uploads')?>" title="#description_<?php echo $item['cms_slide_item_id'];?>" alt="<?php echo $item['titulo'];?>" border="0" />

                </a>
            <?php endforeach?>

        </div>
    <?php endif;?>
</div>