<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/vendor/bootstrap/css/bootstrap.min.css'); ?>">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/vendor/animate/animate.css'); ?>">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/vendor/css-hamburgers/hamburgers.min.css'); ?>">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/vendor/animsition/css/animsition.min.css'); ?>">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/vendor/select2/select2.min.css'); ?>">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/vendor/daterangepicker/daterangepicker.css'); ?>">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/css/util.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/css/main.css'); ?>">
</head>

<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="<?= url_to('login.store') ?>" method="post">
          <span class="login100-form-title">
            Agência Certificadora
          </span>

          <div class="wrap-input100 validate-input m-b-16" data-validate="Digite seu email">
            <input class="input100" type="text" name="email" placeholder="Email">
            <span class="focus-input100"></span>
            <?php echo session()->getFlashdata('erros')['email'] ?? '' ?>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Informe sua senha">
            <input class="input100" type="password" name="senha" placeholder="Senha">
            <span class="focus-input100"></span>
            <?php echo session()->getFlashdata('erros')['senha'] ?? '' ?>
          </div>

          <div class="container-login100-form-btn p-t-25 p-b-25">
            <button class="login100-form-btn">
              Logar
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>


  <!--===============================================================================================-->
  <script src="<?php echo base_url('assets/lib/vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('assets/lib/vendor/animsition/js/animsition.min.js'); ?>"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('assets/lib/vendor/bootstrap/js/popper.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('assets/lib/vendor/select2/select2.min.js'); ?>"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('assets/lib/vendor/daterangepicker/moment.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/vendor/daterangepicker/daterangepicker.js'); ?>"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('assets/lib/vendor/countdowntime/countdowntime.js'); ?>"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('assets/lib/js/main.js'); ?>"></script>
</body>

</html>