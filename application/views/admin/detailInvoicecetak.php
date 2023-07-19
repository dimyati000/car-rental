<style>
	@media print {
		#cetak {
			display: none;
		}
		#kembali {
			display: none;
		}
	}

</style>

<title>Detail Pemesanan</title>
<div class="main-content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="card shadow-lg border-0 rounded-lg mt-5">
				<section class="section">
					<div class="section-header">
						<h1>Detail Pemesanan</h1>
					</div>
					<div class="section-body">
						<div class="container-fluid">
							<!-- Ambil Data Detail Invoice -->
							<table border= 1 cellpadding= 10 cellspacing="0" class="table table-striped table-bordered table-hover">
								<tr>
									<td colspan="1">No Invoice : </td>
									<td  colspan="4"><?php echo $invoice->idInvoice ?></td>
								</tr>
								<tr>
									<th>Id Produk</th>
									<th>Nama Produk</th>
									<th>Jumlah Pesanan</th>
									<th>Harga Per Item</th>
									<th>Sub-Total</th>
								</tr>
								<?php
								$total = 0;
								foreach ($pesanan as $psn) :
									$subtotal = $psn->jumlah * $psn->harga;
									$total += $subtotal;
								?>
									<tr>
										<td><?php echo $psn->idBarang ?></td>
										<td><?php echo $psn->namaBarang ?></td>
										<td><?php echo $psn->jumlah ?></td>
										<td><?php echo number_format($psn->harga, 0, ',', '.') ?></td>
										<td><?php echo number_format($subtotal, 0, ',', '.') ?></td>
									</tr>
								<?php endforeach; ?>
								<tr>
									<td colspan="4" align="right">Grand Total</td>
									<td align="right">Rp. <?php echo number_format($total, 0, ',', '.') ?></td>
								</tr>
							</table>
							<br>
							<!-- <button class="btn"><a href="<?php echo base_url('Transaksi') ?>">Kembali</a></button> -->
							<button id="cetak" onclick="window.print()" class="btn btn-primary">Cetak</button>
							<!-- <a id="kembali" href="<?php echo site_url('../Transaksi') ?>"><button>Kembali</button></a> -->
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
