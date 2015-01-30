<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Área de Relacionamento - Home</title>

    <link rel="stylesheet" href="<?php echo app_assets_url('css/normalize.min.css', 'site')?>">
    <link rel="stylesheet" href="<?php echo app_assets_url('css/main.css', 'site')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo app_assets_url('css/style_admin.css', 'site')?>">
    <link rel="stylesheet" href="<?php echo app_assets_url('css/normalize.min.css', 'site')?>">
    <link rel="stylesheet" href="<?php echo app_assets_url('css/uniform.default.css', 'site')?>">
    <link href="<?php echo app_assets_url('css/ui-lightness/jquery-ui-1.10.3.custom.css', 'site')?>" rel="stylesheet">
    <script src="<?php echo app_assets_url('js/vendor/modernizr-2.6.2.min.js', 'site')?>"></script>

    <link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
</head>
<body>
<?php $this->load->view('relacionamento/partials/header');?>
<div class="content">

    <section class="saudacao">
        <div class="client_row">
            <address>
                16/09/2013 - 9h30
            </address>
            <h1>Boa Tarde, <span class="name_cliente">Marcello Diorio!</span></h1>
            <p>
                <a href="#">
                    <img src="<?php echo app_assets_url('images/ico_email_gray.png', 'site')?>" alt="Icone Email">
                    Existem 02 novas mensagens para você no seu Painel de Avisos.
                </a>
            </p>
        </div>

        <nav>
            <div class="wrap clearfix">

                <div class="abas_topo">
                    <a class="active dis_selection" title="Bom para você" id="aba_pf" href="./index_voce.php"><img src="<?php echo app_assets_url('images/aba_gray.png', 'site')?>" alt="abas"></a>
                    <a class="dis_selection" title="Bom para sua empresa" id="aba_pj"><img src="<?php echo app_assets_url('images/aba_active.png', 'site')?>" alt="abas"></a>
                </div>
            </div>
        </nav>
    </section>

    <section class="page_content">
        <aside class="menu_lateral">
            <h2>Serviços disponíveis para facilitar a gestão dos seus seguros</h2>
            <a href="./relacionamento_apolices.php"><h3 class="subtitle_menu">Informações Consolidadas Apólices</h3></a>
            <ul>
                <li class="item_menu line_one"><h3>Cotações</h3></li>
                <li><a href="relacionamento_produtos.php" style="padding-right: 115px; padding-top: 5px; padding-bottom: 5px;">Nova cotação</a></li>
                <li class="last"><a href="./relacionamento_cotacao-passo01.php" style="padding-right: 74px; padding-top: 5px; padding-bottom: 5px;">Acompanhar cotações</a></li>
            </ul>
            <ul>
                <li class="item_menu"><h3>Vistorias/Inspeções</h3></li>
                <li><a href="./relacionamento_vistoria.php" style="padding-right: 48px; padding-top: 5px; padding-bottom: 5px;">Agendar vistoria / inspeção</a></li>
                <li class="last"><a href="./relacionamento_vistoria-inspecao-passo01.php" style="padding-top: 5px; padding-bottom: 5px; padding-right: 16px;">Acompanhar vistorias / inspeções</a></li>
            </ul>
            <ul>
                <li class="item_menu"><h3>Pagamentos</h3></li>
                <li><a href="./relacionamento_pagamentos.php" style="padding-right: 56px; padding-top: 5px; padding-bottom: 5px;">Acompanhar pagamentos</a></li>
                <li class="last"><a href="./relacionamento_pagamentos.php" style="padding-right: 74px; padding-top: 5px; padding-bottom: 5px;">Gerar 2º via de boleto</a></li>
            </ul>
            <ul>
                <li class="item_menu"><h3>Sinistros</h3></li>
                <li><a href="relacionamento_sinistro.php" style="padding-right: 92px; padding-top: 5px; padding-bottom: 5px;">Informar sinistros</a></li>
                <li class="last"><a href="./relacionamento_sinistros.php" style="padding-right: 74px; padding-top: 5px; padding-bottom: 5px;">Acompanhar sinistros</a></li>
            </ul>
            <ul>
                <li class="item_menu"><h3>Atendimento</h3></li>
                <li><a href="./relacionamento_formulario.php" style="padding-right: 101px; padding-top: 5px; padding-bottom: 5px;">Abrir solicitação</a></li>
                <li class="last"><a href="./relacionamento_atendimento.php" style="padding-right: 58px; padding-top: 5px; padding-bottom: 5px;">Acompanhar solicitações</a></li>
            </ul>
            <ul>
                <li class="item_menu"><h3>SAC</h3></li>
                <li><a href="relacionamento_sac-formulario.php" style="padding-right: 100px; padding-top: 5px; padding-bottom: 5px;">Abrir ocorrência</a></li>
                <li class="last"><a href="./relacionamento_sac.php" style="padding-right: 57px; padding-top: 5px; padding-bottom: 5px;">Acompanhar ocorrências</a></li>
            </ul>
        </aside>
        <div class="slides">
            <div class="slider-wrapper">
                <div id="slider" class="nivoSlider">
                    <img src="../images/slides/seguro-viagem.jpg" title="#description_1" alt="" />
                    <img src="../images/slides/compra-online.jpg" title="#description_2" alt="" />
                    <img src="../images/slides/metodologia-relacionamento.jpg" title="#description_3" alt="" />
                </div>
            </div>
        </div>

        <aside class="right_col">

            <div class="col_segurados">
                <h1>Segurados</h1>
                <div class="segurados">
                    <a href="#"><h2>CORCOVADO CORRETORA DE SEGUROS E AGENCIA DE VIAGENS LTDA</h2>
                        <span class="cnpj">CNPJ: 08.303.528/0001-41</span></a>
                </div>
                <div class="segurados">
                    <a href="#"><h2>CORCOVADO CORRETORA DE SEGUROS E AGENCIA DE VIAGENS LTDA</h2>
                        <span class="cnpj">CNPJ: 08.303.528/0001-41</span></a>
                </div>
                <div class="segurados">
                    <a href="#"><h2>CORCOVADO CORRETORA DE SEGUROS E AGENCIA DE VIAGENS LTDA</h2>
                        <span class="cnpj">CNPJ: 08.303.528/0001-41</span></a>
                </div>
                <div class="segurados">
                    <a href="#"><h2>CORCOVADO CORRETORA DE SEGUROS E AGENCIA DE VIAGENS LTDA</h2>
                        <span class="cnpj">CNPJ: 08.303.528/0001-41</span></a>
                </div>
            </div>
            <div class="avisos">
                <h1>Avisos Importantes</h1>
                <div class="notificacoes">
                    <p class="data_news">
                        <img src="<?php echo app_assets_url('images/ico_email_fechado.png', 'site')?>" alt="Email fechado">
                        11/09/2013
                    </p>
                    <p><a href="#">Uma nova cotação está disponível!<br>
                            Clique para acessá-la.</a>
                    <hr>
                </div>
                <div class="notificacoes">
                    <p class="data_news">
                        <img src="<?php echo app_assets_url('images/ico_email_fechado.png', 'site')?>" alt="Email fechado">
                        11/09/2013
                    </p>
                    <p><a href="#">Parabéns!! Em seu mês de aniversário a Corcovado perparou uma surpresa imperdível e exclusiva para você.<br>
                            Confira.</a>
                    <hr>
                </div>
                <div class="notificacao_lida">
                    <p class="data_news">
                        <img src="<?php echo app_assets_url('images/ico_email_lido.png', 'site')?>" alt="Email Lido">
                        09/09/2013
                    </p>
                    <p><a href="#">Atenção!! Mudança ma lei XYZ.<br>
                            Fique antenado. Clique aqui para obter mais informações.</a>
                    <hr>
                </div>
                <div class="notificacao_lida">
                    <p class="data_news">
                        <img src="<?php echo app_assets_url('images/ico_email_lido.png', 'site')?>" alt="Email Lido">
                        04/09/2013
                    </p>
                    <p><a href="#">Sua vistoria foi concluída! Clique para acessá-la.</a></p>
                    <hr>
                </div>
                <div class="notificacao_lida">
                    <p class="data_news">
                        <img src="<?php echo app_assets_url('images/ico_email_lido.png', 'site')?>" alt="Email Lido">
                        25/08/2013
                    </p>
                    <p><a href="#">Lorem ipsum dolor sit amet, consecte adipisicing elit.</a></p>
                    <hr>
                </div>
                <div class="notificacao_lida">
                    <p class="data_news">
                        <img src="<?php echo app_assets_url('images/ico_email_lido.png', 'site')?>" alt="Email Lido">
                        21/08/2013
                    </p>
                    <p><a href="#">Lorem ipsum dolor sit amet.</a></p>
                    <hr style="opacity: 0;">
                </div>
            </div>

        </aside>

        <div class="news">
            <h1>DICAS E NOVIDADES SOBRE O MERCADO DE SEGUROS</h1>
            <div class="news_row">
                <img src="<?php echo app_assets_url('images/img_noticia01.png', 'site')?>" alt="Notícias">
                <address>
                    16/09/2013
                </address>
                <h2>Título da Notícia 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel est posuere, iaculis libero sed, lacinia est. Nunc malesuada nisl sed ligula lacinia suscipit. Praesent eros eros, dignissim sed diam ac, sodales pharetra eros. Curabitur quis tincidunt nulla, in faucibus velit. Sed vitae imperdiet erat. Maecenas luctus, erat in tincidunt consectetur, mi lectus blandit magna, ut viverra enim nisl id tortor!</p>
            </div>
            <div class="news_row02">
                <img src="<?php echo app_assets_url('images/img_noticia02.png', 'site')?>" alt="Notícias">
                <address>
                    16/09/2013
                </address>
                <h2>Título da Notícia 2</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel est posuere, iaculis libero sed, lacinia est. Nunc malesuada nisl sed ligula lacinia suscipit. Praesent eros eros, dignissim sed diam ac, sodales pharetra eros. Curabitur quis tincidunt nulla, in faucibus velit. Sed vitae imperdiet erat. Maecenas luctus, erat in tincidunt consectetur, mi lectus blandit magna, ut viverra enim nisl id tortor!</p>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('relacionamento/partials/footer');?>



<script src="<?php echo app_assets_url('js/vendor/jquery-1.11.1.min.js', 'site');?>"></script>
<script src="<?php echo app_assets_url('js/plugins.js', 'site');?>"></script>
<script src="<?php echo app_assets_url('js/jquery.uniform.min.js', 'site');?>"></script>
<script src="<?php echo app_assets_url('js/jquery.placeholder.js', 'site');?>"></script>
<script src="<?php echo app_assets_url('js/jquery.ui.min.js', 'site');?>"></script>
<script src="<?php echo app_assets_url('js/main.js', 'site');?>"></script>

</body>
</html>