-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2017 at 05:46 PM
-- Server version: 5.7.17
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banhammer`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_key` int(10) unsigned NOT NULL,
  `site_key` int(10) unsigned NOT NULL,
  `pass` int(10) unsigned NOT NULL,
  `fail` int(10) unsigned NOT NULL,
  `streak` int(10) unsigned NOT NULL,
  `total` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `offence`
--

CREATE TABLE IF NOT EXISTS `offence` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `offence_key` int(10) unsigned NOT NULL,
  `real_report` int(10) unsigned NOT NULL DEFAULT '0',
  `site_key` int(10) NOT NULL,
  `account_key` int(10) NOT NULL,
  `confidence` int(10) unsigned NOT NULL,
  `severity_sum` int(10) unsigned NOT NULL DEFAULT '0',
  `review_tally` int(10) unsigned NOT NULL DEFAULT '0',
  `last_reviewed` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=235 ;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_key` int(10) unsigned NOT NULL,
  `site_key` int(10) unsigned NOT NULL,
  `post_key` int(10) unsigned NOT NULL,
  `offence_key` int(10) unsigned NOT NULL,
  `action_key` int(10) unsigned NOT NULL,
  `ip` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=580 ;

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `active` int(1) unsigned NOT NULL,
  `accuracy_minimum` int(10) unsigned NOT NULL,
  `anonymous_flag` int(1) NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `ab_test` varchar(100) NOT NULL DEFAULT '',
  `image` varchar(100) NOT NULL DEFAULT '',
  `ip` varchar(100) NOT NULL,
  `email` varchar(256) NOT NULL DEFAULT '',
  `facebook_id` varchar(256) NOT NULL DEFAULT '',
  `last_login` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
