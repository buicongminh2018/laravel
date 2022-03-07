-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2021 lúc 06:08 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopthietbidientu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_parent_id` int(11) NOT NULL DEFAULT 0,
  `category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_parent_id`, `category_slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Laptop', 0, 'laptop', '2021-10-26 04:06:51', '2021-10-26 06:00:18', NULL),
(2, 'Acer', 1, 'acer', '2021-10-26 04:38:33', '2021-10-26 05:35:17', NULL),
(3, 'ASUS', 1, 'asus', '2021-10-26 04:39:38', '2021-10-26 04:39:38', NULL),
(4, 'Dell', 1, 'dell', '2021-10-26 04:39:57', '2021-10-26 04:39:57', NULL),
(5, 'Điện thoại', 0, 'dien-thoai', '2021-10-29 00:52:58', '2021-10-29 00:52:58', NULL),
(6, 'Samsung', 5, 'samsung', '2021-10-29 00:57:04', '2021-10-29 00:57:04', NULL),
(9, 'OPPO', 5, 'oppo', '2021-11-10 20:39:05', '2021-11-10 20:39:05', NULL),
(10, 'Vivo', 5, 'vivo', '2021-11-18 04:49:01', '2021-11-18 04:49:01', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `comment_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_product_id` int(11) NOT NULL,
  `comment_status` int(10) NOT NULL,
  `comment_prely` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_name`, `comment_value`, `comment_product_id`, `comment_status`, `comment_prely`, `created_at`, `updated_at`) VALUES
(1, 'Bùi Công Minh', 'Sản phẩm đẹp', 13, 1, '789', '2021-10-26 19:22:31', '2021-12-04 06:05:06'),
(2, 'Bùi Công Minh', 'sản phẩm đẹp', 33, 1, '456', '2021-12-03 02:38:45', '2021-12-04 06:05:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_function` int(11) NOT NULL,
  `coupon_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_name`, `coupon_code`, `coupon_function`, `coupon_number`, `created_at`, `updated_at`) VALUES
(1, 'Mã giảm giá cho người mới', 'nguoimoi', 2, 500000, '2021-10-21 18:50:37', '2021-10-21 18:50:37'),
(3, 'Giảm giá 10%', 'GG10', 1, 10, '2021-10-21 18:51:24', '2021-10-21 18:51:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_city` int(11) NOT NULL,
  `customer_province` int(11) NOT NULL,
  `customer_wards` int(11) NOT NULL,
  `customer_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `customer_address`, `created_at`, `updated_at`, `customer_city`, `customer_province`, `customer_wards`, `customer_token`) VALUES
(8, 'Bùi Công Minh', 'buicongminh2018@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0939357747', '456', '2021-12-02 19:14:05', '2021-12-04 06:33:34', 92, 923, 31219, NULL),
(9, 'Bùi Công Minh', 'buicongminh20181@gmail.com', '202cb962ac59075b964b07152d234b70', '0939357747', '20', '2021-12-04 06:31:28', '2021-12-04 06:31:28', 92, 916, 31120, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_09_23_142457_add_column_phone_to_table_users', 1),
(4, '2021_09_24_011840_create_categories_table', 1),
(5, '2021_09_24_040558_add_col_deleteat_to_table_category', 1),
(6, '2021_09_24_093635_create_products_table', 1),
(7, '2021_09_24_113444_create_product_images_table', 1),
(8, '2021_09_25_031752_add_col_deleteat_to_table_product', 1),
(9, '2021_10_02_120747_create_customers_table', 2),
(10, '2021_10_03_032532_create_shippings_table', 3),
(11, '2021_10_03_091807_create_payments_table', 4),
(12, '2021_10_03_091852_create_orders_table', 4),
(13, '2021_10_03_092029_create_order_details_table', 4),
(14, '2021_10_03_111046_add_colum_payment_status_to_tabke_payments', 5),
(15, '2021_10_09_080151_create_coupons_table', 6),
(16, '2021_10_10_033319_create_phi_ships_table', 7),
(17, '2021_10_11_030044_add_collum_province_wards_to_table_shipping', 8),
(18, '2021_10_12_090355_add_collum_oder_coupon_phiship_to_table_order', 9),
(19, '2021_10_12_093729_add_collum_total_product_to_table_order', 10),
(20, '2021_10_12_104535_add_collum_coupon_id_to_table_oder', 11),
(21, '2021_10_12_104654_add_collum_coupon_id_to_table_oder', 12),
(22, '2021_10_12_104919_add_collum_coupon_code_to_table_oder', 13),
(23, '2021_10_13_040613_add_colum_to__table_customer', 14),
(24, '2021_10_14_020842_create_roles_table', 15),
(25, '2021_10_14_020917_create_permissions_table', 15),
(26, '2021_10_14_021402_create_table_role_user', 15),
(27, '2021_10_14_021500_create_table_permission_role', 15),
(28, '2021_10_17_021200_add_col_product_quantity_to_product', 16),
(29, '2021_10_18_021036_create_comments_table', 17),
(30, '2021_10_20_011530_create_sliders_table', 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `order_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_coupon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_phi_ship` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_total_product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_total`, `order_status`, `customer_id`, `shipping_id`, `payment_id`, `created_at`, `updated_at`, `order_coupon`, `order_phi_ship`, `order_total_product`, `coupon_code`) VALUES
(1, '3010000', 1, 8, 1, 1, '2021-12-04 06:47:53', '2021-12-04 06:49:36', '0', '10000', '3000000', '0'),
(2, '6010000', 2, 8, 1, 2, '2021-12-04 06:48:31', '2021-12-04 06:49:51', '0', '10000', '6000000', '0'),
(3, '6010000', 3, 8, 1, 3, '2021-12-04 06:48:48', '2021-12-04 06:50:23', '0', '10000', '6000000', '0'),
(7, '40000', 1, 8, 2, 7, '2021-12-04 17:01:10', '2021-12-04 17:03:28', '0', '20000', '20000', '0'),
(8, '40000', 0, 8, 2, 8, '2021-12-04 17:02:10', '2021-12-04 17:02:10', '0', '20000', '20000', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 33, 'Điện thoại Vivo V15', '3000000', 1, '2021-12-04 06:47:53', '2021-12-04 06:47:53'),
(2, 2, 32, 'Điện thoại Vivo V20', '6000000', 1, '2021-12-04 06:48:31', '2021-12-04 06:48:31'),
(3, 3, 25, 'Điện thoại OPPO A93', '6000000', 1, '2021-12-04 06:48:48', '2021-12-04 06:48:48'),
(4, 4, 27, 'Điện thoại OPPO A54', '4500000', 2, '2021-12-04 06:49:25', '2021-12-04 06:49:25'),
(5, 4, 26, 'Điện thoại OPPO A55', '5000000', 2, '2021-12-04 06:49:25', '2021-12-04 06:49:25'),
(6, 4, 19, 'Laptop ACER Nitro 5 Eagle AN515-57-54MV NH.QENSV.003', '25000000', 2, '2021-12-04 06:49:25', '2021-12-04 06:49:25'),
(7, 5, 33, 'Điện thoại Vivo V15', '3000000', 1, '2021-12-04 06:51:24', '2021-12-04 06:51:24'),
(8, 6, 33, 'Điện thoại Vivo V15', '3000000', 1, '2021-12-04 06:52:13', '2021-12-04 06:52:13'),
(9, 7, 33, 'Điện thoại Vivo V15', '10000', 1, '2021-12-04 17:01:10', '2021-12-04 17:01:10'),
(10, 7, 32, 'Điện thoại Vivo V20', '10000', 1, '2021-12-04 17:01:10', '2021-12-04 17:01:10'),
(11, 8, 33, 'Điện thoại Vivo V15', '10000', 1, '2021-12-04 17:02:10', '2021-12-04 17:02:10'),
(12, 8, 32, 'Điện thoại Vivo V20', '10000', 1, '2021-12-04 17:02:10', '2021-12-04 17:02:10'),
(13, 9, 33, 'Điện thoại Vivo V15', '10000', 1, '2021-12-04 17:04:04', '2021-12-04 17:04:04'),
(14, 9, 32, 'Điện thoại Vivo V20', '10000', 1, '2021-12-04 17:04:04', '2021-12-04 17:04:04'),
(15, 10, 28, 'Điện thoại OPPO A15s', '4400000', 1, '2021-12-04 17:04:24', '2021-12-04 17:04:24'),
(16, 10, 29, 'Điện thoại Vivo Y21', '4000000', 1, '2021-12-04 17:04:24', '2021-12-04 17:04:24');

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
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_method`, `created_at`, `updated_at`, `payment_status`) VALUES
(1, '2', '2021-12-04 06:47:53', '2021-12-04 06:47:53', 0),
(2, '2', '2021-12-04 06:48:31', '2021-12-04 06:48:31', 0),
(3, '2', '2021-12-04 06:48:48', '2021-12-04 06:48:48', 0),
(4, '2', '2021-12-04 06:49:25', '2021-12-04 06:49:25', 0),
(5, '2', '2021-12-04 06:51:24', '2021-12-04 06:51:24', 0),
(6, '2', '2021-12-04 06:52:13', '2021-12-04 06:52:13', 0),
(7, '1', '2021-12-04 17:01:10', '2021-12-04 17:01:10', 1),
(8, '1', '2021-12-04 17:02:10', '2021-12-04 17:02:10', 1),
(9, '2', '2021-12-04 17:04:04', '2021-12-04 17:04:04', 0),
(10, '2', '2021-12-04 17:04:24', '2021-12-04 17:04:24', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `key_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `parent_id`, `key_code`, `created_at`, `updated_at`) VALUES
(11, 'category', 'category', 0, NULL, '2021-10-14 20:34:47', '2021-10-14 20:34:47'),
(12, 'list', 'list', 11, 'category_list', '2021-10-14 20:34:47', '2021-10-14 20:34:47'),
(13, 'add', 'add', 11, 'category_add', '2021-10-14 20:34:47', '2021-10-14 20:34:47'),
(14, 'edit', 'edit', 11, 'category_edit', '2021-10-14 20:34:47', '2021-10-14 20:34:47'),
(15, 'delete', 'delete', 11, 'category_delete', '2021-10-14 20:34:47', '2021-10-14 20:34:47'),
(21, 'product', 'product', 0, NULL, '2021-10-14 21:34:47', '2021-10-14 21:34:47'),
(22, 'list', 'list', 21, 'product_list', '2021-10-14 21:34:47', '2021-10-14 21:34:47'),
(23, 'add', 'add', 21, 'product_add', '2021-10-14 21:34:47', '2021-10-14 21:34:47'),
(24, 'edit', 'edit', 21, 'product_edit', '2021-10-14 21:34:47', '2021-10-14 21:34:47'),
(25, 'delete', 'delete', 21, 'product_delete', '2021-10-14 21:34:47', '2021-10-14 21:34:47'),
(27, 'coupon', 'coupon', 0, NULL, '2021-10-14 21:36:20', '2021-10-14 21:36:20'),
(28, 'list', 'list', 27, 'coupon_list', '2021-10-14 21:36:21', '2021-10-14 21:36:21'),
(29, 'add', 'add', 27, 'coupon_add', '2021-10-14 21:36:21', '2021-10-14 21:36:21'),
(30, 'edit', 'edit', 27, 'coupon_edit', '2021-10-14 21:36:21', '2021-10-14 21:36:21'),
(31, 'delete', 'delete', 27, 'coupon_delete', '2021-10-14 21:36:21', '2021-10-14 21:36:21'),
(32, 'phi_ship', 'phi_ship', 0, NULL, '2021-10-14 21:41:21', '2021-10-14 21:41:21'),
(33, 'list', 'list', 32, 'phi_ship_list', '2021-10-14 21:41:21', '2021-10-14 21:41:21'),
(34, 'add', 'add', 32, 'phi_ship_add', '2021-10-14 21:41:21', '2021-10-14 21:41:21'),
(35, 'edit', 'edit', 32, 'phi_ship_edit', '2021-10-14 21:41:21', '2021-10-14 21:41:21'),
(36, 'delete', 'delete', 32, 'phi_ship_delete', '2021-10-14 21:41:21', '2021-10-14 21:41:21'),
(37, 'user', 'user', 0, NULL, '2021-10-14 21:43:59', '2021-10-14 21:43:59'),
(38, 'list', 'list', 37, 'user_list', '2021-10-14 21:43:59', '2021-10-14 21:43:59'),
(39, 'add', 'add', 37, 'user_add', '2021-10-14 21:43:59', '2021-10-14 21:43:59'),
(40, 'edit', 'edit', 37, 'user_edit', '2021-10-14 21:43:59', '2021-10-14 21:43:59'),
(41, 'delete', 'delete', 37, 'user_delete', '2021-10-14 21:43:59', '2021-10-14 21:43:59'),
(42, 'role', 'role', 0, NULL, '2021-10-14 21:46:20', '2021-10-14 21:46:20'),
(43, 'list', 'list', 42, 'role_list', '2021-10-14 21:46:20', '2021-10-14 21:46:20'),
(44, 'add', 'add', 42, 'role_add', '2021-10-14 21:46:20', '2021-10-14 21:46:20'),
(45, 'edit', 'edit', 42, 'role_edit', '2021-10-14 21:46:20', '2021-10-14 21:46:20'),
(46, 'delete', 'delete', 42, 'role_delete', '2021-10-14 21:46:20', '2021-10-14 21:46:20'),
(47, 'permission', 'permission', 0, NULL, '2021-10-14 21:47:53', '2021-10-14 21:47:53'),
(48, 'list', 'list', 47, 'permission_list', '2021-10-14 21:47:53', '2021-10-14 21:47:53'),
(49, 'add', 'add', 47, 'permission_add', '2021-10-14 21:47:53', '2021-10-14 21:47:53'),
(50, 'edit', 'edit', 47, 'permission_edit', '2021-10-14 21:47:53', '2021-10-14 21:47:53'),
(51, 'delete', 'delete', 47, 'permission_delete', '2021-10-14 21:47:53', '2021-10-14 21:47:53'),
(52, 'slider', 'slider', 0, NULL, '2021-10-14 22:32:17', '2021-10-14 22:32:17'),
(53, 'list', 'list', 52, 'slider_list', '2021-10-14 22:32:17', '2021-10-14 22:32:17'),
(54, 'add', 'add', 52, 'slider_add', '2021-10-14 22:32:17', '2021-10-14 22:32:17'),
(55, 'edit', 'edit', 52, 'slider_edit', '2021-10-14 22:32:17', '2021-10-14 22:32:17'),
(56, 'delete', 'delete', 52, 'slider_delete', '2021-10-14 22:32:17', '2021-10-14 22:32:17'),
(57, 'comment', 'comment', 0, NULL, '2021-10-19 19:32:15', '2021-10-19 19:32:15'),
(58, 'list', 'list', 57, 'comment_list', '2021-10-19 19:32:16', '2021-10-19 19:32:16'),
(59, 'oder', 'oder', 0, NULL, '2021-10-19 19:36:33', '2021-10-19 19:36:33'),
(60, 'list', 'list', 59, 'oder_list', '2021-10-19 19:36:33', '2021-10-19 19:36:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(87, 48, 8, NULL, NULL),
(108, 43, 8, NULL, NULL),
(109, 44, 8, NULL, NULL),
(110, 45, 8, NULL, NULL),
(111, 46, 8, NULL, NULL),
(151, 49, 8, NULL, NULL),
(152, 50, 8, NULL, NULL),
(153, 51, 8, NULL, NULL),
(154, 12, 8, NULL, NULL),
(155, 22, 8, NULL, NULL),
(156, 28, 8, NULL, NULL),
(157, 33, 8, NULL, NULL),
(158, 38, 8, NULL, NULL),
(159, 53, 8, NULL, NULL),
(160, 58, 8, NULL, NULL),
(161, 60, 8, NULL, NULL),
(162, 13, 8, NULL, NULL),
(163, 14, 8, NULL, NULL),
(164, 15, 8, NULL, NULL),
(165, 23, 8, NULL, NULL),
(166, 24, 8, NULL, NULL),
(167, 25, 8, NULL, NULL),
(168, 29, 8, NULL, NULL),
(169, 30, 8, NULL, NULL),
(170, 31, 8, NULL, NULL),
(171, 34, 8, NULL, NULL),
(172, 35, 8, NULL, NULL),
(173, 36, 8, NULL, NULL),
(174, 39, 8, NULL, NULL),
(175, 40, 8, NULL, NULL),
(176, 41, 8, NULL, NULL),
(177, 54, 8, NULL, NULL),
(178, 55, 8, NULL, NULL),
(179, 56, 8, NULL, NULL),
(180, 12, 11, NULL, NULL),
(181, 13, 11, NULL, NULL),
(182, 14, 11, NULL, NULL),
(183, 15, 11, NULL, NULL),
(184, 22, 11, NULL, NULL),
(185, 23, 11, NULL, NULL),
(186, 24, 11, NULL, NULL),
(187, 25, 11, NULL, NULL),
(188, 28, 11, NULL, NULL),
(189, 29, 11, NULL, NULL),
(190, 30, 11, NULL, NULL),
(191, 31, 11, NULL, NULL),
(192, 33, 11, NULL, NULL),
(193, 34, 11, NULL, NULL),
(194, 35, 11, NULL, NULL),
(195, 36, 11, NULL, NULL),
(196, 38, 11, NULL, NULL),
(197, 39, 11, NULL, NULL),
(198, 40, 11, NULL, NULL),
(199, 41, 11, NULL, NULL),
(200, 43, 11, NULL, NULL),
(201, 44, 11, NULL, NULL),
(202, 45, 11, NULL, NULL),
(203, 46, 11, NULL, NULL),
(204, 48, 11, NULL, NULL),
(205, 49, 11, NULL, NULL),
(206, 50, 11, NULL, NULL),
(207, 51, 11, NULL, NULL),
(208, 53, 11, NULL, NULL),
(209, 54, 11, NULL, NULL),
(210, 55, 11, NULL, NULL),
(211, 56, 11, NULL, NULL),
(212, 58, 11, NULL, NULL),
(213, 60, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phi_ships`
--

CREATE TABLE `phi_ships` (
  `phi_ship_id` bigint(20) UNSIGNED NOT NULL,
  `phi_ship_matp` int(11) NOT NULL,
  `phi_ship_maqh` int(11) NOT NULL,
  `phi_ship_maxa` int(11) NOT NULL,
  `phi_ship` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phi_ships`
--

INSERT INTO `phi_ships` (`phi_ship_id`, `phi_ship_matp`, `phi_ship_maqh`, `phi_ship_maxa`, `phi_ship`, `created_at`, `updated_at`) VALUES
(7, 92, 916, 31117, '30000', '2021-10-17 05:22:13', '2021-11-10 05:47:50'),
(8, 92, 916, 31120, '70000', '2021-10-17 05:22:39', '2021-10-17 05:23:57'),
(9, 93, 931, 31341, '50000', '2021-10-19 09:35:57', '2021-10-19 09:35:57'),
(10, 92, 923, 31216, '80000', '2021-10-19 19:47:18', '2021-11-10 04:35:47'),
(11, 92, 923, 31219, '80000', '2021-11-10 04:36:07', '2021-11-10 04:36:07'),
(12, 93, 930, 31339, '50000', '2021-11-10 04:44:54', '2021-11-10 06:04:38'),
(13, 92, 919, 31186, '30000', '2021-12-04 06:02:51', '2021-12-04 06:03:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_feature_image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_feature_image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_parent_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_feature_image_path`, `product_feature_image_name`, `product_content`, `user_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`, `product_quantity`, `category_parent_id`) VALUES
(1, 'Laptop ASUS ZenBook Duo UX481FL-BM048T', 30000000, '/storage/product//joZRwfZQ1hSsqHiSmxFP.jpg', 'asus.jpg', '<p>- CPU: Intel Core i5-10210U&nbsp;<br />\r\n- M&agrave;n h&igrave;nh: 14&quot; (1920 x 1080)<br />\r\n- RAM: 8GB Onboard LPDDR3 2133MHz&nbsp;<br />\r\n- Đồ họa: NVIDIA GeForce MX250 2GB GDDR5 / Intel UHD Graphics<br />\r\n- Lưu trữ: 512GB SSD M.2 NVMe /&nbsp;<br />\r\n- Hệ điều h&agrave;nh: Windows 10 Home SL 64-bit<br />\r\n- Pin: 4 cell 70 Wh Pin liền<br />\r\n- Khối lượng: 1.6 kg</p>', 1, 1, '2021-10-26 04:54:07', '2021-11-10 07:24:35', NULL, '50', 1),
(2, 'Laptop ASUS ROG Strix SCAR II GL504GM-ES312T', 35000000, '/storage/product//TgDbdhkdMVmvudYNT4d7.jpg', '1.jpg', '<p>- CPU: Intel Core i7-8750H ( 2.2 GHz - 4.1 GHz / 9MB / 6 nh&acirc;n, 12 lu&ocirc;̀ng )&nbsp;<br />\r\n- M&agrave;n h&igrave;nh: 15.6&quot; IPS ( 1920 x 1080 ) , kh&ocirc;ng cảm ứng&nbsp;<br />\r\n- RAM: 1 x 8GB DDR4 2666MHz&nbsp;<br />\r\n- Đồ họa: Intel UHD Graphics 630 / NVIDIA GeForce GTX 1060 6GB GDDR5&nbsp;<br />\r\n- Lưu trữ: 256GB SSD M.2 NVMe&nbsp;<br />\r\n- Hệ điều h&agrave;nh: Windows 10 Home SL 64-bit&nbsp;<br />\r\n- Pin: 4 cell 66 Wh Pin liền , khối lượng: 2.4 kg</p>', 1, 1, '2021-10-26 04:58:09', '2021-11-10 07:24:45', NULL, '50', 1),
(3, 'Laptop Dell Latitude 3520 70251603', 15000000, '/storage/product//Kr7NHgcbry9tfECpFSdK.jpg', '4.jpg', '<h3><strong>Laptop Dell Latitude 3520 70251603 ( 15.6&quot; HD/Intel Core i3-1115G4/4GB/256GB SSD/Fedora/1.8kg)&nbsp;</strong>được thiết kế ho&agrave;n thiện với vẻ ngo&agrave;i sang trọng, cứng c&aacute;p hơn mang đến cảm gi&aacute;c cao cấp cho d&ograve;ng m&aacute;y tầm trung n&agrave;y. Với hệ điều h&agrave;nh Fedora được cập nhật li&ecirc;n tục v&agrave; c&aacute;c t&iacute;nh năng quản l&yacute; n&acirc;ng cao sẽ cho người d&ugrave;ng những trải nghiệm tuyệt vời nhất.</h3>\r\n\r\n<h4><strong>Thiết kế tinh giản sang trọng, m&agrave;n h&igrave;nh cho g&oacute;c nh&igrave;n rộng hơn</strong></h4>\r\n\r\n<p>Được n&acirc;ng cấp hơn so với c&aacute;c sản phẩm tiền nhiệm Laptop Dell Latitude 3520 70251603 được thiết kế nhỏ gọn với k&iacute;ch thước 36.1 x 24.1 x 1.81 cm, trọng lượng chỉ 1.8kg. Với vẻ ngo&agrave;i sang trọng, v&agrave; lớp vỏ cứng c&aacute;p, viền mỏng c&ugrave;ng c&aacute;c cạnh được đ&aacute;nh b&oacute;ng đem lại cảm gi&aacute;c sang trọng cho người d&ugrave;ng.</p>', 1, 1, '2021-10-26 05:03:43', '2021-10-26 05:03:43', NULL, '50', 1),
(4, 'Laptop Dell Latitude 3420 L3420I3SSD', 13000000, '/storage/product//HoacRYHyNZsZ0LVfPWKn.png', '7.png', '<p>- CPU: Intel Core i3-1115G4&nbsp;<br />\r\n- M&agrave;n h&igrave;nh: 14&quot; TN (1366 x 768)<br />\r\n- RAM: 1 x 8GB DDR4 3200MHz&nbsp;<br />\r\n- Đồ họa: Intel UHD Graphics<br />\r\n- Lưu trữ: 256GB SSD M.2 NVMe /&nbsp;<br />\r\n- Hệ điều h&agrave;nh: Fedora<br />\r\n- Pin: 3 cell Pin liền<br />\r\n- Khối lượng: 1.5 kg</p>', 1, 1, '2021-10-26 05:06:12', '2021-10-26 05:06:12', NULL, '50', 1),
(5, 'Laptop Dell Inspiron 5310 N3I3116W', 16000000, '/storage/product//EZlmOooaQXckH8pFeO2K.jpg', '9.jpg', '<p>- CPU: Intel Core i3-1125G4&nbsp;<br />\r\n- M&agrave;n h&igrave;nh: 13.3&quot; WVA (1920 x 1200)<br />\r\n- RAM: 8GB Onboard LPDDR4X 4267MHz&nbsp;<br />\r\n- Đồ họa: Intel UHD Graphics<br />\r\n- Lưu trữ: 256GB SSD M.2 NVMe /&nbsp;<br />\r\n- Hệ điều h&agrave;nh: Windows 10 Home SL 64-bit<br />\r\n- Pin: 4 cell 54 Wh Pin liền<br />\r\n- Khối lượng: 1.2 kg</p>', 1, 1, '2021-10-26 05:09:01', '2021-10-26 05:09:01', NULL, '50', 1),
(6, 'Laptop Asus S530UN-BQ263T (i5-8250U) (Đen viền Trắng)', 11000000, '/storage/product//mn0c8L5FntuwZFNRffJQ.jpg', '13.jpg', '<p>&nbsp;H&agrave;ng chưa qua bảo h&agrave;nh<br />\r\n- Sản phẩm c&oacute; trầy xước<br />\r\n- Đầy đủ phụ kiện<br />\r\n- SN:***J7N0CX16K734314<br />\r\n- Hết bảo h&agrave;nh<br />\r\n- Sản phẩm đang c&oacute; tại: Showroom Phong Vũ Xu&acirc;n Thủy, Cầu Giấy<br />\r\n<strong>***Sản phẩm kh&ocirc;ng &aacute;p dụng ch&iacute;nh s&aacute;ch đổi trả</strong></p>', 1, 3, '2021-10-26 05:12:28', '2021-10-26 05:12:28', NULL, '50', 1),
(7, 'Laptop ASUS M513UA-L1240T 90NB0TP2-M03450', 22000000, '/storage/product//jCpoPZ6NpCcrJBL9mGwu.jpg', '16.jpg', '<p>- CPU: AMD Ryzen 7 5700U&nbsp;<br />\r\n- M&agrave;n h&igrave;nh: 15.6&quot; OLED (1920 x 1080)<br />\r\n- RAM: 1 x 4GB, 1 x 4GB Onboard DDR4&nbsp;<br />\r\n- Đồ họa: AMD Radeon Graphics<br />\r\n- Lưu trữ: 512GB SSD M.2 NVMe /&nbsp;<br />\r\n- Hệ điều h&agrave;nh: Windows 10 Home 64-bit<br />\r\n- Pin: 3 cell 42 Wh<br />\r\n- Khối lượng: 1.8 kg</p>', 1, 3, '2021-10-26 05:14:59', '2021-10-26 05:14:59', NULL, '50', 1),
(8, 'Laptop ASUS UX325EA-KG363T', 25000000, '/storage/product//yO9xvWKJSho2RC3JTgVN.png', '18.png', '<h3>aptop ASUS UX325EA-KG363T l&agrave; d&ograve;ng m&aacute;y t&iacute;nh x&aacute;ch tay của Asus nằm trong ph&acirc;n kh&uacute;c laptop c&oacute; thiết kế mỏng nhẹ v&agrave; cao cấp. C&ugrave;ng chip i5 mạnh mẽ, Ram 8GB v&agrave; ổ cứng chuẩn SSD với dung lượng 512GB. Đ&aacute;p ứng nhu cầu học tập, l&agrave;m việc v&agrave; giải tr&iacute; nhanh gọn v&agrave; ch&iacute;nh x&aacute;c của c&aacute;c bạn học sinh, sinh vi&ecirc;n cũng như giới văn ph&ograve;ng.</h3>\r\n\r\n<h4><strong>Thiết kế tinh tế, m&agrave;n h&igrave;nh OLED 13.3 inch Full HD</strong></h4>\r\n\r\n<p>Laptop Asus UX325EA-KG363T với lớp vỏ kim loại nguy&ecirc;n khối cứng c&aacute;p v&agrave; bền bỉ, gam m&agrave;u x&aacute;m bạc hiện đại c&ugrave;ng với những đường cắt tỉ mỉ tr&ecirc;n nắp m&aacute;y tạo sự ri&ecirc;ng biệt cho laptop.</p>\r\n\r\n<p>Với trọng lượng nhẹ chỉ 1.1kg c&ugrave;ng k&iacute;ch thước mỏng 30.42 x 20.3 x 1.39 cm, chỉ chiếm diện t&iacute;ch nhỏ trong balo n&ecirc;n laptop sẽ trở th&agrave;nh người bạn đồng h&agrave;nh l&yacute; tưởng cho người d&ugrave;ng mọi l&uacute;c mọi nơi, đ&aacute;p ứng tốt nhu cầu sử dụng.</p>', 1, 3, '2021-10-26 05:16:48', '2021-10-26 05:16:48', NULL, '50', 1),
(9, 'Laptop ASUS TUF Gaming FX506HCB-HN139T 90NR0723-M04140', 26000000, '/storage/product//LRoQvnHRCzcAS8Hb7y00.png', '20.png', '<p>- CPU: Intel Core i5-11400H&nbsp;<br />\r\n- M&agrave;n h&igrave;nh: 15.6&quot; IPS (1920 x 1080), 144Hz<br />\r\n- RAM: 1 x 8GB DDR4 3200MHz&nbsp;<br />\r\n- Đồ họa: NVIDIA GeForce RTX 3050 4GB GDDR6 / Intel UHD Graphics<br />\r\n- Lưu trữ: 512GB SSD M.2 NVMe /&nbsp;<br />\r\n- Hệ điều h&agrave;nh: Windows 10 Home 64-bit<br />\r\n- Pin: 3 cell 48 Wh Pin liền<br />\r\n- Khối lượng: 2.3 kg</p>', 1, 3, '2021-10-26 05:19:48', '2021-10-26 05:19:48', NULL, '50', 1),
(10, 'Laptop ASUS Zenbook UX363EA- HP130T', 28000000, '/storage/product//OA9ZSGbCbfqvHNRtenkH.jpg', '23.jpg', '<p>- CPU: Intel Core i5-1135G7&nbsp;<br />\r\n- M&agrave;n h&igrave;nh: 13.3&quot; OLED (1920 x 1080)<br />\r\n- RAM: 1 x 8GB LPDDR4X 4266MHz&nbsp;<br />\r\n- Đồ họa: Intel Iris Xe Graphics<br />\r\n- Lưu trữ: 512GB SSD M.2 NVMe /&nbsp;<br />\r\n- Hệ điều h&agrave;nh: Windows 10 Home 64-bit<br />\r\n- Pin: 4 cell 67 Wh Pin liền<br />\r\n- Khối lượng: 1.3 kg<br />\r\n- ChuẩnIntel EVO</p>', 1, 3, '2021-10-26 05:22:19', '2021-10-26 05:22:19', NULL, '50', 1),
(11, 'Laptop Dell Latitude 3420 L3420I5SSD', 18000000, '/storage/product//lTTEq8Rup2VQbO1teeuI.jpg', '26.jpg', '<p>- CPU: Intel Core i5-1135G7&nbsp;<br />\r\n- M&agrave;n h&igrave;nh: 14&quot; TN (1366 x 768)<br />\r\n- RAM: 1 x 8GB DDR4 3200MHz&nbsp;<br />\r\n- Đồ họa: Intel Iris Xe Graphics<br />\r\n- Lưu trữ: 256GB SSD M.2 NVMe /&nbsp;<br />\r\n- Hệ điều h&agrave;nh: Fedora<br />\r\n- Pin: 3 cell 41 Wh Pin liền<br />\r\n- Khối lượng: 1.5 kg</p>', 1, 4, '2021-10-26 05:26:02', '2021-10-26 05:26:02', NULL, '50', 1),
(12, 'Laptop Dell G3 15 3590-N5I5517W', 20000000, '/storage/product//rCI8oeNKZ3min3QsdMi0.jpg', '30.jpg', '<p>- CPU: Intel Core i5 9300H&nbsp;<br />\r\n- M&agrave;n h&igrave;nh: 15.6&quot; SVA (1920 x 1080)<br />\r\n- RAM: 2 x 4GB DDR4 2666MHz&nbsp;<br />\r\n- Đồ họa: NVIDIA GeForce GTX 1050 3GB GDDR5 / Intel UHD Graphics 630<br />\r\n- Lưu trữ: 256GB SSD M.2 NVMe /&nbsp;<br />\r\n- Hệ điều h&agrave;nh: Windows 10 Home SL 64-bit<br />\r\n- Pin: 3 cell 51 Wh<br />\r\n- Khối lượng: 2.3 kg</p>', 1, 4, '2021-10-26 05:28:33', '2021-10-26 05:28:33', NULL, '50', 1),
(13, 'Laptop Dell Inspiron 15 5510 5510-0WT8R1', 16000000, '/storage/product//VuWfkJT6yO5oMvqGYmRd.jpg', '34.jpg', '<p>- CPU: Intel Core i5-11300H&nbsp;<br />\r\n- M&agrave;n h&igrave;nh: 15.6&quot; (1920 x 1080)<br />\r\n- RAM: 2 x 4GB DDR4 3200MHz&nbsp;<br />\r\n- Đồ họa: Intel Iris Xe Graphics<br />\r\n- Lưu trữ: 256GB SSD M.2 NVMe /&nbsp;<br />\r\n- Hệ điều h&agrave;nh: Windows 10 Home SL 64-bit + Office<br />\r\n- Pin: 4 cell 54 Wh Pin liền<br />\r\n- Khối lượng: 1.6 kg</p>', 1, 4, '2021-10-26 05:30:51', '2021-10-26 05:30:51', NULL, '50', 1),
(14, 'Laptop Dell Alienware M15 R6', 25000000, '/storage/product//8uQ1wPVLjC5gb1As9hYa.jpg', '37.jpg', '<p>- CPU: Intel Core i7-11800H&nbsp;<br />\r\n- M&agrave;n h&igrave;nh: 15.6&quot; WVA (1920 x 1080)<br />\r\n- RAM: 2 x 16GB DDR4 3200MHz&nbsp;<br />\r\n- Đồ họa: NVIDIA GeForce RTX 3060 6GB GDDR6 / Intel UHD Graphics<br />\r\n- Lưu trữ: 1TB SSD M.2 NVMe /&nbsp;<br />\r\n- Hệ điều h&agrave;nh: Windows 10 Home 64-bit<br />\r\n- Pin: 6 cell 86 Wh Pin liền<br />\r\n- Khối lượng: 2.7 kg</p>', 1, 4, '2021-10-26 05:33:36', '2021-11-10 07:21:37', NULL, '50', 1),
(15, 'Laptop ACER Aspire 3 A315-34-C38Y', 7000000, '/storage/product//lDFS7xxDgJJJmg0RpWPJ.jpg', '40.jpg', '<p>- CPU: Intel Celeron N4020 &nbsp;</p>\r\n\r\n<p>- M&agrave;n h&igrave;nh: 15.6&quot; (1280 x 720) &nbsp; &nbsp;</p>\r\n\r\n<p>- RAM: 1 x 4GB Onboard DDR4 2666 (1 khe cắm / tối đa 8GB) &nbsp;</p>\r\n\r\n<p>- Đồ họa: Intel UHD Graphics 600</p>\r\n\r\n<p>- Lưu trữ: 256GB M.2 NVMe &nbsp;</p>\r\n\r\n<p>- Hệ điều h&agrave;nh: Windows 10 Home 64-bit &nbsp;</p>\r\n\r\n<p>- Pin: 2 cell 37Wh &nbsp;</p>\r\n\r\n<p>- Khối lượng: 1.7 kg&nbsp;</p>', 1, 2, '2021-10-26 05:38:02', '2021-10-26 05:38:02', NULL, '50', 1),
(16, 'Laptop Acer Aspire 3 A315-56-37DV', 11000000, '/storage/product//gWJBCqRlELKzL7tozHj9.jpg', '44.jpg', '<p>- CPU: Intel Core i3-1005G1&nbsp;<br />\r\n- M&agrave;n h&igrave;nh: 15.6&quot; (1920 x 1080)<br />\r\n- RAM: 1 x 4GB Onboard DDR4 2400MHz&nbsp;<br />\r\n- Đồ họa: Intel UHD Graphics<br />\r\n- Lưu trữ: 256GB SSD M.2 NVMe /&nbsp;<br />\r\n- Hệ điều h&agrave;nh: Windows 10 Home 64-bit<br />\r\n- Pin: 2 cell 37 Wh Pin liền<br />\r\n- Khối lượng: 1.7 kg</p>', 1, 2, '2021-10-26 05:39:56', '2021-10-26 05:39:56', NULL, '50', 1),
(17, 'Laptop Acer Aspire 5 A514-53-3821', 10000000, '/storage/product//jhL4aDeD6LgaHDBhVJ4z.jpg', '47.jpg', '<p>- CPU: Intel Core i3-1005G1&nbsp;<br />\r\n- M&agrave;n h&igrave;nh: 14&quot; IPS (1920 x 1080)<br />\r\n- RAM: 1 x 4GB Onboard DDR4 2133MHz&nbsp;<br />\r\n- Đồ họa: Intel UHD Graphics<br />\r\n- Lưu trữ: 256GB SSD M.2 NVMe /&nbsp;<br />\r\n- Hệ điều h&agrave;nh: Windows 10 Home 64-bit<br />\r\n- Pin: 3 cell 48 Wh Pin liền<br />\r\n- Khối lượng: 1.5 kg</p>', 1, 2, '2021-10-26 05:41:43', '2021-11-10 07:21:49', NULL, '50', 1),
(18, 'Laptop Acer Aspire 5 A515-53G-5788', 10000000, '/storage/product//Yb485xC1Dr2Pa7iRJwsi.jpg', '50.jpg', '<p>- CPU: Intel Core i5-8265U ( 1.6 GHz - 3.9 GHz / 6MB / 4 nh&acirc;n, 8 lu&ocirc;̀ng )&nbsp;<br />\r\n- M&agrave;n h&igrave;nh: 15.6&quot; ( 1920 x 1080 ) , kh&ocirc;ng cảm ứng&nbsp;<br />\r\n- RAM: 1 x 4GB Onboard DDR4&nbsp;<br />\r\n- Đồ họa: Intel UHD Graphics 620 / NVIDIA GeForce MX130 2GB GDDR5&nbsp;<br />\r\n- Lưu trữ: 1TB HDD 5400RPM&nbsp;<br />\r\n- Hệ điều h&agrave;nh: Free DOS&nbsp;<br />\r\n- Pin: 3 cell 61 Wh Pin liền , khối lượng: 2.1 kg</p>', 1, 2, '2021-10-26 05:44:14', '2021-11-10 07:21:49', NULL, '50', 1),
(19, 'Laptop ACER Nitro 5 Eagle AN515-57-54MV NH.QENSV.003', 25000000, '/storage/product//X8NsXnZuxdjODWmEY3ei.jpg', '53.jpg', '<p>- CPU: Intel Core i5-11400H&nbsp;<br />\r\n- M&agrave;n h&igrave;nh: 15.6&quot; IPS (1920 x 1080), 144Hz<br />\r\n- RAM: 1 x 8GB DDR4 3200MHz&nbsp;<br />\r\n- Đồ họa: NVIDIA GeForce RTX 3050 4GB GDDR6 / Intel UHD Graphics<br />\r\n- Lưu trữ: 512GB SSD M.2 NVMe /&nbsp;<br />\r\n- Hệ điều h&agrave;nh: Windows 11<br />\r\n- Pin: 4 cell 57 Wh Pin liền<br />\r\n- Khối lượng: 2.2 kg</p>', 1, 1, '2021-10-26 05:46:17', '2021-12-04 06:15:24', NULL, '50', 1),
(20, 'Điện thoại Samsung Galaxy A12 6GB', 4500000, '/storage/product//TwdGgDi3ARkUAZ0nQ2fl.jpg', '80.jpg', '<p>Samsung Galaxy A12 l&agrave; mẫu smartphone hướng đến đối tượng giới trẻ với những m&agrave;u sắc trẻ trung năng động, đại diện cho những c&aacute; t&iacute;nh ri&ecirc;ng của giới trẻ hiện đại.</p>', 1, 6, '2021-11-10 20:28:55', '2021-11-10 20:28:55', NULL, '50', 5),
(21, 'Điện thoại Samsung Galaxy A32', 5000000, '/storage/product//HOuyjj1MPZoIf86srHaD.jpg', '83.jpg', '<p>Samsung Galaxy A32 4G c&oacute; mặt lưng nhựa cao cấp với thiết kế đơn giản, trang nh&atilde;, kh&ocirc;ng chỉ gi&uacute;p bảo vệ m&aacute;y m&agrave; c&ograve;n tăng độ b&oacute;ng bẩy cho smartphone, mang đến vẻ ngo&agrave;i đẳng cấp cho người sở hữu.</p>', 1, 6, '2021-11-10 20:31:01', '2021-11-10 20:31:01', NULL, '50', 5),
(22, 'Điện thoại Samsung Galaxy A22', 4700000, '/storage/product//dx5fJiZxCydvaPgoFvlY.jpg', '86.jpg', '<p>Sở hữu m&agrave;n h&igrave;nh&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-super-amoled-la-gi-905770\" target=\"_blank\" title=\"Màn hình Super AMOLED là gì?\">Super AMOLED</a>&nbsp;rộng 6.4 inch, Samsung Galaxy A22 lu&ocirc;n thu h&uacute;t sự quan t&acirc;m của bất kỳ người ti&ecirc;u d&ugrave;ng n&agrave;o đang t&igrave;m kiếm ti&ecirc;u ch&iacute; n&agrave;y. K&iacute;ch thước m&agrave;n h&igrave;nh lớn l&agrave; một ưu điểm để bạn trải nghiệm nh&igrave;n ngắm mọi thứ thoải m&aacute;i hơn trong giải tr&iacute; cũng như c&aacute;c thao t&aacute;c hằng ng&agrave;y.&nbsp;</p>', 1, 6, '2021-11-10 20:33:10', '2021-11-10 20:33:10', NULL, '50', 5),
(23, 'Điện thoại Samsung Galaxy A31', 4600000, '/storage/product//qLlkZnQJJaNFWWBM2p2a.jpg', '89.jpg', '<p>Điện thoại Samsung Galaxy A31</p>', 1, 6, '2021-11-10 20:35:55', '2021-11-10 20:35:55', NULL, '50', 5),
(24, 'Điện thoại OPPO A74', 4000000, '/storage/product//VWaMBNrBSR9RJoMPjO4r.jpg', '94.jpg', '<p>Điện thoại OPPO A74</p>', 1, 9, '2021-11-10 20:42:47', '2021-11-10 20:42:47', NULL, '50', 5),
(25, 'Điện thoại OPPO A93', 6000000, '/storage/product//jIxjxojusnaN4r2gvX1T.jpg', '1.jpg', '<p>Điện thoại OPPO A93</p>', 1, 9, '2021-11-10 20:44:39', '2021-12-04 06:50:24', NULL, '50', 5),
(26, 'Điện thoại OPPO A55', 5000000, '/storage/product//nnBJOHbJFXbLCCbl1nFO.jpg', '4.jpg', '<p>Điện thoại OPPO A55</p>', 1, 9, '2021-11-10 20:46:06', '2021-11-10 20:46:06', NULL, '50', 5),
(27, 'Điện thoại OPPO A54', 4500000, '/storage/product//waPjmeQQmMhuUkmsu85A.jpg', '7.jpg', '<p>Điện thoại OPPO A54</p>', 1, 9, '2021-11-10 20:48:36', '2021-11-10 20:48:36', NULL, '50', 5),
(28, 'Điện thoại OPPO A15s', 4400000, '/storage/product//vgKaB3sR2BHpLyue4kM2.jpg', '10.jpg', '<p>Điện thoại OPPO A15s</p>', 1, 9, '2021-11-10 20:50:11', '2021-11-10 20:53:19', NULL, '50', 5),
(29, 'Điện thoại Vivo Y21', 4000000, '/storage/product//SqvkrixhNJeDSRQjef9K.jpg', '100.jpg', '<p>Điện thoại Vivo Y21</p>', 1, 10, '2021-11-18 04:51:30', '2021-11-18 04:51:30', NULL, '50', 5),
(30, 'Điện thoại Vivo X70 Pro 5G', 8000000, '/storage/product//dK3ibdCjmjLqNR0PC9BZ.jpg', '103.jpg', '<p>Điện thoại Vivo X70 Pro 5G</p>', 1, 10, '2021-11-18 04:52:57', '2021-11-18 04:52:57', NULL, '50', 5),
(31, 'Điện thoại Vivo Y72 5G', 8000000, '/storage/product//7zwot1PrlO2dEn8uEMYh.jpg', '103.jpg', '<p>Điện thoại Vivo Y72 5G</p>', 1, 10, '2021-11-18 04:54:06', '2021-12-04 05:59:28', NULL, '50', 5),
(32, 'Điện thoại Vivo V20', 6000000, '/storage/product//B51dLEqVPt23gEA19Vv3.jpg', '103.jpg', '<p>Điện thoại Vivo V20</p>', 1, 10, '2021-11-18 04:55:28', '2021-12-04 17:05:52', NULL, '48', 5),
(33, 'Điện thoại Vivo V15', 3000000, '/storage/product//4g3RPaLsWE9aj893kgW8.png', '2 - Copy.png', '<p>Điện thoại Vivo V15</p>', 1, 10, '2021-11-18 04:56:24', '2021-12-04 17:05:33', NULL, '48', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_image_path`, `product_image_name`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '/storage/product//aSEGvNAUHn7zxzvzWySy.jpg', 'asus.jpg', 1, '2021-10-26 04:54:07', '2021-10-26 04:54:07'),
(2, '/storage/product//RItW8AoEbCBfws7NQpzN.jpg', 'asus1.jpg', 1, '2021-10-26 04:54:07', '2021-10-26 04:54:07'),
(3, '/storage/product//spi1vpupHnioDQgX6CgW.jpg', 'asus2.jpg', 1, '2021-10-26 04:54:07', '2021-10-26 04:54:07'),
(4, '/storage/product//S36F6VyZTShYuIx7of8a.jpg', '1.jpg', 2, '2021-10-26 04:58:09', '2021-10-26 04:58:09'),
(5, '/storage/product//iFgdvvD9a8yjGmxQmw7O.jpg', '2.jpg', 2, '2021-10-26 04:58:09', '2021-10-26 04:58:09'),
(6, '/storage/product//h6GXLiTBS2vtFnHZt8CS.jpg', '3.jpg', 2, '2021-10-26 04:58:09', '2021-10-26 04:58:09'),
(7, '/storage/product//ANw8tnZTaHwOf3EHk8zL.jpg', '4.jpg', 3, '2021-10-26 05:03:43', '2021-10-26 05:03:43'),
(8, '/storage/product//yyw3GDioOiwHm7lceLwQ.jpg', '5.jpg', 3, '2021-10-26 05:03:43', '2021-10-26 05:03:43'),
(9, '/storage/product//Ap81WWTwCZlpdYDarwnv.jpg', '6.jpg', 3, '2021-10-26 05:03:43', '2021-10-26 05:03:43'),
(10, '/storage/product//6yeCMgrOaZKr9S7G6roK.png', '7.png', 4, '2021-10-26 05:06:12', '2021-10-26 05:06:12'),
(11, '/storage/product//8ZmBxqIXnZxcF0rtgieB.jpg', '8.jpg', 4, '2021-10-26 05:06:12', '2021-10-26 05:06:12'),
(12, '/storage/product//5gc9oSvhcYNwXOwZVNXq.jpeg', '9.jpeg', 4, '2021-10-26 05:06:12', '2021-10-26 05:06:12'),
(13, '/storage/product//nFUwyNKAf4Nbp1PJ2oR9.jpg', '9.jpg', 5, '2021-10-26 05:09:01', '2021-10-26 05:09:01'),
(14, '/storage/product//fjBWwC84wVYl5ERBnj93.png', '10.png', 5, '2021-10-26 05:09:01', '2021-10-26 05:09:01'),
(15, '/storage/product//34cy7TY1uhbxAbVdphl1.jpg', '11.jpg', 5, '2021-10-26 05:09:01', '2021-10-26 05:09:01'),
(16, '/storage/product//B4WBuZc8OYkjLDFq7SLX.jpg', '13.jpg', 6, '2021-10-26 05:12:28', '2021-10-26 05:12:28'),
(17, '/storage/product//KDsIxWKVcRDSPDgRjHkP.jpg', '14.jpg', 6, '2021-10-26 05:12:28', '2021-10-26 05:12:28'),
(18, '/storage/product//1PbXQIOc484BVQV8S5HZ.jpg', '15.jpg', 6, '2021-10-26 05:12:28', '2021-10-26 05:12:28'),
(19, '/storage/product//8ZlxqRYrpdZe6yotNrpy.jpg', '16.jpg', 7, '2021-10-26 05:14:59', '2021-10-26 05:14:59'),
(20, '/storage/product//JUyxsLwKW0jj6zqNSnej.jpeg', '17.jpeg', 7, '2021-10-26 05:14:59', '2021-10-26 05:14:59'),
(21, '/storage/product//hNehfwENynytwIb0OGCf.png', '18.png', 7, '2021-10-26 05:14:59', '2021-10-26 05:14:59'),
(22, '/storage/product//n5eZE5baxr9JWnBV9be1.png', '18.png', 8, '2021-10-26 05:16:48', '2021-10-26 05:16:48'),
(23, '/storage/product//3EuCzP8LY18uduKdp0hE.jpg', '19.jpg', 8, '2021-10-26 05:16:48', '2021-10-26 05:16:48'),
(24, '/storage/product//i3ev71bAIO3S2zSqoeee.jpg', '20.jpg', 8, '2021-10-26 05:16:48', '2021-10-26 05:16:48'),
(25, '/storage/product//0S4PXI6fAyhGznSxadJp.png', '19.png', 9, '2021-10-26 05:19:48', '2021-10-26 05:19:48'),
(26, '/storage/product//HhvtSdD6JDDskSCVAdTJ.png', '20.png', 9, '2021-10-26 05:19:48', '2021-10-26 05:19:48'),
(27, '/storage/product//WgWEA8URR4NRd3o9nFV0.png', '22.png', 9, '2021-10-26 05:19:48', '2021-10-26 05:19:48'),
(28, '/storage/product//mQpbGv07ZTyS1ToLL1sm.jpg', '23.jpg', 10, '2021-10-26 05:22:19', '2021-10-26 05:22:19'),
(29, '/storage/product//r6TStBhbS5LDtyJhMfOI.jpg', '24.jpg', 10, '2021-10-26 05:22:19', '2021-10-26 05:22:19'),
(30, '/storage/product//w9z3B1QmfXryomK9KNY8.png', '25.png', 10, '2021-10-26 05:22:19', '2021-10-26 05:22:19'),
(31, '/storage/product//15hfYzFGQXHLCKCvkdkL.jpg', '26.jpg', 11, '2021-10-26 05:26:02', '2021-10-26 05:26:02'),
(32, '/storage/product//kxwVEdwM4ctrhRKAj5Z3.jpg', '27.jpg', 11, '2021-10-26 05:26:02', '2021-10-26 05:26:02'),
(33, '/storage/product//pWrVC0FjxncgN4236KEW.jpg', '28.jpg', 11, '2021-10-26 05:26:02', '2021-10-26 05:26:02'),
(34, '/storage/product//3ZA1rkNRYR8PTTdhtVFA.jpg', '30.jpg', 12, '2021-10-26 05:28:33', '2021-10-26 05:28:33'),
(35, '/storage/product//HOMbEJkF86gqmQ9150H4.JPG', '31.JPG', 12, '2021-10-26 05:28:33', '2021-10-26 05:28:33'),
(36, '/storage/product//L9Yt8gHCdnCWJl7FUv4b.jpg', '32.jpg', 12, '2021-10-26 05:28:33', '2021-10-26 05:28:33'),
(37, '/storage/product//uZ71tJ8xgZTSSwEH8QWu.jpg', '34.jpg', 13, '2021-10-26 05:30:51', '2021-10-26 05:30:51'),
(38, '/storage/product//8ixz4d86n7e494QOiOcr.jpg', '35.jpg', 13, '2021-10-26 05:30:51', '2021-10-26 05:30:51'),
(39, '/storage/product//uFhBODcq9zF02IsFZegj.jpg', '36.jpg', 13, '2021-10-26 05:30:51', '2021-10-26 05:30:51'),
(40, '/storage/product//eNvGP6rhOMjnCe0BJkgE.jpg', '37.jpg', 14, '2021-10-26 05:33:36', '2021-10-26 05:33:36'),
(41, '/storage/product//10cfCuW4k0khRuNTfvbX.jpg', '39.jpg', 14, '2021-10-26 05:33:36', '2021-10-26 05:33:36'),
(42, '/storage/product//4Hiefw8prea1J6qvefSi.jpg', '60932_71muxht_pws__ac_sl1500_.jpg', 14, '2021-10-26 05:33:36', '2021-10-26 05:33:36'),
(43, '/storage/product//99vgGTDlERmsEf2cAmPS.jpg', '40.jpg', 15, '2021-10-26 05:38:02', '2021-10-26 05:38:02'),
(44, '/storage/product//nPBHqWNLL0UFbl3DNfTK.jpg', '41.jpg', 15, '2021-10-26 05:38:02', '2021-10-26 05:38:02'),
(45, '/storage/product//JeUkrMqDAWxxj73e35Ji.png', '42.png', 15, '2021-10-26 05:38:02', '2021-10-26 05:38:02'),
(46, '/storage/product//1RJZQjlapAcCwI4LZnud.jpg', '44.jpg', 16, '2021-10-26 05:39:56', '2021-10-26 05:39:56'),
(47, '/storage/product//391tnhCpZLofOgeuIpOW.jpg', '45.jpg', 16, '2021-10-26 05:39:56', '2021-10-26 05:39:56'),
(48, '/storage/product//jDArjktQPE8CqEcpPl3R.jpg', '46.jpg', 16, '2021-10-26 05:39:56', '2021-10-26 05:39:56'),
(49, '/storage/product//7jyTFpxnWUUUoH63Kn8Q.jpg', '47.jpg', 17, '2021-10-26 05:41:43', '2021-10-26 05:41:43'),
(50, '/storage/product//TNkuMxhqij8O1Au1Yg1y.png', '48.png', 17, '2021-10-26 05:41:43', '2021-10-26 05:41:43'),
(51, '/storage/product//DdJ7fSR0rvjAFWPOB5J0.png', '49.png', 17, '2021-10-26 05:41:43', '2021-10-26 05:41:43'),
(52, '/storage/product//n0ZQmtkO9gTkHeL8sCYc.jpg', '50.jpg', 18, '2021-10-26 05:44:14', '2021-10-26 05:44:14'),
(53, '/storage/product//JVdmpIbS0Z5MdxqthloT.jpg', '51.jpg', 18, '2021-10-26 05:44:14', '2021-10-26 05:44:14'),
(54, '/storage/product//4ZRihYo7KrvPEO2h2T4q.jpg', '52.jpg', 18, '2021-10-26 05:44:14', '2021-10-26 05:44:14'),
(55, '/storage/product//aP8xSZ0H2SPJidUKz1ZK.jpg', '53.jpg', 19, '2021-10-26 05:46:17', '2021-10-26 05:46:17'),
(56, '/storage/product//dGhqMUKk0nYZZZD7j5ZO.jpg', '54.jpg', 19, '2021-10-26 05:46:17', '2021-10-26 05:46:17'),
(57, '/storage/product//MT4ufl6hvyxAeCtl6Cm5.jpg', '55.jpg', 19, '2021-10-26 05:46:17', '2021-10-26 05:46:17'),
(58, '/storage/product//jNXgrT2QWCS8WW4JtGlL.jpg', '80.jpg', 20, '2021-11-10 20:28:55', '2021-11-10 20:28:55'),
(59, '/storage/product//Cx6lcYAIg4uZJMG46jwh.jpg', '81.jpg', 20, '2021-11-10 20:28:55', '2021-11-10 20:28:55'),
(60, '/storage/product//8tveB7juoCihbePoEzsh.jpg', '82.jpg', 20, '2021-11-10 20:28:55', '2021-11-10 20:28:55'),
(61, '/storage/product//O6qgQIBr8QtXdyK0qTIa.jpg', '83.jpg', 21, '2021-11-10 20:31:01', '2021-11-10 20:31:01'),
(62, '/storage/product//Gz93nXQ42iF4rK7FNyV5.jpg', '84.jpg', 21, '2021-11-10 20:31:01', '2021-11-10 20:31:01'),
(63, '/storage/product//jbyMzlf2cx4y8QZqrUkC.jpg', '85.jpg', 21, '2021-11-10 20:31:01', '2021-11-10 20:31:01'),
(64, '/storage/product//LzJeCbUosyX9AhgOyNvv.jpg', '86.jpg', 22, '2021-11-10 20:33:10', '2021-11-10 20:33:10'),
(65, '/storage/product//ZzGJowNmD53VfcAfzoXU.jpg', '87.jpg', 22, '2021-11-10 20:33:10', '2021-11-10 20:33:10'),
(66, '/storage/product//IgGQDfC81BH9YslBzmHN.jpg', '88.jpg', 22, '2021-11-10 20:33:10', '2021-11-10 20:33:10'),
(67, '/storage/product//k7XhmGDslJAgsgb1r0uL.jpg', '89.jpg', 23, '2021-11-10 20:35:55', '2021-11-10 20:35:55'),
(68, '/storage/product//n1fNiCAzzARUpNzq4yaY.jpeg', '90.jpeg', 23, '2021-11-10 20:35:55', '2021-11-10 20:35:55'),
(69, '/storage/product//8XPl2KkHYeJJ8xJb1v1l.jpg', '91.jpg', 23, '2021-11-10 20:35:55', '2021-11-10 20:35:55'),
(70, '/storage/product//9ZpwTK9bSGcKsiBxLEko.jpg', '94.jpg', 24, '2021-11-10 20:42:47', '2021-11-10 20:42:47'),
(71, '/storage/product//3mmJlOQpIxt9QOu7HXb4.jpg', '95.jpg', 24, '2021-11-10 20:42:47', '2021-11-10 20:42:47'),
(72, '/storage/product//DBLKCGib3C1PsZp7X72d.png', '96.png', 24, '2021-11-10 20:42:47', '2021-11-10 20:42:47'),
(73, '/storage/product//YkMklyFJDyYVre5Y7flJ.jpg', '1.jpg', 25, '2021-11-10 20:44:39', '2021-11-10 20:44:39'),
(74, '/storage/product//YwizGekr7NEIOcnZt0Fz.png', '2.png', 25, '2021-11-10 20:44:39', '2021-11-10 20:44:39'),
(75, '/storage/product//0vZfez38FRNU6EzSSlsw.jpeg', '3.jpeg', 25, '2021-11-10 20:44:39', '2021-11-10 20:44:39'),
(76, '/storage/product//CTRzxuIPcGWHd8YoAdeH.jpg', '4.jpg', 26, '2021-11-10 20:46:06', '2021-11-10 20:46:06'),
(77, '/storage/product//OVscuQcaR3FmJ7yOrLGA.jpg', '5.jpg', 26, '2021-11-10 20:46:06', '2021-11-10 20:46:06'),
(78, '/storage/product//cAHePSOhoQYTl1Nw6tOB.jpg', '6.jpg', 26, '2021-11-10 20:46:06', '2021-11-10 20:46:06'),
(79, '/storage/product//RBZ54k5RkUiMnhVVKBkK.jpg', '7.jpg', 27, '2021-11-10 20:48:36', '2021-11-10 20:48:36'),
(80, '/storage/product//17kJJ8JgMGEFCxqEJPC4.jpg', '8.jpg', 27, '2021-11-10 20:48:36', '2021-11-10 20:48:36'),
(81, '/storage/product//Rq79UyMavWxKO9JopYJ0.jpg', '9.jpg', 27, '2021-11-10 20:48:36', '2021-11-10 20:48:36'),
(82, '/storage/product//pVsW0nx16LWgredc6yK6.jpg', '10.jpg', 28, '2021-11-10 20:50:11', '2021-11-10 20:50:11'),
(83, '/storage/product//wJjr0oVePK7SrBCnhEqD.jpg', '11.jpg', 28, '2021-11-10 20:50:11', '2021-11-10 20:50:11'),
(84, '/storage/product//hCVqTskbNePUDqH5yEgE.jpg', '12.jpg', 28, '2021-11-10 20:50:12', '2021-11-10 20:50:12'),
(85, '/storage/product//HeWz71URJnfzElpEvbDu.jpg', '100.jpg', 29, '2021-11-18 04:51:31', '2021-11-18 04:51:31'),
(86, '/storage/product//N6tDI8bUaF3xngMRlCdy.jpg', '101.jpg', 29, '2021-11-18 04:51:31', '2021-11-18 04:51:31'),
(87, '/storage/product//sFilzGI7OMnPZJTlj1lC.jpg', '102.jpg', 29, '2021-11-18 04:51:31', '2021-11-18 04:51:31'),
(88, '/storage/product//G7pfExt495KLPTngkMj0.jpg', '103.jpg', 30, '2021-11-18 04:52:57', '2021-11-18 04:52:57'),
(89, '/storage/product//RwgIiF93jGwlqHaPIW6N.jpg', '104.jpg', 30, '2021-11-18 04:52:57', '2021-11-18 04:52:57'),
(90, '/storage/product//qTf479YT8fiyvel7vxMB.jpg', '105.jpg', 30, '2021-11-18 04:52:57', '2021-11-18 04:52:57'),
(91, '/storage/product//zOqjiOHUyP4K7Da0WKX5.jpg', '103.jpg', 31, '2021-11-18 04:54:06', '2021-11-18 04:54:06'),
(92, '/storage/product//pfMCowfzpkVV64Svgbxt.jpg', '104.jpg', 31, '2021-11-18 04:54:06', '2021-11-18 04:54:06'),
(93, '/storage/product//xXSKgZRCaBzNdg9myiBi.jpg', '105.jpg', 31, '2021-11-18 04:54:06', '2021-11-18 04:54:06'),
(94, '/storage/product//ykVb2sy4T8XZZIgYCD74.jpg', '103.jpg', 32, '2021-11-18 04:55:28', '2021-11-18 04:55:28'),
(95, '/storage/product//Uh7i4LeFkAZYEBcNjNJd.jpg', '104.jpg', 32, '2021-11-18 04:55:29', '2021-11-18 04:55:29'),
(96, '/storage/product//thg7Vk4GJARgLE4gbees.jpg', '105.jpg', 32, '2021-11-18 04:55:29', '2021-11-18 04:55:29'),
(97, '/storage/product//pvCpGHtAkxelsVDdzzb9.png', '2.png', 33, '2021-11-18 04:56:24', '2021-11-18 04:56:24'),
(98, '/storage/product//RZFFbHbn78eODWHuOkrl.jpeg', '3 - Copy.jpeg', 33, '2021-11-18 04:56:24', '2021-11-18 04:56:24'),
(99, '/storage/product//kxgShjZYgjhoPfQx25RE.jpeg', '3.jpeg', 33, '2021-11-18 04:56:25', '2021-11-18 04:56:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanhuyen`
--

CREATE TABLE `quanhuyen` (
  `maqh` int(5) NOT NULL,
  `name_qh` varchar(100) CHARACTER SET utf8 NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL,
  `matp` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `quanhuyen`
--

INSERT INTO `quanhuyen` (`maqh`, `name_qh`, `type`, `matp`) VALUES
(916, 'Quận Ninh Kiều', 'Quận', 92),
(917, 'Quận Ô Môn', 'Quận', 92),
(918, 'Quận Bình Thuỷ', 'Quận', 92),
(919, 'Quận Cái Răng', 'Quận', 92),
(923, 'Quận Thốt Nốt', 'Quận', 92),
(924, 'Huyện Vĩnh Thạnh', 'Huyện', 92),
(925, 'Huyện Cờ Đỏ', 'Huyện', 92),
(926, 'Huyện Phong Điền', 'Huyện', 92),
(927, 'Huyện Thới Lai', 'Huyện', 92),
(930, 'Thành phố Vị Thanh', 'Thành phố', 93),
(931, 'Thị xã Ngã Bảy', 'Thị xã', 93),
(932, 'Huyện Châu Thành A', 'Huyện', 93),
(933, 'Huyện Châu Thành', 'Huyện', 93),
(934, 'Huyện Phụng Hiệp', 'Huyện', 93),
(935, 'Huyện Vị Thuỷ', 'Huyện', 93),
(936, 'Huyện Long Mỹ', 'Huyện', 93),
(937, 'Thị xã Long Mỹ', 'Thị xã', 93);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(8, 'admin', 'Người quản trị', '2021-10-14 00:59:41', '2021-10-14 00:59:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(16, 7, 1, NULL, NULL),
(18, 1, 8, NULL, NULL),
(19, 9, 8, NULL, NULL),
(20, 10, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shippings`
--

CREATE TABLE `shippings` (
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` int(11) NOT NULL,
  `shipping_district` int(11) NOT NULL,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_wards` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shippings`
--

INSERT INTO `shippings` (`shipping_id`, `shipping_name`, `shipping_phone`, `shipping_city`, `shipping_district`, `shipping_address`, `shipping_email`, `created_at`, `updated_at`, `shipping_wards`) VALUES
(1, 'Bùi Công Minh', '0939357747', 92, 923, '456', 'buicongminh2018@gmail.com', '2021-12-04 06:47:38', '2021-12-04 06:47:38', 31219),
(2, 'Bùi Công Minh', '0939357747', 92, 923, '456', 'buicongminh2018@gmail.com', '2021-12-04 17:00:01', '2021-12-04 17:00:01', 31219);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `description`, `image_path`, `image_name`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '/storage/slider//5Ld6d9Ub2vYlfuJbjiFG.png', 'marcram.png', '2021-10-26 04:00:58', '2021-10-26 04:00:58'),
(2, NULL, NULL, '/storage/slider//pTDXnJA4IAtuUzknzpLa.jpg', 'dt.jpg', '2021-10-26 04:01:05', '2021-10-26 04:01:05'),
(3, NULL, NULL, '/storage/slider//e3zsEMFKvROy3ysEXZUI.jpg', '10042790-tai-nghe-bluetooth-prolink-phb6003e-den-do-1.jpg', '2021-10-26 04:01:14', '2021-10-26 04:01:14'),
(4, NULL, NULL, '/storage/slider//CaX3zOjVguHgeZGMYg2v.jpg', 'lt1.jpg', '2021-10-26 04:01:21', '2021-10-26 04:01:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhthanhpho`
--

CREATE TABLE `tinhthanhpho` (
  `matp` int(5) NOT NULL,
  `name_tp` varchar(100) CHARACTER SET utf8 NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `tinhthanhpho`
--

INSERT INTO `tinhthanhpho` (`matp`, `name_tp`, `type`) VALUES
(92, 'Thành phố Cần Thơ', 'Thành phố Trung ương'),
(93, 'Tỉnh Hậu Giang', 'Tỉnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_phone`) VALUES
(1, 'Bùi Công Minh', 'admin@gmail.com', NULL, '$2y$10$DCReON2VoOgGQUJxVbGLDuLSsQDHhQ7oedDclBJ7aTZYkKrfoK/L6', 'AsQWAwY26Rwsbne2qQaFnuwBT7sYbcP9qSWiHJD9bNHIVCUZNExurUkEHZVp', NULL, '2021-10-21 18:13:09', '0939357747');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xaphuongthitran`
--

CREATE TABLE `xaphuongthitran` (
  `xaid` int(5) NOT NULL,
  `name_xa` varchar(100) CHARACTER SET utf8 NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL,
  `maqh` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `xaphuongthitran`
--

INSERT INTO `xaphuongthitran` (`xaid`, `name_xa`, `type`, `maqh`) VALUES
(31117, 'Phường Cái Khế', 'Phường', 916),
(31120, 'Phường An Hòa', 'Phường', 916),
(31123, 'Phường Thới Bình', 'Phường', 916),
(31126, 'Phường An Nghiệp', 'Phường', 916),
(31129, 'Phường An Cư', 'Phường', 916),
(31132, 'Phường An Hội', 'Phường', 916),
(31135, 'Phường Tân An', 'Phường', 916),
(31138, 'Phường An Lạc', 'Phường', 916),
(31141, 'Phường An Phú', 'Phường', 916),
(31144, 'Phường Xuân Khánh', 'Phường', 916),
(31147, 'Phường Hưng Lợi', 'Phường', 916),
(31149, 'Phường An Khánh', 'Phường', 916),
(31150, 'Phường An Bình', 'Phường', 916),
(31153, 'Phường Châu Văn Liêm', 'Phường', 917),
(31154, 'Phường Thới Hòa', 'Phường', 917),
(31156, 'Phường Thới Long', 'Phường', 917),
(31157, 'Phường Long Hưng', 'Phường', 917),
(31159, 'Phường Thới An', 'Phường', 917),
(31162, 'Phường Phước Thới', 'Phường', 917),
(31165, 'Phường Trường Lạc', 'Phường', 917),
(31168, 'Phường Bình Thủy', 'Phường', 918),
(31169, 'Phường Trà An', 'Phường', 918),
(31171, 'Phường Trà Nóc', 'Phường', 918),
(31174, 'Phường Thới An Đông', 'Phường', 918),
(31177, 'Phường An Thới', 'Phường', 918),
(31178, 'Phường Bùi Hữu Nghĩa', 'Phường', 918),
(31180, 'Phường Long Hòa', 'Phường', 918),
(31183, 'Phường Long Tuyền', 'Phường', 918),
(31186, 'Phường Lê Bình', 'Phường', 919),
(31189, 'Phường Hưng Phú', 'Phường', 919),
(31192, 'Phường Hưng Thạnh', 'Phường', 919),
(31195, 'Phường Ba Láng', 'Phường', 919),
(31198, 'Phường Thường Thạnh', 'Phường', 919),
(31201, 'Phường Phú Thứ', 'Phường', 919),
(31204, 'Phường Tân Phú', 'Phường', 919),
(31207, 'Phường Thốt Nốt', 'Phường', 923),
(31210, 'Phường Thới Thuận', 'Phường', 923),
(31211, 'Xã Vĩnh Bình', 'Xã', 924),
(31212, 'Phường Thuận An', 'Phường', 923),
(31213, 'Phường Tân Lộc', 'Phường', 923),
(31216, 'Phường Trung Nhứt', 'Phường', 923),
(31217, 'Phường Thạnh Hoà', 'Phường', 923),
(31219, 'Phường Trung Kiên', 'Phường', 923),
(31222, 'Xã Trung An', 'Xã', 925),
(31225, 'Xã Trung Thạnh', 'Xã', 925),
(31227, 'Phường Tân Hưng', 'Phường', 923),
(31228, 'Phường Thuận Hưng', 'Phường', 923),
(31231, 'Thị trấn Thanh An', 'Thị trấn', 924),
(31232, 'Thị trấn Vĩnh Thạnh', 'Thị trấn', 924),
(31234, 'Xã Thạnh Mỹ', 'Xã', 924),
(31237, 'Xã Vĩnh Trinh', 'Xã', 924),
(31240, 'Xã Thạnh An', 'Xã', 924),
(31241, 'Xã Thạnh Tiến', 'Xã', 924),
(31243, 'Xã Thạnh Thắng', 'Xã', 924),
(31244, 'Xã Thạnh Lợi', 'Xã', 924),
(31246, 'Xã Thạnh Qưới', 'Xã', 924),
(31249, 'Xã Thạnh Phú', 'Xã', 925),
(31252, 'Xã Thạnh Lộc', 'Xã', 924),
(31255, 'Xã Trung Hưng', 'Xã', 925),
(31258, 'Thị trấn Thới Lai', 'Thị trấn', 927),
(31261, 'Thị trấn Cờ Đỏ', 'Thị trấn', 925),
(31264, 'Xã Thới Hưng', 'Xã', 925),
(31267, 'Xã Thới Thạnh', 'Xã', 927),
(31268, 'Xã Tân Thạnh', 'Xã', 927),
(31270, 'Xã Xuân Thắng', 'Xã', 927),
(31273, 'Xã Đông Hiệp', 'Xã', 925),
(31274, 'Xã Đông Thắng', 'Xã', 925),
(31276, 'Xã Thới Đông', 'Xã', 925),
(31277, 'Xã Thới Xuân', 'Xã', 925),
(31279, 'Xã Đông Bình', 'Xã', 927),
(31282, 'Xã Đông Thuận', 'Xã', 927),
(31285, 'Xã Thới Tân', 'Xã', 927),
(31286, 'Xã Trường Thắng', 'Xã', 927),
(31288, 'Xã Định Môn', 'Xã', 927),
(31291, 'Xã Trường Thành', 'Xã', 927),
(31294, 'Xã Trường Xuân', 'Xã', 927),
(31297, 'Xã Trường Xuân A', 'Xã', 927),
(31298, 'Xã Trường Xuân B', 'Xã', 927),
(31299, 'Thị trấn Phong Điền', 'Thị trấn', 926),
(31300, 'Xã Nhơn Ái', 'Xã', 926),
(31303, 'Xã Giai Xuân', 'Xã', 926),
(31306, 'Xã Tân Thới', 'Xã', 926),
(31309, 'Xã Trường Long', 'Xã', 926),
(31312, 'Xã Mỹ Khánh', 'Xã', 926),
(31315, 'Xã Nhơn Nghĩa', 'Xã', 926),
(31318, 'Phường I', 'Phường', 930),
(31321, 'Phường III', 'Phường', 930),
(31324, 'Phường IV', 'Phường', 930),
(31327, 'Phường V', 'Phường', 930),
(31330, 'Phường VII', 'Phường', 930),
(31333, 'Xã Vị Tân', 'Xã', 930),
(31336, 'Xã Hoả Lựu', 'Xã', 930),
(31338, 'Xã Tân Tiến', 'Xã', 930),
(31339, 'Xã Hoả Tiến', 'Xã', 930),
(31340, 'Phường Ngã Bảy', 'Phường', 931),
(31341, 'Phường Lái Hiếu', 'Phường', 931),
(31342, 'Thị trấn Một Ngàn', 'Thị trấn', 932),
(31343, 'Phường Hiệp Thành', 'Phường', 931),
(31344, 'Xã Hiệp Lợi', 'Xã', 931),
(31345, 'Xã Tân Hoà', 'Xã', 932),
(31346, 'Thị trấn Bảy Ngàn', 'Thị trấn', 932),
(31348, 'Xã Trường Long Tây', 'Xã', 932),
(31351, 'Xã Trường Long A', 'Xã', 932),
(31357, 'Xã Nhơn Nghĩa A', 'Xã', 932),
(31359, 'Thị trấn Rạch Gòi', 'Thị trấn', 932),
(31360, 'Xã Thạnh Xuân', 'Xã', 932),
(31362, 'Thị trấn Cái Tắc', 'Thị trấn', 932),
(31363, 'Xã Tân Phú Thạnh', 'Xã', 932),
(31366, 'Thị Trấn Ngã Sáu', 'Thị trấn', 933),
(31369, 'Xã Đông Thạnh', 'Xã', 933),
(31372, 'Xã Phú An', 'Xã', 933),
(31375, 'Xã Đông Phú', 'Xã', 933),
(31378, 'Xã Phú Hữu', 'Xã', 933),
(31379, 'Xã Phú Tân', 'Xã', 933),
(31381, 'Thị trấn Mái Dầm', 'Thị trấn', 933),
(31384, 'Xã Đông Phước', 'Xã', 933),
(31387, 'Xã Đông Phước A', 'Xã', 933),
(31393, 'Thị trấn Kinh Cùng', 'Thị trấn', 934),
(31396, 'Thị trấn Cây Dương', 'Thị trấn', 934),
(31399, 'Xã Tân Bình', 'Xã', 934),
(31402, 'Xã Bình Thành', 'Xã', 934),
(31405, 'Xã Thạnh Hòa', 'Xã', 934),
(31408, 'Xã Long Thạnh', 'Xã', 934),
(31411, 'Xã Đại Thành', 'Xã', 931),
(31414, 'Xã Tân Thành', 'Xã', 931),
(31417, 'Xã Phụng Hiệp', 'Xã', 934),
(31420, 'Xã Hòa Mỹ', 'Xã', 934),
(31423, 'Xã Hòa An', 'Xã', 934),
(31426, 'Xã Phương Bình', 'Xã', 934),
(31429, 'Xã Hiệp Hưng', 'Xã', 934),
(31432, 'Xã Tân Phước Hưng', 'Xã', 934),
(31433, 'Thị trấn Búng Tàu', 'Thị trấn', 934),
(31435, 'Xã Phương Phú', 'Xã', 934),
(31438, 'Xã Tân Long', 'Xã', 934),
(31441, 'Thị trấn Nàng Mau', 'Thị trấn', 935),
(31444, 'Xã Vị Trung', 'Xã', 935),
(31447, 'Xã Vị Thuỷ', 'Xã', 935),
(31450, 'Xã Vị Thắng', 'Xã', 935),
(31453, 'Xã Vĩnh Thuận Tây', 'Xã', 935),
(31456, 'Xã Vĩnh Trung', 'Xã', 935),
(31459, 'Xã Vĩnh Tường', 'Xã', 935),
(31462, 'Xã Vị Đông', 'Xã', 935),
(31465, 'Xã Vị Thanh', 'Xã', 935),
(31468, 'Xã Vị Bình', 'Xã', 935),
(31471, 'Phường Thuận An', 'Phường', 937),
(31472, 'Phường Trà Lồng', 'Phường', 937),
(31473, 'Phường Bình Thạnh', 'Phường', 937),
(31474, 'Xã Long Bình', 'Xã', 937),
(31475, 'Phường Vĩnh Tường', 'Phường', 937),
(31477, 'Xã Long Trị', 'Xã', 937),
(31478, 'Xã Long Trị A', 'Xã', 937),
(31480, 'Xã Long Phú', 'Xã', 937),
(31481, 'Xã Tân Phú', 'Xã', 937),
(31483, 'Xã Thuận Hưng', 'Xã', 936),
(31484, 'Xã Thuận Hòa', 'Xã', 936),
(31486, 'Xã Vĩnh Thuận Đông', 'Xã', 936),
(31489, 'Xã Vĩnh Viễn', 'Xã', 936),
(31490, 'Xã Vĩnh Viễn A', 'Xã', 936),
(31492, 'Xã Lương Tâm', 'Xã', 936),
(31493, 'Xã Lương Nghĩa', 'Xã', 936),
(31495, 'Xã Xà Phiên', 'Xã', 936);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phi_ships`
--
ALTER TABLE `phi_ships`
  ADD PRIMARY KEY (`phi_ship_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD PRIMARY KEY (`maqh`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tinhthanhpho`
--
ALTER TABLE `tinhthanhpho`
  ADD PRIMARY KEY (`matp`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `xaphuongthitran`
--
ALTER TABLE `xaphuongthitran`
  ADD PRIMARY KEY (`xaid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT cho bảng `phi_ships`
--
ALTER TABLE `phi_ships`
  MODIFY `phi_ship_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `shippings`
--
ALTER TABLE `shippings`
  MODIFY `shipping_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
