<h2 class="page-title">
    Data Harga
</h2>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="#" class="btn btn-success mb-3" id="tambahharga">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg> Tambah Data
                </a>
                <div class="mb-3"><?= $this->session->flashdata('message'); ?></div>
                <table class="table table-striped table-bordered" id="tabelharga">
                    <thead style="color:#fff ;background-color:#232e3c;">
                        <tr>
                            <th>No</th>
                            <th>Kode Harga</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Cabang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($harga as $h) { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $h->kode_harga; ?></td>
                                <td><?= $h->kode_barang; ?></td>
                                <td><?= $h->nama_barang; ?></td>
                                <td><?= $h->satuan; ?></td>
                                <td align="right"><?= number_format($h->harga, '0', '', '.'); ?></td>
                                <td><?= $h->stok; ?></td>
                                <td><?= $h->kode_cabang; ?></td>
                                <td>
                                    <a href="#" data-kodeharga="<?= $h->kode_harga; ?>" class="btn btn-sm btn-primary edit">
                                        <li class="fa fa-pencil"></li>
                                    </a>
                                    <a href="#" data-href="<?= base_url(); ?>barang/hapusharga/<?= $h->kode_harga; ?>" class="btn btn-sm btn-danger hapus">
                                        <li class="fa fa-trash-o"></li>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalharga" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Harga</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loadforminputharga"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modaleditharga" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Harga</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loadformeditharga"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalhapusharga" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Apakah anda yakin menghapus data ini?</div>
                <div>Jika dihapus maka anda akan kehilangan data ini.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
                <a href="#" id="hapusharga" class="btn btn-danger">Yes Delete!</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#tambahharga").click(function() {
            $("#modalharga").modal("show");
            $("#loadforminputharga").load("<?= base_url('barang/inputharga'); ?>");
        });

        $(".edit").click(function() {
            var kodeharga = $(this).attr("data-kodeharga");
            $("#modaleditharga").modal("show");
            $("#loadformeditharga").load("<?= base_url(); ?>barang/editharga/" + kodeharga);
        });

        $(".hapus").click(function() {
            var href = $(this).attr("data-href");
            $("#modalhapusharga").modal("show");
            $("#hapusharga").attr("href", href);
        });
        $('#tabelharga').DataTable();
    });
</script>