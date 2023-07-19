<title>Detail Booking</title>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Booking</h1>
                <?php
                        foreach($booking as $bkg):
                    ?>
            <div class="btn btn-sm btn-success">No Booking : <?php echo $bkg->idLayanan ?></div>
        </div>
        <div class="section-body">
            <div class="container-fluid">
				<!-- Ambil Data Detail Booking -->
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>Nama Pelanggan</th>
                        <td><?php echo $bkg->namaPelanggan ?></td>
                    </tr>
                    <tr>
                        <th>No Whatsapp</th>
                        <td><?php echo $bkg->noWA ?></td>
                    </tr>
                    <tr>
                        <th>Provinsi</th>
                        <td><?php echo $bkg->provinsi ?></td>
                    </tr>
                    <tr>
                        <th>Kabupaten / Kota</th>
                        <td><?php echo $bkg->kota ?></td>
                    </tr>
                    <tr>
                        <th>Kecamatan</th>
                        <td><?php echo $bkg->kecamatan ?></td>
                    </tr>
                    <tr>
                        <th>Desa</th>
                        <td><?php echo $bkg->desa ?></td>
                    </tr>
                    <tr>
                        <th>Dusun</th>
                        <td><?php echo $bkg->dusun ?></td>
                    </tr>
                    <tr>
                        <th>Tipe Kendaraan</th>
                        <td><?php echo $bkg->tipeKendaraan ?></td>
                    </tr>
                    <tr>
                        <th>Nama Kendaraan</th>
                        <td><?php echo $bkg->namaKendaraan ?></td>
                    </tr>
                    <tr>
                        <th>Merk Kendaraan</th>
                        <td><?php echo $bkg->merkKendaraan ?></td>
                    </tr>
                    <tr>
                        <th>Warna</th>
                        <td><?php echo $bkg->warna ?></td>
                    </tr>
                    <tr>
                        <th>Transmisi</th>
                        <td><?php echo $bkg->transmisi ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Bensin</th>
                        <td><?php echo $bkg->jenisBensin ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kendala</th>
                        <td><?php echo $bkg->jenisKendala ?></td>
                    </tr>
                    <br>
                    <?php endforeach;?>
                    <!-- <br>
                    <tr>
                        <th>Masukan Harga</th>
                        <td>
                            <div class="form-group">
                                <input type="text" name="totalHarga" class="form-control">
                            </div>
                        </td>
                    </tr>

                    <div class="d-flex justify-content-around">
                        <button type="submit" name="verifikasi" class="btn btn-success">Verifikasi Booking</button> -->
                        <a href="<?php echo base_url('Service/BookingService')?>"><div class="btn btn-sm btn-warning">Kembali</div></a>
                        
                    <!-- </div> -->
