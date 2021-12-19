<h2 class="page-title">
    Data Pelanggan
</h2>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="#" class="btn btn-success mb-3" id="tambahpelanggan">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg> Tambah Data
                </a>
                <div class="mb-3"><?= $this->session->flashdata('message'); ?></div>
                <table class="table table-striped table-bordered" id="tabelpelanggan">
                    <thead style="color:#fff ;background-color:#232e3c;">
                        <tr>
                            <th>No</th>
                            <th>Kode Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Cabang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($pelanggan as $p) { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $p->kode_pelanggan; ?></td>
                                <td><?= $p->nama_pelanggan; ?></td>
                                <td><?= $p->alamat_pelanggan; ?></td>
                                <td><?= $p->no_hp; ?></td>
                                <td><?= $p->nama_cabang; ?></td>
                                <td>
                                    <a href="#" data-kodepelanggan="<?= $p->kode_pelanggan; ?>" class="btn btn-sm btn-primary edit">
                                        <li class="fa fa-pencil"></li>
                                    </a>
                                    <a href="#" data-href="<?= base_url(); ?>pelanggan/hapuspelanggan/<?= $p->kode_pelanggan; ?>" class="btn btn-sm btn-danger hapus">
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
<div class="modal modal-blur fade" id="modalpelanggan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Pelanggan</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loadforminputpelanggan"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modaleditpelanggan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pelanggan</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loadformeditpelanggan"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalhapuspelanggan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Apakah anda yakin menghapus data ini?</div>
                <div>Jika dihapus maka anda akan kehilangan data ini.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
                <a href="#" id="hapuspelanggan" class="btn btn-danger">Yes Delete!</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#tambahpelanggan").click(function() {
            $("#modalpelanggan").modal("show");
            $("#loadforminputpelanggan").load("<?= base_url('pelanggan/inputpelanggan'); ?>");
        });

        $(".edit").click(function() {
            var kodepelanggan = $(this).attr("data-kodepelanggan");
            $("#modaleditpelanggan").modal("show");
            $("#loadformeditpelanggan").load("<?= base_url(); ?>pelanggan/editpelanggan/" + kodepelanggan);
        });

        $(".hapus").click(function() {
            var href = $(this).attr("data-href");
            $("#modalhapuspelanggan").modal("show");
            $("#hapuspelanggan").attr("href", href);
        });
        $('#tabelpelanggan').DataTable();
    });
</script>