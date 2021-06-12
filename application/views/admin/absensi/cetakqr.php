<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="m-0 font-weight-bold text-primary"><?= $title ?></h1>
    </div>

  <!--  <div>
   <img class="img-responsive" src="<?php echo base_url('assets/img/qrcode/') .  $karyawan['username']  . 'code.png'; ?>" />
   </div> -->


   <div class="container-fluid text-center" id="print-area" >
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
                <div class="widget-user-image">
                    <img class="img-responsive" src="<?php echo base_url('assets/img/qrcode/') .  $karyawan['username']  . 'code.png'; ?>" />
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><?php echo $karyawan['username']; ?></h3>
                <h5 class="widget-user-desc"><?php echo $karyawan['nama']; ?></h5>
                
            </div>
        </div>
    </div>
    <button onclick="printDiv('print-area')" class='pull-right'><i class='fa fa-print'></i> Print</button>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>



<?php $this->view('admin-templates/footer') ?>
