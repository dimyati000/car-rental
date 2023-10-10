<title>Dashboard</title>

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-user"></i>
					</div>
					<!-- Data Dashboard -->
					<a href="<?php echo base_url('Kasir/data') ?>" class="text-decoration-none">
						<div class="card-wrap">
							<div class="card-header">
								<h4>Total Pelanggan</h4>
							</div>
							<div class="card-body">
								<?php echo number_format($totalK);?>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="far fa-newspaper"></i>
					</div>
					<a href="<?php echo base_url('Service') ?>" class="text-decoration-none">
						<div class="card-wrap">
							<div class="card-header">
								<h4>Total Transaski</h4>
							</div>
							<div class="card-body">
								<?php echo $totalL;?>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-car"></i>
					</div>
					<a href="<?php echo base_url('Transaksi') ?>" class="text-decoration-none">
						<div class="card-wrap">
							<div class="card-header">
								<h4>Total Mobil</h4>
							</div>
							<div class="card-body">
								<?php echo $totalS;?>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="fas fa-check"></i>
					</div>
					<a href="<?php echo base_url('DataBarang') ?>" class="text-decoration-none">
						<div class="card-wrap">
							<div class="card-header">
								<h4>Total Mobil Ready</h4>
							</div>
							<div class="card-body">
								<?php echo $totalSt;?>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>

		<!-- Dashboard Bawah -->
		<!-- <div class="card">
			<div class="card-body">
				<h5>Penjualan Sparepart</h5>
				<h6>Bulan Ini</h6>
				<div class="progress mb-3">
					<div class="progress-bar" role="progressbar" data-width="<?php echo $totalS?>%" aria-valuenow="<?php echo $totalS?>" aria-valuemin="0" aria-valuemax="100"><?php echo $totalS;?> Terjual</div>
				</div>
				<h6>Tahun Ini</h6>
				<div class="progress mb-3">
					<div class="progress-bar" role="progressbar" data-width="<?php echo $totalS?>%" aria-valuenow="<?php echo $totalS?>" aria-valuemin="0" aria-valuemax="100"><?php echo $totalS?> Terjual</div>
				</div>
				
				<h5>Jasa Servis</h5>
				<h6>Bulan Ini</h6>
				<div class="progress mb-3">
					<div class="progress-bar" role="progressbar" data-width="<?php echo $totalL ?>%" aria-valuenow="<?php echo $totalL ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $totalL ?> Servis</div>
				</div>
				<h6>Tahun Ini</h6>
				<div class="progress mb-3">
					<div class="progress-bar" role="progressbar" data-width="<?php echo $totalL?>%" aria-valuenow="<?php echo $totalL?>" aria-valuemin="0" aria-valuemax="100"><?php echo $totalL?> Servis</div>
				</div>
			</div>
		</div> -->
</div>
