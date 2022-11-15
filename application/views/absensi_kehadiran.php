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
<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Bukti Absen <span id="type_absen"></span></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- <form id="form-data-teknisi"> -->
                <div class="block-content fs-sm" id="body-modal" style="padding: 2rem !important;text-align:center;">
                </div>
                <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <!-- <button type="submit" class="btn btn-alt-primary" data-bs-dismiss="modal">
                            Submit
                        </button> -->
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>
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
                    if (data.latitude_in != '' && data.longitude_in != '') {
                        return `
                            <div style="line-height:3rem;">
                                <a href="https://www.google.com/maps/place/` + data.latitude_in + `,` + data.longitude_in + `" target="_blank" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Lokasi IN">
                                    <small><i class="fa fa-location-dot"></i> Lokasi IN</small>
                                </a>
                            </div>
                            <div style="line-height:3rem;">
                                <button type="button" class="btn btn-sm btn-success" onclick=show_data('${data.image_in}','clock_in') data-bs-toggle="tooltip" title="Bukti">
                                    <small><i class="si si-picture"></i> Bukti</small>
                                </button>
                            </div>`
                    } else {
                        return ``
                    }

                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.latitude_out != '' && data.longitude_out != '') {
                        return `
                                <div style="line-height:3rem;">
                                    <a href="https://www.google.com/maps/place/` + data.latitude_out + `,` + data.longitude_out + `" target="_blank" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Lokasi OUT">
                                        <small style="font-size:11px;"> <i class="fa fa-location-dot"></i> Lokasi OUT </small>
                                    </a>
                                    </div>
                                <div style="line-height:3rem;">
                                    <button type="button" class="btn btn-sm btn-success" onclick=show_data('${data.image_out}','clock_out') data-bs-toggle="tooltip" title="Bukti">
                                        <small><i class="si si-picture"></i> Bukti</small>
                                    </button>
                                </div>   
                                `
                    } else {
                        return ``
                    }
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

    function show_data(img, type) {

        var ft = ''
        var render = ''
        var ft_url = ''
        if (img != '' && img != null && img != 'null' && img != undefined && img != 'undefined') {
            ft = img
            if (type == 'clock_in') {
                ft_url = 'clock_in/'
            } else {
                ft_url = 'clock_out/'
            }
        } else {
            ft = "image-not-found.png"
            ft_url = 'default/'
        }
        console.log(ft)
        $('#type_absen').html(`${(type == 'clock_in')?'Masuk':((type == 'clock_out')?'Pulang':'')}`)
        $('#exampleModalCenter').modal('show')
        html = `<img src="<?= base_url() ?>assets/media/${ft_url}${ft}" class="img-fluid" alt="bukti_leave">`
        $('#body-modal').html(html)
    }
</script>