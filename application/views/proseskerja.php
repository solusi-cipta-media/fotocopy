<!-- Main Container -->
<style>
    .select2.select2-container.select2-container--default {
        width: 100% !important;
    }
</style>
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Kerja Luar</h2>

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded" id="list-mesin">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Proses Kerja
                </h3>
                <!-- <button type="button" class="btn btn-outline-primary min-width-125" id="btn-add">
                    <i class="fa fa-plus mr-5"></i> Register Master
                </button> -->
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-responsive class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive" id="table-kerja">
                    <!-- <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons"> -->
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Customer</th>
                            <th>Tipe Mesin</th>
                            <th>Status Mesin</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Tgl Kerja</th>
                            <th>Lokasi</th>
                            <th>Teknisi</th>
                            <th>Uraian Pekerjaan</th>
                            <th>Time</th>
                            <th>Status Pekerjaan</th>
                            <th style="width: 15%;">Aksi</th>
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
                    <h3 class="block-title">Form Machine Record</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <form id="form-data">
                    <div class="block-content fs-sm" id="body-modal">
                        <div class="row push">
                            <div class="col-lg-12 col-xl-12">
                                <div class="mb-4">
                                    <label class="form-label" for="uraian">Uraian</label>
                                    <input type="hidden" class="form-control" id="id" name="id">
                                    <textarea name="uraian" id="uraian" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="meter">Meter</label>
                                    <input type="text" class="form-control" id="meter" name="meter">
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
<div class="modal" id="modal-status" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Ubah Status Mesin</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <form id="form-data-status">
                    <div class="block-content fs-sm" id="body-modal2">
                        <div class="row push">
                            <div class="col-lg-12 col-xl-12">
                                <div class="mb-4">
                                    <label class="form-label" for="uraian">Status Mesin Sekarang</label>
                                    <input type="hidden" class="form-control" id="id_spk" name="id_spk">
                                    <input type="hidden" class="form-control" id="nomor_mesin_spk" name="nomor_mesin_spk">
                                    <input type="hidden" class="form-control" id="model_spk" name="model_spk">
                                    <select name="status" id="status" class="form-control">
                                        <option value="RENTAL">Rental</option>
                                        <option value="JUAL">Jual</option>
                                        <option value="JUAL LEPAS">Jual Lepas</option>
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
<!-- END Normal Modal -->
<div class="modal" id="modal-uraian" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Uraian Pekerjaan</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <form id="form-data-teknisi">
                    <div class="block-content fs-sm" id="body-modal3">
                        <div class="row push">

                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- select2 -->
<script src="<?= base_url() ?>resources/select2/select2.min.js"></script>

<script>
    <?php $target = 0; ?>
    var a = '<?= $this->session->userdata('userid') ?>'
    $(function() {
        $("#table-kerja").DataTable({
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
                'url': '<?= base_url() ?>kerjaluar/ajax_table_proses_kerja',
                'type': 'post',
            },
            'columns': [{
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.customer",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.model",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.status_mesin",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.jenis == "INVOICE") {
                        return `<span class="badge bg-danger"> Invoice</span>`
                    } else if (data.jenis == 'INSTAL') {
                        return `<span class="badge bg-primary"> Instal</span>`
                    } else {
                        return `<span class="badge bg-success"> Invoice</span>`
                    }
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.tgl_kerja",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return data.lokasi + `<br><a href="https://www.google.com/maps/place/` + data.latitude + `,` + data.longitude + `" target="_blank" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Lokasi Map">
                                    <i class="fa fa-location-dot"></i> Lokasi
                                </a>`
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.teknisi",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.uraian == '')
                        return `-`
                    return `<button class="btn btn-sm btn-danger" onclick="modal_uraian('` + data.uraian + `')"><i class="fa fa-file"></i> Uraian</button>`
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.time_in == '0000-00-00 00:00:00') {
                        return `<button class="btn btn-sm btn-primary" onclick="time_in('` + data.id + `')">TIME IN</button>&nbsp;<button class="btn btn-sm btn-danger" onclick="time_out('` + data.id + `')">TIME OUT</button>`
                    } else if (data.time_in != '0000-00-00 00:00:00' && data.time_out == '0000-00-00 00:00:00') {
                        return `<span class="badge bg-primary">` + data.time_in + `</span>&nbsp;<button class="btn btn-sm btn-danger" onclick="time_out('` + data.id + `')">TIME OUT</button>`
                    } else if (data.time_in != '0000-00-00 00:00:00' && data.time_out != '0000-00-00 00:00:00') {
                        return `<span class="badge bg-primary">` + data.time_in + `</span>&nbsp;<span class="badge bg-danger">` + data.time_out + `</span>`
                    }
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.status",
            }, {
                "target": [<?= $target ?>],
                "className": 'py-1',
                "data": "data",
                "render": function(data) {
                    if (data.status == 'SELESAI') {
                        return ``
                    } else if (data.jenis == 'SERVIS' || data.jenis == 'INSTAL') {
                        return `<div class="d-flex flex-column" style="row-gap: 10px;">
                                        <button type="button" class="btn btn-sm btn-secondary" onclick=tentukan_data(` + data.id + `) data-bs-toggle="tooltip" title="Ganti Teknisi">
                                            <i class="fa fa-file-lines"></i> Machine Record
                                        </button>
                                        <a href="<?= base_url('kerjaluar/formkirim?id=') ?>` + data.id + `" target="_blank" type="button" class="btn btn-sm btn-success" data-bs-toggle="tooltip" title="Cetak Form Kirim">
                                        <i class="fa fa-print"></i> Form Kirim
                                    </a>
                                        <button type="button" class="btn btn-sm btn-warning" onclick="ubah_status('` + data.id + `', '` + data.nomor_mesin + `','` + data.model + `')" data-bs-toggle="tooltip" title="Ubah Status Mesin">
                                        <i class="si si-refresh"></i> Ubah Status Mesin
                                    </button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="selesai_data('` + data.id + `', '` + data.nomor_mesin + `','` + data.model + `')" data-bs-toggle="tooltip" title="Selesai">
                                        <i class="fa fa-circle-check"></i> Selesai
                                    </button>
                                </div>
                                `
                    } else {
                        return `<button type="button" class="btn btn-sm btn-danger" onclick="selesai_data('` + data.id + `', '` + data.nomor_mesin + `','` + data.model + `')" data-bs-toggle="tooltip" title="Selesai">
                                    <i class="fa fa-circle-check"></i> Selesai
                                </button><br style="margin-bottom: 10px;">`
                    }
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        //   $('#tambah-user').hide();

    });

    function reload_table() {
        $('#table-kerja').DataTable().ajax.reload(null, false);
    }

    function time_in(id) {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Anda akan memulai proses pekerjaan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>kerjaluar/get_timein',
                    data: {
                        id: id,
                        table: "kerjaluar"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == "success") {
                            Swal.fire(
                                'Berhasil!',
                                'Time IN sudah di record!',
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

    function time_out(id) {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Anda akan mengakhiri proses pekerjaan hari ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>kerjaluar/get_timeout',
                    data: {
                        id: id,
                        table: "kerjaluar"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == "success") {
                            Swal.fire(
                                'Berhasil!',
                                'Time OUT sudah di record!',
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

    $("#form-data").submit(function(e) {
        e.preventDefault()
        //   loading_submit()

        if ($('#uraian').val() == '' || $('#meter').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'kerjaluar');
        form_data.append('id', $("#id").val());
        form_data.append('uraian', $("#uraian").val());
        form_data.append('meter', $("#meter").val());

        url_ajax = '<?= base_url() ?>kerjaluar/machine_record'

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

    $("#form-data-status").submit(function(e) {
        e.preventDefault()
        //   loading_submit()


        var form_data = new FormData();
        form_data.append('table', 'overhaul');
        form_data.append('nomor_mesin', $("#nomor_mesin_spk").val());
        form_data.append('status', $("#status").val());

        url_ajax = '<?= base_url() ?>kerjaluar/ubah_status'

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

    function tentukan_data(id) {
        console.log(id)
        $('#id').val(id)
        $('#exampleModalCenter').modal('show')

        $.ajax({
            url: '<?= base_url() ?>kerjaluar/get_machinerecord',
            data: {
                id: id,
                table: "kerjaluar"
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                result.forEach(d => {
                    $('#uraian').val(d.uraian)
                    $('#meter').val(d.meter)
                });
            }
        })
    }

    function selesai_data(id) {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Anda melaporkan bahwa proses pekerjaan telah selesai!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>kerjaluar/selesai_proses',
                    data: {
                        id: id,
                        table: "kerjaluar"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == "success") {
                            Swal.fire(
                                'Berhasil!',
                                'Pekerjaan sudah selesai!',
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

    function ubah_status(id, nomor_mesin, model) {
        console.log(nomor_mesin)
        console.log(model)
        $('#modal-status').modal('show')
        $('#id_spk').val(id)
        $('#nomor_mesin_spk').val(nomor_mesin)
        $('#model_spk').val(model)
    }

    function modal_uraian(uraian) {
        console.log(uraian)
        $('#modal-uraian').modal('show')
        var html = '<div class="row push"><div class="col-lg-12 col-xl-12"><div class="mb-4">' + uraian + '</div></div></div>'

        $('#body-modal3').html(html)
    }
</script>