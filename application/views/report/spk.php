<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CMS - Surat Perintah Kerja</title>
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
                    <h4 style="margin-bottom: 5px;">FORM PERINTAH KERJA</h4>
                    <h4>OVERHAUL MESIN FOTOCOPY</h4>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-12 text-center">
                    <table border="0" style="width: 100%;">

                        <tr style="height: 30px; border-bottom: 1px solid black;border-top: 1px solid black;">
                            <td style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px; width: 40%;font-weight: bold;text-align: left;">NO MESIN</td>
                            <td class="text-center" style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px; width: 5%;">:</td>
                            <td style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;text-align: left;"><?= $detail['nomor_mesin'] ?></td>
                        </tr>
                        <tr style="height: 30px; border-bottom: 1px solid black;border-top: 1px solid black;">
                            <td style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px; width: 40%;font-weight: bold;text-align: left;">TANGGAL MASUK MESIN</td>
                            <td class="text-center" style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;">:</td>
                            <td style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;text-align: left;"><?= date('d-M-Y', strtotime($detail['tgl_masuk'])) ?></td>
                        </tr>
                        <tr style="height: 30px; border-bottom: 1px solid black;border-top: 1px solid black;">
                            <td style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px; width: 40%;font-weight: bold;text-align: left;">TIPE MESIN</td>
                            <td class="text-center" style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;">:</td>
                            <td style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;text-align: left;"><?= $detail['model'] ?></td>
                        </tr>
                        <tr style="height: 30px; border-bottom: 1px solid black;border-top: 1px solid black;">
                            <td style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px; width: 40%;font-weight: bold;text-align: left;">SN BODY/SN DALAM</td>
                            <td class="text-center" style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;">:</td>
                            <td style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;text-align: left;"><?= $detail['serial_number'] ?></td>
                        </tr>
                        <tr style="height: 30px; border-bottom: 1px solid black;border-top: 1px solid black;">
                            <td style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px; width: 40%;font-weight: bold;text-align: left;">ASAL MESIN</td>
                            <td class="text-center" style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;">:</td>
                            <td style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;text-align: left;"><?= $detail['asal'] ?></td>
                        </tr>
                        <tr style="height: 30px; border-bottom: 1px solid black;border-top: 1px solid black;">
                            <td style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px; width: 40%;font-weight: bold;text-align: left;">TANGGAL NAIK OVERHAUL</td>
                            <td class="text-center" style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;">:</td>
                            <td style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;text-align: left;"><?= date('d-M-Y H:i:sa', strtotime($detail['start_oh'])) ?></td>
                        </tr>
                        <tr style="height: 30px; border-bottom: 1px solid black;border-top: 1px solid black;">
                            <td style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px; width: 40%;font-weight: bold;text-align: left;">TEKNISI</td>
                            <td class="text-center" style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;">:</td>
                            <td style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;text-align: left;"><?= $detail['teknisi'] ?></td>
                        </tr>
                        <tr style="height: 30px; border-bottom: 1px solid black;border-top: 1px solid black;">
                            <td style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px; width: 40%;font-weight: bold;text-align: left;">TANGGAL SELESAI OVERHAUL</td>
                            <td class="text-center" style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;">:</td>
                            <td style="vertical-align: middle;padding-top: 10px;padding-bottom: 10px;text-align: left;"><?= date('d-M-Y H:i:sa', strtotime($detail['finish_oh'])) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-12 text-center">
                    <img src="<?= base_url('assets/qrcode/AGUS.png') ?>" style="width: 20%;">
                    <!-- <img src="<?= base_url('assets/qrcode/' . $qrcode_pict) ?>" style="width: 20%;"> -->
                    <h5>CV. CIPTA MULTI SOLUTION</h5>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-6 text-center">
                    <h5 style="margin-bottom: 5px;">PERINTAH KERJA</h5>
                    <p style="font-size: 14px;margin-bottom: 100px;">Tanggal : 12-Juni-2022</p>
                    <p><small style="font-size: 14px;margin-right: 100px;">( Agus )</small><small style="font-size: 14px;">( Wisnu )</small></p>
                </div>
                <div class="col-6 text-center">
                    <h5 style="margin-bottom: 5px;">FINISHING</h5>
                    <p style="font-size: 14px;margin-bottom: 100px;">Tanggal : 12-Juni-2022</p>
                    <p><small style="font-size: 14px;margin-right: 100px;">( Agus )</small><small style="font-size: 14px;">( Wisnu )</small></p>
                </div>
            </div>
        </div>
    </div>






</body>



<script src=" <?= base_url('') ?>assets/js/codebase.app.min.js">
</script>

</html>