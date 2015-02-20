<div id="produtos_online">
    <nav>
        <div class="wrap clearfix">
            <?php $c = 1; foreach($subprodutos as $subproduto) : ?>
                <a class="<?php if($c == 1) echo 'active';?> dis_selection btnShowAba"
                   title="Bom para você"
                   data-img="<?php echo app_assets_url("produtos/{$subproduto['produto_id']}/{$subproduto['imagem']}" , 'uploads')?>"
                   id="aba_<?php echo $subproduto['produto_id']; ?>">
                    <?php echo $subproduto['titulo']; ?>
                </a>
            <?php $c++; endforeach;?>

            <a style="position: relative;  float:right" class="voltar" title="Voltar" id="botao_voltar" href="<?php echo site_url('produtos');?>"><img src="<?php echo app_assets_url('images/botao_voltar.png', 'site');?>"></a>
        </div>
    </nav>

    <?php $c = 1; foreach($subprodutos as $subproduto) : ?>
        <div class="publico wrap clearfix abaConteudo <?php if($c != 1) echo 'hidden';?>" id="conteudo_aba_<?php echo $subproduto['produto_id']; ?>" style="position: relative; top: -14px; left: 1px; width: 569px; height: 339px;">

            <div class="icone_categoria_online <?php echo $categoria['css_class_icone'];?>_categoria"></div>
            <h2><?php echo $categoria['titulo'];?></h2>
            <h1><?php echo $produto['titulo'];?><span style="color: #5b5c5e;"> - <?php echo $subproduto['titulo'];?></span></h1>
            <?php echo $subproduto['conteudo'];?>


        </div>
    <?php $c++; endforeach;?>



</div>