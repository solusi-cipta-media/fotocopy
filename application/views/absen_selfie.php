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

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="<?= base_url('') ?>assets/js/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>resources/select2/select2.min.css">
</head>
<style>
    /* spinner */
    .overlay {
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: rgba(255, 255, 255, 0.8) url("<?php base_url("assets/media/default/spin.gif") ?>") center no-repeat;
    }

    .select2-container--default .select2-selection--single {
        background-color: transparent;
        border: 1px solid #d8dde5;
        border-radius: 5px;
        /* padding-right: 65.8rem; */
        width: 435px;
        padding-bottom: 2rem;
        padding-top: 0.4rem;
    }

    @media screen and (max-width: 400px) {
        .select2-container--default .select2-selection--single {
            background-color: transparent;
            border: 1px solid #d8dde5;
            border-radius: 5px;
            /* padding-right: 65.8rem; */
            width: 295px;
            padding-bottom: 2rem;
            padding-top: 0.4rem;
        }
    }
</style>

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
                            $url_img = 'karyawan/';
                        } else {
                            $image_new = 'defaults.jpg';
                            $url_img = 'default/';
                        }
                        ?>
                        <img class="profile-user-img img-responsive img-circle" alt="Image placeholder" src="<?= base_url('assets/media/' . $url_img . $image_new . '') ?>" style="width: 100px;height: 100px;border-radius: 50px;object-fit:cover;">
                    </div>
                </div>
                <div id="body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block block-rounded block-link-shadow overflow-hidden shadow shadow-danger ">
                                <div class="block-content block-content-full">
                                    <div class="row">
                                        <div class="col-10">
                                            <p class="login-box-msg text-center p-l-20"><b><?= $tanggal ?></b></p>
                                        </div>
                                        <div class="col-2">
                                            <button type="button" class="btn btn-sm btn-flat-success waves-effect waves-float waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v fa-1"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item link-fx text-dual" href="<?= base_url('dashboard') ?>">
                                                    <i class="nav-main-link-icon fa fa-house-user fa-1 mr-0-5"></i> <span>Dashboard</span>
                                                </a>
                                                <a class=" dropdown-item link-fx text-dual" href="<?= base_url('auth/logout') ?>">
                                                    <i class="si si-power fa-1 mr-0-5"></i> <span>Logout</span>
                                                </a>
                                            </div>
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

                <div class="container text-center" id="absen">

                    <div class="camera cam_clock_in">
                        <div class="upload-loading"></div>
                        <video playsinline id="video" class="" style="width: 400; margin-left: auto; margin-right: auto; display: block;"></video>
                        <canvas id="canvas"></canvas>
                        <p class="histori1">
                        </p>
                    </div>
                    <div class="camera cam_clock_out">
                        <div class="upload-loading2"></div>
                        <video playsinline id="video2" class="" style="width: 400; margin-left: auto; margin-right: auto; display: block;"></video>
                        <canvas id="canvas2"></canvas>
                        <p class="histori2">
                        </p>
                    </div>
                    <div class="text-center btn_clock_in">
                        <button class="btn btn-primary btn-md btn-take-photo" style="max-width: 100%; width: 200px;margin-top:10px;" type="button">
                            <i class="fa fa-camera" style="font-size: 14px;margin-right: 5px;margin-top: 1px;"></i>
                            <span style="font-size: 14px;"> Ambil Foto</span>
                        </button>
                        <button class="btn btn-primary btn-md btn-retake-photo" style="max-width: 100%; width: 200px;margin-top:10px;" type="button">
                            <i class="fa fa-camera" style="font-size: 14px;margin-right: 5px;margin-top: 1px;"></i>
                            <span style="font-size: 14px;"> Ambil Ulang Foto</span>
                        </button>
                        <button class="btn btn-primary btn-md btn-simpan" style="max-width: 100%; width: 200px;margin-top:10px;" type="button">
                            <i class="fa fa-paper-plane" style="font-size: 14px;margin-right: 5px"></i>
                            <span style="font-size: 14px;">Simpan</span>
                        </button>
                        <button class="btn btn-danger btn-md btn-back" style="max-width: 100%; width: 200px;margin-top:10px;" type="button">
                            <i class="fa fa-arrow-left" style="font-size: 14px;"></i>
                            <span style="font-size: 14px;"> Back</span>
                        </button>
                    </div>
                    <div class="text-center btn_clock_out">
                        <button class="btn btn-primary btn-md btn-take-photo2" style="max-width: 100%; width: 200px;margin-top:10px;" type="button">
                            <i class="fa fa-camera" style="font-size: 14px;margin-right: 5px;margin-top: 1px;"></i>
                            <span style="font-size: 14px;"> Ambil Foto</span>
                        </button>
                        <button class="btn btn-primary btn-md btn-retake-photo2" style="max-width: 100%; width: 200px;margin-top:10px;" type="button">
                            <i class="fa fa-camera" style="font-size: 14px;margin-right: 5px;margin-top: 1px;"></i>
                            <span style="font-size: 14px;"> Ambil Ulang Foto</span>
                        </button>
                        <button class="btn btn-primary btn-md btn-simpan2" style="max-width: 100%; width: 200px;margin-top:10px;" type="button">
                            <i class="fa fa-paper-plane" style="font-size: 14px;margin-right: 5px"></i>
                            <span style="font-size: 14px;">Simpan</span>
                        </button>
                        <button class="btn btn-danger btn-md btn-back2" style="max-width: 100%; width: 200px;margin-top:10px;" type="button">
                            <i class="fa fa-arrow-left" style="font-size: 14px;"></i>
                            <span style="font-size: 14px;"> Back</span>
                        </button>
                    </div>
                    <div class="overlay">
                        <div id='loading-text' style="text-align:center;padding-top: 220px;font-weight:bold;">Sistem Sedang Mengambil Lokasi Absen...</div>
                        <div id='loading' style="text-align:center;padding-top: 220px;font-weight:bold;">Mohon tunggu browser sedang mengaktifkan kamera Anda..</div>
                        <div id='loading2' style="text-align:center;padding-top: 220px;font-weight:bold;">Mohon tunggu browser sedang mengaktifkan kamera Anda...</div>
                    </div>

                </div>
            </div>
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <div class="modal fade" id="modal-absen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content modal-white" style="border-radius: 5px;">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="title-absen">Modal title</h5>
                    <button type="button" id="close-modal-absen" class="close s-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="get_date" class='datesearchbox' style="position: relative;">
                        <div class="input-group col-12" style="margin-bottom: 1rem;">
                            <!-- width: 20rem;padding-left: 6rem; -->
                            <div class="input-group-addon s-calender">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="search" style="width:176px" class="form-control pull-right bg-trans" id="datesearch" placeholder="Choose date ...">
                        </div>
                    </div>
                    <div id="btn-lembur1">
                        <div class="col-12" style="margin-bottom: 1rem;">
                            <label for="upload_lampiran" class="btn btn-warning w-100 waves-effect btn-upload">
                                <i class="fa fa-upload mr-0-5"></i>
                                <span class="">UPLOAD FOTO</span>
                            </label>

                            <input type="file" multiple="" class="form-control" name="upload_lampiran[]" id="upload_lampiran" style="display: none;" placeholder="Type Here.." accept="application/pdf, .jpg, .jpeg, .png">
                            <input type="text" style="margin-top: 0.5rem;" class="form-control mt-3 readonly fs-small" id="name_upload" name="name_upload" placeholder="Example : file.pdf/.jpg/.jpeg/.png (click button Upload Foto)" required autocomplete="off"></input>

                        </div>
                    </div>
                    <div id="btn-lembur3" style="text-align: center;">
                    </div>
                    <div id="clock_absen">
                        <div class="col-12" style="margin-bottom: 1rem;" id="approval_text">
                            <p class="text-center" id="approval_status"><small>Pengajuan ketidakhadiran Anda karena Sakit belum diberi keputusan.</small></p>
                        </div>
                        <div class="row">
                            <div class="col-6" style="margin-bottom: 1rem;">
                                <button class="btn btn-success waves-effect btn-clock-in w-100" type="button" id="clock_in"><i class="fa fa-clock"></i> CLOCK IN</button>
                            </div>
                            <div class="col-6" style="margin-bottom: 1rem;">
                                <button class="btn btn-danger waves-effect btn-clock-out w-100" type="button" id="clock_out"><i class="fa fa-clock"></i> CLOCK OUT</button>
                            </div>
                        </div>
                    </div>
                    <div id="bar_unhadir" class="body text-center" style="padding-left: 0px;padding-right: 0px;">

                        <strong>
                            <p class="text-center" id="title_alasan">Pilih Ketidakhadiran</p>
                        </strong>
                        <div class="icon-button-demo">
                            <button id="btn_sakit" type="button" class="btn waves-effect" style="color:white;background-color:#0E5725;margin-right:5px;margin-bottom: 0px;font-size: 12px;">
                                <i class="fa fa-wheelchair"></i><br>Sakit
                            </button>
                            <button id="btn_izin" type="button" class="btn waves-effect" style="color:white;background-color:#4A0E57;margin-right:5px;margin-bottom: 0px;font-size: 12px;">
                                <i class="fa fa-calendar-minus"></i><br>Izin
                            </button>
                            <button id="btn_cuti" type="button" class="btn waves-effect" style="color:white;background-color:#183762;margin-right:5px;margin-bottom: 0px;font-size: 12px;">
                                <i class="fa fa-clock"></i><br>Cuti
                            </button>
                            <button id="btn_reset_pilihan" type="button" class="btn btn-dark waves-effect" style="margin-right:5px;margin-bottom: 0px;font-size: 12px;">
                                <i class="fa fa-trash"></i><br>Reset Pilihan
                            </button>
                        </div>
                        <div id="body_cuti">
                            <div class="col-12" style="margin-top: 1rem;text-align:center;">
                                <div class="cuti_pst cuti">
                                    <select class="form-select" id="cuti" name="cuti">
                                    </select>
                                </div>
                                <!-- <textarea name="alasan_detail" id="alasan_detail" cols="35" rows="5" placeholder="Isikan Alasan"></textarea> -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p class="histori">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="text-align: center; padding-left: 1.3rem;padding-right: 0.7rem;">
                    <div id="btn_submit_upload" class="col-12" style="margin-top: -1rem;">
                        <button id="btn_save_upload" type="button" class="btn w-100 btn-primary"><i class="fa fa-paper-plane" style="font-size: 15px;margin-right:10px;"></i><span>Simpan</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal show picture-->
    <div class="modal fade child-modal" id="show-picture" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close s-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-body-show-picture">
                    <div id="img-show" style="text-align: center;">
                        <!-- <img src="<?= base_url() ?>/assets/bsb/images/image-not-found.png" alt="..." class="img-thumbnail"> -->
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-sm px-5 btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url('') ?>assets/js/codebase.app.min.js"></script>

    <!-- jQuery (required for Select2 + jQuery Validation plugins) -->
    <script src="<?= base_url('') ?>assets/js/lib/jquery.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="<?= base_url('') ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="<?= base_url('') ?>assets/js/pages/op_auth_signin.min.js"></script>
</body>

</html>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="<?= base_url('assets/js/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?= base_url() ?>resources/select2/select2.min.js"></script>
<script>
    var base_url = '<?= base_url() ?>',
        u_back = '<?= base_url('absen_selfie') ?>',
        date_now = '<?= date('Y-m-d') ?>',
        date_start_get = '<?= $this->input->get('date_start') ?>',
        date_end_get = '<?= $this->input->get('date_end') ?>',
        start_date,
        end_date,
        check_tutup = '',
        start_date_kendala,
        end_date_kendala,
        select2Cuti
    $(document).ready(function() {

        $.ajax({
            url: base_url + 'absen_selfie/getClock',
            data: {
                nik: '<?= $this->session->userdata('nik') ?>',
                attendance_date: '<?= date('Y-m-d') ?>',
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                if (result != 500) {
                    if (result.clock_in != '0000-00-00 00:00:00') {
                        $('.histori').append('<small> - CLOCK IN [ ' + result.clock_in + ' ] </small>')
                    }
                    if (result.clock_out != '0000-00-00 00:00:00') {
                        $('.histori').append('<br><small> - CLOCK OUT [ ' + result.clock_out + ' ] </small>')
                    }
                }

            }
        });
    });
    window.setTimeout("waktu()", 500);

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 500);
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("detik").innerHTML = waktu.getSeconds();
    }

    $(document).on("select2:open", () => {
        document.querySelector(".select2-search__field").focus();
    });
    select2Cuti = $('#modal-absen').find("#cuti").select2({
            dropdownParent: $('#modal-absen').find(".cuti_pst"),
            ajax: {
                url: base_url + "absen_selfie/select2_cuti",
                dataType: "json",
                data: function(params) {
                    return {
                        q: params.term,
                        page: params.page,
                    };
                },
                processResults: function(data, params) {
                    return {
                        results: data.items,
                        pagination: {
                            more: data.count == 10,
                        },
                        cache: true,
                    };
                },

                error: function(xhr, status, error) {
                    toast("warning", "not found");
                },
            },
            id: function(data) {
                return data.id;
            },
            templateResult: function(data) {
                return $(`
						<div class='select2-result-repository clearfix d-flex'>
							<div class="me-1"> ${data.cuti} </div>
						</div>
						`);

            },
            templateSelection: function(data) {
                $(this).val(data.id);
                return data.cuti || data.text;
            },
            placeholder: "Pilih Cuti",
            allowClear: true,
            // width: "resolve",
        })
        .on("select2:selecting", function(event) {
            $("#cuti").find("option").remove();
        });

    function clear_cuti() {
        $("option:selected").prop("selected", false);
        $("div.cuti select").val("").change();
        $('#body_cuti').hide()
    }
</script>

<script>
    $('.btn-simpan').hide(500)
    $('.btn-simpan2').hide(500)
    $('#loading-text').hide()
    $('#loading').hide()
    $('#loading2').hide()
    $('.btn-back').hide()
    $('.btn-back2').hide()
    $(document).ready(function() {
        $("#absen").hide()
    });

    $('.btn-back').on('click', function() {
        $("#head").show()
        $("#body").show()
        $("#absen").hide()
        window.location = '<?= base_url("absen_selfie") ?>'
    })

    $('.btn-back2').on('click', function() {
        $("#head").show()
        $("#body").show()
        $("#absen").hide()
        window.location = '<?= base_url("absen_selfie") ?>'
    })

    function check_camera() {
        if ($('#canvas').hasClass('change-width')) {
            $('#loading').hide()
            $(".btn-take-photo").show()
            $('.btn-back').show()
            $('body').removeClass('loading');
        } else {
            $('#loading').show()
            $(".btn-take-photo").hide()
            $('.btn-back').hide()
            $('body').addClass('loading');
        }
    }

    function check_camera2() {
        if ($('#canvas2').hasClass('change-width')) {
            $('#loading2').hide()
            $(".btn-take-photo2").show()
            $('.btn-back2').show()
            $('body').removeClass('loading');
        } else {
            $('#loading2').show()
            $(".btn-take-photo2").hide()
            $('.btn-back2').hide()
            $('body').addClass('loading');
        }
    }


    $('#clock_in').on('click', function() {
        $('#modal-absen').modal('hide')
        $(".btn-take-photo").hide()
        $.ajax({
            url: base_url + 'absen_selfie/getClock',
            data: {
                nik: '<?= $this->session->userdata('nik') ?>',
                attendance_date: '<?= date('Y-m-d') ?>',
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                if (result != 500) {
                    if (result.image_in != null) {
                        $('.btn-simpan').show()
                        $('.btn-simpan2').hide()
                        $('.cam_clock_out').hide()
                        $('.cam_clock_in').show()
                        $('.btn_clock_out').hide()
                        $('.btn_clock_in').show()
                        $("#head").hide()
                        $("#body").hide()
                        $("#absen").show()
                        $('.cam_clock_in').find('img').remove()
                        $('.cam_clock_in').append(
                            `<img src="<?= base_url() ?>/assets/media/clock_in/${result.image_in}" class="img-thumbnail" alt="${result.image_in}">`
                        )
                        if (result.clock_in != '0000-00-00 00:00:00') {
                            $('.cam_clock_in').find('.histori1').remove()
                            $('.cam_clock_in').append('<p class="histori1"><small>CLOCK IN [ ' + result.clock_in + ' ] </small></p>')
                        }
                        $('#canvas').hide()
                        $('.btn-back').show()
                        $('#video').height('0px');
                        $(".btn-take-photo,.btn-retake-photo, .btn-simpan").hide()
                    } else {
                        $('#video').height('');
                        do_in()
                    }

                } else {
                    $('#video').height('');
                    do_in()
                }


            }
        });
    });

    function do_in() {
        $('.cam_clock_in').find('img').remove()
        $('.cam_clock_in').find('.histori1').remove()
        check_camera()
        $('.btn-simpan').show()
        $('.btn-simpan2').hide()
        $('.cam_clock_out').hide()
        $('.cam_clock_in').show()
        $('.btn_clock_out').hide()
        $('.btn_clock_in').show()
        $("#head").hide()
        $("#body").hide()
        $("#absen").show()


        $(".btn-retake-photo, .btn-simpan").hide()
        var streamSetting;
        var isPhotoReady = false

        var canvas = document.querySelector('#canvas'),
            context = canvas.getContext('2d'),
            video = document.querySelector("#video")


        $(function(e) {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.enumerateDevices().then(function(devices) {

                    var html = ''
                    devices.forEach(function(e) {
                        if (e.kind == "videoinput") {
                            html += `<option value="${e.deviceId}">${e.label}</option>`
                        }
                    })
                    $("#video-source").html(html)
                })


                navigator.mediaDevices.getUserMedia({
                    video: {

                        facingMode: "user",
                    },
                    audio: false,
                }).then(function(stream) {
                    video.srcObject = stream
                    streamSetting = stream.getVideoTracks()[0].getSettings()
                    video.muted = true;
                    video.playsInline = true;
                    video.play()
                    video.style.width = '320px'
                    $('#canvas').addClass('change-width')
                    check_camera()
                })
            } else alert("oops your browser not allowed!")

            $("#video-source").on("change", function(e) {
                const id = $(this).val()
                navigator.mediaDevices.getUserMedia({
                    video: {
                        facingMode: "user",
                        deviceId: id ? {
                            exact: id
                        } : undefined
                    },
                    audio: false,
                }).then(function(stream) {
                    video.srcObject = stream
                    streamSetting = stream.getVideoTracks()[0].getSettings()
                    video.muted = true;
                    video.playsInline = true;
                    video.play()
                })
            })


            $(".btn-simpan").on("click", function(e) {
                $('.btn-simpan').attr('disabled', 'disabled')
                if (isPhotoReady) {
                    $('body').addClass('loading');
                    $('#loading-text').show()
                    $('.btn-simpan').attr('disabled', 'disabled')
                    $(".btn-retake-photo, .btn-simpan").hide()
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            function(position) {
                                $('body').addClass('loading');
                                $('#loading-text').show()
                                $('.btn-simpan').attr('disabled', 'disabled')
                                $(".btn-retake-photo, .btn-simpan").hide()
                                $.ajax({
                                    url: base_url + 'absen_selfie/addIn',
                                    data: {
                                        img: canvas.toDataURL("image/png", 0.5),
                                        tipe: function() {
                                            return $("#tipe").val()
                                        },
                                        nik: '<?= $this->session->userdata('nik') ?>',
                                        attendance_date: '<?= date('Y-m-d') ?>',
                                        clock_in_latitude: position.coords.latitude,
                                        clock_in_longitude: position.coords.longitude,

                                    },
                                    type: "POST",
                                    dataType: 'json',
                                    cache: false,
                                    success: function(data) {
                                        $('body').addClass('loading');
                                        $('#loading-text').show()
                                        $('.btn-simpan').attr('disabled', 'disabled')
                                        $(".btn-retake-photo, .btn-simpan").hide()


                                        data.forEach((e) => {
                                            if (e.result == 200) {
                                                $('body').removeClass('loading');
                                                $('#loading-text').hide()
                                                $("#head").show()
                                                $("#body").show()
                                                $("#absen").hide()
                                                setTimeout(() => {
                                                    Swal.fire({
                                                        position: 'top-center',
                                                        showConfirmButton: false,
                                                        timer: 1500,
                                                        icon: 'success',
                                                        title: 'Berhasil!',
                                                        text: 'Berhasil Clock In ' + '[ ' + e.clock + ' ]'
                                                    })
                                                    window.location = '<?= base_url("absen_selfie") ?>'
                                                }, 500);

                                                $('.btn-simpan').removeAttr("disabled")
                                                $('.btn-back').show()
                                            } else if (e.result == 400) {
                                                $('body').removeClass('loading');
                                                $('#loading-text').hide()
                                                $("#head").show()
                                                $("#body").show()
                                                $("#absen").hide()
                                                setTimeout(() => {
                                                    Swal.fire({
                                                        position: 'top-center',
                                                        showConfirmButton: false,
                                                        timer: 2000,
                                                        icon: 'warning',
                                                        title: 'Perhatian!',
                                                        text: 'Telah absen sebelumnya.'
                                                    })
                                                    window.location = '<?= base_url("absen_selfie") ?>'
                                                }, 500);
                                                Swal.fire({
                                                    title: 'Perhatian!',
                                                    text: 'Telah absen sebelumnya.',
                                                    showDenyButton: false,
                                                    showCancelButton: false,
                                                    icon: 'warning',
                                                    confirmButtonText: 'OK!',
                                                    denyButtonText: `Don't save`,
                                                    allowOutsideClick: false
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location = '<?= base_url("absen_selfie") ?>'
                                                    }
                                                })
                                                $('.btn-simpan').removeAttr("disabled")
                                                $('.btn-back').show()
                                            } else if (e.result == 500) {
                                                $('body').removeClass('loading');
                                                $('#loading-text').hide()
                                                isPhotoReady = false
                                                $(".btn-retake-photo, .btn-simpan").hide()
                                                $(".btn-take-photo").show()
                                                $("#canvas").hide()
                                                $("#video").show()

                                                $("#head").show()
                                                $("#body").show()
                                                $("#absen").hide()
                                                Swal.fire({
                                                    title: 'Perhatian!',
                                                    text: 'Anda belum CLOCK IN.',
                                                    showDenyButton: false,
                                                    showCancelButton: false,
                                                    icon: 'warning',
                                                    confirmButtonText: 'OK!',
                                                    denyButtonText: `Don't save`,
                                                    allowOutsideClick: false
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location = '<?= base_url("absen_selfie") ?>'
                                                    }
                                                })

                                                $('.btn-simpan').removeAttr("disabled")
                                                $('.btn-back').show()
                                            } else if (e.result == 501) {
                                                $('body').removeClass('loading');
                                                $('#loading-text').hide()
                                                isPhotoReady = false
                                                $(".btn-retake-photo, .btn-simpan").hide()
                                                $(".btn-take-photo").show()
                                                $("#canvas").hide()
                                                $("#video").show()

                                                $("#head").show()
                                                $("#body").show()
                                                $("#absen").hide()
                                                Swal.fire({
                                                    title: 'Perhatian!',
                                                    text: 'File Foto Corrupted, refresh halaman terlebih dahulu untuk kembali normal.',
                                                    showDenyButton: false,
                                                    showCancelButton: false,
                                                    icon: 'warning',
                                                    confirmButtonText: 'OK!',
                                                    denyButtonText: `Don't save`,
                                                    allowOutsideClick: false
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location = '<?= base_url("absen_selfie") ?>'
                                                    }
                                                })
                                                $('.btn-simpan').removeAttr("disabled")
                                                $('.btn-back').show()
                                            } else if (e.result == 502) {
                                                $('body').removeClass('loading');
                                                $('#loading-text').hide()
                                                isPhotoReady = false
                                                $(".btn-retake-photo, .btn-simpan").hide()
                                                $(".btn-take-photo").show()
                                                $("#canvas").hide()
                                                $("#video").show()

                                                $("#head").show()
                                                $("#body").show()
                                                $("#absen").hide()
                                                Swal.fire({
                                                    title: 'Perhatian!',
                                                    text: 'Tidak ada periode jadwal absen untuk hari ini, mohon menghubungi Admin untuk mendaftarkan Periode untuk hari ini.',
                                                    showDenyButton: false,
                                                    showCancelButton: false,
                                                    icon: 'warning',
                                                    confirmButtonText: 'OK!',
                                                    denyButtonText: `Don't save`,
                                                    allowOutsideClick: false
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location = '<?= base_url("absen_selfie") ?>'
                                                    }
                                                })
                                                $('.btn-simpan').removeAttr("disabled")
                                                $('.btn-back').show()
                                            } else if (e.result == 503) {
                                                $('body').removeClass('loading');
                                                $('#loading-text').hide()
                                                isPhotoReady = false
                                                $(".btn-retake-photo, .btn-simpan").hide()
                                                $(".btn-take-photo").show()
                                                $("#canvas").hide()
                                                $("#video").show()

                                                $("#head").show()
                                                $("#body").show()
                                                $("#absen").hide()
                                                Swal.fire({
                                                    title: 'Perhatian!',
                                                    text: 'Anda Libur hari ini.',
                                                    showDenyButton: false,
                                                    showCancelButton: false,
                                                    icon: 'warning',
                                                    confirmButtonText: 'OK!',
                                                    denyButtonText: `Don't save`,
                                                    allowOutsideClick: false
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location = '<?= base_url("absen_selfie") ?>'
                                                    }
                                                })
                                                $('.btn-simpan').removeAttr("disabled")
                                                $('.btn-back').show()
                                            } else if (e.result == 401) {
                                                $('body').removeClass('loading');
                                                $('#loading-text').hide()
                                                isPhotoReady = false
                                                $(".btn-retake-photo, .btn-simpan").hide()
                                                $(".btn-take-photo").show()
                                                $("#canvas").hide()
                                                $("#video").show()

                                                $("#head").show()
                                                $("#body").show()
                                                $("#absen").hide()
                                                Swal.fire({
                                                    title: 'Perhatian!',
                                                    text: 'Anda Tidak Hadir hari ini.',
                                                    showDenyButton: false,
                                                    showCancelButton: false,
                                                    icon: 'warning',
                                                    confirmButtonText: 'OK!',
                                                    denyButtonText: `Don't save`,
                                                    allowOutsideClick: false
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location = '<?= base_url("absen_selfie") ?>'
                                                    }
                                                })
                                                $('.btn-simpan').removeAttr("disabled")
                                                $('.btn-back').show()
                                            } else {
                                                $('body').removeClass('loading');
                                                $('#loading-text').hide()
                                                $("#head").show()
                                                $("#body").show()
                                                $("#absen").hide()
                                                Swal.fire({
                                                    title: 'Perhatian!',
                                                    text: 'Mohon ada kesalahan pada sistem ini.',
                                                    showDenyButton: false,
                                                    showCancelButton: false,
                                                    icon: 'warning',
                                                    confirmButtonText: 'OK!',
                                                    denyButtonText: `Don't save`,
                                                    allowOutsideClick: false
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location = '<?= base_url("absen_selfie") ?>'
                                                    }
                                                })
                                                $('.btn-simpan').removeAttr("disabled")
                                                $('.btn-back').show()
                                            }


                                        })
                                    },
                                    error: function(x, s, e) {
                                        $("#head").show()
                                        $("#body").show()
                                        $("#absen").hide()
                                        Swal.fire({
                                            title: 'Perhatian!',
                                            text: 'Mohon ada kesalahan pada sistem ini.',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'warning',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })
                                        $(".upload-loading").html("")
                                        $("#canvas").show()
                                        $('.btn-simpan').removeAttr("disabled")
                                        $('body').removeClass('loading');
                                        $('#loading-text').hide()
                                        $('.btn-back').show()
                                    }
                                })


                            },
                            function(error) {
                                switch (error.code) {
                                    case error.PERMISSION_DENIED:
                                        $("#head").show()
                                        $("#body").show()
                                        $("#absen").hide()
                                        Swal.fire({
                                            title: 'Perhatian!',
                                            text: 'Maaf anda menolak akses geolocation.',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'warning',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })
                                        $('.btn-simpan').removeAttr("disabled")
                                        $('body').removeClass('loading');
                                        $('#loading-text').hide()
                                        $('.btn-back').show()
                                        break;
                                    case error.POSITION_UNAVAILABLE:
                                        $("#head").show()
                                        $("#body").show()
                                        $("#absen").hide()
                                        Swal.fire({
                                            title: 'Perhatian!',
                                            text: 'Maaf lokasi tidak ditemukan.',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'warning',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })
                                        $('.btn-simpan').removeAttr("disabled")
                                        $('body').removeClass('loading');
                                        $('#loading-text').hide()
                                        $('.btn-back').show()
                                        break;
                                    case error.TIMEOUT:
                                        $("#head").show()
                                        $("#body").show()
                                        $("#absen").hide()

                                        Swal.fire({
                                            title: 'Perhatian!',
                                            text: 'Maaf gps anda terlalu lemot.',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'warning',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })
                                        $('.btn-simpan').removeAttr("disabled")
                                        $('body').removeClass('loading');
                                        $('#loading-text').hide()
                                        $('.btn-back').show()
                                    default:
                                        $("#head").show()
                                        $("#body").show()
                                        $("#absen").hide()
                                        Swal.fire({
                                            title: 'Perhatian!',
                                            text: 'Maaf gps anda error.',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'warning',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })
                                        $('.btn-simpan').removeAttr("disabled")
                                        $('body').removeClass('loading');
                                        $('#loading-text').hide()
                                        $('.btn-back').show()
                                        break;
                                }
                            }
                        )
                    } else {
                        $("#head").show()
                        $("#body").show()
                        $("#absen").hide()
                        Swal.fire({
                            title: 'Perhatian!',
                            text: 'Maaf device anda tidak support dengan geolocation.',
                            showDenyButton: false,
                            showCancelButton: false,
                            icon: 'warning',
                            confirmButtonText: 'OK!',
                            denyButtonText: `Don't save`,
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = '<?= base_url("absen_selfie") ?>'
                            }
                        })
                        $('.btn-simpan').removeAttr("disabled")
                        $('body').removeClass('loading');
                        $('#loading-text').hide()
                        $('.btn-back').show()
                    }
                } else {
                    $("#head").show()
                    $("#body").show()
                    $("#absen").hide()
                    Swal.fire({
                        title: 'Perhatian!',
                        text: 'Mohon ambil photo terlebih dahulu.',
                        showDenyButton: false,
                        showCancelButton: false,
                        icon: 'warning',
                        confirmButtonText: 'OK!',
                        denyButtonText: `Don't save`,
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = '<?= base_url("absen_selfie") ?>'
                        }
                    })
                    $('.btn-simpan').removeAttr("disabled")
                    $('body').removeClass('loading');
                    $('#loading-text').hide()
                    $('.btn-back').show()
                }
            })



            $(".btn-take-photo").on("click", function(e) {

                video.defaultPlaybackRate = .4;
                $(".btn-retake-photo").show()
                $(".btn-take-photo").hide()
                $(".btn-back").hide()
                isPhotoReady = true;
                const cameraWidth = streamSetting.width
                const cameraHeight = streamSetting.height
                const parentWidth = $(".camera").width()
                const canvasWidth = parentWidth > 700 ? 700 : parentWidth;
                const canvasHeight = canvasWidth / streamSetting.aspectRatio;
                canvas.width = canvasWidth
                canvas.height = canvasHeight

                canvas.width = video.clientWidth;
                canvas.height = video.clientHeight;
                videoActuallyPlaying = true;

                context.drawImage(video, 0, 0, canvas.width, canvas.height)

                let image = canvas.toDataURL('image/jpeg');
                $("#canvas").show()
                $("#video").hide()
                $(".btn-simpan").show()
                if (isPhotoReady == true) {
                    document.getElementById("canvas").style.marginTop = "-13px";
                } else {
                    document.getElementById("canvas").style.marginTop = "-143px";
                }

            })

            $(".btn-retake-photo").on("click", function(e) {
                $(".btn-retake-photo, .btn-simpan").hide()
                $(".btn-take-photo").show()
                $("#canvas").hide()
                $("#video").show()
            })
        })
    }


    $('#clock_out').on('click', function() {
        $('#modal-absen').modal('hide')
        $(".btn-take-photo2").hide()
        $.ajax({
            url: base_url + 'absen_selfie/getClock',
            data: {
                nik: '<?= $this->session->userdata('nik') ?>',
                attendance_date: '<?= date('Y-m-d') ?>',
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                if (result != 500) {
                    if (result.image_out != null) {
                        $('.btn-simpan').hide()
                        $('.btn-simpan2').show()
                        $('.cam_clock_out').show()
                        $('.cam_clock_in').hide()
                        $('.btn_clock_out').show()
                        $('.btn_clock_in').hide()
                        $("#head").hide()
                        $("#body").hide()
                        $("#absen").show()
                        $('.cam_clock_out').find('img').remove()
                        $('.cam_clock_out').append(
                            `<img src="<?= base_url() ?>/assets/media/clock_out/${result.image_out}" class="img-thumbnail" alt="${result.image_out}">`
                        )
                        if (result.clock_out != '0000-00-00 00:00:00') {
                            $('.cam_clock_out').find('.histori2').remove()
                            $('.cam_clock_out').append('<p class="histori2"><small>CLOCK OUT [ ' + result.clock_out + ' ] </small></p>')
                        }
                        $('#canvas2').hide()
                        $('.btn-back2').show()
                        $('#video2').height('0px');
                        $(".btn-take-photo2,.btn-retake-photo2, .btn-simpan2").hide()
                    } else {
                        $('#video2').height('');
                        do_out()
                    }

                } else {
                    $('#video2').height('');
                    do_out()
                }
            }
        });

    });

    function do_out() {
        $('.cam_clock_out').find('img').remove()
        $('.cam_clock_out').find('.histori2').remove()
        check_camera2()
        $('.btn-simpan').hide()
        $('.btn-simpan2').show()
        $('.cam_clock_out').show()
        $('.cam_clock_in').hide()
        $('.btn_clock_out').show()
        $('.btn_clock_in').hide()
        $("#head").hide()
        $("#body").hide()
        $("#absen").show()

        $(".btn-retake-photo2, .btn-simpan2").hide()
        var streamSetting;
        var isPhotoReady2 = false

        var canvas = document.querySelector('#canvas2'),
            context = canvas.getContext('2d'),
            video = document.querySelector("#video2")

        $(function(e) {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.enumerateDevices().then(function(devices) {

                    var html = ''
                    devices.forEach(function(e) {
                        if (e.kind == "videoinput") {
                            html += `<option value="${e.deviceId}">${e.label}</option>`
                        }
                    })
                    $("#video-source").html(html)
                })


                navigator.mediaDevices.getUserMedia({
                    video: {

                        facingMode: "user",
                    },
                    audio: false,
                }).then(function(stream) {
                    video.srcObject = stream
                    streamSetting = stream.getVideoTracks()[0].getSettings()
                    video.muted = true;
                    video.playsInline = true;
                    video.play()
                    video.style.width = '320px'
                    $('#canvas2').addClass('change-width')
                    check_camera2()
                })
            } else alert("oops your browser not allowed!")

            $("#video-source").on("change", function(e) {
                const id = $(this).val()
                navigator.mediaDevices.getUserMedia({
                    video: {
                        facingMode: "user",
                        deviceId: id ? {
                            exact: id
                        } : undefined
                    },
                    audio: false,
                }).then(function(stream) {
                    video.srcObject = stream
                    streamSetting = stream.getVideoTracks()[0].getSettings()
                    video.muted = true;
                    video.playsInline = true;
                    video.play()
                })
            })

            $(".btn-simpan2").on("click", function(e) {

                if (isPhotoReady2) {
                    $('.btn-simpan2').attr('disabled', 'disabled')
                    $('body').addClass('loading');
                    $('#loading-text').show()
                    $('.btn-simpan2').attr('disabled', 'disabled')
                    $(".btn-retake-photo2, .btn-simpan2").hide()
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            function(position) {

                                $('body').addClass('loading');
                                $('#loading-text').show()
                                $('.btn-simpan2').attr('disabled', 'disabled')
                                $(".btn-retake-photo2, .btn-simpan2").hide()
                                $.ajax({
                                    url: base_url + 'absen_selfie/addOut',
                                    data: {
                                        img: canvas.toDataURL("image/png", 0.5),
                                        tipe: function() {
                                            return $("#tipe").val()
                                        },
                                        nik: '<?= $this->session->userdata('nik') ?>',
                                        attendance_date: '<?= date('Y-m-d') ?>',
                                        clock_out_latitude: position.coords.latitude,
                                        clock_out_longitude: position.coords.longitude,

                                    },
                                    type: "POST",
                                    dataType: 'json',
                                    cache: false,
                                    success: function(data) {
                                        $('body').addClass('loading');
                                        $('#loading-text').show()
                                        $('.btn-simpan2').attr('disabled', 'disabled')
                                        $(".btn-retake-photo2, .btn-simpan2").hide()

                                        data.forEach((e) => {
                                            if (e.result == 200) {
                                                $('body').removeClass('loading');
                                                $('#loading-text').hide()
                                                $("#head").show()
                                                $("#body").show()
                                                $("#absen").hide()
                                                setTimeout(() => {
                                                    Swal.fire({
                                                        position: 'top-center',
                                                        showConfirmButton: false,
                                                        timer: 2000,
                                                        icon: 'success',
                                                        title: 'Berhasil!',
                                                        text: 'Berhasil CLOCK OUT ' + e.clock + '.'


                                                    })
                                                    window.location = '<?= base_url("absen_selfie") ?>'
                                                }, 500);
                                                $('.btn-simpan2').removeAttr("disabled")
                                                $('.btn-back2').show()
                                            } else if (e.result == 400) {
                                                $('body').removeClass('loading');
                                                $('#loading-text').hide()

                                                $("#head").show()
                                                $("#body").show()
                                                $("#absen").hide()
                                                Swal.fire({
                                                    title: 'Perhatian!',
                                                    text: 'Telah Absen sebelumnya.',
                                                    showDenyButton: false,
                                                    showCancelButton: false,
                                                    icon: 'warning',
                                                    confirmButtonText: 'OK!',
                                                    denyButtonText: `Don't save`,
                                                    allowOutsideClick: false
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location = '<?= base_url("absen_selfie") ?>'
                                                    }
                                                })
                                                $('.btn-simpan2').removeAttr("disabled")
                                                $('.btn-back2').show()
                                            } else if (e.result == 500) {
                                                $('body').removeClass('loading');
                                                $('#loading-text').hide()
                                                isPhotoReady2 = false
                                                $(".btn-retake-photo2, .btn-simpan2").hide()
                                                $(".btn-take-photo2").show()
                                                $("#canvas2").hide()
                                                $("#video2").show()
                                                $("#head").show()
                                                $("#body").show()
                                                $("#absen").hide()
                                                Swal.fire({
                                                    title: 'Perhatian!',
                                                    text: 'Anda belum Clock IN.',
                                                    showDenyButton: false,
                                                    showCancelButton: false,
                                                    icon: 'warning',
                                                    confirmButtonText: 'OK!',
                                                    denyButtonText: `Don't save`,
                                                    allowOutsideClick: false
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location = '<?= base_url("absen_selfie") ?>'
                                                    }
                                                })
                                                $('.btn-simpan2').removeAttr("disabled")
                                                $('.btn-back2').show()
                                            } else if (e.result == 501) {
                                                $('body').removeClass('loading');
                                                $('#loading-text').hide()
                                                isPhotoReady2 = false
                                                $(".btn-retake-photo2, .btn-simpan2").hide()
                                                $(".btn-take-photo2").show()
                                                $("#canvas2").hide()
                                                $("#video2").show()
                                                $("#head").show()
                                                $("#body").show()
                                                $("#absen").hide()
                                                Swal.fire({
                                                    title: 'Perhatian!',
                                                    text: 'File Foto Corrupted, refresh halaman terlebih dahulu untuk kembali normal.',
                                                    showDenyButton: false,
                                                    showCancelButton: false,
                                                    icon: 'warning',
                                                    confirmButtonText: 'OK!',
                                                    denyButtonText: `Don't save`,
                                                    allowOutsideClick: false
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location = '<?= base_url("absen_selfie") ?>'
                                                    }
                                                })
                                                $('.btn-simpan2').removeAttr("disabled")
                                                $('.btn-back2').show()
                                            } else if (e.result == 502) {
                                                $('body').removeClass('loading');
                                                $('#loading-text').hide()
                                                isPhotoReady2 = false
                                                $(".btn-retake-photo2, .btn-simpan2").hide()
                                                $(".btn-take-photo2").show()
                                                $("#canvas2").hide()
                                                $("#video2").show()
                                                $("#head").show()
                                                $("#body").show()
                                                $("#absen").hide()
                                                Swal.fire({
                                                    title: 'Perhatian!',
                                                    text: 'Tidak ada periode jadwal absen untuk hari ini, mohon menghubungi Admin untuk mendaftarkan Periode untuk hari ini.',
                                                    showDenyButton: false,
                                                    showCancelButton: false,
                                                    icon: 'warning',
                                                    confirmButtonText: 'OK!',
                                                    denyButtonText: `Don't save`,
                                                    allowOutsideClick: false
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location = '<?= base_url("absen_selfie") ?>'
                                                    }
                                                })
                                                $('.btn-simpan2').removeAttr("disabled")
                                                $('.btn-back2').show()

                                            } else if (e.result == 503) {
                                                $('body').removeClass('loading');
                                                $('#loading-text').hide()
                                                isPhotoReady2 = false
                                                $(".btn-retake-photo2, .btn-simpan2").hide()
                                                $(".btn-take-photo2").show()
                                                $("#canvas2").hide()
                                                $("#video2").show()
                                                $("#head").show()
                                                $("#body").show()
                                                $("#absen").hide()
                                                Swal.fire({
                                                    title: 'Perhatian!',
                                                    text: 'Anda libur hari ini.',
                                                    showDenyButton: false,
                                                    showCancelButton: false,
                                                    icon: 'warning',
                                                    confirmButtonText: 'OK!',
                                                    denyButtonText: `Don't save`,
                                                    allowOutsideClick: false
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location = '<?= base_url("absen_selfie") ?>'
                                                    }
                                                })
                                                $('.btn-simpan2').removeAttr("disabled")
                                                $('.btn-back2').show()

                                            } else if (e.result == 401) {
                                                $('body').removeClass('loading');
                                                $('#loading-text').hide()
                                                isPhotoReady2 = false
                                                $(".btn-retake-photo2, .btn-simpan2").hide()
                                                $(".btn-take-photo2").show()
                                                $("#canvas2").hide()
                                                $("#video2").show()
                                                $("#head").show()
                                                $("#body").show()
                                                $("#absen").hide()
                                                Swal.fire({
                                                    title: 'Perhatian!',
                                                    text: 'Anda tidak hadir hari ini.',
                                                    showDenyButton: false,
                                                    showCancelButton: false,
                                                    icon: 'warning',
                                                    confirmButtonText: 'OK!',
                                                    denyButtonText: `Don't save`,
                                                    allowOutsideClick: false
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location = '<?= base_url("absen_selfie") ?>'
                                                    }
                                                })
                                                $('.btn-simpan2').removeAttr("disabled")
                                                $('.btn-back2').show()

                                            } else {
                                                $("#head").show()
                                                $("#body").show()
                                                $("#absen").hide()
                                                Swal.fire({
                                                    title: 'Perhatian!',
                                                    text: 'Maaf ada kesalahan pada sistem ini.',
                                                    showDenyButton: false,
                                                    showCancelButton: false,
                                                    icon: 'warning',
                                                    confirmButtonText: 'OK!',
                                                    denyButtonText: `Don't save`,
                                                    allowOutsideClick: false
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location = '<?= base_url("absen_selfie") ?>'
                                                    }
                                                })
                                                $('body').removeClass('loading');
                                                $('#loading-text').hide()
                                                $('.btn-simpan2').removeAttr("disabled")
                                                $('.btn-back2').show()
                                            }




                                        })
                                    },
                                    error: function(x, s, e) {

                                        $("#head").show()
                                        $("#body").show()
                                        $("#absen").hide()
                                        Swal.fire({
                                            title: 'Perhatian!',
                                            text: 'Maaf ada kesalahan pada sistem ini.',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'warning',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })
                                        $(".upload-loading").html("")
                                        $("#canvas2").show()
                                        $('.btn-simpan2').removeAttr("disabled")
                                        $('body').removeClass('loading');
                                        $('#loading-text').hide()
                                        $('.btn-back2').show()
                                    }
                                })
                            },
                            function(error) {
                                switch (error.code) {
                                    case error.PERMISSION_DENIED:
                                        $("#head").show()
                                        $("#body").show()
                                        $("#absen").hide()
                                        Swal.fire({
                                            title: 'Perhatian!',
                                            text: 'Maaf anda menolak akses geolocation.',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'warning',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })
                                        $('.btn-simpan2').removeAttr("disabled")
                                        $('body').removeClass('loading');
                                        $('#loading-text').hide()
                                        $('.btn-back2').show()
                                        break;
                                    case error.POSITION_UNAVAILABLE:
                                        $("#head").show()
                                        $("#body").show()
                                        $("#absen").hide()
                                        Swal.fire({
                                            title: 'Perhatian!',
                                            text: 'Maaf lokasi tidak ditemukan.',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'warning',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })
                                        $('.btn-simpan2').removeAttr("disabled")
                                        $('body').removeClass('loading');
                                        $('#loading-text').hide()
                                        $('.btn-back2').show()
                                        break;
                                    case error.TIMEOUT:
                                        $("#head").show()
                                        $("#body").show()
                                        $("#absen").hide()

                                        Swal.fire({
                                            title: 'Perhatian!',
                                            text: 'Maaf gps anda terlalu lemot.',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'warning',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })
                                        $('.btn-simpan2').removeAttr("disabled")
                                        $('body').removeClass('loading');
                                        $('#loading-text').hide()
                                        $('.btn-back2').show()
                                    default:
                                        $("#head").show()
                                        $("#body").show()
                                        $("#absen").hide()
                                        Swal.fire({
                                            title: 'Perhatian!',
                                            text: 'Maaf gps anda error.',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'warning',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })
                                        $('.btn-simpan2').removeAttr("disabled")
                                        $('body').removeClass('loading');
                                        $('#loading-text').hide()
                                        $('.btn-back2').show()
                                        break;
                                }
                            }
                        )
                    } else {
                        $("#head").show()
                        $("#body").show()
                        $("#absen").hide()
                        Swal.fire({
                            title: 'Perhatian!',
                            text: 'Maaf device anda tidak support dengan geolocation.',
                            showDenyButton: false,
                            showCancelButton: false,
                            icon: 'warning',
                            confirmButtonText: 'OK!',
                            denyButtonText: `Don't save`,
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = '<?= base_url("absen_selfie") ?>'
                            }
                        })
                        $('.btn-simpan2').removeAttr("disabled")
                        $('body').removeClass('loading');
                        $('#loading-text').hide()
                        $('.btn-back2').show()
                    }
                } else {
                    $("#head").show()
                    $("#body").show()
                    $("#absen").hide()
                    Swal.fire({
                        title: 'Perhatian!',
                        text: 'Mohon ambil photo terlebih dahulu.',
                        showDenyButton: false,
                        showCancelButton: false,
                        icon: 'warning',
                        confirmButtonText: 'OK!',
                        denyButtonText: `Don't save`,
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = '<?= base_url("absen_selfie") ?>'
                        }
                    })
                    $('.btn-simpan2').removeAttr("disabled")
                    $('body').removeClass('loading');
                    $('#loading-text').hide()
                    $('.btn-back2').show()
                }
            })

            $(".btn-take-photo2").on("click", function(e) {

                video.defaultPlaybackRate = .4;
                $(".btn-back2").hide()
                $(".btn-retake-photo2").show()
                $(".btn-take-photo2").hide()
                isPhotoReady2 = true;
                const cameraWidth = streamSetting.width
                const cameraHeight = streamSetting.height
                const parentWidth = $(".camera").width()
                const canvasWidth = parentWidth > 700 ? 700 : parentWidth;
                const canvasHeight = canvasWidth / streamSetting.aspectRatio;
                canvas.width = canvasWidth
                canvas.height = canvasHeight

                canvas.width = video.clientWidth;
                canvas.height = video.clientHeight;
                videoActuallyPlaying = true;

                context.drawImage(video, 0, 0, canvas.width, canvas.height)

                $("#canvas2").show()
                $("#video2").hide()
                $(".btn-simpan2").show()
                if (isPhotoReady2 == true) {
                    document.getElementById("canvas2").style.marginTop = "-13px";
                } else {
                    document.getElementById("canvas2").style.marginTop = "-143px";
                }
            })
            $(".btn-retake-photo2").on("click", function(e) {
                $(".btn-retake-photo2, .btn-simpan2").hide()
                $(".btn-take-photo2").show()
                $("#canvas2").hide()
                $("#video2").show()
            })
        })
    }
</script>

<script>
    $(".readonly").on('keydown paste focus mousedown', function(e) {
        if (e.keyCode != 9) // ignore tab
            e.preventDefault();
    });
    $('#modal-absen').find('#get_date').hide();
    $('#body-history').hide()
    $('#btn-lembur3').hide()
    $('.btn_back_awal').hide()
    $('#title-lembur').hide()
    $('#btn-lembur1').hide()
    $('#bar_unhadir').hide()
    $('#btn_reset_pilihan').hide()
    $('#body_cuti').hide()

    var global_method = ''
    var get_alasan = ''
    $(document).ready(function() {
        $("#upload_lampiran").change(function() {

            var totalfiles = document.getElementById('upload_lampiran').files.length;
            var nm = []
            for (var index = 0; index < totalfiles; index++) {
                nm.push(document.getElementById('upload_lampiran').files[index].name)
            }
            $('#name_upload').val(nm)
        });
    });
    $('#btn_hadir').on('click', function(e) {
        $('#modal-absen').modal({
            backdrop: 'static',
            keyboard: false
        })
        e.preventDefault()
        global_method = 'hadir'
        $('#modal-absen').find('#title-absen').html(`Absen Hadir`)
        $('#modal-absen').find('#clock_in').show()
        $('#modal-absen').find('#clock_out').show()
        $('#modal-absen').modal('show')
        $('#modal-absen').find('#btn_submit_upload').hide()
        $('#btn-lembur1').hide()
        $('#btn-lembur3').hide()
        $('#approval_text').hide()
        check_data_tidak_hadir()
    })

    $('#btn_tidak_hadir').on('click', function(e) {
        $('#modal-absen').on('shown.bs.modal', function() {
            $('input:text:visible:first').focus();
            // prepare datepicker
            $('#datesearch').daterangepicker({
                singleDatePicker: true,
                autoUpdateInput: false,
                showDropdowns: true,
                parentEl: '#modal-absen',
            });
        });
        //menangani proses saat apply date range
        $('#datesearch').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY'));
            start_date = picker.startDate.format('Y-MM-DD');
            end_date = picker.endDate.format('Y-MM-DD');
        });

        $('#datesearch').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            start_date = '';
            end_date = '';
        });

        $('#bar_unhadir').show()
        $('#modal-absen').modal({
            backdrop: 'static',
            keyboard: false
        })
        $('#modal-absen').find('#title-absen').html(`Absen Tidak Hadir`)
        global_method = 'tidak_hadir'
        e.preventDefault()
        $('#modal-absen').modal('show')
        $('#modal-absen').find('#clock_in').hide()
        $('#modal-absen').find('#clock_out').hide()
        $('#modal-absen').find('#btn_submit_upload').show()
        //perubahan 12/5/2022 btn tidak hadir di enable semua kondisi untuk input kapan saja
        $('.histori').hide();
        $('#modal-absen').find('#get_date').show();
        $('#approval_text').hide()
        check_file()
    })

    $('#btn_sakit').on('click', function(e) {
        e.preventDefault()
        get_alasan = 'sakit'
        $('#btn_sakit').css('color', 'white')
        $('#btn_sakit').css('background-color', '#0E5725')
        $('#btn_izin').hide()
        $('#btn_cuti').hide()
        $('#btn_reset_pilihan').show()
        clear_cuti()
    })

    $('#btn_izin').on('click', function(e) {
        e.preventDefault()
        get_alasan = 'izin'
        $('#btn_izin').css('color', 'white')
        $('#btn_izin').css('background-color', '#4A0E57')
        $('#btn_sakit').hide()
        $('#btn_cuti').hide()
        $('#btn_reset_pilihan').show()
        clear_cuti()
    })

    $('#btn_cuti').on('click', function(e) {
        e.preventDefault()
        get_alasan = 'cuti'
        $('#btn_cuti').css('color', 'white')
        $('#btn_cuti').css('background-color', '#183762')
        $('#btn_sakit').hide()
        $('#btn_izin').hide()
        $('#btn_reset_pilihan').show()
        // clear_cuti()
        $('#body_cuti').show()
    })

    $('#btn_reset_pilihan').on('click', function(e) {
        e.preventDefault()
        get_alasan = ''
        $('#btn_sakit').show()
        $('#btn_izin').show()
        $('#btn_cuti').show()
        $('#btn_reset_pilihan').hide()
        clear_cuti()
    })

    $('#close-modal-absen').on('click', function(e) {
        window.location = '<?= base_url("absen_selfie") ?>'
    })

    function check_file() {
        $('#btn_save_upload').hide()
        $.ajax({
            url: '<?= base_url('absen_selfie/check_file') ?>',
            data: {
                method: global_method
            },
            type: 'post',
            dataType: 'json',
            cache: false,
            success: function(result) {
                if (result['check_file'] != '' && result['check_file'] != null) {
                    $('#btn-lembur1').hide(500)
                    $('#btn-lembur3').html(``)
                    $('#btn-lembur3').show(500)

                    $('#btn-lembur3').append(`
                        <div class="col-12" style="margin-bottom: 1rem;">
                            <label class="btn btn-info w-100 waves-effect btn-upload">
                                <a style="color:white;" href="${base_url}${result['url_file']}${result['check_file']}" target="_blank">
                                    Telah Upload Bukti Ketidakhadiran Hari Ini
                                </a>
                            </label>
                        </div>`)

                    $('#btn-lembur1').show(500)
                    $('#btn_save_upload').show()

                } else {
                    $('#btn-lembur3').hide(500)
                    $('#btn-lembur1').show(500)
                    $('#btn_save_upload').show()
                }

            }
        })
    }

    $('#btn_save_upload').on('click', function(e) {
        e.preventDefault()

        let formData = new FormData();
        var totalfiles = document.getElementById('upload_lampiran').files.length;
        if (start_date == '' || start_date == 'null' || start_date == undefined || start_date == null) {
            Swal.fire(
                'Peringatan!',
                'Pilih Tanggal Terlebih Dahulu!',
                'warning'
            )
        } else {
            if (totalfiles > 0) {
                if (get_alasan == '') {
                    Swal.fire(
                        'Peringatan!',
                        'Pilih Alasan Tidak Hadir Terlebih Dahulu!',
                        'warning'
                    )
                } else {
                    if (get_alasan == 'cuti' && ($('#cuti').val() == '' || $('#cuti').val() == 'null' || $('#cuti').val() == null || $('#cuti').val() == undefined)) {
                        Swal.fire(
                            'Peringatan!',
                            'Tipe Cuti Terlebih Dahulu!',
                            'warning'
                        )
                    } else {
                        for (var index = 0; index < totalfiles; index++) {
                            formData.append("fileupload[]", document.getElementById('upload_lampiran').files[index]);
                        }
                        formData.append('img', canvas.toDataURL("image/png", 0.5));
                        formData.append('nik', '<?= $this->session->userdata('nik') ?>');
                        formData.append('attendance_date', start_date);
                        formData.append('typeButton', global_method);
                        formData.append('alasan', get_alasan);
                        formData.append('cuti', $('#cuti').val());
                        formData.append('start_date', start_date);
                        formData.append('end_date', end_date);

                        $.ajax({
                            url: '<?= base_url('absen_selfie/addInUpload') ?>',
                            data: formData,
                            type: "POST",
                            dataType: 'json',
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                data.forEach((e) => {
                                    if (e.result == 200) {
                                        check_file()
                                        $('#name_upload').val('')
                                        $('#upload_lampiran').val('')
                                        $('#modal-absen').modal('hide')
                                        Swal.fire({
                                            title: 'Success Absen Tidak Hadir',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'success',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {

                                            if (result.isConfirmed) {

                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })
                                    } else if (e.result == 400) {
                                        $('#modal-absen').modal('hide')
                                        Swal.fire({
                                            title: 'Peringatan!',
                                            text: `Anda telah absen pada tanggal ` + change_date(start_date) + '.',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'warning',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {

                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })
                                    } else if (e.result == 500) {
                                        $('#modal-absen').modal('hide')
                                        Swal.fire({
                                            title: 'Peringatan!',
                                            text: 'Gagal Simpan Data.',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'warning',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {

                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })
                                    } else if (e.result == 502) {
                                        $('#modal-absen').modal('hide')
                                        Swal.fire({
                                            title: 'Peringatan!',
                                            text: 'Tidak ada periode jadwal absen untuk tanggal tanggal ' + change_date(start_date) + ', mohon menghubungi Admin untuk mendaftarkan Periode untuk tanggal tsb.',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'warning',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {

                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })
                                    } else if (e.result == 503) {
                                        $('#modal-absen').modal('hide')
                                        Swal.fire({
                                            title: 'Peringatan!',
                                            text: 'Anda Libur pada tanggal ' + change_date(start_date) + '.',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'warning',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {

                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })
                                    } else if (e.result == 504) {
                                        $('#modal-absen').modal('hide')
                                        Swal.fire({
                                            title: 'Peringatan!',
                                            text: 'Tidak ada data cuti tsb.',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'warning',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {

                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })

                                    } else if (e.result == 505) {
                                        $('#modal-absen').modal('hide')
                                        Swal.fire({
                                            title: 'Peringatan!',
                                            text: 'Kesempatan Cuti Anda pilih telah habis.',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'warning',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {

                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })

                                    } else if (e.result == 506) {
                                        $('#modal-absen').modal('hide')
                                        Swal.fire({
                                            title: 'Peringatan!',
                                            text: 'Terdapat Pengajuan Cuti Anda sebelumnya yang masih belum di beri Keputusan oleh Admin.',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'warning',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {

                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })

                                    } else {
                                        $('#modal-absen').modal('hide')
                                        Swal.fire({
                                            title: 'Peringatan!',
                                            text: 'Mohon maaf ada kesalahan pada sistem ini!',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            icon: 'error',
                                            confirmButtonText: 'OK!',
                                            denyButtonText: `Don't save`,
                                            allowOutsideClick: false
                                        }).then((result) => {

                                            if (result.isConfirmed) {
                                                window.location = '<?= base_url("absen_selfie") ?>'
                                            }
                                        })
                                    }


                                })
                            },
                            error: function(x, s, e) {
                                $('#modal-absen').modal('hide')
                                Swal.fire({
                                    title: 'Peringatan!',
                                    text: 'Mohon maaf ada kesalahan pada sistem ini!',
                                    showDenyButton: false,
                                    showCancelButton: false,
                                    icon: 'error',
                                    confirmButtonText: 'OK!',
                                    denyButtonText: `Don't save`,
                                    allowOutsideClick: false
                                }).then((result) => {

                                    if (result.isConfirmed) {
                                        window.location = '<?= base_url("absen_selfie") ?>'
                                    }
                                })
                            }
                        })
                    }
                }

            } else {
                formData.append("fileupload", 'undefined');
                Swal.fire(
                    'Peringatan!',
                    'Pilih/Ambil Foto Terlebih Dahulu!',
                    'warning'
                )

            }
        }



    });

    function check_data_tidak_hadir() {
        $.ajax({
            url: base_url + 'absen_selfie/check_data_tidak_hadir',
            data: {
                nik: '<?= $this->session->userdata('nik') ?>',
                attendance_date: '<?= date('Y-m-d') ?>',
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                if (result != 500) {
                    var check_approval = ''
                    check_approval = result.status
                    if (check_approval == 'APPROVED') {
                        $('#approval_text').show();
                        $('#approval_status').html(`Pengajuan ketidakhadiran Anda karena ${result.tipe.toUpperCase()} telah di setujui. <br> Anda tidak perlu absen hari ini.`);
                        $('#clock_in').hide();
                        $('#clock_out').hide();
                    } else if (check_approval == 'REJECTED') {
                        $('#approval_text').show();
                        $('#approval_status').html(`Pengajuan ketidakhadiran Anda karena ${result.tipe.toUpperCase()} tidak di setujui. <br> Anda WAJIB absen hari ini.`);
                        $('#clock_in').show();
                        $('#clock_out').show();
                    } else {
                        $('#approval_text').show();
                        $('#approval_status').html(`Pengajuan ketidakhadiran Anda karena ${result.tipe.toUpperCase()} belum diberi keputusan.`);
                        $('#clock_in').hide();
                        $('#clock_out').hide();
                    }

                }
            }
        });
    }

    function change_date(date) {
        const monthNames = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ];
        var dt = date;
        const d = new Date(dt);
        const ye = new Intl.DateTimeFormat("en", {
            year: "numeric"
        }).format(d);
        const mo = monthNames[d.getMonth()];
        const da = new Intl.DateTimeFormat("en", {
            day: "2-digit"
        }).format(d);
        const value = da + " " + mo + " " + ye;
        return value;
    }
</script>