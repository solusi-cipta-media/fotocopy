<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Data Karyawan</h2>

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded" id="list-karyawan">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Karyawan Perusahaan
                </h3>
                <button type="button" class="btn btn-outline-primary min-width-125" id="btn-add">
                    <i class="fa fa-plus mr-5"></i> Register Karyawan
                </button>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-responsive class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive" id="table-user">
                    <!-- <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons"> -->
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>ROLE</th>
                            <th>Alamat</th>
                            <th>No. KTP</th>
                            <th>Handphone</th>
                            <th>Jenis Kelamin</th>
                            <th>Photo</th>
                            <th class="text-center" style="width: 10%;">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="block block-rounded" id="add-new" style="display: none;">
            <div class="block-header block-header-default">
                <h3 class="block-title">Register Karyawan</h3>
                <div class="block-options">
                    <button type="button" class="btn btn-outline-danger min-width-125" id="btn-hide"><i class="fa fa-minus-circle"></i> Sembunyikan</button>
                </div>
            </div>
            <div class="block-content">
                <form id="form-data">
                    <div class="row push">
                        <div class="col-lg-12 col-xl-12">
                            <div class="mb-4">
                                <label class="form-label" for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="nik">Nomor Induk Karyawan</label>
                                <input type="text" class="form-control" id="nik" name="nik" onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="4"></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="no_ktp">No. KTP</label>
                                <input type="text" class="form-control" id="no_ktp" name="no_ktp">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="handphone">Handphone</label>
                                <input type="text" class="form-control" id="handphone" name="handphone">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="jenis_kelamin_pst jenis_kelamin">
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                                        <option value="PEREMPUAN">PEREMPUAN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="file">Photo Karyawan</label>
                                <input class="form-control" type="file" id="file" name="file">
                                <input type="hidden" class="form-control mt-3" id="name_upload_edit" name="name_upload_edit">
                            </div>
                            <hr>
                            <div class="mb-4">
                                <label class="form-label" for="userid">User ID</label>
                                <input type="text" class="form-control" id="userid" name="userid">
                                <small style="color: red; display: none;" id="error-userid">* UserID sudah digunakan</small>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="role">Role ID</label>
                                <div class="role_pst role">
                                    <select class="form-select" id="role" name="role">
                                        <!-- <option value="ADMIN">ADMIN</option>
                                    <option value="SUPERVISOR">SUPERVISOR</option>
                                    <option value="TEKNISI">TEKNISI</option>
                                    <option value="STAFF">STAFF</option> -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary"><i class="si si-cloud-upload"></i> Simpan</button>
                                <button type="button" class="btn btn-alt-danger" id="clear-form"><i class="si si-close"></i> Clear</button>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row-push">
                        <div class="col-lg-12 col-xl-12">
                            <button type="submit" class="btn btn-alt-primary"><i class="si si-cloud-upload"></i> Simpan</button>
                            <button type="button" class="btn btn-alt-danger" id="clear-form"><i class="si si-close"></i> Clear</button>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
        <!-- Dynamic Table Responsive -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<script src="<?= base_url() ?>resources/select2/select2.min.js"></script>

<script>
    <?php $target = 0; ?>
    var a = '<?= $this->session->userdata('userid') ?>',
        select2Role,
        formData = $('#form-data'),
        base_url = '<?= base_url() ?>',
        global_status = ''
    $(function() {
        $("#table-user").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            'serverSide': true,
            'processing': true,
            "order": [
                [0, "desc"]
            ],
            'ajax': {
                'dataType': 'json',
                'url': '<?= base_url() ?>karyawan/ajax_table_karyawan',
                'type': 'post',
            },
            'columns': [{
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.nik",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.nama",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.role_id == '1') {
                        return `<span class="badge bg-danger">` + data.role + `</span>`
                    } else if (data.role_id == '2') {
                        return `<span class="badge bg-warning">` + data.role + `</span>`
                    } else if (data.role_id == '3') {
                        return `<span class="badge bg-primary">` + data.role + `</span>`
                    } else if (data.role_id == '4') {
                        return `<span class="badge bg-success">` + data.role + `</span>`
                    } else {
                        return `<span class="badge bg-info">` + data.role + `</span>`
                    }
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.alamat",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no_ktp",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.handphone",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.jenis_kelamin",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<img class="img-avatar img-avatar48" src="<?= base_url('assets/media/karyawan/') ?>` + data.photo + `" alt="karyawan">`
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'py-1',
                "data": "data",
                "render": function(data) {
                    return `<button type="button" class="btn btn-sm btn-danger" onclick=delete_data('` + data.id + `')><i class="fa fa-trash"></i> Hapus</button><br style="margin-bottom: 10px;"><button type="button" class="btn btn-sm btn-info" id="btn-edit" onclick="edit_data('` + data.id + `')"><i class="fa fa-edit"></i> Edit</button><br style="margin-bottom: 10px;"><button type="button" class="btn btn-sm btn-warning" id="btn-edit" onclick="reset_password('` + data.id + `')"><i class="fa fa-key"></i> Reset</button>`
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        //   $('#tambah-user').hide();
        $(document).on("select2:open", () => {
            document.querySelector(".select2-search__field").focus();
        });
        select2Role = formData
            .find("#role")
            .select2({
                dropdownParent: formData.find(".role_pst"),
                ajax: {
                    url: base_url + "karyawan/select2_role",
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
							<div class="me-1"> ${data.role} </div>
						</div>
						`);

                },
                templateSelection: function(data) {
                    $(this).val(data.id);
                    return data.role || data.text;
                },
                placeholder: "Pilih Role",
                allowClear: true,
                // width: "resolve",
            })
            .on("select2:selecting", function(event) {
                $("#role").find("option").remove();
            });
    });

    function reload_table() {
        $('#table-user').DataTable().ajax.reload(null, false);
    }

    $("#form-data").submit(function(e) {
        e.preventDefault()
        //   loading_submit()

        if ($('#nama').val() == '' || $('#email').val() == '' || $('#userid').val() == '' || ($('#role').val() == '' || $('#role').val() == 'null' || $('#role').val() == null || $('#role').val() == undefined) || $('#nik').val() == '' || $('#alamat').val() == '' || $('#no_ktp').val() == '' || $('#handphone').val() == '' || ($('#file').val() == '' && global_status == 'tambah')) {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }

        //cek dulu apakah userid sudah terdaftar
        var url_ajax_verifikasi = '<?= base_url() ?>karyawan/cek_user'
        $.ajax({
            url: url_ajax_verifikasi,
            type: "post",
            data: {
                table: 'karyawan',
                userid: $('#userid').val()
            },
            dataType: "json",
            success: function(result) {
                if (global_status == "tambah") {
                    if (result == 200) {

                        form()
                        return
                    }

                    Swal.fire(
                        'Error!',
                        'UserID sudah digunakan, gunakan UserID lain!.',
                        'error'
                    )
                } else {
                    form()
                    return
                }

            },
            error: function(err) {
                Swal.fire(
                    'error!',
                    err.responseText,
                    'error'
                )
                return
            }
        })


    })

    function form() {

        var form_data = new FormData();
        form_data.append('table', 'karyawan');
        form_data.append('nama', $("#nama").val());
        form_data.append('email', $("#email").val());
        form_data.append('userid', $("#userid").val());
        form_data.append('role_id', $("#role").val());
        form_data.append('nik', $("#nik").val());
        form_data.append('alamat', $("#alamat").val());
        form_data.append('no_ktp', $("#no_ktp").val());
        form_data.append('handphone', $("#handphone").val());
        form_data.append('jenis_kelamin', $("#jenis_kelamin").val());
        form_data.append('name_upload_edit', $("#name_upload_edit").val());
        if ($('#file').val() !== "") {
            var file_data = $('#file').prop('files')[0];
            form_data.append('file', file_data);
        }

        var url_ajax = '<?= base_url() ?>karyawan/insert_data_user'
        if (global_status == "edit") {
            url_ajax = '<?= base_url() ?>karyawan/update_data_user'
            form_data.append('id', global_id);
        }

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
                    clear_form()
                    $('#nama').val('')
                    $('#nik').val('')
                    $('#alamat').val('')
                    $('#no_ktp').val('')
                    $('#handphone').val('')
                    $('#email').val('')
                    $('#userid').val('')
                    $('#role_id').val('')
                    $('#file').val('')
                    reload_table()
                    $('#add-new').hide();
                    $('#list-karyawan').show(500)
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
    }

    function clear_form() {
        $("option:selected").prop("selected", false);
        $("div.role select").val("").change();
        $("div.jenis_kelamin select").val("LAKI-LAKI").change();
        formData.find('input').val('')
    }

    $('#btn-add').on('click', function() {
        clear_form()
        $('#add-new').show(500);
        $('#list-karyawan').hide();
        global_status = "tambah"
        $('#nama').val('')
        $('#nik').val('')
        $('#alamat').val('')
        $('#no_ktp').val('')
        $('#handphone').val('')
        $('#userid').val('')
        $('#role_id').val('')
        $('#email').val('')
        $('#file').val('')
    });

    $('#clear-form').on('click', function() {
        clear_form()
        $('#nama').val('')
        $('#nik').val('')
        $('#alamat').val('')
        $('#no_ktp').val('')
        $('#handphone').val('')
        $('#userid').val('')
        $('#role_id').val('')
        $('#email').val('')
        $('#file').val('')
    });

    $('#btn-hide').on('click', function() {
        $('#list-karyawan').show(500);
        $('#add-new').hide();
    });

    $('#btn-edit').on('click', function() {
        $('#add-new').show(500);
        $('#list-karyawan').hide();
    });

    $('#userid').on('keyup', function() {
        $.ajax({
            url: '<?= base_url() ?>karyawan/cek_user',
            data: {
                userid: $('#userid').val(),
                table: "karyawan"
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                if (result == 400) {
                    $('#error-userid').show()
                } else {
                    $('#error-userid').hide()
                }
            }
        })
    });

    function delete_data(id) {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>karyawan/delete_data',
                    data: {
                        id: id,
                        table: "karyawan"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == "success") {
                            Swal.fire(
                                'Deleted!',
                                'Data berhasil di hapus.',
                                'success'
                            )
                            reload_table()
                        } else
                            toast('error', result.message)
                    }
                })
            }
        })


    }

    function reset_password(id) {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Anda akan melakukan reset password karyawan kembali ke default  -> 12345!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, reset password!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>karyawan/reset_pass',
                    data: {
                        id: id,
                        table: "karyawan"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == "success") {
                            Swal.fire(
                                'Reseted!',
                                'Password berhasil di reset.',
                                'success'
                            )
                            reload_table()
                        } else
                            toast('error', result.message)
                    }
                })
            }
        })


    }

    function edit_data(id) {
        clear_form()
        global_status = 'edit'
        global_id = id
        //   $('#psw1').hide()
        //   $('#psw2').hide()
        $('#userid').attr('readonly', true)
        $('#clear-form').hide()

        $.ajax({
            url: '<?= base_url('karyawan/edituser') ?>',
            data: {
                id: id,
                table: 'karyawan'
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                result.forEach(d => {
                    $("div.role option:selected").prop("selected", false);
                    var option1 = new Option(d.role, d.role_id, false, true);
                    select2Role.append(option1).trigger("change");

                    $('#list-karyawan').hide();
                    $('#add-new').show(500);

                    $('#id').val(d.id)
                    $('#nama').val(d.nama)
                    $('#nik').val(d.nik)
                    $('#alamat').val(d.alamat)
                    $('#no_ktp').val(d.no_ktp)
                    $('#handphone').val(d.handphone)
                    $("div.jenis_kelamin option:selected").prop("selected", false);
                    $('#jenis_kelamin').val(d.jenis_kelamin).change()
                    $('#userid').val(d.userid)
                    $('#email').val(d.email)
                    // $('#file').val(d.photo)
                    $('#name_upload_edit').val(d.photo)
                    // $('#role_id').val(d.role_id)


                });
            }
        })

    }

    $('#jenis_kelamin').select2({
        dropdownParent: formData.find(".jenis_kelamin_pst"),
    })
</script>