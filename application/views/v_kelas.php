<!-- Tombol untuk membuka modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputModal">
  Tambah Kelas
</button>

<!-- Modal input kelas -->
<div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="inputModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inputModalLabel">Tambah Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/kelas/create" method="post">
          <div class="form-group">
            <label for="id_kelas">ID Kelas</label>
            <input type="text" class="form-control" id="id_kelas" name="id_kelas" placeholder="Masukkan ID Kelas" required>
          </div>
          <div class="form-group">
            <label for="nama_kelas">Nama Kelas</label>
            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas" required>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
