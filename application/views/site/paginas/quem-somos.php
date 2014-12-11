<section id="quem-somos">
    <h1><?php echo $pagina['titulo'];?><span>A Corcovado foi criada para cumprir uma missão única: identificar necessidades e expectativas não atendidas pelo mercado segurador e oferecer soluções criativas e inovadoras à gestão de seguros e serviços, indo além da simples oferta de preço e produto.</span></h1>
    <article class="quem_somos">
        <p style="padding-top: 16px !important; padding-bottom: 10px !important;">
            Por meio de estudos e larga experiência vivida dos seus profissionais, A CORCOVADO DESENVOLVEU UMA METODOLOGIA DE TRABALHO EXCLUSIVA, altamente eficiente, pensada para garantir um atendimento personalizado e a oferta de opções sob medida para você ou sua empresa. UMA CADEIA DE VALORES, composta por seis pilares, que norteia toda a atuação da Corcovado, identificando as melhores soluções para cada perfil de cliente.
        </p>
        <img src="<?php echo app_assets_url('images/banner-metodologia.jpg', 'site');?>" alt="" style= ""/>

        <p>O primeiro pilar é a <a>qualificação</a> dos pontos fortes das seguradoras e empresas de serviços de assistência 24h - os parceiros estratégicos da Corcovado - cuidadosamente selecionadas, compondo um ranking das melhores empresas do segmento no País.</p>
        <p>O <a>atendimento</a> é nosso principal diferencial e pode ser da maneira que você preferir: online ou offline. Em ambos os casos, ele é personalizado, ágil, com processos bem definidos, tanto para pessoa física como para pessoa jurídica.</p>
        <p>A Corcovado garante <a>tecnologia</a> avançada, que oferece suporte aos serviços exclusivos online e à aquisição de produtos pela internet. Você acessa, analisa, solicita cotação ou realiza sua compra e, apenas com um clique, adquire produtos e serviços sem sair do lugar.</p>
        <p>Além disso, disponibiliza um ambiente restrito, online e personalizado, onde toda a sua história com a Corcovado – contatos, cotações, aquisição de produtos, opiniões, novidades do mercado – ficará registrada para sua constante consulta e controle. Uma vantagem que só a Corcovado tem.</p>
        <p>Não pense que depois de adquirir produtos ou serviços você estará sozinho. A partir daí, a relação da Corcovado com os seus interesses se estreitarão ainda mais.</p>
        <p>Você vai contar com o <a>monitoramento</a> contínuo da qualidade dos serviços prestados, tanto pela seguradora como pela Corcovado, e a gestão que viabiliza, por meio de indicadores como atendimento e satisfação, uma tomada de decisão ainda mais assertiva.</p>
        <p>Gerar <a>desenvolvimento</a> de negócios faz parte do DNA da Corcovado. Por isso temos um time de especialistas que constantemente analisa oportunidades, elabora projetos, estabelece parceiras e presta consultoria, sempre trazendo novidades ao mercado para ampliar a receita da sua empresa.</p>
        <p>Pioneirismo, customização, inteligência e exclusividade só são possíveis porque a Corcovado possui uma equipe altamente qualificada de profissionais com mais de vinte anos de experiência e em constante processo de atualização, trabalhando para que os segurados alcancem realizações maiores e assumam riscos de maneira controlada.</p>
        <?php echo $pagina['conteudo'];?>
    </article>
</section>

<br clear="all">

<?php $bloco = app_get_cms_bloco('quem-somos-missao'); ?>

<div id="bottom_quem_somos">
    <div class="quem_somos_bottom2" style="padding-left: 45px">
        <h1><span style="position: relative; top: -15px"><?php echo $bloco['titulo'];?>:</span></h1>
        <span style="position: relative; top: -40px;">
                <?php echo $bloco['conteudo'];?>
          
        </span>
    </div>

    <div class="quem_somos_bottom2">
        <h1><span style="position: relative; top: -15px">Visão:</span></h1>
        <span style="position: relative; top: -40px;"><p style="height: 23px">Ser reconhecida como empresa referência em excelência pelos serviços prestados.</p></span>
    </div>

    <div class="quem_somos_bottom2">
        <h1><span style="position: relative; top: -15px">Valores:</span></h1>
                        <span style="position: relative; top: -40px;">
                            <p>Ética na conduta junto aos clientes e parceiros. Valorização e respeito às pessoas: colaboradores, clientes e fornecedores</p>
                            <p style="position: relative; top: -27px; height: 42px">
                                - Transparência e confiança<br>
                                - Satisfação do Cliente<br>
                                - Responsabilidade Social
                            </p>
                        </span>
    </div>
</div>

<br clear="all">