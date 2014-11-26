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

                <!-- col-table-row -->
                <div class="col-table-row">
                    <form method="post">
                        <input type="hidden" name="usuario_acl_tipo_id" value="<?php echo $usuario_acl_tipo_id;?>" />
                        <!-- col-app -->
                        <div class="col-app col-unscrollable">

                            <!-- col-app -->
                            <div class="row col-app innerAll">
                                <div class="col-md-6">
                                    <?php $this->load->view('admin/partials/validation_errors');?>
                                    <?php $this->load->view('admin/partials/messages'); ?>
                                </div>
                            </div>

                            <div class="row col-app innerAll">
                                <div class="col-md-4">
                                    <div class="panel panel-success">

                                        <div class="panel-body">
                                          <strong>Grupo: </strong>  <?php echo $row['nome'];?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- col-app -->
                            <div class="row col-app innerAll">


                                <?php $c = 1; foreach($recursos as $recurso) :?>
                                <div class="col-md-2">
                                    <div class="panel panel-success">
                                        <div class="panel-heading text-center"><strong><?php echo $recurso['nome']?></strong></div>
                                        <div class="panel-body">

                                            <?php foreach($acoes as $acao) :?>

                                                <?php
                                                $label_for = "check_{$recurso['usuario_acl_recurso_id']}_{$acao['usuario_acl_acao_id']}";
                                                ?>
                                                <div class="checkbox">

                                                    <label  for="<?echo $label_for;?>">
                                                        <input type="checkbox" id="<?echo $label_for;?>" name="permissoes[<?echo $recurso['usuario_acl_recurso_id']?>][<?echo $acao['usuario_acl_acao_id']?>]"
                                                            <?php if(isset($current_acl[$recurso['usuario_acl_recurso_id']][$acao['usuario_acl_acao_id']])) echo 'checked="checked"'?>
                                                               value="<?php echo $acao['usuario_acl_acao_id'];?>"  />  <?php echo $acao['nome']?>
                                                    </label>

                                                </div>
                                            <?php endforeach;?>


                                        </div>
                                    </div>
                                </div>


                                    <?php if($c % 3 == 0) :?>
                                        <div class="clearfix visible-sm"></div>
                                    <?php endif?>
                                    <?php if($c % 6 == 0) :?>
                                        <div class="clearfix visible-md visible-lg"></div>
                                    <?php endif?>

                                    <?php  $c++;  endforeach;?>

                            </div>

                            <div class="row col-app innerAll">

                                <!-- Form actions -->
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Salvar</button>
                                </div>
                                <!-- // Form actions END -->
                            </div>

                        </div>
                    </form>
                </div>

             </div>
        </div>
    </div>
</div>
