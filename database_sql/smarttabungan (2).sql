-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 01:33 AM
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
-- Database: `smarttabungan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('andikamardiansyah@gmail.com|127.0.0.1', 'i:1;', 1730769254),
('andikamardiansyah@gmail.com|127.0.0.1:timer', 'i:1730769254;', 1730769254);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `major_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `major_id`, `user_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'X', 'Sepuluh', '2024-10-18 01:42:18', '2024-10-18 01:42:18'),
(2, 1, NULL, 'XI', NULL, '2024-10-20 18:43:32', '2024-10-20 18:43:32'),
(3, 1, NULL, 'XII', NULL, '2024-10-20 18:43:41', '2024-10-20 18:43:41');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'RPL', 't', '2024-10-18 01:42:00', '2024-10-20 18:42:44'),
(2, 'TKJ', 'test', '2024-10-20 18:42:34', '2024-10-20 18:42:34'),
(3, 'TKKR', 'test', '2024-10-20 18:42:58', '2024-10-20 18:42:58'),
(4, 'TBSM', 'test', '2024-10-20 18:43:15', '2024-10-20 18:43:15');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_27_035451_create_majors_table', 1),
(5, '2024_08_27_075655_create_classes_table', 1),
(6, '2024_09_27_030920_create_teachers_table', 1),
(7, '2024_09_30_071457_add_saldo_to_savings_table', 2),
(8, '2024_08_22_031724_create_siswas_table', 3),
(9, '2024_10_08_032430_add_siswa_id_to_savings_table', 3),
(10, '2024_10_18_064913_add_class_id_to_siswa_table', 4),
(12, '2024_10_21_013943_create_savings_table', 5),
(14, '2024_11_01_035848_add_user_id_to_siswa_table', 6);

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
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `deebit` decimal(10,2) NOT NULL,
  `saldo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `date` date NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`id`, `user_id`, `siswa_id`, `deebit`, `saldo`, `date`, `note`, `created_at`, `updated_at`) VALUES
(4, 1, 8, 10000.00, 10000.00, '2024-10-25', 'nabung pertaam', '2024-10-24 19:40:07', '2024-10-24 19:40:07'),
(5, 1, 8, 10000.00, 20000.00, '2024-10-25', 'nabung kedua', '2024-10-25 01:19:21', '2024-10-25 01:19:21'),
(7, 3, 9, 10000.00, 10000.00, '2024-10-28', 'pertama', '2024-10-27 19:39:56', '2024-10-27 19:39:56'),
(8, 1, 8, 10000.00, 30000.00, '2024-11-01', 'ke3', '2024-10-31 19:57:22', '2024-10-31 19:57:22'),
(9, 1, 8, 10000.00, 40000.00, '2024-11-01', 'k4', '2024-10-31 20:52:06', '2024-10-31 20:52:06'),
(10, 1, 8, 10000.00, 50000.00, '2024-11-06', 'ke5', '2024-11-05 17:54:32', '2024-11-05 17:54:32'),
(11, 1, 11, 10000.00, 10000.00, '2024-11-07', 'pertama', '2024-11-06 18:25:25', '2024-11-06 18:25:25'),
(12, 1, 11, 10000.00, 20000.00, '2024-11-07', 'hari ke 2', '2024-11-06 20:59:11', '2024-11-06 20:59:11'),
(13, 1, 13, 10000.00, 10000.00, '2024-11-07', 'hari pertama', '2024-11-07 06:41:00', '2024-11-07 06:41:00'),
(14, 10, 12, 6000.00, 6000.00, '2024-11-07', 'ke 1', '2024-11-07 06:43:54', '2024-11-07 06:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1SYqz8lV4kx39sUWs3mi4qffeJE6Jnvs11wycvWf', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTDFPNUhYUjAyZ3VWMjhDNHVoYlYzUWdZc1o5MlVEUDFCZzlyNjFtdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9zbWFydHRhYnVuZ2FuLnRlc3QvcHJvZmlsZS84L3BkZiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1731025819),
('lCyGvfrbkAgk68PqSayK8Oa2msIXZsb82dYa1F8P', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ2t1ZDRWNFBGSXc5OWVFMU53dTc4RWNjUjNHdEc4NjdNQVNyV2NSViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9zbWFydHRhYnVuZ2FuLnRlc3QvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1730980684),
('LOMg3BYALjCUGvW2ZfbKOzivZ621bDZWG6ZY8Eqf', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQmt6YWtqOUpFenNsSWdBc0o3cUlrSzMxRnlVSktmUVc0UDhKNHBkbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9zbWFydHRhYnVuZ2FuLnRlc3QvcHJvZmlsZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7fQ==', 1730980286),
('oTz4sjjfQwm9Xn348fhG5JkqeaUq8wdIkJmg0gAJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTUdtVmdVSFA4R1hQazJaaVZUYXdzNUtmSjZBMnZSN21JdURLRnkwZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9zbWFydHRhYnVuZ2FuLnRlc3QvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1731025775),
('PXRCeohcRkJSG7enSoqdqUqF7NfW8kVX8z42FGEE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaVhTcEpOTEFEcENLUElQcmtGYkZxVGgweDdheU9COXhxZTN6OWQ3ciI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozOToiaHR0cDovL3NtYXJ0dGFidW5nYW4udGVzdC9wcm9maWxlLzgvcGRmIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9zbWFydHRhYnVuZ2FuLnRlc3QvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730985691),
('qkgQNeofueGzLECeF43EKhh6VVp2LClBDdfFBZe0', 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibmJlTVduTG5mVFMwUkc1OUZybnVLWDRlT2JoZFlaUTY3ZnNla2RTaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9zbWFydHRhYnVuZ2FuLnRlc3QvcHJvZmlsZS8xMi9wZGYiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo4O30=', 1730987064),
('sZtXbVjg2VznbSJf07gakDMzXbEiOnjf8V2vL1IW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUnJPTWcycGdzeDNZRmJwZ2wxWXJITHIyTDl5WUp6akJYa1lDRUhBSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9zbWFydHRhYnVuZ2FuLnRlc3QvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730980145);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `major_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `user_id`, `class_id`, `major_id`, `created_at`, `updated_at`) VALUES
(8, 4, 1, 4, '2024-10-24 19:37:45', '2024-10-25 01:32:44'),
(11, 7, 2, 3, '2024-11-06 06:16:05', '2024-11-06 06:16:05'),
(12, 8, 2, 1, '2024-11-06 19:57:17', '2024-11-06 19:57:17'),
(13, 9, 1, 3, '2024-11-07 06:40:41', '2024-11-07 06:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `role` enum('teacher','student','admin','finance') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Riza Fadillah', 'rizafadillah@gmail.com', NULL, '$2y$12$DJxFJXHhnVBa5F/4pjaSBuolHOLLdatSG/DD7qA0LFdd0U.mIPqyS', 'admin', NULL, '2024-10-18 01:41:31', '2024-10-18 01:41:31'),
(2, 'lala', 'lala@gmail.com', NULL, '$2y$12$M89v1Fq2N6l3f50D1uulp.6dPAxqzIHMNpk8lYIkXRp.OQZSNhdG6', 'student', NULL, '2024-10-25 02:14:58', '2024-10-25 02:14:58'),
(3, 'Agus', 'agus@gmail.com', NULL, '$2y$12$5nK3oG0k/tPIpL0Ju.B7DOLuRI.GkTrLeMV2X7tjwAERjeFIxLTAi', 'admin', NULL, '2024-10-27 19:39:26', '2024-10-27 19:39:26'),
(4, 'Ahmad Aidil Fauzi', 'ahmadaidilfauzi@gmail.com', NULL, '$2y$12$ZkP57QP7nkNrzBRGe82mfeTpYv0Jgc4UAnTKfcWTIICsc1sZUtZ9m', 'student', NULL, '2024-10-27 20:51:18', '2024-10-27 20:51:18'),
(5, 'siswa', 'student@gmail.com', NULL, '$2y$12$HOtLI9gAakahrFMxeehEAOc.0Uu5Gw8VuuCkq33ybw9b3dEk7CQSy', 'student', NULL, '2024-11-01 18:24:51', '2024-11-01 18:24:51'),
(6, 'Andika Mardiansyah', 'andikamardiansya@gmail.com', NULL, '$2y$12$c6ThrMBe/7RDpWMFiNiKo.rGA0DmlFyRKQy5nr9ta9gJd2GZ.JHeq', 'student', NULL, '2024-11-04 18:14:06', '2024-11-04 18:14:06'),
(7, 'arenda', 'arenda@gmail.com', NULL, '$2y$12$EPbB3BzBQZKJRiiCpFXFaOUvg3t39K2014BB2kNE.FYmy0cNK8aIO', 'student', NULL, '2024-11-06 06:16:05', '2024-11-06 06:18:00'),
(8, 'Dea Defitri', 'deadefitri@gmail.com', NULL, '$2y$12$yJmG3Nt26MmICjWabIU4lOznJBiDuGhgVYpNGSQrKMrygY2LKMniC', 'student', NULL, '2024-11-06 19:57:17', '2024-11-06 19:57:50'),
(9, 'riza', 'riza2@gmail.com', NULL, '$2y$12$1Kmuyrh2nJU/f2LENnw8Q.MdJtlqXQfAddpXurpzQ7VrMok45/Qrm', 'student', NULL, '2024-11-07 06:40:41', '2024-11-07 06:40:41'),
(10, 'yahya', 'yaya@gmail.com', NULL, '$2y$12$YegP1PcS3CU7LS87oMQEDOm0ZWQ68fLQ7XqpXJZtChNihuXjNeg0q', 'admin', NULL, '2024-11-07 06:43:16', '2024-11-07 06:43:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classes_major_id_foreign` (`major_id`),
  ADD KEY `classes_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
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
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_major_id_foreign` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
