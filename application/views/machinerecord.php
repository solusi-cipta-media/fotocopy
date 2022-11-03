<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Kerja Luar</h2>

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded" id="list-mesin">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Machine Record
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
                            <th>Nomor Mesin</th>
                            <th>Serial Number</th>
                            <th>Meter</th>
                            <th>Uraian</th>
                            <th>Teknisi</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="text" class="form-control search-cepat" id="search_nomor" name="search_nomor" placeholder="search"></td>
                            <td><input type="text" class="form-control search-cepat" id="search_serial" name="search_serial" placeholder="search"></td>
                            <td><input type="text" class="form-control search-cepat" id="search_meter" name="search_meter" placeholder="search"></td>
                            <td><input type="text" class="form-control search-cepat" id="search_uraian" name="search_uraian" placeholder="search"></td>
                            <td><input type="text" class="form-control search-cepat" id="search_teknisi" name="search_teknisi" placeholder="search"></td>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<script>
    <?php $target = 0; ?>

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
                'url': '<?= base_url() ?>kerjaluar/ajax_table_machinerecord',
                'type': 'post',
                'data': {
                    search_nomor: function() {
                        return $('#search_nomor').val()
                    },
                    search_serial: function() {
                        return $('#search_serial').val()
                    },
                    search_meter: function() {
                        return $('#search_meter').val()
                    },
                    search_uraian: function() {
                        return $('#search_uraian').val()
                    },
                    search_teknisi: function() {
                        return $('#search_teknisi').val()
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
                "data": "data.nomor_mesin",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.serial_number",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.meter",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.uraian",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.teknisi",
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        $('.search-cepat').keyup(function() {
            console.log('OK')
            reload_table()
        })

    });

    function reload_table() {
        $('#table-kerja').DataTable().ajax.reload(null, false);
    }
</script>