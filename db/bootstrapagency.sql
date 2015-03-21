-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2015 at 04:50 PM
-- Server version: 5.6.23-log
-- PHP Version: 5.3.28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bootstrapagency`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE IF NOT EXISTS `aboutus` (
  `heading` text NOT NULL,
  `content` text NOT NULL,
  `intro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`heading`, `content`, `intro`) VALUES
('About', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `heading` text NOT NULL,
  `intro` text NOT NULL,
  `email` text NOT NULL,
  `sendtoemail` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zipcode` text NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`heading`, `intro`, `email`, `sendtoemail`, `address`, `city`, `state`, `zipcode`, `phone`) VALUES
('Contact', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE IF NOT EXISTS `footer` (
  `heading` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`heading`, `content`) VALUES
('Around the Net', '');

-- --------------------------------------------------------

--
-- Table structure for table `landing`
--

CREATE TABLE IF NOT EXISTS `landing` (
  `heading` text NOT NULL,
  `intro` text NOT NULL,
  `skills` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `landing`
--

INSERT INTO `landing` (`heading`, `intro`, `skills`, `image`) VALUES
('Home', 'Portfolio Agency', 'Web Design - Web Developer - Graphic Design', '');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `thumbnail` text NOT NULL,
  `content` text NOT NULL,
  `active` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `thumbnail`, `content`, `active`, `datetime`) VALUES
(25, 'test', '', '<p>test</p>', 1, '2015-02-14 22:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `thumbnail` text NOT NULL,
  `content` text NOT NULL,
  `active` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `thumbnail`, `content`, `active`, `datetime`) VALUES
(26, 'Chat site', 'chatsite_01.png', 'test', 1, '2015-03-01 06:25:00'),
(27, 'Media Browser', 'mediabrowser_01.png', 'test2', 1, '2015-03-01 06:25:05'),
(28, 'Bakery eCommerce', 'blakeley_01.png', '', 1, '2015-03-01 06:24:30'),
(29, 'CMS - Portfolio Web Site', 'portfolio_01.png', '', 1, '2015-03-05 04:41:47'),
(30, 'Raspberry Pi: Wireless IP Camera', 'raspi_cam.png', '', 1, '2015-03-01 06:16:23'),
(31, 'Web Based File Manager', 'filemgr_01.png', '', 1, '2015-03-05 04:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `setup`
--

CREATE TABLE IF NOT EXISTS `setup` (
  `title` text NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `headercode` text NOT NULL,
  `author` text NOT NULL,
  `googleanalytics` text NOT NULL,
  `tinymce` int(11) NOT NULL,
  `portfolioheading` text NOT NULL,
  `portfoliointro` text NOT NULL,
  `portfoliooutro` text NOT NULL,
  `servicesheading` text NOT NULL,
  `servicesintro` text NOT NULL,
  `servicesoutro` text NOT NULL,
  `teamheading` text NOT NULL,
  `teamintro` text NOT NULL,
  `teamoutro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setup`
--

INSERT INTO `setup` (`title`, `keywords`, `description`, `headercode`, `author`, `googleanalytics`, `tinymce`, `portfolioheading`, `portfoliointro`, `portfoliooutro`, `servicesheading`, `servicesintro`, `servicesoutro`, `teamheading`, `teamintro`, `teamoutro`) VALUES
('portfolioCMS', '', '', '', '', '', 1, 'Portfolio', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE IF NOT EXISTS `socialmedia` (
  `heading` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `linkedin` text NOT NULL,
  `google` text NOT NULL,
  `github` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`heading`, `facebook`, `twitter`, `linkedin`, `google`, `github`) VALUES
('Follow Me', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `name` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `linkedin` text NOT NULL,
  `google` text NOT NULL,
  `github` text NOT NULL,
  `thumbnail` text NOT NULL,
  `content` text NOT NULL,
  `active` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `title`, `name`, `facebook`, `twitter`, `linkedin`, `google`, `github`, `thumbnail`, `content`, `active`, `datetime`) VALUES
(26, 'Chat site', 'test', '', '', '', '', '', '', '<p style="text-align: left;">test content</p>', 1, '2015-03-01 06:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` text NOT NULL,
  `password` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
