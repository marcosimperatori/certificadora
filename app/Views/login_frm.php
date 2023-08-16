<?php echo $this->extend('layouts/main_layout.php'); ?>

<?php echo $this->section('content'); ?>

<section class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4 col-sm-6 col-8 p-4 text-center bg-success">
      <?php echo form_open('main/login_submit') ?>
      
      <?php form_close() ?>

    </div>
  </div>
</section>
<?php echo $this->endSection(); ?>