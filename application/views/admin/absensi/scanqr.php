<?php $this->view('admin-templates/header') ?>

<?php $this->view('admin-templates/sidebar') ?>

<?php $this->view('admin-templates/topbar') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <style media="screen">
        .btn-md {
            padding: 1rem 2.4rem;
            font-size: .94rem;
            display: none;
        }

        .swal2-popup {
            font-family: inherit;
            font-size: 1.2rem;
        }
    </style>
    <section class='content' id="demo-content">
        <div class='row'>
            <div class='col-xs-12'>
                <div class='box'>
                    <div class='box-header'></div>
                    <div class='box-body'>
                        <?php
                    $attributes = array('id' => 'button');
                    echo form_open('masterabsensi/cek_id',$attributes);?>
                        <div id="sourceSelectPanel" style="display:none">
                            <label for="sourceSelect">Change video source:</label>
                            <select id="sourceSelect" style="max-width:400px"></select>
                        </div>
                        <div>
                            <video id="video" width="500" height="400" style="border: 1px solid gray"></video>
                        </div>
                        <textarea hidden="" name="username" id="result" readonly></textarea>
                        <span> <input type="submit" id="button" class="btn btn-success btn-md"
                                value="Cek Kehadiran"></span>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </section>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script type="text/javascript" src="<?= base_url('assets/')?>plugins/zxing/zxing.min.js"></script>
<script type="text/javascript">
    window.addEventListener('load', function () {
        let selectedDeviceId;
        let audio = new Audio("<?= base_url('assets/')?>audio/beep.mp3");
        const codeReader = new ZXing.BrowserQRCodeReader()
        console.log('ZXing code reader initialized')
        codeReader.getVideoInputDevices()
            .then((videoInputDevices) => {
                const sourceSelect = document.getElementById('sourceSelect')
                selectedDeviceId = videoInputDevices[0].deviceId
                if (videoInputDevices.length >= 1) {
                    videoInputDevices.forEach((element) => {
                        const sourceOption = document.createElement('option')
                        sourceOption.text = element.label
                        sourceOption.value = element.deviceId
                        sourceSelect.appendChild(sourceOption)
                    })
                    sourceSelect.onchange = () => {
                        selectedDeviceId = sourceSelect.value;
                    };
                    const sourceSelectPanel = document.getElementById('sourceSelectPanel')
                    sourceSelectPanel.style.display = 'block'
                }
                codeReader.decodeFromInputVideoDevice(selectedDeviceId, 'video').then((result) => {
                    console.log(result)
                    document.getElementById('result').textContent = result.text
                    if (result != null) {
                        audio.play();
                    }
                    $('#button').submit();
                }).catch((err) => {
                    console.error(err)
                    document.getElementById('result').textContent = err
                })
                console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
            })
            .catch((err) => {
                console.error(err)
            })
    })
</script>
<?php $this->view('admin-templates/footer') ?>