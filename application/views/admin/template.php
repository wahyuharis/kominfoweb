<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= "ADMIN " . NAMA_APLIKASI ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>lte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>lte/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>lte/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>lte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url() ?>lte/dist/css/skins/_all-skins.min.css">

    <?php if (isset($css_files)) : ?>
        <?php foreach ($css_files as $file) : ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
    <?php endif; ?>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- jQuery 3 -->
    <script src="<?= base_url() ?>lte/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>node_modules/slugify/slugify.js"></script>

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url() ?>lte/index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>K</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b><?= "ADMIN " . NAMA_APLIKASI ?></b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url() ?>lte/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $this->session->userdata('fullname') ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url() ?>lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        Diskominfo Jember - <?= $this->session->userdata('user_level') ?>
                                        <small><?= $this->session->userdata('email') ?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <!-- <a href="#">Followers</a> -->
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#"><?= $this->session->userdata('fullname') ?></a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <!-- <a href="#">Friends</a> -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->

                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #141313;">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url() ?>lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $this->session->userdata('fullname') ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" id="side_filter" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="<?php if (strtolower($this->uri->segment(2)) == 'home' || strtolower($this->uri->segment(1)) == '') echo 'active' ?>"><a href="<?= base_url() ?>admin/home">
                            <i class="fa fa-home"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <!-- Start Menu -->
                    <!-- User -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cog"></i>
                            <span>User</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php if (strtolower($this->uri->segment(2)) == 'user') echo 'active' ?>">
                                <a href="<?= base_url() ?>admin/user"><i class="fa fa-user-plus"></i> User</a>
                            </li>
                            <li class="<?php if (strtolower($this->uri->segment(2)) == 'user_level') echo 'active' ?>">
                                <a href="<?= base_url() ?>admin/user_level"><i class="fa fa-users"></i> User Level</a>
                            </li>
                        </ul>
                    </li>
                    <!-- End User -->


                    <!-- Profil -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Profil</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php if (strtolower($this->uri->segment(1)) == 'penghargaan') echo 'active' ?>"><a href="<?= base_url() ?>admin/Penghargaan"><i class="fa fa-circle-o"></i> Penghargaan</a></li>
                            <li class="<?php if (strtolower($this->uri->segment(1)) == 'struktur_organisasi') echo 'active' ?>"><a href="<?= base_url() ?>admin/Struktur_Organisasi"><i class="fa fa-circle-o"></i> Struktur Organisasi</a></li>
                            <li class="<?php if (strtolower($this->uri->segment(1)) == 'sejarah_dinas') echo 'active' ?>"><a href="<?= base_url() ?>admin/Sejarah_Dinas"><i class="fa fa-circle-o"></i> Sejarah Dinas</a></li>
                            <li class="<?php if (strtolower($this->uri->segment(1)) == 'visi_misi') echo 'active' ?>"><a href="<?= base_url() ?>admin/Visi_Misi"><i class="fa fa-circle-o"></i> Visi Dan Misi</a></li>
                            <li class="<?php if (strtolower($this->uri->segment(1)) == 'tupoksi') echo 'active' ?>"><a href="<?= base_url() ?>admin/Tupoksi"><i class="fa fa-circle-o"></i> Tugas Dan Fungsi</a></li>
                            <li class="<?php if (strtolower($this->uri->segment(1)) == 'personil') echo 'active' ?>"><a href="<?= base_url() ?>admin/Personil"><i class="fa fa-circle-o"></i> Personil Diskominfo</a></li>
                        </ul>
                    </li>
                    <!-- End Profil -->

                    <!-- Regulasi -->
                    <li class="<?php if (strtolower($this->uri->segment(2)) == 'regulasi') echo 'active' ?>"><a href="<?= base_url() ?>admin/Regulasi">
                            <i class="fa fa-book"></i>
                            <span>Regulasi</span>
                            <!-- <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span> -->
                        </a>
                    </li>
                    <!-- <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Undang-Undang</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Peraturan Presiden</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Peraturan Menteri</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Peraturan Gubernur</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Peraturan Bupati</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Peraturan Daerah</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> SK Bupati</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> SE Presiden</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> SE Gubernur</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> SE Bupati</a></li>
                        </ul> -->

                    <!-- End Regulasi -->

                    <!-- Informasi -->
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Informasi</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php if (strtolower($this->uri->segment(2)) == 'blog') echo 'active' ?>"><a href="<?= base_url() ?>admin/blog"><i class="fa fa-circle-o"></i> Blog Dan Berita</a></li>
                            <!-- <li class="treeview">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Taulah Apalah</a></li> -->
                    </li>
                </ul>
                <!-- End Informasi -->

                <!-- Agenda -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Agenda</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>

                </li>
                <!-- End Agenda -->

                <!-- Slider -->
                <li class="<?php if (strtolower($this->uri->segment(2)) == 'slider') echo 'active' ?>"><a href="<?= base_url() ?>admin/slider">
                        <i class="fa fa-slideshare"></i> <span>Slider</span>
                        <span class="pull-right-container">
                            <!-- <i class="fa fa-angle-left pull-right"></i> -->
                        </span>
                    </a>
                </li>
                <!-- End Slider -->

                <li class="<?php if (strtolower($this->uri->segment(2)) == 'galery') echo 'active' ?>"><a href="<?= base_url() ?>admin/galery">
                        <i class="fa fa-folder"></i> <span>Gallery</span>
                    </a>
                </li>




                <!-- LInk Terkait -->
                <li class="<?php if (strtolower($this->uri->segment(2)) == 'link') echo 'active' ?>"><a href="<?= base_url() ?>admin/link">
                        <i class="fa fa-link"></i> <span>Link Terkait</span>
                    </a>
                </li>
                <!-- End Link Terkait -->

                <!-- Setting -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cogs"></i> <span>Setting</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if (strtolower($this->uri->segment(2)) == 'header') echo 'active' ?>">
                            <a href="<?= base_url('admin/header/') ?>">
                                <i class="fa fa-circle-o"></i>
                                Header
                            </a>
                        </li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Footer</a></li>
                    </ul>
                </li>
                <!-- End Setting -->


                <!-- Download -->
                <li class="<?php if (strtolower($this->uri->segment(2)) == 'download') echo 'active' ?>"><a href="<?= base_url() ?>admin/download">
                        <i class="fa fa-download"></i> <span>Download</span>
                        <span class="pull-right-container">
                            <!-- <i class="fa fa-angle-left pull-right"></i> -->
                        </span>
                    </a>

                </li>
                <!-- End Download -->

                <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?= $content_title ?>
                    <small><?= $content_title ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content" style="min-height: 1000px">
                <?php
                $box2 = true;
                if (isset($box)) {
                    $box2 = $box;
                }
                ?>
                <?php if ($box2) { ?>
                    <div class="box">
                        <div class="box-body">
                            <?= $content ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <?= $content ?>
                <?php } ?>


            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Tim IT Diskominfo Kab.Jember</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->


    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url() ?>lte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url() ?>lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url() ?>lte/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>lte/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <?php if (isset($css_files)) : ?>
        <?php foreach ($js_files as $file) : ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>

    <script src="<?= base_url() ?>lte/dist/js/demo.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidebar-menu').tree();
            $('.sidebar-menu').find('li.active').parent().css('display', 'block');
            $('.sidebar-menu').find('li.active').parent().parent().addClass('active');

            $("#side_filter").keyup(function() {
                var filter = $(this).val(),
                    count = 0;

                $('.sidebar-menu').find('li').each(function() {
                    if (filter == "") {
                        $(this).css("visibility", "visible");
                        $(this).fadeIn();
                    } else if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                        $(this).css("visibility", "hidden");
                        $(this).fadeOut();
                    } else {
                        $(this).css("visibility", "visible");
                        $(this).fadeIn();
                    }
                });
            });
        })
    </script>
</body>

</html>