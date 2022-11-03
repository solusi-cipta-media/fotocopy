<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Overhaul</h2>

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded" id="list-karyawan">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Riwayat Aktivitas Mesin
                </h3>
                <!-- <button type="button" class="btn btn-outline-primary min-width-125" id="btn-add">
                    <i class="fa fa-plus mr-5"></i> Register Customer
                </button> -->
            </div>
            <div class="block-content block-content-full">
                <div class="row push">
                    <div class="col-lg-12 col-xl-12">
                        <div class="mb-4">
                            <form id="form-data">
                                <label class="form-label" for="qrcode">Scan <strong>QR CODE</strong> atau input <strong>SERIAL NUMBER</strong> mesin</label>
                                <input type="text" class="form-control" id="qrcode" name="qrcode" autofocus>

                                <button type="submit" class="btn btn-alt-primary" style="display: none;"><i class="si si-cloud-upload"></i> Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- DataTables functionality is initialized with .js-dataTable-responsive class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive" id="table-overhaul">
                    <!-- <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons"> -->
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Serial Number</th>
                            <th>Aktivitas</th>
                            <th>Awal Overhaul</th>
                            <th>Akhir Overhaul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <!-- <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="fw-semibold">663451</td>
                            <td><span class="badge bg-success">Overhaul</span></td>
                            <td>22-Oct-2022</td>
                            <td>22-Oct-2022</td>
                            <td>detail</td>
                        </tr>
                    </tbody> -->
                </table>
            </div>
        </div>

        <!-- Dynamic Table Responsive -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<script>
    $("#form-data").submit(function(e) {
        e.preventDefault()



        <?php $target = 0; ?>
        $("#table-overhaul").DataTable({
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
                'url': '<?= base_url() ?>overhaul/ajax_table_qrdata',
                'type': 'post',
                'data': {
                    serial_number: $('#qrcode').val()
                }
            },
            'columns': [{
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no",
            }, {
                "target": [<?= $target++ ?>],
                "className": 'text-center py-1',
                "data": "data.serial_number",
            }, {
                "target": [<?= $target++ ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<span class="badge bg-primary">Overhaul</span>`
                }
            }, {
                "target": [<?= $target++ ?>],
                "className": 'text-center py-1',
                "data": "data.start_oh",
            }, {
                "target": [<?= $target++ ?>],
                "className": 'text-center py-1',
                "data": "data.finish_oh",
            }, {
                "target": [<?= $target++ ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<a href="<?= base_url('overhaul/prosesohdetail?id=') ?>` + data.id + `&status=qr" type="button" class="btn btn-sm btn-success" onclick="details(` + data.id + `)" data-bs-toggle="tooltip" title="Details"><i class="fa fa-eye"></i> Lihat Detail</a>`
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        $('#qrcode').val('')
    });
</script>