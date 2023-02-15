-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 14, 2023 lúc 11:22 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bcomputer`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` bit(1) DEFAULT b'0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `title`, `description`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sale 10% for purchase from $3000 for laptop products', 'Sale off at the beginning of the lucky year, have a frame deal. Buy now at BCompter shop', 'Dell_XPS_13_Plus_9320_70295789_02.PNG', 'laptop', b'1', '2023-02-14 20:34:07', '2023-02-14 20:34:07'),
(2, 'Sale up to 20% for purchase from $3000 for PC series products', 'Sale off at the beginning of the lucky year, have a frame deal. Buy now at BCompter shop', 'Asus_AIO_V241EAT_i3_1115G4_4GB_512GB_23.8_FulllHD_1.png', 'pc-amd', b'1', '2023-02-14 20:36:06', '2023-02-14 20:36:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` bit(1) DEFAULT b'0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Acer', NULL, b'1', '2023-01-18 22:47:19', '0000-00-00 00:00:00'),
(2, 'Asus', NULL, b'1', '2023-01-25 19:39:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_tk` int(11) DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `quanity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `imageIcon` varchar(255) DEFAULT NULL,
  `status` bit(1) DEFAULT b'0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `imageIcon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'laptop', 'laptop', '002-laptop.png', b'1', '2023-01-07 05:37:42', '0000-00-00 00:00:00'),
(2, 'PC Intel', 'pc-intel', 'PC Intel', '004-computer.png', b'1', '2023-01-07 05:39:37', '0000-00-00 00:00:00'),
(3, 'PC AMD', 'pc-amd', 'PC AMD', '004-computer.png', b'1', '2023-01-07 05:44:47', '0000-00-00 00:00:00'),
(4, 'Accessories PC', 'pc-accessories', 'Accessories PC', '008-graphic-card.png', b'1', '2023-02-11 13:08:15', '0000-00-00 00:00:00'),
(5, 'Monitor', 'monitor', 'Monitor', '001-monitor.png', b'1', '2023-01-07 05:44:47', '0000-00-00 00:00:00'),
(6, 'Table & Chair', 'table-chair', 'Table & Chair', '010-gaming-chair.png', b'1', '2023-01-07 05:44:47', '0000-00-00 00:00:00'),
(7, 'Mouse & Keyboard', 'mouse-keyboard', 'Mouse & Keyboard', '005-keyboard-and-mouse.png', b'1', '2023-01-07 05:44:47', '0000-00-00 00:00:00'),
(8, 'Headphones, Speakers', 'headphone-speakers', 'Headphones, Speakers', '009-headphones.png', b'1', '2023-01-07 05:44:47', '0000-00-00 00:00:00'),
(9, 'Other accessories', 'orther-accessoris', 'Other accessories', '007-hard-disc.png', b'1', '2023-01-07 05:44:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `id_tk` int(11) DEFAULT NULL,
  `parentComment` int(11) NOT NULL,
  `status` bit(1) DEFAULT b'1',
  `thoigian` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `parentMenu` int(11) DEFAULT NULL,
  `status` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oderdetails`
--

CREATE TABLE `oderdetails` (
  `id_order` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `discount` double(8,2) DEFAULT 0.00,
  `totalItem` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_tk` int(11) NOT NULL,
  `date_order` date NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cod` varchar(255) DEFAULT NULL,
  `payment` bit(1) DEFAULT b'0',
  `id_voucher` int(11) DEFAULT NULL,
  `total` float(10,2) DEFAULT NULL,
  `statusOrder` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `id_ca` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `sup_id` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `cauhinh` varchar(255) DEFAULT NULL,
  `id_brand` int(11) DEFAULT NULL,
  `featured` bit(1) DEFAULT b'0',
  `status` bit(1) DEFAULT b'0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `id_ca`, `discount`, `sup_id`, `description`, `price`, `quantity`, `cauhinh`, `id_brand`, `featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Chuột Asus Rog Gladius III Wireless Aimpoint White', 'chuot-asus-rog-gladius-iii-wireless-aimpoint-white', 7, 30, 1, 'Asus Rog Gladius III Wireless Aimpoint dòng chuột không dây chơi game với phạm vi kết nối rộng, độ trễ cực thấp cùng với tốc độ phản hồi cực nhanh mang đến cho người chơi những pha xử lý mượt. Đặc biệt, với thiết kế công thái học giúp giảm mệt mỏi ngay cả sau nhiều giờ sử dụng, cùng với thời lượng pin dài giúp bạn tự tin tham gia mọi trò chơi.', '175.55', 10, NULL, 1, b'1', b'1', '2023-02-01 17:27:15', '2023-01-19 06:10:35'),
(2, 'Laptop Asus VivoBook 14 M413IA EK481T', 'laptop-asus-vivobook-14-m413ia-ek481t', 1, 25, 1, 'Màu Xanh Gaia lấy cảm hứng từ thiên nhiên có nghĩa bạn có thể thích nghi và sẵn sàng cho mọi thứ đến với mình.\r\nMàu Đỏ táo bạo cho phép bạn tự tin thể hiện mình, không sợ người khác nghĩ gì.\r\nMàu Trắng xà cừ thể hiện rằng bạn dám ước mơ. Bạn thoải mái với ý tưởng của mình và tự hào về những gì bạn làm được.\r\nMàu Đen Indie thể hiện khả năng lãnh đạo và tính độc lập không lùi bước, bạn sẵn sàng chịu trách nhiệm trong mọi tình huống và không ngại ngần khi phải lên tiếng vì người khác.\r\n\r\nMỏng và nhẹ\r\nAsus VivoBook S14 giúp bạn có thể làm việc và giải trí ngay cả trong lúc di chuyển. Với độ dày chỉ 15.9mm, tổng khối lượng chỉ 1,4kg và thiết kế siêu mỏng, bạn chỉ cần cho VivoBook S14 vào balo và mang đi mọi nơi bạn muốn nên hãy ra ngoài và đừng ngần ngại thể hiện bản thân với thế giới xung quanh.\r\n\r\nMàn hiển thị NanoEdge\r\nMàn hình NanoEdge viền mỏng đem đến cho bạn trải nghiệm hình ảnh đắm chìm và chiếm không gian nhỏ gọn hơn giúp VivoBook S14 chiếm ít không gian trên bàn làm việc hoặc trong ba lô của bạn. Trên tất cả, màn hình Full HD này có góc nhìn rộng và tái tạo màu sắc vượt trội để đem lại hình ảnh chân thực, sống động.', '852.45', 5, NULL, 2, b'1', b'1', '2023-02-11 13:16:07', '2023-01-25 19:41:52'),
(3, 'Laptop Asus VivoBook 14 X1402ZA EK084W', 'laptop-asus-vivobook-14-x1402za-ek084w', 1, 15, 1, 'Cấu hình vượt trội trên laptop Asus VivoBook X1402ZA EK084W\r\nSử dụng bộ vi xử lý Intel core i5-1240P mạnh mẽ cho phép Asus VivoBook X1402ZA giải quyết mọi tác vụ văn phòng cơ bản đến nâng cao. Việc làm đồ họa cơ bản trên máy cũng được hỗ trợ với VGA tích hợp Intel® Iris Xe Graphics. 8GB RAM DDR4 xử lý đa nhiệm nhanh chóng cho những thao tác mượt mà. Bộ lưu trữ 256GB thỏa sức lưu trữ các dữ liệu quan trọng mà người dùng cần.', '703.20', 10, NULL, 2, b'1', b'1', '2023-02-03 18:38:21', '2023-01-25 19:43:42'),
(4, 'Laptop Asus Vivobook 14 X1402ZA EK232W', 'laptop-asus-vivobook-14-x1402za-ek232w', 1, 20, 1, 'Laptop Asus Vivobook 14 sở hữu một game màu xanh đen trung tính kết hợp cùng lớp vỏ cứng cáp được đầu tư chất liệu cao cấp. Logo dòng sản phẩm được đặt tinh tế ở mặt nắp của laptop, không quá cầu kỳ phô trương nhưng cũng đủ để gây ấn tượng với mọi người xung quanh. Với kiểu dáng gập 180 độ còn mang đến sự thuận tiện trong quá trình trao đổi công việc hay chia sẻ màn hình với người đối diện. Về tính di động thì chiếc Asus Vivobook 14 hoàn toàn có thể đáp ứng được với trọng lượng 1.5kg và dày khoảng 1.99cm, dễ dàng mang đi mọi nơi.', '575.00', 10, NULL, 2, b'1', b'1', '2023-02-03 18:38:25', '2023-02-01 17:29:13'),
(5, 'Laptop ASUS Vivobook 15 X1502ZA BQ127W', 'laptop-asus-vivobook-15-x1502za-bq127w', 1, 26, 1, 'Hiệu năng Vivobook 15 X1502ZA BQ127W vượt trội\r\nLaptop được trang bị CPU Intel Core i5 - 1240P 1.7GHz up to 4.4GHz 12MB gen 12th cho tốc độ xử lý tuyệt vời và mang đến hiệu năng ấn tượng. Kết hợp với nó sẽ là VGA Intel Iris Xe Graphics tích hợp cho khả năng xử lý đồ họa khỏe. Bạn có thể thực hiện tốt một số tác vụ nặng và yêu cầu mức hiển thị đồ họa cao như thiết kế, render video hay chơi một số tựa game có setting đồ họa trung bình như Genshin Impact, CSGO, LOL,...', '728.00', 10, NULL, 2, b'1', b'1', '2023-02-11 13:14:13', '2023-02-07 16:24:22'),
(6, 'Laptop ASUS VivoBook 15X OLED M1503QA L1028W', 'laptop-asus-vivobook-15x-oled-m1503qa-l1028w', 1, 20, 1, 'Để duy trì mọi hoạt động và công suất làm việc từ các linh kiện một cách tốt nhất nhà Asus đã trang bị thêm hệ thống tản nhiệt trên ASUS VivoBook 15X OLED. Công nghệ tản nhiệt Asus IceCool hiệu quả khi sử dụng 6 ống dẫn nhiệt và bộ quạt IceBlade 87 cánh được làm bằng Polyme tinh thể lỏng cao cấp. Tất cả góp phần trong việc dẫn các khí nóng được sản sinh trong quá trình vận hành máy từ các linh kiện bên trong thân máy. Từ đó tối ưu hóa công việc một cách trơn tru và mượt mà nhất cho người dùng.', '639.00', 19, NULL, 2, b'1', b'1', '2023-02-11 13:14:06', '2023-02-01 17:32:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productimage`
--

CREATE TABLE `productimage` (
  `id` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `productimage`
--

INSERT INTO `productimage` (`id`, `id_pro`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Asus_ROG_Keris_Wireless_EVA_Edition_01.PNG', '2023-01-18 22:49:51', '2023-01-18 22:49:51'),
(2, 1, 'Asus_ROG_Keris_Wireless_EVA_Edition_02.PNG', '2023-01-18 22:49:51', '2023-01-18 22:49:51'),
(3, 1, 'Asus_ROG_Keris_Wireless_EVA_Edition_03.PNG', '2023-01-18 22:49:51', '2023-01-18 22:49:51'),
(4, 1, 'Asus_ROG_Keris_Wireless_EVA_Edition_04.PNG', '2023-01-18 22:49:51', '2023-01-18 22:49:51'),
(5, 1, 'Asus_ROG_Keris_Wireless_EVA_Edition_05.PNG', '2023-01-18 22:49:51', '2023-01-18 22:49:51'),
(6, 1, 'Asus_ROG_Keris_Wireless_EVA_Edition_06.PNG', '2023-01-18 22:49:51', '2023-01-18 22:49:51'),
(7, 1, 'Asus_ROG_Keris_Wireless_EVA_Edition_07.PNG', '2023-01-18 22:49:51', '2023-01-18 22:49:51'),
(8, 2, 'Asus_VivoBook_14_M413IA_EK481T_01.PNG', '2023-01-25 19:41:53', '2023-01-25 19:41:53'),
(9, 2, 'Asus_VivoBook_14_M413IA_EK481T_02.PNG', '2023-01-25 19:41:53', '2023-01-25 19:41:53'),
(10, 2, 'Asus_VivoBook_14_M413IA_EK481T_03.PNG', '2023-01-25 19:41:53', '2023-01-25 19:41:53'),
(11, 3, 'Asus_VivoBook_14_X1402ZA_EK084W_01.PNG', '2023-01-25 19:43:42', '2023-01-25 19:43:42'),
(12, 3, 'Asus_VivoBook_14_X1402ZA_EK084W_02.PNG', '2023-01-25 19:43:42', '2023-01-25 19:43:42'),
(13, 3, 'Asus_VivoBook_14_X1402ZA_EK084W_03.PNG', '2023-01-25 19:43:42', '2023-01-25 19:43:42'),
(14, 3, 'Asus_VivoBook_14_X1402ZA_EK084W_04.PNG', '2023-01-25 19:43:42', '2023-01-25 19:43:42'),
(15, 3, 'Asus_VivoBook_14_X1402ZA_EK084W_05.PNG', '2023-01-25 19:43:42', '2023-01-25 19:43:42'),
(16, 4, 'Asus_Vivobook_14_X1402ZA_EK232W_01.PNG', '2023-02-01 17:29:13', '2023-02-01 17:29:13'),
(17, 4, 'Asus_Vivobook_14_X1402ZA_EK232W_02.PNG', '2023-02-01 17:29:13', '2023-02-01 17:29:13'),
(18, 4, 'Asus_Vivobook_14_X1402ZA_EK232W_03.PNG', '2023-02-01 17:29:13', '2023-02-01 17:29:13'),
(19, 5, 'ASUS_Vivobook_15_X1502ZA_BQ127W_01.PNG', '2023-02-01 17:30:24', '2023-02-01 17:30:24'),
(20, 5, 'ASUS_Vivobook_15_X1502ZA_BQ127W_02.PNG', '2023-02-01 17:30:24', '2023-02-01 17:30:24'),
(21, 5, 'ASUS_Vivobook_15_X1502ZA_BQ127W_03.PNG', '2023-02-01 17:30:24', '2023-02-01 17:30:24'),
(22, 5, 'ASUS_Vivobook_15_X1502ZA_BQ127W_04.PNG', '2023-02-01 17:30:24', '2023-02-01 17:30:24'),
(23, 5, 'ASUS_Vivobook_15_X1502ZA_BQ127W_05.PNG', '2023-02-01 17:30:24', '2023-02-01 17:30:24'),
(24, 5, 'ASUS_Vivobook_15_X1502ZA_BQ127W_06.PNG', '2023-02-01 17:30:24', '2023-02-01 17:30:24'),
(25, 5, 'ASUS_Vivobook_15_X1502ZA_BQ127W_07.PNG', '2023-02-01 17:30:24', '2023-02-01 17:30:24'),
(26, 6, 'ASUS_VivoBook_15X_OLED_M1503QA_L1028W_01.PNG', '2023-02-01 17:32:57', '2023-02-01 17:32:57'),
(27, 6, 'ASUS_VivoBook_15X_OLED_M1503QA_L1028W_02.PNG', '2023-02-01 17:32:57', '2023-02-01 17:32:57'),
(28, 6, 'ASUS_VivoBook_15X_OLED_M1503QA_L1028W_03.PNG', '2023-02-01 17:32:57', '2023-02-01 17:32:57'),
(29, 6, 'ASUS_VivoBook_15X_OLED_M1503QA_L1028W_04.PNG', '2023-02-01 17:32:57', '2023-02-01 17:32:57'),
(30, 6, 'ASUS_VivoBook_15X_OLED_M1503QA_L1028W_05.PNG', '2023-02-01 17:32:58', '2023-02-01 17:32:58'),
(31, 6, 'ASUS_VivoBook_15X_OLED_M1503QA_L1028W_06.PNG', '2023-02-01 17:32:58', '2023-02-01 17:32:58'),
(32, 6, 'ASUS_VivoBook_15X_OLED_M1503QA_L1028W_07.PNG', '2023-02-01 17:32:58', '2023-02-01 17:32:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` bit(1) DEFAULT b'0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `image`, `address`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Asus', 'Asus.png', '324/26 Hoàng Văn Thụ, Phường 4, Quận Tân Bình, TP HCM', '0938880967', 'asus.support@gmail.com', b'1', '2023-02-07 15:45:48', '2023-02-07 15:45:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbnotifymessage`
--

CREATE TABLE `tbnotifymessage` (
  `id` int(11) NOT NULL,
  `id_tk` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `dateNotice` varchar(20) DEFAULT NULL,
  `status` bit(1) DEFAULT b'0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `status` bit(1) DEFAULT b'1',
  `active_token` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `dateRegister` datetime DEFAULT NULL,
  `loginStatus` bit(1) DEFAULT NULL,
  `device_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `birthday`, `email`, `email_verified_at`, `phone`, `address`, `image`, `password`, `level`, `status`, `active_token`, `remember_token`, `dateRegister`, `loginStatus`, `device_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Anh Khoa', NULL, 'nguyenkhoa@gmail.com', NULL, NULL, NULL, 'avatar_1.jpg', '$2y$10$kUVTujWoWAuoETcYI7BVdO7bewV/QpxWgQrnn5ZGpMymNQ3ZjJr1K', 1, b'1', NULL, NULL, '2023-01-06 13:29:46', b'0', NULL, '2023-01-06 06:45:14', '2023-01-06 06:29:46'),
(2, 'Phạm Văn Mẫn', NULL, 'manpham@gmail.com', NULL, NULL, NULL, 'avatar-default.png', '$2y$10$AfUwNsZKaNBsoQSVxm/fauT7EyBT2nZ8XU.6DmDvI70fQkZYj/h5e', 2, b'1', NULL, NULL, '2023-01-06 13:31:10', b'0', NULL, '2023-01-06 06:42:41', '2023-01-06 06:31:10'),
(3, 'Lưu Vĩnh Hán', NULL, 'hanvinh@gmail.com', NULL, NULL, NULL, 'avatar-default.png', '$2y$10$ccfNyAKl3FZeNVXbzAd1Feo2yxTwVSmoY0ENfaGnlMsHRJ2dLUPmy', 1, b'1', NULL, NULL, '2023-01-06 13:31:36', b'0', NULL, '2023-01-06 06:31:36', '2023-01-06 06:31:36'),
(4, 'Phạm Thiên Phúc', NULL, 'phucpham@gmail.com', NULL, NULL, NULL, 'avatar-default.png', '$2y$10$c2FqN34VLSo/oj1hiKxTb.iKMt8DICK5jVGHNkLLjGwv4ebRNkDf6', 2, b'1', NULL, NULL, '2023-01-06 13:32:17', b'0', NULL, '2023-01-06 06:42:46', '2023-01-06 06:32:17'),
(5, 'Nguyễn Khoa', NULL, 'admin@gmail.com', NULL, NULL, NULL, 'avatar_1.jpg', '$2y$10$t0ZuCucy8q8hrQmh.DiviuvVA3N6mVo1XJOmmlvYpgEtG0tqIxJGa', 2, b'1', NULL, NULL, '2023-01-06 13:32:39', b'0', NULL, '2023-01-06 06:45:30', '2023-01-06 06:32:40'),
(6, 'Nguyễn Anh Khoa', NULL, 'nguyenkhoa.offical2021@gmail.com', NULL, NULL, NULL, 'avatar-default.png', '$2y$10$TTj627NRMYi9sUIeUK8PEuqlrcqCS/WSeC5V.Okp7gXdgWpJ2T8.y', 1, b'1', NULL, NULL, '2023-02-14 20:13:59', b'0', NULL, '2023-02-14 13:14:51', '2023-02-14 13:14:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `id_tk` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `wards` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `status` bit(1) DEFAULT b'1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_address`
--

INSERT INTO `user_address` (`id`, `id_tk`, `fullname`, `phone`, `address`, `wards`, `district`, `province`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nguyễn Khoa', '0909223280', 'Hẻm 64, Đường 79', 'Phường Tân Quy', 'Quận 7', 'Thành phố Hồ Chí Minh', b'0', '2023-02-13 18:03:35', '2023-02-13 18:03:35'),
(2, 1, 'Lê Ngọc Nhật An', '0909223459', 'Hẻm 585/28, Đường Nguyễn Thị Thập', 'Phường Tân Phong', 'Quận 7', 'Thành phố Hồ Chí Minh', b'1', '2023-02-13 18:03:35', '2023-02-13 18:03:35'),
(3, 1, 'Nguyễn Thị Huyền Trang', '0909789987', '58', 'Phường 06', 'Quận 10', 'Thành phố Hồ Chí Minh', b'0', '2023-02-13 18:03:35', '2023-02-13 18:03:35'),
(4, 6, 'Nguyễn Khoa', '0909223280', 'Số 10, Đường 79', 'Phường Tân Quy', 'Quận 7', 'Thành phố Hồ Chí Minh', b'1', '2023-02-14 14:08:11', '2023-02-14 14:08:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `condition` int(11) DEFAULT NULL,
  `quanity` int(11) DEFAULT NULL,
  `dateStart` date DEFAULT NULL,
  `endStart` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`id`, `code`, `content`, `discount`, `condition`, `quanity`, `dateStart`, `endStart`, `created_at`, `updated_at`) VALUES
(1, '18TRGIAMGIA', 'asdadsadss', 18.00, 2000, 20, '2023-02-08', '2023-02-15', '2023-02-07 18:36:59', '2023-02-07 18:36:59'),
(2, '19GIAMGIA', 'asdasdasd', 19.00, 2500, 15, '2023-02-08', '2023-02-20', '2023-02-11 21:14:55', '2023-02-07 18:49:18');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1_Cart_User` (`id_tk`),
  ADD KEY `fk2_Cart_Product` (`id_pro`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1_Comment_User` (`id_tk`),
  ADD KEY `fk2_Comment_Product` (`id_pro`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oderdetails`
--
ALTER TABLE `oderdetails`
  ADD PRIMARY KEY (`id_order`,`id_pro`),
  ADD KEY `fk2_Product_id` (`id_pro`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1_Order_User` (`id_tk`),
  ADD KEY `fk2_Order_Voucher` (`id_voucher`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1_Brands` (`id_brand`),
  ADD KEY `fk2_Catagory` (`id_ca`),
  ADD KEY `fk3_Supplier` (`sup_id`);

--
-- Chỉ mục cho bảng `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Image_Product` (`id_pro`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbnotifymessage`
--
ALTER TABLE `tbnotifymessage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1_Message_User` (`id_tk`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1_User` (`id_tk`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `productimage`
--
ALTER TABLE `productimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbnotifymessage`
--
ALTER TABLE `tbnotifymessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk1_Cart_User` FOREIGN KEY (`id_tk`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk2_Cart_Product` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk1_Comment_User` FOREIGN KEY (`id_tk`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk2_Comment_Product` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `oderdetails`
--
ALTER TABLE `oderdetails`
  ADD CONSTRAINT `fk1_Order_id` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `fk2_Product_id` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk1_Order_User` FOREIGN KEY (`id_tk`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk2_Order_Voucher` FOREIGN KEY (`id_voucher`) REFERENCES `voucher` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk1_Brands` FOREIGN KEY (`id_brand`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `fk2_Catagory` FOREIGN KEY (`id_ca`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk3_Supplier` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`id`);

--
-- Các ràng buộc cho bảng `productimage`
--
ALTER TABLE `productimage`
  ADD CONSTRAINT `fk_Image_Product` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `tbnotifymessage`
--
ALTER TABLE `tbnotifymessage`
  ADD CONSTRAINT `fk1_Message_User` FOREIGN KEY (`id_tk`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `fk1_User` FOREIGN KEY (`id_tk`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
