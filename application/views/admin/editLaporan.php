<title>Edit Laporan</title>
<div class="main-content">
	<div class="container">
		<div class="card shadow-lg border-0 rounded-lg mt-5">
			<section class="section">
				<div class="section-header">
					<h1>Edit Laporan</h1>
				</div>
				<div class="section-body">
					<div class="container-fluid">
						<!-- Form Edit Laporan -->
						<?php foreach ($laporan as $lpr) : ?>
							<form action="<?php echo base_url() . 'Laporan/update' ?>" method="post" autocomplete="off">
								<div class="form-group">
									<label>Nama Pemesan</label>
									<input type="text" name="namaPemesan" class="form-control" value="<?php echo $lpr->namaPemesan ?>">
								</div>
								<div class="form-group">
									<label>Jenis Laporan</label>
									<select name="jenisLaporan" class="form-control" value="<?php echo $lpr->jenisLaporan ?>">
										<option>Service Booking</option>
										<option>Service Ditempat</option>
										<option>Pembelian Barang</option>
									</select>
								</div>
								<input type="hidden" name="idLaporan" class="form-control" value="<?php echo $lpr->idLaporan ?>">
								<div class="form-group">
									<label>Nama Barang Dibeli / Diganti</label>
									<input type="text" name="barangTerbeli" class="form-control" value="<?php echo $lpr->barangTerbeli ?>">
								</div>
								<div class="form-group">
									<label>Total Harga</label>
									<input type="text" name="totalHarga" class="form-control" value="<?php echo $lpr->totalHarga ?>">
								</div>
								<div class="form-group">
									<label>Keterangan</label>
									<input type="text" name="keterangan" class="form-control" value="<?php echo $lpr->keterangan ?>">
								</div>
								<div class="form-group">
									<label>Tanggal Pemesanan</label>
									<input type="date" name="tanggalPemesanan" class="form-control" value="<?php echo $lpr->tanggalPemesanan ?>">
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
