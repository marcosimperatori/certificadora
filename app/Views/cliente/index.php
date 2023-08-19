<?php echo $this->extend('layouts/main_layout.php'); ?>

<?php echo $this->section('content'); ?>

<div class="nav">
  <ol class="breadcrumb my-3">
    <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
    <li class="breadcrumb-item active">Cadastro de Clientes</li>
  </ol>
</div>

<?php echo $this->include('layouts/mensagem'); ?>

<section id="tab-clientes" class="my-2">
  <div class="card border-secondary mb-3" style="max-width: 100%;">
    <div class="card-header bg-light">
      <a href="<?php echo site_url('clientes/criar'); ?>" class="btn btn-info btn-sm mb-4" title="Permite incluir um novo usuário no sistema">Novo cliente</a>
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

<!-- Estrutura do modal -->
<div class="modal" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title">Cadastro do cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
        <?php echo $this->include('layouts/mensagem'); ?>
        <div class="response"></div>
      </div>
      <div class="modal-body">
        <?php echo form_open('/teste', ['id' => 'form_cad_cliente', 'class' => 'insert'], ['id' => 1]) ?>


        <?php form_close(); ?>
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
<script src="<?php echo base_url("assets/js/cliente.js") ?>"></script>

<?php echo $this->endSection(); ?>