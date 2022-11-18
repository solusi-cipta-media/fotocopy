<!-- Main Container -->
<style>
    .select2.select2-container.select2-container--default {
        width: 100% !important;
    }
</style>
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Daily Report</h2>

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded" id="list-mesin">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Laporan Aktivitas Karyawan
                </h3>
                <button type="button" class="btn btn-outline-primary min-width-125" id="btn-add">
                    <i class="fa fa-plus mr-5"></i> Register Kasus
                </button>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-responsive class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive" id="table-mesin">
                    <!-- <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons"> -->
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th style="width: 60%;">Uraian</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="text" class="form-control search-cepat" id="search_nama" name="search_nama" placeholder="search"></td>
                            <td><input type="text" class="form-control search-cepat" id="search_tanggal" name="search_tanggal" placeholder="search"></td>
                            <td><input type="text" class="form-control search-cepat" id="search_aktivitas" name="search_aktivitas" placeholder="search"></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="block block-rounded" id="add-new" style="display: none;">
            <div class="block-header block-header-default">
                <h3 class="block-title">Register Aktivitas</h3>
                <div class="block-options">
                    <button type="button" class="btn btn-outline-danger min-width-125" id="btn-hide"><i class="fa fa-minus-circle"></i> Sembunyikan</button>
                </div>
            </div>
            <div class="block-content">
                <form id="form-data">
                    <div class="row push">
                        <div class="col-lg-12 col-xl-12">

                            <div class="mb-4">
                                <label class="form-label" for="karyawan">Karyawan</label>
                                <select name="karyawan" id="karyawan" class="form-control">
                                    <?php
                                    foreach ($karyawan as $key => $value) {
                                    ?>
                                        <option value="<?= $value['nama'] . ' - ' . $value['nik'] ?>"><?= $value['nik'] . ' - ' . $value['nama'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <!-- <input type="text" class="form-control" id="customer" name="customer"> -->
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="uraian">Uraian</label>
                                <textarea name="uraian" id="uraian" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary"><i class="si si-cloud-upload"></i> Simpan</button>
                                <!-- <button type="button" class="btn btn-alt-danger" id="clear-form"><i class="si si-close"></i> Clear</button> -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<!-- Normal Modal -->
<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Uraian</h3>
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
        $('#uraian').summernote({
            height: "300px",
            styleWithSpan: false
        });

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
                'url': '<?= base_url() ?>crm/ajax_table_report',
                'type': 'post',
                'data': {
                    search_nama: function() {
                        return $('#search_nama').val()
                    },
                    search_tanggal: function() {
                        return $('#search_tanggal').val()
                    },

                    search_aktivitas: function() {
                        return $('#search_aktivitas').val()
                    },
                }
            },
            'columns': [{
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.nama_karyawan",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.tanggal",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.aktivitas",
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        $('.search-cepat').keyup(function() {
            // console.log('OK')
            reload_table()
        })

        //   $('#tambah-user').hide();
        $('#customer').select2({
            // dropdownParent: $('#exampleModalCenter')
        });
    });

    function reload_table() {
        $('#table-mesin').DataTable().ajax.reload(null, false);
    }

    $('#btn-add').on('click', function() {
        $('#add-new').show(500);
        $('#list-mesin').hide();
        $('#uraian').val('')
    });

    $('#btn-hide').on('click', function() {
        $('#list-mesin').show(500);
        $('#add-new').hide();
        $('#uraian').val('')
    });


    function show_uraian(aktivitas) {
        $('#id').val(aktivitas)
        var html
        // var nama
        $('#exampleModalCenter').modal('show')
        // nama = '<h3 class="block-title">Bukti Ketidakhadiran - Agus Salim</h3>'
        html = '<div class="row push"><div class="col-lg-12 col-xl-12"><div class="mb-4">' + aktivitas + '</div></div></div>'
        $('#body-modal').html(html)
        // $('.block-title').html(nama)
    }

    $("#form-data").submit(function(e) {
        e.preventDefault()
        //   loading_submit()

        if ($('#uraian').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'daily_report');
        form_data.append('karyawan_all', $("#karyawan").val());
        form_data.append('tanggal', $("#tanggal").val());
        form_data.append('aktivitas', $("#uraian").val());

        url_ajax = '<?= base_url() ?>crm/insert_aktivitas'

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
</script>