-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 02:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinjamruang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(255) NOT NULL,
  `nama_mahasiswa` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nim_mahasiswa` char(12) NOT NULL,
  `id_organisasi` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `password`, `nim_mahasiswa`, `id_organisasi`) VALUES
(4, 'agung', '$2y$10$ysTw5zUiLOW2Zu2C1gXQzep2bpPfzewsZdd/Z4QErzxPVD1yjgA6a', '21', 1),
(5, 'abdul', '$2y$10$8TFV5kvx9tyJjYf5aHfyleFrBxlDNcbZmnjuSQYCSOq9ZfHUEQN56', '22', 3);

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE `organisasi` (
  `id_organisasi` int(255) NOT NULL,
  `nama_organisasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organisasi`
--

INSERT INTO `organisasi` (`id_organisasi`, `nama_organisasi`) VALUES
(1, 'Dewan Perwakilan Mahasiswa'),
(2, 'Badan Eksekutif Mahasiswa'),
(3, 'HIMA Prodi Manajemen'),
(4, 'HIMA Prodi Akuntansi'),
(5, 'HIMA Prodi Ekonomi Syariah'),
(6, 'HIMA Fakultas Teknik dan Desai'),
(7, 'HIMA Prodi Diploma'),
(8, 'UKM English Club'),
(9, 'UKM Bulu Tangkis'),
(10, 'UKM Band');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(10) NOT NULL,
  `nama_kegiatan` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time(6) NOT NULL,
  `jam_berakhir` time(6) NOT NULL,
  `peralatan` text NOT NULL,
  `id_mahasiswa` int(255) NOT NULL,
  `id_ruangan` char(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `nama_kegiatan`, `tanggal`, `jam_mulai`, `jam_berakhir`, `peralatan`, `id_mahasiswa`, `id_ruangan`, `status`) VALUES
(1, 'rapat Rutin', '2023-12-26', '09:01:14.960000', '16:01:14.000000', 'Mic, Proyektor', 4, 'A10', 'PENDING'),
(2, 'rapat dadakan', '2023-12-25', '05:09:59.000000', '17:09:59.000000', 'Mic', 5, 'A21', 'PENDING'),
(3, 'belajar', '2023-12-26', '13:00:00.000000', '18:00:00.000000', 'ruangan, mic, kabel, ', 4, 'A30', 'PENDING'),
(4, 'hehehe ', '1222-12-13', '07:00:00.000000', '08:09:00.000000', 'ruangan, kabel, ', 4, 'B12', 'PENDING'),
(5, 'hehehe ', '1222-12-13', '07:00:00.000000', '08:09:00.000000', 'ruangan, kabel, ', 4, 'B12', 'PENDING'),
(6, 'tuoto', '1414-12-14', '12:12:00.000000', '13:14:00.000000', 'ruangan, proyektor, ', 5, 'A11', 'PENDING'),
(7, 'tuoto', '1414-12-14', '12:12:00.000000', '13:14:00.000000', 'ruangan, proyektor, ', 5, 'A11', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` char(10) NOT NULL,
  `nama_ruangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
('A10', 'Ruang Kelas'),
('A11', 'Ruang Kelas'),
('A20', 'Laboratorium Komputer'),
('A21', 'Laboratorium Jaringan'),
('A30', 'Ruang Seminar'),
('A31', 'Ruang Bahasa'),
('B10', 'Lapangan Futsal'),
('B12', 'Lapangan Basket');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_organisasi` (`id_organisasi`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id_organisasi`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id_organisasi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_fkbk_1` FOREIGN KEY (`id_organisasi`) REFERENCES `organisasi` (`id_organisasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
