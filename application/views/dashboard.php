<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <!-- Row #1 -->
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
            <!-- END Row #1 -->
        </div>
        <div class="row">
            <!-- Row #2 -->
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
                        <!-- Chart.js Chart is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _js/pages/be_pages_dashboard.js -->
                        <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                        <canvas id="chartOverhaul"></canvas>
                    </div>
                    <!-- <div class="block-content">
                        <div class="row items-push">
                            <div class="col-6 col-sm-4 text-center text-sm-start">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">This Month</div>
                                <div class="fs-4 fw-semibold">720</div>
                                <div class="fw-semibold text-success">
                                    <i class="fa fa-caret-up"></i> +16%
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 text-center text-sm-start">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">This Week</div>
                                <div class="fs-4 fw-semibold">160</div>
                                <div class="fw-semibold text-danger">
                                    <i class="fa fa-caret-down"></i> -3%
                                </div>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-start">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Average</div>
                                <div class="fs-4 fw-semibold">24.3</div>
                                <div class="fw-semibold text-success">
                                    <i class="fa fa-caret-up"></i> +9%
                                </div>
                            </div>
                        </div>
                    </div> -->
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
                        <!-- Chart.js Chart is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _js/pages/be_pages_dashboard.js -->
                        <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                        <canvas id="chartService"></canvas>
                    </div>
                    <!-- <div class="block-content">
                        <div class="row items-push">
                            <div class="col-6 col-sm-4 text-center text-sm-start">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">This Month</div>
                                <div class="fs-4 fw-semibold">$ 6,540</div>
                                <div class="fw-semibold text-success">
                                    <i class="fa fa-caret-up"></i> +4%
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 text-center text-sm-start">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">This Week</div>
                                <div class="fs-4 fw-semibold">$ 1,525</div>
                                <div class="fw-semibold text-danger">
                                    <i class="fa fa-caret-down"></i> -7%
                                </div>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-start">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Balance</div>
                                <div class="fs-4 fw-semibold">$ 9,352</div>
                                <div class="fw-semibold text-success">
                                    <i class="fa fa-caret-up"></i> +35%
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- END Row #2 -->
        </div>
        <div class="row">
            <!-- Row #2 -->
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
                        <!-- Chart.js Chart is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _js/pages/be_pages_dashboard.js -->
                        <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                        <canvas id="chartPekerjaan"></canvas>
                    </div>
                    <!-- <div class="block-content">
                        <div class="row items-push">
                            <div class="col-6 col-sm-4 text-center text-sm-start">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">This Month</div>
                                <div class="fs-4 fw-semibold">720</div>
                                <div class="fw-semibold text-success">
                                    <i class="fa fa-caret-up"></i> +16%
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 text-center text-sm-start">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">This Week</div>
                                <div class="fs-4 fw-semibold">160</div>
                                <div class="fw-semibold text-danger">
                                    <i class="fa fa-caret-down"></i> -3%
                                </div>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-start">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Average</div>
                                <div class="fs-4 fw-semibold">24.3</div>
                                <div class="fw-semibold text-success">
                                    <i class="fa fa-caret-up"></i> +9%
                                </div>
                            </div>
                        </div>
                    </div> -->
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
                        <!-- Chart.js Chart is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _js/pages/be_pages_dashboard.js -->
                        <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                        <canvas id="js-chartjs-dashboard-lines2"></canvas>
                    </div>
                    <!-- <div class="block-content">
                        <div class="row items-push">
                            <div class="col-6 col-sm-4 text-center text-sm-start">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">This Month</div>
                                <div class="fs-4 fw-semibold">$ 6,540</div>
                                <div class="fw-semibold text-success">
                                    <i class="fa fa-caret-up"></i> +4%
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 text-center text-sm-start">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">This Week</div>
                                <div class="fs-4 fw-semibold">$ 1,525</div>
                                <div class="fw-semibold text-danger">
                                    <i class="fa fa-caret-down"></i> -7%
                                </div>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-start">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Balance</div>
                                <div class="fs-4 fw-semibold">$ 9,352</div>
                                <div class="fw-semibold text-success">
                                    <i class="fa fa-caret-up"></i> +35%
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- END Row #2 -->
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<script>
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