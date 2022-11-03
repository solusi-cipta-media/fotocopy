<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CMS - Catatan Meter</title>
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?= base_url('') ?>assets/media/favicons/cms.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('') ?>assets/media/favicons/cms.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('') ?>assets/media/favicons/cms.png">
    <!-- END Icons -->

    <link rel="stylesheet" id="css-main" href="<?= base_url('') ?>assets/css/codebase.min.css">

</head>

<style>
    p {
        margin: 0;
        line-height: 1.5;
    }
</style>

<body>
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
            <h4>CATATAN METER</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <p>Nama</p>
            <p>Alamat</p>
            <p>Kolektor</p>
            <p>Status</p>
            <p>Tgl. Instal</p>
        </div>
        <div class="col-4">
            <p>: <?= $customer['customer'] ?></p>
            <p>: <?= $customer['alamat'] ?></p>
            <p>: <?= $customer['kolektor'] ?></p>
            <p>: <?= $customer['status'] ?></p>
            <p>: <?= date('d-M-Y', strtotime($customer['tgl_instal'])) ?></p>
        </div>
        <div class="col-2">
            <p>Model</p>
            <p>Lokasi</p>
            <p>Telp</p>
            <p>Fax</p>
            <p>No. Kontrak</p>
        </div>
        <div class="col-4">
            <p>: <?= $customer['model'] ?></p>
            <p>: <?= $customer['lokasi'] ?></p>
            <p>: <?= $customer['telp'] ?></p>
            <p>: <?= $customer['fax'] ?></p>
            <p>: <?= $customer['nomor_kontrak'] ?></p>
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-12 text-center">
            <table border="1" style="width: 100%;">

                <tr style="height: 30px;">
                    <td style="border: solid black 1px; width: 10%;" rowspan="2"><strong>BULAN TAGIHAN</strong></td>
                    <td style="border: solid black 1px;" colspan="8"><strong>POSISI METER</strong></td>
                    <td style="border: solid black 1px; width: 20%;" colspan="8"><strong>PELANGGAN</strong></td>
                </tr>
                <tr>
                    <td style="border: solid black 1px;"><strong>TGL</strong></td>
                    <td style="border: solid black 1px;" colspan="7"><strong>TOTAL POSISI METER</strong></td>
                    <td style="border: solid black 1px;"><strong>TTD & NAMA</strong></td>
                </tr>
                <tr style="height: 40px;">
                    <td style="border: solid black 1px;">Install</td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                </tr>
                <tr style="height: 40px;">
                    <td style="border: solid black 1px;">Sep-22</td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                </tr>
                <tr style="height: 40px;">
                    <td style="border: solid black 1px;">Oct-22</td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                </tr>
                <tr style="height: 40px;">
                    <td style="border: solid black 1px;">Nov-22</td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                </tr>
                <tr style="height: 40px;">
                    <td style="border: solid black 1px;">Dec-22</td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                </tr>
                <tr style="height: 40px;">
                    <td style="border: solid black 1px;">Jan-23</td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                </tr>
                <tr style="height: 40px;">
                    <td style="border: solid black 1px;">Feb-23</td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                </tr>
                <tr style="height: 40px;">
                    <td style="border: solid black 1px;">Mar-23</td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                </tr>
                <tr style="height: 40px;">
                    <td style="border: solid black 1px;">Apr-23</td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                </tr>
                <tr style="height: 40px;">
                    <td style="border: solid black 1px;">May-23</td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                </tr>
                <tr style="height: 40px;">
                    <td style="border: solid black 1px;">Jun-23</td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                </tr>
                <tr style="height: 40px;">
                    <td style="border: solid black 1px;">Jul-23</td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                </tr>
                <tr style="height: 40px;">
                    <td style="border: solid black 1px;">Aug-23</td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                </tr>
                <tr style="height: 40px;">
                    <td style="border: solid black 1px;">Sep-23</td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                </tr>
                <tr style="height: 40px;">
                    <td style="border: solid black 1px;">Oct-23</td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                </tr>
                <tr style="height: 40px;">
                    <td style="border: solid black 1px;">Nov-23</td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                </tr>
                <tr style="height: 40px;">
                    <td style="border: solid black 1px;">Dec-23</td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                    <td style="border: solid black 1px;"></td>
                </tr>


            </table>
        </div>
    </div>
</body>



<script src=" <?= base_url('') ?>assets/js/codebase.app.min.js">
</script>

</html>