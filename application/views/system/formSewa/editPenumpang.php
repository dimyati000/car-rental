<title>Edit Data Penumpang</title>

<body>
    <div class="main-wrapper">
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Data Penumpang</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="<?= site_url('Dashboard') ?>">Dashboard</a></div>
                        <div class="breadcrumb-item active"><a href="<?= site_url('FormSewa') ?>">Data Penumpang</a>
                        </div>
                        <div class="breadcrumb-item">Edit Data Penumpang</div>
                    </div>
                </div>

                <!-- <div class="main-content"> -->
                <div class="container">
                    <!-- <div class="row justify-content-center"> -->
                    <div class="card shadow-lg border-0 rounded-lg mt-50">
                        <section class="section">
                            <div class="section-header">
                                <h1>Edit Data Penumpang</h1>
                            </div>
                            <div class="section-body">
                                <div class="container-fluid">
                                    <!-- Form Edit Sewa Penumpang -->
                                    <?php foreach ($dataSewa as $p) : ?>
                                    <form action="<?php echo base_url() . 'FormSewa/updateDataPenumpang' ?>"
                                        method="post" enctype="multipart/form-data" autocomplete="off">
                                        <input type="hidden" class="form-control" name="idSewa"
                                            value="<?php echo $p->idSewa ?>"></input>
                                        <input type="hidden" name="idSewa" value="<?php echo $p->idSewa ?>"
                                            class="form-control">
                                        <input type="hidden" name="tipeSewa" class="form-control" value="SP">
                                        <input type="hidden" id="listJaminan" class="form-control" value="<?php echo $p->idJaminan ?>">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Nomor Sewa</label>
                                                <input type="text" name="noSewa" class="form-control"
                                                    value="<?php echo $p->noSewa ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Jaminan</label>
                                                <select name="idJaminan[]"
                                                    class="form-control select2 select2-hidden-accessible jaminans"
                                                    id="idJaminan" multiple="multiple" required>
                                                    <option value="">Pilih Jaminan</option>
                                                    <?php foreach ($jaminan as $j)  :  ?>
                                                        <option value="<?= $j->idJaminan ?>" 
                                                            >
                                                            <?= $j->namaJaminan; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Nama Pelanggan</label>
                                                <select name="idPelanggan"
                                                    class="form-control select2 select2-hidden-accessible"
                                                    id="idPelanggan" required>
                                                    <option value="">Pilih Pelanggan</option>
                                                    <?php foreach ($pelanggan as $pp)  :  ?>
                                                    <option value="<?= $pp->idPelanggan ?>" <?php if ($pp->idPelanggan==$p->pelangganId) {
                                                            echo " selected";
                                                        } ?>><?= $pp->namaPelanggan; ?>
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
                                                    <option value="<?= $m->idMobil ?>"
                                                        <?php if ($m->idMobil==$p->mobilId) {
                                                            echo " selected";
                                                        } ?>
                                                    ><?= $m->jenisMobil; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Tanggal Berangkat</label>
                                                <input type="date" name="tglBerangkat" id="tglBerangkat"
                                                    class="form-control" value="<?php echo $p->tglBerangkat ?>" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="id_end_time">Jam Berangkat</label>
                                                <div class="input-group date" id="jamBerangkat">
                                                    <input type="text" name="jamBerangkat" class="form-control"
                                                        placeholder="End time" title="" required id="id_end_time" value="<?php echo $p->jamBerangkat ?>"/>
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
                                                    class="form-control" value="<?php echo $p->tglKembali ?>" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="id_end_time">Jam Pengembalian:</label>
                                                <div class="input-group date" id="jamKembali">
                                                    <input type="text" name="jamKembali" class="form-control"
                                                        placeholder="End time" title="" required id="id_end_time" value="<?php echo $p->jamKembali ?>"/>
                                                    <div class="input-group-addon input-group-append">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-clock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Rute</label>
                                                <input type="text" name="rute" class="form-control" value="<?php echo $p->rute ?>" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Tipe Tarif</label>
                                                <select class="form-control select2 select2-hidden-accessible"
                                                    tabindex="-1" aria-hidden="true" name="tipeTarif" id="tipeTarif" onchange="changeTarif()">
                                                    <option>Pilih Tipe Tarif</option>
                                                    <option value="12"
                                                        <?php if ($p->tipeTarif=='12') {
                                                            echo " selected";
                                                        } ?>
                                                    >12 Jam</option>
                                                    <option value="24"
                                                        <?php if ($p->tipeTarif=='24') {
                                                            echo " selected";
                                                        } ?>
                                                    >24 Jam</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label>Lama Sewa</label>
                                                <input type="text" name="lamaSewa" id="lamaSewa" class="form-control"
                                                    value="1" required value="<?php echo $p->lamaSewa ?>">
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
                                                    <input type="text" name="totalTarif" id="totalTarif"
                                                        class="form-control" value="<?php echo $p->totalTarif ?>">
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
                                                    <input type="text" name="dp" id="dp" class="form-control" value="<?php echo $p->dp ?>"> 
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
                                                        class="form-control" readonly value="<?php echo $p->kurangBayar ?>">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Denda</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Rp.
                                                        </div>
                                                    </div>
                                                    <input type="text" name="denda" id="denda" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Jasa Antar</label>   
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            Rp.
                                                        </div>
                                                    </div>
                                                    <input type="text" name="jasaAntar" id="jasaAntar"
                                                        class="form-control" required value="<?php echo $p->jasaAntar ?>">
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
                                                    <input type="text" name="jasaSopir" id="jasaSopir"
                                                        class="form-control" required value="<?php echo $p->jasaSopir ?>">
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
                                                    <input type="text" name="overtime" id="overtime"
                                                        class="form-control" required value="<?php echo $p->overtime ?>">
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
                                                        class="form-control" value="<?php echo $p->totalBayar ?>">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Keterangan</label>
                                                <input type="text" name="keterangan" class="form-control" value="<?php echo $p->keterangan ?>"
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
                                    <?php endforeach; ?>
                                </div>
                            </div>
                    </div>
                </div>
        </div>
    </div>
    </section>
    </div>
    </div>


    <script>
    var listJaminan = new Array();
    var options = $('#idJaminan option');
    var listJaminan = $.map(options ,function(option) {
        return option.value;
    });

    var selectedValues = new Array();
    let jaminanStr = $("#listJaminan").val();
    let jaminans = jaminanStr.split(",");
    let detail = []
    for (let i = 0; i < jaminans.length; i++) {
        const el = jaminans[i];
        if (el!="") {
            let cek = cekJaminan(jaminans, el);
            detail.push(cek); 
        }
    }

    for (let i = 0; i < detail.length; i++) {
        const el = detail[i];
        selectedValues[i] = el;
    }
    $(".jaminans").val(selectedValues);

    function cekJaminan(arr, val){
        let res = null
        for (let i = 0; i < arr.length; i++) {
            const el = arr[i];
            if (el==val) {
                res = val.trim()
                break;
            }
        }

        return res
    }

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
                if (tipeTarif == '12') {
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
        // var user_ids = ['e0e616d7-9af0-4334-8cfb-e51024979895','e27ecfba-8c67-44ce-a1fd-1a778939591d'];
        // $('#idJaminan').val(user_ids);
        // $(".select2").select2();
    });


    $("#tipeTarif").on("change", function(e) {
        var idMobil = $('#idMobil').val();
        getMobil(idMobil)
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
        var totalTarifRupiahValue = $('#totalTarif').val().replace(/\./g,
            ''); // Menghapus semua titik dari javascript
        // var totalTarifRupiahValue = replaceRupiah($('#totalTarif').val()); // Menghapus semua titik dengan fungsi manual
        var totalTarif = parseFloat(totalTarifRupiahValue);
        var kurangBayar = totalTarif - dInput;
        console.log("Nilai dInput: " + dInput);
        console.log("Nilai totalTarif: " + totalTarif);
        console.log("Nilai kurangBayar: " + kurangBayar);
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


    // $('#YourSelect2Control').select2();
    </script>