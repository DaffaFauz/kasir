<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Kasir | <?= $title ?></title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-select.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/scss/style.css">
    <link href="<?= base_url() ?>assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <?= $this->renderSection('css') ?>



    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/dashboard"><b>E-</b>Kasir
                </a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="<?= ($menu == 'Dashboard') ? 'active' : '' ?>">
                        <a href="/dashboard"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="<?= ($menu == 'Penjualan') ? 'active' : '' ?>">
                        <a href="/penjualan"> <i class="menu-icon fa fa-bar-chart"></i>Penjualan </a>
                    </li>

                    <li class="menu-item-has-children dropdown <?= ($menu == 'MasterData') ? 'active' : '' ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>MasterData</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li class="<?= ($submenu == 'Produk') ? 'active' : '' ?>"><i class="fa fa-puzzle-piece"></i><a href="/produk">Barang</a></li>
                            <li class="<?= ($submenu == 'Kategori') ? 'active' : '' ?>"><i class="fa fa-puzzle-piece"></i><a href="/kategori">Kategori</a></li>
                            <li class="<?= ($submenu == 'Satuan') ? 'active' : '' ?>"><i class="fa fa-puzzle-piece"></i><a href="/satuan">Satuan</a></li>
                            <li class="<?= ($submenu == 'User') ? 'active' : '' ?>"><i class="fa fa-puzzle-piece"></i><a href="/user">User</a></li>
                        </ul>
                    <li class="menu-item-has-children dropdown <?= ($menu == 'Laporan') ? 'active' : '' ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Laporan</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li class="<?= ($submenu == 'Laporan Harian') ? 'active' : '' ?>"><i class="fa fa-puzzle-piece"></i><a href="/laporan/harian">Harian</a></li>
                            <li class="<?= ($submenu == 'Laporan Bulanan') ? 'active' : '' ?>"><i class="fa fa-puzzle-piece"></i><a href="/laporan/bulanan">Bulanan</a></li>
                            <li class="<?= ($submenu == 'Laporan Tahunan') ? 'active' : '' ?>"><i class="fa fa-puzzle-piece"></i><a href="/laporan/tahunan">Tahunan</a></li>
                        </ul>
                    </li>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?= base_url() ?>images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>

                            <a class="nav-link" href="/setting"><i class="fa fa-cog"></i> Settings</a>

                            <a class="nav-link" href="/logout"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?= $title ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <?php if ($menu == 'Dashboard') { ?>
                                <li class="active">Dashboard</li>
                            <?php } else if ($menu == 'Setting') { ?>
                                <li><a href="/dashboard">Dashboard</a></li>
                                <li class="active"><?= $menu ?></li>
                            <?php } else { ?>
                                <li><a href="/dashboard">Dashboard</a></li>
                                <li><a href=""><?= $menu ?></a></li>
                                <li class="active"><?= $submenu ?></li>
                            <?php } ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <?= $this->renderSection('content') ?>
        </div> <!-- .content -->


        <!-- Right Panel -->

        <script src="<?= base_url() ?>assets/js/vendor/jquery-2.1.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
        <script src="<?= base_url() ?>assets/js/plugins.js"></script>
        <script src="<?= base_url() ?>assets/js/main.js"></script>

        <?= $this->renderSection('js') ?>

</body>

</html>