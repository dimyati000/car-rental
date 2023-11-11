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

<body class="layout-3">
	<div id="app">
		<div class="main-wrapper container">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<a href="<?php echo base_url('/') ?>" class="navbar-brand sidebar-gone-hide">CAR RENTAL</a>

				<form class="form-inline ml-auto">

				</form>
				<ul class="nav navbar-nav navbar-right">
					<?php
					if ($this->session->userdata('username')) { ?>
						<ul class="navbar-nav navbar-right">
							<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
									<img alt="image" src="<?php echo base_url('assets/img/avatar/avatar-1.png') ?>" class="rounded-circle mr-1">
									<div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('username') ?></div>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<!-- <div class="dropdown-title">Logged in 5 min ago</div> -->
									<a href="<?php echo base_url('Profile') ?>" class="dropdown-item has-icon">
                                        <i class="fas fa-user"></i> Profile
                                    </a>
									<div class="dropdown-divider"></div>
									
									<?php echo anchor('auth/logout', '<div class="dropdown-item has-icon">
                                        <i class="fas fa-sign-out"></i> Logout
                                    </div>'); ?>
								</div>
							</li>
						</ul>

					<?php } else { ?>
						<li><?php echo anchor('Login', '<div class="btn btn-md-3 btn-success ml-5">Login</div>') ?></li>
					<?php } ?>
				</ul>
			</nav>

			<nav class="navbar navbar-secondary navbar-expand-lg">
				<div class="container">
					<ul class="navbar-nav navbar-right">
						<!-- <li class="nav-item active"> -->
						<li class="nav-item">
							<a href="<?php echo base_url('Home') ?>" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
						</li>
						<li class="nav-item dropdown">
							<a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Booking Service</span></a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a href="<?php echo base_url('Pelayanan/homeService') ?>" class="nav-link">Home Service</a></li>
								<li class="nav-item"><a href="<?php echo base_url('Pelayanan/dibengkel') ?>" class="nav-link">Service Di bengkel</a></li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-store"></i><span>Belanja</span></a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a href="<?php echo base_url('User') ?>" class="nav-link">SparePart</a></li>
								<li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Kategori</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a href="<?php echo base_url('Kategori/bodyMotor') ?>" class="nav-link">Body Motor</a></li>
										<li class="nav-item"><a href="<?php echo base_url('Kategori/bendaKecil') ?>" class="nav-link">Benda Kecil</a></li>
										<li class="nav-item"><a href="<?php echo base_url('Kategori/mesinMotor') ?>" class="nav-link">Mesin Motor</a></li>
										<li class="nav-item"><a href="<?php echo base_url('Kategori/knalpot') ?>" class="nav-link">Knalpot Motor</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<!-- <li class="nav-item">
							<a href="<?php echo base_url('Home/Perawatan') ?>" class="nav-link"><i class="fas fa-heart"></i><span>Tips Perawatan</span></a>
						</li> -->
						<!-- <li class="nav-item">
							<a href="<?php echo base_url('Home/bantuan') ?>" class="nav-link"><i class="fas fa-info"></i><span>Tentang Kami</span></a>
						</li> -->
					</ul>
				</div>
			</nav>

			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-body">
