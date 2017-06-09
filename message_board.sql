-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?06 �?09 �?08:22
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `message_board`
--

-- --------------------------------------------------------

--
-- 表的结构 `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `note_user` varchar(20) CHARACTER SET gb2312 NOT NULL,
  `note_title` varchar(40) CHARACTER SET gb2312 NOT NULL,
  `note_content` varchar(500) CHARACTER SET gb2312 NOT NULL,
  `note_mood` varchar(200) CHARACTER SET gb2312 NOT NULL,
  `note_time` datetime NOT NULL,
  `user_name` varchar(200) CHARACTER SET gb2312 NOT NULL,
  `note_answer` int(1) NOT NULL DEFAULT '0',
  `note_flag` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`note_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `note`
--

INSERT INTO `note` (`note_id`, `note_user`, `note_title`, `note_content`, `note_mood`, `note_time`, `user_name`, `note_answer`, `note_flag`) VALUES
(24, '匿名', '', '习近', '', '2017-06-09 15:10:17', 'ADMIN', 0, 1),
(23, '匿名', '', '去死', '', '2017-06-09 15:07:08', 'ADMIN', 0, 1),
(3, '匿名', '小程序 ', '的受访者收到防守打法', '', '2017-06-08 14:23:15', '', 0, 1),
(4, '匿名', '小程序 ', '的受访者收到防守打法', '', '2017-06-08 14:23:34', '', 0, 1),
(5, '匿名', 'fg dfg df bfh ', '脸萌，通常是指MYOTee脸萌的简称，是一款非常有趣的拼脸软件，可以轻松制作使用者的专属逗形象。发展历史2013年5月MT团队成立。 2013年11月脸萌1.0诞生。 2014年3月获得了IDG数百万天使轮投资。 2014年6月，日下载最高达500万，连续两周在APP Store总榜排行第一。2 2014年7月获得了顶级投资机构数千万', '', '2017-06-08 15:17:52', '', 0, 1),
(6, '匿名', '脸萌', '脸萌前期对头像个性化这个需求的试探是正确的,但是他后期的产品迭代并没有符合用户对其的期待,即便是每周迭代,产品仍是停留在表层需求上功能的继续开发。', '', '2017-06-08 15:23:02', '', 0, 1),
(7, '匿名', '小程序', '动次打次是的v 操作vxvxczxcvcx', '', '2017-06-08 15:39:31', '', 0, 0),
(19, '匿名', '', '死', '', '2017-06-09 15:04:14', 'ADMIN', 0, 1),
(9, '匿名', '', '才vv从', '', '2017-06-08 15:53:44', '', 0, 1),
(10, '匿名', 'df vfdsv', 'dfsdaf', '', '2017-06-09 08:22:53', '', 0, 0),
(11, '匿名', 'davf', 'scsccxvzxv', '', '2017-06-09 08:23:07', '', 0, 0),
(12, '匿名', 'sdafdsfsd', 'sddfadafs', '', '2017-06-09 08:23:23', '', 0, 0),
(14, '匿名', 'hgxf', 'sdfgf', '', '2017-06-09 08:27:35', '', 0, 0),
(16, '匿名', '地方Ｓ数组', 'dSFDF在', '', '2017-06-09 08:31:19', 'root', 1, 0),
(21, '匿名', '', '去死', '', '2017-06-09 15:04:23', 'ADMIN', 0, 1),
(20, '匿名', '', '去', '', '2017-06-09 15:04:18', 'ADMIN', 0, 1),
(22, '匿名', '', '学习', '', '2017-06-09 15:07:02', 'ADMIN', 0, 1),
(25, '匿名', '', '习', '', '2017-06-09 15:18:04', 'ADMIN', 0, 1),
(26, '匿名', '', '习近平是主席', '', '2017-06-09 15:18:26', 'ADMIN', 0, 1),
(27, '匿名', '', '习近', '', '2017-06-09 15:18:56', 'ADMIN', 0, 1),
(28, '匿名', '', '学习', '', '2017-06-09 15:19:02', 'ADMIN', 0, 1),
(29, '匿名', '', '去去去', '', '2017-06-09 15:22:08', 'ADMIN', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `note_answer`
--

CREATE TABLE IF NOT EXISTS `note_answer` (
  `noan_id` int(11) NOT NULL AUTO_INCREMENT,
  `noan_note_id` int(11) NOT NULL,
  `noan_content` varchar(500) CHARACTER SET gb2312 NOT NULL,
  `noan_time` datetime NOT NULL,
  `noan_user_name` varchar(10) CHARACTER SET gb2312 NOT NULL,
  PRIMARY KEY (`noan_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `note_answer`
--

INSERT INTO `note_answer` (`noan_id`, `noan_note_id`, `noan_content`, `noan_time`, `noan_user_name`) VALUES
(3, 17, 'ge gsdgd', '2017-06-09 10:13:57', '匿名'),
(4, 16, 'dfsg fgfd', '2017-06-09 10:14:04', '匿名');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Ground_id` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `Ground_id`) VALUES
(1, 'admin', 'admin', 1),
(2, 'root', 'root', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
