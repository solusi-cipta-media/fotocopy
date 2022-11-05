<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Data Absensi</h2>

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded" id="list-karyawan">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Report Absensi Harian
                </h3>
                <!-- <button type="button" class="btn btn-outline-primary min-width-125" id="btn-add">
                    <i class="fa fa-plus mr-5"></i> Register Kontrak
                </button> -->
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-responsive class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive" id="table-absensi">
                    <!-- <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons"> -->
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nama</th>
                            <th>Nomor Induk Karyawan</th>
                            <th>Tanggal</th>
                            <th>Clock IN</th>
                            <th>Clock OUT</th>
                            <th style="width: 10%;">Lokasi IN</th>
                            <th style="width: 10%;">Lokasi OUT</th>
                            <th>Terlambat</th>
                            <th>Pulang Cepat</th>
                            <th>Working Hours</th>
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
    $(function() {
        $("#table-absensi").DataTable({
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
                'url': '<?= base_url() ?>absensi/ajax_table_absensi',
                'type': 'post',
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
                "data": "data.nomor_induk",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.tanggal",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.clock_in",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.clock_out",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<a href="https://www.google.com/maps/place/` + data.latitude_in + `,` + data.longitude_in + `" target="_blank" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Lokasi IN">
                                    <i class="fa fa-location-dot"></i> Lokasi IN
                                </a>`
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<a href="https://www.google.com/maps/place/` + data.latitude_out + `,` + data.longitude_out + `" target="_blank" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Lokasi OUT">
                                    <i class="fa fa-location-dot"></i> Lokasi OUT
                                </a>`
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.terlambat",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.pulang_cepat",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.working_hours",
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        //   $('#tambah-user').hide();
    });
</script>