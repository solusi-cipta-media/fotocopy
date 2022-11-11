<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CMS - Machine Record</title>
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
                    <h4>MACHINE RECORD</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Nama</p>
                    <p>Alamat</p>
                    <p>Telp</p>
                    <p>Operator</p>
                </div>
                <div class="col-4">
                    <p>: <?= $customer['customer'] ?></p>
                    <p>: <?= $customer['lokasi'] ?></p>
                    <p>: <?= $customer['handphone'] ?></p>
                    <p>: ALL</p>
                </div>
                <div class="col-2">
                    <p>Model</p>
                    <p>Tegangan</p>
                    <p>Tanggal Instal</p>
                    <p>Teknisi</p>
                    <p>Status</p>
                </div>
                <div class="col-4">
                    <p>: <?= $customer['model'] ?></p>
                    <p>: <?= $customer['tegangan'] ?></p>
                    <p>: <?= date('d-M-Y', strtotime($customer['tgl_kerja'])) ?></p>
                    <p>: <?= $customer['teknisi'] ?></p>
                    <p>: <?= $customer['klasifikasi'] ?></p>
                </div>
            </div>

            <div class="row" style="margin-top: 20px;">
                <div class="col-12 text-center">
                    <table border="1" style="width: 100%;">

                        <tr style="height: 30px;">
                            <td style="border: solid black 1px; width: 5%;"><strong>NO</strong></td>
                            <td style="border: solid black 1px;"><strong>TANGGAL</strong></td>
                            <td style="border: solid black 1px;"><strong>URAIAN</strong></td>
                            <td style="border: solid black 1px;"><strong>TIME IN</strong></td>
                            <td style="border: solid black 1px;"><strong>TIME OUT</strong></td>
                            <td style="border: solid black 1px;"><strong>METER</strong></td>
                            <td style="border: solid black 1px;"><strong>TEKNISI</strong></td>
                        </tr>

                        <?php
                        $r = 1;
                        foreach ($details as $key => $value) {

                            echo '<tr style="height: 40px;">';
                            echo '<td style="border: solid black 1px;">' . $r . '</td>';
                            echo '<td style="border: solid black 1px;">' . date('d-M-Y', strtotime($value['tgl_kerja'])) . '</td>';
                            echo '<td style="border: solid black 1px;">' . $value['uraian'] . '</td>';
                            echo '<td style="border: solid black 1px;">' . date('d-M-Y H:i:sa', strtotime($value['time_in'])) . '</td>';
                            echo '<td style="border: solid black 1px;">' . date('d-M-Y H:i:sa', strtotime($value['time_out'])) . '</td>';
                            echo '<td style="border: solid black 1px;">' . $value['meter'] . '</td>';
                            echo '<td style="border: solid black 1px;">' . $value['teknisi'] . '</td>';
                            echo '</tr>';

                            $r++;
                        }

                        ?>


                    </table>
                </div>
            </div>
        </div>
    </div>




</body>



<script src=" <?= base_url('') ?>assets/js/codebase.app.min.js">
</script>

</html>