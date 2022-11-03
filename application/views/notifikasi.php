<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Data Kontrak</h2>

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded" id="list-kontrak">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Notifikasi Kontrak
                </h3>
                <!-- <button type="button" class="btn btn-outline-primary min-width-125" id="btn-add">
                    <i class="fa fa-plus mr-5"></i> Register Kontrak
                </button> -->
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-responsive class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive" id="table-kontrak">
                    <!-- <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons"> -->
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Customer</th>
                            <th>Pesan</th>
                            <th>Dokumen</th>
                            <th>Date Created</th>
                            <th>Aksi</th>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Terms &amp; Conditions</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm" id="body-modal">
                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                </div>
                <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <!-- <button type="button" class="btn btn-alt-primary" data-bs-dismiss="modal">
                        Done
                    </button> -->
                </div>
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
        $("#table-kontrak").DataTable({
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
                'url': '<?= base_url() ?>kontrak/ajax_table_notifikasi_kontrak',
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
                "data": "data.pesan",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<button type="button" class="btn btn-sm btn-danger" onclick=show_data('` + data.dokumen + `')><i class="fa fa-file-pdf"></i> Lihat</button>`
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.date_created",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.status_read == 0)
                        return `<a href="<?= base_url('kontrak/notifikasidetails?id=') ?>` + data.id + `" type="button" class="btn btn-sm btn-danger"><i class="fa fa-envelope"></i> Baca</a>`
                    return `<a href="<?= base_url('kontrak/notifikasidetails?id=') ?>` + data.id + `" type="button" class="btn btn-sm btn-success"><i class="fa fa-envelope-open"></i> Baca</a>`
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        //   $('#tambah-user').hide();
    });

    $("#customer").select2({
        ajax: {
            url: '<?= base_url('kontrak/select2_group') ?>',
            dataType: 'json',
            data: function(params) {
                return {
                    q: params.term,
                    page: params.page
                }
            },
            processResults: function(data, params) {
                return {
                    results: data.items,
                    pagination: {
                        more: (data.count == 10)
                    },
                    cache: true
                };
            }
        },
        id: function(data) {
            return data.group_id
        },
        templateResult: function(data) {
            return $(` <div class='select2-result-repository clearfix'>
                ${data.nama}
                 </div>`)
        },
        templateSelection: function(data) {
            $(this).val(data.id)
            return data.nama || data.text
        },
        placeholder: "Pilih Customer",
        allowClear: true,
        width: "resolve"
    })

    function reload_table() {
        $('#table-kontrak').DataTable().ajax.reload(null, false);
    }

    function show_data(dokumen) {
        var html
        var nama
        $('#exampleModalCenter').modal('show')
        nama = '<h3 class="block-title">Dokumen Kontrak</h3>'
        html = '<embed type="application/pdf" src="<?= base_url() ?>assets/media/kontrak/' + dokumen + '" width="700" height="400"></embed>'
        $('#body-modal').html(html)
        $('.block-title').html(nama)
    }

    $("#form-data").submit(function(e) {
        e.preventDefault()
        //   loading_submit()

        if ($('#nomor_kontrak').val() == '' || $('#customer').val() == '' || $('#awal_kontrak').val() == '' || $('#akhir_kontrak').val() == '' || $('#reminder').val() == '' || $('#file').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'kontrak');
        form_data.append('nomor_kontrak', $("#nomor_kontrak").val());
        form_data.append('customer', $("#customer").val());
        form_data.append('awal_kontrak', $("#awal_kontrak").val());
        form_data.append('akhir_kontrak', $("#akhir_kontrak").val());
        form_data.append('reminder', $("#reminder").val());
        if ($('#file').val() !== "") {
            var file_data = $('#file').prop('files')[0];
            form_data.append('file', file_data);
        }

        var url_ajax = '<?= base_url() ?>kontrak/insert_data_kontrak'
        if (global_status == "edit") {
            url_ajax = '<?= base_url() ?>kontrak/update_data_kontrak'
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
                    $('#nomor_kontrak').val('')
                    $('#customer').val('')
                    $('#awal_kontrak').val('')
                    $('#akhir_kontrak').val('')
                    $('#reminder').val('')
                    $('#file').val('')
                    reload_table()
                    $('#add-new').hide();
                    $('#list-kontrak').show(500)
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
        $('#list-kontrak').hide();
        global_status = "tambah"
        $('#nomor_kontrak').val('')
        $('#customer').val('')
        $('#awal_kontrak').val('')
        $('#akhir_kontrak').val('')
        $('#reminder').val('')
        $('#file').val('')
    });

    $('#clear-form').on('click', function() {
        $('#nomor_kontrak').val('')
        $('#customer').val('')
        $('#awal_kontrak').val('')
        $('#akhir_kontrak').val('')
        $('#reminder').val('')
        $('#file').val('')
    });

    $('#btn-hide').on('click', function() {
        $('#list-kontrak').show(500);
        $('#add-new').hide();
    });

    $('#btn-edit').on('click', function() {
        $('#add-new').show(500);
        $('#list-kontrak').hide();
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
                    url: '<?= base_url() ?>kontrak/delete_data',
                    data: {
                        id: id,
                        table: "kontrak"
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
            url: '<?= base_url('kontrak/editkontrak') ?>',
            data: {
                id: id,
                table: 'kontrak'
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                result.forEach(d => {
                    $('#list-kontrak').hide();
                    $('#add-new').show(500);

                    $('#id').val(d.id)
                    $('#nomor_kontrak').val(d.nomor_kontrak)
                    $('#customer').val(d.customer)
                    $('#awal_kontrak').val(d.awal_kontrak)
                    $('#akhir_kontrak').val(d.akhir_kontrak)
                    $('#reminder').val(d.reminder)
                    $('#file').val(d.dokumen)
                });
            }
        })
    }
</script>