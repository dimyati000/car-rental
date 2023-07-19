<title>Checkout</title>
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-j_VMcR41peCw1f-n"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Menu Pembayaran</h1>
		</div>
		<div class="section-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2">					
					</div>
					<!-- Checkout Snap -->
					<div class="col-md-8">
						<div class="btn btn-sm btn-success">
							<?php
							$grandTotal = 0;
							if ($keranjang = $this->cart->contents()) {
								foreach ($keranjang as $items) {
									$grandTotal = $grandTotal + $items['subtotal'];
								}
								echo "<h4>Total Belanja Anda: Rp. " . number_format($grandTotal, 0, ',', '.');

							?>
						</div><br><br>
						<form id="payment-form" method="post" action="<?= base_url() ?>/snap/finish" autocomplete="off">
							<div class="form-group">
								<label>Nama Lengkap</label>
								<input type="text" id="nama"  value="<?= $user['namaUser'] ?>"  required name="nama" placeholder="Nama Lengkap" class="form-control">
							</div>
							<div class="form-group">
								<label>Alamat Lengkap</label>
								<input type="text" id="alamat"  value="<?= $user['alamat'] ?>"  required name="alamat" placeholder="Alamat Lengkap" class="form-control">
							</div>
							<div class="form-group">
								<label>No Telepon</label>
								<input type="text" id="notelp"  value="<?= $user['noTelp'] ?>"  required name="noTelp" placeholder="No Telepon" class="form-control">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" id="email"  value="<?= $user['email'] ?>"  required name="email" placeholder="Email" class="form-control">
							</div>
							<div class="form-group">
								<label>Jumlah Bayar</label>
								<input type="text" id="bayar" required name="bayar" value="<?php echo $grandTotal ?>" placeholder="Jumlah Yang Akan Dibayar" disabled class="form-control">
							</div>
							<input type="hidden" name="result_type" id="result-type" value="">
							<button id="pay-button" class="btn btn-primary">Pay!</button>
							<br>
							<br>
					</div>
					<input type="hidden" name="result_data" id="result-data" value="">
				</div>
			</div>
			</form>
		<?php } ?>
		</div>
	</section>

	<script type="text/javascript">
		$('#pay-button').click(function(event) {
			event.preventDefault();
			$(this).attr("disabled", "disabled");
			var nama = $("#nama").val();
			var alamat = $("#alamat").val();
			var notelp = $("#notelp").val();
			var bayar = $("#bayar").val();
			var email = $("#email").val();

			$.ajax({
				type: 'POST',
				url: '<?= site_url() ?>/snap/token',
				data: {
					nama: nama,
					alamat: alamat,
					notelp: notelp,
					email: email,
					bayar: bayar
				},
				cache: false,

				success: function(data) {
					//location = data;

					console.log('token = ' + data);

					var resultType = document.getElementById('result-type');
					var resultData = document.getElementById('result-data');

					function changeResult(type, data) {
						$("#result-type").val(type);
						$("#result-data").val(JSON.stringify(data));
						//resultType.innerHTML = type;
						//resultData.innerHTML = JSON.stringify(data);
					}

					snap.pay(data, {

						onSuccess: function(result) {
							changeResult('success', result);
							console.log(result.status_message);
							console.log(result);
							$("#payment-form").submit();
						},
						onPending: function(result) {
							changeResult('pending', result);
							console.log(result.status_message);
							$("#payment-form").submit();
						},
						onError: function(result) {
							changeResult('error', result);
							console.log(result.status_message);
							$("#payment-form").submit();
						}
					});
				}
			});
		});
	</script>


	</body>

	</html>
