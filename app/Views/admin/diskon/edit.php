<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h4>Edit Diskon</h4>
<form action="<?= base_url('/admin/diskon/update/' . $diskon['id']) ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="<?= $diskon['tanggal'] ?>" readonly>
    </div>
    <div class="mb-3">
        <label for="nominal">Nominal</label>
        <input type="number" name="nominal" class="form-control" value="<?= old('nominal', $diskon['nominal']) ?>">
        <?php if (isset($validation) && $validation->hasError('nominal')): ?>
            <div class="text-danger"><?= $validation->getError('nominal') ?></div>
        <?php endif ?>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<?= $this->endSection() ?>
