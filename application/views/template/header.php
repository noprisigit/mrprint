<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>mr.perint | <?= $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .error {
            color: 'red';
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand <?php if ($this->session->userdata('status_access') == "owner") : ?> navbar-navy navbar-dark <?php else : ?>  navbar-orange navbar-light <?php endif; ?>">
            <!-- Left navbar links -->
            <!-- <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul> -->

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" data-toggle="dropdown" href="#">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <?php if($this->session->userdata('status_access') == "partner") : ?>
                        <div class="dropdown-divider"></div>    
                        <a href="<?= base_url('partner/profile'); ?>" class="dropdown-item">
                            <i class="fas fa-id-badge mr-2"></i> Profile
                        </a>
                        <?php endif; ?>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">
                            <i class="fas fa-power-off mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar <?php if ($this->session->userdata('status_access') == "owner") : ?> sidebar-light-navy <?php else : ?>  sidebar-light-orange <?php endif; ?> elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link text-center <?php if ($this->session->userdata('status_access') == "owner") : ?> navbar-navy <?php else : ?>  navbar-orange <?php endif; ?>">
                <img src="<?= base_url('assets/'); ?>dist/img/logo-printer.png" alt="Mrprint Logo" class="img-circle elevation-3" width="130px" height="130px" style="opacity: .8">
                <!-- <span class="brand-text font-weight-light text-white">mr.perint</span> -->
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <!-- <div class="image">
                        <img src="<?= base_url('assets/'); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div> -->
                    <div class="info">
                        <a href="#" class="d-block">Hello, <?= $this->session->userdata('full_name'); ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <?php if ($this->session->userdata('status_access') == 'owner') : ?>
                            <li class="nav-item">
                                <a href="<?= base_url('owner') ?>" class="nav-link <?= $title == "Home" ? 'active text-white' : ''; ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Home
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('owner/users') ?>" class="nav-link <?= $title == "Users" ? 'active text-white' : ''; ?>">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Users
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('owner/print-shop') ?>" class="nav-link <?= $title == "Print Shop" ? 'active text-white' : ''; ?>">
                                    <i class="nav-icon fas fa-store-alt"></i>
                                    <p>
                                        Print Shop
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('owner/verify-transaction') ?>" class="nav-link <?= $title == "Verify Transaction" ? 'active text-white' : ''; ?>">
                                    <i class="nav-icon far fa-credit-card"></i>
                                    <p>
                                        Verify Transaction
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('owner/transactions') ?>" class="nav-link <?= $title == "Transactions" ? 'active text-white' : ''; ?>">
                                    <i class="nav-icon fas fa-dollar-sign"></i>
                                    <p>
                                        Transactions
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('owner/master-daerah') ?>" class="nav-link <?= $title == "Transactions" ? 'active text-white' : ''; ?>">
                                    <i class="nav-icon fas fa-location-arrow"></i>
                                    <p>
                                        Master Lokasi
                                    </p>
                                </a>
                            </li>
                        <?php elseif ($this->session->userdata('status_access') == 'partner') : ?>
                            <li class="nav-item">
                                <a href="<?= base_url('partner') ?>" class="nav-link <?= ($title == "Home" or $title == "Profile") ? 'active text-white' : ''; ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Home
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('partner/transactions') ?>" class="nav-link <?= $title == "Transactions" ? 'active text-white' : ''; ?>">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Transactions
                                    </p>
                                </a>
                            </li>
                        <?php elseif ($this->session->userdata('status_access') == 'customer') : ?>
                            <li class="nav-item">
                                <a href="<?= base_url('customer') ?>" class="nav-link <?= ($title == "Home" or $title == "Printing") ? 'active text-white' : ''; ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Home
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('customer/transactions') ?>" class="nav-link <?= $title == "Transactions" ? 'active text-white' : ''; ?>">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Transactions
                                    </p>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= $title; ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"><?= $access; ?></a></li>
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>