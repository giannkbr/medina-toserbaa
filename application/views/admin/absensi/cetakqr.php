<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="m-0 font-weight-bold text-primary"><?= $title ?></h1>
    </div>

   <div>
   <img class="img-responsive" src="<?php echo base_url('assets/img/qrcode/') .  $karyawan['username']  . 'code.png'; ?>" />
   </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<?php $this->view('admin-templates/footer') ?>