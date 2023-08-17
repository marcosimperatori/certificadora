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

<!-- Estrutura do modal -->
<div class="modal" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title">Cadastro do cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <div></div>

        <div class="form-group col-lg-12">
          <label for="exampleInputEmail1" class="form-label mt-2">Razão Social</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Informe a razão social">
        </div>
        <div class="form-group col-lg-12">
          <label for="exampleInputEmail1" class="form-label mt-2">Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite o email do cliente">
        </div>
        <div class="form-group col-lg-12">
          <label class="form-label mt-2">Cidade</label>
          <input type="text" name="idcidade" id="id_cidade">
          <div id="response2" class="mt-2"></div>
        </div>
        <div class="custom-control custom-checkbox">
          <div class="form-check">
            <input type="hidden" name="ativo" value="0">
            <input type="checkbox" name="ativo" id="ativo" value="1" class="custom-control-input">
            <label for="ativo" class="custom-control-label">Cliente ativo</label>
          </div>
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
<script src="<?php echo base_url("assets/js/cliente.js") ?>"></script>

<?php echo $this->endSection(); ?>