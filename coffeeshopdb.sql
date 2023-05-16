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

-- Dumping structure for table coffeeshop.size
CREATE TABLE IF NOT EXISTS `size` (
  `id_size` varchar(10) NOT NULL,
  `ten_size` varchar(20) NOT NULL,
  PRIMARY KEY (`id_size`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- Dumping data for table coffeeshop.size: ~4 rows (approximately)
INSERT INTO `size` (`id_size`, `ten_size`) VALUES
	('L', 'Lớn'),
	('M', 'thường'),
	('N', 'không'),
	('S', 'nhỏ');

-- Dumping data for table coffeeshop.taikhoan: ~2 rows (approximately)
INSERT INTO `taikhoan` (`id_taikhoan`, `email`, `password`, `ten`, `diachi`, `sdt`, `chucvu`) VALUES
	('AD1', 'admin@gmail.com', '$2y$10$kv0pHTL.s.F/NrugEWl1s.7QMNPnEwdzD.ERDpL36uoR6JK6aD.qq', 'Admin', 'địa chỉ admin', '0909090909', '1');

-- Dumping data for table coffeeshop.mon: ~37 rows (approximately)
INSERT INTO `mon` (`id_mon`, `ten_mon`, `Soluong`, `Loai`, `Hinhanh`, `Mota`) VALUES
	('01', 'Cà Phê Sữa', 100, 'Cà Phê', 'coffee1.png', '1 Cà phê Sữa <br><br> Sản phẩm đặc trưng thương hiệu với nguyên liệu số 1 từ Hạt Robusta thêm Arabica, hoà quyện cùng sữa và đá vừa phải.'),
	('02', 'Cà Phê Đen', 100, 'Cà Phê', 'coffee2.png', '1 Cà phê Đen <br><br> Cà phê đen - Hương thơm tỉnh táo, đắm say vị đậm. Một ngụm đen đượm năng lượng, đem đến sự sảng khoái và thỏa mãn cho mọi ngày mới.'),
	('03', 'Bạc Xỉu', 100, 'Cà Phê', 'milkshake.png', '1 Bạc Xỉu <br><br> Lựa chọn cho bạn "nhẹ đô" cà phê. Giảm nhẹ độ đắng cà phê, tăng thêm độ ngọt từ sữa đặc.'),
	('04', 'Cappuchino', 100, 'Cà Phê', 'cappuchino.png', '1 Cappuchino <br><br> Cà phê sữa đậm đà, vị cà phê đậm hơn Latte. Thêm sưã tươi và bọt sữa trang trí tỉ mỉ.'),
	('05', 'Americano', 100, 'Cà Phê', 'americano.png', '1 Americano <br><br> Ly cà phê với công thức rang xay và pha chế đẳng cấp chuyên gia, nguyên liệu Robusta và Arabica hảo hạng.'),
	('06', 'Espresso', 100, 'Cà Phê', 'espresso.png', '1 Espresso <br><br> Cà phê espresso cùng tỉ lệ nước sôi thích hợp nhưng vẫn đậm đà vị cà phê.'),
	('07', 'Mocha Macchiato', 100, 'Cà Phê', 'mochamacchiato.png', '1 Macchiato <br><br> Hương vị của cà phê espresso đăng đắng kết hợp sữa tươi ngọt dịu tạo nên Macchiato. Tạo hình trang trí tỉ mỉ bằng lớp bọt sữa.'),
	('08', 'Latte', 100, 'Cà Phê', 'latte.png', '1 Latte <br><br> Lựa chọn cho bạn "nhẹ đô" cà phê. Ly cà phê sữa ngọt ngào, thêm sữa tươi và bọt sữa trang trí tỉ mỉ.'),
	('09', 'Freeze Matcha', 100, 'Freeze', 'freezematcha.png', '1 Freeze Matcha <br><br> Món ngon mát lạnh từ vị trà xanh thêm thạch giòn thơm và kem béo ngậy. Phần trang trí có thể bị ảnh hưởng khi vận chuyển.'),
	('10', 'Freeze Chocolate', 100, 'Freeze', 'freezechocolate.png', '1 Freeze Chocolate <br><br> Thêm lạ khẩu vị cùng vị đăng đắng của Sô-cô-la trong Freezee Sô-cô-la. Phần trang trí có thể bị ảnh hưởng khi vận chuyển.'),
	('11', 'Freeze Caramel', 100, 'Freeze', 'freezecaramel.png', '1 Freeze Caramel <br><br> Sự cộng hưởng của hương cà phê đá xay và caramel, thêm kem sữa rưới sốt caramel bên trên. Phần kem có thể bị ảnh hưởng khi vận chuyển.'),
	('12', 'Freeze Cookie', 100, 'Freeze', 'freezecookie.png', '1 Freeze Cookie <br><br> Mát lạnh và không có cà phê ư? Có ngay sự kết hợp giữa bánh Oreo, sữa tươi và whipping cream! Phần kem có thể bị ảnh hưởng khi vận chuyển.'),
	('13', 'Freeze Classic', 100, 'Freeze', 'freezeclassic.png', '1 Freeze Classic <br><br> Sự kết hợp giữa cà phê đá xay và caramel nhưng nhấn mạnh vào vị cà phê đậm đà. Phần kem có thể bị ảnh hưởng khi vận chuyển.'),
	('14', 'Caramel Macchiato', 100, 'Cà Phê', 'caramelmacchiato.png', '1 Caramel Macchiato <br><br> Hương vị của cà phê espresso đăng đắng kết hợp sữa tươi ngọt dịu tạo nên Macchiato. Tạo hình trang trí tỉ mỉ bằng lớp bọt sữa.'),
	('15', 'Trà Sen Vàng (củ năng)', 100, 'Trà', 'trasenvang1.png', '1 Trà Sen Vàng (củ năng) <br><br> Từ Ô Long kết hợp với hương sen thanh mát, thêm nguyên liệu củ năng giòn ngọt và lớp kem mềm mại.'),
	('16', 'Trà Sen Vàng (sen)', 100, 'Trà', 'trasenvang2.png', '1 Trà Sen Vàng (sen) <br><br> Trà Ô long kết hợp với hương sen thanh mát, thêm đậm vị sen bằng hạt sen dẻo thơm và lớp kem mềm mại.'),
	('17', 'Trà Thạch Vải', 100, 'Trà', 'trathachvai.png', '1 Trà Thạch Vải <br><br> Sự kết hợp giữa quả vải mọng nước cùng trà đen và thạch vải giòn thơm hương vải.'),
	('18', 'Trà Xanh Đậu Đỏ', 100, 'Trà', 'traxanhdaudo.png', '1 Trà Xanh Đậu Đỏ <br><br> Vị trà xanh đăng đắng thơm ngát, thêm độ ngọt vừa và mềm mại của đậu đỏ. Ngon ngọt nhưng không ngấy.'),
	('19', 'Sữa Tươi Đá', 100, 'Khác', 'suatuoida.png', '1 Sữa Tươi Đá <br><br> Mát lạnh, thơm ngon, bổ dưỡng. <br> Sữa tươi đá là một thức uống tuyệt vời để làm dịu cơn khát và tăng cường sức sống. Với vị ngọt tự nhiên, hương thơm tinh tế và sự mát lạnh của đá, sữa tươi đá mang đến cảm giác sảng khoái và thỏa mãn cho cơ thể.'),
	('20', 'Chanh Dây Đá Viên', 100, 'Khác', 'chanhdaydavien.png', '1 Chanh Dây Đá Viên <br><br> Hương chanh dây thơm mát, vị chua ngọt quen thuộc và sắc vàng bắt mắt.'),
	('21', 'Chanh Đá Viên', 100, 'Khác', 'chanhdavien.png', '1 Chanh Đá Viên <br><br> Vị chanh thơm mát, chua nhẹ cùng lượng đá viên vừa phải, giải khát tức thì.'),
	('22', 'Chanh Đá Xay', 100, 'Khác', 'chanhdaxay.png', '1 Chanh Đá Xay <br><br> Vẫn vị chanh thơm, vị chua sảng khoái nhưng gấp đôi mát lạnh với đá xay.'),
	('23', 'Tắc Đá Viên', 100, 'Khác', 'tacdavien.png', '1 Tắc Đá Viên <br><br> Vị tắc thơm mát, chua nhẹ cùng lượng đường đá vừa phải, mát lạnh tức thì.'),
	('24', 'Chocolate', 100, 'Khác', 'chocolate.png', '1 Chocolate <br><br> Socola nóng sự kết hợp giữa vị đắng đặc trưng của sô-cô-la, độ ấm nóng vừa phải. Socola đá đậm đà vị sô-cô-la, thêm đá trung hoà vị đăng đắng đặc trưng, thêm mát lạnh.'),
	('25', 'Phindi Hạnh Nhân', 100, 'Phindi', 'phindihanhnhan.png', '1 Phindi Hạnh Nhân <br><br> Cà phê Phin với độ đậm cà phê vừa phải, đặc biệt thêm Hạnh nhân thơm bùi.'),
	('26', 'Phindi Cacao', 100, 'Phindi', 'phindicacao.png', '1 Phindi Cacao <br><br> Cà phê Phin kết hợp cùng Choco ngọt tan mang đến hương vị đắng nhẹ mà ngọt dịu.'),
	('27', 'Phindi Cream', 100, 'Phindi', 'phindicream.png', '1 Phindi Cream <br><br> Cà phê Phin với độ đậm cà phê vừa phải, đực biệt thêm Kem Sữa thơm béo.'),
	('28', 'Cookie Trà Xanh', 100, 'Bánh', 'cookietraxanh.png', '1 Cookie Trà Xanh <br><br> Bánh Cookies trà xanh thanh mát Lighland Coffee 35g/túi 5 cái'),
	('29', 'Bánh Chuối', 100, 'Bánh', 'banhchuoi.png', '1 Bánh Chuối <br><br> Món bánh truyền thống quen thuộc, với nguyên liệu 100% từ chuối tươi và nước cốt dừa nguyên chất.'),
	('30', 'Bánh Phô Mai Caramel', 100, 'Bánh', 'banhphomaicaramel.png', '1 Bánh Phô Mai Caramel <br><br> Bánh mềm mịn, tan chảy với độ thơm béo của phô mai, thêm caramel bắt mắt và ngọt ngào.'),
	('31', 'Bánh Phô Mai Trà xanh', 100, 'Bánh', 'banhphomaitraxanh.png', '1 Bánh Phô Mai Trà Xanh <br><br> Vị trà xanh đắng nhẹ thêm phô mai ít béo, giảm độ ngấy của bánh nhưng vẫn thơm hương trà và đủ độ ngọt.'),
	('32', 'Bánh Tiramisu', 100, 'Bánh', 'banhtiramisu.png', '1 Bánh Tiramisu <br><br> Bánh lạnh thơm mát với nguyên liệu ca-cao Việt Nam, thêm phô mai ít béo và hương thơm nhẹ nhàng của Rhum'),
	('33', 'Bánh Mousse Đào', 100, 'Bánh', 'banhmoussedao.png', '1 Bánh Mousse Đào <br><br> Món bánh thanh mát với trang trí bằng lát đào thật. Mềm xốp và thơm hương đào, tan ngay trong miệng!'),
	('34', 'Cookie Vanila', 100, 'Bánh', 'cookievanila.png', '1 Bánh Cookie Vanila <br><br> Bánh Cookies Vanilla Lighland Coffee 35g/túi 5 cái'),
	('35', 'Bánh Sữa Chua Phô Mai', 100, 'Bánh', 'banhsuachuaphomai.png', '1 Bánh Sữa Chua Phô Mai <br><br> Nghĩ đến màu đỏ, chúng ta sẽ nghĩ đến màu của Giáng Sinh, màu của Lễ Hội & tuyệt nhiên hương vị Bánh mới sẽ là sự bùng nổ về hương vị cho buổi đi chơi, buổi hẹn hò hay buổi hàn thuyên trở nên hết nấc'),
	('36', 'Bánh Phô Mai Chanh Dây', 100, 'Bánh', 'banhphomaichanhday.png', '1 Bánh Phô Mai Chanh Dây <br><br> Vỏ bánh vàng sáng, hương vị kết hợp từ vị beo béo của phô mai cùng với vị chua nhẹ của chanh dây.'),
	('37', 'Bánh LowLand', 100, 'Bánh', 'banhlowland.png', '1 Bánh Lowland <br><br> Tròn tròn núng nính! Chiếc bánh signature của Lowland đậm đà vị sô-cô-la và kem tươi, thêm lớp sô-cô-la phủ ngoài hấp dẫn.'),
	('38', 'Trà Dưa Hấu Vải', 100, 'Trà', 'traduahauvai.png', '1 Trà Dưa Hấu Vải <br><br> Với vị trà mát lạnh, lớp vải tươi và thạch giòn đầy đặn, món trà mới này sẽ đem lại cho bạn cảm giác thanh mát, sảng khoái và tràn đầy năng lượng. <br> Với một hớp thôi là bạn sẽ cảm nhận được một thức uống thật COOL, tươi mới, làm mọi mệt mỏi trôi qua tức thì.');

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
	('37', 'N', 35000),
	('38', 'S', 59000),
	('38', 'L', 69000);

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


-- Dumping data for table coffeeshop.don_dat_hang: ~0 rows (approximately)


/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
