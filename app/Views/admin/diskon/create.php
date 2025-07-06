<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h4>Tambah Diskon</h4>
<form action="<?= base_url('/admin/diskon/store') ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="<?= old('tanggal') ?>">
        <?php if (isset($validation) && $validation->hasError('tanggal')): ?>
            <div class="text-danger"><?= $validation->getError('tanggal') ?></div>
        <?php endif ?>
    </div>
    <div class="mb-3">
        <label for="nominal">Nominal</label>
        <input type="number" name="nominal" class="form-control" value="<?= old('nominal') ?>">
        <?php if (isset($validation) && $validation->hasError('nominal')): ?>
            <div class="text-danger"><?= $validation->getError('nominal') ?></div>
        <?php endif ?>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<?= $this->endSection() ?>
