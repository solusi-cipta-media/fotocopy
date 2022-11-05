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
        <div class="block block-rounded" id="list-meter">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Catatan Meter
                </h3>
                <button type="button" class="btn btn-outline-primary min-width-125" id="btn-add">
                    <i class="fa fa-plus mr-5"></i> Register Catatan Meter
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
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Tgl Instal</th>
                            <th>Model</th>
                            <th>Awal Meter</th>
                            <th>Akhir Meter</th>
                            <th class="text-center" style="width: 10%;">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="block block-rounded" id="add-new" style="display: none;">
            <div class="block-header block-header-default">
                <h3 class="block-title">Register Kontrak</h3>
                <div class="block-options">
                    <button type="button" class="btn btn-outline-danger min-width-125" id="btn-hide"><i class="fa fa-minus-circle"></i> Sembunyikan</button>
                </div>
            </div>
            <div class="block-content">
                <form id="form-data">
                    <div class="row push">
                        <div class="col-lg-12 col-xl-12">
                            <div class="mb-4">
                                <label class="form-label" for="customer_all">Customer</label>
                                <select name="customer_all" id="customer_all" class="form-control">
                                    <?php
                                    foreach ($customer as $key => $value) {
                                    ?>
                                        <option value="<?= $value['nama'] . '-' . $value['alamat'] . '-' . $value['klasifikasi'] . '-' . $value['hp_contact'] ?>"><?= $value['kode'] . '-' . $value['nama'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="tgl_instal">Tanggal Install</label>
                                <input type="date" class="form-control" id="tgl_instal" name="tgl_instal">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="model">Model</label>
                                <input type="text" class="form-control" id="model" name="model" onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="nomor_kontrak">Nomor Kontrak</label>
                                <input type="text" class="form-control" id="nomor_kontrak" name="nomor_kontrak" onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="awal">Awal Meter</label>
                                <input type="date" class="form-control" id="awal" name="awal">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="akhir">Akhir Meter</label>
                                <input type="date" class="form-control" id="akhir" name="akhir">
                            </div>

                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary"><i class="si si-cloud-upload"></i> Simpan</button>
                                <button type="button" class="btn btn-alt-danger" id="clear-form"><i class="si si-close"></i> Clear</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Dynamic Table Responsive -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
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
                'url': '<?= base_url() ?>kerjaluar/ajax_table_catatanmeter',
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
                "data": "data.alamat",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.status",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.tgl_instal",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.model",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.awal",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.akhir",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<button type="button" class="btn btn-sm btn-danger" onclick="hapus(` + data.id + `)" data-bs-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i> Hapus</button><br style="margin-bottom: 10px;"><a href="<?= base_url('kerjaluar/cetakmeter?id=') ?>` + data.id + `" target="_blank" type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Cetak"><i class="fa fa-print"></i> Cetak</a>`
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        //   $('#tambah-user').hide();
        $('#customer').select2({
            // dropdownParent: $('#exampleModalCenter')
        });
    });

    function reload_table() {
        $('#table-spk').DataTable().ajax.reload(null, false);
    }
    $('#btn-add').on('click', function() {
        $('#add-new').show(500);
        $('#list-meter').hide();
        $('#customer').val('')
        $('#tgl_instal').val('')
        $('#model').val('')
        $('#nomor_kontrak').val('')
        $('#awal').val('')
        $('#akhir').val('')
    });

    $('#clear-form').on('click', function() {
        $('#customer').val('')
        $('#tgl_instal').val('')
        $('#model').val('')
        $('#nomor_kontrak').val('')
        $('#awal').val('')
        $('#akhir').val('')
    });

    $('#btn-hide').on('click', function() {
        $('#list-meter').show(500);
        $('#add-new').hide();
    });

    function hapus(id) {

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
                    url: '<?= base_url() ?>kerjaluar/delete_data',
                    data: {
                        id: id,
                        table: "catatan_meter"
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

    $("#form-data").submit(function(e) {
        e.preventDefault()
        //   loading_submit()

        if ($('#tgl_instal').val() == '' || $('#model').val() == '' || $('#nomor_kontrak').val() == '' || $('#awal_meter').val() == '' || $('#akhir_meter').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'catatan_meter');
        form_data.append('customer_all', $("#customer_all").val());
        form_data.append('tgl_instal', $("#tgl_instal").val());
        form_data.append('model', $("#model").val());
        form_data.append('nomor_kontrak', $("#nomor_kontrak").val());
        form_data.append('awal', $("#awal").val());
        form_data.append('akhir', $("#akhir").val());

        url_ajax = '<?= base_url() ?>kerjaluar/input_catatan_meter'

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
                    $('#list-meter').show(500);
                    $('#add-new').hide();
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