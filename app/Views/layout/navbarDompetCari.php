<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <!-- <div class="table-responsive"> -->
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
                <li>
                    <?php for ($i = 1; $i < 2; $i++) { ?>
                        <a type="button" class="btn btn-primary" href="/dompet/<?= $dompet['0']['slug']; ?>/<?= $idUser ?>">
                            Kembali
                        </a>
                    <?php } ?>
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
    <!-- </div> -->
</nav>