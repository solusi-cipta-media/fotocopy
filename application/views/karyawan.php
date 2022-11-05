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
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="LAKI-LAKI">LAKI-LAKI</option>
                                    <option value="PEREMPUAN">PEREMPUAN</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="file">Photo Karyawan</label>
                                <input class="form-control" type="file" id="file" name="file">
                            </div>
                            <hr>
                            <div class="mb-4">
                                <label class="form-label" for="userid">User ID</label>
                                <input type="text" class="form-control" id="userid" name="userid">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="role_id">Role ID</label>
                                <select class="form-select" id="role_id" name="role_id">
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="SUPERVISOR">SUPERVISOR</option>
                                    <option value="TEKNISI">TEKNISI</option>
                                    <option value="STAFF">STAFF</option>
                                </select>
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

<script>
    <?php $target = 0; ?>
    var a = '<?= $this->session->userdata('userid') ?>'
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
                    if (data.role_id == 'ADMIN') {
                        return `<span class="badge bg-danger">` + data.role_id + `</span>`
                    } else if (data.role_id == 'SUPERVISOR') {
                        return `<span class="badge bg-warning">` + data.role_id + `</span>`
                    } else if (data.role_id == 'TEKNISI') {
                        return `<span class="badge bg-primary">` + data.role_id + `</span>`
                    } else {
                        return `<span class="badge bg-success">` + data.role_id + `</span>`
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
                    return `<button type="button" class="btn btn-sm btn-danger" onclick=delete_data('` + data.id + `')><i class="fa fa-trash"></i> Hapus</button><br style="margin-bottom: 10px;"><button type="button" class="btn btn-sm btn-info" id="btn-edit" onclick="edit_data('` + data.id + `')"><i class="fa fa-edit"></i> Edit</button>`
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        //   $('#tambah-user').hide();
    });

    function reload_table() {
        $('#table-user').DataTable().ajax.reload(null, false);
    }

    $("#form-data").submit(function(e) {
        e.preventDefault()
        //   loading_submit()

        if ($('#nama').val() == '' || $('#email').val() == '' || $('#userid').val() == '' || $('#role_id').val() == '' || $('#nik').val() == '' || $('#alamat').val() == '' || $('#no_ktp').val() == '' || $('#handphone').val() == '' || $('#file').val() == '') {
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
        form_data.append('userid', $("#userid").val());
        form_data.append('role_id', $("#role_id").val());
        form_data.append('nik', $("#nik").val());
        form_data.append('alamat', $("#alamat").val());
        form_data.append('no_ktp', $("#no_ktp").val());
        form_data.append('handphone', $("#handphone").val());
        form_data.append('jenis_kelamin', $("#jenis_kelamin").val());
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
    })


    $('#btn-add').on('click', function() {
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

    function edit_data(id) {

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
                    $('#list-karyawan').hide();
                    $('#add-new').show(500);

                    $('#id').val(d.id)
                    $('#nama').val(d.nama)
                    $('#nik').val(d.nik)
                    $('#alamat').val(d.alamat)
                    $('#no_ktp').val(d.no_ktp)
                    $('#handphone').val(d.handphone)
                    $('#jenis_kelamin').val(d.jenis_kelamin)
                    $('#userid').val(d.userid)
                    $('#role_id').val(d.role_id)
                    $('#email').val(d.email)
                    $('#file').val(d.photo)
                });
            }
        })

    }
</script>