<div class="modal fade" id="modalTambahAbsensi" tabindex="-1" role="dialog" aria-labelledby="modalTambahSiswaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahSiswaLabel">Tambah Absensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url('guru/save_absensi'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="jadwal">Nama Siswa:</label>
                        <select id="namaSiswa" class="form-control">
                            <option disabled selected value="">--Pilih Nama Siswa--</option>
                            <?php foreach ($siswa as $row) : ?>
                                <option value="<?= $row['nis']; ?>" data-kelas="<?= $row['id_kelas']; ?>"><?= $row['nama_siswa']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kelas">NIS:</label>
                        <input readonly type="text" class="form-control" name="nis_siswa" id="nis_siswa" placeholder="NIS siswa" required>
                    </div>

                    <div class="form-group">
                        <label for="kelas">Kelas:</label>
                        <select disabled name="select_kelas_otomatis" id="kelas" class="form-control">
                            <option disabled selected value="">Kelas siswa</option>
                            <?php foreach ($kelas as $row) : ?>
                                <option value="<?= $row['id_kelas']; ?>"><?= $row['nama_kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <input hidden name="id_kelas" id="id_kelas_input">

                    <div class="form-group">
                        <label for="jadwal">Jadwal:</label>
                        <select name="id_jadwal" class="form-control">
                            <option disabled selected value="">--Pilih Jadwal--</option>
                            <?php foreach ($jadwal as $row) : ?>
                                <option value="<?= $row['id_jadwal']; ?>"><?= $row['hari']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for "nama">Keterangan:</label>
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
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" class="form-control" name="tanggal_input" id="tanggal_input" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Ambil elemen-elemen yang diperlukan
    var selectSiswa = document.getElementById('namaSiswa');
    var inputNIS = document.getElementById('nis_siswa');
    var selectKelas = document.getElementById('kelas');
    var inputKelas = document.getElementById('id_kelas_input');

    // Tambahkan event listener untuk mengisi NIS dan kelas saat pilihan nama siswa berubah
    selectSiswa.addEventListener('change', function() {
        var selectedOption = selectSiswa.options[selectSiswa.selectedIndex];
        inputNIS.value = selectedOption.value;

        // Mengisi otomatis pilihan kelas berdasarkan data-kelas yang disimpan di atribut data
        var selectedKelas = selectedOption.getAttribute('data-kelas');
        selectKelas.value = selectedKelas;
        inputKelas.value = selectedKelas;
    });

    var inputKelas = document.getElementById('id_kelas_input');

    selectKelas.addEventListener('change', function() {
        var selectedOption = selectKelas.options[selectKelas.selectedIndex];
        inputKelas.value = selectedOption.value;
    });

    // Ambil elemen input tanggal
    var inputTanggal = document.getElementById('tanggal_input');

    // Dapatkan tanggal hari ini
    var today = new Date();

    // Atur tanggal maksimum sebagai hari ini
    inputTanggal.max = today.toISOString().split('T')[0];
</script>