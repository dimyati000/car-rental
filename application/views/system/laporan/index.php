<title>Data Laporan</title>

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
				<div class="card shadow-lg border-0 rounded-lg mt-5">
					<section class="section">
						<div class="section-header">
							<h1>Laporan Pelayanan</h1>
						</div>
						<div class="section-body">
							<div class="container-fluid">
							<!-- <form action="<?php echo base_url() . 'Laporan/laporan_pelayanan' ?>" method="post" class="needs-validation" novalidate=""> -->
                 
								<div class="row">
										<div class="col-12 col-md-12 col-lg-3">
											<div class="form-group" col-md-4>
												<select name="jenis_sewa" id="jenis_sewa" onchange="showPelayanan()"  class="form-control">
													<option value="">Pilih Jenis Sewa</option>
													<option <?php if(isset($_GET['jenis_sewa'])){ echo ($_GET['jenis_sewa']=='SewaPenumpang') ? ' selected' : ''; } ?> value="SewaPenumpang">Sewa Penumpang</option>
													<option <?php if(isset($_GET['jenis_sewa'])){ echo ($_GET['jenis_sewa']=='SewaBarang') ? ' selected' : ''; } ?> value="SewaBarang">Sewa Barang </option>
												</select>
											</div>
										</div>
										<div class="col-12 col-md-12 col-lg-2">
											<div class="form-group">
												<input placeholder="Tanggal Awal" id="tgl_awal" Tooltip="Tanggal Awal" type="date" name="tgl_awal" onchange="showPelayanan()"  class="form-control" value="<?= (isset($_GET['tanggal_awal'])) ? $_GET['tanggal_awal'] : date('Y-m-d') ?>"
													required>
											</div>
										</div>
										<div class="col-12 col-md-12 col-lg-2">
											<div class="form-group">
												<input placeholder="Tanggal Akhir" id="tgl_akhir" Tooltip="Tanggal Akhir" type="date" name="tgl_akhir" onchange="showPelayanan()" class="form-control" value="<?= (isset($_GET['tanggal_akhir'])) ? $_GET['tanggal_akhir'] : date('Y-m-d') ?>"
													required>
											</div>
										</div>
										<div class="col-12 col-md-12 col-lg-5">
											<!-- <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahBarang"><i class="fas fa-plus fa-sm"> Tambah Data</i></button> -->
											<a href="javascript:;" onclick="printReport()" class="btn btn-success">
												<i class="fas fa-print"> Print</i></a>
										</div>
								</div>
									<!-- <button class="btn" type="submit">Tes</button>
							</form> -->
								<div class="card-body">
									<div class="table-responsive">
										<!-- Tabel Laporan -->
										<table class="table table-bordered">
											<tr>
												<th>No</th>
												<th>Tanggal Pemesanan</th>
												<th>Nama Pelanggan</th>
												<th>Plat Nomor</th>
												<th>Jenis Kendala</th>
												<th>Verifikasi</th>
											</tr>
											<?php
										$no = 1;
										foreach ($laporan as $lpr) : ?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo format_date($lpr->tanggalPemesanan, 'd-m-Y') ?></td>
												<td><?php echo $lpr->namaPelanggan ?></td>
												<td><?php echo $lpr->platNomor ?></td>
												<td><?php echo $lpr->jenisKendala ?></td>
												<td><?php echo $lpr->verifikasi ?></td>
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

<script>
	function printReport() {
		var tgl_awal = $('#tgl_awal').val();
		var tgl_akhir = $('#tgl_akhir').val();
		var jenis_sewa = $('#jenis_sewa').val();
		var link = "<?= site_url() ?>" + "/Laporan/cetak_laporan?jenis_sewa=" + jenis_sewa + "&tanggal_awal=" + tgl_awal + "&tanggal_akhir=" + tgl_akhir;
		window.open(link, '_blank', 'width=1024, height=768')
	}

	function showPelayanan() {
			var tgl_awal = $('#tgl_awal').val();
			var tgl_akhir = $('#tgl_akhir').val();
			var jenis_sewa = $('#jenis_sewa').val();
			var link = "<?= site_url() ?>" + "/Laporan/laporan ?jenis_sewa=" + jenis_sewa + "&tanggal_awal=" + tgl_awal + "&tanggal_akhir=" + tgl_akhir;
			location.replace(link);
	}
</script>
