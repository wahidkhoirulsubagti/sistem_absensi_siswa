<div class="modal fade" id="modalTambahJadwal" tabindex="-1" role="dialog" aria-labelledby="modalTambahSiswaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahSiswaLabel">Tambah Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/save_jadwal'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama">ID Jadwal:</label>
                        <input type="text" class="form-control" name="id_jadwal" id="id_jadwal" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Hari:</label>
                        <input type="text" class="form-control" name="hari" id="hari" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Mata Pelajaran:</label>
                        <select name="id_matapelajaran" class="form-control">
                            <option disabled selected value="">--Pilih Mata Pelajaran--</option>
                            <?php foreach ($mata_pelajaran as $row) : ?>
                                <option value="<?= $row['id_matapelajaran']; ?>"><?= $row['nama_matapelajaran']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Open:</label>
                        <input type="text" class="form-control" name="open" id="open" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>