<title><?= $title ?></title>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="<?php echo base_url('Pelanggan') ?>" class="text-decoration-none">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <!-- Data Dashboard -->
            <div class="card-wrap">
              <div class="card-header">
                <h4>Pelanggan</h4>
              </div>
              <div class="card-body">
                <h3><?php echo number_format($totalP);?></h3>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="<?php echo base_url('FormSewa') ?>" class="text-decoration-none">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-car"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Mobil</h4>
              </div>
              <div class="card-body">
                <h3><?php echo $totalM;?></h3>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="<?php echo base_url('DaftarSewa/penumpang') ?>" class="text-decoration-none">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-car-side"></i>
            </div>
            <div class="card-header">
              <h4>Sewa Penumpang</h4>
            </div>
            <div class="card-wrap">
              <div class="card-body">
                <h3><?php echo $totalSewaP;?></h3>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="<?php echo base_url('DaftarSewa/barang') ?>" class="text-decoration-none">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-truck"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Sewa Barang</h4>
              </div>
              <div class="card-body">
                <h3><?php echo $totalSewaB;?></h3>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5>Data Sewa Kembali</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <!-- Tabel Data Mobil -->
              <table class="table table-bordered">
                <tr class="text-center">
                  <th width="3%">No</th>
                  <th>Nama Pelanggan</th>
                  <th>Mobil</th>
                  <th>Tanggal Kembali</th>
                  <th>Jam Kembali</th>
                </tr>
                <?php
											$no = 1;
											foreach ($dataSewa as $ds) : ?>
                <tr>
                  <td class="text-center"><?php echo $no++ ?></td>
                  <td><?= $ds->namaPelanggan ?></d>
                  <td><?= $ds->jenisMobil ?></d>
                  <td><?= $ds->tglKembali ?></d>
                  <td><?= $ds->jamKembali ?></td>
                </tr>
                <?php endforeach; ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              
            <div class="col-md-6">
              <h5>Data Mobil Ready</h5>
            </div>
            <hr>
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
          </div>
          <div class="card-body">
            <div id="list"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- DATA SORT -->
<input type="hidden" name="hidden_id_th" id="hidden_id_th" value="#column_created">
<input type="hidden" name="hidden_page" id="hidden_page" value="1">
<input type="hidden" name="hidden_column_name" id="hidden_column_name" value="jenisMobil">
<input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc">
<div id="div_modal"></div>
<script src="<?= base_url('assets/js/page/daftar-mobil-ready.js') ?>"></script>
</html>