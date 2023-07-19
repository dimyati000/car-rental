<title>Edit Data Layanan Service</title>

<body>
	<div class="main-wrapper">
		<!-- Main Content -->
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Layanan Service</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?= site_url('Dashboard') ?>">Dashboard</a></div>
						<div class="breadcrumb-item">Layanan Service</div>
					</div>
				</div>

<!-- <div class="main-content"> -->
	<div class="container">
		<!-- <div class="row justify-content-center"> -->
				<div class="card shadow-lg border-0 rounded-lg mt-50">
					<section class="section">
						<div class="section-header">
							<h1>Edit Data Layanan Service</h1>
						</div>
						<div class="section-body">
							<div class="container-fluid">
								<!-- Form Edit Layanan -->
								<?php foreach ($pelayanan as $layanan) : ?>
								<form action="<?php echo base_url() . 'Service/update' ?>" method="post" autocomplete="off">
									<div class="form-group">
										<label>Nama Pelanggan</label>
										<input type="text" name="namaPelanggan" class="form-control"
											value="<?php echo $layanan->namaPelanggan ?>">
									</div>
									<div class="form-group">
										<label>Tipe Kendaraan</label>
										<input type="text" name="tipeKendaraan" class="form-control"
											value="<?php echo $layanan->tipeKendaraan ?>">
									</div>
									<div class="form-group">
										<label>Merk Kendaraan</label>
										<input type="text" name="merkKendaraan" class="form-control"
											value="<?php echo $layanan->merkKendaraan ?>">
										<input type="hidden" name="idLayanan" class="form-control"
											value="<?php echo $layanan->idLayanan ?>">
									</div>
									<div class="form-group">
										<label>Nama Kendaraan</label>
										<input type="text" name="namaKendaraan" class="form-control"
											value="<?php echo $layanan->namaKendaraan ?>">
									</div>
									<div class="form-group">
										<label>Warna</label>
										<input type="text" name="warna" class="form-control" value="<?php echo $layanan->warna ?>">
									</div>
									<!-- <div class="form-group">
										<label>Jenis Transmisi</label>
										<input type="text" name="transmisi" class="form-control" value="<?php echo $layanan->transmisi ?>">
									</div>
									<div class="form-group">
										<label>Jenis Bensin</label>
										<input type="text" name="jenisBensin" class="form-control"
											value="<?php echo $layanan->jenisBensin ?>">
									</div> -->
									<div class="form-group">
										<label>Plat Nomor</label>
										<input type="text" name="platNomor" class="form-control" value="<?php echo $layanan->platNomor ?>">
									</div>
									<button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
									<br>
									<br>
									<br>
								</form>
								<?php endforeach; ?>
							</div>
						</div>
					</section>
				</div>
		</div>
	</div>
