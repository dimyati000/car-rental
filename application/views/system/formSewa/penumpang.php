
<title>Form Sewa Penumpang</title>

<div class="main-wrapper main-wrapper-1">
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <!-- <div class="section-header">
				<h1>Master Data Jaminan</h1>
			</div> -->
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Form Sewa Penumpang</h5>
                            </div>
                            <div class="section-body">
                                <div class="card-body">
                                    <!-- Form Tambah Sewa Penumpang -->
                                    <form action="<?php echo base_url() . 'FormSewa/tambahDataPenumpang' ?>"
                                        method="post" enctype="multipart/form-data" autocomplete="off">
                                        <input type="hidden" class="form-control" name="idSewa" value=""></input>
                                        <!-- <input type="hidden" name="idPelanggan" class="form-control"> -->
                                        <input type="hidden" name="tipeSewa" class="form-control" value="SP">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Nomor Sewa</label>
                                                <input type="text" name="noSewa" class="form-control"
                                                    value="<?= $kodeSewa ?>" readonly required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Jaminan</label>
                                                <select name="idJaminan[]"
                                                    class="form-control select2 select2-hidden-accessible"
                                                    id="idJaminan" multiple="multiple" required>
                                                    <option value="">Pilih Jaminan</option>
                                                    <?php foreach ($jaminan as $j)  :  ?>
                                                    <option value="<?= $j->idJaminan ?>"><?= $j->namaJaminan; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Nama Pelanggan</label>
                                                <select name="idPelanggan"
                                                    class="form-control select2"
                                                    id="idPelanggan" required>
                                                    <option value="">Pilih Pelanggan</option>
                                                    <?php foreach ($pelanggan as $p)  :  ?>
                                                    <option value="<?= $p->idPelanggan ?>"><?= $p->namaPelanggan; ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Mobil</label>
                                                <select name="idMobil"
                                                    class="form-control select2 select2-hidden-accessible" id="idMobil"
                                                    required>
                                                    <option value="">Pilih Mobil</option>
                                                    <?php foreach ($mobil as $m)  :  ?>
                                                    <option value="<?= $m->idMobil ?>"><?= $m->jenisMobil; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Tanggal Berangkat</label>
                                                <input type="date" name="tglBerangkat" id="tglBerangkat"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="id_end_time">Jam Berangkat</label>
                                                <div class="input-group date" id="jamBerangkat">
                                                    <input type="text" name="jamBerangkat" class="form-control"
                                                        placeholder="End time" title="" required id="id_end_time" />
                                                    <div class="input-group-addon input-group-append">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-clock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Tanggal Pengembalian</label>
                                                <input type="date" name="tglKembali" id="tglKembali"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="id_end_time">Jam Pengembalian:</label>
                                                <div class="input-group date" id="jamKembali">
                                                    <input type="text" name="jamKembali" class="form-control"
                                                        placeholder="End time" title="" required id="id_end_time" />
                                                    <div class="input-group-addon input-group-append">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-clock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Rute</label>
                                                <input type="text" name="rute" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Tipe Tarif</label>
                                                <select class="form-control select2 select2-hidden-accessible"
                                                    tabindex="-1" aria-hidden="true" name="tipeTarif" id="tipeTarif" onchange="changeTarif()">
                                                    <option>Pilih Tipe Tarif</option>
                                                    <option value="3">3 Jam</option>
                                                    <option value="6">6 Jam</option>
                                                    <option value="12">12 Jam</option>
                                                    <option value="24">24 Jam</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label>Lama Sewa</label>
                                                <input type="text" name="lamaSewa" id="lamaSewa" class="form-control"
                                                    value="1" required>
                                                <input type="hidden" name="hargaSewa" id="hargaSewa"
                                                    class="form-control" value="0">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Total Tarif</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Rp.
                                                        </div>
                                                    </div>
													<input type="text" name="totalTarif" id="totalTarif" class="form-control" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Uang Muka (DP)</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Rp.
                                                        </div>
                                                    </div>
                                                    <input type="text" name="dp" id="dp" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Kurang Bayar</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Rp.
                                                        </div>
                                                    </div>
                                                    <input type="text" name="kurangBayar" id="kurangBayar"
                                                        class="form-control" readonly>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group col-md-2">
                                                <label>Denda</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Rp.
                                                        </div>
                                                    </div>
                                                    <input type="text" name="denda" id="denda" class="form-control" value="0"
                                                        required>
                                                </div>
                                            </div> -->
                                            <div class="form-group col-md-2">
                                                <label>Jasa Antar</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Rp.
                                                        </div>
                                                    </div>
                                                    <input type="text" name="jasaAntar" id="jasaAntar" class="form-control" value="0"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Jasa Sopir</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Rp.
                                                        </div>
                                                    </div>
                                                    <input type="text" name="jasaSopir" id="jasaSopir" class="form-control" value="0"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Overtime</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Rp.
                                                        </div>
                                                    </div>
                                                    <input type="text" name="overtime" id="overtime" class="form-control" value="0"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Total Bayar</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Rp.
                                                        </div>
                                                    </div>
                                                    <input type="text" name="totalBayar" id="totalBayar"
                                                        class="form-control" value="0">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Keterangan</label>
                                                <input type="text" name="keterangan" class="form-control" value="-"
                                                    required>
                                            </div>
                                        </div>
                                        <!-- <div class="modal-footer"> -->
                                        <div style="text-align:right">
                                            <?php echo anchor('FormSewa', '<div class="btn btn-secondary"> Batal</div>') ?>
                                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                                        </div>
                                        <!-- </div> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/modules/select2/dist/js/select2.full.min.js"></script>
<script> 
$(".select2").select2();
$('#jamBerangkat').datetimepicker({
    "allowInputToggle": true,
    "showClose": true,
    "showClear": true,
    "showTodayButton": true,
    "format": "HH:mm:ss",
});
$('#jamKembali').datetimepicker({
    "allowInputToggle": true,
    "showClose": true,
    "showClear": true,
    "showTodayButton": true,
    "format": "HH:mm:ss",
});

function getMobil(idMobil) {
    $.ajax({
        url: base_url + "/FormSewa/load_mobil",
        type: 'POST',
        dataType: 'JSON',
        data: {
            idMobil: idMobil,
        },
        beforeSend: function() {},
        success: function(result) {
            var lamaSewa = $('#lamaSewa').val();
            var tipeTarif = $('#tipeTarif').val();
            if (tipeTarif == '3') {
                $('#hargaSewa').val(result.data.harga3);
                var totalTarif = lamaSewa * $('#hargaSewa').val();
            } else if (tipeTarif == '6') {
                $('#hargaSewa').val(result.data.harga6);
                var totalTarif = lamaSewa * $('#hargaSewa').val();
            } else if (tipeTarif == '12') {
                $('#hargaSewa').val(result.data.harga12);
                var totalTarif = lamaSewa * $('#hargaSewa').val();
            } else if (tipeTarif == '24') {
                $('#hargaSewa').val(result.data.harga24);
                var totalTarif = lamaSewa * $('#hargaSewa').val();
            }
            $('#dp').val('0');
            $('#kurangBayar').val('0');
            $('#totalTarif').val(formatRupiah(totalTarif));
        }
    });
}

//   $("#idMobil").on("change", function (e) {
// 		var idMobil = e.target.value;
// 		getMobil(idMobil);
// 	});

$(document).ready(function() {
	// var dpinput = $('#dpRuppiah').val();
  
});

function changeTarif(){
    var idMobil = $('#idMobil').val();
    getMobil(idMobil)
}

$('#lamaSewa').on("input", function() {
    var dInput = this.value;
    var tarifTotal = dInput * $('#hargaSewa').val();
    $('#totalTarif').val(formatRupiah(tarifTotal));
});

// $('#totalBayar').mask('#.##0', {reverse: true});
// $('#denda').mask('#.##0', {reverse: true});
// $('#overtime').mask('#.##0', {reverse: true});
// $('#jasaAntar').mask('#.##0', {reverse: true});
// $('#jasaSopir').mask('#.##0', {reverse: true});
$('#dp').on("input", function() {
	var dInput = parseFloat(replaceRupiah(this.value));
    var totalTarifRupiahValue = $('#totalTarif').val().replace(/\./g, ''); // Menghapus semua titik dari javascript
    // var totalTarifRupiahValue = replaceRupiah($('#totalTarif').val()); // Menghapus semua titik dengan fungsi manual
	var totalTarif = parseFloat(totalTarifRupiahValue);
	var kurangBayar = totalTarif - dInput;
    $('#kurangBayar').val(formatRupiah(kurangBayar));
});	

$('#totalBayar'),
function() {
    var totalTarif = $('#totalTarif').val();
    var jasaSopir = $('#jasaSopir').val();
    var jasaAntar = $('#jasaAntar').val();
    var totalBayar = totalTarif + $('#jasaSopir').val() + $('#jasaAntar').val();
    $('#totalBayar').val(totalBayar);
};

function formatRupiah(angka, prefix) {
    var number_string = angka.toString(),
        split = number_string.split(","),
        sisa = number_string.length % 6,
        rupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

function replaceRupiah(val) {
    if (!val) {
        return 0
    }
    return val.replace(".", "");
}
</script>