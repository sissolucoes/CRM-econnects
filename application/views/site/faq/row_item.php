<section id="nossos_produtos">



    <div class="teste wrap clearfix" id="pf">

        <div class="coluna left">

            <?php foreach($faq_sub_categorias as $faq_sub_categoria) : ?>
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