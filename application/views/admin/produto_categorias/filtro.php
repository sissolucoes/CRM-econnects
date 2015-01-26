<div class="widget">
    <div class="widget-head">
        <h4 class="heading">Buscar</h4>
    </div>
    <div class="widget-body">
        <form class="form-horizontal margin-none" action="">
            <div class="row">
                <?php $filter_name = 'tipo_pessoa';?>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="filter_<?php echo $filter_name;?>">Tipo</label>
                    <div class="col-md-4">
                        <select  class="form-control comboCategorias required" name="filter[<?php echo $filter_name;?>]" id="filter_<?php echo $filter_name;?>">
                            <option value="">Todos</option>
                            <?php foreach(array( 'PF' => 'Pessoa Fisica', 'PJ' => 'Pessoa Juridica') as $item_value => $item_name) :?>
                                <option value="<?php echo $item_value;?>" <?php  if(app_get_value(array('filter' => $filter_name) ) == $item_value) echo 'selected="selected"'; ?>><?php echo $item_name;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <?php $filter_name = 'nome';?>
                <!--div class="form-group">
                    <label class="col-md-2 control-label" for="filter_<?php echo $filter_name;?>">Nome</label>
                    <div class="col-md-8"><input class="form-control" id="filter_<?php echo $filter_name;?>" name="filter[<?php echo $filter_name;?>]" type="text" value="<?php echo app_get_value(array('filter' => $filter_name)) ?>" /></div>
                </div-->


                <!-- // Row END -->
                <div class="separator"></div>
                <!-- Form actions -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Filtrar</button>
                </div>
            </div>

        </form>
    </div>
</div>