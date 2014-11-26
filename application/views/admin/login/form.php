<!-- col-table-row -->
<div class="col-table-row">

    <!-- col-app -->
    <div class="col-app col-unscrollable">

        <!-- col-app -->
        <div class="col-app">
            <div class="login">
                <div class="placeholder text-center"><i class="fa fa-lock"></i></div>
                <div class="panel panel-default col-sm-6 col-sm-offset-3">

                    <div class="panel-body">
                        <form role="form" action="<?php echo $login_form_url;?>" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if($this->session->flashdata('loginerro')): ?>
                                        <div class="alert alert-danger fade in widget-inner">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <i class="fa fa-times"></i> <?php echo $this->session->flashdata('loginerro');?>
                                        </div>
                                    <?php endif;?>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="login">E-mail</label>
                                <input type="email" class="form-control" id="login" name="login" >
                            </div>
                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Entrar</button>

                            <!--div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember my details
                                </label>
                            </div-->
                        </form>

                    </div>

                </div>

                <div class="clearfix"></div>

            </div>


        </div>
        <!-- // END col-app -->

    </div>
    <!-- // END col-app.col-unscrollable -->

</div>
<!-- // END col-table-row -->