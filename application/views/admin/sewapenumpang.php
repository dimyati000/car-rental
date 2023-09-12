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
									<?php
										use Ramsey\Uuid\Uuid;
										$uuid = Uuid::uuid4();
									?>
									<form action="<?php echo base_url() . 'FormSewa/tambahData' ?>" method="post"
										enctype="multipart/form-data" autocomplete="off">
										<input type="hidden" class="form-control" name="idSewa" value="<?= $uuid ?>"></input>
										<input type="hidden" name="idPelanggan" class="form-control">
										<input type="hidden" name="tipeSewa" class="form-control" value="SP">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label>Nomor Sewa</label>
												<input type="text" name="noSewa" class="form-control" value="001/ET-SP/10/IX/2023" required>
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
											<div class="form-group col-md-3">
												<label>Tanggal Berangkat</label>
												<input type="date" name="jadwalBooking" class="form-control" required>
											</div>
											<div class="form-group col-md-3">
											<label>Jam Berangkat</label>
											<div class="input-group">
												<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fas fa-clock"></i>
												</div>
												</div>
												<input type="text" class="form-control timepicker">
											</div>
											</div>
											<div class="form-group col-md-3">
												<label>Tanggal Pengembalian</label>
												<input type="date" name="jadwalBooking" class="form-control" required>
											</div>
											<div class="form-group col-md-3">
											<label>Jam Pengembalian</label>
											<div class="input-group">
												<div class="input-group-prepend">
												<div class="input-group-text">
													<i class="fas fa-clock"></i>
												</div>
												</div>
												<input type="text" class="form-control timepicker">
											</div>
											</div>
											<div class="form-group col-md-12">
												<label>Rute</label>
												<input type="text" name="rute" class="form-control" required>
											</div>
											<div class="form-group col-md-3">
											<label>Tipe Tarif</label>
												<select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="tipeTarif" id="tipeTarif">
													<option>Pilih Tipe Tarif</option>
													<option value="12">12 Jam</option>
													<option value="24">24 Jam</option>
												</select>
												
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