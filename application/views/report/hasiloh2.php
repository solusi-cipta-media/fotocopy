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

<style type="text/css">
    /* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 10pt "Tahoma";
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 10mm;
        padding-top: 3mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .subpage {
        padding: 0cm;
        /* border: 5px red solid; */
        height: 297mm;
        /* outline: 2cm #FFEAEA solid; */

    }

    .clear {
        clear: both;
    }

    table {
        border-collapse: collapse;
    }

    table thead tr th {
        font-weight: normal;
    }

    .table-data,
    th,
    td {
        border: 1.5px solid black;
    }

    th,
    td {
        padding: 5px;
    }

    th {
        /* background-color: #4CAF50; */
        color: black;
    }

    @page {
        size: A4;
        margin: 0;
    }

    @media print {

        html,
        body {
            width: 210mm;
            height: 297mm;
        }

        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            /* page-break-after: auto; */
        }

        .page:last-child {
            page-break-after: auto;
        }
    }

    p {
        margin: 0;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    .total {
        vertical-align: top;
    }

    .total>td {
        border: 1px solid white;
    }
</style>


<body>
    <div class="book" style="font-size: 10px;">
        <div class="page">
            <div class="row">
                <div class="col-2">
                    <img src="<?= base_url('assets/media/favicons/cms.png') ?>" alt="logo" width="100%">
                </div>
                <div class="col-10">
                    <p><strong>CV. CIPTA MULTI SOLUTION</strong></p>
                    <p>Jl R Sanim No 36 Ruko dLiving Tanah Baru Beji Kota Depok</p>
                    <p>Telp. 0812 1000 8595 - 0813 8110 6208</p>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="col-12 text-center">
                    <h4>FORM FINISHING MESIN FOTOCOPY - <?= $identitas['nomor_mesin'] ?></h4>
                </div>
            </div>

            <div class="row">
                <div class="col-1">
                    <small>TEKNISI</small><br>
                    <small>TANGGAL</small>
                </div>
                <div class="col-3">
                    <small>: <?= $identitas['teknisi'] ?></small><br>
                    <small>: <?= date('d-M-Y', strtotime($identitas['start_oh'])) ?></small>
                </div>
                <div class="col-2">
                    <small>TIPE MESIN</small><br>
                    <small>ASAL MESIN</small>
                </div>
                <div class="col-2">
                    <small>: <?= $identitas['model'] ?></small><br>
                    <small>: <?= $identitas['asal'] ?></small>
                </div>
                <div class="col-2">
                    <small>SERIAL NUMBER</small><br>
                    <small>METER MESIN</small>
                    <!-- <small>METER MESIN : M1/C:0 M2/B:2709 M3/L:0 M4/T:0</small> -->
                </div>
                <div class="col-2">
                    <small>: <?= $identitas['serial_number'] ?></small><br>
                    <small>: <?= $identitas['meter'] ?></small>
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
        </div>
    </div>






</body>



<script src=" <?= base_url('') ?>assets/js/codebase.app.min.js">
</script>

</html>