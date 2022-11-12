<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>CMS - Absensi & Laporan Pekerjaan</title>
    <meta name="description" content="CMS - Absensi & Laporan Pekerjaan">
    <meta name="author" content="solusiciptamedia">
    <meta name="robots" content="noindex, nofollow">
    <meta property="og:title" content="CMS - Absensi & Laporan Pekerjaan">
    <meta property="og:site_name" content="solusiciptamedia">
    <meta property="og:description" content="CMS - Absensi & Laporan Pekerjaan">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" href="<?= base_url('') ?>assets/media/favicons/cms.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('') ?>assets/media/favicons/cms.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('') ?>assets/media/favicons/cms.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap">
    <link rel="stylesheet" id="css-main" href="<?= base_url('') ?>assets/css/codebase.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style_new.css') ?>">
</head>

<body>
    <div id="page-container" class="main-content-boxed fs-14">
        <main id="main-container">
            <div class="s_page">
                <div class="text-center ln-2re mb-3" id="head">
                    <div class="logo">
                        <a href="javascript:void(0);"><?= $this->session->userdata('name') ?> </a> <br>
                        <small>NIK. <?= $this->session->userdata('nik') ?></small><br>
                        <?php
                        $image_new = '';
                        $url_img = '';
                        if ($image != '' && $image != 'null') {
                            $image_new = $image;
                            $url_img = 'images/profile/';
                        } else {
                            $image_new = 'defaults.jpg';
                            $url_img = 'default/';
                        }
                        ?>
                        <img class="profile-user-img img-responsive img-circle" alt="Image placeholder" src="<?= base_url('assets/media/' . $url_img . $image_new . '') ?>" style="width: 100px;height: 100px;border-radius: 50px;object-fit:cover;">
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block block-rounded block-link-shadow overflow-hidden shadow shadow-danger ">
                                <div class="block-content block-content-full">
                                    <div class="row">
                                        <div class="col-9">
                                            <p class="login-box-msg text-center p-l-20"><b><?= $tanggal ?></b></p>
                                        </div>
                                        <div class="col-1 mr-0-5">
                                            <a class="link-fx text-dual" href="<?= base_url('dashboard') ?>">
                                                <i class="nav-main-link-icon fa fa-house-user fa-1-3"></i>
                                            </a>
                                        </div>
                                        <div class="col-1">
                                            <a class="link-fx text-dual" href="<?= base_url('auth/logout') ?>">
                                                <i class="si si-power fa-1-3"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="waktu"><small id="jam"></small> : <small id="menit"></small> : <small id="detik"></small><small> <?= date('A') ?></small> </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div id="top-bar" class="body text-center s-top-bar">
                                            <div class="icon-button-demo">
                                                <button id="btn_hadir" type="button" class="btn btn-primary waves-effect s-btn-hth">
                                                    <i class="nav-main-link-icon fa fa-calendar-check"></i><br>Hadir
                                                </button>
                                                <button id="btn_tidak_hadir" type="button" class="btn btn-success waves-effect s-btn-hth">
                                                    <i class="nav-main-link-icon fa fa-calendar-xmark"></i><br>Tidak hadir
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <script src="<?= base_url('') ?>assets/js/codebase.app.min.js"></script>

    <!-- jQuery (required for Select2 + jQuery Validation plugins) -->
    <script src="<?= base_url('') ?>assets/js/lib/jquery.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="<?= base_url('') ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="<?= base_url('') ?>assets/js/pages/op_auth_signin.min.js"></script>
</body>

</html>

<script>
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("detik").innerHTML = waktu.getSeconds();
    }
</script>