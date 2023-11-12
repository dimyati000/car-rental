<title>Master Data Jaminan</title>

<body>
    <div class="main-wrapper">
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Jaminan</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="<?= site_url('Dashboard') ?>">Dashboard</a></div>
                        <div class="breadcrumb-item active"><a href="<?= site_url('Jaminan') ?>">Data Jaminan</a></div>
                        <div class="breadcrumb-item">Edit Data Jaminan</div>
                    </div>
                </div>

                <!-- <div class="main-content"> -->
                <div class="container">
                    <!-- <div class="row justify-content-center"> -->
                    <div class="card shadow-lg border-0 rounded-lg mt-50">
                        <section class="section">
                            <div class="section-header">
                                <h1>Edit Data Jaminan</h1>
                            </div>
                            <div class="section-body">
                                <div class="container-fluid">
                                    <!-- Form Edit Layanan -->
                                    <?php foreach ($jaminan as $j) : ?>
                                    <form action="<?php echo base_url() . 'Jaminan/update' ?>" method="post"
                                        autocomplete="off">
                                        <input type="hidden" name="idJaminan" class="form-control"
                                            value="<?php echo $j->idJaminan ?>">
                                        <div class="form-group">
                                            <label>Nama Jaminan</label>
                                            <input type="text" name="namaJaminan" class="form-control"
                                                value="<?php echo $j->namaJaminan ?>">
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