<title>Daftar Sewa Penumpang</title>

<div class="main-wrapper main-wrapper-1">
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Daftar Sewa Penumpang</h1>
			</div>
			<div class="section-body">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h5>Sewa Penumpang</h5>
							</div>
							<div class="section-body">
								<div class="container-fluid">
									<div class="row">
									<div class="col-md-3">
										<?php echo anchor('FormSewa', '<div class="btn btn-success btn-sm ml-2 mt-3"><i class="fas fa-plus fa-sm"></i> Tambah Data</div>') ?>
									</div>
									<div class="col-md-3">
										<input placeholder="Tanggal Awal" id="tgl_awal" Tooltip="Tanggal Awal" type="date" name="tgl_awal" onchange="showLaporan()"  class="form-control" value="<?= (isset($_GET['tanggal_awal'])) ? $_GET['tanggal_awal'] : date('Y-m-d') ?>"
												required>
									</div>
									<div class="col-md-3">
										<input placeholder="Tanggal Akhir" id="tgl_akhir" Tooltip="Tanggal Akhir" type="date" name="tgl_akhir" onchange="showLaporan()" class="form-control" value="<?= (isset($_GET['tanggal_akhir'])) ? $_GET['tanggal_akhir'] : date('Y-m-d') ?>"
												required>
									</div>
									<div class="col-md-3">
										<select name="idMobil"
											class="form-control select2 select2-hidden-accessible" id="idMobil"
											onchange="showLaporan()"  required>
											<option value="">Pilih Mobil</option>
											<?php foreach ($mobil as $m)  :  ?>
											<option value="<?= $m->idMobil ?>"
											><?= $m->jenisMobil; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
											
									<div class=" col-md-3">
										<a href="javascript:;" onclick="printReport()" class="btn btn-success">
											<i class="fas fa-print"> Print</i></a>
									</div>
								
								<div class="section-body">
									<div class="input-group">
                                            

                                    </div>
								</div>
								

									</div>
								</div>
							</div>
							
							
							<div class="card-body">
								<div class="table-responsive">
									<!-- Tabel Data Mobil -->
									<table class="table table-bordered">
										<tr class="text-center">
											<th width="2%">No</th>
											<th width="15%">No Sewa</th>
											<th width="15%">Tanggal Sewa</th>
											<th>Pelanggan</th>
											<th>Jaminan</th>
											<th>Mobil</th>
											<th class="text-center" colspan="9">Aksi</th>
										</tr>
										<?php
											$no = 1;
											foreach ($dataSewa as $ds) : ?>
											<tr>
												<td class="text-center"><?php echo $no++ ?></td>
												<td><?php echo $ds->noSewa ?></d>
												<td><?php echo $ds->tglBerangkat ?></d>
												<td><?php echo $ds->namaPelanggan ?></d>
												<td><?php echo $ds->namaJaminan ?></td>
												<td><?php echo $ds->jenisMobil ?></td>
												<td class="text-center">
													<a href="javascript:;" onclick="printFormSewa('<?= $ds->idSewa ?>')" class="btn btn-success btn-sm"><i class="fas fa-print"></i></a>
												</td>
												<td class="text-center">
                									<?php echo anchor('DaftarSewa/editPenumpang/' . $ds->idSewa, ' <div class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Edit Data"><i class="fa fa-edit"></i></div>') ?>
              									</td>
												<td class="text-center">
													<?php echo anchor('DaftarSewa/delete_penumpang/' . $ds->idSewa, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
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

<script>
	function printFormSewa(idSewa) {
		// var tgl_awal = $('#tgl_awal').val();
		// var tgl_akhir = $('#tgl_akhir').val();
		// var link = "<?= site_url() ?>" + "/Laporan/cetak_data_kasir?tanggal_awal=" + tgl_awal + "&tanggal_akhir=" + tgl_akhir;
		var link = "<?= site_url() ?>" + "/DaftarSewa/cetak_sewa_penumpang?idSewa=" + idSewa;
		window.open(link, '_blank', 'width=1024, height=768')
	}

	function printReport() {
		var jenisMobil = $('#idMobil').val();
		var tgl_awal = $('#tgl_awal').val();
		var tgl_akhir = $('#tgl_akhir').val();
		var link = "<?= site_url() ?>" + "/Laporan/cetak_laporan_penumpang?jenisMobil=" + jenisMobil + "&tanggal_awal=" + tgl_awal + "&tanggal_akhir=" + tgl_akhir;
		window.open(link, '_blank', 'width=1024, height=768')
	}

	function showLaporan() {
			var jenisMobil = $('#idMobil').val();
			var tgl_awal = $('#tgl_awal').val();
			var tgl_akhir = $('#tgl_akhir').val();
			var link = "<?= site_url() ?>" + "/DaftarSewa/penumpang/?jenisMobil=" + jenisMobil + "&tanggal_awal=" + tgl_awal + "&tanggal_akhir=" + tgl_akhir;
			location.replace(link);
	}
</script>

</html>