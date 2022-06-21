-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 05:58 PM
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
(18, 'VALORANT', 'NGGAK ADA DISKON', 'SEMOGA DIMUDAHKAN REJEKI ANDA', '18.jpg'),
(19, 'FREE DAY', 'Desc 1', 'Desc 2', '19.jpg'),
(20, 'BANnER', 'Belum Ada Diskon', '- - - - -', '20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `idpesanan` int(11) NOT NULL,
  `idvoucher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(11, 'VALORANT', 'Beli Points Valorant hanya dalam hitungan detik, yang tentunya cepat, aman dan mudah. Cukup pilih Voucher yang diinginkan, lakukan pembayaran, dan PointsValorant akan langsung dikirimkan.\r\nbermain valorant dengan penuh skin senjata sangat membanggakan\r\nmaka dari itu belilah points di toko sebalah', '11.jpg'),
(12, 'PUBGM', 'Beli Voucher PUBG Mobile (Global) hanya dalam hitungan detik, yang tentunya cepat, aman dan mudah. Cukup pilih Voucher yang diinginkan, lakukan pembayaran, dan Voucher PUBG Mobile (Global) akan langsung dikirimkan.\r\n', '12.jpg'),
(14, 'FREE FAYER', 'Top Up Free Fire hanya dalam hitungan detik. Cukup masukan ID Free Fire Anda. Pilih jumlah Diamond yang Anda inginkan, selesaikan pembayaran, dan Diamond akan secara langsung ditambahkan ke akun Free Fire Anda.           ', '14.jpg'),
(15, 'MOBILE LEGENDS', 'Top Up Mobile Legends hanya dalam hitungan detik. Cukup masukan ID dan Server Mobile Legends Anda. Pilih jumlah Diamond yang Anda inginkan, selesaikan pembayaran, dan Diamond akan secara langsung ditambahkan ke akun Mobile Legends Anda.', '15.jpg'),
(16, 'FREE FAYER', 'Yes            ', '16.jpg');

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
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `idmember` int(11) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `status` varchar(20) NOT NULL
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
(1, 'admin@gmail.com', '$2y$10$QnwDYs6/QyLQiRFWMHa6EONvbrYwQx4.6EGZhYfJNPikUkZRdRL6K', 'admin'),
(3, 'animeuniversal2@gmail.com', '$2y$10$81LJMHS3OIfYxQhSl8SnxO7bqjQ/QtCKQP9fD9y0x6qiojtTSqEeO', 'member'),
(4, 'yayainie@gmail.com', '$2y$10$hamjFzsjiG2T.dWn0TV6FOY2x2G2EzdGVeirWLBimp0jzg7DM5bhm', 'admin'),
(17, 'user@gmail.com', '$2y$10$ReMb.ReXXw/gOrSI47NCkuLjTKpi/GHuSt.Ool.QrE2TGNzSmNb4G', 'member'),
(20, 'ahmadnurhidaya103@gmail.com', '$2y$10$mwsepyJkaivZnNfRfAprjebqgaIMxRFHfsXH/eMb3evDnT4BEaLme', 'member'),
(26, 'bsmith@gmail.com', '$2y$10$wmERsLZWhtkPP.52DHYlc.ekkXEBVWEI9VU0HjyNb4tP88iAeSal6', 'member'),
(27, 'vinsmokeloverz@gmail.com', '$2y$10$JftNEcN.DdgOvSUstF1.m.XGSUhRCG7wyzS/4b6BqpmEPDib7xNLC', 'member');

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
(10, 'Points', '30', 3100, 11),
(11, 'Diamond', '10', 1500, 14),
(12, 'Diamond', '20', 2500, 14),
(13, 'Diamond', '30', 3500, 14),
(14, 'Diamond', '10', 1300, 15),
(15, 'Diamond', '20', 2300, 15),
(16, 'Diamond', '30', 3300, 15),
(17, 'Diamond', '12312', 124132432, 16),
(18, 'Diamond', '09', 123, 16);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user`
-- (See below for the actual view)
--
CREATE TABLE `v_user` (
`id` int(11)
,`email` varchar(30)
,`password` varchar(250)
,`role` varchar(10)
,`idmember` int(11)
,`fname` varchar(30)
,`lname` varchar(30)
);

-- --------------------------------------------------------

--
-- Structure for view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user`  AS SELECT `u`.`id` AS `id`, `u`.`email` AS `email`, `u`.`password` AS `password`, `u`.`role` AS `role`, `m`.`idmember` AS `idmember`, `m`.`fname` AS `fname`, `m`.`lname` AS `lname` FROM (`user` `u` left join `member` `m` on(`u`.`id` = `m`.`iduser`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`idpesanan`,`idvoucher`),
  ADD KEY `idvoucher` (`idvoucher`);

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
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmember` (`idmember`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`idpesanan`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`idvoucher`) REFERENCES `voucher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`idmember`) REFERENCES `member` (`idmember`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `voucher_ibfk_1` FOREIGN KEY (`idgame`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
