-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 12:06 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topupstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi1` varchar(200) NOT NULL,
  `deskripsi2` varchar(200) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `nama`, `deskripsi1`, `deskripsi2`, `foto`) VALUES
(9, 'VALORANT', 'Diskon 100%', 'Beli yok Biar saya bisa Liburan Kemana-mana', '9.jpg'),
(10, 'PUBGM', 'NGGAK ADA DISKON', 'Beli yok Biar saya bisa Liburan Kemana-mana', '10.jpg'),
(11, 'DISKON STENGAH_STENGAH', 'Diskon 50%', 'Yuk Buruan Beli selagi Diskon 50%', '11.jpg'),
(13, 'FREE FAYER MEX', 'NGGAK ADA DISKON', 'Yuk Buruan Beli selagi Diskon 100%', '13.jpg'),
(14, 'NO DISCONT-DISCONT', 'NGGAK ADA DISKON', 'KESETIAAN PEMBELI KETIKA TIDAK ADA DISKON', '14.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `nama`, `deskripsi`, `foto`) VALUES
(11, 'VALORANT', 'bermain valorant dengan penuh skin senjata sangat membanggakan\r\nmaka dari itu belilah points di toko sebalah', '11.jpg'),
(12, 'PUBGM', 'PpPpP\r\n', '12.jpg'),
(13, 'FREE FAYER', 'Game Burik	            ', '13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `genre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `genre`) VALUES
(4, 'Battle Royal'),
(5, 'Adventure'),
(6, 'Sport'),
(7, 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `genregames`
--

CREATE TABLE `genregames` (
  `idgame` int(11) NOT NULL,
  `idgenre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nominal` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `idgame` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `nama`, `nominal`, `harga`, `idgame`) VALUES
(1, 'UC', '10', 1000, 12),
(2, 'UC', '20', 2100, 12),
(3, 'Diamond', '13 ', 1000, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genregames`
--
ALTER TABLE `genregames`
  ADD KEY `idgame` (`idgame`),
  ADD KEY `idgenre` (`idgenre`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idgame` (`idgame`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `genregames`
--
ALTER TABLE `genregames`
  ADD CONSTRAINT `genregames_ibfk_1` FOREIGN KEY (`idgame`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `genregames_ibfk_2` FOREIGN KEY (`idgenre`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `voucher_ibfk_1` FOREIGN KEY (`idgame`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
