-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2016 at 02:47 AM
-- Server version: 5.5.28
-- PHP Version: 5.3.24

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xncfblzdfe_at`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_title` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` text COLLATE utf8_unicode_ci NOT NULL,
  `google_map` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_descriptions` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contact_title`, `contact_detail`, `meta_title`, `google_map`, `meta_keywords`, `meta_descriptions`, `created_at`, `updated_at`) VALUES
(1, 'Contact Amazing private tour', '<p>Amazing Trekking Tour</p>\r\n<p>Putthipong&nbsp; Nalong (KALU)</p>\r\n<p>195 Village No. 3, Phadeng village, Maemalai-Pai Road, Pha Pae Sub-district, Maetang District,</p>\r\n<p>Chiang Mai&nbsp; THAILAND&nbsp; 50150</p>\r\n<p>Second address in city:</p>\r\n<p>110&nbsp; Maung Sart Road, Nong Huai Sub-district, Maung District, Chiang Mai&nbsp; THAILAND 50000</p>\r\n<p><span>&ldquo; We pick up you from Airport, Train, Bus, sent you to your hotel book for free!&rdquo;</span></p>', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4504.214856485973!2d99.3155860062478!3d18.320891201362564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x14d68320669d2e81!2z4LiX4Li14LmI4Lin4LmI4Liy4LiB4Liy4Lij4Lit4Liz4LmA4Lig4Lit4Lir4LmJ4Liy4LiH4LiJ4Lix4LiV4Lij!5e0!3m2!1sth!2sth!4v1453700561623" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>', '', '', '0000-00-00 00:00:00', '2016-03-16 19:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

CREATE TABLE IF NOT EXISTS `contact_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txt_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `txt_email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `txt_tel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `txt_subject` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `txt_message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('อ่านแล้ว','ยังไม่ได้อ่าน') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ยังไม่ได้อ่าน',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact_message`
--

INSERT INTO `contact_message` (`id`, `txt_name`, `txt_email`, `txt_tel`, `txt_subject`, `txt_message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'nitikarnboom2030@gmail.com', 'nitikarnboom2030@gmail.com', '+66881545990', 'ads', 'ddddddddddd', 'อ่านแล้ว', '2016-03-17 02:13:41', '2016-03-17 02:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('ใช้งาน','ปิดใช้งาน') COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(4) NOT NULL,
  `alt` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `image`, `status`, `sort`, `alt`, `created_at`, `updated_at`) VALUES
(3, 'asd', '2016031613492860161.jpg', 'ใช้งาน', 1, '', '2016-03-16 13:49:28', '2016-03-17 01:48:05'),
(4, 'ภาพ2', '2016031701474687826.jpg', 'ใช้งาน', 2, '222', '2016-03-17 01:47:46', '2016-03-17 01:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE IF NOT EXISTS `guestbook` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `comment` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `comment_show_home` enum('on','off') NOT NULL DEFAULT 'off',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`id`, `name`, `title`, `comment`, `image`, `comment_show_home`, `created_at`, `updated_at`, `email`) VALUES
(23, 'Tomas and Jne', 'Good Experience', 'Our business is a small, employee-owned and operated trekking company. Our goal is to provide an experience', '20160316180032_imgreview1.jpg', 'on', '2016-03-16 14:40:18', '2016-03-17 01:45:29', 'nitikarnboom2030@gmail.com'),
(27, 'Tomas and Jne', 'Good Experience', 'Our business is a small, employee-owned and operated trekking company. Our goal is to provide an experience', '20160316180027_imgreview1.jpg', 'on', '2016-03-16 17:24:09', '2016-03-17 01:45:23', 'nitikarnboom2030@gmail.com'),
(28, 'Tomas and Jne', 'Good Experience', 'Our business is a small, employee-owned and operated trekking company. Our goal is to provide an experience', '20160316180021_imgreview1.jpg', 'on', '2016-03-16 17:37:17', '2016-03-17 01:45:20', 'nitikarnboom2030@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE IF NOT EXISTS `home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `home_title` text COLLATE utf8_unicode_ci NOT NULL,
  `home_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `home_shortdetail` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_descriptions` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `home_title`, `home_detail`, `home_shortdetail`, `meta_title`, `meta_descriptions`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'This Amazing private tour', '<p>Our business is a small, employee-owned and operated trekking company. Our goal is to provide an experience of the highest quality and standard, giving you the absolute best value for your money.</p>\r\n<p>We take immense pleasure and pride in trekking the path less traveled by. Our path takes through the jungle to swim under picturesque waterfalls, soak in tranquil hot springs, dine sleep in the peaceful villages of the Karen and Lahu tribes, bamboo raft down gentle river interact with majestic elephants, and even visit an orchid</p>', '<p>Our business is a small, employee-owned and operated trekking company. Our goal is to provide an experience of the highest quality and standard, giving you the absolute best value for your money.</p>', '', '', '', '2015-04-16 00:00:00', '2016-03-16 19:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_title` varchar(200) NOT NULL,
  `location_detail` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=tis620 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location_title`, `location_detail`, `created_at`, `updated_at`) VALUES
(1, 'About Amazing private tour', '<p>My name is Kalu,&nbsp; I was born in a small Lahu hill tribe village north of Chiang Mai.&nbsp; I have a big family, many of whom have been involved in the trekking tourism industry for more than 30 years. I graduated from University in Bangkok with a major in tourism.</p>\r\n<p>I want to offer you the real experience of the jungle hill tribes, including taking you to my very own home village, and share the experience of their culture, language, food, and hospitality with you!</p>\r\n<p>I&rsquo;m an experienced jungle guide who will be taking you through my own backyard, literally! I will guide and take you through the dense jungle rainforest, up to a mountain viewpoint to see the jungle and landscape from a bird&rsquo;s eye view, and most of all, I hope to provide you with a unforgettable life experience and treasured memory of life in the jungle, and build a friendship with my own family and friends that you will keep forever.</p>', '2016-01-30 23:44:55', '2016-03-16 21:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `detail` text NOT NULL,
  `status` enum('ใช้งาน','ปิดใช้งาน') NOT NULL,
  `sort` int(4) NOT NULL,
  `name_ref` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=tis620 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`, `detail`, `status`, `sort`, `name_ref`, `created_at`, `updated_at`) VALUES
(1, '3 day 2 night Trekking', '<p>Fist Day</p>\r\n<p>08:00 am. We pick up your hotel then one hour drive up to northern Chiang Mai to Mae Malai Market.</p>\r\n<p>09.00 am. Stop at the local market</p>\r\n<p>10:00 am. Drive up to belong Pai Road to Mork Fa waterfall.</p>\r\n<p>10.30 am. Swimming at the Mork Fa waterfall&nbsp;</p>\r\n<p>11.30 am. Drive steep up to hot spring</p>\r\n<p>12.00 am. Have lunch at Pong Duead hot spring</p>\r\n<p>13.30 pm. Start walk through real Jungle to Karen tribe&rsquo;s village about 3 hr.</p>\r\n<p>17.00 pm. Spend the night with Karen tribe&rsquo;s family</p>\r\n<p>&nbsp;</p>\r\n<p>Second day</p>\r\n<p>09.00 am. We trek again from Karen village to Elephant Camp about 3 hour.</p>\r\n<p>12.00 am. Have lunch at elephant camp</p>\r\n<p>13.00 am. Stay with Elephant, enjoy the elephant riding for 1 hour</p>\r\n<p>15.00 am. Take bamboo rafting 30 minute along river to Lahu Village.</p>\r\n<p>&nbsp;</p>\r\n<p>Third day</p>\r\n<p>10.00 am. We start bamboo raft from Lahu tribe&rsquo;s village along the river to Shan village about 2 hr.</p>\r\n<p>&nbsp;12.00 am. Lunch.</p>\r\n<p>13.00 am. We get on our truck back to Mae Rim district</p>\r\n<p>14.00 am. Stop for see orchid and butterfly then continue back to Chiang Mai. (Arrive Chiang Mai around 4 pm.)</p>\r\n<p>&nbsp;</p>\r\n<p>What should you bring for trekking ?</p>\r\n<p>P Backpack&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; P Short pants&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; P Long pants&nbsp; &nbsp; P Pullover&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<p>P T &ndash; Shirt&nbsp; &nbsp; P Towel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; P Swimming Suit&nbsp; &nbsp; P Shoes&nbsp;</p>\r\n<p>P Raincoat (Rain season Jun &ndash; October) &nbsp; P Hat (for summer December &ndash; May)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<p>P Flash Light&nbsp; &nbsp; P Toiletries paper&nbsp; P Insect spray&nbsp; &nbsp; P Sun cream</p>\r\n<p>P Personal medicine&nbsp; &nbsp; P Soap, shampoo, Toothbrush&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;&nbsp;<span>Trip includes</span></p>\r\n<p>&nbsp; &nbsp; PTransportation</p>\r\n<p>&nbsp; PAccommodation</p>\r\n<p>&nbsp; PWaterfall</p>\r\n<p>&nbsp; PHot spring</p>\r\n<p>&nbsp; PElephant ridding</p>\r\n<p>&nbsp; PBamboo Rafting</p>\r\n<p>&nbsp; PSeven meals on trek</p>\r\n<p>&nbsp; PInsurance accident&nbsp;</p>\r\n<p>&nbsp; PNational park entrant</p>\r\n<h2>3 day 2 night half survival trip</h2>\r\n<p>First day</p>\r\n<p>08:00 am. We pick up your hotel then one hour drive up to northern of Chiang Mai to Mae Malai Market. Where we can see local food and get our supply for 3 day in the Jungle.</p>\r\n<p>10:00 am. Drive up to belong Pai Road to Mork Fa waterfall. One of the big waterfall with high strong powerful current of the water and the fresh spray against you face. Swimming under drove of the water.</p>\r\n<p>&nbsp; After swimming, continue to drive steep up to hot spring with heat water by the nature.</p>\r\n<p>14:30 pm. Start walk through real Jungle, soon you will see many bamboo types, wild bananas and the cool breeze of the ever green forest. Overlook view as the bird&rsquo;s flying in the sky. About 2 hours</p>\r\n<p>16.30 pm. Spend the night in deep jungle with tent, where we will learn&nbsp; how to live with bamboo? and how&nbsp; to cook in bamboo?.</p>\r\n<p>Second day</p>\r\n<p>10.00 am after we page our back&nbsp; we trek again from jungle to Elephant Camp about 3 hr.</p>\r\n<p>12.00 am. Stay with Elephant, feed them and learn some skill of the Elephant control.</p>\r\n<p>&nbsp; After lunch, enjoy the elephant riding for 1 hr, then boarding on the bamboo rafting 30 minute along river to Lahu Village.</p>\r\n<p>Third day</p>\r\n<p>&nbsp; We start bamboo raft from Lahu tribe&rsquo;s village along the river to Shan village then break for lunch.</p>\r\n<p>&nbsp;</p>\r\n<p>After big lunch we get on our truck back to Mae Rim district for see elephant&nbsp; dung paper (how to&nbsp; make paper from elephant poop ) then continue back to Chiang Mai. (Arrive Chiang Mai around 5 pm.)</p>', 'ใช้งาน', 1, '3-day-2-night-trekking', '2016-03-15 00:23:55', '2016-03-16 19:31:58'),
(2, '3 day 2 night half survival trip', '<p>First day</p>\r\n<p>08:00 am. We pick up your hotel then one hour drive up to northern of Chiang Mai to Mae Malai Market. Where we can see local food and get our supply for 3 day in the Jungle.</p>\r\n<p>10:00 am. Drive up to belong Pai Road to Mork Fa waterfall. One of the big waterfall with high strong powerful current of the water and the fresh spray against you face. Swimming under drove of the water.</p>\r\n<p>&nbsp; After swimming, continue to drive steep up to hot spring with heat water by the nature.</p>\r\n<p>14:30 pm. Start walk through real Jungle, soon you will see many bamboo types, wild bananas and the cool breeze of the ever green forest. Overlook view as the bird&rsquo;s flying in the sky. About 2 hours</p>\r\n<p>16.30 pm. Spend the night in deep jungle with tent, where we will learn&nbsp; how to live with bamboo? and how&nbsp; to cook in bamboo?.</p>\r\n<p>Second day</p>\r\n<p>10.00 am after we page our back&nbsp; we trek again from jungle to Elephant Camp about 3 hr.</p>\r\n<p>12.00 am. Stay with Elephant, feed them and learn some skill of the Elephant control.</p>\r\n<p>&nbsp; After lunch, enjoy the elephant riding for 1 hr, then boarding on the bamboo rafting 30 minute along river to Lahu Village.</p>\r\n<p>Third day</p>\r\n<p>&nbsp; We start bamboo raft from Lahu tribe&rsquo;s village along the river to Shan village then break for lunch.</p>\r\n<p><span>&nbsp;</span></p>\r\n<p>After big lunch we get on our truck back to Mae Rim district for see elephant&nbsp; dung paper (how to&nbsp; make paper from elephant poop ) then continue back to Chiang Mai. (Arrive Chiang Mai around 5 pm.)</p>', 'ใช้งาน', 2, '3-day-2-night-half-survival-trip', '2016-03-16 19:31:14', '2016-03-16 19:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE IF NOT EXISTS `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slides_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `alt_tag` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(5) NOT NULL DEFAULT '0',
  `status` enum('ใช้งาน','ปิดใช้งาน') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `slides_name`, `alt_tag`, `sort`, `status`, `created_at`, `updated_at`) VALUES
(21, '1', '', 1, 'ใช้งาน', '2015-11-26 17:33:01', '2016-03-17 02:00:05'),
(28, '2', '22', 2, 'ใช้งาน', '2016-02-07 01:40:09', '2016-03-15 13:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `slide_files`
--

CREATE TABLE IF NOT EXISTS `slide_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slides_id` int(11) NOT NULL,
  `file_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `alt_tag` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=68 ;

--
-- Dumping data for table `slide_files`
--

INSERT INTO `slide_files` (`id`, `slides_id`, `file_name`, `alt_tag`) VALUES
(55, 20, '201511261732406429.jpg', ''),
(56, 21, '2015112617330166666.jpg', ''),
(57, 22, '2015112617340497860.jpg', ''),
(58, 23, '201511261736547087.png', ''),
(59, 21, '2016010915440868326.jpg', ''),
(60, 24, '2016010922214223299.jpg', ''),
(61, 25, '2016011122272444476.jpg', ''),
(62, 26, '2016011201044743328.jpg', '22'),
(63, 21, '2016020103173976128.jpg', ''),
(64, 27, '2016020117565367731.jpg', ''),
(65, 28, '2016020701400936432.jpg', '22'),
(66, 21, '2016031513372646820.jpg', '226'),
(67, 28, '2016031513374175769.jpg', '22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_groups_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash_key` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `idcard` varchar(13) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `province_id` int(11) NOT NULL,
  `postcode` int(5) NOT NULL,
  `status` enum('ใช้งาน','ปิดใช้งาน') NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_groups_id`, `username`, `password`, `hash_key`, `name`, `idcard`, `email`, `tel`, `address`, `province_id`, `postcode`, `status`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=', '', '', '', '', '', '', 0, 0, '', '0000-00-00 00:00:00', '2014-02-09 15:39:33', '2016-03-16 21:52:24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
