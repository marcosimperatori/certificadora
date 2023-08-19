<?php echo $this->extend('layouts/main_layout.php'); ?>


<?php echo $this->section('content'); ?>


<div class="row mt-5 mx-auto">
  <div class="col-lg-4">
    <div class="card border-primary mb-3" style="max-width: 20rem;">
      <div class="card-header bg-info text-primary">Header</div>
      <div class="card-body">
        <h4 class="card-title">Primary card title</h4>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="card border-secondary mb-3" style="max-width: 20rem;">
      <div class="card-header">Header</div>
      <div class="card-body">
        <h4 class="card-title">Secondary card title</h4>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="card border-success mb-3" style="max-width: 20rem;">
      <div class="card-header">Header</div>
      <div class="card-body">
        <h4 class="card-title">Success card title</h4>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
    </div>
  </div>
</div>





<?php echo $this->endSection(); ?>