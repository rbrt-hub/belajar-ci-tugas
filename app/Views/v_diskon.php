<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- Tombol Tambah Diskon -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Diskon</button>

<!-- Tabel Diskon -->
<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Tanggal</th>
      <th>Nominal</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($diskon as $i => $d): ?>
    <tr>
      <td><?= $i + 1 ?></td>
      <td><?= $d['tanggal'] ?></td>
      <td>Rp <?= number_format($d['nominal'], 0, ',', '.') ?></td>
      <td>
        <!-- Tombol Edit -->
        <button 
          class="btn btn-success btn-sm" 
          data-bs-toggle="modal" 
          data-bs-target="#modalEdit<?= $d['id'] ?>">Ubah</button>

        <!-- Tombol Hapus -->
        <a href="<?= base_url('/diskon/delete/'.$d['id']) ?>" 
           onclick="return confirm('Yakin ingin menghapus data ini?')" 
           class="btn btn-danger btn-sm">Hapus</a>
      </td>
    </tr>

    <!-- Modal Edit Diskon -->
    <div class="modal fade" id="modalEdit<?= $d['id'] ?>" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <form method="post" action="<?= base_url('/diskon/update/'.$d['id']) ?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Ubah Diskon</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="<?= $d['tanggal'] ?>" readonly>
              </div>
              <div class="mb-3">
                <label for="nominal">Nominal</label>
                <input type="number" name="nominal" class="form-control" value="<?= $d['nominal'] ?>" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <?php endforeach; ?>
  </tbody>
</table>

<?php if (session()->getFlashdata('validation')): ?>
  <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
    <ul class="mb-0">
      <?php foreach (session()->getFlashdata('validation')->getErrors() as $error): ?>
        <li><?= esc($error) ?></li>
      <?php endforeach ?>
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
<?php endif ?>


<!-- Modal Tambah Diskon -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="<?= base_url('/diskon/store') ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Diskon</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="nominal">Nominal</label>
            <input type="number" name="nominal" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection() ?>