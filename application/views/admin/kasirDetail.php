<title>Kasir</title>

<div class="main-content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="card shadow-lg border-0 rounded-lg mt-5">
				<section class="section">
					<div class="section-header">
						<h1>Menu Kasir</h1>
					</div>
					<div class="section-body">
						<div class="container-fluid">
							<div class="card-body">
								<!-- Tambah Kasir -->
								<form id="cart" action="<?php echo base_url('Kasir/tambahData') ?>" method="post" autocomplete="off">
									<div class="form-floating mb-3">
										<input class="form-control" id="nama" name="nama" type="text" placeholder="Nama Pelanggan" minlength="3" maxlength="50" />
									</div>
									<div class="form-floating mb-3">
										<input class="form-control" id="tanggal" name="tanggal" type="date" />
									</div>
									<div class="form-floating mb-3">
										<input class="form-control" id="keterangan" name="keterangan" type="text" placeholder="Keterangan Akun" minlength="3" maxlength="50" />
									</div>

									<table id="cart datatablesSimple" border= 1 cellpadding= 10 cellspacing="0"  class="table table-striped table-bordered table-hover">

										<br>
										<thead>
											<tr>
												<th>Nama Barang</th>
												<th>Jumlah</th>
												<th>Harga</th>
												<th>Sub-Total</th>
											</tr>
										</thead>
										<tbody>
											<!-- <tr>
												<th style="text-align:center" colspan="4">-</th>
												<th><button class="row-add btn btn-primary float-end"> Add </button></th>
											</tr> -->

											<tr class="line_items">
												<td>
													<input class="form-control" name="namaBarang" autocomplete="off" type="text" placeholder="Nama Barang" />
												</td>
												<td>
													<input class="form-control" name="jumlah" type="text" placeholder="Jumlah" autocomplete="off" />
												</td>
												<td>
													<input class="form-control" name="harga" type="text" placeholder="Harga" autocomplete="off" />
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
													<input type="text" class="form-control" name="bayar" placeholder="Bayar">
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
										<button class="btn btn-warning" onclick="print()">Print</button>
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

<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>
<script type="text/javascript">
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
