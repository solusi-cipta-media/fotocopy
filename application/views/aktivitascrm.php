<!-- Main Container -->
<style>
    .select2.select2-container.select2-container--default {
        width: 100% !important;
    }
</style>
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Customer Relation Management - CRM</h2>

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded" id="list-mesin">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Aktivitas CRM
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
                            <th>Customer</th>
                            <th>Contact Person</th>
                            <th>Handphone</th>
                            <!-- <th>Status</th> -->
                            <th style="width: 40%;">Uraian</th>
                            <th style="width: 15%;">Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="block block-rounded" id="add-new" style="display: none;">
            <div class="block-header block-header-default">
                <h3 class="block-title">Register Kasus</h3>
                <div class="block-options">
                    <button type="button" class="btn btn-outline-danger min-width-125" id="btn-hide"><i class="fa fa-minus-circle"></i> Sembunyikan</button>
                </div>
            </div>
            <div class="block-content">
                <form id="form-data">
                    <div class="row push">
                        <div class="col-lg-12 col-xl-12">

                            <div class="mb-4">
                                <label class="form-label" for="customer">Customer</label>
                                <input type="text" class="form-control" id="customer" name="customer" onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="pic_customer">Contact Person</label>
                                <input type="text" class="form-control" id="pic_customer" name="pic_customer" onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="no_hp">Handphone</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="awal_kontrak">Uraian</label>
                                <textarea name="uraian" id="uraian" cols="30" rows="5" class="form-control"></textarea>
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
        // $('#uraian').summernote({
        //     height: "300px",
        //     styleWithSpan: false
        // });

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
                'url': '<?= base_url() ?>crm/ajax_table_crm',
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
                    "data": "data.pic_customer",
                }, {
                    "target": [<?= $target ?>],
                    "className": 'text-center py-1',
                    "data": "data.no_hp",
                },
                // {
                //     "target": [<?= $target ?>],
                //     "className": 'text-center py-1',
                //     "data": "data",
                //     "render": function(data) {
                //         if (data.status == 'OPEN') {
                //             return `<span class="badge bg-warning">OPEN</span>`
                //         } else {
                //             return `<span class="badge bg-success">CLOSED</span>`
                //         }
                //     }
                // },
                {
                    "target": [<?= $target ?>],
                    "className": 'text-center py-1',
                    "data": "data.uraian",
                }, {
                    "target": [<?= $target ?>],
                    "className": 'py-1',
                    "data": "data",
                    "render": function(data) {
                        if (data.status == 'OPEN') {
                            return `<button type="button" class="btn btn-sm btn-danger" onclick=tutup_kasus(` + data.id + `) data-bs-toggle="tooltip" title="Update Status">
                                        <i class="fa fa-circle-check"></i> Tutup Kasus
                                    </button>`
                        } else {
                            return '<span class="badge bg-success">CLOSED</span>'
                        }
                    }
                },
            ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

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

    function tutup_kasus(id) {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Anda akan menutup kasus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>crm/approve_selesai',
                    data: {
                        id: id,
                        table: "crm"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == "success") {
                            Swal.fire(
                                'Berhasil!',
                                'Kasus ditutup.',
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

    function show_uraian(uraian) {
        $('#id').val(uraian)
        var html
        // var nama
        $('#exampleModalCenter').modal('show')
        // nama = '<h3 class="block-title">Bukti Ketidakhadiran - Agus Salim</h3>'
        html = '<div class="row push"><div class="col-lg-12 col-xl-12"><div class="mb-4">' + uraian + '</div></div></div>'
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
        form_data.append('table', 'crm');
        form_data.append('customer_all', $("#customer").val());
        form_data.append('uraian', $("#uraian").val());

        url_ajax = '<?= base_url() ?>crm/insert_kasus'

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