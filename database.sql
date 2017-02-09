-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2017 at 02:53 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `moderator`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `slug`, `sort`, `created`) VALUES
(1, 'none', 0, '2017-02-09 00:59:55'),
(2, 'edit', 0, '2017-02-09 00:59:55'),
(3, 'delete', 0, '2017-02-09 00:59:55'),
(4, 'temp_ban', 0, '2017-02-09 00:59:55'),
(5, 'perm_ban', 0, '2017-02-09 00:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `enforcement`
--

CREATE TABLE IF NOT EXISTS `enforcement` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_key` int(10) NOT NULL,
  `offence_key` int(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `enforcement`
--

INSERT INTO `enforcement` (`id`, `site_key`, `offence_key`, `created`) VALUES
(1, 1, 1, '2017-02-09 01:53:35'),
(2, 1, 2, '2017-02-09 01:53:35'),
(3, 1, 11, '2017-02-09 01:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `offence`
--

CREATE TABLE IF NOT EXISTS `offence` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `offence`
--

INSERT INTO `offence` (`id`, `slug`, `sort`, `created`) VALUES
(1, 'none', 0, '2017-02-09 01:00:59'),
(2, 'spam', 0, '2017-02-09 01:00:59'),
(3, 'off_topic', 0, '2017-02-09 01:00:59'),
(4, 'rude', 0, '2017-02-09 01:00:59'),
(5, 'low_quality', 0, '2017-02-09 01:00:59'),
(6, 'opinion_based', 0, '2017-02-09 01:00:59'),
(7, 'controversial', 0, '2017-02-09 01:00:59'),
(8, 'copyright_violation', 0, '2017-02-09 01:00:59'),
(9, 'fake_news', 0, '2017-02-09 01:00:59'),
(10, 'pornographic', 0, '2017-02-09 01:00:59'),
(11, 'illegal_content', 0, '2017-02-09 01:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_key` int(10) NOT NULL,
  `user_key` int(10) NOT NULL,
  `offence_key` int(10) unsigned NOT NULL,
  `confidence` int(10) unsigned NOT NULL,
  `severity_sum` int(10) unsigned NOT NULL,
  `review_tally` int(10) unsigned NOT NULL,
  `username` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `last_reviewed` timestamp NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_key` int(10) unsigned NOT NULL,
  `site_key` int(10) unsigned NOT NULL,
  `post_key` int(10) unsigned NOT NULL,
  `offence_key` int(10) unsigned NOT NULL,
  `action_key` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `active` int(1) unsigned NOT NULL,
  `reputation_minimum` int(10) unsigned NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `slug`, `name`, `active`, `reputation_minimum`, `sort`, `created`) VALUES
(1, '4shame_b', '4shame /b/', 0, 0, 0, '2017-02-09 00:44:49'),
(2, 'saidit', 'Saidit', 0, 0, 0, '2017-02-09 00:44:49'),
(3, 'facepage', 'Facepage', 0, 0, 0, '2017-02-09 00:45:20'),
(4, 'rumblr', 'Rumblr', 0, 0, 0, '2017-02-09 00:45:20'),
(5, 'bitter', 'Bitter', 0, 0, 0, '2017-02-09 00:45:54'),
(6, 'slackovertime', 'SlackOvertime', 0, 0, 0, '2017-02-09 00:45:54'),
(7, 'wetube', 'WeTube', 0, 0, 0, '2017-02-09 00:46:18'),
(8, 'Amason', 'Amason', 0, 0, 0, '2017-02-09 00:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `reputation` int(10) unsigned NOT NULL,
  `review_tally` int(10) unsigned NOT NULL,
  `image` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `last_login` timestamp NOT NULL,
  `password` varchar(1000) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
