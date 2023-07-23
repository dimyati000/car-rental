<title>Jaminan</title>

<body>
	<div class="main-wrapper main-wrapper-1">
		<!-- Main Content -->
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Master Data Jaminan</h1>
				</div>
			<div class="card shadow-lg border-0 rounded-lg mt-50">
				<div class="section-body">
					<div class="card-header">
						<h5>Data Jaminan</h5>
					</div>
					<div class="section-body">
						<div class="container-fluid">
							<button class="btn btn-primary" data-toggle="modal" data-target="#tambahJaminan"><i class="fas fa-plus fa-sm"> Tambah Data</i></button>
							<div class="card-body">
								<div class="table-responsive">
									<!-- Tabel Data Jaminan -->
									<table class="table table-bordered">
										<tr>
											<th>No</th>
											<th>Nama Jaminan</th>
											<th align="center" colspan="2">Aksi</th>
										</tr>
										<?php
										$no = 1;
										foreach ($jaminan as $j) : ?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $j->namaJaminan ?></td>
												<td><?php echo anchor('Jaminan/edit/' . $j->idJaminan, ' <div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit Data</div>') ?>
												</td>
												<td><?php echo anchor('Jaminan/delete/' . $j->idJaminan, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Hapus Data</div>') ?>
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
		</div>
	</div>
</div>


<!-- Tambah Data Jaminan -->
<div class="modal fade" id="tambahJaminan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?php echo base_url() . 'Jaminan/tambahData'; ?>" enctype="multipart/form-data" autocomplete="off">
					<div class="form-group">
						<label>Nama Jaminan</label>
						<input type="text" name="namaJaminan" class="form-control">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			</form>
		</div>
	</div>
</div>
