<?php
     $x = ($paging['limit']*$paging['current'])-$paging['limit'];
        
     if($x<=0)
     {
         $no=0;
     }
     else
     {
         $no = $x;
     }
     $no++;
?>
<div class="table-responsive">
	<table class="table table-bordered">
        <tr class="text-center">
            <th width="2%">No</th>
            <th width="2%">Jenis Mobil</th>
            <th width="2%">Merk</th>
            <th width="5%">Nopol</th>
            <th width="2%">Tahun</th>
            <th width="2%">Harga 12 Jam</th>
            <th width="2%">Harga 24 Jam</th>
            <th width="2%">Bahan Bakar</th>
            <th width="2%">Warna</th>
            <th width="2%">Denda</th>
            <th width="2%">Seat</th>
            <!-- <th width="2%">Status Tersedia</th> -->
            <th width="10%" class="text-center">Gambar Mobil</th>
            <th width="2%" class="text-center" colspan="9">Aksi</th>
        </tr>
        <tbody>
		<?php 
            if($list->num_rows()!=0){
            $no=($paging['current']-1)*$paging['limit']; 
            foreach ($list->result() as $m) { $no++; ?>
		<tr>
			<td class="text-center"><?php echo $no ?></td>
			<td><?php echo $m->jenisMobil ?></td>
			<td><?php echo $m->merkMobil ?></td>
			<td class="text-center"><?php echo $m->nopol ?></td>
			<td><?php echo $m->tahun ?></td>
			<td><?php echo $m->harga12 ?></td>
			<td><?php echo $m->harga24 ?></td>
			<td><?php echo $m->bahanBakar ?></td>
			<td><?php echo $m->warna ?></td>
			<td><?php echo $m->denda ?></td>
			<td class="text-center"><?php echo $m->seat ?></td>
			<!-- <td class="text-center">
				<?php if ($m->statusTersedia == "1") {?>
				tersedia
				<?php } else { ?>
				tidak tersedia
				<?php } ?>
			</td> -->
			<td class="text-center">
				<!-- <div class="mb-2 text-muted">Klik Gambar Untuk Perbesar!</div> -->
				<div class="chocolat-parent">
					<div>
						<?php  
                                if ($m->gambarMobil) { ?>
						<a href="<?php echo base_url() . 'assets/uploads/mobil/' . $m->gambarMobil ?>"
							class="chocolat-image" title="Gambar Mobil">
							<img class="img-fluid" alt="gambar mobil" style="width: 15rem;"
								src="<?php echo base_url() . 'assets/uploads/mobil/' . $m->gambarMobil ?>">
			</td>
			</a>
			<?php } ?>
        </div>
    </div>
</div>
    <td class="text-center">
        <?php echo anchor('Mobil/editMobil/' . $m->idMobil, ' <div class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Edit Data"><i class="fa fa-edit"></i></div>') ?>
    </td>
    <td class="text-center">
        <?php echo anchor('Mobil/delete/' . $m->idMobil, '<div class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" data-original-title="Hapus Data"><i class="fa fa-trash"></i></div>') ?>
    </td>
</tr>
<?php 
    }
        }else{
    ?>
<tr>
	<td colspan="14">Data tidak ditemukan!</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<?php 
  if($list->num_rows()>0){
?>
<div class="row">
	<br>
	<div class="col-xs-12 col-md-6" style="padding-top:5px; color:#333;">
		Menampilkan data
		<?php $batas_akhir = (($paging['current'])*$paging['limit']);
    if ($batas_akhir > $paging['count_row']) {
        $batas_akhir = $paging['count_row'];
    }
    echo ((($paging['current']-1)*$paging['limit'])+1).' - '.$batas_akhir.' dari total '.$paging['count_row']; ?>
		data
	</div>
	<br>
	<div class="col-xs-12 col-md-6">
		<div style="float:right;">
			<?php echo $paging['list']; ?>
		</div>
	</div>
</div>
<?php } ?>
