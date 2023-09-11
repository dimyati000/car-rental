
<div class="main-wrapper main-wrapper-1">
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Master Data Mobil</h1>
			</div>
			<div class="section-body">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h5>Data Mobil</h5>
							</div>
							<div class="section-body">
								<div class="container-fluid">
									<button class="btn btn-success btn-sm ml-2 mt-3" data-toggle="modal" data-target="#tambahMobil"><i class="fas fa-plus fa-sm"> Tambah Data</i></button>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<!-- Tabel Data Mobil -->
									<table class="table table-bordered">
										<tr class="text-center">
											<th width="2%">No</th>
											<th width="2%">Jenis Mobil</th>
											<th width="2%">Merk</th>
											<th width="5%">Nopol</th>
											<th width="2%">Tahun</th>
											<th width="2%">Harga</th>
											<th width="2%">Bahan Bakar</th>
											<th width="2%">Warna</th>
											<th width="2%">Denda</th>
											<th width="2%">Seat</th>
											<th width="2%">Status Tersedia</th>
											<th width="10%" class="text-center">Gambar Mobil</th>
											<th width="2%" class="text-center" colspan="9">Aksi</th>
										</tr>
										<?php
										$no = 1;
										foreach ($mobil as $m) : ?>
											<tr>
												<td class="text-center"><?php echo $no++ ?></td>
												<td><?php echo $m->jenisMobil ?></td>
												<td><?php echo $m->merkMobil ?></td>
												<td class="text-center"><?php echo $m->nopol ?></td>
												<td><?php echo $m->tahun ?></td>
												<td><?php echo $m->harga ?></td>
												<td><?php echo $m->bahanBakar ?></td>
												<td><?php echo $m->warna ?></td>
												<td><?php echo $m->denda ?></td>
												<td class="text-center"><?php echo $m->seat ?></td>
												<td class="text-center">
													<?php if ($m->statusTersedia == "1") {?>
														tersedia
													<?php } else { ?>
														tidak tersedia
													<?php } ?>
												</td>
												<td class="text-center">
													<!-- <div class="mb-2 text-muted">Klik Gambar Untuk Perbesar!</div> -->
														<div class="chocolat-parent">
															<div>
																<?php  
																if ($m->gambarMobil) { ?>
																	<a href="<?php echo base_url() . 'assets/uploads/mobil/' . $m->gambarMobil ?>" class="chocolat-image" title="Gambar Mobil">
																	<img class="img-fluid" alt="gambar mobil" style="width: 15rem;" src="<?php echo base_url() . 'assets/uploads/mobil/' . $m->gambarMobil ?>"></td>
																	</a>
																<?php } ?>
															</div>
														</div>
													</div>
												<td class="text-center">
													<?php echo anchor('Mobil/editMobil/' . $m->idMobil, ' <div class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Edit Data"><i class="fa fa-edit"></i></div>') ?>
												</td>
												<td  class="text-center">
													<?php echo anchor('Mobil/delete/' . $m->idMobil, '<div class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" data-original-title="Hapus Data"><i class="fa fa-trash"></i></div>') ?>
												</td>
											</tr>
										<?php endforeach; ?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<style>
   .fileUpload {
    position: relative;
    overflow: hidden;
    }
     .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin-top: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        /* filter: alpha(opacity=0); */
    }
</style>

<!-- Tambah Data Mobil -->
<div class="modal fade" id="tambahMobil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php
					use Ramsey\Uuid\Uuid;
					$uuid = Uuid::uuid4();
					?>
				<form method="POST" action="<?php echo base_url() . 'Mobil/tambahMobil'; ?>"
				enctype="multipart/form-data" autocomplete="off">
				<input type="hidden" class="form-control" name="idMobil" value="<?= $uuid ?>"></input>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Jenis Mobil</label>
						<input type="text" name="jenisMobil" class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label>Merk Mobil</label>
						<input type="text" name="merkMobil" class="form-control">
					</div>
					<div class="form-group col-md-6">
                      <label>Harga</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            Rp.
                          </div>
                        </div>
						<input type="text" name="harga" class="form-control">
                      </div>
                    </div>
					<div class="form-group col-md-6">
                      <label>Denda</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            Rp.
                          </div>
                        </div>
						<input type="text" name="denda" class="form-control">
                      </div>
                    </div>
					<div class="form-group col-md-6">
						<label>Bahan Bakar</label>
						<input type="text" name="bahanBakar" class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label>Warna</label>
						<input type="text" name="warna" class="form-control">
					</div>
					<div class="form-group col-md-2">
						<label>Nopol</label>
						<input type="text" name="nopol" class="form-control">
					</div>
					<div class="form-group col-md-2">
						<label>Tahun</label>
						<input type="number" name="tahun" class="form-control">
					</div>
					<div class="form-group col-md-2">
						<label>Kursi</label>
						<input type="number" name="seat" class="form-control">
					</div>
					<div class="form-group col-md-5">
						<label>Gambar Mobil</label>
						<input type="text" id="uploadFile" readonly name="gambarMobil" class="form-control" placeholder="Pilih File...">
						<!-- <input type="file" name="gambarMobil" class="form-control"> -->
					</div>
					<div class="form-group col-md-1 mt-4">
						<div class="row">
							<div class="fileUpload btn btn-info" style="padding: 0.7rem 0.7rem;">			
								<span>Upload</span>
								<input id="uploadBtn"  name="gambarMobil" type="file" class="upload" />
							</div>					
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="control-label">Status Tersedia</div>
						<label class="custom-switch mt-2">
							<input type="checkbox" name="statusTersedia" class="custom-switch-input" value="1">
							<span class="custom-switch-indicator"></span>
							<span class="custom-switch-description">Tidak / Ya</span>
						</label>
					</div>
				</div>
			</div>
			<div class="modal-footer bg-whitesmoke">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>

<script>
  document.getElementById("uploadBtn").onchange = function () {
	document.getElementById("uploadFile").value = this.files[0].name;
};
</script>

</html>