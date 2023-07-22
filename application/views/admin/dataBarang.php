<title>Data Barang Onderdil</title>

<body>
	<div class="main-wrapper main-wrapper-1">
		<!-- Main Content -->
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Spare Part</h1>
				</div>
			<div class="card shadow-lg border-0 rounded-lg mt-50">
				<div class="section-body">
					<div class="card-header">
						<h5>Data Barang Onderdil</h5>
					</div>
					<div class="section-body">
						<div class="container-fluid">
							<button class="btn btn-primary" data-toggle="modal" data-target="#tambahBarang"><i class="fas fa-plus fa-sm"> Tambah Data</i></button>
							<div class="card-body">
								<div class="table-responsive">
									<!-- Tabel Data Barang -->
									<table class="table table-bordered">
										<tr>
											<th>No</th>
											<th>Nama Barang</th>
											<th>Kategori</th>
											<th>Harga</th>
											<th>Keterangan</th>
											<th>Stok</th>
											<th align="center" colspan="2">Aksi</th>
										</tr>
										<?php
										$no = 1;
										foreach ($barang as $brg) : ?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $brg->namaBarang ?></td>
												<td><?php echo $brg->kategori ?></td>
												<td><?php echo $brg->harga ?></td>
												<td><?php echo $brg->keterangan ?></td>
												<td><?php echo $brg->stok ?></td>
												<td><?php echo anchor('DataBarang/edit/' . $brg->idBarang, ' <div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit Data</div>') ?>
												</td>
												<td><?php echo anchor('DataBarang/delete/' . $brg->idBarang, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Hapus Data</div>') ?>
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


<!-- Tambah Data Barang -->
<div class="modal fade" id="tambahBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?php echo base_url() . 'DataBarang/tambahData'; ?>" enctype="multipart/form-data" autocomplete="off">
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" name="namaBarang" class="form-control">
					</div>
					<div class="form-group">
						<label>Kategori</label>
						<select name="kategori" class="form-control">
							<option>Knalpot</option>
							<option>Benda Kecil</option>
							<option>Body Motor</option>
							<option>Mesin Motor</option>
						</select>
					</div>
					<div class="form-group">
						<label>Harga Barang</label>
						<input type="text" name="harga" class="form-control">
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<input type="text" name="keterangan" class="form-control">
					</div>
					<div class="form-group">
						<label>Stok</label>
						<input type="text" name="stok" class="form-control">
					</div>
					<div class="form-group">
						<label>Gambar Barang</label>
						<input type="file" name="gambar" class="form-control">
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
