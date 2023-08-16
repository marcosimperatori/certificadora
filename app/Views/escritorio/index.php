<?php echo $this->extend('layouts/main_layout.php'); ?>

<?php echo $this->section('content'); ?>

<ol class="breadcrumb my-3">
  <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
  <li class="breadcrumb-item active">Cadastro de Escritórios</li>
</ol>

<section class="my-2">
  <div class="card border-secondary mb-3" style="max-width: 100%;">
    <div class="card-header">
      <button type="button" class="btn btn-info my-3" data-toggle="modal" data-target="#modalExemplo">Novo</button>
    </div>
    <div class="card-body">
      <table class="table table-hover">
        <thead class="table-light text-white">
          <tr>
            <th scope="col">Type</th>
            <th scope="col">Column heading</th>
            <th scope="col">Column heading</th>
            <th scope="col">Column heading</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Column content</td>
            <td>Column content</td>
            <td>Column content</td>
            <td>Column content</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<?php echo $this->endSection(); ?>

<div class="modal" id="modalExemplo">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>