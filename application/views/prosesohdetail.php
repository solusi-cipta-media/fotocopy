<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Overhaul</h2>

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded" id="list-karyawan">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Summary Mesin Nomor 121 - SN.6565656
                </h3>
                <a href="<?= base_url('design/prosesoh') ?>" type="button" class="btn btn-outline-danger min-width-125">
                    <i class="fa fa-minus-circle mr-5"></i> Kembali
                </a>&nbsp;
                <a href="<?= base_url('design/cetakhasiloverhaul') ?>" target="_blank" type="button" class="btn btn-outline-success min-width-125">
                    <i class="fa fa-print mr-5"></i> Cetak
                </a>
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="fw-semibold">Caver Body</td>
                            <td>Baik</td>
                            <td>Oke</td>
                            <td>Cat Ulang</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->