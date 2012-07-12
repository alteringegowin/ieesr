<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Karbon Kalkulator</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="<?php echo $themes ?>css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo $themes ?>assets/fancybox/jquery.fancybox.css?v=2.0.6" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo $themes ?>assets/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.2" />
        <link rel="stylesheet" type="text/css" href="<?php echo $themes ?>css/ui-lightness/jquery-ui-1.8.19.custom.css" />
        <!--     <link href="<?php echo $themes ?>assets/css/bootstrap-responsive.css" rel="stylesheet"> -->
        <link href="<?php echo $themes ?>css//main.css" rel="stylesheet">
        <link href="<?php echo $themes ?>assets/js/google-code-prettify/prettify.css" rel="stylesheet">
        <link href="<?php echo $themes ?>assets/css/smart_wizard.css" rel="stylesheet">
        <link href="<?php echo $themes ?>assets/css/smart_wizard_vertical.css" rel="stylesheet">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?php echo $themes ?>assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $themes ?>assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $themes ?>assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo $themes ?>assets/ico/apple-touch-icon-57-precomposed.png">
        <!-- Le javascript
       ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
    <!--     <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script> -->
        <script src="<?php echo $themes ?>assets/js/jquery.js"></script>
        <script src="<?php echo $themes ?>assets/js/jquery-ui-1.8.19.custom.min.js"></script>
        <script src="<?php echo $themes ?>assets/js/google-code-prettify/prettify.js"></script>
        <script src="<?php echo $themes ?>assets/js/bootstrap-transition.js"></script>
        <script src="<?php echo $themes ?>assets/js/bootstrap-alert.js"></script>
        <script src="<?php echo $themes ?>assets/js/bootstrap-modal.js"></script>
        <script src="<?php echo $themes ?>assets/js/bootstrap-dropdown.js"></script>
        <script src="<?php echo $themes ?>assets/js/bootstrap-scrollspy.js"></script>
        <script src="<?php echo $themes ?>assets/js/bootstrap-tab.js"></script>
        <script src="<?php echo $themes ?>assets/js/bootstrap-tooltip.js"></script>
        <script src="<?php echo $themes ?>assets/js/bootstrap-popover.js"></script>
        <script src="<?php echo $themes ?>assets/js/bootstrap-button.js"></script>
        <script src="<?php echo $themes ?>assets/js/bootstrap-collapse.js"></script>
        <script src="<?php echo $themes ?>assets/js/bootstrap-carousel.js"></script>
        <script src="<?php echo $themes ?>assets/js/bootstrap-typeahead.js"></script>
        <script src="<?php echo $themes ?>assets/js/application.js"></script>
        <script src="<?php echo $themes ?>assets/js/jquery.smartWizard-2.0.min.js"></script>
        <!-- Add mousewheel plugin (this is optional) -->
        <script type="text/javascript" src="<?php echo $themes ?>assets/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>

        <!-- Add fancyBox main JS and CSS files -->
        <script type="text/javascript" src="<?php echo $themes ?>assets/fancybox/jquery.fancybox.js?v=2.0.6"></script>

        <!-- Add Button helper (this is optional) -->
        <link rel="stylesheet" type="text/css" href="<?php echo $themes ?>assets/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.2" />
        <script type="text/javascript" src="<?php echo $themes ?>assets/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.2"></script>

        <!-- Add Thumbnail helper (this is optional) -->
        <script type="text/javascript" src="<?php echo $themes ?>assets/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.2"></script>

        <!-- Add Media helper (this is optional) -->
        <script type="text/javascript" src="<?php echo $themes ?>assets/fancybox/helpers/jquery.fancybox-media.js?v=1.0.0"></script>
        <script> 
            var SITE_URL = '<?php echo site_url() ?>';
<?php if (isset($user) && $user): ?>
        var KOEF_PROPINSI = <?php echo get_koef_propinsi($user->propinsi_id) ?>;
<?php endif; ?>
    $(document).ready(function(){
               
        $('#pop').popover();
        $('.pop').fancybox()
    })
        </script>
    </head>

    <body>

        <div class="headerbg">&nbsp;</div>
        <header>
            <!-- Navbar
            ================================================== -->
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <a class="brand" href="<?php echo site_url() ?>">Karbon Kalkulator</a>
                        <div class="nav-collapse collapse">
                            <ul class="nav">
                                <li class="">
                                    <a href="<?php echo site_url() ?>">Beranda</a>
                                </li>
                                <li class="">
                                    <a href="<?php echo site_url('tentang-jejak-karbon') ?>">Tentang Jejak Karbon</a>
                                </li>
                                <li class="">
                                    <a href="<?php echo site_url('panduan') ?>">Panduan</a>
                                </li>

                                <?php if (isset($user) && $user): ?>
                                    <li class=""><a href="<?php echo site_url('dashboard') ?>">Member Area</a></li>
                                    <li class=""><a href="<?php echo site_url('auth/logout') ?>">Logout</a></li>
                                <?php else: ?>
                                    <li class=""><a href="<?php echo site_url('auth/login') ?>">Login</a></li>
                                    <li class=""><a href="<?php echo site_url('auth/register') ?>">Register</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="topbar topbar-fixed">
                <ul class="nav navBottom nav-pills">
                    <li><a href="<?php echo site_url('baseline') ?>">Perhitungan Baseline</a></li>
                    <li><a href="<?php echo site_url('pengurangan') ?>">Pengurangan Emisi</a></li>
                    <li><a href="<?php echo site_url('dashboard/komitmen') ?>">Cetak Komitmen</a></li>
                    <li><a href="#">Data Profile</a></li>
                </ul>
            </div>
        </header>
        <div id="main" class="container">
            <?php if (isset($already_submit) && $already_submit): ?>
                <div class="alert alert-success" style="text-align:center">
                    <a class="close" data-dismiss="alert" href="#">×</a>
                    <p>Penghitungan baseline emisi pernah anda lakukan pada tanggal 06 May 2012 20:56<br />
                        Apakah Anda ingin menghapus data ini dan mengisikan ulang perhitungan emisi anda? Hapus data ini
                    </p>
                    <p>
                        <a href="#" class="btn btn-danger">Hapus data ini</a>
                        <a href="#" class="btn btn-success">Cetak Komitmen</a>
                    </p>
                </div>
            <?php endif; ?>

            <?php if (isset($create_page) && $create_page): ?>
                <div class="row buttonRow">
                    <div class="span3">
                        &nbsp;
                    </div>
                    <div class="span9">	
                        <div class="btn-group">
                            <a class="btn btn-large btn-success <?php echo check_user_nav_current('index') ?>" href="<?php echo site_url('baseline/index') ?>"><i class="icon-off"></i> Listrik</a>
                            <a class="btn btn-large btn-success <?php echo check_user_nav_current('sampah') ?>"  href="<?php echo site_url('baseline/sampah') ?>"><i class="icon-trash"></i> Sampah</a>
                            <a class="btn btn-large btn-success <?php echo check_user_nav_current('transportasi') ?>"  href="<?php echo site_url('baseline/transportasi') ?>"><i class="icon-road"></i> Transportasi</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (isset($pengurangan) && $pengurangan): ?>
                <div class="row buttonRow">
                    <div class="span3">
                        &nbsp;
                    </div>
                    <div class="span9">	
                        <div class="btn-group">
                            <a class="btn btn-large btn-success <?php echo check_user_nav_current('index') ?>" href="<?php echo site_url('pengurangan/index') ?>"><i class="icon-off"></i> Listrik</a>
                            <a class="btn btn-large btn-success <?php echo check_user_nav_current('sampah') ?>"  href="<?php echo site_url('pengurangan/sampah') ?>"><i class="icon-trash"></i> Sampah</a>
                            <a class="btn btn-large btn-success <?php echo check_user_nav_current('transportasi') ?>"  href="<?php echo site_url('pengurangan/transportasi') ?>"><i class="icon-road"></i> Transportasi</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


            <?php echo $content; ?>
        </div>


        <footer>
        </footer>

    </body>
</html>