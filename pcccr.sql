-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 มี.ค. 2020 เมื่อ 09:47 AM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.11-MariaDB
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
-- Database: `pcccr`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `usr` text COLLATE utf8_unicode_ci NOT NULL,
  `pwd` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `usr`, `pwd`) VALUES
(1, '21232f297a57a5a743894a0e4a801fc3', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_category`
--

CREATE TABLE `tb_category` (
  `id` int(11) NOT NULL,
  `topic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_choice`
--

CREATE TABLE `tb_choice` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic` varchar(250) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0 = main , 1 = sub'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_choice_topic`
--

CREATE TABLE `tb_choice_topic` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL COMMENT '0 = main , 1 = sub'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_counter`
--

CREATE TABLE `tb_counter` (
  `id` int(11) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_course`
--

CREATE TABLE `tb_course` (
  `id` int(11) NOT NULL,
  `topic` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_download`
--

CREATE TABLE `tb_download` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `topic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_download_file`
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
-- โครงสร้างตาราง `tb_download_type`
--

CREATE TABLE `tb_download_type` (
  `id` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `no` int(11) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- dump ตาราง `tb_download_type`
--

INSERT INTO `tb_download_type` (`id`, `topic`, `no`, `status`) VALUES
(3, 'ประกาศโรงเรียนวิทยาศาสตร์จุฬาภรณราชวิทยาลัย เชียงราย', 3, 1),
(4, 'รายงานประจำปี', 2, 1),
(5, 'รายงานประจำเดือน', 1, 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_gallery`
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

--
-- dump ตาราง `tb_gallery`
--

INSERT INTO `tb_gallery` (`id`, `type`, `topic`, `detail`, `filename`, `postdate`, `pageview`) VALUES
(3, 1, 'aaaaaa', '', '1584347629.jpg', '2020-03-16', 0);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_gallery_images`
--

CREATE TABLE `tb_gallery_images` (
  `id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `tb_gallery_images`
--

INSERT INTO `tb_gallery_images` (`id`, `gallery_id`, `filename`) VALUES
(5, 3, '1584347521.jpg');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_gallery_type`
--

CREATE TABLE `tb_gallery_type` (
  `id` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_hotline`
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
-- โครงสร้างตาราง `tb_intro`
--

CREATE TABLE `tb_intro` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `tb_intro`
--

INSERT INTO `tb_intro` (`id`, `status`, `type`, `filename`) VALUES
(1, 0, 0, '');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_journal`
--

CREATE TABLE `tb_journal` (
  `id` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `pageview` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_main`
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
-- โครงสร้างตาราง `tb_news`
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
-- โครงสร้างตาราง `tb_news_type`
--

CREATE TABLE `tb_news_type` (
  `id` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- dump ตาราง `tb_news_type`
--

INSERT INTO `tb_news_type` (`id`, `topic`) VALUES
(1, 'ข่าวประชาสัมพันธ์');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_personnel`
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
-- โครงสร้างตาราง `tb_personnel_type`
--

CREATE TABLE `tb_personnel_type` (
  `id` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `row` int(11) NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_product`
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
-- โครงสร้างตาราง `tb_product_images`
--

CREATE TABLE `tb_product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_promotion`
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
-- โครงสร้างตาราง `tb_register`
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
-- โครงสร้างตาราง `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id` int(11) NOT NULL,
  `topic` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_tour`
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
-- โครงสร้างตาราง `tb_tour_images`
--

CREATE TABLE `tb_tour_images` (
  `id` int(11) NOT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tour_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_useronline`
--

CREATE TABLE `tb_useronline` (
  `timestamp` int(11) NOT NULL,
  `visitor` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `tb_useronline`
--

INSERT INTO `tb_useronline` (`timestamp`, `visitor`) VALUES
(1571278188, '::1');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_gallery_images`
--
ALTER TABLE `tb_gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_news_type`
--
ALTER TABLE `tb_news_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `tb_tour`
--
ALTER TABLE `tb_tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tour_images`
--
ALTER TABLE `tb_tour_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
