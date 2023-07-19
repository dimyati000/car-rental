<title>Booking Service</title>
<div class="main-content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="card shadow-lg border-0 rounded-lg mt-5">
				<section class="section">
					<div class="section-header">
						<h1>Booking Service</h1>
					</div>
					<div class="section-body">
						<div class="container-fluid">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered">
										<!-- Ngambil Data Home Service -->
										<tr>
											<th>No</th>
											<th>Nama Pelanggan</th>
											<th>Plat Nomor</th>
											<th>Alamat</th>
											<th>Tanggal Booking</th>
											<th>Verifikasi</th>
											<th colspan="3">Aksi</th>
										</tr>
										<?php
										$no = 1;
										foreach ($pelayanan as $layanan) : ?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $layanan->namaPelanggan ?></td>
												<td><?php echo $layanan->platNomor ?></td>
												<td><?php echo $layanan->alamat ?></td>
												<td><?php echo format_date($layanan->tanggalPemesanan, 'd-m-Y') ?></td>
												<td><?php echo $layanan->verifikasi?></td>
												<td>
												<?php echo anchor('Service/proses/' . $layanan->idLayanan, ' <div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>') ?>
												</td>
												<td>
													<?php echo anchor('Service/detailBooking/' . $layanan->idLayanan, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?>

												</td>
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

