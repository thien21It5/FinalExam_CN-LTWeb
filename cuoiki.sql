-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 03:53 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuoiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `gioitinh` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `email`, `password`, `sdt`, `gioitinh`) VALUES
(1, 'admin', '01636404020tan@gmail.com', 'admin', '0', ''),
(2, 'trantrongtan', '01636404020tan@gmail.com', 'trongtan123', '03554533036', 'Nam'),
(3, 'cho113ngu', 'tpham01662@gmail.com', 'Tuan250302', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `diachi`
--

CREATE TABLE `diachi` (
  `id` int(11) NOT NULL,
  `hoten` varchar(30) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `address` varchar(400) NOT NULL,
  `main` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diachi`
--

INSERT INTO `diachi` (`id`, `hoten`, `sdt`, `address`, `main`) VALUES
(1, 'Trần Trọng Tấn', '0386066416', '04 Nguyễn Dục, Phường Hòa Hải, Quận Ngũ Hành Sơn, Đà Nẵng', 'main'),
(2, 'Trần Trọng Tấn', '0354533036', 'Liên Tân - Thạch Kim - Lộc Hà -Hà Tĩnh', '');

-- --------------------------------------------------------

--
-- Table structure for table `dondathang`
--

CREATE TABLE `dondathang` (
  `iddondathang` int(11) NOT NULL,
  `khachhang` varchar(30) NOT NULL,
  `dondathang` varchar(200) NOT NULL,
  `soluong` varchar(30) NOT NULL,
  `tongtien` varchar(30) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `dienthoai` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tinhtrang` varchar(15) NOT NULL,
  `thoigian` varchar(50) NOT NULL,
  `thoigian2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dondathang`
--

INSERT INTO `dondathang` (`iddondathang`, `khachhang`, `dondathang`, `soluong`, `tongtien`, `diachi`, `dienthoai`, `username`, `email`, `tinhtrang`, `thoigian`, `thoigian2`) VALUES
(36, 'Trần Trọng Tấn', 'Áo Phông AAB,', '1', '300', 'Liên tân-Thạch Kim-Lộc Hà-Hà Tĩnh ', '0386066416', 'trantrongtan', '01636404020tan@gmail.com', 'Đã hoàn thành', '2022-10-16 03:53:50', '2022-October-16 03:55:02'),
(37, 'Trần Trọng Tấn', 'Áo phông CCC,', '1', '200', 'Liên tân-Thạch Kim-Lộc Hà-Hà Tĩnh', '0386066416', 'trantrongtan', '01636404020tan@gmail.com', 'Đã hoàn thành', '2022-10-16 03:54:31', '2022-October-16 05:22:49'),
(38, 'Trần Trọng Tấn', 'Áo Phông AAB,Sweater JJB,', '2', '1200', 'Liên tân-Thạch Kim-Lộc Hà-Hà Tĩnh', '0386066416', 'trantrongtan', '01636404020tan@gmail.com', 'Đã hoàn thành', '2022-10-16 05:23:17', '2022-October-16 05:24:07'),
(39, 'Phạm Minh Tuấn', 'Áo phông CCC,', '2', '400', '04 Nguyễn Dục', '0918717205', 'cho113ngu', 'tpham01662@gmail.com', 'Đã hoàn thành', '2022-10-16 05:27:16', ''),
(40, 'Trần Trọng Tấn', 'Áo Phông AAA,Áo Phông AAB,', '3', '1350', '04 Nguyễn Dục, Phường Hòa Hải, Quận Ngũ Hành Sơn, Đà Nẵng', '0386066416', 'trantrongtan', '01636404020tan@gmail.com', 'Đã hoàn thành', '2022-10-27 08:57:09', ''),
(41, 'Trần Trọng Tấn', 'Áo phông DD,', '1', '250', '04 Nguyễn Dục, Phường Hòa Hải, Quận Ngũ Hành Sơn, Đà Nẵng', '0386066416', 'trantrongtan', '01636404020tan@gmail.com', 'Đã hoàn thành', '2022-10-27 08:58:33', '');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `masanpham` varchar(30) NOT NULL,
  `tensanpham` varchar(30) NOT NULL,
  `soluong` int(30) NOT NULL,
  `tinhtrang` varchar(10) NOT NULL,
  `giatien` varchar(30) NOT NULL,
  `danhmuc` varchar(30) NOT NULL,
  `anh` varchar(30) NOT NULL,
  `mota` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`masanpham`, `tensanpham`, `soluong`, `tinhtrang`, `giatien`, `danhmuc`, `anh`, `mota`) VALUES
('98712hf9', 'Sweater JJA', 11, 'Còn hàng', '650.000', 'Sweater', 'sweater.jpg', 'Áo ấm'),
('sagd81w8', 'Sweater JJB', 14, 'Còn hàng', '600.000', 'Sweater', 'ni12.jpg', 'Áo ấm cực'),
('db1827wnd23', 'Áo Phông AAB', 15, 'Còn hàng', '300.000', 'Áo phông', 'aophong.jpg', 'Áo mát cực'),
('agaqwr1212', 'Áo Phông AAA', 17, 'Còn hàng', '350.000', 'Áo phông', 'aophong.jpg', 'Áo chất cực'),
('1e28c7eyk1', 'Áo phao BBC', 0, 'Hết hàng', '400.000', 'Áo phao', 'aophao.jpg', 'Áo ấm cực'),
('392r7y293fm', 'Áo phao ToT', 6, 'Còn hàng', '450.000', 'Áo phao', 'aophao.jpg', 'Áo ấm cực'),
('128f238dwt', 'Áo phông CCC', 10, 'Còn hàng', '200.000', 'Áo phông', 'aophongccc.jpg', 'Thoáng mát'),
('dsg34qfqd', 'Áo phông DD', 20, 'Còn hàng', '250.000', 'Áo phông', 'aophongccc.jpg', 'Thoáng mát cực'),
('dsg34qfqd', 'Áo phao nam nữ', 18, 'Còn hàng', '550.000', 'Áo phao', 'aophaodo.jpg', 'Ấm cực'),
('dsg34qfqd', 'Áo phao Redbull', 6, 'Còn hàng', '650.000', 'Áo phao', 'aophaodo.jpg', 'Siêu ấm'),
('912d898', 'Sweater LV', 6, 'Còn hàng', '1200', 'Sweater', 'sweaterlv.jpg', 'Siêu ấm'),
('218d1mc1s', 'Sweater LV2', 19, 'Còn hàng', '1500', 'Sweater', 'sweaterlv.jpg', 'Siêu ấm');

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `khachhang` varchar(30) NOT NULL,
  `donHang` varchar(100) NOT NULL,
  `soluong` int(30) NOT NULL,
  `hinhanh` varchar(30) NOT NULL,
  `sotien` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diachi`
--
ALTER TABLE `diachi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`iddondathang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `diachi`
--
ALTER TABLE `diachi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dondathang`
--
ALTER TABLE `dondathang`
  MODIFY `iddondathang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
