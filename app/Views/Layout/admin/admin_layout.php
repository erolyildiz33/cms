<?php

$settings = db_connect()->table('settings')->get()->getRow();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Admin, Dashboard, Bootstrap" />
    <link rel="shortcut icon" sizes="196x196" href="<?php echo base_url('assets');?>/images/logo.png">
    <title><?= $settings->title ?> - <?php echo (!empty($title)?$title:null) ?></title>

    <link rel="stylesheet" href="<?php echo base_url('assets/libs');?>/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/libs');?>/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
    <!-- build:css <?php echo base_url('assets');?>/css/app.min.css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs');?>/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/libs');?>/bower/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/libs');?>/bower/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/css/core.css">
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/css/app.css">
    <!-- endbuild -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <script src="<?php echo base_url('assets/libs');?>/bower/breakpoints.js/dist/breakpoints.min.js"></script>
    <script>
        Breakpoints();
    </script>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->

<!-- APP NAVBAR ==========-->
<nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">

    <!-- navbar header -->
    <div class="navbar-header">
        <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
        </button>

        <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="zmdi zmdi-hc-lg zmdi-more"></span>
        </button>

        <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="zmdi zmdi-hc-lg zmdi-search"></span>
        </button>

        <a href="<?php echo base_url('/admin');?>" class="navbar-brand">
            <span class="brand-icon"><i class="fa fa-gg"></i></span>
            <span class="brand-name"><?php echo $settings->company_name ;?></span>
        </a>
    </div><!-- .navbar-header -->

    <div class="navbar-container container-fluid">
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-toolbar navbar-toolbar-left navbar-left">
                <li class="hidden-float hidden-menubar-top">
                    <a href="javascript:void(0)" role="button" id="menubar-fold-btn" class="hamburger hamburger--arrowalt is-active js-hamburger">
                        <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                    </a>
                </li>
                <li>
                    <h5 class="page-title hidden-menubar-top hidden-float"><?php echo display('dashboard');?></h5>
                </li>
            </ul>

            <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right">
                <li class="nav-item dropdown hidden-float">
                    <a href="javascript:void(0)" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
                        <i class="zmdi zmdi-hc-lg zmdi-search"></i>
                    </a>
                </li>




            </ul>
        </div>
    </div><!-- navbar-container -->
</nav>
<!--========== END app navbar -->
<!-- APP ASIDE ==========-->
<aside id="menubar" class="menubar light">
    <div class="app-user">
        <div class="media">
            <div class="media-left">
                <div class="avatar avatar-md avatar-circle">
                    <a href="javascript:void(0)"><img class="img-responsive" src="<?php echo base_url("assets"); ?>/images/221.jpg" alt="avatar"/></a>
                </div><!-- .avatar -->
            </div>
            <div class="media-body">
                <div class="foldable">
                    <h5><a href="javascript:void(0)" class="username"><?php echo $user->full_name;?></a></h5>
                    <ul>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <small>Web Developer</small>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li>
                                    <a class="text-color" href="/index.html">
                                        <span class="m-r-xs"><i class="fa fa-home"></i></span>
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="profile.html">
                                        <span class="m-r-xs"><i class="fa fa-user"></i></span>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="settings.html">
                                        <span class="m-r-xs"><i class="fa fa-gear"></i></span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a class="text-color" href="logout.html">
                                        <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        <span>Home</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- .media-body -->
        </div><!-- .media -->
    </div><!-- .app-user -->

    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">


                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                        <span class="menu-text"><?php echo display('dashboard')?></span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                        <span class="menu-text"><?php echo display('settings')?></span>
                    </a>
                </li>

                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                        <span class="menu-text"><?php echo display('gallerys')?></span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="#"><span class="menu-text"><?php echo display('rgallerys')?></span></a></li>
                        <li><a href="#"><span class="menu-text"><?php echo display('vgallerys')?></span></a></li>
                        <li><a href="#"><span class="menu-text"><?php echo display('dgallerys')?></span></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                        <span class="menu-text"><?php echo display('slider')?></span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url('admin/product')?>">
                        <i class="menu-icon fa fa-cubes"></i>
                        <span class="menu-text"><?php echo display('products')?></span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-newspaper-o"></i>
                        <span class="menu-text"><?php echo display('news')?></span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-calendar"></i>
                        <span class="menu-text"><?php echo display('trainings')?></span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon zmdi zmdi-check zmdi-hc-lg"></i>
                        <span class="menu-text"><?php echo display('refferanses')?></span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon zmdi zmdi-puzzle-piece zmdi-hc-lg"></i>
                        <span class="menu-text"><?php echo display('brands')?></span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-user-secret"></i>
                        <span class="menu-text"><?php echo display('users')?></span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-users"></i>
                        <span class="menu-text"><?php echo display('subscribers')?></span>
                    </a>
                </li>


                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon zmdi zmdi-lamp zmdi-hc-lg"></i>
                        <span class="menu-text"><?php echo display('popupservice')?></span>
                    </a>
                </li>

                <li>
                    <a href="documentation.html">
                        <i class="menu-icon zmdi zmdi-view-web zmdi-hc-lg"></i>
                        <span class="menu-text"><?php echo display('dashboard')?></span>
                    </a>
                </li>

            </ul><!-- .app-menu -->
        </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
</aside>
<!--========== END app aside -->

<!-- navbar search -->
<div id="navbar-search" class="navbar-search collapse">
    <div class="navbar-search-inner">
        <form action="#">
            <span class="search-icon"><i class="fa fa-search"></i></span>
            <input class="search-field" type="search" placeholder="search..."/>
        </form>
        <button type="button" class="search-close" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <div class="navbar-search-backdrop" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"></div>
</div><!-- .navbar-search -->

<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
    <div class="wrap">
   <?php echo $this->renderSection('content');?>
    </div>
    <!-- APP FOOTER -->
    <?php echo $this->renderSection('footer');?>

    <!-- /#app-footer -->
</main>
<!--========== END app main -->

<!-- APP CUSTOMIZER -->
<div id="app-customizer" class="app-customizer">
    <a href="javascript:void(0)"
       class="app-customizer-toggle theme-color"
       data-toggle="class"
       data-class="open"
       data-active="false"
       data-target="#app-customizer">
        <i class="fa fa-gear"></i>
    </a>
    <div class="customizer-tabs">
        <!-- tabs list -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#menubar-customizer" aria-controls="menubar-customizer" role="tab" data-toggle="tab">Menubar</a></li>
            <li role="presentation"><a href="#navbar-customizer" aria-controls="navbar-customizer" role="tab" data-toggle="tab">Navbar</a></li>
        </ul><!-- .nav-tabs -->

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active fade" id="menubar-customizer">
                <div class="hidden-menubar-top hidden-float">
                    <div class="m-b-0">
                        <label for="menubar-fold-switch">Fold Menubar</label>
                        <div class="pull-right">
                            <input id="menubar-fold-switch" type="checkbox" data-switchery data-size="small" />
                        </div>
                    </div>
                    <hr class="m-h-md">
                </div>
                <div class="radio radio-default m-b-md">
                    <input type="radio" id="menubar-light-theme" name="menubar-theme" data-toggle="menubar-theme" data-theme="light">
                    <label for="menubar-light-theme">Light</label>
                </div>

                <div class="radio radio-inverse m-b-md">
                    <input type="radio" id="menubar-dark-theme" name="menubar-theme" data-toggle="menubar-theme" data-theme="dark">
                    <label for="menubar-dark-theme">Dark</label>
                </div>
            </div><!-- .tab-pane -->
            <div role="tabpanel" class="tab-pane fade" id="navbar-customizer">
                <!-- This Section is populated Automatically By javascript -->
            </div><!-- .tab-pane -->
        </div>
    </div><!-- .customizer-taps -->
    <hr class="m-0">
    <div class="customizer-reset">
        <button id="customizer-reset-btn" class="btn btn-block btn-outline btn-primary">Reset</button>
    </div>
</div><!-- #app-customizer -->

<!-- SIDE PANEL -->


<!-- build:js <?php echo base_url('assets');?>/js/core.min.js -->
<script src="<?php echo base_url('assets/libs');?>/bower/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url('assets/libs');?>/bower/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url('assets/libs');?>/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
<script src="<?php echo base_url('assets/libs');?>/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
<script src="<?php echo base_url('assets/libs');?>/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="<?php echo base_url('assets/libs');?>/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="<?php echo base_url('assets/libs');?>/bower/PACE/pace.min.js"></script>
<!-- endbuild -->

<!-- build:js <?php echo base_url('assets');?>/js/app.min.js -->
<script src="<?php echo base_url('assets');?>/js/library.js"></script>
<script src="<?php echo base_url('assets');?>/js/plugins.js"></script>
<script src="<?php echo base_url('assets');?>/js/app.js"></script>
<!-- endbuild -->
<script src="<?php echo base_url('assets/libs');?>/bower/moment/moment.js"></script>
<script src="<?php echo base_url('assets/libs');?>/bower/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="<?php echo base_url('assets');?>/js/fullcalendar.js"></script>
</body>
</html>