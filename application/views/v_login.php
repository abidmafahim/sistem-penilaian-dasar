<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style-login.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style-icon.css">

  <title>Sistem Akademik</title>
</head>
<body style="overflow-x: hidden;">
  <nav class="navbar navbar-light bg-white login-nav" style="box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.1);">
    <a class="navbar-brand" href="#">
      <img src="<?php echo base_url() ?>assets/img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
      Bootstrap
    </a>
  </nav>

  <div class="container row login-container">
    <div class="row nomargin">
      <div class="col-md-5 main-text">
        <div class="main-title">
          <h1>Welcome</h1>
        </div>
        <div class="main-par">
          <p><h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h5></p>
          <p><h5>Belum punya akun? Hubungi admin</h5></p>
        </div>
        <div class="wa-btn">
          <a href="#" class="btn azm-social azm-btn azm-pill azm-whatsapp"><i class="fa fa-whatsapp"></i> WhatsApp</a>
        </div>
      </div>
      <div class="col-md-3 login-form">
        <h3>Login di Sini</h3>
        <form action="<?php echo base_url('Login/login_action'); ?>" method="POST">
          <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" value="" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" value="" required>
          </div>
          <div class="form-group lgn-btn">
            <input type="submit" class="btnSubmit" value="Login" />
          </div>
          <p><?php echo validation_errors(); ?></p>
          <p>
            <?php echo $this->session->flashdata('wrong');?>
            <?php echo $this->session->flashdata('noreg');?>
            <?php echo $this->session->flashdata('noclue');?>
          </p>
        </form>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"></script>
</body>
</html>