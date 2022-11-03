<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CMS - Hasil Report Overhaul</title>
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?= base_url('') ?>assets/media/favicons/cms.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('') ?>assets/media/favicons/cms.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('') ?>assets/media/favicons/cms.png">
    <!-- END Icons -->

    <link rel="stylesheet" id="css-main" href="<?= base_url('') ?>assets/css/codebase.min.css">


</head>


<body>
    <div class="row">
        <div class="col-12 text-center">
            <h4>FORM FINISHING MESIN FOTOCOPY - <?= $identitas['nomor_mesin'] ?></h4>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <small>TEKNISI : <?= $identitas['teknisi'] ?></small><br>
            <small>TANGGAL : <?= date('d-M-Y', strtotime($identitas['start_oh'])) ?></small>
        </div>
        <div class="col-4">
            <small>TIPE MESIN : <?= $identitas['model'] ?></small><br>
            <small>ASAL MESIN : <?= $identitas['asal'] ?></small>
        </div>
        <div class="col-4">
            <small>SERIAL NUMBER : <?= $identitas['serial_number'] ?></small><br>
            <small>METER MESIN : <?= $identitas['meter'] ?></small>
            <!-- <small>METER MESIN : M1/C:0 M2/B:2709 M3/L:0 M4/T:0</small> -->
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-12 text-center">
            <table border="0" style="width: 100%;">
                <thead>
                    <tr style="height: 30px; border-bottom: 1px solid black;border-top: 1px solid black;">
                        <th class="text-center" style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;">NO</th>
                        <th class="text-center" style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;">NAMA</th>
                        <th class=" text-center" style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;">CHECK AWAL</th>
                        <th class="text-center" style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;">FINISHING</th>
                        <th class=" text-center" style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;">PENGGANTIAN BARANG</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($details as $key => $value) {
                    ?>
                        <tr>
                            <td style="padding-top: 3px;padding-bottom: 3px;"><?= $no ?></td>
                            <td><?= $value['komponen_check'] ?></td>
                            <td><?= $value['check_awal'] ?></td>
                            <td><?= $value['finishing'] ?></td>
                            <td><?= $value['penggantian_barang'] ?></td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>



<script src=" <?= base_url('') ?>assets/js/codebase.app.min.js">
</script>

</html>