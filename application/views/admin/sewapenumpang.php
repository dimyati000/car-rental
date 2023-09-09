<title>Jaminan</title>

<div class="main-wrapper main-wrapper-1">
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<!-- <div class="section-header">
				<h1>Master Data Jaminan</h1>
			</div> -->
			<div class="section-body">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h5>Form Sewa Penumpang</h5>
							</div>
							<div class="section-body">
								<div class="card-body">
									<!-- Form Tambah Sewa Penumpang -->
									<form action="<?php echo base_url() . 'FormSewa/tambahData' ?>" method="post"
										enctype="multipart/form-data" autocomplete="off">
										<input type="hidden" name="idPelanggan" class="form-control">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label>Nomor Sewa</label>
												<input type="text" name="noSewa" class="form-control" required>
											</div>
											<div class="form-group col-md-6">
												<label>Jaminan</label>
												<select name="idJaminan"
													class="form-control select2 select2-hidden-accessible"
													id="idJaminan" required>
													<option value="">Pilih Jaminan</option>
													<?php foreach ($jaminan as $j)  :  ?>
													<option value="<?= $j->idJaminan ?>"><?= $j->namaJaminan; ?>
													</option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="form-group col-md-6">
												<label>Nama Pelanggan</label>
												<select name="idPelanggan"
													class="form-control select2 select2-hidden-accessible"
													id="idJaminan" required>
													id="idPelanggan" >
													<option value="">Pilih Pelanggan</option>
													<?php foreach ($pelanggan as $p)  :  ?>
													<option value="<?= $p->idPelanggan ?>"><?= $p->namaPelanggan; ?>
													</option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="form-group col-md-6">
												<label>Mobil</label>
												<select name="idMobil"
													class="form-control select2 select2-hidden-accessible" id="idMobil" required>
													<option value="">Pilih Mobil</option>
													<?php foreach ($mobil as $m)  :  ?>
													<option value="<?= $m->idMobil ?>"><?= $m->jenisMobil; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="form-group col-md-6">
												<label>Rute</label>
												<input type="text" name="rute" class="form-control" required>
											</div>
										</div>
										<!-- <div class="modal-footer"> -->
											<div style="text-align:right">
												<?php echo anchor('FormSewa', '<div class="btn btn-secondary"> Batal</div>') ?>
												<button type="submit" class="btn btn-primary">Simpan Data</button>
											</div>
										<!-- </div> -->
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>


<!-- Tambah Data Jaminan -->
<div class="modal fade" id="tambahJaminan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?php echo base_url() . 'Jaminan/tambahData'; ?>"
					enctype="multipart/form-data" autocomplete="off">
					<div class="form-group">
						<label>Nama Jaminan</label>
						<input type="text" name="namaJaminan" class="form-control">
					</div>
			</div>
			<div class="modal-footer bg-whitesmoke">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>

<script>

</script>
