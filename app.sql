-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 17, 2022 at 07:09 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commented` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `post_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`),
  KEY `comments_user_id_foreign` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `firstname`, `lastname`, `thumbnail`, `commented`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(3, 'Administrator', 'Admin', 'avatar.jpg', 'This is third comment', 1, 5, '2021-12-22 13:52:27', '2021-12-22 13:52:27'),
(4, 'Almir', 'Redzic', '1640218883.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr', 2, 5, '2021-12-22 23:21:54', '2021-12-22 23:21:54'),
(11, 'Almir', 'Redzic', '1640218883.jpg', 'bnmbvmbnmnbmbm', 2, 7, '2021-12-23 00:05:13', '2021-12-23 00:05:13'),
(13, 'Edin', 'Tatin', '1640225552.jpg', 'ed diam nonumy eirmod tempor', 3, 7, '2021-12-23 01:13:04', '2021-12-23 01:13:04'),
(14, 'Edin', 'Tatin', '1640225552.jpg', 'magna aliquyam erat, sed diam voluptua.', 3, 6, '2021-12-23 01:14:00', '2021-12-23 01:14:00'),
(15, 'Emma', 'Didovic', '1640225848.jpg', 'sed diam voluptua.', 4, 6, '2021-12-23 01:17:57', '2021-12-23 01:17:57'),
(18, 'Soko', 'Tata', '1640226109.jpg', 'hallo from another world', 9, 7, '2021-12-23 01:24:10', '2021-12-23 01:24:10'),
(24, 'Magdalena', 'Willmar', '1640366196.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 5, 6, '2021-12-24 18:31:10', '2021-12-24 18:31:10'),
(25, 'Magdalena', 'Willmar', '1640366196.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.   \r\n\r\nDuis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.   \r\n\r\nUt wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse', 5, 9, '2021-12-24 19:09:17', '2021-12-24 19:09:17'),
(26, 'Magdalena', 'Willmar', '1640366196.jpg', NULL, 5, 5, '2021-12-24 20:25:10', '2021-12-24 20:25:10'),
(27, 'Almir', 'Redzic', '1640218883.jpg', 'sdgbsbsgbgsbgsnsgfyhjyjyfjysj', 2, 5, '2021-12-25 12:45:02', '2021-12-25 12:45:02'),
(29, 'Almir', 'Redzic', '1640464526.jpg', 'pozdrav', 2, 11, '2021-12-25 19:47:57', '2021-12-25 19:47:57'),
(34, 'Almir', 'Redzic', '1641247890.jpg', 'Great Stuffs', 30, 16, '2022-01-03 21:19:41', '2022-01-03 21:19:41'),
(35, 'Almir', 'Redzic', '1641247890.jpg', 'halooooooooo', 30, 5, '2022-01-03 21:47:33', '2022-01-03 21:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `sent_id` int NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `firstname`, `lastname`, `message`, `user_id`, `sent_id`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Admin', 'Dobar Dan ', 1, 2, '1640218883.jpg', '2021-12-23 18:07:50', '2021-12-23 18:07:50'),
(3, 'Almir', 'Redzic', 'Voli Tata Edna', 5, 2, '1640218883.jpg', '2021-12-23 17:41:18', '2021-12-23 17:41:18'),
(4, 'Almir', 'Redzic', 'Tata Voli Edina Jos Jednom', 3, 2, '1640218883.jpg', '2021-12-23 17:46:54', '2021-12-23 17:46:54'),
(5, 'Almir', 'Redzic', 'Pozdrav do Berlina', 12, 2, '1640218883.jpg', '2021-12-23 17:49:39', '2021-12-23 17:49:39'),
(6, 'Alma', 'Redzic', 'Tetka voli Edina', 3, 12, 'avatar.jpg', '2021-12-23 21:55:36', '2021-12-23 21:55:36'),
(11, 'Administrator', 'Admin', 'I am warning you !', 12, 1, '1640211968.jpg', '2021-12-24 08:37:16', '2021-12-24 08:37:16'),
(12, 'Edin', 'Tatin', 'I send message to my self', 3, 3, '1640225552.jpg', '2021-12-24 14:50:47', '2021-12-24 14:50:47'),
(13, 'Alma', 'Redzic', 'Hello girl!! How are you?', 5, 12, '1640300162.jpg', '2021-12-24 15:19:03', '2021-12-24 15:19:03'),
(14, 'Magdalena', 'Willmar', 'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', 12, 5, '1640366196.jpg', '2021-12-24 19:08:01', '2021-12-24 19:08:01'),
(15, 'Magdalena', 'Willmar', 'dfdsfdsfsdf', 5, 5, '1640366196.jpg', '2021-12-24 21:02:26', '2021-12-24 21:02:26'),
(17, 'Almir', 'Redzic', 'Dje si barabo', 3, 2, '1640464526.jpg', '2021-12-25 19:36:13', '2021-12-25 19:36:13'),
(18, 'Administrator', 'Admin', 'Hello', 3, 1, '1640211968.jpg', '2021-12-25 23:07:26', '2021-12-25 23:07:26'),
(19, 'Almir', 'Redzic', 'I am login me out', 2, 2, '1640479299.jpg', '2021-12-25 23:42:58', '2021-12-25 23:42:58'),
(20, 'Almir', 'Redzic', 'How are you doing ?', 12, 2, '1640479299.jpg', '2021-12-25 23:43:48', '2021-12-25 23:43:48'),
(21, 'Edin', 'Tatin', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 3, 3, '1640640118.jpg', '2021-12-27 21:09:21', '2021-12-27 21:09:21'),
(22, 'Celo', 'Redzic', 'Pozdrav iz ljubina', 2, 2, '1640728660.jpg', '2021-12-28 20:58:43', '2021-12-28 20:58:43'),
(23, 'Gedzo', 'Sajov', 'Hello !', 1, 13, '1640836867.jpg', '2021-12-30 03:02:15', '2021-12-30 03:02:15'),
(25, 'Celo', 'Redzic', 'Heloooooooooooooo', 2, 2, '1640728660.jpg', '2021-12-31 14:33:53', '2021-12-31 14:33:53'),
(27, 'Almir', 'Redzic', 'halloooo girl !', 18, 30, '1641047679.jpg', '2022-01-02 22:02:53', '2022-01-02 22:02:53'),
(28, 'Almir', 'Redzic', 'hallooooooooooo vom papa', 3, 30, '1641247890.jpg', '2022-01-15 14:56:59', '2022-01-15 14:56:59'),
(29, 'Edin', 'Tatin', 'hallo vom dein sohn', 30, 3, '1641079668.jpg', '2022-01-15 14:58:22', '2022-01-15 14:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2021_12_19_211046_create_users_table', 1),
(3, '2021_12_19_211156_create_posts_table', 1),
(4, '2021_12_19_211239_create_comments_table', 1),
(5, '2021_12_19_211351_create_settings_table', 1),
(6, '2021_12_23_163516_create_messages_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('almirredzic@live.com', '4xcMc1GT0aOvvB0ZJOkjY5BSLupEK5UMHiE64E902JPm4cSpXgpQ7mAePfnItHB9', '2022-01-15'),
('almiredin.redzic@gmail.com', '$2y$10$2.cSFyE/fF.vTLbbdMXiHuI/pwDJ4cKVdi32fOaExsdkz3cZIZ/c6', '2022-01-02'),
('almirredzic@live.com', 'apmLt3ffLoLEbMrwqQgdlnLBLuYixWR3hXgr5E4qWxVmet2om46SIjb8gbeJF26h', '2022-01-15'),
('almirredzic@live.com', 'ljAxLcnSeg6uFAG4KxP0ovW5eYZZL75oq96gGOhlrQ2tPZWue6nw4gMGeMjoVYjm', '2022-01-15'),
('almirredzic@live.com', 'QtqevdvauVOcwPHxm8roPpNYQHY39YEQowFxap3yVli4m1XiO7sH0zqxRg71J76M', '2022-01-15'),
('almirredzic@live.com', 'pn7EdilSE3AccFyA5lHxZnwl5nCROL8DygsIbLpN6gtEln6hT0tqEYU5AMVT23Bb', '2022-01-15'),
('almirredzic@live.com', 'De3DlYfatpYRoDpfKsdkK8gwZLlLK0Rc01wo5XhvNXlsZtV4tDG6eNoL8Tz1Ksp1', '2022-01-15'),
('almirredzic@live.com', 'o2Dqsm80bgmWHYP3KpGxS46KXYaA5vt5slTuGGxhiH73TWYOfST9bxUrrBinzNkT', '2022-01-15'),
('almirredzic@live.com', '4hewRZOD8jkRvcflQcppwxpCqU3auhc8ejtamHfEdk1jVxetnUjDMzh72fXiuKrM', '2022-01-15'),
('almirredzic@live.com', '87LhL8USsDV6zpHHLfhYc1GjgfKNk8Suu3pjlaVtIrBZoFnvOAy3rcv9Pg3pNDYp', '2022-01-15'),
('almirredzic@live.com', 'BS6g351JwPzjjm7cmCXKFj7je778tVhVcscu0WThswCJxKxQbvDk30yf2GDBM3P4', '2022-01-15'),
('almirredzic@live.com', 'AXK34yfaoGdFUkBWzMYb0ywX1uAjxYQBOU7fCIMtjzJi901QTAOaAvIlt0BR0dw1', '2022-01-15'),
('almirredzic@live.com', 'hAF4LdpLRWVQeHERDWauX5ocEThlD9aV3aTXLpbyZbfvsJ6J6EkrpS9MH62ldNii', '2022-01-15'),
('almirredzic@live.com', 'UIXnXRPlpnzDQOtDLC2auO5uoS8oSoGvAhvnsB58J4qZQ1Iyji2VLRrYqivCl548', '2022-01-15'),
('almirredzic@live.com', '90i4R3ShLcr5xNlsMoAP4K0YgmksPLwURFPMXkyhoo3dieihpA5k9FnLEuIT1eLx', '2022-01-15'),
('almirredzic@live.com', '8CzJqRsCxh0ovRqHqMXYIHhb9ZqkHQXtG6noM17YHzNjPHPVTT9dHd2DpRep3sMY', '2022-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsText` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `firstname`, `lastname`, `email`, `user_id`, `title`, `news`, `newsText`, `thumbnail`, `created_at`, `updated_at`) VALUES
(5, 'Almir', 'Redzic', 'almiredin.redzic@gmail.com', 2, 'New Title', '1640117147.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.   \r\n\r\nDuis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.   \r\n\r\nUt wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.   \r\n\r\nNam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer', 'avatar.jpg', '2021-12-21 19:05:47', '2021-12-21 19:05:47'),
(6, 'Administrator', 'Admin', 'admin@admin.com', 1, 'DobarDan', '1640176902.jpg', 'Dobar dan', 'avatar.jpg', '2021-12-22 11:41:42', '2021-12-22 11:41:42'),
(7, 'Administrator', 'Admin', 'admin@admin.com', 1, 'Matka', '1640180373.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'avatar.jpg', '2021-12-22 12:39:34', '2021-12-22 12:39:34'),
(9, 'Magdalena', 'Willmar', 'lena@lena.com', 5, 'Ut wisi enim', '1640375778.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.   \r\n\r\nDuis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.   \r\n\r\nUt wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse', '1640366196.jpg', '2021-12-24 18:56:18', '2021-12-24 18:56:18'),
(13, 'Celo', 'Redzic', 'almiredin.redzic@gmail.com', 2, 'Ljubin', '1640728810.jpg', 'liquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', '1640728660.jpg', '2021-12-28 21:00:10', '2021-12-28 21:00:10'),
(16, 'Soko', 'Tata', 'soko@soko.com', 9, 'Površina', '1641046056.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', '1640226109.jpg', '2022-01-01 13:07:36', '2022-01-01 13:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `age` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unknown',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `age`, `password`, `email`, `thumbnail`, `created_at`, `updated_at`, `token`) VALUES
(1, 'Administrator', 'Admin', '39', '$2y$10$bJw4w5DlLl78WRKeo7VmRu/eMGSn2NuvnWs.WoNK8hDcTbCA5ih6m', 'admin@admin.com', 'avatar.jpg', '2022-01-05 01:20:29', '2022-01-01 00:20:52', NULL),
(3, 'Edin', 'Tatin', '9', '$2y$10$6KGxH2PQ2cE2QquDcyUYE.ocLvwyD7Q0oHzO0kqOCArDJmmi3FhEy', 'edin@edin.at', '1641079668.jpg', '2021-12-19 23:05:04', '2022-01-01 22:27:48', NULL),
(5, 'Magdalena', 'Willmar', '40', '$2y$10$28cO2FXgbiuFaX/FQanLju8iZ7ZoGwSZgSh0TnTaWmrAB9aTEMwS2', 'lena@lena.com', '1640366196.jpg', '2021-12-21 00:04:40', '2021-12-24 19:22:42', NULL),
(9, 'Soko', 'Tata', '72', '$2y$10$i4YViyNL1hTujGIQN.gfT.m0hJpyNJss7GMARYvo7yYHLxACA/QCe', 'soko@soko.com', '1640226109.jpg', '2021-12-21 00:34:49', '2022-01-01 13:04:48', NULL),
(16, 'Gedzo', 'Sajov', '34', '$2y$10$YVQ15aLQPi/vnIjcNow9jeeaN/DHyCs1fw01/tAs0GD/YEKuE8SBC', 'gedzo@gedzo.com', '1642359170.jpg', '2021-12-31 18:18:07', '2022-01-16 17:52:50', '$2y$10$AbJ1oZZjEbQrcx2uzOayiOkvylUR8aNIGy4Wl0glyf1UifrdZYrOi'),
(18, 'Emma', 'Didovic', '43', '$2y$10$bK2p1R1moxsaGUm0PrKloeFJH5QnkDy6iQGJ3xzXW1Kj/9EeMrdza', 'emma@emma.at', '1642359429.jpg', '2021-12-31 18:27:41', '2022-01-16 17:57:09', '$2y$10$aDBOg.IEMYFm4L6WOLTjneOJslNuSr1pIy.28VdiMvyhKoks3PY2e'),
(19, 'Alma', 'Redzic', '44', '$2y$10$KLj0wLZAvC.XogRQ9ZKLyO.XrJ6jWZ1Ngk9DwtDSauoN5L17nLuOO', 'alma@gmail.com', '1642359247.jpg', '2021-12-31 18:34:14', '2022-01-16 17:54:07', '$2y$10$y5KzEPB/D0mrVQUYnJFJbeF7ZeDoxy/UXuxVd4f1YNaxymo7CIaFq'),
(30, 'Almir', 'Redzic', '33', '$2y$10$fcDhTQKowvuSh457I5uI2eYKNpqywXC0KOa7E9ys4DDictESmcnhG', 'almiredin.redzic@gmail.com', '1641247890.jpg', '2021-12-31 19:42:51', '2022-01-03 21:11:30', '$2y$10$fXhJ3.20mbKNYP8LK6Rw4ebLxULmezJLHcNIakUYlYwg7Upr6gll.'),
(84, 'Celo', 'Redzic', '23', '$2y$10$XZYO/70v9uPynMcqJqMeG.zdqJogDLpMbjckzcwaPk5lXYVlFYjYW', 'almirredzic@live.com', '1642359345.jpg', '2022-01-01 11:41:19', '2022-01-16 17:55:45', NULL),
(85, 'Lorem', 'Ipsum', '22', '$2y$10$fTpENtcyQdaDFS6ldXipme0Uorf37u8KcCHxfeBZd88KBQS1Gcli.', 'lorem@lorem.com', 'avatar.jpg', '2022-01-02 22:10:21', '2022-01-02 22:10:21', NULL),
(88, 'New', 'User', '20', '$2y$10$uCuN/5zwnv.y4EusLyPPQOks.07vY8bNjJsD3DpHq.ZwOgDf5K83q', 'new@new.at', 'avatar.jpg', '2022-01-16 18:35:31', '2022-01-16 18:35:31', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
