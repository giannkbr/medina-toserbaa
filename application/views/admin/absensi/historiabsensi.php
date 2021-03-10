<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rekap Absensi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>username</th>
                            <th>Jabatan</th>
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($absensi as $a) { ?>
                            <tr>
                                <td><?= $a['id_absen'] ?></td>
                                <td><?= $a['username'] ?></td>
                                <td><?= $a['nama_jabatan'] ?></td>
                                <td><?= $a['tanggal'] ?></td>
                                <td><?= $a['jam_masuk'] ?></td>
                                <td><?= $a['jam_keluar'] ?></td>
                                <td><?= $a['status'] ?></td>
                                <td>
                                    <a href="<?php echo site_url('masterabsensi/hapusabsensi/' . $a['id_absen']); ?>" onclick="return confirm('kamu yakin akan menghapus  ?');" class="badge badge-danger"><i class="fas fa-trash"></i> hapus</a></td>
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