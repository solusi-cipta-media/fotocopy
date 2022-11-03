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
        <div class="block block-rounded" id="list-karyawan">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    List SPK (Surat Perintah Kerja)
                </h3>
                <button type="button" class="btn btn-outline-primary min-width-125" onclick=register_data()>
                    <i class="fa fa-plus mr-5"></i> Register SPK
                </button>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-responsive class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive" id="table-spk">
                    <!-- <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons"> -->
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Customer</th>
                            <th>Jenis</th>
                            <th>Tgl Kerja</th>
                            <th class="text-center">Lokasi</th>
                            <th class="text-center">Teknisi</th>
                            <th class="text-center" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="block block-rounded" id="list-histori" style="display: none;">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Histori Kerja Teknisi
                </h3>
                <div class="block-options">
                    <button type="button" class="btn btn-outline-danger min-width-125" id="btn-hide-histori"><i class="fa fa-minus-circle"></i> Sembunyikan</button>
                </div>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-responsive class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive" id="table-histori">
                    <!-- <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons"> -->
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Customer</th>
                            <th>Jenis</th>
                            <th>Tgl Kerja</th>
                            <th class="text-center">Teknisi</th>
                            <th class="text-center">Aksi</th>
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

<!-- Normal Modal -->
<div class="modal" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Register Pekerjaan</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <form id="form-data-spk">
                    <div class="block-content fs-sm" id="body-modal">
                        <div class="row push">
                            <div class="col-lg-12 col-xl-12">
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Customer</label>
                                    <select name="customer" id="customer" class="form-control">
                                        <?php
                                        foreach ($customer as $key => $value) {
                                        ?>
                                            <option value="<?= $value['id'] ?>"><?= $value['kode'] . ' - ' . $value['nama'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="mb-4">
                                    <label class="form-label" for="tgl_kerja">Waktu Kerja</label>
                                    <input type="date" class="form-control" id="tgl_kerja" name="tgl_kerja">
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="mb-4">
                                    <label class="form-label" for="jenis">Jenis Pekerjaan</label>
                                    <select class="form-select" id="jenis" name="jenis">
                                        <option value="SERVIS">Servis</option>
                                        <option value="INSTAL">Instal</option>
                                        <option value="INVOICE">Invoice</option>
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
<!-- END Normal Modal -->
<script src="<?= base_url() ?>resources/select2/select2.min.js"></script>

<script>
    <?php $target = 0; ?>
    var a = '<?= $this->session->userdata('userid') ?>'
    $(function() {
        $("#table-spk").DataTable({
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
                'url': '<?= base_url() ?>kerjaluar/ajax_table_spk',
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
                "data": "data",
                "render": function(data) {
                    if (data.teknisi == '')
                        return `-`
                    return data.teknisi + `<br><button class="btn btn-sm btn-success" onclick="histori_teknisi('` + data.id_karyawan + `')"><i class="fa fa-circle-arrow-right"></i> Histori</button>`
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<button type="button" class="btn btn-sm btn-primary" onclick="tentukan_data(` + data.id + `)" data-bs-toggle="tooltip" title="Pilih Teknisi"><i class="fa fa-gear"></i> Pilih Teknisi</button>`
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        //   $('#tambah-user').hide();
        $('#teknisi').select2({
            dropdownParent: $('#exampleModalCenter')
        });
        $('#customer').select2({
            dropdownParent: $('#modal-register')
        });
    });

    function reload_table() {
        $('#table-spk').DataTable().ajax.reload(null, false);
    }

    $('#btn-hide-histori').on('click', function() {
        $('#list-karyawan').show(500);
        $('#list-histori').hide();
    });

    function register_data() {

        $('#modal-register').modal('show')

    }

    function tentukan_data(id) {
        $('#id').val(id)
        $('#exampleModalCenter').modal('show')
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
        form_data.append('table', 'kerjaluar');
        form_data.append('id', $("#id").val());
        form_data.append('teknisi_all', $("#teknisi").val());

        url_ajax = '<?= base_url() ?>kerjaluar/update_data_teknisi_langsung'

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

    $("#form-data-spk").submit(function(e) {
        e.preventDefault()
        //   loading_submit()

        if ($('#customer').val() == '' || $('#jenis').val() == '' || $('#tgl_kerja').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'kerjaluar');
        form_data.append('customer', $("#customer").val());
        form_data.append('tgl_kerja', $("#tgl_kerja").val());
        form_data.append('jenis', $("#jenis").val());

        url_ajax = '<?= base_url() ?>kerjaluar/register_spk'

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

    function histori_teknisi(id) {
        $('#list-karyawan').hide()
        $('#list-histori').show(500)

        console.log(id)

        $(function() {
            $("#table-histori").DataTable({
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
                    'url': '<?= base_url() ?>kerjaluar/ajax_table_histori',
                    'type': 'post',
                    'data': {
                        id_karyawan: id
                    }
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
                    "data": "data.teknisi",
                }, {
                    "target": [<?= $target ?>],
                    "className": 'text-center py-1',
                    "data": "data",
                    "render": function(data) {
                        return `<button type="button" class="btn btn-sm btn-success" onclick="tentukan_data(` + data.id + `)" data-bs-toggle="tooltip" title="Lihat Detail"><i class="fa fa-eye"></i> Details</button>`
                    }
                }, ],
                "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]



            });
        });
    }
</script>