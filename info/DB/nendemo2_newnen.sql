-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2024 at 01:25 AM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nendemo2_newnen`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_tabs`
--

CREATE TABLE `about_tabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('Active','Not Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tabs_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Active','Not Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `slug`, `email`, `phone`, `address`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, '{\"en\":\"Admin\"}', 'admin', 'admin@admin.com', '01123694440', '{\"en\":\"cairo\"}', 'Active', NULL, '$2y$12$xNSSjo9WsBKBI.1zeWRUEug6h45vM7Ppk07JuxvrZa2JtncrX55vu', NULL, '2024-03-13 08:23:05', '2024-03-13 08:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('Active','Not Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `pages_id` bigint(20) UNSIGNED DEFAULT NULL,
  `childe_pages_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `title`, `description`, `status`, `pages_id`, `childe_pages_id`, `sort`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"title22\"}', '{\"en\":\"<p><span style=\\\"font-size:10px\\\">scsfwwfwfwfwf<\\/span><\\/p>\"}', 'Active', 25, NULL, NULL, '2024-02-28 11:26:54', '2024-02-29 07:45:17'),
(2, '{\"en\":\"\\u0649\\u062b\\u0635 \\u0641\\u0647\\u0641\\u0647\"}', '{\"en\":\"<p>wrwrwrwr<\\/p>\"}', 'Active', 101, NULL, NULL, '2024-02-28 11:27:37', '2024-02-28 11:27:37'),
(3, '{\"en\":\"\\u0633\\u0628\\u0633\\u0633\\u0628\\u0628\"}', '{\"en\":\"<p>\\u0633\\u0628<\\/p>\"}', 'Active', 101, NULL, NULL, '2024-02-28 11:31:00', '2024-02-28 11:31:00'),
(5, '{\"en\":\"qsqss\"}', '{\"en\":\"<p>qsqqdqdqwdwq<\\/p>\"}', 'Active', 101, NULL, NULL, '2024-02-28 11:35:18', '2024-02-28 11:35:18'),
(7, '{\"en\":\"qrwrwr\",\"ar\":\"wrwrwrwr\"}', '{\"en\":\"<p>wwrwrwrwrw<\\/p>\",\"ar\":\"<p>wrwrwrwrw<\\/p>\"}', 'Active', NULL, NULL, NULL, '2024-02-29 17:10:02', '2024-02-29 17:10:02'),
(8, '{\"en\":\"qrwrwr\",\"ar\":\"wrwrwrwr\"}', '{\"en\":\"<p>wwrwrwrwrw<\\/p>\",\"ar\":\"<p>wrwrwrwrw<\\/p>\"}', 'Active', NULL, NULL, NULL, '2024-02-29 17:10:36', '2024-02-29 17:10:36'),
(9, '{\"en\":\"qrwrwr\",\"ar\":\"wrwrwrwr\"}', '{\"en\":\"<p>wwrwrwrwrw<\\/p>\",\"ar\":\"<p>wrwrwrwrw<\\/p>\"}', 'Active', NULL, NULL, NULL, '2024-02-29 17:10:55', '2024-02-29 17:10:55'),
(10, '{\"en\":\"qrwrwr\",\"ar\":\"wrwrwrwr\"}', '{\"en\":\"<p>wwrwrwrwrw<\\/p>\",\"ar\":\"<p>wrwrwrwrw<\\/p>\"}', 'Active', NULL, NULL, NULL, '2024-02-29 17:11:24', '2024-02-29 17:11:24'),
(11, '{\"en\":\"qrwrwr\",\"ar\":\"wrwrwrwr\"}', '{\"en\":\"<p>wwrwrwrwrw<\\/p>\",\"ar\":\"<p>wrwrwrwrw<\\/p>\"}', 'Active', NULL, NULL, NULL, '2024-02-29 17:11:40', '2024-02-29 17:11:40'),
(19, '{\"en\":\"wrwrwr\",\"ar\":\"qqq\"}', '{\"en\":\"<p>adadadazz<\\/p>\",\"ar\":\"<p>ada<\\/p>\"}', 'Active', 102, NULL, NULL, '2024-03-02 05:11:03', '2024-03-02 05:11:03'),
(20, '{\"en\":\"title\",\"ar\":\"wwww\"}', '{\"en\":\"<p>qeqeq<\\/p>\",\"ar\":\"<p>adadda<\\/p>\"}', 'Active', 102, NULL, NULL, '2024-03-02 05:19:48', '2024-03-02 05:19:48'),
(21, '{\"en\":\"en title\",\"ar\":\"ar data\"}', '{\"en\":\"<p>en desc<\\/p>\",\"ar\":\"<p>ar desc<\\/p>\"}', 'Active', 102, NULL, NULL, '2024-03-02 06:54:29', '2024-03-02 06:54:29'),
(22, '{\"en\":\"title\"}', '{\"en\":\"<p>\\u0636\\u062b\\u0636\\u062b\\u0636\\u062b\\u0636\\u062b<\\/p>\"}', 'Active', 102, NULL, NULL, '2024-03-02 11:00:48', '2024-03-02 11:00:48'),
(23, '{\"en\":\"fffff\"}', '{\"en\":\"<p>sfsfsfs<\\/p>\"}', 'Active', 102, NULL, NULL, '2024-03-02 11:17:09', '2024-03-02 11:17:09'),
(37, '{\"en\":\"wrwrwr\"}', '{\"en\":\"<p>wrwrwrw<\\/p>\"}', 'Active', 103, NULL, NULL, '2024-03-02 11:31:42', '2024-03-02 11:31:42'),
(38, '{\"en\":\"title\"}', '{\"en\":\"<p>sfsfsfsf<\\/p>\"}', 'Active', 102, NULL, NULL, '2024-03-03 11:01:14', '2024-03-03 11:01:14'),
(39, '{\"en\":\"wwrwrwrwrwrffw\"}', '{\"en\":\"<p>wfwfwfwfwf<\\/p>\"}', 'Active', 102, NULL, NULL, '2024-03-03 11:02:50', '2024-03-03 11:02:50'),
(43, '{\"en\":\"wwrwrwrwrwrffw\"}', '{\"en\":\"<p>wfwfwfwfwf<\\/p>\"}', 'Active', 102, NULL, NULL, '2024-03-03 11:05:49', '2024-03-03 11:05:49'),
(44, '{\"en\":\"wwrwrwrwrwrffw\",\"ar\":\"wwrwrwrwrwrffw\"}', '{\"en\":\"<p>wfwfwfwfwf<\\/p>\",\"ar\":\"<p>wfwfwfwfwf<\\/p>\"}', 'Active', 102, NULL, NULL, '2024-03-03 11:06:28', '2024-03-03 12:29:51'),
(45, '{\"en\":\"title\"}', '{\"en\":\"<p>fsfsfssfsfsf<\\/p>\"}', 'Active', 101, NULL, NULL, '2024-03-04 17:21:17', '2024-03-04 17:21:17'),
(46, '{\"en\":\"Deserunt eaque fugia\"}', '{\"en\":\"<p>fewfwf<\\/p>\"}', 'Not Active', 103, NULL, NULL, '2024-03-04 17:52:30', '2024-03-04 17:52:30'),
(47, '{\"en\":\"Sed in qui quia dele\",\"ar\":\"Sed in qui quia dele\"}', '{\"en\":\"<p>fww<\\/p>\",\"ar\":\"<p>fww<\\/p>\"}', 'Not Active', 102, NULL, NULL, '2024-03-04 18:05:15', '2024-03-04 18:05:38'),
(48, '{\"en\":\"Quis consequatur vol\"}', '{\"en\":\"<p>ffeefef<\\/p>\"}', 'Active', NULL, NULL, NULL, '2024-03-12 15:40:56', '2024-03-12 15:40:56'),
(49, '{\"en\":\"test\"}', '{\"en\":\"<p>ljnhjihpijhpuigpiugp<\\/p>\"}', 'Active', 101, NULL, NULL, '2024-03-14 12:35:10', '2024-03-14 12:35:10'),
(50, '{\"en\":\"4546\"}', '{\"en\":\"<p>\\u0645\\u0627\\u0644\\u0627\\u0647\\u0627\\u0644\\u0627\\u0647\\u0627\\u0644\\u0627\\u0647\\u0644\\u0627\\u0647\\u0645\\u0644\\u0627<\\/p>\"}', 'Active', 109, NULL, NULL, '2024-03-14 12:53:59', '2024-03-14 12:53:59'),
(51, '{\"en\":\"12133\"}', '{\"en\":\"<p>hgcflugflugfvlugvlugvl<\\/p>\"}', 'Active', 101, NULL, NULL, '2024-03-14 13:43:20', '2024-03-14 13:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `education_files`
--

CREATE TABLE `education_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education_files`
--

INSERT INTO `education_files` (`id`, `file`, `title`, `education_id`, `created_at`, `updated_at`) VALUES
(3, '17093662860_ProjectsController.php', 'cc', 20, '2024-03-02 05:58:06', '2024-03-02 05:58:06'),
(4, '17093696700_update.blade.php', 'file 1', 21, '2024-03-02 06:54:30', '2024-03-02 06:54:30'),
(5, '17093844480_ProjectsController.php', 'ؤؤؤ', 22, '2024-03-02 11:00:49', '2024-03-02 11:00:49'),
(6, '17094705120_update.blade.php', 'qasew', 37, '2024-03-03 10:55:12', '2024-03-03 10:55:12'),
(7, '17094708740_update.blade.php', '{\"ar\":\"f1\"}', 38, '2024-03-03 11:01:14', '2024-03-03 11:01:14'),
(8, '17094708741_ProjectsController.php', '{\"ar\":\"f2\"}', 38, '2024-03-03 11:01:14', '2024-03-03 11:01:14'),
(9, '17094709700_update.blade.php', '{\"ar\":\"qqq\"}', 39, '2024-03-03 11:02:50', '2024-03-03 11:02:50'),
(10, '17094711490_update.blade.php', '{\"en\":\"qqq\"}', 43, '2024-03-03 11:05:49', '2024-03-03 11:05:49'),
(11, '17094711890_update.blade.php', '{\"en\":\"7\",\"ar\":\"3\"}', 44, '2024-03-03 11:06:29', '2024-03-03 12:52:49'),
(12, '17094711891_ProjectsController.php', '{\"en\":\"8\",\"ar\":\"4\"}', 44, '2024-03-03 11:06:29', '2024-03-03 12:52:49'),
(13, '17095800770_ProjectsController.php', '{\"en\":\"eqeqe\"}', 45, '2024-03-04 17:21:17', '2024-03-04 17:21:17'),
(14, '17095819500_edit.blade (1).php', '{\"en\":\"Labore dolor et magn\"}', 46, '2024-03-04 17:52:30', '2024-03-04 17:52:30'),
(15, '17095827150_17095822930_17095819500_edit.blade (1).php', '{\"en\":\"file en\",\"ar\":\"file ar\"}', 47, '2024-03-04 18:05:15', '2024-03-04 18:05:58'),
(16, '17104280390_pages.sql', '{\"en\":\"122\"}', 50, '2024-03-14 12:53:59', '2024-03-14 12:53:59'),
(17, '17104310000_Modrik-Report.pdf', '{\"en\":\"624646546\"}', 51, '2024-03-14 13:43:20', '2024-03-14 13:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `education_images`
--

CREATE TABLE `education_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education_references`
--

CREATE TABLE `education_references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education_references`
--

INSERT INTO `education_references` (`id`, `reference`, `title`, `education_id`, `created_at`, `updated_at`) VALUES
(6, 'https://web.whatsapp.com/', '{\"ar\":\"wa\"}', 20, '2024-03-02 05:58:07', '2024-03-02 05:58:07'),
(9, 'https://web.whatsapp.com/', '{\"ar\":\"wa\"}', 21, '2024-03-02 06:56:28', '2024-03-02 06:56:28'),
(10, 'https://g.fb.com/', '{\"ar\":\"wa\"}', 21, '2024-03-02 06:56:28', '2024-03-02 06:56:28'),
(11, 'https://web.whatsapp.com/', '{\"ar\":\"wa\"}', 22, '2024-03-02 11:00:49', '2024-03-02 11:00:49'),
(12, 'https://web.whatsapp.com/', '{\"ar\":\"wa\"}', 23, '2024-03-02 11:17:09', '2024-03-02 11:17:09'),
(29, 'https://web.whatsapp.com/', '{\"en\":\"sas asa\"}', 37, '2024-03-03 10:55:12', '2024-03-03 10:55:12'),
(30, 'https://web.whatsapp.com/', '{\"en\":\"z z x z z c z\"}', 37, '2024-03-03 10:55:12', '2024-03-03 10:55:12'),
(31, 'https://web.whatsapp.com/', '{\"ar\":\"eeee\"}', 38, '2024-03-03 11:01:14', '2024-03-03 11:01:14'),
(32, 'https://web.whatsapp.com/', '{\"ar\":\"zzz\"}', 39, '2024-03-03 11:02:50', '2024-03-03 11:02:50'),
(33, 'https://web.whatsapp.com/', '{\"en\":\"qqq\"}', 43, '2024-03-03 11:05:49', '2024-03-03 11:05:49'),
(58, 'https://web.whatsapp.com/', '{\"en\":\"5\",\"ar\":\"1\"}', 44, '2024-03-03 12:45:21', '2024-03-03 12:52:49'),
(59, 'https://web.whfffffatsapp.com/', '{\"en\":\"6\",\"ar\":\"2\"}', 44, '2024-03-03 12:45:21', '2024-03-03 12:52:49'),
(60, 'https://web.whatsapp.com/', '{\"en\":\"eqeqe\"}', 45, '2024-03-04 17:21:17', '2024-03-04 17:21:17'),
(61, 'https://web.whatsapp.com/', '{\"en\":\"Labore dolor et magn\"}', 46, '2024-03-04 17:52:30', '2024-03-04 17:52:30'),
(62, 'https://g.fb.com/', '{\"en\":\"lonk\",\"ar\":\"lonk ar\"}', 47, '2024-03-04 18:05:15', '2024-03-04 18:05:38'),
(63, 'https://web.whatsapp.com/', '{\"en\":\"Non et eum fugit de\"}', 48, '2024-03-12 15:40:56', '2024-03-12 15:40:56'),
(64, 'https://g.fb.com/', '{\"en\":\"12\"}', 50, '2024-03-14 12:53:59', '2024-03-14 12:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `help_tabs`
--

CREATE TABLE `help_tabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('Active','Not Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tabs_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `bref` text COLLATE utf8mb4_unicode_ci,
  `sort` int(11) DEFAULT NULL,
  `status` enum('Active','Not Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pages_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `joinus_tabs`
--

CREATE TABLE `joinus_tabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('Active','Not Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tabs_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ltm_translations`
--

CREATE TABLE `ltm_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `key` text COLLATE utf8mb4_bin NOT NULL,
  `value` text COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `many_tables`
--

CREATE TABLE `many_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `since` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sharing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('Active','Not Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `pages_id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `static_tables_id` bigint(20) UNSIGNED NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(8, 'App\\Models\\ProgramTabs', 5, 'a50a382f-5dbe-46da-bba7-9e0883a48d06', 'ProgramTabs', 'd80a3172-971b-4004-9c0b-ba5ececf0f69 (1)', 'd80a3172-971b-4004-9c0b-ba5ececf0f69-(1).png', 'image/png', 'media', 'media', 82146, '[]', '[]', '[]', '[]', 1, '2024-02-13 17:42:14', '2024-02-13 17:42:14'),
(9, 'App\\Models\\ProgramTabs', 5, 'a3d7ca62-f08a-4672-b5a6-a6168bc68968', 'ProgramTabs', 'a63a8002-3b5c-4223-b1c5-be2f6a6cde59', 'a63a8002-3b5c-4223-b1c5-be2f6a6cde59.png', 'image/png', 'media', 'media', 49349, '[]', '[]', '[]', '[]', 2, '2024-02-13 17:42:14', '2024-02-13 17:42:14'),
(15, 'App\\Models\\StaticTable', 2, '6dbc53bd-52e9-4f0b-969b-df2754de49c2', 'StaticTable2', 'MPI REPORT-EGOSCO', 'MPI-REPORT-EGOSCO.pdf', 'application/pdf', 'media', 'media', 7734043, '[]', '[]', '[]', '[]', 2, '2024-02-13 19:21:50', '2024-02-13 19:21:50'),
(22, 'App\\Models\\ProgramTabs', 10, '354fe675-83b6-42f2-b772-fe6a70f030cb', 'firstImage', 'IOSH', 'IOSH.png', 'image/png', 'media', 'media', 316856, '[]', '[]', '[]', '[]', 1, '2024-02-13 19:57:10', '2024-02-13 19:57:10'),
(23, 'App\\Models\\ProgramTabs', 10, '2e43aaef-6554-40ed-bc84-47a852f3a553', 'pdfFile', 'job ticket', 'job-ticket.pdf', 'application/pdf', 'media', 'media', 173990, '[]', '[]', '[]', '[]', 2, '2024-02-13 19:57:10', '2024-02-13 19:57:10'),
(24, 'App\\Models\\Education', 1, 'eab1091c-4b94-4e3f-a2a6-3006a8478816', 'Education', 'BASEC-01', 'BASEC-01.png', 'image/png', 'media', 'media', 48689, '[]', '[]', '[]', '[]', 1, '2024-02-28 11:26:54', '2024-02-28 11:26:54'),
(25, 'App\\Models\\Education', 2, '377d3690-3f09-4945-9dcd-3f9bd1598db7', 'Education', 'BASEC-01', 'BASEC-01.png', 'image/png', 'media', 'media', 48689, '[]', '[]', '[]', '[]', 1, '2024-02-28 11:27:37', '2024-02-28 11:27:37'),
(26, 'App\\Models\\Education', 3, '520f045d-09c2-41b6-80be-faf41410b61a', 'Education', 'BASEC-01', 'BASEC-01.png', 'image/png', 'media', 'media', 48689, '[]', '[]', '[]', '[]', 1, '2024-02-28 11:31:00', '2024-02-28 11:31:00'),
(28, 'App\\Models\\Education', 5, 'bef5ecd4-289e-462e-8380-d3748fe146f3', 'Education', 'BASEC-01', 'BASEC-01.png', 'image/png', 'media', 'media', 48689, '[]', '[]', '[]', '[]', 1, '2024-02-28 11:35:18', '2024-02-28 11:35:18'),
(31, 'App\\Models\\Education', 11, '90d3b11a-588c-4737-9ac2-6032c531b923', 'Education', 'BASEC-01', 'BASEC-01.png', 'image/png', 'media', 'media', 48689, '[]', '[]', '[]', '[]', 1, '2024-02-29 17:11:40', '2024-02-29 17:11:40'),
(35, 'App\\Models\\Education', 19, '18836b8a-8412-4fc0-9c54-13c070b5be1c', 'Education', 'BASEC-01', 'BASEC-01.png', 'image/png', 'media', 'media', 48689, '[]', '[]', '[]', '[]', 1, '2024-03-02 05:11:03', '2024-03-02 05:11:03'),
(36, 'App\\Models\\Education', 20, 'fa8ce6b7-67d1-45a5-a4bd-19003b87977b', 'Education', 'BASEC-01', 'BASEC-01.png', 'image/png', 'media', 'media', 48689, '[]', '[]', '[]', '[]', 1, '2024-03-02 05:19:48', '2024-03-02 05:19:48'),
(37, 'App\\Models\\Education', 21, 'e8df6a5d-6d0f-4ba8-a2f9-fa05661b38c0', 'Education', 'BASEC-01', 'BASEC-01.png', 'image/png', 'media', 'media', 48689, '[]', '[]', '[]', '[]', 1, '2024-03-02 06:54:30', '2024-03-02 06:54:30'),
(38, 'App\\Models\\Education', 22, 'f9183dd9-8d67-4c20-aac3-45280e6a2186', 'Education', 'BASEC-01', 'BASEC-01.png', 'image/png', 'media', 'media', 48689, '[]', '[]', '[]', '[]', 1, '2024-03-02 11:00:49', '2024-03-02 11:00:49'),
(39, 'App\\Models\\Education', 23, '968df129-e988-47b8-a47d-5351354af821', 'Education', 'BASEC-01', 'BASEC-01.png', 'image/png', 'media', 'media', 48689, '[]', '[]', '[]', '[]', 1, '2024-03-02 11:17:09', '2024-03-02 11:17:09'),
(40, 'App\\Models\\Education', 37, 'ad8b0286-afbd-43b1-9246-5967b998efc1', 'Education', 'BASEC-01', 'BASEC-01.png', 'image/png', 'media', 'media', 48689, '[]', '[]', '[]', '[]', 1, '2024-03-02 11:31:42', '2024-03-02 11:31:42'),
(41, 'App\\Models\\Education', 38, '19419bf4-e915-457b-8ef1-282bf8f99b26', 'Education', 'BASEC-01', 'BASEC-01.png', 'image/png', 'media', 'media', 48689, '[]', '[]', '[]', '[]', 1, '2024-03-03 11:01:14', '2024-03-03 11:01:14'),
(42, 'App\\Models\\Education', 39, '47491df1-67a1-4633-84f0-50ad4fee727b', 'Education', 'BASEC-01', 'BASEC-01.png', 'image/png', 'media', 'media', 48689, '[]', '[]', '[]', '[]', 1, '2024-03-03 11:02:51', '2024-03-03 11:02:51'),
(43, 'App\\Models\\Education', 43, 'f2827e3e-f3e5-4726-a1e4-eddeb2a09aa7', 'Education', 'BASEC-01', 'BASEC-01.png', 'image/png', 'media', 'media', 48689, '[]', '[]', '[]', '[]', 1, '2024-03-03 11:05:49', '2024-03-03 11:05:49'),
(44, 'App\\Models\\Education', 44, '81297ccd-ae9e-470f-8e49-9c71bee2933f', 'Education', 'BASEC-01', 'BASEC-01.png', 'image/png', 'media', 'media', 48689, '[]', '[]', '[]', '[]', 1, '2024-03-03 11:06:29', '2024-03-03 11:06:29'),
(45, 'App\\Models\\Education', 45, '34167cd6-e14f-48f1-b2e7-b38a10cfa537', 'Education', 'BASEC-01', 'BASEC-01.png', 'image/png', 'media', 'media', 48689, '[]', '[]', '[]', '[]', 1, '2024-03-04 17:21:17', '2024-03-04 17:21:17'),
(46, 'App\\Models\\Education', 46, 'f40dc509-32b3-4e13-9585-e7a8002419dc', 'Education', 'vplus w-01', 'vplus-w-01.png', 'image/png', 'media', 'media', 66703, '[]', '[]', '[]', '[]', 1, '2024-03-04 17:52:31', '2024-03-04 17:52:31'),
(147, 'App\\Models\\Education', 51, 'f740c7e6-514c-4368-a56d-408bc77a98d2', 'Education', 'Image7', 'Image7.png', 'image/png', 'media', 'media', 7247, '[]', '[]', '[]', '[]', 1, '2024-04-17 02:19:31', '2024-04-17 02:19:31'),
(148, 'App\\Models\\StaticTable', 50, 'a621065f-e682-41fb-a387-d6b5efdcba38', 'StaticTable', 'Image2', 'Image2.png', 'image/png', 'media', 'media', 8359, '[]', '[]', '[]', '[]', 1, '2024-04-17 02:20:01', '2024-04-17 02:20:01'),
(149, 'App\\Models\\StaticTable', 3, '93ffab43-c161-409e-b447-2d9bdad61b09', 'StaticTable', 'team', 'team.png', 'image/png', 'media', 'media', 1074001, '[]', '[]', '[]', '[]', 1, '2024-04-18 14:10:23', '2024-04-18 14:10:23'),
(151, 'App\\Models\\StaticTable', 8, '3783c507-5c5b-4cc5-b965-67347394ee1c', 'StaticTable', 'certifcate_Image', 'certifcate_Image.png', 'image/png', 'media', 'media', 362540, '[]', '[]', '[]', '[]', 1, '2024-04-18 14:14:50', '2024-04-18 14:14:50'),
(153, 'App\\Models\\StaticTable', 14, '190cc3d8-b5dd-4dc1-be5a-63c5952444b2', 'StaticTable', 'Image4', 'Image4.png', 'image/png', 'media', 'media', 9545, '[]', '[]', '[]', '[]', 1, '2024-04-18 14:15:45', '2024-04-18 14:15:45'),
(154, 'App\\Models\\StaticTable', 51, '503db590-612d-4710-9e78-2ccc54b022d3', 'StaticTable', 'Image6', 'Image6.png', 'image/png', 'media', 'media', 6542, '[]', '[]', '[]', '[]', 1, '2024-04-18 14:16:37', '2024-04-18 14:16:37'),
(156, 'App\\Models\\StaticTable', 16, 'bf0a00fb-6fb3-47c6-8318-b65c5e63ee35', 'StaticTable', 'Switch', 'Switch.png', 'image/png', 'media', 'media', 614735, '[]', '[]', '[]', '[]', 1, '2024-04-18 14:20:06', '2024-04-18 14:20:06'),
(157, 'App\\Models\\StaticTable', 54, '46224b95-e2ee-4374-8feb-4225a8a50bdc', 'StaticTable', 'Image7', 'Image7.png', 'image/png', 'media', 'media', 7247, '[]', '[]', '[]', '[]', 1, '2024-04-18 14:35:19', '2024-04-18 14:35:19'),
(158, 'App\\Models\\StaticTable', 47, '06553acd-d1e9-458a-9ea9-86aed42a252e', 'StaticTable', 'certifcate_Image', 'certifcate_Image.png', 'image/png', 'media', 'media', 362540, '[]', '[]', '[]', '[]', 1, '2024-04-18 14:40:48', '2024-04-18 14:40:48'),
(159, 'App\\Models\\StaticTable', 49, '7edf0f6c-5436-4f3c-afd6-bc0b3e1e400f', 'StaticTable', 'Image5', 'Image5.png', 'image/png', 'media', 'media', 7504, '[]', '[]', '[]', '[]', 1, '2024-04-18 14:42:46', '2024-04-18 14:42:46'),
(160, 'App\\Models\\StaticTable', 49, '3fd7172d-1c04-4a49-8c76-075a13ae5106', 'StaticTable2', '4production', '4production.pdf', 'application/pdf', 'media', 'media', 407105, '[]', '[]', '[]', '[]', 2, '2024-04-18 14:42:46', '2024-04-18 14:42:46'),
(161, 'App\\Models\\Page', 2, 'ff4277f5-4cef-4ece-8c39-b1f120f08f06', 'icon', 'team3', 'team3.png', 'image/png', 'media', 'media', 246090, '[]', '[]', '[]', '[]', 1, '2024-04-18 14:49:14', '2024-04-18 14:49:14'),
(162, 'App\\Models\\StaticTable', 17, '70b9a7d1-a1d5-4f6f-8bdf-d121debaeb96', 'StaticTable', 'cup1', 'cup1.png', 'image/png', 'media', 'media', 393447, '[]', '[]', '[]', '[]', 1, '2024-04-18 19:24:18', '2024-04-18 19:24:18'),
(163, 'App\\Models\\StaticTable', 25, '35a1eaa1-016f-408f-93b2-df31da6ab83d', 'StaticTable', 'about_img', 'about_img.png', 'image/png', 'media', 'media', 995702, '[]', '[]', '[]', '[]', 1, '2024-04-18 19:26:04', '2024-04-18 19:26:04'),
(164, 'App\\Models\\StaticTable', 55, 'a61b5599-a9d6-45fc-bfc1-2a3a3e8b7853', 'StaticTable', 'Image5', 'Image5.png', 'image/png', 'media', 'media', 7504, '[]', '[]', '[]', '[]', 1, '2024-04-18 19:37:00', '2024-04-18 19:37:00'),
(165, 'App\\Models\\StaticTable', 55, '43f6aca4-bf5c-41b1-a508-cee3f80aeb10', 'StaticTable2', 'mens', 'mens.png', 'image/png', 'media', 'media', 961553, '[]', '[]', '[]', '[]', 2, '2024-04-18 19:37:00', '2024-04-18 19:37:00'),
(166, 'App\\Models\\StaticTable', 56, 'd44c2419-6e86-4d8b-8ca1-f5629eb0dd70', 'StaticTable', 'Image (7)', 'Image-(7).png', 'image/png', 'media', 'media', 13497, '[]', '[]', '[]', '[]', 1, '2024-04-18 20:15:31', '2024-04-18 20:15:31'),
(167, 'App\\Models\\StaticTable', 41, 'bd8e9ae5-59b6-4c42-894a-4b8f9f5d756c', 'StaticTable', 'Image (6)', 'Image-(6).png', 'image/png', 'media', 'media', 17587, '[]', '[]', '[]', '[]', 1, '2024-04-18 20:30:04', '2024-04-18 20:30:04'),
(169, 'App\\Models\\StaticTable', 43, '32aebaa7-2aa0-4992-ae1c-80f0cf502e5f', 'StaticTable', 'Image (8)', 'Image-(8).png', 'image/png', 'media', 'media', 16219, '[]', '[]', '[]', '[]', 1, '2024-04-18 20:31:00', '2024-04-18 20:31:00'),
(170, 'App\\Models\\StaticTable', 57, 'c069fbbc-f5cb-4bfd-9a5d-f875b6cfbb44', 'StaticTable', 'Image (12)', 'Image-(12).png', 'image/png', 'media', 'media', 10276, '[]', '[]', '[]', '[]', 1, '2024-04-18 20:31:27', '2024-04-18 20:31:27'),
(171, 'App\\Models\\StaticTable', 40, '53e01989-f241-4684-8af4-9dd904a86487', 'StaticTable', 'team3', 'team3.png', 'image/png', 'media', 'media', 246090, '[]', '[]', '[]', '[]', 1, '2024-04-18 20:32:09', '2024-04-18 20:32:09'),
(172, 'App\\Models\\OurTeam', 1, 'd50e812d-ca5a-4c99-ac60-92a364d137e7', 'OurTeam', 'team', 'team.png', 'image/png', 'media', 'media', 1074001, '[]', '[]', '[]', '[]', 1, '2024-04-18 20:41:50', '2024-04-18 20:41:50'),
(174, 'App\\Models\\OurTeam', 6, 'aaeaf827-d5b7-44d8-8312-2be53544cd3e', 'OurTeam', 'Frame 17 (2)', 'Frame-17-(2).png', 'image/png', 'media', 'media', 2824, '[]', '[]', '[]', '[]', 1, '2024-04-18 20:45:29', '2024-04-18 20:45:29'),
(175, 'App\\Models\\OurTeam', 7, 'ea956011-ab56-49d9-a95d-e8bb45ac203b', 'OurTeam', 'Frame 24', 'Frame-24.png', 'image/png', 'media', 'media', 2373, '[]', '[]', '[]', '[]', 1, '2024-04-18 20:47:47', '2024-04-18 20:47:47'),
(176, 'App\\Models\\StaticTable', 37, '137bff42-c8da-4dd3-93db-9d7f09bc633f', 'StaticTable', 'Frame 17 (2)', 'Frame-17-(2).png', 'image/png', 'media', 'media', 2824, '[]', '[]', '[]', '[]', 1, '2024-04-18 20:48:18', '2024-04-18 20:48:18'),
(177, 'App\\Models\\StaticTable', 36, '67de2296-4944-49b4-9dd3-4b25899b4720', 'StaticTable', 'Frame 17', 'Frame-17.png', 'image/png', 'media', 'media', 3723, '[]', '[]', '[]', '[]', 1, '2024-04-18 20:48:44', '2024-04-18 20:48:44'),
(178, 'App\\Models\\StaticTable', 18, '83356802-771c-4812-9c51-034bb4fba3dd', 'StaticTable', 'lap_img', 'lap_img.png', 'image/png', 'media', 'media', 685560, '[]', '[]', '[]', '[]', 1, '2024-04-18 20:51:14', '2024-04-18 20:51:14'),
(179, 'App\\Models\\Slider', 16, '277df387-44a9-4914-9b6d-f8de2c0859ed', 'image', 'graduated', 'graduated.png', 'image/png', 'media', 'media', 781661, '[]', '[]', '[]', '[]', 1, '2024-04-18 22:07:30', '2024-04-18 22:07:30'),
(180, 'App\\Models\\StaticTable', 58, '01faf39b-6f74-499a-a343-ae8474de0d83', 'StaticTable', 'Border', 'Border.png', 'image/png', 'media', 'media', 823927, '[]', '[]', '[]', '[]', 1, '2024-04-19 18:24:54', '2024-04-19 18:24:54'),
(181, 'App\\Models\\StaticTable', 59, '04f613f8-1f27-429d-86d2-46ca4727b85f', 'StaticTable', 'Frame 110 (2)', 'Frame-110-(2).png', 'image/png', 'media', 'media', 72896, '[]', '[]', '[]', '[]', 1, '2024-04-19 22:53:21', '2024-04-19 22:53:21'),
(183, 'App\\Models\\StaticTable', 38, '5eac63a6-9adf-414f-adb1-35810aa7b487', 'StaticTable2', '4production', '4production.pdf', 'application/pdf', 'media', 'media', 407105, '[]', '[]', '[]', '[]', 2, '2024-04-19 22:55:32', '2024-04-19 22:55:32'),
(184, 'App\\Models\\StaticTable', 60, '1c33b014-7dea-4305-b77b-43d779b28637', 'StaticTable', 'img1', 'img1.png', 'image/png', 'media', 'media', 318934, '[]', '[]', '[]', '[]', 1, '2024-04-19 22:58:46', '2024-04-19 22:58:46'),
(185, 'App\\Models\\StaticTable', 61, 'a53cf238-495a-4dcb-bd40-56ae1d0c8c1c', 'StaticTable', 'iso_Image', 'iso_Image.png', 'image/png', 'media', 'media', 17117, '[]', '[]', '[]', '[]', 1, '2024-04-19 23:00:55', '2024-04-19 23:00:55'),
(186, 'App\\Models\\StaticTable', 61, '6c243911-84cc-4971-8946-01c54144eb35', 'StaticTable2', '4production', '4production.pdf', 'application/pdf', 'media', 'media', 407105, '[]', '[]', '[]', '[]', 2, '2024-04-19 23:00:55', '2024-04-19 23:00:55'),
(189, 'App\\Models\\StaticTable', 62, '8dd0080d-0d0f-4339-9187-5e1345734a94', 'StaticTable', 'Border', 'Border.png', 'image/png', 'media', 'media', 823927, '[]', '[]', '[]', '[]', 1, '2024-04-19 23:06:28', '2024-04-19 23:06:28'),
(190, 'App\\Models\\StaticTable', 63, '91e027ab-b7fd-4300-a9b2-9eccf98b6940', 'StaticTable', 'Image (9)', 'Image-(9).png', 'image/png', 'media', 'media', 22298, '[]', '[]', '[]', '[]', 1, '2024-04-19 23:07:46', '2024-04-19 23:07:46'),
(191, 'App\\Models\\StaticTable', 63, 'a158eb22-ad3f-48d7-bd87-7c8672aa850d', 'StaticTable2', '4production', '4production.pdf', 'application/pdf', 'media', 'media', 407105, '[]', '[]', '[]', '[]', 2, '2024-04-19 23:07:46', '2024-04-19 23:07:46'),
(193, 'App\\Models\\StaticTable', 38, '743389a8-6ab0-4097-a2a2-7bec0c05bb63', 'StaticTable', 'Image (2)', 'Image-(2).png', 'image/png', 'media', 'media', 9271, '[]', '[]', '[]', '[]', 3, '2024-04-20 13:33:02', '2024-04-20 13:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_04_02_193005_create_translations_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_30_173954_create_media_table', 1),
(7, '2023_12_30_181058_create_admins_table', 1),
(8, '2023_12_30_181332_create_images_table', 1),
(9, '2023_12_30_182211_create_activity_log_table', 1),
(10, '2023_12_30_182212_add_event_column_to_activity_log_table', 1),
(11, '2023_12_30_182213_add_batch_uuid_column_to_activity_log_table', 1),
(12, '2023_12_30_183200_create_settings_table', 1),
(13, '2023_12_30_191410_create_translation_keys_table', 1),
(14, '2023_12_30_221314_create_permission_tables', 1),
(15, '2023_12_30_222811_create_new_role_table', 1),
(16, '2024_01_04_142856_create_pages_table', 1),
(17, '2024_01_05_014740_create_items_table', 1),
(18, '2024_01_06_230528_create_static_tables_table', 1),
(19, '2024_01_09_181558_create_many_tables_table', 1),
(20, '2024_01_11_115330_create_our_teams_table', 1),
(21, '2024_01_25_171945_create_tabs_table', 1),
(22, '2024_01_26_091328_create_projects_table', 1),
(23, '2024_01_26_154339_create_education_table', 1),
(24, '2024_01_26_181041_create_solutions_table', 1),
(25, '2024_02_09_234649_create_about_tabs_table', 1),
(26, '2024_02_10_123132_create_program_tabs_table', 1),
(27, '2024_02_10_133723_create_help_tabs_table', 1),
(28, '2024_02_10_164414_create_joinus_tabs_table', 1),
(29, '2024_02_13_190844_add_url_to_program_tabs_table', 2),
(31, '2024_02_29_190129_create_education_ut', 3),
(32, '2024_03_12_155221_create_testing_table', 4),
(33, '2024_03_12_155555_create_testing_ut', 5),
(34, '2024_04_14_135739_edit_static_tables_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `our_teams`
--

CREATE TABLE `our_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jop` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Not Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `pages_id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagrame` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_teams`
--

INSERT INTO `our_teams` (`id`, `title`, `description`, `name`, `jop`, `status`, `pages_id`, `item`, `sort`, `created_at`, `updated_at`, `facebook`, `whatsapp`, `instagrame`) VALUES
(1, '{\"en\":\"Our Team\"}', '{\"en\":\"<p><strong>National Education Network is a leading company in the field of information and communication technology training. In order to reach the network, it helped it obtain academic accreditation as an educational partner for many of the most powerful companies in the world. Over the past years, the National Network for Education has been accredited by many educational and academic institutions that provide contemporary technology in the world, due to the great confidence it has received from all educational partners, and it has received many awards over the previous years.</strong></p>\"}', NULL, NULL, 'Active', 18, 'section-one', NULL, '2024-04-08 09:25:30', '2024-04-14 15:28:58', NULL, NULL, NULL),
(6, NULL, NULL, '{\"en\":\"Vanna Bowman\"}', '{\"en\":\"Eu qui veniam vel d\"}', 'Active', 18, 'member-board', NULL, '2024-04-16 07:00:59', '2024-04-18 20:45:29', 'https://www.youtube.com/', 'https://www.youtube.com/', 'https://www.youtube.com/'),
(7, NULL, NULL, '{\"en\":\"Omar yasser\"}', '{\"en\":\"laravel developer\"}', 'Active', 18, 'member-board', NULL, '2024-04-18 20:47:47', '2024-04-18 20:47:47', 'https://www.youtube.com/', 'https://www.youtube.com/', 'https://www.youtube.com/');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Active','Not Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `navbar` enum('Active','Not Active') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` enum('Active','Not Active') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `description`, `status`, `navbar`, `footer`, `parent_id`, `sort`, `link`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Home\",\"ar\":\"\\u0627\\u0644\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u0631\\u0626\\u064a\\u0633\\u064a\\u0629\"}', 'home', NULL, 'Active', 'Active', NULL, NULL, 1, NULL, NULL, NULL),
(2, '{\"en\":\"About\",\"ar\":\"عن\"}', 'about', '{\"en\":null}', 'Active', 'Active', NULL, NULL, 2, NULL, NULL, '2024-04-09 12:23:04'),
(3, '{\"en\":\"Projects\",\"ar\":\"\\u0627\\u0644\\u0645\\u0634\\u0627\\u0631\\u064a\\u0639\"}', 'projects', NULL, 'Active', 'Active', NULL, NULL, 3, NULL, NULL, NULL),
(4, '{\"en\":\"Education\",\"ar\":\"Education\"}', 'education', NULL, 'Active', 'Active', NULL, NULL, 4, NULL, NULL, NULL),
(5, '{\"en\":\"Testing\",\"ar\":\"\\u0627\\u062e\\u062a\\u0628\\u0627\\u0631\\u0627\\u062a\"}', 'testing', NULL, 'Active', 'Active', NULL, NULL, 5, NULL, NULL, NULL),
(6, '{\"en\":\"Solutions\",\"ar\":\"\\u062d\\u0644\\u0648\\u0644\"}', 'solutions', NULL, 'Active', 'Active', NULL, NULL, 6, NULL, NULL, NULL),
(7, '{\"en\":\"Technology\",\"ar\":\"\\u062a\\u0643\\u0646\\u0648\\u0644\\u0648\\u062c\\u064a\\u0627\"}', 'technology', NULL, 'Active', 'Active', NULL, NULL, 7, NULL, NULL, NULL),
(8, '{\"en\":\"Doc Validation\",\"ar\":\"\\u0627\\u0644\\u062a\\u062d\\u0642\\u0642 \\u0645\\u0646 \\u0635\\u062d\\u0629 \\u0627\\u0644\\u0648\\u062b\\u064a\\u0642\\u0629\"}', 'doc-validation', NULL, 'Active', 'Active', NULL, NULL, 8, NULL, NULL, NULL),
(9, '{\"en\":\"Join Us\",\"ar\":\"\\u0627\\u0646\\u0636\\u0645 \\u0625\\u0644\\u064a\\u0646\\u0627\"}', 'join-us', NULL, 'Active', 'Active', NULL, NULL, 9, NULL, NULL, NULL),
(10, '{\"en\":\"Find Us\",\"ar\":\"\\u0627\\u0628\\u062d\\u062b \\u0639\\u0646\\u0627\"}', 'find-us', NULL, 'Active', 'Active', NULL, NULL, 10, NULL, NULL, NULL),
(11, '{\"en\":\"Identity\",\"ar\":\"\\u0647\\u0648\\u064a\\u0629\"}', 'identity', '{\"en\":null}', 'Active', 'Active', NULL, 2, 1, NULL, NULL, '2024-04-13 21:37:40'),
(12, '{\"en\":\"Investors\",\"ar\":\"\\u0627\\u0644\\u0645\\u0633\\u062a\\u062b\\u0645\\u0631\\u064a\\u0646\"}', 'investors', '{\"en\":null}', 'Active', 'Active', NULL, 2, 2, NULL, NULL, '2024-04-14 00:25:51'),
(13, '{\"en\":\"Achievements\",\"ar\":\"\\u0627\\u0644\\u0625\\u0646\\u062c\\u0627\\u0632\\u0627\\u062a\"}', 'achievements', '{\"en\":null}', 'Active', 'Active', NULL, 2, 3, NULL, NULL, '2024-04-14 09:46:59'),
(14, '{\"en\":\"Awards\",\"ar\":\"\\u0627\\u0644\\u062c\\u0648\\u0627\\u0626\\u0632\"}', 'awards', '{\"en\":null}', 'Active', 'Active', NULL, 2, 4, NULL, NULL, '2024-04-14 09:52:45'),
(15, '{\"en\":\"Certificates\",\"ar\":\"\\u0627\\u0644\\u0634\\u0647\\u0627\\u062f\\u0627\\u062a\"}', 'certificates', '{\"en\":null}', 'Active', 'Active', NULL, 2, 5, NULL, NULL, '2024-04-14 09:53:03'),
(16, '{\"en\":\"Partners\",\"ar\":\"\\u0627\\u0644\\u0634\\u0631\\u0643\\u0627\\u0621\"}', 'partners', '{\"en\":null}', 'Active', 'Active', NULL, 2, 6, NULL, NULL, '2024-04-14 09:53:57'),
(17, '{\"en\":\"Clients\",\"ar\":\"\\u0627\\u0644\\u0639\\u0645\\u0644\\u0627\\u0621\"}', 'clients', '{\"en\":null}', 'Active', 'Active', NULL, 2, 8, NULL, NULL, '2024-04-14 09:55:53'),
(18, '{\"en\":\"Our Team\",\"ar\":\"\\u0641\\u0631\\u064a\\u0642\\u0646\\u0627\"}', 'our-team', '{\"en\":null}', 'Active', 'Active', NULL, 2, 9, NULL, NULL, '2024-04-14 09:56:16'),
(19, '{\"en\":\"Careers\",\"ar\":\"\\u0648\\u0638\\u0627\\u0626\\u0641\"}', 'careers', '{\"en\":null}', 'Active', 'Active', NULL, 2, 10, NULL, NULL, '2024-04-14 09:56:40'),
(20, '{\"en\":\"Education\",\"ar\":\"\\u062a\\u0639\\u0644\\u064a\\u0645\"}', 'education', NULL, 'Active', 'Active', NULL, 3, 11, NULL, NULL, NULL),
(21, '{\"en\":\"Recruitment\",\"ar\":\"\\u062a\\u0648\\u0638\\u064a\\u0641\"}', 'recruitment', NULL, 'Active', 'Active', NULL, 3, 12, NULL, NULL, NULL),
(22, '{\"en\":\"Government\",\"ar\":\"\\u062d\\u0643\\u0648\\u0645\\u0629\"}', 'government', NULL, 'Active', 'Active', NULL, 3, 13, NULL, NULL, NULL),
(23, '{\"en\":\"Entrepreneurship\",\"ar\":\"\\u0631\\u064a\\u0627\\u062f\\u0629 \\u0627\\u0644\\u0623\\u0639\\u0645\\u0627\\u0644\"}', 'entrepreneurship', NULL, 'Active', 'Active', NULL, 3, 14, NULL, NULL, NULL),
(24, '{\"en\":\"Subsidized Programs\",\"ar\":\"\\u0627\\u0644\\u0628\\u0631\\u0627\\u0645\\u062c \\u0627\\u0644\\u0645\\u062f\\u0639\\u0648\\u0645\\u0629\"}', 'subsidized-programs', NULL, 'Active', 'Active', NULL, 3, 15, NULL, NULL, NULL),
(25, '{\"en\":\"International Certificates\",\"ar\":\"\\u0627\\u0644\\u0634\\u0647\\u0627\\u062f\\u0627\\u062a \\u0627\\u0644\\u062f\\u0648\\u0644\\u064a\\u0629\"}', 'international-certificates', NULL, 'Active', 'Active', NULL, 4, 16, NULL, NULL, NULL),
(26, '{\"en\":\"International Exams\",\"ar\":\"\\u0627\\u0644\\u0627\\u0645\\u062a\\u062d\\u0627\\u0646\\u0627\\u062a \\u0627\\u0644\\u062f\\u0648\\u0644\\u064a\\u0629\"}', 'international-exams', NULL, 'Active', 'Active', NULL, 4, 17, NULL, NULL, NULL),
(27, '{\"en\":\"Postgraduate\",\"ar\":\"\\u062f\\u0631\\u0627\\u0633\\u0627\\u062a \\u0639\\u0644\\u064a\\u0627\"}', 'postgraduate', NULL, 'Active', 'Active', NULL, 4, 18, NULL, NULL, NULL),
(28, '{\"en\":\"Study Abroad\",\"ar\":\"\\u0627\\u0644\\u062f\\u0631\\u0627\\u0633\\u0629 \\u0641\\u064a \\u0627\\u0644\\u062e\\u0627\\u0631\\u062c\"}', 'study-abroad', NULL, 'Active', 'Active', NULL, 4, 19, NULL, NULL, NULL),
(29, '{\"en\":\"Tqs\",\"ar\":\"\\u062a\\u064a\\u0643 \\u0627\\u0633\"}', 'tqs', NULL, 'Active', 'Active', NULL, 4, 20, NULL, NULL, NULL),
(30, '{\"en\":\"Alumni\",\"ar\":\"\\u0627\\u0644\\u062e\\u0631\\u064a\\u062c\\u0648\\u0646\"}', 'alumni', NULL, 'Active', 'Active', NULL, 4, 21, NULL, NULL, NULL),
(31, '{\"en\":\"Tourism\",\"ar\":\"\\u0627\\u0644\\u0633\\u064a\\u0627\\u062d\\u0629\"}', 'tourism', NULL, 'Active', 'Active', NULL, 4, 22, NULL, NULL, NULL),
(32, '{\"en\":\"Virtual Academy\",\"ar\":\"\\u0627\\u0644\\u0623\\u0643\\u0627\\u062f\\u064a\\u0645\\u064a\\u0629 \\u0627\\u0644\\u0627\\u0641\\u062a\\u0631\\u0627\\u0636\\u064a\\u0629\"}', 'virtual-academy', NULL, 'Active', 'Active', NULL, 4, 23, NULL, NULL, NULL),
(33, '{\"en\":\"Why Choose Us?\",\"ar\":\"\\u0644\\u0645\\u0627\\u0630\\u0627 \\u0623\\u062e\\u062a\\u0631\\u062a\\u0646\\u0627\\u061f\"}', 'why-choose-us', NULL, 'Active', 'Active', NULL, 5, 24, NULL, NULL, NULL),
(34, '{\"en\":\"Examination Platform\",\"ar\":\"\\u0645\\u0646\\u0635\\u0629 \\u0627\\u0644\\u0627\\u0645\\u062a\\u062d\\u0627\\u0646\\u0627\\u062a\"}', 'examination-platform', NULL, 'Active', 'Active', NULL, 5, 25, NULL, NULL, NULL),
(35, '{\"en\":\"Security & Quality\",\"ar\":\"\\u0627\\u0644\\u0623\\u0645\\u0646 \\u0648\\u0627\\u0644\\u062c\\u0648\\u062f\\u0629\"}', 'security-quality', NULL, 'Active', 'Active', NULL, 5, 26, NULL, NULL, NULL),
(36, '{\"en\":\"Test Development\",\"ar\":\"\\u062a\\u0637\\u0648\\u064a\\u0631 \\u0627\\u0644\\u0627\\u062e\\u062a\\u0628\\u0627\\u0631\"}', 'test-development', NULL, 'Active', 'Active', NULL, 5, 27, NULL, NULL, NULL),
(37, '{\"en\":\"Test Delivery\",\"ar\":\"\\u062a\\u0633\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0627\\u062e\\u062a\\u0628\\u0627\\u0631\"}', 'test-delivery', NULL, 'Active', 'Active', NULL, 5, 28, NULL, NULL, NULL),
(38, '{\"en\":\"Test Taker\",\"ar\":\"\\u0645\\u062a\\u0642\\u062f\\u0645 \\u0644\\u0627\\u062e\\u062a\\u0628\\u0627\\u0631\"}', 'test-taker', NULL, 'Active', 'Active', NULL, 5, 29, NULL, NULL, NULL),
(39, '{\"en\":\"Education\",\"ar\":\"\\u062a\\u0639\\u0644\\u064a\\u0645\"}', 'education', NULL, 'Active', 'Active', NULL, 6, 30, NULL, NULL, NULL),
(40, '{\"en\":\"Business\",\"ar\":\"\\u0639\\u0645\\u0644\"}', 'business', NULL, 'Active', 'Active', NULL, 6, 31, NULL, NULL, NULL),
(41, '{\"en\":\"Microsoft Technology\",\"ar\":\"\\u062a\\u0643\\u0646\\u0648\\u0644\\u0648\\u062c\\u064a\\u0627 \\u0645\\u0627\\u064a\\u0643\\u0631\\u0648\\u0633\\u0648\\u0641\\u062a\"}', 'microsoft-technology', NULL, 'Active', 'Active', NULL, 7, 32, NULL, NULL, NULL),
(42, '{\"en\":\"Cloud Computing\",\"ar\":\"\\u062d\\u0648\\u0633\\u0628\\u0629 \\u0633\\u062d\\u0627\\u0628\\u064a\\u0629\"}', 'cloud-computing', NULL, 'Active', 'Active', NULL, 7, 33, NULL, NULL, NULL),
(43, '{\"en\":\"Cyber Security\",\"ar\":\"\\u0627\\u0644\\u0623\\u0645\\u0646 \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a\"}', 'cyber-security', NULL, 'Active', 'Active', NULL, 7, 34, NULL, NULL, NULL),
(44, '{\"en\":\"Smart Systems\",\"ar\":\"\\u0627\\u0644\\u0623\\u0646\\u0638\\u0645\\u0629 \\u0627\\u0644\\u0630\\u0643\\u064a\\u0629\"}', 'smart-systems', NULL, 'Active', 'Active', NULL, 7, 35, NULL, NULL, NULL),
(45, '{\"en\":\"Software Development\",\"ar\":\"\\u062a\\u0637\\u0648\\u064a\\u0631 \\u0627\\u0644\\u0628\\u0631\\u0645\\u062c\\u064a\\u0627\\u062a\"}', 'software-development', NULL, 'Active', 'Active', NULL, 7, 36, NULL, NULL, NULL),
(46, '{\"en\":\"Digital Marketing\",\"ar\":\"\\u0627\\u0644\\u062a\\u0633\\u0648\\u064a\\u0642 \\u0627\\u0644\\u0631\\u0642\\u0645\\u064a\"}', 'digital-marketing', NULL, 'Active', 'Active', NULL, 7, 37, NULL, NULL, NULL),
(47, '{\"en\":\"Our Network\",\"ar\":\"\\u0634\\u0628\\u0643\\u062a\\u0646\\u0627\"}', 'our-network', NULL, 'Active', 'Active', NULL, 8, 38, NULL, NULL, NULL),
(48, '{\"en\":\"Our Services\",\"ar\":\"\\u062e\\u062f\\u0645\\u0627\\u062a\\u0646\\u0627\"}', 'our-services', NULL, 'Active', 'Active', NULL, 8, 39, NULL, NULL, NULL),
(49, '{\"en\":\"Distinguee Features\",\"ar\":\"\\u0627\\u0644\\u0645\\u064a\\u0632\\u0627\\u062a \\u0627\\u0644\\u0645\\u0645\\u064a\\u0632\\u0629\"}', 'distinguee-features', NULL, 'Active', 'Active', NULL, 8, 40, NULL, NULL, NULL),
(50, '{\"en\":\"How Do We Work?\",\"ar\":\"\\u0643\\u064a\\u0641 \\u0646\\u0639\\u0645\\u0644\\u061f\"}', 'how-do-we-work', NULL, 'Active', 'Active', NULL, 8, 41, NULL, NULL, NULL),
(51, '{\"en\":\"Why Had To Trust?\",\"ar\":\"\\u0644\\u0645\\u0627\\u0630\\u0627 \\u0643\\u0627\\u0646 \\u064a\\u062c\\u0628 \\u0627\\u0644\\u062b\\u0642\\u0629\\u061f\"}', 'why-had-to-trust', NULL, 'Active', 'Active', NULL, 8, 42, NULL, NULL, NULL),
(52, '{\"en\":\"Academic\",\"ar\":\"\\u0623\\u0643\\u0627\\u062f\\u064a\\u0645\\u064a\"}', 'academic', NULL, 'Active', 'Active', NULL, 9, 43, NULL, NULL, NULL),
(53, '{\"en\":\"Professional\",\"ar\":\"\\u0627\\u062d\\u062a\\u0631\\u0627\\u0641\\u064a\"}', 'professional', NULL, 'Active', 'Active', NULL, 9, 44, NULL, NULL, NULL),
(54, '{\"en\":\"Centers\",\"ar\":\"\\u0627\\u0644\\u0645\\u0631\\u0627\\u0643\\u0632\"}', 'centers', NULL, 'Active', 'Active', NULL, 9, 45, NULL, NULL, NULL),
(55, '{\"en\":\"Agents\",\"ar\":\"\\u0639\\u0645\\u0644\\u0627\\u0621\"}', 'agents', NULL, 'Active', 'Active', NULL, 9, 46, NULL, NULL, NULL),
(56, '{\"en\":\"International Cards\",\"ar\":\"\\u0627\\u0644\\u0628\\u0637\\u0627\\u0642\\u0627\\u062a \\u0627\\u0644\\u062f\\u0648\\u0644\\u064a\\u0629\"}', 'international-cards', NULL, 'Active', 'Active', NULL, 9, 47, NULL, NULL, NULL),
(57, '{\"en\":\"ELITE Membership\",\"ar\":\"\\u0639\\u0636\\u0648\\u064a\\u0629 \\u0627\\u0644\\u0646\\u062e\\u0628\\u0629\"}', 'elite-membership', NULL, 'Active', 'Active', NULL, 9, 48, NULL, NULL, NULL),
(58, '{\"en\":\"Certified Trainers\",\"ar\":\"\\u0627\\u0644\\u0645\\u062f\\u0631\\u0628\\u064a\\u0646 \\u0627\\u0644\\u0645\\u0639\\u062a\\u0645\\u062f\\u064a\\u0646\"}', 'certified-trainers', NULL, 'Active', 'Active', NULL, 10, 49, NULL, NULL, NULL),
(59, '{\"en\":\"Training Centers\",\"ar\":\"\\u0645\\u0631\\u0627\\u0643\\u0632 \\u0627\\u0644\\u062a\\u062f\\u0631\\u064a\\u0628\"}', 'training-centers', NULL, 'Active', 'Active', NULL, 10, 50, NULL, NULL, NULL),
(60, '{\"en\":\"Testing Centers\",\"ar\":\"\\u0645\\u0631\\u0627\\u0643\\u0632 \\u0627\\u0644\\u0627\\u062e\\u062a\\u0628\\u0627\\u0631\"}', 'testing-centers', NULL, 'Active', 'Active', NULL, 10, 51, NULL, NULL, NULL),
(61, '{\"en\":\"Recruitment Centers\",\"ar\":\"\\u0645\\u0631\\u0627\\u0643\\u0632 \\u0627\\u0644\\u062a\\u0648\\u0638\\u064a\\u0641\"}', 'recruitment-centers', NULL, 'Active', 'Active', NULL, 10, 52, NULL, NULL, NULL),
(62, '{\"en\":\"strategic\",\"ar\":\"\\u0627\\u0633\\u062a\\u0631\\u0627\\u062a\\u064a\\u062c\\u064a\"}', 'strategic-partners', NULL, 'Active', 'Active', NULL, 16, 52, NULL, NULL, NULL),
(63, '{\"en\":\"technology\",\"ar\":\"\\u062a\\u0643\\u0646\\u0648\\u0644\\u0648\\u062c\\u064a\\u0627\"}', 'technology-partners', NULL, 'Active', 'Active', NULL, 16, 52, NULL, NULL, NULL),
(64, '{\"en\":\"education\",\"ar\":\"\\u062a\\u0639\\u0644\\u064a\\u0645\"}', 'education-partners', NULL, 'Active', 'Active', NULL, 16, 52, NULL, NULL, NULL),
(65, '{\"en\":\"testing\",\"ar\":\"\\u0627\\u062e\\u062a\\u0628\\u0627\\u0631\\u0627\\u062a\"}', 'testing-partners', NULL, 'Active', 'Active', NULL, 16, 52, NULL, NULL, NULL),
(66, '{\"en\":\"business\",\"ar\":\"\\u0639\\u0645\\u0644\"}', 'business-partners', NULL, 'Active', 'Active', NULL, 16, 52, NULL, NULL, NULL),
(67, '{\"en\":\"Tamkeen Competition\",\"ar\":\"Tamkeen Competition\"}', 'technology-clients', '{\"ar\":null}', 'Active', 'Active', NULL, 17, 52, NULL, NULL, '2024-04-15 11:53:11'),
(68, '{\"en\":\"Cisco Academy\",\"ar\":\"Cisco Academy\"}', 'education-clients', '{\"ar\":null}', 'Active', 'Active', NULL, 17, 52, NULL, NULL, '2024-04-15 11:53:26'),
(69, '{\"en\":\"learning academy\",\"ar\":\"\\u0623\\u0643\\u0627\\u062f\\u064a\\u0645\\u064a\\u0629 \\u0627\\u0644\\u062a\\u0639\\u0644\\u0645\"}', 'learning-academy', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(70, '{\"en\":\"UTEST\",\"ar\":\"\\u064a\\u0648\\u062a\\u064a\\u0633\\u062a\"}', 'utest', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(71, '{\"en\":\"Edu 4 Me\",\"ar\":\"\\u064a\\u0648\\u062a\\u064a\\u0633\\u062a\\u062f\\u0648 4 \\u0645\\u064a\"}', 'edu-4-me', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(72, '{\"en\":\"Elite Membership Program\",\"ar\":\"\\u0628\\u0631\\u0646\\u0627\\u0645\\u062c \\u0639\\u0636\\u0648\\u064a\\u0629 \\u0627\\u0644\\u0646\\u062e\\u0628\\u0629\"}', 'elite-membership-program', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(73, '{\"en\":\"Certified Trainer\",\"ar\":\"\\u0645\\u062f\\u0631\\u0628 \\u0645\\u0639\\u062a\\u0645\\u062f\"}', 'certified-trainer', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(74, '{\"en\":\"Edu Me Free\",\"ar\":\"\\u0627\\u064a\\u062f\\u0648 \\u0644\\u064a \\u0627\\u0644\\u062d\\u0631\\u0629\"}', 'edu-me-free', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(75, '{\"en\":\"Masr Online\",\"ar\":\"\\u0645\\u0635\\u0631 \\u0627\\u0648\\u0646 \\u0644\\u0627\\u064a\\u0646\"}', 'masr-online', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(76, '{\"en\":\"International Certificate of Banking Services\",\"ar\":\"\\u0627\\u0644\\u0634\\u0647\\u0627\\u062f\\u0629 \\u0627\\u0644\\u062f\\u0648\\u0644\\u064a\\u0629 \\u0644\\u0644\\u062e\\u062f\\u0645\\u0627\\u062a \\u0627\\u0644\\u0645\\u0635\\u0631\\u0641\\u064a\\u0629\"}', 'international-certificate-of-banking-services', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(77, '{\"en\":\"The Egyptian Initiative for Mastering Computer Skills\",\"ar\":\"\\u0627\\u0644\\u0645\\u0628\\u0627\\u062f\\u0631\\u0629 \\u0627\\u0644\\u0645\\u0635\\u0631\\u064a\\u0629 \\u0644\\u0625\\u062a\\u0642\\u0627\\u0646 \\u0645\\u0647\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u062d\\u0627\\u0633\\u0628 \\u0627\\u0644\\u0622\\u0644\\u064a\"}', 'the-egyptian-initiative-for-mastering-computer-skills', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(78, '{\"en\":\"IPSD\",\"ar\":\"\\u0627\\u064a \\u0628\\u064a \\u0627\\u0633 \\u062f\\u064a\"}', 'ipsd', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(79, '{\"en\":\"BSkills\",\"ar\":\"\\u0628\\u0643\\u0627\\u0644\\u0648\\u0631\\u064a\\u0648\\u0633 \\u0627\\u0644\\u0645\\u0647\\u0627\\u0631\\u0627\\u062a\"}', 'bskills', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(80, '{\"en\":\"ICPU\",\"ar\":\"\\u0627\\u0644\\u0627\\u062a\\u062d\\u0627\\u062f \\u0627\\u0644\\u0628\\u0631\\u0644\\u0645\\u0627\\u0646\\u064a \\u0627\\u0644\\u062f\\u0648\\u0644\\u064a\"}', 'icpu', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(81, '{\"en\":\"Professional Trainers Academy\",\"ar\":\"\\u0623\\u0643\\u0627\\u062f\\u064a\\u0645\\u064a\\u0629 \\u0627\\u0644\\u0645\\u062f\\u0631\\u0628\\u064a\\u0646 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0631\\u0641\\u064a\\u0646\"}', 'professional-trainers-academy', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(82, '{\"en\":\"MTA\",\"ar\":\"\"}', 'mta', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(83, '{\"en\":\"IESL\",\"ar\":\"\"}', 'iesl', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(84, '{\"en\":\"ITL\",\"ar\":\"\"}', 'itl', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(85, '{\"en\":\"Upgrade for You\",\"ar\":\"\"}', 'upgrade-for-you', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(86, '{\"en\":\"Air Hospitality and Aviation Services Program\",\"ar\":\"\"}', 'air-hospitality-and-aviation-services-program', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(87, '{\"en\":\"International Scholarship for English Language Proficiency \",\"ar\":\"\"}', 'international-scholarship-for-english-language-proficiency', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(88, '{\"en\":\"Industrial Training in Cooperation \",\"ar\":\"\"}', 'industrial-training-in-cooperation', NULL, 'Active', 'Active', NULL, 20, 52, NULL, NULL, NULL),
(89, '{\"en\":\"Tasaheel \",\"ar\":\"\"}', 'tasaheel', NULL, 'Active', 'Active', NULL, 21, 52, NULL, NULL, NULL),
(90, '{\"en\":\"Job 4 me \",\"ar\":\"\"}', 'job-4-me', NULL, 'Active', 'Active', NULL, 21, 52, NULL, NULL, NULL),
(91, '{\"en\":\"Data Quest \",\"ar\":\"\"}', 'data-quest', NULL, 'Active', 'Active', NULL, 21, 52, NULL, NULL, NULL),
(92, '{\"en\":\"Haya Karima \",\"ar\":\"\"}', 'haya-karima', NULL, 'Active', 'Active', NULL, 22, 52, NULL, NULL, NULL),
(93, '{\"en\":\"Future Vision Pioneers Initiative\",\"ar\":\"\"}', 'future-vision-pioneers-initiative', NULL, 'Active', 'Active', NULL, 22, 52, NULL, NULL, NULL),
(94, '{\"en\":\"Specialization Tests on the Online Portal\",\"ar\":\"\"}', 'specialization-tests-on-the-online-portal', NULL, 'Active', 'Active', NULL, 22, 52, NULL, NULL, NULL),
(95, '{\"en\":\"Specialization Tests in The Temporary Teacher Competition\",\"ar\":\"\"}', 'specialization-tests-in-the-temporary-teacher-competition', NULL, 'Active', 'Active', NULL, 22, 52, NULL, NULL, NULL),
(96, '{\"en\":\"Global Dev Gate\",\"ar\":\"\"}', 'global-dev-gate', NULL, 'Active', 'Active', NULL, 23, 52, NULL, NULL, NULL),
(97, '{\"en\":\"Egypt - UAE Project (Training for Employment)\",\"ar\":\"\"}', 'egypt-uae-project-training-for-employment', NULL, 'Active', 'Active', NULL, 23, 52, NULL, NULL, NULL),
(98, '{\"en\":\"Training for Job\",\"ar\":\"\"}', 'training-for-job', NULL, 'Active', 'Active', NULL, 23, 52, NULL, NULL, NULL),
(99, '{\"en\":\"Project Name\",\"ar\":\"\"}', 'project-name', NULL, 'Active', 'Active', NULL, 24, 52, NULL, NULL, NULL),
(100, '{\"en\":\"Project Name\",\"ar\":\"\"}', 'project-name', NULL, 'Active', 'Active', NULL, 24, 52, NULL, NULL, NULL),
(101, '{\"en\":\"Microsoft\",\"ar\":\"\"}', 'microsoft', NULL, 'Active', 'Active', NULL, 25, 52, NULL, NULL, NULL),
(102, '{\"en\":\"Cisco\",\"ar\":\"\"}', 'cisco', NULL, 'Active', 'Active', NULL, 25, 52, NULL, NULL, NULL),
(103, '{\"en\":\"Oracle\",\"ar\":\"\"}', 'oracle', NULL, 'Active', 'Active', NULL, 25, 52, NULL, NULL, NULL),
(104, '{\"en\":\"EC-Council\",\"ar\":\"\"}', 'ec-council', NULL, 'Active', 'Active', NULL, 25, 52, NULL, NULL, NULL),
(105, '{\"en\":\"Languages\",\"ar\":\"\"}', 'languages', NULL, 'Active', 'Active', NULL, 25, 52, NULL, NULL, NULL),
(106, '{\"en\":\"Business Administration\",\"ar\":\"\"}', 'business-administration', NULL, 'Active', 'Active', NULL, 25, 52, NULL, NULL, NULL),
(107, '{\"en\":\"Computer Users\",\"ar\":\"\"}', 'computer-users', NULL, 'Active', 'Active', NULL, 25, 52, NULL, NULL, NULL),
(108, '{\"en\":\"Overview\",\"ar\":\"\"}', 'overview', NULL, 'Active', 'Active', NULL, 26, 52, NULL, NULL, NULL),
(109, '{\"en\":\"VUE\",\"ar\":\"\"}', 'vue', NULL, 'Active', 'Active', NULL, 26, 52, NULL, NULL, NULL),
(110, '{\"en\":\"PROMETRIC\",\"ar\":\"\"}', 'prometric', NULL, 'Active', 'Active', NULL, 26, 52, NULL, NULL, NULL),
(111, '{\"en\":\"iTEP\",\"ar\":\"\"}', 'itep', NULL, 'Active', 'Active', NULL, 26, 52, NULL, NULL, NULL),
(112, '{\"en\":\"ETS\",\"ar\":\"\"}', 'ets', NULL, 'Active', 'Active', NULL, 26, 52, NULL, NULL, NULL),
(113, '{\"en\":\"KRYTERION\",\"ar\":\"\"}', 'kryterion', NULL, 'Active', 'Active', NULL, 26, 52, NULL, NULL, NULL),
(114, '{\"en\":\"GES\",\"ar\":\"\"}', 'ges', NULL, 'Active', 'Active', NULL, 26, 52, NULL, NULL, NULL),
(115, '{\"en\":\"PTE\",\"ar\":\"\"}', 'pte', NULL, 'Active', 'Active', NULL, 26, 52, NULL, NULL, NULL),
(116, '{\"en\":\"GMAT\",\"ar\":\"\"}', 'gmat', NULL, 'Active', 'Active', NULL, 26, 52, NULL, NULL, NULL),
(117, '{\"en\":\"ECC\",\"ar\":\"\"}', 'ecc', NULL, 'Active', 'Active', NULL, 26, 52, NULL, NULL, NULL),
(118, '{\"en\":\"CertiPort\",\"ar\":\"\"}', 'certiport', NULL, 'Active', 'Active', NULL, 26, 52, NULL, NULL, NULL),
(119, '{\"en\":\"ICDL\",\"ar\":\"\"}', 'icdl', NULL, 'Active', 'Active', NULL, 26, 52, NULL, NULL, NULL),
(120, '{\"en\":\"Schedule Test\",\"ar\":\"\"}', 'schedule-test', NULL, 'Active', 'Active', NULL, 26, 52, NULL, NULL, NULL),
(121, '{\"en\":\"MBA\",\"ar\":\"\"}', 'mba', NULL, 'Active', 'Active', NULL, 27, 52, NULL, NULL, NULL),
(122, '{\"en\":\"Cyber Security Master\",\"ar\":\"\"}', 'cyber-security-master', NULL, 'Active', 'Active', NULL, 27, 52, NULL, NULL, NULL),
(123, '{\"en\":\"USA\",\"ar\":\"\"}', 'usa', NULL, 'Active', 'Active', NULL, 28, 52, NULL, NULL, NULL),
(124, '{\"en\":\"UK\",\"ar\":\"\"}', 'uk', NULL, 'Active', 'Active', NULL, 28, 52, NULL, NULL, NULL),
(125, '{\"en\":\"Germany\",\"ar\":\"\"}', 'germany', NULL, 'Active', 'Active', NULL, 28, 52, NULL, NULL, NULL),
(126, '{\"en\":\"Turkey\",\"ar\":\"\"}', 'turkey', NULL, 'Active', 'Active', NULL, 28, 52, NULL, NULL, NULL),
(127, '{\"en\":\"Egypt\",\"ar\":\"\"}', 'egypt', NULL, 'Active', 'Active', NULL, 28, 52, NULL, NULL, NULL),
(128, '{\"en\":\"NEN CT\",\"ar\":\"\"}', 'nen-ct', NULL, 'Active', 'Active', NULL, 29, 52, NULL, NULL, NULL),
(129, '{\"en\":\"MCE\",\"ar\":\"\"}', 'mce', NULL, 'Active', 'Active', NULL, 29, 52, NULL, NULL, NULL),
(130, '{\"en\":\"MCT\",\"ar\":\"\"}', 'mct', NULL, 'Active', 'Active', NULL, 29, 52, NULL, NULL, NULL),
(131, '{\"en\":\"CCSI\",\"ar\":\"\"}', 'ccsi', NULL, 'Active', 'Active', NULL, 29, 52, NULL, NULL, NULL),
(132, '{\"en\":\"IEEE\",\"ar\":\"\"}', 'ieee', NULL, 'Active', 'Active', NULL, 29, 52, NULL, NULL, NULL),
(133, '{\"en\":\"Edu Name\",\"ar\":\"\"}', 'edu-name', NULL, 'Active', 'Active', NULL, 30, 52, NULL, NULL, NULL),
(134, '{\"en\":\"Edu Name\",\"ar\":\"\"}', 'edu-name', NULL, 'Active', 'Active', NULL, 30, 52, NULL, NULL, NULL),
(135, '{\"en\":\"Edu Name\",\"ar\":\"\"}', 'edu-name', NULL, 'Active', 'Active', NULL, 31, 52, NULL, NULL, NULL),
(136, '{\"en\":\"Edu Name\",\"ar\":\"\"}', 'edu-name', NULL, 'Active', 'Active', NULL, 31, 52, NULL, NULL, NULL),
(137, '{\"en\":\"Microsoft Learning\",\"ar\":\"\"}', 'microsoft-learning', NULL, 'Active', 'Active', NULL, 32, 52, NULL, NULL, NULL),
(138, '{\"en\":\"Networking Academy\",\"ar\":\"\"}', 'networking-academy', NULL, 'Active', 'Active', NULL, 32, 52, NULL, NULL, NULL),
(139, '{\"en\":\"CompTIA Learning Center\",\"ar\":\"\"}', 'comptia-learning-center', NULL, 'Active', 'Active', NULL, 32, 52, NULL, NULL, NULL),
(140, '{\"en\":\"Microsoft Imagine Academy\",\"ar\":\"\"}', 'microsoft-imagine-academy', NULL, 'Active', 'Active', NULL, 32, 52, NULL, NULL, NULL),
(141, '{\"en\":\"Edu Me Free\",\"ar\":\"\"}', 'edu-me-free', NULL, 'Active', 'Active', NULL, 32, 52, NULL, NULL, NULL),
(142, '{\"en\":\"EEXAM\",\"ar\":\"\"}', 'eexam', NULL, 'Active', 'Active', NULL, 39, 52, NULL, NULL, NULL),
(143, '{\"en\":\"VACAD\",\"ar\":\"\"}', 'vacad', NULL, 'Active', 'Active', NULL, 39, 52, NULL, NULL, NULL),
(144, '{\"en\":\"Interactive Books\",\"ar\":\"\"}', 'interactive-books', NULL, 'Active', 'Active', NULL, 39, 52, NULL, NULL, NULL),
(145, '{\"en\":\"Cloud Teacher\",\"ar\":\"\"}', 'cloud-teacher', NULL, 'Active', 'Active', NULL, 39, 52, NULL, NULL, NULL),
(146, '{\"en\":\"Global Training System\",\"ar\":\"\"}', 'global-training-system', NULL, 'Active', 'Active', NULL, 39, 52, NULL, NULL, NULL),
(147, '{\"en\":\"School Management System\",\"ar\":\"\"}', 'school-management-system', NULL, 'Active', 'Active', NULL, 39, 52, NULL, NULL, NULL),
(148, '{\"en\":\"Erada\",\"ar\":\"\"}', 'erada', NULL, 'Active', 'Active', NULL, 39, 52, NULL, NULL, NULL),
(149, '{\"en\":\"Taqyeem\",\"ar\":\"\"}', 'taqyeem', NULL, 'Active', 'Active', NULL, 39, 52, NULL, NULL, NULL),
(150, '{\"en\":\"Qiyas\",\"ar\":\"\"}', 'qiyas', NULL, 'Active', 'Active', NULL, 39, 52, NULL, NULL, NULL),
(151, '{\"en\":\"Sadeeqy\",\"ar\":\"\"}', 'sadeeqy', NULL, 'Active', 'Active', NULL, 39, 52, NULL, NULL, NULL),
(152, '{\"en\":\"Smart School Bus\",\"ar\":\"\"}', 'smart-school-bus', NULL, 'Active', 'Active', NULL, 39, 52, NULL, NULL, NULL),
(153, '{\"en\":\"Microsoft Dynamics 365\",\"ar\":\"\"}', 'microsoft-dynamics-365', NULL, 'Active', 'Active', NULL, 40, 52, NULL, NULL, NULL),
(154, '{\"en\":\"Help 4 Me\",\"ar\":\"\"}', 'help-4-me', NULL, 'Active', 'Active', NULL, 40, 52, NULL, NULL, NULL),
(155, '{\"en\":\"Odoo ERP\",\"ar\":\"\"}', 'odoo-erp', NULL, 'Active', 'Active', NULL, 40, 52, NULL, NULL, NULL),
(156, '{\"en\":\"Follow Metric\",\"ar\":\"\"}', 'follow-metric', NULL, 'Active', 'Active', NULL, 40, 52, NULL, NULL, NULL),
(157, '{\"en\":\"YALLASHOP\",\"ar\":\"\"}', 'yallashop', NULL, 'Active', 'Active', NULL, 40, 52, NULL, NULL, NULL),
(158, '{\"en\":\"Government Universities\",\"ar\":\"\"}', 'government-universities', NULL, 'Active', 'Active', NULL, 47, 52, NULL, NULL, NULL),
(159, '{\"en\":\"Private Universities\",\"ar\":\"\"}', 'private-universities', NULL, 'Active', 'Active', NULL, 47, 52, NULL, NULL, NULL),
(160, '{\"en\":\"Technological Universities\",\"ar\":\"\"}', 'technological-universities', NULL, 'Active', 'Active', NULL, 47, 52, NULL, NULL, NULL),
(161, '{\"en\":\"International Universities\",\"ar\":\"\"}', 'international-universities', NULL, 'Active', 'Active', NULL, 47, 52, NULL, NULL, NULL),
(162, '{\"en\":\"Private Higher Institutes\",\"ar\":\"\"}', 'private-higher-institutes', NULL, 'Active', 'Active', NULL, 47, 52, NULL, NULL, NULL),
(163, '{\"en\":\"Intermediate Technical Institutes\",\"ar\":\"\"}', 'intermediate-technical-institutes', NULL, 'Active', 'Active', NULL, 47, 52, NULL, NULL, NULL),
(164, '{\"en\":\"Vocational Training Institutes\",\"ar\":\"\"}', 'vocational-training-institutes', NULL, 'Active', 'Active', NULL, 47, 52, NULL, NULL, NULL),
(165, '{\"en\":\"Technical Education Schools\",\"ar\":\"\"}', 'technical-education-schools', NULL, 'Active', 'Active', NULL, 47, 52, NULL, NULL, NULL),
(166, '{\"en\":\"Ministries & Government Agencies\",\"ar\":\"\"}', 'ministries-government-agencies', NULL, 'Active', 'Active', NULL, 47, 52, NULL, NULL, NULL),
(167, '{\"en\":\"Professional Union & Syndicates\",\"ar\":\"\"}', 'professional-union-syndicates', NULL, 'Active', 'Active', NULL, 47, 52, NULL, NULL, NULL),
(168, '{\"en\":\"Government Training Centers\",\"ar\":\"\"}', 'government-training-centers', NULL, 'Active', 'Active', NULL, 47, 52, NULL, NULL, NULL),
(169, '{\"en\":\"Companies & Institution\",\"ar\":\"\"}', 'companies-institution', NULL, 'Active', 'Active', NULL, 47, 52, NULL, NULL, NULL),
(170, '{\"en\":\"About\",\"ar\":\"\"}', 'about', NULL, 'Active', 'Active', NULL, 33, 53, NULL, NULL, NULL),
(171, '{\"en\":\"Description\",\"ar\":\"\"}', 'description', NULL, 'Active', 'Active', NULL, 33, 53, NULL, NULL, NULL),
(172, '{\"en\":\"Objectives\",\"ar\":\"\"}', 'objectives', NULL, 'Active', 'Active', NULL, 33, 53, NULL, NULL, NULL),
(173, '{\"en\":\"Our Value\",\"ar\":\"\"}', 'our-value', NULL, 'Active', 'Active', NULL, 33, 53, NULL, NULL, NULL),
(174, '{\"en\":\"Our Experts\",\"ar\":\"\"}', 'our-experts', NULL, 'Active', 'Active', NULL, 33, 53, NULL, NULL, NULL),
(175, '{\"en\":\"Technology (Microsoft)\",\"ar\":\"\"}', 'technology-microsoft', NULL, 'Active', 'Active', NULL, 34, 53, NULL, NULL, NULL),
(176, '{\"en\":\"Artificial intelligence\",\"ar\":\"\"}', 'artificial-intelligence', NULL, 'Active', 'Active', NULL, 34, 53, NULL, NULL, NULL),
(177, '{\"en\":\"Features\",\"ar\":\"\"}', 'features', NULL, 'Active', 'Active', NULL, 34, 53, NULL, NULL, NULL),
(178, '{\"en\":\"Integration\",\"ar\":\"\"}', 'integration', NULL, 'Active', 'Active', NULL, 34, 53, NULL, NULL, NULL),
(179, '{\"en\":\"Integration\",\"ar\":\"\"}', 'integration', NULL, 'Active', 'Active', NULL, 34, 53, NULL, NULL, NULL),
(180, '{\"en\":\"Environment\",\"ar\":\"\"}', 'environment', NULL, 'Active', 'Active', NULL, 34, 53, NULL, NULL, NULL),
(181, '{\"en\":\"Security\",\"ar\":\"\"}', 'security', NULL, 'Active', 'Active', NULL, 34, 53, NULL, NULL, NULL),
(182, '{\"en\":\"Quality\",\"ar\":\"\"}', 'quality', NULL, 'Active', 'Active', NULL, 34, 53, NULL, NULL, NULL),
(183, '{\"en\":\"Monitoring\",\"ar\":\"\"}', 'monitoring', NULL, 'Active', 'Active', NULL, 34, 53, NULL, NULL, NULL),
(184, '{\"en\":\"Violations\",\"ar\":\"\"}', 'violations', NULL, 'Active', 'Active', NULL, 34, 53, NULL, NULL, NULL),
(185, '{\"en\":\"Services\",\"ar\":\"\"}', 'services', NULL, 'Active', 'Active', NULL, 35, 53, NULL, NULL, NULL),
(186, '{\"en\":\"Consulting\",\"ar\":\"\"}', 'consulting', NULL, 'Active', 'Active', NULL, 35, 53, NULL, NULL, NULL),
(187, '{\"en\":\"Test Conversion\",\"ar\":\"\"}', 'test-conversion', NULL, 'Active', 'Active', NULL, 35, 53, NULL, NULL, NULL),
(188, '{\"en\":\"Customization\",\"ar\":\"\"}', 'customization', NULL, 'Active', 'Active', NULL, 35, 53, NULL, NULL, NULL),
(189, '{\"en\":\"\\tGlobal Network\",\"ar\":\"\"}', 'global-network', NULL, 'Active', 'Active', NULL, 36, 53, NULL, NULL, NULL),
(190, '{\"en\":\"Test Centers\",\"ar\":\"\"}', 'test-centers', NULL, 'Active', 'Active', NULL, 35, 53, NULL, NULL, NULL),
(191, '{\"en\":\"Online Proctoring\",\"ar\":\"\"}', 'online-proctoring', NULL, 'Active', 'Active', NULL, 35, 53, NULL, NULL, NULL),
(192, '{\"en\":\"Virtual Proctoring\",\"ar\":\"\"}', 'virtual-proctoring', NULL, 'Active', 'Active', NULL, 35, 53, NULL, NULL, NULL),
(193, '{\"en\":\"Virtual Proctoring\",\"ar\":\"\"}', 'virtual-proctoring', NULL, 'Active', 'Active', NULL, 36, 53, NULL, NULL, NULL),
(194, '{\"en\":\"Remote Support\",\"ar\":\"\"}', 'remote-support', NULL, 'Active', 'Active', NULL, 36, 53, NULL, NULL, NULL),
(195, '{\"en\":\"Assistive Tools\",\"ar\":\"\"}', 'assistive-tools', NULL, 'Active', 'Active', NULL, 36, 53, NULL, NULL, NULL),
(196, '{\"en\":\"\\tPayment Gateway\",\"ar\":\"\"}', 'payment-gateway', NULL, 'Active', 'Active', NULL, 36, 53, NULL, NULL, NULL),
(197, '{\"en\":\"Payment Vouchers\",\"ar\":\"\"}', 'payment-vouchers', NULL, 'Active', 'Active', NULL, 36, 53, NULL, NULL, NULL),
(198, '{\"en\":\"Certifications\",\"ar\":\"\"}', 'certifications', NULL, 'Active', 'Active', NULL, 36, 53, NULL, NULL, NULL),
(199, '{\"en\":\"Scoring & Results \",\"ar\":\"\"}', 'scoring-results', NULL, 'Active', 'Active', NULL, 36, 53, NULL, NULL, NULL),
(200, '{\"en\":\"new\",\"ar\":\"جديد\"}', 'new', '{\"en\":null}', 'Active', 'Active', 'Active', 5, 1, NULL, '2024-03-17 16:07:14', '2024-04-09 12:29:58'),
(201, '{\"en\":\"Tamkeen Competition\"}', 'tamkeen-competition', '{\"en\":\"ddd\"}', 'Active', 'Active', 'Active', 14, 1, '#', '2024-04-09 11:59:28', '2024-04-09 11:59:28'),
(202, '{\"en\":\"Cisco Academy\"}', 'cisco-academy', '{\"en\":\"Cisco Academy\"}', 'Active', 'Active', 'Active', 14, NULL, '#', '2024-04-14 16:07:07', '2024-04-14 16:07:07'),
(203, '{\"en\":\"Microsoft\"}', 'microsoft', '{\"en\":\"Microsoft\"}', 'Active', 'Active', 'Active', 14, NULL, '#', '2024-04-14 16:09:13', '2024-04-14 16:09:13'),
(204, '{\"en\":\"Active ICT Product\"}', 'active-ict-product', '{\"en\":\"Active ICT Product\"}', 'Active', 'Active', 'Active', 14, NULL, '#', '2024-04-14 16:09:34', '2024-04-14 16:09:34'),
(205, '{\"en\":\"LEARNING CENTER\"}', 'learning-center', '{\"en\":\"LEARNING CENTER\"}', 'Active', 'Active', 'Active', 14, NULL, '#', '2024-04-14 17:33:03', '2024-04-14 17:33:03'),
(206, '{\"en\":\"INNOVATION AWARD\"}', 'innovation-award', '{\"en\":\"INNOVATION AWARD\"}', 'Active', 'Active', 'Active', 14, NULL, '#', '2024-04-14 17:33:33', '2024-04-14 17:33:33'),
(207, '{\"en\":\"strategic\",\"ar\":\"\\u0627\\u0633\\u062a\\u0631\\u0627\\u062a\\u064a\\u062c\\u064a\"}', 'strategic-certificates', NULL, 'Active', 'Active', NULL, 15, 52, NULL, NULL, NULL),
(208, '{\"en\":\"technology\",\"ar\":\"\\u062a\\u0643\\u0646\\u0648\\u0644\\u0648\\u062c\\u064a\\u0627\"}', 'technology-certificates', NULL, 'Active', 'Active', NULL, 15, 52, NULL, NULL, NULL),
(209, '{\"en\":\"education\",\"ar\":\"\\u062a\\u0639\\u0644\\u064a\\u0645\"}', 'education-certificates', NULL, 'Active', 'Active', NULL, 15, 52, NULL, NULL, NULL),
(210, '{\"en\":\"testing\",\"ar\":\"\\u0627\\u062e\\u062a\\u0628\\u0627\\u0631\\u0627\\u062a\"}', 'testing-certificates', NULL, 'Active', 'Active', NULL, 15, 52, NULL, NULL, NULL),
(211, '{\"en\":\"business\",\"ar\":\"\\u0639\\u0645\\u0644\"}', 'business-certificates', NULL, 'Active', 'Active', NULL, 15, 52, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'admin', '2024-02-12 22:45:30', '2024-02-12 22:45:30'),
(2, 'role-create', 'admin', '2024-02-12 22:45:30', '2024-02-12 22:45:30'),
(3, 'role-edit', 'admin', '2024-02-12 22:45:30', '2024-02-12 22:45:30'),
(4, 'role-delete', 'admin', '2024-02-12 22:45:30', '2024-02-12 22:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_tabs`
--

CREATE TABLE `program_tabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('Active','Not Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tabs_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `years_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_tabs`
--

INSERT INTO `program_tabs` (`id`, `title`, `description`, `status`, `project_id`, `tabs_id`, `type`, `sort`, `created_at`, `updated_at`, `years_text`, `url`) VALUES
(5, '{\"en\":\"khater\"}', '{\"en\":\"<p>\\r\\n<audio class=\\\"audio-for-speech\\\" src=\\\"\\\">&nbsp;<\\/audio>\\r\\n<\\/p>\\r\\n\\r\\n<div class=\\\"translate-tooltip-mtz green sm-root translate hidden_translate\\\">\\r\\n<div class=\\\"header-wrapper\\\">\\r\\n<div class=\\\"header-controls\\\">&nbsp;<\\/div>\\r\\n\\r\\n<div class=\\\"header-title\\\">translator<\\/div>\\r\\n\\r\\n<div class=\\\"translate-icons\\\"><img class=\\\"from\\\" src=\\\"\\\" \\/> <img class=\\\"translate-arrow\\\" src=\\\"chrome-extension:\\/\\/ibppednjgooiepmkgdcoppnmbhmieefh\\/images\\/right-arrow.png\\\" \\/>\\r\\n<div class=\\\"translate_to_dropdown\\\"><button aria-expanded=\\\"false\\\" class=\\\"dropbtn dropdown-toggle\\\" id=\\\"dropdownMenuButton1\\\" type=\\\"button\\\"><\\/button>\\r\\n\\r\\n<ul class=\\\"dropdown-content-wrapper languageSelector green\\\">\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"af\\\">Afrikaans<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"sq\\\">Albanian - shqipe<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ar\\\">Arabic - &lrm;\\u202b\\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\\u0629\\u202c&lrm;<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"hy\\\">Armenian - \\u0540\\u0561\\u0575\\u0565\\u0580\\u0567\\u0576<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"az\\\">Azerbaijani - az\\u0259rbaycanca<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"eu\\\">Basque - euskara<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"be\\\">Belarusian - \\u0431\\u0435\\u043b\\u0430\\u0440\\u0443\\u0441\\u043a\\u0430\\u044f<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"bn\\\">Bengali - \\u09ac\\u09be\\u0982\\u09b2\\u09be<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"bg\\\">Bulgarian - \\u0431\\u044a\\u043b\\u0433\\u0430\\u0440\\u0441\\u043a\\u0438<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ca\\\">Catalan - catal&agrave;<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"zh-CN\\\">Chinese - \\u4e2d\\u6587\\uff08\\u7b80\\u4f53\\u4e2d\\u6587\\uff09<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"zh-TW\\\">Chinese - \\u4e2d\\u6587 (\\u7e41\\u9ad4\\u4e2d\\u6587)<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"hr\\\">Croatian - hrvatski<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"cs\\\">Czech - \\u010de&scaron;tina<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"da\\\">Danish - dansk<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"nl\\\">Dutch - Nederlands<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"en\\\">English<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"eo\\\">Esperanto - esperanto<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"et\\\">Estonian - eesti<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"tl\\\">Filipino<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"fi\\\">Finnish - suomi<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"fr\\\">French - fran&ccedil;ais<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"gl\\\">Galician - galego<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ka\\\">Georgian - \\u10e5\\u10d0\\u10e0\\u10d7\\u10e3\\u10da\\u10d8<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"de\\\">German - Deutsch<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"el\\\">Greek - &Epsilon;&lambda;&lambda;&eta;&nu;&iota;&kappa;\\u03ac<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"gu\\\">Gujarati - \\u0a97\\u0ac1\\u0a9c\\u0ab0\\u0abe\\u0aa4\\u0ac0<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ht\\\">Haitian Creole - krey&ograve;l ayisyen<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"iw\\\">Hebrew - &lrm;\\u202b\\u05e2\\u05d1\\u05e8\\u05d9\\u05ea\\u202c&lrm;<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"hi\\\">Hindi - \\u0939\\u093f\\u0928\\u094d\\u0926\\u0940<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"hu\\\">Hungarian - magyar<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"is\\\">Icelandic - &iacute;slenska<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"id\\\">Indonesian - Bahasa Indonesia<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ga\\\">Irish - Gaeilge<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"it\\\">Italian - italiano<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ja\\\">Japanese - \\u65e5\\u672c\\u8a9e<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"kn\\\">Kannada - \\u0c95\\u0ca8\\u0ccd\\u0ca8\\u0ca1<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ko\\\">Korean - \\ud55c\\uad6d\\uc5b4<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"la\\\">Latin - Lingua Latina<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"lv\\\">Latvian - latvie&scaron;u<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"lt\\\">Lithuanian - lietuvi\\u0173<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"mk\\\">Macedonian - \\u043c\\u0430\\u043a\\u0435\\u0434\\u043e\\u043d\\u0441\\u043a\\u0438<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ms\\\">Malay - Bahasa Melayu<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"mt\\\">Maltese - Malti<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"no\\\">Norwegian - norsk<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"fa\\\">Persian - &lrm;\\u202b\\u0641\\u0627\\u0631\\u0633\\u06cc\\u202c&lrm;<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"pl\\\">Polish - polski<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"pt\\\">Portuguese - portugu&ecirc;s<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ro\\\">Romanian - rom&acirc;n\\u0103<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ru\\\">Russian - \\u0440\\u0443\\u0441\\u0441\\u043a\\u0438\\u0439<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"sr\\\">Serbian - \\u0421\\u0440\\u043f\\u0441\\u043a\\u0438<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"sk\\\">Slovak - sloven\\u010dina<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"sl\\\">Slovenian - sloven&scaron;\\u010dina<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"es\\\">Spanish - espa&ntilde;ol<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"sw\\\">Swahili - Kiswahili<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"sv\\\">Swedish - svenska<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ta\\\">Tamil - \\u0ba4\\u0bae\\u0bbf\\u0bb4\\u0bcd<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"te\\\">Telugu - \\u0c24\\u0c46\\u0c32\\u0c41\\u0c17\\u0c41<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"th\\\">Thai - \\u0e44\\u0e17\\u0e22<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"tr\\\">Turkish - T&uuml;rk&ccedil;e<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"uk\\\">Ukrainian - \\u0443\\u043a\\u0440\\u0430\\u0457\\u043d\\u0441\\u044c\\u043a\\u0430<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ur\\\">Urdu - &lrm;\\u202b\\u0627\\u0631\\u062f\\u0648\\u202c&lrm;<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"vi\\\">Vietnamese - Ti\\u1ebfng Vi\\u1ec7t<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"cy\\\">Welsh - Cymraeg<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"yi\\\">Yiddish - \\u05d9\\u05d9\\u05d3\\u05d9\\u05e9<\\/a><\\/li>\\r\\n<\\/ul>\\r\\n<\\/div>\\r\\n<\\/div>\\r\\n<\\/div>\\r\\n\\r\\n<div class=\\\"translated-text\\\">\\r\\n<div class=\\\"words\\\" id=\\\"translator-words\\\">&nbsp;<\\/div>\\r\\n\\r\\n<div class=\\\"sentences green\\\">&nbsp;<\\/div>\\r\\n<\\/div>\\r\\n\\r\\n<div class=\\\"trans_controls\\\">\\r\\n<div class=\\\"trans_controls__control-wrapper double_click\\\">\\r\\n<div class=\\\"trans_controls__inner-circle\\\">&nbsp;<\\/div>\\r\\n<span class=\\\"trans_controls__description\\\">Double-click <\\/span><\\/div>\\r\\n\\r\\n<div class=\\\"trans_controls__control-wrapper selection\\\">\\r\\n<div class=\\\"trans_controls__inner-circle\\\">&nbsp;<\\/div>\\r\\n<span class=\\\"trans_controls__description\\\">Select to translate <\\/span><\\/div>\\r\\n<\\/div>\\r\\n<\\/div>\\r\\n\\r\\n<p>At aut deleniti sit .<\\/p>\"}', 'Active', NULL, 2, NULL, NULL, '2024-02-13 17:42:14', '2024-02-13 17:45:51', '{\"en\":\"2015\"}', '{\"en\":\"Iusto in iste sed ul\"}'),
(10, '{\"en\":\"khater\"}', '{\"en\":\"<p>\\r\\n<audio class=\\\"audio-for-speech\\\" src=\\\"\\\">&nbsp;<\\/audio>\\r\\n<\\/p>\\r\\n\\r\\n<div class=\\\"translate-tooltip-mtz green sm-root translate hidden_translate\\\">\\r\\n<div class=\\\"header-wrapper\\\">\\r\\n<div class=\\\"header-controls\\\">&nbsp;<\\/div>\\r\\n\\r\\n<div class=\\\"header-title\\\">translator<\\/div>\\r\\n\\r\\n<div class=\\\"translate-icons\\\"><img class=\\\"from\\\" src=\\\"\\\" \\/> <img class=\\\"translate-arrow\\\" src=\\\"chrome-extension:\\/\\/ibppednjgooiepmkgdcoppnmbhmieefh\\/images\\/right-arrow.png\\\" \\/>\\r\\n<div class=\\\"translate_to_dropdown\\\"><button aria-expanded=\\\"false\\\" class=\\\"dropbtn dropdown-toggle\\\" id=\\\"dropdownMenuButton1\\\" type=\\\"button\\\"><\\/button>\\r\\n\\r\\n<ul class=\\\"dropdown-content-wrapper languageSelector green\\\">\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"af\\\">Afrikaans<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"sq\\\">Albanian - shqipe<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ar\\\">Arabic - &lrm;\\u202b\\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\\u0629\\u202c&lrm;<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"hy\\\">Armenian - \\u0540\\u0561\\u0575\\u0565\\u0580\\u0567\\u0576<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"az\\\">Azerbaijani - az\\u0259rbaycanca<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"eu\\\">Basque - euskara<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"be\\\">Belarusian - \\u0431\\u0435\\u043b\\u0430\\u0440\\u0443\\u0441\\u043a\\u0430\\u044f<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"bn\\\">Bengali - \\u09ac\\u09be\\u0982\\u09b2\\u09be<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"bg\\\">Bulgarian - \\u0431\\u044a\\u043b\\u0433\\u0430\\u0440\\u0441\\u043a\\u0438<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ca\\\">Catalan - catal&agrave;<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"zh-CN\\\">Chinese - \\u4e2d\\u6587\\uff08\\u7b80\\u4f53\\u4e2d\\u6587\\uff09<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"zh-TW\\\">Chinese - \\u4e2d\\u6587 (\\u7e41\\u9ad4\\u4e2d\\u6587)<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"hr\\\">Croatian - hrvatski<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"cs\\\">Czech - \\u010de&scaron;tina<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"da\\\">Danish - dansk<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"nl\\\">Dutch - Nederlands<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"en\\\">English<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"eo\\\">Esperanto - esperanto<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"et\\\">Estonian - eesti<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"tl\\\">Filipino<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"fi\\\">Finnish - suomi<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"fr\\\">French - fran&ccedil;ais<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"gl\\\">Galician - galego<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ka\\\">Georgian - \\u10e5\\u10d0\\u10e0\\u10d7\\u10e3\\u10da\\u10d8<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"de\\\">German - Deutsch<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"el\\\">Greek - &Epsilon;&lambda;&lambda;&eta;&nu;&iota;&kappa;\\u03ac<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"gu\\\">Gujarati - \\u0a97\\u0ac1\\u0a9c\\u0ab0\\u0abe\\u0aa4\\u0ac0<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ht\\\">Haitian Creole - krey&ograve;l ayisyen<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"iw\\\">Hebrew - &lrm;\\u202b\\u05e2\\u05d1\\u05e8\\u05d9\\u05ea\\u202c&lrm;<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"hi\\\">Hindi - \\u0939\\u093f\\u0928\\u094d\\u0926\\u0940<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"hu\\\">Hungarian - magyar<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"is\\\">Icelandic - &iacute;slenska<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"id\\\">Indonesian - Bahasa Indonesia<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ga\\\">Irish - Gaeilge<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"it\\\">Italian - italiano<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ja\\\">Japanese - \\u65e5\\u672c\\u8a9e<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"kn\\\">Kannada - \\u0c95\\u0ca8\\u0ccd\\u0ca8\\u0ca1<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ko\\\">Korean - \\ud55c\\uad6d\\uc5b4<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"la\\\">Latin - Lingua Latina<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"lv\\\">Latvian - latvie&scaron;u<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"lt\\\">Lithuanian - lietuvi\\u0173<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"mk\\\">Macedonian - \\u043c\\u0430\\u043a\\u0435\\u0434\\u043e\\u043d\\u0441\\u043a\\u0438<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ms\\\">Malay - Bahasa Melayu<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"mt\\\">Maltese - Malti<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"no\\\">Norwegian - norsk<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"fa\\\">Persian - &lrm;\\u202b\\u0641\\u0627\\u0631\\u0633\\u06cc\\u202c&lrm;<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"pl\\\">Polish - polski<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"pt\\\">Portuguese - portugu&ecirc;s<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ro\\\">Romanian - rom&acirc;n\\u0103<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ru\\\">Russian - \\u0440\\u0443\\u0441\\u0441\\u043a\\u0438\\u0439<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"sr\\\">Serbian - \\u0421\\u0440\\u043f\\u0441\\u043a\\u0438<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"sk\\\">Slovak - sloven\\u010dina<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"sl\\\">Slovenian - sloven&scaron;\\u010dina<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"es\\\">Spanish - espa&ntilde;ol<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"sw\\\">Swahili - Kiswahili<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"sv\\\">Swedish - svenska<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ta\\\">Tamil - \\u0ba4\\u0bae\\u0bbf\\u0bb4\\u0bcd<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"te\\\">Telugu - \\u0c24\\u0c46\\u0c32\\u0c41\\u0c17\\u0c41<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"th\\\">Thai - \\u0e44\\u0e17\\u0e22<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"tr\\\">Turkish - T&uuml;rk&ccedil;e<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"uk\\\">Ukrainian - \\u0443\\u043a\\u0440\\u0430\\u0457\\u043d\\u0441\\u044c\\u043a\\u0430<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"ur\\\">Urdu - &lrm;\\u202b\\u0627\\u0631\\u062f\\u0648\\u202c&lrm;<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"vi\\\">Vietnamese - Ti\\u1ebfng Vi\\u1ec7t<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"cy\\\">Welsh - Cymraeg<\\/a><\\/li>\\r\\n\\t<li><a class=\\\"dropdown-item\\\" data-lang=\\\"yi\\\">Yiddish - \\u05d9\\u05d9\\u05d3\\u05d9\\u05e9<\\/a><\\/li>\\r\\n<\\/ul>\\r\\n<\\/div>\\r\\n<\\/div>\\r\\n<\\/div>\\r\\n\\r\\n<div class=\\\"translated-text\\\">\\r\\n<div class=\\\"words\\\" id=\\\"translator-words\\\">&nbsp;<\\/div>\\r\\n\\r\\n<div class=\\\"sentences green\\\">&nbsp;<\\/div>\\r\\n<\\/div>\\r\\n\\r\\n<div class=\\\"trans_controls\\\">\\r\\n<div class=\\\"trans_controls__control-wrapper double_click\\\">\\r\\n<div class=\\\"trans_controls__inner-circle\\\">&nbsp;<\\/div>\\r\\n<span class=\\\"trans_controls__description\\\">Double-click <\\/span><\\/div>\\r\\n\\r\\n<div class=\\\"trans_controls__control-wrapper selection\\\">\\r\\n<div class=\\\"trans_controls__inner-circle\\\">&nbsp;<\\/div>\\r\\n<span class=\\\"trans_controls__description\\\">Select to translate <\\/span><\\/div>\\r\\n<\\/div>\\r\\n<\\/div>\\r\\n\\r\\n<p>Accusamus fugiat, do.<\\/p>\"}', 'Active', 1, 2, NULL, '{\"en\":\"57\"}', '2024-02-13 19:57:10', '2024-02-13 20:49:16', '{\"en\":\"2001\"}', '{\"en\":\"Ipsum dolores facer\"}');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('Active','Not Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `pages_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `status`, `pages_id`, `sort`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Qui et et nihil blan\"}', '{\"en\":\"<p>Ea dolorum ut quidem.<\\/p>\"}', 'Active', 22, NULL, '2024-02-12 22:45:47', '2024-02-12 22:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `project_archieve`
--

CREATE TABLE `project_archieve` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` json NOT NULL,
  `url` json DEFAULT NULL,
  `title` json DEFAULT NULL,
  `description` json DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tabs_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_archieve`
--

INSERT INTO `project_archieve` (`id`, `type`, `url`, `title`, `description`, `project_id`, `created_at`, `updated_at`, `tabs_id`) VALUES
(176, '{\"en\": \"url\"}', '{\"en\": \"new 1\"}', '{\"en\": \"Incididunt non adipi\"}', '{\"en\": \"Harum est voluptatem\"}', 1, '2024-03-10 08:47:33', '2024-03-10 08:47:33', 5),
(177, '{\"en\": \"url\"}', '{\"en\": \"new 2\"}', '{\"en\": \"Qui adipisicing laud\"}', '{\"en\": \"Quis et aut aliquip\"}', 1, '2024-03-10 08:47:33', '2024-03-10 08:47:33', 5),
(178, '{\"en\": \"pdf\"}', '{\"en\": null}', '{\"en\": \"khater1\"}', '{\"en\": \"dev1\"}', 1, '2024-03-10 09:14:42', '2024-03-10 09:14:42', 5),
(179, '{\"en\": \"image\"}', '{\"en\": null}', '{\"en\": \"khater2\"}', '{\"en\": \"dev2\"}', 1, '2024-03-10 09:14:42', '2024-03-10 09:14:42', 5);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2024-02-12 22:45:32', '2024-02-12 22:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Not Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `description`, `image`, `icon`, `status`, `page_id`, `created_at`, `updated_at`) VALUES
(13, '{\"en\":\"Nulla harum aut eaqu\"}', '{\"en\":\"<p>Elit, ut et iste pra.<\\/p>\"}', '', '1711180810-stc-min.png', 'Active', 4, '2024-03-23 12:59:53', '2024-03-23 13:00:10'),
(14, '{\"en\":\"Perferendis qui null\"}', '{\"en\":\"<p>Delectus, laboris id.<\\/p>\"}', '', '', 'Not Active', 8, '2024-03-23 13:13:41', '2024-03-23 18:33:23'),
(15, '{\"en\":\"khater1\"}', '{\"en\":\"<p>khater2<\\/p>\"}', '1711217428-stc-min.png', '1711217409-Partner65711980-81ce-4ecd-81bb-f66eec1e0002.jpg', 'Active', 2, '2024-03-23 23:10:09', '2024-03-23 23:10:28'),
(16, '{\"en\":\"id\"}', '{\"en\":\"<p>idd</p>\"}', NULL, NULL, 'Active', 11, '2024-04-18 22:07:30', '2024-04-18 22:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `solutions`
--

CREATE TABLE `solutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('Active','Not Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `pages_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tabs_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `static_tables`
--

CREATE TABLE `static_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subsubtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `years` int(11) DEFAULT NULL,
  `years_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `button` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('Active','Not Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `pages_id` bigint(20) UNSIGNED NOT NULL,
  `childe_pages_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `static_tables`
--

INSERT INTO `static_tables` (`id`, `title`, `subtitle`, `subsubtitle`, `years`, `years_text`, `month`, `button`, `button_two`, `url`, `url_two`, `icon`, `description`, `status`, `pages_id`, `childe_pages_id`, `item`, `sort`, `created_at`, `updated_at`, `city`, `job_type`, `salary`) VALUES
(2, '{\"en\":\"Sit veniam accusamu\"}', NULL, NULL, NULL, '{\"en\":\"1981\"}', NULL, NULL, NULL, '{\"en\":\"In porro obcaecati a\"}', NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">ISO 9001 certification is the world&#39;s most widely used standard for quality management systems, quality level control and Process Management. It also helps to develop the mechanism of business performance in various fields. Requirements for a quality management system...</span></p>\"}', 'Active', 16, 62, 'section-two', 47, '2024-02-13 19:15:45', '2024-04-15 14:06:47', '', '', ''),
(3, '{\"en\":\"who are we\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">Most recently, when we successfully made our IPO transforming into a multi-national corporation listed on stock exchanges, we secured the resources needed to initiate Stage II within which we will be expanding our scope of service &amp; range of solutions further than ever before to get closer to being the organization we dreamt of back in 2008: A socially responsible business organization, powered by the wonders of modern technology...</span></p>\"}', 'Active', 11, NULL, 'section-one', NULL, '2024-02-28 11:46:41', '2024-04-16 14:53:51', '', '', ''),
(4, '{\"en\":\"Objectivies\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>this is a test onlythis is a test onlythis is a test onlythis is a test onlythis is a test onlythis is a test onlythis is a test onlythis is a test onlythis is a test onlythis is a test onlythis is a test onlythis is a test onlythis is a test onlythis is a test onlythis is a test onlythis is a test onlythis is a test onlythis is a test onlythis is a test only</p>\"}', 'Active', 11, NULL, 'section-two', 1, '2024-04-08 05:57:43', '2024-04-16 14:58:15', '', '', ''),
(5, '{\"en\":\"Our mission\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>item 22item 22item 22item 22item 22item 22item 22item 22item 22item 22item 22</p>\"}', 'Active', 11, NULL, 'section-two', 2, '2024-04-08 05:58:24', '2024-04-16 14:57:52', '', '', ''),
(6, '{\"en\":\"Our vision\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>item 3item 3item 3item 3item 3item 3item 3item 3item 3item 3item 3item 3</p>\"}', 'Active', 11, NULL, 'section-two', 3, '2024-04-08 05:58:41', '2024-04-16 14:57:29', '', '', ''),
(8, '{\"en\":\"Follow the investor market now\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</strong></p>\"}', 'Active', 12, NULL, 'section-one', NULL, '2024-04-08 06:37:04', '2024-04-16 15:00:32', '', '', ''),
(9, '{\"en\":\"Customers\"}', '{\"en\":\"10K+\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10K+', NULL, 'Active', 12, NULL, 'section-two', NULL, '2024-04-08 06:51:42', '2024-04-08 06:51:42', '', '', ''),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 12, NULL, 'section-three', NULL, '2024-04-08 06:55:52', '2024-04-08 06:55:52', '', '', ''),
(11, '{\"en\":\"title\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"title\"}', NULL, NULL, NULL, 'Active', 12, NULL, 'section-foure', NULL, '2024-04-08 07:00:17', '2024-04-08 07:00:17', '', '', ''),
(12, '{\"en\":\"سبسسبب\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"w12\"}', NULL, NULL, NULL, 'Active', 12, NULL, 'section-foure', NULL, '2024-04-08 07:00:43', '2024-04-08 07:00:43', '', '', ''),
(13, '{\"en\":\"Revenue\"}', '{\"en\":\"11.9M+\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11.9M+', NULL, 'Active', 12, NULL, 'section-two', NULL, '2024-04-08 07:04:10', '2024-04-08 07:04:10', '', '', ''),
(14, '{\"en\":\"client1\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"qeqqe\"}', NULL, NULL, NULL, 'Active', 12, NULL, 'section-foure', 1, '2024-04-08 07:05:17', '2024-04-18 14:15:31', '', '', ''),
(15, '{\"en\":\"سبسسبب\"}', '{\"en\":\"10K+\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 12, NULL, 'section-two', NULL, '2024-04-08 07:11:33', '2024-04-08 07:11:33', '', '', ''),
(16, '{\"en\":\"Achievements\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p><strong>National Education Network sought various accreditations, including strategic, technological, and educational, as well as recognition from prominent global companies specializing in technological, academic, and governmental testing. Many international companies rely on these test centers to conduct skill and quality assessments worldwide, and National Education Network aimed to obtain accreditations from these companies in a legitimate, fair, and organized manner. National Education Network has successfully administered over 100,000 international tests across different domains in recent years, emphasizing its experience and expertise in this area.</strong></p>\"}', 'Active', 13, NULL, 'section-one', NULL, '2024-04-08 07:14:10', '2024-04-18 14:19:30', '', '', ''),
(17, '{\"en\":\"award ss\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">sought various accreditations, including strategic, technological, and educational, as well as recognition from prominent global companies specializing in technological, academic, and governmental testing. Many international companies rely on these test centers to conduct skill and quality assessments worldwide, and National Education Network aimed to obtain accreditations from these companies in a legitimate, fair, and organized manner. National Education Network has successfully administered over 100,000 international tests across different domains in recent years, emphasizing its experience and expertise in this area.</span></p>\"}', 'Active', 14, NULL, 'section-one', NULL, '2024-04-08 08:30:19', '2024-04-09 00:28:27', '', '', ''),
(18, '{\"en\":\"BE PART OF OUR TEAM\"}', '{\"en\":\"BE PART OF OUR TEAM\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<div class=\\\"investors_titel\\\" style=\\\"box-sizing: border-box; color: rgb(39, 42, 50); font-family: Roboto-Regular; font-size: 16px; text-align: center;\\\">\\r\\n<p style=\\\"text-align:justify\\\">At National Education Network, we grow together! We believe in collective effort and success. Our people are truly the main driver for our achievements. We focus on both the personal, career development, and we are committed to the wellbeing of our people. You will have an opportunity to work in our diversified portfolio through internal transfer and project based assignments.</p>\\r\\n\\r\\n<div>&nbsp;</div>\\r\\n</div>\"}', 'Active', 19, NULL, 'section-one', NULL, '2024-04-08 09:03:03', '2024-04-14 11:18:30', '', '', ''),
(19, '{\"en\":\"itmmmm\",\"ar\":\"itmmmm\"}', '{\"en\":\"zComp\",\"ar\":\"rrComp\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>itmmmmitmmmmitmmmmitmmmm&nbsp;itmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitm mmmitmmmmitmmmmitmm mmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmm&nbsp;itmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitm mmmitmmmmitmmmmitmm mmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmm&nbsp;itmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitm mmmitmmmmitmmmmitmm mmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmm</p>\",\"ar\":\"<p>itmmmmitmmmmitmmmmitmmmm&nbsp;itmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitm mmmitmmmmitmmmmitmm mmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmm&nbsp;itmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitm mmmitmmmmitmmmmitmmmitmmmmitmmmmitmm mmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmm&nbsp;itmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitm mmmitmmmmitmmmmitmm mmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmmitmmmm</p>\"}', 'Active', 19, NULL, 'section-two', 2, '2024-04-08 09:03:33', '2024-04-14 15:16:57', 'alex', 'alex', '15K'),
(20, '{\"en\":\"title2qdw\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;&nbsp;title2qdwaef sfs&nbsp;</p>\"}', 'Active', 19, NULL, 'section-two', 3, '2024-04-08 09:03:57', '2024-04-08 09:03:57', '', '', ''),
(24, '{\"en\":\"Pariatur Et perspic\"}', NULL, NULL, NULL, '{\"en\":\"2013\"}', NULL, NULL, NULL, '{\"en\":\"Necessitatibus quasi\"}', NULL, NULL, '{\"en\":\"<p>dfvdfsgfgsfg</p>\"}', 'Active', 16, 62, 'section-two', 84, '2024-04-08 13:59:04', '2024-04-08 13:59:04', '', '', ''),
(25, '{\"en\":\"سبسسبب\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">National Education Network sought various accreditations, including strategic, technological, and educational, as well as recognition from prominent global companies specializing in technological, academic, and governmental testing. Many international companies rely on these test centers to conduct skill and quality assessments worldwide, and National Education Network aimed to obtain accreditations from these companies in a legitimate, fair, and organized manner. National Education Network has successfully administered over 100,000 international tests across different domains in recent years, emphasizing its experience and expertise in this area.</span></p>\"}', 'Active', 16, 62, 'section-one', NULL, '2024-04-09 00:39:00', '2024-04-18 19:26:04', '', '', ''),
(26, '{\"en\":\"title\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>title&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;titletitle&nbsp;title</p>\"}', 'Active', 16, 7, 'section-one', NULL, '2024-04-09 09:14:29', '2024-04-09 09:14:29', '', '', ''),
(27, '{\"en\":\"wrwrwrt3rgeg\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>&nbsp;wrwrwrt3r&nbsp; geg&nbsp;wrwrwrt3r&nbsp; geg&nbsp;wrwrwrt3r&nbsp; geg&nbsp;wrwrwrt3r&nbsp; geg&nbsp;wrwrwrt3r&nbsp; geg&nbsp;wrwrwrt3r&nbsp; geg&nbsp;wrwrwrt3r&nbsp; geg&nbsp;wrwrwrt3r&nbsp; geg&nbsp;wrwrwrt3r&nbsp; geg&nbsp;wrwrwrt3r&nbsp; geg&nbsp;wrwrwrt3r&nbsp; geg&nbsp;wrwrwrt3r&nbsp; geg&nbsp;wrwrwrt3r&nbsp; geg&nbsp;wrwrwrt3r&nbsp; geg&nbsp;wrwrwrt3r&nbsp; geg&nbsp;wrwrwrt3r&nbsp; geg&nbsp;wrwrwrt3r&nbsp; geg</p>\"}', 'Active', 16, 40, 'section-one', NULL, '2024-04-09 09:18:22', '2024-04-09 09:18:22', '', '', ''),
(29, '{\"en\":\"title\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">National Education Network sought various accreditations, including strategic, technological, and educational, as well as recognition from prominent global companies specializing in technological, academic, and governmental testing. Many international companies rely on these test centers to conduct skill and quality assessments worldwide, and National Education Network aimed to obtain accreditations from these companies in a legitimate, fair, and organized manner. National Education Network has successfully administered over 100,000 international tests across different domains in recent years, emphasizing its experience and expertise in this area.</span></p>\"}', 'Active', 16, 63, 'section-one', NULL, '2024-04-09 10:28:43', '2024-04-18 19:28:04', '', '', ''),
(30, '{\"en\":\"wrwrwr\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>drgdrgeg</p>\"}', 'Active', 16, 4, 'section-one', NULL, '2024-04-09 11:35:56', '2024-04-09 11:35:56', '', '', ''),
(31, '{\"en\":\"سبسسبب\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>edu parert</p>\"}', 'Active', 16, 64, 'section-one', NULL, '2024-04-09 11:45:42', '2024-04-09 11:45:42', '', '', ''),
(32, '{\"en\":\"TAMKEEN COMPETITION ( MCIT )\"}', '{\"en\":\"صقصقثصق\"}', NULL, NULL, '{\"en\":\"2/2/2002\"}', NULL, NULL, NULL, '{\"en\":\"https://web.whatsapp.com/\"}', NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">The first award is for developing the app Tasaheel which is a portal to facilitate for citizens with special needs access to all services, whether governmental or otherwise; the app includes sign language as a feature enabling the deaf to fully utilize all the capabilities of the system. The Second award is for Qayas, a system for managing electronic tests for people with visual disabilities enabling them to handle the tests at ease.</span></p>\"}', 'Active', 14, NULL, 'tamkeen-competition', NULL, '2024-04-09 12:17:42', '2024-04-15 02:33:30', '', '', ''),
(33, '{\"en\":\"title\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>titletitletitle&nbsp;&nbsp;title&nbsp;titletitle&nbsp;title&nbsp;title&nbsp;title&nbsp;title&nbsp;title&nbsp;titletitletitle&nbsp;&nbsp;title&nbsp;titletitle&nbsp;title&nbsp;title&nbsp;title&nbsp;title&nbsp;title&nbsp;titletitletitle&nbsp;&nbsp;title&nbsp;titletitle&nbsp;title&nbsp;title&nbsp;title&nbsp;title&nbsp;title&nbsp;titletitletitle&nbsp;&nbsp;title&nbsp;titletitle&nbsp;title&nbsp;title&nbsp;title&nbsp;title&nbsp;title&nbsp;titletitletitle&nbsp;&nbsp;title&nbsp;titletitle&nbsp;title&nbsp;title&nbsp;title&nbsp;title&nbsp;title&nbsp;titletitletitle&nbsp;&nbsp;title&nbsp;titletitle&nbsp;title&nbsp;title&nbsp;title&nbsp;title&nbsp;title</p>\"}', 'Active', 19, NULL, 'section-two', NULL, '2024-04-14 14:02:13', '2024-04-14 14:02:13', 'cairo', 'full time', '10'),
(34, '{\"en\":\"Rerum delectus alia\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>sfedgdgdgdgdgd</p>\"}', 'Active', 19, NULL, 'section-two', 18, '2024-04-14 14:35:07', '2024-04-14 14:35:07', 'cairo', 'Full time', '10k'),
(35, '{\"en\":\"Est nesciunt qui r\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>fddgdgd dfgdg</p>\"}', 'Active', 19, NULL, 'section-two', 57, '2024-04-14 14:36:28', '2024-04-14 14:36:28', 'cairo', 'Part time', '10k'),
(36, '{\"en\":\"Tenetur recusandae\"}', '{\"en\":\"Sit esse rem in con\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>sfsfsfsf</p>\"}', 'Active', 19, NULL, 'section-two', 60, '2024-04-14 14:37:46', '2024-04-18 20:48:44', 'cairo', 'cairo', '10k'),
(37, '{\"en\":\"Sunt ducimus ipsa\"}', '{\"en\":\"Sunt ducimus ipsa\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>sfsfsfscc</p>\"}', 'Active', 19, NULL, 'section-two', 99, '2024-04-14 14:47:30', '2024-04-18 20:48:18', 'cairo', 'cairo', '10k'),
(38, '{\"en\":\"Microsoft\"}', '{\"en\":\"Microsoft\"}', NULL, NULL, '{\"en\":\"2020\"}', NULL, NULL, NULL, '{\"en\":\"https://dev.nendemo2024.xyz/en/about/investors\"}', NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">Most recently, when we successfully made our IPO transforming into a multi-national corporation listed on stock exchanges, we secured the resources needed to initiate Stage II within which we will be expanding our scope of service &amp;amp; range of solutions further than ever before to get closer to being the organization we dreamt of back in 2008: A socially responsible business organization, powered by the wonders of modern technology..</span></p>\"}', 'Active', 14, NULL, 'microsoft', NULL, '2024-04-14 17:45:14', '2024-04-19 22:55:32', NULL, NULL, NULL),
(40, '{\"en\":\"Our Clients\",\"ar\":\"عملاءنا\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">N.E.N is an international organization specializing in educational solutions and integrated ICT systems, with offices in (London, Dubai, Amman, Cairo, and Tashkent) since 2008.Most recently, when we successfully made our IPO transforming into a multi-national corporation listed on stock exchanges, we secured the resources needed to initiate Stage II within which we will be expanding our scope of service.</span></p>\",\"ar\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">N.E.N is an international organization specializing in educational solutions and integrated ICT systems, with offices in (London, Dubai, Amman, Cairo, and Tashkent) since 2008.Most recently, when we successfully made our IPO transforming into a multi-national corporation listed on stock exchanges, we secured the resources needed to initiate Stage II within which we will be expanding our scope of service.</span></p>\"}', 'Active', 17, NULL, 'section-one', NULL, '2024-04-15 11:35:41', '2024-04-15 11:38:10', NULL, NULL, NULL),
(41, '{\"en\":\"Arab Medical\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 17, NULL, 'technology-clients', NULL, '2024-04-15 12:30:59', '2024-04-15 12:30:59', NULL, NULL, NULL),
(42, '{\"en\":\"Egypt Trade\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 17, NULL, 'education-clients', NULL, '2024-04-15 12:32:13', '2024-04-15 12:32:13', NULL, NULL, NULL),
(43, '{\"en\":\"EGES\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 17, NULL, 'education-clients', NULL, '2024-04-15 12:32:39', '2024-04-15 12:32:39', NULL, NULL, NULL),
(44, '{\"en\":\"Est quo dolorem dol\"}', NULL, NULL, NULL, '{\"en\":\"2006\"}', NULL, NULL, NULL, '{\"en\":\"https://web.whatsapp.com/\"}', NULL, NULL, '{\"en\":\"<p>wefwfwfwfwfw</p>\"}', 'Active', 16, 62, 'section-two', 85, '2024-04-15 14:03:32', '2024-04-15 14:03:32', NULL, NULL, NULL),
(45, '{\"en\":\"aaa\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">National Education Network sought various accreditations, including strategic, technological, and educational, as well as recognition from prominent global companies specializing in technological, academic, and governmental testing. Many international companies rely on these test centers to conduct skill and quality assessments worldwide, and National Education Network aimed to obtain accreditations from these companies in a legitimate, fair, and organized manner. National Education Network has successfully administered over 100,000 international tests across different domains in recent years, emphasizing its experience and expertise in this area.</span></p>\"}', 'Active', 16, 207, 'section-one', NULL, '2024-04-15 14:35:39', '2024-04-15 14:35:39', NULL, NULL, NULL),
(47, '{\"en\":\"strategic\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">National Education Network sought various accreditations, including strategic, technological, and educational, as well as recognition from prominent global companies specializing in technological, academic, and governmental testing. Many international companies rely on these test centers to conduct skill and quality assessments worldwide, and National Education Network aimed to obtain accreditations from these companies in a legitimate, fair, and organized manner. National Education Network has successfully administered over 100,000 international tests across different domains in recent years, emphasizing its experience and expertise in this area.</span></p>\"}', 'Active', 15, 207, 'section-one', NULL, '2024-04-15 14:45:14', '2024-04-18 14:40:48', NULL, NULL, NULL),
(48, '{\"en\":\"Omnis enim dolorem u\"}', '{\"en\":\"Tempore possimus s\"}', '{\"en\":\"Consequuntur veritat\"}', NULL, '{\"en\":\"2014\"}', NULL, NULL, NULL, '{\"en\":\"https://web.whatsapp.com/\"}', NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">ISO 9001 certification is the world&#39;s most widely used standard for quality management systems, quality level control and Process Management. It also helps to develop the mechanism of business performance in various fields. Requirements for a quality management system.</span></p>\"}', 'Active', 15, 207, 'section-two', 79, '2024-04-15 14:47:06', '2024-04-15 14:47:06', NULL, NULL, NULL),
(49, '{\"en\":\"Maxime molestiae lor\"}', '{\"en\":\"Sit soluta quisquam\"}', '{\"en\":\"Delectus deserunt s\"}', NULL, '{\"en\":\"1972\"}', NULL, NULL, NULL, '{\"en\":\"https://web.whatsapp.com/\"}', NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">SO 9001 certification is the world&#39;s most widely used standard for quality management systems, quality level control and Process Management. It also helps to develop the mechanism of business performance in various fields. Requirements for a quality management system....</span></p>\"}', 'Active', 15, 207, 'section-two', 43, '2024-04-15 14:50:28', '2024-04-15 14:50:28', NULL, NULL, NULL),
(50, '{\"en\":\"test\"}', '{\"en\":\"Sit esse rem in con\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 12, NULL, 'section-two', NULL, '2024-04-16 17:59:17', '2024-04-16 17:59:17', NULL, NULL, NULL),
(51, '{\"en\":\"client1\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"https://dev.nendemo2024.xyz/en/about/investors\"}', NULL, NULL, NULL, 'Active', 12, NULL, 'section-five', NULL, '2024-04-18 14:16:37', '2024-04-18 14:16:37', NULL, NULL, NULL),
(54, '{\"en\":\"Cisco COMPETITION ( MCIT )\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">The first award is for developing the app Tasaheel which is a portal to facilitate for citizens with special needs access to all services, whether governmental or otherwise; the app includes sign language as a feature enabling the deaf to fully utilize all the capabilities of the system. The Second award is for Qayas, a system for managing electronic tests for people with visual disabilities enabling them to handle the tests at ease.</span></p>\"}', 'Active', 14, NULL, 'cisco-academy', NULL, '2024-04-18 14:35:19', '2024-04-18 14:35:19', NULL, NULL, NULL),
(55, '{\"en\":\"title\"}', NULL, NULL, NULL, '{\"en\":\"1972\"}', NULL, NULL, NULL, '{\"en\":\"https://web.whatsapp.com/\"}', NULL, NULL, '{\"en\":\"<p>https://web.whatsap p.com/https://web.whatsa pp.com/https://web.wha tsapp.com/https://web.whatsapp.co m/https://web.whatsapp.com/</p>\"}', 'Active', 16, 63, 'section-two', NULL, '2024-04-18 19:37:00', '2024-04-18 19:37:00', NULL, NULL, NULL),
(56, '{\"en\":\"Egypt Trade\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 17, NULL, 'technology-clients', NULL, '2024-04-18 20:15:31', '2024-04-18 20:15:31', NULL, NULL, NULL),
(57, '{\"en\":\"SEIF\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 17, NULL, 'education-clients', NULL, '2024-04-18 20:31:27', '2024-04-18 20:31:27', NULL, NULL, NULL),
(58, '{\"en\":\"test data\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>test data&nbsp;test datatest data&nbsp;test datatest data&nbsp;test datatest data&nbsp;test datatest data&nbsp;test datatest data&nbsp;test datatest data&nbsp;test datatest data&nbsp;test datatest data&nbsp;test datatest data&nbsp;test datatest data&nbsp;test datatest data&nbsp;test datatest data&nbsp;test datatest data&nbsp;test datatest data&nbsp;test datatest data&nbsp;test data</p>\"}', 'Active', 15, 209, 'section-one', NULL, '2024-04-19 18:24:54', '2024-04-19 18:24:54', NULL, NULL, NULL),
(59, '{\"en\":\"objectives\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">Most recently, when we successfully made our IPO transforming into a multi-national corporation listed on stock exchanges, we secured the resources needed to initiate Stage II within which we will be expanding our scope of service &amp;amp; range of solutions further than ever before to get closer to being the organization we dreamt of back in 2008: A socially responsible business organization, powered by the wonders of modern technology..</span></p>\"}', 'Active', 11, NULL, 'section-three', NULL, '2024-04-19 22:53:21', '2024-04-19 22:53:21', NULL, NULL, NULL),
(60, '{\"en\":\"CERTIFICATES\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">National Education Network sought various accreditations, including strategic, technological, and educational, as well as recognition from prominent global companies specializing in technological, academic, and governmental testing. Many international companies rely on these test centers to conduct skill and quality assessments worldwide, and National Education Network aimed to obtain accreditations from these companies in a legitimate, fair, and organized manner. National Education Network has successfully administered over 100,000 international tests across different domains in recent years, emphasizing its experience and expertise in this area22.</span></p>\"}', 'Active', 15, 208, 'section-one', NULL, '2024-04-19 22:58:46', '2024-04-19 22:58:46', NULL, NULL, NULL),
(61, '{\"en\":\"ISO 9001 QUALITY\"}', '{\"en\":\"MANAGEMENT SYSTEM (2019)\"}', '{\"en\":\"MANAGEMENT SYSTEM (2019)\"}', NULL, '{\"en\":\"2020\"}', NULL, NULL, NULL, '{\"en\":\"https://dev.nendemo2024.xyz/en/admin/about/c\"}', NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">ISO 9001 certification is the world&#39;s most widely used standard for quality management systems, quality level control and Process Management. It also helps to develop the mechanism of business performance in various fields. Requirements for a quality management system....</span></p>\"}', 'Active', 15, 208, 'section-two', 1, '2024-04-19 23:00:55', '2024-04-19 23:00:55', NULL, NULL, NULL),
(62, '{\"en\":\"National Education\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">National Education Network sought various accreditations, including strategic, technological, and educational, as well as recognition from prominent global companies specializing in technological, academic, and governmental testing. Many international companies rely on these test centers to conduct skill and quality assessments worldwide, and National Education Network aimed to obtain accreditations from these companies in a legitimate, fair, and organized manner. National Education Network has successfully administered over 100,000 international tests across different domains in recent years, emphasizing its experience and expertise in this area.</span></p>\"}', 'Active', 16, 66, 'section-one', NULL, '2024-04-19 23:04:26', '2024-04-19 23:04:26', NULL, NULL, NULL),
(63, '{\"en\":\"NITIDUS FOR TRAINING AND DEVELOPMENT (2019)\"}', NULL, NULL, NULL, '{\"en\":\"2020\"}', NULL, NULL, NULL, '{\"en\":\"https://dev.nendemo2024.xyz/en/about/investors\"}', NULL, NULL, '{\"en\":\"<p><strong>NITIDUS FOR TRAINING AND DEVELOPMENT&nbsp;</strong><span style=\\\"color:rgb(153, 0, 0); font-family:roboto-regular; font-size:17px\\\">(2019)</span><strong>NITIDUS FOR TRAINING AND DEVELOPMENT&nbsp;</strong><span style=\\\"color:rgb(153, 0, 0); font-family:roboto-regular; font-size:17px\\\">(2019)</span><strong>NITIDUS FOR TRAINING AND DEVELOPMENT&nbsp;</strong><span style=\\\"color:rgb(153, 0, 0); font-family:roboto-regular; font-size:17px\\\">(2019)</span><strong>NITIDUS FOR TRAINING AND DEVELOPMENT&nbsp;</strong><span style=\\\"color:rgb(153, 0, 0); font-family:roboto-regular; font-size:17px\\\">(2019)</span><strong>NITIDUS FOR TRAINING AND DEVELOPMENT&nbsp;</strong><span style=\\\"color:rgb(153, 0, 0); font-family:roboto-regular; font-size:17px\\\">(2019)</span><strong>NITIDUS FOR TRAINING AND DEVELOPMENT&nbsp;</strong><span style=\\\"color:rgb(153, 0, 0); font-family:roboto-regular; font-size:17px\\\">(2019)</span><strong>NITIDUS FOR TRAINING AND DEVELOPMENT&nbsp;</strong><span style=\\\"color:rgb(153, 0, 0); font-family:roboto-regular; font-size:17px\\\">(2019)</span><strong>NITIDUS FOR TRAINING AND DEVELOPMENT&nbsp;</strong><span style=\\\"color:rgb(153, 0, 0); font-family:roboto-regular; font-size:17px\\\">(2019)</span><strong>NITIDUS FOR TRAINING AND DEVELOPMENT&nbsp;</strong><span style=\\\"color:rgb(153, 0, 0); font-family:roboto-regular; font-size:17px\\\">(2019)</span><strong>NITIDUS FOR TRAINING AND DEVELOPMENT&nbsp;</strong><span style=\\\"color:rgb(153, 0, 0); font-family:roboto-regular; font-size:17px\\\">(2019)</span></p>\"}', 'Active', 16, 66, 'section-two', NULL, '2024-04-19 23:07:46', '2024-04-19 23:07:46', NULL, NULL, NULL),
(71, '{\"en\":\"first sub\"}', NULL, NULL, 2021, NULL, 11, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">National Education Network sought various accreditations, including strategic, technological, and educational, as well as recognition from prominent global companies specializing in technological,</span></p>\"}', 'Active', 13, NULL, 'section-two', 0, '2024-04-20 13:37:09', '2024-04-20 13:37:09', NULL, NULL, NULL),
(72, '{\"en\":\"second sub\"}', NULL, NULL, 2021, NULL, 12, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">National Education Network sought various accreditations, including strategic, technological, and educational, as well as recognition from prominent&nbsp;</span></p>\"}', 'Active', 13, NULL, 'section-two', 1, '2024-04-20 13:37:46', '2024-04-20 13:38:38', NULL, NULL, NULL),
(73, '{\"en\":\"third sub\"}', NULL, NULL, 2020, NULL, 12, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">global companies sglobal companies sglobal companies sglobal companies sglobal companies sglobal companies sglobal companies s</span></p>\"}', 'Active', 13, NULL, 'section-two', 1, '2024-04-20 13:39:33', '2024-04-20 13:39:33', NULL, NULL, NULL),
(74, '{\"en\":\"four sub\"}', NULL, NULL, 2020, NULL, 122, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p><span style=\\\"color:rgb(39, 42, 50); font-family:roboto-regular; font-size:17px\\\">global companies sglobal companies sglobal companies sglobal companies sglobal companies sglobal companies sglobal companies sglobal companies sglobal companies sglobal companies sglobal companies</span></p>\"}', 'Active', 13, NULL, 'section-two', 1, '2024-04-20 13:40:17', '2024-04-20 13:40:17', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabs`
--

CREATE TABLE `tabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabs`
--

INSERT INTO `tabs` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"about\",\"ar\":\"about\"}', 'about', NULL, NULL),
(2, '{\"en\":\"program\",\"ar\":\"program\"}', 'program', NULL, NULL),
(3, '{\"en\":\"help\",\"ar\":\"help\"}', 'help', NULL, NULL),
(4, '{\"en\":\"join-us\",\"ar\":\"join-us\"}', 'join-us', NULL, NULL),
(5, '{\"en\":\"archive\",\"ar\":\"archive\"}', 'archive', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testings`
--

CREATE TABLE `testings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('Active','Not Active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `video` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages_id` bigint(20) UNSIGNED DEFAULT NULL,
  `childe_pages_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testings`
--

INSERT INTO `testings` (`id`, `title`, `description`, `status`, `video`, `pages_id`, `childe_pages_id`, `sort`, `created_at`, `updated_at`) VALUES
(2, '{\"en\":\"Vero consectetur vo\"}', '{\"en\":\"<p>fwfwfwf<\\/p>\"}', 'Not Active', NULL, NULL, NULL, NULL, '2024-03-12 15:50:31', '2024-03-12 15:50:31'),
(3, '{\"en\":\"Vero consectetur vo\"}', '{\"en\":\"<p>fwfwfwf<\\/p>\"}', 'Not Active', NULL, NULL, NULL, NULL, '2024-03-12 15:50:59', '2024-03-12 15:50:59'),
(4, '{\"en\":\"Vero consectetur vo\"}', '{\"en\":\"<p>fwfwfwf<\\/p>\"}', 'Not Active', NULL, NULL, NULL, NULL, '2024-03-12 15:51:19', '2024-03-12 15:51:19'),
(5, '{\"en\":\"Vero consectetur vo\"}', '{\"en\":\"<p>fwfwfwf<\\/p>\"}', 'Not Active', NULL, NULL, NULL, NULL, '2024-03-12 15:51:31', '2024-03-12 15:51:31'),
(6, '{\"en\":\"Vero consectetur vo\"}', '{\"en\":\"<p>fwfwfwf<\\/p>\"}', 'Not Active', NULL, NULL, NULL, NULL, '2024-03-12 15:51:47', '2024-03-12 15:51:47'),
(11, '{\"en\":\"title\"}', '{\"en\":\"<p>rhhrhrh<\\/p>\"}', 'Active', 'Testing/videos/NnovEbEKqxAIUVJlE25pkHJhCmem6bdjVDVMhj5D.mp4', 170, NULL, NULL, '2024-03-14 08:34:24', '2024-03-14 08:34:24'),
(12, '{\"en\":\"\\u0626\\u0634\\u0634\\u0626\"}', '{\"en\":\"<p>\\u0626\\u0634\\u0626\\u0634\\u0626<\\/p>\"}', 'Active', NULL, 185, NULL, NULL, '2024-03-14 12:59:08', '2024-03-14 12:59:08'),
(13, '{\"en\":\"\\u0633\\u0628\\u0633\\u0633\\u0628\\u0628\"}', '{\"en\":\"<p>64684ljnlkjblibliblhi<\\/p>\"}', 'Active', 'Testing/videos/yRXK5OyheMAMNeiE9FpeDojhEYnvYKHRhgLqA7Nz.mp4', 185, NULL, NULL, '2024-03-14 13:14:22', '2024-03-14 13:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `testing_files`
--

CREATE TABLE `testing_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testing_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testing_files`
--

INSERT INTO `testing_files` (`id`, `file`, `title`, `testing_id`, `created_at`, `updated_at`) VALUES
(1, '17104283480_17104280390_pages (1).sql', '{\"en\":\"222\"}', 12, '2024-03-14 12:59:08', '2024-03-14 12:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `testing_images`
--

CREATE TABLE `testing_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `testing_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testing_references`
--

CREATE TABLE `testing_references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testing_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testing_references`
--

INSERT INTO `testing_references` (`id`, `reference`, `title`, `testing_id`, `created_at`, `updated_at`) VALUES
(1, 'https://web.whatsapp.com/', '{\"en\":\"Quisquam dolorem tem\"}', 2, '2024-03-12 15:50:32', '2024-03-12 15:50:32'),
(2, 'https://web.whatsapp.com/', '{\"en\":\"Quisquam dolorem tem\"}', 3, '2024-03-12 15:50:59', '2024-03-12 15:50:59'),
(3, 'https://web.whatsapp.com/', '{\"en\":\"Quisquam dolorem tem\"}', 4, '2024-03-12 15:51:19', '2024-03-12 15:51:19'),
(4, 'https://web.whatsapp.com/', '{\"en\":\"Quisquam dolorem tem\"}', 5, '2024-03-12 15:51:31', '2024-03-12 15:51:31'),
(5, 'https://web.whatsapp.com/', '{\"en\":\"Quisquam dolorem tem\"}', 6, '2024-03-12 15:51:47', '2024-03-12 15:51:47'),
(6, 'https://web.whatsapp.com/', '{\"en\":\"222\"}', 12, '2024-03-14 12:59:08', '2024-03-14 12:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `translation_keys`
--

CREATE TABLE `translation_keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translation_keys`
--

INSERT INTO `translation_keys` (`id`, `key`, `name`, `created_at`, `updated_at`) VALUES
(1, 'en', 'english', '2024-02-12 22:45:32', NULL),
(2, 'ar', 'arabic', '2024-02-12 22:45:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_tabs`
--
ALTER TABLE `about_tabs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_tabs_project_id_foreign` (`project_id`),
  ADD KEY `about_tabs_tabs_id_foreign` (`tabs_id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_pages_id_foreign` (`pages_id`),
  ADD KEY `education_childe_pages_id_foreign` (`childe_pages_id`);

--
-- Indexes for table `education_files`
--
ALTER TABLE `education_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_files_education_id_foreign` (`education_id`);

--
-- Indexes for table `education_images`
--
ALTER TABLE `education_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_images_education_id_foreign` (`education_id`);

--
-- Indexes for table `education_references`
--
ALTER TABLE `education_references`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_references_education_id_foreign` (`education_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `help_tabs`
--
ALTER TABLE `help_tabs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `help_tabs_project_id_foreign` (`project_id`),
  ADD KEY `help_tabs_tabs_id_foreign` (`tabs_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_pages_id_foreign` (`pages_id`);

--
-- Indexes for table `joinus_tabs`
--
ALTER TABLE `joinus_tabs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `joinus_tabs_project_id_foreign` (`project_id`),
  ADD KEY `joinus_tabs_tabs_id_foreign` (`tabs_id`);

--
-- Indexes for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `many_tables`
--
ALTER TABLE `many_tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `many_tables_pages_id_foreign` (`pages_id`),
  ADD KEY `many_tables_static_tables_id_foreign` (`static_tables_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `our_teams`
--
ALTER TABLE `our_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `our_teams_pages_id_foreign` (`pages_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `program_tabs`
--
ALTER TABLE `program_tabs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_tabs_project_id_foreign` (`project_id`),
  ADD KEY `program_tabs_tabs_id_foreign` (`tabs_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_pages_id_foreign` (`pages_id`);

--
-- Indexes for table `project_archieve`
--
ALTER TABLE `project_archieve`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_archieve_project_id_foreign` (`project_id`),
  ADD KEY `project_archieve_tabs_id_foreign` (`tabs_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slider_page_id_foreign` (`page_id`);

--
-- Indexes for table `solutions`
--
ALTER TABLE `solutions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solutions_pages_id_foreign` (`pages_id`),
  ADD KEY `solutions_tabs_id_foreign` (`tabs_id`);

--
-- Indexes for table `static_tables`
--
ALTER TABLE `static_tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `static_tables_pages_id_foreign` (`pages_id`),
  ADD KEY `static_tables_childe_pages_id_foreign` (`childe_pages_id`);

--
-- Indexes for table `tabs`
--
ALTER TABLE `tabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testings`
--
ALTER TABLE `testings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testing_pages_id_foreign` (`pages_id`),
  ADD KEY `testing_childe_pages_id_foreign` (`childe_pages_id`);

--
-- Indexes for table `testing_files`
--
ALTER TABLE `testing_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testing_files_testing_id_foreign` (`testing_id`);

--
-- Indexes for table `testing_images`
--
ALTER TABLE `testing_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testing_images_testing_id_foreign` (`testing_id`);

--
-- Indexes for table `testing_references`
--
ALTER TABLE `testing_references`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testing_references_testing_id_foreign` (`testing_id`);

--
-- Indexes for table `translation_keys`
--
ALTER TABLE `translation_keys`
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
-- AUTO_INCREMENT for table `about_tabs`
--
ALTER TABLE `about_tabs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `education_files`
--
ALTER TABLE `education_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `education_images`
--
ALTER TABLE `education_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education_references`
--
ALTER TABLE `education_references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `help_tabs`
--
ALTER TABLE `help_tabs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `joinus_tabs`
--
ALTER TABLE `joinus_tabs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `many_tables`
--
ALTER TABLE `many_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `our_teams`
--
ALTER TABLE `our_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_tabs`
--
ALTER TABLE `program_tabs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_archieve`
--
ALTER TABLE `project_archieve`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `solutions`
--
ALTER TABLE `solutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `static_tables`
--
ALTER TABLE `static_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tabs`
--
ALTER TABLE `tabs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testings`
--
ALTER TABLE `testings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `testing_files`
--
ALTER TABLE `testing_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testing_images`
--
ALTER TABLE `testing_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testing_references`
--
ALTER TABLE `testing_references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `translation_keys`
--
ALTER TABLE `translation_keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_tabs`
--
ALTER TABLE `about_tabs`
  ADD CONSTRAINT `about_tabs_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `about_tabs_tabs_id_foreign` FOREIGN KEY (`tabs_id`) REFERENCES `tabs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_childe_pages_id_foreign` FOREIGN KEY (`childe_pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `education_pages_id_foreign` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `education_files`
--
ALTER TABLE `education_files`
  ADD CONSTRAINT `education_files_education_id_foreign` FOREIGN KEY (`education_id`) REFERENCES `education` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `education_images`
--
ALTER TABLE `education_images`
  ADD CONSTRAINT `education_images_education_id_foreign` FOREIGN KEY (`education_id`) REFERENCES `education` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `education_references`
--
ALTER TABLE `education_references`
  ADD CONSTRAINT `education_references_education_id_foreign` FOREIGN KEY (`education_id`) REFERENCES `education` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `help_tabs`
--
ALTER TABLE `help_tabs`
  ADD CONSTRAINT `help_tabs_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `help_tabs_tabs_id_foreign` FOREIGN KEY (`tabs_id`) REFERENCES `tabs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_pages_id_foreign` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `joinus_tabs`
--
ALTER TABLE `joinus_tabs`
  ADD CONSTRAINT `joinus_tabs_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `joinus_tabs_tabs_id_foreign` FOREIGN KEY (`tabs_id`) REFERENCES `tabs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `many_tables`
--
ALTER TABLE `many_tables`
  ADD CONSTRAINT `many_tables_pages_id_foreign` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `many_tables_static_tables_id_foreign` FOREIGN KEY (`static_tables_id`) REFERENCES `static_tables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `our_teams`
--
ALTER TABLE `our_teams`
  ADD CONSTRAINT `our_teams_pages_id_foreign` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_tabs`
--
ALTER TABLE `program_tabs`
  ADD CONSTRAINT `program_tabs_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_tabs_tabs_id_foreign` FOREIGN KEY (`tabs_id`) REFERENCES `tabs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_pages_id_foreign` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slider`
--
ALTER TABLE `slider`
  ADD CONSTRAINT `slider_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `solutions`
--
ALTER TABLE `solutions`
  ADD CONSTRAINT `solutions_pages_id_foreign` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solutions_tabs_id_foreign` FOREIGN KEY (`tabs_id`) REFERENCES `tabs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `static_tables`
--
ALTER TABLE `static_tables`
  ADD CONSTRAINT `static_tables_childe_pages_id_foreign` FOREIGN KEY (`childe_pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `static_tables_pages_id_foreign` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testings`
--
ALTER TABLE `testings`
  ADD CONSTRAINT `testing_childe_pages_id_foreign` FOREIGN KEY (`childe_pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `testing_pages_id_foreign` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testing_files`
--
ALTER TABLE `testing_files`
  ADD CONSTRAINT `testing_files_testing_id_foreign` FOREIGN KEY (`testing_id`) REFERENCES `testings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testing_images`
--
ALTER TABLE `testing_images`
  ADD CONSTRAINT `testing_images_testing_id_foreign` FOREIGN KEY (`testing_id`) REFERENCES `testings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testing_references`
--
ALTER TABLE `testing_references`
  ADD CONSTRAINT `testing_references_testing_id_foreign` FOREIGN KEY (`testing_id`) REFERENCES `testings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
