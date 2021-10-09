<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <?php for ($i = 1; $i < 2; $i++) { ?>
            <a class="navbar-brand" href="#"><?= $dompet['0']['namaDompet']; ?></a>
        <?php } ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <form action="/utama/index" method="post">
                        <?php for ($i = 1; $i < 2; $i++) { ?>
                            <input type="hidden" name="email" value="<?= $user['0']['email'] ?>">
                            <input type="hidden" name="pass" value="<?= $user['0']['password'] ?>">
                            <button class="btn btn-primary" type="submit" name="submit">Home</button>
                        <?php } ?>
                    </form>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary" aria-current="page" data-bs-toggle="modal" data-bs-target="#uangMasuk">
                        Pemasukan
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uangKeluar">
                        Pengeluaran
                    </button>
                </li>
            </ul>
            <?php for ($i = 1; $i < 2; $i++) { ?>
                <form class="d-flex" action="/dompet/cari" method="post">
                    <input type="hidden" name="slug" value="<?= $dompet['0']['slug']; ?>">
                    <input type="hidden" name="idUser" value="<?= $idUser ?>">
                    <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit" name="submit">Cari</button>
                </form>
            <?php } ?>
        </div>
    </div>
</nav>


<!-- Modal -->
<div class="modal fade" id="uangMasuk" tabindex="-1" aria-labelledby="uangMasuk" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Form Uang Masuk -->
        <form action="/dompet/masuk" method="post">
            <?= csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uangMasukLabel">Pemasukan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php foreach ($dompet as $d) : ?>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="idUser" id="idUser" value="<?= $d['idUser'] ?>">
                        <input type="hidden" name="idDompet" id="idDompet" value="<?= $d['idDompet'] ?>">
                        <input type="hidden" name="namaDompet" id="namaDompet" value="<?= $d['namaDompet'] ?>">
                        <input type="hidden" name="slug" id="slug" value="<?= $d['slug'] ?>">
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

<!-- Modal -->
<div class="modal fade" id="uangKeluar" tabindex="-1" aria-labelledby="uangKeluar" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Form Uang Keluar -->
        <form action="/dompet/keluar" method="post">
            <?= csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uangKeluarLabel">Pengeluaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php foreach ($dompet as $d) : ?>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="idUser" id="idUser" value="<?= $d['idUser'] ?>">
                        <input type="hidden" name="idDompet" id="idDompet" value="<?= $d['idDompet'] ?>">
                        <input type="hidden" name="namaDompet" id="namaDompet" value="<?= $d['namaDompet'] ?>">
                        <input type="hidden" name="slug" id="slug" value="<?= $d['slug'] ?>">
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