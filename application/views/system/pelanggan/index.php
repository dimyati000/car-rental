<title><?= $title ?></title>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Master Data Pelanggan</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Data Pelanggan</h5>
                        </div>
                        <div class="section-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn btn-success" data-toggle="modal"
                                            data-target="#tambahPelanggan"><i class="fas fa-plus fa-sm"> Tambah
                                                Data</i></button>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="limit" id="limit" onchange="pageLoad(1)">
                                            <option value="10" selected>10 Baris</option>
                                            <option value="25">25 Baris</option>
                                            <option value="50">50 Baris</option>
                                            <option value="100">100 Baris</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" id="search" name="search" class="form-control"
                                                placeholder="Cari <Tekan Enter>">
                                            <div class="input-group-append cursor-pointer" onclick="pageLoad(1)">
                                                <span class="input-group-text">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div id="list"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>

<!-- Tambah Data Pelanggan -->
<div class="modal fade" id="tambahPelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
					use Ramsey\Uuid\Uuid;
					$uuid = Uuid::uuid4();
					?>
                <form method="POST" action="<?php echo base_url() . 'Pelanggan/tambahData'; ?>"
                    enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" class="form-control" name="idPelanggan" value="<?= $uuid ?>"></input>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Pelangan</label>
                        <input type="text" name="namaPelanggan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" name="noTelp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Foto KTP</label>
                        <input type="file" name="fotoKtp" class="form-control">
                    </div>

            </div>
            <div class="modal-footer bg-whitesmoke">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- DATA SORT -->
<input type="hidden" name="hidden_id_th" id="hidden_id_th" value="#column_created">
<input type="hidden" name="hidden_page" id="hidden_page" value="1">
<input type="hidden" name="hidden_column_name" id="hidden_column_name" value="idPelanggan">
<input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc">
<div id="div_modal"></div>
<script src="<?= base_url('assets/js/page/pelanggan.js') ?>"></script>