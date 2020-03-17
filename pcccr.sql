-- phpMyAdmin SQL Dump
<<<<<<< HEAD
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 มี.ค. 2020 เมื่อ 09:47 AM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.11-MariaDB
-- PHP Version: 7.4.1
=======
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 04:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcccr`
--

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_admin`
=======
-- Table structure for table `tb_admin`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `usr` text COLLATE utf8_unicode_ci NOT NULL,
  `pwd` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
<<<<<<< HEAD
-- dump ตาราง `tb_admin`
=======
-- Dumping data for table `tb_admin`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

INSERT INTO `tb_admin` (`id`, `usr`, `pwd`) VALUES
(1, '21232f297a57a5a743894a0e4a801fc3', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_category`
=======
-- Table structure for table `tb_category`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_category` (
  `id` int(11) NOT NULL,
  `topic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_choice`
=======
-- Table structure for table `tb_choice`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_choice` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic` varchar(250) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0 = main , 1 = sub'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_choice_topic`
=======
-- Table structure for table `tb_choice_topic`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_choice_topic` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL COMMENT '0 = main , 1 = sub'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_counter`
=======
-- Table structure for table `tb_counter`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_counter` (
  `id` int(11) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_course`
=======
-- Table structure for table `tb_course`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_course` (
  `id` int(11) NOT NULL,
  `topic` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_download`
=======
-- Table structure for table `tb_download`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_download` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `topic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_download_file`
=======
-- Table structure for table `tb_download_file`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_download_file` (
  `id` int(11) NOT NULL,
  `download_id` int(11) NOT NULL,
  `topic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_download_type`
=======
-- Table structure for table `tb_download_type`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_download_type` (
  `id` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `no` int(11) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
<<<<<<< HEAD
-- dump ตาราง `tb_download_type`
--

INSERT INTO `tb_download_type` (`id`, `topic`, `no`, `status`) VALUES
(3, 'ประกาศโรงเรียนวิทยาศาสตร์จุฬาภรณราชวิทยาลัย เชียงราย', 3, 1),
(4, 'รายงานประจำปี', 2, 1),
(5, 'รายงานประจำเดือน', 1, 1);
=======
-- Dumping data for table `tb_download_type`
--

INSERT INTO `tb_download_type` (`id`, `topic`, `no`, `status`) VALUES
(11, 'ประกาศโรงเรียนวิทยาศาสตร์จุฬาภรณราชวิทยาลัย เชียงราย', 3, 1),
(13, 'รายงานประจำเดือน', 1, 1),
(12, 'รายงานประจำปี', 2, 1);
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_gallery`
=======
-- Table structure for table `tb_egp`
--

CREATE TABLE `tb_egp` (
  `id` int(11) NOT NULL,
  `topic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `egp_id` text COLLATE utf8_unicode_ci NOT NULL,
  `a_type` int(11) NOT NULL,
  `m_type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gallery`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_gallery` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `topic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `postdate` date NOT NULL,
  `pageview` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

<<<<<<< HEAD
--
-- dump ตาราง `tb_gallery`
--

INSERT INTO `tb_gallery` (`id`, `type`, `topic`, `detail`, `filename`, `postdate`, `pageview`) VALUES
(3, 1, 'aaaaaa', '', '1584347629.jpg', '2020-03-16', 0);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_gallery_images`
=======
-- --------------------------------------------------------

--
-- Table structure for table `tb_gallery_images`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_gallery_images` (
  `id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

<<<<<<< HEAD
--
-- dump ตาราง `tb_gallery_images`
--

INSERT INTO `tb_gallery_images` (`id`, `gallery_id`, `filename`) VALUES
(5, 3, '1584347521.jpg');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_gallery_type`
=======
-- --------------------------------------------------------

--
-- Table structure for table `tb_gallery_type`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_gallery_type` (
  `id` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_hotline`
=======
-- Table structure for table `tb_hotline`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_hotline` (
  `id` int(11) NOT NULL,
  `hl_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `topic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `other` text COLLATE utf8_unicode_ci NOT NULL,
  `filename` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `postdate` date NOT NULL,
  `ip` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_intro`
=======
-- Table structure for table `tb_intro`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_intro` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
<<<<<<< HEAD
-- dump ตาราง `tb_intro`
=======
-- Dumping data for table `tb_intro`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

INSERT INTO `tb_intro` (`id`, `status`, `type`, `filename`) VALUES
(1, 0, 0, '');

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_journal`
=======
-- Table structure for table `tb_journal`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_journal` (
  `id` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `pageview` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_main`
=======
-- Table structure for table `tb_main`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_main` (
  `id` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `detail` text NOT NULL,
  `pageview` int(11) NOT NULL,
  `postdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_news`
=======
-- Table structure for table `tb_news`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_news` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `topic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `postdate` date NOT NULL,
  `pageview` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_news_type`
=======
-- Table structure for table `tb_news_type`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_news_type` (
  `id` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

<<<<<<< HEAD
--
-- dump ตาราง `tb_news_type`
--

INSERT INTO `tb_news_type` (`id`, `topic`) VALUES
(1, 'ข่าวประชาสัมพันธ์');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_personnel`
=======
-- --------------------------------------------------------

--
-- Table structure for table `tb_personnel`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_personnel` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `topic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_personnel_type`
=======
-- Table structure for table `tb_personnel_type`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_personnel_type` (
  `id` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `row` int(11) NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_product`
=======
-- Table structure for table `tb_product`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_product` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `topic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `filename` text COLLATE utf8_unicode_ci NOT NULL,
  `postdate` date NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_product_images`
=======
-- Table structure for table `tb_product_images`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_promotion`
=======
-- Table structure for table `tb_promotion`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_promotion` (
  `id` int(11) NOT NULL,
  `topic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `postdate` date NOT NULL,
  `end_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_register`
=======
-- Table structure for table `tb_register`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_register` (
  `id` int(11) NOT NULL,
  `id_card_type` int(11) NOT NULL,
  `id_card` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `tel` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `age` int(3) NOT NULL,
  `race` text COLLATE utf8_unicode_ci NOT NULL,
  `nationality` text COLLATE utf8_unicode_ci NOT NULL,
  `country` text COLLATE utf8_unicode_ci NOT NULL,
  `religion` text COLLATE utf8_unicode_ci NOT NULL,
  `tribe` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `edu` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `name_parent` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nickname_parent` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `address_parent` text COLLATE utf8_unicode_ci NOT NULL,
  `name_work` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `address_work` text COLLATE utf8_unicode_ci NOT NULL,
  `tel_parent` text COLLATE utf8_unicode_ci NOT NULL,
  `line_parent` text COLLATE utf8_unicode_ci NOT NULL,
  `email_parent` text COLLATE utf8_unicode_ci NOT NULL,
  `cd` text COLLATE utf8_unicode_ci NOT NULL,
  `insure` text COLLATE utf8_unicode_ci NOT NULL,
  `course` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_slider`
=======
-- Table structure for table `tb_slider`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_slider` (
  `id` int(11) NOT NULL,
  `topic` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_tour`
=======
-- Table structure for table `tb_structure`
--

CREATE TABLE `tb_structure` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tour`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_tour` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `topic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `download` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `postdate` date NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_tour_images`
=======
-- Table structure for table `tb_tour_images`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_tour_images` (
  `id` int(11) NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tour_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- โครงสร้างตาราง `tb_useronline`
=======
-- Table structure for table `tb_useronline`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

CREATE TABLE `tb_useronline` (
  `timestamp` int(11) NOT NULL,
  `visitor` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
<<<<<<< HEAD
-- dump ตาราง `tb_useronline`
=======
-- Dumping data for table `tb_useronline`
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--

INSERT INTO `tb_useronline` (`timestamp`, `visitor`) VALUES
(1571278188, '::1');

<<<<<<< HEAD
=======
-- --------------------------------------------------------

--
-- Table structure for table `tb_vote`
--

CREATE TABLE `tb_vote` (
  `id` int(11) NOT NULL,
  `vote_id` int(11) NOT NULL,
  `postdate` date NOT NULL,
  `ip` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_choice`
--
ALTER TABLE `tb_choice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_choice_topic`
--
ALTER TABLE `tb_choice_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_counter`
--
ALTER TABLE `tb_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_course`
--
ALTER TABLE `tb_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_download`
--
ALTER TABLE `tb_download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_download_file`
--
ALTER TABLE `tb_download_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_download_type`
--
ALTER TABLE `tb_download_type`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
=======
-- Indexes for table `tb_egp`
--
ALTER TABLE `tb_egp`
  ADD PRIMARY KEY (`id`);

--
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
-- Indexes for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gallery_images`
--
ALTER TABLE `tb_gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gallery_type`
--
ALTER TABLE `tb_gallery_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_hotline`
--
ALTER TABLE `tb_hotline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_intro`
--
ALTER TABLE `tb_intro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_journal`
--
ALTER TABLE `tb_journal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_main`
--
ALTER TABLE `tb_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_news_type`
--
ALTER TABLE `tb_news_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_personnel`
--
ALTER TABLE `tb_personnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_personnel_type`
--
ALTER TABLE `tb_personnel_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product_images`
--
ALTER TABLE `tb_product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_promotion`
--
ALTER TABLE `tb_promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_register`
--
ALTER TABLE `tb_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
=======
-- Indexes for table `tb_structure`
--
ALTER TABLE `tb_structure`
  ADD PRIMARY KEY (`id`);

--
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
-- Indexes for table `tb_tour`
--
ALTER TABLE `tb_tour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tour_images`
--
ALTER TABLE `tb_tour_images`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
=======
-- Indexes for table `tb_vote`
--
ALTER TABLE `tb_vote`
  ADD PRIMARY KEY (`id`);

--
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_choice`
--
ALTER TABLE `tb_choice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_choice_topic`
--
ALTER TABLE `tb_choice_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_counter`
--
ALTER TABLE `tb_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_course`
--
ALTER TABLE `tb_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_download`
--
ALTER TABLE `tb_download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_download_file`
--
ALTER TABLE `tb_download_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_download_type`
--
ALTER TABLE `tb_download_type`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_egp`
--
ALTER TABLE `tb_egp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970

--
-- AUTO_INCREMENT for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970

--
-- AUTO_INCREMENT for table `tb_gallery_images`
--
ALTER TABLE `tb_gallery_images`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970

--
-- AUTO_INCREMENT for table `tb_gallery_type`
--
ALTER TABLE `tb_gallery_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_hotline`
--
ALTER TABLE `tb_hotline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_intro`
--
ALTER TABLE `tb_intro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_journal`
--
ALTER TABLE `tb_journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_main`
--
ALTER TABLE `tb_main`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970

--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_news_type`
--
ALTER TABLE `tb_news_type`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970

--
-- AUTO_INCREMENT for table `tb_personnel`
--
ALTER TABLE `tb_personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_personnel_type`
--
ALTER TABLE `tb_personnel_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_product_images`
--
ALTER TABLE `tb_product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_promotion`
--
ALTER TABLE `tb_promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_register`
--
ALTER TABLE `tb_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
<<<<<<< HEAD
=======
-- AUTO_INCREMENT for table `tb_structure`
--
ALTER TABLE `tb_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
-- AUTO_INCREMENT for table `tb_tour`
--
ALTER TABLE `tb_tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tour_images`
--
ALTER TABLE `tb_tour_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
<<<<<<< HEAD
=======

--
-- AUTO_INCREMENT for table `tb_vote`
--
ALTER TABLE `tb_vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
>>>>>>> 790ab742d5c92698aa2c7c7467ebb1f788972970
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
