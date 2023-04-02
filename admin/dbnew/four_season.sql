-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 01:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
(2, 'Super Admin', '103.107.160.134', 'assets/admin/69281_avatar.png', 'admin@fourseasons.com', '@BCD1234', 'admin', 1, '2023-03-30 07:33:21');

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
  `address` varchar(30) NOT NULL,
  `city` varchar(15) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `state` varchar(5) NOT NULL,
  `payment_type` varchar(20) NOT NULL DEFAULT 'Card',
  `approve` int(11) NOT NULL DEFAULT 3,
  `purchase_points` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `c_name`, `image`, `status`, `inserted_at`, `updated_at`) VALUES
(8, 'bouquet', 'assets/cat_img/5698_21.jpg', 1, '2023-03-28 15:18:55', '0000-00-00 00:00:00'),
(9, 'rose bear', 'assets/cat_img/89501_15.jpg', 1, '2023-03-28 15:19:13', '0000-00-00 00:00:00'),
(10, 'Flowers', 'assets/cat_img/92750_18.jpg', 1, '2023-03-28 15:19:31', '0000-00-00 00:00:00'),
(11, 'preserved flower', 'assets/cat_img/48980_26.jpg', 1, '2023-03-28 15:19:45', '0000-00-00 00:00:00'),
(12, 'orchid', 'assets/cat_img/41262_25.jpg', 1, '2023-03-28 15:19:58', '0000-00-00 00:00:00'),
(13, 'flower box', 'assets/cat_img/7845_1.jpg', 1, '2023-03-28 15:20:12', '0000-00-00 00:00:00');

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
  `membership_point` int(10) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flower_color`
--

CREATE TABLE `flower_color` (
  `color_id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flower_color`
--

INSERT INTO `flower_color` (`color_id`, `color`, `inserted_at`, `updated_at`) VALUES
(1, 'White', '2023-04-01 18:14:22', '0000-00-00 00:00:00'),
(2, 'Black', '2023-04-01 18:16:15', '0000-00-00 00:00:00'),
(3, 'Red', '2023-04-01 18:16:19', '0000-00-00 00:00:00'),
(4, 'Yellow', '2023-04-01 18:16:24', '0000-00-00 00:00:00'),
(5, 'Purple', '2023-04-01 18:16:28', '2023-04-01 18:47:55');

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
  `product_price` decimal(10,2) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `p_image` varchar(500) NOT NULL,
  `status` int(10) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `sub_category`, `product_type`, `product_color`, `hot_product`, `store_id`, `product_code`, `product_weight`, `p_name`, `product_price`, `description`, `p_image`, `status`, `inserted_at`, `updated_at`) VALUES
(1, 8, 2, 8, 2, 1, 0, '001', '', 'Test Flower 1', '100.00', 'Test Description', 'assets/products_image/52270_1.jpg,assets/products_image/52271_2.jpg,assets/products_image/52272_3.jpg', 1, '2023-04-02 01:44:15', '0000-00-00 00:00:00'),
(2, 9, 4, 0, 5, 1, 0, '002', '', 'Test Flower 2', '125.00', 'Test Description', 'assets/products_image/445040_4.jpg,assets/products_image/445041_5.jpg,assets/products_image/445042_6.jpg', 1, '2023-04-02 01:45:07', '0000-00-00 00:00:00'),
(3, 10, 6, 13, 4, 1, 0, '003', '', 'Test Flower 3', '50.00', 'Test Description', 'assets/products_image/373470_7.jpg,assets/products_image/373471_8.jpg,assets/products_image/373472_9.jpg', 1, '2023-04-02 01:47:03', '0000-00-00 00:00:00'),
(4, 11, 11, 17, 3, 1, 0, '004', '', 'Test Flower 4', '54.00', 'Test Description', 'assets/products_image/997640_10.jpg,assets/products_image/997641_11.jpg,assets/products_image/997642_12.jpg', 1, '2023-04-02 01:47:52', '0000-00-00 00:00:00'),
(5, 12, 0, 0, 1, 1, 0, '005', '', 'Test Flower 5', '99.00', 'Test Description', 'assets/products_image/241730_13.jpg,assets/products_image/241731_14.jpg,assets/products_image/241732_15.jpg', 1, '2023-04-02 01:54:23', '0000-00-00 00:00:00'),
(6, 9, 4, 0, 5, 1, 0, '006', '', 'Test Flower 6', '200.00', 'Test Flower booooo', 'assets/products_image/46190_1.jpg,assets/products_image/46191_2.jpg,assets/products_image/46192_3.jpg', 1, '2023-04-02 19:00:15', '0000-00-00 00:00:00'),
(7, 9, 5, 0, 3, 1, 0, '007', '', 'Test Flower 7', '600.00', 'hfmjaSDjhyv  mz', 'assets/products_image/430710_14.jpg,assets/products_image/430711_19.jpg,assets/products_image/430712_20.jpg', 1, '2023-04-02 19:01:12', '0000-00-00 00:00:00'),
(8, 13, 0, 0, 1, 0, 0, '008', '', 'Test Flower 8', '200.00', 'cfghxdfgxdfgsdfgxdg', 'assets/products_image/839570_9.jpg,assets/products_image/839571_10.jpg,assets/products_image/839572_13.jpg', 1, '2023-04-02 19:02:36', '0000-00-00 00:00:00'),
(9, 9, 5, 0, 3, 1, 0, '008', '', 'Test Flower 8', '600.00', ' vghcgfjhfgj', 'assets/products_image/853340_6.jpg,assets/products_image/853341_12.jpg,assets/products_image/853342_17.jpg', 1, '2023-04-02 19:10:45', '0000-00-00 00:00:00'),
(10, 11, 13, 0, 3, 1, 0, '009', '', 'Test Flower 9', '600.00', 'gcjhghj', 'assets/products_image/946410_24.jpg,assets/products_image/946411_25.jpg,assets/products_image/946412_26.jpg', 1, '2023-04-02 19:12:09', '0000-00-00 00:00:00'),
(11, 11, 14, 0, 1, 1, 0, '010', '', 'Test Flower 10', '800.00', 'fghfcgh', 'assets/products_image/373260_15.jpg,assets/products_image/373261_16.jpg,assets/products_image/373262_17.jpg', 1, '2023-04-02 19:12:45', '0000-00-00 00:00:00'),
(12, 9, 4, 0, 5, 1, 0, '011', '', 'Test Flower 11', '220.00', 'ghujrftyft', 'assets/products_image/604910_4.jpg,assets/products_image/604911_5.jpg,assets/products_image/604912_6.jpg', 1, '2023-04-02 19:13:55', '0000-00-00 00:00:00'),
(13, 13, 0, 0, 1, 1, 0, '012', '', 'Test Flower 12', '90.00', ' cv', 'assets/products_image/845930_14.jpg,assets/products_image/845931_21.jpg,assets/products_image/845932_26.jpg', 1, '2023-04-02 19:15:08', '0000-00-00 00:00:00'),
(14, 9, 5, 0, 2, 1, 0, '013', '', 'Test Flower 13', '600.00', 'gvhfg', 'assets/products_image/315010_1.jpg,assets/products_image/315011_9.jpg,assets/products_image/315012_17.jpg', 1, '2023-04-02 19:16:19', '0000-00-00 00:00:00'),
(15, 10, 8, 0, 4, 1, 0, '014', '', 'Test Flower 14', '720.00', ' cvbn c', 'assets/products_image/969710_8.jpg,assets/products_image/969711_9.jpg,assets/products_image/969712_15.jpg', 1, '2023-04-02 19:16:52', '0000-00-00 00:00:00'),
(16, 9, 5, 0, 1, 1, 0, '015', '', 'Test Flower 15', '125.00', 'xdfgxdfg', 'assets/products_image/779730_11.jpg,assets/products_image/779731_18.jpg,assets/products_image/779732_25.jpg', 1, '2023-04-02 19:17:52', '0000-00-00 00:00:00'),
(17, 11, 13, 0, 3, 0, 0, '016', '', 'Test Flower 16', '632.00', 'vghfcg', 'assets/products_image/547870_21.jpg,assets/products_image/547871_23.jpg,assets/products_image/547872_24.jpg', 1, '2023-04-02 19:18:28', '0000-00-00 00:00:00'),
(18, 8, 15, 7, 2, 1, 0, '017', '', 'Test Flower 17', '963.00', ' bnmb n', 'assets/products_image/474320_3.jpg,assets/products_image/474321_9.jpg,assets/products_image/474322_15.jpg', 1, '2023-04-02 19:19:13', '0000-00-00 00:00:00'),
(19, 8, 15, 5, 3, 0, 0, '018', '', 'Test Flower 18', '632.00', 'gyhfyjnbn', 'assets/products_image/583240_24.jpg,assets/products_image/583241_25.jpg,assets/products_image/583242_26.jpg', 1, '2023-04-02 19:20:12', '0000-00-00 00:00:00'),
(20, 9, 4, 0, 1, 1, 0, '018', '', 'Test Flower 18', '666.00', 'dfgsdfsd', 'assets/products_image/958950_3.jpg,assets/products_image/958951_10.jpg,assets/products_image/958952_17.jpg', 1, '2023-04-02 19:21:00', '0000-00-00 00:00:00'),
(21, 8, 15, 2, 5, 0, 0, '019', '', 'Test Flower 19', '456.00', 'gbnvbn', 'assets/products_image/784470_12.jpg,assets/products_image/784471_20.jpg,assets/products_image/784472_26.jpg', 1, '2023-04-02 19:21:52', '0000-00-00 00:00:00'),
(22, 9, 4, 0, 2, 0, 0, '020', '', 'Test Flower 20', '632.00', 'cxv', 'assets/products_image/267030_10.jpg,assets/products_image/267031_12.jpg,assets/products_image/267032_16.jpg', 1, '2023-04-02 19:22:30', '0000-00-00 00:00:00'),
(23, 8, 15, 5, 5, 0, 0, '021', '', 'Test Flower 21', '111.00', 'ghjjhb', 'assets/products_image/211540_12.jpg,assets/products_image/211541_13.jpg,assets/products_image/211542_16.jpg', 1, '2023-04-02 19:23:09', '0000-00-00 00:00:00'),
(24, 13, 0, 0, 5, 0, 0, '022', '', 'Test Flower 22', '222.00', 'fghgh', 'assets/products_image/663980_10.jpg,assets/products_image/663981_11.jpg,assets/products_image/663982_12.jpg', 1, '2023-04-02 19:24:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(10) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `sub_cat_id` int(10) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type`, `cat_id`, `sub_cat_id`, `inserted_at`, `updated_at`) VALUES
(1, 'rose', 8, 15, '2023-03-28 19:11:33', '0000-00-00 00:00:00'),
(2, 'hydrangea', 8, 15, '2023-03-28 19:21:20', '0000-00-00 00:00:00'),
(3, 'sunflower', 8, 15, '2023-03-28 19:21:32', '0000-00-00 00:00:00'),
(4, 'starry sky', 8, 15, '2023-03-28 19:21:47', '0000-00-00 00:00:00'),
(5, 'tulip', 8, 15, '2023-03-28 19:21:59', '0000-00-00 00:00:00'),
(6, 'carnation', 8, 15, '2023-03-28 19:22:15', '0000-00-00 00:00:00'),
(7, 'calla lily', 8, 15, '2023-03-28 19:22:31', '0000-00-00 00:00:00'),
(8, 'standard', 8, 2, '2023-03-28 19:22:53', '0000-00-00 00:00:00'),
(9, 'mini', 8, 2, '2023-03-28 19:23:01', '0000-00-00 00:00:00'),
(10, 'single bouquet', 8, 2, '2023-03-28 19:23:19', '0000-00-00 00:00:00'),
(11, 'rose', 10, 6, '2023-03-28 19:25:22', '0000-00-00 00:00:00'),
(12, 'hydrangea', 10, 6, '2023-03-28 19:25:29', '0000-00-00 00:00:00'),
(13, 'sunflower', 10, 6, '2023-03-28 19:25:37', '0000-00-00 00:00:00'),
(14, 'starry sky', 10, 6, '2023-03-28 19:25:48', '0000-00-00 00:00:00'),
(15, 'carnation', 10, 6, '2023-03-28 19:26:02', '0000-00-00 00:00:00'),
(16, 'calla lily', 10, 6, '2023-03-28 19:26:10', '0000-00-00 00:00:00'),
(17, 'standard', 11, 11, '2023-03-28 19:27:20', '0000-00-00 00:00:00'),
(18, 'mini', 11, 11, '2023-03-28 19:27:33', '0000-00-00 00:00:00'),
(19, 'single bouquet', 11, 11, '2023-03-28 19:27:50', '0000-00-00 00:00:00');

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
  `cat_id` int(10) NOT NULL,
  `sub_cat_image` varchar(500) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cat_id`, `sub_cat_name`, `cat_id`, `sub_cat_image`, `inserted_at`, `updated_at`) VALUES
(2, 'immortal bouquet', 8, 'assets/sub_cat_img/29970_1.jpg', '2023-03-28 15:43:06', 2023),
(3, 'standard', 9, 'assets/sub_cat_img/98978_2.jpg', '2023-03-28 15:43:37', 2023),
(4, 'mini', 9, 'assets/sub_cat_img/81577_3.jpg', '2023-03-28 15:43:53', 2023),
(5, 'giant', 9, 'assets/sub_cat_img/20603_4.jpg', '2023-03-28 15:44:12', 2023),
(6, 'bouquet of flowers', 10, 'assets/sub_cat_img/9755_5.jpg', '2023-03-28 15:45:58', 2023),
(7, 'Flower Box', 10, 'assets/sub_cat_img/21677_6.jpg', '2023-03-28 15:46:18', 2023),
(8, 'Table Flower', 10, 'assets/sub_cat_img/26376_7.jpg', '2023-03-28 15:46:38', 2023),
(9, 'Bottle Flower', 10, 'assets/sub_cat_img/12851_8.jpg', '2023-03-28 15:47:20', 2023),
(10, 'Glass Cover', 11, 'assets/sub_cat_img/3081_9.jpg', '2023-03-28 15:47:54', 2023),
(11, 'immortal bouquet', 11, 'assets/sub_cat_img/22388_10.jpg', '2023-03-28 15:48:19', 2023),
(12, 'Preserved flower x Bluetooth speaker', 11, 'assets/sub_cat_img/3298_11.jpg', '2023-03-28 15:49:18', 2023),
(13, 'fantasy series', 11, 'assets/sub_cat_img/51029_12.jpg', '2023-03-28 15:49:46', 2023),
(14, 'flower box', 11, 'assets/sub_cat_img/28827_13.jpg', '2023-03-28 15:50:38', 2023),
(15, 'bouquet of flowers', 8, 'assets/sub_cat_img/35450_14.jpg', '2023-03-28 17:28:18', 2023);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flower_color`
--
ALTER TABLE `flower_color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `promo_code`
--
ALTER TABLE `promo_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
