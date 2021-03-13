<?php $this->view('admin-templates/header') ?>
<script src="http://code.jquery.com/jquery-2.0.3.min.js" data-semver="2.0.3" data-require="jquery"></script>
    <script data-require="jqueryui@*" data-semver="1.10.0" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.js" data-semver="1.9.4" data-require="datatables@*"></script>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rekap Absensi detail</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Jabatan</h6>
        </div>

        <div class="card-body">
<p id="date_filter">
    <span id="date-label-from" class="date-label">From: </span><input class="date_range_filter date" type="text" id="datepicker_from" />
    <span id="date-label-to" class="date-label">To:<input class="date_range_filter date" type="text" id="datepicker_to" />
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Lengkap</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($karyawan as $k) { ?>
                        <tr>
                            <td><?= $k['id'] ?></td>
                            <td><?= $k['nama'] ?></td>
                            <td><a href="<?php echo site_url('masterabsensi/rekapabsensiperorang/' . $k['username']); ?>"
                                    class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> lihat</a></td>
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

