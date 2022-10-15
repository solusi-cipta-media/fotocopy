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
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
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
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="fw-semibold">Agus Salim</td>
                            <td>12345</td>
                            <td>05-Nov-2022</td>
                            <td>08:00</td>
                            <td>16:00</td>
                            <td><button type="button" class="btn btn-primary"><i class="fa fa-location-dot"></i> IN</button></td>
                            <td><button type="button" class="btn btn-danger"><i class="fa fa-location-pin"></i> OUT</button></td>
                            <td>00:00</td>
                            <td>00:00</td>
                            <td>08:00</td>
                        </tr>
                    </tbody>
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
                <form action="be_forms_elements.html" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                    <div class="row push">
                        <div class="col-lg-12 col-xl-12">
                            <div class="mb-4">
                                <label class="form-label" for="example-text-input">Nomor</label>
                                <input type="text" class="form-control" id="example-text-input" name="example-text-input">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="example-email-input">Customer</label>
                                <input type="email" class="form-control" id="example-email-input" name="example-email-input" value="select2 method">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="example-email-input">Awal Kontrak</label>
                                <input type="date" class="form-control" id="example-email-input" name="example-email-input">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="example-email-input">Akhir Kontrak</label>
                                <input type="date" class="form-control" id="example-email-input" name="example-email-input">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="example-email-input">Reminder</label>
                                <input type="date" class="form-control" id="example-email-input" name="example-email-input">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="example-file-input">Upload Dokumen Kontrak -FILE HARUS PDF</label>
                                <input class="form-control" type="file" id="example-file-input">
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary"><i class="si si-cloud-upload"></i> Simpan</button>
                                <button type="button" class="btn btn-alt-danger" id="clear-form"><i class="si si-close"></i> Clear</button>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row-push">
                        <div class="col-lg-12 col-xl-12">
                            <button type="submit" class="btn btn-alt-primary"><i class="si si-cloud-upload"></i> Simpan</button>
                            <button type="button" class="btn btn-alt-danger" id="clear-form"><i class="si si-close"></i> Clear</button>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
        <!-- Dynamic Table Responsive -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<script>
    $('#btn-add').on('click', function() {
        $('#add-new').show(500);
        $('#list-karyawan').hide();
    });

    $('#btn-hide').on('click', function() {
        $('#list-karyawan').show(500);
        $('#add-new').hide();
    });

    $('#btn-edit').on('click', function() {
        $('#add-new').show(500);
        $('#list-karyawan').hide();
    });

    function delete_data() {

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
                Swal.fire(
                    'Deleted!',
                    'Data berhasil di hapus.',
                    'success'
                )
            }
        })


    }
</script>