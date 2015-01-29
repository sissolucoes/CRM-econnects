<div class="widget">
    <div class="widget-head">
        <h4 class="heading">Buscar</h4>
    </div>
    <div class="widget-body">
        <form class="form-horizontal margin-none" action="">
            <div class="row">

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