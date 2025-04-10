-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2025 at 10:37 AM
-- Server version: 5.6.51
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodstuff_has`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@admin.com', '$2y$12$Bvc694cdg.dyumZB3J8a1.wEsB.RGwQcocfmEHhaDRKlG2gG9ncpK', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

DROP TABLE IF EXISTS `food_items`;
CREATE TABLE IF NOT EXISTS `food_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `inventory` int(11) NOT NULL DEFAULT '0',
  `unit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`id`, `name`, `price`, `inventory`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'Rice', 5000.00, 19, 'bag', '2024-11-15 10:29:09', '2024-11-15 10:43:18'),
(3, 'Plantain', 10000.00, 23, 'bundle', '2024-11-15 15:25:25', '2024-11-15 15:25:25'),
(6, 'Sushi', 18.99, 22, 'Roll', '2023-11-18 17:58:17', '2023-11-18 17:58:17'),
(7, 'Tacos', 9.99, 35, 'pack', '2023-11-18 17:58:17', '2023-11-18 17:58:17'),
(8, 'Chicken Wings', 14.99, 45, 'Kg', '2023-11-18 17:58:17', '2023-11-18 17:58:17'),
(9, 'Nachos', 11.99, 38, 'Kg', '2023-11-18 17:58:17', '2023-11-18 17:58:17'),
(10, 'Ice Cream', 5.99, 50, 'cup', '2023-11-18 17:58:17', '2023-11-18 17:58:17'),
(11, 'Cake', 16.99, 18, 'bowl', '2023-11-18 17:58:17', '2023-11-18 17:58:17'),
(12, 'Coffee', 3.99, 60, 'cup', '2023-11-18 17:58:17', '2023-11-18 17:58:17'),
(21, 'Burger', 10.99, 30, 'Pcs', '2023-11-18 17:58:17', '2023-11-18 17:58:17'),
(31, 'Pasta', 12.99, 25, 'Carton', '2023-11-18 17:58:17', '2023-11-18 17:58:17'),
(41, 'Salad', 8.99, 40, 'Pcs', '2023-11-18 17:58:17', '2023-11-18 17:58:17'),
(51, 'Steak', 25.99, 15, 'Pcs', '2023-11-18 17:58:17', '2023-11-18 17:58:17'),
(121, 'Pizza', 15.99, 20, 'Pcs', '2023-11-18 17:58:17', '2023-11-18 17:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_13_220819_create_settings_table', 1),
(6, '2024_11_14_223150_create_notifications_table', 2),
(7, '2024_11_14_224740_create_admins_table', 3),
(10, '2024_11_15_103553_create_food_items_table', 5),
(11, '2024_11_15_103432_create_vouchers_table', 6),
(12, '2024_11_17_095842_create_support_requests_table', 7),
(13, '2024_11_17_100759_add_role_to_users_table', 7),
(14, '2024_11_17_100769_add_notification_to_users_table', 8),
(16, '2024_11_19_212413_create_orders_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Food Discount Ongoin!rr', 'Food Discount Ongoin!Food Discount Ongoin!Food Discount Ongoin!Food Discount Ongoin!Food Discount Ongoin!Food Discount Ongoin!Food Discount Ongoin!Food Discount Ongoin!Food Discount Ongoin!', 0, '2024-11-14 21:38:25', '2024-11-14 22:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaction_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `order_date` date NOT NULL,
  `food_item_id` bigint(20) UNSIGNED NOT NULL,
  `voucher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `status` enum('pending','approved','cancelled','completed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_transaction_number_unique` (`transaction_number`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_food_item_id_foreign` (`food_item_id`),
  KEY `orders_voucher_id_foreign` (`voucher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_number`, `user_id`, `amount`, `order_date`, `food_item_id`, `voucher_id`, `amount_paid`, `status`, `created_at`, `updated_at`) VALUES
(1, '9224781049', 3, 5000.00, '2024-11-21', 1, 2, 3000.00, 'approved', '2024-11-21 11:30:47', '2024-11-21 22:11:51'),
(2, '4004189741', 3, 10000.00, '2024-12-17', 3, 3, 9050.00, 'approved', '2024-12-17 11:54:01', '2024-12-17 11:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('16h4chJGsJRBb6diz7TPlLTZWNuqgU3wLx5qk50s', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVmluSU54MzU5clpxSUxGMTlhZkFjaWk1RVdFdTNvMWpzSmVrTnZoOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdXBwb3J0LzciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1734440569),
('vGNephpKHHloPbfT98GWzWZRqAaRAU4FcRya4DXx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUnJoeXlGdXg1OW9LWWVtSnB5ZHZKZ21ZNFROdHR3TFFMb2NrS0NqUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTE6ImxvZ2luX2F1dGhfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1734440922);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `smtp_user` varchar(255) DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_password` varchar(255) DEFAULT NULL,
  `currency` varchar(255) NOT NULL DEFAULT '$',
  `site_name` varchar(255) NOT NULL DEFAULT 'Food Stuff Alleviation',
  `site_short_name` varchar(255) NOT NULL DEFAULT 'FoodStuff',
  `site_email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `website` varchar(255) NOT NULL DEFAULT 'localhost/',
  `address` text,
  `charges` decimal(10,2) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `welcome_message` varchar(255) NOT NULL DEFAULT 'Welcome to Food Stuff Alleviation Portal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `smtp_user`, `smtp_host`, `smtp_password`, `currency`, `site_name`, `site_short_name`, `site_email`, `phone`, `website`, `address`, `charges`, `logo`, `favicon`, `welcome_message`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, '₦', 'Food Stuff Alleviation', 'FoodStuff', NULL, '1234567890', 'localhost/', 'Kumbotso, Kano State', NULL, NULL, NULL, 'Welcome to Food Stuff Alleviation Portal', '2024-11-14 09:00:46', '2024-11-14 09:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `support_requests`
--

DROP TABLE IF EXISTS `support_requests`;
CREATE TABLE IF NOT EXISTS `support_requests` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('open','in-progress','resolved','closed') NOT NULL DEFAULT 'open',
  `is_reply` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `support_requests_sender_id_foreign` (`sender_id`),
  KEY `support_requests_receiver_id_foreign` (`receiver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support_requests`
--

INSERT INTO `support_requests` (`id`, `sender_id`, `receiver_id`, `subject`, `message`, `status`, `is_reply`, `created_at`, `updated_at`) VALUES
(5, 31, NULL, 'Addon domain', 'vf', 'open', 0, '2024-11-18 19:18:45', '2024-11-18 19:18:45'),
(6, 31, NULL, 'Addon domain', 'test', 'open', 0, '2024-11-21 21:33:42', '2024-11-21 21:33:42'),
(7, 3, NULL, 'Voucher for rice', 'I need my vouche for rice', 'in-progress', 0, '2024-12-17 12:01:40', '2024-12-17 12:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `notification` varchar(255) NOT NULL DEFAULT 'No message',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `city`, `state`, `country`, `gender`, `status`, `remember_token`, `created_at`, `updated_at`, `role`, `notification`) VALUES
(3, 'Shaibu Abdulateef', 'Latimax4all@gmail.com', '2024-11-14 09:00:46', '$2y$12$Z4uNtafyguA9Otl0nIx.EemxBxBF80/istwGdqQQuSym0seyR40Mu', '09063883519', 'Auchi', 'Edo', 'Nigeria', 'Male', 'active', '9BWAM12vS1Bcz7EO335liE759x1UMT4kKjycnZKbC2x1d3Spq64vEo48BvIA', '2024-11-14 09:00:46', '2024-12-17 12:02:49', 'user', 'LNO562  this i the ovucher'),
(6, 'Lou Wintheiser', 'egleason@example.net', '2024-11-14 09:00:46', '$2y$12$a0JE3ZpSrNZn9pmkPehiYOHigU1XMIaR8IGmDvAff4nqZTRlfc7xi', '+1-541-738-4514', 'Lexiemouth', 'Hawaii', 'Saint Pierre and Miquelon', 'Female', 'active', '7AHFze8fbNiG54kHaWBILaIwGkzxDjtNvXW618oKgN931Ubyx8ZVqU73IRAS', '2024-11-14 09:00:46', '2024-11-17 20:28:38', 'user', 'Okay recieved'),
(7, 'Brice Pagac', 'imoore@example.org', '2024-11-14 09:00:46', '$2y$12$a0JE3ZpSrNZn9pmkPehiYOHigU1XMIaR8IGmDvAff4nqZTRlfc7xi', '+1-626-382-7528', 'West Warrenhaven', 'Georgia', 'American Samoa', 'Male', 'inactive', 'ZGwAwvC0FY', '2024-11-14 09:00:46', '2024-11-14 09:00:46', 'user', 'No message'),
(8, 'Abe Schulist', 'payton70@example.net', '2024-11-14 09:00:46', '$2y$12$a0JE3ZpSrNZn9pmkPehiYOHigU1XMIaR8IGmDvAff4nqZTRlfc7xi', '567.698.2846', 'North Yvettetown', 'Maine', 'Macao', 'Female', 'inactive', 'NCtk0xxPad', '2024-11-14 09:00:46', '2024-11-14 09:00:46', 'user', 'No message'),
(9, 'Mr. Fredrick Gutmann Sr.', 'uschamberger@example.com', '2024-11-14 09:00:46', '$2y$12$a0JE3ZpSrNZn9pmkPehiYOHigU1XMIaR8IGmDvAff4nqZTRlfc7xi', '401-453-0412', 'Port Pierreland', 'Massachusetts', 'Mozambique', 'Other', 'active', '9yEGF93zWd', '2024-11-14 09:00:46', '2024-11-14 09:00:46', 'user', 'No message'),
(10, 'Georgiana Hegmann', 'schoen.collin@example.com', '2024-11-14 09:00:46', '$2y$12$a0JE3ZpSrNZn9pmkPehiYOHigU1XMIaR8IGmDvAff4nqZTRlfc7xi', '+1.989.576.9290', 'Kreigermouth', 'Vermont', 'Togo', 'Other', 'inactive', 'v4nqpXLHpx', '2024-11-14 09:00:46', '2024-11-14 09:00:46', 'user', 'No message'),
(11, 'Rose Hill', 'ferry.richard@example.net', '2024-11-14 21:58:59', '$2y$12$dlRmDeOK/lA8dp4HtDg42OIcjvTUhgsbBuW9WO1DUfTeV29UjPG16', '1-845-863-5035', 'Kuvalisville', 'Pennsylvania', 'Saint Helena', 'Male', 'inactive', 'EPi2hn2Xwk', '2024-11-14 21:59:00', '2024-11-14 21:59:00', 'user', 'No message'),
(12, 'Danial Raynor II', 'allie.bailey@example.com', '2024-11-14 21:59:00', '$2y$12$dlRmDeOK/lA8dp4HtDg42OIcjvTUhgsbBuW9WO1DUfTeV29UjPG16', '+1-678-460-5218', 'New Creolaberg', 'Florida', 'Israel', 'Other', 'inactive', 'miXcShJEFH', '2024-11-14 21:59:00', '2024-11-14 21:59:00', 'user', 'No message'),
(13, 'Ms. Zoila Reichel DDS', 'ashlynn20@example.org', '2024-11-14 21:59:00', '$2y$12$dlRmDeOK/lA8dp4HtDg42OIcjvTUhgsbBuW9WO1DUfTeV29UjPG16', '(254) 766-8266', 'New Liana', 'Minnesota', 'Trinidad and Tobago', 'Female', 'active', 'O26yGg8yaO', '2024-11-14 21:59:00', '2024-11-14 21:59:00', 'user', 'No message'),
(14, 'Marcella McLaughlin', 'lea99@example.com', '2024-11-14 21:59:00', '$2y$12$dlRmDeOK/lA8dp4HtDg42OIcjvTUhgsbBuW9WO1DUfTeV29UjPG16', '586.501.0051', 'West Allyville', 'California', 'Armenia', 'Male', 'inactive', 'qi29Ghmzun', '2024-11-14 21:59:00', '2024-11-14 21:59:00', 'user', 'No message'),
(15, 'Ms. Maegan Toy', 'lynn.heidenreich@example.org', '2024-11-14 21:59:00', '$2y$12$dlRmDeOK/lA8dp4HtDg42OIcjvTUhgsbBuW9WO1DUfTeV29UjPG16', '734.407.9123', 'South Omari', 'West Virginia', 'Canada', 'Male', 'active', 'lpvFY7iBEf', '2024-11-14 21:59:00', '2024-11-14 21:59:00', 'user', 'No message'),
(16, 'Elinor Williamson', 'mharber@example.org', '2024-11-14 21:59:00', '$2y$12$dlRmDeOK/lA8dp4HtDg42OIcjvTUhgsbBuW9WO1DUfTeV29UjPG16', '512-307-9344', 'West Micahmouth', 'Iowa', 'Saint Pierre and Miquelon', 'Female', 'active', '1HHZ3QYBrV', '2024-11-14 21:59:00', '2024-11-14 21:59:00', 'user', 'No message'),
(17, 'Dorian Wolf', 'rklocko@example.com', '2024-11-14 21:59:00', '$2y$12$dlRmDeOK/lA8dp4HtDg42OIcjvTUhgsbBuW9WO1DUfTeV29UjPG16', '(206) 419-1603', 'Labadiefurt', 'Oklahoma', 'Uganda', 'Other', 'active', 'S1SAttnUyi', '2024-11-14 21:59:00', '2024-11-14 21:59:00', 'user', 'No message'),
(18, 'Dr. Hal Konopelski Jr.', 'bmetz@example.org', '2024-11-14 21:59:00', '$2y$12$dlRmDeOK/lA8dp4HtDg42OIcjvTUhgsbBuW9WO1DUfTeV29UjPG16', '+1-215-263-0848', 'West Marlene', 'Connecticut', 'United Kingdom', 'Other', 'inactive', 'ijdLiOo35K', '2024-11-14 21:59:00', '2024-11-14 21:59:00', 'user', 'No message'),
(19, 'Dorian Balistreri', 'osborne.johnson@example.com', '2024-11-14 21:59:00', '$2y$12$dlRmDeOK/lA8dp4HtDg42OIcjvTUhgsbBuW9WO1DUfTeV29UjPG16', '1-865-472-3486', 'Lamarhaven', 'Texas', 'Bahrain', 'Male', 'active', 'ukycESNrI9', '2024-11-14 21:59:00', '2024-11-14 21:59:00', 'user', 'No message'),
(27, 'Mrs. Carlee Mante PhD', 'raphaelle.johns@example.com', '2024-11-17 09:08:52', '$2y$12$6g3u0vMNOZhmCs.QDldZ9..K7wK14HsRcn6DjpsKMs9Go4xJQBGym', '316-450-8641', 'New Joton', 'Michigan', 'Cote d\'Ivoire', 'Other', 'active', 'dUf0orJbOW', '2024-11-17 09:08:52', '2024-11-17 09:08:52', 'user', 'No message'),
(28, 'Horace Vandervort', 'cassin.jean@example.net', '2024-11-17 09:08:52', '$2y$12$6g3u0vMNOZhmCs.QDldZ9..K7wK14HsRcn6DjpsKMs9Go4xJQBGym', '+16787861745', 'North Vicentechester', 'Oklahoma', 'American Samoa', 'Male', 'inactive', '9g0FV35naR', '2024-11-17 09:08:52', '2024-11-17 09:08:52', 'user', 'No message'),
(29, 'Adonis Jaskolski', 'myrtis90@example.com', '2024-11-17 09:08:52', '$2y$12$6g3u0vMNOZhmCs.QDldZ9..K7wK14HsRcn6DjpsKMs9Go4xJQBGym', '956.502.4870', 'New Madalynberg', 'Illinois', 'Kazakhstan', 'Male', 'inactive', 'EBnH3XbjCN', '2024-11-17 09:08:52', '2024-11-17 09:08:52', 'user', 'No message'),
(30, 'Sonya Heidenreich', 'tromp.verona@example.com', '2024-11-17 09:08:52', '$2y$12$6g3u0vMNOZhmCs.QDldZ9..K7wK14HsRcn6DjpsKMs9Go4xJQBGym', '+15804087693', 'Romanton', 'Hawaii', 'Palau', 'Female', 'inactive', 'Rj1u4V9VLf', '2024-11-17 09:08:52', '2024-11-17 09:08:52', 'user', 'No message'),
(31, 'Manager', 'manager@manager.com', NULL, '$2y$12$BB0dfmzqqWNNMXT78LJDFOKy4sDLDbYEsfLh0vZc6NOz8Piba9GVm', NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, '2024-11-17 11:04:55', 'manager', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js'),
(33, 'Shaibu Abdulateef', 'admin@admin.com', NULL, '$2y$12$/QTMEdfeIudhRCoiTCcAYO58wVDi0NlY9F6ihRdEOltVQCaZ1Ibpm', '09063883519', 'Auchi', 'Edo', 'Nigeria', 'male', 'active', NULL, '2024-11-17 20:43:48', '2024-11-17 20:44:23', 'user', 'No message');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

DROP TABLE IF EXISTS `vouchers`;
CREATE TABLE IF NOT EXISTS `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `food_item_id` bigint(20) UNSIGNED NOT NULL,
  `beneficiary_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `is_redeemed` tinyint(1) NOT NULL DEFAULT '0',
  `expiry_date` datetime NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `redeemed_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vouchers_code_unique` (`code`),
  KEY `vouchers_food_item_id_foreign` (`food_item_id`),
  KEY `vouchers_beneficiary_id_foreign` (`beneficiary_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `food_item_id`, `beneficiary_id`, `code`, `is_redeemed`, `expiry_date`, `amount`, `redeemed_at`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'MOCZHR', 0, '2024-11-28 00:00:00', 100.00, NULL, '2024-11-15 16:05:35', '2024-11-21 10:53:13'),
(2, 1, NULL, 'FOQGYA', 1, '2024-11-28 00:00:00', 2000.00, '2024-11-21 12:30:47', '2024-11-21 11:01:47', '2024-11-21 11:30:47'),
(3, 3, NULL, 'LNO562', 1, '2024-12-24 00:00:00', 950.00, '2024-12-17 12:54:01', '2024-12-17 11:51:24', '2024-12-17 11:54:01');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_food_item_id_foreign` FOREIGN KEY (`food_item_id`) REFERENCES `food_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `support_requests`
--
ALTER TABLE `support_requests`
  ADD CONSTRAINT `support_requests_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `support_requests_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vouchers_food_item_id_foreign` FOREIGN KEY (`food_item_id`) REFERENCES `food_items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
