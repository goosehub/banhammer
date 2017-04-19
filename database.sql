-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2017 at 04:18 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_key` int(10) UNSIGNED NOT NULL,
  `site_key` int(10) UNSIGNED NOT NULL,
  `pass` int(10) UNSIGNED NOT NULL,
  `fail` int(10) UNSIGNED NOT NULL,
  `streak` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user_key`, `site_key`, `pass`, `fail`, `streak`, `total`, `created`) VALUES
(1, 1, 1, 0, 0, 0, 0, '2017-04-19 04:17:38'),
(2, 1, 2, 1, 0, 1, 1, '2017-04-19 04:18:11'),
(3, 1, 3, 0, 0, 0, 0, '2017-04-19 04:17:38'),
(4, 1, 4, 0, 0, 0, 0, '2017-04-19 04:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(100) NOT NULL,
  `active` int(1) NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `enforcement`
--

CREATE TABLE `enforcement` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_key` int(10) NOT NULL,
  `offence_key` int(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(15, 4, 4, '2017-04-19 02:51:19'),
(16, 3, 24, '2017-04-19 03:31:49'),
(17, 4, 23, '2017-04-19 03:52:42'),
(18, 4, 21, '2017-04-19 03:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `offence`
--

CREATE TABLE `offence` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(100) NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offence`
--

INSERT INTO `offence` (`id`, `slug`, `sort`, `created`) VALUES
(1, 'none', 0, '2017-02-09 06:00:59'),
(2, 'spam', 1, '2017-02-09 06:00:59'),
(3, 'off_topic', 2, '2017-02-22 23:46:39'),
(4, 'troll', 3, '2017-02-22 23:46:42'),
(5, 'low_quality', 30, '2017-02-22 23:46:50'),
(6, 'opinion_based', 30, '2017-02-22 23:46:51'),
(7, 'hate_speech', 30, '2017-04-19 03:31:57'),
(8, 'copyright', 30, '2017-04-19 03:32:28'),
(9, 'fake_news', 30, '2017-02-22 23:46:57'),
(10, 'pornographic', 35, '2017-03-05 17:05:51'),
(11, 'political', 10, '2017-02-09 06:00:59'),
(12, 'raid', 28, '2017-04-19 03:07:08'),
(13, 'user_underage', 24, '2017-04-19 03:07:27'),
(14, 'advertising', 21, '2017-02-22 23:47:27'),
(15, 'furry', 50, '2017-02-22 23:50:13'),
(16, 'brony', 51, '2017-02-22 23:50:18'),
(20, 'dubs', 26, '2017-02-22 23:50:53'),
(21, 'vote_begging', 29, '2017-04-19 03:55:45'),
(22, 'request', 30, '2017-02-22 23:46:11'),
(23, 'impersonation', 53, '2017-04-19 03:52:22'),
(24, 'nudity', 20, '2017-04-19 03:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `offence_key` int(10) UNSIGNED NOT NULL,
  `real_report` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `site_key` int(10) NOT NULL,
  `account_key` int(10) NOT NULL,
  `confidence` int(10) UNSIGNED NOT NULL,
  `severity_sum` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `review_tally` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `last_reviewed` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `username`, `ip`, `content`, `image`, `offence_key`, `real_report`, `site_key`, `account_key`, `confidence`, `severity_sum`, `review_tally`, `last_reviewed`, `created`) VALUES
(1, 'Anonymous', '::1', 'whatever', '', 1, 0, 2, 0, 2, 0, 1, '2017-04-19 00:18:11', '2017-04-19 02:40:26'),
(2, 'Anonymous', '::1', 'test', '', 1, 0, 3, 0, 2, 0, 1, '2017-04-18 23:06:03', '2017-04-19 02:45:35'),
(3, 'Anonymous', '::1', 'whatever', '', 1, 0, 4, 0, 1, 0, 0, '2017-04-18 22:45:41', '2017-04-19 02:45:41'),
(4, 'Anonymous', '::1', 'another post\r\nhttps://www.youtube.com/watch?v=WU7-8C93raI', '', 1, 0, 4, 0, 2, 0, 1, '2017-04-18 23:05:55', '2017-04-19 02:55:24'),
(5, 'Anonymous', '::1', 'another guess', '', 1, 0, 4, 0, 1, 0, 0, '2017-04-18 22:55:34', '2017-04-19 02:55:34'),
(6, 'Anonymous', '::1', 'Keep posting', '', 1, 0, 3, 0, 1, 0, 0, '2017-04-18 22:55:54', '2017-04-19 02:55:54'),
(7, 'Anonymous', '::1', 'moabo number 5\r\n\r\nhttps://www.youtube.com/watch?v=WU7-8C93raI', '', 1, 0, 3, 0, 1, 0, 0, '2017-04-18 22:58:14', '2017-04-19 02:58:14'),
(8, 'Anonymous', '::1', 'first line\r\n\r\nthird line', '', 1, 0, 3, 0, 2, 0, 1, '2017-04-18 23:06:02', '2017-04-19 02:58:25'),
(9, 'Anonymous', '::1', 'first line\r\n\r\nthird line', '', 1, 0, 4, 0, 2, 0, 1, '2017-04-18 23:05:58', '2017-04-19 02:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_key` int(10) UNSIGNED NOT NULL,
  `site_key` int(10) UNSIGNED NOT NULL,
  `post_key` int(10) UNSIGNED NOT NULL,
  `offence_key` int(10) UNSIGNED NOT NULL,
  `action_key` int(10) UNSIGNED NOT NULL,
  `ip` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `account_key`, `site_key`, `post_key`, `offence_key`, `action_key`, `ip`, `created`) VALUES
(1, 0, 4, 4, 1, 1, '::1', '2017-04-19 03:05:55'),
(2, 0, 4, 9, 1, 1, '::1', '2017-04-19 03:05:58'),
(3, 0, 3, 8, 1, 1, '::1', '2017-04-19 03:06:02'),
(4, 0, 3, 2, 1, 1, '::1', '2017-04-19 03:06:03'),
(5, 2, 2, 1, 1, 1, '::1', '2017-04-19 04:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `active` int(1) UNSIGNED NOT NULL,
  `accuracy_minimum` int(10) UNSIGNED NOT NULL,
  `anonymous_flag` int(1) NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `slug`, `name`, `active`, `accuracy_minimum`, `anonymous_flag`, `sort`, `created`) VALUES
(1, 'default', 'Default', 0, 0, 1, 0, '2017-02-09 05:44:49'),
(2, '4shame', '4shame', 1, 0, 1, 0, '2017-02-09 05:44:49'),
(3, 'myface', 'MyFace', 1, 0, 0, 0, '2017-02-09 05:45:20'),
(4, 'saidit', 'Saidit', 1, 0, 0, 0, '2017-02-09 07:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `ab_test` varchar(100) NOT NULL DEFAULT '',
  `image` varchar(100) NOT NULL DEFAULT '',
  `ip` varchar(100) NOT NULL,
  `email` varchar(256) NOT NULL DEFAULT '',
  `facebook_id` varchar(256) NOT NULL DEFAULT '',
  `last_login` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `ab_test`, `image`, `ip`, `email`, `facebook_id`, `last_login`, `password`, `created`) VALUES
(1, 'goose', 'hide_subheader', '', '::1', 'placeholder@gmail.com', '0', '2017-04-19 00:18:05', '$2y$10$LMR7uY.pMC0JwJ5STWRVEe8lJMWoNiZ2HnBw0CKoMskIiuIXmYp6W', '2017-04-19 04:17:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enforcement`
--
ALTER TABLE `enforcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offence`
--
ALTER TABLE `offence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `enforcement`
--
ALTER TABLE `enforcement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `offence`
--
ALTER TABLE `offence`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
