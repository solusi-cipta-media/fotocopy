<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <?php
        if ($jumlah_notif > 0) {
            foreach ($notifikasi as $key => $value) {
        ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="block block-rounded block-link-shadow overflow-hidden shadow shadow-danger">
                            <div class="block-content block-content-full">
                                <i class="si si-envelope fa-2x opacity-25"></i>
                                <div class="row">
                                    <div class="col-8">
                                        <h5><?= $value['pesan'] ?></h5>
                                    </div>
                                    <div class="col-4 text-end">
                                        <button class="btn btn-primary" type="button" onclick="show_data(`<?= $value['dokumen'] ?>`)"><i class="fa fa-file-pdf"></i> Lihat</button>
                                        <button class="btn btn-danger" type="button" onclick="remove_data(`<?= $value['id'] ?>`)"><i class="fa fa-trash"></i> Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="block block-rounded block-link-shadow overflow-hidden shadow shadow-danger">
                        <div class="block-content block-content-full">
                            <i class="si si-like fa-2x opacity-25"></i>
                            <div class="row">
                                <div class="col-8">
                                    <h5>Bagus! Semua reminder end contract telah diselesaikan.</h5>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <!-- <div class="row">
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-dumpster fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold">1500</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Mesin</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-elevator fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold">780</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Customer</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-dumpster-fire fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold">15</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Overhaul</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-business-time fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold">4252</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Open Job</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title">
                            Overhaul <small>30 hari terakhir</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content p-1 bg-body-light">
                        <canvas id="chartOverhaul"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title">
                            Service <small>30 hari terakhir</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content p-1 bg-body-light">
                        <canvas id="chartService"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title">
                            Jenis Pekerjaan
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content p-1 bg-body-light">
                        <canvas id="chartPekerjaan"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title">
                            Kinerja teknisi dalam Overhaul
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content p-1 bg-body-light">
                        <canvas id="js-chartjs-dashboard-lines2"></canvas>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">REMINDER!</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm" id="body-modal">
                    <div class="row push">
                        <div class="col-lg-12 col-xl-12">
                            <div class="mb-4 text-center">
                                <h1 style="font-size: 72px;">Ups!</h1>
                            </div>
                            <div class="mb-4">
                                <h5>Ada kontrak yang harus diperbaharui, silahkan kunjungi halaman kontrak</h5>
                            </div>
                            <div class="mb-4 text-center">
                                <a href="<?= base_url('kontrak') ?>" class="btn btn-danger" type="button">Halaman Kontrak</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <!-- <button type="submit" class="btn btn-alt-primary" data-bs-dismiss="modal">
                            Submit
                        </button> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modal-pdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-rounded shadow-none mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Terms &amp; Conditions</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm" id="body-modal2">

                </div>
                <div class="block-content block-content-full block-content-sm text-end border-top">
                    <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <!-- <button type="button" class="btn btn-alt-primary" data-bs-dismiss="modal">
                        Done
                    </button> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $.ajax({
            url: '<?= base_url() ?>dashboard/getnotif',
            data: {
                // id: id,
                table: "notifikasi_kontrak"
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                if (result > 0) {
                    // console.log(result)
                    $('#exampleModalCenter').modal('show')
                    return
                }
            }
        })


    });

    function show_data(dokumen) {
        console.log(dokumen)
        var html
        var nama
        $('#modal-pdf').modal('show')
        nama = '<h3 class="block-title">Dokumen Kontrak</h3>'
        html = '<embed type="application/pdf" src="<?= base_url() ?>assets/media/kontrak/' + dokumen + '" width="700" height="400"></embed>'
        $('#body-modal2').html(html)
        $('.block-title').html(nama)
    }

    function remove_data(id) {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Pesan akan hilang dari dashboard, pastikan Anda sudah melakukan follow up kepada customer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>dashboard/remove',
                    data: {
                        id: id,
                        table: "notifikasi_kontrak"
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
                            location.reload()
                        } else
                            toast('error', result.message)
                    }
                })
            }
        })


    }

    //ChartOverhaul
    const chartOverhaul = new Chart($('#chartOverhaul'), {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: '#88c4e3',
                borderColor: '#0384c7',
                borderWidth: 3,
                fill: true,
                pointBorderColor: "#fff",
                pointBorderWidth: 1,
                pointBackgroundColor: '#0384c7',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            tension: 0.3,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    })

    //ChartService
    const data = [{
        x: 'Jan',
        a: 100,
        b: 50,
        c: 50
    }, {
        x: 'Feb',
        a: 120,
        b: 55,
        c: 75
    }];
    const chartService = new Chart($('#chartService'), {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb'],
            datasets: [{
                label: 'Net sales',
                data: data,
                parsing: {
                    yAxisKey: 'a'
                },
                backgroundColor: 'red',
                borderColor: '#0384c7',
                borderWidth: 0,
            }, {
                label: 'Cost of goods sold',
                data: data,
                parsing: {
                    yAxisKey: 'b'
                },
                backgroundColor: 'blue',
                borderColor: '#0384c7',
                borderWidth: 0,
            }, {
                label: 'Gross margin',
                data: data,
                parsing: {
                    yAxisKey: 'c'
                },
                backgroundColor: 'yellow',
                borderColor: '#0384c7',
                borderWidth: 0,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                },
            },
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        // color: 'rgb(255, 99, 132)'
                    }
                }
            }
        }
    })

    //ChartPekerjaan
    const chartPekerjaan = new Chart($('#chartPekerjaan'), {
        type: 'doughnut',
        data: {
            labels: ['Red', 'Blue', 'Yellow'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                borderWidth: 0,
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false
                    }
                }]
            }
        }
    })
</script>