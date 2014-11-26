<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceSimple app footer-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceSimple app footer-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceSimple app footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceSimple app footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceSimple app footer-sticky"><!-- <![endif]-->
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

    <!--[if lt IE 9]><link rel="stylesheet" href="../assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->

    <link rel="stylesheet" href="<?php echo app_assets_url('coral/css/admin/module.admin.stylesheet-complete.min.css', 'admin')?>"/>
    <link rel="stylesheet" href="<?php echo app_assets_url('core/css/base.css', 'admin')?>"/>


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
    <script>if (/*@cc_on!@*/false && document.documentMode === 10) { document.documentElement.className+=' ie ie10'; }</script>

</head><body class=" loginWrapper menu-right-hidden">

<!-- Main Container Fluid -->
<div class="container-fluid menu-hidden">



<!-- Content -->
<div id="content">

<div class="layout-app">

    <!-- row-app -->
    <div class="row row-app">
        <!-- col -->
        <!-- col-separator.box -->
        <div class="col-separator col-unscrollable box">

            <!-- col-table -->
            <div class="col-table">

                <h4 class="innerAll margin-none border-bottom text-center"><i class="fa fa-lock"></i> Entre na sua conta</h4>

                <?php echo $contents;?>

            </div>
            <!-- // END col-table -->

        </div>
        <!-- // END col-separator.box -->


    </div>
    <!-- // END row-app -->



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
    <script src="<?php echo app_assets_url('coral/components/core/core.init.js', 'admin')?>"></script>
    <script src="<?php echo app_assets_url('core/js/base.js', 'admin')?>"></script>

</body>
</html>