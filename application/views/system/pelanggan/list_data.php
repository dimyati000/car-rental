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
			<th width="3%">No</th>
			<th width="10%">NIK</th>
			<th width="20%">Nama Pelanggan</th>
			<th width="10%">No Telp</th>
			<th width="25%">Alamat</th>
			<th width="15%">Foto KTP</th>
			<th width="5%" colspan="2">Aksi</th>
		</tr>
		<tbody>
			<?php 
          if($list->num_rows()!=0){
          $no=($paging['current']-1)*$paging['limit']; 
          foreach ($list->result() as $row) { $no++; ?>
			<tr>
				<td class="text-center"><?php echo $no ?>.</td>
				<td><?php echo $row->nik ?></td>
				<td><?php echo $row->namaPelanggan ?></td>
				<td class="text-center"><?php echo $row->noTelp ?></td>
				<td><?php echo $row->alamat ?></td>
				<td class="text-center">
					<!-- <div class="mb-2 text-muted">Klik Foto Untuk Perbesar!</div> -->
					<div class="chocolat-parent">
						<div>
							<?php  
                    if ($row->fotoKtp) { ?>
							<a href="<?php echo base_url() . 'assets/uploads/ktp/' . $row->fotoKtp ?>" class="chocolat-image"
								title="Foto KTP">
								<img class="img-fluid" alt="foto ktp" style="width: 11rem;"
									src="<?php echo base_url() . 'assets/uploads/ktp/' . $row->fotoKtp ?>">
				</td>
				</a>
				<?php } ?>
</div>
</div>
</div>
<td class="text-center">
	<?php echo anchor('Pelanggan/edit/' . $row->idPelanggan, ' <div class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Edit Data"><i class="fa fa-edit"></i></div>') ?>
</td>
<td class="text-center">
	<?php echo anchor('Pelanggan/delete/' . $row->idPelanggan, '<div class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" data-original-title="Hapus Data"><i class="fa fa-trash"></i></div>') ?>
</td>
</tr>
<?php 
      }
    }else{
    ?>
<tr>
	<td colspan="7">Data tidak ditemukan!</td>
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
