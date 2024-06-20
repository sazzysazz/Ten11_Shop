-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Jun 19, 2024 at 08:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Shoes', '2024-06-10 23:04:33', '2024-06-12 06:49:31'),
(3, 'shirt', '2024-06-10 23:43:24', '2024-06-11 22:41:57'),
(8, 'Jeans', '2024-06-12 23:18:46', '2024-06-12 23:18:46'),
(9, 'Cargo', '2024-06-12 23:30:35', '2024-06-12 23:30:35'),
(11, 'Men', '2024-06-17 20:29:58', '2024-06-17 20:29:58'),
(12, 'Women', '2024-06-17 20:30:06', '2024-06-17 20:45:45'),
(14, 'Boy', '2024-06-17 20:30:40', '2024-06-17 20:30:40'),
(15, 'Girl', '2024-06-17 20:30:56', '2024-06-17 20:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, '1717654768-65cdb99b4f02e_1707981180_medium.jpg', '2024-06-05 23:19:28', '2024-06-05 23:19:28'),
(5, '1718002724-Coke_VIS1_330ml-e1660726978654.png', '2024-06-08 06:25:01', '2024-06-09 23:58:44'),
(7, '1718000363-80f6d092-a66b-42d1-a6a2-1c23278ebb3a.jpg', '2024-06-08 06:45:38', '2024-06-09 23:19:23'),
(8, '1718251938-images (1).jpg', '2024-06-12 21:12:18', '2024-06-12 21:12:18'),
(9, '1718339437-TEN11.png', '2024-06-12 21:20:14', '2024-06-13 21:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(41, '2014_10_12_000000_create_users_table', 1),
(42, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(43, '2019_08_19_000000_create_failed_jobs_table', 1),
(44, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(45, '2024_06_04_053959_create_logos_table', 1),
(46, '2024_06_04_054204_create_categories_table', 1),
(55, '2024_06_04_054324_create_products_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `cate_id` bigint(20) NOT NULL,
  `proName` varchar(255) NOT NULL,
  `regular_price` double(8,2) NOT NULL,
  `sale_price` double(8,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `views` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `cate_id`, `proName`, `regular_price`, `sale_price`, `qty`, `color`, `size`, `thumbnail`, `description`, `views`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'Brown Shirt', 20.00, 15.00, 20, 'Grey', 'S,M,L', '1718258862-T-Shirt (9)-cr-450x672 (2).jpg', 'this is shirt', 0, '2024-06-11 22:41:16', '2024-06-12 23:07:42'),
(4, 2, 3, '11 Shirt for Man', 20.00, 10.00, 12, 'Red,Black,Blue', 'S,M,L,XL', '1718258820-T-Shirt (9)-cr-450x672.jpg', 'this is red Shirt', 0, '2024-06-12 07:59:32', '2024-06-12 23:07:00'),
(5, 2, 3, 'Short Shirt', 20.00, 15.00, 11, 'Grey,Black', 'S,M,L,XL', '1718258767-T-Shirt (9)-cr-450x672 (1).jpg', 'this is long shirt', 0, '2024-06-12 08:01:31', '2024-06-12 23:09:55'),
(6, 2, 3, 'Man Shirt', 20.00, 15.00, 10, 'Blue,Grey,Black', 'S,M,L', '1718258387-T-Shirt (4)-cr-450x672.jpg', 'this is shirt', 0, '2024-06-12 21:23:11', '2024-06-12 22:59:47'),
(7, 2, 8, 'Black Jean', 30.00, 25.00, 10, 'Black', 'S,M,L', '1718259582-Trousers (2)-cr-450x672.jpg', 'this is jean', 0, '2024-06-12 23:19:42', '2024-06-12 23:19:42'),
(8, 2, 9, 'Brown Jean', 0.00, 25.00, 10, 'Grey', 'S,M,L', '1718259853-Trousers (2)-cr-450x672 (1).jpg', 'this is jean', 0, '2024-06-12 23:24:13', '2024-06-18 21:16:29'),
(9, 2, 8, 'Short Jean', 10.00, 8.00, 30, 'Grey,Black', 'S,M,L', '1718260016-Shorts (3)-cr-450x672.jpg', 'this is short jean', 0, '2024-06-12 23:26:56', '2024-06-12 23:26:56'),
(11, 2, 9, 'Long Short Cargo', 30.00, 25.00, 10, 'Blue', 'S,M,L', '1718260292-Trouser (8)-cr-450x672.jpg', 'this is cargo', 0, '2024-06-12 23:31:32', '2024-06-12 23:31:32'),
(12, 2, 9, 'long cargo', 30.00, 20.00, 10, 'Red', 'S,M,L', '1718260337-Trousers (8)-cr-450x672.jpg', 'this is cargo', 0, '2024-06-12 23:32:17', '2024-06-12 23:32:17'),
(15, 2, 3, 'T-Shirt With Print', 20.00, 17.00, 10, 'Black,White', 'S,M,L,XL', '1718339810-T-Shirt (2)-cr-450x672.jpg', 'T-shirt featuring short sleeves, crew neckline, with graphic print at the front and back.100% Cotton', 0, '2024-06-13 21:36:50', '2024-06-13 21:36:50'),
(16, 2, 15, 'Cardigan Blouse', 20.00, 10.00, 12, 'Red,Grey,White', 'S,M', '1718683144-T-Shirt (2)-cr-450x672 (1).jpg', '1 Colors available', 0, '2024-06-17 20:35:26', '2024-06-17 20:59:04'),
(17, 2, 14, 'Polo Shirts Kid', 20.00, 10.00, 11, 'Red,Black', 'S,M', '1718682957-POLO-WITH-PATCH (1)-cr-450x672.jpg', '4 Colors available', 0, '2024-06-17 20:36:20', '2024-06-17 20:56:23'),
(18, 2, 11, 'Polo Shirt', 20.00, 15.00, 2, 'Red,Grey,Black', 'S,M,L', '1718682685-Polo (3)-cr-450x672.jpg', 'this is short shirt', 0, '2024-06-17 20:37:08', '2024-06-17 20:51:25'),
(19, 2, 12, 'Short Hoodie', 0.00, 17.00, 12, 'Blue,Grey,Orange', 'S,M,L', '1718682718-Hoodie (3)-cr-450x672.jpg', 'this is woman short Hoodie', 0, '2024-06-17 20:38:29', '2024-06-17 21:13:36'),
(20, 2, 1, 'Unisex Slide Sandal', 0.00, 15.00, 10, 'Black', 'S,M,L', '1718770440-Slide (2)-cr-450x672 (1).jpg', '1 Colors available', 0, '2024-06-18 21:14:00', '2024-06-18 21:14:00'),
(21, 2, 1, 'Unisex Trainer Sneaker', 40.00, 30.00, 12, 'Black', 'S,M,L', '1718770545-Sneakers (10)-cr-450x672.jpg', '3 Colors available', 0, '2024-06-18 21:15:45', '2024-06-18 23:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `profile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `profile`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'coca', 'coca@gmail.com', NULL, '1718003176-images (3).jpg', '$2y$10$Ii9Idfu.D4UhZ/nAgppjyuK/WzBuUDOKE2KdSNWFKs2B0xtC7XTY2', NULL, '2024-06-05 23:59:37', '2024-06-10 00:06:16'),
(2, 'sazz', 'sazz@gmail.com', NULL, '1718267043-65cdb9a66ea4b_1707981180_medium.jpg', '$2y$10$wXUBGKuGAThatI1fJ.L5SupBG.84E5loZKABfJjv5VgDlE5Tv7Qfi', NULL, '2024-06-06 22:00:39', '2024-06-13 01:24:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
