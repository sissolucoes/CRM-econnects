<section id="quem-somos">
    <h1 class="who_h1"><?php echo $pagina['titulo'];?><span><?php echo $pagina['subtitulo'];?></span></h1>
    <article class="quem_somos">
        <?php echo $pagina['conteudo'];?>
    </article>
</section>

<br clear="all">



<div id="bottom_quem_somos">
    <?php $bloco_missao = app_get_cms_bloco('quem-somos-missao'); ?>
    <div class="quem_somos_bottom2 quem_somos_bottom10">
        <h1><span class="quem_somos_title"><?php echo $bloco_missao['titulo'];?>:</span></h1>
        <span class="quem_somos_content">
                <?php echo $bloco_missao['conteudo'];?>
          
        </span>
    </div>
    <?php $bloco_visao = app_get_cms_bloco('quem-somos-visao'); ?>
    <div class="quem_somos_bottom2">
        <h1><span class="visao_title"><?php echo $bloco_visao['titulo'];?>:</span></h1>
        <span class="visao_span"><p class="visao_p">Ser reconhecida como empresa referência em excelência pelos serviços prestados.</p></span>
    </div>
    <?php $bloco_valores = app_get_cms_bloco('quem-somos-valores'); ?>
    <div class="quem_somos_bottom2">
        <h1><span class="valores_span"><?php echo $bloco_valores['titulo'];?>:</span></h1>
                        <span class="valores_span2">
                            <?php echo $bloco_valores['conteudo'];?>

                        </span>
    </div>
</div>

<br clear="all">