-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20 มี.ค. 2020 เมื่อ 04:32 AM
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
(1, '21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3');

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
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `no` int(11) NOT NULL,
  `target` int(11) NOT NULL
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
  `selected` int(11) NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
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
(6, 2, 'ติดตามข้อมูลความจำเป็นพื้นฐาน', '<p>คณะผู้บริหารและคณะครูโรงเรียนวิทยาศาสตร์จุฬาภรณราชวิทยาลัย เชียงราย ได้ให้การต้อนรับ ท่าน ดร.สมศักดิ์ ดลประสิทธิ์ รองเลขาธิการสภาการศึกษา และคณะ ที่ได้มาติดตามข้อมูลความจำเป็นพื้นฐานในการจัดการศึกษาของโรงเรียนที่มีบริบทแตกต่างกัน ในวันที่ 17 มิถุนายน 2562 ณ ห้องประชุมจุฬาภรณ์ฯ 2 เพื่อติดตามข้อมูลด้านกิจกรรมการเรียนการสอนและงบประมาณของโรงเรียน</p>', '1584510873.jpg', '2020-03-18', 0),
(7, 2, 'โครงการชุมชนปลอดลูกน้ำยุงลาย', '<p><dd>คณะครูและบุคลากรโรงเรียนวิทยาศาสตร์จุฬาภรณราชวิทยาลัย เชียงราย ได้เข้าร่วมโครงการชุมชนปลอดลูกน้ำยุงลาย ปีงบประมาณ 2562 (วันไข้เลือดออกอาเซียน) ในวันที่ 14 มิถุนายน 2562 ณ ห้องประชุมพวงแสด 1 องค์การบริหารส่วนตำบลรอบเวียง อ.เมือง จ.เชียงราย โดยมีกิจกรรมพิธีลงนามบันทึกข้อตกลงโครงการชุมชนปลอดลูกน้ำยุงลาย กิจกรรมเดินรณรงค์ ประชาสัมพันธ์วันไข้เลือดออกอาเซียน ประจำปี 2562 และมอบทรายอะเบทให้กับโรงเรียน เพื่อเป็นการป้องกันและควบคุมการแพร่ระบาดของโรคไข้เลือดออกในพื้นที่และชุมชนต่อไป</p>', '1584511017.jpg', '2020-03-18', 0),
(8, 2, 'ต้นแบบจัดการเรียนการสอนประวัติศาสตร์', '<p>&nbsp; &nbsp; &nbsp; &nbsp; โรงเรียนวิทยาศาสตร์จุฬาภรณราชวิทยาลัย เชียงราย ซึ่งเป็นต้นแบบจัดการเรียนการสอนประวัติศาสตร์ ได้จัดโครงการพัฒนาการจัดการเรียนรู้ประวัติศาสตร์ &ldquo;เสริมสร้างอุดมการณ์ความรักชาติ ผ่านการเรียนรู้ประวัติศาสตร์ชาติไทย&rdquo; ในวันที่ 14 มิถุนายน 2562 ณ หอประชุมแคแสด โรงเรียนวิทยาศาสตร์จุฬาภรณราชวิทยาลัย เชียงราย เพื่อให้คณะครู บุคลากรทางการศึกษา และนักเรียน จะได้ร่วมแสดงความจงรักภักดี และจัดกิจกรรมที่มุ่งเน้นการเรียนรู้เกี่ยวกับประวัติศาสตร์ชาติไทย พระมหากรุณาธิคุณแห่งพระมหากษัตริย์ไทย การใช้ทักษะการคิดวิเคราะห์ผ่านกิจกรรมการเรียนรู้ประวัติศาสตร์ นำไปสู่การสร้างสำนึกในความเป็นไทยและได้แสดงออกถึงความจงรักภักดีต่อสถาบันพระมหากษัตริย์ โดยได้รับความอนุเคราะห์วิทยากรจากกองพลทหารราบที่ 7 จังหวัดเชียงใหม่ (ขุนศึก 32) ซึ่งมีคณะผู้บริหาร คณะครู นักเรียนระดับมัธยมศึกษาปีที่ 3 จากโรงเรียนสังกัดสหวิทยาเขตริมกก จำนวน 270 คน เข้าร่วมกิจกรรมในครั้งนี้</p>', '1584514847.jpg', '2020-03-18', 0),
(9, 1, 'การแข่งขันตอบคำถามสารานุกรมไทยสำหรับเยาวชนฯ ครั้งที่ 25 ระดับจังหวัด', '<p><strong>การแข่งขันตอบคำถามสารานุกรมไทยสำหรับเยาวชนฯ ครั้งที่ 25 ระดับจังหวัด วันที่ 24 สิงหาคม 2562 ณ โรงเรียนสามัคคีวิทยาคม จังหวัดเชียงราย</strong></p>\r\n<p><strong>ขอแสดงความยินดีกับนักเรียนได้เข้ารอบไปแข่งขันต่อในระดับภาค</strong></p>', '1584672637.jpg', '2020-03-20', 0),
(10, 1, ' การแข่งขันตอบคำถามสารานุกรมไทย สำหรับเยาวชนฯ ครั้งที่ 25 ระดับจังหวัด', '<p>ขอแสดงความยินดีกับนักเรียนได้เข้ารอบไปแข่งขันต่อในระดับภาค ได้แก่ เด็กหญิงปภาพินท์ อินเปล่ง ม.3/2 เด็กหญิงพลอยลดา คำคณา ม.3/1 และเด็กหญิงลภัสรดา แก้วประสงค์</p>', '1584674789.jpg', '2020-03-20', 0),
(11, 1, ' ต้นแบบจัดการเรียนการสอนประวัติศาสตร์', '<p>&nbsp; &nbsp; &nbsp;โรงเรียนวิทยาศาสตร์จุฬาภรณราชวิทยาลัย เชียงราย ซึ่งเป็นต้นแบบจัดการเรียนการสอนประวัติศาสตร์ ได้จัดโครงการพัฒนาการจัดการเรียนรู้ประวัติศาสตร์ &ldquo;เสริมสร้างอุดมการณ์ความรักชาติ ผ่านการเรียนรู้ประวัติศาสตร์ชาติไทย&rdquo; ในวันที่ 14 มิถุนายน 2562 ณ หอประชุมแคแสด</p>', '1584674884.jpg', '2020-03-20', 0);

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
(8, 6, '1584510879.jpg'),
(9, 7, '1584511033.jpg'),
(10, 7, '1584511039.jpg'),
(11, 8, '1584514858.jpg'),
(12, 8, '1584514864.jpg'),
(13, 8, '1584514868.jpg'),
(14, 8, '1584514872.jpg'),
(15, 9, '1584672644.jpg'),
(16, 9, '1584672649.jpg'),
(17, 10, '1584674801.jpg'),
(18, 10, '1584674806.jpg');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_gallery_type`
--

CREATE TABLE `tb_gallery_type` (
  `id` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- dump ตาราง `tb_gallery_type`
--

INSERT INTO `tb_gallery_type` (`id`, `topic`) VALUES
(1, 'ภาพกิจกรรม'),
(2, 'ข่าวประชาสัมพันธ์');

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

--
-- dump ตาราง `tb_main`
--

INSERT INTO `tb_main` (`id`, `topic`, `detail`, `pageview`, `postdate`) VALUES
(4, 'ข้อมูลทั่วไป', '', 0, '2020-03-18');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_download_file`
--
ALTER TABLE `tb_download_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_download_type`
--
ALTER TABLE `tb_download_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_gallery_images`
--
ALTER TABLE `tb_gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_gallery_type`
--
ALTER TABLE `tb_gallery_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
