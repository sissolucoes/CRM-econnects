<h3>Resultado da Pesquisa:</h3>
<?php if($duvidas) :?>
<ul id="accordion">
    <?php foreach($duvidas as $duvida): ?>
        <li>

            <h2><?php echo $duvida['pergunta'];?> <span class="seta sprite"></span></h2>
            <div class="accordion_body">
                <p><?php echo $duvida['resposta'];?></p>
            </div>

        </li>
    <?php endforeach;?>


</ul>
<?php endif;?>