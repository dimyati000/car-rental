<title>Daftar Sewa Penumpang</title>

<div class="main-wrapper main-wrapper-1">
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Daftar Sewa Penumpang</h1>
			</div>
			<div class="section-body">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h5>Sewa Penumpang</h5>
							</div>
							<div class="section-body">
							<div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
										<?php echo anchor('FormSewa', '<div class="btn btn-success"><i class="fas fa-plus fa-sm"></i> Tambah Data</div>') ?>
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
									<div class="row">
										<div class="col-md-3">
											<input placeholder="Tanggal Awal" id="tgl_awal" Tooltip="Tanggal Awal" type="date" name="tgl_awal" onchange="showLaporan()"  class="form-control" value="<?= (isset($_GET['tanggal_awal'])) ? $_GET['tanggal_awal'] : date('Y-m-d') ?>"
													required>
										</div>
										<div class="col-md-3">
											<input placeholder="Tanggal Akhir" id="tgl_akhir" Tooltip="Tanggal Akhir" type="date" name="tgl_akhir" onchange="showLaporan()" class="form-control" value="<?= (isset($_GET['tanggal_akhir'])) ? $_GET['tanggal_akhir'] : date('Y-m-d') ?>"
													required>
										</div>
										<div class="col-md-4">
											<?php $mobilId = (isset($_GET['jenisMobil'])) ? $_GET['jenisMobil'] : "" ?>
											<select name="idMobil"
												class="form-control select2 select2-hidden-accessible" id="idMobil"
												onchange="showLaporan()"  required>
												<option value="">Pilih Mobil</option>
												<?php foreach ($mobil as $m)  :  ?>
												<option value="<?= $m->idMobil ?>"
													<?php if ($m->idMobil==$mobilId) {
														echo " selected";
													} ?>
												><?= $m->jenisMobil; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="col-md-2">
											<a href="javascript:;" onclick="printReport()" class="btn btn-success">
												<i class="fas fa-print"></i> Print Laporan Sewa</a>
										</div>
									</div>
	                                <div id="list"></div>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<!-- DATA SORT -->
<input type="hidden" name="hidden_id_th" id="hidden_id_th" value="#column_created">
<input type="hidden" name="hidden_page" id="hidden_page" value="1">
<input type="hidden" name="hidden_column_name" id="hidden_column_name" value="idSewa">
<input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc">
<div id="div_modal"></div>
<script src="<?= base_url('assets/js/page/daftar-sewa.js') ?>"></script>
</html>