<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Overhaul</h2>



        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Form kondisi awal mesin</h3>
                <div class="block-options">
                    <a href="<?= base_url('overhaul/prosesoh') ?>" type="button" class="btn btn-outline-danger min-width-125"><i class="fa fa-minus-circle"></i> Sembunyikan</a>
                </div>
            </div>
            <div class="block-content">
                <!-- Form Horizontal - Default Style -->
                <form class="mb-5" id="form-data">
                    <div class="row mb-4" style="border-bottom: solid 1px #DCDCDC;">
                        <label class="col-sm-4 col-form-label" for="example-hf-email">NAMA</label>
                        <label class="col-sm-8 col-form-label" for="example-hf-email">CHECK AWAL</label>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="caver_body_awal">Caver Body</label>
                        <input type="hidden" name="id_overhaul" id="id_overhaul">
                        <input type="hidden" name="nomor_mesin" id="nomor_mesin">
                        <input type="hidden" name="serial_number" id="serial_number">
                        <input type="hidden" name="tipe" id="tipe" value="tambah">
                        <div class="col-sm-8">
                            <select name="caver_body_awal" id="caver_body_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="dadf_awal">DADF</label>
                        <div class="col-sm-8">
                            <select name="dadf_awal" id="dadf_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="kaca_platen_awal">Kaca Platen</label>
                        <div class="col-sm-8">
                            <select name="kaca_platen_awal" id="kaca_platen_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="tombol_panel_awal">Tombol Panel</label>
                        <div class="col-sm-8">
                            <select name="tombol_panel_awal" id="tombol_panel_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="paper_supply_awal">Paper Supply (Tray 1sd 4)</label>
                        <div class="col-sm-8">
                            <select name="paper_supply_awal" id="paper_supply_awal" class="form-select">
                                <option value="Tray-1">Tray-1</option>
                                <option value="tray-2">tray-2</option>
                                <option value="tray-3">tray-3</option>
                                <option value="tray-4">tray-4</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="drum_catridge_awal">Drum Catridge</label>
                        <div class="col-sm-8">
                            <select name="drum_catridge_awal" id="drum_catridge_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="toner_catridge_awal">Toner Catridge</label>
                        <div class="col-sm-8">
                            <select name="toner_catridge_awal" id="toner_catridge_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="drum_opc_awal">Drum OPC</label>
                        <div class="col-sm-8">
                            <select name="drum_opc_awal" id="drum_opc_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="chip_drum_awal">Chip Drum</label>
                        <div class="col-sm-8">
                            <select name="chip_drum_awal" id="chip_drum_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="chip_toner_awal">Chip Toner</label>
                        <div class="col-sm-8">
                            <select name="chip_toner_awal" id="chip_toner_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="pemanas_awal">Pemanas</label>
                        <div class="col-sm-8">
                            <select name="pemanas_awal" id="pemanas_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="print_awal">Print</label>
                        <div class="col-sm-8">
                            <select name="print_awal" id="print_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="fax_awal">Fax</label>
                        <div class="col-sm-8">
                            <select name="fax_awal" id="fax_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="scan_awal">Scan</label>
                        <div class="col-sm-8">
                            <select name="scan_awal" id="scan_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="oct_awal">OCT</label>
                        <div class="col-sm-8">
                            <select name="oct_awal" id="oct_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="bypass_tray_awal">Bypass Tray</label>
                        <div class="col-sm-8">
                            <select name="bypass_tray_awal" id="bypass_tray_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-4 col-form-label" for="caver_ae_awal">Caver A sd E</label>
                        <div class="col-sm-8">
                            <select name="caver_ae_awal" id="caver_ae_awal" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
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


    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->



<script>
    <?php $target = 0; ?>
    $(function() {

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
    });

    $("#form-data").submit(function(e) {
        e.preventDefault()
        //   loading_submit()


        var form_data = new FormData();
        form_data.append('table', 'overhaul_record');
        form_data.append('id_overhaul', $("#id_overhaul").val());
        form_data.append('nomor_mesin', $("#nomor_mesin").val());
        form_data.append('serial_number', $("#serial_number").val());

        form_data.append('caver_body_awal', $("#caver_body_awal").val());
        form_data.append('dadf_awal', $("#dadf_awal").val());
        form_data.append('kaca_platen_awal', $("#kaca_platen_awal").val());
        form_data.append('tombol_panel_awal', $("#tombol_panel_awal").val());
        form_data.append('paper_supply_awal', $("#paper_supply_awal").val());
        form_data.append('drum_catridge_awal', $("#drum_catridge_awal").val());
        form_data.append('toner_catridge_awal', $("#toner_catridge_awal").val());
        form_data.append('drum_opc_awal', $("#drum_opc_awal").val());
        form_data.append('chip_drum_awal', $("#chip_drum_awal").val());
        form_data.append('chip_toner_awal', $("#chip_toner_awal").val());
        form_data.append('pemanas_awal', $("#pemanas_awal").val());
        form_data.append('print_awal', $("#print_awal").val());
        form_data.append('fax_awal', $("#fax_awal").val());
        form_data.append('scan_awal', $("#scan_awal").val());
        form_data.append('oct_awal', $("#oct_awal").val());
        form_data.append('bypass_tray_awal', $("#bypass_tray_awal").val());
        form_data.append('caver_ae_awal', $("#caver_ae_awal").val());

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
                    //redirect ke halaman awal prosesoh
                    window.location.replace("<?= base_url('overhaul/prosesoh') ?>");
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