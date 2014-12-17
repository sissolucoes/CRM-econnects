<div class="layout-app">
    <!-- row -->
    <div class="row row-app">
        <!-- col -->
        <div class="col-md-12">
            <!-- col-separator.box -->
            <div class="col-separator col-unscrollable bg-none box col-separator-first">

                <!-- col-table -->
                <div class="col-table">

                    <h4 class="innerAll margin-none bg-white"><?php echo $page_title;?></h4>

                    <div class="col-separator-h"></div>

                    <div class="innerAll  bg-white">

                            <a href="<?php echo base_url("{$current_controller_uri}/index")?>" class="btn  btn-app btn-primary">
                                <i class="fa fa-arrow-left"></i> Voltar
                            </a>
                            <a class="btn  btn-app btn-primary" onclick="$('#validateSubmitForm').submit();">
                                <i class="fa fa-edit"></i> Salvar
                            </a>
                    </div>
                    <div class="col-separator-h"></div>

                    <!-- col-table-row -->
                    <div class="col-table-row">

                        <!-- col-app -->
                        <div class="col-app col-unscrollable">

                            <!-- col-app -->
                            <div class="col-app">

                                <!-- Form -->
                                <form class="form-horizontal margin-none" id="validateSubmitForm" method="post" autocomplete="off">
                                    <input type="hidden" name="<?php echo $primary_key ?>" value="<?php if (isset($row[$primary_key])) echo $row[$primary_key]; ?>"/>
                                    <input type="hidden" name="new_record" value="<?php echo $new_record; ?>"/>
                                    <!-- Widget -->
                                    <div class="widget">

                                        <!-- Widget heading -->
                                        <div class="widget-head">
                                            <h4 class="heading"><?php echo $page_subtitle;?></h4>
                                        </div>
                                        <!-- // Widget heading END -->

                                        <div class="widget-body innerAll inner-2x">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <?php $this->load->view('admin/partials/validation_errors');?>
                                                    <?php $this->load->view('admin/partials/messages'); ?>
                                                </div>

                                            </div>
                                            <!-- Row -->
                                            <div class="row innerLR">

                                                <!-- Column -->
                                                <div class="col-md-6">

                                                    <?php $field_name = 'nome';?>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="<?php echo $field_name;?>">Nome</label>
                                                        <div class="col-md-8"><input class="form-control" id="<?php echo $field_name;?>" name="<?php echo $field_name;?>" type="text" value="<?php echo isset($row[$field_name]) ? $row[$field_name] : set_value($field_name); ?>" /></div>
                                                    </div>


                                                    <?php $field_name = 'slug';?>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="<?php echo $field_name;?>">Slug</label>
                                                        <div class="col-md-8"><input class="form-control" id="<?php echo $field_name;?>" name="<?php echo $field_name;?>" type="text" value="<?php echo isset($row[$field_name]) ? $row[$field_name] : set_value($field_name); ?>" /></div>
                                                    </div>

                                                    <?php $field_name = 'blog_categoria_id';?>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="<?php echo $field_name;?>">Categoria</label>
                                                        <div class="col-md-4">
                                                            <select class="form-control required" id="<?php echo $field_name;?>" name="<?php echo $field_name;?>">
                                                                <option></option>
                                                                <?php foreach($blog_categorias as $item): ?>
                                                                    <option value="<?php echo $item[$field_name]?>" <?php  if(isset($row[$field_name]) && $row[$field_name] == $item[$field_name]) echo 'selected="selected"'; ?>><?php echo $item['nome'];?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <?php $field_name = 'publicado';?>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="<?php echo $field_name;?>">Publicado</label>
                                                        <div class="col-md-2">

                                                            <select  class="form-control required" name="<?php echo $field_name;?>" id="<?php echo $field_name;?>">
                                                                <option></option>
                                                                <?php foreach(array( '1' => 'Sim', '0' => 'Não') as $item_value => $item_name) :?>
                                                                    <option value="<?php echo $item_value;?>" <?php  if(isset($row[$field_name]) && $row[$field_name] == $item_value) echo 'selected="selected"'; ?>><?php echo $item_name;?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- // Column END -->


                                            </div>

                                            <div class="row">

                                                <div class="col-md-12">

                                                    <div class="relativeWrap">
                                                        <div class="widget widget-tabs widget-tabs-double-2 widget-tabs-responsive">

                                                            <!-- Tabs Heading -->
                                                            <div class="widget-head">
                                                                <ul>
                                                                    <!--li class="active"><a class="glyphicons flag" href="#tabAll" data-toggle="tab"><i></i><span>Português</span></a></li>
                                                                    <li><a class="glyphicons flag" href="#tabAccount" data-toggle="tab"><i></i><span>Inglês</span></a></li>
                                                                    <li><a class="glyphicons flag" href="#tabPayments" data-toggle="tab"><i></i><span>Espanhol</span></a></li-->

                                                                    <?php $c = 0; foreach($idiomas as $idioma): ?>
                                                                        <?
                                                                            $flag = $idioma['codigo'];
                                                                        ?>
                                                                        <li class="<? if($c == 0) echo 'active';?>">
                                                                            <a class="glyphicons" href="#idioma-<?php echo $idioma['codigo'];?>" data-toggle="tab">
                                                                                <img src="<?php echo app_assets_url("core/images/flags/{$flag}.png", 'admin');?>">
                                                                                <span><?php echo $idioma['nome'];?></span>
                                                                            </a>
                                                                        </li>
                                                                    <?php $c++; endforeach;?>
                                                                </ul>
                                                            </div>
                                                            <!-- // Tabs Heading END -->

                                                            <div class="widget-body">
                                                                <div class="tab-content">

                                                                    <!-- Tab content -->


                                                                    <?php $c = 0; foreach($idiomas as $idioma): ?>

                                                                        <?
                                                                         if( isset($idiomas_rows[$idioma['idioma_id']])){
                                                                             $idioma_row =    $idiomas_rows[$idioma['idioma_id']];


                                                                         }

                                                                        ?>


                                                                        <div id="idioma-<?php echo $idioma['codigo'];?>" class="tab-pane <? if($c == 0) echo 'active';?> widget-body-regular">



                                                                            <div class="row">
                                                                                <?php $field_name = 'titulo';?>
                                                                                <div class="form-group">
                                                                                    <label class="col-md-2 control-label" for="<?php echo $field_name;?>">Título</label>
                                                                                    <div class="col-md-8"><input class="form-control" id="<?php echo $field_name;?>" name="idiomas[<?php echo $idioma['idioma_id'];?>][<?php echo $field_name;?>]" type="text" value="<?php echo isset($idioma_row[$field_name]) ? $idioma_row[$field_name] : set_value($field_name); ?>" /></div>
                                                                                </div>
                                                                                <?php $field_name = 'meta_description';?>
                                                                                <div class="form-group">
                                                                                    <label class="col-md-2 control-label" for="<?php echo $field_name;?>">SEO - Description </label>
                                                                                    <div class="col-md-8"><input class="form-control" id="<?php echo $field_name;?>" name="idiomas[<?php echo $idioma['idioma_id'];?>][<?php echo $field_name;?>]" type="text" value="<?php echo isset($idioma_row[$field_name]) ? $idioma_row[$field_name] : set_value($field_name); ?>" /></div>
                                                                                </div>
                                                                                <?php $field_name = 'meta_keywords';?>
                                                                                <div class="form-group">
                                                                                    <label class="col-md-2 control-label" for="<?php echo $field_name;?>">SEO - Keywords</label>
                                                                                    <div class="col-md-8"><input class="form-control" id="<?php echo $field_name;?>" name="idiomas[<?php echo $idioma['idioma_id'];?>][<?php echo $field_name;?>]" type="text" value="<?php echo isset($idioma_row[$field_name]) ? $idioma_row[$field_name] : set_value($field_name); ?>" /></div>
                                                                                </div>
                                                                                <?php $field_name = 'conteudo';?>
                                                                                <div class="form-group">
                                                                                    <label class="col-md-2 control-label" for="<?php echo $field_name . '_'. $idioma['codigo'] ;?>">Conteúdo</label>
                                                                                    <div class="col-md-8">
                                                                                        <textarea class="form-control" id="<?php echo $field_name . '_'. $idioma['codigo'] ;?>" name="idiomas[<?php echo $idioma['idioma_id'];?>][<?php echo $field_name;?>]" ><?php echo isset($idioma_row[$field_name]) ? $idioma_row[$field_name] : set_value($field_name); ?></textarea>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            if(isset($ckeditor_conteudo[$idioma['codigo']])){
                                                                                echo display_ckeditor($ckeditor_conteudo[$idioma['codigo']]);
                                                                            }

                                                                        ?>
                                                                    <?php $c++; endforeach;?>
                                                                    <!-- End Tab content -->

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                            <!-- // Row END -->
                                            <div class="separator"></div>
                                            <!-- Form actions -->
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Salvar</button>
                                            </div>
                                            <!-- // Form actions END -->
                                        </div>
                                    </div>
                                    <!-- // Widget END -->

                                </form>
                                <!-- // Form END -->

                            </div>
                            <!-- // END col-app -->

                        </div>
                        <!-- // END col-app.col-unscrollable -->

                    </div>
                    <!-- // END col-table-row -->

                </div>
                <!-- // END col-table -->

            </div>
            <!-- // END col-separator.box -->
        </div>
    </div>
</div>