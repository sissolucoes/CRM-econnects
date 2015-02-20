<section id="produtos">
    <div class="left">
        <img id="img_produto" src="<?php echo $default_image;?>">
    </div>
    <?php if($subprodutos) : ?>

        <?php $this->load->view('site/produtos/partials/online');?>

    <?php else :?>

        <?php $this->load->view('site/produtos/partials/offline');?>

    <?php endif?>

    <br clear="all">

    <?php $this->load->view('site/produtos/partials/boxes_frame');?>

</section>