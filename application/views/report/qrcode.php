<!-- Main Container -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CMS - Form Pengiriman Mesin</title>
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
                <div class="col-xs-12 text-center">
                    <div style="border: 1px solid #000;margin:auto;padding-bottom:20px;">
                        <h1>QRCODE - MESIN</h1>
                        <h2>CV. CIPTA MULTI SOLUTION</h2>
                        <h2><img src="<?= base_url('assets/qrcode/' . $qrcode_pict) ?>" style="width: 20%;"></h2>
                        <h3 style="font-style: italic;">SN: <?= $qrcode ?></h3>
                        <h5>Generate Date : <?= $tanggal ?></h5>
                        <!-- <h5><strong>Supplier : PT. Nitto Materials Indonesia</strong></h5> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src=" <?= base_url('') ?>assets/js/codebase.app.min.js">
</script>

</html>