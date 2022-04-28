-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2022 at 04:43 PM
-- Server version: 5.7.33
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `info_bill` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `content`, `user_id`, `info_bill`) VALUES
(15, '{\"20\":{\"name\":\"Nu00f3n thu1ec3 thao Unisex HA001U1\",\"price\":\"206100\",\"image\":\"/public/assets/uploads/images/11_HA001U1-Xanhden-229K-1-510x510.jpg\",\"qty\":\"1\"}}', 3, '{\"name\":\"phùng a táo\",\"phone\":\"0973127008\",\"email\":\"trungtv0910@gmail.com\",\"country\":\"1\",\"address\":\"Phú Lộc Thừa Thiên Huế\"}'),
(16, '{\"16\":{\"name\":\"Quần legging Nữ họa tiết galaxy LE068W1\",\"price\":\"459000\",\"image\":\"/public/assets/uploads/images/20_For-All-Moves-LE068W1-1-1-510x510.jpg\",\"qty\":\"1\"},\"11\":{\"name\":\"Áo T-shirt thể thao Nam in chữ RUN TS204M1\",\"price\":\"299000\",\"image\":\"/public/assets/uploads/images/4_For-All-Moves-TS204M1-510x510.png\",\"qty\":\"1\"}}', 3, '{\"name\":\"Phùng Độ\",\"phone\":\"0924122221\",\"email\":\"Pùng Độ\",\"country\":\"1\",\"address\":\"Quận Nam Từ Liên- Hà Nội\"}');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`) VALUES
(39, 'Thời Trang Nam', 0, NULL),
(40, 'Thời Trang Nữ', 0, NULL),
(41, 'Giày và Phụ Kiện', 0, NULL),
(45, 'Áo Nam', 39, NULL),
(46, 'Quần Nam', 39, NULL),
(47, 'Mũ Nam', 39, NULL),
(48, 'Áo Nữ', 40, NULL),
(49, 'Quần Nữ', 40, NULL),
(50, 'Mũ Nữ', 40, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `key_code` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `parent_id`, `key_code`) VALUES
(1, 'category', 'category', '2022-03-15 19:15:09', '2022-03-15 19:15:09', 0, '0'),
(2, 'list', 'list', '2022-03-15 19:15:09', '2022-03-15 19:15:09', 1, 'list_category'),
(3, 'add', 'add', '2022-03-15 19:15:09', '2022-03-15 19:15:09', 1, 'add_category'),
(4, 'edit', 'edit', '2022-03-15 19:15:09', '2022-03-15 19:15:09', 1, 'edit_category'),
(5, 'delete', 'delete', '2022-03-15 19:15:09', '2022-03-15 19:15:09', 1, 'delete_category'),
(6, 'menu', 'menu', '2022-03-15 19:15:35', '2022-03-15 19:15:35', 0, '0'),
(7, 'list', 'list', '2022-03-15 19:15:35', '2022-03-15 19:15:35', 6, 'list_menu'),
(8, 'add', 'add', '2022-03-15 19:15:35', '2022-03-15 19:15:35', 6, 'add_menu'),
(9, 'edit', 'edit', '2022-03-15 19:15:35', '2022-03-15 19:15:35', 6, 'edit_menu'),
(10, 'delete', 'delete', '2022-03-15 19:15:35', '2022-03-15 19:15:35', 6, 'delete_menu'),
(11, 'slider', 'slider', '2022-03-15 19:15:44', '2022-03-15 19:15:44', 0, '0'),
(12, 'list', 'list', '2022-03-15 19:15:44', '2022-03-15 19:15:44', 11, 'list_slider'),
(13, 'add', 'add', '2022-03-15 19:15:44', '2022-03-15 19:15:44', 11, 'add_slider'),
(14, 'edit', 'edit', '2022-03-15 19:15:44', '2022-03-15 19:15:44', 11, 'edit_slider'),
(15, 'delete', 'delete', '2022-03-15 19:15:44', '2022-03-15 19:15:44', 11, 'delete_slider'),
(16, 'product', 'product', '2022-03-15 19:15:51', '2022-03-15 19:15:51', 0, '0'),
(17, 'list', 'list', '2022-03-15 19:15:51', '2022-03-15 19:15:51', 16, 'list_product'),
(18, 'add', 'add', '2022-03-15 19:15:51', '2022-03-15 19:15:51', 16, 'add_product'),
(19, 'edit', 'edit', '2022-03-15 19:15:51', '2022-03-15 19:15:51', 16, 'edit_product'),
(20, 'delete', 'delete', '2022-03-15 19:15:51', '2022-03-15 19:15:51', 16, 'delete_product'),
(21, 'setting', 'setting', '2022-03-15 19:15:58', '2022-03-15 19:15:58', 0, '0'),
(22, 'list', 'list', '2022-03-15 19:15:58', '2022-03-15 19:15:58', 21, 'list_setting'),
(23, 'add', 'add', '2022-03-15 19:15:58', '2022-03-15 19:15:58', 21, 'add_setting'),
(24, 'edit', 'edit', '2022-03-15 19:15:58', '2022-03-15 19:15:58', 21, 'edit_setting'),
(25, 'delete', 'delete', '2022-03-15 19:15:58', '2022-03-15 19:15:58', 21, 'delete_setting'),
(26, 'user', 'user', '2022-03-15 19:16:15', '2022-03-15 19:16:15', 0, '0'),
(27, 'list', 'list', '2022-03-15 19:16:15', '2022-03-15 19:16:15', 26, 'list_user'),
(28, 'add', 'add', '2022-03-15 19:16:15', '2022-03-15 19:16:15', 26, 'add_user'),
(29, 'edit', 'edit', '2022-03-15 19:16:15', '2022-03-15 19:16:15', 26, 'edit_user'),
(30, 'delete', 'delete', '2022-03-15 19:16:15', '2022-03-15 19:16:15', 26, 'delete_user'),
(31, 'role', 'role', '2022-03-15 19:16:28', '2022-03-15 19:16:28', 0, '0'),
(32, 'list', 'list', '2022-03-15 19:16:28', '2022-03-15 19:16:28', 31, 'list_role'),
(33, 'add', 'add', '2022-03-15 19:16:28', '2022-03-15 19:16:28', 31, 'add_role'),
(34, 'edit', 'edit', '2022-03-15 19:16:28', '2022-03-15 19:16:28', 31, 'edit_role'),
(35, 'delete', 'delete', '2022-03-15 19:16:28', '2022-03-15 19:16:28', 31, 'delete_role');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 2, 5, NULL, NULL),
(2, 7, 5, NULL, NULL),
(4, 9, 5, NULL, NULL),
(5, 10, 5, NULL, NULL),
(6, 18, 5, NULL, NULL),
(7, 19, 5, NULL, NULL),
(8, 20, 5, NULL, NULL),
(9, 21, 5, NULL, NULL),
(10, 6, 28, NULL, NULL),
(11, 6, 29, NULL, NULL),
(12, 6, 30, NULL, NULL),
(13, 6, 31, NULL, NULL),
(14, 7, 18, NULL, NULL),
(15, 7, 19, NULL, NULL),
(16, 7, 20, NULL, NULL),
(17, 7, 21, NULL, NULL),
(18, 6, 2, NULL, NULL),
(19, 6, 3, NULL, NULL),
(20, 6, 4, NULL, NULL),
(21, 6, 5, NULL, NULL),
(22, 5, 2, NULL, NULL),
(23, 5, 3, NULL, NULL),
(24, 5, 4, NULL, NULL),
(25, 5, 5, NULL, NULL),
(26, 5, 33, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` text COLLATE utf8_unicode_ci NOT NULL,
  `feature_image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `feature_image_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `view_count` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `feature_image_path`, `feature_image_name`, `content`, `category_id`, `user_id`, `view_count`) VALUES
(6, 'Đùi Gà', '300000', '/public/assets/uploads/images/2_bo-bit-tet-nhap-khau-dong-lanh-500g-202110182314137664.jpg', 'bo-bit-tet-nhap-khau-dong-lanh-500g-202110182314137664.jpg', 'New Products', 39, 3, 0),
(7, 'Giày trượt patin 1 hàng Play 3 cho trẻ em - Hồng/ Tím', '545000', '/public/assets/uploads/images/15_p1029143.webp', 'p1029143.webp', 'Giày trượt patin 1 hàng dành cho trẻ mới chơi có thể điều chỉnh theo 3 cỡ khác nhau, giúp trẻ có được niềm vui thích khi tự mình chơi patin.Có thể điều chỉnh cỡ giày trượt theo cỡ chân con bạn! Không đi kèm trục phụ để lắp bánh 2 hàng.', 30, 3, 0),
(8, 'Áo phao bơi bơm hơi 18-30 kg - Xanh lá', '295000', '/public/assets/uploads/images/12_p1827948.webp', 'p1827948.webp', 'cho trẻ muốn khám phá các động tác bơi đầu tiên với độ nổi rất cao và cũng thích hợp cho hoạt động lặn khám phá với ống thởÁo phao Neckvest mặc chui qua đầu giống áo bơi, giúp trẻ khám phá các động tác bơi dưới sự giám sát thường xuyên của người lớn', 43, 3, 0),
(9, 'Áo Polo Nam chuyển màu PO086M1', '413000', '/public/assets/uploads/images/3_For-All-Moves-PO086M1-510x510.png', 'For-All-Moves-PO086M1-510x510.png', 'Áo thun tay ngắn, cổ bẻ phối màu cùng màu viền tay, thân trước in họa tiết đa giác chuyển màu.&#13;&#10;Chất vải 88% Polyester, 12% Spandex, co giãn 4 chiều, tích hợp DRI-AIR – thấm thoát mồ hôi nhanh.', 45, 3, 12),
(10, 'Áo Tanktop Nam in logo phối màu TT018M1', '249000', '/public/assets/uploads/images/14_For-All-Moves-TT018M1-3-510x510.png', 'For-All-Moves-TT018M1-3-510x510.png', 'Áo thun, cổ tròn, thân trước in hình logo phối màu.&#13;&#10;Chất liệu vải 100% polyester, kiểu dệt hoa văn, nhẹ nhàng, thoáng khí, tích hợp DRI-AIR thấm hút mồ hôi nhanh.', 45, 3, 0),
(11, 'Áo T-shirt thể thao Nam in chữ RUN TS204M1', '299000', '/public/assets/uploads/images/4_For-All-Moves-TS204M1-510x510.png', 'For-All-Moves-TS204M1-510x510.png', 'Áo thun tay ngắn, cổ tròn, phom ôm vừa vặn tôn dáng. Một bên ngực in họa tiết chữ ACTIVELY.&#13;&#10;Chất vải Coolmax siêu thoáng mát, co giãn và thấm hút mồ hôi tốt.', 45, 3, 0),
(12, 'Áo T-shirt Nam in chữ Never Look Back TS197M0', '296000', '/public/assets/uploads/images/12_Xmas-TS197M0-510x510.png', 'Xmas-TS197M0-510x510.png', 'Áo thun tay ngắn, cổ tròn, dáng cơ bản, thân trước phối họa tiết chữ.&#13;&#10;Chất liệu vải chứa 95% thành phần cotton Mỹ tự nhiên mát, mịn, chống nhăn, thấm hút mồ hôi tốt.', 45, 3, 0),
(13, 'Áo T-shirt thể thao Nam in logo phối màu TS196M1', '260000', '/public/assets/uploads/images/19_For-All-Moves-TS196M1-510x510.png', 'For-All-Moves-TS196M1-510x510.png', 'Áo thun tay ngắn, cổ tròn, thân trước in hình logo phối màu.&#13;&#10;Chất liệu vải 100% polyester, kiểu dệt hoa văn, nhẹ nhàng, thoáng khí, thấm hút mồ hôi nhanh.', 45, 3, 8),
(14, 'Quần short thể thao Nữ họa tiết galaxy SH047W1', '399000', '/public/assets/uploads/images/17_For-All-Moves-SH047W1-510x510.png', 'For-All-Moves-SH047W1-510x510.png', 'Quần short thể thao 2 lớp, dáng ngắn lai bầu viền màu.&#13;&#10;Chất vải mềm mịn, độ bền cao, co giãn tốt, thích hợp để mặc khi vận động nhờ khả năng thấm và thoát mồ hôi vượt trội.', 49, 3, 6),
(15, 'Áo Bra thể thao Nữ in họa tiết galaxy BR052W1', '329000', '/public/assets/uploads/images/8_For-All-Moves-BR052W1-3-510x510.png', 'For-All-Moves-BR052W1-3-510x510.png', 'Áo bra thể thao cổ tròn, viền đen, thân áo in họa tiết galaxy.&#13;&#10;Chất vải mát, nhẹ, co giãn 4 chiều, tích hợp DRI-AIR – thấm hút mồ hôi tốt', 48, 3, 5),
(16, 'Quần legging Nữ họa tiết galaxy LE068W1', '459000', '/public/assets/uploads/images/20_For-All-Moves-LE068W1-1-1-510x510.jpg', 'For-All-Moves-LE068W1-1-1-510x510.jpg', 'Quần legging nữ dáng dài phom cơ bản tôn dáng, thân quần phối họa tiết in.&#13;&#10;Chất vải mềm mịn, độ bền cao, co giãn tốt, thích hợp để mặc khi vận động nhờ khả năng thấm và thoát mồ hôi vượt trội.', 49, 3, 12),
(17, 'Áo Tanktop Nữ in logo phối màu TT031W1', '239000', '/public/assets/uploads/images/4_For-All-Moves-TT031W1-510x510.png', 'For-All-Moves-TT031W1-510x510.png', 'Áo thun, cổ tròn, thân trước in hình logo phối màu.&#13;&#10;Chất liệu vải 100% polyester, kiểu dệt hoa văn, nhẹ nhàng, thoáng khí, thấm hút mồ hôi nhanh.', 48, 3, 0),
(18, 'Áo T-shirt thể thao Nữ in logo phối màu TS153W1', '251000', '/public/assets/uploads/images/7_For-All-Moves-TS153W1-1-510x510.png', 'For-All-Moves-TS153W1-1-510x510.png', 'Áo thun tay ngắn, cổ tròn, phom hơi ôm, thân trước in hình logo phối màu.&#13;&#10;Chất liệu vải 100% polyester, kiểu dệt hoa văn, nhẹ nhàng, thoáng khí, thấm hút mồ hôi nhanh.', 48, 3, 16),
(19, 'Nón thể thao Unisex HA002U1', '206111', '/public/assets/uploads/images/1_HA002U1-Trang-229K-1-510x510.jpg', 'HA002U1-Trang-229K-1-510x510.jpg', 'Nón kết kiểu dáng thể thao, năng động, hiện đại, màu sắc trẻ trung, phù hợp với cả nam và nữ.&#13;&#10;Chất liệu vải dù một lớp bền, nhẹ, lót cotton thấm hút mồ hôi tốt.', 47, 3, 0),
(20, 'Nón thể thao Unisex HA001U1', '206100', '/public/assets/uploads/images/11_HA001U1-Xanhden-229K-1-510x510.jpg', 'HA001U1-Xanhden-229K-1-510x510.jpg', 'New sản phẩm mới', 47, 3, 13),
(21, 'Quần Short thể thao Nam 2 lớp phối chữ nghiêng Delta Sport SH067M1', '449000', '/public/assets/uploads/images/4_For-All-Moves-SH067M1-510x510.png', 'For-All-Moves-SH067M1-510x510.png', 'Sản phẩm mới', 46, 3, 20),
(22, 'Quần short Nam in chữ Future SH066M0', '250100', '/public/assets/uploads/images/19_FW21-SH066M0-1-510x510.png', 'FW21-SH066M0-1-510x510.png', 'Quần short lưng thun, túi xẻ, một bên ống quần in họa tiết chữ Future.&#13;&#10;Chất vải thoáng mát, độ bền cao và giữ phom tốt.', 46, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`) VALUES
(1, 'admin', 'Quản trị hệ thống'),
(2, 'guest', 'Khách hàng'),
(3, 'developer', 'Phát triển hệ thống'),
(4, 'content', 'Phát triển nội dung'),
(5, 'poster', 'Viết bài');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`) VALUES
(45, 3, 1),
(46, 3, 5),
(47, 2, 2),
(48, 2, 3),
(49, 2, 4),
(50, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `quantity`, `price`) VALUES
(1, 'Nguyến Đình Tèo', 12, 90000),
(2, 'Nguyễn văn thi', 20, 4444444),
(4, 'Nguyễn Văn H', 125, 40000),
(5, 'Nguyễn Văn H', 125, 40000),
(6, 'Nguyễn Văn K', 125, 40000),
(7, 'Nguyễn Văn K', 125, 40000),
(8, 'Nguyễn Văn K', 125, 40000),
(9, 'Trung Văn 1', 125, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirm_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `key_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `confirm_password`, `role`, `key_code`) VALUES
(1, 'trung123', 'trung123@gmail.com', '098312123', 'Hà nội', 'Vantrung1', 'Vantrung1', 0, NULL),
(2, 'trung9091', 'trung9091@gmail.com', '09311212', 'Ngũ hành sơn đà nẵng', 'Vantrung1', 'Vantrung1', 0, NULL),
(3, 'trungtv0910', 'trungtv0910@gmail.com', '097312899', 'Sài Gòn , Quận 12', 'Vantrung1', 'Vantrung1', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
