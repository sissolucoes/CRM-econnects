<div class="layout-app">
    <!-- row -->
    <div class="row row-app">
        <!-- col -->
        <div class="col-md-12">

            <!-- col-separator -->
            <div class="col-separator col-separator-first col-unscrollable">



                <!-- Widget -->
                <div class="widget">

                    <!-- Widget heading -->
                    <div class="widget-head">
                        <h4 class="heading"><?php echo $page_title;?></h4>
                    </div>
                    <!-- // Widget heading END -->



                    <div class="widget-body innerAll inner-2x">
                        <div class="row innerTB">
                            <div class="col-md-12">
                                <a href="<?php echo base_url("$current_controller_uri/add")?>" class="btn  btn-app btn-primary">
                                    <i class="fa  fa-plus"></i> Adicionar
                                </a>
                                <a class="btn  btn-app btn-success pull-right" data-toggle="collapse" href="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
                                    <i class="fa  fa-search"></i> Filtro
                                </a>
                            </div>


                        </div>

                        <div class="row innerTB">
                            <div class="collapse" id="collapseFilter">
                                    <div class="col-md-6">
                                        <?php $this->load->view('admin/produtos/filtro'); ?>
                                    </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-md-6">
                                <?php $this->load->view('admin/partials/messages'); ?>
                            </div>
                        </div>



                        <!-- Table -->
                        <table class="table table-bordered table-primary">

                            <!-- Table heading -->
                            <thead>
                            <tr>
                                <th class="center">ID</th>
                                <th>Nome</th>
                                <th>Slug</th>
                                <th>Tipo</th>
                                <th class="center" style="width: 20%">Ações</th>
                            </tr>
                            </thead>
                            <!-- // Table heading END -->

                            <!-- Table body -->
                            <tbody>

                            <!-- Table row -->
                            <?php foreach($rows as $row) :?>
                            <tr>

                                <td class="center"><?php echo $row[$primary_key];?></td>
                                <td><?php echo $row['nome'];?></td>
                                <td><?php echo $row['slug'];?></td>
                                <td><?php echo $row['tipo_pessoa'];?></td>
                                <td class="center">
                                    <a href="<?php echo base_url("{$current_controller_uri}/edit/{$row[$primary_key]}")?>" class="btn btn-sm btn-primary">  <i class="fa fa-edit"></i>  Editar </a>
                                    <a href="<?php echo base_url("$current_controller_uri/delete/{$row[$primary_key]}")?>" class="btn btn-sm btn-danger deleteRowButton"> <i class="fa fa-eraser"></i> Excluir </a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            <!-- // Table row END -->

                            </tbody>
                            <!-- // Table body END -->

                        </table>
                        <!-- // Table END -->
                        <?php echo $pagination_links;?>
                    </div>
                </div>
                <!-- // Widget END -->
            </div>
        </div>
    </div>
</div>