<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; CAR RENTAL</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo base_url() ?>node_modules/selectric/public/selectric.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/components.css">
    
	<!-- Favicon  -->
    <link rel="icon" href="<?php echo base_url('/assets/img/favicon-carrental.png') ?>">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h5>Daftar Akun</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?php echo base_url('Register/')?>" autocomplete="off">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input id="nama" type="text" class="form-control" name="namaUser">
                                        <?php echo form_error('namaUser', '<div class="text-danger small">','</div>')
                                        ?>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username">
                                        <?php echo form_error('username', '<div class="text-danger small">','</div>')
                                        ?>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input id="alamat" type="text" class="form-control" name="alamat">
                                        <?php echo form_error('alamat', '<div class="text-danger small">','</div>')
                                        ?>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="noTelp">No Telp</label>
                                        <input id="noTelp" type="text" class="form-control" name="noTelp">
                                        <?php echo form_error('noTelp', '<div class="text-danger small">','</div>')
                                        ?>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                                            <?php echo form_error('password', '<div class="text-danger small">','</div>')
                                        ?>
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password2" class="d-block">Konfirmasi Password</label>
                                            <input id="password2" type="password" class="form-control" name="password2">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Daftar
                                        </button>
                                    </div>
                                    <div class="mt-5 text-muted text-center">
                                            Sudah Punya Akun? <a href="<?php echo base_url('Auth/login')?>">Login Disini</a>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?php echo base_url() ?>node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="<?php echo base_url() ?>node_modules/selectric/public/jquery.selectric.min.js"></script>

    <!-- Template JS File -->
    <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
    <script src="<?php echo base_url() ?>assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?php echo base_url() ?>assets/js/page/auth-register.js"></script>
</body>

</html>
