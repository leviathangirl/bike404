-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-04-21 09:54:32
-- 服务器版本： 5.6.26
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `newProject`
--

-- --------------------------------------------------------

--
-- 表的结构 `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `keyword` varchar(100) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `color` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `alerted_police` int(4) NOT NULL DEFAULT '0' COMMENT '是否已报警',
  `status` int(4) NOT NULL DEFAULT '0' COMMENT '丢失状态：0未找回',
  `info` text,
  `image` text,
  `user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `descrpition` text,
  `uuid` varchar(36) DEFAULT '00000000-0000-0000-0000-000000000000',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `list`
--

INSERT INTO `list` (`id`, `title`, `keyword`, `area`, `brand`, `color`, `type`, `alerted_police`, `status`, `info`, `image`, `user`, `email`, `contact`, `descrpition`, `uuid`, `create_time`, `update_time`) VALUES
(1, 'this is title', NULL, NULL, NULL, 'blue', 'normal', 0, 0, 'this is info', NULL, 'admin', 'admin@email.com', 'other conatct', NULL, NULL, '2016-04-21 08:23:07', '2016-04-21 08:23:38'),
(2, 'title2', 'keyword2', NULL, 'brand2', 'color2', 'type2', 1, 1, 'info2', 'image2', 'user2', 'email2', 'conatct2', NULL, NULL, '2016-04-21 08:23:07', '2016-04-21 08:23:38');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
