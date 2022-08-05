-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 04:07 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spetnaz_if6_kepegawaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(20) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
('ADM-876', 'Hafiz Admin', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` varchar(20) NOT NULL,
  `nama_golongan` varchar(30) DEFAULT NULL,
  `tunjangan_anak` varchar(40) DEFAULT NULL,
  `tunjangan_istri` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `nama_golongan`, `tunjangan_anak`, `tunjangan_istri`) VALUES
('GL-489', 'III', '500000', '500000'),
('GL-645', 'II', '300000', '500000'),
('GL-678', 'I', '200000', '450000');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(20) NOT NULL,
  `nama_jabatan` varchar(20) DEFAULT NULL,
  `gaji_pokok` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`) VALUES
('JBT-32', 'Mekanik', '2500000'),
('JBT-338', 'Manager', '6000000'),
('JBT-892', 'Staff', '5000000');

-- --------------------------------------------------------

--
-- Table structure for table `jadwalkerja`
--

CREATE TABLE `jadwalkerja` (
  `id_jadwal_kerja` varchar(20) NOT NULL,
  `hari_kerja` varchar(30) DEFAULT NULL,
  `jam_kerja` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwalkerja`
--

INSERT INTO `jadwalkerja` (`id_jadwal_kerja`, `hari_kerja`, `jam_kerja`) VALUES
('JDW-230', 'Jumat, Kamis, Sabtu', '18.00 - 22.00'),
('JDW-523', 'Senin, Selasa, Jum\'at', '08.00 - 19.00'),
('JDW-848', 'Kamis, Jumat, Minggu', '12.00 - 22.00');

-- --------------------------------------------------------

--
-- Table structure for table `logjabatan`
--

CREATE TABLE `logjabatan` (
  `old_jabatan` varchar(50) DEFAULT NULL,
  `new_jabatan` varchar(50) DEFAULT NULL,
  `last_update` varchar(90) DEFAULT NULL,
  `id_pegawai` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logjabatan`
--

INSERT INTO `logjabatan` (`old_jabatan`, `new_jabatan`, `last_update`, `id_pegawai`) VALUES
('JBT-32', 'JBT-338', '2022-08-05 16:10:47', 'PGW-625'),
('JBT-338', 'JBT-338', '2022-08-05 20:31:07', 'PGW-625');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(20) NOT NULL,
  `id_golongan` varchar(20) DEFAULT NULL,
  `id_jabatan` varchar(20) DEFAULT NULL,
  `id_jadwal_kerja` varchar(20) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `status` enum('Sudah Menikah','Belum Menikah') DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_golongan`, `id_jabatan`, `id_jadwal_kerja`, `nip`, `nama_pegawai`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `status`, `agama`, `email`, `password`) VALUES
('PGW-625', 'GL-678', 'JBT-338', 'JDW-523', '62ec17e1b3446', 'Akhmat Grozny Kamufalse', 'Laki-Laki', 'Grozny', '2002-01-01', 'Grozny City', '0643892', 'Sudah Menikah', 'Islam', 'akhmatgrozny@gmail.com', 'Akhmat123.'),
('PGW-816', 'GL-489', 'JBT-338', 'JDW-848', '62ea4b81c4af6', 'Hafiz Herla Firmansyah', 'Laki-Laki', 'Bandung', '2002-07-18', 'PIK, gg. Senggol, Kel. Citayem, Kota. Depok', '081214893355', 'Belum Menikah', 'Islam', 'hafizherla18@gmail.com', 'Hafiz123.');

--
-- Triggers `pegawai`
--
DELIMITER $$
CREATE TRIGGER `after_jabatan_update` AFTER UPDATE ON `pegawai` FOR EACH ROW BEGIN
    INSERT INTO logJabatan VALUES (OLD.id_jabatan, NEW.id_jabatan, now(), OLD.id_pegawai);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penggajian`
--

CREATE TABLE `penggajian` (
  `id_penggajian` varchar(30) NOT NULL,
  `id_pegawai` varchar(30) DEFAULT NULL,
  `total_gaji` varchar(40) DEFAULT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penggajian`
--

INSERT INTO `penggajian` (`id_penggajian`, `id_pegawai`, `total_gaji`, `date`) VALUES
('PGJ-91', 'PGW-625', 'Rp. 6.650.000,00', '2022-08-05 20:35:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jadwalkerja`
--
ALTER TABLE `jadwalkerja`
  ADD PRIMARY KEY (`id_jadwal_kerja`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_golongan` (`id_golongan`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_jadwal_kerja` (`id_jadwal_kerja`);

--
-- Indexes for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id_penggajian`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id_golongan`),
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`),
  ADD CONSTRAINT `pegawai_ibfk_3` FOREIGN KEY (`id_jadwal_kerja`) REFERENCES `jadwalkerja` (`id_jadwal_kerja`);

--
-- Constraints for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD CONSTRAINT `penggajian_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
