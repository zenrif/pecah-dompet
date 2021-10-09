<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <!-- <div class="table-responsive"> -->
    <div class="container">
        <a class="navbar-brand" href="#"><?= $nama; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <form action="/utama/index" method="post">
                        <input type="hidden" name="email" value="<?= $email ?>">
                        <input type="hidden" name="pass" value="<?= $password ?>">
                        <button class="btn btn-primary" type="submit" name="submit">Home</button>
                    </form>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
                        Tambah
                    </button>
                </li>
                <li class="nav-item">
                    <a type="button" class="btn btn-danger" href="/users/keluar">Logout</a>
                </li>
            </ul>
            <form class="d-flex" action="Utama/cari" method="post">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit" name="submit">Cari</button>
            </form>
        </div>
    </div>
    <!-- </div> -->
</nav>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog">
        <!-- BUAT FORM TAMBAH DATA DOMPET -->
        <form action="tambah" method="POST">
            <?= csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Tambah Dompet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idDompet" id="idDompet">
                    <input type="hidden" name="idUser" value="<?= $idUser ?>">
                    <input type="hidden" name="email" value="<?= $email ?>">
                    <input type="hidden" name="password" value="<?= $password ?>">
                    <input type="hidden" name="nama" value="<?= $nama ?>">

                    <div class="mb-3">
                        <label for="namaDompet" class="form-label">Nama Dompet</label>
                        <input type="text" class="form-control" id="namaDompet" name="namaDompet" aria-describedby="dompetHelp">
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