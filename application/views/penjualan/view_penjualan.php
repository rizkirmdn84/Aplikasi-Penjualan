<h2 class="page-title">
    Data Penjualan
</h2>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="<?= base_url('penjualan/inputpenjualan'); ?>" class="btn btn-success mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg> Tambah Data
                </a>
                <div class="mb-3"><?= $this->session->flashdata('message'); ?></div>
                <table class="table table-striped table-bordered">
                    <thead style="color:#fff ;background-color:#232e3c;">
                        <tr>
                            <th>No</th>
                            <th>No Faktur</th>
                            <th>Tanggal</th>
                            <th>kode Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Jenis Transaksi</th>
                            <th>Jatuh Tempo</th>
                            <th>Kasir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>