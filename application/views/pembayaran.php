<title>Pembayaran</title>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Menu Pembayaran</h1>
        </div>

        <div class="section-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2"></div>
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
                        <h3>Input Alamat Pengiriman dan Pembayaran</h3>
						<!-- Form Pembayaran -->
                        <form action="<?php echo base_url('Snap')?>" method="post">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="namaPemesan" placeholder="Nama Lengkap" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Alamat Lengkap</label>
                                <input type="text" name="alamat" placeholder="Alamat Lengkap" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" name="noTelp" placeholder="No Telepon" class="form-control">
                            </div>
                            
                            <button type="submit" class="btn btn-sm btn-primary mb-4">Pesan</button>
                    </form>
                    <?php }else{
                        echo "<h4>Keranjang Belanja Anda Masih Kosong</h4>";
                    }?>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </section>
</div>
