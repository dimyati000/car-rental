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
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/chocolat/dist/css/chocolat.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/prism/prism.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/dropzonejs/dropzone.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/codemirror/lib/codemirror.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/codemirror/theme/duotone-dark.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/izitoast/css/iziToast.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
  
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
                  <img alt="image" src="<?php echo base_url() ?>assets/img/avatar/avatar-3.png" class="rounded-circle mr-1">
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
            <li><a class="nav-link" href="<?php echo base_url('Laporan/laporan_pelayanan') ?>"><i class="fas fa-file"></i> <span>Laporan Transaksi</span></a></li>
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
  <script src="<?php echo base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/prism/prism.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/sticky-kit.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/dropzonejs/min/dropzone.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.indonesia.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/cleave-js/dist/cleave.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/codemirror/lib/codemirror.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/codemirror/mode/javascript/javascript.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyB55Np3_WsZwUQ9NS7DP-HnneleZLYZDNw&amp;sensor=true"></script>
  <script src="<?php echo base_url(); ?>assets/modules/gmaps.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/fullcalendar/fullcalendar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/izitoast/js/iziToast.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/izitoast/js/iziToast.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.indonesia.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/codemirror/lib/codemirror.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/codemirror/mode/javascript/javascript.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyB55Np3_WsZwUQ9NS7DP-HnneleZLYZDNw&amp;sensor=true"></script>
  <script src="<?php echo base_url(); ?>assets/modules/gmaps.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>assets/js/page/index.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/index-0.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/bootstrap-modal.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/components-chat-box.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/components-multiple-upload.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/components-statistic.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/components-table.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/components-user.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/forms-advanced-forms.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/gmaps-advanced-route.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/gmaps-draggable-marker.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/gmaps-geocoding.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/gmaps-geolocation.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/gmaps-marker.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/gmaps-multiple-marker.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/gmaps-route.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/gmaps-simple.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/modules-calendar.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/modules-chartjs.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/modules-datatables.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/modules-ion-icons.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/modules-slider.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/modules-sparkline.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/modules-sweetalert.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/modules-toastr.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/modules-vector-map.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/auth-register.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/features-post-create.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/features-posts.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/features-setting-detail.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/utilities-contact.js"></script>
  
  <!-- Template JS File -->
  <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url() ?>assets/js/custom.js"></script>


</html><!-- Begin Page Content -->
