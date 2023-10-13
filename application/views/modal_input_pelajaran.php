<div class="modal fade" id="modalTambahpelajaran" tabindex="-1" role="dialog" aria-labelledby="modalTambahSiswaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahSiswaLabel">Tambah Mata Pelajaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('admin/save_pelajaran'); ?>" method="post">
        <div class="form-group">
    <label for="nama">ID Mata Pelajaran:</label>
    <input type="text" class="form-control" name="id_matapelajaran" id="id_matapelajaran" onkeypress="return event.charCode !== 32" required>
</div>

          <div class="form-group">
            <label for="kelas">Nama Mata Pelajaran:</label>
            <input type="text" class="form-control" name="nama_matapelajaran" id="nama_matapelajaran" required>
          </div>
          
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>