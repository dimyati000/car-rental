<title>Verifikasi</title>
<div class="main-content">
	<div class="container">
		<div class="card shadow-lg border-0 rounded-lg mt-5">
			<section class="section">
				<div class="section-header">
					<h1>Verifikasi Booking Service</h1>
				</div>
				<!-- Form Verifikasi Service-->
				<div class="section-body">
					<div class="container-fluid">
						<?php foreach ($pelayanan as $ply) : ?>
							<form action="<?php echo base_url() . 'Service/verifikasi' ?>" method="post" autocomplete="off">
								<input type="hidden" name="idLayanan" class="form-control" value="<?php echo $ply->idLayanan ?>">
								<div class="form-group">
									<label>Verifikasi Booking</label>
									<select name="verifikasi" class="form-control">
										<option>Belum Terverifikasi</option>
										<option>Sudah Terverifikasi</option>
									</select>
								</div>
								<button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
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
