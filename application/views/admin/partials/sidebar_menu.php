<!-- Main Sidebar Menu -->
<div id="menu" class="hidden-print hidden-xs sidebar-blue sidebar-brand-primary">


<div id="sidebar-fusion-wrapper">
<div id="brandWrapper">

    <a href="<?php echo base_url('admin/home');?>" class="display-block-inline pull-left logo"><img src="<?php echo app_assets_url('core/images/logo-icon.png', 'admin')?>" alt=""></a>
    <a href="<?php echo base_url('admin/home');?>"><span class="text">Corcovado</span></a>
</div>




<ul class="menu list-unstyled">

<li class="">

    <a href="<?php echo base_url('admin/home');?>" >
        <i class="fa fa-dashboard"></i>
        <span>Painel</span>
    </a>


</li>
<li class="hasSubmenu active">
    <a href="#menu-usuarios" data-toggle="collapse">
        <i class="fa fa-user"></i>
        <span>Usuários</span>
    </a>
    <ul class="collapse in" id="menu-usuarios">
        <li class="">
            <a href="<?php echo base_url('admin/usuarios/index');?>">
                <i class="fa fa-users"></i>
                <span>Gerenciar Usuários</span>
            </a>

        </li>

        <li class="menu hasSubmenu">
            <a href="#submenu" data-toggle="collapse"><i class="fa fa-envelope"></i><span>Controle de Acesso</span></a>
            <ul class="collapse menu" id="submenu">
                <li class="">
                    <a href="<?php echo base_url('admin/usuarios_acl_tipos/index');?>">
                        <i class="fa fa-flash"></i>
                        <span>ACL - Grupos</span>
                    </a>

                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/usuarios_acl_recursos/index');?>">
                        <i class="fa fa-flash"></i>
                        <span>ACL - Recursos</span>
                    </a>

                </li>
                <li class="">
                    <a href="<?php echo base_url('admin/usuarios_acl_acoes/index');?>">
                        <i class="fa fa-flash"></i>
                        <span>ACL - Ações</span>
                    </a>

                </li>
            </ul>
        </li>

    </ul>

</li>
<li class="hasSubmenu">
        <a href="#menu-cms" data-toggle="collapse"><i class="fa fa-cube"></i><span>CMS</span></a>
        <ul id="menu-cms" class="collapse">
            <li><a href="<?php echo base_url('admin/paginas/index');?>"><i class="fa fa-file-o"></i><span>Páginas</span></a></li>
            <li><a href="<?php echo base_url('admin/cms_blocos/index');?>"><i class="fa fa-cubes"></i><span>Blocos</span></a></li>
            <li><a href="<?php echo base_url('admin/cms_menus/index');?>"><i class="fa fa-list"></i><span>Menus</span></a></li>
            <li><a href="<?php echo base_url('admin/cms_slides/index');?>"><i class="fa fa-columns"></i><span>Slides</span></a></li>
            <li><a href="<?php echo base_url('admin/cms_banners/index');?>"><i class="fa fa-th-large"></i><span>Banners</span></a></li>



        </ul>
</li>

    <li class="hasSubmenu">
        <a href="#menu-faq" data-toggle="collapse"><i class="fa fa-comments-o"></i><span>FAQ</span></a>
        <ul id="menu-faq" class="collapse">
            <li><a href="<?php echo base_url('admin/faq_categorias/index');?>"><i class="fa fa-list"></i><span>Categorias</span></a></li>
            <li><a href="<?php echo base_url('admin/faq_duvidas/index');?>"><i class="fa fa-question-circle"></i><span>Dúvidas</span></a></li>

        </ul>
    </li>
    <li class="hasSubmenu">
        <a href="#menu-blog" data-toggle="collapse"><i class="fa fa-book"></i><span>Blog</span></a>
        <ul id="menu-blog" class="collapse">
            <li><a href="<?php echo base_url('admin/blog_categorias/index');?>"><i class="fa fa-list"></i><span>Categorias</span></a></li>
            <li><a href="<?php echo base_url('admin/blog_posts/index');?>"><i class="fa fa-edit"></i><span>Posts</span></a></li>

        </ul>
    </li>
    <li class="hasSubmenu">
        <a href="#menu-produtos" data-toggle="collapse"><i class="fa fa-tags "></i><span>Produtos</span></a>
        <ul id="menu-produtos" class="collapse">
            <li><a href="<?php echo base_url('admin/produto_categorias/index');?>"><i class="fa fa-list"></i><span>Categorias</span></a></li>
            <li><a href="<?php echo base_url('admin/produtos/index');?>"><i class="fa fa-edit"></i><span>Gerenciar Produtos</span></a></li>

        </ul>
    </li>

    <li class="hasSubmenu">
        <a href="#menu-relacionamento" data-toggle="collapse"><i class="fa fa-tags "></i><span>Relacionamento</span></a>
        <ul id="menu-relacionamento" class="collapse">
            <li><a href="<?php echo base_url('admin/relacionamento_usuarios/index');?>"><i class="fa fa-list"></i><span>Gerenciar Usuários</span></a></li>


        </ul>
    </li>

    <li class="hasSubmenu">
        <a href="#menu-sistema" data-toggle="collapse"><i class="fa fa-gears"></i><span>Sistema</span></a>
        <ul id="menu-sistema" class="collapse">
            <li><a href="<?php echo base_url('admin/idiomas/index');?>"><i class="fa fa-language"></i><span>Idiomas</span></a></li>
            <li><a href="<?php echo base_url('admin/configuracoes/set');?>"><i class="fa  fa-gear"></i><span>Configurações</span></a></li>
            <li><a href="<?php echo base_url('admin/log_eventos/index');?>"><i class="fa  fa-eye"></i><span>Logs</span></a></li>


        </ul>
    </li>


<!--li class="hasSubmenu">
    <a href="#sidebar-fusion-example" data-toggle="collapse"><span class="badge pull-right badge-primary">7</span><i class="fa fa-stack-exchange"></i><span>Submenus</span></a>
    <ul id="sidebar-fusion-example" class="collapse">
        <li class="active"><a href=""><i class="fa fa-flash"></i><span>Active</span></a></li>
        <li><a href=""><i class="fa fa-male"></i><span>Menu item</span></a></li>
        <li><a href=""><i class="fa fa-comments-o"></i><span>Menu item</span></a></li>
        <li class="menu hasSubmenu">
            <a href="#submenu" data-toggle="collapse"><span class="badge pull-right badge-primary">30</span><i class="fa fa-envelope"></i><span>2nd level</span></a>
            <ul class="collapse menu" id="submenu">
                <li><a href=""><span>Menu item</span></a></li>
                <li><a href=""><span>Menu item</span></a></li>
                <li><a href=""><span>Menu item</span></a></li>
            </ul>
        </li>
    </ul>
</li-->

</ul>


</div>






</div>
<!-- // Main Sidebar Menu END -->

<!-- Main Sidebar Menu -->
<div id="menu_kis" class="hidden-print sidebar-light">

    <div>
        <ul class="list-unstyled">

            <li><a href="index.html" class="glyphicons globe"><i></i><span>Social</span></a></li>

            <li><a href="realestate_listing_map.html" class="glyphicons home"><i></i> Estate</a></li>

            <li><a href="events.html" class="glyphicons google_maps"><i></i> Events</a></li>

            <li><a href="news.html" class="glyphicons notes"><i></i> Content</a></li>

            <li><a href="gallery_video.html" class="glyphicons picture"><i></i><span>Media</span></a></li>

            <li><a href="tasks.html" class="glyphicons share_alt"><i></i><span>Tasks</span></a></li>

            <li><a href="support_tickets.html" class="glyphicons life_preserver"><i></i><span>Support</span></a></li>

            <li><a href="medical_overview.html" class="glyphicons circle_plus"><i></i><span>Medical</span></a></li>

            <li><a href="courses_2.html" class="glyphicons crown"><i></i> Learning</a></li>

            <li><a href="finances.html" class="glyphicons calculator"><i></i> Finance</a></li>

            <li><a href="shop_products.html" class="glyphicons shopping_cart"><i></i><span>Shop</span></a></li>

            <li><a href="survey.html" class="glyphicons turtle no-ajaxify"><i></i><span>Surveys</span></a></li>

            <li class="active"><a href="dashboard_analytics.html" class="glyphicons plus"><i></i><span>Other</span></a></li>

            <li><a href="../front/index.html" class="glyphicons leather" target="_blank"><i></i><span>Website</span></a></li>
        </ul>
    </div>



</div>
<!-- // Main Sidebar Menu END -->