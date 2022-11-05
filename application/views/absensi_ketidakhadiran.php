<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Data Absensi</h2>

        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded" id="list-karyawan">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Report Ketidakhadiran
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
                            <th>Tipe</th>
                            <th>Status</th>
                            <th>Aksi</th>
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
                    <h3 class="block-title">Bukti Ketidakhadiran</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- <form id="form-data-teknisi"> -->
                <div class="block-content fs-sm" id="body-modal">
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
                'url': '<?= base_url() ?>absensi/ajax_table_absensi_ketidakhadiran',
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
                "data": "data.tipe",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.status == 'APPROVED') {
                        return `<span class="badge bg-primary">` + data.status + `</span>`
                    } else if (data.status == 'REJECTED') {
                        return `<span class="badge bg-danger">` + data.status + `</span>`
                    } else {
                        return `<span class="badge bg-warning">WAITING</span>`
                    }
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.status == 'APPROVED' || data.status == 'REJECTED') {
                        return `<button type="button" class="btn btn-sm btn-success" onclick=show_data() data-bs-toggle="tooltip" title="Bukti">
                                        <i class="si si-picture"></i> Bukti
                                    </button>`
                    } else {
                        return ` <button type="button" class="btn btn-sm btn-success" onclick=show_data() data-bs-toggle="tooltip" title="Bukti">
                                        <i class="si si-picture"></i> Bukti
                                    </button>
                                    <button type="button" class="btn btn-sm btn-primary" onclick=approve_data('` + data.id + `') data-bs-toggle="tooltip" title="Approve">
                                        <i class="fa fa-circle-check"></i> Approve
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" onclick=reject_data('` + data.id + `') data-bs-toggle="tooltip" title="Reject">
                                        <i class="fa fa-circle-xmark"></i> Reject
                                    </button>`
                    }
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

        //   $('#tambah-user').hide();
    });

    function reload_table() {
        $('#table-absensi').DataTable().ajax.reload(null, false);
    }

    function show_data(id) {
        $('#id').val(id)
        // var html
        // var nama
        $('#exampleModalCenter').modal('show')
        // nama = '<h3 class="block-title">Bukti Ketidakhadiran - Agus Salim</h3>'
        html = '<img src="<?= base_url('assets/media/leave/asa.jpg') ?>" class="img-fluid" alt="bukti_leave">'
        $('#body-modal').html(html)
        // $('.block-title').html(nama)
    }

    function approve_data(id) {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Anda akan menyetujui Ketidakhadiran karyawan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>absensi/approve_ketidakhadiran',
                    data: {
                        id: id,
                        table: "absensi_ketidakhadiran"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == "success") {
                            Swal.fire(
                                'Berhasil!',
                                'Ketidakhadiran karyawan telah disetujui.',
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

    function reject_data(id) {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Anda akan menolak Ketidakhadiran karyawan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>absensi/reject_ketidakhadiran',
                    data: {
                        id: id,
                        table: "absensi_ketidakhadiran"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == "success") {
                            Swal.fire(
                                'Berhasil!',
                                'Ketidakhadiran karyawan telah ditolak.',
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
</script>