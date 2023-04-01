-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: webshoe-mysqli
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dondathang`
--

DROP TABLE IF EXISTS `dondathang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dondathang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `MaGiay` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `MaKH` int NOT NULL,
  `SoLuong` int NOT NULL,
  `GiaBan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `AnhBia` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `TenGiay` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `NgayDat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TinhTrang` tinyint NOT NULL,
  `Size` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dondathang`
--

LOCK TABLES `dondathang` WRITE;
/*!40000 ALTER TABLE `dondathang` DISABLE KEYS */;
INSERT INTO `dondathang` VALUES (9,' 29',21,1,' 1900000',' converse1970sdoden.jpg','  Converse 1970s Blach-Red','2023-04-01 13:39:13',0,41),(10,' 38',21,1,' 2300000',' nike2090.jpg','  Nike AirMax2090','2023-04-01 13:39:45',2,39),(11,' 29',21,4,' 7600000',' converse1970sdoden.jpg','  Converse 1970s Blach-Red','2023-04-01 13:44:27',1,41);
/*!40000 ALTER TABLE `dondathang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giohang`
--

DROP TABLE IF EXISTS `giohang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `giohang` (
  `cartId` int NOT NULL AUTO_INCREMENT,
  `MaGiay` int NOT NULL,
  `sId` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `TenGiay` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `GiaBan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `SoLuong` int NOT NULL,
  `AnhBia` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Size` tinyint NOT NULL,
  PRIMARY KEY (`cartId`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giohang`
--

LOCK TABLES `giohang` WRITE;
/*!40000 ALTER TABLE `giohang` DISABLE KEYS */;
/*!40000 ALTER TABLE `giohang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `khachhang` (
  `MaKH` int NOT NULL AUTO_INCREMENT,
  `TaiKhoanKH` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatKhau` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `HoTen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EmailKH` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChiKH` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DienThoaiKH` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `TrangThai` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`MaKH`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khachhang`
--

LOCK TABLES `khachhang` WRITE;
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
INSERT INTO `khachhang` VALUES (21,'Cao Nguyen','202cb962ac59075b964b07152d234b70','Nguyễn Cao nguyên','nguyen@gmail.com','23k7, Bình Đáng, Bình hòa, Thuận an, Bình Dương','0985797250','2001-09-04',1),(22,'nguyen','202cb962ac59075b964b07152d234b70','hao','nguyentest@gmail.com','23k7','0985797250','2023-03-03',1),(23,'nguyen','202cb962ac59075b964b07152d234b70','hao','nguyen2@gmail.com','23k7','32321321','2023-03-15',1),(24,'nguyen','202cb962ac59075b964b07152d234b70','nguyen','nguyen3@gmail.com','23k7','321321','2023-03-18',0);
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loaigiay`
--

DROP TABLE IF EXISTS `loaigiay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loaigiay` (
  `MaLoai` int NOT NULL AUTO_INCREMENT,
  `TenLoai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TrangThai` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`MaLoai`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loaigiay`
--

LOCK TABLES `loaigiay` WRITE;
/*!40000 ALTER TABLE `loaigiay` DISABLE KEYS */;
INSERT INTO `loaigiay` VALUES (1,'Thể thao nam',1),(2,'Thể thao nữ',1),(3,'Sandal nữ',1),(10,'Dép nữ',1),(12,'Dép nam',0);
/*!40000 ALTER TABLE `loaigiay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhacungcap`
--

DROP TABLE IF EXISTS `nhacungcap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nhacungcap` (
  `MaNCC` int NOT NULL AUTO_INCREMENT,
  `TenNCC` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DienThoai` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TrangThai` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`MaNCC`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhacungcap`
--

LOCK TABLES `nhacungcap` WRITE;
/*!40000 ALTER TABLE `nhacungcap` DISABLE KEYS */;
INSERT INTO `nhacungcap` VALUES (1,'Thảo Nguyên','Bình Dương','0123456789',1),(2,'Minh Khánh','Tp Hồ Chí Minh','0909258485',1),(3,'Halcyon','Bình Thạnh','0972123333',1);
/*!40000 ALTER TABLE `nhacungcap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quanly`
--

DROP TABLE IF EXISTS `quanly`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quanly` (
  `adminID` int NOT NULL AUTO_INCREMENT,
  `adminUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminPass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminEmail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Level` int NOT NULL,
  PRIMARY KEY (`adminID`),
  UNIQUE KEY `UQ__QUANLY__9A120A661952C614` (`adminUser`),
  UNIQUE KEY `UQ__QUANLY__7ED955FC28028B93` (`adminEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quanly`
--

LOCK TABLES `quanly` WRITE;
/*!40000 ALTER TABLE `quanly` DISABLE KEYS */;
INSERT INTO `quanly` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','Hào','admin@gmail.com',0);
/*!40000 ALTER TABLE `quanly` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sanpham` (
  `MaGiay` int NOT NULL AUTO_INCREMENT,
  `TenGiay` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Size` tinyint unsigned NOT NULL,
  `AnhBia` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GiaBan` bigint NOT NULL,
  `MaThuongHieu` int DEFAULT NULL,
  `TrangThai` tinyint(1) DEFAULT '1',
  `MaNCC` int DEFAULT NULL,
  `MaLoai` int DEFAULT NULL,
  `ThoiGianBaoHanh` int DEFAULT NULL,
  `NgayCapNhat` datetime(6) DEFAULT NULL,
  `SoLuongTon` int NOT NULL,
  PRIMARY KEY (`MaGiay`),
  KEY `FK_LOAIGIAY` (`MaLoai`),
  KEY `FK_NHACUNGCAP` (`MaNCC`),
  KEY `FL_THUONGHIEU` (`MaThuongHieu`),
  CONSTRAINT `FK_LOAIGIAY` FOREIGN KEY (`MaLoai`) REFERENCES `loaigiay` (`MaLoai`),
  CONSTRAINT `FK_NHACUNGCAP` FOREIGN KEY (`MaNCC`) REFERENCES `nhacungcap` (`MaNCC`),
  CONSTRAINT `FK_THƯƠNG HIEU` FOREIGN KEY (`MaThuongHieu`) REFERENCES `thuonghieu` (`MaThuongHieu`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanpham`
--

LOCK TABLES `sanpham` WRITE;
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` VALUES (23,'Adidas RS',39,'adiasx.jpg',2500000,3,0,1,1,12,'2022-06-23 00:00:00.000000',23),(27,'Adidas Forum',36,'adidasforum.jpg',2900000,3,0,1,1,12,'2022-06-23 00:00:00.000000',17),(29,'Converse 1970s Blach-Red',41,'converse1970sdoden.jpg',1900000,4,1,2,1,12,'2022-06-23 00:00:00.000000',12),(31,'Converse 1970s Yellow',41,'converse1970svang.jpg',1900000,4,1,2,1,12,'2022-06-23 00:00:00.000000',11),(37,'Converse 1970s Green',43,'converse1970sxanh.jpg',1900000,4,1,2,2,12,'2022-06-23 00:00:00.000000',16),(38,'Nike AirMax2090',39,'nike2090.jpg',2300000,1,1,1,2,12,'2022-06-23 00:00:00.000000',19),(39,'Nike AirMax90',38,'nike90.jpg',2400000,1,0,1,1,12,'2022-06-23 00:00:00.000000',30),(41,'Nike AiMax270',34,'nike270.jpg',2600000,1,1,1,2,12,'2022-06-23 00:00:00.000000',25),(42,'Nike SC',44,'nikesc.jpg',2500000,1,1,1,1,12,'2022-06-23 00:00:00.000000',24),(43,'Puma RS',40,'pumars.jpg',2300000,5,1,1,1,12,'2022-06-23 00:00:00.000000',6),(44,'Puma Astro',39,'pumaastro.jpg',2150000,5,1,2,2,12,'2022-06-23 00:00:00.000000',7),(49,'Reebok Black',36,'reebokden.jpg',1900000,8,1,1,12,12,'2022-06-23 00:00:00.000000',17),(52,'Vans HC',38,'vanshc.jpg',1900000,2,1,1,3,12,'2022-06-23 00:00:00.000000',9),(53,'Vans Old School',39,'vansoldschool.jpg',1900000,2,1,1,2,12,'2022-06-23 00:00:00.000000',18),(61,'Dép Sandal Venuco ',255,'275cbfde64495d81e5b7aeffe08813fe.jpg',799000,11,1,2,10,10,'2023-03-13 00:00:00.000000',101);
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slider` (
  `sliderID` tinyint NOT NULL AUTO_INCREMENT,
  `MaGiay` int NOT NULL,
  `TrangThai` tinyint(1) NOT NULL,
  PRIMARY KEY (`sliderID`),
  KEY `FK_SANPHAM` (`MaGiay`),
  CONSTRAINT `FK_SANPHAM` FOREIGN KEY (`MaGiay`) REFERENCES `sanpham` (`MaGiay`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider`
--

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` VALUES (1,61,1),(2,52,1),(3,43,1),(4,37,1),(5,44,1);
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thuonghieu`
--

DROP TABLE IF EXISTS `thuonghieu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thuonghieu` (
  `MaThuongHieu` int NOT NULL AUTO_INCREMENT,
  `TenThuongHieu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`MaThuongHieu`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thuonghieu`
--

LOCK TABLES `thuonghieu` WRITE;
/*!40000 ALTER TABLE `thuonghieu` DISABLE KEYS */;
INSERT INTO `thuonghieu` VALUES (1,'Nike'),(2,'Vans'),(3,'Adidas'),(4,'Converse'),(5,'Puma'),(8,'Reebok'),(11,'Venuco');
/*!40000 ALTER TABLE `thuonghieu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ykienkhachhang`
--

DROP TABLE IF EXISTS `ykienkhachhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ykienkhachhang` (
  `MaYKien` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayGui` datetime DEFAULT NULL,
  `NoiDung` varchar(2555) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`MaYKien`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ykienkhachhang`
--

LOCK TABLES `ykienkhachhang` WRITE;
/*!40000 ALTER TABLE `ykienkhachhang` DISABLE KEYS */;
INSERT INTO `ykienkhachhang` VALUES (1,'nguyen@gmail.com','2023-03-18 00:00:00','43243243'),(2,'nguyen@gmail.com','2023-03-18 19:14:21','43243243'),(3,'onmyoji4921@gmail.com','2023-03-18 19:14:32','nguyen ne'),(4,'onmyoji4921@gmail.com','2023-03-18 19:17:06','nguyen ne'),(5,'caonguyenk19@gmail.com','2023-03-18 19:17:13','hahahaha'),(6,'nguyen@gmail.com','2023-03-18 19:21:35','dasdsadsa'),(7,'nguyen@gmail.com','2023-03-18 19:28:25','dasdsadsa'),(8,'nguyen@gmail.com','2023-03-18 19:42:34','dasdsadsa'),(9,'huynhgiahao1902@gmail.com','2023-03-30 17:05:14','Bài thơ cuối anh viết tặng em\nLà bài thơ anh viết về đôi giày\nKhi tình yêu một đứa nói chia tay\nĐôi giày cũ cau mày giận dỗi\n\nCả hai chiếc gót mòn muôn nẻo lối\nChốn công viên bóng tối đạp kim tiêm\nNgắm trời sao chia sẻ những nỗi niềm\nDẫm phân chó ưu phiền âm thầm chịu\n\nCả hai chiếc chung cuộc đời cô Lựu\nChẳng kể Nike, Adidas, Thượng Đình\nTất một tuần không đổi thối kinh\nQuang gánh nặng, mỗi bên mang một nửa');
/*!40000 ALTER TABLE `ykienkhachhang` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-01 20:54:49
