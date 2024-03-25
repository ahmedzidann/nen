-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 12, 2024 at 08:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nen`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` enum('Active','Not Active') NOT NULL DEFAULT 'Active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `slug`, `email`, `phone`, `address`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Admin\"}', 'admin', 'admin@admin.com', '01123694440', '{\"en\":\"cairo\"}', 'Active', NULL, '$2y$12$3qCT5zAr3ewQm61AdnZYxuNvMWL2HwC04LvhT1nCakiDlQpEwp8G6', NULL, '2024-01-12 16:38:14', '2024-01-12 16:38:14'),
(2, '{\"en\":\"Dr. Giuseppe O\'Reilly IV\"}', '1-484-823-6681', 'pwisoky@example.org', '1-484-823-6681', '{\"en\":\"9096 Walsh Villages Apt. 305\\nNew Antone, PA 73446-7289\"}', 'Active', '2024-01-12 16:38:14', '$2y$10$2KVfihbLxBubGrZLU5Fd/uHKGxUV8M5VELKp3kmuX9zjXjz46njuy', 'bPeTjirVqF', '2024-01-12 16:38:14', '2024-01-12 16:38:14'),
(3, '{\"en\":\"Lorenz Barrows\"}', '1-225-336-2592', 'ronny.hoppe@example.org', '+1-225-336-2592', '{\"en\":\"55018 Kiehn Union\\nVandervorttown, RI 18088\"}', 'Active', '2024-01-12 16:38:14', '$2y$10$2KVfihbLxBubGrZLU5Fd/uHKGxUV8M5VELKp3kmuX9zjXjz46njuy', 'WeXEhggSAw', '2024-01-12 16:38:14', '2024-01-12 16:38:14'),
(4, '{\"en\":\"Charlie Hessel\"}', '640-377-9191', 'shemar.ohara@example.net', '640-377-9191', '{\"en\":\"48772 Boyd Gateway\\nEldorafurt, FL 45069-5255\"}', 'Active', '2024-01-12 16:38:14', '$2y$10$2KVfihbLxBubGrZLU5Fd/uHKGxUV8M5VELKp3kmuX9zjXjz46njuy', '9zXlgmQNUI', '2024-01-12 16:38:14', '2024-01-12 16:38:14'),
(5, '{\"en\":\"Mrs. Hilda Weimann\"}', '1-979-453-7402', 'wgrimes@example.net', '+1-979-453-7402', '{\"en\":\"65892 Maggio Crest\\nNorth Willardburgh, FL 23228\"}', 'Active', '2024-01-12 16:38:14', '$2y$10$2KVfihbLxBubGrZLU5Fd/uHKGxUV8M5VELKp3kmuX9zjXjz46njuy', 'UDLzoInzrp', '2024-01-12 16:38:14', '2024-01-12 16:38:14'),
(6, '{\"en\":\"Ryder Koch\"}', '1-323-765-2479', 'ghauck@example.net', '+1 (323) 765-2479', '{\"en\":\"682 O\'Conner Dam Suite 521\\nLeannonville, ND 94442\"}', 'Active', '2024-01-12 16:38:14', '$2y$10$2KVfihbLxBubGrZLU5Fd/uHKGxUV8M5VELKp3kmuX9zjXjz46njuy', 'SjnM9NY4Pt', '2024-01-12 16:38:14', '2024-01-12 16:38:14'),
(7, '{\"en\":\"Newton Willms\"}', '1-930-823-9556', 'mbotsford@example.com', '+1 (930) 823-9556', '{\"en\":\"93835 Mosciski Parks\\nEast Russellfurt, IA 09754\"}', 'Active', '2024-01-12 16:38:14', '$2y$10$2KVfihbLxBubGrZLU5Fd/uHKGxUV8M5VELKp3kmuX9zjXjz46njuy', 'bT3dHEnfV3', '2024-01-12 16:38:14', '2024-01-12 16:38:14'),
(8, '{\"en\":\"Vaughn Hintz\"}', '980-447-3794', 'immanuel.denesik@example.org', '980-447-3794', '{\"en\":\"97946 Emmitt Freeway Suite 510\\nNorth Lilyanview, NE 48936-5894\"}', 'Active', '2024-01-12 16:38:14', '$2y$10$2KVfihbLxBubGrZLU5Fd/uHKGxUV8M5VELKp3kmuX9zjXjz46njuy', 'leIgVhz6Pk', '2024-01-12 16:38:14', '2024-01-12 16:38:14'),
(9, '{\"en\":\"Nash Macejkovic\"}', '865-545-2913', 'areinger@example.com', '(865) 545-2913', '{\"en\":\"456 Toy Garden Suite 544\\nWest Nellastad, ID 90514-9637\"}', 'Active', '2024-01-12 16:38:14', '$2y$10$2KVfihbLxBubGrZLU5Fd/uHKGxUV8M5VELKp3kmuX9zjXjz46njuy', '5pBrmeS4YE', '2024-01-12 16:38:14', '2024-01-12 16:38:14'),
(10, '{\"en\":\"Torey Doyle I\"}', '2407804483', 'mayra74@example.net', '240.780.4483', '{\"en\":\"947 Gabriel Shoal Suite 546\\nLake Jamaalfurt, WA 79616-2576\"}', 'Active', '2024-01-12 16:38:14', '$2y$10$2KVfihbLxBubGrZLU5Fd/uHKGxUV8M5VELKp3kmuX9zjXjz46njuy', 'ktk24ycn3b', '2024-01-12 16:38:14', '2024-01-12 16:38:14'),
(11, '{\"en\":\"Raquel Kirlin\"}', '19343254541', 'blanda.antwon@example.net', '+19343254541', '{\"en\":\"817 Adela Park\\nLake Micheletown, KS 43589\"}', 'Active', '2024-01-12 16:38:14', '$2y$10$2KVfihbLxBubGrZLU5Fd/uHKGxUV8M5VELKp3kmuX9zjXjz46njuy', 'GVQII9y1fl', '2024-01-12 16:38:14', '2024-01-12 16:38:14');

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_two` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_two` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `label_two` varchar(255) DEFAULT NULL,
  `button` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `bref` text DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` enum('Active','Not Active') NOT NULL DEFAULT 'Active',
  `type` varchar(255) NOT NULL,
  `pages_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ltm_translations`
--

CREATE TABLE `ltm_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `locale` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `key` text NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `many_tables`
--

CREATE TABLE `many_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `since` varchar(255) DEFAULT NULL,
  `sharing` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` enum('Active','Not Active') NOT NULL DEFAULT 'Active',
  `pages_id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(255) NOT NULL,
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
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\StaticTable', 1, '5a559841-954e-4f83-9d8a-388ed8309289', 'StaticTable', 'about-03', 'about-03.jpg', 'image/jpeg', 'media', 'media', 12305, '[]', '[]', '[]', '[]', 1, '2024-01-12 16:38:46', '2024-01-12 16:38:46'),
(2, 'App\\Models\\StaticTable', 2, 'a3d8cece-63c7-4e71-b2c4-c8c94dedc378', 'StaticTable', 'about-03', 'about-03.jpg', 'image/jpeg', 'media', 'media', 12305, '[]', '[]', '[]', '[]', 1, '2024-01-12 16:44:27', '2024-01-12 16:44:27'),
(3, 'App\\Models\\StaticTable', 3, '5c02d10a-99a1-432f-ab88-215584f32bfa', 'StaticTable', 'about-03', 'about-03.jpg', 'image/jpeg', 'media', 'media', 12305, '[]', '[]', '[]', '[]', 1, '2024-01-12 16:44:57', '2024-01-12 16:44:57'),
(4, 'App\\Models\\StaticTable', 4, '2d918bcf-408c-4b43-8694-54c1a1a4c804', 'StaticTable', 'about-03', 'about-03.jpg', 'image/jpeg', 'media', 'media', 12305, '[]', '[]', '[]', '[]', 1, '2024-01-12 16:46:25', '2024-01-12 16:46:25'),
(5, 'App\\Models\\StaticTable', 5, '035d7926-dff5-4441-b48e-c168ff80588c', 'StaticTable', 'about-03', 'about-03.jpg', 'image/jpeg', 'media', 'media', 12305, '[]', '[]', '[]', '[]', 1, '2024-01-12 16:47:25', '2024-01-12 16:47:25'),
(7, 'App\\Models\\StaticTable', 7, '7b96d0fd-0cf9-40ff-9500-8f609667102c', 'StaticTable', 'about-03 (1)', 'about-03-(1).jpg', 'image/jpeg', 'media', 'media', 12305, '[]', '[]', '[]', '[]', 1, '2024-01-12 17:30:15', '2024-01-12 17:30:15'),
(8, 'App\\Models\\StaticTable', 9, '5742fc2b-71db-46a6-b9e6-a5f90291f888', 'StaticTable', 'about-03 (1)', 'about-03-(1).jpg', 'image/jpeg', 'media', 'media', 12305, '[]', '[]', '[]', '[]', 1, '2024-01-12 17:33:16', '2024-01-12 17:33:16');

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
(20, '2024_01_11_115330_create_our_teams_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
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
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `jop` varchar(255) DEFAULT NULL,
  `status` enum('Active','Not Active') NOT NULL DEFAULT 'Active',
  `pages_id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(255) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Active','Not Active') NOT NULL DEFAULT 'Active',
  `navbar` enum('Active','Not Active') DEFAULT NULL,
  `footer` enum('Active','Not Active') DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `description`, `status`, `navbar`, `footer`, `parent_id`, `sort`, `link`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Home\",\"ar\":\"\\u0627\\u0644\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u0631\\u0626\\u064a\\u0633\\u064a\\u0629\"}', 'home', NULL, 'Active', 'Active', NULL, NULL, 1, NULL, NULL, NULL),
(2, '{\"en\":\"About\",\"ar\":\"\\u0639\\u0646\"}', 'about', NULL, 'Active', 'Active', NULL, NULL, 2, NULL, NULL, NULL),
(3, '{\"en\":\"Projects\",\"ar\":\"\\u0627\\u0644\\u0645\\u0634\\u0627\\u0631\\u064a\\u0639\"}', 'projects', NULL, 'Active', 'Active', NULL, NULL, 3, NULL, NULL, NULL),
(4, '{\"en\":\"Education\",\"ar\":\"Education\"}', 'education', NULL, 'Active', 'Active', NULL, NULL, 4, NULL, NULL, NULL),
(5, '{\"en\":\"Testing\",\"ar\":\"\\u0627\\u062e\\u062a\\u0628\\u0627\\u0631\\u0627\\u062a\"}', 'testing', NULL, 'Active', 'Active', NULL, NULL, 5, NULL, NULL, NULL),
(6, '{\"en\":\"Solutions\",\"ar\":\"\\u062d\\u0644\\u0648\\u0644\"}', 'solutions', NULL, 'Active', 'Active', NULL, NULL, 6, NULL, NULL, NULL),
(7, '{\"en\":\"Technology\",\"ar\":\"\\u062a\\u0643\\u0646\\u0648\\u0644\\u0648\\u062c\\u064a\\u0627\"}', 'technology', NULL, 'Active', 'Active', NULL, NULL, 7, NULL, NULL, NULL),
(8, '{\"en\":\"Doc Validation\",\"ar\":\"\\u0627\\u0644\\u062a\\u062d\\u0642\\u0642 \\u0645\\u0646 \\u0635\\u062d\\u0629 \\u0627\\u0644\\u0648\\u062b\\u064a\\u0642\\u0629\"}', 'doc-validation', NULL, 'Active', 'Active', NULL, NULL, 8, NULL, NULL, NULL),
(9, '{\"en\":\"Join Us\",\"ar\":\"\\u0627\\u0646\\u0636\\u0645 \\u0625\\u0644\\u064a\\u0646\\u0627\"}', 'join-us', NULL, 'Active', 'Active', NULL, NULL, 9, NULL, NULL, NULL),
(10, '{\"en\":\"Find Us\",\"ar\":\"\\u0627\\u0628\\u062d\\u062b \\u0639\\u0646\\u0627\"}', 'find-us', NULL, 'Active', 'Active', NULL, NULL, 10, NULL, NULL, NULL),
(11, '{\"en\":\"Identity\",\"ar\":\"\\u0647\\u0648\\u064a\\u0629\"}', 'identity', NULL, 'Active', 'Active', NULL, 2, 1, NULL, NULL, NULL),
(12, '{\"en\":\"Investors\",\"ar\":\"\\u0627\\u0644\\u0645\\u0633\\u062a\\u062b\\u0645\\u0631\\u064a\\u0646\"}', 'investors', NULL, 'Active', 'Active', NULL, 2, 2, NULL, NULL, NULL),
(13, '{\"en\":\"Achievements\",\"ar\":\"\\u0627\\u0644\\u0625\\u0646\\u062c\\u0627\\u0632\\u0627\\u062a\"}', 'achievements', NULL, 'Active', 'Active', NULL, 2, 3, NULL, NULL, NULL),
(14, '{\"en\":\"Awards\",\"ar\":\"\\u0627\\u0644\\u062c\\u0648\\u0627\\u0626\\u0632\"}', 'awards', NULL, 'Active', 'Active', NULL, 2, 4, NULL, NULL, NULL),
(15, '{\"en\":\"Certificates\",\"ar\":\"\\u0627\\u0644\\u0634\\u0647\\u0627\\u062f\\u0627\\u062a\"}', 'certificates', NULL, 'Active', 'Active', NULL, 2, 5, NULL, NULL, NULL),
(16, '{\"en\":\"Partners\",\"ar\":\"\\u0627\\u0644\\u0634\\u0631\\u0643\\u0627\\u0621\"}', 'partners', NULL, 'Active', 'Active', NULL, 2, 6, NULL, NULL, NULL),
(17, '{\"en\":\"Clients\",\"ar\":\"\\u0627\\u0644\\u0639\\u0645\\u0644\\u0627\\u0621\"}', 'clients', NULL, 'Active', 'Active', NULL, 2, 8, NULL, NULL, NULL),
(18, '{\"en\":\"Our Team\",\"ar\":\"\\u0641\\u0631\\u064a\\u0642\\u0646\\u0627\"}', 'our-team', NULL, 'Active', 'Active', NULL, 2, 9, NULL, NULL, NULL),
(19, '{\"en\":\"Careers\",\"ar\":\"\\u0648\\u0638\\u0627\\u0626\\u0641\"}', 'careers', NULL, 'Active', 'Active', NULL, 2, 10, NULL, NULL, NULL),
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
(62, '{\"en\":\"strategic\",\"ar\":\"\\u0627\\u0633\\u062a\\u0631\\u0627\\u062a\\u064a\\u062c\\u064a\"}', 'strategic', NULL, 'Active', 'Active', NULL, 16, 52, NULL, NULL, NULL),
(63, '{\"en\":\"technology\",\"ar\":\"\\u062a\\u0643\\u0646\\u0648\\u0644\\u0648\\u062c\\u064a\\u0627\"}', 'technology', NULL, 'Active', 'Active', NULL, 16, 52, NULL, NULL, NULL),
(64, '{\"en\":\"education\",\"ar\":\"\\u062a\\u0639\\u0644\\u064a\\u0645\"}', 'education', NULL, 'Active', 'Active', NULL, 16, 52, NULL, NULL, NULL),
(65, '{\"en\":\"testing\",\"ar\":\"\\u0627\\u062e\\u062a\\u0628\\u0627\\u0631\\u0627\\u062a\"}', 'testing', NULL, 'Active', 'Active', NULL, 16, 52, NULL, NULL, NULL),
(66, '{\"en\":\"business\",\"ar\":\"\\u0639\\u0645\\u0644\"}', 'business', NULL, 'Active', 'Active', NULL, 16, 52, NULL, NULL, NULL),
(67, '{\"en\":\"technology\",\"ar\":\"\\u062a\\u0643\\u0646\\u0648\\u0644\\u0648\\u062c\\u064a\\u0627\"}', 'technology', NULL, 'Active', 'Active', NULL, 17, 52, NULL, NULL, NULL),
(68, '{\"en\":\"education\",\"ar\":\"\\u062a\\u0639\\u0644\\u064a\\u0645\"}', 'education', NULL, 'Active', 'Active', NULL, 17, 52, NULL, NULL, NULL);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'admin', '2024-01-12 16:38:13', '2024-01-12 16:38:13'),
(2, 'role-create', 'admin', '2024-01-12 16:38:13', '2024-01-12 16:38:13'),
(3, 'role-edit', 'admin', '2024-01-12 16:38:13', '2024-01-12 16:38:13'),
(4, 'role-delete', 'admin', '2024-01-12 16:38:13', '2024-01-12 16:38:13');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2024-01-12 16:38:14', '2024-01-12 16:38:14');

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
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `static_tables`
--

CREATE TABLE `static_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `subsubtitle` varchar(255) DEFAULT NULL,
  `years` int(11) DEFAULT NULL,
  `years_text` varchar(255) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `button` varchar(255) DEFAULT NULL,
  `button_two` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `url_two` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` enum('Active','Not Active') NOT NULL DEFAULT 'Active',
  `pages_id` bigint(20) UNSIGNED NOT NULL,
  `childe_pages_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item` varchar(255) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `static_tables`
--

INSERT INTO `static_tables` (`id`, `title`, `subtitle`, `subsubtitle`, `years`, `years_text`, `month`, `button`, `button_two`, `url`, `url_two`, `icon`, `description`, `status`, `pages_id`, `childe_pages_id`, `item`, `sort`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"dsaasads\",\"ar\":\"dsaasads\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>das<\\/p>\",\"ar\":\"<p>dsasdasadasdasd<\\/p>\"}', 'Active', 11, NULL, 'section-one', NULL, '2024-01-12 16:38:46', '2024-01-12 16:53:16'),
(2, '{\"en\":\"sadkigsau\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 17, 7, 'section-two', 343, '2024-01-12 16:44:27', '2024-01-12 16:44:27'),
(3, '{\"en\":\"asduhasih\"}', NULL, NULL, NULL, '{\"en\":\"hsaoidhidsa\"}', NULL, NULL, NULL, '{\"en\":\"iohioasdhiooii\"}', NULL, NULL, '{\"en\":\"<p>sadoihsadi<\\/p>\"}', 'Active', 16, 62, 'section-two', 232, '2024-01-12 16:44:57', '2024-01-12 16:44:57'),
(4, '{\"en\":\"sadkuigsauid\"}', '{\"en\":\"oiosahodih\"}', '{\"en\":\"oioisahdhi\"}', NULL, '{\"en\":\"hioahshh\"}', NULL, NULL, NULL, '{\"en\":\"ihahh\"}', NULL, NULL, '{\"en\":\"<p>oihadsoasdi<\\/p>\"}', 'Active', 15, NULL, 'section-two', 2, '2024-01-12 16:46:25', '2024-01-12 16:46:25'),
(5, '{\"en\":\"asdkabskjbkj\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"bjkdsbadbkjj\"}', NULL, NULL, NULL, 'Active', 12, NULL, 'section-foure', NULL, '2024-01-12 16:47:25', '2024-01-12 16:47:25'),
(6, '{\"en\":\"sadhsa\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>ljkldksajlkdsajl<\\/p>\"}', 'Active', 11, NULL, 'section-two', NULL, '2024-01-12 17:23:11', '2024-01-12 17:23:11'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 12, NULL, 'section-three', NULL, '2024-01-12 17:30:15', '2024-01-12 17:30:15'),
(8, '{\"en\":\"sadkhk\"}', NULL, NULL, 12, NULL, 123, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>kjdashd<\\/p>\"}', 'Active', 13, NULL, 'section-two', 22, '2024-01-12 17:32:53', '2024-01-12 17:32:53'),
(9, '{\"en\":\"nnn\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<p>nnnnnnnnn<\\/p>\"}', 'Active', 14, NULL, 'section-one', NULL, '2024-01-12 17:33:16', '2024-01-12 17:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `translation_keys`
--

CREATE TABLE `translation_keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translation_keys`
--

INSERT INTO `translation_keys` (`id`, `key`, `name`, `created_at`, `updated_at`) VALUES
(1, 'en', 'english', '2024-01-12 16:38:14', NULL),
(2, 'ar', 'arabic', '2024-01-12 16:38:14', NULL);

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `static_tables`
--
ALTER TABLE `static_tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `static_tables_pages_id_foreign` (`pages_id`),
  ADD KEY `static_tables_childe_pages_id_foreign` (`childe_pages_id`);

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
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- AUTO_INCREMENT for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `many_tables`
--
ALTER TABLE `many_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `our_teams`
--
ALTER TABLE `our_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
-- AUTO_INCREMENT for table `static_tables`
--
ALTER TABLE `static_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `translation_keys`
--
ALTER TABLE `translation_keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_pages_id_foreign` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `static_tables`
--
ALTER TABLE `static_tables`
  ADD CONSTRAINT `static_tables_childe_pages_id_foreign` FOREIGN KEY (`childe_pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `static_tables_pages_id_foreign` FOREIGN KEY (`pages_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
