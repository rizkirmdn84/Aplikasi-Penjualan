<form action="<?= base_url('pelanggan/updatepelanggan'); ?>" class="formPelanggan" method="post">
    <div class="form-group mb-3">
        <input type="text" value="<?= $pelanggan['kode_pelanggan']; ?>" readonly class="form-control" name="kodepelanggan" placeholder="Input Kode Pelanggan">
    </div>
    <div class="form-group mb-3">
        <input type="text" value="<?= $pelanggan['nama_pelanggan']; ?>" class="form-control" name="namapelanggan" placeholder="Input Nama Pelanggan">
    </div>
    <div class="form-group mb-3">
        <input type="text" value="<?= $pelanggan['alamat_pelanggan']; ?>" class="form-control" name="alamatpelanggan" placeholder="Input Alamat Pelanggan">
    </div>
    <div class="form-group mb-3">
        <input type="text" value="<?= $pelanggan['no_hp']; ?>" class="form-control" name="nohp" placeholder="Input No Hp Pelanggan">
    </div>
    <div class="form-group mb-3">
        <select name="cabang" class="form-select">
            <option value="">Pilih Cabang</option>
            <?php foreach ($cabang as $c) { ?>
                <option <?php if ($pelanggan['kode_cabang'] == $c->kode_cabang) {
                            echo "selected";
                        } ?> value="<?= $c->kode_cabang; ?>"><?= $c->nama_cabang; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">Simpan</button>
    </div>
</form>

<script>
    $(function() {
        $('.formPelanggan').bootstrapValidator({
            fields: {
                kodepelanggan: {
                    message: 'Kode pelanggan tidak valid!',
                    validators: {
                        notEmpty: {
                            message: 'Kode pelanggan harus di isi!'
                        }
                    }
                },
                namapelanggan: {
                    message: 'Nama pelanggan tidak valid!',
                    validators: {
                        notEmpty: {
                            message: 'Nama pelanggan harus di isi!'
                        }
                    }
                },
                alamatpelanggan: {
                    message: 'Alamat Pelanggan tidak valid!',
                    validators: {
                        notEmpty: {
                            message: 'Alamat Pelanggan harus di isi!'
                        }
                    }
                },
                nohp: {
                    message: 'No Hp Pelanggan tidak valid!',
                    validators: {
                        notEmpty: {
                            message: 'No Hp Pelanggan harus di isi!'
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
    });
</script>