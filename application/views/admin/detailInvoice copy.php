<div class="main-wrapper">
      <!-- Main Content -->      
<div class="main-content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="card shadow-lg border-0 rounded-lg mt-5">
				<section class="section">
					<div class="section-header">
						<h1>Detail Pemesanan</h1>
						<div class="btn btn-sm btn-success">No Invoice : <?php echo $invoice->idInvoice ?></div>
					</div>
					<div class="section-body">
						<div class="container-fluid">
							<!-- Ambil Data Detail Invoice -->
							<table class="table table-striped table-bordered table-hover">
								<a href="<?php echo site_url() . '/Transaksi/detailview/' . $invoice->idInvoice ?>"  class="btn btn-primary">Print</a>
								<!-- <a href="<?php echo site_url() . 'Transaksi/view/' . $invoice->idInvoice ?>" data-toggle="modal"
									data-target="#tambahBarang" class="btn btn-primary">Print</a> -->
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
							<a href="<?php echo base_url('Transaksi') ?>">
								<div class="btn btn-sm btn-warning">Kembali</div>
							</a>
							<br>
							<br>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
