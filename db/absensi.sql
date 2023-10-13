-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 04:35 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `id_jadwal` varchar(10) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `nis`, `id_jadwal`, `id_kelas`, `keterangan`, `tanggal`) VALUES
(7, '901111012', 'KAM105', 'KA10C', 'Ijin', '2023-10-12'),
(8, '901111012', 'JUM106', 'KA10C', 'Masuk', '2023-10-11'),
(9, '901111013', 'JUM106', 'KE11A', 'Masuk', '2023-10-12'),
(11, '901111012', 'JUM106', 'KA10C', 'Masuk', '2023-10-12'),
(12, '901111012', 'KAM105', 'KA10C', 'Masuk', '2023-10-10'),
(13, '901111013', 'JUM106', 'KE11A', 'Masuk', '2023-10-13'),
(14, '901111016', 'JUM106', 'KA10A', 'Masuk', '2023-10-13'),
(15, '901111016', 'JUM106', 'KA10A', 'Masuk', '2023-10-13'),
(17, '901111016', 'KAM105', 'KA10A', 'Sakit', '2023-10-13'),
(18, '901111016', 'JUM106', 'KA10A', 'Masuk', '2023-10-13'),
(19, '901111013', 'KAM105', 'KE11A', 'Masuk', '2023-10-13'),
(20, '901111012', 'JUM106', 'KA10C', 'Masuk', '2023-10-13'),
(21, '901111013', 'JUM106', 'KE11A', 'Sakit', '2023-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(10) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `tgl_lhr_guru` date NOT NULL,
  `jk_guru` varchar(10) NOT NULL,
  `agama_guru` varchar(20) NOT NULL,
  `alamat_guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `id_kelas`, `tgl_lhr_guru`, `jk_guru`, `agama_guru`, `alamat_guru`) VALUES
('202203002', 'Gini Indriyanti', 'KF11A', '1988-06-09', 'Perempuan', 'Islam', 'JL Sunan Kali Jaga Kel Jatiasih Bekasi'),
('202203003', 'Lilis Wijayanti', 'KF11C', '1999-06-09', 'Perempuan', 'Islam', 'JL Pejuang Jaya No 1 Kel Pejuang Bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `id_matapelajaran` varchar(10) NOT NULL,
  `open` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `id_matapelajaran`, `open`) VALUES
('JUM106', 'Jumat', 'FIS107', 'Terbuka'),
('KAM105', 'Kamis', 'EKO111', 'Terbuka'),
('RAB112', 'Rabu', 'BIO104', 'Terbuka'),
('SAB107', 'Sabtu', 'MAT103', 'Terbuka');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
('KA10A', '10 IPA 1'),
('KA10B', '10 IPA 2'),
('KA10C', '10 IPA 3'),
('KD10A', '10 IPS 1'),
('KD10B', '10 IPS 2'),
('KD10C', '10 IPS 3'),
('KE11A', '11 IPA 1'),
('KE11B', '11 IPA 2'),
('KE11C', '11 IPA 3'),
('KF11A', '11 IPS 1'),
('KF11B', '11 IPS 2'),
('KF11C', '11 IPS 3'),
('KG12A', '12 IPA 1'),
('KG12B', '12 IPA 2'),
('KG12C', '12 IPA 3'),
('KH12A', '12 IPS 1'),
('KH12B', '12 IPS 2'),
('KH12C', '12 IPS 3'),
('KJ11B', '12 IPA 1');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_matapelajaran` varchar(10) NOT NULL,
  `nama_matapelajaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_matapelajaran`, `nama_matapelajaran`) VALUES
('BIA102', 'Bahasa Indonesia'),
('BIN101', 'Bahasa Inggris'),
('BIO104', 'Biologi'),
('BSA105', 'Bahasa Arab'),
('EKO111', 'Ekonomi'),
('FIS107', 'Fisika'),
('GEO108', 'Geografi'),
('IPA113', 'Ilmu Pengetahuan Alam'),
('KIM106', 'Kimia'),
('MAT103', 'Matematika'),
('PAI118', 'Pendidikan Agama Islam'),
('PJO119', 'Pendidikan Jasmani Olahraga dan Kesehatan'),
('SEH110', 'Sejarah'),
('SNB115', 'Seni Budaya');

-- --------------------------------------------------------

--
-- Table structure for table `rekapitulasi`
--

CREATE TABLE `rekapitulasi` (
  `nis` varchar(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tgl_rekap` date NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekapitulasi`
--

INSERT INTO `rekapitulasi` (`nis`, `nama_siswa`, `tgl_rekap`, `keterangan`) VALUES
('2', '2', '2023-10-25', 'Sakit');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(10) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `id_kelas` varchar(11) NOT NULL,
  `tgl_lhr_siswa` date NOT NULL,
  `jk_siswa` varchar(15) NOT NULL,
  `agama_siswa` varchar(11) NOT NULL,
  `alamat_siswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `id_kelas`, `tgl_lhr_siswa`, `jk_siswa`, `agama_siswa`, `alamat_siswa`) VALUES
('901111012', 'Gideon Tri Mulyanto', 'KA10C', '2023-10-13', 'Perempuan', 'Hindu', 'jl Mustika Jaya'),
('901111013', 'RIfky Yusuf Mahfudz', 'KE11A', '2023-10-06', 'Laki-Laki', 'Lainnya', 'JL.Rawasilam 3'),
('901111016', 'Wahid', 'KA10A', '2023-10-07', 'Laki-Laki', 'Islam', 'jl kenangan baru');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email_user` varchar(25) NOT NULL,
  `level` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `password`, `email_user`, `level`) VALUES
('guru', 'guru', 'guru@gmail.com', '2'),
('siswa', 'siswa', 'siswa@gmail.com', '3'),
('wahid', 'wahid123', 'wahid@gmail.com', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_matapelajaran` (`id_matapelajaran`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_matapelajaran`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absensi_ibfk_3` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_matapelajaran`) REFERENCES `mata_pelajaran` (`id_matapelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
