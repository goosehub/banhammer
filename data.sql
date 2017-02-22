-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 01:29 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banhammer`
--

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user_key`, `site_key`, `pass`, `fail`, `streak`, `total`, `created`) VALUES
(46, 6, 1, 0, 0, 0, 0, '2017-02-22 00:29:16'),
(47, 6, 2, 0, 0, 0, 0, '2017-02-22 00:29:16'),
(48, 6, 3, 0, 0, 0, 0, '2017-02-22 00:29:16'),
(49, 6, 4, 0, 0, 0, 0, '2017-02-22 00:29:16'),
(50, 6, 5, 0, 0, 0, 0, '2017-02-22 00:29:16'),
(51, 6, 6, 0, 0, 0, 0, '2017-02-22 00:29:16'),
(52, 6, 7, 0, 0, 0, 0, '2017-02-22 00:29:16'),
(53, 6, 8, 0, 0, 0, 0, '2017-02-22 00:29:16'),
(54, 6, 9, 0, 0, 0, 0, '2017-02-22 00:29:16');

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `slug`, `sort`, `created`) VALUES
(1, 'none', 1, '2017-02-09 05:59:55'),
(2, 'edit', 3, '2017-02-09 05:59:55'),
(3, 'delete', 5, '2017-02-09 05:59:55'),
(4, 'temp_ban', 9, '2017-02-09 05:59:55'),
(5, 'perm_ban', 10, '2017-02-09 05:59:55'),
(8, 'warning', 2, '2017-02-16 10:24:22');

--
-- Dumping data for table `enforcement`
--

INSERT INTO `enforcement` (`id`, `site_key`, `offence_key`, `created`) VALUES
(1, 1, 1, '2017-02-09 06:53:35'),
(2, 1, 2, '2017-02-09 06:53:35'),
(3, 1, 11, '2017-02-09 06:53:35'),
(4, 1, 8, '2017-02-12 10:15:06'),
(5, 1, 4, '2017-02-12 10:15:06'),
(6, 1, 5, '2017-02-12 10:15:24'),
(7, 1, 7, '2017-02-12 10:15:24');

--
-- Dumping data for table `offence`
--

INSERT INTO `offence` (`id`, `slug`, `sort`, `created`) VALUES
(1, 'none', 0, '2017-02-09 06:00:59'),
(2, 'spam', 1, '2017-02-09 06:00:59'),
(3, 'off_topic', 1, '2017-02-09 06:00:59'),
(4, 'rude', 1, '2017-02-09 06:00:59'),
(5, 'low_quality', 1, '2017-02-09 06:00:59'),
(6, 'opinion_based', 1, '2017-02-09 06:00:59'),
(7, 'controversial', 1, '2017-02-09 06:00:59'),
(8, 'copyright_violation', 1, '2017-02-09 06:00:59'),
(9, 'fake_news', 1, '2017-02-09 06:00:59'),
(10, 'pornographic', 1, '2017-02-09 06:00:59'),
(11, 'political', 10, '2017-02-09 06:00:59');

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `slug`, `name`, `active`, `accuracy_minimum`, `anonymous_flag`, `sort`, `created`) VALUES
(1, 'blank', 'bLanK', 1, 0, 1, 0, '2017-02-09 05:44:49'),
(2, 'b', '/b/', 0, 0, 0, 0, '2017-02-09 05:44:49'),
(3, 'facepage', 'Facepage', 0, 0, 0, 0, '2017-02-09 05:45:20'),
(4, 'rumblr', 'Rumblr', 0, 0, 0, 0, '2017-02-09 05:45:20'),
(5, 'bitter', 'Bitter', 0, 0, 0, 0, '2017-02-09 05:45:54'),
(6, 'slackovertime', 'SlackOvertime', 0, 0, 0, 0, '2017-02-09 05:45:54'),
(7, 'wetube', 'WeTube', 0, 0, 0, 0, '2017-02-09 05:46:18'),
(8, 'Amason', 'Amason', 0, 0, 0, 0, '2017-02-09 05:46:18'),
(9, 'asksaidit', '/r/asksaidit', 0, 0, 0, 0, '2017-02-09 07:33:46');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `ab_test`, `image`, `ip`, `email`, `facebook_id`, `last_login`, `password`, `created`) VALUES
(6, 'goose', 'hide_subheader', '', '::1', 'placeholder@gmail.com', '0', '2017-02-21 19:29:16', '$2y$10$Z/bQOQV4wVrcyUD8ZKIf.evZvy4Y.q5LPfAtZEC.Erc5paLYW114G', '2017-02-22 00:29:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
