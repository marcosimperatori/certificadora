<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= APP_NAME ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;700&display=swap" rel="stylesheet">

  <link id="bootstrap-css" rel="stylesheet" href="<?php echo base_url("assets/bootstrap/bootstrap2.min.css") ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/fontawesome/css/all.min.css") ?>">

  <link rel="stylesheet" href="<?php echo base_url("assets/css/app.css") ?>">

  <link href="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.13.4/af-2.5.3/r-2.4.1/datatables.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css" integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
              <a class="dropdown-item" href="<?php echo base_url('clientes') ?>">Clientes</a>
              <a class="dropdown-item" href="<?php echo base_url('escritorios') ?>">Escritórios</a>
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
              <a class="nav-link ml-3" id="themeToggle"><i class="fas fa-adjust" title="Alterar tema"></i></a>
            </li>
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


  <script src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.13.4/af-2.5.3/r-2.4.1/datatables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js" integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="<?php echo base_url("assets/js/comons.js") ?>"></script>


  <?php echo $this->renderSection('scripts'); ?>

  <script>
    // Função para alternar o tema
    function toggleTheme() {
      const currentTheme = localStorage.getItem('currentTheme');

      if (currentTheme === 'bootstrap') {
        localStorage.setItem('currentTheme', 'bootstrap2');
      } else {
        localStorage.setItem('currentTheme', 'bootstrap');
      }

      applyCurrentTheme();
    }

    // Função para aplicar o tema atual
    function applyCurrentTheme() {
      const currentTheme = localStorage.getItem('currentTheme') || 'bootstrap2'; // Defina o tema padrão se não houver valor no localStorage
      const link = document.getElementById('bootstrap-css');
      link.href = "<?php echo base_url('assets/bootstrap/') ?>" + currentTheme + ".min.css";
    }

    // Adicione um ouvinte de clique ao botão de alternância
    document.getElementById('themeToggle').addEventListener('click', function() {
      toggleTheme();
    });

    // Aplicar o tema quando a página carrega
    window.addEventListener('load', function() {
      applyCurrentTheme();
    });
  </script>


</body>

</html>