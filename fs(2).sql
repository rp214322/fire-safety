-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 11:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fs`
--

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `user_id`, `product_id`, `name`, `email`, `phone`, `description`, `status`, `created_at`, `updated_at`) VALUES
(18, NULL, NULL, 'ritesh', 'rphfhs@gmail.com', '9635632569', 'ddfjkj', 1, '2024-04-15 22:44:02', '2024-06-20 11:02:11'),
(19, NULL, NULL, 'sjkdfjs', 'jfhdjfh@klf.cpo', '89898989898', 'sslkfdlf', 0, '2024-04-16 02:12:22', '2024-04-16 02:12:22'),
(20, NULL, NULL, 'jkkfhkj', 'dfkj@jlf.com', '9897989798', 'kjhkjf', 0, '2024-04-16 02:15:22', '2024-04-16 02:15:22'),
(21, NULL, NULL, 'Ritest', 'rp214322@gmail.com', '9879879879', 'hdfjh', 0, '2024-05-16 12:38:48', '2024-05-16 12:38:48'),
(22, NULL, 6, 'Ritest', 'rp214322@gmail.com', '9879879879', 'dgggd', 1, '2024-05-16 13:21:08', '2024-06-20 11:00:05');

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
(14, '2024_05_15_132527_create_products_table', 3),
(15, '2024_05_15_132709_create_product_galleries_table', 3),
(16, '2024_05_16_182506_rename_vehicle_id_to_product_id_in_inquiries_table', 4),
(17, '2024_05_16_191429_create_users_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('devanshiballer12i@gmail.com', '$2y$10$6R5k4ohAGLH3X9g5j/IwreiU9Nr0gR8bQT4zsRMBL7.zYvIGY1o0y', '2023-10-25 08:49:42');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `price` decimal(16,2) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `description`, `created_at`, `updated_at`) VALUES
(4, 'Fire extinguisher', 'fire-extinguisher', 1250.00, '<p>A fire extinguisher is a pressurized container that discharges a chemical fire retardant or smothering agent to extinguish a fire. There are different types of fire extinguishers for different types of fires, so it&#39;s important to choose the right one&nbsp;for&nbsp;your&nbsp;home</p>\r\n\r\n<p>&nbsp;</p>', '2024-05-16 11:47:52', '2024-05-16 11:47:52'),
(5, 'Fire Escapee ladder', 'fire-escapee-ladder', 30000.00, '<p>A fire escape ladder is a portable ladder that allows you to escape from a building through a window in case of a fire. Fire escape ladders are especially important for homes that do not have fire escapes on&nbsp;the&nbsp;exterior.</p>', '2024-05-16 11:48:41', '2024-05-16 11:48:41'),
(6, 'Carbon monoxide detector', 'carbon-monoxide-detector', 2000.00, '<p>While not directly related to fire fighting, a carbon monoxide detector is a crucial fire safety product.&nbsp; Carbon monoxide (CO) is an odorless, colorless gas that can be produced by fires and faulty appliances. CO detectors sound an alarm when they detect CO levels that are too high, which can give you time to evacuate your home and avoid&nbsp;CO&nbsp;poisoning.</p>', '2024-05-16 11:49:39', '2024-05-16 11:49:39'),
(7, 'Fireproof safe', 'fireproof-safe', 2500.00, '<p>A fireproof safe is a container that is designed to protect your valuables from fire damage. Fireproof safes are made of special materials that can withstand high temperatures for a period of time. This can give you peace of mind knowing that your important documents, photos, and other valuables will be safe in the event&nbsp;of&nbsp;a&nbsp;fire.</p>', '2024-05-16 11:50:00', '2024-05-16 11:50:00'),
(8, 'Fire alarm', 'fire-alarm', 2000.00, '<p>A fire alarm system is a network of detectors, alarms, and control panels that are designed to warn people of a fire. Fire alarm systems can be connected to a fire department so that firefighters can be dispatched to the scene of the fire&nbsp;immediately.</p>', '2024-05-16 11:50:27', '2024-05-16 11:50:27'),
(9, 'Fire blanket', 'fire-blanket', 5000.00, '<p>A fire blanket is a thick, flame-retardant cloth that can be used to smother a small fire. Fire blankets are especially useful for smothering grease fires on&nbsp;the&nbsp;stovetop.</p>', '2024-05-16 11:50:49', '2024-05-16 11:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `file_name`, `file_type`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 2, 'img.jpg', 'image', 0, '2024-05-15 11:07:21', '2024-05-15 11:16:47'),
(3, 2, 'sam.jpg', 'image', 0, '2024-05-15 11:11:56', '2024-05-15 11:16:47'),
(4, 2, 'sam.jpg', 'image', 0, '2024-05-15 11:15:42', '2024-05-15 11:16:47'),
(5, 2, 'sam.jpg', 'image', 0, '2024-05-15 21:32:14', '2024-05-15 21:32:14'),
(6, 9, 'interaction.jpg', 'image', 0, '2024-05-16 21:20:14', '2024-05-16 21:20:14'),
(7, 9, 'Photo.jpg', 'image', 0, '2024-06-20 09:00:50', '2024-06-20 09:00:50'),
(8, 9, 'IMG-20211009-WA0010.jpg', 'image', 0, '2024-06-20 09:01:04', '2024-06-20 09:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `first_name`, `last_name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '', NULL, 'admin@example.com', '2024-05-16 13:45:11', '$2y$10$E0drLXxugIQbxCN5B3b5c.xrUMOH32Gm5fy.acEZIDl7r6NywGnOq', 'S2BPbVwCIGHcAUqkUKjAYLMkWT53dTk2lp8AX5Q5SRwoO5uMZJnxfoQkxRMj', '2024-05-16 13:45:11', '2024-05-16 13:45:11'),
(2, 'customer', 'Orval Ortiz', 'Clair Emard', NULL, 'strosin.dejuan@example.org', '2024-05-16 13:45:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RMGhRNv3id', '2024-05-16 13:45:11', '2024-05-16 13:45:11'),
(3, 'customer', 'Dr. Maiya Mueller', 'Wayne Batz', NULL, 'mac93@example.org', '2024-05-16 13:45:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HRp4PTyHrR', '2024-05-16 13:45:11', '2024-05-16 13:45:11'),
(4, 'customer', 'Hobart Smith', 'Onie Zemlak Jr.', NULL, 'oconner.rosario@example.org', '2024-05-16 13:45:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QgVMZSlp1g', '2024-05-16 13:45:11', '2024-05-16 13:45:11'),
(5, 'customer', 'Jayde Howe', 'Camden Nolan', NULL, 'qkiehn@example.org', '2024-05-16 13:45:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pwlivgddq3', '2024-05-16 13:45:12', '2024-05-16 13:45:12'),
(6, 'customer', 'Astrid Kuhn', 'Frank Rowe MD', NULL, 'malvina.auer@example.net', '2024-05-16 13:45:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gIdAOt9Qqk', '2024-05-16 13:45:12', '2024-05-16 13:45:12'),
(7, 'customer', 'Gregorio Stoltenberg DVM', 'Camren Kunde Sr.', NULL, 'smarvin@example.net', '2024-05-16 13:45:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ih37ReJD5C', '2024-05-16 13:45:12', '2024-05-16 13:45:12'),
(8, 'customer', 'Prof. Keyshawn Purdy', 'Dr. Leanna Wunsch DVM', NULL, 'kub.nettie@example.com', '2024-05-16 13:45:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4elK7ti7ye', '2024-05-16 13:45:12', '2024-05-16 13:45:12'),
(9, 'customer', 'Zackery Mills', 'Monty Kessler Sr.', NULL, 'windler.zakary@example.com', '2024-05-16 13:45:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FsHZOek7Bv', '2024-05-16 13:45:12', '2024-05-16 13:45:12'),
(10, 'customer', 'Luz Zboncak', 'D\'angelo Larson', NULL, 'garrick.bernier@example.org', '2024-05-16 13:45:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'o75oT8gYp8', '2024-05-16 13:45:12', '2024-05-16 13:45:12'),
(11, 'customer', 'Ms. Camille Kihn', 'Gustave Satterfield V', NULL, 'ebert.keely@example.com', '2024-05-16 13:45:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '09Zats7oDf', '2024-05-16 13:45:12', '2024-05-16 13:45:12'),
(12, 'customer', 'biraj', 'patel', '9898646718', 'birajdiyora1@gmail.com', NULL, '$2y$10$1eyIcRNasjcAK8YzLQ6Be.s5MzPZbpvalq7SSoR0CNCPa9hF5QSV2', NULL, '2024-05-16 21:18:38', '2024-05-16 21:18:38'),
(13, 'customer', 'Rano', 'Ramesh', '9876545658', 'ranoramesh@yopmail.com', NULL, '$2y$10$CS7BAeG0vkItXjXLmygO8eAEVR8OY8nHfKipdruHCNbU3LF6lkCy.', NULL, '2024-06-20 08:43:18', '2024-06-20 08:43:18'),
(14, 'customer', 'birak', 'patel', '9898646718', 'biraj@gmail.com', NULL, '$2y$10$5oLGhAyMYQuNPQcNRmpkr.sEmAOosDBkr6AZ10ZI1BSlDrQv8wwKa', NULL, '2024-06-20 10:55:02', '2024-06-20 10:55:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
