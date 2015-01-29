<section class="wrap clearfix dropdown-produtos" id="dropdown" style="margin-top: -20px; margin-bottom: -20px;">
    <h1 class="h1_produtos">Produtos<span class="span_produtos">A Corcovado, por meio de seus parceiros criteriosamente selecionados, disponibiliza seguros e serviços, com as melhores coberturas e limites, para o seu perfil ou de sua empresa. Faça uma cotação ou entre em contato conosco.</span></h1>



    <?php $c = 1; foreach($produto_categorias as $produto_categoria) :?>

        <article class="produtos colunas <?php echo ( ($c % 2) == 0 ) ? 'right' : 'left' ?>">
            <img src="<?php echo app_assets_url('images/ico-financeiros-produtos.png', 'site');?>">

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