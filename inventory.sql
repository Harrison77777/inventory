-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2019 at 10:00 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `advance_salaries`
--

CREATE TABLE `advance_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advance_salaries`
--

INSERT INTO `advance_salaries` (`id`, `emp_id`, `year`, `month`, `salary_amount`, `created_at`, `updated_at`) VALUES
(12, 1, '2019', 'Fabruary', '10000', '2019-08-15 16:05:22', '2019-08-15 16:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employe_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attend` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employe_id`, `date`, `month`, `year`, `attend`, `created_at`, `updated_at`) VALUES
(38, 1, '20-08-2019', 'August', '2019', 'Present', '2019-08-19 22:00:48', '2019-08-19 16:42:34'),
(39, 2, '20-08-2019', 'August', '2019', 'Absence', '2019-08-19 22:00:48', '2019-08-19 16:40:21'),
(40, 1, '22-08-2019', 'August', '2019', 'Absence', '2019-08-21 20:11:56', '2019-08-21 14:13:05'),
(41, 2, '22-08-2019', 'August', '2019', 'Absence', '2019-08-21 20:11:56', '2019-08-21 14:13:05'),
(42, 3, '22-08-2019', 'August', '2019', 'Present', '2019-08-21 20:11:56', '2019-08-21 14:12:56'),
(43, 4, '22-08-2019', 'August', '2019', 'Present', '2019-08-21 20:11:56', '2019-08-21 20:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_category_id`, `created_at`, `updated_at`) VALUES
(7, 'Electronics', NULL, '2019-08-15 17:19:35', '2019-08-15 17:19:35'),
(8, 'Car', NULL, '2019-08-16 12:13:59', '2019-08-16 12:13:59'),
(9, 'Mobile', 7, '2019-08-16 12:14:52', '2019-08-16 12:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_or_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_holder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `shop_or_company`, `bank_holder`, `bank_branch`, `bank_account`, `created_at`, `updated_at`) VALUES
(3, 'Shagour', 'shagour@gmail.com', '123456789102', 'Dhaka, Bangalesh', 'shagour enterprise', NULL, NULL, NULL, '2019-08-12 15:57:39', '2019-08-12 15:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE `employes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` decimal(8,2) NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`id`, `name`, `email`, `phone`, `address`, `experience`, `salary`, `city`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Shehab', 'shehab@gmail.com', '12312312345', 'Dhaka, Bangladesh', '3 years', '25000.00', 'Dhaka', '5d5068d7056c0.jpeg', '2019-08-11 13:13:27', '2019-08-11 13:13:27'),
(2, 'Shahana Parvin', 'shahana@gmail.com', '123456789123', 'Dhaka, Bangladesh', '3 years', '10000.00', 'Dhaka', '5d59ccccee4a1.jpeg', '2019-08-18 16:10:21', '2019-08-18 16:10:21'),
(3, 'Nadim', 'nadim@gmail.com', '12345678954', 'Dhaka, Bangladesh', '3 years', '25000.00', 'Dhaka', '5d5b2a0ddc3e9.jpeg', '2019-08-19 17:00:30', '2019-08-19 17:00:30'),
(4, 'Xohir', 'xohir@gmail.com', '123456789102', 'Dhaka,Bangladesh', '3 years', '25000.00', 'Dhaka', '5d5b2a68ade39.jpeg', '2019-08-19 17:02:00', '2019-08-19 17:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `expanses`
--

CREATE TABLE `expanses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expanses`
--

INSERT INTO `expanses` (`id`, `description`, `date`, `month`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'For Buy A Monitor', '16/08/2019', 'August', 10000, '2019-08-16 17:24:09', '2019-08-16 17:24:09'),
(2, 'Buy a pen', '16/08/2019', 'August', 5, '2019-08-16 17:25:59', '2019-08-16 17:25:59'),
(3, 'Buy a computer and a 16GB Pendrive 40000.00 and 10000', '16/08/2019', 'August', 41000, '2019-08-16 17:28:08', '2019-08-16 17:28:08'),
(4, 'Buy a paperweight for 100', '16/08/2019', 'August', 100, '2019-08-16 17:30:22', '2019-08-16 17:30:22'),
(5, 'Buy  some snacks for 200 Tk', '16/08/2019', 'August', 200, '2019-08-16 17:33:20', '2019-08-16 17:33:20'),
(6, 'Buy some food 800', '17/08/2019', 'August', 800, '2019-08-17 13:39:06', '2019-08-17 13:39:06'),
(7, 'Buy a laptop 35000', '18/08/2019', 'August', 35000, '2019-08-17 19:42:53', '2019-08-17 19:42:53'),
(8, 'Buy some material for the production 7000', '18/08/2019', 'August', 7000, '2019-08-17 19:45:47', '2019-08-17 19:45:47'),
(9, 'Buy a pen 5', '18/08/2019', 'August', 5, '2019-08-17 19:56:32', '2019-08-17 19:56:32'),
(10, 'Electricity Bill 30000', '18/08/2019', 'August', 30000, '2019-08-17 21:07:09', '2019-08-17 21:07:09'),
(11, 'Buy a calculator for 700', '19/08/2019', 'August', 700, '2019-08-18 19:20:47', '2019-08-18 19:20:47'),
(12, 'Hire a programmer for maintenance our web site for 25000', '20/08/2019', 'August', 25000, '2019-08-19 18:32:19', '2019-08-19 18:32:19'),
(13, 'Internet Bill 10,000.00 Tk.', '20/08/2019', 'August', 10000, '2019-08-19 18:46:25', '2019-08-19 18:46:25'),
(14, 'Water Bill 700 Tk', '20/08/2019', 'August', 700, '2019-08-19 19:38:27', '2019-08-19 19:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_10_181833_create_employes_table', 2),
(7, '2019_08_12_110044_create_customers_table', 3),
(8, '2019_08_13_102946_create_suppliers_table', 4),
(9, '2019_08_14_173528_create_advance_salaries_table', 5),
(11, '2019_08_15_203751_create_salaries_table', 6),
(13, '2019_08_15_221303_create_categories_table', 7),
(18, '2019_08_16_182820_create_products_table', 8),
(20, '2019_08_16_214452_create_expanses_table', 9),
(21, '2019_08_18_193007_create_attendances_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `vendor_price` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `supplier_id`, `name`, `brand`, `quantity`, `vendor_price`, `price`, `photo`, `storage_no`, `created_at`, `updated_at`) VALUES
(4, 8, 1, 'Toyota Corolla', 'Toyota', 20, 1200000, 1400000, '5d585ea347d77.png', 'Store B', '2019-08-17 14:08:03', '2019-08-17 14:08:03'),
(5, 8, 1, 'Mitsubishi Royal Cart', 'Mitsubishi', 20, 1200000, 1400000, '5d585fae7b47b.jpg', 'Store B', '2019-08-17 14:12:30', '2019-08-17 14:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `pay_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Main_supplier_or_distributor',
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `payment_way` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `shop_address`, `type`, `photo`, `payment_way`, `created_at`, `updated_at`) VALUES
(1, 'Shamiul Islam', 'shamiul@gmail.com', '123456789123', 'Dhaka, Bangladesh.', 'Dhaka', '1', '5d5325397e2c9.jpeg', 'Card', '2019-08-13 12:46:59', '2019-08-13 15:01:45'),
(2, 'Kobir Islam', 'kabir@gmail.com', '12345678954', 'Khulna, Bangladesh.', 'Khulna', '3', '5d5af09822338.jpeg', 'Bikash', '2019-08-19 12:55:21', '2019-08-19 12:55:21'),
(3, 'Shakib Khan', 'shakib@gmail.com', '123456789102', 'Dhaka, Bangladesh', 'Dhaka', '2', '5d5b2c18d124c.jpg', 'Card', '2019-08-19 17:09:13', '2019-08-19 17:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Harrison', 'ermhroy@gmail.com', 1, '$2y$10$GUTjbMCONuOF6MiJhvPIk.gSm4Z7SAy0BLykG4M9RnZ.2N4ntCyGW', NULL, '2019-08-10 05:43:24', '2019-08-10 05:43:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advance_salaries`
--
ALTER TABLE `advance_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_employe_id_foreign` (`employe_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_category_id_foreign` (`parent_category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expanses`
--
ALTER TABLE `expanses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_emp_id_foreign` (`emp_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT for table `advance_salaries`
--
ALTER TABLE `advance_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expanses`
--
ALTER TABLE `expanses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_employe_id_foreign` FOREIGN KEY (`employe_id`) REFERENCES `employes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
