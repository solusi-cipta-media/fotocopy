<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <!-- User Info -->
    <div class="bg-image bg-image-bottom" style="background-image: url('<?= base_url('') ?>assets/media/photos/photo13@2x.jpg');">
        <div class="bg-black-75 py-4">
            <div class="content content-full text-center">
                <!-- Avatar -->
                <div class="mb-3">
                    <a class="img-link" href="be_pages_generic_profile.html">
                        <img class="img-avatar img-avatar96 img-avatar-thumb" src="<?= base_url('assets/media/karyawan/' . $this->session->userdata('photo')) ?>" alt="">
                    </a>
                </div>
                <!-- END Avatar -->

                <!-- Personal -->
                <h1 class="h3 text-white fw-bold mb-2"><?= $this->session->userdata('name') ?></h1>
                <h2 class="h5 text-white-75">
                    <?= $this->session->userdata('role_id') ?> <a class="text-primary-light" href="javascript:void(0)">@CMS</a>
                </h2>
                <!-- END Personal -->

                <!-- Actions -->
                <a href="<?= base_url('dashboard') ?>" class="btn btn-primary">
                    <i class="fa fa-arrow-left opacity-50 me-1"></i> Back to Profile
                </a>
                <!-- END Actions -->
            </div>
        </div>
    </div>
    <!-- END User Info -->

    <!-- Main Content -->
    <div class="content">
        <!-- User Profile -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-user-circle me-1 text-muted"></i> User Profile
                </h3>
            </div>
            <div class="block-content">
                <form id="form-data">
                    <div class="row items-push">
                        <div class="col-lg-3">
                            <p class="text-muted">
                                Informasi akun Anda, Username Anda akan tampil dan bisa dilihat oleh pengguna lain.
                            </p>
                        </div>
                        <div class="col-lg-7 offset-lg-1">
                            <div class="mb-4">
                                <label class="form-label" for="userid">Username</label>
                                <input type="text" class="form-control form-control-lg" id="userid" name="userid" readonly>
                                <input type="hidden" class="form-control form-control-lg" id="id" name="id">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="nama">Name</label>
                                <input type="text" class="form-control form-control-lg" id="nama" name="nama">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="email">Email Address</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email">
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-10 col-xl-6">
                                    <div class="push">
                                        <img class="img-avatar" src="<?= base_url('') ?>assets/media/avatars/avatar15.jpg" alt="">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="file" class="form-label">Pilih photo baru</label>
                                        <input class="form-control" type="file" id="file" name="file">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END User Profile -->

        <!-- Connections -->
        <!-- <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-share-alt me-1 text-muted"></i> Connections
                </h3>
            </div>
            <div class="block-content">
                <form action="be_pages_generic_profile.edit.html" method="POST" onsubmit="return false;">
                    <div class="row items-push">
                        <div class="col-lg-3">
                            <p class="text-muted">
                                You can connect your account to third party networks to get extra features.
                            </p>
                        </div>
                        <div class="col-lg-7 offset-lg-1">
                            <div class="row mb-4">
                                <div class="col-sm-10 col-md-8 col-xl-6">
                                    <a class="btn w-100 text-start btn-alt-danger bg-white" href="javascript:void(0)">
                                        <i class="fab fa-google me-1"></i> john_doe
                                    </a>
                                </div>
                                <div class="col-sm-12 col-md-4 col-xl-6 mt-1 d-flex align-items-center">
                                    <a class="text-muted" href="javascript:void(0)">
                                        <i class="fa fa-pencil-alt me-1"></i> Edit Google Connection
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-10 col-md-8 col-xl-6">
                                    <a class="btn w-100 text-start btn-alt-info bg-white" href="javascript:void(0)">
                                        <i class="fa fab fa-twitter me-1"></i> @john_doe
                                    </a>
                                </div>
                                <div class="col-sm-12 col-md-4 col-xl-6 mt-1 d-md-flex align-items-md-center">
                                    <a class="text-muted" href="javascript:void(0)">
                                        <i class="fa fa-pencil-alt me-1"></i> Edit Twitter Connection
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-10 col-md-8 col-xl-6">
                                    <a class="btn w-100 text-start btn-alt-primary" href="javascript:void(0)">
                                        <i class="fab fa-facebook-f me-1"></i> Connect to Facebook
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-10 col-md-8 col-xl-6">
                                    <a class="btn w-100 text-start btn-alt-warning" href="javascript:void(0)">
                                        <i class="fab fa-instagram me-1"></i> Connect to Instagram
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> -->
        <!-- END Connections -->

        <!-- Change Password -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-asterisk me-1 text-muted"></i> Change Password
                </h3>
            </div>
            <div class="block-content">
                <form id="form-data-password">
                    <div class="row items-push">
                        <div class="col-lg-3">
                            <p class="text-muted">
                                Ubah password Anda secara berkala untuk menjaga agar akun Anda tetap aman.
                            </p>
                        </div>
                        <div class="col-lg-7 offset-lg-1">
                            <!-- <div class="mb-4">
                                <label class="form-label" for="current">Current Password</label>
                                <input type="password" class="form-control form-control-lg" id="current" name="current">
                            </div> -->
                            <div class="mb-4">
                                <label class="form-label" for="psw">New Password</label>
                                <input type="password" class="form-control form-control-lg" id="psw" name="psw">
                                <input type="hidden" class="form-control form-control-lg" id="id_karyawan" name="id_karyawan">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="psw_confirm">Confirm New Password</label>
                                <input type="password" class="form-control form-control-lg" id="psw_confirm" name="psw_confirm">
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Change Password -->

        <!-- Billing Information -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="far fa-address-card me-1 text-muted"></i> Informasi Pribadi
                </h3>
            </div>
            <div class="block-content">
                <form id="form-data-profil">
                    <div class="row items-push">
                        <div class="col-lg-3">
                            <p class="text-muted">
                                Informasi pribadi Anda hanya akan digunakan untuk kepentingan perusahaan, tidak untuk di share ke pihak lain.
                            </p>
                        </div>
                        <div class="col-lg-7 offset-lg-1">
                            <div class="mb-4">
                                <label class="form-label" for="nik">NIK</label>
                                <input type="text" class="form-control form-control-lg" id="nik" name="nik" readonly>
                                <input type="hidden" class="form-control form-control-lg" id="id_karyawan_2" name="id_karyawan_2" readonly>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="nama">Role ID</label>
                                <input type="text" class="form-control form-control-lg" id="role_id" name="role_id" readonly>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control form-control-lg" id="nama_lengkap" name="nama_lengkap">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="alamat">Alamat</label>
                                <input type="text" class="form-control form-control-lg" id="alamat" name="alamat">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="no_ktp">Nomor KTP</label>
                                <input type="text" class="form-control form-control-lg" id="no_ktp" name="no_ktp">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="handphone">Handphone</label>
                                <input type="text" class="form-control form-control-lg" id="handphone" name="handphone">
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Billing Information -->
    </div>
    <!-- END Main Content -->
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<script>
    $(function() {
        $.ajax({
            url: '<?= base_url() ?>dashboard/getdataprofil',
            data: {
                table: "karyawan"
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                result.forEach(d => {
                    $('#userid').val(d.userid)
                    $('#id').val(d.id)
                    $('#id_karyawan').val(d.id)
                    $('#id_karyawan_2').val(d.id)
                    $('#nama').val(d.nama)
                    $('#nama_lengkap').val(d.nama)
                    $('#email').val(d.email)
                    $('#nik').val(d.nik)
                    $('#alamat').val(d.alamat)
                    $('#no_ktp').val(d.no_ktp)
                    $('#handphone').val(d.handphone)
                    $('#role_id').val(d.role_id)
                });
            }
        })
    });

    $("#form-data").submit(function(e) {
        e.preventDefault()
        //   loading_submit()

        if ($('#nama').val() == '' || $('#email').val() == '' || $('#file').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'karyawan');
        form_data.append('nama', $("#nama").val());
        form_data.append('email', $("#email").val());
        form_data.append('id', $("#id").val());
        if ($('#file').val() !== "") {
            var file_data = $('#file').prop('files')[0];
            form_data.append('file', file_data);
        }


        url_ajax = '<?= base_url() ?>dashboard/update_data_profil'


        $.ajax({
            url: url_ajax,
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            dataType: "json",
            success: function(result) {
                if (result.status == "success") {
                    Swal.fire(
                        'Success!',
                        result.message,
                        'success'
                    )
                    // $('#nama').val('')
                    // $('#email').val('')
                    // $('#file').val('')
                } else {
                    Swal.fire(
                        'error!',
                        result.message,
                        'error'
                    )
                }
            },
            error: function(err) {
                Swal.fire(
                    'error!',
                    err.responseText,
                    'error'
                )
            }
        })
    })

    $("#form-data-password").submit(function(e) {
        e.preventDefault()
        //   loading_submit()

        if ($('#psw').val() == '' || $('#psw_confirm').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }

        if ($('#psw').val() !== $('#psw_confirm').val()) {
            Swal.fire(
                'error!',
                'Password tidak sama!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'karyawan');
        form_data.append('password_mentah', $("#psw").val());
        form_data.append('id', $("#id").val());

        url_ajax = '<?= base_url() ?>dashboard/update_data_password'


        $.ajax({
            url: url_ajax,
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            dataType: "json",
            success: function(result) {
                if (result.status == "success") {
                    Swal.fire(
                        'Success!',
                        result.message,
                        'success'
                    )
                    // $('#nama').val('')
                    // $('#email').val('')
                    // $('#file').val('')
                } else {
                    Swal.fire(
                        'error!',
                        result.message,
                        'error'
                    )
                }
            },
            error: function(err) {
                Swal.fire(
                    'error!',
                    err.responseText,
                    'error'
                )
            }
        })
    })

    $("#form-data-profil").submit(function(e) {
        e.preventDefault()
        //   loading_submit()

        if ($('#nama_lengkap').val() == '' || $('#alamat').val() == '' || $('#no_ktp').val() == '' || $('#handphone').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'karyawan');
        form_data.append('nama', $("#nama_lengkap").val());
        form_data.append('id', $("#id").val());
        form_data.append('alamat', $("#alamat").val());
        form_data.append('no_ktp', $("#no_ktp").val());
        form_data.append('handphone', $("#handphone").val());

        url_ajax = '<?= base_url() ?>dashboard/update_data_profil_all'


        $.ajax({
            url: url_ajax,
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            dataType: "json",
            success: function(result) {
                if (result.status == "success") {
                    Swal.fire(
                        'Success!',
                        result.message,
                        'success'
                    )
                    // $('#nama').val('')
                    // $('#email').val('')
                    // $('#file').val('')
                } else {
                    Swal.fire(
                        'error!',
                        result.message,
                        'error'
                    )
                }
            },
            error: function(err) {
                Swal.fire(
                    'error!',
                    err.responseText,
                    'error'
                )
            }
        })
    })
</script>