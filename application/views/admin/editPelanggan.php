<title>Edit Data Pelanggan</title>

<body>
	<div class="main-wrapper">
		<!-- Main Content -->
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Pelanggan</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?= site_url('Dashboard') ?>">Dashboard</a></div>
						<div class="breadcrumb-item">Pelanggan</div>
					</div>
				</div>

<!-- <div class="main-content"> -->
	<div class="container">
		<!-- <div class="row justify-content-center"> -->
				<div class="card shadow-lg border-0 rounded-lg mt-50">
					<section class="section">
						<div class="section-header">
							<h1>Edit Data Pelanggan</h1>
						</div>
						<div class="section-body">
							<div class="container-fluid">
								<!-- Form Edit Layanan -->
								<?php foreach ($pelanggan as $pelanggan) : ?>
								<form action="<?php echo base_url() . 'Pelanggan/update' ?>" method="post" autocomplete="off">
									<div class="form-group">
										<label>NIK</label>
										<input type="text" name="nik" class="form-control"
											value="<?php echo $pelanggan->nik ?>">
									</div>
									<div class="form-group">
										<label>Nama Pelanggan</label>
										<input type="text" name="namaPelanggan" class="form-control"
											value="<?php echo $pelanggan->namaPelanggan ?>">
									</div>
									<div class="form-group">
										<label>No Telp</label>
										<input type="text" name="noTelp" class="form-control"
											value="<?php echo $pelanggan->noTelp ?>">
									</div>
									<div class="form-group">
										<label>Alamat</label>
										<input type="text" name="alamat" class="form-control"
											value="<?php echo $pelanggan->alamat ?>">
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
