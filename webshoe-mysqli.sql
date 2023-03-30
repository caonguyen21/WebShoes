-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 05:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshoe-mysqli`
--

-- --------------------------------------------------------

--
-- Table structure for table `dondathang`
--

CREATE TABLE `dondathang` (
  `id` int(11) NOT NULL,
  `MaGiay` varchar(255) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaBan` varchar(255) NOT NULL,
  `AnhBia` varchar(255) NOT NULL,
  `TenGiay` varchar(255) NOT NULL,
  `NgayDat` datetime NOT NULL DEFAULT current_timestamp(),
  `TinhTrang` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dondathang`
--

INSERT INTO `dondathang` (`id`, `MaGiay`, `MaKH`, `SoLuong`, `GiaBan`, `AnhBia`, `TenGiay`, `NgayDat`, `TinhTrang`) VALUES
(1, ' 31', 21, 1, ' 1900000', ' converse1970svang.jpg', '  Converse 1970s Yellow', '2023-03-28 20:46:53', 3),
(2, ' 37', 21, 4, ' 1900000', ' converse1970sxanh.jpg', '  Converse 1970s Green', '2023-03-28 20:46:53', 2),
(3, ' 52', 21, 1, ' 1900000', ' vanshc.jpg', '  Vans HC', '2023-03-28 20:46:53', 0),
(4, ' 53', 21, 4, ' 7600000', ' vansoldschool.jpg', '  Vans Old School', '2023-03-28 20:46:53', 0),
(5, ' 31', 21, 1, ' 1900000', ' converse1970svang.jpg', '  Converse 1970s Yellow', '2023-03-28 15:49:15', 0),
(6, ' 31', 24, 1, ' 1900000', ' converse1970svang.jpg', '  Converse 1970s Yellow', '2023-03-28 15:50:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `cartId` int(11) NOT NULL,
  `MaGiay` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `TenGiay` varchar(255) NOT NULL,
  `GiaBan` varchar(255) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `AnhBia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TaiKhoanKH` varchar(50) NOT NULL,
  `MatKhau` varchar(200) NOT NULL DEFAULT '',
  `HoTen` varchar(50) NOT NULL,
  `EmailKH` varchar(30) NOT NULL,
  `DiaChiKH` varchar(100) NOT NULL,
  `DienThoaiKH` varchar(10) NOT NULL,
  `NgaySinh` datetime(6) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TaiKhoanKH`, `MatKhau`, `HoTen`, `EmailKH`, `DiaChiKH`, `DienThoaiKH`, `NgaySinh`, `TrangThai`) VALUES
(21, 'nguyen', 'e10adc3949ba59abbe56e057f20f883e', 'nguyen', 'nguyen@gmail.com', '23k7, binh dang, binh dang, binh bao , thuan an , binh duong', '0985797250', '2023-03-03 18:25:00.000000', 1),
(22, 'nguyen', '202cb962ac59075b964b07152d234b70', 'hao', 'nguyentest@gmail.com', '23k7', '0985797250', '2023-03-03 21:54:00.000000', 1),
(23, 'nguyen', '202cb962ac59075b964b07152d234b70', 'hao', 'nguyen2@gmail.com', '23k7', '32321321', '2023-03-09 02:19:00.000000', 1),
(24, 'nguyen', '202cb962ac59075b964b07152d234b70', 'nguyen', 'nguyen3@gmail.com', '23k7', '321321', '2023-03-18 02:21:00.000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loaigiay`
--

CREATE TABLE `loaigiay` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(50) NOT NULL,
  `TrangThai` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaigiay`
--

INSERT INTO `loaigiay` (`MaLoai`, `TenLoai`, `TrangThai`) VALUES
(1, 'Thể thao nam', 1),
(2, 'Thể thao nữ', 1),
(3, 'Sandal nữ', 1),
(10, 'Dép nữ', 1),
(12, 'Dép nam', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` int(11) NOT NULL,
  `TenNCC` varchar(50) NOT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `DienThoai` varchar(50) DEFAULT NULL,
  `TrangThai` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `DiaChi`, `DienThoai`, `TrangThai`) VALUES
(1, 'Thảo Nguyên', 'Bình Dương', '0123456789', 1),
(2, 'Minh Khánh', 'Tp Hồ Chí Minh', '0909258485', 1),
(3, 'Halcyon', 'Bình Thạnh', '0972123333', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quanly`
--

CREATE TABLE `quanly` (
  `adminID` int(11) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `adminName` varchar(255) DEFAULT NULL,
  `adminEmail` varchar(255) DEFAULT NULL,
  `Level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quanly`
--

INSERT INTO `quanly` (`adminID`, `adminUser`, `adminPass`, `adminName`, `adminEmail`, `Level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Hào', 'admin@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaGiay` int(11) NOT NULL,
  `TenGiay` varchar(50) NOT NULL,
  `Size` tinyint(3) UNSIGNED NOT NULL,
  `AnhBia` varchar(50) DEFAULT NULL,
  `GiaBan` bigint(20) NOT NULL,
  `MaThuongHieu` int(11) DEFAULT NULL,
  `TrangThai` tinyint(1) DEFAULT 1,
  `MaNCC` int(11) DEFAULT NULL,
  `MaLoai` int(11) DEFAULT NULL,
  `ThoiGianBaoHanh` int(11) DEFAULT NULL,
  `NgayCapNhat` datetime(6) DEFAULT NULL,
  `SoLuongTon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaGiay`, `TenGiay`, `Size`, `AnhBia`, `GiaBan`, `MaThuongHieu`, `TrangThai`, `MaNCC`, `MaLoai`, `ThoiGianBaoHanh`, `NgayCapNhat`, `SoLuongTon`) VALUES
(23, 'Adidas RS', 39, 'adiasx.jpg', 2500000, 3, 0, 1, 1, 12, '2022-06-23 00:00:00.000000', 23),
(27, 'Adidas Forum', 36, 'adidasforum.jpg', 2900000, 3, 0, 1, 1, 12, '2022-06-23 00:00:00.000000', 17),
(29, 'Converse 1970s Blach-Red', 41, 'converse1970sdoden.jpg', 1900000, 4, 1, 2, 1, 12, '2022-06-23 00:00:00.000000', 12),
(31, 'Converse 1970s Yellow', 41, 'converse1970svang.jpg', 1900000, 4, 1, 2, 1, 12, '2022-06-23 00:00:00.000000', 11),
(37, 'Converse 1970s Green', 43, 'converse1970sxanh.jpg', 1900000, 4, 1, 2, 2, 12, '2022-06-23 00:00:00.000000', 16),
(38, 'Nike AirMax2090', 39, 'nike2090.jpg', 2300000, 1, 1, 1, 2, 12, '2022-06-23 00:00:00.000000', 19),
(39, 'Nike AirMax90', 38, 'nike90.jpg', 2400000, 1, 0, 1, 1, 12, '2022-06-23 00:00:00.000000', 30),
(41, 'Nike AiMax270', 34, 'nike270.jpg', 2600000, 1, 1, 1, 2, 12, '2022-06-23 00:00:00.000000', 25),
(42, 'Nike SC', 44, 'nikesc.jpg', 2500000, 1, 1, 1, 1, 12, '2022-06-23 00:00:00.000000', 24),
(43, 'Puma RS', 40, 'pumars.jpg', 2300000, 5, 1, 1, 1, 12, '2022-06-23 00:00:00.000000', 6),
(44, 'Puma Astro', 39, 'pumaastro.jpg', 2150000, 5, 1, 2, 2, 12, '2022-06-23 00:00:00.000000', 7),
(49, 'Reebok Black', 36, 'reebokden.jpg', 1900000, 8, 1, 1, 12, 12, '2022-06-23 00:00:00.000000', 17),
(52, 'Vans HC', 38, 'vanshc.jpg', 1900000, 2, 1, 1, 3, 12, '2022-06-23 00:00:00.000000', 9),
(53, 'Vans Old School', 39, 'vansoldschool.jpg', 1900000, 2, 1, 1, 2, 12, '2022-06-23 00:00:00.000000', 18),
(61, 'Dép Sandal Venuco ', 255, '275cbfde64495d81e5b7aeffe08813fe.jpg', 799000, 11, 1, 2, 10, 10, '2023-03-13 00:00:00.000000', 101);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `sliderID` tinyint(4) NOT NULL,
  `MaGiay` int(11) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`sliderID`, `MaGiay`, `TrangThai`) VALUES
(1, 61, 1),
(2, 52, 1),
(3, 43, 1),
(4, 37, 1),
(5, 44, 1);

-- --------------------------------------------------------

--
-- Table structure for table `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `MaThuongHieu` int(11) NOT NULL,
  `TenThuongHieu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thuonghieu`
--

INSERT INTO `thuonghieu` (`MaThuongHieu`, `TenThuongHieu`) VALUES
(1, 'Nike'),
(2, 'Vans'),
(3, 'Adidas'),
(4, 'Converse'),
(5, 'Puma'),
(6, 'Balenciaga'),
(7, 'MLB'),
(8, 'Reebok'),
(9, 'MWC'),
(10, 'Chelsea'),
(11, 'Venuco');

-- --------------------------------------------------------

--
-- Table structure for table `ykienkhachhang`
--

CREATE TABLE `ykienkhachhang` (
  `MaYKien` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `NgayGui` datetime DEFAULT NULL,
  `NoiDung` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ykienkhachhang`
--

INSERT INTO `ykienkhachhang` (`MaYKien`, `Email`, `NgayGui`, `NoiDung`) VALUES
(1, 'nguyen@gmail.com', '2023-03-18 00:00:00', '43243243'),
(2, 'nguyen@gmail.com', '2023-03-18 19:14:21', '43243243'),
(3, 'onmyoji4921@gmail.com', '2023-03-18 19:14:32', 'nguyen ne'),
(4, 'onmyoji4921@gmail.com', '2023-03-18 19:17:06', 'nguyen ne'),
(5, 'caonguyenk19@gmail.com', '2023-03-18 19:17:13', 'hahahaha'),
(6, 'nguyen@gmail.com', '2023-03-18 19:21:35', 'dasdsadsa'),
(7, 'nguyen@gmail.com', '2023-03-18 19:28:25', 'dasdsadsa'),
(8, 'nguyen@gmail.com', '2023-03-18 19:42:34', 'dasdsadsa'),
(9, 'huynhgiahao1902@gmail.com', '2023-03-30 17:05:14', 'Bài thơ cuối anh viết tặng em\nLà bài thơ anh viết về đôi giày\nKhi tình yêu một đứa nói chia tay\nĐôi giày cũ cau mày giận dỗi\n\nCả hai chiếc gót mòn muôn nẻo lối\nChốn công viên bóng tối đạp kim tiêm\nNgắm trời sao chia sẻ những nỗi niềm\nDẫm phân chó ưu phiền âm thầm chịu\n\nCả hai chiếc chung cuộc đời cô Lựu\nChẳng kể Nike, Adidas, Thượng Đình\nTất một tuần không đổi thối kinh\nQuang gánh nặng, mỗi bên mang một nửa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Indexes for table `loaigiay`
--
ALTER TABLE `loaigiay`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Indexes for table `quanly`
--
ALTER TABLE `quanly`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `UQ__QUANLY__9A120A661952C614` (`adminUser`),
  ADD UNIQUE KEY `UQ__QUANLY__7ED955FC28028B93` (`adminEmail`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaGiay`),
  ADD KEY `FK_LOAIGIAY` (`MaLoai`),
  ADD KEY `FK_NHACUNGCAP` (`MaNCC`),
  ADD KEY `FL_THUONGHIEU` (`MaThuongHieu`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`sliderID`),
  ADD KEY `FK_SANPHAM` (`MaGiay`);

--
-- Indexes for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`MaThuongHieu`);

--
-- Indexes for table `ykienkhachhang`
--
ALTER TABLE `ykienkhachhang`
  ADD PRIMARY KEY (`MaYKien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dondathang`
--
ALTER TABLE `dondathang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `loaigiay`
--
ALTER TABLE `loaigiay`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quanly`
--
ALTER TABLE `quanly`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaGiay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `sliderID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `MaThuongHieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ykienkhachhang`
--
ALTER TABLE `ykienkhachhang`
  MODIFY `MaYKien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_LOAIGIAY` FOREIGN KEY (`MaLoai`) REFERENCES `loaigiay` (`MaLoai`),
  ADD CONSTRAINT `FK_NHACUNGCAP` FOREIGN KEY (`MaNCC`) REFERENCES `nhacungcap` (`MaNCC`),
  ADD CONSTRAINT `FK_THƯƠNG HIEU` FOREIGN KEY (`MaThuongHieu`) REFERENCES `thuonghieu` (`MaThuongHieu`);

--
-- Constraints for table `slider`
--
ALTER TABLE `slider`
  ADD CONSTRAINT `FK_SANPHAM` FOREIGN KEY (`MaGiay`) REFERENCES `sanpham` (`MaGiay`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
