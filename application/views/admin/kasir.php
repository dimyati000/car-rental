<title>Menu Kasir</title>

<body>
	<div class="main-wrapper">
		<!-- Main Content -->
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Menu Kasir</h1>
					<div class="section-header-breadcrumb">
						<div class="breadcrumb-item active"><a href="<?= site_url('Dashboard') ?>">Dashboard</a></div>
						<div class="breadcrumb-item">Menu Kasir</div>
					</div>
				</div>

				<?php echo $this->session->flashdata('pesan') ?>

<!-- <div class="main-content"> -->
	<div class="container">
		<div class="row justify-content-center">
			<div class="card shadow-lg border-0 rounded-lg mt-50">
				<section class="section">
					<div class="section-header">
						<h1>Tambah Transaksi</h1>
					</div>
					<div class="section-body">
						<div class="container-fluid">
							<div class="card-body">
								<!-- Tambah Kasir -->
								<form id="cart" action="<?php echo base_url('Kasir/tambahData') ?>" method="post" autocomplete="off">
									<div class="form-floating mb-3">
										<input class="form-control" id="nama" name="nama" type="text" placeholder="Nama Pelanggan" minlength="3" maxlength="50" required/>
									</div>
									<div class="form-floating mb-3">
										<input class="form-control" id="tanggal" name="tanggal" type="date" value="<?php echo date("Y-m-d"); ?>" required/>
									</div>
									<div class="form-floating mb-3">
										<input class="form-control" id="keterangan" name="keterangan" type="text" placeholder="Keterangan" minlength="3" maxlength="50" required/>
									</div>

									<table id="cart datatablesSimple" class="table table-bordered table-striped">

										<br>
										<thead>
											<tr>
												<th>Nama Barang</th>
												<th>Jumlah</th>
												<th>Harga</th>
												<th>Sub-Total</th>
												<!-- <th>Ubah</th> -->
											</tr>
										</thead>
										<tbody>
											<!-- <tr>
												<th style="text-align:center" colspan="4">-</th>
												<th><button class="row-add btn btn-primary float-end"> Add </button></th>
											</tr> -->

											<tr class="line_items">
												<td>
													<input class="form-control" name="namaBarang" autocomplete="off" type="text" placeholder="Nama Barang" required/>
												</td>
												<td>
													<input class="form-control" name="jumlah" type="text" placeholder="Jumlah" autocomplete="off" required/>
												</td>
												<td>
													<input class="form-control" name="harga" type="text" placeholder="Harga" autocomplete="off" required/>
												</td>
												<td>
													<input class="form-control" name="total" type="text" jAutoCalc="{jumlah} * {harga}" />
												</td>
												<!-- <td><button class="row-remove btn btn-danger">Delete</button></td> -->
											</tr>

										</tbody>
										<tfoot>
											<tr>
												<th>Total</th>
												<th colspan="3">
													<input class="form-control" name="sub_total" type="text" placeholder="Kredit" value="" jAutoCalc="SUM({total})" />
												</th>

											</tr>
											<tr>
												<th>Bayar</th>
												<th colspan="3">
													<input type="text" class="form-control" name="bayar" placeholder="Bayar" required>
												</th>
											</tr>
											<tr>
												<th>Kembalian</th>
												<th colspan="3">
													<input class="form-control" name="kembalian" type="text" placeholder="kembalian" value=0 jAutoCalc="-{sub_total} + {bayar}" />
												</th>
											</tr>
										</tfoot>
										<br>
									</table>
									<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
										<!-- <button class="btn btn-warning" onclick="print()">Print</button> -->
										<!-- <a href="<?php echo base_url('Kasir/detail');?>" onclick="window.open(link, '_blank')" class="btn btn-warning">
												<i class="fas fa-print"> Print</i></a> -->
										<!-- <a href="<?php echo base_url('Transaksi/detail/' + $inv->idInvoice ); ?>" onclick="printKasir()" class="btn btn-warning">
												<i class="fas fa-print"> Print</i></a> -->
										
										<input type="submit" name="save" value="Simpan Data" class="btn btn-success">
									</div>
								</form>
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

<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>
<script type="text/javascript">

	function cetakKasir() {
		var link = "<?= site_url() ?>" + "/Kasir/cetak_kasir?cetak_kasir";
		window.open(link, '_blank', 'width=1024, height=768')
	}

	$(function() {
		function autoCalcSetup() {
			$('form#cart').jAutoCalc('destroy');
			$('form#cart tr.line_items').jAutoCalc({
				keyEventsFire: true,
				decimalPlaces: 2,
				emptyAsZero: true
			});
			$('form#cart').jAutoCalc({
				decimalPlaces: 2
			});
		}
		autoCalcSetup();

		$('button.row-remove').on("click", function(e) {
			e.preventDefault();

			var form = $(this).parents('form')
			$(this).parents('tr').remove();
			autoCalcSetup();

		});

		$('button.row-add').on("click", function(e) {
			e.preventDefault();

			var $table = $(this).parents('table');
			var $top = $table.find('tr.line_items').first();
			var $new = $top.clone(true);

			$new.jAutoCalc('destroy');
			$new.insertBefore($top);
			$new.find('input[type=text]').val('');
			autoCalcSetup();

		});

	});
</script>
