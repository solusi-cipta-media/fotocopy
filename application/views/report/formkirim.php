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
                    <h4>FORM PENGIRIMAN MESIN</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Customer</p>
                    <p>PIC</p>
                    <p>Alamat</p>
                    <p>Type / No.Mesin</p>
                    <p>Serial Number</p>
                    <p>Teknisi</p>
                    <p>Tanggal</p>
                </div>
                <div class="col-10">
                    <p>: <?= $customer['customer'] ?></p>
                    <p>: <?= $customer['contact_person'] . ' - ' . $customer['handphone'] ?></p>
                    <p>: <?= $customer['lokasi'] ?></p>
                    <p>: <?= $customer['model'] . ' - ' . $customer['nomor_mesin'] ?></p>
                    <p>: <?= $customer['serial_number'] ?></p>
                    <p>: <?= $customer['teknisi'] ?></p>
                    <p>: <?= date('d-M-Y', strtotime($customer['tgl_kerja'])) ?></p>
                </div>
            </div>

            <div class="row" style="margin-top: 20px;">
                <div class="col-12 text-center">
                    <table border="1" style="width: 100%;">

                        <tr style="height: 30px;">
                            <td style="border: solid black 1px; width: 10%;"><strong>NO</strong></td>
                            <td style="border: solid black 1px;" colspan="2"><strong>KETERANGAN</strong></td>
                            <td style="border: solid black 1px; width: 20%;"><strong>CEK LIST</strong></td>
                        </tr>
                        <tr>
                            <td style="border: solid black 1px;"><strong>1</strong></td>
                            <td style="border: solid black 1px;text-align: left;" colspan="2"><strong>DOKUMENTASI FOTO KELENGKAPAN SEBELUM KIRIM</strong></td>
                            <td style="border: solid black 1px;"><strong></strong></td>
                        </tr>
                        <tr>
                            <td style="border: solid black 1px;"><strong>2</strong></td>
                            <td style="border: solid black 1px;text-align: left;" colspan="2"><strong>KELENGKAPAN MESIN</strong></td>
                            <td style="border: solid black 1px;"><strong></strong></td>
                        </tr>
                        <tr style="height: 40px;">
                            <td style="border: solid black 1px;" rowspan="8"></td>
                            <td style="border: solid black 1px;">A</td>
                            <td style="border: solid black 1px;text-align: left;">CATATAN METER</td>
                        </tr>
                        <tr style="height: 40px;">
                            <td style="border: solid black 1px;">B</td>
                            <td style="border: solid black 1px;text-align: left;">RECORD</td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr style="height: 40px;">
                            <td style="border: solid black 1px;">C</td>
                            <td style="border: solid black 1px;text-align: left;">SURAT JALAN</td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr style="height: 40px;">
                            <td style="border: solid black 1px;">D</td>
                            <td style="border: solid black 1px;text-align: left;">INVOICE</td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr style="height: 40px;">
                            <td style="border: solid black 1px;">E</td>
                            <td style="border: solid black 1px;text-align: left;">KONTRAK</td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr style="height: 40px;">
                            <td style="border: solid black 1px;">F</td>
                            <td style="border: solid black 1px;text-align: left;">KABEL POWER DAN KABEL LAN (LAN TESTER & AVO METER & LAPTOP)</td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr style="height: 40px;">
                            <td style="border: solid black 1px;">G</td>
                            <td style="border: solid black 1px;text-align: left;">STIKER CMS</td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr style="height: 40px;">
                            <td style="border: solid black 1px;">H</td>
                            <td style="border: solid black 1px;text-align: left;">TRAINING CARA LAPORKAN KERUSAKAN BAIK FOTO HASIL KODE ERROR DILAYAR ATAU BAGIAN YANG BERMASALAH</td>
                            <td style="border: solid black 1px;"></td>
                        </tr>
                        <tr>
                            <td style="border: solid black 1px;"><strong>3</strong></td>
                            <td style="border: solid black 1px;text-align: left;" colspan="2"><strong>Dokumentasi (Foto) Serah Terima Mesin Di Customer (Team+Plang Nama, Team+Mesin, Team+Cust, Cust+Mesin)</strong></td>
                            <td style="border: solid black 1px;"><strong></strong></td>
                        </tr>
                        <tr style="height: 30px;">
                            <td style="border: solid black 1px;text-align: left;" colspan="4"><strong>CATATAN : <?= $customer['klasifikasi'] ?></strong></td>
                        </tr>


                    </table>

                    <div style="text-align: left;margin-top: 10px;"><strong>NOTE : Cek kembali kelengkapan 1 - 1</strong></div>

                    <div class="row" style="margin-top: 50px;">
                        <div class="col-12">
                            <small style="margin-right: 100px;">Tanggal,</small><small><?= date('Y') ?></small>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 30px;">
                        <div class="col-4">
                            <small>Penerima</small><br style="margin-bottom: 100px;">
                            <small style="margin-right: 150px;">(</small><small>)</small>
                        </div>
                        <div class="col-4">
                            <small>Teknisi</small><br style="margin-bottom: 100px;">
                            <small style="margin-right: 150px;">(</small><small>)</small>
                        </div>
                        <div class="col-4">
                            <small>Approval</small><br style="margin-bottom: 100px;">
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