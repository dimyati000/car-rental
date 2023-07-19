<title>Belanja</title>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>
        Belanja
      </h1>
    </div>
    <div class="section-body">
			<div class="container-fluid">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
						<img class="d-block w-100" src="<?php echo base_url('/assets/img/bengkel1.png') ?>" alt="Second slide">
          </div>
          <div class="carousel-item">
						<img class="d-block w-100" src="<?php echo base_url('/assets/img/slider2.jpeg') ?>" alt="Second slide">
          </div>
          <div class="carousel-item">
						<img class="d-block w-100" src="<?php echo base_url('/assets/img/slider1.jpeg') ?>" alt="First slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
			<!-- Data Produk-->
        <div class="row text-center mt-4">
          <?php foreach ($barang as $brg) : ?>
            <div class="card ml-3" style="width: 15rem;">
              <img class="card-img-top" style="height: 12rem;" src="<?php echo base_url() . '/uploads/' . $brg->gambar ?>" alt="Card image cap">
              <form action="<?php echo base_url() . 'User/tambahKeranjang/'. $brg->idBarang ?>" method="post" class="needs-validation" novalidate="">
                <div class="card-body">
                  <h5 class="card-title mb-1"><?php echo $brg->namaBarang ?></h5>
                  <small><?php echo $brg->keterangan ?></small><br><br>
                  <p class="card-text mb-3"><span class="badge badge-success">Rp <?php echo $brg->harga ?></span></p>
                  <!-- <?php echo anchor('User/tambahKeranjang/'. $brg->idBarang, '<div class="btn btn-md btn-success">Add Cart</div>')?> -->
                  <input value="1" name="qty" type="hidden" class="form-control"  required>
                  <button type="submit" class="btn btn-primary">Add Cart</button>                                 
                  <?php echo anchor('User/detail/'. $brg->idBarang, '<div class="btn btn-md btn-warning">Detail</div>')?>
                </div>
              </form>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
</div>


