<div class="modal fade" id="modalTambahGuru" tabindex="-1" role="dialog" aria-labelledby="modalTambahSiswaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahSiswaLabel">Tambah Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/save_guru'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama">Nip:</label>
                        <input type="text" class="form-control" name="nip" id="nip" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Nama Guru:</label>
                        <input type="text" class="form-control" name="nama_guru" id="nama_guru" onkeypress="return event.charCode < 48 || event.charCode  > 57" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas:</label>
                        <select name="id_kelas" class="form-control">
                            <option disabled selected value="">--Pilih Kelas--</option>
                            <?php foreach ($kelas as $row) : ?>
                                <option value="<?= $row['id_kelas']; ?>"><?= $row['nama_kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir Guru:</label>
                        <input type="date" class="form-control" name="tgl_lhr_guru" id="tgl_lhr_guru" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Jenis Kelamin Guru:</label>
                        <select name="jk_guru" class="form-control">
                            <option disabled selected value="">--Jenis Kelamin--</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Agama Guru:</label>
                        <select name="agama_guru" class="form-control">
                            <option disabled selected value="">--Agama Guru--</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen </option>
                            <option value="Budha">Budha </option>
                            <option value="Hindu">Hindu</option>
                            <option value="Lainnya">Lainnya </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Alamat Guru:</label>
                        <input type="text" class="form-control" name="alamat_guru" id="alamat_guru" required>
                    </div>
                    <div class=" modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>