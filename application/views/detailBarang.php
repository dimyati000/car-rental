<title>Detail Barang</title>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Barang</h1>
        </div>

        <div class="section-body">
            <div class="container-fluid">
                <div class="card">
                    <h5 class="card-header">Detail Produk</h5>
                    <div class="card-body">
						<!-- Data Detail Barang -->
                        <?php foreach($barang as $brg):?>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?php echo base_url(). '/uploads/'. $brg->gambar?>" alt="" class="card-img-top">
                            </div>
                            <div class="col-md-8">
                            <form action="<?php echo base_url() . 'User/tambahKeranjang/'. $brg->idBarang ?>" method="post" class="needs-validation" novalidate="">
                                <table class="table">
                                    <tr>
                                        <td>Nama Produk</td>
                                        <td><strong><?php echo $brg->namaBarang?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td><strong><?php echo $brg->kategori?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td><strong><?php echo $brg->stok?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td><strong><?php echo $brg->keterangan?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td><strong><div class="btn btn-sm btn-success">Rp <?php echo number_format($brg->harga, 0, ',', '.')?></div></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah</td>
                                        <td><input value="1" name="qty" type="number" class="form-control"  required></td>
                                    </tr>
                                </table>  
                                <button type="submit" class="btn btn-primary">Add Cart</button>                                 
                                <?php echo anchor('../User', '<div class="btn btn-md btn-warning">Kembali</div>')?>
                                </form>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
