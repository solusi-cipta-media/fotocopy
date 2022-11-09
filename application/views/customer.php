<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Data Customer</h2>

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded" id="list-customer">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Master Customer
                </h3>
                <button type="button" class="btn btn-outline-primary min-width-125" id="btn-add">
                    <i class="fa fa-plus mr-5"></i> Register Customer
                </button>
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
                            <th>Alamat</th>
                            <th>Klasifikasi</th>
                            <th>Contact Person</th>
                            <th>HP Contact</th>
                            <th>Nomor Kantor</th>
                            <th>Lokasi</th>
                            <th class="text-center" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="block block-rounded" id="add-new" style="display: none;">
            <div class="block-header block-header-default">
                <h3 class="block-title">Register Customer</h3>
                <div class="block-options">
                    <button type="button" class="btn btn-outline-danger min-width-125" id="btn-hide"><i class="fa fa-minus-circle"></i> Sembunyikan</button>
                </div>
            </div>
            <div class="block-content">
                <form id="form-data">
                    <div class="row push">
                        <div class="col-lg-12 col-xl-12">
                            <div class="mb-4">
                                <label class="form-label" for="kode">Kode</label>
                                <input type="text" class="form-control" id="kode" name="kode" readonly>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="4"></textarea>
                            </div>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="longitude">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude">
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="latitude">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="klasifikasi">Klasifikasi</label>
                                <select class="form-select" id="klasifikasi" name="klasifikasi">
                                    <option value="RENTAL">RENTAL</option>
                                    <option value="KONTRAK">KONTRAK</option>
                                    <option value="BELI">BELI</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="contact_person">Contact Person</label>
                                <input type="text" class="form-control" id="contact_person" name="contact_person">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="hp_contact">HP Contact Person</label>
                                <input type="text" class="form-control" id="hp_contact" name="hp_contact">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="no_contact_kantor">Nomor Kantor</label>
                                <input type="text" class="form-control" id="no_contact_kantor" name="no_contact_kantor">
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
                'url': '<?= base_url() ?>customer/ajax_table_customer',
                'type': 'post',
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
                "data": "data.alamat",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.klasifikasi == 'RENTAL') {
                        return `<span class="badge bg-danger">` + data.klasifikasi + `</span>`
                    } else if (data.klasifikasi == 'KONTRAK') {
                        return `<span class="badge bg-warning">` + data.klasifikasi + `</span>`
                    } else {
                        return `<span class="badge bg-success">` + data.klasifikasi + `</span>`
                    }
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.contact_person",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.hp_contact",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no_contact_kantor",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<a href="https://www.google.com/maps/place/` + data.latitude + `,` + data.longitude + `" target="_blank" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Lokasi Map">
                                    <i class="fa fa-location-dot"></i> Lokasi
                                </a>`
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

    $('#btn-add').on('click', function() {
        $('#add-new').show(500);
        $('#list-customer').hide();
        global_status = "tambah"
        $('#nama').val('')
        $('#alamat').val('')
        $('#longitude').val('')
        $('#latitude').val('')
        $('#contact_person').val('')
        $('#hp_contact').val('')
        $('#no_contact_kantor').val('')
    });

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