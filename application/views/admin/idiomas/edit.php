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


                                                    <?php $field_name = 'codigo';?>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="<?php echo $field_name;?>">Código</label>
                                                        <div class="col-md-8"><input class="form-control" id="<?php echo $field_name;?>" name="<?php echo $field_name;?>" type="text" value="<?php echo isset($row[$field_name]) ? $row[$field_name] : set_value($field_name); ?>" /></div>
                                                    </div>

                                                    <?php $field_name = 'ativo';?>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="<?php echo $field_name;?>">Ativo</label>
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