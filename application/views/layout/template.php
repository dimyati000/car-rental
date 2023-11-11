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
				<form class="form-inline mr-auto" method="post" action="<?php echo base_url('User') ?>">
					<ul class="navbar-nav mr-3">
						<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
						<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
					</ul>
					<!-- <div class="search-element">
						<input class="form-control" type="search" placeholder="Search" aria-label="Search" name="keyword" autocomplete="off" data-width="250">
						<input class="btn" type="submit" name="input" value="Cari"></input>
						<div class="search-backdrop"></div>
					</div> -->
				</form>
				<ul class="navbar-nav navbar-right">
					<li>
						<i class="fa-solid fa-cart-shopping"></i>
					</li>
					<li>
						<?php
						$keranjang = '<div class="btn btn-sm btn-info">
            <svg xmlns="http://www.w3.org/2000/svg" style="width:20px;height:20px;" viewBox="0 0 576 512">
              <path fill="#ffffff" d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z" />
            </svg>
              <span class="badge rounded-pill badge-notification bg-danger">' . $this->cart->total_items() . '</span>
              </div>'
						?>
						<?php echo anchor('User/detailKeranjang', $keranjang) ?>
					</li>

				</ul>
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
									<a href="<?= site_url('Profile') ?>" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                  </a>

									<div class="dropdown-divider"></div>
									<?php echo anchor('auth/logout', '<div class="dropdown-item has-icon">
                                        <i class="fa fa-sign-out-alt"></i> Logout
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
						<a href="index.html">BAM</a>
					</div> -->
					<ul class="sidebar-menu">
						<li class="menu-header">Menu</li>
						<li><a class="nav-link" href="<?php echo base_url('Home') ?>"><i class="fas fa-home"></i> <span>Home</span></a></li>
						<li class="nav-item dropdown">
							<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-fire"></i> <span>Service</span></a>
							<ul class="dropdown-menu">
								<li><a class="nav-link" href="<?php echo base_url('Pelayanan/homeService') ?>">Home Service</a></li>
								<li><a class="nav-link" href="<?php echo base_url('Pelayanan/dibengkel') ?>">Service Di bengkel</a></li>
							</ul>
						</li>
						<li><a class="nav-link" href="<?php echo base_url('User') ?>"><i class="fas fa-box"></i> <span>Produk</span></a></li>
						<li class="nav-item dropdown">
							<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-filter"></i> <span>Kategori</span></a>
							<ul class="dropdown-menu">
								<li><a class="nav-link" href="<?php echo base_url('Kategori/knalpot') ?>">Knalpot Motor</a></li>
								<li><a class="nav-link" href="<?php echo base_url('Kategori/mesinMotor') ?>">Mesin Motor</a></li>
								<li><a class="nav-link" href="<?php echo base_url('Kategori/bodyMotor') ?>">Body Motor</a></li>
								<li><a class="nav-link" href="<?php echo base_url('Kategori/bendaKecil') ?>">Benda Kecil</a></li>
							</ul>
						</li>
						<!-- <li><a class="nav-link" href="<?php echo base_url('Home/tipsRawat') ?>"><i class="fas fa-heart"></i> <span>Tips Perawatan</span></a></li> -->
						<!-- <li><a class="nav-link" href="<?php echo base_url('Home/bantuan') ?>"><i class="fas fa-info"></i> <span>Bantuan</span></a></li> -->
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
	<script>
		if (window.history.replaceState) {
			window.history.replaceState(null, null, window.location.href);
		}
	</script>
	<!-- Page Specific JS File -->
</body>

</html>
