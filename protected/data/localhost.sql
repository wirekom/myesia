-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 30, 2013 at 11:36 PM
-- Server version: 5.5.34-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wirekom_esia`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `slug` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `slug`, `created`, `updated`) VALUES
(1, 'Pojok Komunitas', 'Pojok-Komunitas Bakrie Telecom', 'pojok-komunitas', '2013-10-23 13:33:21', '2013-10-30 22:25:48'),
(2, 'Foto', 'Picture Gallery Bakrie Telecom', 'foto', '2013-10-23 13:33:42', '2013-10-30 22:27:02'),
(3, 'Video', 'Video Gallery Bakrie Telecom', 'video', '2013-10-23 13:34:03', '2013-10-30 22:29:29'),
(4, 'Secangkir Kopi', 'Secangkir Kopi di Pagi Hari', 'secangkir-kopi', '2013-10-23 13:34:30', '2013-10-30 22:29:49'),
(5, 'Profil Karyawan', 'Profil Karyawan Bakrie Telecom', 'profil-karyawan', '2013-10-23 13:34:51', '2013-10-30 22:30:00'),
(6, 'Kuis', 'Kuis Berhadiah', 'kuis', '2013-10-23 13:35:09', '2013-10-30 22:30:13'),
(7, 'Berita Keluarga', 'Berita Keluarga Bakrie Telecom', 'berita-keluarga', '2013-10-23 13:35:29', '2013-10-30 22:30:26'),
(8, 'Esia-Pedia', 'Esia Pedia', 'esia-pedia', '2013-10-23 13:35:51', '2013-10-30 22:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `news_id` int(25) NOT NULL,
  `author_id` int(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comment_news1_idx` (`news_id`),
  KEY `fk_comment_user1_idx` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `created`, `updated`, `news_id`, `author_id`) VALUES
(1, 'testing gan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 4),
(2, 'testing lagi gan', '2013-10-28 13:08:36', '2013-10-28 13:08:36', 1, 4),
(3, 'hell you', '2013-10-28 13:10:07', '2013-10-28 13:10:07', 1, 4),
(4, 'testing gan', '2013-10-28 20:18:19', '2013-10-28 20:18:19', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `priority` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_menu_menu1_idx` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `url`, `description`, `published`, `priority`, `created`, `updated`, `parent_id`) VALUES
(1, 'Root', '/', 'halaman google', 1, 50, '2013-10-28 10:09:39', '2013-10-30 16:23:36', NULL),
(2, 'Google', 'www.google.com', 'Search engine', 1, 50, '2013-10-30 16:22:28', '2013-10-30 16:22:28', 1),
(3, 'Facebook', 'www.facebook.com', 'Social Networks', 1, 49, '2013-10-30 16:23:17', '2013-10-30 16:23:17', 1),
(6, 'Google Images', 'www.images.google.com', 'Google Images', 1, 50, '2013-10-30 17:14:38', '2013-10-30 17:14:38', 2),
(7, 'Go Mail', 'www.mai.google.com', 'Google Web Mail', 1, 50, '2013-10-30 17:16:05', '2013-10-30 17:16:05', 2),
(8, 'Facebook', 'www.facebook.com', '', 1, -43, '2013-10-30 17:26:56', '2013-10-30 17:26:56', 3),
(9, 'Facebook', 'www.facebook.com', '', 1, 0, '2013-10-30 17:28:52', '2013-10-30 17:28:52', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `image` varchar(150) NOT NULL,
  `title` varchar(225) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_banner` tinyint(1) NOT NULL DEFAULT '0',
  `slug` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `menu_link` tinyint(1) NOT NULL DEFAULT '0',
  `updated` datetime NOT NULL,
  `author_id` int(12) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_UNIQUE` (`slug`),
  KEY `fk_artikel_user1_idx` (`author_id`),
  KEY `fk_news_category1_idx` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `image`, `title`, `content`, `status`, `is_banner`, `slug`, `created`, `menu_link`, `updated`, `author_id`, `category_id`) VALUES
(1, '979df40010c3cd77df3818e521904548873ae71c.jpg', 'Lorem ipsum dolor sit amet', '<p><img alt="" src="/myesia/uploads/images/2011-07-06%2007.34.32.jpg" style="height:225px; width:300px" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie.</p>\r\n\r\n<p>Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</p>\r\n', 2, 1, 'lorem-ipsum-dolor-sit-amet', '2013-10-23 13:48:29', 0, '2013-10-28 20:17:28', 4, 1),
(2, 'e7145876326feef04c9bfa53dbda5082724c18cb.jpg', 'Nunc imperdiet gravida mauris', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</p>\r\n', 2, 1, 'nunc-imperdiet-gravida-mauris', '2013-10-23 14:04:22', 0, '2013-10-28 20:18:04', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(3, 'admin'),
(4, 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `static_page`
--

CREATE TABLE IF NOT EXISTS `static_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `menu_link` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `slug` varchar(255) NOT NULL,
  `updated` datetime NOT NULL,
  `author_id` int(12) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_UNIQUE` (`slug`),
  KEY `fk_static_user1_idx` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `static_page`
--

INSERT INTO `static_page` (`id`, `title`, `content`, `status`, `menu_link`, `created`, `slug`, `updated`, `author_id`) VALUES
(1, 'testtin static paget', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie.</p>\r\n\r\n<p><img alt="" src="/myesia/uploads/files/2011-09-25%2013.42.40.jpg" style="height:225px; width:300px" />Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</p>\r\n', 2, 0, '2013-10-28 13:23:48', 'testtin-static-paget', '2013-10-28 13:23:48', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(25) NOT NULL,
  `role_id` int(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_role_idx` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `role_id`) VALUES
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admininstrator', 'admin@myesia.com', 3),
(5, 'guest', '084e0343a0486ff05530df6c705c8bb4', 'admininstrator', 'admin@myesia.com', 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_news1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_user1` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_menu1` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_artikel_user1` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_news_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `static_page`
--
ALTER TABLE `static_page`
  ADD CONSTRAINT `fk_static_user1` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
