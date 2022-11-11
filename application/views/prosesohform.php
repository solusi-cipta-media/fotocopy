<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Overhaul</h2>



        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Form Finishing Mesin Fotocopy</h3>
                <div class="block-options">
                    <a href="<?= base_url('overhaul/prosesoh') ?>" type="button" class="btn btn-outline-danger min-width-125"><i class="fa fa-minus-circle"></i> Sembunyikan</a>
                </div>
            </div>
            <div class="block-content">
                <!-- Form Horizontal - Default Style -->
                <form class="mb-5" id="form-data">
                    <div class="row mb-4" style="border-bottom: solid 1px #DCDCDC;">
                        <label class="col-sm-4 col-form-label" for="example-hf-email">NAMA</label>
                        <label class="col-sm-2 col-form-label" for="example-hf-email">CHECK AWAL</label>
                        <label class="col-sm-2 col-form-label" for="example-hf-email">FINISHING</label>
                        <label class="col-sm-4 col-form-label" for="example-hf-email">PENGGANTIAN BARANG</label>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="caver_body_awal">Caver Body</label>
                        <input type="hidden" name="id_overhaul" id="id_overhaul">
                        <input type="hidden" name="nomor_mesin" id="nomor_mesin">
                        <input type="hidden" name="serial_number" id="serial_number">
                        <input type="hidden" name="tipe" id="tipe" value="tambah">
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="caver_body_awal" name="caver_body_awal" readonly>

                        </div>
                        <div class="col-sm-2">
                            <select name="caver_body_akhir" id="caver_body_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="caver_body_ganti" name="caver_body_ganti">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="dadf_awal">DADF</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="dadf_awal" name="dadf_awal" readonly>
                        </div>
                        <div class="col-sm-2">
                            <select name="dadf_akhir" id="dadf_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="dadf_ganti" name="dadf_ganti">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="kaca_platen_awal">Kaca Platen</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="kaca_platen_awal" name="kaca_platen_awal" readonly>
                        </div>
                        <div class="col-sm-2">
                            <select name="kaca_platen_akhir" id="kaca_platen_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="kaca_platen_ganti" name="kaca_platen_ganti">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="tombol_panel_awal">Tombol Panel</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="tombol_panel_awal" name="tombol_panel_awal" readonly>

                        </div>
                        <div class="col-sm-2">
                            <select name="tombol_planel_akhir" id="tombol_planel_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="tombol_planel_ganti" name="tombol_planel_ganti">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="paper_supply_awal">Paper Supply (Tray 1sd 4)</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="paper_supply_awal" name="paper_supply_awal" readonly>

                        </div>
                        <div class="col-sm-2">
                            <select name="paper_supply_akhir" id="paper_supply_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="paper_supply_ganti" name="paper_supply_ganti">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="drum_catridge_awal">Drum Catridge</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="drum_catridge_awal" name="drum_catridge_awal" readonly>

                        </div>
                        <div class="col-sm-2">
                            <select name="drum_catridge_akhir" id="drum_catridge_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="drum_catridge_ganti" name="drum_catridge_ganti">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="toner_catridge_awal">Toner Catridge</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="toner_catridge_awal" name="toner_catridge_awal" readonly>

                        </div>
                        <div class="col-sm-2">
                            <select name="toner_catridge_akhir" id="toner_catridge_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="toner_catridge_ganti" name="toner_catridge_ganti">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="drum_opc_awal">Drum OPC</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="drum_opc_awal" name="drum_opc_awal" readonly>

                        </div>
                        <div class="col-sm-2">
                            <select name="drum_opc_akhir" id="drum_opc_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="drum_opc_ganti" name="drum_opc_ganti">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="chip_drum_awal">Chip Drum</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="chip_drum_awal" name="chip_drum_awal" readonly>
                        </div>
                        <div class="col-sm-2">
                            <select name="chip_drum_akhir" id="chip_drum_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="chip_drum_ganti" name="chip_drum_ganti">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="chip_toner_awal">Chip Toner</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="chip_toner_awal" name="chip_toner_awal" readonly>
                        </div>
                        <div class="col-sm-2">
                            <select name="chip_toner_akhir" id="chip_toner_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="chip_toner_ganti" name="chip_toner_ganti">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="pemanas_awal">Pemanas</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="pemanas_awal" name="pemanas_awal" readonly>
                        </div>
                        <div class="col-sm-2">
                            <select name="pemanas_akhir" id="pemanas_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="pemanas_ganti" name="pemanas_ganti">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="print_awal">Print</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="print_awal" name="print_awal" readonly>

                        </div>
                        <div class="col-sm-2">
                            <select name="print_akhir" id="print_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="print_ganti" name="print_ganti">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="fax_awal">Fax</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="fax_awal" name="fax_awal" readonly>
                        </div>
                        <div class="col-sm-2">
                            <select name="fax_akhir" id="fax_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="fax_ganti" name="fax_ganti">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="scan_awal">Scan</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="scan_awal" name="scan_awal" readonly>
                        </div>
                        <div class="col-sm-2">
                            <select name="scan_akhir" id="scan_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="scan_ganti" name="scan_ganti">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="oct_awal">OCT</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="oct_awal" name="oct_awal" readonly>

                        </div>
                        <div class="col-sm-2">
                            <select name="oct_akhir" id="oct_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="oct_ganti" name="oct_ganti">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="bypass_tray_awal">Bypass Tray</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="bypass_tray_awal" name="bypass_tray_awal" readonly>

                        </div>
                        <div class="col-sm-2">
                            <select name="bypass_tray_akhir" id="bypass_tray_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="bypass_tray_ganti" name="bypass_tray_ganti">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="caver_ae_awal">Caver A sd E</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="caver_ae_awal" name="caver_ae_awal" readonly>
                        </div>
                        <div class="col-sm-2">
                            <select name="caver_ae_akhir" id="caver_ae_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                                <option value="Repair">Repair</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="caver_ae_ganti" name="caver_ae_ganti">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-12 ms-auto" style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Dynamic Table Responsive -->

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded" id="list-karyawan">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Tambahan Items
                </h3>
                <button type="button" class="btn btn-outline-primary min-width-125" onclick="ganti_data()">
                    <i class="fa fa-plus mr-5"></i> Tambah Items
                </button>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-responsive class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive" id="table-add-item">
                    <!-- <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons"> -->
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nama</th>
                            <th>Check Awal</th>
                            <th>Finishing</th>
                            <th>Penggantian Barang</th>
                            <th class="text-center" style="width: 15%;">Aksi</th>
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
                    <h3 class="block-title">Tambah Items</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <form id="form-data-add">
                    <div class="block-content fs-sm" id="body-modal">
                        <div class="row push">
                            <div class="col-lg-3 col-xl-3">
                                <div class="mb-4">
                                    <label class="form-label" for="komponen_check">Nama</label>
                                    <input type="text" class="form-control" id="komponen_check" name="komponen_check">
                                    <input type="hidden" class="form-control" id="id_overhaul_add" name="id_overhaul_add">
                                    <input type="hidden" class="form-control" id="nomor_mesin_add" name="nomor_mesin_add">
                                    <input type="hidden" class="form-control" id="serial_number_add" name="serial_number_add">
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-3">
                                <div class="mb-4">
                                    <label class="form-label" for="check_awal">Check Awal</label>
                                    <input type="text" class="form-control" id="check_awal" name="check_awal">
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-3">
                                <div class="mb-4">
                                    <label class="form-label" for="finishing">Finishing</label>
                                    <input type="text" class="form-control" id="finishing" name="finishing">
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-3">
                                <div class="mb-4">
                                    <label class="form-label" for="penggantian_barang">Ganti Barang</label>
                                    <input type="text" class="form-control" id="penggantian_barang" name="penggantian_barang">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-alt-primary">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Normal Modal -->

<script>
    <?php $target = 0; ?>
    $(function() {
        $("#table-add-item").DataTable({
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
                'url': '<?= base_url() ?>overhaul/ajax_table_list_add_item',
                'type': 'post',
                'data': {
                    id_overhaul: '<?= $_GET["id"] ?>'
                }
            },
            'columns': [{
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no",
            }, {
                "target": [<?= $target++ ?>],
                "className": 'text-center py-1',
                "data": "data.komponen_check",
            }, {
                "target": [<?= $target++ ?>],
                "className": 'text-center py-1',
                "data": "data.check_awal",
            }, {
                "target": [<?= $target++ ?>],
                "className": 'text-center py-1',
                "data": "data.finishing",
            }, {
                "target": [<?= $target++ ?>],
                "className": 'text-center py-1',
                "data": "data.penggantian_barang",
            }, {
                "target": [<?= $target++ ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<button type="button" class="btn btn-sm btn-danger" onclick="delete_data(` + data.id + `)" data-bs-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i> Hapus</button>`
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });




        url_ajax = '<?= base_url() ?>overhaul/getidmesin'
        $.ajax({
            url: url_ajax,
            type: "post",
            data: {
                id: '<?= $_GET["id"] ?>',
                table: 'overhaul'
            },
            dataType: "json",
            success: function(result) {
                result.forEach(d => {
                    $('#id_overhaul').val(d.id)
                    $('#id_overhaul_add').val(d.id)
                    $('#nomor_mesin').val(d.nomor_mesin)
                    $('#nomor_mesin_add').val(d.nomor_mesin)
                    $('#serial_number').val(d.serial_number)
                    $('#serial_number_add').val(d.serial_number)
                });
            },
            error: function(err) {
                Swal.fire(
                    'error!',
                    err.responseText,
                    'error'
                )
            }
        })

        //cek dulu apakah sudah ada data di tabel dengan ID Mesin ini
        url_ajax = '<?= base_url() ?>overhaul/getitemdata'
        $.ajax({
            url: url_ajax,
            type: "post",
            data: {
                id_overhaul: '<?= $_GET["id"] ?>',
                table: 'overhaul_record'
            },
            dataType: "json",
            success: function(result) {
                if (result != '')
                    $('#tipe').val('update')
                result.forEach(d => {
                    $('#caver_body_awal').val(d.caver_body_awal)
                    $('#caver_body_akhir').val(d.caver_body_akhir)
                    $('#caver_body_ganti').val(d.caver_body_ganti)
                    $('#dadf_awal').val(d.dadf_awal)
                    $('#dadf_akhir').val(d.dadf_akhir)
                    $('#dadf_ganti').val(d.dadf_ganti)
                    $('#kaca_platen_awal').val(d.kaca_platen_awal)
                    $('#kaca_platen_akhir').val(d.kaca_platen_akhir)
                    $('#kaca_platen_ganti').val(d.kaca_platen_ganti)
                    $('#tombol_panel_awal').val(d.tombol_panel_awal)
                    $('#tombol_planel_akhir').val(d.tombol_planel_akhir)
                    $('#tombol_planel_ganti').val(d.tombol_planel_ganti)
                    $('#paper_supply_awal').val(d.paper_supply_awal)
                    $('#paper_supply_akhir').val(d.paper_supply_akhir)
                    $('#paper_supply_ganti').val(d.paper_supply_ganti)
                    $('#drum_catridge_awal').val(d.drum_catridge_awal)
                    $('#drum_catridge_akhir').val(d.drum_catridge_akhir)
                    $('#drum_catridge_ganti').val(d.drum_catridge_ganti)
                    $('#toner_catridge_awal').val(d.toner_catridge_awal)
                    $('#toner_catridge_akhir').val(d.toner_catridge_akhir)
                    $('#toner_catridge_ganti').val(d.toner_catridge_ganti)
                    $('#drum_opc_awal').val(d.drum_opc_awal)
                    $('#drum_opc_akhir').val(d.drum_opc_akhir)
                    $('#drum_opc_ganti').val(d.drum_opc_ganti)
                    $('#chip_drum_awal').val(d.chip_drum_awal)
                    $('#chip_drum_akhir').val(d.chip_drum_akhir)
                    $('#chip_drum_ganti').val(d.chip_drum_ganti)
                    $('#chip_toner_awal').val(d.chip_toner_awal)
                    $('#chip_toner_akhir').val(d.chip_toner_akhir)
                    $('#chip_toner_ganti').val(d.chip_toner_ganti)
                    $('#pemanas_awal').val(d.pemanas_awal)
                    $('#pemanas_akhir').val(d.pemanas_akhir)
                    $('#pemanas_ganti').val(d.pemanas_ganti)
                    $('#print_awal').val(d.print_awal)
                    $('#print_akhir').val(d.print_akhir)
                    $('#print_ganti').val(d.print_ganti)
                    $('#fax_awal').val(d.fax_awal)
                    $('#fax_akhir').val(d.fax_akhir)
                    $('#fax_ganti').val(d.fax_ganti)
                    $('#scan_awal').val(d.scan_awal)
                    $('#scan_akhir').val(d.scan_akhir)
                    $('#scan_ganti').val(d.scan_ganti)
                    $('#oct_awal').val(d.oct_awal)
                    $('#oct_akhir').val(d.oct_akhir)
                    $('#oct_ganti').val(d.oct_ganti)
                    $('#bypass_tray_awal').val(d.bypass_tray_awal)
                    $('#bypass_tray_akhir').val(d.bypass_tray_akhir)
                    $('#bypass_tray_ganti').val(d.bypass_tray_ganti)
                    $('#caver_ae_awal').val(d.caver_ae_awal)
                    $('#caver_ae_akhir').val(d.caver_ae_akhir)
                    $('#caver_ae_ganti').val(d.caver_ae_ganti)
                });
            }
        })
    });

    function reload_table() {
        $('#table-add-item').DataTable().ajax.reload(null, false);
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
                    url: '<?= base_url() ?>overhaul/delete_data',
                    data: {
                        id: id,
                        table: "overhaul_record2"
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

    function ganti_data() {
        // var html
        // var nama
        $('#exampleModalCenter').modal('show')
        // nama = '<h3 class="block-title">Bukti Ketidakhadiran - Agus Salim</h3>'
        // html = '<img src="<?= base_url('assets/media/leave/agus.jpg') ?>" class="img-fluid" alt="bukti_leave">'
        // $('#body-modal').html(html)
        // $('.block-title').html(nama)
    }

    $("#form-data").submit(function(e) {
        e.preventDefault()
        //   loading_submit()


        var form_data = new FormData();
        form_data.append('table', 'overhaul_record');
        form_data.append('id_overhaul', $("#id_overhaul").val());
        form_data.append('nomor_mesin', $("#nomor_mesin").val());
        form_data.append('serial_number', $("#serial_number").val());

        form_data.append('caver_body_awal', $("#caver_body_awal").val());
        form_data.append('caver_body_akhir', $("#caver_body_akhir").val());
        form_data.append('caver_body_ganti', $("#caver_body_ganti").val());
        form_data.append('dadf_awal', $("#dadf_awal").val());
        form_data.append('dadf_akhir', $("#dadf_akhir").val());
        form_data.append('dadf_ganti', $("#dadf_ganti").val());
        form_data.append('kaca_platen_awal', $("#kaca_platen_awal").val());
        form_data.append('kaca_platen_akhir', $("#kaca_platen_akhir").val());
        form_data.append('kaca_platen_ganti', $("#kaca_platen_ganti").val());
        form_data.append('tombol_panel_awal', $("#tombol_panel_awal").val());
        form_data.append('tombol_planel_akhir', $("#tombol_planel_akhir").val());
        form_data.append('tombol_planel_ganti', $("#tombol_planel_ganti").val());
        form_data.append('paper_supply_awal', $("#paper_supply_awal").val());
        form_data.append('paper_supply_akhir', $("#paper_supply_akhir").val());
        form_data.append('paper_supply_ganti', $("#paper_supply_ganti").val());
        form_data.append('drum_catridge_awal', $("#drum_catridge_awal").val());
        form_data.append('drum_catridge_akhir', $("#drum_catridge_akhir").val());
        form_data.append('drum_catridge_ganti', $("#drum_catridge_ganti").val());
        form_data.append('toner_catridge_awal', $("#toner_catridge_awal").val());
        form_data.append('toner_catridge_akhir', $("#toner_catridge_akhir").val());
        form_data.append('toner_catridge_ganti', $("#toner_catridge_ganti").val());
        form_data.append('drum_opc_awal', $("#drum_opc_awal").val());
        form_data.append('drum_opc_akhir', $("#drum_opc_akhir").val());
        form_data.append('drum_opc_ganti', $("#drum_opc_ganti").val());
        form_data.append('chip_drum_awal', $("#chip_drum_awal").val());
        form_data.append('chip_drum_akhir', $("#chip_drum_akhir").val());
        form_data.append('chip_drum_ganti', $("#chip_drum_ganti").val());
        form_data.append('chip_toner_awal', $("#chip_toner_awal").val());
        form_data.append('chip_toner_akhir', $("#chip_toner_akhir").val());
        form_data.append('chip_toner_ganti', $("#chip_toner_ganti").val());
        form_data.append('pemanas_awal', $("#pemanas_awal").val());
        form_data.append('pemanas_akhir', $("#pemanas_akhir").val());
        form_data.append('pemanas_ganti', $("#pemanas_ganti").val());
        form_data.append('print_awal', $("#print_awal").val());
        form_data.append('print_akhir', $("#print_akhir").val());
        form_data.append('print_ganti', $("#print_ganti").val());
        form_data.append('fax_awal', $("#fax_awal").val());
        form_data.append('fax_akhir', $("#fax_akhir").val());
        form_data.append('fax_ganti', $("#fax_ganti").val());
        form_data.append('scan_awal', $("#scan_awal").val());
        form_data.append('scan_akhir', $("#scan_akhir").val());
        form_data.append('scan_ganti', $("#scan_ganti").val());
        form_data.append('oct_awal', $("#oct_awal").val());
        form_data.append('oct_akhir', $("#oct_akhir").val());
        form_data.append('oct_ganti', $("#oct_ganti").val());
        form_data.append('bypass_tray_awal', $("#bypass_tray_awal").val());
        form_data.append('bypass_tray_akhir', $("#bypass_tray_akhir").val());
        form_data.append('bypass_tray_ganti', $("#bypass_tray_ganti").val());
        form_data.append('caver_ae_awal', $("#caver_ae_awal").val());
        form_data.append('caver_ae_akhir', $("#caver_ae_akhir").val());
        form_data.append('caver_ae_ganti', $("#caver_ae_ganti").val());

        if ($('#tipe').val() == 'tambah') {
            url_ajax = '<?= base_url() ?>overhaul/tambah_item_overhaul'
        } else {
            url_ajax = '<?= base_url() ?>overhaul/update_item_overhaul'
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

    $("#form-data-add").submit(function(e) {
        e.preventDefault()
        //   loading_submit()

        if ($('#komponen_check').val() == '' || $('#check_awal').val() == '' || $('#finishing').val() == '' || $('#penggantian_barang').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'overhaul_record2');
        form_data.append('id_overhaul', $("#id_overhaul_add").val());
        form_data.append('nomor_mesin', $("#nomor_mesin_add").val());
        form_data.append('serial_number', $("#serial_number_add").val());
        form_data.append('komponen_check', $("#komponen_check").val());
        form_data.append('check_awal', $("#check_awal").val());
        form_data.append('finishing', $("#finishing").val());
        form_data.append('penggantian_barang', $("#penggantian_barang").val());


        var url_ajax = '<?= base_url() ?>overhaul/insert_data_item_add'

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
                    $('#komponen_check').val('')
                    $('#check_awal').val('')
                    $('#finishing').val('')
                    $('#penggantian_barang').val('')
                    reload_table()
                    $('#exampleModalCenter').modal('hide')
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