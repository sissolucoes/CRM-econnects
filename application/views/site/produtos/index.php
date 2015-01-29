<section class="wrap clearfix dropdown-produtos" id="dropdown" style="margin-top: -20px; margin-bottom: -20px;">
    <?php $header_page_produto = app_get_cms_bloco('header-page-produto');  ?>

    <h1 class="h1_produtos"><?php echo $header_page_produto['titulo'];?><span class="span_produtos"><?php echo strip_tags($header_page_produto['conteudo']);?></span></h1>



    <?php $c = 1; foreach($produto_categorias as $produto_categoria) :?>

        <article class="produtos colunas <?php echo ( ($c % 2) == 0 ) ? 'right' : 'left' ?>">
            <div class="icone_produto <?php echo $produto_categoria['css_class_icone'];?>_produto">

            </div>


            <?php if(isset($produto_categoria['produtos_pf'])) :?>
                <h1 id="<?php echo $produto_categoria['slug'];?>-pf" class="dropdown-button">Bom para você <span class="seta branca sprite right"></span></h1>
                <ul id="<?php echo $produto_categoria['slug'];?>-pf-ul" class="dropdown-container dropdown-p1">
                    <li>
                        <ul class="categoria">
                            <?php foreach($produto_categoria['produtos_pf'] as $produto_pf ) :?>
                                <li><a href="<?php echo app_get_url_produto($produto_pf);?>" title=""><?php echo $produto_pf['titulo'];?></a></li>
                            <?php endforeach?>
                        </ul>
                    </li>
                </ul>
            <?php endif?>

            <?php if(isset($produto_categoria['produtos_pj'])) :?>
                <h1 id="<?php echo $produto_categoria['slug'];?>-pj" class="dropdown-button">Bom para sua empresa <span class="seta branca sprite right"></span></h1>
                <ul id="<?php echo $produto_categoria['slug'];?>-pj-ul" class="dropdown-container dropdown-p1">
                    <li>
                        <ul class="categoria">
                            <?php foreach($produto_categoria['produtos_pj'] as $produto_pj ) :?>
                                <li><a href="<?php echo app_get_url_produto($produto_pj);?>" title=""><?php echo $produto_pj['titulo'];?></a></li>
                            <?php endforeach?>
                        </ul>
                    </li>
                </ul>
            <?php endif;?>
            <div class="descr_produtos">
                <p><?php echo $produto_categoria['descricao'];?></p>
            </div>
        </article>
    <?php $c++; endforeach;?>
</section>