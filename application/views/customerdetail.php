<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Data Customer</h2>

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded" id="list-customer">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <a href="<?= base_url('customer') ?>" class="btn btn-outline-danger min-width-125"><i class="fa fa-circle-left"></i> Kembali</a>
                </h3>

            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-responsive class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive" id="table-customer">
                    <!-- <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons"> -->
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>No. Mesin</th>
                            <th>Model</th>
                            <th style="width: 20%;">Uraian</th>
                            <th>Teknisi</th>
                            <th>Tgl Servis</th>
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

<script>
    <?php $target = 0; ?>
    var a = '<?= $this->session->userdata('userid') ?>'
    $(function() {
        $("#table-customer").DataTable({
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
                'url': '<?= base_url() ?>customer/ajax_table_customer_detail',
                'type': 'post',
                'data': {
                    kode: '<?= $_GET['kode'] ?>'
                },
            },
            'columns': [{
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.kode",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.nama",
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
                "data": "data.uraian",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.teknisi",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return data.tanggal_servis + `<br><a href="<?= base_url('kerjaluar/cetakmachinerecord?nomor=') ?>` + data.nomor_mesin + `" target="_blank" class="btn btn-sm btn-danger"><span>Machine Record <i class="fa fa-circle-right"></i></span></a>`
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        //ambil KODE barang
        getkodeklien()
    });

    function reload_table() {
        $('#table-customer').DataTable().ajax.reload(null, false);
    }

    $("#form-data").submit(function(e) {
        e.preventDefault()
        //   loading_submit()

        if ($('#nama').val() == '' || $('#alamat').val() == '' || $('#longitude').val() == '' || $('#latitude').val() == '' || $('#klasifikasi').val() == '' || $('#contact_person').val() == '' || $('#hp_contact').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'customer');
        form_data.append('kode', $("#kode").val());
        form_data.append('nama', $("#nama").val());
        form_data.append('alamat', $("#alamat").val());
        form_data.append('longitude', $("#longitude").val());
        form_data.append('latitude', $("#latitude").val());
        form_data.append('klasifikasi', $("#klasifikasi").val());
        form_data.append('contact_person', $("#contact_person").val());
        form_data.append('hp_contact', $("#hp_contact").val());
        form_data.append('no_contact_kantor', $("#no_contact_kantor").val());

        var url_ajax = '<?= base_url() ?>customer/insert_data_customer'
        if (global_status == "edit") {
            url_ajax = '<?= base_url() ?>customer/update_data_customer'
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
                    $('#alamat').val('')
                    $('#longitude').val('')
                    $('#latitude').val('')
                    $('#contact_person').val('')
                    $('#hp_contact').val('')
                    $('#no_contact_kantor').val('')
                    reload_table()
                    $('#add-new').hide();
                    $('#list-customer').show(500)
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

    $('#clear-form').on('click', function() {
        $('#nama').val('')
        $('#alamat').val('')
        $('#longitude').val('')
        $('#latitude').val('')
        $('#contact_person').val('')
        $('#hp_contact').val('')
        $('#no_contact_kantor').val('')
    });

    $('#btn-hide').on('click', function() {
        $('#list-customer').show(500);
        $('#add-new').hide();
    });

    $('#btn-edit').on('click', function() {
        $('#add-new').show(500);
        $('#list-customer').hide();
    });

    function getkodeklien() {
        $.ajax({
            url: '<?= base_url('customer/getkodeklien') ?>',
            dataType: 'json',
            success: function(result) {
                console.log(result)

                $('#kode').val(result)
                $('#kode').attr('readonly', true)
            }
        });
    }

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
                    url: '<?= base_url() ?>customer/delete_data',
                    data: {
                        id: id,
                        table: "customer"
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
            url: '<?= base_url('customer/editcustomer') ?>',
            data: {
                id: id,
                table: 'customer'
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                result.forEach(d => {
                    $('#list-customer').hide();
                    $('#add-new').show(500);

                    $('#id').val(d.id)
                    $('#nama').val(d.nama)
                    $('#alamat').val(d.alamat)
                    $('#longitude').val(d.longitude)
                    $('#latitude').val(d.latitude)
                    $('#contact_person').val(d.contact_person)
                    $('#hp_contact').val(d.hp_contact)
                    $('#no_contact_kantor').val(d.no_contact_kantor)
                    $('#klasifikasi').val(d.klasifikasi)
                });
            }
        })

    }
</script>