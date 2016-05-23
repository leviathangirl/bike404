-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2016-05-23 02:06:48
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
  `user` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '用户的昵称（不保存用户的真实姓名）',
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `descrpition` text CHARACTER SET utf8,
  `uuid` varchar(36) CHARACTER SET utf8 DEFAULT '00000000-0000-0000-0000-000000000000',
  `lost_time` timestamp NULL DEFAULT NULL COMMENT '丢车时间',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
