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
          <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="">
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
                        <input type="text" class="form-control" value="<?= $user['username'] ?>" required>
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
                        <input type="text" class="form-control" value="<?= $user['email'] ?>" required>
                      </div>
                    </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-warning">Edit Data Akun</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Data Diri</h4>
                    </div>
                    <div class="card-body">
                          <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" value="<?= $user['namaUser'] ?>" required="">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                        <div class="form-group">
                            <label>Telephone</label>
                            <input type="tel" class="form-control" value="<?= $user['noTelp'] ?>" required="">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control summernote-simple"><?= $user['alamat'] ?></textarea>
                            <div class="invalid-feedback">
                              Please fill in the last address
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                    <button class="btn btn-warning">Edit Data Diri</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Data Kendaraan</h4>
                    </div>
                    <div class="card-body">  
                      <div class="form-group">
                        <label>Nama Kendaraan</label>
                        <input type="text" class="form-control" value="<?= $user['namaUser'] ?>" required="">
                        <div class="invalid-feedback">
                          Please fill in the first name
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                    <button class="btn btn-warning">Edit Data Kendaraan</button>
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
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://www.instagram.com/iki_azar/">Dimyati Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer> -->
    </div>
  </div>
 
<script>
function openModalFoto() {
  $('#modal-foto').modal('show');
}

$('#form-password').submit(function(event) {
  event.preventDefault();
  var id_user = $('#id_user').val();
  var formData = new FormData($('#form-password')[0])
  formData.append('id_user', id_user);

  Swal.fire({
    title: 'Ubah Password',
    text: "Apakah Anda yakin mengubah password !",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3498db',
    cancelButtonColor: '#95a5a6',
    confirmButtonText: 'Simpan',
    cancelButtonText: 'Batal',
    showLoaderOnConfirm: true,
    preConfirm: function() {
      return new Promise(function(resolve) {
        $.ajax({
          url: '<?= site_url() ?>' + '/Profile/update_password',
          method: 'POST',
          dataType: 'json',
          data: formData,
          async: true,
          processData: false,
          contentType: false,
          success: function(data) {
            if (data.success == true) {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });

              Toast.fire({
                icon: 'success',
                title: data.message
              })
              swal.hideLoading()
              setTimeout(function() {
                location.reload();
              }, 1000);
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message
              });
            }
          },
          fail: function(event) {
            alert(event);
          }
        });
      });
    },
    allowOutsideClick: false
  });
  event.preventDefault();
});

$('#form-profile').submit(function(event) {
  event.preventDefault();
  var id_user = $('#id_user').val();
  var formData = new FormData($('#form-profile')[0])
  formData.append('id_user', id_user);

  Swal.fire({
    title: 'Ubah Profile',
    text: "Apakah Anda yakin mengubah profile !",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3498db',
    cancelButtonColor: '#95a5a6',
    confirmButtonText: 'Simpan',
    cancelButtonText: 'Batal',
    showLoaderOnConfirm: true,
    preConfirm: function() {
      return new Promise(function(resolve) {
        $.ajax({
          url: '<?= site_url() ?>' + '/Profile/update_profile',
          method: 'POST',
          dataType: 'json',
          data: formData,
          async: true,
          processData: false,
          contentType: false,
          success: function(data) {
            if (data.success == true) {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });

              Toast.fire({
                icon: 'success',
                title: data.message
              })
              swal.hideLoading()
              setTimeout(function() {
                location.reload();
              }, 1000);
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message
              });
            }
          },
          fail: function(event) {
            alert(event);
          }
        });
      });
    },
    allowOutsideClick: false
  });
  event.preventDefault();
});

function validate_password() {
  var pass = $('#password').val();
  var confirm_pass = $('#konfirm_password').val();
  if (pass != confirm_pass) {
    $('#pass-message').show();
    $('#pass-message').text('Password tidak cocok !');
    $('#pass-message').css('color', 'red');
    $('#submit-reset').prop('disabled', true);
  } else {
    $('#pass-message').hide();
    $('#pass-message').text('');
    $('#pass-message').css('color', 'white');
    $('#submit-reset').prop('disabled', false);
  }
}
</script>