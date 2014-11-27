<div class="layout-app">
    <!-- row -->
    <div class="row row-app">
        <!-- col -->
        <div class="col-md-12">

            <!-- col-separator -->
            <div class="col-separator col-separator-first col-unscrollable">

                <!-- col-table -->
                <div class="col-table">

                    <h4 class="innerAll margin-none bg-white"><?php echo $page_title;?></h4>
                    <div class="col-separator-h"></div>
                </div>



                <!-- col-app -->
                <div class="row col-app innerAll">

                    <div class="col-md-8">
                        <div class="panel panel-success">
                            <div class="panel-heading text-center">DETALHES DO EVENTO</div>
                            <div class="panel-body">

                                <table align="left" cellpadding="0" cellspacing="4" border="0" class="table table-bordered table-primary" id="table-log-evento">
                                    <tr>
                                        <td class="desc_campo"><div>Usuario:</div></td>
                                        <td class="caixa"><?php echo $row['usuario_nome'] != '' ?  $row['usuario_nome'] : 'N/D';?> </td>
                                    </tr>
                                    <tr>
                                        <td class="desc_campo"><div >Tipo de Evento:</div></td>
                                        <td class="caixa"><?php echo $row['tipo_evento'];?></td>
                                    </tr>
                                    <tr>
                                        <td class="desc_campo"><div >Model:</div></td>
                                        <td class="caixa"><?php echo $row['model'];?></td>
                                    </tr>

                                    <tr>
                                        <td class="desc_campo"><div >Controller:</div></td>
                                        <td class="caixa"><?php echo $row['controller'];?></td>
                                    </tr>
                                    <tr>
                                        <td class="desc_campo"><div >Controller / Ação:</div></td>
                                        <td class="caixa"><?php echo $row['acao'];?></td>
                                    </tr>
                                    <tr>
                                        <td class="desc_campo" ><div>IP:</div></td>
                                        <td class="caixa"><?php echo $row['ip'];?></td>
                                    </tr>
                                    <tr>
                                        <td class="desc_campo"><div>Data / Hora:</div></td>
                                        <td class="caixa"><?php echo app_date_mysql_to_mask($row['criacao']);?></td>
                                    </tr>
                                    <tr>
                                        <td class="desc_campo"  valign="top">
                                            <div style="vertical-align: top;">Resumo:</div></td>
                                        <td class="caixa" id="table-log-conteudo">
                                            <?php echo $row['conteudo'];?>
                                        </td>
                                    </tr>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>