<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Data Mesin</h2>

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded" id="list-mesin">
            <div class="block-header block-header-default">

                <div class="col-3">
                    <h3 class="block-title">
                        Master Mesin
                    </h3>
                </div>
                <label class="form-label" for="filter-klasifikasi"> Filter Status</label>
                <div class="col-3">
                    <select name="filter-klasifikasi" id="filter-klasifikasi" class="form-control">
                        <option value="IMPORT">IMPORT</option>
                        <option value="OVERHAUL">OVERHAUL</option>
                        <option value="READY">READY</option>
                        <option value="KANIBAL">KANIBAL</option>
                        <option value="RENTAL">RENTAL</option>
                        <option value="JUAL">JUAL</option>
                        <option value="JUAL LEPAS">JUAL LEPAS</option>
                    </select>
                </div>
                <div class="col-3" style="text-align: right;">
                    <button type="button" class="btn btn-outline-primary min-width-125" id="btn-add">
                        <i class="fa fa-plus mr-5"></i> Register Master
                    </button>
                </div>

            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-responsive class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive" id="table-mesin">
                    <!-- <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons"> -->
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nomor Mesin</th>
                            <th>Model</th>
                            <th>Serial Number</th>
                            <th>Asal</th>
                            <th>Supplier</th>
                            <th class="text-center" style="width: 25%;">Tanggal Masuk</th>
                            <th>Meter</th>
                            <th>Tegangan</th>
                            <th>Status</th>
                            <th>Uraian</th>
                            <th class="text-center" style="width: 25%;">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="block block-rounded" id="add-new" style="display: none;">
            <div class="block-header block-header-default">
                <h3 class="block-title">Register Mesin</h3>
                <div class="block-options">
                    <button type="button" class="btn btn-outline-danger min-width-125" id="btn-hide"><i class="fa fa-minus-circle"></i> Sembunyikan</button>
                </div>
            </div>
            <div class="block-content">
                <form id="form-data">
                    <div class="row push">
                        <div class="col-lg-12 col-xl-12">
                            <div class="mb-4">
                                <label class="form-label" for="nomor_mesin">Nomor Mesin</label>
                                <input type="text" class="form-control" id="nomor_mesin" name="nomor_mesin" readonly>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="serial_number">Serial Number</label>
                                <input type="text" class="form-control" id="serial_number" name="serial_number">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="model">Model</label>
                                <input type="text" class="form-control" id="model" name="model" onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="asal">Asal</label>
                                <select class="form-select" id="asal" name="asal">
                                    <option value="IMPORT">IMPORT</option>
                                    <option value="EX-CUSTOMER">EX-CUSTOMER</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="supplier">Supplier</label>
                                <input type="text" class="form-control" id="supplier" name="supplier" onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="tgl_masuk">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="meter">Meter</label>
                                <input type="text" class="form-control" id="meter" name="meter" onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="tegangan">Tegangan</label>
                                <select name="tegangan" id="tegangan" class="form-control">
                                    <option value="220V">220V</option>
                                    <option value="110V">110V</option>
                                </select>
                                <!-- <input type="text" class="form-control" id="tegangan" name="tegangan" onkeyup="this.value = this.value.toUpperCase()"> -->
                            </div>
                            <div class="mb-4" id="edit-status" style="display: none;">
                                <label class="form-label" for="status">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="IMPORT">IMPORT</option>
                                    <option value="KANIBAL">KANIBAL</option>
                                    <option value="JUAL LEPAS">JUAL LEPAS</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="uraian">Uraian</label>
                                <textarea name="uraian" id="uraian" cols="30" rows="5" class="form-control"></textarea>
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

<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Catatan Mesin</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <form id="form-data-teknisi">
                    <div class="block-content fs-sm" id="body-modal">
                        <div class="row push">
                            <div class="col-lg-12 col-xl-12">
                                <div class="mb-4" id="info-uraian">
                                    <label class="form-label" for="example-text-input">Catatan Mesin</label>
                                    <input type="text" class="form-control" id="uraian_modal" name="uraian_modal">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <!-- <button type="submit" class="btn btn-alt-primary" data-bs-dismiss="modal">
                            Submit
                        </button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    <?php $target = 0; ?>
    var a = '<?= $this->session->userdata('userid') ?>'
    $(function() {
        $("#table-mesin").DataTable({
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
                'url': '<?= base_url() ?>mesin/ajax_table_mesin',
                'type': 'post',
            },
            'columns': [{
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.nomor_mesin",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.model",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.serial_number",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.asal",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.supplier",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.tgl_masuk",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.meter",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.tegangan",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.status == 'IMPORT') {
                        return `<span class="badge bg-danger">` + data.status + `</span>`
                    } else if (data.status == 'OVERHAUL') {
                        return `<span class="badge bg-warning">` + data.status + `</span>`
                    } else if (data.status == 'READY') {
                        return `<span class="badge bg-success">` + data.status + `</span>`
                    } else if (data.status == 'KANIBAL') {
                        return `<span class="badge bg-dark">` + data.status + `</span>`
                    } else if (data.status == 'RENTAL') {
                        return `<span class="badge bg-primary">` + data.status + `</span>`
                    } else if (data.status == 'JUAL') {
                        return `<span class="badge bg-elegance">` + data.status + `</span>`
                    } else {
                        return `<span class="badge bg-gd-aqua">` + data.status + `</span>`
                    }
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<button type="button" class="btn btn-sm btn-danger" onclick="show_uraian('` + data.uraian + `')"><i class="fa fa-file"></i> Uraian</button>`
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'py-1',
                "data": "data",
                "render": function(data) {
                    return `<button type="button" class="btn btn-sm btn-danger" onclick=delete_data('` + data.id + `')><i class="fa fa-trash"></i> Hapus</button><br style="margin-bottom: 20px;"><button type="button" class="btn btn-sm btn-info" id="btn-edit" onclick="edit_data('` + data.id + `')"><i class="fa fa-edit"></i> Edit</button>`
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

    });

    function reload_table() {
        $('#table-mesin').DataTable().ajax.reload(null, false);
    }

    $("#form-data").submit(function(e) {
        e.preventDefault()
        //   loading_submit()

        if ($('#nomor_mesin').val() == '' || $('#serial_number').val() == '' || $('#model').val() == '' || $('#asal').val() == '' || $('#supplier').val() == '' || $('#meter').val() == '' || $('#tegangan').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'overhaul');
        form_data.append('nomor_mesin', $("#nomor_mesin").val());
        form_data.append('serial_number', $("#serial_number").val());
        form_data.append('model', $("#model").val());
        form_data.append('asal', $("#asal").val());
        form_data.append('supplier', $("#supplier").val());
        form_data.append('tgl_masuk', $("#tgl_masuk").val());
        form_data.append('meter', $("#meter").val());
        form_data.append('tegangan', $("#tegangan").val());
        form_data.append('status', $("#status").val());
        form_data.append('uraian', $("#uraian").val());

        var url_ajax = '<?= base_url() ?>mesin/insert_data_mesin'
        if (global_status == "edit") {
            url_ajax = '<?= base_url() ?>mesin/update_data_mesin'
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
                    $('#nomor_mesin').val('')
                    $('#serial_number').val('')
                    $('#model').val('')
                    $('#meter').val('')
                    $('#tgl_masuk').val('')
                    $('#tegangan').val('')
                    $('#uraian').val('')
                    reload_table()
                    $('#add-new').hide();
                    $('#list-mesin').show(500)
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

    $('#filter-klasifikasi').on('change', function() {
        // alert($('#filter-klasifikasi').val())

        $("#table-mesin").DataTable({
            "destroy": true,
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
                'url': '<?= base_url() ?>mesin/ajax_table_mesin_where',
                'type': 'post',
                'data': {
                    status: $('#filter-klasifikasi').val()
                }
            },
            'columns': [{
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.nomor_mesin",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.model",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.serial_number",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.asal",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.supplier",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.tgl_masuk",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.meter",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.tegangan",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.status == 'IMPORT') {
                        return `<span class="badge bg-danger">` + data.status + `</span>`
                    } else if (data.status == 'OVERHAUL') {
                        return `<span class="badge bg-warning">` + data.status + `</span>`
                    } else if (data.status == 'READY') {
                        return `<span class="badge bg-success">` + data.status + `</span>`
                    } else if (data.status == 'KANIBAL') {
                        return `<span class="badge bg-dark">` + data.status + `</span>`
                    } else if (data.status == 'RENTAL') {
                        return `<span class="badge bg-primary">` + data.status + `</span>`
                    } else if (data.status == 'JUAL') {
                        return `<span class="badge bg-elegance">` + data.status + `</span>`
                    } else {
                        return `<span class="badge bg-gd-aqua">` + data.status + `</span>`
                    }
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<button type="button" class="btn btn-sm btn-danger" onclick="show_uraian('` + data.uraian + `')"><i class="fa fa-file"></i> Uraian</button>`
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'py-1',
                "data": "data",
                "render": function(data) {
                    return `<button type="button" class="btn btn-sm btn-danger" onclick=delete_data('` + data.id + `')><i class="fa fa-trash"></i> Hapus</button><br style="margin-bottom: 20px;"><button type="button" class="btn btn-sm btn-info" id="btn-edit" onclick="edit_data('` + data.id + `')"><i class="fa fa-edit"></i> Edit</button>`
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

    });


    $('#btn-add').on('click', function() {
        $('#edit-status').hide();
        $('#status').val('IMPORT');

        $('#add-new').show(500);
        $('#list-mesin').hide();
        global_status = "tambah"
        // $('#nomor_mesin').val('')
        $('#serial_number').val('')
        $('#model').val('')
        $('#tgl_masuk').val('')
        $('#meter').val('')
        $('#tegangan').val('')
        $('#uraian').val('')

        $.ajax({
            url: '<?= base_url() ?>mesin/get_nomor_mesin',
            data: {
                // id: id,
                table: "overhaul"
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                $('#nomor_mesin').val(result)
            }
        })
    });

    $('#clear-form').on('click', function() {
        // $('#nomor_mesin').val('')
        $('#serial_number').val('')
        $('#model').val('')
        $('#tgl_masuk').val('')
        $('#meter').val('')
        $('#tegangan').val('')
        $('#uraian').val('')
    });

    $('#btn-hide').on('click', function() {
        $('#list-mesin').show(500);
        $('#add-new').hide();
    });

    $('#btn-edit').on('click', function() {
        $('#add-new').show(500);
        $('#list-mesin').hide();

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
                    url: '<?= base_url() ?>mesin/delete_data',
                    data: {
                        id: id,
                        table: "overhaul"
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
        $('#edit-status').show();

        global_status = 'edit'
        global_id = id
        //   $('#psw1').hide()
        //   $('#psw2').hide()
        $('#userid').attr('readonly', true)
        $('#clear-form').hide()

        $.ajax({
            url: '<?= base_url('mesin/editmesin') ?>',
            data: {
                id: id,
                table: 'overhaul'
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                result.forEach(d => {
                    console.log(d.tgl_masuk)
                    $('#list-mesin').hide();
                    $('#add-new').show(500);

                    $('#id').val(d.id)
                    $('#nomor_mesin').val(d.nomor_mesin)
                    $('#serial_number').val(d.serial_number)
                    $('#model').val(d.model)
                    $('#meter').val(d.meter)
                    $('#tgl_masuk').val(d.tgl_masuk)
                    $('#tegangan').val(d.tegangan)
                    $('#asal').val(d.asal)
                    $('#status').val(d.status)
                    $('#uraian').val(d.uraian)
                    $('#supplier').val(d.supplier)
                });
            }
        })

    }

    function show_uraian(uraian) {
        // $('#uraian_modal').val(uraian)
        var html = '<label class="form-label" for="example-text-input">Uraian</label><textarea name="uraian_modal" id="uraian_modal" cols="30" rows="5" class="form-control">' + uraian + '</textarea>'
        // var nama
        $('#exampleModalCenter').modal('show')
        // nama = '<h3 class="block-title">Bukti Ketidakhadiran - Agus Salim</h3>'
        // html = '<img src="<?= base_url('assets/media/leave/agus.jpg') ?>" class="img-fluid" alt="bukti_leave">'
        $('#info-uraian').html(html)
        // $('.block-title').html(nama)
    }
</script>