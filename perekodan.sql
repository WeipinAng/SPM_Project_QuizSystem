-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2021 at 10:38 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perekodan`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` varchar(10) NOT NULL,
  `peranan` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `katalaluan` varchar(10) NOT NULL,
  `notel` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `peranan`, `nama`, `katalaluan`, `notel`) VALUES
('G0000', 'admin', 'ADMIN', 'admin', '0193678901'),
('G0005', 'guru', 'Liew Pei Sze', 'peisze90', '0164899354'),
('G0006', 'guru', 'Lee Yeng Yeng', 'yengyeng95', '0145982133'),
('M0001', 'murid', 'Chia Yee Kin', 'cyk0129', '0123970542'),
('M0002', 'murid', 'Loh Wei Bin', 'lwb1130', '0165923019');

-- --------------------------------------------------------

--
-- Table structure for table `perekodan`
--

CREATE TABLE `perekodan` (
  `idrekod` varchar(10) NOT NULL,
  `tarikh` varchar(10) NOT NULL,
  `markah` varchar(5) NOT NULL,
  `gred` varchar(2) NOT NULL,
  `idpengguna` varchar(10) NOT NULL,
  `idtopik` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perekodan`
--

INSERT INTO `perekodan` (`idrekod`, `tarikh`, `markah`, `gred`, `idpengguna`, `idtopik`) VALUES
('R1', '03-10-21', '100', 'A', 'M0001', 'T01'),
('R2', '03-10-21', '66.67', 'C', 'M0001', 'T01');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan`
--

CREATE TABLE `pilihan` (
  `idpilihan` varchar(10) NOT NULL,
  `plhjwp` varchar(80) NOT NULL,
  `jwp` varchar(5) NOT NULL,
  `idsoal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pilihan`
--

INSERT INTO `pilihan` (`idpilihan`, `plhjwp`, `jwp`, `idsoal`) VALUES
('P1', 'hancing', '0', 'S1'),
('P10', 'cepat', '0', 'S3'),
('P11', 'laju', '0', 'S3'),
('P12', 'cekap', '0', 'S3'),
('P13', 'menanak', '1', 'S4'),
('P14', 'menjerang', '0', 'S4'),
('P15', 'mengukus', '0', 'S4'),
('P16', 'merebus', '0', 'S4'),
('P2', 'tengik', '0', 'S1'),
('P3', 'hanyir', '1', 'S1'),
('P4', 'basi', '0', 'S1'),
('P5', 'empuk', '1', 'S2'),
('P6', 'lemau', '0', 'S2'),
('P7', 'lembik', '0', 'S2'),
('P8', 'lembut', '0', 'S2'),
('P9', 'tangkas', '1', 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `soalan`
--

CREATE TABLE `soalan` (
  `idsoal` varchar(10) NOT NULL,
  `nosoal` varchar(5) NOT NULL,
  `soal` varchar(100) NOT NULL,
  `idtopik` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soalan`
--

INSERT INTO `soalan` (`idsoal`, `nosoal`, `soal`, `idtopik`) VALUES
('S1', '1', 'ikan _____', 'T01'),
('S2', '2', 'ubi _____', 'T01'),
('S3', '3', 'Pemain bola sepak yang _____ itu telah dipilih sebagai pemain terbaik.', 'T01'),
('S4', '1', '_____ nasi', 'T02');

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `idtopik` varchar(10) NOT NULL,
  `topik` varchar(30) NOT NULL,
  `idpengguna` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`idtopik`, `topik`, `idpengguna`) VALUES
('T01', 'Kata Adjektif', 'G0005'),
('T02', 'Kata Kerja', 'G0005');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indexes for table `perekodan`
--
ALTER TABLE `perekodan`
  ADD PRIMARY KEY (`idrekod`);

--
-- Indexes for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD PRIMARY KEY (`idpilihan`);

--
-- Indexes for table `soalan`
--
ALTER TABLE `soalan`
  ADD PRIMARY KEY (`idsoal`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`idtopik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
