<div class="card">
    <div class=" card-header">
        <div class="">
            <h2 class=" card-title">Data Guru</h2>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahGuru"><i class="fas fa-plus"></i> Tambah Guru</button>

    </div>
    <div class=" card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nip</th>
                        <th>Nama Guru</th>
                        <th>Id Kelas</th>
                        <th width="90px" class="text-center">Tanggal Lahir Guru</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama Guru</th>
                        <th>Alamat Guru</th>
                        <th width="90px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($guru) && !empty($guru)) : ?>
                        <?php $no = 1; ?>
                        <?php foreach ($guru as $row) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nip']; ?></td>
                                <td><?php echo $row['nama_guru']; ?></td>
                                <td><?php echo $row['id_kelas']; ?></td>
                                <td><?php echo $row['tgl_lhr_guru']; ?></td>
                                <td><?php echo $row['jk_guru']; ?></td>
                                <td><?php echo $row['agama_guru']; ?></td>
                                <td><?php echo $row['alamat_guru']; ?></td>
                                <td>
                                    <!-- Kolom untuk aksi, misalnya tombol edit atau hapus -->
                                    <!-- Isi dengan aksi yang diinginkan -->
                                    <div class=" btn-group">
                                        <!-- Tombol Edit -->
                                        <button type="button" class="btn btn-sm btn-warning mr-1" data-toggle="modal" data-target="#editModal<?php echo $row['nip']; ?>"><i class="fas fa-edit"></i></button>
                                        <!-- Tombol Hapus -->
                                        <a href="<?php echo base_url('admin/hapus_guru/' . $row['nip']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data guru ini?');">
                                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </a>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                </tbody>


                <!-- Modal Edit Data Guru -->
                <?php foreach ($guru as $row) { ?>
                    <div class="modal fade" id="editModal<?php echo $row['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Data Guru</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo site_url('admin/update_guru'); ?>" method="post">
                                        <div class="form-group">
                                            <label for="nama">Nip:</label>
                                            <input readonly class="form-control" name="nip" id="nip" value="<?php echo $row['nip']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="kelas">Nama Guru:</label>
                                            <input type="text" class="form-control" name="nama_guru" id="nama_guru" value="<?php echo $row['nama_guru']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="kelas">Kelas:</label>
                                            <select name="id_kelas" class="form-control">
                                                <option disabled value="">--Pilih Kelas--</option>
                                                <?php foreach ($kelas as $kelas_row) : ?>
                                                    <option value="<?php echo $kelas_row['id_kelas']; ?>" <?php echo ($row['id_kelas'] == $kelas_row['id_kelas']) ? 'selected' : ''; ?>><?php echo $kelas_row['nama_kelas']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_lhr_guru">Tanggal Lahir Guru:</label>
                                            <input type="date" class="form-control" name="tgl_lhr_guru" id="tgl_lhr_guru" value="<?php echo $row['tgl_lhr_guru']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Jenis Kelamin Guru:</label>
                                            <select name="jk_guru" class="form-control">
                                                <option disabled value="">--Jenis Kelamin--</option>
                                                <option value="Laki-Laki" <?php echo ($row['jk_guru'] == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-Laki</option>
                                                <option value="Perempuan" <?php echo ($row['jk_guru'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Agama guru:</label>
                                            <select name="agama_guru" class="form-control">
                                                <option disabled value="">--Agama Guru--</option>
                                                <option value="Islam" <?php echo ($row['agama_guru'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                                                <option value="Kristen" <?php echo ($row['agama_guru'] == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                                                <option value="Budha" <?php echo ($row['agama_guru'] == 'Budha') ? 'selected' : ''; ?>>Budha</option>
                                                <option value="Hindu" <?php echo ($row['agama_guru'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                                                <option value="Lainnya" <?php echo ($row['agama_guru'] == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Alamat Guru:</label>
                                            <input type="text" class="form-control" name="alamat_guru" id="alamat_guru" value="<?php echo $row['alamat_guru']; ?>" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


            </table>
        </div>
    </div>
<?php endif; ?>
</div>