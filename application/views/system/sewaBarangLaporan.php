<?php
  $path_logo = base_url('assets/img/logo-evanotrans.png');
  $type = pathinfo($path_logo, PATHINFO_EXTENSION);
  $data = file_get_contents($path_logo);
  $logo_evano = 'data:image/' . $type . ';base64,' . base64_encode($data);

  $path_checklist = base_url('assets/img/checklist-mobil.png');
  $type = pathinfo($path_checklist, PATHINFO_EXTENSION);
  $data = file_get_contents($path_checklist);
  $checklist_mobil = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>


 <!DOCTYPE html>
 <html>

 <head>
 	<title><?=$title?></title>
 	<style>
 		.table {
    border-collapse: collapse;
    border-color: black;
    font-family: TimesNewRoman, Times New Roman, Times, Baskerville, Georgia, serif;
    width: 100%;
  }

  .head-table th {
    padding: 10px;
    border: 1px solid black;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
  }

  .body-table td,
  th {
    padding: 10px;
    border: 1px solid black;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 11px;
  }

  .head-lap td {
    padding: 1px;
    font-family: Arial, Helvetica, sans-serif;
  }

  .text-center {
    text-align: center;
  }

  .text-left {
    text-align: left;
  }

  .text-right {
    text-align: right;
  }

  .line-title {
    border: 0;
    border-style: inset;
    border-top: 2px solid #000;
  }

  .line-title-child {
    border: 0;
    margin-top: -7px;
    border-top: 1px solid #000;
  }

  .page_break {
    page-break-before: always;
  }

  .kata-pengantar {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 13px;
  }
 	</style>
 </head>

 <body>
 	<table>
 		<tbody>
 			<div>
 				<table class="table" style="text-align:center;">
 					<tr>
 						<td width="20%">
 							<div>
 								<img style="width:100%;" src="<?= $logo_evano ?>" alt="">
 							</div>
 						</td>
 						<td width="80%" style="text-align:center;">
 							<span style="font-size:22px; font-weight:bold;">EVANO TRANS</span>
 							<br>
 							<span style="font-weight:bold;">Persewaan Mobil Lepas Kunci, Melayani Sewa
 								Harian/Mingguan/Bulanan</span>
 							<br>
 							<span style="font-weight:bold;">Taman Dhika Cluster Bromo B-17 Sidokerto, Buduran –
 								Sidoarjo</a></span>
 							<br>
 							<span style="font-weight:bold;">WA : 0857 9575 1979</span>
 						</td>
 					</tr>
 				</table>
 				<hr class="line-title">
 				<p style="margin-top:35px;" class="kata-pengantar">Laporan Pelayanan Periode Tanggal :
 					2024 s/d 2024</p>
 				<table class="table">
                 <thead class="head-table">
 						<tr>
 							<th>No</th>
 							<th>Tanggal Berangkat</th>
 							<th>Nama Penyewa</th>
 							<th>Jenis Mobil</th>
 							<th>Tarif Sewa</th>
 							<th>Lama Sewa</th>
 							<th>Harga Total</th>
 						</tr>
 					</thead>
 					<tbody class="body-table">
                        <?php
                        $no = 1;
                        foreach ($dataSewa as $lpr) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo format_date($lpr->tglSewa, 'd-m-Y') ?></td>
                                <td><?php echo $lpr->namaPelanggan ?></td>
                                <td><?php echo $lpr->platNomor ?></td>
                                <td><?php echo $lpr->jenisKendala ?></td>
                                <td><?php echo $lpr->verifikasi ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
 					</tbody>
 				</table>
 		</tbody>
 	</table>
 </body>

 </html>
