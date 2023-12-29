<title><?= $title ?></title>

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Master Data Pelanggan</h1>
		</div>
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h5>Data Pelanggan</h5>
						</div>
						<div class="section-body">
							<div class="container-fluid">
								<button class="btn btn-success btn-sm ml-2 mt-3" data-toggle="modal"
									data-target="#tambahPelanggan"><i class="fas fa-plus fa-sm"> Tambah
									Data</i></button>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered">
									<tbody>
										<tr class="text-center">
											<th width="3%">No</th>
											<th width="10%">NIK</th>
											<th width="20%">Nama Pelanggan</th>
											<th width="10%">No Telp</th>
											<th width="25%">Alamat</th>
											<th width="15%">Foto KTP</th>
											<th width="5%" colspan="2">Aksi</th>
										</tr>
										<?php
										$no = 1;
										foreach ($pelanggan as $pelanggan) : ?>
										<tr>
											<td class="text-center"><?php echo $no++ ?></td>
											<td><?php echo $pelanggan->nik ?></td>
											<td><?php echo $pelanggan->namaPelanggan ?></td>
											<td class="text-center"><?php echo $pelanggan->noTelp ?></td>
											<td><?php echo $pelanggan->alamat ?></td>
											<td class="text-center">
												<!-- <div class="mb-2 text-muted">Klik Foto Untuk Perbesar!</div> -->
													<div class="chocolat-parent">
														<div>
														<?php  
														if ($pelanggan->fotoKtp) { ?>
															<a href="<?php echo base_url() . 'assets/uploads/ktp/' . $pelanggan->fotoKtp ?>" class="chocolat-image" title="Foto KTP">
															<img class="img-fluid" alt="foto ktp" style="width: 11rem;" src="<?php echo base_url() . 'assets/uploads/ktp/' . $pelanggan->fotoKtp ?>"></td>
														</a>
														<?php } ?>
													</div>        
													</div>
												</div>
											<td class="text-center">
												<?php echo anchor('Pelanggan/edit/' . $pelanggan->idPelanggan, ' <div class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Edit Data"><i class="fa fa-edit"></i></div>') ?>
											</td>
											<td  class="text-center">
												<?php echo anchor('Pelanggan/delete/' . $pelanggan->idPelanggan, '<div class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" data-original-title="Hapus Data"><i class="fa fa-trash"></i></div>') ?>
											</td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Tambah Data Pelanggan -->
<div class="modal fade" id="tambahPelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
				<?php
					use Ramsey\Uuid\Uuid;
					$uuid = Uuid::uuid4();
					?>
				<form method="POST" action="<?php echo base_url() . 'Pelanggan/tambahData'; ?>"
					enctype="multipart/form-data" autocomplete="off">
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
			<div class="modal-footer bg-whitesmoke">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>
