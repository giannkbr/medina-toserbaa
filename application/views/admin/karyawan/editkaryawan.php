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
        <form method="POST" action="<?= base_url('masterkaryawan/editkaryawan') ?>">
            <?php foreach($karyawan as $karyawans) { ?>

            <div id="" class="form-group">
                <label for="nip">Nama Lengkap</label>
                <input type="text" autocomplete="off" class="form-control effect-9" name="nama" id="nama_lengkap"
                    value="<?= $karyawans -> nama; ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div id="" class="form-group">
                <label for="nip">Username</label>
                <input type="text" autocomplete="off" class="form-control effect-9" name="username" id="username"
                    value="<?= $karyawans -> username; ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
            </div>

            <?php } ?>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <select name="id_jabatan" class="form-control form-control-user">
                    <option value="">Pilih Jabatan</option>
                    <?php
                    foreach ($jabatan as $j) { ?>
                    <option value="<?= $j['id_jabatan']; ?>"><?= $j['nama_jabatan']; ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div id="" class="form-group">
                <input type="hidden" autocomplete="off" class="form-control effect-9" name="id" id="id"
                    value="<?= $karyawans -> id; ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
            </div>

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