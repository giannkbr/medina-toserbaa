<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card-body">
        <form method="POST" action="<?= base_url('Masterjabatan/editjabatan') ?>">
            <?php foreach ($jabatan as $roles) { ?>
                <div id="" class="form-group">
                <input type="hidden" autocomplete="off" class="form-control effect-9" name="id_jabatan" id="nama_lengkap"
                    value="<?= $roles->id_jabatan?>">
                <?= form_error('id_jabatan', '<small class="text-danger">', '</small>'); ?>
            </div>

           <div id="" class="form-group">
                <label for="nama_jabatan">Jabatan</label>
                <input type="text" autocomplete="off" class="form-control effect-9" name="nama_jabatan" id="nama_lengkap"
                    value="<?= $roles->nama_jabatan?>">
                <?= form_error('nama_jabatan', '<small class="text-danger">', '</small>'); ?>
            </div>
            <?php } ?>
            <button type="submit" class="btn btn-primary btn-lg btn-block">
                Edit Data
            </button>
        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->view('admin-templates/footer') ?>