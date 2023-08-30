-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 06:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tab_alternatif`
--

CREATE TABLE `tab_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_alternatif`
--

INSERT INTO `tab_alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
(1, 'Anggar'),
(2, 'Zulfi'),
(3, 'Alfian'),
(4, 'Rizki'),
(5, 'Rosyid'),
(6, 'Galih'),
(7, 'Fafian'),
(8, 'Nimas'),
(9, 'Abdul'),
(10, 'Arian'),
(11, 'Hafidah'),
(12, 'Putri'),
(13, 'Ihsan'),
(14, 'Ridwan'),
(15, 'Farras'),
(16, 'Ivana'),
(17, 'Jundi'),
(18, 'Giga'),
(19, 'Sahwa'),
(20, 'Mutaz'),
(21, 'Aulia'),
(22, 'Maisan'),
(23, 'Valensia'),
(24, 'Ilham'),
(25, 'Ade');

-- --------------------------------------------------------

--
-- Table structure for table `tab_kriteria`
--

CREATE TABLE `tab_kriteria` (
  `id_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot` float NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_kriteria`
--

INSERT INTO `tab_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `status`) VALUES
('1', 'Nilai Raport', 5, 'Benefit'),
('2', 'Prestasi', 4, 'Benefit'),
('3', 'Sikap', 3, 'Benefit'),
('4', 'Penghasilan Ortu', 3, 'Cost'),
('5', 'Presentase Kehadiran', 2, 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tab_topsis`
--

CREATE TABLE `tab_topsis` (
  `id_topsis` int(11) NOT NULL,
  `id_alternatif` int(10) NOT NULL,
  `id_kriteria` int(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_topsis`
--

INSERT INTO `tab_topsis` (`id_topsis`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(1, 1, 1, 4),
(2, 1, 2, 1),
(3, 1, 3, 3),
(4, 1, 4, 1),
(5, 1, 5, 4),
(6, 2, 1, 3),
(7, 2, 2, 1),
(8, 2, 3, 3),
(9, 2, 4, 3),
(10, 2, 5, 5),
(11, 3, 1, 5),
(12, 3, 2, 1),
(13, 3, 3, 4),
(14, 3, 4, 4),
(15, 3, 5, 5),
(16, 4, 1, 2),
(17, 4, 2, 2),
(18, 4, 3, 2),
(19, 4, 4, 2),
(20, 4, 5, 3),
(21, 5, 1, 4),
(22, 5, 2, 3),
(23, 5, 3, 4),
(24, 5, 4, 2),
(25, 5, 5, 4),
(26, 6, 1, 4),
(27, 6, 2, 1),
(28, 6, 3, 3),
(29, 6, 4, 3),
(30, 6, 5, 4),
(31, 7, 1, 4),
(32, 7, 2, 1),
(33, 7, 3, 4),
(34, 7, 4, 1),
(35, 7, 5, 4),
(36, 8, 1, 3),
(37, 8, 2, 4),
(38, 8, 3, 5),
(39, 8, 4, 5),
(40, 8, 5, 5),
(41, 9, 1, 5),
(42, 9, 2, 1),
(43, 9, 3, 3),
(44, 9, 4, 3),
(45, 9, 5, 5),
(46, 10, 1, 2),
(47, 10, 2, 2),
(48, 10, 3, 2),
(49, 10, 4, 2),
(50, 10, 5, 5),
(51, 11, 1, 3),
(52, 11, 2, 1),
(53, 11, 3, 3),
(54, 11, 4, 1),
(55, 11, 5, 4),
(56, 12, 1, 4),
(57, 12, 2, 1),
(58, 12, 3, 4),
(59, 12, 4, 4),
(60, 12, 5, 4),
(61, 13, 1, 4),
(62, 13, 2, 1),
(63, 13, 3, 3),
(64, 13, 4, 5),
(65, 13, 5, 4),
(66, 14, 1, 3),
(67, 14, 2, 2),
(68, 14, 3, 3),
(69, 14, 4, 5),
(70, 14, 5, 4),
(71, 15, 1, 2),
(72, 15, 2, 4),
(73, 15, 3, 5),
(74, 15, 4, 2),
(75, 15, 5, 5),
(76, 16, 1, 5),
(77, 16, 2, 2),
(78, 16, 3, 5),
(79, 16, 4, 5),
(80, 16, 5, 4),
(81, 17, 1, 4),
(82, 17, 2, 1),
(83, 17, 3, 3),
(84, 17, 4, 1),
(85, 17, 5, 5),
(86, 18, 1, 5),
(87, 18, 2, 1),
(88, 18, 3, 3),
(89, 18, 4, 3),
(90, 18, 5, 3),
(91, 19, 1, 4),
(92, 19, 2, 1),
(93, 19, 3, 4),
(94, 19, 4, 2),
(95, 19, 5, 4),
(96, 20, 1, 3),
(97, 20, 2, 3),
(98, 20, 3, 5),
(99, 20, 4, 4),
(100, 20, 5, 5),
(101, 21, 1, 3),
(102, 21, 2, 1),
(103, 21, 3, 2),
(104, 21, 4, 2),
(105, 21, 5, 5),
(106, 22, 1, 5),
(107, 22, 2, 1),
(108, 22, 3, 3),
(109, 22, 4, 3),
(110, 22, 5, 5),
(111, 23, 1, 3),
(112, 23, 2, 4),
(113, 23, 3, 3),
(114, 23, 4, 4),
(115, 23, 5, 5),
(116, 24, 1, 4),
(117, 24, 2, 3),
(118, 24, 3, 4),
(119, 24, 4, 5),
(120, 24, 5, 5),
(121, 25, 1, 5),
(122, 25, 2, 1),
(123, 25, 3, 3),
(124, 25, 4, 3),
(125, 25, 5, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_alternatif`
--
ALTER TABLE `tab_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `tab_kriteria`
--
ALTER TABLE `tab_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tab_topsis`
--
ALTER TABLE `tab_topsis`
  ADD PRIMARY KEY (`id_topsis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_topsis`
--
ALTER TABLE `tab_topsis`
  MODIFY `id_topsis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
