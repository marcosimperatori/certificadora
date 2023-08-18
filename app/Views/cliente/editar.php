<?php echo $this->extend('layouts/main_layout'); ?>

<?php echo $this->section('conteudo'); ?>
<div class="my-2">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo site_url("/"); ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo site_url("clientes"); ?>">Clientes</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edição de cliente</li>
    </ol>
  </nav>
</div>

<section>
  <div id="response"></div>
  <div class="jumbotron">

    <?php echo form_open('/', ['id' => 'form_cad_cliente', 'class' => 'update'], ['id' => "$cliente->id"]) ?>

    <?php echo $this->include('clientes/_form'); ?>

    <div class="row">
      <div class="col-6">
        <div class="form-group mt-4 text-left">
          <a href="#" class="btn btn-danger btn-sm ml-2 delete-user mb-2" data-id="<?php echo $cliente->id; ?>" data-nome="<?php echo $cliente->razao; ?>" data-toggle="modal" data-target="#excluirModal">Excluir</a>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group mt-4 text-right">
          <a href="<?php echo site_url("administracao/clientes"); ?>" class="btn btn-secondary btn-sm ml-2 mb-2">Cancelar</a>
          <input id="btn-salvar" type="submit" value="Salvar" class="btn btn-success btn-sm mr-e mb-2">
        </div>
      </div>
    </div>

    <?php form_close(); ?>
  </div>

</section>


<?php echo $this->section('scripts'); ?>
<script src="<?php echo base_url("assets/js/cliente.js") ?>"></script>

<?php echo $this->endSection(); ?>