<!-- Main Container -->
<?php
//set time jakarta WIB
date_default_timezone_set('Asia/Jakarta');
?>
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-xs-12 text-center">
                <div style="border: 1px solid #000;margin:auto;padding-bottom:20px;">
                    <h1>QRCODE - MESIN</h1>
                    <h2>CV. CIPTA MULTI SOLUTION</h2>
                    <h2><img src="<?= base_url('assets/qrcode/' . $qrcode_pict) ?>" style="width: 10%;"></h2>
                    <h3 style="font-style: italic;">SN: <?= $qrcode ?></h3>
                    <h5>Generate Date : <?= date('d-M-Y H:i:sa', strtotime(date('Y-m-d H:i:sa'))); ?></h5>
                    <!-- <h5><strong>Supplier : PT. Nitto Materials Indonesia</strong></h5> -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>