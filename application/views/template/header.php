<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>CMS - Absensi & Laporan Pekerjaan</title>

    <meta name="description" content="CMS - Absensi & Laporan Pekerjaan">
    <meta name="author" content="solusiciptamedia">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="CMS - Absensi & Laporan Pekerjaan">
    <meta property="og:site_name" content="solusiciptamedia">
    <meta property="og:description" content="CMS - Absensi & Laporan Pekerjaan">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?= base_url('') ?>assets/media/favicons/cms.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('') ?>assets/media/favicons/cms.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('') ?>assets/media/favicons/cms.png">
    <!-- END Icons -->

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="<?= base_url('') ?>assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap">
    <link rel="stylesheet" id="css-main" href="<?= base_url('') ?>assets/css/codebase.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/js/plugins/sweetalert2/sweetalert2.min.css">

    <!-- jQuery (required for DataTables plugin) -->
    <script src="<?= base_url('') ?>assets/js/lib/jquery.min.js"></script>

</head>

<body>

    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">

        <nav id="sidebar">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="content-header justify-content-lg-center">
                    <!-- Logo -->
                    <div>
                        <span class="smini-visible fw-bold tracking-wide fs-lg">
                            c<span class="text-primary">b</span>
                        </span>
                        <a class="link-fx fw-bold tracking-wide mx-auto" href="index.html">
                            <span class="smini-hidden">
                                <img src="<?= base_url('assets/media/favicons/cms.png') ?>" alt="cms" width="80%">
                                <!-- <i class="fa fa-fire text-primary"></i> -->
                                <!-- <span class="fs-4 text-dual">code</span><span class="fs-4 text-primary">base</span> -->
                            </span>
                        </a>
                    </div>
                    <!-- END Logo -->

                    <!-- Options -->
                    <div>
                        <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout" data-action="sidebar_close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                    <!-- END Options -->
                </div>
                <!-- END Side Header -->

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll">
                    <!-- Side User -->
                    <div class="content-side content-side-user px-0 py-0">
                        <!-- Visible only in mini mode -->
                        <div class="smini-visible-block animated fadeIn px-3">
                            <img class="img-avatar img-avatar32" src="<?= base_url('') ?>assets/media/avatars/asa.jpg" alt="">
                        </div>
                        <!-- END Visible only in mini mode -->

                        <!-- Visible only in normal mode -->
                        <div class="smini-hidden text-center mx-auto">
                            <a class="img-link" href="be_pages_generic_profile.html">
                                <img class="img-avatar" src="<?= base_url('') ?>assets/media/avatars/asa.jpg" alt="">
                            </a>
                            <ul class="list-inline mt-3 mb-0">
                                <li class="list-inline-item">
                                    <a class="link-fx text-dual fs-sm fw-semibold text-uppercase" href="<?= base_url('design/profil') ?>">Agus Salim</a>
                                </li>
                                <li class="list-inline-item">
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <a class="link-fx text-dual" data-toggle="layout" data-action="dark_mode_toggle" href="javascript:void(0)">
                                        <i class="fa fa-burn"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="link-fx text-dual" href="<?= base_url('design') ?>">
                                        <i class="fa fa-sign-out-alt"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END Visible only in normal mode -->
                    </div>
                    <!-- END Side User -->

                    <!-- Side Navigation -->
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link active" href="<?= base_url('design/dashboard') ?>">
                                    <i class="nav-main-link-icon fa fa-house-user"></i>
                                    <span class="nav-main-link-name">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-main-heading">Master</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link active" href="<?= base_url('design/karyawan') ?>">
                                    <i class="nav-main-link-icon fa fa-child"></i>
                                    <span class="nav-main-link-name">Karyawan</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="<?= base_url('design/mesin') ?>">
                                    <i class="nav-main-link-icon fa fa-dumpster"></i>
                                    <span class="nav-main-link-name">Mesin</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="<?= base_url('design/customer') ?>">
                                    <i class="nav-main-link-icon fa fa-elevator"></i>
                                    <span class="nav-main-link-name">Customer</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="<?= base_url('design/kontrak') ?>">
                                    <i class="nav-main-link-icon fa fa-book"></i>
                                    <span class="nav-main-link-name">Kontrak</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="<?= base_url('design/cuti') ?>">
                                    <i class="nav-main-link-icon fa fa-layer-group"></i>
                                    <span class="nav-main-link-name">Jenis Cuti</span>
                                </a>
                            </li>

                            <li class="nav-main-heading">Absensi</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="<?= base_url('design/absensi') ?>">
                                    <i class="nav-main-link-icon fa fa-calendar-check"></i>
                                    <span class="nav-main-link-name">Data Absensi</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="<?= base_url('design/ketidakhadiran') ?>">
                                    <i class="nav-main-link-icon fa fa-calendar-xmark"></i>
                                    <span class="nav-main-link-name">Ketidakhadiran</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="<?= base_url('design/periode') ?>">
                                    <i class="nav-main-link-icon fa fa-clock"></i>
                                    <span class="nav-main-link-name">Register Periode</span>
                                </a>
                            </li>

                            <li class="nav-main-heading">Overhaul</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="<?= base_url('design/listoh') ?>">
                                    <i class="nav-main-link-icon fa fa-cash-register"></i>
                                    <span class="nav-main-link-name">List Mesin</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="<?= base_url('design/prosesoh') ?>">
                                    <i class="nav-main-link-icon fa fa-dumpster-fire"></i>
                                    <span class="nav-main-link-name">Proses Overhaul</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="<?= base_url('design/cekqr') ?>">
                                    <i class="nav-main-link-icon fa fa-qrcode"></i>
                                    <span class="nav-main-link-name">Cek QR</span>
                                </a>
                            </li>

                            <li class="nav-main-heading">Kerja Luar</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="<?= base_url('design/jadwalspk') ?>">
                                    <i class="nav-main-link-icon fa fa-business-time"></i>
                                    <span class="nav-main-link-name">Jadwal SPK</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="#">
                                    <i class="nav-main-link-icon fa fa-file-contract"></i>
                                    <span class="nav-main-link-name">Machine Record</span>
                                </a>
                            </li>


                            <li class="nav-main-heading">Setting</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="#">
                                    <i class="nav-main-link-icon fa fa-user-lock"></i>
                                    <span class="nav-main-link-name">User</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="<?= base_url('design') ?>">
                                    <i class="nav-main-link-icon fa fa-sign-out-alt"></i>
                                    <span class="nav-main-link-name">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- END Sidebar Scrolling -->
            </div>
            <!-- Sidebar Content -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="space-x-1">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Open Search Section -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="header_search_on">
                        <i class="fa fa-fw fa-search"></i>
                    </button>
                    <!-- END Open Search Section -->

                    <!-- Color Themes -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-themes-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-wrench"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg p-0" aria-labelledby="page-header-themes-dropdown">
                            <div class="p-3 bg-body-light rounded-top">
                                <h5 class="h6 text-center mb-0">
                                    Color Themes
                                </h5>
                            </div>
                            <div class="p-3">
                                <div class="row g-0 text-center">
                                    <div class="col-2">
                                        <a class="text-default" data-toggle="theme" data-theme="default" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2">
                                        <a class="text-elegance" data-toggle="theme" data-theme="<?= base_url('') ?>assets/css/themes/elegance.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2">
                                        <a class="text-pulse" data-toggle="theme" data-theme="<?= base_url('') ?>assets/css/themes/pulse.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2">
                                        <a class="text-flat" data-toggle="theme" data-theme="<?= base_url('') ?>assets/css/themes/flat.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2">
                                        <a class="text-corporate" data-toggle="theme" data-theme="<?= base_url('') ?>assets/css/themes/corporate.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-2">
                                        <a class="text-earth" data-toggle="theme" data-theme="<?= base_url('') ?>assets/css/themes/earth.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 bg-body-light rounded-bottom">
                                <!-- <div class="row g-sm text-center">
                                    <div class="col-6">
                                        <a class="dropdown-item fs-sm fw-medium mb-0" href="be_layout_api.html">
                                            <i class="fa fa-flask opacity-50 me-1"></i> Layout API
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a class="dropdown-item fs-sm fw-medium mb-0" href="be_ui_color_themes.html">
                                            <i class="fa fa-paint-brush opacity-50 me-1"></i> Themes
                                        </a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- END Color Themes -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="space-x-1">


                    <!-- Notifications -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-notifications" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-flag"></i>
                            <span class="text-primary">&bull;</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications">
                            <div class="px-2 py-3 bg-body-light rounded-top">
                                <h5 class="h6 text-center mb-0">
                                    Notifications
                                </h5>
                            </div>
                            <ul class="nav-items my-2 fs-sm">
                                <li>
                                    <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 me-2 ms-3">
                                            <i class="fa fa-fw fa-check text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 pe-2">
                                            <p class="fw-medium mb-1">Kontrak dengan PT. ABC akan segera berakhir pada 20-December-2022!</p>
                                            <div class="text-muted">15 min ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 me-2 ms-3">
                                            <i class="fa fa-fw fa-exclamation-triangle text-warning"></i>
                                        </div>
                                        <div class="flex-grow-1 pe-2">
                                            <p class="fw-medium mb-1">Kontrak dengan PT. ABC akan segera berakhir pada 20-December-2022!</p>
                                            <div class="text-muted">50 min ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 me-2 ms-3">
                                            <i class="fa fa-fw fa-times text-danger"></i>
                                        </div>
                                        <div class="flex-grow-1 pe-2">
                                            <p class="fw-medium mb-1">Kontrak dengan PT. ABC akan segera berakhir pada 20-December-2022!</p>
                                            <div class="text-muted">4 hours ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 me-2 ms-3">
                                            <i class="fa fa-fw fa-exclamation-triangle text-warning"></i>
                                        </div>
                                        <div class="flex-grow-1 pe-2">
                                            <p class="fw-medium mb-1">Kontrak dengan PT. ABC akan segera berakhir pada 20-December-2022!</p>
                                            <div class="text-muted">16 hours ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 me-2 ms-3">
                                            <i class="fa fa-fw fa-plus text-primary"></i>
                                        </div>
                                        <div class="flex-grow-1 pe-2">
                                            <p class="fw-medium mb-1">Kontrak dengan PT. ABC akan segera berakhir pada 20-December-2022!</p>
                                            <div class="text-muted">1 day ago</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p-2 bg-body-light rounded-bottom">
                                <a class="dropdown-item text-center mb-0" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-flag opacity-50 me-1"></i> View All
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END Notifications -->

                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header bg-body-extra-light">
                <div class="content-header">
                    <form class="w-100" action="be_pages_generic_search.html" method="POST">
                        <div class="input-group">
                            <!-- Close Search Section -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                            <!-- END Close Search Section -->
                            <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                            <button type="submit" class="btn btn-secondary">
                                <i class="fa fa-fw fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Header Search -->

            <!-- Header Loader -->
            <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-primary">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="far fa-sun fa-spin text-white"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <script>
            const toast = (icon, title) => {
                Swal.fire({
                    icon: icon,
                    title: title,
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                })
            }
        </script>