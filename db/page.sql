-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 22, 2019 lúc 08:41 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `page`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about`
--

CREATE TABLE `about` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `about`
--

INSERT INTO `about` (`id`, `email`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'hotrovenashop@gmail.com', '92 Đại La - Hai Bà Trưng - Hà Nội', '0386138536', NULL, '2019-04-19 02:26:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `slug`, `alias`, `created_at`, `updated_at`) VALUES
(3, 0, 'Áo len', 'ao-len', 'Ao len', '2019-03-05 20:01:17', '2019-03-05 20:01:17'),
(4, 1, 'Áo thể thao', 'ao-the-thao', 'Ao the thao', '2019-03-05 20:01:51', '2019-03-10 21:15:54'),
(5, 1, 'Quần jeans', 'quan-jeans', 'Quan jeans', '2019-03-05 20:02:19', '2019-03-10 21:17:04'),
(6, 0, 'Áo công sở', 'ao-cong-so', 'Ao cong so', '2019-03-05 20:02:43', '2019-03-05 20:02:43'),
(7, 0, 'Váy ngắn', 'vay-ngan', 'Vay ngan', '2019-03-05 20:02:57', '2019-03-05 20:02:57'),
(8, 1, 'Áo sơ mi', 'ao-so-mi', 'Ao so mi', '2019-03-05 20:03:14', '2019-03-10 21:16:29'),
(9, 1, 'Áo phông', 'ao-phong', 'Ao phong', '2019-03-05 20:03:31', '2019-03-10 21:16:38'),
(10, 0, 'Váy xòe', 'vay-xoe', 'Vay xoe', '2019-03-16 07:42:39', '2019-03-16 07:42:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Green', NULL, NULL),
(2, 'Red', NULL, NULL),
(3, 'Violet', NULL, NULL),
(4, 'Yellow', NULL, NULL),
(5, 'Brown', NULL, NULL),
(6, 'Black', NULL, NULL),
(7, 'White', NULL, NULL),
(8, 'Blue ', NULL, NULL),
(9, 'Tawny ', NULL, NULL),
(10, 'Tawny ', NULL, NULL),
(11, 'Pink', NULL, NULL),
(12, 'Violet', NULL, NULL),
(13, 'Orange ', NULL, NULL),
(14, 'Beige ', NULL, NULL),
(15, 'Gray ', NULL, NULL),
(16, 'Beige ', NULL, NULL),
(17, 'Dark brown', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color_product`
--

CREATE TABLE `color_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `color_product`
--

INSERT INTO `color_product` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(33, 28, 1, '2019-03-10 20:46:53', '2019-03-10 20:46:53'),
(34, 28, 2, '2019-03-10 20:46:54', '2019-03-10 20:46:54'),
(35, 28, 6, '2019-03-10 20:46:54', '2019-03-10 20:46:54'),
(194, 47, 1, '2019-03-24 20:29:29', '2019-03-24 20:29:29'),
(195, 47, 2, '2019-03-24 20:29:29', '2019-03-24 20:29:29'),
(196, 47, 3, '2019-03-24 20:29:29', '2019-03-24 20:29:29'),
(239, 18, 1, '2019-04-16 19:54:34', '2019-04-16 19:54:34'),
(240, 18, 3, '2019-04-16 19:54:34', '2019-04-16 19:54:34'),
(241, 18, 8, '2019-04-16 19:54:34', '2019-04-16 19:54:34'),
(242, 19, 2, '2019-04-16 19:54:43', '2019-04-16 19:54:43'),
(243, 20, 7, '2019-04-16 19:54:50', '2019-04-16 19:54:50'),
(244, 20, 8, '2019-04-16 19:54:50', '2019-04-16 19:54:50'),
(245, 23, 6, '2019-04-16 19:54:58', '2019-04-16 19:54:58'),
(246, 26, 3, '2019-04-16 19:55:05', '2019-04-16 19:55:05'),
(247, 31, 7, '2019-04-16 19:55:15', '2019-04-16 19:55:15'),
(248, 31, 15, '2019-04-16 19:55:15', '2019-04-16 19:55:15'),
(249, 31, 17, '2019-04-16 19:55:15', '2019-04-16 19:55:15'),
(250, 35, 6, '2019-04-16 19:55:23', '2019-04-16 19:55:23'),
(251, 35, 8, '2019-04-16 19:55:23', '2019-04-16 19:55:23'),
(252, 35, 15, '2019-04-16 19:55:23', '2019-04-16 19:55:23'),
(253, 36, 6, '2019-04-16 19:55:31', '2019-04-16 19:55:31'),
(254, 36, 7, '2019-04-16 19:55:31', '2019-04-16 19:55:31'),
(255, 41, 13, '2019-04-16 19:55:38', '2019-04-16 19:55:38'),
(256, 43, 7, '2019-04-16 19:55:46', '2019-04-16 19:55:46'),
(257, 44, 1, '2019-04-16 19:55:55', '2019-04-16 19:55:55'),
(258, 44, 8, '2019-04-16 19:55:55', '2019-04-16 19:55:55'),
(259, 46, 7, '2019-04-16 19:58:14', '2019-04-16 19:58:14'),
(260, 49, 1, '2019-04-16 19:58:23', '2019-04-16 19:58:23'),
(261, 49, 4, '2019-04-16 19:58:23', '2019-04-16 19:58:23'),
(262, 49, 6, '2019-04-16 19:58:23', '2019-04-16 19:58:23'),
(263, 45, 8, '2019-04-16 19:58:34', '2019-04-16 19:58:34'),
(264, 45, 15, '2019-04-16 19:58:34', '2019-04-16 19:58:34'),
(265, 50, 7, '2019-04-21 18:55:25', '2019-04-21 18:55:25'),
(266, 50, 9, '2019-04-21 18:55:25', '2019-04-21 18:55:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_product`
--

CREATE TABLE `comment_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star` int(11) NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_product` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment_product`
--

INSERT INTO `comment_product` (`id`, `name`, `star`, `content`, `com_product`, `created_at`, `updated_at`) VALUES
(10, 'cccc', 1, 'như cc', 23, '2019-03-11 02:59:29', '2019-03-11 02:59:29'),
(17, 'Nguyễn Xuân Tùng đẹp zai', 2, 'dsadsad', 45, '2019-03-29 03:27:03', '2019-03-29 03:27:03'),
(18, 'babe', 5, 'xinh vãi', 50, '2019-04-21 19:01:16', '2019-04-21 19:01:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `phone`, `address`, `birthday`, `created_at`, `updated_at`, `remember_token`) VALUES
(4, 'Nguyễn T.Hồng Ánh', 'honganh97@gmail.com', '$2y$10$DsyAMbP5nB7v10kJbGfcu.CARuss12I.NqaUk8MxYzxeoFNc02cDi', '0981898596', 'Hà Nội', '1997-12-23', '2019-03-05 23:33:50', '2019-03-05 23:35:04', NULL),
(14, 'Xuân Tùng', 'xuantunga@gmail.com', '$2y$10$sBAaBY5vFAMuBr4osUX8IuiPAbCVotUZuQnVi3O18Tp9a8TSgosDm', '0123456789', 'Hà Nội', '2019-03-01', '2019-03-07 20:11:08', '2019-03-07 20:11:08', NULL),
(20, 'Nguyễn T.Hồng Ánh', 'xuantungaaaaa@gmail.com', '$2y$10$5CY.K2iUZT1DMqDnzVaESujv7R7H30KLNRgOlKP2TQGfgNQM5svh2', '0123456789', 'Hà Nội', '2019-02-28', '2019-03-30 07:27:23', '2019-03-30 07:27:23', NULL),
(22, 'ductiep', 'phanducktpm5@gmail.com', '$2y$10$csRYg45rpkavcgycKvKn4u5UukAmjD.UKznWPPf1kabEbtxYvVenK', '12345688963', 'sadadsadsa', '2015-02-14', '2019-03-31 02:37:49', '2019-03-31 02:37:49', NULL),
(24, 'Tùng Xuân', 'xuantungdev97@gmail.com', '$2y$10$ggTuhqTiNz6TOLZOkiwsgeI5vFrPxO19ifx2y4DyGRfwtbHC2aP.S', '386138536', 'Yeen Basi', '2019-04-07', '2019-04-08 18:41:27', '2019-04-17 02:02:26', NULL),
(25, 'xuantung', 'baba@gmail.com', '$2y$10$fPbOQN5T3dUm79T6DAwz1.0IkIM5nekK0CdRB0Yd/I54POtYfTsAy', '386138536', 'ầng 2 Tòa nhà N09B2, Khu Đô thị mới Dịch Vọng, phường Dịch Vọng, quận Cầu Giấy, Hà Nội', '2019-04-05', '2019-04-09 09:45:43', '2019-04-09 09:45:43', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_feedback` int(11) NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `cate_feedback`, `content`, `created_at`, `updated_at`) VALUES
(4, 'babe', 'xuantung@gmail.com', 3, 'aaaaabbbbb aaaccccccc rt df gddefc', '2019-03-21 00:50:12', '2019-03-21 00:50:12'),
(5, 'Tùng', 'xuantung@gmail.com', 2, 'làm sao để có tiền', '2019-04-03 06:46:29', '2019-04-03 06:46:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_25_160010_create_table_category_table', 1),
(4, '2019_02_28_095440_create_customer_table', 1),
(5, '2019_03_01_040550_create_attribute_token_into_customer', 1),
(6, '2019_03_04_081021_create_test_table', 1),
(7, '2019_03_05_093932_create_product_table', 1),
(9, '2019_03_05_152214_create_size_table', 1),
(10, '2019_03_05_152311_create_image_table', 1),
(11, '2019_03_05_152707_create_product_color_table', 1),
(12, '2019_03_05_152739_create_product_size_table', 1),
(13, '2019_03_05_152836_create_product_image_table', 1),
(16, '2019_03_05_155234_create_about_table', 2),
(17, '2019_03_06_063752_create_color_table', 3),
(18, '2019_03_07_124849_create_attribute_file_into_product', 4),
(19, '2019_03_07_140435_create_color_product_table', 5),
(20, '2019_03_09_064034_create_attribute_price_defaul_into_product', 6),
(21, '2019_03_11_040242_create_attribute_parent_id_into_category', 7),
(22, '2019_03_11_083215_create_comment_product_table', 8),
(23, '2019_03_21_063139_create_table_feedback_table', 9),
(24, '2019_03_26_093611_create_order_table', 10),
(26, '2019_03_26_101853_create_order_detail_table', 11),
(27, '2019_04_06_151748_create_Posts_table', 12),
(28, '2019_04_08_105724_create_attribute_date_order_into_order', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` int(11) NOT NULL,
  `total` double NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_order` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `name`, `email`, `address`, `phone`, `note`, `payment`, `total`, `status`, `created_at`, `updated_at`, `date_order`) VALUES
(120, 'Nguyễn Xuân Tùng đẹp zai', 'xuantungly1997@gmail.com', 'Yên Bái', '12345688963', NULL, 1, 249000, 1, '2019-04-08 18:38:44', '2019-04-11 23:35:30', '2019-04-10'),
(121, 'Tùng Xuân', 'xuantungdev97@gmail.com', 'Yeen Basi', '386138536', NULL, 1, 249000, 1, '2019-04-08 18:41:56', '2019-04-08 18:42:51', '2019-04-08'),
(122, 'Tùng Xuân', 'xuantungdev97@gmail.com', 'Yeen Basi', '386138536', NULL, 1, 747000, 0, '2019-04-08 18:42:07', '2019-04-08 18:42:07', '2019-04-08'),
(123, 'Tùng Xuân', 'xuantungdev97@gmail.com', 'Yeen Basi', '386138536', NULL, 1, 2188800, 1, '2019-04-08 18:42:28', '2019-04-08 18:42:55', '2019-04-08'),
(124, 'Tùng Xuân', 'xuantungdev97@gmail.com', 'Yeen Basi', '386138536', NULL, 1, 2188800, 1, '2019-04-08 18:42:31', '2019-04-08 21:20:19', '2019-04-08'),
(125, 'Tùng Xuân', 'xuantungdev97@gmail.com', 'Yeen Basi', '386138536', NULL, 1, 360000, 0, '2019-04-08 20:49:51', '2019-04-08 20:49:51', '2019-04-10'),
(126, 'Tùng Xuân', 'xuantungdev97@gmail.com', 'Yeen Basi', '386138536', NULL, 1, 1494000, 0, '2019-04-08 20:50:13', '2019-04-08 20:50:13', '2019-04-10'),
(127, 'Tùng Xuân', 'xuantungdev97@gmail.com', 'Yeen Basi', '386138536', NULL, 1, 369600, 0, '2019-04-08 20:50:29', '2019-04-08 20:50:29', '2019-04-10'),
(128, 'Tùng Xuân', 'xuantungdev97@gmail.com', 'Yeen Basi', '386138536', NULL, 1, 525000, 1, '2019-04-08 20:50:42', '2019-04-08 20:51:49', '2019-04-10'),
(129, 'Tùng', 'xuantung@gmail.com', 'quận Cầu Giấy, Hà Nội', '386138536', NULL, 1, 1344000, 1, '2019-04-09 09:15:43', '2019-04-17 02:03:48', '2019-04-09'),
(130, 'sdsfsdfsdfsd', 'xuantung@gmail.com', 'fdfsdfsdfsd', '386138536', NULL, 1, 425000, 0, '2019-04-11 03:04:15', '2019-04-11 03:04:15', '2019-04-11'),
(131, 'Tùng Xuân', 'xuantungdev97@gmail.com', 'Yeen Basi', '386138536', NULL, 1, 2127000, 0, '2019-04-11 19:48:59', '2019-04-11 19:48:59', '2019-04-12'),
(132, 'Tùng Xuân', 'xuantungdev97@gmail.com', 'Yeen Basi', '386138536', NULL, 1, 1369000, 1, '2019-04-15 08:25:27', '2019-04-15 08:30:09', '2019-04-15'),
(133, 'Tùng Xuân', 'xuantungdeva97@gmail.com', 'Yeen Basi', '386138536', NULL, 1, 249000, 1, '2019-04-16 19:01:30', '2019-04-16 19:02:06', '2019-04-17'),
(134, 'Tùng Xuân', 'xuantunzgdev97@gmail.com', 'Yeen Basi', '386138536', NULL, 1, 8206800, 1, '2019-04-16 19:17:47', '2019-04-16 19:18:28', '2019-04-17'),
(135, 'Tùng Xuân', 'xuantungdev97@gmail.com', 'Yeen Basi', '386138536', NULL, 1, 894600, 1, '2019-04-17 00:12:31', '2019-04-17 00:13:10', '2019-04-17'),
(136, 'Tùng Xuân', 'xuantungdev97@gmail.com', 'Yeen Basi', '386138536', NULL, 1, 308000, 1, '2019-04-18 00:32:59', '2019-04-18 00:34:44', '2019-04-18'),
(137, 'Tùng Xuân', 'xuantungdev97@gmail.com', 'Yeen Basi', '386138536', NULL, 1, 249000, 1, '2019-04-18 01:35:30', '2019-04-18 01:37:13', '2019-04-18'),
(138, 'xaaaaaaaa', 'xuantungdev97@gmail.com', 'ầng 2 Tòa nhà N09B2,', '386138536', 'aaaaa', 1, 6479991, 0, '2019-04-21 18:56:26', '2019-04-21 18:56:26', '2019-04-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pro_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_amount` int(11) NOT NULL,
  `pro_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `pro_name`, `pro_size`, `pro_color`, `pro_amount`, `pro_price`, `created_at`, `updated_at`) VALUES
(8, 30, 41, 'Quần Áo thể Thao SANTO', 'L', 'Orange', 1, 532000.00, '2019-03-26 20:53:09', '2019-03-26 20:53:09'),
(9, 31, 41, 'Quần Áo thể Thao SANTO', 'L', 'Orange', 1, 532000.00, '2019-03-26 20:53:39', '2019-03-26 20:53:39'),
(10, 31, 35, 'Bộ quần jeans nam chất lượng hàng đầu XuanTung XTL65HA', 'L', 'Black', 1, 600000.00, '2019-03-26 20:53:39', '2019-03-26 20:53:39'),
(11, 32, 41, 'Quần Áo thể Thao SANTO', 'L', 'Orange', 1, 532000.00, '2019-03-26 20:57:15', '2019-03-26 20:57:15'),
(12, 32, 35, 'Bộ quần jeans nam chất lượng hàng đầu XuanTung XTL65HA', 'L', 'Black', 1, 600000.00, '2019-03-26 20:57:15', '2019-03-26 20:57:15'),
(13, 33, 45, 'Quần jeans sành điệu', 'L', 'Blue', 1, 369600.00, '2019-03-26 23:23:32', '2019-03-26 23:23:32'),
(14, 33, 31, 'Áo thun thể thao nam AJ-01', 'L', 'White', 1, 477000.00, '2019-03-26 23:23:32', '2019-03-26 23:23:32'),
(15, 34, 43, 'Váy xòe sành điệu', 'L', 'White', 1, 360000.00, '2019-03-27 00:29:15', '2019-03-27 00:29:15'),
(16, 34, 43, 'Váy xòe sành điệu', 'M', 'White', 2, 360000.00, '2019-03-27 00:29:15', '2019-03-27 00:29:15'),
(17, 35, 35, 'Bộ quần jeans nam chất lượng hàng đầu XuanTung XTL65HA', 'L', 'Black', 4, 600000.00, '2019-03-27 01:21:08', '2019-03-27 01:21:08'),
(18, 36, 45, 'Quần jeans sành điệu', 'L', 'Blue', 1, 369600.00, '2019-03-27 03:11:59', '2019-03-27 03:11:59'),
(19, 37, 45, 'Quần jeans sành điệu', 'L', 'Blue', 1, 369600.00, '2019-03-27 09:10:39', '2019-03-27 09:10:39'),
(20, 38, 41, 'Quần Áo thể Thao SANTO', 'X', 'Orange', 4, 532000.00, '2019-03-27 09:12:50', '2019-03-27 09:12:50'),
(21, 38, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-03-27 09:12:50', '2019-03-27 09:12:50'),
(22, 39, 41, 'Quần Áo thể Thao SANTO', 'X', 'Orange', 1, 532000.00, '2019-03-27 23:14:21', '2019-03-27 23:14:21'),
(23, 39, 31, 'Áo thun thể thao nam AJ-01', 'L', 'White', 1, 477000.00, '2019-03-27 23:14:21', '2019-03-27 23:14:21'),
(24, 40, 36, 'Áo thể thao BAZAS  chất như nước cất', 'X', 'White', 1, 425000.00, '2019-03-28 19:15:19', '2019-03-28 19:15:19'),
(25, 40, 45, 'Quần jeans sành điệu', 'L', 'Blue', 1, 369600.00, '2019-03-28 19:15:19', '2019-03-28 19:15:19'),
(26, 40, 26, 'Áo sơ mi nam dài tay Xuân Tùng', 'M', 'Violet', 1, 480000.00, '2019-03-28 19:15:19', '2019-03-28 19:15:19'),
(27, 40, 46, 'Áo Sơ Mi Nam Cổ Trụ Tay Lỡ Zavans', 'L', 'White', 1, 336000.00, '2019-03-28 19:15:19', '2019-03-28 19:15:19'),
(28, 40, 46, 'Áo Sơ Mi Nam Cổ Trụ Tay Lỡ Zavans', 'X', 'White', 1, 336000.00, '2019-03-28 19:15:19', '2019-03-28 19:15:19'),
(29, 40, 19, 'Chân váy công sở HeraDG đỏ', 'M', 'Red', 1, 525000.00, '2019-03-28 19:15:19', '2019-03-28 19:15:19'),
(30, 41, 49, 'SADsdsad', 'L', 'Green', 1, 308000.00, '2019-03-28 20:40:40', '2019-03-28 20:40:40'),
(31, 41, 46, 'Áo Sơ Mi Nam Cổ Trụ Tay Lỡ Zavans', 'L', 'White', 1, 336000.00, '2019-03-28 20:40:40', '2019-03-28 20:40:40'),
(32, 42, 47, 'Nguyễn T.Hồng Ánh', 'L', 'Green', 1, 420000.00, '2019-03-28 20:40:51', '2019-03-28 20:40:51'),
(33, 43, 45, 'Quần jeans sành điệu', 'L', 'Blue', 1, 369600.00, '2019-03-28 20:41:05', '2019-03-28 20:41:05'),
(34, 44, 46, 'Áo Sơ Mi Nam Cổ Trụ Tay Lỡ Zavans', 'X', 'White', 1, 336000.00, '2019-03-28 20:57:51', '2019-03-28 20:57:51'),
(35, 44, 41, 'Quần Áo thể Thao SANTO', 'L', 'Orange', 1, 532000.00, '2019-03-28 20:57:51', '2019-03-28 20:57:51'),
(36, 45, 19, 'Chân váy công sở HeraDG đỏ', 'M', 'Red', 1, 525000.00, '2019-03-28 20:58:12', '2019-03-28 20:58:12'),
(37, 46, 45, 'Quần jeans sành điệu', 'L', 'Blue', 1, 369600.00, '2019-03-28 21:11:25', '2019-03-28 21:11:25'),
(38, 47, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-03-28 21:11:46', '2019-03-28 21:11:46'),
(39, 47, 19, 'Chân váy công sở HeraDG đỏ', 'M', 'Red', 1, 525000.00, '2019-03-28 21:11:46', '2019-03-28 21:11:46'),
(40, 48, 41, 'Quần Áo thể Thao SANTO', 'L', 'Orange', 1, 532000.00, '2019-03-28 21:39:39', '2019-03-28 21:39:39'),
(41, 49, 46, 'Áo Sơ Mi Nam Cổ Trụ Tay Lỡ Zavans', 'L', 'White', 1, 336000.00, '2019-03-29 00:29:39', '2019-03-29 00:29:39'),
(42, 49, 49, 'SADsdsad', 'L', 'Yellow', 1, 308000.00, '2019-03-29 00:29:39', '2019-03-29 00:29:39'),
(43, 50, 35, 'Bộ quần jeans nam chất lượng hàng đầu XuanTung XTL65HA', 'L', 'Black', 1, 600000.00, '2019-03-29 00:32:55', '2019-03-29 00:32:55'),
(44, 50, 23, 'Chân váy công sở WJP17028 màu đen', 'M', 'Black', 1, 560000.00, '2019-03-29 00:32:55', '2019-03-29 00:32:55'),
(45, 51, 45, 'Quần jeans sành điệu', 'L', 'Blue', 1, 369600.00, '2019-03-29 00:33:13', '2019-03-29 00:33:13'),
(46, 51, 43, 'Váy xòe sành điệu', 'L', 'White', 1, 360000.00, '2019-03-29 00:33:13', '2019-03-29 00:33:13'),
(47, 52, 18, 'Đầm công sở xòe HeraDG xanh', 'L', 'Green', 4, 150000.00, '2019-03-29 02:45:56', '2019-03-29 02:45:56'),
(48, 53, 18, 'Đầm công sở xòe HeraDG xanh', 'L', 'Green', 5, 150000.00, '2019-03-29 02:46:59', '2019-03-29 02:46:59'),
(49, 54, 18, 'Đầm công sở xòe HeraDG xanh', 'L', 'Green', 1, 150000.00, '2019-03-29 02:47:50', '2019-03-29 02:47:50'),
(50, 54, 19, 'Chân váy công sở HeraDG đỏ ddejp', 'M', 'Red', 3, 525000.00, '2019-03-29 02:47:50', '2019-03-29 02:47:50'),
(51, 55, 45, 'Quần jeans sành điệu', 'L', 'Blue', 1, 369600.00, '2019-03-29 03:14:20', '2019-03-29 03:14:20'),
(52, 55, 31, 'Áo thun thể thao nam AJ-01', 'L', 'White', 1, 477000.00, '2019-03-29 03:14:21', '2019-03-29 03:14:21'),
(53, 56, 41, 'Quần Áo thể Thao SANTO', 'L', 'Orange', 1, 532000.00, '2019-03-29 03:20:07', '2019-03-29 03:20:07'),
(54, 57, 49, 'SADsdsad', 'L', 'Green', 1, 308000.00, '2019-03-30 02:24:37', '2019-03-30 02:24:37'),
(55, 57, 44, 'Áo phông nam Active', 'L', 'Blue', 3, 249000.00, '2019-03-30 02:24:37', '2019-03-30 02:24:37'),
(56, 58, 41, 'Quần Áo thể Thao SANTO', 'L', 'Orange', 1, 532000.00, '2019-03-30 07:36:51', '2019-03-30 07:36:51'),
(57, 59, 41, 'Quần Áo thể Thao SANTO', 'L', 'Orange', 1, 532000.00, '2019-03-30 07:38:16', '2019-03-30 07:38:16'),
(58, 60, 41, 'Quần Áo thể Thao SANTO', 'L', 'Orange', 1, 532000.00, '2019-03-30 07:38:24', '2019-03-30 07:38:24'),
(59, 61, 41, 'Quần Áo thể Thao SANTO', 'L', 'Orange', 1, 532000.00, '2019-03-30 07:38:39', '2019-03-30 07:38:39'),
(60, 62, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-03-30 07:39:39', '2019-03-30 07:39:39'),
(61, 63, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-03-30 07:39:40', '2019-03-30 07:39:40'),
(62, 64, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-03-30 07:39:40', '2019-03-30 07:39:40'),
(63, 65, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-03-30 07:39:49', '2019-03-30 07:39:49'),
(64, 66, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-03-30 07:42:13', '2019-03-30 07:42:13'),
(65, 67, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-03-30 07:42:57', '2019-03-30 07:42:57'),
(66, 68, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-03-30 07:51:31', '2019-03-30 07:51:31'),
(67, 69, 49, 'SADsdsad', 'L', 'Green', 1, 308000.00, '2019-03-30 08:46:28', '2019-03-30 08:46:28'),
(68, 70, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-03-30 08:54:03', '2019-03-30 08:54:03'),
(69, 70, 43, 'Váy xòe sành điệu', 'L', 'White', 1, 360000.00, '2019-03-30 08:54:03', '2019-03-30 08:54:03'),
(70, 71, 41, 'Quần Áo thể Thao SANTO', 'L', 'Orange', 1, 532000.00, '2019-03-30 08:54:32', '2019-03-30 08:54:32'),
(71, 72, 47, 'Nguyễn T.Hồng Ánh', 'L', 'Green', 1, 420000.00, '2019-03-30 08:55:21', '2019-03-30 08:55:21'),
(72, 73, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-03-30 08:55:40', '2019-03-30 08:55:40'),
(73, 73, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-03-30 22:17:39', '2019-03-30 22:17:39'),
(74, 74, 47, 'Nguyễn T.Hồng Ánh', 'L', 'Green', 1, 420000.00, '2019-03-30 22:18:13', '2019-03-30 22:18:13'),
(75, 75, 49, 'SADsdsad', 'L', 'Green', 1, 308000.00, '2019-03-30 22:26:54', '2019-03-30 22:26:54'),
(76, 76, 46, 'Áo Sơ Mi Nam Cổ Trụ Tay Lỡ Zavans', 'L', 'White', 1, 336000.00, '2019-03-31 01:05:36', '2019-03-31 01:05:36'),
(77, 77, 26, 'Áo sơ mi nam dài tay Xuân Tùng', 'M', 'Violet', 1, 480000.00, '2019-03-31 01:31:48', '2019-03-31 01:31:48'),
(78, 78, 26, 'Áo sơ mi nam dài tay Xuân Tùng', 'M', 'Violet', 1, 480000.00, '2019-03-31 02:00:15', '2019-03-31 02:00:15'),
(79, 79, 26, 'Áo sơ mi nam dài tay Xuân Tùng', 'M', 'Violet', 1, 480000.00, '2019-03-31 02:00:52', '2019-03-31 02:00:52'),
(80, 80, 26, 'Áo sơ mi nam dài tay Xuân Tùng', 'M', 'Violet', 1, 480000.00, '2019-03-31 02:01:33', '2019-03-31 02:01:33'),
(81, 81, 26, 'Áo sơ mi nam dài tay Xuân Tùng', 'M', 'Violet', 1, 480000.00, '2019-03-31 02:03:02', '2019-03-31 02:03:02'),
(82, 82, 49, 'SADsdsad', 'L', 'Green', 1, 308000.00, '2019-03-31 02:10:17', '2019-03-31 02:10:17'),
(83, 82, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-03-31 02:10:17', '2019-03-31 02:10:17'),
(84, 83, 47, 'Nguyễn T.Hồng Ánh', 'L', 'Green', 1, 420000.00, '2019-03-31 02:12:24', '2019-03-31 02:12:24'),
(85, 83, 31, 'Áo thun thể thao nam AJ-01', 'L', 'White', 1, 477000.00, '2019-03-31 02:12:24', '2019-03-31 02:12:24'),
(86, 84, 47, 'Nguyễn T.Hồng Ánh', 'L', 'Green', 1, 420000.00, '2019-03-31 02:15:04', '2019-03-31 02:15:04'),
(87, 84, 31, 'Áo thun thể thao nam AJ-01', 'L', 'White', 1, 477000.00, '2019-03-31 02:15:05', '2019-03-31 02:15:05'),
(88, 85, 45, 'Quần jeans sành điệu', 'L', 'Blue', 4, 369600.00, '2019-03-31 02:17:34', '2019-03-31 02:17:34'),
(89, 85, 43, 'Váy xòe sành điệu', 'L', 'White', 1, 360000.00, '2019-03-31 02:17:34', '2019-03-31 02:17:34'),
(90, 86, 45, 'Quần jeans sành điệu', 'L', 'Blue', 1, 369600.00, '2019-03-31 02:19:51', '2019-03-31 02:19:51'),
(91, 87, 45, 'Quần jeans sành điệu', 'L', 'Blue', 1, 369600.00, '2019-03-31 02:20:32', '2019-03-31 02:20:32'),
(92, 88, 49, 'SADsdsad', 'L', 'Green', 1, 308000.00, '2019-03-31 02:23:18', '2019-03-31 02:23:18'),
(93, 89, 49, 'SADsdsad', 'L', 'Green', 1, 308000.00, '2019-03-31 02:23:34', '2019-03-31 02:23:34'),
(94, 90, 49, 'SADsdsad', 'L', 'Green', 1, 308000.00, '2019-03-31 02:26:18', '2019-03-31 02:26:18'),
(95, 91, 43, 'Váy xòe sành điệu', 'L', 'White', 1, 360000.00, '2019-03-31 02:27:42', '2019-03-31 02:27:42'),
(96, 92, 49, 'SADsdsad', 'L', 'Green', 1, 308000.00, '2019-03-31 02:29:51', '2019-03-31 02:29:51'),
(97, 93, 45, 'Quần jeans sành điệu', 'L', 'Blue', 5, 369600.00, '2019-03-31 02:33:40', '2019-03-31 02:33:40'),
(98, 93, 43, 'Váy xòe sành điệu', 'L', 'White', 1, 360000.00, '2019-03-31 02:33:40', '2019-03-31 02:33:40'),
(99, 94, 49, 'SADsdsad', 'L', 'Green', 1, 308000.00, '2019-03-31 02:35:57', '2019-03-31 02:35:57'),
(100, 94, 43, 'Váy xòe sành điệu', 'L', 'White', 1, 360000.00, '2019-03-31 02:35:57', '2019-03-31 02:35:57'),
(101, 95, 46, 'Áo Sơ Mi Nam Cổ Trụ Tay Lỡ Zavans', 'L', 'White', 3, 336000.00, '2019-03-31 02:41:48', '2019-03-31 02:41:48'),
(102, 95, 19, 'Chân váy công sở HeraDG đỏ ddejp', 'M', 'Red', 1, 525000.00, '2019-03-31 02:41:48', '2019-03-31 02:41:48'),
(103, 96, 45, 'Quần jeans sành điệu', 'L', 'Blue', 1, 369600.00, '2019-03-31 03:19:01', '2019-03-31 03:19:01'),
(104, 96, 44, 'Áo phông nam Active', 'L', 'Blue', 4, 249000.00, '2019-03-31 03:19:01', '2019-03-31 03:19:01'),
(105, 96, 20, 'Áo sơ mi nam Fit Mattana', 'L', 'White', 1, 450000.00, '2019-03-31 03:19:01', '2019-03-31 03:19:01'),
(106, 97, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-03-31 04:09:05', '2019-03-31 04:09:05'),
(107, 97, 41, 'Quần Áo thể Thao SANTO', 'X', 'Orange', 3, 532000.00, '2019-03-31 04:09:05', '2019-03-31 04:09:05'),
(110, 99, 49, 'SADsdsad', 'L', 'Green', 1, 308000.00, '2019-03-31 23:41:11', '2019-03-31 23:41:11'),
(111, 101, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-03-31 23:48:23', '2019-03-31 23:48:23'),
(112, 101, 23, 'Chân váy công sở WJP17028 màu đen', 'M', 'Black', 1, 560000.00, '2019-03-31 23:48:23', '2019-03-31 23:48:23'),
(113, 102, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-03-31 23:49:28', '2019-03-31 23:49:28'),
(114, 102, 45, 'Quần jeans sành điệu', 'L', 'Blue', 3, 369600.00, '2019-03-31 23:49:28', '2019-03-31 23:49:28'),
(115, 102, 36, 'Áo thể thao BAZAS  chất như nước cất', 'X', 'Black', 1, 425000.00, '2019-03-31 23:49:28', '2019-03-31 23:49:28'),
(116, 103, 45, 'Quần jeans sành điệu', 'L', 'Blue', 3, 369600.00, '2019-04-03 03:26:01', '2019-04-03 03:26:01'),
(117, 103, 23, 'Chân váy công sở WJP17028 màu đen', 'M', 'Black', 1, 560000.00, '2019-04-03 03:26:01', '2019-04-03 03:26:01'),
(118, 104, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-04-05 07:15:53', '2019-04-05 07:15:53'),
(119, 104, 19, 'Chân váy công sở HeraDG đỏ ddejp', 'M', 'Red', 4, 525000.00, '2019-04-05 07:15:53', '2019-04-05 07:15:53'),
(120, 105, 36, 'Áo thể thao BAZAS  chất như nước cất', 'X', 'Black', 1, 425000.00, '2019-04-05 08:26:10', '2019-04-05 08:26:10'),
(121, 105, 47, 'Nguyễn T.Hồng Ánh', 'L', 'Green', 1, 420000.00, '2019-04-06 08:51:24', '2019-04-06 08:51:24'),
(122, 105, 45, 'Quần jeans sành điệu', 'L', 'Blue', 1, 369600.00, '2019-04-06 08:51:24', '2019-04-06 08:51:24'),
(123, 106, 47, 'Nguyễn T.Hồng Ánh', 'L', 'Green', 4, 420000.00, '2019-04-07 03:05:27', '2019-04-07 03:05:27'),
(124, 106, 46, 'Áo Sơ Mi Nam Cổ Trụ Tay Lỡ Zavans', 'L', 'White', 3, 336000.00, '2019-04-07 03:05:27', '2019-04-07 03:05:27'),
(125, 107, 36, 'Áo thể thao BAZAS  chất như nước cất', 'X', 'Black', 1, 425000.00, '2019-04-07 03:07:13', '2019-04-07 03:07:13'),
(126, 108, 47, 'Nguyễn T.Hồng Ánh', 'L', 'Green', 1, 420000.00, '2019-04-07 19:47:28', '2019-04-07 19:47:28'),
(127, 109, 47, 'Nguyễn T.Hồng Ánh', 'L', 'Green', 1, 420000.00, '2019-04-07 19:47:58', '2019-04-07 19:47:58'),
(128, 110, 49, 'SADsdsad', 'L', 'Green', 1, 308000.00, '2019-04-07 23:05:57', '2019-04-07 23:05:57'),
(133, 113, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-04-08 04:09:25', '2019-04-08 04:09:25'),
(134, 114, 44, 'Áo phông nam Active', 'L', 'Green', 3, 249000.00, '2019-04-08 04:10:01', '2019-04-08 04:10:01'),
(135, 114, 45, 'Quần jeans sành điệu', 'L', 'Blue', 3, 369600.00, '2019-04-08 04:10:01', '2019-04-08 04:10:01'),
(136, 115, 44, 'Áo phông nam Active', 'L', 'Green', 2, 249000.00, '2019-04-08 18:15:56', '2019-04-08 18:15:56'),
(137, 116, 49, 'SADsdsad', 'L', 'Green', 1, 308000.00, '2019-04-08 18:25:16', '2019-04-08 18:25:16'),
(138, 117, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-04-08 18:25:46', '2019-04-08 18:25:46'),
(139, 117, 43, 'Váy xòe sành điệu', 'L', 'White', 1, 360000.00, '2019-04-08 18:25:46', '2019-04-08 18:25:46'),
(140, 118, 49, 'SADsdsad', 'L', 'Green', 2, 308000.00, '2019-04-08 18:28:31', '2019-04-08 18:28:31'),
(143, 120, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-04-08 18:38:44', '2019-04-08 18:38:44'),
(144, 121, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-04-08 18:41:56', '2019-04-08 18:41:56'),
(145, 122, 44, 'Áo phông nam Active', 'L', 'Green', 3, 249000.00, '2019-04-08 18:42:07', '2019-04-08 18:42:07'),
(146, 123, 45, 'Quần jeans sành điệu', 'L', 'Blue', 3, 369600.00, '2019-04-08 18:42:28', '2019-04-08 18:42:28'),
(147, 123, 43, 'Váy xòe sành điệu', 'L', 'White', 3, 360000.00, '2019-04-08 18:42:28', '2019-04-08 18:42:28'),
(148, 124, 45, 'Quần jeans sành điệu', 'L', 'Blue', 3, 369600.00, '2019-04-08 18:42:31', '2019-04-08 18:42:31'),
(149, 124, 43, 'Váy xòe sành điệu', 'L', 'White', 3, 360000.00, '2019-04-08 18:42:31', '2019-04-08 18:42:31'),
(150, 125, 43, 'Váy xòe sành điệu', 'L', 'White', 1, 360000.00, '2019-04-08 20:49:52', '2019-04-08 20:49:52'),
(151, 126, 44, 'Áo phông nam Active', 'L', 'Green', 6, 249000.00, '2019-04-08 20:50:13', '2019-04-08 20:50:13'),
(152, 127, 45, 'Quần jeans sành điệu', 'L', 'Blue', 1, 369600.00, '2019-04-08 20:50:29', '2019-04-08 20:50:29'),
(153, 128, 19, 'Chân váy công sở HeraDG đỏ ddejp', 'M', 'Red', 1, 525000.00, '2019-04-08 20:50:42', '2019-04-08 20:50:42'),
(154, 129, 46, 'Áo Sơ Mi Nam Cổ Trụ Tay Lỡ Zavans', 'L', 'White', 4, 336000.00, '2019-04-09 09:15:44', '2019-04-09 09:15:44'),
(155, 130, 36, 'Áo thể thao BAZAS  chất như nước cất', 'X', 'Black', 1, 425000.00, '2019-04-11 03:04:15', '2019-04-11 03:04:15'),
(156, 131, 46, 'Áo Sơ Mi Nam Cổ Trụ Tay Lỡ Zavans', 'L', 'White', 1, 336000.00, '2019-04-11 19:48:59', '2019-04-11 19:48:59'),
(157, 131, 43, 'Váy xòe sành điệu', 'L', 'White', 1, 360000.00, '2019-04-11 19:49:00', '2019-04-11 19:49:00'),
(158, 131, 31, 'Áo thun thể thao nam AJ-01', 'L', 'White', 3, 477000.00, '2019-04-11 19:49:00', '2019-04-11 19:49:00'),
(159, 132, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-04-15 08:25:27', '2019-04-15 08:25:27'),
(160, 132, 23, 'Chân váy công sở WJP17028 màu đen', 'M', 'Black', 2, 560000.00, '2019-04-15 08:25:27', '2019-04-15 08:25:27'),
(161, 133, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-04-16 19:01:30', '2019-04-16 19:01:30'),
(162, 134, 45, 'Quần jeans sành điệu', 'L', 'Blue', 8, 369600.00, '2019-04-16 19:17:48', '2019-04-16 19:17:48'),
(163, 134, 19, 'Chân váy công sở HeraDG đỏ ddejp', 'M', 'Red', 10, 525000.00, '2019-04-16 19:17:48', '2019-04-16 19:17:48'),
(164, 135, 19, 'Chân váy công sở HeraDG đỏ ddejp', 'M', 'Red', 1, 525000.00, '2019-04-17 00:12:31', '2019-04-17 00:12:31'),
(165, 135, 45, 'Quần jeans sành điệu', 'L', 'Blue', 1, 369600.00, '2019-04-17 00:12:32', '2019-04-17 00:12:32'),
(166, 136, 49, 'SADsdsad', 'L', 'Green', 1, 308000.00, '2019-04-18 00:32:59', '2019-04-18 00:32:59'),
(167, 137, 44, 'Áo phông nam Active', 'L', 'Green', 1, 249000.00, '2019-04-18 01:35:30', '2019-04-18 01:35:30'),
(168, 138, 50, 'Áo công sở đẹp chất như nước cất', 'L', 'White', 9, 719999.10, '2019-04-21 18:56:26', '2019-04-21 18:56:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `description`, `thumb`, `main_content`, `created_at`, `updated_at`) VALUES
(6, 'Xuâm Tùng', 'xuam-tung', 'Trong đó có quy định sử dụng phòng ăn. Hiện tại phòng trong đang có công ty Mirai làm việc, thường xuyên có khách,', 'uploads/posts/gender.jpg', '<p>sadasdsa</p>', '2019-04-11 03:17:04', '2019-04-11 03:17:04'),
(7, 'Hồng ánh', 'hong-anh', 'Generate Lorem Ipsum placeholder text for use in your graphic, Generate Lorem Ipsum placeholder text for use in your graphic,', 'uploads/posts/human-right.jpg', '<p>sadasdsa</p>\r\n\r\n<p>sad</p>\r\n\r\n<p>sadsa</p>\r\n\r\n<p>sa</p>', '2019-04-11 03:17:24', '2019-04-11 03:17:58'),
(8, '1 bầu trời đầy nắng và gió', '1-bau-troi-day-nang-va-gio', 'không pít', 'uploads/posts/logo.png', '<p>xu&acirc;n t&ugrave;ng ly1997</p>\r\n\r\n<p>thế đ&eacute;i b&agrave;io</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8083/page/public/uploads/posts/images/anh6.jpg\" style=\"height:300px; width:222px\" /></p>\r\n\r\n<p>kh&ocirc;ng thể tin nổi . m&ecirc;u m&ecirc;u</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8083/page/public/uploads/posts/images/image1.png\" style=\"height:363px; width:600px\" /></p>', '2019-04-11 19:09:56', '2019-04-11 19:09:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `default_price` double(8,2) NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `promotion_price` double(8,2) NOT NULL,
  `producter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `feauture` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `cate_id`, `name`, `amount`, `default_price`, `unit_price`, `promotion_price`, `producter`, `description`, `status`, `feauture`, `created_at`, `updated_at`, `file`) VALUES
(18, 10, 'Đầm công sở xòe HeraDG xanh đẹp', 250, 100000.00, 150000.00, 0.00, 'HeraDG', '<ul>\r\n	<li><strong>Chất liệu vải Cotton pha bền đẹp</strong></li>\r\n	<li><strong>Thiết kế cổ V, tay lỡ, ngực 3 khuy c&agrave;i</strong></li>\r\n	<li><strong>Chiết eo nhẹ t&ocirc;n d&aacute;ng, eo phối đai</strong></li>\r\n	<li><strong>Xuất xứ: Việt Nam</strong></li>\r\n</ul>\r\n\r\n<p><strong><strong>Th&ocirc;ng tin thương hiệu</strong></strong></p>\r\n\r\n<p><strong>HeraDG l&agrave; thương hiệu thời trang trung v&agrave; cao cấp d&agrave;nh cho ph&aacute;i đẹp của Tổng c&ocirc;ng ty Đức Giang. C&aacute;c sản phẩm mang thương hiệu HeraDG được thiết kế theo ba phong c&aacute;ch ri&ecirc;ng biệt: Thời trang trẻ hiện đại, năng động; Thời trang c&ocirc;ng sở thanh lịch, duy&ecirc;n d&aacute;ng v&agrave; Thời trang cao cấp sang trọng, tinh tế, ph&ugrave; hợp với những nữ doanh nh&acirc;n th&agrave;nh đạt. Với ti&ecirc;u ch&iacute; &quot;Đẹp m&atilde;i c&ugrave;ng thời gian&quot;, nh&atilde;n h&agrave;ng HeraDG sẽ mang đến cho ph&aacute;i đẹp những diện mạo tuyệt vời c&ugrave;ng phong c&aacute;ch trang phục được cập nhật theo xu hướng thời trang thế giới.</strong></p>', 1, 1, '2019-03-09 01:22:06', '2019-04-16 19:54:34', '3f6754d37754bb9c6959adedd3107ba94d7dafd7.jpg|e8104cbfa1028a470e3e85b13468485a8293627b.jpg'),
(19, 7, 'Chân váy công sở HeraDG đỏ ddejp', 110, 300000.00, 750000.00, 30.00, 'HeraDG', '<ul>\r\n	<li><strong>Chất liệu vải kaki bền đẹp</strong></li>\r\n	<li><strong>Thiết kế cạp cao, kh&oacute;a k&eacute;o sau lưng</strong></li>\r\n	<li><strong>D&aacute;ng &ocirc;m nhẹ, xẻ sau</strong></li>\r\n	<li><strong>Vạt xếp lệch phối 3 khuy trang tr&iacute;</strong></li>\r\n	<li><strong>Xuất xứ: Việt Nam</strong></li>\r\n</ul>\r\n\r\n<p><strong><strong>Th&ocirc;ng tin thương hiệu</strong></strong></p>\r\n\r\n<p><strong>HeraDG l&agrave; thương hiệu thời trang trung v&agrave; cao cấp d&agrave;nh cho ph&aacute;i đẹp của Tổng c&ocirc;ng ty Đức Giang. C&aacute;c sản phẩm mang thương hiệu HeraDG được thiết kế theo ba phong c&aacute;ch ri&ecirc;ng biệt: Thời trang trẻ hiện đại, năng động; Thời trang c&ocirc;ng sở thanh lịch, duy&ecirc;n d&aacute;ng v&agrave; Thời trang cao cấp sang trọng, tinh tế, ph&ugrave; hợp với những nữ doanh nh&acirc;n th&agrave;nh đạt. Với ti&ecirc;u ch&iacute; &quot;Đẹp m&atilde;i c&ugrave;ng thời gian&quot;, nh&atilde;n h&agrave;ng HeraDG sẽ mang đến cho ph&aacute;i đẹp những diện mạo tuyệt vời c&ugrave;ng phong c&aacute;ch trang phục được cập nhật theo xu hướng thời trang thế giới.</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>', 1, 2, '2019-03-09 01:24:20', '2019-04-17 00:13:10', '9cbe9702dd70c83237faa23e0160b135ff6e878d.jpg|58df2f59a670970f402a3fd48a6573dda1b6e6c3.jpg|12605218d9b1fcc5bb9c6e215643cb06ee65e04a.jpg|93209525b0b5f84304452d39dc1621756295be56.jpg'),
(20, 8, 'Áo sơ mi nam Fit Mattana', 300, 300000.00, 500000.00, 10.00, 'Fit Mattana', '<p><strong>&Aacute;o sơ mi nam Classic Fit Mattana được may từ chất liệu cao cấp, mềm mại đem đến cảm gi&aacute;c thoải m&aacute;i khi sử dụng. Thiết kế đơn giản, tinh tế, mang đến vẻ&nbsp;trẻ trung, mang đến sự thanh lịch, nam t&iacute;nh cho ph&aacute;i mạnh.</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Chất liệu 100% Cotton</strong></li>\r\n	<li><strong>&Aacute;o sơ mi cổ đức, tay d&agrave;i</strong></li>\r\n	<li><strong>D&aacute;ng &aacute;o Classic Fit</strong></li>\r\n	<li><strong>Xuất xứ: Việt Nam</strong></li>\r\n</ul>\r\n\r\n<p><strong><strong>Th&ocirc;ng tin thương hiệu</strong></strong></p>\r\n\r\n<p><strong>Mattana l&agrave; thương hiệu của NBC - Tổng c&ocirc;ng ty may mặc h&agrave;ng đầu tại Việt Nam với bề d&agrave;y lịch sử hơn 35 năm h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t triển. Tuy mang phong c&aacute;ch Ch&acirc;u &Acirc;u nhưng Mattana lại rất ph&ugrave; hợp với người ti&ecirc;u d&ugrave;ng Việt Nam từ&nbsp;v&oacute;c d&aacute;ng, chất liệu đến&nbsp;kỹ thuật cắt may.&nbsp;Đặc biệt, Mattana hiện c&oacute; những d&ograve;ng sản phẩm như: &aacute;o sơ mi được sản xuất tr&ecirc;n d&acirc;y chuyền c&ocirc;ng nghệ hiện đại nhất hiện nay, cổ &aacute;o, nẹp &aacute;o, măng s&eacute;c phẳng, kh&ocirc;ng bị dọp; v&ograve;ng n&aacute;ch, sườn rất phẳng sau khi giặt; quần t&acirc;y được sử dụng c&ocirc;ng nghệ ủi &eacute;p cao cấp, tạo độ sắc n&eacute;t v&agrave; giữ đứng ly quần trong qu&aacute; tr&igrave;nh sử dụng. Hiện nay, Mattana đ&atilde; c&oacute; mặt tại c&aacute;c tỉnh th&agrave;nh lớn v&agrave; c&aacute;c trung t&acirc;m thương mại tr&ecirc;n to&agrave;n quốc với chuỗi hệ thống hơn 100 cửa h&agrave;ng phủ đều khắp cả nước.</strong></p>', 1, 1, '2019-03-09 01:29:22', '2019-04-16 19:54:50', '0ec690ed453d724b44069015cbbe6b2a7b0efb7d.jpg|b25757902d6d0a31ba114dd2baa17a8b635c3d85.jpg'),
(23, 7, 'Chân váy công sở WJP17028 màu đen', 200, 300000.00, 800000.00, 30.00, 'Aligro', '<ul>\r\n	<li><strong>Chất liệu vải Cotton pha bền đẹp</strong></li>\r\n	<li><strong>Thiết kế cạp cao, kh&oacute;a k&eacute;o sau lưng</strong></li>\r\n	<li><strong>D&aacute;ng chữ A</strong></li>\r\n	<li><strong>Phối 5 khuy trang tr&iacute;</strong></li>\r\n	<li><strong>Xuất xứ: Việt Nam</strong></li>\r\n</ul>\r\n\r\n<p><strong><strong>Th&ocirc;ng tin thương hiệu</strong></strong></p>\r\n\r\n<p><strong>HeraDG l&agrave; thương hiệu thời trang trung v&agrave; cao cấp d&agrave;nh cho ph&aacute;i đẹp của Tổng c&ocirc;ng ty Đức Giang. C&aacute;c sản phẩm mang thương hiệu HeraDG được thiết kế theo ba phong c&aacute;ch ri&ecirc;ng biệt: Thời trang trẻ hiện đại, năng động; Thời trang c&ocirc;ng sở thanh lịch, duy&ecirc;n d&aacute;ng v&agrave; Thời trang cao cấp sang trọng, tinh tế, ph&ugrave; hợp với những nữ doanh nh&acirc;n th&agrave;nh đạt. Với ti&ecirc;u ch&iacute; &quot;Đẹp m&atilde;i c&ugrave;ng thời gian&quot;, nh&atilde;n h&agrave;ng HeraDG sẽ mang đến cho ph&aacute;i đẹp những diện mạo tuyệt vời c&ugrave;ng phong c&aacute;ch trang phục được cập nhật theo xu hướng thời trang thế giới.</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>', 1, 1, '2019-03-09 01:37:19', '2019-04-16 19:54:58', '1aae561185f2d615c546806547f05630415bf60d.jpg|6ff76421b1f5eaf73bfb09472a74970464d45846.jpg'),
(26, 8, 'Áo sơ mi nam dài tay Xuân Tùng', 300, 320000.00, 480000.00, 0.00, 'Xuân Tùng', '<p><strong>&Aacute;o sơ mi nam ngắn tay Hasa họa tiết kẻ được may từ chất liệu vải bền đẹp,&nbsp;mềm mịn, kiểu d&aacute;ng đơn giản, tinh tế, mang đến sự trẻ trung, hiện đại, nam t&iacute;nh cho ph&aacute;i mạnh.</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Chất liệu vải Cotton&nbsp;</strong></li>\r\n	<li><strong>&Aacute;o sơ mi ngắn&nbsp;tay</strong></li>\r\n	<li><strong>D&aacute;ng Regular Fit</strong></li>\r\n	<li><strong>Xuất xứ: Việt Nam</strong></li>\r\n</ul>\r\n\r\n<p><strong><strong>Th&ocirc;ng tin thương hiệu</strong></strong></p>\r\n\r\n<p><strong>Hasa l&agrave; thương hiệu thời trang đ&atilde; xuất hiện từ c&aacute;ch đ&acirc;y hơn 10 năm, trong qu&aacute; tr&igrave;nh ph&aacute;t triển của m&igrave;nh, c&aacute;c sản phẩm thời trang mang thương hiệu Hasa đ&atilde; được xuất khẩu ra nhiều nước tr&ecirc;n thế giới. Đặc biệt l&agrave; c&aacute;c chủng loại mặt h&agrave;ng dệt kim mang thương hiệu Hasa được Vinatex đ&aacute;nh gi&aacute; rất cao, lu&ocirc;n lu&ocirc;n nằm trong nh&oacute;m những mặt h&agrave;ng chủ chốt của Vinatex. C&aacute;c sản phẩm thời trang mang thương hiệu Hasa bao gồm: Thời trang nam, thời trang nữ, thời trang thể thao, thời trang trẻ em. Hầu hết c&aacute;c mẫu thời trang Hasa cung cấp ra thị trường nhận được sự ủng hộ, sự đ&aacute;nh gi&aacute; cao của kh&aacute;ch h&agrave;ng.</strong></p>', 1, 2, '2019-03-09 08:17:46', '2019-04-16 19:55:05', '4c4533cc3a01efad02a7e1a810c383b90706cf06.jpg|73519a8dd5c6e5533ba02f88ab41403bfd8dacdd.jpg|c2504b50c7d280028a9e515923366a2335e207ab.jpg'),
(31, 9, 'Áo thun thể thao nam AJ-01', 299, 330000.00, 530000.00, 10.00, 'Aligro', '<p><a href=\"http://sona.store/collections/ao-thun-nam-the-thao\"><strong>&Aacute;o thun thể thao nam</strong></a>: Chất liệu thun cotton mềm mại, tho&aacute;ng m&aacute;t, thấm h&uacute;t tốt, kh&ocirc;ng lo hầm b&iacute; khi mặc. Thiết kế đơn giản với 3 m&agrave;u cơ bản, cổ tr&ograve;n, tay ngắn mang lại cho ph&aacute;i mạnh phong c&aacute;ch nam t&iacute;nh v&agrave; lịch l&atilde;m khi mặc h&agrave;ng ng&agrave;y</p>\r\n\r\n<p><strong>Điểm nổi bật của &aacute;o</strong></p>\r\n\r\n<ul>\r\n	<li><strong>&Aacute;o thun thể thao tay ngắn</strong>&nbsp;c&oacute; thiết kế cổ tr&ograve;n,&nbsp; lại cho ph&aacute;i mạnh phong c&aacute;ch nam t&iacute;nh v&agrave; lịch l&atilde;m khi mặc h&agrave;ng ng&agrave;y</li>\r\n	<li>Form &aacute;o c&oacute; độ fit, kh&ocirc;ng qu&aacute; &ocirc;m gi&uacute;p bạn thoải m&aacute;i khi mặc chơi thể thao hay c&aacute;c hoạt động h&agrave;ng ng&agrave;y</li>\r\n	<li>Ph&iacute;a trước &aacute;o thun c&oacute; in logo đơn giản</li>\r\n	<li>Chất liệu thun cotton rất mềm mại, tho&aacute;ng m&aacute;t, thấm h&uacute;t tốt, v&agrave; c&oacute; độ co gi&atilde;n rất tốt</li>\r\n	<li>Kết hợp h&agrave;i h&ograve;a được với c&aacute;c trang phục từ bụi bặm c&aacute; t&iacute;nh như quần short, quần jean đến những phong c&aacute;ch đơn giản cổ điển như quần t&acirc;y quần kaki,..</li>\r\n</ul>', 1, 2, '2019-03-17 23:52:31', '2019-04-16 19:55:15', 'Ao-under-armour-xam.jpg|images (2).jpg'),
(35, 5, 'Bộ quần jeans nam chất lượng hàng đầu XuanTung XTL65HA', 111, 400000.00, 600000.00, 0.00, 'XuanTung', '<ul>\r\n	<li>Quần jean lu&ocirc;n đa dạng về mẫu m&atilde;, kiểu d&aacute;ng cũng như m&agrave;u sắc. Do đ&oacute;, c&aacute;c bạn nam c&oacute; thể tha hồ lựa chọn kiểu d&aacute;ng ưng &yacute; để khoe c&aacute; t&iacute;nh trẻ trung, năng động mỗi khi xuống phố. Mẫu Quần Jean với những đường r&aacute;ch ngẫu hứng phối wash nhẹ ph&iacute;a trước rất đẹp mắt.Thiết kế hiện đại, trẻ trung, form quần ống c&ocirc;n trang nh&atilde;. M&agrave;u xanh đen th&ocirc;ng dụng, cho bạn nhiều lựa chọn khi phối đồ.Chất liệu jean cao cấp, đảm bảo chắc chắn, bền đẹp v&agrave; vẫn c&oacute; độ co d&atilde;n nhất định khi mặc. Hai t&uacute;i trước v&agrave; hai t&uacute;i sau tiện lợi, c&oacute; độ s&acirc;u rộng ph&ugrave; hợp. Bạn c&oacute; thể v&ocirc; tư lựa chọn v&igrave; quần c&oacute; rất nhiều size.</li>\r\n	<li>Điểm qua những n&eacute;t nổi bật của sản phẩm:</li>\r\n	<li>- Kiểu d&aacute;ng thời trang,s&agrave;nh điệu.</li>\r\n	<li>- Tổng thể m&agrave;u xanh h&agrave;i h&ograve;a phối r&aacute;ch t&aacute;o bạo tạo sự năng động, c&aacute; t&iacute;nh.</li>\r\n	<li>- C&oacute; hai t&uacute;i x&eacute;o trước v&agrave; hai t&uacute;i sau rất tiện dụng.</li>\r\n	<li>- Chất liệu jean cotton bền đẹp, chắc chắn, kh&ocirc;ng phai m&agrave;u, kh&ocirc;ng co r&uacute;t khi giặt.</li>\r\n</ul>', 1, 2, '2019-03-18 00:12:07', '2019-04-16 19:55:23', '61074bs.u2566.d20161108.t092937.287215.jpg|quan_jean_nam_basic_xuoc_nhe_4fda.jpg|quần-jean-nam-đẹp-màu-xanh-jean.jpg'),
(36, 4, 'Áo thể thao BAZAS  chất như nước cất', 270, 285000.00, 425000.00, 0.00, 'BAZAS', '<p>Bộ Quần &Aacute;o Thể Thao Nam Đa Năng BAZAS BZ053</p>\r\n\r\n<p>M&atilde; Sản phẩm:BZ053</p>\r\n\r\n<p>Chất liệu vải cao cấp<br />\r\n- Tay ngắn<br />\r\n- Kh&ocirc;ng may l&oacute;t</p>\r\n\r\n<p>Thoải m&aacute;i trong mọi hoạt động với &aacute;o thun cổ tr&ograve;n. &Aacute;o được l&agrave;m từ chất liệu vải c&oacute; độ co gi&atilde;n cao, thấm h&uacute;t tốt để bạn lu&ocirc;n thấy tho&aacute;ng m&aacute;t cả ng&agrave;y.</p>\r\n\r\n<p>Bộ Quần &Aacute;o Thể Thao Nam Đa Năng SODOHA gi&uacute;p bạn vận động ngo&agrave;i trời tho&aacute;i m&aacute;i dễ d&agrave;ng v&agrave; rất hợp thời trang , vừa trẻ trung năng động , căng tr&agrave;n sức sống tươi trẻ.</p>\r\n\r\n<p>Chất liệu vải cao cấp<br />\r\nTay ngắn Kh&ocirc;ng may l&oacute;t<br />\r\nThoải m&aacute;i trong mọi hoạt động với &aacute;o thun cổ tr&ograve;n</p>', 1, 1, '2019-03-18 00:21:00', '2019-04-16 19:55:31', '6da0012243a8b352429cfd728dd0af01.jpg|1475035832336_73870.jpg'),
(41, 4, 'Quần Áo thể Thao SANTO', 200, 380000.00, 560000.00, 5.00, 'SANTO', '<ul>\r\n	<li><strong>Chất liệu vải Cotton pha bền đẹp</strong></li>\r\n	<li><strong>Thiết kế cạp cao, kh&oacute;a k&eacute;o sau lưng</strong></li>\r\n	<li><strong>D&aacute;ng chữ A</strong></li>\r\n	<li><strong>Phối 5 khuy trang tr&iacute;</strong></li>\r\n	<li><strong>Xuất xứ: Việt Nam</strong></li>\r\n</ul>\r\n\r\n<p><strong><strong>Th&ocirc;ng tin thương hiệu</strong></strong></p>\r\n\r\n<p><strong>HeraDG l&agrave; thương hiệu thời trang trung v&agrave; cao cấp d&agrave;nh cho ph&aacute;i đẹp của Tổng c&ocirc;ng ty Đức Giang. C&aacute;c sản phẩm mang thương hiệu HeraDG được thiết kế theo ba phong c&aacute;ch ri&ecirc;ng biệt: Thời trang trẻ hiện đại, năng động; Thời trang c&ocirc;ng sở thanh lịch, duy&ecirc;n d&aacute;ng v&agrave; Thời trang cao cấp sang trọng, tinh tế, ph&ugrave; hợp với những nữ doanh nh&acirc;n th&agrave;nh đạt. Với ti&ecirc;u ch&iacute; &quot;Đẹp m&atilde;i c&ugrave;ng thời gian&quot;, nh&atilde;n h&agrave;ng HeraDG sẽ mang đến cho ph&aacute;i đẹp những diện mạo tuyệt vời c&ugrave;ng phong c&aacute;ch trang phục được cập nhật theo xu hướng thời trang thế giới.</strong></p>', 1, 2, '2019-03-19 07:00:50', '2019-04-16 19:55:38', '6c05389525da08cedeed4d64ed5ae52b.jpg|17f9a70250272eeae57d18354a4d9249.jpg|e6ce145c33324c83e335579d6dae9669.jpg'),
(43, 10, 'Váy xòe sành điệu', 210, 280000.00, 360000.00, 0.00, 'ADICA', '<p>V&aacute;y/đầm hoa d&aacute;ng x&ograve;e chưa bao giờ lỗi mốt bởi n&oacute; lu&ocirc;n mang đến cho chị em ph&aacute;i đẹp một sự cuốn h&uacute;t hết sức nhẹ nh&agrave;ng v&agrave; tự nhi&ecirc;n. Bạn n&ecirc;n kết hợp đầm hoa d&aacute;ng x&ograve;e với một đ&ocirc;i <strong><a href=\"https://bloganchoi.com/top-mau-giay-cao-got-cong-so-dep-gia-re/\" target=\"_blank\">gi&agrave;y cao g&oacute;t</a><a href=\"https://bloganchoi.com/tuyen-tap-mau-vay-xoe-2017-khien-bao-nang-me-man/\" target=\"_blank\"><img alt=\"Tuyển tập mẫu váy xòe 2017 khiến bao nàng mê mẩn - BlogAnChoi\" src=\"https://bloganchoi.com/wp-content/images/bac/others/transparent-1x1.gif?utm_source=dmca&amp;utm_medium=copy&amp;utm_term=Tuy%E1%BB%83n%20t%E1%BA%ADp%20m%E1%BA%ABu%20v%C3%A1y%20x%C3%B2e%202017%20khi%E1%BA%BFn%20bao%20n%C3%A0ng%20m%C3%AA%20m%E1%BA%A9n%20-%20BlogAnChoi&amp;utm_content=https%3A%2F%2Fbloganchoi.com%2Ftuyen-tap-mau-vay-xoe-2017-khien-bao-nang-me-man%2F&amp;tags=https%3A%2F%2Fbloganchoi.com%2Ftuyen-tap-mau-vay-xoe-2017-khien-bao-nang-me-man%2F%2Chttps%3A%2F%2Fbloganchoi.com%2Ftuyen-tap-mau-vay-xoe-2017-khien-bao-nang-me-man%2F%2Chttps%3A%2F%2Fbloganchoi.com%2Ftuyen-tap-mau-vay-xoe-2017-khien-bao-nang-me-man%2F%2Chttps%3A%2F%2Fbloganchoi.com%2Ftuyen-tap-mau-vay-xoe-2017-khien-bao-nang-me-man%2F&amp;dmcacpp=1\" style=\"height:1px; width:1px\" /></a></strong>. Trong trường hợp nếu sử dụng th&ecirc;m phụ kiện t&uacute;i x&aacute;ch đi k&egrave;m h&atilde;y d&ugrave;ng những m&agrave;u tối giản, tuyệt đối kh&ocirc;ng n&ecirc;n d&ugrave;ng m&agrave;u đối lập với họa tiết của hoa khiến tổng thể vẻ ngo&agrave;i trở n&ecirc;n rối mắt.</p>\r\n\r\n<p>Nhẹ nh&agrave;ng, bay bổng v&agrave; đầy quyến rũ l&agrave; cảm gi&aacute;c tuyệt vời m&agrave; mẫu v&aacute;y x&ograve;e cột nơ n&agrave;y c&oacute; thể mang đến cho bạn. Thật vậy, với chất liệu lụa Chiffon&nbsp;c&aacute;t tuyết mềm mịn tự nhi&ecirc;n, v&aacute;y x&ograve;e cột nơ ph&ugrave; hợp với c&aacute;c c&ocirc; n&agrave;ng c&oacute; phong c&aacute;ch trẻ trung, năng động trong những buổi tiệc t&ugrave;ng hoặc đi dạo phố.</p>\r\n\r\n<p>Một t&iacute;n đồ thời trang&nbsp;ch&iacute;nh hiệu sẽ chẳng thể bỏ qua những mẫu v&aacute;y x&ograve;e tay lỡ hội tụ c&aacute;c đường cắt c&uacute;p tinh tế, điểm nhấn nhẹ nh&agrave;ng nhưng kh&ocirc;ng k&eacute;m phần độc đ&aacute;o. B&ecirc;n cạnh những mẫu v&aacute;y/đầm tay lỡ d&aacute;ng x&ograve;e dạng trơn thanh lịch, BlogAnChoi tin chắc rằng cũng sẽ c&oacute; rất nhiều c&ocirc; n&agrave;ng m&ecirc; mẩn trước c&aacute;c mẫu v&aacute;y ren x&ograve;e thời thượng, quyến rũ.</p>', 1, 1, '2019-03-19 07:50:01', '2019-04-16 19:55:46', 'd1a37870-97bb-11e8-85b5-ed6f884ad44e.jpg|Đầm-Xòe-Trễ-Vai-Dễ-Thương-Dh018-1.jpg|images (7).jpg'),
(44, 9, 'Áo phông nam Active', 179, 165000.00, 249000.00, 0.00, 'Active', '<ul>\r\n	<li><a href=\"https://canifa.com/nam/do-the-thao/ao-thun.html\" target=\"_blank\">&Aacute;o ph&ocirc;ng&nbsp;nam</a>&nbsp;Active, cổ tr&ograve;n ngắn tay</li>\r\n	<li>Thiết kế đơn giản kh&ocirc;ng rối mắt, độ &ocirc;m vừa phải m&agrave; vẫn l&ecirc;n chuẩn form d&aacute;ng</li>\r\n	<li>Phần vai raglan gi&uacute;p d&aacute;ng &aacute;o trở n&ecirc;n khỏe khoắn v&agrave; năng động hơn, đồng thời tạo cảm gi&aacute;c b&aacute;m theo đường cong cơ thể, thể hiện được sự gợi cảm</li>\r\n	<li>Chất liệu mỏng, nhẹ v&agrave; tho&aacute;ng m&aacute;t gi&uacute;p người mặc thoải m&aacute;i vận động m&agrave; kh&ocirc;ng phải bận t&acirc;m mối lo ngại mồ h&ocirc;i</li>\r\n	<li>thể hiện sự nam t&iacute;nh của bạn trong mọi t&igrave;nh huống</li>\r\n	<li>Xem th&ecirc;m: BST c&aacute;c mẫu&nbsp;<a href=\"https://canifa.com/nam/do-the-thao.html\" target=\"_blank\">Quần ph&ocirc;ng&nbsp;nam</a>&nbsp;CANIFA mới nhất 2018</li>\r\n</ul>', 1, 1, '2019-03-19 07:56:35', '2019-04-18 01:37:13', 'bo-si-ao-thun-nam-tommy.jpg|s7-1214453_lifestyle.jpg'),
(45, 5, 'Quần jeans sành điệu', 339, 300000.00, 420000.00, 12.00, 'Aligro', '<p>Chất liệu như denim vẫn lu&ocirc;n được đ&aacute;nh gi&aacute; nhờ sự bền bỉ v&agrave; trường tồn theo năm th&aacute;ng. Lịch sử thời trang đ&atilde; chứng minh được điều đ&oacute;. Kể từ khi m&agrave; quần jeans nam được ra đời lần đầu ti&ecirc;n th&igrave; dường như c&aacute;c m&oacute;n đồ denim đ&atilde; bao tr&ugrave;m c&aacute;c ng&oacute;c ng&aacute;ch của cuộc sống ch&uacute;ng ta.</p>\r\n\r\n<p>V&agrave; chưa một gi&acirc;y ph&uacute;c n&agrave;o tr&ecirc;n cuộc sống n&agrave;y, nam giới cũng như nữ giới qu&ecirc;n đi mẫu trang phục đa năng như thế n&agrave;y. D&ugrave; c&aacute;c xu hướng c&oacute; qua đi rồi quay lại th&igrave; quần jeans vẫn ở đ&oacute;. Ch&uacute;ng vẫn đẹp giản đơn trong chất liệu, kiểu d&aacute;ng v&agrave; tạo phong c&aacute;ch cho người mặc.</p>\r\n\r\n<p>C&oacute; hai yếu tố quyết định sự then chốt cho chiếc quần jeans nam đ&oacute; ch&iacute;nh l&agrave;: sự đa năng v&agrave; gi&aacute; trị tinh thần. Đa năng ở đ&acirc;y ch&iacute;nh l&agrave; tạo sự thuận lợi cho nam giới trong c&aacute;c hoạt động hằng n&agrave;y. C&ograve;n gi&aacute; trị tinh thần l&agrave; biểu tượng đơn giản nhưng ph&ocirc; diễn được n&eacute;t đẹp nam t&iacute;nh của đ&agrave;n &ocirc;ng qua nhiều thế hệ kh&aacute;c nhau.</p>', 1, 2, '2019-03-19 07:59:45', '2019-04-17 00:13:10', 'jean-rach-nam-1m4G3-CmANZe_simg_ab1f47_350x350_maxb.jpg|quan_jeans_rach_nam_tre_trung_177_1516964061.jpg'),
(46, 8, 'Áo Sơ Mi Nam Cổ Trụ Tay Lỡ Zavans', 266, 280000.00, 420000.00, 20.00, 'Zavans', '<ul>\r\n	<li><strong>&Aacute;o Sơ Mi Nam Cổ Trụ Tay Lỡ Zavans</strong>&nbsp;lu&ocirc;n l&agrave; sự lựa chọn h&agrave;ng đầu của giới c&ocirc;ng sở hiện nay, với kiểu d&aacute;ng lịch thiệp, đường may đẹp v&agrave; chất lượng vải cao cấp.</li>\r\n	<li>&Aacute;o sơ mi gi&uacute;p bạn nam tr&ocirc;ng lịch l&atilde;m v&agrave; sang trọng hơn với thiết kế sang trọng, gia c&ocirc;ng sắc sảo.</li>\r\n	<li>Form &ocirc;m gọn g&agrave;ng, trẻ trung, tay d&agrave;i thanh lịch.</li>\r\n	<li>Sản phẩm may từ chất liệu Cotton nhập khẩu cao cấp, được biết đến với đặc t&iacute;nh thấm h&uacute;t mồ h&ocirc;i tốt, tho&aacute;ng m&aacute;t ngay cả trong điều kiện thời thiết n&oacute;ng bức cho form &aacute;o đứng, sang trọng.</li>\r\n	<li>Bề mặt vải mềm mịn. Vải c&ograve;n c&oacute; đặc t&iacute;nh chống b&aacute;m bẩn v&agrave; chống m&agrave;i m&ograve;n tốt, đảm bảo sự bền đẹp với thời gian, dễ giặt, nhanh kh&ocirc;.</li>\r\n	<li>Bạn c&oacute; thể kết hợp c&ugrave;ng quần t&acirc;y, jeans, kaki cho phong c&aacute;ch thời trang đa dạng.</li>\r\n</ul>', 1, 2, '2019-03-19 08:02:38', '2019-04-17 02:03:48', 'ao-hot-trend-1.jpg|top1.jpg'),
(47, 7, 'Nguyễn T.Hồng Ánh', 4, 300000.00, 420000.00, 0.00, 'aaaaaaa', '<p>aaaaaaaaaaa</p>', 1, 2, '2019-03-23 19:28:23', '2019-04-07 19:50:33', 'e8104cbfa1028a470e3e85b13468485a8293627b.jpg'),
(49, 8, 'SADsdsad', 279, 300000.00, 700000.00, 56.00, 'Aligro', '<p>ADSADS</p>\r\n\r\n<p>ASD</p>\r\n\r\n<p>SASDA</p>', 1, 1, '2019-03-25 02:38:13', '2019-04-18 00:34:44', '66b78a51ebe81c3c21f852c4ed5ba1a28eca9c3d.jpg'),
(50, 6, 'Áo công sở đẹp chất như nước cất', 100, 500000.00, 799999.00, 10.00, 'xiaomi', '<p><strong>&Aacute;o kiểu</strong>&nbsp;&ndash; l&agrave; một trong những chiếc &aacute;o thường được c&aacute;c bạn g&aacute;i c&ocirc;ng sở ưu ti&ecirc;n lựa chọn để phối đồ chung với nhau. Một chiếc &aacute;o kiểu mang đến cho c&aacute;c c&ocirc; n&agrave;ng sự tươi trẻ v&agrave; kh&aacute;c lạ hơn, bởi n&oacute; được thiết kế một c&aacute;ch tinh tế, kh&ocirc;ng bị b&oacute; buộc trong một khu&ocirc;n khổ đơn điệu như &aacute;o thun, &aacute;o sơ mi th&ocirc;ng thường. V&agrave; c&oacute; thể thấy rằng, sự ưu việt nhất của những chiếc &aacute;o kiểu l&agrave; c&oacute; thể kết hợp được với hầu hết c&aacute;c m&oacute;n đồ kh&aacute;c như ch&acirc;n v&aacute;y, quần t&acirc;y, quần jeans,&hellip; để tạo ra sự ph&ugrave; hợp trong phong c&aacute;ch của ch&iacute;nh m&igrave;nh.</p>\r\n\r\n<p>H&atilde;y c&ugrave;ng Thời trang trẻ tham khảo những mẫu&nbsp;<strong>&aacute;o kiểu phong c&aacute;ch H&agrave;n Quốc</strong>&nbsp;xinh đẹp dưới đ&acirc;y nh&eacute;!</p>\r\n\r\n<p>Sự đơn giản của chiếc &aacute;o c&ugrave;ng với ch&acirc;n v&aacute;y &ocirc;m đ&atilde; mang đến sự mảnh mai, t&ocirc;n l&ecirc;n d&aacute;ng người quyến rũ, kết hợp với c&aacute;c phụ kiện như v&ograve;ng đeo cổ khiến c&aacute;c bạn g&aacute;i v&ocirc; c&ugrave;ng nữ t&iacute;nh v&agrave; duy&ecirc;n d&aacute;ng.</p>\r\n\r\n<p>Sự kết hợp giữa chiếc &aacute;o hiện đại c&ugrave;ng với ch&acirc;n v&aacute;y &ocirc;m thể hiện sự trẻ trung, chiếc &aacute;o được thiết kế một c&aacute;ch đơn giản nhưng lạ mắt, mang đến sự độc đ&aacute;o trong phong c&aacute;ch ăn mặc của c&aacute;c bạn nữ c&ocirc;ng sở.</p>\r\n\r\n<p>Kh&ocirc;ng cầu kỳ trong từng đường n&eacute;t, kiểu &aacute;o, nhưng việc h&agrave;i h&ograve;a giữa m&agrave;u &aacute;o với đường viền cổ v&agrave; tay &aacute;o tạo n&ecirc;n sự uyển chuyển, với gam m&agrave;u tươi s&aacute;ng, chiếc &aacute;o n&agrave;y ph&ugrave; hợp với những c&ocirc; n&agrave;ng c&oacute; l&agrave;n da trắng, mang đến sự trẻ trung v&agrave; dịu d&agrave;ng hơn.</p>', 1, 2, '2019-04-21 18:55:25', '2019-04-21 18:55:25', 'ao-kieu-2.jpg-700x968.jpg|ao-kieu-3.jpg-700x968.jpg|ao-kieu-4.jpg-700x968.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_size`
--

CREATE TABLE `product_size` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(48, 28, 4, '2019-03-10 20:46:54', '2019-03-10 20:46:54'),
(49, 28, 6, '2019-03-10 20:46:54', '2019-03-10 20:46:54'),
(269, 47, 1, '2019-03-24 20:29:29', '2019-03-24 20:29:29'),
(270, 47, 3, '2019-03-24 20:29:29', '2019-03-24 20:29:29'),
(271, 47, 4, '2019-03-24 20:29:29', '2019-03-24 20:29:29'),
(319, 18, 1, '2019-04-16 19:54:34', '2019-04-16 19:54:34'),
(320, 18, 2, '2019-04-16 19:54:34', '2019-04-16 19:54:34'),
(321, 19, 2, '2019-04-16 19:54:43', '2019-04-16 19:54:43'),
(322, 19, 4, '2019-04-16 19:54:43', '2019-04-16 19:54:43'),
(323, 20, 1, '2019-04-16 19:54:50', '2019-04-16 19:54:50'),
(324, 20, 5, '2019-04-16 19:54:50', '2019-04-16 19:54:50'),
(325, 23, 2, '2019-04-16 19:54:58', '2019-04-16 19:54:58'),
(326, 23, 3, '2019-04-16 19:54:58', '2019-04-16 19:54:58'),
(327, 23, 6, '2019-04-16 19:54:58', '2019-04-16 19:54:58'),
(328, 26, 2, '2019-04-16 19:55:06', '2019-04-16 19:55:06'),
(329, 26, 3, '2019-04-16 19:55:06', '2019-04-16 19:55:06'),
(330, 26, 4, '2019-04-16 19:55:06', '2019-04-16 19:55:06'),
(331, 31, 1, '2019-04-16 19:55:15', '2019-04-16 19:55:15'),
(332, 31, 2, '2019-04-16 19:55:15', '2019-04-16 19:55:15'),
(333, 31, 5, '2019-04-16 19:55:15', '2019-04-16 19:55:15'),
(334, 35, 1, '2019-04-16 19:55:23', '2019-04-16 19:55:23'),
(335, 35, 2, '2019-04-16 19:55:23', '2019-04-16 19:55:23'),
(336, 35, 3, '2019-04-16 19:55:23', '2019-04-16 19:55:23'),
(337, 36, 3, '2019-04-16 19:55:31', '2019-04-16 19:55:31'),
(338, 36, 1, '2019-04-16 19:55:31', '2019-04-16 19:55:31'),
(339, 36, 2, '2019-04-16 19:55:31', '2019-04-16 19:55:31'),
(340, 41, 1, '2019-04-16 19:55:38', '2019-04-16 19:55:38'),
(341, 41, 3, '2019-04-16 19:55:38', '2019-04-16 19:55:38'),
(342, 41, 4, '2019-04-16 19:55:38', '2019-04-16 19:55:38'),
(343, 43, 1, '2019-04-16 19:55:46', '2019-04-16 19:55:46'),
(344, 43, 2, '2019-04-16 19:55:46', '2019-04-16 19:55:46'),
(345, 44, 1, '2019-04-16 19:55:55', '2019-04-16 19:55:55'),
(346, 44, 3, '2019-04-16 19:55:55', '2019-04-16 19:55:55'),
(347, 46, 1, '2019-04-16 19:58:14', '2019-04-16 19:58:14'),
(348, 46, 3, '2019-04-16 19:58:14', '2019-04-16 19:58:14'),
(349, 49, 1, '2019-04-16 19:58:23', '2019-04-16 19:58:23'),
(350, 49, 4, '2019-04-16 19:58:23', '2019-04-16 19:58:23'),
(351, 49, 5, '2019-04-16 19:58:23', '2019-04-16 19:58:23'),
(352, 45, 1, '2019-04-16 19:58:34', '2019-04-16 19:58:34'),
(353, 45, 2, '2019-04-16 19:58:34', '2019-04-16 19:58:34'),
(354, 50, 1, '2019-04-21 18:55:25', '2019-04-21 18:55:25'),
(355, 50, 2, '2019-04-21 18:55:25', '2019-04-21 18:55:25'),
(356, 50, 3, '2019-04-21 18:55:25', '2019-04-21 18:55:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `value`, `created_at`, `updated_at`) VALUES
(1, 'L', NULL, NULL),
(2, 'M', NULL, NULL),
(3, 'X', NULL, NULL),
(4, 'XX', NULL, NULL),
(5, 'XXL', NULL, NULL),
(6, 'MS', NULL, NULL),
(7, 'XXX', NULL, NULL),
(8, 'S', NULL, NULL),
(9, 'XL', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test`
--

CREATE TABLE `test` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'XuanTung', 'xuantung@gmail.com', '$2y$10$BhS4EN4613n07Pa093mNHuYAS3vwCplhahkrSKczM5LQSZX0ueF2C', '098989898', 'Lục yên - Yên Bái', 1, 'z093pEBeYcOYgRcVgD3OtXr0QDk65GN4dDVRH3TrSc6pIR7aM54tWVB3bqm6', '2013-03-04 17:00:00', NULL),
(2, 'HongAnh', 'Honganh@gmail.com', '$2y$10$m15075IAwqC0V8bu2vrcr.prQNqUleRsfwx2H5fV2cs95vDDPGmem', '098989898', 'Hà Nội', 0, '8iv1PoubvuI2cabvn7oMqfDU4tvVczlI61DXBxylwVkGTHJT9KAOkjo38FWK', '2003-03-14 17:00:00', '2019-03-21 01:03:14'),
(5, 'Tùng đẹp zai', 'tung@gmail.com', '$2y$10$hXwd70dyG779LTLsbZohY.IS3mdDl3/zNL/Po4TQZ5TbioZy8vLZG', '22222222223', 'Yên Bái', 0, '4sgVdW8FdbYF0PVvrukzyLj6XIA0ODnaEdlyCNPuBNLEsQeOjQ9xLqGBGZYu', '2019-03-06 10:03:11', '2019-03-19 01:59:54'),
(7, 'Tùng Xuân dz', 'xuantung1997@gmail.com', '$2y$10$v1ddkRArFZtjhkrA2PGd3eiy02PAXEKbfbpiOJKdLqE5DRq3EPEl.', '0123456789', 'Hà nội', 0, 'M15e6FPDvO87AXN890rukHiZkrlNGHPGZS0od4VwGFOp1Wu2t2KVWBSZledv', '2019-03-19 02:03:43', '2019-03-21 01:02:26'),
(8, 'aaaaaa', 'xuantungaaaa@gmail.com', '$2y$10$KknHhpTbD2aCYa7lldWzdO4SI9QiIjCsH.0mlvNQHG0TNGhXjKw6a', '0123456789', 'Yên Bái', 0, NULL, '2019-03-22 18:13:27', '2019-03-22 18:13:27'),
(9, 'Nguyễn T.Hồng Ánh', 'anhem@gmail.com', '$2y$10$pOHXx6Sl.0lS8ptecNrQSuqVqU2mDfcM4r.BsLKP7Pt7gF5WvhvV6', '241432323523', 'Hà Nội', 0, 'xnzDyIPUAcrnurj5p0gn8OGOzhHE0QIMCpqD4IvsZDZm6NWW19rXXdG2wHti', '2019-03-28 18:43:51', '2019-03-28 18:43:51'),
(10, 'Nguyễn T.Hồng Ánh', 'thanthevanpm3@gmail.com', '$2y$10$qofiBtypJdj/LJ7cKYv/uuaczz3cSO6KTJDFAWQR3bGCLkCNO0vsu', '0123456789', 'Hà nội', 0, NULL, '2019-03-28 21:38:41', '2019-03-28 21:38:48'),
(12, 'Tùng Nguyễn', 'babe@gmail.com', '$2y$10$d1DeNuMHowUOa2nY.YR3WOmswCwj7mXuiRW51jj4o0A/PPlEIiMbu', '386138536', 'Cầu Giấy, Hà Nội', 0, 'PRhTitVCWvzrrpNzfpdOhLjUA7YsVVzLrOowR2k7l00N1HwvjVrOXKEVw1wc', '2019-04-07 23:40:33', '2019-04-07 23:40:33');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `color_product`
--
ALTER TABLE `color_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment_product`
--
ALTER TABLE `comment_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_product_com_product_foreign` (`com_product`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_cate_id_foreign` (`cate_id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `color_product`
--
ALTER TABLE `color_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT cho bảng `comment_product`
--
ALTER TABLE `comment_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment_product`
--
ALTER TABLE `comment_product`
  ADD CONSTRAINT `comment_product_com_product_foreign` FOREIGN KEY (`com_product`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
