<?php
  $path_logo = base_url('assets/img/logo-evano.png');
  $type = pathinfo($path_logo, PATHINFO_EXTENSION);
  $data = file_get_contents($path_logo);
  $image_base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>


<!DOCTYPE html>
<html>

<head>
    <title><?=$title?></title>
    <style>
    .table {
      /* border-collapse: collapse; */
      border-color: black;
      font-family: TimesNewRoman, Times New Roman, Times, Baskerville, Georgia, serif;
      width: 100%;
    }
    td {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 11px;
      text-align: justify;
    }
    </style>
</head>

<body>
    <div style="margin:-25px;">
        <table style="width:100%;border:1px solid black;">
            <tbody>
                <tr>
                    <td style="width:50%;">
                        <div style="margin:10px">
                        <table class="table" style="text-align:center;">
                                <tr>
                                    <td width="20%">
                                        <div>
                                            <img style="width:100%;" src="<?= $image_base64 ?>" alt="">
                                        </div>
                                    </td>
                                    <td width="80%" style="text-align:center;">
                                        <span style="font-size:20px; font-weight:bold;">EVANO TRANS</span>
                                        <br>
                                        <span style="font-weight:bold;">Persewaan Mobil Lepas Kunci, Melayani Sewa Harian/Mingguan/Bulanan</span>
                                        <br>
                                        <span style="font-weight:bold;">Taman Dhika Cluster Bromo B-17 Sidokerto, Buduran – Sidoarjo</a></span>
                                        <br>
                                        <span style="font-weight:bold;">WA : 0857 9575 1979</span>
                                    </td>
                                </tr>
                        </table>
                        <hr style="border:1px solid black;">
                        <hr style="border:1px solid black;">
                        <table class="table">
                            <tr>
                                <td style="text-align:center;font-size:15px; font-weight:bold;">EVANO TRANS</td>
                            </tr>
                            <tr>
                                <td style="text-align:right;">NO : <?= isset($dataSewa) ? $dataSewa['noSewa'] : '' ?></td>
                            </tr>
                        </table>
                        <br>
                        <!-- <table class="table"></table> -->
                        <table class="table">
                                <tr>
                                    <td width="20%">Nama Penyewa</td>
                                    <td width="1%">:</td>
                                    <td width="29%"><?= isset($dataSewa) ? $dataSewa['namaPelanggan'] : '' ?></td>
                                    <td width="10%">No. Telp</td>
                                    <td width="1%">:</td>
                                    <td width="39%"><?= isset($dataSewa) ? $dataSewa['noTelp'] : '' ?></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:top;">Alamat</td>
                                    <td style="vertical-align:top;">:</td>
                                    <td colspan="4"><?= isset($dataSewa) ? $dataSewa['alamat'] : '' ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Mobil</td>
                                    <td>:</td>
                                    <td><?= isset($dataSewa) ? $dataSewa['jenisMobil'] : '' ?></td>
                                    <td>NOPOL</td>
                                    <td>:</td>
                                    <td><?= isset($dataSewa) ? $dataSewa['nopol'] : '' ?></td>
                                </tr>
                        </table>
                        </div>
                    </td>
                    <td style="width:50%;">
                        <!-- persyaratan -->
                        <div style="border:1px solid black;margin:5px;">
                        <div style="padding-left: 10px;padding-top:5xpx;">
                            <span style="font-weight:bold;">Persyaratan dan Ketentuan :</span>
                        </div>
                          <table>
                              <tr>
                                  <td width="2%" style="vertical-align:top; padding-left:10px;">1.</td>
                                  <td width="98%">Sewa mobil minimal 24 jam untuk hari Jum’at, Sabtu, Minggu atau Hari Libur
                                      Nasional.</td>
                              </tr>
                              <tr>
                                  <td style="vertical-align:top; padding-left:10px;">2.</td>
                                  <td>Harus ada jaminan motor legal, Tahun pembuatan diatas 2015 yang dilampiri STNK,
                                      KTP, KK, atau SIM dan rekening listrik atas nama penyewa.</td>
                              </tr>
                              <tr>
                                  <td style="vertical-align:top; padding-left:10px;">3.</td>
                                  <td>Uang sewa harus dibayar lunas 100% pada saat pengambilan mobil dan seluruh keperluan BBM menjadi tanggungjawab PENYEWA (BBM minimal harus diisi sesuai pada saat mobil diambil PENYEWA).</td>
                              </tr>
                              <tr>
                                  <td style="vertical-align:top; padding-left:10px; ">4.</td>
                                  <td>DP yang sudah dibayarkan tidak dapat dikembalikan tetapi dapat dijadikan DP di tanggal lain.</td>
                              </tr>
                              <tr>
                                  <td style="vertical-align:top; padding-left:10px; ">5.</td>
                                  <td>Bila PENYEWA ingin memperpanjang masa sewa, PENYEWA diwajibkan melapor & mengisi FORM ORDER ke kantor EVANO TRANS. Jika PENYEWA tidak menghiraukan peraturan tersebut, maka PENYEWA dianggap telah melarikan Mobil tersebut, sehingga pihak EVANO TRANS berhak menyelesaikan secara hukum serta denda sebesar Rp 1.000.000,-  untuk setiap hari keterlambatan.</td>
                              </tr>
                              <tr>
                                  <td style="vertical-align:top; padding-left:10px; ">6.</td>
                                  <td>Selama perjanjian sewa berlangsung, apabila terjadi kerusakan atau kehilangan perlengkapan mobil & dokumen mobil akibat kesalahan atau kelalaian PENYEWA, maka PENYEWA bertanggungjawab penuh memperbaiki kerusakan dan mengganti segala yang hilang atas biaya dari penyewa serta mengembalikan mobil sebagaimana keadaan semula pada saat diambil. Dan selama perbaikan kerusakan penyewa tetap dikenakan biaya sewa 100% per hari sampai mobil diterima kembali oleh EVANO TRANS.</td>
                              </tr>
                              <tr>
                                  <td style="vertical-align:top; padding-left:10px; ">7.</td>
                                  <td>Apabila mobil yang disewa hilang  selama masa sewa belum berakhir, maka penyewa bertanggungjawab untuk mengganti mobil yang hilang tersebut dengan jenis mobil dan tahun pembuatan yang sama dengan tenggang waktu 3 hari sejak mobil disewa tersebut hilang.</td>
                              </tr>
                              <tr>
                                  <td style="vertical-align:top; padding-left:10px; ">8.</td>
                                  <td>Pelanggan dilarang keras merokok di dalam mobil, saat pengembalian mobil telah dicuci bersih dan overtime tarif 10% per jam dari tarif per hari.</td>
                              </tr>
                              <tr>
                                  <td style="vertical-align:top; padding-left:10px; ">9.</td>
                                  <td>Selama menggunakan mobil yang disewa oleh penyewa maupun orang lain atas ijin penyewa, jika terjadi pelanggaran lalu lintas dan kriminalitas yang menyebabkan diterbitkan surat tilang  oleh polisi, maka penyewa bertanggung jawab sepenuhnya untuk menyelesaikan masalah tersebut baik tingkat kepolisian maupun Pengadilan dan harus diselesaikan sebelum masa sewa berakhir serta biaya ditanggung sepenuhnya oleh penyewa.</td>
                              </tr>
                              <tr>
                                  <td style="vertical-align:top; padding-left:10px; ">10.</td>
                                  <td>Bila terjadi kerusakan (Kecelakaan) PENYEWA wajib mengganti biaya administrasi sebesar sejumlah yang telah ditentukan oleh pihak Bengkel dan membayar uang sewa 100% perhari sesuai tarif yang berlaku selama mobil dalam masa perbaikan. PENYEWA wajib lapor ke EVANO TRANS juga tidak diperkenankan memperbaiki mobil disewa ke bengkel atau tempat yang tidak direkomendasikan.</td>
                              </tr>
                              <tr>
                                  <td style="vertical-align:top; padding-left:10px; ">11.</td>
                                  <td>Jika PENYEWA menjaminkan atau menggadaikan atau memindah tangankan hak sewanya kepada pihak lain maka PENYEWA  dikenakan SANKSI denda sebesar 5.000.000,- dan bertanggung jawab terhadap semua resiko yang diakibatkan.</td>
                              </tr>
                              <tr>
                                  <td style="vertical-align:top; padding-left:10px; ">12.</td>
                                  <td>Bila PENYEWA tidak sanggup menyelesaikan biaya sewa atau biaya perbaikan, maka EVANO TRANS berhak menyita barang jaminan sesuai dengan jumlah tagihan dan berhak meminta biaya sewa ( sewa perbaikan ) jika ada kekurangan.</td>
                              </tr>
                              <tr>
                                  <td style="vertical-align:top; padding-left:10px; ">13.</td>
                                  <td>PENYEWA tidak diperkenankan menggunakan mobil sewa untuk tindakan kejahatan, perampokan, narkoba atau semua tindakan yang melanggar hukum.</td>
                              </tr>
                              <tr>
                                  <td style="vertical-align:top; padding-left:10px; ">14.</td>
                                  <td>Pihak EVANO TRANS menyediakan jasa sopir, tetapi jika terjadi kerusakan ( Contoh : Kecelakaan ) maka biaya yang dikeluarkan untuk perbaikan ditanggung PENYEWA.</td>
                              </tr>
                              <tr>
                                  <td style="vertical-align:top; padding-left:10px; ">15.</td>
                                  <td>Apabila penyewa melanggar / mengingkari perjanjian sewa, maka penyewa dikenakan ganti rugi pada EVANO TRANS dan siap diproses secara hukum.</td>
                              </tr>
                          </table>
                        </div>
                        <table style="width:100%">
                            <tr>
                                <td width="60%">EVANO TRANS</td>
                                <td width="40%">Sidoarjo, </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td>PENYEWA, </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>