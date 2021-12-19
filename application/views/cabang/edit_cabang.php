<form action="<?= base_url('cabang/updatecabang'); ?>" class="formCabang" method="post">
    <div class="form-group mb-3">
        <input type="text" readonly value="<?= $cabang['kode_cabang']; ?>" class="form-control" name="kodecabang" placeholder="Input Kode cabang">
    </div>
    <div class="form-group mb-3">
        <input type="text" value="<?= $cabang['nama_cabang']; ?>" class="form-control" name="namacabang" placeholder="Input Nama cabang">
    </div>
    <div class="form-group mb-3">
        <input type="text" value="<?= $cabang['alamat_cabang']; ?>" class="form-control" name="alamatcabang" placeholder="Input Alamat cabang">
    </div>
    <div class="form-group mb-3">
        <input type="text" value="<?= $cabang['telepon']; ?>" class="form-control" name="telepon" placeholder="Input Telepon cabang">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">Update</button>
    </div>
</form>

<script>
    $(function() {
        $('.formCabang').bootstrapValidator({
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