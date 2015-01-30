<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceSimple sidebar sidebar-fusion sidebar-kis footer-sticky navbar-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceSimple sidebar sidebar-fusion sidebar-kis footer-sticky navbar-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceSimple sidebar sidebar-fusion sidebar-kis footer-sticky navbar-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceSimple sidebar sidebar-fusion sidebar-kis footer-sticky navbar-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceSimple sidebar sidebar-fusion sidebar-kis footer-sticky navbar-sticky"><!-- <![endif]-->
<head>
    <title><?php echo $title;?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

    <!--
	**********************************************************
	In development, use the LESS files and the less.js compiler
	instead of the minified CSS loaded by default.
	**********************************************************
	<link rel="stylesheet/less" href="../assets/less/admin/module.admin.stylesheet-complete.less" />
	-->

    <!--[if lt IE 9]>
    <link rel="stylesheet" href="<?php echo app_assets_url('coral/components/library/bootstrap/css/bootstrap.min.css', 'admin')?>"/><![endif]-->

    <link rel="stylesheet" href="<?php echo app_assets_url('coral/css/admin/module.admin.stylesheet-complete.min.css', 'admin')?>"/>
    <link rel="stylesheet" href="<?php echo app_assets_url('core/css/base.css', 'admin')?>"/>

    <?php echo $css_for_layout;?>




    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo app_assets_url('coral/library/jquery/jquery.min.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2', 'admin')?>"></script>
    <script src="<?php echo app_assets_url('coral/library/jquery/jquery-migrate.min.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2', 'admin')?>"></script>
    <script src="<?php echo app_assets_url('coral/library/modernizr/modernizr.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2', 'admin')?>"></script>
    <script src="<?php echo app_assets_url('coral/plugins/core_less-js/less.min.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2', 'admin')?>"></script>
    <script src="<?php echo app_assets_url('coral/plugins/charts_flot/excanvas.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2', 'admin')?>"></script>
    <script src="<?php echo app_assets_url('coral/plugins/core_browser/ie/ie.prototype.polyfill.js?v=v2.0.0-rc1&amp;sv=v0.0.1.2', 'admin')?>"></script>
    <script src="<?php echo app_assets_url('coral/plugins/forms_elements_inputmask/jquery.inputmask.bundle.min.js', 'admin')?>"></script>

    <?php if(isset($enable_ckeditor)) :?>
        <script src="<?php echo app_assets_url("ckeditor/ckeditor.js", 'common');?>"></script>
        <script src="<?php echo app_assets_url("ckfinder/ckfinder.js", 'common');?>"></script>
    <?php endif?>

    <script>
        var ADMIN_URL = '<?php echo base_url('admin'); ?>';
    </script>

</head>
<body class=" menu-right-hidden">

<!-- Main Container Fluid -->
<div class="container-fluid menu-hidden">

    <?php $this->load->view('admin/partials/sidebar_menu');?>

<!-- Content -->
<div id="content">
    <?php $this->load->view('admin/partials/top_nav');?>
    <?php echo $contents;?>
</div>
<!-- // Content END -->

<div class="clearfix"></div>
<!-- // Sidebar menu & content wrapper END -->

<!-- Footer -->
<div id="footer" class="hidden-print">

    <!--  Copyright Line -->
    <div class="copy">&copy; 2012 - 2014 - <a href="http://www.mosaicpro.biz">MosaicPro</a> - All Rights Reserved. <a href="http://themeforest.net/?ref=mosaicpro" target="_blank">Purchase CORAL on ThemeForest</a> - Current version: v2.0.0-rc1 / <a target="_blank" href="../assets/../../CHANGELOG.txt?v=v2.0.0-rc1">changelog</a></div>
    <!--  End Copyright Line -->

</div>
<!-- // Footer END -->


</div>
<!-- // Main Container Fluid END -->


<!-- Global -->
<script data-id="App.Config">
    var App = {};        var basePath = '',
        commonPath = '../assets/',
        rootPath = '../',
        DEV = false,
        componentsPath = '../assets/components/';

    var primaryColor = '#eb6a5a',
        dangerColor = '#b55151',
        successColor = '#609450',
        infoColor = '#4a8bc2',
        warningColor = '#ab7a4b',
        inverseColor = '#45484d';

    var themerPrimaryColor = primaryColor;

</script>

<script src="<?php echo app_assets_url('coral/library/bootstrap/js/bootstrap.min.js', 'admin')?>"></script>
<script src="<?php echo app_assets_url('coral/plugins/core_nicescroll/jquery.nicescroll.min.js', 'admin')?>"></script>
<script src="<?php echo app_assets_url('coral/plugins/core_breakpoints/breakpoints.js', 'admin')?>"></script>
<script src="<?php echo app_assets_url('coral/plugins/core_preload/pace.min.js', 'admin')?>"></script>
<script src="<?php echo app_assets_url('coral/components/core_preload/preload.pace.init.js', 'admin')?>"></script>
<script src="<?php echo app_assets_url('coral/components/admin_menus/sidebar.main.init.js', 'admin')?>"></script>
<script src="<?php echo app_assets_url('coral/components/admin_menus/sidebar.collapse.init.js', 'admin')?>"></script>

<script src="<?php echo app_assets_url('coral/plugins/forms_elements_bootstrap-select/js/bootstrap-select.js', 'admin')?>"></script>
<script src="<?php echo app_assets_url('coral/components/forms_elements_bootstrap-select/bootstrap-select.init.js', 'admin')?>"></script>
<!--script src="<?php echo app_assets_url('coral/components/admin_menus/sidebar.kis.init.js', 'admin')?>"></script-->




<script src="<?php echo app_assets_url('coral/plugins/forms_validator/jquery-validation/dist/jquery.validate.min.js', 'admin')?>"></script>

<script src="<?php echo app_assets_url('coral/components/forms_validator/form-validator.init.js', 'admin')?>"></script>
<script src="<?php echo app_assets_url('coral/plugins/forms_validator/jquery-validation/localization/messages_pt_BR.js', 'admin')?>"></script>
<script src="<?php echo app_assets_url('coral/components/forms_elements_fuelux-checkbox/fuelux-checkbox.init.js', 'admin')?>"></script>

<script src="<?php echo app_assets_url('coral/components/core/core.init.js', 'admin')?>"></script>
<script src="<?php echo app_assets_url('core/js/base.js', 'admin')?>"></script>
<?php echo $js_for_layout;?>

</body>
</html>