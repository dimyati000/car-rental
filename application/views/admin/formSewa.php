
<div class="main-wrapper main-wrapper-1">
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Form Sewa</h1>
			</div>
			<div class="section-body">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-6">
						<div class="card">
						<div class="card-header">
							<h5 class="text-center" >Form Penumpan</h5>
						</div>
						<div class="card-body">
							<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
								<li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
								<li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item active">
								<img class="d-block w-100" src="assets/img/news/img01.jpg" alt="First slide">
								<div class="carousel-caption d-none d-md-block">
									<h5>Heading</h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
								</div>
								<div class="carousel-item">
								<img class="d-block w-100" src="assets/img/news/img07.jpg" alt="Second slide">
								<div class="carousel-caption d-none d-md-block">
									<h5>Heading</h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
								</div>
								<div class="carousel-item">
								<img class="d-block w-100" src="assets/img/news/img08.jpg" alt="Third slide">
								<div class="carousel-caption d-none d-md-block">
									<h5>Heading</h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
								</div>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
							</div>
						</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6">
						<div class="card">
						<div class="card-header">
							<h5>Form Barang</h5>
						</div>
						<div class="card-body">
							<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
								<li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
								<li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item active">
								<img class="d-block w-100" src="assets/img/news/img01.jpg" alt="First slide">
								<div class="carousel-caption d-none d-md-block">
									<h5>Heading</h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
								</div>
								<div class="carousel-item">
								<img class="d-block w-100" src="assets/img/news/img07.jpg" alt="Second slide">
								<div class="carousel-caption d-none d-md-block">
									<h5>Heading</h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
								</div>
								<div class="carousel-item">
								<img class="d-block w-100" src="assets/img/news/img08.jpg" alt="Third slide">
								<div class="carousel-caption d-none d-md-block">
									<h5>Heading</h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
								</div>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<!-- Tambah Data Mobil -->
<div class="modal fade" id="tambahMobil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
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
					<div class="form-group">
						<label>Jenis Mobil</label>
						<input type="text" name="jenisMobil" class="form-control">
					</div>
					<div class="form-group">
						<label>Merk Mobil</label>
						<input type="text" name="merkMobil" class="form-control">
					</div>
					<div class="form-group">
						<label>Nopol</label>
						<input type="text" name="nopol" class="form-control">
					</div>
					<div class="form-group">
						<label>Tahun</label>
						<input type="text" name="tahun" class="form-control">
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="text" name="harga" class="form-control">
					</div>
					<div class="form-group">
						<label>Bahan Bakar</label>
						<input type="text" name="bahanBakar" class="form-control">
					</div>
					<div class="form-group">
						<label>Warna</label>
						<input type="text" name="warna" class="form-control">
					</div>
					<div class="form-group">
						<label>Denda</label>
						<input type="text" name="denda" class="form-control">
					</div>
					<div class="form-group">
						<label>Seat</label>
						<input type="text" name="seat" class="form-control">
					</div>
					<div class="form-group">
						<label>Status Tersedia</label>
						<input type="text" name="statusTersedia" class="form-control">
					</div>
					<div class="form-group">
						<label>Gambar Mobil</label>
						<input type="file" name="gambarMobil" class="form-control">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>


</html>