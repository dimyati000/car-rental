<title><?= $title ?></title>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="card card-red">
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
                                    <div class="mt-3 text-muted text-center">
                                            Sudah Punya Akun? <a href="<?php echo base_url('Login')?>">Login Disini</a>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <div style="text-align: center;">
                            Copyright &copy;2023 All rights reserved | Evano Trans.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>
