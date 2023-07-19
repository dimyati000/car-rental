<title>Data Laporan Penjualan</title>

<body>
	<div class="main-wrapper">
		<!-- Main Content -->
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Laporan</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?= site_url('Dashboard') ?>">Dashboard</a></div>
						<div class="breadcrumb-item">Laporan</div>
					</div>
				</div>

				<!-- <div class="main-content">
				<div class="container">
		<div class="row justify-content-center"> -->
				<div class="card shadow-lg border-0 rounded-lg mt-50">
					<section class="section">
						<div class="section-header">
							<h1>Laporan Penjualan</h1>
						</div>
						<div class="section-body">
							<div class="container-fluid">
								<!-- <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahBarang"><i class="fas fa-plus fa-sm"> Tambah Data</i></button> -->
								<div class="row">
										<div class="col-12 col-md-12 col-lg-2">
											<div class="form-group">
												<input placeholder="Tanggal Awal" name="tgl_awal" id="tgl_awal" onchange="showPenjualan()" Tooltip="Tanggal Awal" type="date" class="form-control" value="<?= (isset($_GET['tanggal_awal'])) ? $_GET['tanggal_awal'] : date('Y-m-d') ?>"
													required>
											</div>
										</div>
										<div class="col-12 col-md-12 col-lg-2">
											<div class="form-group">
												<input placeholder="Tanggal Akhir" name="tgl_akhir"  id="tgl_akhir" onchange="showPenjualan()" Tooltip="Tanggal Akhir" type="date" class="form-control" value="<?= (isset($_GET['tanggal_akhir'])) ? $_GET['tanggal_akhir'] : date('Y-m-d') ?>"
													required>
											</div>
										</div>
										<div class="col-12 col-md-12 col-lg-5">
											<!-- <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahBarang"><i class="fas fa-plus fa-sm"> Tambah Data</i></button> -->
											<a href="javascript:;" onclick="printReport()" class="btn btn-success">
												<i class="fas fa-print"> Print</i></a>
										</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<!-- Tabel Laporan -->
										<table class="table table-bordered">
											<tr>
												<th>No</th>
												<th>Tanggal Pemesanan</th>
												<th>Nama</th>
												<th>Alamat</th>
												<th>Nomor Telephone</th>
												<!-- <th>Email	</th> -->
												<th>Batas Pembayaran</th>
												<th>Jumlah Barang</th>
												<th align="center">Harga Total</th>
												<!-- <th colspan="3">Aksi</th> -->
											</tr>
											<?php
											$no = 1;
											foreach ($invoice as $inv) :
											?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo format_date($inv->tanggalPemesanan, 'd-m-Y') ?></td>
												<td><?php echo $inv->nama?></td>
												<td><?php echo $inv->alamat ?></td>
												<td><?php echo $inv->noTelp ?></td>
												<!-- <td><?php echo $inv->email ?></td> -->
												<td><?php echo $inv->batasPembayaran ?></td>
												<td align="center"><?php echo $inv->jumlah_total ?></td>
												<td align="right">Rp.<?php echo $inv->harga_total ?></td>
											</tr>
											<?php endforeach ?>
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


	<script>
		function printReport() {
			var tgl_awal = $('#tgl_awal').val();
			var tgl_akhir = $('#tgl_akhir').val();
			var link = "<?= site_url() ?>" + "/Laporan/cetak_laporan_penjualan?tanggal_awal=" + tgl_awal + "&tanggal_akhir=" + tgl_akhir;
			// var link = "<?= site_url() ?>" + "/Laporan/cetak_laporan_penjualan";
			window.open(link, '_blank', 'width=1024, height=768')
		}


		function showPenjualan() {
				var tgl_awal = $('#tgl_awal').val();
				var tgl_akhir = $('#tgl_akhir').val();
				var link = "<?= site_url() ?>" + "/Laporan/laporan_penjualan?tanggal_awal=" + tgl_awal + "&tanggal_akhir=" + tgl_akhir;
				location.replace(link);
		}
	</script>
