<title>Edit Data Mobil</title>

<body>
    <div class="main-wrapper">
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Data Mobil</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="<?= site_url('Dashboard') ?>">Dashboard</a></div>
                        <div class="breadcrumb-item active"><a href="<?= site_url('Mobil') ?>">Data Mobil</a></div>
                        <div class="breadcrumb-item">Edit Data Mobil</div>
                    </div>
                </div>

                <!-- <div class="main-content"> -->
                <div class="container">
                    <!-- <div class="row justify-content-center"> -->
                    <div class="card shadow-lg border-0 rounded-lg mt-50">
                        <section class="section">
                            <div class="section-header">
                                <h1>Edit Data Mobil</h1>
                            </div>
                            <div class="section-body">
                                <div class="container-fluid">
                                    <!-- Form Edit Layanan -->
                                    <?php foreach ($mobil as $m) : ?>
                                    <form action="<?php echo base_url() . 'Mobil/updateMobil' ?>" method="post"
                                        enctype="multipart/form-data" autocomplete="off">
                                        <input type="hidden" name="idMobil" class="form-control"
                                            value="<?php echo $m->idMobil ?>">
                                        <div class="form-group">
                                            <label>Jenis Mobil</label>
                                            <input type="text" name="jenisMobil" class="form-control"
                                                value="<?php echo $m->jenisMobil ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Merk Mobil</label>
                                            <input type="text" name="merkMobil" class="form-control"
                                                value="<?php echo $m->merkMobil ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nopol</label>
                                            <input type="text" name="nopol" class="form-control"
                                                value="<?php echo $m->nopol ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <input type="text" name="tahun" class="form-control"
                                                value="<?php echo $m->tahun ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga 12 Jam</label>
                                            <input type="text" name="harga12" class="form-control"
                                                value="<?php echo $m->harga12 ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga 24 jam</label>
                                            <input type="text" name="harga24" class="form-control"
                                                value="<?php echo $m->harga24 ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Bahan Bakar</label>
                                            <input type="text" name="bahanBakar" class="form-control"
                                                value="<?php echo $m->bahanBakar ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Warna</label>
                                            <input type="text" name="warna" class="form-control"
                                                value="<?php echo $m->warna ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Denda</label>
                                            <input type="text" name="denda" class="form-control"
                                                value="<?php echo $m->denda ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Seat</label>
                                            <input type="text" name="seat" class="form-control"
                                                value="<?php echo $m->seat ?>">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label>Status Tersedia</label>
                                            <input type="text" name="statusTersedia" class="form-control"
                                                value="<?php echo $m->statusTersedia ?>">
                                        </div> -->
                                        <div class="form-group">
                                            <label>Gambar Mobil</label>
                                            <br>
                                            <img style="width: 5rem;"
                                                src="<?php echo base_url() . 'assets/uploads/mobil/' . $m->gambarMobil ?>">
                                            <input type="file" name="gambarMobil" class="form-control">
                                            <p style="font-size: 11px;color: red">Abaikan jika tidak merubah gambar mobil
                                            </p>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
                                        <br>
                                        <br>
                                        <br>
                                    </form>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
        </div>