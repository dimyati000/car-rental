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
    <!-- <p style="margin-top:35px;" class="kata-pengantar">Laporan Pelayanan Periode Tanggal :
      <?= format_date($tanggal_awal, 'd/m/Y') ?> s/d <?= format_date($tanggal_akhir, 'd/m/Y') ?></p> -->
    <table class="table"  style="border: 1px solid;">
      <thead class="head-table">
				<tr>
          <th>
              <div style="width:200px;">
                <img style="width:100%;" src="<?= $image_base64 ?>" alt="">
              </div>            
          </th>
          <th colspan="2" style="border: 1px solid; width: 50%;">
              Persyaratan dan Ketentuan :s
          </th>
				</tr>
      <tr>
        <td>Nama Penyewa : ..................</td>
        <td>1</td>
        <td;">Sewa mobil minimal 24 jam untuk hari Jum’at, Sabtu, Minggu atau Hari Libur Nasional.
        </td>
      </tr>
      </thead>
      <!-- <tbody class="body-table">
				<?php
					$no = 1;
					foreach ($dataSewa as $ds) : ?>
						<tr>
            <td><?php echo $ds->noSewa ?></td>
            <td><?php echo $ds->pelangganId ?></td>
            <td><?php echo $ds->jaminanId ?></td>
            <td><?php echo $ds->mobilId ?></td>
            <td><?php echo $ds->rute ?></td>
						<td><?php echo anchor('Kasir/delete/' . $ksr->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
						</tr>
					<?php endforeach; ?>
      </tbody> -->
    </table>
  </div>
</body>

</html>