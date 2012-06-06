<?php
$pageName = basename($_SERVER['PHP_SELF']);
?>
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
        <link href="<?php echo $themes ?>css/main.css" rel="stylesheet">
        <link href="<?php echo $themes ?>assets/js/google-code-prettify/prettify.css" rel="stylesheet">
        <link href="<?php echo $themes ?>assets/css/smart_wizard.css" rel="stylesheet">
        <link href="<?php echo $themes ?>assets/css/smart_wizard_vertical.css" rel="stylesheet">

        <link href="<?php echo $themes ?>assets/js/nouislider.css" rel="stylesheet">

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
        <script src="<?php echo $themes ?>assets/js/jquery.nouislider.min.js"></script>

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
            $(document).ready(function(){
                $('#pop').popover()
            })
        </script>
    </head>

    <body>

        <div class="headerbg">
            test
        </div>
        <header>
            <!-- Navbar ================================================== -->
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

                                <?php if (is_login()): ?>
                                    <li class=""><a href="<?php echo site_url('create') ?>">Penghitungan Baseline Emisi</a></li>
                                    <li class=""><a href="<?php echo site_url('pengurangan') ?>">Pengurangan Emisi</a></li>
                                    <li class=""><a href="<?php echo site_url('komitmen') ?>">Komitmen</a></li>
                                    <li class=""><a href="<?php echo site_url('profil') ?>">Data Profil</a></li>
                                    <li class=""><a href="<?php echo site_url('auth/logout') ?>">Logout</a></li>
                                <?php else: ?>
                                    <li class=""><a href="<?php echo site_url('auth') ?>">Login</a></li>
                                    <li class=""><a href="<?php echo site_url('auth/register') ?>">Register</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="topbar topbar-fixed">

                <?php /*
                  <ul class="nav navBottom nav-pills">
                  <li class=""><a href="<?php echo site_url('create') ?>"><img src="<?php echo $themes ?>img/icons/homegreen.png" width="40" />&nbsp;&nbsp;&nbsp;Rumah</a></li>
                  <li class=""><a href="<?php echo site_url('sampah') ?>"><img src="<?php echo $themes ?>img/icons/trash.png" width="40" />&nbsp;&nbsp;&nbsp;Sampah</a></li>
                  <li class=""><a href="<?php echo site_url('transportasi') ?>"><img src="<?php echo $themes ?>img/icons/delivery.png" width="40" />&nbsp;&nbsp;&nbsp;Transportasi</a></li>
                  </ul>
                 */     ?>
            </div>
        </header>
        <div id="main" class="container">
            <?php /*
              <div class="alert alert-success">
              <a class="close" data-dismiss="alert" href="#">×</a>
              Penghitungan baseline emisi pernah anda lakukan pada tanggal 06 May 2012 20:56<br />
              Apakah Anda ingin menghapus data ini dan mengisikan ulang perhitungan emisi anda? Hapus data ini
              </div>
             */
            ?>


            <?php echo $content; ?>
        </div>


        <footer>
        </footer>

    </body>
</html>