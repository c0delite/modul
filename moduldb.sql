-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2018 at 11:12 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moduldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `katkomplain`
--

CREATE TABLE `katkomplain` (
  `idKat` int(3) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `katkomplain`
--

INSERT INTO `katkomplain` (`idKat`, `kategori`) VALUES
(1, 'listrik'),
(2, 'air'),
(3, 'pendingin'),
(4, 'bangunan'),
(5, 'plumbing');

-- --------------------------------------------------------

--
-- Table structure for table `komplain`
--

CREATE TABLE `komplain` (
  `idKomplain` int(8) UNSIGNED ZEROFILL NOT NULL,
  `tglKomplain` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `katKomplain` varchar(25) NOT NULL,
  `detail` text NOT NULL,
  `tglUpdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `teknisi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `noktp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komplain`
--

INSERT INTO `komplain` (`idKomplain`, `tglKomplain`, `katKomplain`, `detail`, `tglUpdate`, `teknisi`, `status`, `noktp`) VALUES
(12345678, '2018-11-02 15:57:05', 'air', '', '2018-11-02 22:58:21', '', 'outstanding', '12345678901'),
(12345679, '2018-11-02 16:05:34', 'listrik', '', '0000-00-00 00:00:00', '', 'outstanding', '12345678901'),
(12345706, '2018-11-07 09:29:04', 'bangunan', 'asdadadasdsatyttrytyt', '0000-00-00 00:00:00', '', 'outstanding', '12345678901'),
(12345707, '2018-11-07 10:15:52', 'plumbing', 'disnini komplainan baru', '0000-00-00 00:00:00', '', 'outstanding', '12345678901'),
(12345708, '2018-11-07 10:16:51', 'pendingin', 'asdasd', '0000-00-00 00:00:00', '', 'outstanding', '12345678901'),
(12345709, '2018-11-07 10:19:42', 'listrik', 'asdasdasd', '0000-00-00 00:00:00', '', 'outstanding', '12345678901'),
(12345710, '2018-11-07 10:23:46', 'bangunan', 'aasdasdsa', '0000-00-00 00:00:00', '', 'outstanding', '12345678901'),
(12345711, '2018-11-07 10:24:17', 'pendingin', 'asdasda', '0000-00-00 00:00:00', '', 'outstanding', '12345678901'),
(12345712, '2018-11-07 10:24:38', 'pendingin', 'asdasdasdsa', '0000-00-00 00:00:00', '', 'outstanding', '12345678901'),
(12345713, '2018-11-07 10:25:00', 'bangunan', 'asdadasd', '0000-00-00 00:00:00', '', 'outstanding', '12345678901'),
(12345714, '2018-11-07 10:28:49', 'bangunan', 'asdadasd', '0000-00-00 00:00:00', '', 'outstanding', '12345678901'),
(12345715, '2018-11-07 10:30:10', 'plumbing', 'asdasdasd', '0000-00-00 00:00:00', '', 'outstanding', '12345678901'),
(12345717, '2018-11-08 09:14:42', 'listrik', 'asdada', '0000-00-00 00:00:00', '', 'outstanding', '12346578900');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `noktp` varchar(255) NOT NULL,
  `namaLengkap` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `tglLahir` date DEFAULT NULL,
  `kelamin` varchar(255) DEFAULT NULL,
  `notlp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `idUnit` int(3) DEFAULT NULL,
  `idTower` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`noktp`, `namaLengkap`, `agama`, `tglLahir`, `kelamin`, `notlp`, `email`, `idUnit`, `idTower`) VALUES
('12345678901', 'max john', 'islam', '1990-10-18', 'pria', '08771040406', 'maxjohn@gmail.com', 2, 1),
('12346578900', 'charlie espanda', 'budha', '1988-04-11', 'laki', '09123872632', 'charlie123@gmail.com', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tower`
--

CREATE TABLE `tower` (
  `idTower` int(3) NOT NULL,
  `namaTower` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tower`
--

INSERT INTO `tower` (`idTower`, `namaTower`) VALUES
(1, 'gandaria'),
(2, 'lumajang');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `idUnit` int(3) NOT NULL,
  `noUnit` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`idUnit`, `noUnit`) VALUES
(1, '101'),
(2, '102'),
(3, '103'),
(4, '104'),
(5, '105');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `noKtp` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`noKtp`, `username`, `password`, `role`) VALUES
('12345678901', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
('12346578900', 'charles102', 'a5410ee37744c574ba5790034ea08f79', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `katkomplain`
--
ALTER TABLE `katkomplain`
  ADD PRIMARY KEY (`idKat`);

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`idKomplain`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`noktp`),
  ADD KEY `fk_unit` (`idUnit`),
  ADD KEY `fk_tower` (`idTower`);

--
-- Indexes for table `tower`
--
ALTER TABLE `tower`
  ADD PRIMARY KEY (`idTower`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`idUnit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`noKtp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `katkomplain`
--
ALTER TABLE `katkomplain`
  MODIFY `idKat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `komplain`
--
ALTER TABLE `komplain`
  MODIFY `idKomplain` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345718;
--
-- AUTO_INCREMENT for table `tower`
--
ALTER TABLE `tower`
  MODIFY `idTower` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `idUnit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `fk_tower` FOREIGN KEY (`idTower`) REFERENCES `tower` (`idTower`),
  ADD CONSTRAINT `fk_unit` FOREIGN KEY (`idUnit`) REFERENCES `unit` (`idUnit`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
