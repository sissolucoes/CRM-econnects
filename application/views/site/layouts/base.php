<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="<?php echo app_assets_url('css/normalize.min.css', 'site')?>">
    <link rel="stylesheet" href="<?php echo app_assets_url('css/main.css', 'site')?>">
    <link rel="stylesheet" href="<?php echo app_assets_url('css/uniform.default.css', 'site')?>">
    <link href="<?php echo app_assets_url('css/ui-lightness/jquery-ui-1.10.3.custom.css', 'site')?>" rel="stylesheet">

    <?php echo $css_for_layout;?>

    <!--link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'-->
    <script src="<?php echo app_assets_url('js/vendor/modernizr-2.6.2.min.js', 'site')?>"></script>

    <script>
        var SITE_URL = '<?php echo site_url();?>';
    </script>
</head>
<body class="home <?php if(app_current_controller() == 'home') echo 'index_row';?>">
<?php $this->load->view('site/partials/menu');?>

<?php echo $contents;?>

<?php $this->load->view('site/partials/footer');?>

<script src="<?php echo app_assets_url('js/vendor/jquery-1.11.1.min.js', 'site');?>"></script>
<script src="<?php echo app_assets_url('js/plugins.js', 'site');?>"></script>
<script src="<?php echo app_assets_url('js/jquery.uniform.min.js', 'site');?>"></script>
<script src="<?php echo app_assets_url('js/jquery.placeholder.js', 'site');?>"></script>
<script src="<?php echo app_assets_url('js/jquery.ui.min.js', 'site');?>"></script>
<script src="<?php echo app_assets_url('js/main.js', 'site');?>"></script>

<?php echo $js_for_layout;?>

<script>
    /*var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
     (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
     g.src='//www.google-analytics.com/ga.js';
     s.parentNode.insertBefore(g,s)}(document,'script'));*/
</script>

</body>
</html>