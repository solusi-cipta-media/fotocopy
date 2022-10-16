<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Overhaul</h2>



        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Form Finishing Mesin Fotocopy</h3>
                <div class="block-options">
                    <a href="<?= base_url('design/prosesoh') ?>" type="button" class="btn btn-outline-danger min-width-125"><i class="fa fa-minus-circle"></i> Sembunyikan</a>
                </div>
            </div>
            <div class="block-content">
                <!-- Form Horizontal - Default Style -->
                <form class="mb-5" action="be_forms_layouts.html" method="POST" onsubmit="return false;">
                    <div class="row mb-4" style="border-bottom: solid 1px #DCDCDC;">
                        <label class="col-sm-4 col-form-label" for="example-hf-email">NAMA</label>
                        <label class="col-sm-2 col-form-label" for="example-hf-email">CHECK AWAL</label>
                        <label class="col-sm-2 col-form-label" for="example-hf-email">FINISHING</label>
                        <label class="col-sm-4 col-form-label" for="example-hf-email">PENGGANTIAN BARANG</label>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="caver_body_awal">Caver Body</label>
                        <div class="col-sm-2">
                            <select name="caver_body_awal" id="caver_body_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="caver_body_akhir" id="caver_body_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="caver_body_ganti" name="caver_body_ganti" placeholder="Penggantian Barang">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="dadf_awal">DADF</label>
                        <div class="col-sm-2">
                            <select name="dadf_awal" id="dadf_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="dadf_akhir" id="dadf_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="dadf_ganti" name="dadf_ganti" placeholder="Penggantian Barang">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="kaca_platen_awal">Kaca Platen</label>
                        <div class="col-sm-2">
                            <select name="kaca_platen_awal" id="kaca_platen_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="kaca_platen_akhir" id="kaca_platen_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="kaca_paten_ganti" name="kaca_paten_ganti" placeholder="Penggantian Barang">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="tombol_panel_awal">Tombol Panel</label>
                        <div class="col-sm-2">
                            <select name="tombol_panel_awal" id="tombol_panel_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="tombol_planel_akhir" id="tombol_planel_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="tombol_planel_ganti" name="tombol_planel_ganti" placeholder="Penggantian Barang">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="paper_supply_awal">Paper Supply (Tray 1sd 4)</label>
                        <div class="col-sm-2">
                            <select name="paper_supply_awal" id="paper_supply_awal" class="form-select">
                                <option value="Tray-1">Tray-1</option>
                                <option value="tray-2">tray-2</option>
                                <option value="tray-3">tray-3</option>
                                <option value="tray-4">tray-4</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="paper_supply_akhir" id="paper_supply_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="paper_supply_ganti" name="paper_supply_ganti" placeholder="Penggantian Barang">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="drum_catridge_awal">Drum Catridge</label>
                        <div class="col-sm-2">
                            <select name="drum_catridge_awal" id="drum_catridge_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="drum_catridge_akhir" id="drum_catridge_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="drum_catridge_ganti" name="drum_catridge_ganti" placeholder="Penggantian Barang">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="toner_catridge_awal">Toner Catridge</label>
                        <div class="col-sm-2">
                            <select name="toner_catridge_awal" id="toner_catridge_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="toner_catridge_akhir" id="toner_catridge_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="toner_catridge_ganti" name="toner_catridge_ganti" placeholder="Penggantian Barang">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="drum_opc_awal">Drum OPC</label>
                        <div class="col-sm-2">
                            <select name="drum_opc_awal" id="drum_opc_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="drum_opc_akhir" id="drum_opc_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="drum_opc_ganti" name="drum_opc_ganti" placeholder="Penggantian Barang">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="chip_drum_awal">Chip Drum</label>
                        <div class="col-sm-2">
                            <select name="chip_drum_awal" id="chip_drum_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="chip_drum_akhir" id="chip_drum_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="chip_drum_ganti" name="chip_drum_ganti" placeholder="Penggantian Barang">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="chip_toner_awal">Chip Toner</label>
                        <div class="col-sm-2">
                            <select name="chip_toner_awal" id="chip_toner_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="chip_toner_akhir" id="chip_toner_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="chip_toner_ganti" name="chip_toner_ganti" placeholder="Penggantian Barang">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="pemanas_awal">Pemanas</label>
                        <div class="col-sm-2">
                            <select name="pemanas_awal" id="pemanas_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="pemanas_akhir" id="pemanas_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="pemanas_ganti" name="pemanas_ganti" placeholder="Penggantian Barang">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="print_awal">Print</label>
                        <div class="col-sm-2">
                            <select name="print_awal" id="print_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="print_akhir" id="print_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="print_ganti" name="print_ganti" placeholder="Penggantian Barang">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="fax_awal">Fax</label>
                        <div class="col-sm-2">
                            <select name="fax_awal" id="fax_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="fax_akhir" id="fax_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="fax_ganti" name="fax_ganti" placeholder="Penggantian Barang">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="scan_awal">Scan</label>
                        <div class="col-sm-2">
                            <select name="scan_awal" id="scan_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="scan_akhir" id="scan_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="scan_ganti" name="scan_ganti" placeholder="Penggantian Barang">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="oct_awal">OCT</label>
                        <div class="col-sm-2">
                            <select name="oct_awal" id="oct_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="oct_akhir" id="oct_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="oct_ganti" name="oct_ganti" placeholder="Penggantian Barang">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="bypass_tray_awal">Bypass Tray</label>
                        <div class="col-sm-2">
                            <select name="bypass_tray_awal" id="bypass_tray_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="bypass_tray_akhir" id="bypass_tray_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="bypass_tray_ganti" name="bypass_tray_ganti" placeholder="Penggantian Barang">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="caver_ae_awal">Caver A sd E</label>
                        <div class="col-sm-2">
                            <select name="caver_ae_awal" id="caver_ae_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="caver_ae_akhir" id="caver_ae_akhir" class="form-select">
                                <option value="Oke">Oke</option>
                                <option value="Ganti">Ganti</option>
                                <option value="Repair">Repair</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="caver_ae_ganti" name="caver_ae_ganti" placeholder="Penggantian Barang">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-12 ms-auto" style="text-align: right;">
                            <button type="button" class="btn btn-primary">Simpan</button>
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
                    Summary
                </h3>
                <button type="button" class="btn btn-outline-primary min-width-125" onclick="ganti_data()">
                    <i class="fa fa-plus mr-5"></i> Tambah Items
                </button>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-responsive class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
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
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="fw-semibold">Ganti Kabel Body</td>
                            <td>Rusak</td>
                            <td>Ganti</td>
                            <td>-</td>
                            <td class="text-center" style="width: 20%;">
                                <button type="button" class="btn btn-sm btn-danger" onclick=delete_data() data-bs-toggle="tooltip" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="fw-semibold">Ganti muka caver a(03)</td>
                            <td>Rusak</td>
                            <td>Ganti</td>
                            <td>-</td>
                            <td class="text-center" style="width: 20%;">
                                <button type="button" class="btn btn-sm btn-danger" onclick=delete_data() data-bs-toggle="tooltip" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
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
                <form action="be_forms_elements.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                    <div class="block-content fs-sm" id="body-modal">
                        <div class="row push">
                            <div class="col-lg-3 col-xl-3">
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Nama</label>
                                    <input type="text" class="form-control" id="example-text-input" name="example-text-input">
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-3">
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Check Awal</label>
                                    <input type="text" class="form-control" id="example-text-input" name="example-text-input">
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-3">
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Finishing</label>
                                    <input type="text" class="form-control" id="example-text-input" name="example-text-input">
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-3">
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Ganti Barang</label>
                                    <input type="text" class="form-control" id="example-text-input" name="example-text-input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-alt-primary" data-bs-dismiss="modal">
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
    function delete_data() {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Anda akan menghapus data input proses overhaul!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Berhasil!',
                    'Data berhasil dihapus.',
                    'success'
                )
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
</script>