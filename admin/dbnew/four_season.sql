-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 11:04 AM
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
-- Database: `four_season`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `ip` varchar(150) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'sales',
  `status` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `ip`, `image`, `email`, `password`, `role`, `status`, `updated_at`) VALUES
(2, 'Super Admin', '103.107.160.134', 'assets/admin/69281_avatar.png', 'admin@fourseasons.com', '@BCD1234', 'admin', 1, '2023-04-10 05:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `banner_size` varchar(255) NOT NULL,
  `banner_img` varchar(500) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `banner_name`, `banner_size`, `banner_img`, `updated_at`) VALUES
(1, 'Home Banner 1', '1920x840', 'assets/banner/11978_1.png', '2023-03-28 17:56:56'),
(2, 'Home Banner 2', '1920x840', 'assets/banner/2.png', '2023-03-28 11:47:41'),
(3, 'Home Banner 3', '1920x840', 'assets/banner/57308_3.png', '2023-03-30 18:25:31'),
(4, 'Advertisement 1', '605x350', 'assets/banner/4681_1.png', '2023-03-28 18:00:37'),
(5, 'Advertisement 2', '605x350', 'assets/banner/4167_2.png', '2023-03-28 18:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `contact_phone` varchar(100) NOT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `receiver_phone` varchar(100) NOT NULL,
  `deliver_date` date NOT NULL,
  `deliver_time` time NOT NULL,
  `f_name` varchar(150) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(15) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `payment_type` varchar(20) NOT NULL DEFAULT 'Card',
  `total_purchase` double(10,2) NOT NULL,
  `approve` int(11) NOT NULL DEFAULT 3,
  `purchase_points` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `customer_id`, `contact_name`, `contact_phone`, `receiver_name`, `receiver_phone`, `deliver_date`, `deliver_time`, `f_name`, `l_name`, `email`, `phone`, `address`, `city`, `zip_code`, `payment_type`, `total_purchase`, `approve`, `purchase_points`, `updated_at`) VALUES
(1, 0, '', '', '', '', '0000-00-00', '00:00:00', 'Test', 'User', 'test@test.com', '0000000000', 'test', 'test', '00000', 'Card', 3595.00, 3, 0, '2023-05-04 19:09:05'),
(2, 0, '', '', '', '', '0000-00-00', '00:00:00', 'Test', 'Test', 'Test', '8529649243', 'Test', 'Test', '00000', 'Card', 799.00, 3, 0, '2023-05-04 19:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_name_en` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `c_name`, `c_name_en`, `image`, `status`, `inserted_at`, `updated_at`) VALUES
(8, '送禮花束', '', 'assets/cat_img/5698_21.jpg', 1, '2023-03-28 15:18:55', '0000-00-00 00:00:00'),
(9, '節慶限定', '', 'assets/cat_img/89501_15.jpg', 1, '2023-03-28 15:19:13', '0000-00-00 00:00:00'),
(10, '畢業禮/洗禮/優惠之選', '', 'assets/cat_img/92750_18.jpg', 1, '2023-03-28 15:19:31', '0000-00-00 00:00:00'),
(11, '婚禮/婚宴/花球', '', 'assets/cat_img/48980_26.jpg', 1, '2023-03-28 15:19:45', '0000-00-00 00:00:00'),
(12, '花籃/果籃', '', 'assets/cat_img/41262_25.jpg', 1, '2023-03-28 15:19:58', '0000-00-00 00:00:00'),
(13, '蘭花擺設', '', 'assets/cat_img/7845_1.jpg', 1, '2023-03-28 15:20:12', '0000-00-00 00:00:00'),
(14, '特價花材', '', 'assets/cat_img/7845_1.jpg', 1, '2023-03-28 15:20:12', '0000-00-00 00:00:00'),
(15, '永生花/擺設/盒花/仿真花', '', 'assets/cat_img/7845_1.jpg', 1, '2023-03-28 15:20:12', '0000-00-00 00:00:00'),
(16, '如何選擇合適花束/花材', '', 'assets/cat_img/7845_1.jpg', 1, '2023-03-28 15:20:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_duration` varchar(255) NOT NULL,
  `course_price` decimal(10,2) NOT NULL,
  `course_description` text NOT NULL,
  `course_image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_image` varchar(200) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `address_3` text NOT NULL,
  `membership_point` int(10) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `contact_name` varchar(150) NOT NULL,
  `contact_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `email`, `number`, `password`, `profile_image`, `address_1`, `address_2`, `address_3`, `membership_point`, `inserted_at`, `updated_at`, `contact_name`, `contact_phone`) VALUES
(1, 'Test User', 'test@test.com', '0011223344', '@BCD1234', '', 'Hong Kong', 'Hong Kong 2', 'Hong Kong 3', 0, '2023-04-03 14:25:26', '2023-04-03 20:00:21', '', ''),
(2, 'Test User 2', 'test2@test.com', '0011223344', '123456789', '', 'Hong Kong', '', '', 0, '2023-04-03 14:26:58', '0000-00-00 00:00:00', '', ''),
(3, 'Test User 3', 'test3@test.com', '0011223344', '@BCD1234', '', 'Hong Kong', '', '', 0, '2023-04-03 14:27:59', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `flower_color`
--

CREATE TABLE `flower_color` (
  `color_id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `color_cn` varchar(255) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flower_color`
--

INSERT INTO `flower_color` (`color_id`, `color`, `color_cn`, `inserted_at`, `updated_at`) VALUES
(1, 'White ', '白色', '2023-04-01 18:14:22', '2023-05-10 14:47:24'),
(2, 'Black ', '黑色', '2023-04-01 18:16:15', '2023-05-10 14:47:15'),
(3, 'Red ', '紅色', '2023-04-01 18:16:19', '2023-05-10 14:47:07'),
(4, 'Yellow ', '黃色', '2023-04-01 18:16:24', '2023-05-10 14:46:59'),
(5, 'Purple ', '紫色', '2023-04-01 18:16:28', '2023-05-10 14:46:52'),
(6, 'Blue ', '藍色', '2023-04-17 20:10:01', '2023-05-10 14:46:45'),
(7, 'Heart Pink ', '粉紅色', '2023-04-17 21:09:26', '2023-05-10 14:46:37'),
(8, 'Omakase ', '訂製', '2023-04-17 21:47:44', '2023-05-10 14:46:29'),
(9, 'Green ', '綠色', '2023-04-21 21:46:52', '2023-05-10 14:46:20'),
(10, 'Colour Mixed ', '混合色', '2023-04-27 15:42:23', '2023-05-10 14:46:02'),
(11, 'Rainbow ', '彩色', '2023-04-27 15:42:39', '2023-05-10 14:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_in` int(11) NOT NULL,
  `stock_out` int(11) NOT NULL,
  `stock_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `billing_id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_unit_price` double(10,2) NOT NULL,
  `product_total_price` double(10,2) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `customer_id`, `billing_id`, `product_name`, `product_quantity`, `product_unit_price`, `product_total_price`, `updated_at`) VALUES
(1, 0, 1, 'Test Product', 2, 599.00, 1198.00, '2023-04-16 14:51:15'),
(2, 0, 1, '經典紅玫', 3, 799.00, 2397.00, '2023-04-16 14:51:15'),
(3, 0, 2, '鮮花花束 - 經典紅玫瑰', 1, 799.00, 799.00, '2023-04-19 18:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category` int(10) NOT NULL DEFAULT 0,
  `product_type` int(10) NOT NULL DEFAULT 0,
  `product_color` int(10) NOT NULL,
  `hot_product` int(10) NOT NULL,
  `store_id` int(11) NOT NULL DEFAULT 0,
  `product_code` varchar(50) NOT NULL,
  `product_weight` varchar(255) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_name_en` varchar(500) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `description_en` text NOT NULL,
  `p_image` varchar(500) NOT NULL,
  `status` int(10) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `sub_category`, `product_type`, `product_color`, `hot_product`, `store_id`, `product_code`, `product_weight`, `p_name`, `p_name_en`, `product_price`, `description`, `description_en`, `p_image`, `status`, `inserted_at`, `updated_at`) VALUES
(1, 8, 3, 0, 3, 0, 0, 'BFRR001', '', '鮮花花束 - 經典紅玫瑰', '', '799.00', '產品詳情:\r\n花語：測試\r\n贈送場合：測試', '', 'assets/products_image/874270_IMG20220609175955_mh1654782277330.jpg', 1, '2023-04-14 22:55:58', '2023-04-17 20:48:28'),
(2, 15, 0, 0, 4, 0, 0, '002', '', 'Test ', 'Product', '599.00', '<p>Test</p>\r\n', '', 'assets/products_image/680580_17.jpg,assets/products_image/680581_18.jpg,assets/products_image/680582_19.jpg', 1, '2023-04-16 14:49:46', '2023-05-10 15:37:44'),
(3, 8, 4, 0, 6, 0, 0, 'BFHB001', '', '鮮花花束 - 天使藍綉球', '', '499.00', '測試 1\r\n測試 2\r\n測試 3', '', 'assets/products_image/705780_IMG_20221127_192635.jpg', 1, '2023-04-17 20:09:50', '2023-04-17 20:10:37'),
(4, 10, 6, 4, 4, 1, 0, 'BFSY001', '', '鮮花花束 - 向日葵花束', '', '499.00', '測試 1\r\n測試 2\r\n測試 3', '', 'assets/products_image/440320_P1050097.JPG', 1, '2023-04-17 20:32:28', '0000-00-00 00:00:00'),
(5, 8, 3, 0, 5, 0, 0, 'BFRP001', '', '鮮花花束 - 淺紫玫瑰', '', '799.00', '測試', '', 'assets/products_image/650310_IMG20220912154927_mh1662988387189.jpg', 1, '2023-04-17 20:43:48', '2023-04-17 20:47:34'),
(6, 8, 3, 0, 7, 1, 0, 'BFRHP001', '', '鮮花花束 - 桃紅色玫瑰', '', '799.00', '測試 1', '', 'assets/products_image/476210_IMG_20221125_164621.jpg', 1, '2023-04-17 20:53:51', '2023-04-17 21:09:43'),
(7, 8, 2, 7, 8, 0, 0, 'Omakase', '', '鮮花花束 - Omakase', '', '799.00', '測試', '', 'assets/products_image/615150_FB_IMG_1681738314863.jpg', 1, '2023-04-17 21:51:26', '0000-00-00 00:00:00'),
(8, 8, 17, 0, 3, 1, 0, 'FB-R-001', '', '大型鮮花花束 - 經典紅玫瑰', '', '1299.00', '測試', '', 'assets/products_image/556220_IMG_20230405_211901.jpg', 1, '2023-04-21 21:16:25', '2023-04-21 21:32:27'),
(9, 12, 23, 0, 9, 0, 0, 'FBA-G-001', '', '鮮花花籃 (小) - 測試', '', '1.00', '測試', '', 'assets/products_image/5200_IMG_20190501_183416_mh1556707042550.jpg', 1, '2023-04-21 21:46:41', '2023-04-22 15:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(10) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_type_en` varchar(500) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `sub_cat_id` int(10) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type`, `product_type_en`, `cat_id`, `sub_cat_id`, `inserted_at`, `updated_at`) VALUES
(8, '自取花束  Guest Pickup', '', 8, 2, '2023-04-27 15:44:54', '2023-04-27 16:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `promo_code`
--

CREATE TABLE `promo_code` (
  `id` int(11) NOT NULL,
  `coupon_name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `code` varchar(20) NOT NULL,
  `coupon_type` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `expirey_date` datetime NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `category_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `inserted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `category_id`, `product_id`, `quantity`, `inserted_at`) VALUES
(1, 8, 18, 100, '2023-04-03 15:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_image` varchar(200) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_cat_id` int(10) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `sub_cat_name_en` varchar(500) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `sub_cat_image` varchar(500) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cat_id`, `sub_cat_name`, `sub_cat_name_en`, `cat_id`, `sub_cat_image`, `inserted_at`, `updated_at`) VALUES
(2, '花藝師發辦（推薦）', '', 8, 'assets/sub_cat_img/63138_FB_IMG_1681738301559.jpg', '2023-03-28 15:43:06', 2023),
(3, '玫瑰系列', '', 8, 'assets/sub_cat_img/17788_IMG20220609175955_mh1654782277330.jpg', '2023-03-28 15:43:37', 2023),
(4, '繡球系列', '', 8, 'assets/sub_cat_img/89029_MTXX_MH20230213_225055027.jpg', '2023-03-28 15:43:53', 2023),
(5, '太陽花/向日葵系列', '', 8, 'assets/sub_cat_img/20603_4.jpg', '2023-03-28 15:44:12', 2023),
(6, '畢業禮', '', 10, 'assets/sub_cat_img/9755_5.jpg', '2023-03-28 15:45:58', 2023),
(7, '受浸/洗禮', '', 10, 'assets/sub_cat_img/21677_6.jpg', '2023-03-28 15:46:18', 2023),
(8, '周年紀念', '', 10, 'assets/sub_cat_img/26376_7.jpg', '2023-03-28 15:46:38', 2023),
(9, '升職/祝賀', '', 10, 'assets/sub_cat_img/12851_8.jpg', '2023-03-28 15:47:20', 2023),
(10, '新娘鮮花花球', '', 11, 'assets/sub_cat_img/3081_9.jpg', '2023-03-28 15:47:54', 2023),
(11, '婚宴父母花束', '', 11, 'assets/sub_cat_img/22388_10.jpg', '2023-03-28 15:48:19', 2023),
(12, '婚禮襟花/手花', '', 11, 'assets/sub_cat_img/3298_11.jpg', '2023-03-28 15:49:18', 2023),
(13, '婚禮花材佈置', '', 11, 'assets/sub_cat_img/51029_12.jpg', '2023-03-28 15:49:46', 2023),
(14, '過大禮禮盒套裝', '', 11, 'assets/sub_cat_img/28827_13.jpg', '2023-03-28 15:50:38', 2023),
(15, '鬱金香系列', '', 8, 'assets/sub_cat_img/35450_14.jpg', '2023-03-28 17:28:18', 2023),
(16, '混合花束/及其他', '', 8, 'assets/sub_cat_img/33666_13.jpg', '2023-04-13 19:26:20', 0),
(17, '大型花束', '', 8, 'assets/sub_cat_img/70948_24.jpg', '2023-04-13 19:26:34', 0),
(19, '情人節限定', '', 9, 'assets/sub_cat_img/54310_3.jpg', '2023-04-13 19:31:30', 0),
(20, '母親節限定', '', 9, 'assets/sub_cat_img/32435_17.jpg', '2023-04-13 19:31:45', 0),
(21, '聖誕限定', '', 9, 'assets/sub_cat_img/37720_21.jpg', '2023-04-13 19:31:59', 0),
(22, '萬聖節限定', '', 9, 'assets/sub_cat_img/33406_14.jpg', '2023-04-13 19:32:11', 0),
(23, '祝賀花籃', '', 12, 'assets/sub_cat_img/96304_3.jpg', '2023-04-13 19:39:49', 0),
(24, '祝賀果籃', '', 12, 'assets/sub_cat_img/2743_6.jpg', '2023-04-13 19:40:04', 0),
(25, '悼念花籃', '', 12, 'assets/sub_cat_img/24328_8.jpg', '2023-04-13 19:40:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `billing_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_number` varchar(50) NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_price_currency` varchar(10) NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `paid_amount_currency` varchar(10) NOT NULL,
  `txn_id` varchar(50) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `stripe_checkout_session_id` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `billing_id`, `customer_name`, `customer_email`, `item_name`, `item_number`, `item_price`, `item_price_currency`, `paid_amount`, `paid_amount_currency`, `txn_id`, `payment_status`, `stripe_checkout_session_id`, `created`, `modified`) VALUES
(1, 1, 'Test', 'test@test.com', '1小時30分鐘租場服務', 'DP12345', 190.00, 'hkd', 3595.00, 'hkd', 'pi_3MxPQyFbJgrDKYxd0V28pyMn', 'succeeded', 'cs_test_a1SOv1BEBy5Oqmt5esmuJAe2yIf1hq9mJL6pHYAM1cCwMCoovvxzhSQuEv', '2023-04-16 06:51:39', '2023-04-16 06:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `inserted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flower_color`
--
ALTER TABLE `flower_color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indexes for table `promo_code`
--
ALTER TABLE `promo_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `flower_color`
--
ALTER TABLE `flower_color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `promo_code`
--
ALTER TABLE `promo_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
