<title>Jaminan</title>

<div class="main-wrapper main-wrapper-1">
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Master Data Jaminan</h1>
			</div>
			<div class="section-body">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h5>Data Jaminan</h5>
							</div>
							<div class="section-body">
								<div class="container-fluid">
									<button class="btn btn-success btn-sm ml-2 mt-2" data-toggle="modal"
										data-target="#tambahJaminan"><i class="fas fa-plus fa-sm"> Tambah
											Data</i></button>
									</div>
								</div>
									<div class="card-body">
										<div class="table-responsive">
											<!-- Tabel Data Jaminan -->
											<table class="table table-bordered">
												<tbody>
													<tr>
														<th width="3%" class="text-center">No</th>
														<th width="92%">Nama Jaminan</th>
														<th width="5%" class="text-center" class="text-center"
															colspan="2">Aksi</th>
													</tr>
													<?php
													$no = 1;
													foreach ($jaminan as $j) : ?>
													<tr>
														<td class="text-center"><?php echo $no++ ?></td>
														<td><?php echo $j->namaJaminan ?></td>
														<td class="text-center">
															<?php echo anchor('Jaminan/edit/' . $j->idJaminan, ' <div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit Data</div>') ?>
														</td>
														<td class="text-center">
															<?php echo anchor('Jaminan/delete/' . $j->idJaminan, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus Data</div>') ?>
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
			<div class="modal-footer bg-whitesmoke br">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>
