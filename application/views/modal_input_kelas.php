<div class="modal fade" id="modalTambahKelas" tabindex="-1" role="dialog" aria-labelledby="modalTambahSiswaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahSiswaLabel">Tambah Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('admin/save_kelas'); ?>" method="post">
        <div class="form-group">
    <label for="nama">ID Kelas:</label>
    <input type="text" class="form-control" name="id_kelas" id="id_kelas" onkeypress="return event.charCode !== 32" required>
</div>

          <div class="form-group">
            <label for="kelas">Nama Kelas:</label>
            <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" required>
          </div>
          
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>