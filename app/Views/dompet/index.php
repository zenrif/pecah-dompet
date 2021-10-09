<div class="table-responsive">
    <div class="container">
        <div class="row">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('gagal')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('gagal'); ?>
                </div>
            <?php endif; ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Uang Masuk</th>
                        <th scope="col">Uang Keluar</th>
                        <th scope="col">Saldo</th>
                        <th scope="col" style="text-align: center">Aksi</th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dompet as $d) : ?>
                        <tr>
                            <th scope="row" style="text-align: center"><?= $i++; ?></th>
                            <td><?= date('d/m/Y', strtotime($d['created_at'])); ?></td>
                            <td><?= $d['keterangan']; ?></td>
                            <td>Rp<?= isset($d['uangMasuk']) ? number_format($d['uangMasuk'], 0, ' ', '.') : '0,-'; ?></td>
                            <td>Rp<?= isset($d['uangKeluar']) ? number_format($d['uangKeluar'], 0, ' ', '.') : '0,-'; ?></td>
                            <td>Rp<?= number_format($d['saldo'], 0, ' ', '.') ?></td>
                            <td style="text-align: center">
                                <a href="/dompet/edit/<?= isset($d['uangMasuk']) ? 'masuk/' : 'keluar/' ?><?= $d['id'] ?>" class="btn btn-success">Edit</a>
                                <form action="/dompet/hapus/<?= $d['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="bg-success text-white" colspan="2">Pemasukan : </th>
                        <th> Rp<?= number_format($pemasukan['pemasukan'], 0, ' ', '.') ?></th>
                    </tr>
                    <tr>
                        <th class="bg-danger text-white" colspan="2">Pengeluaran : </th>
                        <th> Rp<?= number_format($pengeluaran['pengeluaran'], 0, ' ', '.') ?></th>
                    </tr>
                    <tr>
                        <th class="bg-primary text-white" colspan="2">Saldo : </th>
                        <th> Rp<?= number_format($saldo, 0, ' ', '.') ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editMasuk" tabindex="-1" aria-labelledby="editMasuk" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Form Uang Masuk -->
        <form action="simpanEditMasuk" method="post">
            <?= csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMasukLabel">Edit Pemasukan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php foreach ($dompet as $d) : ?>
                        <input type="hidden" name="id" id="id" value="<?= $d['id'] ?>">
                        <input type="hidden" name="idUser" id="idUser" value="<?= $d['idUser'] ?>">
                        <input type="hidden" name="idDompet" id="idDompet" value="<?= $d['idDompet'] ?>">
                        <input type="hidden" name="namaDompet" id="namaDompet" value="<?= $d['namaDompet'] ?>">
                        <input type="hidden" name="slug" id="slug" value="<?= $d['slug'] ?>">
                        <input type="hidden" name="uangMasukLama" id="uangMasukLama" value="<?= $d['uangMasuk'] ?>">
                        <input type="hidden" name="saldo" id="saldo" value="<?= $d['saldo'] ?>">
                    <?php endforeach; ?>
                    <input type="hidden" name="coba" id="coba" value="<?= $dompet[0]['id'] ?>">
                    <div class="mb-3">
                        <label for="uangMasuk" class="form-label">Jumlah Uang Masuk</label>
                        <input type="int" class="form-control" id="uangMasuk" name="uangMasuk" aria-describedby="dompetHelp">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" aria-describedby="ketHelp">
                        <div id="ketHelp" class="form-text">We'll never share your email with anyone else.</div>
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

<!-- Modal -->
<div class="modal fade" id="editKeluar" tabindex="-1" aria-labelledby="editKeluar" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Form Uang Keluar -->
        <form action="simpanEditKeluar" method="post">
            <?= csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editKeluarLabel">Edit Pengeluaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php foreach ($dompet as $d) : ?>
                        <input type="hidden" name="id" id="id" value="<?= $d['id'] ?>">
                        <input type="hidden" name="idUser" id="idUser" value="<?= $d['idUser'] ?>">
                        <input type="hidden" name="idDompet" id="idDompet" value="<?= $d['idDompet'] ?>">
                        <input type="hidden" name="namaDompet" id="namaDompet" value="<?= $d['namaDompet'] ?>">
                        <input type="hidden" name="slug" id="slug" value="<?= $d['slug'] ?>">
                        <input type="hidden" name="uangKeluarLama" id="uangKeluarLama" value="<?= $d['uangKeluar'] ?>">
                        <input type="hidden" name="saldo" id="saldo" value="<?= $d['saldo'] ?>">
                    <?php endforeach; ?>
                    <input type="hidden" name="coba" id="coba" value="<?= $dompet[0]['id'] ?>">
                    <div class="mb-3">
                        <label for="uangKeluar" class="form-label">Jumlah Uang Keluar</label>
                        <input type="int" class="form-control" id="uangKeluar" name="uangKeluar" aria-describedby="dompetHelp">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" aria-describedby="ketHelp">
                        <div id="ketHelp" class="form-text">We'll never share your email with anyone else.</div>
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