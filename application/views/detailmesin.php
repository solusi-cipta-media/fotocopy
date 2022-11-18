<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Data Mesin </h2>

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded" id="list-mesin">
            <div class="block-header block-header-default">

                <div class="col-3 text-right">
                    <h3 class="block-title">
                        <a href="<?= base_url('mesin') ?>" class="btn btn-outline-danger min-width-125"><i class="fa fa-circle-left"></i> Kembali</a>
                    </h3>
                </div>
                <label class="form-label" for="filter-klasifikasi"> Filter Status</label>
                <div class="col-3">
                    <select name="filter-aktivitas" id="filter-aktivitas" class="form-control">
                        <option value="OVERHAUL">OVERHAUL</option>
                        <option value="KERJA LUAR">KERJA LUAR</option>
                    </select>
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
                            <th>Tanggal Aktivitas</th>
                            <th class="text-center" style="width: 25%;">Aktivitas</th>
                        </tr>
                    </thead>
                </table>
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
                'url': '<?= base_url() ?>mesin/ajax_table_mesin_detail',
                'type': 'post',
                'data': {
                    nomor: <?= $_GET["nomor"] ?>
                },
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
                "data": "data.tgl_aktivitas",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.aktivitas == 'OVERHAUL') {
                        return `<a href="<?= base_url('overhaul/prosesohdetail?id=') ?>` + data.id_overhaul + `&status=detail&nomor=` + data.nomor_mesin + `"><span class="badge bg-danger">` + data.aktivitas + ` <i class="fa fa-circle-right"></i></span></a>`
                    } else {
                        return `<a href="<?= base_url('kerjaluar/cetakmachinerecord?nomor=') ?>` + data.nomor_mesin + `" target="_blank"><span class="badge bg-gd-aqua">` + data.aktivitas + ` <i class="fa fa-circle-right"></i></span></a>`
                    }
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

    $('#filter-aktivitas').on('change', function() {
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
                'url': '<?= base_url() ?>mesin/ajax_table_mesin_where_detail',
                'type': 'post',
                'data': {
                    aktivitas: $('#filter-aktivitas').val(),
                    nomor_mesin: <?= $_GET['nomor'] ?>
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
                "data": "data.tgl_aktivitas",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.aktivitas == 'OVERHAUL') {
                        return `<a href="<?= base_url('overhaul/prosesohdetail?id=') ?>` + data.id_overhaul + `&status=detail&nomor=` + data.nomor_mesin + `"><span class="badge bg-danger">` + data.aktivitas + ` <i class="fa fa-circle-right"></i></span></a>`
                    } else {
                        return `<a href="<?= base_url('kerjaluar/cetakmachinerecord?nomor=') ?>` + data.nomor_mesin + `" target="_blank"><span class="badge bg-gd-aqua">` + data.aktivitas + ` <i class="fa fa-circle-right"></i></span></a>`
                    }
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

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