<title>Profile</title>

<body>
    <div class="main-wrapper">
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= site_url('Dashboard') ?>">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>

          <!-- <?= $this->session->userdata('idUser'); ?> -->
          <div class="section-body">
                      <?php echo $this->session->flashdata('pesan') ?>

          <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                <form action="<?php echo base_url() . 'Profile/update_akun_admin' ?>" method="post" class="needs-validation" novalidate="">
                    <input name="idUser" type="hidden" class="form-control" value="<?= $this->session->userdata('idUser'); ?> " required="">
                    <div class="card-header">
                      <h4>Data Akun</h4>
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                      <label>Username</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user"></i>
                          </div>
                        </div>
                        <input name="username" type="text" class="form-control" value="<?= $user['username'] ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-envelope"></i>
                          </div>
                        </div>
                        <input name="email" type="text" class="form-control" value="<?= $user['email'] ?>" required>
                      </div>
                    </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-success">Simpan Data Akun</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                <form action="<?php echo base_url() . 'Profile/update_diri_admin' ?>" method="post" class="needs-validation" novalidate="">
                    <input name="idUser" type="hidden" class="form-control" value="<?= $this->session->userdata('idUser'); ?> " required="">   
                    <div class="card-header">
                      <h4>Data Diri</h4>
                    </div>
                    <div class="card-body">
                          <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input name="nama_User" type="text" class="form-control" value="<?= $user['namaUser'] ?>" required="">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                        <div class="form-group">
                            <label>Telephone</label>
                            <input name="no_Telp" type="tel" class="form-control" value="<?= $user['noTelp'] ?>" required="">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control summernote-simple"><?= $user['alamat'] ?></textarea>
                            <div class="invalid-feedback">
                              Please fill in the last address
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                    <button class="btn btn-success">Simpan Data Diri</button>
                    </div>
                  </form>
                </div>
              </div>
          </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2023 CAR RENTAL. All rights reserved.
        </div>
      </footer>
      <!-- <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="https://www.instagram.com/dimyati.azhar/">Dimyati Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer> -->
    </div>
  </div>
 