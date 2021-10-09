<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>
<!-- Form Uang Masuk -->
<div class="container">
    <div class="row-5">
        <div class="col-10">
            <form action="<?= base_url('dompet/simpanEditMasuk'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editMasukLabel">Edit Pemasukan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php foreach ($dompetID as $d) : ?>
                            <input type="hidden" name="id" id="id" value="<?= $d['id'] ?>">
                            <input type="hidden" name="idUser" id="idUser" value="<?= $d['idUser'] ?>">
                            <input type="hidden" name="idDompet" id="idDompet" value="<?= $d['idDompet'] ?>">
                            <input type="hidden" name="namaDompet" id="namaDompet" value="<?= $d['namaDompet'] ?>">
                            <input type="hidden" name="slug" id="slug" value="<?= $d['slug'] ?>">
                            <input type="hidden" name="uangMasukLama" id="uangMasukLama" value="<?= $d['uangMasuk'] ?>">
                            <input type="hidden" name="saldo" id="saldo" value="<?= $d['saldo'] ?>">
                        <?php endforeach; ?>
                        <div class="mb-3">
                            <label for="uangMasuk" class="form-label">Jumlah Uang Masuk</label>
                            <input type="int" class="form-control" id="uangMasuk" name="uangMasuk" aria-describedby="dompetHelp">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" aria-describedby="ketHelp">
                            <div id="ketHelp" class="form-text">Masukan keterangan tentang transaksi (listrik, makanan, dll)</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<body>

</body>

</html>