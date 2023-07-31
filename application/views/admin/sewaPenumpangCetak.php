<?php
  $path_logo = base_url('assets/img/bengkel1.png');
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
  <div style="margin:-25px;">

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
            <span style="font-size:12px">Jl.Semeru No.36 Ajung Pancakarya, Kabupaten Jember, Jawa Timur</span> <br>
            <span style="font-size:12px">Email : rahmahtiyas@gmail.com</a></span>
            <span style="font-size:12px">Telepon : 082 221 337 795</span>
          </td>
          <td width="10%"></td>
        </tr>
      </tbody>
    </table>
    <hr class="line-title">
    <hr class="line-title-child">
		<br>
    <!-- <p style="margin-top:35px;" class="kata-pengantar">Laporan Pelayanan Periode Tanggal :
      <?= format_date($tanggal_awal, 'd/m/Y') ?> s/d <?= format_date($tanggal_akhir, 'd/m/Y') ?></p> -->
    <table class="table">
      <thead class="head-table">
				<tr>
					<th>No</th>
					<th>No Sewa</th>
					<th>Pelanggan</th>
          <th>Jaminan</th>
          <th>Mobil</th>
          <th>Rute</th>
					<!-- <th>Aksi</th> -->
				</tr>
      </thead>
      <tbody class="body-table">
				<?php
					$no = 1;
					foreach ($dataSewa as $ds) : ?>
						<tr>
            <td><?php echo $ds->noSewa ?></td>
            <td><?php echo $ds->pelangganId ?></td>
            <td><?php echo $ds->jaminanId ?></td>
            <td><?php echo $ds->mobilId ?></td>
            <td><?php echo $ds->rute ?></td>
							<!-- <td><?php echo anchor('Kasir/delete/' . $ksr->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td> -->
						</tr>
					<?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>

</html>