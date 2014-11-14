-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014-11-14 17:40:47
-- 服务器版本： 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chinatravel`
--

-- --------------------------------------------------------

--
-- 表的结构 `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `city`
--

INSERT INTO `city` (`id`, `province_id`, `name`, `status`, `seo_title`, `seo_keyword`, `seo_desc`, `created_at`, `updated_at`) VALUES
(1, 4, 'Chengdu', 1, 'Chengdu', 'Chengdu', 'Chengdu', 1415090188, 1415090188),
(2, 4, 'Mianyang', 1, 'Mianyang', 'Mianyang', 'Mianyang', 1415159129, 1415174740);

-- --------------------------------------------------------

--
-- 表的结构 `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL DEFAULT '0',
  `city_id` int(11) NOT NULL DEFAULT '0',
  `town_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1415002716),
('m130524_201442_init', 1415002718);

-- --------------------------------------------------------

--
-- 表的结构 `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='省份表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `province`
--

INSERT INTO `province` (`id`, `name`, `status`, `seo_title`, `seo_keyword`, `seo_desc`, `created_at`, `updated_at`) VALUES
(1, 'Beijing', 1, 'title', 'keyword', 'description', 1415005989, 1415007604),
(2, 'Tianjin', 2, 'Tianjin', 'Tianjin', 'Tianjin', 1415007914, 1415956646),
(3, 'Shanghai', 1, 'Shanghai', 'Shanghai', 'Shanghai', 1415069719, 1415069719),
(4, 'Sichuan', 1, 'Sichuan', 'Sichuan', 'Sichuan', 1415089929, 1415089929),
(5, 'Hubei', 1, 'Hubei', 'Hubei', 'Hubei', 1415946326, 1415946326),
(6, 'Hunan', 1, 'Hunan', 'Hunan', 'Hunan', 1415952380, 1415952380);

-- --------------------------------------------------------

--
-- 表的结构 `spot`
--

CREATE TABLE IF NOT EXISTS `spot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL DEFAULT '0',
  `city_id` int(11) NOT NULL DEFAULT '0',
  `town_id` int(11) NOT NULL DEFAULT '0',
  `location_id` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `town`
--

CREATE TABLE IF NOT EXISTS `town` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL DEFAULT '0',
  `city_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  `updated_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `town`
--

INSERT INTO `town` (`id`, `province_id`, `city_id`, `name`, `status`, `seo_title`, `seo_keyword`, `seo_desc`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Santai', 1, 'Santai', 'Santai', 'Santai', 1415159147, 1415180243),
(2, 4, 2, 'Yanting', 1, 'Yanting', 'Yanting', 'Yanting', 1415174780, 1415174780);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '1',
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'w48rDXy7Oil_xtOuNqKeO3npe5uxPzA8', '$2y$13$CBcEBaYzgnCib8bj9/3Z/OE9FKwLEl.2s9HtS.FzuqfPVBCnBi/rK', NULL, 'admin@admin.com', 1, 1, 1415002799, 1415002799);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
