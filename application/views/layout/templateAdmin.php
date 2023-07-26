<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/modules/bootstrap-social/bootstrap-social.css ">

  <!-- CSS Libraries -->
  
	<!-- Favicon  -->
  <link rel="icon" href="<?php echo base_url('/assets/img/favicon-carrental.png') ?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/components.css">
  <?php require "vendor/autoload.php"; 
  ?>
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <?php
          if ($this->session->userdata('username')) { ?>
            <ul class="navbar-nav navbar-right">
              <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                  <img alt="image" src="<?php echo base_url() ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                  <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('username') ?></div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                 <!-- <div class="dropdown-title">Logged in 5 min ago</div> -->
									<a href="<?= site_url('Profile') ?>" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <?php echo anchor('auth/logout', '<div class="dropdown-item has-icon">
                          <i class="fas fa-sign-out-alt"></i> Logout
                      </div>'); ?>
                </div>
              </li>
            </ul>

          <?php } else { ?>
            <li><?php echo anchor('auth/login', '<div class="btn btn-md-3 btn-success ml-5">Login</div>') ?></li>
          <?php } ?>

        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url('/') ?>">EVANO TRANS</a>
          </div>
          <!-- <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url('/') ?>">BAM</a>
          </div> -->
          <ul class="sidebar-menu">
            <li class="menu-header">MENU</li>
            <li class="active"><a class="nav-link" href="<?php echo base_url('Dashboard') ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Master Data</li>
            <li><a class="nav-link" href="<?php echo base_url('Pelanggan') ?>"><i class="fas fa-user"></i> <span>Pelanggan</span></a></li>
            <li><a class="nav-link" href="<?php echo base_url('Mobil') ?>"><i class="fas fa-car"></i> <span>Mobil</span></a></li>
            <li><a class="nav-link" href="<?php echo base_url('Jaminan') ?>"><i class="fas fa-clipboard-check"></i> <span>Jaminan</span></a></li>
            <li class="menu-header">Transaksi</li>
            <li><a class="nav-link" href="<?php echo base_url('FormSewa') ?>"><i class="far fa-file-alt"></i> <span>Form Sewa</span></a></li>
            <li><a class="nav-link" href="<?php echo base_url('DaftarSewa') ?>"><i class="fas fa-car"></i> <span>Daftar Sewa</span></a></li>
            <li class="menu-header">Laporan</li>
            <li><a class="nav-link" href="<?php echo base_url('Dashboard') ?>"><i class="fas fa-file"></i> <span>Laporan Transaksi</span></a></li>
            <!-- <li><a href="<?php echo base_url() . 'Tentang'?>"><i class="fas fa-cog"></i><span>Setting</span></a></li> -->
          </ul>
        </aside>
      </div>
    </div>
  </div>
</body>

  <!-- General JS Scripts -->
  <script src="<?php echo base_url() ?>assets/modules/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/modules/popper.js"></script>
  <script src="<?php echo base_url() ?>assets/modules/tooltip.js"></script>
  <script src="<?php echo base_url() ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url() ?>assets/modules/moment.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?php echo base_url() ?>assets/modules/prism/prism.js"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url() ?>assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url() ?>assets/js/page/components-table.js"></script>

</html><!-- Begin Page Content -->
