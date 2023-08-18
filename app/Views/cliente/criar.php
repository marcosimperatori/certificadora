<?php echo $this->extend('layouts/main_layout'); ?>

<?php echo $this->section('content'); ?>
<div class="my-2">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo site_url("/"); ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo site_url("clientes"); ?>">Clientes</a></li>
      <li class="breadcrumb-item active" aria-current="page">Inclusão de cliente</li>
    </ol>
  </nav>
</div>

<section>
  <div id="response"></div>
  <div class="jumbotron">

    <?php echo form_open('/', ['id' => 'form_cad_cliente', 'class' => 'insert'], ['id' => "$cliente->id"]) ?>

    <?php echo $this->include('cliente/_form'); ?>

    <div class="d-flex justify-content-center mt-4">
      <a id="btn-cancelar" class="btn btn-secondary btn-sm mb-2 mx-2">Cancelar</a>
      <input id="btn-salvar" type="submit" value="Gravar" class="btn btn-success btn-sm mb-2">
    </div>

    <?php form_close(); ?>
  </div>

</section>



<?php $this->endSection(); ?>


<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url("assets/js/cliente.js") ?>"></script>

<?php echo $this->endSection(); ?>