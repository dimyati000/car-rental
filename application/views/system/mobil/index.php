<title><?= $title ?></title>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Master Data Mobil</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Data Mobil</h5>
                        </div>
                        <div class="section-body">
                            <div class="card-body">
                                <div class="row" style="padding-top:12px;">
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
    </section>
</div>

<style>
.fileUpload {
    position: relative;
    overflow: hidden;
}

.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin-top: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    /* filter: alpha(opacity=0); */
}
</style>

<!-- Tambah Data Mobil -->
<div class="modal fade" id="tambahMobil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo base_url() . 'Mobil/tambahMobil'; ?>"
                    enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" class="form-control" name="idMobil"></input>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Jenis Mobil</label>
                            <input type="text" name="jenisMobil" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Merk Mobil</label>
                            <input type="text" name="merkMobil" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Harga 12 jam</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Rp.
                                    </div>
                                </div>
                                <input type="text" name="harga12" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Harga 24 jam</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Rp.
                                    </div>
                                </div>
                                <input type="text" name="harga24" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Denda</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Rp.
                                    </div>
                                </div>
                                <input type="text" name="denda" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Bahan Bakar</label>
                            <input type="text" name="bahanBakar" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Warna</label>
                            <input type="text" name="warna" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Nopol</label>
                            <input type="text" name="nopol" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Tahun</label>
                            <input type="number" name="tahun" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Kursi</label>
                            <input type="number" name="seat" class="form-control">
                        </div>
                        <div class="form-group col-md-5">
                            <label>Gambar Mobil</label>
                            <input type="text" id="uploadFile" readonly name="gambarMobil" class="form-control"
                                placeholder="Pilih File...">
                            <!-- <input type="file" name="gambarMobil" class="form-control"> -->
                        </div>
                        <div class="form-group col-md-1 mt-4">
                            <div class="row">
                                <div class="fileUpload btn btn-info" style="padding: 0.7rem 0.7rem;">
                                    <span>Upload</span>
                                    <input id="uploadBtn" name="gambarMobil" type="file" class="upload" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="control-label">Status Tersedia</div>
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="statusTersedia" class="custom-switch-input" value="1">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Tidak / Ya</span>
                            </label>
                        </div>
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

<script>
document.getElementById("uploadBtn").onchange = function() {
    document.getElementById("uploadFile").value = this.files[0].name;
};
</script>
<!-- DATA SORT -->
<input type="hidden" name="hidden_id_th" id="hidden_id_th" value="#column_created">
<input type="hidden" name="hidden_page" id="hidden_page" value="1">
<input type="hidden" name="hidden_column_name" id="hidden_column_name" value="idMobil">
<input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc">
<div id="div_modal"></div>
<script src="<?= base_url('assets/js/page/mobil.js') ?>"></script>
</html>