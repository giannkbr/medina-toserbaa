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
        <form method="POST" action="<?= base_url('Masterjabatan/tambahjabatanAct') ?>">
            <div id="" class="form-group">
                <label for="nama_jabatan">Jabatan</label>
                <input type="text" autocomplete="off" class="form-control effect-9" name="nama_jabatan" id="nama_lengkap"
                    value="<?= set_value('nama_jabatan'); ?>">
                <?= form_error('nama_jabatan', '<small class="text-danger">', '</small>'); ?>
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">
                Tambah Data
            </button>
        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->view('admin-templates/footer') ?>