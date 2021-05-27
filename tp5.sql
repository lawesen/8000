-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-04-24 23:32:47
-- 服务器版本： 8.0.23
-- PHP 版本： 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `tp5`
--

-- --------------------------------------------------------

--
-- 表的结构 `crm_contan`
--

CREATE TABLE `crm_contan` (
  `id` int UNSIGNED NOT NULL COMMENT 'ID',
  `bxhao` varchar(20) NOT NULL COMMENT '报修单号',
  `username` varchar(250) NOT NULL COMMENT '用户名',
  `zwh` varchar(255) NOT NULL DEFAULT '0' COMMENT '座位号',
  `pingpai` varchar(255) NOT NULL COMMENT '品牌',
  `sbxh` varchar(255) NOT NULL COMMENT '设备型号',
  `gzbh` varchar(255) NOT NULL COMMENT '固资编号',
  `bxsn` varchar(255) NOT NULL COMMENT '供应商报修SN',
  `miaoshu` varchar(255) NOT NULL COMMENT '故障描述',
  `ghpj` varchar(255) NOT NULL COMMENT '更换配件',
  `yjwcsj` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '1990-01-01' COMMENT '预计完成时间',
  `dqzt` int NOT NULL COMMENT '当前状态',
  `create_time` int UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int NOT NULL DEFAULT '0' COMMENT '更新时间',
  `glbz` varchar(255) NOT NULL DEFAULT '0' COMMENT '关联BZ单据',
  `gjr` varchar(255) NOT NULL COMMENT '跟进人',
  `gjr_telphone` varchar(255) NOT NULL DEFAULT '0' COMMENT '跟进人座机',
  `gjr_mobphone` varchar(255) DEFAULT '未填写' COMMENT '跟进人电话',
  `jl` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '记录'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `crm_contan`
--

INSERT INTO `crm_contan` (`id`, `bxhao`, `username`, `zwh`, `pingpai`, `sbxh`, `gzbh`, `bxsn`, `miaoshu`, `ghpj`, `yjwcsj`, `dqzt`, `create_time`, `update_time`, `glbz`, `gjr`, `gjr_telphone`, `gjr_mobphone`, `jl`) VALUES
(2, 'BX1617000593', 'wslai(赖伟胜)', '飞亚达13楼B区070', '联想', 'Carbon X1', 'TKPC180504N', 'R90TxPF2', '笔记本经常死机', '屏幕、D壳', '2021-04-30', 0, 1617000593, 1619244721, '202103301234567', 'zblin(林志彬)', '888888', '13990909090', ''),
(133, 'BX1619244738', 'wslai(赖伟胜)', '飞亚达13楼B区070	', '联想', 'Carbon X1	', 'TKNB180504N', 'R90TxPF20', '笔记本发热严重	', '屏幕、D壳	', '2021-01-01', 0, 1619244738, 0, '1234567890876543', 'wslai(赖伟胜)', '0', '1388888888888', '新增记录<br>新增时间：1619244738<br>用户名：wslai(赖伟胜)<br>设备型号：Carbon X1	<br>固资编号：TKNB180504N<br>报障描述：笔记本发热严重	<br>更换配件：屏幕、D壳	<br>关联BZ：1234567890876543<br>'),
(132, 'BX1619234860', 'wslai(赖伟胜)', '飞亚达13楼B区070', '联想', 'Carbon X1', 'TKPC180504N', 'R90TxPF100', '笔记本发热严重', '屏幕、D壳', '2021-04-30', 0, 1619234860, 1619244650, '202103301234567', 'zblin(林志彬)', '0', '888888', '新增记录<br>新增时间：1619234860<br>用户名：wslai(赖伟胜)<br>设备型号：Carbon X1<br>固资编号：TKPC180504N<br>报障描述：笔记本经常死机<br>更换配件：屏幕、D壳<br>关联BZ：202103301234567<br>');

-- --------------------------------------------------------

--
-- 表的结构 `crm_pinpai`
--

CREATE TABLE `crm_pinpai` (
  `id` int NOT NULL COMMENT 'id',
  `pinpai` varchar(50) NOT NULL COMMENT '品牌'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `crm_pinpai`
--

INSERT INTO `crm_pinpai` (`id`, `pinpai`) VALUES
(1, '联想'),
(2, '惠普'),
(3, '戴尔'),
(4, '华为'),
(5, 'Apple'),
(6, '三星');

-- --------------------------------------------------------

--
-- 表的结构 `crm_rules`
--

CREATE TABLE `crm_rules` (
  `id` int NOT NULL COMMENT 'ID',
  `usernames` varchar(225) NOT NULL COMMENT '用户名',
  `passwords` varchar(225) NOT NULL COMMENT '密码',
  `chname` varchar(255) NOT NULL COMMENT '中文名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `crm_rules`
--

INSERT INTO `crm_rules` (`id`, `usernames`, `passwords`, `chname`) VALUES
(1, 'admin', '123', '管理员'),
(2, 'v_wslai', '123', '赖伟胜');

-- --------------------------------------------------------

--
-- 表的结构 `crm_teacher`
--

CREATE TABLE `crm_teacher` (
  `id` int NOT NULL,
  `name` varchar(222) NOT NULL,
  `pwd` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转储表的索引
--

--
-- 表的索引 `crm_contan`
--
ALTER TABLE `crm_contan`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `crm_pinpai`
--
ALTER TABLE `crm_pinpai`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `crm_rules`
--
ALTER TABLE `crm_rules`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `crm_teacher`
--
ALTER TABLE `crm_teacher`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `crm_contan`
--
ALTER TABLE `crm_contan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=134;

--
-- 使用表AUTO_INCREMENT `crm_pinpai`
--
ALTER TABLE `crm_pinpai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `crm_rules`
--
ALTER TABLE `crm_rules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
