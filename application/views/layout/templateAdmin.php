<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  
	<!-- Favicon  -->
  <link rel="icon" href="<?php echo base_url('/assets/img/favicon-carrental.png') ?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <!-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> -->
          </ul>
          <!-- <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
          </div> -->
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
            <a href="<?php echo base_url('/') ?>">CAR RENTAL</a>
          </div>
          <!-- <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url('/') ?>">BAM</a>
          </div> -->
          <ul class="sidebar-menu">
            <li class="menu-header">MENU</li>
            <li class="active"><a class="nav-link" href="<?php echo base_url('Dashboard') ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Master</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url('Service')?>">Layanan Service</a></li>
                <li><a class="nav-link" href="<?php echo base_url('DataBarang') ?>">Spare Part </a></li>
                <li><a class="nav-link" href="<?php echo base_url('Transaksi')?>">Invoice</a></li>
                <li><a class="nav-link" href="<?php echo base_url('Pesan')?>">Penjadwalan</a></li>
                <!-- <li><a class="nav-link" href="<?php echo base_url('Laporan')?>">Laporan</a></li> -->
                <li><a class="nav-link" href="<?php echo base_url('Service/BookingService')?>">Verifikasi Booking</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-store"></i> <span>Kasir</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url('Kasir')?>">Menu Kasir</a></li>
                <li><a class="nav-link" href="<?php echo base_url('Kasir/data')?>">Data Kasir</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file"></i> <span>Laporan</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url('Laporan/laporan_pelayanan')?>">Laporan Pelayanan</a></li>
                <li><a class="nav-link" href="<?php echo base_url('Laporan/laporan_penjualan')?>">Laporan Penjualan</a></li>
              </ul>
            </li>
            <!-- <li><a href="<?php echo base_url() . 'Tentang'?>"><i class="fas fa-cog"></i><span>Setting</span></a></li> -->
          </ul>
        </aside>
      </div>
    </div>
    
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url() ?>assets/js/custom.js"></script>

  <script src="<?php echo base_url() ?>assets/js/page/components-table.js"></script>
  <!-- Page Specific JS File -->
</body>

</html><!-- Begin Page Content -->
