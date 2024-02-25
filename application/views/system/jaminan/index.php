<title><?= $title ?></title>

<div class="main-wrapper main-wrapper-1">
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Master Data Jaminan</h1>
			</div>
			<div class="section-body">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h5>Data Jaminan</h5>
							</div>
							<div class="section-body">
							<div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn btn-success" data-toggle="modal"
                                            data-target="#tambahPelanggan"><i class="fas fa-plus fa-sm"> Tambah
                                                Data</i></button>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="limit" id="limit" onchange="pageLoad(1)">
                                            <option value="10" selected>10 Baris</option>
                                            <option value="25">25 Baris</option>
                                            <option value="50">50 Baris</option>
                                            <option value="100">100 Baris</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" id="search" name="search" class="form-control"
                                                placeholder="Cari <Tekan Enter>">
                                            <div class="input-group-append cursor-pointer" onclick="pageLoad(1)">
                                                <span class="input-group-text">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div id="list"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>


<!-- Tambah Data Jaminan -->
<div class="modal fade" id="tambahJaminan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?php echo base_url() . 'Jaminan/tambahData'; ?>"
					enctype="multipart/form-data" autocomplete="off">
					<div class="form-group">
						<label>Nama Jaminan</label>
						<input type="text" name="namaJaminan" class="form-control">
					</div>
			</div>
			<div class="modal-footer bg-whitesmoke">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>

<!-- Tambah Data Jaminan -->
<div class="modal fade" id="editJaminan" tabindex="-1" role="dialog" aria-labelledby="editJaminan"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editJaminan">Form Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?php echo base_url() . 'Jaminan/update'; ?>"
					enctype="multipart/form-data" autocomplete="off">
					<input type="hidden" id="idJaminan" name="idJaminan" class="form-control">
					<div class="form-group">
						<label>Nama Jaminan</label>
						<input type="text" id="editNamaJaminan" name="editNamaJaminan" class="form-control">
					</div>
			</div>
			<div class="modal-footer bg-whitesmoke">
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>

<script>	
$(document).on('click', '.btn-edit', function(event) {
  event.preventDefault();
  var id = $(this).attr('data-id');
  $.ajax({
    url: base_url + "/Jaminan/getById/"+ id,
    type: 'POST',
    dataType: 'json',
    data:{},
    beforeSend: function () {},
    success: function (result) {  
		$('#editJaminan').modal('show');
		$('#idJaminan').val(result.data.idJaminan)  
		$('#editNamaJaminan').val(result.data.namaJaminan)  
    }
  });
});
</script>
<!-- DATA SORT -->
<input type="hidden" name="hidden_id_th" id="hidden_id_th" value="#column_created">
<input type="hidden" name="hidden_page" id="hidden_page" value="1">
<input type="hidden" name="hidden_column_name" id="hidden_column_name" value="idJaminan">
<input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc">
<div id="div_modal"></div>
<script src="<?= base_url('assets/js/page/jaminan.js') ?>"></script>
