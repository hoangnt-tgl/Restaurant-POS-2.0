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
-- Table structure for table `mon`
--

CREATE TABLE `mon` (
  `ID` int(12) NOT NULL,
  `TEN` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `GIA` int(20) NOT NULL,
  `SO_LUONG` int(11) NOT NULL,
  `TONG_TIEN` int(11) NOT NULL,
  `LINK` varchar(200) COLLATE utf8_unicode_520_ci NOT NULL,
  `GHI_CHU` text COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `mon`
--

INSERT INTO `mon` (`ID`, `TEN`, `GIA`, `SO_LUONG`, `TONG_TIEN`, `LINK`, `GHI_CHU`) VALUES
(1, 'Gà Đốt Lá Trúc Ô Thum', 300000, 1, 300000, 'C:/xampp/htdocs/Restaurant-POS-2.0/SE_project/images/Ga_hinh-1.jpg', ''),
(3, 'Cá Hú Kho Tộ', 100000, 2, 200000, 'C:/xampp/htdocs/Restaurant-POS-2.0/SE_project/images/Ca_Kho_hinh-3.jpg', ''),
(10, 'Súp Cá Hồi', 150000, 2, 300000, 'C:/xampp/htdocs/Restaurant-POS-2.0/SE_project/images/Sup_Ca_hinh-3.png', 'Để ít hành, tiêu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mon`
--
ALTER TABLE `mon`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
