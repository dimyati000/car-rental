<title>Edit Tentang</title>
<div class="main-content">
	<div class="container">
		<div class="card shadow-lg border-0 rounded-lg mt-5">
			<section class="section">
				<div class="section-header">
					<h1>Edit Tentang</h1>
				</div>
				<div class="section-body">
					<div class="container-fluid">
						<!-- Form Edit Tentang -->
						<?php foreach($tentang as $ttg):?>
						<form action="<?php echo base_url() . 'Tentang/update' ?>" method="post" autocomplete="off">
							<div class="form-group">
								<label>Nama Tentang</label>
								<input type="hidden" name="idTentang" value="<?php echo $ttg->idTentang?>">
								<input type="text" name="menuTentang" value="<?php echo $ttg->menuTentang?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea class="form-control" name="deskripsi" rows="3"><?php echo $ttg->deskripsi?></textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
							<br>
							<br>
						</form>
						<?php endforeach;?>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
