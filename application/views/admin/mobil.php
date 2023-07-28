
<div class="main-wrapper main-wrapper-1">
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Master Data Mobil</h1>
			</div>
			<div class="section-body">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h5>Data Mobil</h5>
							</div>
							<div class="section-body">
								<div class="container-fluid">
									<button class="btn btn-success btn-sm ml-2 mt-3" data-toggle="modal" data-target="#tambahMobil"><i class="fas fa-plus fa-sm"> Tambah Data</i></button>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<!-- Tabel Data Mobil -->
									<table class="table table-bordered">
										<tr>
											<th>No</th>
											<th>Jenis Mobil</th>
											<th>Merk</th>
											<th>Nopol</th>
											<th>Tahun</th>
											<th>Harga</th>
											<th>Bahan Bakar</th>
											<th>Warna</th>
											<th>Denda</th>
											<th>Seat</th>
											<th>Status Tersedia</th>
											<th>gambarMobil</th>
											<th class="text-center" colspan="9">Aksi</th>
										</tr>
										<?php
										$no = 1;
										foreach ($mobil as $m) : ?>
											<tr>
												<td class="text-center"><?php echo $no++ ?></td>
												<td><?php echo $m->jenisMobil ?></td>
												<td><?php echo $m->merkMobil ?></td>
												<td class="text-center"><?php echo $m->nopol ?></td>
												<td><?php echo $m->tahun ?></td>
												<td><?php echo $m->harga ?></td>
												<td><?php echo $m->bahanBakar ?></td>
												<td><?php echo $m->warna ?></td>
												<td><?php echo $m->denda ?></td>
												<td><?php echo $m->seat ?></td>
												<td><?php echo $m->statusTersedia ?></td>
												<td class="text-center">
													<!-- <div class="mb-2 text-muted">Klik Gambar Untuk Perbesar!</div> -->
														<div class="chocolat-parent">
														<a href="<?php echo base_url() . 'assets/uploads/mobil/' . $m->gambarMobil ?>" class="chocolat-image" title="Gambar Mobil">
															<div>
																<img class="img-fluid" alt="gambar mobil" style="width: 15rem;" src="<?php echo base_url() . 'assets/uploads/mobil/' . $m->gambarMobil ?>"></td>
															</div>
														</a>
														</div>
													</div>
												<td class="text-center">
													<?php echo anchor('Mobil/editMobil/' . $m->idMobil, ' <div class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Edit Data"><i class="fa fa-edit"></i></div>') ?>
												</td>
												<td  class="text-center">
													<?php echo anchor('Mobil/delete/' . $m->idMobil, '<div class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" data-original-title="Hapus Data"><i class="fa fa-trash"></i></div>') ?>
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
		</section>
	</div>
</div>

<!-- Tambah Data Mobil -->
<div class="modal fade" id="tambahMobil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
				<form method="POST" action="<?php echo base_url() . 'Mobil/tambahMobil'; ?>"
					enctype="multipart/form-data" autocomplete="off">
					<input type="hidden" class="form-control" name="idMobil" value="<?= $uuid ?>"></input>
					<div class="form-group">
						<label>Jenis Mobil</label>
						<input type="text" name="jenisMobil" class="form-control">
					</div>
					<div class="form-group">
						<label>Merk Mobil</label>
						<input type="text" name="merkMobil" class="form-control">
					</div>
					<div class="form-group">
						<label>Nopol</label>
						<input type="text" name="nopol" class="form-control">
					</div>
					<div class="form-group">
						<label>Tahun</label>
						<input type="text" name="tahun" class="form-control">
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="text" name="harga" class="form-control">
					</div>
					<div class="form-group">
						<label>Bahan Bakar</label>
						<input type="text" name="bahanBakar" class="form-control">
					</div>
					<div class="form-group">
						<label>Warna</label>
						<input type="text" name="warna" class="form-control">
					</div>
					<div class="form-group">
						<label>Denda</label>
						<input type="text" name="denda" class="form-control">
					</div>
					<div class="form-group">
						<label>Seat</label>
						<input type="text" name="seat" class="form-control">
					</div>
					<div class="form-group">
						<label>Status Tersedia</label>
						<input type="text" name="statusTersedia" class="form-control">
					</div>
					<div class="form-group">
						<label>Gambar Mobil</label>
						<input type="file" name="gambarMobil" class="form-control">
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