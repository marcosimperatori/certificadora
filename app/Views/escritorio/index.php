<?php echo $this->extend('layouts/main_layout.php'); ?>

<?php echo $this->section('content'); ?>

<div class="nav">

  <ol class="breadcrumb my-3">
    <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
    <li class="breadcrumb-item active">Cadastro de Escritórios</li>
  </ol>
</div>

<section id="tab-escritorios" class="my-2">
  <div class="card border-secondary mb-3" style="max-width: 100%;">
    <div class="card-header">
      <button type="button" class="btn btn-info my-3" data-bs-toggle="modal" data-bs-target="#modalEdit">Novo</button>
    </div>
    <div class="card-body">
      <table id="lista-escritorios" class="table table-hover">
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
        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4 text-body-emphasis">Razão Social</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Informe a razão social">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label mt-4">Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite o email do cliente">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
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