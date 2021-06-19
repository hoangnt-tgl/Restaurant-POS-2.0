-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 18, 2021 lúc 03:42 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `restaurent`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khanh_hang`
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
-- Đang đổ dữ liệu cho bảng `khanh_hang`
--

INSERT INTO `khanh_hang` (`TEN`, `SDT`, `EMAIL`, `DIA_CHI`, `SO_BAN`, `PHUONG_THUC`, `THANH_TOAN`) VALUES
('', '', '', '', 0, 'restaurant', 'MoMo'),
('nguyen the huy ', '0963517279', '', '', 0, 'takeawway', 'MoMo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon`
--

CREATE TABLE `mon` (
  `ID` varchar(12) COLLATE utf8_unicode_520_ci NOT NULL,
  `TEN` varchar(20) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `GIA` int(20) NOT NULL,
  `SO_LUONG` int(11) NOT NULL,
  `TONG_TIEN` int(11) NOT NULL,
  `LINK` varchar(200) COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `mon`
--

INSERT INTO `mon` (`ID`, `TEN`, `GIA`, `SO_LUONG`, `TONG_TIEN`, `LINK`) VALUES
('001', 'COM GA', 20000, 1, 20000, 'https://cdn.daynauan.info.vn/wp-content/uploads/2019/05/com-ga-xoi-mo.jpg'),
('002', 'MI XAO', 30000, 1, 30000, 'https://cdn.tgdd.vn/2020/07/CookProduct/1-1200x676-12.jpg'),
('003', 'COCA', 10000, 1, 10000, 'https://lh3.googleusercontent.com/proxy/7HvvFXqzu4EdMAhriIUDVIbLOItb-KWcq3n5IEyn8A7z44Wn-cJ4a791IAPxF6IjaQCNGwfiS8w3mEg85KMDoAVPfAGmq1Op7UgyH2BlueWnGnDkVBriZ_U');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `khanh_hang`
--
ALTER TABLE `khanh_hang`
  ADD PRIMARY KEY (`SDT`);

--
-- Chỉ mục cho bảng `mon`
--
ALTER TABLE `mon`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
