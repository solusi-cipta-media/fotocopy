<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Overhaul</h2>

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded" id="list-karyawan">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Summary Mesin Nomor <?= $sn['nomor_mesin'] ?> - SN.<?= $sn['serial_number'] ?>
                </h3>
                <a href="<?= $_GET["status"] == 'selesai' ? base_url('overhaul/selesaioh') : ($_GET["status"] == 'qr' ? base_url('overhaul/cekqr') : base_url('overhaul/prosesoh'))  ?>" type="button" class="btn btn-outline-danger min-width-125">
                    <i class="fa fa-minus-circle mr-5"></i> Kembali
                </a>&nbsp;
                <a href="<?= base_url('overhaul/cetakhasiloverhaul?id=' . $_GET["id"]) ?>" target="_blank" type="button" class="btn btn-outline-success min-width-125">
                    <i class="fa fa-print mr-5"></i> Cetak
                </a>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-responsive class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;"></th>
                            <th>Komponen Check</th>
                            <th>Check Awal</th>
                            <th>Finishing</th>
                            <th>Penggantian Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($details as $key => $value) {
                        ?>
                            <tr>
                                <th class="text-center" scope="row"><?= $no ?></th>
                                <td><?= $value['komponen_check'] ?></td>
                                <td><?= $value['check_awal'] ?></td>
                                <td><?= $value['finishing'] ?></td>
                                <td><?= $value['penggantian_barang'] ?></td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->