-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2017 at 11:39 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banhammer`
--

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `slug`, `active`, `sort`, `created`) VALUES
(1, 'none', 1, 1, '2017-02-23 02:17:34'),
(2, 'edit', 0, 3, '2017-02-09 05:59:55'),
(3, 'delete', 1, 5, '2017-02-23 02:17:41'),
(4, 'temp_ban', 1, 9, '2017-02-23 02:17:43'),
(5, 'perm_ban', 1, 10, '2017-02-23 02:17:46'),
(8, 'warning', 1, 2, '2017-02-23 02:17:49');

--
-- Dumping data for table `enforcement`
--

INSERT INTO `enforcement` (`id`, `site_key`, `offence_key`, `created`) VALUES
(1, 2, 1, '2017-04-19 02:51:18'),
(2, 2, 2, '2017-04-19 02:51:18'),
(3, 2, 13, '2017-04-19 02:51:19'),
(4, 2, 14, '2017-04-19 02:51:19'),
(5, 2, 15, '2017-04-19 02:51:19'),
(6, 2, 16, '2017-04-19 02:51:19'),
(7, 2, 20, '2017-04-19 02:51:19'),
(8, 3, 1, '2017-04-19 02:51:19'),
(9, 3, 2, '2017-04-19 02:51:19'),
(10, 3, 7, '2017-04-19 02:51:19'),
(11, 3, 8, '2017-04-19 02:51:19'),
(12, 3, 9, '2017-04-19 02:51:19'),
(13, 4, 1, '2017-04-19 02:51:19'),
(14, 4, 2, '2017-04-19 02:51:19'),
(16, 3, 24, '2017-04-19 03:31:49'),
(17, 4, 5, '2017-04-19 03:52:42'),
(18, 4, 21, '2017-04-19 03:56:04'),
(19, 4, 22, '2017-04-21 23:19:18'),
(20, 4, 10, '2017-04-21 23:27:18');

--
-- Dumping data for table `offence`
--

INSERT INTO `offence` (`id`, `slug`, `sort`, `created`) VALUES
(1, 'none', 0, '2017-02-09 06:00:59'),
(2, 'spam', 1, '2017-02-09 06:00:59'),
(3, 'off_topic', 2, '2017-02-22 23:46:39'),
(4, 'troll', 8, '2017-04-21 23:32:18'),
(5, 'nsfw', 30, '2017-04-21 23:31:38'),
(6, 'opinion_based', 30, '2017-02-22 23:46:51'),
(7, 'hate_speech', 30, '2017-04-19 03:31:57'),
(8, 'copyright', 30, '2017-04-19 03:32:28'),
(9, 'fake_news', 30, '2017-02-22 23:46:57'),
(10, 'very_low_quality', 5, '2017-04-21 23:32:14'),
(11, 'political', 10, '2017-02-09 06:00:59'),
(12, 'raid', 28, '2017-04-19 03:07:08'),
(13, 'user_underage', 24, '2017-04-19 03:07:27'),
(14, 'advertising', 21, '2017-02-22 23:47:27'),
(15, 'furry', 50, '2017-02-22 23:50:13'),
(16, 'brony', 51, '2017-02-22 23:50:18'),
(20, 'dub_checking', 26, '2017-04-21 23:13:01'),
(21, 'vote_begging', 33, '2017-04-19 03:55:45'),
(22, 'absuive', 20, '2017-04-21 23:19:28'),
(23, 'impersonation', 53, '2017-04-19 03:52:22'),
(24, 'nudity', 20, '2017-04-19 03:31:28');

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `slug`, `name`, `active`, `accuracy_minimum`, `anonymous_flag`, `sort`, `created`) VALUES
(1, 'default', 'Default', 0, 0, 1, 0, '2017-02-09 05:44:49'),
(2, '4shame', '4shame', 1, 0, 1, 0, '2017-02-09 05:44:49'),
(3, 'myface', 'MyFace', 1, 0, 0, 0, '2017-02-09 05:45:20'),
(4, 'saidit', 'Saidit', 1, 0, 0, 0, '2017-02-09 07:33:46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
