<!-- Form Uang Masuk -->
<div class="container">
    <div class="row-5">
        <div class="col-10">
            <!-- Form Uang Keluar -->
            <form action="<?= base_url('dompet/simpanEditKeluar'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editKeluarLabel">Edit Pengeluaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php foreach ($dompetID as $d) : ?>
                            <input type="hidden" name="id" id="id" value="<?= $d['id'] ?>">
                            <input type="hidden" name="idUser" id="idUser" value="<?= $d['idUser'] ?>">
                            <input type="hidden" name="idDompet" id="idDompet" value="<?= $d['idDompet'] ?>">
                            <input type="hidden" name="namaDompet" id="namaDompet" value="<?= $d['namaDompet'] ?>">
                            <input type="hidden" name="slug" id="slug" value="<?= $d['slug'] ?>">
                            <input type="hidden" name="uangKeluarLama" id="uangKeluarLama" value="<?= $d['uangKeluar'] ?>">
                            <input type="hidden" name="saldo" id="saldo" value="<?= $d['saldo'] ?>">
                        <?php endforeach; ?>
                        <div class="mb-3">
                            <label for="uangKeluar" class="form-label">Jumlah Uang Keluar</label>
                            <input type="int" class="form-control" id="uangKeluar" name="uangKeluar" aria-describedby="dompetHelp">
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