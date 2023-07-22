<div class="main-wrapper main-wrapper-1">
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Pelanggan</h1>
			</div>
			<div class="section-body">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4>Data Pelanggan</h4>
							</div>
              <br>
							<div class="section-body">
								<div class="container-fluid">
									<button class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#tambahPelanggan"><i
											class="fas fa-plus fa-sm"> Tambah Data</i></button>
									</di>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered">
											<tr>
												<th>No</th>
												<th>NIK</th>
												<th>Nama Pelanggan</th>
												<th>No Telp</th>
												<th>Alamat</th>
												<th>Foto KTP</th>
												<th colspan="2" style="text-align: center">Aksi</th>
											</tr>
											<?php
										$no = 1;
										foreach ($pelanggan as $pelanggan) : ?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $pelanggan->nik ?></td>
												<td><?php echo $pelanggan->namaPelanggan ?></td>
												<td><?php echo $pelanggan->noTelp ?></td>
												<td><?php echo $pelanggan->alamat ?></td>
												<td><?php echo $pelanggan->fotoKtp ?></td>
												<td>
													<?php echo anchor('Pelanggan/edit/' . $pelanggan->idPelanggan, ' <div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>') ?>
												</td>
												<td>
													<?php echo anchor('Pelanggan/delete/' . $pelanggan->idPelanggan, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
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

<!-- Tambah Data Pelanggan -->
<div class="modal fade" id="tambahPelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				<form method="POST" action="<?php echo base_url() . 'Pelanggan/tambahData'; ?>" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" class="form-control" name="idPelanggan" value="<?= $uuid ?>"></input>
					<div class="form-group">
						<label>NIK</label>
						<input type="text" name="nik" class="form-control">
					</div>
					<div class="form-group">
						<label>Nama Pelangan</label>
						<input type="text" name="namaPelanggan" class="form-control">
					</div>
					<div class="form-group">
						<label>No Telp</label>
						<input type="text" name="noTelp" class="form-control">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alamat" class="form-control">
					</div>
					<div class="form-group">
						<label>Foto KTP</label>
						<input type="file" name="fotoKtp" class="form-control">
					</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>
