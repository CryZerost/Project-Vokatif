-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 10:06 AM
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
-- Database: `projectv-dt`
--
CREATE DATABASE IF NOT EXISTS `projectv-dt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projectv-dt`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `route` varchar(255) NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `route`, `admin_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Photography', 'Ini adalah kategori untuk fotografi.', 'photography', 1, '/category_images/potography thumbnail (1).png', '2023-06-18 10:30:23', '2023-06-22 02:02:01'),
(2, 'Videography', '-', 'videography', 1, '/category_images/videography thumbnail (1).png', '2023-06-18 10:30:35', '2023-06-18 10:30:35'),
(3, 'Graphic Design', '-', 'graphicdesign', 1, '/category_images/DesignGraphy.png', '2023-06-18 10:30:56', '2023-06-18 10:30:56'),
(4, 'Game Production', '-', 'gameproduction', 1, '/category_images/game thumbnail (1).png', '2023-06-18 10:31:34', '2023-06-18 10:31:34'),
(5, 'Web Development', '-', 'webdevelopment', 1, '/category_images/web development thumbnail (1).png', '2023-06-18 10:31:55', '2023-06-18 10:31:55'),
(6, 'Audio', '-', 'audio', 1, '/category_images/audiography thumbnail (1).png', '2023-06-18 10:32:06', '2023-06-18 10:32:06');

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
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2023_05_24_072018_add_role_to_users', 1),
(15, '2023_05_24_073534_add_new_fields_to_users', 1),
(16, '2023_06_05_033118_create_categories_table', 1),
(17, '2023_06_15_055632_create_posts_table', 1),
(18, '2023_06_15_063141_create_post_images', 1),
(19, '2023_06_22_062018_add_link_to_post', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `category_id`, `user_id`, `created_at`, `updated_at`, `link`) VALUES
(1, 'Project Astral', 'Berikut ialah sebuah project pengembangan game yaitu Project Astral yang mengambil refrensi dari game-game yang sudah pernah ada sebelumnya seperti Vampir Survivors dan Holo Cure.', 4, 1, '2023-06-18 10:45:09', '2023-06-22 00:04:29', 'https://meowost.itch.io/astral-project'),
(2, 'Typograph Indonesia', 'Typograph Indonesia untuk memeriahkan acara 17 agustus yaitu hari kemerdekaan indonesia.', 3, 2, '2023-06-18 10:56:25', '2023-06-18 10:56:25', NULL),
(9, 'Sketch Art', '.', 3, 4, '2023-06-22 00:34:05', '2023-06-22 00:35:47', NULL),
(10, 'Sunset', 'Sunset di Harbour Bay.', 1, 5, '2023-06-22 00:37:13', '2023-06-22 00:37:13', NULL),
(11, 'Apex Legends', 'P, adu aim.', 4, 3, '2023-06-22 00:39:09', '2023-06-22 00:39:09', NULL),
(12, 'Wallpaper HD.', 'Wallpaper HD.', 3, 1, '2023-06-22 00:48:10', '2023-06-22 00:48:10', NULL),
(14, 'Video Demo - Web Vokatif', 'judul proyek : Web Aplikasi Publikasi Kreatifitas Polibatam \r\nDeskripsi Proyek :Deskripsi Proyek\r\nWeb kami memungkinkan pengguna untuk menerbitkan dan membagikan karya kreatif mereka di berbagai kategori multimedia. Pengembangan aplikasi ini melibatkan berbagai bidang field seperti pemograman web ,desaon grafis dan lainnya.\r\nManager proyek : Happy Yugo prasetya\r\nEmail ketua : ilhamtaufik600@gmail.com\r\n\r\nIdentitas tim :\r\n4312201124\r\nIlham taufik Hidayat \r\n\r\n4312201121\r\nAliya Khairunnisa Azzahra\r\n\r\n4312201118\r\nNaufal Abdurrahman Dzaki \r\n\r\n4312201110\r\nAlita Affriliyanti', 2, 3, '2023-06-23 01:05:33', '2023-06-23 01:05:33', 'https://youtu.be/fIG4v73tOGc');

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

CREATE TABLE `post_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_images`
--

INSERT INTO `post_images` (`id`, `post_id`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, 'post-images/1687110309_1.png', '2023-06-18 10:45:09', '2023-06-18 10:45:09'),
(2, 1, 'post-images/1687110309_2.png', '2023-06-18 10:45:09', '2023-06-18 10:45:09'),
(3, 1, 'post-images/1687110309_3.jpg', '2023-06-18 10:45:09', '2023-06-18 10:45:09'),
(4, 1, 'post-images/1687110309_4.png', '2023-06-18 10:45:09', '2023-06-18 10:45:09'),
(5, 1, 'post-images/1687110309_5.png', '2023-06-18 10:45:09', '2023-06-18 10:45:09'),
(6, 2, 'post-images/1687110985_WhatsApp Image 2023-06-19 at 00.36.05.jpg', '2023-06-18 10:56:25', '2023-06-18 10:56:25'),
(7, 9, 'post-images/1687419245_WhatsApp Image 2023-06-22 at 14.26.23.jpg', '2023-06-22 00:34:05', '2023-06-22 00:34:05'),
(8, 10, 'post-images/1687419433_WhatsApp Image 2023asd-06-22 at 14.30.25.jpg', '2023-06-22 00:37:13', '2023-06-22 00:37:13'),
(9, 10, 'post-images/1687419433_WhatsApp Image 2023-06-22 at 14.30.25.jpg', '2023-06-22 00:37:13', '2023-06-22 00:37:13'),
(10, 10, 'post-images/1687419433_WhatsApp Image 2023-asd06-22 at 14.30.25.jpg', '2023-06-22 00:37:13', '2023-06-22 00:37:13'),
(11, 11, 'post-images/1687419549_WhatsApp Image 2023-06-22 at 14.28.38.jpg', '2023-06-22 00:39:09', '2023-06-22 00:39:09'),
(12, 11, 'post-images/1687419549_WhatsApp Image 2023-06-22 at 14.28.06.jpg', '2023-06-22 00:39:09', '2023-06-22 00:39:09'),
(13, 11, 'post-images/1687419549_WhatsApp Image 2023-06-22 at 14.27.57.jpg', '2023-06-22 00:39:09', '2023-06-22 00:39:09'),
(14, 11, 'post-images/1687419549_WhatsApp Image 2023-06-22 at 14.24.01.jpg', '2023-06-22 00:39:09', '2023-06-22 00:39:09'),
(15, 12, 'post-images/1687420090_wallpaperflare.com_wallpaper (1).jpg', '2023-06-22 00:48:10', '2023-06-22 00:48:10'),
(16, 12, 'post-images/1687420090_wallpaperflare.com_wallpaper.jpg', '2023-06-22 00:48:10', '2023-06-22 00:48:10'),
(17, 12, 'post-images/1687420090_digital-digital-art-artwork-fantasy-art-drawing-hd-wallpaper-thumb.jpg', '2023-06-22 00:48:10', '2023-06-22 00:48:10'),
(18, 12, 'post-images/1687420090_2023042220065800-05F51C94901DB4C57A6F093F704A02B5.jpg', '2023-06-22 00:48:10', '2023-06-22 00:48:10'),
(20, 14, 'post-images/1687507533_image_1.png', '2023-06-23 01:05:33', '2023-06-23 01:05:33'),
(21, 14, 'post-images/1687507533_image_4.png', '2023-06-23 01:05:33', '2023-06-23 01:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'student',
  `username` varchar(255) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `username`, `prodi`, `bio`, `remember_token`, `created_at`, `updated_at`, `avatar`) VALUES
(1, 'Ilham Taufik Hidayat', 'ilham@informatika.ac.id', NULL, '$2y$10$xAj75uNDHiq5nud1sHgU.ufv0WtaMUNoBlfAtAwVdKOx59nHfBuwe', 'admin', 'Meowost', 'Teknik Informatika', 'Saya suka Eimi Fukada.', NULL, '2023-06-18 10:28:15', '2023-06-22 00:52:51', '1687420371.jpg'),
(2, 'Alita Affriliyanti', 'alita@informatika.ac.id', NULL, '$2y$10$8hMIucsJn80.hu7S1wNUA.HmAAS3yTBSeQ73j4lpQ9/wgu3g0lZHe', 'student', 'Alita', 'Teknik Informatika', NULL, NULL, '2023-06-18 10:53:27', '2023-06-22 02:02:31', '1687111134.jpg'),
(3, 'Naufal Abdurrahman Dzaky', 'jiro@informatika.ac.id', NULL, '$2y$10$me/oLFj20oXFu8xCgQsjO.i97WEdV53KKbL0wsyf3smVuBN6T20p2', 'student', 'Jiro', 'Multimedia dan Jaringan', NULL, NULL, '2023-06-22 00:21:54', '2023-06-22 00:38:17', '1687419497.jpg'),
(4, 'Aliya Khairunnisa Azzahra', 'Aliya@informatika.ac.id', NULL, '$2y$10$MyNROvN.1qaih2Ff54zd4OLkrk7uQ/RHO7mFO2uVpWsbufc22HQRe', 'student', 'Rynn.', 'Teknik Informatika', NULL, NULL, '2023-06-22 00:22:54', '2023-06-22 00:46:25', '1687419204.jpg'),
(5, 'Nabeel Ihsan', 'Nabil@informatika.ac.id', NULL, '$2y$10$rjrCJyUVkdw/DzyMae5Mqehb.Ou5SX9gT28oUnXUuk1cbgZaWH5/q', 'student', 'NabilBukanNabila', 'Teknik Informatika', NULL, NULL, '2023-06-22 00:28:22', '2023-06-22 00:36:19', '1687419379.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_images_post_id_foreign` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_images`
--
ALTER TABLE `post_images`
  ADD CONSTRAINT `post_images_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
