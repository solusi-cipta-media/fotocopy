<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CMS - List Training</title>
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
                    <p>Jl. Pramuka No. 48 Malang</p>
                    <p>Telp. 6576575 - Fax. 7657578</p>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="col-12 text-center">
                    <h4>CEK LIST TRAINING</h4>
                </div>
            </div>

            <div class="row" style="margin-top: 20px;">
                <div class="col-12 text-center">
                    <table border="1" style="width: 100%;">

                        <tr style="height: 30px;">
                            <td style="border: solid black 1px; width: 10%;"><strong>NO</strong></td>
                            <td style="border: solid black 1px;"><strong>BAGIAN TRAINING</strong></td>
                            <td style="border: solid black 1px;"><strong>CEK</strong></td>
                            <td style="border: solid black 1px;"><strong>KETERANGAN</strong></td>
                        </tr>
                        <tr style="height: 20px;">
                            <td style="border: solid black 1px;">1</td>
                            <td style="border: solid black 1px;text-align: left;padding-left: 10px;">Letak dan fungsi tombol on/off</td>
                            <td style="border: solid black 1px;"></td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr style="height: 20px;">
                            <td style="border: solid black 1px;">2</td>
                            <td style="border: solid black 1px;text-align: left;padding-left: 10px;">Cara memasang / mengganti kertas</td>
                            <td style="border: solid black 1px;"></td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr style="height: 20px;">
                            <td style="border: solid black 1px;">3</td>
                            <td style="border: solid black 1px;text-align: left;padding-left: 10px;">Melihat ukuran kertas di panel</td>
                            <td style="border: solid black 1px;"></td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr style="height: 20px;">
                            <td style="border: solid black 1px;">4</td>
                            <td style="border: solid black 1px;text-align: left;padding-left: 10px;">Cara memperbesar/memperkecil</td>
                            <td style="border: solid black 1px;"></td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr style="height: 20px;">
                            <td style="border: solid black 1px;">5</td>
                            <td style="border: solid black 1px;text-align: left;padding-left: 10px;">Cara membuat copy 1-1 / 2-2</td>
                            <td style="border: solid black 1px;"></td>
                            <td style="border: solid black 1px;">DADF dan platen</td>
                        </tr>
                        <tr style="height: 20px;">
                            <td style="border: solid black 1px;">6</td>
                            <td style="border: solid black 1px;text-align: left;padding-left: 10px;">Fungsi lighter / darker</td>
                            <td style="border: solid black 1px;"></td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr style="height: 20px;">
                            <td style="border: solid black 1px;">7</td>
                            <td style="border: solid black 1px;text-align: left;padding-left: 10px;">Membuat foto copy dari DADF dan platen</td>
                            <td style="border: solid black 1px;"></td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr style="height: 20px;">
                            <td style="border: solid black 1px;">8</td>
                            <td style="border: solid black 1px;text-align: left;padding-left: 10px;">Cara membuat fotocopy KTP</td>
                            <td style="border: solid black 1px;"></td>
                            <td style="border: solid black 1px;">Repeat image</td>
                        </tr>
                        <tr style="height: 20px;">
                            <td style="border: solid black 1px;">9</td>
                            <td style="border: solid black 1px;text-align: left;padding-left: 10px;">Cara mengatasi paper jam</td>
                            <td style="border: solid black 1px;"></td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr style="height: 20px;">
                            <td style="border: solid black 1px;">10</td>
                            <td style="border: solid black 1px;text-align: left;padding-left: 10px;">Cara membersihkankan kaca platen</td>
                            <td style="border: solid black 1px;"></td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr style="height: 20px;">
                            <td style="border: solid black 1px;">11</td>
                            <td style="border: solid black 1px;text-align: left;padding-left: 10px;">Cara membuat laporan kerusakan</td>
                            <td style="border: solid black 1px;"></td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr style="height: 20px;">
                            <td style="border: solid black 1px;">12</td>
                            <td style="border: solid black 1px;text-align: left;padding-left: 10px;">Cara print standard dan booklet</td>
                            <td style="border: solid black 1px;"></td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr style="height: 20px;">
                            <td style="border: solid black 1px;">13</td>
                            <td style="border: solid black 1px;text-align: left;padding-left: 10px;">Cara scan dokumen</td>
                            <td style="border: solid black 1px;"></td>
                            <td style="border: solid black 1px;">DADF dan platen</td>
                        </tr>
                        <tr style="height: 20px;">
                            <td style="border: solid black 1px;">14</td>
                            <td style="border: solid black 1px;text-align: left;padding-left: 10px;">Cara isi toner dan status chipnya</td>
                            <td style="border: solid black 1px;"></td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr style="height: 20px;">
                            <td style="border: solid black 1px;">15</td>
                            <td style="border: solid black 1px;text-align: left;padding-left: 10px;">Cara melihat status chip drum</td>
                            <td style="border: solid black 1px;"></td>
                            <td style="border: solid black 1px;"></td>
                        </tr>


                    </table>
                    <div class="row" style="margin-top: 100px;">
                        <div class="col-12">
                            <small style="margin-right: 100px;">Tanggal,</small><small><?= date('Y') ?></small>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 30px;">
                        <div class="col-6">
                            <small>Customer</small><br style="margin-bottom: 100px;">
                            <small style="margin-right: 150px;">(</small><small>)</small>
                        </div>
                        <div class="col-6">
                            <small>Teknisi</small><br style="margin-bottom: 100px;">
                            <small style="margin-right: 150px;">(</small><small>)</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>



<script src=" <?= base_url('') ?>assets/js/codebase.app.min.js">
</script>

</html>