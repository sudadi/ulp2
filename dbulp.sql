-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 Jan 2018 pada 20.19
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbulp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `refmenu`
--

CREATE TABLE `refmenu` (
  `idmenu` int(3) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `sub` tinyint(4) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `refsubunit`
--

CREATE TABLE `refsubunit` (
  `idsubunit` smallint(3) NOT NULL,
  `idunit` smallint(3) NOT NULL,
  `nmsubunit` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `refsubunit`
--

INSERT INTO `refsubunit` (`idsubunit`, `idunit`, `nmsubunit`) VALUES
(1, 1, 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `refunit`
--

CREATE TABLE `refunit` (
  `idunit` smallint(3) NOT NULL,
  `nmunit` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `refunit`
--

INSERT INTO `refunit` (`idunit`, `nmunit`) VALUES
(1, 'Administrator'),
(5, 'BIDANG PELAYANAN MEDIK'),
(6, 'BIDANG PELAYANAN KEPERAWATAN'),
(7, 'BAGIAN AKUNTANSI'),
(8, 'BAGIAN PERBENDAHARAAN DAN MONA'),
(9, 'BAGIAN UMUM'),
(10, 'BAGIAN SUMBER DAYA MANUSIA'),
(11, 'BAGIAN PENDIDIKAN DAN PENELITIAN'),
(12, 'INSTALASI REHAB MEDIK'),
(13, 'INSTALASI RADIOLOGI'),
(14, 'INSTALASI PATOLOGI KLINIK'),
(15, 'INSTALASI FARMASI'),
(16, 'INSTALASI RAWAT JALAN'),
(17, 'INSTALASI GAWAT DARURAT'),
(18, 'INSTALASI RAWAT KHUSUS'),
(19, 'INSTALASI RAWAT INTENSIF'),
(20, 'INSTALASI RAWAT INAP'),
(21, 'INSTALASI LOGISTIK'),
(22, 'INSTALASI REKAM MEDIS'),
(23, 'INSTALASI SISTEM INFORMASI RUMAH SAKIT'),
(24, 'INSTALASI LAUNDRY'),
(25, 'INSTALASI GIZI'),
(26, 'INSTALASI KESLING DAN K3'),
(27, 'INSTALASI PEMELIHARAAN SARANA RUMAH SAKIT'),
(28, 'UNIT LAYANAN PENGADAAN'),
(29, 'INSTALASI PEMBUATAN DAN PEMELIHARAAN ALAT PENUNJANG PELAYANAN'),
(30, 'KOMITE MEDIK'),
(31, 'SPI'),
(32, 'KOMITE KEPERAWATAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `takses`
--

CREATE TABLE `takses` (
  `id` int(11) NOT NULL,
  `idmenu` int(6) NOT NULL,
  `iduser` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tuser`
--

CREATE TABLE `tuser` (
  `iduser` int(11) NOT NULL,
  `nmlogin` varchar(25) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nmasli` varchar(100) NOT NULL,
  `tipeusr` smallint(1) NOT NULL COMMENT '1:admin; 2:user',
  `idsubunit` smallint(3) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `passupd` tinyint(1) NOT NULL,
  `lastlog` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tuser`
--

INSERT INTO `tuser` (`iduser`, `nmlogin`, `password`, `nmasli`, `tipeusr`, `idsubunit`, `status`, `passupd`, `lastlog`) VALUES
(3, 'admin', '3870ba93383baccaa3c4ca9a37130b4de1751c44', 'Administrator', 1, 1, 1, 0, '2018-01-08 03:17:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `refmenu`
--
ALTER TABLE `refmenu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indexes for table `refsubunit`
--
ALTER TABLE `refsubunit`
  ADD PRIMARY KEY (`idsubunit`),
  ADD UNIQUE KEY `idsubunit` (`idsubunit`,`idunit`),
  ADD KEY `idunit` (`idunit`);

--
-- Indexes for table `refunit`
--
ALTER TABLE `refunit`
  ADD PRIMARY KEY (`idunit`);

--
-- Indexes for table `takses`
--
ALTER TABLE `takses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmenu` (`idmenu`,`iduser`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `FK_user_subunit` (`idsubunit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `refmenu`
--
ALTER TABLE `refmenu`
  MODIFY `idmenu` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `refsubunit`
--
ALTER TABLE `refsubunit`
  MODIFY `idsubunit` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `refunit`
--
ALTER TABLE `refunit`
  MODIFY `idunit` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `takses`
--
ALTER TABLE `takses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `refsubunit`
--
ALTER TABLE `refsubunit`
  ADD CONSTRAINT `refsubunit_ibfk_1` FOREIGN KEY (`idunit`) REFERENCES `refunit` (`idunit`);

--
-- Ketidakleluasaan untuk tabel `tuser`
--
ALTER TABLE `tuser`
  ADD CONSTRAINT `FK_user_subunit` FOREIGN KEY (`idsubunit`) REFERENCES `refsubunit` (`idsubunit`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
