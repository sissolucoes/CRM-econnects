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
                        <h4 class="heading">Usuários</h4>
                    </div>
                    <!-- // Widget heading END -->

                    <div class="row">
                        <div class="col-md-6">
                            <?php $this->load->view('admin/partials/messages'); ?>
                        </div>
                    </div>
                    <div class="widget-body innerAll inner-2x">

                        <!-- Table -->
                        <table class="table table-bordered table-primary">

                            <!-- Table heading -->
                            <thead>
                            <tr>
                                <th class="center">ID</th>
                                <th>Data do Evento</th>
                                <th>Tipo de Evento</th>
                                <th>Usuário</th>
                                <th class="center">Ações</th>
                            </tr>
                            </thead>
                            <!-- // Table heading END -->

                            <!-- Table body -->
                            <tbody>

                            <!-- Table row -->
                            <?php foreach($rows as $row) :?>
                                <tr>

                                    <td class="center"><?php echo $row[$primary_key];?></td>
                                    <td><?php echo app_date_mysql_to_mask($row['criacao']);?></td>
                                    <td><?php echo $row['tipo_evento'];?></td>
                                    <td><?php echo $row['usuario_nome'] != '' ?  $row['usuario_nome'] : 'N/D';?></td>
                                    <td class="center">
                                        <a href="<?php echo base_url("{$current_controller_uri}/view/{$row[$primary_key]}")?>" class="btn btn-sm btn-primary">  <i class="fa fa-search"></i>  Detalhes </a>
                                        <a href="<?php echo base_url("$current_controller_uri/delete/{$row[$primary_key]}")?>" class="btn btn-sm btn-danger deleteRowButton"> <i class="fa fa-eraser"></i> Excluir </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            <!-- // Table row END -->

                            </tbody>
                            <!-- // Table body END -->

                        </table>
                        <!-- // Table END -->

                    </div>
                </div>
                <!-- // Widget END -->
            </div>
        </div>
    </div>
</div>