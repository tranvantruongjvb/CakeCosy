-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 20, 2018 lúc 11:30 AM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cakedemo`
--
CREATE DATABASE IF NOT EXISTS `cakedemo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cakedemo`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_customer_2` (`id_customer`),
  KEY `bills_ibfk_1` (`id_customer`),
  KEY `id_customer` (`id_customer`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-04-20', 60000, 'COD', 'ship nhanh không đói', '2018-04-20 08:00:31', '2018-04-20 07:18:36'),
(2, 2, '2018-04-20', 240000, 'COD', 'ship về nhanh', '2018-04-20 09:00:12', '2018-04-20 08:16:51'),
(3, 3, '2018-04-20', 240000, 'COD', 'ship về nhanh', '2018-04-20 09:00:12', '2018-04-20 08:16:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

DROP TABLE IF EXISTS `bill_detail`;
CREATE TABLE IF NOT EXISTS `bill_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `subtotal` decimal(11,0) NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `bill_detail_ibfk_2` (`id_product`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `subtotal`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 1, 66, 1, '60000', 60000, '2018-04-20 08:00:40', '0000-00-00 00:00:00'),
(2, 2, 66, 4, '240000', 60000, '2018-04-20 09:00:27', '0000-00-00 00:00:00'),
(3, 3, 66, 4, '240000', 60000, '2018-04-20 09:00:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `comment` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Chưa có bình luận nào',
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `comment`, `email`, `created_at`) VALUES
(1, 63, 'Bánh thơm ngon', 'tranvantruong.jvb@gmail.com', '2018-04-19 15:39:56'),
(2, 63, 'Bánh có vị rất tuyệt', 'truong170295@gmail.com', '2018-04-19 15:39:56'),
(3, 22, 'bánh ngon tuyệt', 'admin@gmail.com', '2018-04-19 15:39:56'),
(4, 22, 'bánh nóng', 'admin@gmail.com', '2018-04-19 15:39:56'),
(5, 22, 'CakeFood luôn có bánh . :D', 'admin@gmail.com', '2018-04-19 15:39:56'),
(6, 74, 'Bánh ngon tuyệt', 'truong170295@gmail.com', '2018-04-19 15:39:56'),
(7, 66, 'bánh ngon', 'user1@gmail.com', '2018-04-20 08:09:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Đang xử lý',
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5274 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `id_user`, `name`, `email`, `address`, `phone_number`, `status`, `note`, `created_at`, `updated_at`) VALUES
(1, 0, 'tran', 'truong170295@gmail.com', 'mễ trì từ liêm hà nội', '0978172195', 'Đang xử lý', 'ship nhanh không đói', '2018-04-20 08:07:15', '2018-04-20 07:18:36'),
(2, 6, 'Trần Văn Trường', 'truong170295@gmail.com', 'tiến thịnh mê linh hà nội', '0978172195', 'Đang xử lý', 'ship về nhanh', '2018-04-20 08:59:57', '2018-04-20 08:16:51'),
(3, 6, 'Trần Văn Trường', 'truong170295@gmail.com', 'tiến thịnh mê linh hà nội', '0978172195', 'Đang chuyển đi', 'ship về nhanh', '2018-04-20 09:02:11', '2018-04-20 08:16:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `get_email`
--

DROP TABLE IF EXISTS `get_email`;
CREATE TABLE IF NOT EXISTS `get_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `get_email`
--

INSERT INTO `get_email` (`id`, `email`) VALUES
(1, 'truong170295@gmail.com'),
(2, 'user1@gmail.com'),
(3, 'b@gmail.com'),
(4, 'user2@gmail.com'),
(5, 'truong170295@gmail.com'),
(6, 'truong170295@gmail.com'),
(7, 'truong170295@gmail.com'),
(8, 'truong170295@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `new` float(10,0) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'cái',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_id_type_foreign` (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `source`, `new`, `unit_price`, `promotion_price`, `image`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'Bánh ngọt dâu', 2, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 120000, 0, '/webroot/img/uploads/bánh ngọt dâu.jpg', 'hộp', '2018-04-18 00:00:00', NULL),
(2, 'Bánh Crepe Chocolate', 6, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', NULL, 180000, 16000, '/img/uploads/crepe-chocolate.jpg', 'hộp', '2016-10-26 00:00:00', '2016-10-24 22:11:00'),
(3, 'Bánh Crepe Trà xanh', 5, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 160000, 0, '/img/uploads/crepe-traxanh.jpg', 'hộp', '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(4, '    Bánh Crepe Đào', 5, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 380000, 0, '/img/uploads/crepe-dao.jpg', 'hộp', '2016-10-26 03:00:16', '2018-04-03 00:00:00'),
(5, ' Bánh Crepe Dâu', 5, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 160000, 0, '/img/uploads/crepedau.jpg', 'hộp', '2018-03-07 17:00:00', '2018-04-03 00:00:00'),
(6, ' Bánh Crepe sữa', 5, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 160000, 0, '/img/uploads/crepedau.jpg', 'hộp', '2018-03-07 17:00:00', '2018-04-03 00:00:00'),
(7, 'Bánh Crepe Táo', 5, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 160000, 0, '/img/uploads/crepe-tao.jpg', 'hộp', '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(8, 'Bánh Crepe Trà xanh', 5, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 160000, 0, '/img/uploads/crepe-traxanh.jpg', 'hộp', '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(9, 'Bánh Crepe Sầu riêng và Dứa', 5, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 160000, 0, '/img/uploads/saurieng-dua.jpg', 'hộp', '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(10, 'Bánh sinh nhật rau câu dứa', 3, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 200000, 0, '/img/uploads/210215-banh-sinh-nhat-rau-cau-body- (6).jpg', 'cái', '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(11, 'Bánh Gato Trái cây Việt Quất', 3, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 250000, 0, '/img/uploads/544bc48782741.png', 'cái', '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(12, 'Bánh sinh nhật rau câu trái cây', 3, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 200000, 0, '/img/uploads/210215-banh-sinh-nhat-rau-cau-body- (6).jpg', 'cái', '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(13, 'Bánh kem Chocolate Dâu', 3, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 300000, 0, '/img/uploads/banh kem sinh nhat.jpg', 'cái', '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(14, 'Bánh kem Dâu III', 3, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 300000, 0, '/img/uploads/Banh-kem (6).jpg', 'cái', '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(15, 'Bánh kem Dâu I', 3, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 350000, 0, '/img/uploads/banhkem-dau.jpg', 'cái', '2018-03-08 00:00:00', '2016-10-27 02:24:00'),
(16, 'Bánh trái cây II', 3, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 150000, 0, '/img/uploads/banhtraicay.jpg', 'hộp', '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(17, 'Apple Cake', 3, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 250000, 0, '/img/uploads/Fruit-Cake_7979.jpg', 'cai', '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(18, 'Bánh ngọt nhân cream táo', 2, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 180000, 0, '/img/uploads/20131108144733.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(19, 'Bánh Chocolate Trái cây', 2, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 150003, 0, '/img/uploads/chocolate-fruit636098975917921990.jpg', 'hộp', '2018-03-08 00:00:00', '2016-10-19 03:20:00'),
(20, 'Bánh Chocolate Trái cây II', 2, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 150000, 0, '/img/uploads/Fruit-Cake_7981.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(21, 'Peach Cake', 2, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 160000, 0, '/img/uploads/Peach-Cake_3294.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(22, 'Bánh bông lan trứng muối I', 1, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 160000, 0, '/img/uploads/banhbonglantrung.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(23, 'Bánh bông lan trứng muối II', 1, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 180000, 0, '/img/uploads/banhbonglantrungmuoi.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(24, 'Bánh French', 1, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 180000, 0, '/img/uploads/banh-man-thu-vi-nhat-1.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(25, 'Bánh mì Australia', 1, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 80000, 70000, '/img/uploads/dung-khoai-tay-lam-banh-gato-man-cuc-ngon.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(26, 'Bánh mặn thập cẩm', 1, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 50000, 0, '/img/uploads/Fruit-Cake.png', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(27, 'Bánh Muffins trứng', 1, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 100000, 0, '/img/uploads/maxresdefault.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(28, 'Bánh Scone Peach Cake', 1, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 120000, 0, '/img/uploads/Peach-Cake_3300.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(29, 'Bánh mì Loaf I', 1, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 100000, 100000, '/img/uploads/sli12.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(30, 'Bánh kem Chocolate Dâu I', 4, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 380000, 350000, '/img/uploads/sli12.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(31, 'Bánh kem Trái cây I', 4, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 380000, 350000, '/img/uploads/Fruit-Cake.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(32, 'Bánh kem Trái cây II', 4, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 380000, 350000, '/img/uploads/banhtraicay.jpg', 'cái', '2016-10-13 00:00:00', '2016-10-19 03:20:00'),
(33, 'Bánh kem Doraemon', 4, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 280000, 250000, '/img/uploads/p1392962167_banh74.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(34, 'Bánh kem Caramen Pudding', 4, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 280000, 280000, '/img/uploads/Caramen-pudding636099031482099583.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(35, 'Bánh kem Chocolate Fruit', 4, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 320000, 300000, '/img/uploads/chocolate-fruit636098975917921990.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(36, 'Bánh kem Coffee Chocolate GH6', 4, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 320000, 300000, '/img/uploads/COFFE-CHOCOLATE636098977566220885.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(37, 'Bánh kem Mango Mouse', 4, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 320000, 300000, '/img/uploads/mango-mousse-cake.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(38, 'Bánh kem Matcha Mouse', 4, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 350000, 330000, '/img/uploads/MATCHA-MOUSSE.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(39, 'Bánh kem Flower Fruit', 4, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 350000, 330000, '/img/uploads/flower-fruits636102461981788938.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(40, 'Bánh kem Strawberry Delight', 4, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 350000, 0, '/img/uploads/strawberry-delight636102445035635173.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(41, 'Bánh kem Raspberry Delight', 4, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 350000, 330000, '/img/uploads/raspberry.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(42, 'Beefy Pizza', 6, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 150000, 130000, '/img/uploads/40819_food_pizza.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(43, 'Hawaii Pizza', 6, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 120000, 120000, '/img/uploads/hawaiian paradise_large-900x900.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(44, 'Smoke Chicken Pizza', 6, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 120000, 120000, '/img/uploads/chicken black pepper_large-900x900.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(45, 'Sausage Pizza', 6, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 120000, 120000, '/img/uploads/pizza-miami.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(46, 'Ocean Pizza', 6, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 120000, 120000, '/img/uploads/seafood curry_large-900x900.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(47, 'All Meaty Pizza', 6, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 140000, 150000, '/img/uploads/all1).jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(48, 'Tuna Pizza', 6, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 140000, 150000, '/img/uploads/54eaf93713081_-_07-germany-tuna.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(49, 'Bánh su kem nhân dừa', 7, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 120000, 100000, '/img/uploads/maxresdefault.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(50, 'Bánh su kem sữa tươi', 7, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 120000, 100000, '/img/uploads/sukem.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(51, 'Bánh su kem sữa tươi chiên giòn', 7, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 150000, 160000, '/img/uploads/1434429117-banh-su-kem-chien-20.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(52, 'Bánh su kem dâu sữa tươi', 7, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 150000, 0, '/img/uploads/sukemdau.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(53, 'Bánh su kem bơ sữa tươi', 7, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 150000, 0, '/img/uploads/He-Thong-Banh-Su-Singapore-Chewy-Junior.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(54, 'Bánh su kem nhân trái cây sữa tươi', 7, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 150000, 140000, '/img/uploads/foody-banh-su-que-635930347896369908.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(55, 'Bánh su kem cà phê', 7, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 150000, 130000, '/img/uploads/banh-su-kem-ca-phe-1.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(56, 'Bánh su kem phô mai', 7, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 150000, 0, '/img/uploads/50020041-combo-20-banh-su-que-pho-mai-9.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(57, 'Bánh su kem sữa tươi chocolate', 7, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 150000, 0, '/img/uploads/combo-20-banh-su-que-kem-sua-tuoi-phu-socola.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(58, 'Bánh Macaron Pháp', 2, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 200000, 180000, '/img/uploads/Macaron9.jpg', '', '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(59, 'Bánh Tiramisu - Italia', 2, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 200000, 0, '/img/uploads/234.jpg', '', '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(60, 'Bánh Táo - Mỹ', 2, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 200000, 190000, '/img/uploads/1234.jpg', '', '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(61, 'Bánh Cupcake - Anh Quốc', 6, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 150000, 120000, '/img/uploads/cupcake.jpg', 'cái', NULL, NULL),
(62, 'Bánh Sachertorte', 6, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 0, 250000, 220000, '/img/uploads/111.jpg', 'cái', NULL, NULL),
(63, 'Bánh Crepe Sầu riêng', 5, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 150000, 0, '/img/uploads/1430967449-pancake-sau-rieng-6.jpg', 'hộp', '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(64, 'Bánh Su Kem Singapore', 7, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 50000, 0, '/webroot/img/uploads/Bánh su kem Singapore.jpg', NULL, '2018-03-26 00:00:00', NULL),
(65, 'Bánh Ngọt Ý', 2, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 150000, 0, '/webroot/img/uploads/Mê-đắm-với-bánh-ngọt Ý.jpg', 'hộp', '2018-03-26 00:00:00', NULL),
(66, 'Bánh Pizza Mặn', 1, 'Ngon,bổ,rẻ', 'Với các nguyên liệu chủ yếu được nhập khẩu từ Ý và Anh Quốc', 1, 60000, 0, '/webroot/img/uploads/banh my man.jpg', 'cái', '2018-04-04 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `description`, `image`) VALUES
(1, 'Bánh Thơm Ngon, Đảm Bảo Chất Lượng', '/webroot/img/uploads/bánh ngọt dâu.jpg'),
(2, 'Bánh Thơm Ngon, Đảm Bảo Chất Lượng', '/webroot/img/uploads/Bánh su kem Singapore.jpg'),
(3, 'Bánh Thơm Ngon, Đảm Bảo Chất Lượng', '/img/uploads/20131108144733.jpg'),
(4, 'Bánh Thơm Ngon, Đảm Bảo Chất Lượng', '/img/uploads/Macaron9.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typeproducts`
--

DROP TABLE IF EXISTS `typeproducts`;
CREATE TABLE IF NOT EXISTS `typeproducts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `typeproducts`
--

INSERT INTO `typeproducts` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Bánh mặn', 'Nếu từng bị mê hoặc bởi các loại tarlet ngọt thì chắn chắn bạn không thể bỏ qua những loại tarlet mặn. Ngoài hình dáng bắt mắt, lớp vở bánh giòn giòn cùng với nhân mặn như thịt gà, nấm, thị heo ,… của bánh sẽ chinh phục bất cứ ai dùng thử.', '/img/uploads/banh-man-thu-vi-nhat-1.jpg', NULL, NULL),
(2, 'Bánh ngọt', 'Bánh ngọt là một loại thức ăn thường dưới hình thức món bánh dạng bánh mì từ bột nhào, được nướng lên dùng để tráng miệng. Bánh ngọt có nhiều loại, có thể phân loại dựa theo nguyên liệu và kỹ thuật chế biến như bánh ngọt làm từ lúa mì, bơ, bánh ngọt dạng bọt biển. Bánh ngọt có thể phục vụ những mục đính đặc biệt như bánh cưới, bánh sinh nhật, bánh Giáng sinh, bánh Halloween..', '/img/uploads/20131108144733.jpg', '2016-10-11 19:16:15', '2016-10-12 18:38:35'),
(3, 'Bánh trái cây', 'Bánh trái cây, hay còn gọi là bánh hoa quả, là một món ăn chơi, không riêng gì của Huế nhưng khi \"lạc\" vào mảnh đất Cố đô, món bánh này dường như cũng mang chút tinh tế, cầu kỳ và đặc biệt. Lấy cảm hứng từ những loại trái cây trong vườn, qua bàn tay khéo léo của người phụ nữ Huế, món bánh trái cây ra đời - ngọt thơm, dịu nhẹ làm đẹp lòng biết bao người thưởng thức.', '/img/uploads/banhtraicay.jpg', '2016-10-17 17:33:33', '2016-10-15 00:25:27'),
(4, 'Bánh kem', 'Với người Việt Nam thì bánh ngọt nói chung đều hay được quy về bánh bông lan – một loại tráng miệng bông xốp, ăn không hoặc được phủ kem lên thành bánh kem. Tuy nhiên, cốt bánh kem thực ra có rất nhiều loại với hương vị, kết cấu và phương thức làm khác nhau chứ không chỉ đơn giản là “bánh bông lan” chung chung đâu nhé!', '/img/uploads/banhkem.jpg', '2016-10-25 20:29:19', '2016-10-25 19:22:22'),
(5, 'Bánh crepe', 'Crepe là một món bánh nổi tiếng của Pháp, nhưng từ khi du nhập vào Việt Nam món bánh đẹp mắt, ngon miệng này đã làm cho biết bao bạn trẻ phải “xiêu lòng”', '/img/uploads/crepe.jpg', '2016-10-27 21:00:00', '2016-10-26 21:00:23'),
(6, 'Bánh Pizza', 'Pizza đã không chỉ còn là một món ăn được ưa chuộng khắp thế giới mà còn được những nhà cầm quyền EU chứng nhận là một phần di sản văn hóa ẩm thực châu Âu. Và để được chứng nhận là một nhà sản xuất pizza không hề đơn giản. Người ta phải qua đủ mọi các bước xét duyệt của chính phủ Ý và liên minh châu Âu nữa… tất cả là để đảm bảo danh tiếng cho món ăn này.', '/img/uploads/pizza.jpg', '2016-10-25 10:19:00', NULL),
(7, 'Bánh su kem', 'Bánh su kem là món bánh ngọt ở dạng kem được làm từ các nguyên liệu như bột mì, trứng, sữa, bơ.... đánh đều tạo thành một hỗn hợp và sau đó bằng thao tác ép và phun qua một cái túi để định hình thành những bánh nhỏ và cuối cùng được nướng chín. Bánh su kem có thể thêm thành phần Sô cô la để tăng vị hấp dẫn. Bánh có xuất xứ từ nước Pháp.', '/img/uploads/sukemdau.jpg', '2016-10-25 10:19:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(14) NOT NULL AUTO_INCREMENT,
  `permission` int(11) NOT NULL DEFAULT '1',
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `birthdate` date NOT NULL,
  `created` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `permission`, `name`, `username`, `password`, `email`, `address`, `phone`, `birthdate`, `created`, `updated_at`) VALUES
(1, 3, 'Trần Văn Trường', 'admin1', '$2y$10$PgpUoPK1DaLz7YNshBMsYewwcULGnjZeUjfm/ZTxA0XqjwmWxdjFy', 'admin@gmail.com', 'Hà nội', '0978172195', '1995-02-17', '2017-12-12 09:16:11', '2018-04-19 00:00:00'),
(2, 2, 'nongdan1', 'nongdan1', '$2y$10$E1ouJvxBEaHHDVfs.z.2O.X01OfiuAlRFe2Fnc8Fr6tgJf1Z3K.BS', 'bc@gmail.com', 'Hà Nội', '0123456987', '2018-03-28', '2018-04-05 08:08:42', '2018-04-05 00:00:00'),
(3, 3, 'Trần Văn Trường', 'truongka', '$2y$10$/DVvhAtfFPeyK5j.u.X8YOibjPjJH5OQ84.ZAT7vZ1x7A5BMsK4rS', 'truong170295@gmail.com', 'hà nội việt nam', '0123654789', '1992-12-12', '2018-04-16 03:16:58', '2018-04-20 00:00:00'),
(4, 1, 'user2', 'user2', '$2y$10$.hn5anyUQ7wzdnF3TlMx9eX467jLXyBG/dKdk5UzeU3KaXVgxy6e2', 'user2@gmail.com', 'hà nội thành phố ', '0123456783', '1223-02-12', '2018-04-18 03:00:43', NULL),
(5, 1, 'user3', 'user3', '$2y$10$ECkLoBedO4wxKMVOC66okOvaaCifYbi4jp8NL9.bE92ul/0MuSU/m', 'user3@gmail.com', 'hà nội phố', '09781721953', '1995-02-17', '2018-04-18 08:47:50', NULL),
(6, 1, 'user1', 'user1', '$2y$10$ccsa9AvpTI1EGInwNXnBcuSVg.hFavPDSAwTxDl0dGCYBxMseBMb6', 'user1@gmail.com', 'tiến thịnh mê linh hà nội', '0123456785', '1995-02-17', '2018-04-20 08:02:19', '2018-04-20 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
