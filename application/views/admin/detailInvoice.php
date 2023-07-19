<title>Detail Invoice</title>

<div class="main-wrapper">
      <!-- Main Content -->
      <div class="main-content">
        <section class="section ">
          <div class="section-header">
            <h1>Detail Pemesanan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="<?= site_url('Transaksi') ?>">Transaksi</a></div>
              <div class="breadcrumb-item">Detail Pemesanan</div>
            </div>
          </div>
					<div class="section-body">
						<div class="row justify-content-center">
              <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
								<iframe src="<?php echo site_url() . '/Transaksi/cetak/' . $invoice->idInvoice ?>" style="width:100%; height:300px;"></iframe> 
                <!-- <a id="kembali" href="<?php echo site_url('../Transaksi') ?>"><button>Kembali</button></a> -->
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
    </div>
		<footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2023 CAR RENTAL. All rights reserved.
        </div>
      </footer>
  </div>
