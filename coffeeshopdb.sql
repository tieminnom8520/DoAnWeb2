-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for coffeeshop
CREATE DATABASE IF NOT EXISTS `coffeeshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `coffeeshop`;

-- Dumping structure for table coffeeshop.ct_don_dat
CREATE TABLE IF NOT EXISTS `ct_don_dat` (
  `id_mon` varchar(10) NOT NULL,
  `id_size` varchar(10) NOT NULL,
  `id_don_hang` varchar(50) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `thanhtien` double DEFAULT NULL,
  PRIMARY KEY (`id_mon`,`id_size`,`id_don_hang`),
  KEY `FK_id_mon_size2` (`id_size`),
  KEY `FK_id_don_hang` (`id_don_hang`),
  CONSTRAINT `FK_id_don_hang` FOREIGN KEY (`id_don_hang`) REFERENCES `don_dat_hang` (`id_don_dat`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_id_mon_size` FOREIGN KEY (`id_mon`) REFERENCES `ct_mon_size` (`id_mon`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_id_mon_size2` FOREIGN KEY (`id_size`) REFERENCES `ct_mon_size` (`id_size`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table coffeeshop.ct_don_dat: ~0 rows (approximately)

-- Dumping structure for table coffeeshop.ct_mon_size
CREATE TABLE IF NOT EXISTS `ct_mon_size` (
  `id_mon` varchar(10) NOT NULL,
  `id_size` varchar(10) NOT NULL,
  `gia` double NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_mon`,`id_size`),
  KEY `FK_id_size` (`id_size`),
  CONSTRAINT `FK_id_mon` FOREIGN KEY (`id_mon`) REFERENCES `mon` (`id_mon`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_id_size` FOREIGN KEY (`id_size`) REFERENCES `size` (`id_size`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table coffeeshop.ct_mon_size: ~91 rows (approximately)
INSERT INTO `ct_mon_size` (`id_mon`, `id_size`, `gia`) VALUES
	('01', 'L', 39000),
	('01', 'M', 34000),
	('01', 'S', 29000),
	('02', 'L', 39000),
	('02', 'M', 34000),
	('02', 'S', 29000),
	('03', 'L', 39000),
	('03', 'M', 34000),
	('03', 'S', 29000),
	('04', 'L', 79000),
	('04', 'M', 75000),
	('04', 'S', 65000),
	('05', 'L', 55000),
	('05', 'M', 49000),
	('05', 'S', 45000),
	('06', 'L', 55000),
	('06', 'M', 49000),
	('06', 'S', 45000),
	('07', 'L', 85000),
	('07', 'M', 79000),
	('07', 'S', 69000),
	('08', 'L', 79000),
	('08', 'M', 75000),
	('08', 'S', 65000),
	('09', 'L', 69000),
	('09', 'M', 65000),
	('09', 'S', 55000),
	('10', 'L', 69000),
	('10', 'M', 65000),
	('10', 'S', 55000),
	('11', 'L', 69000),
	('11', 'M', 65000),
	('11', 'S', 55000),
	('12', 'L', 69000),
	('12', 'M', 65000),
	('12', 'S', 55000),
	('13', 'L', 69000),
	('13', 'M', 65000),
	('13', 'S', 55000),
	('14', 'L', 85000),
	('14', 'M', 79000),
	('14', 'S', 69000),
	('15', 'L', 65000),
	('15', 'M', 55000),
	('15', 'S', 45000),
	('16', 'L', 65000),
	('16', 'M', 55000),
	('16', 'S', 45000),
	('17', 'L', 65000),
	('17', 'M', 55000),
	('17', 'S', 45000),
	('18', 'L', 65000),
	('18', 'M', 55000),
	('18', 'S', 45000),
	('19', 'L', 55000),
	('19', 'M', 49000),
	('19', 'S', 39000),
	('20', 'L', 55000),
	('20', 'M', 49000),
	('20', 'S', 39000),
	('21', 'L', 55000),
	('21', 'M', 49000),
	('21', 'S', 39000),
	('22', 'L', 55000),
	('22', 'M', 49000),
	('22', 'S', 39000),
	('23', 'L', 55000),
	('23', 'M', 49000),
	('23', 'S', 39000),
	('24', 'L', 65000),
	('24', 'M', 59000),
	('24', 'S', 55000),
	('25', 'L', 55000),
	('25', 'M', 49000),
	('25', 'S', 45000),
	('26', 'L', 55000),
	('26', 'M', 49000),
	('26', 'S', 45000),
	('27', 'L', 55000),
	('27', 'M', 49000),
	('27', 'S', 45000),
	('28', 'N', 25000),
	('29', 'N', 29000),
	('30', 'N', 29000),
	('31', 'N', 35000),
	('32', 'N', 35000),
	('33', 'N', 35000),
	('34', 'N', 15000),
	('35', 'N', 39000),
	('36', 'N', 29000),
	('37', 'N', 35000);

-- Dumping structure for table coffeeshop.don_dat_hang
CREATE TABLE IF NOT EXISTS `don_dat_hang` (
  `id_don_dat` varchar(50) NOT NULL,
  `ngaydat` datetime DEFAULT NULL,
  `tongcong` double DEFAULT NULL,
  `SDT` varchar(10) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `ghichu` varchar(255) DEFAULT NULL,
  `id_khachhang` varchar(10) NOT NULL,
  `id_nhanvien` varchar(10) NOT NULL,
  PRIMARY KEY (`id_don_dat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table coffeeshop.don_dat_hang: ~0 rows (approximately)

-- Dumping structure for table coffeeshop.mon
CREATE TABLE IF NOT EXISTS `mon` (
  `id_mon` varchar(10) NOT NULL,
  `ten_mon` varchar(50) DEFAULT NULL,
  `Soluong` int(11) DEFAULT NULL,
  `Loai` varchar(50) DEFAULT NULL,
  `Hinhanh` varchar(1000) DEFAULT NULL,
  `Mota` text DEFAULT NULL,
  PRIMARY KEY (`id_mon`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table coffeeshop.mon: ~37 rows (approximately)
INSERT INTO `mon` (`id_mon`, `ten_mon`, `Soluong`, `Loai`, `Hinhanh`, `Mota`) VALUES
	('01', 'cà phê sữa', 100, 'cà phê', 'coffee1.png', '1 cà phê sữa'),
	('02', 'cà phê đen', 100, 'cà phê', 'coffee2.png', '1 cà phê đen'),
	('03', 'bạc xỉu', 100, 'cà phê', 'milkshake.png', '1 bạc xỉu'),
	('04', 'cappuchino', 100, 'cà phê', 'cappuchino.png', '1 camppuchino'),
	('05', 'americano', 100, 'cà phê', 'americano.png', '1 americano'),
	('06', 'espresso', 100, 'cà phê', 'espresso.png', '1 espresso'),
	('07', 'mocha macchiato', 100, 'cà phê', 'mochamacchiato.png', '1 macchiato'),
	('08', 'latte', 100, 'cà phê', 'latte.png', '1 latte'),
	('09', 'freeze matcha', 100, 'freeze', 'freezematcha.png', '1 freeze matcha'),
	('10', 'freeze chocolate', 100, 'freeze', 'freezechocolate.png', '1 freeze chocolate'),
	('11', 'freeze caramel', 100, 'freeze', 'freezecaramel.png', '1 freeze caramel'),
	('12', 'freeze cookie', 100, 'freeze', 'freezecookie.png', '1 freeze cookie'),
	('13', 'freeze classic', 100, 'freeze', 'freezeclassic.png', '1 freeze classic'),
	('14', 'caramel macchiato', 100, 'cà phê', 'caramelmacchiato.png', '1 caramel macchiato'),
	('15', 'trà sen vàng (củ năng)', 100, 'trà', 'trasenvang1.png', '1 trà sen vàng (củ năng)'),
	('16', 'trà sen vàng (sen)', 100, 'trà', 'trasenvang2.png', '1 trà sen vàng (sen)'),
	('17', 'trà thạch vải', 100, 'trà', 'trathachvai.png', '1 trà thạch vải'),
	('18', 'trà xanh đậu đỏ', 100, 'trà', 'traxanhdaudo.png', '1 trà xanh đậu đỏ'),
	('19', 'sữa tươi đá', 100, 'khác', 'suatuoida.png', '1 sữa tươi đá'),
	('20', 'chanh dây đá viên', 100, 'khác', 'chanhdaydavien.png', '1 chanh dây đá viên'),
	('21', 'chanh đá viên', 100, 'khác', 'chanhdavien.png', '1 chanh đá viên'),
	('22', 'chanh đá xay', 100, 'khác', 'chanhdaxay.png', '1 chanh đá xay'),
	('23', 'tắc đá viên', 100, 'khác', 'tacdavien.png', '1 tắc đá viên'),
	('24', 'Chocolate', 100, 'khác', 'chocolate.png', '1 chocolate'),
	('25', 'Phindi hạnh nhân', 100, 'Phindi', 'phindihanhnhan.png', '1 phindi hạnh nhân'),
	('26', 'Phindi Cacao', 100, 'Phindi', 'phindicacao.png', '1 phindi cacao'),
	('27', 'Phindi cream', 100, 'Phindi', 'phindicream.png', '1 phindi cream'),
	('28', 'cookie trà xanh', 100, 'bánh', 'cookietraxanh.png', '1 cookie trà xanh'),
	('29', 'bánh chuối', 100, 'bánh', 'banhchuoi.png', '1 bánh chuối'),
	('30', 'bánh phô mai caramel', 100, 'bánh', 'banhphomaicaramel.png', '1 bánh phô mai caramel'),
	('31', 'bánh phô mai trà xanh', 100, 'bánh', 'banhphomaitraxanh.png', '1 bánh phô mai trà xanh'),
	('32', 'bánh tiramisu', 100, 'bánh', 'banhtiramisu.png', '1 bánh tiramisu'),
	('33', 'bánh mousse đào', 100, 'bánh', 'banhmoussedao.png', '1 bánh mousse đào'),
	('34', 'cookie vanila', 100, 'bánh', 'cookievanila.png', '1 bánh cookie vanila'),
	('35', 'bánh sữa chua phô mai', 100, 'bánh', 'banhsuachuaphomai.png', '1 bánh sữa chua phô mai'),
	('36', 'bánh phô mai chanh dây', 100, 'bánh', 'banhphomaichanhday.png', '1 bánh phô mai chanh dây'),
	('37', 'bánh low land', 100, 'bánh', 'banhlowland.png', '1 bánh lowland');

-- Dumping structure for table coffeeshop.size
CREATE TABLE IF NOT EXISTS `size` (
  `id_size` varchar(10) NOT NULL,
  `ten_size` varchar(20) NOT NULL,
  PRIMARY KEY (`id_size`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table coffeeshop.size: ~4 rows (approximately)
INSERT INTO `size` (`id_size`, `ten_size`) VALUES
	('L', 'Lớn'),
	('M', 'thường'),
	('N', 'không'),
	('S', 'nhỏ');

-- Dumping structure for table coffeeshop.taikhoan
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `id_taikhoan` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(36) NOT NULL DEFAULT '',
  `ten` varchar(255) NOT NULL DEFAULT '',
  `diachi` varchar(255) NOT NULL DEFAULT '',
  `sdt` varchar(10) NOT NULL DEFAULT '',
  `chucvu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table coffeeshop.taikhoan: ~2 rows (approximately)
INSERT INTO `taikhoan` (`id_taikhoan`, `email`, `password`, `ten`, `diachi`, `sdt`, `chucvu`) VALUES
	('admin001', 'admin@gmail.com', '123', 'tên admin', 'địa chỉ admin', '0909090909', 'admin'),
	('khach001', 'khach@gmail.gom', 'khach123', 'Nguyen Van A', '123 An Dương Vương', '0321451525', 'khachhang');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
