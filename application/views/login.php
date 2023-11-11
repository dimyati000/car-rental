<!DOCTYPE html>
<html lang="en">

<style>
#mentul-mentul{
position: relative;
-webkit-animation: floatBubble 0.60s infinite;
    -webkit-animation-direction:alternate;
    border-radius:50%;
  }

@-webkit-keyframes floatBubble{
 from{
        top:0;
        -webkit-animation-timing-function: ease-in;
   }

   to {
      top: 25px;
      -webkit-animation-timing-function: ease-in;
   }
}
</style>

<body>
    <div id="app">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div style="padding: 10px;">
                        <img id="mentul-mentul" src="<?php echo base_url('/assets/img/logo-evano.png') ?>"  style="border-radius:5px" alt="logo" width="100%" class="shadow-light">
                    </div>
                    <br>
                        <div class="card card-red">
                            <div class="card-header">
                                <h3>Login ETS</h3>&nbsp;&nbsp;&nbsp;
                                <p>EVANO TRANS SYSTEM</p>
                            </div>
                            <div class="card-body">
                                <?php echo $this->session->flashdata('pesan') ?>
                                <form method="POST" action="<?php echo base_url('Auth/login') ?>" class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Username Wajib Di isi
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                        <?php // echo form_error('password', '<div class="text-danger small">','</div>')
                                        ?>
                                        <div class="invalid-feedback">
                                            Password Wajib Di isi
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                        <div class="mt-5 text-muted text-center">
                                            <a href="<?php echo base_url('Home') ?>">Home</a>
                                            |
                                            Belum Punya Akun ? <a href="<?php echo base_url('Register') ?>">Buat Disini</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>
