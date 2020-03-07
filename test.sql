-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 05 月 15 日 03:23
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test`;

-- --------------------------------------------------------

--
-- 表的结构 `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `uid` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `uname` varchar(16) NOT NULL COMMENT '用户名',
  `upassword` varchar(16) NOT NULL COMMENT '密码',
  `logined` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `account`
--

INSERT INTO `account` (`uid`, `uname`, `upassword`, `logined`) VALUES
(00000002, 'administrator', 'administrator', 0),
(00000003, 'admin', 'admin', 0),
(00000005, 'a', 'a', 0),
(00000010, 'qq', 'qq', 0);

-- --------------------------------------------------------

--
-- 表的结构 `discuss`
--

CREATE TABLE IF NOT EXISTS `discuss` (
  `uid` int(8) unsigned zerofill NOT NULL,
  `sendtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mess` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `discuss`
--

INSERT INTO `discuss` (`uid`, `sendtime`, `mess`) VALUES
(00000005, '2014-04-27 03:56:50', '<p><img alt="hi" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/12.gif" title="hi" width="120" /></p>\n'),
(00000005, '2014-04-27 08:34:39', '<p><img alt="喜大普奔" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/20.gif" title="喜大普奔" width="120" /></p>\n'),
(00000002, '2014-04-27 08:35:24', '<p><img alt="生气" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/13.gif" title="生气" width="120" /></p>\n'),
(00000005, '2014-04-27 08:36:17', '<p><img alt="哈哈" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/21.gif" title="哈哈" width="120" /></p>\n'),
(00000002, '2014-04-27 08:36:27', '<p><img alt="无语" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/22.gif" title="无语" width="120" /></p>\n'),
(00000002, '2014-04-27 08:40:54', '<p><img alt="吐血" height="100" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/小浣熊01.gif" title="吐血" width="100" /></p>\n'),
(00000005, '2014-04-27 08:41:06', '<p><img alt="不~" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/11.gif" title="不~" width="120" /></p>\n'),
(00000002, '2014-04-27 08:42:26', '<p><img alt="无语" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/22.gif" title="无语" width="120" /></p>\n'),
(00000002, '2014-04-27 08:47:41', '<p><img alt="思考" height="100" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/小浣熊03.gif" title="思考" width="100" /></p>\n'),
(00000002, '2014-04-27 08:47:48', '<p><img alt="hi" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/12.gif" title="hi" width="120" /></p>\n'),
(00000005, '2014-04-27 08:48:53', '<p><img alt="生气" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/13.gif" title="生气" width="120" /></p>\n'),
(00000003, '2014-04-28 02:54:15', '<p><img alt="无语" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/22.gif" title="无语" width="120" /></p>\n'),
(00000005, '2014-04-28 11:25:50', '<p><img alt="暴怒" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/14.gif" title="暴怒" width="120" /></p>\n'),
(00000005, '2014-04-28 14:21:07', '<p><img alt="无语" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/22.gif" title="无语" width="120" /></p>\n'),
(00000003, '2014-04-28 15:21:53', '<p><img alt="丧心病狂" height="100" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/小浣熊04.gif" title="丧心病狂" width="100" /><img alt="丧心病狂" height="100" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/小浣熊04.gif" title="丧心病狂" width="100" /></p>\n'),
(00000003, '2014-04-28 15:22:14', '<p><img alt="哈哈" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/21.gif" title="哈哈" width="120" /></p>\n'),
(00000005, '2014-04-28 15:22:28', '<p><img alt="呲牙笑" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/19.gif" title="呲牙笑" width="120" /></p>\n'),
(00000005, '2014-04-29 06:32:48', '<p><img alt="喜大普奔" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/20.gif" title="喜大普奔" width="120" /></p>\n'),
(00000005, '2014-04-29 06:46:08', '<p><img alt="害怕" height="100" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/小浣熊06.gif" title="害怕" width="100" /></p>\n'),
(00000005, '2014-04-29 06:46:24', '<p><img alt="泪奔" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/17.gif" title="泪奔" width="120" /></p>\n'),
(00000010, '2014-04-29 06:55:02', '<p>你们.................</p>\n'),
(00000010, '2014-04-29 06:55:31', '<p>看不见我吗？？？？？？？</p>\n'),
(00000005, '2014-04-29 07:45:41', '<p>&nbsp;大家好&nbsp;大<span style="font-size:14px">家好&nbsp;大家好&nbsp;大家好<span style="font-family:arial,helvetica,sans-serif">&nbsp;大家好&nbsp;大家好&nbsp;大家</span></span><strong><span style="font-family:arial,helvetica,sans-serif">好</span>&nbsp;大家<span style="font-size:28px">好&nbsp;大家好&nbsp;大家好&nbsp;大</span>家好</strong></p>\n'),
(00000010, '2014-04-29 16:32:55', '<p>你好 你好 测试 测试</p>\n'),
(00000005, '2014-05-05 09:11:41', '<p><img alt="泪奔" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/17.gif" title="泪奔" width="120" /></p>\n'),
(00000003, '2014-05-05 09:11:52', '<p><img alt="呲牙笑" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/19.gif" title="呲牙笑" width="120" /></p>\n'),
(00000005, '2014-05-05 12:07:05', '<p><img alt="害羞" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/18.gif" title="害羞" width="120" /></p>\n'),
(00000010, '2014-05-08 02:09:57', '<p><img alt="无语" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/22.gif" title="无语" width="120" /></p>\n'),
(00000010, '2014-05-11 04:52:44', '<p><img alt="喜大普奔" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/20.gif" title="喜大普奔" width="120" /></p>\n'),
(00000010, '2014-05-11 04:53:21', '<p><img alt="思考" height="100" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/小浣熊03.gif" title="思考" width="100" /></p>\n'),
(00000010, '2014-05-11 04:53:32', '<p><img alt="鬼脸" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/15.gif" title="鬼脸" width="120" /></p>\n');

-- --------------------------------------------------------

--
-- 表的结构 `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `uid` int(8) unsigned zerofill NOT NULL,
  `fuid` int(8) unsigned zerofill NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `friend`
--

INSERT INTO `friend` (`uid`, `fuid`) VALUES
(00000005, 00000010),
(00000005, 00000003),
(00000005, 00000002),
(00000010, 00000005),
(00000010, 00000003),
(00000010, 00000002);

-- --------------------------------------------------------

--
-- 表的结构 `leavemess`
--

CREATE TABLE IF NOT EXISTS `leavemess` (
  `uid` int(8) unsigned zerofill NOT NULL,
  `touid` int(8) unsigned zerofill NOT NULL,
  `sendtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mess` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `leavemess`
--

INSERT INTO `leavemess` (`uid`, `touid`, `sendtime`, `mess`) VALUES
(00000002, 00000003, '2014-04-23 09:14:21', '2to3'),
(00000002, 00000005, '2014-04-23 09:14:21', '2to5'),
(00000005, 00000003, '2014-04-23 09:14:22', '5to3'),
(00000005, 00000002, '2014-04-23 09:14:22', '5to2'),
(00000003, 00000005, '2014-05-01 06:18:15', '<p><img alt="丧心病狂" height="100" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/小浣熊04.gif" title="丧心病狂" width="100" /></p>\n'),
(00000005, 00000005, '2014-05-01 11:02:42', '<p><img alt="害羞" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/18.gif" title="害羞" width="120" /></p>\n'),
(00000005, 00000002, '2014-05-01 11:31:32', '<p><img alt="泪奔" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/17.gif" title="泪奔" width="120" /></p>\n'),
(00000010, 00000005, '2014-05-01 11:32:07', '<p><img alt="害羞" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/18.gif" title="害羞" width="120" /></p>\n'),
(00000005, 00000010, '2014-05-01 11:32:46', '<p>%5552</p>\n'),
(00000010, 00000005, '2014-05-01 11:38:24', '<p><img alt="泪奔" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/17.gif" title="泪奔" width="120" /></p>\n'),
(00000005, 00000010, '2014-05-01 11:38:37', '<p><img alt="哈哈" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/21.gif" title="哈哈" width="120" /></p>\n'),
(00000005, 00000010, '2014-05-05 13:41:23', '<p><img alt="丧心病狂" height="100" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/小浣熊04.gif" title="丧心病狂" width="100" /></p>\n'),
(00000010, 00000005, '2014-05-08 02:08:24', '<p><img alt="呲牙笑" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/19.gif" title="呲牙笑" width="120" /></p>\n');

-- --------------------------------------------------------

--
-- 表的结构 `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `uid` int(8) unsigned zerofill NOT NULL,
  `pic` varchar(256) CHARACTER SET utf8 NOT NULL,
  `alt` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `uptime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `access` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `photo`
--

--INSERT INTO `photo` (`uid`, `pic`, `alt`, `uptime`, `access`) VALUES
--(00000005, '00000005/1.jpg', 'sadasfsad', '2014-05-01 10:05:48', 0),
--(00000003, '00000003/10.jpg', 'admin的共享', '2014-05-01 10:14:42', 1),
--(00000002, '00000002/9.jpg', 'administrator 的共享', '2014-05-01 10:15:24', 1),
--(00000010, '00000010/6.jpg', 'qq的共享', '2014-05-01 10:16:00', 1),
--(00000010, '00000010/4.jpg', 'qq不共享', '2014-05-01 10:16:15', 0),
--(00000005, '00000005/38.jpg', '', '2014-05-01 10:40:55', 0),
--(00000005, '00000005/88.jpg', '', '2014-05-01 10:41:09', 0),
--(00000005, '00000005/58.jpg', '', '2014-05-01 10:43:13', 0),
--(00000005, '00000005/31.jpg', 'no dir', '2014-05-05 12:48:24', 1),
--(00000005, '00000005/33.jpg', 'no thing', '2014-05-05 12:49:04', 1),
--(00000005, '00000005/30.jpg', '', '2014-05-05 13:04:53', 1),
--(00000010, '00000010/35.jpg', 'sdcvsxc', '2014-05-08 01:47:40', 1),
--(00000010, '00000010/34.jpg', 'sfdsfsvc', '2014-05-08 01:47:52', 1);

-- --------------------------------------------------------

--
-- 表的结构 `shortmess`
--

CREATE TABLE IF NOT EXISTS `shortmess` (
  `uid` int(8) unsigned zerofill NOT NULL,
  `toid` int(8) unsigned zerofill NOT NULL,
  `sendtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mess` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `shortmess`
--

INSERT INTO `shortmess` (`uid`, `toid`, `sendtime`, `mess`) VALUES
(00000002, 00000003, '2014-04-04 15:58:39', 'nihao a hehehhe'),
(00000003, 00000002, '2014-04-04 15:59:17', '你也好，嘿嘿额'),
(00000002, 00000003, '2014-04-20 12:36:22', 'lhlhljlkjlkjlkj'),
(00000002, 00000005, '2014-04-20 12:37:15', 'ijljojsoidf4424242124j'),
(00000005, 00000003, '2014-04-20 12:37:33', 'i564446664j'),
(00000005, 00000002, '2014-04-20 12:37:45', '4844868656664j'),
(00000003, 00000005, '2014-04-20 12:38:20', 'lhlhljlkjlkjlkj'),
(00000005, 00000002, '2014-04-29 15:16:03', '<p><img alt="丧心病狂" height="100" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/小浣熊04.gif" title="丧心病狂" width="100" /></p>\n'),
(00000005, 00000002, '2014-04-29 15:16:04', '<p><img alt="丧心病狂" height="100" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/小浣熊04.gif" title="丧心病狂" width="100" /></p>\n'),
(00000005, 00000002, '2014-04-29 15:16:04', '<p><img alt="丧心病狂" height="100" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/小浣熊04.gif" title="丧心病狂" width="100" /></p>\n'),
(00000005, 00000002, '2014-04-29 15:16:04', '<p><img alt="丧心病狂" height="100" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/小浣熊04.gif" title="丧心病狂" width="100" /></p>\n'),
(00000005, 00000002, '2014-04-29 15:16:07', '<p><img alt="丧心病狂" height="100" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/小浣熊04.gif" title="丧心病狂" width="100" /></p>\n'),
(00000005, 00000002, '2014-04-29 15:17:39', '<p><img alt="丧心病狂" height="100" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/小浣熊04.gif" title="丧心病狂" width="100" /></p>\n'),
(00000005, 00000002, '2014-04-29 15:18:27', '<p><img alt="喜大普奔" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/20.gif" title="喜大普奔" width="120" /></p>\n'),
(00000003, 00000005, '2014-04-29 15:20:30', 'sdfsgsfgdfgsdgds'),
(00000005, 00000003, '2014-04-29 15:22:00', '<p><img alt="喜大普奔" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/20.gif" title="喜大普奔" width="120" /></p>\n'),
(00000005, 00000003, '2014-04-29 15:39:25', '<p><img alt="呲牙笑" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/19.gif" title="呲牙笑" width="120" /></p>\n'),
(00000003, 00000005, '2014-04-29 16:55:36', '<p><img alt="哈哈" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/21.gif" title="哈哈" width="120" /></p>\n'),
(00000005, 00000003, '2014-05-01 05:49:55', '<p><img alt="呲牙笑" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/19.gif" title="呲牙笑" width="120" /></p>\n'),
(00000005, 00000003, '2014-05-01 06:18:42', '<p><img alt="呲牙笑" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/19.gif" title="呲牙笑" width="120" /></p>\n'),
(00000003, 00000005, '2014-05-01 06:19:00', '<p><img alt="害羞" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/18.gif" title="害羞" width="120" /></p>\n'),
(00000005, 00000010, '2014-05-05 13:41:57', ''),
(00000005, 00000010, '2014-05-05 13:42:04', '<p><img alt="呲牙笑" height="120" src="http://localhost/DS/server/personal/edit/plugins/smiley/images/19.gif" title="呲牙笑" width="120" /></p>\n'),
(00000010, 00000005, '2014-05-08 02:09:33', '<h2 style="font-style:italic;"><span style="font-size:48px"><em><strong><span style="color:#00FFFF"><span style="background-color:#FFFF00"><span style="font-family:verdana,geneva,sans-serif">hao 好的</span></span></span></strong></em></span></h2>\n');

-- --------------------------------------------------------

--
-- 表的结构 `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `uid` int(8) unsigned zerofill NOT NULL,
  `nick` varchar(32) NOT NULL,
  `portrait` varchar(256) NOT NULL DEFAULT 'default.png',
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `userinfo`
--

INSERT INTO `userinfo` (`uid`, `nick`, `portrait`, `email`) VALUES
(00000002, '测试账号2', 'portrait00000002.png', '123555466@126.com'),
(00000003, '测试账号3', 'portrait00000003.png', '53444215554@126.com'),
(00000005, '测试账号555', 'default.png', '12323555@qq.com'),
(00000010, '测试账号10', 'portrait00000001.png', '33223@qq.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
