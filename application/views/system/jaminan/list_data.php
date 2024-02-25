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
    <thead class="tr-head">
        <tr>
            <th width="3%" class="text-center">No</th>
            <th width="92%">Nama Jaminan</th>
            <th width="5%" class="text-center" class="text-center"
            colspan="2">Aksi</th>
        </tr>
        </thead>
        <tbody>
            <?php 
          if($list->num_rows()!=0){
          $no=($paging['current']-1)*$paging['limit']; 
          foreach ($list->result() as $j) { $no++; ?>
            <tr>
                <td class="text-center"><?php echo $no ?></td>
                <td><?php echo $j->namaJaminan ?></td>
                <td class="text-center">
                    <a href="javascript:;" data-id="<?= $j->idJaminan ?>" class="btn btn-warning btn-sm btn-edit"><i class="fa fa-edit"></i> Edit Data</a>
                </td>
                <td class="text-center">
                    <?php echo anchor('Jaminan/delete/' . $j->idJaminan, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus Data</div>') ?>
                </td>
                </tr>
<?php 
          }
        }else{
        ?>
<tr>
	<td colspan="3">Data tidak ditemukan!</td>
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
