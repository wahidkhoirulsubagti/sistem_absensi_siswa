<div class="card">
    <div class=" card-header">
        <div class="">
            <h2 class=" card-title">Data Kelas</h2>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahKelas"><i class="fas fa-plus"></i> Tambah Kelas</button>

    </div>
    <div class=" card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>

                        <th>Id Kelas</th>
                        <th>Nama Kelas</th>
                        <th class=" text-center">Aksi</th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kelas as $row) : ?>
                        <tr>
                            <td><?php echo $row['id_kelas']; ?></td>
                            <td><?php echo $row['nama_kelas']; ?></td>

                            
                            <td class=" text-center"> <!-- Kolom untuk aksi, misalnya tombol edit atau hapus -->
                                <!-- Isi dengan aksi yang diinginkan -->

                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal_kelas<?php echo $row['id_kelas']; ?>"><i class="fas fa-edit"></i></button>
                                <!-- Tombol Hapus -->
                                <a href="<?php echo base_url('admin/hapus_kelas/' . $row['id_kelas']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?');">
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

                <!-- Modal Edit Data Kelas -->
                <?php foreach ($kelas as $row) { ?>
                    <div class="modal fade" id="editModal_kelas<?php echo $row['id_kelas']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Data Kelas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo site_url('admin/update_kelas'); ?>" method="post">
                                        <div class="form-group">
                                            <label for="nama">ID Kelas:</label>
                                            <input readonly class="form-control" name="id_kelas" id="id_kelas" value="<?php echo $row['id_kelas']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="kelas">Nama Kelas:</label>
                                            <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" value="<?php echo $row['nama_kelas']; ?>" required>
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