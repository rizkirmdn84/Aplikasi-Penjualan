<form action="<?= base_url('barang/updatebarang'); ?>" class="formBarang" method="post">
    <div class="form-group mb-3">
        <input type="text" readonly value="<?= $barang['kode_barang']; ?>" class="form-control" name="kodebarang" placeholder="Input Kode Barang">
    </div>
    <div class="form-group mb-3">
        <input type="text" value="<?= $barang['nama_barang']; ?>" class="form-control" name="namabarang" placeholder="Input Nama Barang">
    </div>
    <div class="form-group mb-3">
        <select name="satuan" class="form-select">
            <option value="">Satuan</option>
            <option <?php if ($barang['satuan'] == "Pcs") {
                        echo "selected";
                    } ?> value="Pcs">Pcs</option>
            <option <?php if ($barang['satuan'] == "Unit") {
                        echo "selected";
                    } ?> value="Unit">Unit</option>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">Update</button>
    </div>
</form>

<script>
    $(function() {
        $('.formBarang').bootstrapValidator({
            fields: {
                kodebarang: {
                    message: 'Kode barang tidak valid!',
                    validators: {
                        notEmpty: {
                            message: 'Kode barang harus di isi!'
                        }
                    }
                },
                namabarang: {
                    message: 'Nama barang tidak valid!',
                    validators: {
                        notEmpty: {
                            message: 'Nama barang harus di isi!'
                        }
                    }
                },
                satuan: {
                    message: 'Satuan tidak valid!',
                    validators: {
                        notEmpty: {
                            message: 'Satuan harus di isi!'
                        }
                    }
                },
            }
        });
    });
</script>