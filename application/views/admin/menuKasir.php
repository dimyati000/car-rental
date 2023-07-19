<title>Data Kasir</title>
<div class="main-content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="card shadow-lg border-0 rounded-lg mt-5">
				<section class="section">
					<div class="section-header">
						<h1>Data Kasir</h1>
					</div>
					<div class="section-body">
						<div class="container-fluid">
						<a href="javascript:;" onclick="printReport()" class="btn btn-success">
							<i class="fas fa-print"> Print</i></a>
							<div class="card-body">
								<div class="table-responsive">
									<!-- Tabel Data Kasir -->
									<table class="table table-bordered">
										<tr>
											<th>No</th>
											<th>Nama Pelanggan</th>
											<th>Tanggal</th>
											<th>Keterangan</th>
											<th>Nama Barang</th>
											<th>Total Harga</th>
											<th>Bayar</th>
											<th>Kembalian</th>
											<th>Aksi</th>
										</tr>
										<?php
										$no = 1;
										foreach ($kasir as $ksr) : ?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $ksr->namaPelanggan ?></td>
												<td><?php echo $ksr->tanggal ?></td>
												<td><?php echo $ksr->keterangan ?></td>
												<td><?php echo $ksr->namaBarang ?></td>
												<?php $fixed = $ksr->kembalian . "000"; ?>
												<td><?php echo number_format($ksr->bayar - $fixed) ?></td>
												<td><?php echo number_format($ksr->bayar) ?></td>
												<td><?php switch ($ksr->kembalian) {
														case 0:
															echo 0;
															break;
														default:
															echo $ksr->kembalian . ',000';
															break;
													} ?></td>
												<td><?php echo anchor('Kasir/delete/' . $ksr->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>

												</td>
											</tr>
										<?php endforeach; ?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<!-- <footer class="main-footer">
	<div class="footer-left">
		Copyright &copy; 2023 CAR RENTAL. All rights reserved.
	</div>
</footer> -->

<script>
	function printReport() {
			// var tgl_awal = $('#tgl_awal').val();
			// var tgl_akhir = $('#tgl_akhir').val();
			// var link = "<?= site_url() ?>" + "/Laporan/cetak_data_kasir?tanggal_awal=" + tgl_awal + "&tanggal_akhir=" + tgl_akhir;
			var link = "<?= site_url() ?>" + "/Kasir/cetak_data_kasir";
			window.open(link, '_blank', 'width=1024, height=768')
		}
</script>
