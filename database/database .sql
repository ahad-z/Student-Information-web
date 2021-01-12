-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for student-info
CREATE DATABASE IF NOT EXISTS `student-info` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `student-info`;

-- Dumping structure for table student-info.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table student-info.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table student-info.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table student-info.migrations: ~4 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_01_11_132922_create_student_infos_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table student-info.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table student-info.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table student-info.student_infos
CREATE TABLE IF NOT EXISTS `student_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll` int(20) NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table student-info.student_infos: ~7 rows (approximately)
/*!40000 ALTER TABLE `student_infos` DISABLE KEYS */;
INSERT INTO `student_infos` (`id`, `name`, `email`, `password`, `roll`, `session`, `phone_number`, `created_at`, `updated_at`) VALUES
	(3, 'Oliver Good', 'gucebujyku@mailinator.com', '$2y$10$XZLErmEbaocxmnfnzS0ReO65ThNPx29R0FwXRCdGRnmzyOWpxyxuu', 363535, '20-12a', '+1 (546) 104-2473', '2021-01-12 16:47:53', '2021-01-12 17:37:54'),
	(4, 'MacKensie Alston', 'nidabisili@mailinator.com', '$2y$10$qH9FcrwMVcbiv3tqU0CBj.eV48hM9fCIHj0c3URKDpscvQ8Gg8fvi', 3635351, '20-36', '+1 (927) 862-9155', '2021-01-12 16:48:30', '2021-01-12 16:48:30'),
	(5, 'Dara Hanson', 'nyrydobefe@mailinator.com', '$2y$10$TNSnD8OmGFIEDGmKOEfvaOZYr0yrxoCIfi0dSTkV.AFO171hLOYaS', 12345, '20-12', '+1 (693) 859-8461', '2021-01-12 16:58:08', '2021-01-12 16:58:08'),
	(6, 'Felix Erickson', 'xywu@mailinator.com', '$2y$10$JluGxxvljHwPGIm5UP1IpOAE3Bwu8u/W6bIce4LMe585CBHKs1bFK', 12345, '20-25', '+1 (668) 853-5002', '2021-01-12 17:00:12', '2021-01-12 17:00:12'),
	(7, 'Cruz Ahad', 'japadiv@mailinator.com', '$2y$10$FDlnOqhNjmPhUO4LG8ZxgO/v2VBzNhBbQRVEeD8ZRz.X7aV4zO6MK', 8524, '20-12', '+1 (235) 343-9933', '2021-01-12 17:00:31', '2021-01-12 17:01:31'),
	(8, 'Priscilla Potter', 'cujymeaa@mailinator.com', '$2y$10$VyqaIOaQNmypIO5XU8mlAu15NuiW0X2rckURtIA8GqY4nwrv3Y4Hy', 12345, 'Quo voluptatem verit', '+1 (373) 645-7416', '2021-01-12 17:15:30', '2021-01-12 17:15:30'),
	(9, 'Lesley Buckley', 'funoriz@mailinator.com', '$2y$10$yddZcLA.HobiWSdV0aalaeJtec2.QgWBONqVpxWIJsh/cLE8H75zq', 1232, 'In necessitatibus ad', '+1 (148) 594-7986', '2021-01-12 17:38:14', '2021-01-12 17:38:14');
/*!40000 ALTER TABLE `student_infos` ENABLE KEYS */;

-- Dumping structure for table student-info.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table student-info.users: ~11 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$aXEWdK334jIsPFlCDv0B9ul.KaxIwpu22jQJOXZPjVK2qS6g2OQyS', NULL, '2021-01-12 16:46:57', '2021-01-12 16:46:57'),
	(2, 'Rozella Wiegand', 'letha.wolff@example.org', '2021-01-12 16:46:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qQoJvjwovG', '2021-01-12 16:46:57', '2021-01-12 16:46:57'),
	(3, 'Mr. Rocky Heathcote V', 'frami.melody@example.com', '2021-01-12 16:46:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6Klh66jFM3', '2021-01-12 16:46:57', '2021-01-12 16:46:57'),
	(4, 'Ms. Zoe Runolfsson', 'dietrich.ignacio@example.org', '2021-01-12 16:46:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MnN7tZxnuM', '2021-01-12 16:46:57', '2021-01-12 16:46:57'),
	(5, 'Mallory Crist', 'anjali43@example.org', '2021-01-12 16:46:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sywuiIRF1o', '2021-01-12 16:46:57', '2021-01-12 16:46:57'),
	(6, 'Prof. Sheridan D\'Amore Jr.', 'zjohnston@example.com', '2021-01-12 16:46:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QRmNhLYww5', '2021-01-12 16:46:57', '2021-01-12 16:46:57'),
	(7, 'Mr. August McDermott', 'qanderson@example.net', '2021-01-12 16:46:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xIxcIwm4DL', '2021-01-12 16:46:57', '2021-01-12 16:46:57'),
	(8, 'Roderick Cartwright', 'paxton16@example.net', '2021-01-12 16:46:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'V984Aw4eRg', '2021-01-12 16:46:57', '2021-01-12 16:46:57'),
	(9, 'Dr. Makenna Lindgren MD', 'halie.hettinger@example.org', '2021-01-12 16:46:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yhOmAgMyqt', '2021-01-12 16:46:57', '2021-01-12 16:46:57'),
	(10, 'Mary Crona', 'joshuah32@example.org', '2021-01-12 16:46:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cG9jRqgGB9', '2021-01-12 16:46:57', '2021-01-12 16:46:57'),
	(11, 'Russel Mitchell', 'delores.gutkowski@example.net', '2021-01-12 16:46:57', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lbWx9KdCEr', '2021-01-12 16:46:57', '2021-01-12 16:46:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
