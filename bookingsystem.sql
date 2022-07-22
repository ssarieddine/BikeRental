-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 12, 2022 at 08:58 PM
-- Server version: 5.7.26
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lft` (`lft`,`rght`),
  KEY `alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=486 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 196),
(19, 1, NULL, NULL, 'Error', 2, 5),
(20, 19, NULL, NULL, 'isAuthorized', 3, 4),
(28, 1, NULL, NULL, 'MyUsers', 6, 63),
(29, 28, NULL, NULL, 'index', 7, 8),
(30, 28, NULL, NULL, 'view', 9, 10),
(31, 28, NULL, NULL, 'add', 11, 12),
(32, 28, NULL, NULL, 'edit', 13, 14),
(33, 28, NULL, NULL, 'delete', 15, 16),
(34, 28, NULL, NULL, 'isAuthorized', 17, 18),
(42, 28, NULL, NULL, 'linkSocial', 19, 20),
(43, 28, NULL, NULL, 'callbackLinkSocial', 21, 22),
(44, 28, NULL, NULL, 'twitterLogin', 23, 24),
(45, 28, NULL, NULL, 'failedSocialLoginListener', 25, 26),
(46, 28, NULL, NULL, 'failedSocialLogin', 27, 28),
(47, 28, NULL, NULL, 'socialLogin', 29, 30),
(48, 28, NULL, NULL, 'login', 31, 32),
(49, 28, NULL, NULL, 'verify', 33, 34),
(50, 28, NULL, NULL, 'logout', 35, 36),
(51, 28, NULL, NULL, 'getUsersTable', 37, 38),
(52, 28, NULL, NULL, 'setUsersTable', 39, 40),
(53, 28, NULL, NULL, 'profile', 41, 42),
(54, 28, NULL, NULL, 'validateReCaptcha', 43, 44),
(55, 28, NULL, NULL, 'register', 45, 46),
(56, 28, NULL, NULL, 'validateEmail', 47, 48),
(57, 28, NULL, NULL, 'changePassword', 49, 50),
(58, 28, NULL, NULL, 'resetPassword', 51, 52),
(59, 28, NULL, NULL, 'requestResetPassword', 53, 54),
(60, 28, NULL, NULL, 'resetGoogleAuthenticator', 55, 56),
(61, 28, NULL, NULL, 'validate', 57, 58),
(62, 28, NULL, NULL, 'resendTokenValidation', 59, 60),
(63, 28, NULL, NULL, 'socialEmail', 61, 62),
(64, 1, NULL, NULL, 'Pages', 64, 71),
(65, 64, NULL, NULL, 'display', 65, 66),
(66, 64, NULL, NULL, 'backend', 67, 68),
(67, 64, NULL, NULL, 'isAuthorized', 69, 70),
(89, 1, NULL, NULL, 'Tags', 72, 85),
(90, 89, NULL, NULL, 'index', 73, 74),
(91, 89, NULL, NULL, 'view', 75, 76),
(92, 89, NULL, NULL, 'add', 77, 78),
(93, 89, NULL, NULL, 'edit', 79, 80),
(94, 89, NULL, NULL, 'delete', 81, 82),
(95, 89, NULL, NULL, 'isAuthorized', 83, 84),
(245, 1, NULL, NULL, 'Types', 86, 99),
(246, 245, NULL, NULL, 'index', 87, 88),
(247, 245, NULL, NULL, 'view', 89, 90),
(248, 245, NULL, NULL, 'add', 91, 92),
(249, 245, NULL, NULL, 'edit', 93, 94),
(250, 245, NULL, NULL, 'delete', 95, 96),
(251, 245, NULL, NULL, 'isAuthorized', 97, 98),
(259, 1, NULL, NULL, 'Acl', 100, 101),
(260, 1, NULL, NULL, 'Bake', 102, 103),
(261, 1, NULL, NULL, 'Burzum\\Imagine', 104, 105),
(262, 1, NULL, NULL, 'CakeDC\\Users', 106, 185),
(263, 262, NULL, NULL, 'SocialAccounts', 107, 114),
(264, 263, NULL, NULL, 'validateAccount', 108, 109),
(265, 263, NULL, NULL, 'resendValidation', 110, 111),
(266, 263, NULL, NULL, 'isAuthorized', 112, 113),
(274, 262, NULL, NULL, 'Users', 115, 184),
(275, 274, NULL, NULL, 'isAuthorized', 116, 117),
(283, 274, NULL, NULL, 'linkSocial', 118, 119),
(284, 274, NULL, NULL, 'callbackLinkSocial', 120, 121),
(285, 274, NULL, NULL, 'twitterLogin', 122, 123),
(286, 274, NULL, NULL, 'failedSocialLoginListener', 124, 125),
(287, 274, NULL, NULL, 'failedSocialLogin', 126, 127),
(288, 274, NULL, NULL, 'socialLogin', 128, 129),
(289, 274, NULL, NULL, 'login', 130, 131),
(290, 274, NULL, NULL, 'verify', 132, 133),
(291, 274, NULL, NULL, 'logout', 134, 135),
(292, 274, NULL, NULL, 'getUsersTable', 136, 137),
(293, 274, NULL, NULL, 'setUsersTable', 138, 139),
(294, 274, NULL, NULL, 'profile', 140, 141),
(295, 274, NULL, NULL, 'validateReCaptcha', 142, 143),
(296, 274, NULL, NULL, 'register', 144, 145),
(297, 274, NULL, NULL, 'validateEmail', 146, 147),
(298, 274, NULL, NULL, 'changePassword', 148, 149),
(299, 274, NULL, NULL, 'resetPassword', 150, 151),
(300, 274, NULL, NULL, 'requestResetPassword', 152, 153),
(301, 274, NULL, NULL, 'resetGoogleAuthenticator', 154, 155),
(302, 274, NULL, NULL, 'validate', 156, 157),
(303, 274, NULL, NULL, 'resendTokenValidation', 158, 159),
(304, 274, NULL, NULL, 'index', 160, 161),
(305, 274, NULL, NULL, 'view', 162, 163),
(306, 274, NULL, NULL, 'add', 164, 165),
(307, 274, NULL, NULL, 'edit', 166, 167),
(308, 274, NULL, NULL, 'delete', 168, 169),
(309, 274, NULL, NULL, 'socialEmail', 170, 171),
(310, 274, NULL, NULL, 'redirectWithQuery', 172, 173),
(311, 274, NULL, NULL, 'u2f', 174, 175),
(312, 274, NULL, NULL, 'u2fRegister', 176, 177),
(313, 274, NULL, NULL, 'u2fRegisterFinish', 178, 179),
(314, 274, NULL, NULL, 'u2fAuthenticate', 180, 181),
(315, 274, NULL, NULL, 'u2fAuthenticateFinish', 182, 183),
(316, 1, NULL, NULL, 'Captcha', 186, 193),
(317, 316, NULL, NULL, 'Captcha', 187, 192),
(318, 317, NULL, NULL, 'create', 188, 189),
(319, 317, NULL, NULL, 'isAuthorized', 190, 191),
(327, 1, NULL, NULL, 'Migrations', 194, 195);

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(191) DEFAULT NULL,
  `vehicle_id` int(10) DEFAULT NULL,
  `selected_vehicles` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `title`, `vehicle_id`, `selected_vehicles`, `value`, `created`, `modified`) VALUES
(1, 'Color', NULL, '1,3,6', 'Red', '2022-07-12 18:23:38', '2022-07-12 20:05:27'),
(2, 'Material', NULL, '3,4,5', 'Carbon', '2022-07-12 18:24:05', '2022-07-12 20:05:35'),
(3, 'Test Attribute', NULL, '1,2,3,4,5,6', 'Test', '2022-07-12 20:01:56', '2022-07-12 20:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `attributes_vehicles`
--

DROP TABLE IF EXISTS `attributes_vehicles`;
CREATE TABLE IF NOT EXISTS `attributes_vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(191) DEFAULT NULL,
  `attribute_id` int(10) DEFAULT NULL,
  `vehicle_id` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attributes_vehicles`
--

INSERT INTO `attributes_vehicles` (`id`, `title`, `attribute_id`, `vehicle_id`, `created`, `modified`) VALUES
(14, NULL, 1, 6, '2022-07-12 20:57:35', '2022-07-12 20:57:35'),
(13, NULL, 1, 3, '2022-07-12 20:57:35', '2022-07-12 20:57:35'),
(12, NULL, 1, 1, '2022-07-12 20:57:35', '2022-07-12 20:57:35'),
(15, NULL, 2, 3, '2022-07-12 20:57:39', '2022-07-12 20:57:39'),
(16, NULL, 2, 4, '2022-07-12 20:57:39', '2022-07-12 20:57:39'),
(17, NULL, 2, 5, '2022-07-12 20:57:39', '2022-07-12 20:57:39'),
(18, NULL, 3, 1, '2022-07-12 20:57:43', '2022-07-12 20:57:43'),
(19, NULL, 3, 2, '2022-07-12 20:57:43', '2022-07-12 20:57:43'),
(20, NULL, 3, 3, '2022-07-12 20:57:43', '2022-07-12 20:57:43'),
(21, NULL, 3, 4, '2022-07-12 20:57:43', '2022-07-12 20:57:43'),
(22, NULL, 3, 5, '2022-07-12 20:57:43', '2022-07-12 20:57:43'),
(23, NULL, 3, 6, '2022-07-12 20:57:43', '2022-07-12 20:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(191) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `created`, `modified`) VALUES
(1, 'Adiva', '2022-07-12 18:05:38', '2022-07-12 18:05:38'),
(2, 'Beeline', '2022-07-12 18:05:45', '2022-07-12 18:05:45'),
(3, 'Forza', '2022-07-12 18:05:51', '2022-07-12 18:05:51'),
(4, 'Jialing', '2022-07-12 18:05:56', '2022-07-12 18:05:56'),
(5, 'Vostok', '2022-07-12 18:06:04', '2022-07-12 18:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `is_superuser` tinyint(1) DEFAULT '0',
  `active` tinyint(1) DEFAULT '0',
  `username` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` char(36) CHARACTER SET latin1 DEFAULT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `is_superuser`, `active`, `username`, `role_id`, `name`, `email`, `password`, `created`, `modified`) VALUES
('1', 1, 1, 'superadmin', NULL, 'Super Admin', 'superadmin@bookingsystem.com', '$2y$10$I7FY8JFr/8RWaGHw02Z1tONrPXcfueymi1epNB7DqTG518KjAAEly', '2019-08-28 15:26:07', '2019-08-28 15:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(191) DEFAULT NULL,
  `brand_id` int(10) DEFAULT NULL,
  `vehicletype_id` int(10) DEFAULT NULL,
  `max_passenger_number` int(2) DEFAULT NULL,
  `rented` tinyint(1) DEFAULT '0',
  `rent_price` decimal(10,2) DEFAULT NULL,
  `rent_date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `title`, `brand_id`, `vehicletype_id`, `max_passenger_number`, `rented`, `rent_price`, `rent_date`, `created`, `modified`) VALUES
(1, 'Vehicle One', 1, 9, 2, 1, '10.00', '2022-07-12', '2022-07-12 18:20:14', '2022-07-12 19:46:18'),
(2, 'Vehicle Two', 4, 10, 1, 0, '5.00', '2022-07-12', '2022-07-12 18:45:39', '2022-07-12 18:49:01'),
(3, 'Vehicle Three', 5, 9, 2, 1, '6.00', '2022-07-03', '2022-07-12 18:50:00', '2022-07-12 18:50:00'),
(4, 'Spartan Bicycles', 2, 9, 5, 0, '25.00', '2022-07-12', '2022-07-12 19:47:57', '2022-07-12 19:47:57'),
(5, 'Arlon', 2, 9, NULL, 0, '10.00', '2022-07-12', '2022-07-12 19:48:32', '2022-07-12 19:48:32'),
(6, 'Spark Wheels', 3, 10, 1, 0, '5.00', '2022-07-12', '2022-07-12 19:48:51', '2022-07-12 19:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `vehicletypes`
--

DROP TABLE IF EXISTS `vehicletypes`;
CREATE TABLE IF NOT EXISTS `vehicletypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(191) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicletypes`
--

INSERT INTO `vehicletypes` (`id`, `title`, `created`, `modified`) VALUES
(9, 'Bikes', '2022-07-12 18:05:17', '2022-07-12 18:05:17'),
(10, 'Scooters', '2022-07-12 18:05:28', '2022-07-12 18:05:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
