<title>Tambah Tentang</title>
<div class="main-content">
	<div class="container">
		<div class="card shadow-lg border-0 rounded-lg mt-5">
			<section class="section">
				<div class="section-header">
					<h1>Tambah Tentang</h1>
				</div>
				<!--Tambah Data Tentang -->
				<div class="section-body">
					<div class="container-fluid">
						<form action="<?php echo base_url() . 'Tentang/tambah' ?>" autocomplete="off" method="post">
							<div class="form-group">
								<label>Nama Tentang</label>
								<input type="text" name="menuTentang" class="form-control">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea class="form-control" name="deskripsi" rows="3"></textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
							<br>
							<br>
						</form>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
