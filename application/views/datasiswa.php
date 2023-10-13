<div class="card">
    <div class=" card-header">
        <div class="">
            <h2 class=" card-title">Data Siswa</h2>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahSiswa"><i class="fas fa-plus"></i> Tambah Siswa</button>

    </div>
    <div class=" card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Id Kelas</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama Siswa</th>
                        <th>Alamat Siswa</th>
                        <th width="90px" class="text-center" >Aksi </th>
                    </tr>
                </thead>
                <tbody>

                
                    
                        <?php $no = 1; ?>
                        
                            
                                
                    <?php foreach ($siswa as $row) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['nis']; ?></td>
                            <td><?php echo $row['nama_siswa']; ?></td>
                            <td><?php echo $row['id_kelas']; ?></td>
                            <td><?php echo $row['tgl_lhr_siswa']; ?></td>
                            <td><?php echo $row['jk_siswa']; ?></td>
                            <td><?php echo $row['agama_siswa']; ?></td>
                            <td><?php echo $row['alamat_siswa']; ?></td>
                            <td> <!-- Kolom untuk aksi, misalnya tombol edit atau hapus -->
                                <!-- Isi dengan aksi yang diinginkan -->

                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal<?php echo $row['nis']; ?>"><i class="fas fa-edit"></i></button>
                                <!-- Tombol Hapus -->
                                <a href="<?php echo base_url('admin/hapus_siswa/' . $row['nis']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?');">
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

                <!-- Modal Edit Data Siswa -->
                <?php foreach ($siswa as $row) { ?>
                    <div class="modal fade" id="editModal<?php echo $row['nis']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Data Siswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo site_url('SiswaController/update'); ?>" method="post">
                                        <div class="form-group">
                                            <label for="nama">Nis:</label>
                                            <input readonly class="form-control" name="nis" id="nis" value="<?php echo $row['nis']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="kelas">Nama Siswa:</label>
                                            <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" value="<?php echo $row['nama_siswa']; ?>" required>
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
                                            <label for="tgl_lahir">Tanggal Lahir:</label>
                                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $row['tgl_lhr_siswa']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Jenis Kelamin:</label>
                                            <select name="jenis_kelamin" class="form-control">
                                                <option disabled value="">--Jenis Kelamin--</option>
                                                <option value="Laki-Laki" <?php echo ($row['jk_siswa'] == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-Laki</option>
                                                <option value="Perempuan" <?php echo ($row['jk_siswa'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Agama Siswa:</label>
                                            <select name="agama_siswa" class="form-control">
                                                <option disabled value="">--Agama Siswa--</option>
                                                <option value="Islam" <?php echo ($row['agama_siswa'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                                                <option value="Kristen" <?php echo ($row['agama_siswa'] == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                                                <option value="Budha" <?php echo ($row['agama_siswa'] == 'Budha') ? 'selected' : ''; ?>>Budha</option>
                                                <option value="Hindu" <?php echo ($row['agama_siswa'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                                                <option value="Lainnya" <?php echo ($row['agama_siswa'] == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Alamat Siswa:</label>
                                            <input type="text" class="form-control" name="alamat_siswa" id="alamat_siswa" value="<?php echo $row['alamat_siswa']; ?>" required>
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
</div>