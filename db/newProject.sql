-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-05-09 02:14:11
-- 服务器版本： 5.6.26
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newProject`
--

-- --------------------------------------------------------

--
-- 表的结构 `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `id` int(11) NOT NULL,
  `title` varchar(80) CHARACTER SET utf8 DEFAULT NULL COMMENT '标题，目前为空',
  `keyword` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '关键词，目前自动生成',
  `area` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '市级地区',
  `brand` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '品牌，如：美利达',
  `sub_brand` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '次级品牌，如：付利威',
  `color` varchar(20) CHARACTER SET utf8 NOT NULL,
  `type` varchar(20) CHARACTER SET utf8 NOT NULL,
  `alerted_police` int(4) NOT NULL DEFAULT '0' COMMENT '是否已报警',
  `status` int(4) NOT NULL DEFAULT '0' COMMENT '丢失状态：0未找回',
  `info` text CHARACTER SET utf8,
  `image` text CHARACTER SET utf8,
  `user` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `descrpition` text CHARACTER SET utf8,
  `uuid` varchar(36) CHARACTER SET utf8 DEFAULT '00000000-0000-0000-0000-000000000000',
  `lost_time` timestamp NULL DEFAULT NULL COMMENT '丢车时间',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `list`
--

INSERT INTO `list` (`id`, `title`, `keyword`, `area`, `brand`, `sub_brand`, `color`, `type`, `alerted_police`, `status`, `info`, `image`, `user`, `email`, `contact`, `descrpition`, `uuid`, `lost_time`, `create_time`, `update_time`) VALUES
(3, '寻车', NULL, '北京', '美利达', '付利威', '橙色', '山地车', 0, 0, '本人于2016年4月20日早上约7:50时将自行车停在回龙观东大街地铁站D口停车棚内。晚上19:20时发现被盗。因为自己不是日本人，被盗车辆价值不过万所以没有报警。被盗的是一辆屎黄色美利达付利威500，此车型在北京并不多见。配图是去年拍的，丢的时候没有车筐，年初更换过牙盘护盘和支撑架。', '["IMG_20140513_191311.jpg","IMG_20151220_140416.jpg","IMG_20160214_175001.jpg","IMG_20160214_175010.jpg"]', 'admin', 'admin@email.com', '15600000000', NULL, '00000000-0000-0000-0000-000000000000', '2016-04-19 16:00:00', '2016-04-25 03:24:51', '2016-04-25 03:24:51'),
(4, NULL, NULL, '西安', '杂牌', NULL, '绿色', '山地车', 0, 0, '学校开学后车子就不见了。', '["1.jpg","2.jpg","3.jpg","4.jpg"]', '', '', NULL, NULL, '00000000-0000-0000-0000-000000000000', '2012-09-04 16:00:00', '2016-04-25 03:46:59', '2016-04-25 03:46:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
