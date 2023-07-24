
<body>
	<div class="main-wrapper main-wrapper-1">
		<!-- Main Content -->
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Master Data Mobil</h1>
				</div>
			<div class="card shadow-lg border-0 rounded-lg mt-50">
				<div class="section-body">
					<div class="card-header">
						<h5>Data Mobil</h5>
					</div>
					<div class="section-body">
						<div class="container-fluid">
							<button class="btn btn-success btn-sm ml-2" data-toggle="modal" data-target="#tambahMobil"><i class="fas fa-plus fa-sm"> Tambah Data</i></button>
							<div class="card-body">
								<div class="table-responsive">
									<!-- Tabel Data Mobil -->
									<table class="table table-bordered">
										<tr>
											<th>No</th>
											<th>Nama Mobil</th>
											<th>Merk</th>
											<th>No Plat</th>
											<th>Tahun</th>
											<th>Harga</th>
											<th>Bahan Bakar</th>
											<th>Warna</th>
											<th>Denda</th>
											<th>Seat</th>
											<th>Status Tersedia</th>
											<th class="text-center" colspan="2">Aksi</th>
										</tr>
										<?php
										$no = 1;
										foreach ($jaminan as $j) : ?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $j->namaJaminan ?></td>
												<td><?php echo anchor('Jaminan/edit/' . $j->idJaminan, ' <div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit Data</div>') ?>
												</td>
												<td><?php echo anchor('Jaminan/delete/' . $j->idJaminan, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Hapus Data</div>') ?>
												</td>
											</tr>
										<?php endforeach; ?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Tambah Data Mobil -->
<div class="modal fade" id="tambahPelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php
					use Ramsey\Uuid\Uuid;
					$uuid = Uuid::uuid4();
					?>
				<form method="POST" action="<?php echo base_url() . 'Pelanggan/tambahData'; ?>"
					enctype="multipart/form-data" autocomplete="off">
					<input type="hidden" class="form-control" name="idPelanggan" value="<?= $uuid ?>"></input>
					<div class="form-group">
						<label>Nama Mobil</label>
						<input type="text" name="nik" class="form-control">
					</div>
					<div class="form-group">
						<label>Merk Mobil</label>
						<input type="text" name="namaPelanggan" class="form-control">
					</div>
					<div class="form-group">
						<label>No Plat</label>
						<input type="text" name="noTelp" class="form-control">
					</div>
					<div class="form-group">
						<label>Tahun</label>
						<input type="text" name="alamat" class="form-control">
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="text" name="alamat" class="form-control">
					</div>
					<div class="form-group">
						<label>Bahan Bakar</label>
						<input type="text" name="alamat" class="form-control">
					</div>
					<div class="form-group">
						<label>Warna</label>
						<input type="text" name="alamat" class="form-control">
					</div>
					<div class="form-group">
						<label>Denda</label>
						<input type="text" name="alamat" class="form-control">
					</div>
					<div class="form-group">
						<label>Seat</label>
						<input type="text" name="alamat" class="form-control">
					</div>
					<div class="form-group">
						<label>Status Tersedia</label>
						<input type="text" name="alamat" class="form-control">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>


</html>