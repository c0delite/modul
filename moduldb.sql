-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2018 at 05:10 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `idKomplain` varchar(8) NOT NULL,
  `tglKomplain` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `katKomplain` varchar(25) NOT NULL,
  `tglUpdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `teknisi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `noktp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komplain`
--

INSERT INTO `komplain` (`idKomplain`, `tglKomplain`, `katKomplain`, `tglUpdate`, `teknisi`, `status`, `noktp`) VALUES
('12345678', '2018-11-02 15:57:05', 'air', '2018-11-02 22:58:21', '', 'outstanding', '12345678901'),
('12345679', '2018-11-02 16:05:34', 'listrik', '0000-00-00 00:00:00', '', 'outstanding', '12345678901');

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
('12345678901', 'max john', 'islam', '1990-10-18', 'pria', '08771040406', 'maxjohn@gmail.com', 2, 1);

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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`noKtp`, `username`, `password`) VALUES
('12345678901', 'admin', '21232f297a57a5a743894a0e4a801fc3');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
