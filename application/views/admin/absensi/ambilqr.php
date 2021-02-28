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
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Karwayan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>username</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($karyawan as $k) { ?>
                                        <tr>
                                            <td><?= $k['id'] ?></td>
                                            <td><?= $k['nama'] ?></td>
                                            <td><?= $k['username'] ?></td>
                                            <td><img src="<?= base_url('assets/images/') . $k['image']; ?>" class="img-fluid img-thumbnail" width="200" height="40" alt="..."></td>
                                            <td><a href="<?php echo site_url('masterabsensi/cetakqr/' . $k['id']); ?>" class="btn btn-info"><i class="fas fa-edit"></i>Cetak QR</a>
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