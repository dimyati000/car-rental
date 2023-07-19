<head>
	<title>Home Service</title>
</head>

<?php echo $this->session->flashdata('pesan') ?>

<div class="col-lg-12">
	<!-- <div class="d-flex justify-content-center"> -->
	<div class="card">
		<div class="card-header">
			<h4>Home Service</h4>
		</div>
		<div class="card-body">
			<!-- Form Home Service -->
			<form action="<?php echo base_url() . 'Pelayanan/tambahLayanan' ?>" method="post" enctype="multipart/form-data" autocomplete="off">
				<div class="form-group">
					<label>Nama Pelanggan</label>
					<input type="text" name="namaPelanggan"  value="<?= $user['namaUser'] ?>" class="form-control">
				</div>
				<div class="form-group">
					<label>No Telephone</label>
					<input type="text" name="noWA"  value="<?= $user['noTelp'] ?>" class="form-control">
				</div>
				<!-- <div class="form-group">
					<label>Jenis Service</label>
					<select name="jenisService" class="form-control">
						<option>Berat</option>
						<option>Ringan</option>
					</select>
				</div> -->
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" name="alamat"  value="<?= $user['alamat'] ?>" class="form-control">
				</div>
				<!-- <div class="form-group">
					<label>Provinsi</label>
					<input type="text" name="provinsi" value="<?= $user['provinsi'] ?>"  class="form-control">
				</div> -->
				<div class="form-group">
					<label>Kabupaten / Kota</label>
					<input type="text" name="kota" value="<?= $user['kota'] ?>"  class="form-control">
				</div>
				<div class="form-group">
					<label>Kecamatan</label>
					<input type="text" name="kecamatan" value="<?= $user['kecamatan'] ?>"  class="form-control">
				</div>
				<div class="form-group">
					<label>Desa</label>
					<input type="text" name="desa" value="<?= $user['desa'] ?>"  class="form-control">
				</div>
				<div class="form-group">
					<label>Dusun</label>
					<input type="text" name="dusun" value="<?= $user['dusun'] ?>"  class="form-control">
				</div>
				<div class="form-group">
					<label>Nama Kendaraan</label>
					<input type="text" name="namaKendaraan" class="form-control"  value="<?= $user['nama_motor'] ?>">
				</div>
				<div class="form-group">
					<label>Merk Kendaraan</label>
					<input type="text" name="merkKendaraan" class="form-control"  value="<?= $user['merk_motor'] ?>">
				</div>
				<div class="form-group">
					<label>Tipe Kendaraan</label>
					<input type="text" name="tipeKendaraan" class="form-control"  value="<?= $user['type_motor'] ?>">
				</div>
				<div class="form-group">
					<label>Plat Nomor</label>
					<input type="text" name="platNomor" class="form-control"  value="<?= $user['plat_nomor'] ?>">
				</div>
				<div class="form-group">
					<label>Warna Kendaraan</label>
					<div class="row gutters-xs">
						<div class="col-auto">
							<label class="colorinput">
								<input name="warna" type="radio" class="colorinput-input" value="Biru" required />
								<span class="colorinput-color bg-primary"></span>
								<p>Biru</p>
							</label>
						</div>
						<div class="col-auto">
							<label class="colorinput">
								<input name="warna" type="radio" class="colorinput-input" value="Abu-abu" required/>
								<span class="colorinput-color bg-secondary"></span>
								<p>Abu</p>
							</label>
						</div>
						<div class="col-auto">
							<label class="colorinput">
								<input name="warna" type="radio" class="colorinput-input" value="Merah" required />
								<span class="colorinput-color bg-danger"></span>
								<p>Merah</p>
							</label>
						</div>
						<div class="col-auto">
							<label class="colorinput">
								<input name="warna" type="radio" class="colorinput-input" value="Kuning" required/>
								<span class="colorinput-color bg-warning"></span>
								<p>Kuning</p>
							</label>
						</div>
						<div class="col-auto">
							<label class="colorinput">
								<input name="warna" type="radio" class="colorinput-input" value="Hijau" required/>
								<span class="colorinput-color bg-success"></span>
								<p>Hijau</p>
							</label>
						</div>
						<div class="col-auto">
							<label class="colorinput">
								<input name="warna" type="radio" class="colorinput-input" value="Putih"required />
								<span class="colorinput-color bg-light"></span>
								<p>Putih</p>
							</label>
						</div>
						<div class="col-auto">
							<label class="colorinput">
								<input name="warna" type="radio" class="colorinput-input" value="Hitam" required/>
								<span class="colorinput-color bg-dark"></span>
							</label>
							<p>Hitam</p>
						</div>
					</div>
				</div>
				<!-- <div class="form-group">
					<label>Jenis Transmisi</label>
					<input type="text" name="transmisi" class="form-control" required>
				</div> -->
				<div class="form-group">
					<label>Kilometer Kendaraan</label>
					<input type="text" name="kilometer" class="form-control" required>
				</div>
				<!-- <div class="form-group">
					<label>Jenis Bensin</label>
					<input type="text" name="bensin" class="form-control" required>
				</div> -->
				<div class="form-group">
					<label>Jenis Keluhan</label>
					<input type="text" name="jenisKendala" class="form-control" required>
					<input type="hidden" name="jadwalLayanan" value=" " class="form-control">
					<input type="hidden" name="jenisLayanan" value="HomeService" class="form-control">
					<input type="hidden" name="verifikasi" value="Belum Terverifikasi" class="form-control">
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-lg btn-block" required>
						Kirim
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
