<?php if($slide_home_principal): ?>

<section id="destaque">
    <div class="slider-wrapper">

        <div id="slider" class="nivoSlider">

            <?php foreach($slide_home_principal['itens'] as $item) : ?>

                <a href="<?php echo $item['url'];?>" title="<?php echo $item['titulo'];?>">
                    <img src="<?php echo app_assets_url("slides/{$slide_home_principal['cms_slide_id']}/{$item['cms_slide_item_id']}/{$item['imagem']}" , 'uploads')?>" title="#description_<?php echo $item['cms_slide_item_id'];?>" alt="<?php echo $item['titulo'];?>" />

                </a>
            <?php endforeach?>
        </div>
    </div>
</section>
<?php endif;?>