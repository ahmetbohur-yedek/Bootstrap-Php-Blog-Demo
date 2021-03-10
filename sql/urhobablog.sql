-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2021 at 12:27 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urhobablog`
--

-- --------------------------------------------------------

--
-- Table structure for table `ub_headermenu`
--

CREATE TABLE `ub_headermenu` (
  `ub_menuID` int(255) NOT NULL,
  `ub_menuName` text COLLATE utf8_bin NOT NULL,
  `ub_menuURL` text COLLATE utf8_bin NOT NULL,
  `ub_menuParent` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ub_headermenu`
--

INSERT INTO `ub_headermenu` (`ub_menuID`, `ub_menuName`, `ub_menuURL`, `ub_menuParent`) VALUES
(1, 'Anasayfa', '/urhobablog/', 0),
(2, 'Urhoba', 'https://www.urhoba.net', 0),
(3, 'İletişim', 'https://www.urhoba.net', 0),
(4, 'Urhoba İletişim', 'https://www.urhoba.net', 2),
(5, 'Urhoba Deneme', 'https://www.urhoba.net', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ub_posts`
--

CREATE TABLE `ub_posts` (
  `post_id` int(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_writer` text COLLATE utf8_bin NOT NULL,
  `post_image_url` text COLLATE utf8_bin NOT NULL,
  `post_reads` bigint(255) UNSIGNED NOT NULL DEFAULT '0',
  `post_header` text COLLATE utf8_bin NOT NULL,
  `post_content` longtext COLLATE utf8_bin NOT NULL,
  `post_url` text COLLATE utf8_bin NOT NULL,
  `post_tags` longtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ub_posts`
--

INSERT INTO `ub_posts` (`post_id`, `post_date`, `post_writer`, `post_image_url`, `post_reads`, `post_header`, `post_content`, `post_url`, `post_tags`) VALUES
(1, '2021-03-08 01:20:45', 'urhoba', 'https://images2.alphacoders.com/902/thumb-1920-902946.png', 0, 'Deneme', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu', '3-8-2021/deneme.php', 'deneme'),
(2, '2021-03-10 01:20:45', 'urhoba', 'https://wallpapercave.com/wp/wp2675445.jpg', 0, 'Deneme1', 'ypesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu', '3-8-2021/deneme1.php', 'deneme');

-- --------------------------------------------------------

--
-- Table structure for table `ub_sites`
--

CREATE TABLE `ub_sites` (
  `ub_siteID` int(255) NOT NULL,
  `ub_siteName` text COLLATE utf8_bin NOT NULL,
  `ub_showedPostNumer` int(255) NOT NULL,
  `ub_siteURL` text COLLATE utf8_bin NOT NULL,
  `ub_siteBgColor` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'light',
  `ub_siteTextColor` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'light',
  `ub_siteButtonColor` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'light',
  `ub_socialButtonColor` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'light',
  `ub_backToTopButtonColor` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'light',
  `ub_siteNavColor` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'light',
  `ub_footerText` text COLLATE utf8_bin NOT NULL,
  `ub_footerCopyright` text COLLATE utf8_bin NOT NULL,
  `ub_mobileContainerCheck` bit(1) NOT NULL DEFAULT b'0',
  `ub_containerCheck` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ub_sites`
--

INSERT INTO `ub_sites` (`ub_siteID`, `ub_siteName`, `ub_showedPostNumer`, `ub_siteURL`, `ub_siteBgColor`, `ub_siteTextColor`, `ub_siteButtonColor`, `ub_socialButtonColor`, `ub_backToTopButtonColor`, `ub_siteNavColor`, `ub_footerText`, `ub_footerCopyright`, `ub_mobileContainerCheck`, `ub_containerCheck`) VALUES
(0, 'urhoba', 5, 'http://192.168.1.31/urhobablog/', 'secondary', 'white', 'secondary', 'light', 'warning', 'dark', 'Burası urhoba tarafından geliştirilmiş, html ve php karması bir blog sitesidir.', '  © 2020 Copyright:         <a class=\"text-white\" href=\"https://www.urhoba.net/\">UrhobA</a>', b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `ub_socialmedias`
--

CREATE TABLE `ub_socialmedias` (
  `ub_mediaId` int(255) NOT NULL,
  `ub_mediaName` text COLLATE utf8_bin NOT NULL,
  `ub_mediaLocation` text COLLATE utf8_bin NOT NULL,
  `ub_mediaURL` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ub_socialmedias`
--

INSERT INTO `ub_socialmedias` (`ub_mediaId`, `ub_mediaName`, `ub_mediaLocation`, `ub_mediaURL`) VALUES
(1, 'facebook', 'footer', 'https://www.facebook.com/ahmet.bohur.9/'),
(2, 'twitter', 'footer', 'https://twitter.com/urhoba'),
(3, 'linkedin', 'footer', 'https://www.linkedin.com/in/ahmetbohur/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ub_headermenu`
--
ALTER TABLE `ub_headermenu`
  ADD PRIMARY KEY (`ub_menuID`);

--
-- Indexes for table `ub_posts`
--
ALTER TABLE `ub_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `ub_sites`
--
ALTER TABLE `ub_sites`
  ADD PRIMARY KEY (`ub_siteID`);

--
-- Indexes for table `ub_socialmedias`
--
ALTER TABLE `ub_socialmedias`
  ADD PRIMARY KEY (`ub_mediaId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ub_headermenu`
--
ALTER TABLE `ub_headermenu`
  MODIFY `ub_menuID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ub_posts`
--
ALTER TABLE `ub_posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ub_socialmedias`
--
ALTER TABLE `ub_socialmedias`
  MODIFY `ub_mediaId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
