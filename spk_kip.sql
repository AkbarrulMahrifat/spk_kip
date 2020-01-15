-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2019 at 12:29 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_kip`
--

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `nilai_target` decimal(10,2) NOT NULL,
  `factor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `nilai_target`, `factor`) VALUES
(1, 'Penghasilan Keluarga', '4.00', 1),
(2, 'Status Kepemilikan Rumah', '4.00', 1),
(3, 'Luas Lantai Rumah', '4.00', 2),
(4, 'Jenis Dinding Terluas Rumah', '4.00', 2),
(5, 'Kepemilikan Aset Bergerak', '4.00', 1),
(6, 'Kepemilikan Aset Tidak Bergerak', '4.00', 1),
(7, 'Hewan Ternak Berkaki 4', '4.00', 2),
(8, 'Jumlah Tanggungan yang Masih Sekolah', '4.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_profil`
--

CREATE TABLE `nilai_profil` (
  `id_nilai_profil` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_profil`
--

INSERT INTO `nilai_profil` (`id_nilai_profil`, `id_siswa`, `id_kriteria`, `id_subkriteria`) VALUES
(2, 1, 2, 5),
(4, 1, 4, 15),
(5, 1, 5, 17),
(6, 1, 6, 19),
(9, 1, 1, 2),
(10, 1, 3, 9),
(11, 1, 7, 21),
(12, 1, 8, 26),
(13, 2, 1, 3),
(14, 2, 2, 6),
(15, 2, 3, 10),
(16, 2, 4, 14),
(17, 2, 5, 17),
(18, 2, 6, 18),
(19, 2, 7, 20),
(20, 2, 8, 26);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `asal_sekolah` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `nis`, `asal_sekolah`, `alamat`, `tempat_lahir`, `tanggal_lahir`) VALUES
(1, 'Maharani Setya Putri', '1234', 'SD Besuki 01', 'Besuki', 'Situbondo', '2001-05-18'),
(2, 'Andri Kurniawan', '1234', 'SDN 02 Besuki', 'Besuki', 'Situbondo', '2006-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `nilai_subkriteria` decimal(10,2) NOT NULL,
  `id_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `nama_subkriteria`, `nilai_subkriteria`, `id_kriteria`) VALUES
(1, '< 1.000.000', '4.00', 1),
(2, '1.000.000-5.000.000', '3.00', 1),
(3, '> 5.000.000-10.000.000', '2.00', 1),
(4, '> 10.000.000', '1.00', 1),
(5, 'Kontrak / Sewa', '4.00', 2),
(6, 'Milik Sendiri', '1.00', 2),
(7, '< 50 m2', '4.00', 3),
(8, '50 - 100 m2', '3.00', 3),
(9, '> 100 - 400 m2', '2.00', 3),
(10, '> 400 m2', '1.00', 3),
(11, 'Tembok kualitas tinggi', '1.00', 4),
(12, 'Tembok kualitas rendah', '2.00', 4),
(13, 'Kayu kualitas tinggi', '0.00', 4),
(14, 'Kayu kualitas rendah', '3.00', 4),
(15, 'Bambu', '4.00', 4),
(16, 'Memiliki kendaraan roda empat atau lebih', '0.00', 5),
(17, 'Tidak memiliki', '4.00', 5),
(18, 'Memiliki sawah/tanah', '0.00', 6),
(19, 'Tidak memiliki', '4.00', 6),
(20, 'Tidak memiliki', '4.00', 7),
(21, '1-2 ekor', '3.00', 7),
(22, '3 - 5 ekor', '2.00', 7),
(23, '> 5 - 10 ekor', '1.00', 7),
(24, '> 10 ekor', '0.00', 7),
(25, '0 anak', '1.00', 8),
(26, '1 anak', '2.00', 8),
(27, '2 - 4 anak', '3.00', 8),
(28, '> 4 anak', '4.00', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `jabatan`) VALUES
(1, 'Admin', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_profil`
--
ALTER TABLE `nilai_profil`
  ADD PRIMARY KEY (`id_nilai_profil`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_subkriteria` (`id_subkriteria`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nilai_profil`
--
ALTER TABLE `nilai_profil`
  MODIFY `id_nilai_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
