<title>Laporan</title>

<div class="main-wrapper main-wrapper-1">
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Laporan</h1>
			</div>
			<div class="section-body">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h5>Laporan Transaksi</h5>
							</div>
							<div class="section-body">
								<div class="container-fluid">
								<br>
								<div class="row">
										<div class="col-md-3">
												<select name="jenis_sewa" id="jenis_sewa" onchange="showLaporan()"  class="form-control">
													<option value="">Pilih Jenis Sewa</option>
													<option <?php if(isset($_GET['jenis_sewa'])){ echo ($_GET['jenis_sewa']=='SewaPenumpang') ? ' selected' : ''; } ?> value="SewaPenumpang">Sewa Penumpang</option>
													<option <?php if(isset($_GET['jenis_sewa'])){ echo ($_GET['jenis_sewa']=='SewaBarang') ? ' selected' : ''; } ?> value="SewaBarang">Sewa Barang </option>
												</select>
										</div>
										<div class="col-md-3">
											<div>
												<input placeholder="Tanggal Awal" id="tgl_awal" Tooltip="Tanggal Awal" type="date" name="tgl_awal" onchange="showLaporan()"  class="form-control" value="<?= (isset($_GET['tanggal_awal'])) ? $_GET['tanggal_awal'] : date('Y-m-d') ?>"
													required>
											</div>
										</div>
										<div class="col-md-3">
											<div>
												<input placeholder="Tanggal Akhir" id="tgl_akhir" Tooltip="Tanggal Akhir" type="date" name="tgl_akhir" onchange="showLaporan()" class="form-control" value="<?= (isset($_GET['tanggal_akhir'])) ? $_GET['tanggal_akhir'] : date('Y-m-d') ?>"
													required>
											</div>
										</div>
										<div class=" col-md-3">
											<a href="javascript:;" onclick="printReport()" class="btn btn-success">
												<i class="fas fa-print"> Print</i></a>
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
											<th>Nama Penyewa</th>
											<th>Jenis Mobil</th>
											<th>Tipe Tarif</th>
											<th>Tarif Sewa</th>
											<th>Lama Sewa</th>
										</tr>
										<?php
											$no = 1;
											foreach ($dataSewa as $ds) : ?>
											<tr>
												<td class="text-center"><?php echo $no++ ?></td>
												<td><?php echo $ds->noSewa ?></d>
												<td><?php echo $ds->tglBerangkat ?></d>
												<td><?php echo $ds->namaPelanggan ?></d>
												<td><?php echo $ds->jenisMobil ?></td>
												<td class="text-center"><?php echo $ds->tipeTarif ?></td>
												<?php  if($ds->tipeTarif == 12){ ?>
													<td><?php echo $ds->harga12 ?></td>
												<?php }else{ ?>
													<td><?php echo $ds->harga24 ?></td>
												<?php } ?>
												<td class="text-center"><?php echo $ds->lamaSewa ?></td>
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
	function printReport() {
		var tgl_awal = $('#tgl_awal').val();
		var tgl_akhir = $('#tgl_akhir').val();
		var jenis_sewa = $('#jenis_sewa').val();
		var link = "<?= site_url() ?>" + "/Laporan/cetak_laporan?jenis_sewa=" + jenis_sewa + "&tanggal_awal=" + tgl_awal + "&tanggal_akhir=" + tgl_akhir;
		window.open(link, '_blank', 'width=1024, height=768')
	}

	function showLaporan() {
			var tgl_awal = $('#tgl_awal').val();
			var tgl_akhir = $('#tgl_akhir').val();
			var jenis_sewa = $('#jenis_sewa').val();
			var link = "<?= site_url() ?>" + "/Laporan?jenis_sewa=" + jenis_sewa + "&tanggal_awal=" + tgl_awal + "&tanggal_akhir=" + tgl_akhir;
			location.replace(link);
	}
</script>

</html>