
<div class="main-wrapper main-wrapper-1">
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Form Sewa</h1>
			</div>
			<div class="section-body">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-6">
						<div class="card">
						<div class="card-header" style="justify-content: center;">
							<h5 class="text-center">Form Sewa Penumpang</h5>
						</div>
						<div class="card-body">
 							<a href="<?php echo('FormSewa/sewaPenumpang')?>"><img class="img-fluid" alt="gambar mobil" style="width: 100%;" src="<?php echo base_url() ?>assets/img/icon-formpenumpang.png"></a>
						</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6">
						<div class="card">
						<div class="card-header" style="justify-content: center;">
							<h5>Form SEWA Barang</h5>
						</div>
						<div class="card-body">
						<a href="<?php echo('FormSewa/sewaBarang')?>"><img class="img-fluid" alt="gambar mobil" style="width: 100%;" src="<?php echo base_url() ?>assets/img/icon-formbarang.png"></a>
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