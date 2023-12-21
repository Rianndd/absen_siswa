-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 06:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(10) NOT NULL,
  `id_siswa` int(8) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_siswa`, `nama`, `foto`, `jam_masuk`, `jam_keluar`, `tanggal`) VALUES
(64, 4, 'Riandro Shevara', '20230508122411.png', '12:24:11', '00:00:00', '2023-05-08'),
(66, 4, 'Riandro Shevara', '20230509124320.png', '12:43:20', '12:43:30', '2023-05-09'),
(68, 8, 'asdaf', '20230509131550.png', '01:15:50', '01:15:54', '2023-05-09'),
(71, 11, 'Apip', '20230523093816.png', '09:38:17', '09:39:10', '2023-05-23'),
(73, 4, 'Riandro Shevara', '20230524132723.png', '01:27:23', '01:40:39', '2023-05-24'),
(75, 10, 'bgaas', '20230524135822.png', '01:58:22', '01:59:18', '2023-05-24'),
(76, 9, 'kila', '20230524135950.png', '01:59:50', '02:00:05', '2023-05-24'),
(77, 12, 'Ikhsan Ramadani', '20230524142741.png', '02:27:41', '02:27:48', '2023-05-24'),
(78, 13, 'abu', '20230524143117.png', '02:31:17', '00:00:00', '2023-05-24'),
(80, 9, 'kila', '20230919112309.png', '11:23:09', '00:00:00', '2023-09-19'),
(81, 4, 'Riandro Shevara', '20230925140540.png', '02:05:40', '00:00:00', '2023-09-25'),
(82, 9, 'kila', '20230925143527.png', '02:35:27', '00:00:00', '2023-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `id_siswa` int(10) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('siswa','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`id_siswa`, `nis`, `nama`, `kelas`, `alamat`, `username`, `password`, `level`) VALUES
(4, '1234', 'Riandro Shevara', 'XI RB', 'suruh', 'riandro', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(7, '3434', 'pablo', 'XI RA', 'tsmd', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(8, '1234', 'asdaf', 'XI RC', 'ascsac', 'juan', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(9, '3333', 'kila', 'XI RA', 'ad', 'kila', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(10, '3434', 'bgaas', 'XI RB', 'kra', 'bagas', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(11, '3676', 'Apip', 'XI RB', 'kayuapak', 'afifnm', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(12, '8072', 'Ikhsan Ramadani', 'XI RB', 'Dondong', 'Xsanz', 'f29821f34032f9d10db58feb4b76c769', 'siswa'),
(13, '7979', 'abu', 'XI RB', 'ngadiluwih', 'abu', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(14, '8089', 'Rahmat', 'XI RB', 'tsmd', 'rahmat', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
