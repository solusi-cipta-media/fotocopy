<!-- Main Container -->
<style>
    .select2.select2-container.select2-container--default {
        width: 100% !important;
    }
</style>
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Overhaul</h2>

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded" id="list-mesin">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    List Mesin Import
                </h3>
                <!-- <button type="button" class="btn btn-outline-primary min-width-125" id="btn-add">
                    <i class="fa fa-plus mr-5"></i> Register Master
                </button> -->
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-responsive class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive" id="table-mesin">
                    <!-- <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons"> -->
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>No. Mesin</th>
                            <th>Model</th>
                            <th>Serial Number</th>
                            <th>Asal</th>
                            <th>Meter</th>
                            <th>Uraian</th>
                            <th>Teknisi</th>
                            <th class="text-center" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<!-- Normal Modal -->
<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tentukan Teknisi</h3>
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
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Nama</label>
                                    <input type="hidden" class="form-control" id="id" name="id">
                                    <select name="teknisi" id="teknisi" class="form-control">
                                        <?php
                                        foreach ($teknisi as $key => $value) {
                                        ?>
                                            <option value="<?= $value['id'] . '-' . $value['nama'] ?>"><?= $value['nama'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-alt-primary" data-bs-dismiss="modal">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal-uraian" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title2">Catatan Mesin</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <form id="form-data-teknisi">
                    <div class="block-content fs-sm" id="body-modal2">
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
<!-- END Normal Modal -->
<!-- select2 -->
<script src="<?= base_url() ?>resources/select2/select2.min.js"></script>

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
                'url': '<?= base_url() ?>overhaul/ajax_table_listoh',
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
                "data": "data.meter",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<button type="button" class="btn btn-sm btn-danger" onclick="show_uraian('` + data.uraian + `')"><i class="fa fa-file"></i> Uraian</button>`
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.approval_pengajuan == 0 && data.teknisi != '') {
                        return `<span class="badge bg-danger">` + data.teknisi + ` - Menunggu Approval</span>`
                    } else if (data.teknisi != '') {
                        return data.teknisi
                    } else {
                        return `-`
                    }
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'py-1',
                "data": "data",
                "render": function(data) {
                    if (data.teknisi == '')
                        return `<button type="button" class="btn btn-sm btn-primary" onclick="pilih_data('` + data.id + `','` + data.nomor_mesin + `','` + data.serial_number + `')" data-bs-toggle="tooltip" title="Pilih"><i class="fa fa-circle-check"></i> Pilih</button><br style="margin-bottom: 10px;"><button type="button" class="btn btn-sm btn-primary" onclick="tentukan_data(` + data.id + `)" data-bs-toggle="tooltip" title="Pilih Teknisi"><i class="fa fa-gear"></i> Pilih Teknisi</button>`
                    return `<button type="button" class="btn btn-sm btn-success" onclick="approve_data(` + data.id + `)" data-bs-toggle="tooltip" title="Setujui"><i class="si si-like"></i> Approve</button><br style="margin-bottom: 10px;"><button type="button" class="btn btn-sm btn-danger" onclick="reject_data(` + data.id + `)" data-bs-toggle="tooltip" title="Tolak"><i class="si si-dislike"></i> Reject</button><br style="margin-bottom: 10px;"><button type="button" class="btn btn-sm btn-primary" onclick="tentukan_data(` + data.id + `)" data-bs-toggle="tooltip" title="Pilih Teknisi"><i class="fa fa-gear"></i> Pilih Teknisi</button>`
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        //   $('#tambah-user').hide();
        $('#teknisi').select2({
            dropdownParent: $('#exampleModalCenter')
        });
    });

    function reload_table() {
        $('#table-mesin').DataTable().ajax.reload(null, false);
    }



    $('#btn-add').on('click', function() {
        $('#add-new').show(500);
        $('#list-mesin').hide();
    });

    $('#btn-hide').on('click', function() {
        $('#list-mesin').show(500);
        $('#add-new').hide();
    });

    $('#btn-edit').on('click', function() {
        $('#add-new').show(500);
        $('#list-mesin').hide();
    });

    function pilih_data(id, nomor, sn) {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Anda akan memilih mesin " + nomor + " - " + sn + " untuk Overhaul!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>overhaul/pilih_mesin',
                    data: {
                        id: id,
                        table: "overhaul"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == "success") {
                            Swal.fire(
                                'Berhasil!',
                                'Menunggu persetujuan Supervisor untuk proses overhaul.',
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

    function approve_data(id) {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Anda akan menyetujui proses Start Overhaul!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>overhaul/setujui_proses',
                    data: {
                        id: id,
                        table: "overhaul"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == "success") {
                            Swal.fire(
                                'Berhasil!',
                                'Proses overhaul bisa dimulai.',
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

    function reject_data(id) {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Anda akan menolak proses Start Overhaul!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>overhaul/reject_proses',
                    data: {
                        id: id,
                        table: "overhaul"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == "success") {
                            Swal.fire(
                                'Berhasil!',
                                'Proses Overhaul direject.',
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

    function tentukan_data(id) {
        $('#id').val(id)
        // var html
        // var nama
        $('#exampleModalCenter').modal('show')
        // nama = '<h3 class="block-title">Bukti Ketidakhadiran - Agus Salim</h3>'
        // html = '<img src="<?= base_url('assets/media/leave/agus.jpg') ?>" class="img-fluid" alt="bukti_leave">'
        // $('#body-modal').html(html)
        // $('.block-title').html(nama)
    }

    $("#form-data-teknisi").submit(function(e) {
        e.preventDefault()
        //   loading_submit()

        if ($('#teknisi').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'overhaul');
        form_data.append('id', $("#id").val());
        form_data.append('teknisi_all', $("#teknisi").val());

        url_ajax = '<?= base_url() ?>overhaul/update_data_teknisi_langsung'

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
                    reload_table()
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

    function show_uraian(uraian) {
        // $('#uraian_modal').val(uraian)
        var html = '<label class="form-label" for="example-text-input">Uraian</label><textarea name="uraian_modal" id="uraian_modal" cols="30" rows="5" class="form-control">' + uraian + '</textarea>'
        // var nama
        $('#modal-uraian').modal('show')
        // nama = '<h3 class="block-title">Bukti Ketidakhadiran - Agus Salim</h3>'
        // html = '<img src="<?= base_url('assets/media/leave/agus.jpg') ?>" class="img-fluid" alt="bukti_leave">'
        $('#info-uraian').html(html)
        // $('.block-title').html(nama)
    }
</script>