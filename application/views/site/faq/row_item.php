<section id="nossos_produtos">



    <div class="teste wrap clearfix" id="pf">


        <?php
        /**
         * Divide as categorias em duas colunas
         */
        $colunas = array_chunk($faq_sub_categorias, (count($faq_sub_categorias) + 1) / 2 ) ;
        $coluna_left = (!empty($colunas) && isset($colunas[0])) ? $colunas[0] : array() ;
        $coluna_right = (!empty($colunas) && isset($colunas[1])) ? $colunas[1] : array() ;
        ?>


        <div class="coluna left">

            <?php foreach($coluna_left as $faq_sub_categoria) : ?>
                <article class="categoria">

                    <div class="faq_header">
                        <h1><?php echo $faq_sub_categoria['nome'];?> - <?php echo $faq_categoria['titulo'];?></h1>
                    </div>
                    <div class="faq_body">
                        <ul class="produtos">
                            <?php foreach($faq_sub_categoria['duvidas'] as $duvida) :?>
                                <li>
                                    <h2 class=""><?php echo $duvida['pergunta'];?> <span class="seta sprite"></span></h2>
                                    <div class="content clearfix" style="display: none;">
                                        <p>
                                            <?php echo $duvida['resposta'];?>
                                        </p>
                                    </div>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </article>
            <?php endforeach;?>

        </div>
        <div class="coluna right">

            <?php foreach($coluna_right as $faq_sub_categoria) : ?>
                <article class="categoria">

                    <div class="faq_header">
                        <h1><?php echo $faq_sub_categoria['nome'];?> - <?php echo $faq_categoria['titulo'];?></h1>
                    </div>
                    <div class="faq_body">
                        <ul class="produtos">
                            <?php foreach($faq_sub_categoria['duvidas'] as $duvida) :?>
                                <li>
                                    <h2 class=""><?php echo $duvida['pergunta'];?> <span class="seta sprite"></span></h2>
                                    <div class="content clearfix" style="display: none;">
                                        <p>
                                            <?php echo $duvida['resposta'];?>
                                        </p>
                                    </div>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </article>
            <?php endforeach;?>

        </div>
    </div>
</section>