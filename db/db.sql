-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 06:56 PM
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
(15, 'DISC GILA-GILAAN', 'Diskon 100%', 'Yuk Buruan Beli selagi Diskon 100%', '15.jpg'),
(16, 'BUY ONE GET ONE ', 'NGGAK ADA DISKON', 'Beli yok Biar saya bisa Liburan Kemana-mana', '16.jpg'),
(17, '6/6 Murah MERIAH', 'BELI BANYAK BANYAK', 'SEMOGA DIMUDAHKAN REJEKI ANDA', '17.jpg');

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
(12, 'PUBGM', 'PpPpP\r\n', '12.jpg');

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
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `idmember` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`) VALUES
(1, 'admin@gmail.com', '$2y$10$jJQIbzAFXdTHhToneHVXYO4cGBTG3x.Z.RG3trYOPuzLbf1DSsKMu', 'admin'),
(3, 'animeuniversal2@gmail.com', '$2y$10$81LJMHS3OIfYxQhSl8SnxO7bqjQ/QtCKQP9fD9y0x6qiojtTSqEeO', 'member'),
(4, 'yayainie@gmail.com', '$2y$10$hamjFzsjiG2T.dWn0TV6FOY2x2G2EzdGVeirWLBimp0jzg7DM5bhm', 'admin'),
(16, 'bsmith@gmail.com', '$2y$10$S9ktD/tNqKpTM/KmyQyJieer3lONSE5B2vePt56Zu.2iiNOmLZ7Fm', 'member'),
(17, 'user@gmail.com', '$2y$10$ReMb.ReXXw/gOrSI47NCkuLjTKpi/GHuSt.Ool.QrE2TGNzSmNb4G', 'member'),
(18, 'bsmith@gmail.com', '$2y$10$QZ14.56rDzaS32x6lT4h7.j1XMa2YEuz8a8BbcfVBItjuSalRX6K.', 'member'),
(19, 'bsmith@gmail.com', '$2y$10$jTIdT6MJJgxE1q4uoTJPle5brvEBfDxY4R1EGIFwAN6YrrV4RsWQa', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `matauang` varchar(30) NOT NULL,
  `nominal` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `idgame` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `matauang`, `nominal`, `harga`, `idgame`) VALUES
(1, 'UC', '10', 1000, 12),
(2, 'UC', '20', 2100, 12),
(7, 'UC', '30', 3100, 12),
(8, 'Points', '10', 1100, 11),
(9, 'Points', '20', 2100, 11),
(10, 'Points', '30', 3100, 11);

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
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idmember`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `idmember` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `voucher_ibfk_1` FOREIGN KEY (`idgame`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
