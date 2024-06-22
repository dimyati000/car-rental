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
            <th width="10%">No Sewa</th>
            <th width="10%">Tanggal Berangkat</th>
            <th width="10%">Tanggal Kembali</th>
            <th width="5%">Jam Kembali</th>
            <th>Pelanggan</th>
            <th>Jaminan</th>
            <th>Mobil</th>
            <th class="text-center" colspan="12">Aksi</th>
        </tr>
		<tbody>
            <?php 
            if($list->num_rows()!=0){
            $no=($paging['current']-1)*$paging['limit']; 
            foreach ($list->result() as $ds) { $no++; ?>
			<tr>
                <td class="text-center"><?php echo $no ?></td>
                <td><?php echo $ds->noSewa ?></d>
                <td><?php echo $ds->tglBerangkat ?></d>
                <td><?php echo $ds->tglKembali ?></d>
                <td><?php echo $ds->jamKembali ?></d>
                <td><?php echo $ds->namaPelanggan ?></d>
                <td><?php echo $ds->namaJaminan ?></td>
                <td><?php echo $ds->jenisMobil ?></td>
                <td class="text-center">
                    <a href="javascript:;" onclick="printFormSewa('<?= $ds->idSewa ?>')"
                        class="btn btn-success btn-sm"><i class="fas fa-print"></i></a>
                </td>
                <td class="text-center">
                    <?php echo anchor('DaftarSewa/editPenumpang/' . $ds->idSewa, ' <div class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Edit Data"><i class="fa fa-edit"></i></div>') ?>
                </td>
                <td class="text-center">
                    <?php echo anchor('DaftarSewa/delete_penumpang/' . $ds->idSewa, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
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
