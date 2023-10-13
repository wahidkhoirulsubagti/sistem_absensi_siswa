<div class="card">
    <div class=" card-header">
        <div class="">
            <h2 class=" card-title">Data Jadwal</h2>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahJadwal"><i class="fas fa-plus"></i> Tambah Jadwal</button>

    </div>
    <div class=" card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Jadwal</th>
                        <th>Hari</th>
                        <th>Id Mata Pelajaran</th>
                        <th>Open</th>
                        <th width="40px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($jadwal) && !empty($jadwal)) : ?>
                        <?php $no = 1; ?>
                        <?php foreach ($jadwal as $row) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['id_jadwal']; ?></td>
                                <td><?php echo $row['hari']; ?></td>
                                <td><?php echo $row['id_matapelajaran']; ?></td>
                                <td><?php echo $row['open']; ?></td>
                                <td>
                                    <!-- Kolom untuk aksi, misalnya tombol edit atau hapus -->
                                    <!-- Isi dengan aksi yang diinginkan -->
                                    <div class=" btn-group">
                                        <!-- Tombol Edit -->
                                        <button type="button" class="btn btn-sm btn-warning mr-1" data-toggle="modal" data-target="#editModal<?php echo $row['id_jadwal']; ?>"><i class="fas fa-edit"></i></button>
                                        <!-- Tombol Hapus -->
                                        <a href="<?php echo base_url('admin/hapus_jadwal/' . $row['id_jadwal']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Jadwal ini?');">
                                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </a>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                </tbody>


                <!-- Modal Edit Data Guru -->
                <?php foreach ($jadwal as $row) { ?>
                    <div class="modal fade" id="editModal<?php echo $row['id_jadwal']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Jadwal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo site_url('admin/update_jadwal'); ?>" method="post">
                                        <div class="form-group">
                                            <label for="nama">ID Jadwal:</label>
                                            <input readonly class="form-control" name="id_jadwal" id="id_jadwal" value="<?php echo $row['id_jadwal']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="kelas">Hari:</label>
                                            <input type="text" class="form-control" name="hari" id="hari" value="<?php echo $row['hari']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="kelas">ID Mata Pelajaran:</label>
                                            <select name="id_matapelajaran" class="form-control">
                                                <option disabled value="">--Pilih Mata Pelajaran--</option>
                                                <?php foreach ($mata_pelajaran as $mata_pelajaran_row) : ?>
                                                    <option value="<?php echo $mata_pelajaran_row['id_matapelajaran']; ?>" <?php echo ($row['id_matapelajaran'] == $mata_pelajaran_row['id_matapelajaran']) ? 'selected' : ''; ?>><?php echo $mata_pelajaran_row['nama_matapelajaran']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Open:</label>
                                            <input type="text" class="form-control" name="open" id="open" value="<?php echo $row['open']; ?>" required>
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