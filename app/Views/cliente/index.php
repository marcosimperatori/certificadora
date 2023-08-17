<?php echo $this->extend('layouts/main_layout.php'); ?>

<?php echo $this->section('content'); ?>

<div class="nav">

  <ol class="breadcrumb my-3">
    <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
    <li class="breadcrumb-item active">Cadastro de Clientes</li>
  </ol>
</div>


<section id="tab-clientes" class="my-2">
  <div class="card border-secondary mb-3" style="max-width: 100%;">
    <div class="card-header">
      <button type="button" class="btn btn-info my-3" data-bs-toggle="modal" data-bs-target="#modalEdit">Novo</button>
    </div>
    <div class="card-body">
      <table id="lista-clientes" class="table table-hover">
        <thead class="table-light text-white">
          <tr>
            <th scope="col">Cliente</th>
            <th scope="col">Cidade</th>
            <th scope="col">Situação</th>
            <th scope="col" class="text-center">Ações</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</section>


<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url("assets/js/escritorio.js") ?>"></script>

<?php echo $this->endSection(); ?>