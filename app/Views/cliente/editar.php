<?php echo $this->extend('layouts/main_layout'); ?>

<?php echo $this->section('content'); ?>
<div class="nav">
  <ol class="breadcrumb my-3">
    <li class="breadcrumb-item"><a href="<?php echo site_url("/"); ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo site_url("clientes"); ?>">Cadastro de clientes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edição de cliente</li>
  </ol>
</div>

<section>
  <div id="response"></div>

  <?php echo form_open('/', ['id' => 'form_cad_cliente', 'class' => 'update'], ['id' => "$cliente->id"]) ?>

  <?php echo $this->include('cliente/_form'); ?>

  <div class="d-flex justify-content-center mt-4">
    <a href="<?php echo site_url("clientes"); ?>" id="btn-cancelar" class="btn btn-secondary btn-sm mb-2 mx-2">Cancelar</a>
    <input id="btn-salvar" type="submit" value="Gravar" class="btn btn-success btn-sm mb-2">
  </div>

  <?php form_close(); ?>
  </div>
</section>

<?php $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url("assets/js/cliente.js") ?>"></script>

<?php echo $this->endSection(); ?>