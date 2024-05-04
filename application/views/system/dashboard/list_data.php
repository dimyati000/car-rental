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
            <th>Nama Mobil</th>
            <th>Merk</th>
            <th>Nopol</th>
            <th>Harga 12</th>
            <th>Harga 24</th>
        </tr>
		<tbody>
            <?php 
            if($list->num_rows() !=0){
            $no=($paging['current']-1)*$paging['limit']; 
            foreach ($list->result() as $dm) { $no++; ?>
			<tr>
                <td class="text-center"><?php echo $no ?></td>
                <td><?= $dm->jenisMobil ?></d>
                <td><?= $dm->merkMobil ?></d>
                <td><?= $dm->nopol ?></d>
                <td><?= $dm->harga12 ?></d>
                <td><?= $dm->harga24 ?></td>
            </tr>
            <?php 
            }
            }else{
            ?>
            <tr>
                <td colspan="6">Data tidak ditemukan!</td>
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
