
<div class="main-wrapper main-wrapper-1">
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Daftar Sewa</h1>
			</div>
			<div class="section-body">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h5>Data Sewa</h5>
							</div>
							<div class="section-body">
								<div class="container-fluid">
								<?php echo anchor('FormSewa', '<div class="btn btn-success btn-sm ml-2 mt-3"><i class="fas fa-plus fa-sm"></i> Tambah Data</div>') ?>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<!-- Tabel Data Mobil -->
									<table class="table table-bordered">
										<tr>
											<th>No</th>
											<th>No Sewa</th>
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
												<td><?php echo $ds->namaPelanggan ?></d>
												<td><?php echo $ds->alamat ?></d>
												<td><?php echo $ds->noTelp ?></td>
												<td><?php echo $ds->jenisMobil ?></td>
												<td class="text-center">
													<a href="javascript:;" onclick="printFormSewa('<?= $ds->idSewa ?>')" class="btn btn-success"><i class="fas fa-print"> Print</i></a>
												</td>
												<td class="text-center">
													<?php echo anchor('Jaminan/delete/' . $ds->idSewa, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus Data</div>') ?>
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
			var link = "<?= site_url() ?>" + "/DaftarSewa/cetak_form_sewa?idSewa=" + idSewa;
			window.open(link, '_blank', 'width=1024, height=768')
		}
</script>

</html>