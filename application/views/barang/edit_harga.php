<form action="<?= base_url('barang/updateharga'); ?>" class="formHarga" method="post">
    <div class="form-group mb-3">
        <input type="text" value="<?= $harga['kode_harga']; ?>" readonly class="form-control" name="kodeharga" id="kodeharga" placeholder="Input Kode Harga">
    </div>
    <div class="form-group mb-3">
        <select disabled name="kodebarang" id="kodebarang" class="form-select">
            <option value="">Pilih Barang</option>
            <?php foreach ($barang as $b) { ?>
                <option <?php if ($harga['kode_barang'] == $b->kode_barang) {
                            echo "selected";
                        } ?> value="<?= $b->kode_barang; ?>"> <?= $b->kode_barang . " - " . $b->nama_barang; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group mb-3">
        <input type="text" value="<?= $harga['harga']; ?>" class="form-control" name="harga" id="harga" placeholder="Input Harga">
    </div>
    <div class="form-group mb-3">
        <input type="text" value="<?= $harga['stok']; ?>" class="form-control" name="stok" id="stok" placeholder="Input Stok">
    </div>
    <div class="form-group mb-3">
        <select disabled name="cabang" id="cabang" class="form-select">
            <option value="">Pilih Cabang</option>
            <?php foreach ($cabang as $c) { ?>
                <option <?php if ($harga['kode_cabang'] == $c->kode_cabang) {
                            echo "selected";
                        } ?> value="<?= $c->kode_cabang; ?>"> <?= $c->nama_cabang; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">Update</button>
    </div>
</form>

<script>
    $(function() {
        $('.formHarga').bootstrapValidator({
            fields: {
                kodeharga: {
                    message: 'Kode Harga tidak valid!',
                    validators: {
                        notEmpty: {
                            message: 'Kode Harga harus di isi!'
                        }
                    }
                },
                kodebarang: {
                    message: 'Barang tidak valid!',
                    validators: {
                        notEmpty: {
                            message: 'Barang harus di isi!'
                        }
                    }
                },
                harga: {
                    message: 'Harga tidak valid!',
                    validators: {
                        notEmpty: {
                            message: 'Harga harus di isi!'
                        }
                    }
                },
                stok: {
                    message: 'Stok tidak valid!',
                    validators: {
                        notEmpty: {
                            message: 'Stok harus di isi!'
                        }
                    }
                },
                cabang: {
                    message: 'Cabang tidak valid!',
                    validators: {
                        notEmpty: {
                            message: 'Cabang harus di isi!'
                        }
                    }
                },
            }
        });

        function loadkodeharga() {
            var kodebarang = $("#kodebarang").val();
            var kodecabang = $("#cabang").val();
            var kodeharga = kodebarang + kodecabang;
            $("#kodeharga").val(kodeharga);
        }
        $("#kodebarang").change(function() {
            loadkodeharga();
        });
        $("#cabang").change(function() {
            loadkodeharga();
        });
    });
</script>