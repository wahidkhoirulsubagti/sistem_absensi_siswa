<div class="card">
    <div class=" card-header">
        <div class="">
            <h2 class=" card-title">Data Rekapitulasi</h2>
        </div>
        <button type="button" class="btn btn-info mb-3" id="btnCetak" onclick="cetakTranskrip()"> <i class="fas fa-print fa-sm"></i> &nbsp; Cetak Rekapitulasi
        </button>

        <style>
            .larger-text {
                font-size: 20px;
                /* Ubah ukuran sesuai keinginan Anda */
            }
        </style>

        <center class="mb-3">
            <legend class="mt-3 larger-text" id="btnJudul"><strong>Kartu Rekapitulasi Siswa SMA Taman Harapan 1 </strong></legend>
        </center>

        <style>
            .transkrip {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 10vh;
                /* Menggunakan tinggi 100% dari viewport */
            }

            .transkrip img {
                height: 15x;
            }
        </style>

        <body>
            <div class="transkrip justify-content-center">
                <img height="100px" src="<?php echo base_url() ?>assets/img/logotamhar.png" alt="..">
                <br>
            </div>
            <div class="text-center" id="tanggal_rekap" style="display: none;"></div>
            <div id="btnCariRekap">
                <a href="<?php echo base_url() ?>" class="btn btn-primary"><i class="fas fa-search"></i> Cari Rekap Absensi</a>
            </div>
    </div>
    <div class=" card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th class="text-center">Masuk</th>
                        <th class="text-center">Sakit</th>
                        <th class="text-center">Ijin</th>
                        <th class="text-center">Alpa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($rekapitulasi) && !empty($rekapitulasi)) :
                        $no = 1;
                        $displayedNIS = array(); // Untuk melacak NIS yang sudah ditampilkan

                        foreach ($rekapitulasi as $row) :
                            // Periksa apakah NIS sudah ditampilkan sebelumnya
                            if (!in_array($row['nis'], $displayedNIS)) :
                                $displayedNIS[] = $row['nis']; // Tambahkan NIS ke daftar yang sudah ditampilkan
                    ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nis']; ?></td>
                                    <td><?php echo $row['nama_siswa']; ?></td>
                                    <td><?php echo $row['nama_kelas']; ?></td>
                                    <td class="text-center"><?php echo isset($rekapitulasi_counts[$row['nis']]['Masuk']) ? $rekapitulasi_counts[$row['nis']]['Masuk'] : '-'; ?></td>
                                    <td class="text-center"><?php echo isset($rekapitulasi_counts[$row['nis']]['Sakit']) ? $rekapitulasi_counts[$row['nis']]['Sakit'] : '-'; ?></td>
                                    <td class="text-center"><?php echo isset($rekapitulasi_counts[$row['nis']]['Ijin']) ? $rekapitulasi_counts[$row['nis']]['Ijin'] : '-'; ?></td>
                                    <td class="text-center"><?php echo isset($rekapitulasi_counts[$row['nis']]['Alpa']) ? $rekapitulasi_counts[$row['nis']]['Alpa'] : '-'; ?></td>

                                </tr>
                        <?php
                            endif; // Akhir dari periksa NIS
                        endforeach;
                        ?>
                </tbody>



                <!-- Modal Edit Data Guru -->
                <?php foreach ($rekapitulasi as $row) { ?>
                    <div class="modal fade" id="editModal<?php echo $row['nis']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Data Absensi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo site_url('admin/update_rekapitulasi'); ?>" method="post">
                                        <div class="form-group">
                                            <label for="kelas">Nis:</label>
                                            <input readonly type="text" class="form-control" name="nis" id="nis" value="<?php echo $row['nis']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="kelas">Nama Siswa:</label>
                                            <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" value="<?php echo $row['nama_siswa']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="tanggal">Tanggal Absensi:</label>
                                            <input type="date" class="form-control" name="tgl_rekap" id="tgl_rekap" value="<?php echo $row['tgl_rekap']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Keterangan:</label>
                                            <select class="form-control" name="keterangan" id="keterangan">
                                                <option disabled selected value="">--Pilih Keterangan--</option>
                                                <option value="Masuk" <?php echo ($row == 'Masuk') ? 'selected' : ''; ?>>Masuk</option>
                                                <option value="Sakit" <?php echo ($row == 'Sakit') ? 'selected' : ''; ?>>Sakit</option>
                                                <option value="Ijin" <?php echo ($row == 'Ijin') ? 'selected' : ''; ?>>Ijin</option>
                                                <option value="Alpa" <?php echo ($row == 'Alpa') ? 'selected' : ''; ?>>Alpa</option>
                                                <option value="Mati" <?php echo ($row == 'Mati') ? 'selected' : ''; ?>>Mati</option>
                                            </select>
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
<style>
    /* Gaya tombol cetak pada layar */
    #btnCetak {
        display: block;
        color: white;
        position: absolute;
        right: 40px;
        top: 60px;
    }

    /* Gaya tombol cetak saat dicetak */
    @media print {

        .dataTables_filter,
        .dataTables_length,
        .dataTables_paginate {
            display: none !important;
        }

        #tanggal_rekap {
            display: block !important;
        }

        #btnCetak,
        #btnCariRekap,
        #btntambah,
        #aksi {
            display: none;
        }

        #btnExport {
            display: none;
        }

        #tanggal {
            display: none;
        }

        #btnMin,
        #btnMax {
            display: none;
        }

        #txtMin,
        #txtMax {
            display: none;
        }

        .sidebar {
            display: none;
        }

    }

    /* Menyusun tampilan cetak dengan rapi */
    .container-fluid {
        width: 95%;
        margin: 20px auto;
        font-size: 14px;
    }

    .responsive {
        overflow-x: auto;
    }


    th,
    td {
        padding: 5px;
    }

    legend {
        font-size: 14px;
    }

    /* Menyembunyikan footer ketika dicetak */
    .footer {
        display: none;
    }
</style>

<script>
    // Daftar nama hari dalam Bahasa Indonesia
    var namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    // Daftar nama bulan dalam Bahasa Indonesia
    var namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    // Ambil elemen dengan ID "tanggal_rekap"
    var tanggalRekapElemen = document.getElementById('tanggal_rekap');

    // Dapatkan tanggal saat ini
    var today = new Date();
    var hari = namaHari[today.getDay()];
    var tanggal = today.getDate();
    var bulan = namaBulan[today.getMonth()];
    var tahun = today.getFullYear();

    // Buat format tanggal yang diinginkan
    var formattedDate = hari + ', ' + tanggal + ' ' + bulan + ' ' + tahun;

    // Masukkan tanggal saat ini ke dalam elemen
    tanggalRekapElemen.textContent = 'Tanggal Rekap: ' + formattedDate;
</script>

<script>
    // Fungsi tombol cetak
    function cetakTranskrip() {
        window.print();
    }
</script>