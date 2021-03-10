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
        <form method="POST" action="<?= base_url('masterkaryawan/tambahkaryawanAct') ?>">
            <div id="" class="form-group">
                <label for="nip">Nama Lengkap</label>
                <input type="text" autocomplete="off" class="form-control effect-9" name="nama" id="nama_lengkap" value="<?= set_value('nama'); ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div id="" class="form-group">
                <label for="nip">Username</label>
                <input type="text" autocomplete="off" class="form-control effect-9" name="username" id="username" value="<?= set_value('username'); ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group">
                        <select name="id_jabatan" class="form-control form-control-user">
                            <option value="">Pilih Jabatan</option>
                            <?php
                            foreach ($jabatan as $j) { ?>
                                <option value="<?= $j['id_jabatan']; ?>"><?= $j['nama_jabatan']; ?></option>
                            <?php } ?>
                        </select>
                    </div>


            <div class="row">
                <div class="form-group col-6">
                    <label for="password" class="d-block">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-6">
                    <label for="retype_password" class="label-font-register">Retype password</label>
                    <input type="password" class="form-control" name="retype_password" id="retype_password">
                    <?= form_error('retype_password', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>

            <div class="form-check">
                <input class="form-check-input checkbox" type="checkbox" id="defaultCheck1" required="">
                <label class=" form-check-label" for="defaultCheck1">
                    Saya setuju dan ingin melanjutkan
                </label>
            </div>
            <p class="terms">Dengan mendaftar anda menyetujui <i>privasi dan persyaratan ketentuan
            hukum kami </i>
            baca selengkapnya <a href="#"> disini</a></p>
            <button type="submit" class="btn btn-primary btn-lg btn-block">
                Daftar ⭢
            </button>
        </form>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->view('admin-templates/footer') ?>