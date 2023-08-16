<?php echo $this->extend('layouts/main_layout.php'); ?>

<?php echo $this->section('content'); ?>

<div class="nav">

  <ol class="breadcrumb my-3">
    <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
    <li class="breadcrumb-item active">Cadastro de Escritórios</li>
  </ol>
</div>

<section class="my-2">
  <div class="card border-secondary mb-3" style="max-width: 100%;">
    <div class="card-header">
      <button type="button" class="btn btn-info my-3" data-bs-toggle="modal" data-bs-target="#modalEdit">Novo</button>
    </div>
    <div class="card-body">
      <table id="lista-escritorios" class="table table-hover responsive">
        <thead class="table-light text-white">
          <tr>
            <th scope="col">Escritório</th>
            <th scope="col">Situação</th>
            <th scope="col" class="text-center">Ações</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</section>

<!-- Estrutura do modal -->
<div class="modal" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title">Cadastro de cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Conteúdo do modal vai aqui.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-success">Salvar</button>
      </div>
    </div>
  </div>
</div>

<?php echo $this->endSection(); ?>


<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url("assets/js/escritorio.js") ?>"></script>

<?php echo $this->endSection(); ?>