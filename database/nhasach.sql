-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 26, 2020 lúc 05:19 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhasach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_price` int(11) NOT NULL,
  `book_highlight` int(11) NOT NULL,
  `book_promotion` int(11) NOT NULL,
  `book_quantity` int(11) NOT NULL,
  `pub_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `book_pub_id_foreign` (`pub_id`),
  KEY `book_cat_id_foreign` (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`id`, `book_name`, `book_url`, `book_img`, `book_description`, `book_price`, `book_highlight`, `book_promotion`, `book_quantity`, `pub_id`, `cat_id`, `created_at`, `updated_at`) VALUES
(1, 'Từ Điển mẫu câu tiếng Nhật', 'tu-dien-mau-cau-tieng-nhat', 'td01.jpg', 'Tập hợp tất cả các mẫu câu tiếng Nhật', 50000, 1, 1, 65, 3, 3, '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(2, 'How to be a bawse', 'how-to-be-a-bawse', 'img1.jpg', 'Sách rất hay.....', 75000, 1, 0, 55, 1, 3, '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(3, 'How to write a bestselling', 'how-to-write-a-bestselling', 'img2.jpg', 'Sách rất hay.....', 40000, 1, 1, 55, 3, 2, '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(4, '7 day self publishing mini course', '7-day-self-publishing-mini-course', 'img3.jpg', 'Sách rất hay.....', 90000, 0, 0, 55, 2, 2, '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(5, 'The ring of truth', 'the-ring-of-truth', 'img4.jpg', 'Sách rất hay.....', 75000, 0, 1, 55, 1, 1, '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(6, 'Keepers of the kalachakra', 'keepers-of-the-kalachakra', 'r1.jpg', 'Sách rất hay.....', 35000, 1, 1, 55, 2, 1, '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(7, 'Fisher queen\'s dynaspy', 'fisher-queens-dynaspy', 'r2.jpg', 'Sách rất hay.....', 25000, 1, 0, 55, 2, 2, '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(8, 'Zero sum', 'zero-sum', 'r3.jpg', 'Sách rất hay.....', 85000, 1, 1, 55, 2, 1, '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(9, 'Ps from Paris', 'ps-from-paris', 'r4.jpg', 'Sách rất hay.....', 50000, 0, 0, 55, 2, 3, '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(10, 'Trust me not', 'trust-me-not', 'r5.jpg', 'Sách rất hay.....', 20000, 1, 1, 55, 2, 4, '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(11, 'Harry potter', 'harry-potter', 'product1.jpg', 'Truyện kể về Harry Potter ở thế giới phù thuỷ', 150000, 1, 1, 55, 4, 4, '2020-03-26 10:18:35', '2020-03-26 10:18:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_des` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_url`, `cat_des`, `created_at`, `updated_at`) VALUES
(1, 'Giáo khoa', 'giao-khoa', 'Đây là sách giáo khoa', '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(2, 'Tin học', 'tin-hoc', 'Đây là sách tin học', '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(3, 'Từ điển', 'tu-dien', 'Đây là từ điển', '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(4, 'Du lịch', 'du-lich', 'Đây là báo chí du lịch', '2020-03-26 10:18:35', '2020-03-26 10:18:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(33, '2014_09_20_034648_create_users_type_table', 1),
(34, '2014_10_12_000000_create_users_table', 1),
(35, '2014_10_12_100000_create_password_resets_table', 1),
(36, '2020_02_20_034820_create_publisher_table', 1),
(37, '2020_02_20_034908_create_category_table', 1),
(38, '2020_02_20_034931_create_book_table', 1),
(39, '2020_02_20_034948_create_order_table', 1),
(40, '2020_02_20_035008_create_order_detail_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `consignee_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consignee_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consignee_phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consignee_add` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` int(10) UNSIGNED NOT NULL,
  `order_note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_users_id_foreign` (`users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `book_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `orderdetail_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `order_detail_book_id_foreign` (`book_id`),
  KEY `order_detail_order_id_foreign` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `publisher`
--

DROP TABLE IF EXISTS `publisher`;
CREATE TABLE IF NOT EXISTS `publisher` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pub_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pub_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pub_des` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `publisher`
--

INSERT INTO `publisher` (`id`, `pub_name`, `pub_url`, `pub_des`, `created_at`, `updated_at`) VALUES
(1, 'Tin học', 'tin-hoc', 'Đây là lĩnh vực tin học', '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(2, 'Toán học', 'toan-hoc', 'Đây là lĩnh vực toán học', '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(3, 'Vắn học', 'van-hoc', 'Đây là lĩnh vực văn học', '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(4, 'Sử học', 'su-hoc', 'Đây là lĩnh vực sử học', '2020-03-26 10:18:35', '2020-03-26 10:18:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userstype_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_userstype_id_foreign` (`userstype_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `userstype_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Phát', 'root@gmail.com', '$2y$10$dLHsG1kMptp5eKpXdbh3I.lzq.jKkdBO5EFwBdna65JtMqhy1vMDy', 1, '', '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(2, 'Thiện', 'user1@gmail.com', '$2y$10$M8rnv.ZpHPkCHZiXWSxmZOltjRcfyXGTzyHZjyKPIIVifUxH29URq', 2, '', '2020-03-26 10:18:35', '2020-03-26 10:18:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_type`
--

DROP TABLE IF EXISTS `users_type`;
CREATE TABLE IF NOT EXISTS `users_type` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userstype_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users_type`
--

INSERT INTO `users_type` (`id`, `userstype_name`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị viên', '2020-03-26 10:18:35', '2020-03-26 10:18:35'),
(2, 'Khách hàng', '2020-03-26 10:18:35', '2020-03-26 10:18:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
