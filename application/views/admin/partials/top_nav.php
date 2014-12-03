
<div class="navbar hidden-print navbar-inverse  main" role="navigation">
<div class="user-action user-action-btn-navbar pull-left border-right">
    <button class="btn btn-sm btn-navbar btn-primary btn-stroke"><i class="fa fa-bars fa-2x"></i></button>
</div>






<div class="user-action pull-right menu-right-hidden-xs menu-left-hidden-xs">
    <div class="dropdown username hidden-xs pull-left">
        <a class="dropdown-toggle " data-toggle="dropdown" href="#">
				<span class="media margin-none">
					<span class="pull-left"><img src="<?php echo app_assets_url('coral/images/people/35/16.jpg', 'admin')?>" alt="user" class="img-circle"></span>
					<span class="media-body">
						<?php echo $userdata['nome'];?> <span class="caret"></span>
					</span>
				</span>
        </a>
        <ul class="dropdown-menu pull-right">
            <!--li class="active"><a href="index.html" class="glyphicons user"><i></i> Meus Dados</a></li>
            <li><a href="social_account.html">Configurações</a></li-->
            <li><a href="<?php echo base_url('admin/login/logout')?>">Sair</a></li>
        </ul>
    </div>
    <!--div class="dropdown dropdown-icons padding-none">
        <a data-toggle="dropdown" href="#" class="btn btn-primary btn-circle dropdown-toggle"><i
                class="fa fa-user"></i> </a>
        <ul class="dropdown-menu">
            <li data-toggle="tooltip" data-title="Photo Gallery" data-placement="left" data-container="body"><a
                    href="gallery_photo.html"><i class="fa fa-camera"></i></a></li>
            <li data-toggle="tooltip" data-title="Tasks" data-placement="left" data-container="body"><a
                    href="tasks.html"><i class="fa fa-code-fork"></i></a></li>
            <li data-toggle="tooltip" data-title="Employees" data-placement="left" data-container="body"><a
                    href="employees.html"><i class="fa fa-group"></i></a></li>
            <li data-toggle="tooltip" data-title="Contacts" data-placement="left" data-container="body"><a
                    href="contacts.html"><i class="fa fa-phone-square"></i></a></li>
        </ul>
    </div-->
</div>
<div class="clearfix"></div>
</div>
<!-- // END navbar -->