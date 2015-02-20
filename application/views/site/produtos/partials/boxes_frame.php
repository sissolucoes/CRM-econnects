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

    <iframe src="<?php echo $produto['url_frame'];?>" width="100%" frameborder="0"></iframe>

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

</div>