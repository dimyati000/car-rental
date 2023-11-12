<title><?= $title ?></title>

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<a href="<?php echo base_url('Pelanggan') ?>" class="text-decoration-none">
					<div class="card card-statistic-1">
						<div class="card-icon bg-primary">
							<i class="far fa-user"></i>
						</div>
						<!-- Data Dashboard -->
						<div class="card-wrap">
							<div class="card-header">
								<h4>Pelanggan</h4>
							</div>
							<div class="card-body">
								<h3><?php echo number_format($totalP);?></h3>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<a href="<?php echo base_url('FormSewa') ?>" class="text-decoration-none">
					<div class="card card-statistic-1">
						<div class="card-icon bg-danger">
							<i class="fas fa-car"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Mobil</h4>
							</div>
							<div class="card-body">
								<h3><?php echo $totalM;?></h3>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<a href="<?php echo base_url('DaftarSewa/penumpang') ?>" class="text-decoration-none">
					<div class="card card-statistic-1">
						<div class="card-icon bg-warning">
							<i class="fas fa-car-side"></i>
						</div>
						<div class="card-header">
							<h4>Sewa Penumpang</h4>
						</div>
						<div class="card-wrap">
							<div class="card-body">
								<h3><?php echo $totalSewaP;?></h3>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<a href="<?php echo base_url('DaftarSewa/barang') ?>" class="text-decoration-none">
					<div class="card card-statistic-1">
						<div class="card-icon bg-success">
							<i class="fas fa-truck"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Sewa Barang</h4>
							</div>
							<div class="card-body">
								<h3><?php echo $totalSewaB;?></h3>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</section>
</div>