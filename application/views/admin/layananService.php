<title>Layanan Service</title>

<body>
	<div class="main-wrapper main-wrapper-1">
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
						<h1>Data Layanan Service</h1>
					</div>
					<div class="section-body">
						<div class="container-fluid">
							<div class="card-body">
								<div class="table-responsive">
									<!-- Tabel Layanan Service -->
									<table class="table table-bordered">
										<tr>
											<th>No</th>
											<th>Nama Pelanggan</th>
											<th>Nama Kendaraan</th>
											<th>Plat Nomor</th>
											<th>Tipe Kendaraan</th>
											<!-- <th>Transmisi</th> -->
											<th colspan="3">Aksi</th>
										</tr>
										<?php
										$no = 1;
										foreach ($pelayanan as $layanan) : ?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $layanan->namaPelanggan ?></td>
												<td><?php echo $layanan->namaKendaraan ?></td>
												<td><?php echo $layanan->platNomor ?></td>
												<td><?php echo $layanan->tipeKendaraan ?></td>
												<!-- <td><?php echo $layanan->transmisi ?></td> -->
												<td><?php echo anchor('Service/edit/' . $layanan->idLayanan, ' <div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>') ?>
												</td>
												<td><?php echo anchor('Service/delete/' . $layanan->idLayanan, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
												</td>
											</tr>
										<?php endforeach; ?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
