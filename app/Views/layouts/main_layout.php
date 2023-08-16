<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= APP_NAME ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/bootstrap.min.css") ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/fontawesome/css/all.min.css") ?>">

  <link rel="stylesheet" href="<?php echo base_url("assets/css/app.css") ?>">
  <link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/af-2.6.0/b-2.4.1/b-html5-2.4.1/r-2.5.0/datatables.min.css" rel="stylesheet">


</head>

<body>
  <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('/') ?>">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cadastros</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Cliente</a>
              <a class="dropdown-item" href="<?php echo base_url('escritorios') ?>">Escritório</a>
              <a class="dropdown-item" href="#">Tipo de mídia</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Certificados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Financeiro</a>
          </li>
        </ul>

        <div class="ms-auto">
          <ul class="navbar-nav">
            <li class="nav-item">
              <div class="nav-link"><i class="fas fa-user"></i> &nbsp; <?php echo session()->get('user')->nome ?></div>
            </li>
            <li class="nav-item">
              <a class="nav-link text-warning" href="login/logout"><i class="fas fa-sign-out-alt"></i>&nbsp; Sair</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">
    <?php echo $this->renderSection('content'); ?>
  </div>

  <script src="<?php echo base_url("assets/bootstrap/bootstrap.bundle.min.js") ?>"></script>
  <script src="<?php echo base_url("assets/js/app.js") ?>"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/af-2.6.0/b-2.4.1/b-html5-2.4.1/r-2.5.0/datatables.min.js"></script>

  <?php echo $this->renderSection('scripts'); ?>
</body>

</html>