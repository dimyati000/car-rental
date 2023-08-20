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
    </style>
</head>

<body>
    <div style="margin:-25px;">
        <table style="width:100%;border:1px solid black;">
            <tbody>
                <tr>
                    <td style="width:50%;">
                        <table class="table" style="text-align:left;">
                            <tbody class="head-lap">
                                <tr>
                                    <td width="20%">
                                        <div style="width:200px;">
                                            <img style="width:100%;" src="<?= $image_base64 ?>" alt="">
                                        </div>
                                    </td>
                                    <td width="70%" class="text-center" colspan="2">
                                        <span style="font-size:15px">LAPORAN DATA KASIR CAR RENTAL</span> <br>
                                        <span style="font-size:12px">Jl.Semeru No.36 Ajung Pancakarya, Kabupaten Jember,
                                            Jawa Timur</span> <br>
                                        <span style="font-size:12px">Email : rahmahtiyas@gmail.com</a></span>
                                        <span style="font-size:12px">Telepon : 082 221 337 795</span>
                                    </td>
                                    <td width="10%"></td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="">
                            <tr>
                                <td>Nama Penyewa</td>
                                <td>: …………………………</td>
                                <td>No. Telp</td>
                                <td>: ………………….</td>
                            </tr>
                           
                        </table>
                    </td>
                    <td style="width:50%;">
                        <!-- persyaratan -->
                        <table style="border:1px solid black;">
                            <tr>
                                <td>1. Sewa mobil minimal 24 jam untuk hari Jum’at, Sabtu, Minggu atau Hari Libur
                                    Nasional.</td>
                            </tr>
                            <tr>
                                <td>2. Harus ada jaminan motor legal, Tahun pembuatan diatas 2015 yang dilampiri STNK,
                                    KTP, KK, atau SIM dan rekening listrik atas nama penyewa.</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>