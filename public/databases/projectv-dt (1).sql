-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 02:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(8, 'Awsome!', 2, 30, '2023-08-04 03:54:32', '2023-08-04 03:54:32'),
(9, 'Keren!', 3, 30, '2023-08-04 03:55:41', '2023-08-04 03:55:41'),
(10, 'Mantap!', 5, 30, '2023-08-04 03:58:13', '2023-08-04 03:58:13'),
(11, 'Terimakasih semua!', 4, 30, '2023-08-04 05:37:41', '2023-08-04 05:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(11, 1, 29, '2023-08-03 07:53:20', '2023-08-03 07:53:20'),
(12, 2, 30, '2023-08-04 03:03:59', '2023-08-04 03:03:59'),
(13, 2, 1, '2023-08-04 03:08:01', '2023-08-04 03:08:01'),
(14, 2, 9, '2023-08-04 03:47:55', '2023-08-04 03:47:55'),
(15, 2, 10, '2023-08-04 03:48:04', '2023-08-04 03:48:04');

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
(19, '2023_06_22_062018_add_link_to_post', 2),
(20, '2023_06_24_200046_create_likes_table', 3),
(21, '2023_08_01_003256_add_thumbnail_to_posts', 4),
(22, '2023_08_01_010709_add_thumbnail_to_posts', 5),
(23, '2023_08_01_023249_add_youtube_links_to_posts_table', 6),
(24, '2023_08_01_044346_create_comments_table', 7),
(25, '2023_08_01_045858_create_comments_table', 8),
(26, '2023_08_01_050610_modify_comments_table_add_nullable_user_id', 9),
(27, '2023_08_03_151053_create_comments_table', 10),
(28, '2023_08_03_160748_create_comments_table', 11);

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
  `link` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `demo` varchar(255) DEFAULT NULL,
  `teaser` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `category_id`, `user_id`, `created_at`, `updated_at`, `link`, `thumbnail`, `demo`, `teaser`) VALUES
(1, 'Project Astral', 'Berikut ialah sebuah project pengembangan game yaitu Project Astral yang mengambil refrensi dari game-game yang sudah pernah ada sebelumnya seperti Vampir Survivors dan Holo Cure.', 4, 1, '2023-06-18 10:45:09', '2023-07-31 19:08:31', 'https://meowost.itch.io/astral-project', 'thumbnails/1690855711_1687110309_1.png', NULL, NULL),
(2, 'Typograph Indonesia', 'Typograph Indonesia untuk memeriahkan acara 17 agustus yaitu hari kemerdekaan indonesia.', 3, 2, '2023-06-18 10:56:25', '2023-06-18 10:56:25', NULL, NULL, NULL, NULL),
(9, 'Sketch Art', '.', 3, 4, '2023-06-22 00:34:05', '2023-06-22 00:35:47', NULL, NULL, NULL, NULL),
(10, 'Sunset', 'Sunset di Harbour Bay.', 1, 5, '2023-06-22 00:37:13', '2023-06-22 00:37:13', NULL, NULL, NULL, NULL),
(29, 'Aku Si Penjual Bunga', 'AKU SI PENJUAL BUNGA adalah sebuah game yang dibuat dalam event Game Jam Batam yang diselenggarakan oleh komunitas Game Developer Batam.\r\n\r\nAnggota :\r\nProgrammer - Jackson Lee\r\nArtist Design - Vivie Triyanti\r\nGame Design - Ilham Taufik Hidayat', 4, 1, '2023-08-03 07:52:09', '2023-08-03 07:56:23', 'https://meowost.itch.io/aku-si-penjual-bunga', 'thumbnails/1691074583_test1.jpeg', NULL, 'https://www.youtube.com/watch?v=3rRj7eKm5PI'),
(30, 'Flower Fetch', 'A Collab By Vincent Tayanto (3D Modeler and Game Designer), Hansen Winoto (Programming) and Aliya Khairunnisa Azzahra (2D Artist)\r\n\r\nMade in 3 Days\r\n\r\n\r\n\r\nWASD - Movement\r\n\r\nMouse - Look Around', 4, 4, '2023-08-04 02:49:06', '2023-08-04 02:49:06', 'https://reariatedex.itch.io/flower-fetch', NULL, 'https://www.youtube.com/watch?v=GHNK-YiINT8', NULL),
(31, 'Bloom Garden', 'Team Sakura \r\n\r\n- Erwin\r\n\r\n- Alita Afrilliyanti\r\n\r\n- Yuriko  Aishinselo\r\n\r\n\r\nGame ini merupakan game bergenre adventure yang mengharuskan pemain untuk menanam bibit yang sudah disediakan dan kemudian dijual kepada customer. Game kami terinspirasi dari  sebuah taman indah di Bali. Jadi kami ingin menciptakan taman tersebut melalui game kami, melalui keindahan bunga - bunga yang ada. Kami menyediakan 3 jenis bunga sebagai tahapan awal dengan kualitas tersendiri tergantung bagaimana cara kita merawatnya.', 4, 2, '2023-08-04 03:02:59', '2023-08-04 03:02:59', 'https://erwinnn-n.itch.io/bloom-garden', NULL, 'https://www.youtube.com/watch?v=JXZSPKx4hDY', NULL),
(32, 'Aplikasi Web Pembayaran Sampah', 'The waste payment web application is a digital platform designed to facilitate the community in making monthly waste fee payments. This web application also aims to make it easier, faster, and more reliable for the community to find information on monthly bills and make payments.', 5, 7, '2023-08-05 03:35:16', '2023-08-05 03:35:16', NULL, NULL, 'https://www.youtube.com/watch?v=dwZ1gKAP2RQ&feature=youtu.be', NULL),
(33, 'Aplikasi Web Kerajinan BinBin', 'Aplikasi Web Kerajinan BinBin', 5, 8, '2023-08-05 03:39:05', '2023-08-05 03:39:05', NULL, 'thumbnails/1691231945_yogi (7).jpg', 'https://youtu.be/SqZvG96k7U4', NULL),
(34, 'Vokatif', 'Aplikasi Web Publikasi Kreativitas Mahasiswa', 5, 4, '2023-08-08 15:02:47', '2023-08-08 15:02:47', NULL, 'thumbnails/1691532167_Component 1 1.png', NULL, NULL);

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
(32, 29, 'post-images/1691074329_31VNi8.jpeg', '2023-08-03 07:52:09', '2023-08-03 07:52:09'),
(33, 29, 'post-images/1691074329_b7TGmi.jpeg', '2023-08-03 07:52:09', '2023-08-03 07:52:09'),
(34, 29, 'post-images/1691074329_DDWR_Z.jpeg', '2023-08-03 07:52:09', '2023-08-03 07:52:09'),
(35, 29, 'post-images/1691074329_z45AsN.jpeg', '2023-08-03 07:52:09', '2023-08-03 07:52:09'),
(36, 30, 'post-images/1691142546_9TNGFj.jpg', '2023-08-04 02:49:06', '2023-08-04 02:49:06'),
(37, 30, 'post-images/1691142546_hJ7XpJ.jpg', '2023-08-04 02:49:06', '2023-08-04 02:49:06'),
(38, 30, 'post-images/1691142546_je1Kdi.jpg', '2023-08-04 02:49:06', '2023-08-04 02:49:06'),
(39, 30, 'post-images/1691142546_RKvAqu.jpg', '2023-08-04 02:49:06', '2023-08-04 02:49:06'),
(40, 30, 'post-images/1691142546_TTEIlu.jpg', '2023-08-04 02:49:06', '2023-08-04 02:49:06'),
(41, 31, 'post-images/1691143379_B31UT4.png', '2023-08-04 03:02:59', '2023-08-04 03:02:59'),
(42, 31, 'post-images/1691143379_CBxMIa.png', '2023-08-04 03:02:59', '2023-08-04 03:02:59'),
(43, 31, 'post-images/1691143379_vQpLEs.png', '2023-08-04 03:02:59', '2023-08-04 03:02:59'),
(44, 32, 'post-images/1691231716_kris3.jpg', '2023-08-05 03:35:16', '2023-08-05 03:35:16'),
(45, 32, 'post-images/1691231716_kris2.jpg', '2023-08-05 03:35:16', '2023-08-05 03:35:16'),
(46, 32, 'post-images/1691231716_kris1.jpg', '2023-08-05 03:35:16', '2023-08-05 03:35:16'),
(47, 33, 'post-images/1691231945_yogi (2).jpg', '2023-08-05 03:39:05', '2023-08-05 03:39:05'),
(48, 33, 'post-images/1691231945_yogi (3).jpg', '2023-08-05 03:39:05', '2023-08-05 03:39:05'),
(49, 33, 'post-images/1691231945_yogi (4).jpg', '2023-08-05 03:39:05', '2023-08-05 03:39:05'),
(50, 33, 'post-images/1691231945_yogi (5).jpg', '2023-08-05 03:39:05', '2023-08-05 03:39:05'),
(51, 33, 'post-images/1691231945_yogi (6).jpg', '2023-08-05 03:39:05', '2023-08-05 03:39:05'),
(52, 33, 'post-images/1691231945_yogi (8).jpg', '2023-08-05 03:39:05', '2023-08-05 03:39:05'),
(53, 33, 'post-images/1691231945_yogi (1).jpg', '2023-08-05 03:39:05', '2023-08-05 03:39:05'),
(54, 34, 'post-images/1691532167_Screenshot_1.png', '2023-08-08 15:02:47', '2023-08-08 15:02:47'),
(55, 34, 'post-images/1691532167_Screenshot_2.png', '2023-08-08 15:02:47', '2023-08-08 15:02:47'),
(56, 34, 'post-images/1691532167_Screenshot_4.png', '2023-08-08 15:02:47', '2023-08-08 15:02:47'),
(57, 34, 'post-images/1691532167_Screenshot_5.png', '2023-08-08 15:02:47', '2023-08-08 15:02:47'),
(58, 34, 'post-images/1691532167_Screenshot_6.png', '2023-08-08 15:02:47', '2023-08-08 15:02:47'),
(59, 34, 'post-images/1691532167_Screenshot_8.png', '2023-08-08 15:02:47', '2023-08-08 15:02:47'),
(60, 34, 'post-images/1691532167_Screenshot_9.png', '2023-08-08 15:02:47', '2023-08-08 15:02:47'),
(61, 34, 'post-images/1691532167_Screenshot_10.png', '2023-08-08 15:02:47', '2023-08-08 15:02:47'),
(62, 34, 'post-images/1691532167_Screenshot_11.png', '2023-08-08 15:02:47', '2023-08-08 15:02:47'),
(63, 34, 'post-images/1691532167_Screenshot_14.png', '2023-08-08 15:02:47', '2023-08-08 15:02:47');

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
(2, 'Alita Affriliyanti', 'alita@informatika.ac.id', NULL, '$2y$10$.sY1sLl6.h/QmyFukxCjMuveZ9apVNwxnChRysDyxzLIwmnkNyh46', 'student', 'Alita', 'Multimedia dan Jaringan', NULL, NULL, '2023-06-18 10:53:27', '2023-08-04 02:54:56', '1687111134.jpg'),
(3, 'Naufal Abdurrahman Dzaky', 'jiro@informatika.ac.id', NULL, '$2y$10$me/oLFj20oXFu8xCgQsjO.i97WEdV53KKbL0wsyf3smVuBN6T20p2', 'student', 'Jiro', 'Multimedia dan Jaringan', NULL, NULL, '2023-06-22 00:21:54', '2023-06-22 00:38:17', '1687419497.jpg'),
(4, 'Aliya Khairunnisa Azzahra', 'Aliya@informatika.ac.id', NULL, '$2y$10$8phCR1ZZzvG6JZQclI70r.TaLtnoWMw2I4WI4kNPj1hTVVbnwNCyq', 'student', 'Rynn.', 'Multimedia dan Jaringan', 'I love a cat <3 and Mixue!', '8n8pjUP6FKfBoFYy0mVPW0ThS18oYMsA5jM0xpoepPWFqTTKEmZcTfLuYVhm', '2023-06-22 00:22:54', '2023-08-08 15:36:12', '1687419204.jpg'),
(5, 'Nabeel Ihsan', 'Nabil@informatika.ac.id', NULL, '$2y$10$rjrCJyUVkdw/DzyMae5Mqehb.Ou5SX9gT28oUnXUuk1cbgZaWH5/q', 'student', 'NabilBukanNabila', 'Teknik Informatika', NULL, NULL, '2023-06-22 00:28:22', '2023-06-22 00:36:19', '1687419379.jpg'),
(7, 'Elia Kristian Harefa', 'Kris@informatika.ac.id', NULL, '$2y$10$Jksa/11TluHfD4mgr/vqtu6O5S2lY4ejJoACPaKlqnKo4ocst90dC', 'student', 'Elia', 'Multimedia dan Jaringan', NULL, NULL, '2023-08-05 03:33:39', '2023-08-05 03:33:59', '1691231639.jpg'),
(8, 'Yogianto', 'yogi@informatika.ac.id', NULL, '$2y$10$4cnkPXYoTpLuCunh40rMA.vGXrWyw7/QOXRuh28I7e3qbCiKAPCPu', 'student', 'igoy', 'Multimedia dan Jaringan', NULL, NULL, '2023-08-05 03:36:01', '2023-08-05 03:36:15', '1691231775.jpg'),
(9, 'Henderson Runolfsson', 'mara85@example.org', '2023-08-05 04:11:15', '$2y$10$zXFiYk2SjQZAcRmgZWG72OTHF2KX5CyYTxLk5ZHtkpGvSsFHUgp96', 'student', 'lindgren.jett', 'Teknik Geomatika', 'Et nihil id fuga libero repudiandae eum.', 'ofQ5NIGvfO', '2023-08-05 04:11:16', '2023-08-05 04:11:16', NULL),
(10, 'Kyleigh Schamberger', 'cummings.alessandro@example.org', '2023-08-05 04:11:15', '$2y$10$Q/3jhRi6PKdIpKKaflCzVuN1tz0YDVNLD5owC.G0vL8ASu/CWnP0.', 'student', 'douglas.jasper', 'Multimedia dan Jaringan', 'Numquam eos quo inventore eveniet dicta id.', 'p1os73Q1bW', '2023-08-05 04:11:16', '2023-08-05 04:11:16', NULL),
(11, 'Gia Schoen DDS', 'gusikowski.donna@example.net', '2023-08-05 04:11:15', '$2y$10$wle3FI5JiGydyV7n1f6kMuaLFgS2xWCywLys5iBY3zbckMEH4vVI6', 'student', 'jarod.schmidt', 'Multimedia dan Jaringan', 'Magnam suscipit aliquid quo voluptatem vel.', 'Tn4dG4K0PT', '2023-08-05 04:11:16', '2023-08-05 04:11:16', NULL),
(12, 'Prof. Mable Champlin', 'heathcote.dimitri@example.com', '2023-08-05 04:11:16', '$2y$10$EAUDBOIns2iZ79matcvsnujCb.uV/xSvxc1dHPgj1ClBdx4yZPcSK', 'student', 'towne.ebba', 'TRPL', 'Et adipisci omnis dolores optio deleniti.', 'Wxm5JMMZQa', '2023-08-05 04:11:16', '2023-08-05 04:11:16', NULL),
(13, 'Dr. Shany Romaguera', 'green.terrence@example.net', '2023-08-05 04:11:16', '$2y$10$tdGXmFQ1zk8U8xDJGpYRAelSkNB81CrQm6faLhl84C6u1IrY7DagS', 'student', 'annabelle.blanda', 'TRPL', 'Occaecati qui aperiam suscipit id placeat exercitationem unde.', '20yOsyKUv5', '2023-08-05 04:11:16', '2023-08-05 04:11:16', NULL),
(14, 'Wilber Lind Jr.', 'paucek.paolo@example.net', '2023-08-05 04:11:16', '$2y$10$pDCR5mF19KngPG.lvYac6.bEY0BzMdyHvA.ddMKB2qTWIN9jfJ48y', 'student', 'tillman83', 'Teknik Geomatika', 'Fugit eum officiis voluptatibus aut aut asperiores.', 'BeGx59DgbL', '2023-08-05 04:11:16', '2023-08-05 04:11:16', NULL),
(15, 'Alvah Steuber', 'izabella80@example.net', '2023-08-05 04:11:16', '$2y$10$FFWeqbqzyKL3YcfHPCNwYOi9coHX3BgteVmvxcrJ88Nmn6nnT8ufC', 'student', 'witting.bella', 'Teknik Geomatika', 'Dolores dolorem quis minus qui aperiam dolorum distinctio.', 'pjtdO62SOF', '2023-08-05 04:11:16', '2023-08-05 04:11:16', NULL),
(16, 'Camilla Feil', 'yhickle@example.org', '2023-08-05 04:11:16', '$2y$10$TdKEeNpOhCjuIuga.KnK2e6blVS4e37a8U.IhTNWrk6/ytAuECCPu', 'student', 'towne.lilliana', 'Teknik Informatika', 'Numquam placeat nulla laudantium non.', 'pECKa8OYe1', '2023-08-05 04:11:16', '2023-08-05 04:11:16', NULL),
(17, 'Prof. Ari Muller III', 'mable90@example.org', '2023-08-05 04:11:16', '$2y$10$S2I6tVqEfWTpdECEvk8YfuFBrM7w8LaRfJ/qqQ/rXq3i4WzpVsNmq', 'student', 'felicity98', 'Multimedia dan Jaringan', 'Ut nisi aut rem molestiae voluptatem sapiente.', 'KRoUUCW4CN', '2023-08-05 04:11:16', '2023-08-05 04:11:16', NULL),
(18, 'Ms. Reanna Cole II', 'abelardo.casper@example.org', '2023-08-05 04:11:16', '$2y$10$UA/Tsq62nNfdHGCbvFVt.ezNy9GAVUzKuHGilb9ygE83pjMd0R9o2', 'student', 'nbartell', 'TRPL', 'Sint minima totam mollitia soluta non possimus.', 'tDA7G9PpPy', '2023-08-05 04:11:16', '2023-08-05 04:11:16', NULL);

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `likes_user_id_post_id_unique` (`user_id`,`post_id`),
  ADD KEY `likes_post_id_foreign` (`post_id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
