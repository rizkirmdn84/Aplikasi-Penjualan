<form action="<?= base_url('cabang/simpancabang'); ?>" class="formcabang" method="post">
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="kodecabang" placeholder="Input Kode Cabang">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="namacabang" placeholder="Input Nama Cabang">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="alamatcabang" placeholder="Input Alamat Cabang">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="telepon" placeholder="Input Telpon Cabang">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">Simpan</button>
    </div>
</form>

<script>
    $(function() {
        $('.formcabang').bootstrapValidator({
            fields: {
                kodecabang: {
                    message: 'Kode Cabang tidak valid!',
                    validators: {
                        notEmpty: {
                            message: 'Kode Cabang harus di isi!'
                        }
                    }
                },
                namacabang: {
                    message: 'Nama Cabang tidak valid!',
                    validators: {
                        notEmpty: {
                            message: 'Nama Cabang harus di isi!'
                        }
                    }
                },
                alamatcabang: {
                    message: 'Alamat Cabang tidak valid!',
                    validators: {
                        notEmpty: {
                            message: 'Alamat Cabang harus di isi!'
                        }
                    }
                },
                telepon: {
                    message: 'Telepon tidak valid!',
                    validators: {
                        notEmpty: {
                            message: 'Telepon harus di isi!'
                        }
                    }
                },
            }
        });
    });
</script>