<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data jabatan</h1>
    </div>

    <a href="<?= base_url('masterjabatan/tambahjabatan') ?>" class="btn btn-primary mb-3"><i
            class="fas fa-file-alt"></i> Tambah Jabatan Baru</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Jabatan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jabatan as $roles) { ?>
                        <tr>
                            <td><?= $roles['id_jabatan'] ?></td>
                            <td><?= $roles['nama_jabatan'] ?></td>
                            <td><a href="<?php echo site_url('masterjabatan/updatejabatan/' . $roles['id_jabatan']); ?>"
                                    class="btn btn-info"><i class="fas fa-edit"></i>Ubah</a>
                                <a href="<?php echo site_url('masterjabatan/hapusjabatan/' . $roles['id_jabatan']); ?>"
                                    onclick="return confirm('kamu yakin akan menghapus  ?');"
                                    class="btn btn-danger"><i class="fas fa-trash"></i> hapus</a></td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->view('admin-templates/footer') ?>