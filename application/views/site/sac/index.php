<section id="quem-somos">
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SAC<span>Nosso Serviço de Atendimento ao cliente está disponível para receber suas solicitações, dúvidas, sugestões, elogios e reclamações. Assim poderemos promover a melhoria contínua de nossos serviços e dos serviços dos nossos parceiros.</span></h1>
    <article>
        <div class="perguntas_frequentes">
            <table>
                <tr>
                    <th><img src="<?php echo app_assets_url('images/img_sac-0800.png');?>"></th>
                    <th>
                        <img src="<?php echo app_assets_url('images/{{lang}}/img_sac-email.png');?>" border="0" style="height: 58px; width: 298px;">
                        <a href="<?php echo app_assets_url('solicitacao');?>">
                            <img src="<?php echo app_assets_url('images/{{lang}}/img_sac-email-solicitacao.png');?>"
                                 data-over="<?php echo app_assets_url('images/{{lang}}/img_sac-email-solicitacao-cinza.png');?>"
                                 data-out="<?php echo app_assets_url('images/{{lang}}/img_sac-email-solicitacao.png');?>"
                                 border="0" class="tootlip solicitacao fig_solicitacao" title="<?=lang('core.abrir');?>">
                        </a>
                        <a href="<?php echo app_assets_url('ocorrencia');?>">
                            <img src="<?php echo app_assets_url('images/{{lang}}/img_sac-email-ocorrencia.png');?>"
                                 data-over="<?php echo app_assets_url('images/{{lang}}/img_sac-email-ocorrencia-cinza.png');?>"
                                 data-out="<?php echo app_assets_url('images/{{lang}}/img_sac-email-ocorrencia.png');?>"
                                 tipo="ocorrencia" border="0" class="tootlip ocorrencia fig_ocorrencia"
                                 title="<?=lang('core.abrir');?>">
                        </a>
                    </th>
                    <th><img src="<?php echo app_assets_url('images/{{lang}}/img_sac-chat.png');?>"></th>
                </tr>
                <tr>

                    <td style="padding: 10px 0px 0px 0px !important;">
                        Ligue para a Central de Relacionamento de segunda a sexta-feira das 9h às 18h.<br>
                        Capitais e Regiões Metropolitanas custo de ligação local. Demais localidades ligação gratuita.
                    </td>
                    <td style="padding: 8px 32px 0px 31px !important;">
                        Envie suas solicitações e ocorrências para a Central de Relacionamento. Em até 72h úteis a resposta estará disponível na Área de Relacionamento Personalizada.
                    </td>
                    <td style="padding: 0px 0px 8px 0px !important;">
                        Fale com nossos atendentes online na Central de Relacionamento de segunda a sexta-feira das 9h às 18h.
                    </td>
                </tr>
            </table>
            <div class="pesquisa_faq">
                <label>FAQ:<input type="text" placeholder="Pesquise aqui sua dúvida em nosso FAQ:" id="pesquisa_faq" name="pesquisa_faq"></label>
                <button value="Pesquisar" id="botao_faq" class="botao_faq botoes" type="submit">
                    <div class="span_botoes sprite">Pesquisar</div></button>
            </div>
        </div>
    </article>

</section>

<div class="selecione_duvida" style="background: none repeat scroll 0% 0% rgb(255, 255, 255); margin-top: 30px; height: 100px;">
    <section class="wrap clearfix" id="dropdown" style="background: #fff;">
        <article class="coluna left">
            <h1 class="h1style">TIRE SUAS DÚVIDAS SOBRE:</h1>
        </article>
        <article class="coluna left" style="margin-top: 12px;">
            <h1 id="but_pj">
                Selecione... <span class="seta branca sprite right"></span>
            </h1>
            <ul id="dropdown_pj" class="mCustomScrollbar _mCS_1" style="visibility: visible; display: none; height: auto !important;"><div style="position:relative; height:100%; overflow:hidden; max-width:100%;" id="mCSB_1" class="mCustomScrollBox mCS-light">

                    <div style="position:relative; top:0;" class="mCSB_container">
                        <?php foreach($faq_categorias as $faq_categoria) : ?>

                            <li><h2><a href="#<?php echo  $faq_categoria['faq_categoria_id'];?>" id="aparecer_acidente" class="load_faq_categoria"><?php echo  $faq_categoria['titulo'];?></a></h2></li>
                        <?php endforeach;?>
                    </div>
            </ul>
        </article>
    </section>
</div>
<section class="wrap" id="container_faq_result">

</section>