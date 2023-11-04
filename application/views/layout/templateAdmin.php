<?php $this->load->view('layout/headTemplateAdmin.php'); ?>

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
          if ($this->session->userdata('namaUser')) { ?>
            <ul class="navbar-nav navbar-right">
              <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                  <img alt="image" src="<?php echo base_url() ?>assets/img/avatar/avatar-3.png" class="rounded-circle mr-1">
                  <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('namaUser') ?></div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                 <!-- <div class="dropdown-title">Logged in 5 min ago</div>
				    <a href="<?= site_url('Profile') ?>" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Profile
                    </a>
                  <div class="dropdown-divider"></div>  -->
                  <?php echo anchor('auth/logout', '<div class="dropdown-item">
                        <i class="fas fa-sign-out-alt">&nbsp&nbspLogout</i>
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
            <li><a class="nav-link" href="<?php echo base_url('Jaminan') ?>"><i class="fas fa-thumbtack"></i> <span>Jaminan</span></a></li>
            <li class="menu-header">Transaksi</li>
            <li><a class="nav-link" href="<?php echo base_url('FormSewa') ?>"><i class="fas fa-file"></i> <span>Form Sewa</span></a></li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-clipboard-check"></i> <span>Daftar Sewa</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url('DaftarSewa/penumpang') ?>"><i class="fas fa-car-side"></i> <span>Sewa Penumpang</span></a></li>
                <li><a class="nav-link" href="<?php echo base_url('DaftarSewa/barang') ?>"><i class="fas fa-truck"></i> <span>Sewa Barang</span></a></li>
              </ul>
            </li>
            <!-- <li class="menu-header">Laporan</li>
            <li><a class="nav-link" href="<?php echo base_url('Laporan/laporan_pelayanan') ?>"><i class="fas fa-archive"></i> <span>Laporan Transaksi</span></a></li> -->
            <!-- <li><a href="<?php echo base_url() . 'Tentang'?>"><i class="fas fa-cog"></i><span>Setting</span></a></li> -->
          </ul>
        </aside>
      </div>
    </div>
  </div>
</body>

<?php $this->load->view('layout/jsTemplateAdmin.php'); ?>

