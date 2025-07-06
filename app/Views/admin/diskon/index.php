<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h4>Manajemen Diskon</h4>

<!-- Notifikasi error -->
<?php if (session()->getFlashdata('validation')): ?>
    <div class="alert alert-danger">
        <?= session('validation')->listErrors() ?>
    </div>
<?php endif; ?>

<!-- Tombol buka modal -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
    Tambah Data
</button>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= base_url('/admin/diskon/store') ?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahModalLabel">Tambah Diskon</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control <?= session('validation') && session('validation')->hasError('tanggal') ? 'is-invalid' : '' ?>" value="<?= old('tanggal') ?>" required>
            <?php if (session('validation') && session('validation')->hasError('tanggal')): ?>
              <div class="invalid-feedback">
                <?= session('validation')->getError('tanggal') ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="mb-3">
            <label for="nominal" class="form-label">Nominal</label>
            <input type="number" name="nominal" class="form-control <?= session('validation') && session('validation')->hasError('nominal') ? 'is-invalid' : '' ?>" value="<?= old('nominal') ?>" required>
            <?php if (session('validation') && session('validation')->hasError('nominal')): ?>
              <div class="invalid-feedback">
                <?= session('validation')->getError('nominal') ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Tabel data diskon -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Nominal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($diskons as $row): ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $row['tanggal'] ?></td>
            <td><?= number_format($row['nominal']) ?></td>
            <td>
                <a href="<?= base_url('/admin/diskon/edit/'.$row['id']) ?>" class="btn btn-success btn-sm">Ubah</a>
                <a href="<?= base_url('/admin/diskon/delete/'.$row['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>

