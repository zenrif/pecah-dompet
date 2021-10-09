<div class="table-responsive">
  <div class="container">
    <div class="row">
      <?php if (session()->getFlashdata('pesanU')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
        </div>
      <?php endif; ?>
      <?php if (session()->getFlashdata('gagalU')) : ?>
        <div class="alert alert-danger" role="alert">
          <?= session()->getFlashdata('gagal'); ?>
        </div>
      <?php endif; ?>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th style="width:5% ; text-align: center">No</th>
            <th scope="col">Dompet</th>
            <th scope="col">Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($utama as $u) : ?>
            <tr>
              <th scope="row" style="text-align: center"><?= $i++; ?></th>
              <td><?= $u['namaDompet']; ?></td>
              <!-- </form> -->
              <td>
                <form action="/dompet" method="post" class="d-inline">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="slug" value="<?= $u['slug'] ?>">
                  <input type="hidden" name="idUser" value="<?= $idUser ?>">
                  <button type="submit" class="btn btn-success">Detail</button>
                </form>
                <form action="/utama/hapus/<?= $u['idDompet']; ?>" method="post" class="d-inline">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="idUser" value="<?= $idUser ?>">
                  <input type="hidden" name="email" value="<?= $email ?>">
                  <input type="hidden" name="password" value="<?= $password ?>">
                  <input type="hidden" name="nama" value="<?= $nama ?>">
                  <input type="hidden" name="idDompet" value="<?= $u['idDompet'] ?>">
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>