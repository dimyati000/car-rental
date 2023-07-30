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
									<!-- Form Tambah Penumpang -->
									<form action="<?php echo base_url() . 'Pelanggan/update' ?>" method="post" enctype="multipart/form-data" autocomplete="off">
										<input type="hidden" name="idPelanggan" class="form-control">
										<div class="form-group">
											<label>Nomor</label>
											<input type="text" name="nik" class="form-control" valu="01/ET/01/VII/2023"
												>
										</div>
										<div class="form-group">
											<label>Nama Pelanggan</label>
											<input type="text" name="namaPelanggan" class="form-control"
												>
										</div>
										<div class="form-group">
											<label>No Telp</label>
											<input type="text" name="noTelp" class="form-control"
												>
										</div>
										<div class="form-group">
											<label>Alamat</label>
											<input type="text" name="alamat" class="form-control"
												>
										</div>
										<div class="form-group">
											<label>Foto KTP</label>
											<br>
											<input type="file" name="fotoKtp" class="form-control">
											<p style="font-size: 11px;color: red">Abaikan jika tidak merubah foto ktp</p>
										</div>
										<button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
										<br>
										<br>
										<br>
									</form>
								</div>
							</div>
						</div>
					</section>
				</div>
		</div>
	</div>
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
