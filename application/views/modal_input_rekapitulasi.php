<div class="modal fade" id="modalTambahRekapitulasi" tabindex="-1" role="dialog" aria-labelledby="modalTambahSiswaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahSiswaLabel">Tambah Rekapitulasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/save_rekapitulasi'); ?>" method="post">
                    <div class="form-group">
                        <label for="nis">NIS:</label>
                        <input type="text" class="form-control" name="nis" id="nis" required>
                    </div>
                    <div class="form-group">
                        <label for="nis">Nama Siswa:</label>
                        <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Keterangan:</label>
                        <select class="form-control" name="keterangan" id="keterangan">
                            <option disabled selected value="">--Pilih Keterangan--</option>
                            <option value="Masuk">Masuk</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Ijin">Ijin</option>
                            <option value="Alpa">Alpa</option>
                            <option value="Mati">Mati</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal Rekapitulasi:</label>
                        <input type="date" class="form-control" name="tgl_rekap" id="tgl_rekap" required>
                    </div>


                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>