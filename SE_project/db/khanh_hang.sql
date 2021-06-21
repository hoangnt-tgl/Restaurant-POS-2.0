-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 10:04 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `khanh_hang`
--

CREATE TABLE `khanh_hang` (
  `TEN` varchar(100) COLLATE utf8_unicode_520_ci NOT NULL,
  `SDT` varchar(100) COLLATE utf8_unicode_520_ci NOT NULL,
  `EMAIL` varchar(100) COLLATE utf8_unicode_520_ci NOT NULL,
  `DIA_CHI` varchar(100) COLLATE utf8_unicode_520_ci NOT NULL,
  `SO_BAN` int(100) NOT NULL,
  `PHUONG_THUC` varchar(100) COLLATE utf8_unicode_520_ci NOT NULL,
  `THANH_TOAN` varchar(100) COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `khanh_hang`
--

INSERT INTO `khanh_hang` (`TEN`, `SDT`, `EMAIL`, `DIA_CHI`, `SO_BAN`, `PHUONG_THUC`, `THANH_TOAN`) VALUES
('', '', '', '', 0, 'restaurant', 'MoMo'),
('nguyen the huy ', '0963517279', '', '', 0, 'takeawway', 'MoMo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `khanh_hang`
--
ALTER TABLE `khanh_hang`
  ADD PRIMARY KEY (`SDT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
