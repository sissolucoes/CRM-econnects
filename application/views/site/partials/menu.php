<?php

$quemsomos = (basename($_SERVER ['REQUEST_URI']) == 'quem-somos.php') ? ' active' : '';
$produtos = (basename($_SERVER ['REQUEST_URI']) == 'produtos.php') ? ' active' : '';
$sinistro = (basename($_SERVER ['REQUEST_URI']) == 'sinistro.php') ? ' active' : '';
$vistoria = (basename($_SERVER ['REQUEST_URI']) == 'vistoria.php') ? ' active' : '';
$reimpressao = (basename($_SERVER ['REQUEST_URI']) == 'login.php') ? ' active' : '';
$segunda_via = (basename($_SERVER ['REQUEST_URI']) == 'login.php') ? 'active' : '';
$contato = (basename($_SERVER ['REQUEST_URI']) == 'contato.php') ? ' active' : '';
$sac = (basename($_SERVER ['REQUEST_URI']) == 'sac.php') ? ' active' : '';

$servicos = '';
if((!empty($sinistro)) || (!empty($vistoria)) || (!empty($reimpressao))){
    $servicos = ' active';
}

?>
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
            <a href="<?php echo site_url('quem-somos'); ?>" class="<?php echo $quemsomos; ?>" id="m_quem_somos">QUEM SOMOS</a><span>|</span>
            <a href="<?php echo site_url('produtos'); ?>"  class="<?php echo $produtos; ?>" id="m_produtos">PRODUTOS</a><span>|</span>
            <a href="#" class="<?php echo $servicos; ?>" id="m_servicos">SERVIÇOS
                <div class="seta-submenu sprite"></div>
            </a><span>|</span>

            <div class="submenu">
                <a href="sinistro.php" class="<?php echo $sinistro; ?>" id="m_sinistro">SINISTRO</a>
                <a href="vistoria.php" class="<?php echo $vistoria; ?>" id="m_vistoria">VISTORIA / INSPEÇÃO</a>
                <a href="login.php" class="<?php echo $segunda_via; ?>" id="m_vistoria">2º VIA DE PAGAMENTO</a>
                <a href="login.php" class="<?php echo $reimpressao; ?>" id="m_reimpressao">REIMPRESSÃO</a>
            </div>
            <a href="#" class="<?php echo $contato; ?>" id="m_blog">BLOG</a><span>|</span>
            <a href="sac.php" class="<?php echo $sac; ?>" id="m_sac">SAC
            </a>



            <div class="social right">
                <a href="#" class="ico_facebook sprite"></a>
                <a href="#" class="ico_linkedin sprite"></a>
                <a href="#" class="ico_google sprite"></a>
            </div>
        </nav>

    </div>
</header>