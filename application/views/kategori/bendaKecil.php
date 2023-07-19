<title>Kategori</title>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Benda Kecil</h1>
    </div>

    <div class="section-body">
      <div class="container-fluid">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo base_url('/assets/img/slider1.jpeg') ?>" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url('/assets/img/slider2.jpeg') ?>" alt="Second slide">
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
        <div class="row text-center mt-4">
          <?php foreach ($bendaKecil as $brg) : ?>
            <div class="card ml-3" style="width: 15rem;">
              <img class="card-img-top" style="height: 12rem;" src="<?php echo base_url() . '/uploads/' . $brg->gambar ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title mb-1"><?php echo $brg->namaBarang ?></h5>
                <small><?php echo $brg->keterangan ?></small><br><br>
                <p class="card-text mb-3"><span class="badge badge-success">Rp <?php echo $brg->harga ?></span></p>
                <?php echo anchor('User/tambahKeranjang/'. $brg->idBarang, '<div class="btn btn-md btn-success">Add Cart</div>')?>
                <?php echo anchor('User/detail/'. $brg->idBarang, '<div class="btn btn-md btn-info">Detail</div>')?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
</div>