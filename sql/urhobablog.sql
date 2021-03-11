-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2021 at 02:43 AM
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
-- Table structure for table `ub_404`
--

CREATE TABLE `ub_404` (
  `dd_id` int(255) NOT NULL,
  `dd_header` text COLLATE utf8_bin NOT NULL,
  `dd_content` text COLLATE utf8_bin NOT NULL,
  `dd_image` text COLLATE utf8_bin NOT NULL,
  `dd_buttonColor` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'light'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ub_404`
--

INSERT INTO `ub_404` (`dd_id`, `dd_header`, `dd_content`, `dd_image`, `dd_buttonColor`) VALUES
(1, '404 Sayfa Bulunamadı.', 'Aradığınız sayfa bulunamadı, sanırım aradığınız sayfa kayboldu neden ana sayfaya gitmiyor veya arama çubuğunu kullanmıyorsunuz?', '/images/404/404.webp', 'warning');

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
(1, 'Anasayfa', '/', 0),
(2, 'Urhoba', 'https://www.urhoba.net', 0),
(3, 'İletişim', 'https://www.urhoba.net', 0),
(4, 'Urhoba İletişim', 'https://www.urhoba.net', 2),
(5, 'Urhoba Deneme', 'https://www.urhoba.net', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ub_nopostshow`
--

CREATE TABLE `ub_nopostshow` (
  `dd_id` int(255) NOT NULL,
  `dd_header` text COLLATE utf8_bin NOT NULL,
  `dd_content` text COLLATE utf8_bin NOT NULL,
  `dd_image` text COLLATE utf8_bin NOT NULL,
  `dd_buttonColor` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'light'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ub_nopostshow`
--

INSERT INTO `ub_nopostshow` (`dd_id`, `dd_header`, `dd_content`, `dd_image`, `dd_buttonColor`) VALUES
(1, 'Hiç Bir Gönderi Bulunamadı!', 'Şimdiye kadar hiçbir gönderi paylaşılmamış özür dileriz.', '/images/404/404.webp', 'warning');

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
(4, '2021-03-11 01:18:30', 'urhoba', 'https://wallpapercave.com/wp/wp2928790.jpg', 0, 'AC Yeni Oyunu Duyuruldu', 'Ubisoft’un yeni Assassin’s Creed oyunu Valhalla duyuruldu. İskandinav mitolojisi ve Viking temalı olacak oyunun prömiyer fragmanı 30 Nisan’da yayınlanacak. Muhtemelen Vikingler ile kıta avrupası arasındaki savaşı anlatacak oyunun detayları yarından itibaren Ubisoft tarafından açıklanacak.\r\n\r\n8 saatlik yayında oyunun görseli tasarlandı\r\nUbisoft, sosyal medya hesapları ve Twitch üzerinden yaptığı 8 saatlik canlı yayında Bosslogic adlı dijital tasarımcının Valhalla tasarımını yayınladı. Tasarım oyunun 2 farklı bölgede geçeceğini ve bu bölgelerden birinin İskandinavya bölgesi olacağını açığa çıkardı. Ana karakterimiz ise bir Viking olacak ama ikinci karakterin olup olmayacağı bilinmiyor. Assassin’s Creed Valhalla oyununun çıkış tarihi ise daha açıklanmadı.', '2021-03-10-ac-yeni-oyunu-duyuruldu/', 'ac'),
(5, '2021-03-11 01:18:30', 'urhoba', 'https://wallpaperaccess.com/full/196841.jpg', 0, 'En İyi Roblox Oyunları', 'Roblox adlı sınırsız dünyanın bir çok oyunundan en iyilerini sizin için seçtik. Bu oyunlar yüz binlerce oyuncu tarafından oynanıyor. Bu oyunun içerisinde milyonlarca farklı oyun bulunuyor. Bu oyunları “creator” olarak bilinen oyun yapımcıları yapıyor. Roblox’u Android telefon ve tabletlerde, iPhone, iPad ve bilgisayarda oynayabilirsiniz.\r\n\r\nRoblox Murder Mystery 2\r\n\r\nMurder Mystery 2 (Katil Kim)\r\nListemizin ilk sırasında “Katil kim?” oyunu var. Garry’s Mod’daki Murder modunun benzeri olan bu modda, birisi katil oluyor diğerleri ise ondan kaçıyor. Masumlardan birinde silah oluyor ve o kişi Şerif seçiliyor. Şerif, isterse oyuncuları vurabiliyor. Eğer masum oyuncuları vurursa kaybediyor, katili vurursa oyunu kazanıyor. Oyunda katil seçilme şansınız Robux ile arttırılabiliyor.', '2021-03-10-en-iyi-roblox-oyunlari', 'ac');

-- --------------------------------------------------------

--
-- Table structure for table `ub_s404`
--

CREATE TABLE `ub_s404` (
  `dd_id` int(255) NOT NULL,
  `dd_header` text COLLATE utf8_bin NOT NULL,
  `dd_content` text COLLATE utf8_bin NOT NULL,
  `dd_image` text COLLATE utf8_bin NOT NULL,
  `dd_buttonColor` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'light'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ub_s404`
--

INSERT INTO `ub_s404` (`dd_id`, `dd_header`, `dd_content`, `dd_image`, `dd_buttonColor`) VALUES
(1, 'Özür Dileriz.', 'Aradığınız şeyi sayfamızda bulamadığınız için özür dileriz.', '/images/404/404.webp', 'warning');

-- --------------------------------------------------------

--
-- Table structure for table `ub_sites`
--

CREATE TABLE `ub_sites` (
  `ub_siteID` int(255) NOT NULL,
  `ub_siteName` text COLLATE utf8_bin NOT NULL,
  `ub_showedPostNumer` int(255) NOT NULL,
  `ub_populerPostCount` int(1) NOT NULL DEFAULT '1',
  `ub_populerPostButtonColor` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'light',
  `ub_siteURL` text COLLATE utf8_bin NOT NULL,
  `ub_siteBgColor` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'light',
  `ub_siteTextColor` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'light',
  `ub_siteLinkColor` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'dark',
  `ub_searchImage` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '/images/search/search.jpg',
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

INSERT INTO `ub_sites` (`ub_siteID`, `ub_siteName`, `ub_showedPostNumer`, `ub_populerPostCount`, `ub_populerPostButtonColor`, `ub_siteURL`, `ub_siteBgColor`, `ub_siteTextColor`, `ub_siteLinkColor`, `ub_searchImage`, `ub_siteButtonColor`, `ub_socialButtonColor`, `ub_backToTopButtonColor`, `ub_siteNavColor`, `ub_footerText`, `ub_footerCopyright`, `ub_mobileContainerCheck`, `ub_containerCheck`) VALUES
(0, 'urhoba', 6, 2, 'dark', 'http://192.168.1.31/', 'secondary', 'white', 'light', '/images/search/search.jpg', 'secondary', 'light', 'warning', 'dark', 'Burası urhoba tarafından geliştirilmiş, html ve php karması bir blog sitesidir.', '  © 2020 Copyright:         <a class=\"text-white\" href=\"https://www.urhoba.net/\">UrhobA</a>', b'0', b'1');

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
-- Indexes for table `ub_404`
--
ALTER TABLE `ub_404`
  ADD PRIMARY KEY (`dd_id`);

--
-- Indexes for table `ub_headermenu`
--
ALTER TABLE `ub_headermenu`
  ADD PRIMARY KEY (`ub_menuID`);

--
-- Indexes for table `ub_nopostshow`
--
ALTER TABLE `ub_nopostshow`
  ADD PRIMARY KEY (`dd_id`);

--
-- Indexes for table `ub_posts`
--
ALTER TABLE `ub_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `ub_s404`
--
ALTER TABLE `ub_s404`
  ADD PRIMARY KEY (`dd_id`);

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
-- AUTO_INCREMENT for table `ub_404`
--
ALTER TABLE `ub_404`
  MODIFY `dd_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ub_headermenu`
--
ALTER TABLE `ub_headermenu`
  MODIFY `ub_menuID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ub_nopostshow`
--
ALTER TABLE `ub_nopostshow`
  MODIFY `dd_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ub_posts`
--
ALTER TABLE `ub_posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ub_s404`
--
ALTER TABLE `ub_s404`
  MODIFY `dd_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ub_socialmedias`
--
ALTER TABLE `ub_socialmedias`
  MODIFY `ub_mediaId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
