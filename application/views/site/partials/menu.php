<header>
    <div class="wrap clearfix">
        <h1 class="left"><a href="<?php echo base_url();?>" id="logo"><img src="<?php echo app_assets_url('images/logotipo-corcovado.png', 'site');?>" width="298" height="79" alt="Logotipo Corcovado" title="Corcovado" /></a></h1>

        <nav class="menu_secundario right">
            <a href="sac.php" class="ico_chat sac sprite tootlip" title="Chat"></a>
            <a href="sac.php" class="ico_email sac sprite tootlip" title="E-mail"></a>
            <a href="sac.php" class="ico_tel sac sprite tootlip" title="Telefone"></a>

            <p>(11) 3937-4287</p>
            <span></span>
            <a href="login.php" class="ico_restrito sprite">ÁREA DE RELACIONAMENTO</a>
            <span></span>
            <a href="<?php echo base_url($this->lang->switch_uri('pt'));?>" class="ico_pt sprite flag"></a>
            <a href="<?php echo base_url($this->lang->switch_uri('en'));?>" class="ico_en sprite flag"></a>
            <a href="<?php echo base_url($this->lang->switch_uri('es'));?>" class="ico_es sprite flag last"></a>
        </nav>

        <nav id="menu" class="right">
        	<ul id="main_nav">
                <?php if($menu_principal) :?>


                    <?php $c = 1; $total = count($menu_principal); foreach($menu_principal as $menu_item) :?>
                        <li class="main_item item_<?php echo  $c;?> <?php if($c == $total) echo 'last_item'?>">
                            <a href="<?php echo $menu_item['link'];?>" class="" ><?php echo $menu_item['titulo'];?> </a>
                            <?php if($menu_item['filhos']) :?>
                                <div class="seta-submenu sprite"></div>
                                <ul class="submenu">

                                   <?php foreach($menu_item['filhos'] as $menu_item_sub) :?>
                                       <li><a href="<?php echo $menu_item_sub['link'];?>" class="" id="m_sinistro"><?php echo $menu_item_sub['nome'];?></a></li>
                                   <?php endforeach;?>
                                </ul>
                            <?php  endif;?>

                        </li>
                    <?php $c++; endforeach;?>
                <?php endif;?>
	        </ul>


            <div class="social right">
                <a href="#" class="ico_facebook sprite"></a>
                <a href="#" class="ico_linkedin sprite"></a>
                <a href="#" class="ico_google sprite"></a>
            </div>
        </nav>

    </div>
</header>