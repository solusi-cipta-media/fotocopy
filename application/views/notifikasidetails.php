<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <!-- Timeline Default Style -->
        <h2 class="content-heading">Notifikasi <small>Details</small></h2>
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title"><?= $details['customer'] ?></h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <ul class="timeline pull-t">
                    <!-- Twitter Notification -->
                    <li class="timeline-event">
                        <div class="timeline-event-time"><?= date('d-M-Y H:i:s', strtotime($details['date_created'])) ?></div>
                        <i class="timeline-event-icon fa fa fa-envelope-open bg-info"></i>
                        <div class="timeline-event-block">
                            <p class="fw-semibold">Dears,</p><br>
                            <p><?= $details['pesan'] ?>, <br>Silahkan lakukan follow up kepada customer untuk melakukan perpanjangan kontrak!</p>
                            <p style="margin-bottom: 0px;">Dokumen</p>
                            <button type="button" class="btn btn-lg btn-danger" onclick=show_data("<?= $details['dokumen'] ?>")><i class="fa fa-file-pdf"></i></button><br><br><br>
                            <a href="<?= base_url('kontrak/notifikasi') ?>" type="button" class="btn btn-sm btn-success"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                    </li>
                    <!-- END Twitter Notification -->
                </ul>
            </div>
        </div>
        <!-- END Timeline Default Style -->


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
                    <h3 class="block-title" id="judul">Terms &amp; Conditions</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content fs-sm" id="body-modal">
                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
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
<!-- END Normal Modal -->


<script>
    function show_data(dokumen) {
        var html
        var nama
        $('#exampleModalCenter').modal('show')
        nama = '<h3 class="block-title">Dokumen Kontrak</h3>'
        html = '<embed type="application/pdf" src="<?= base_url() ?>assets/media/kontrak/' + dokumen + '" width="700" height="400"></embed>'
        $('#body-modal').html(html)
        $('#judul').html(nama)
    }
</script>