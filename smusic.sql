/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50624
 Source Host           : 127.0.0.1
 Source Database       : smusic

 Target Server Type    : MySQL
 Target Server Version : 50624
 File Encoding         : utf-8

 Date: 11/25/2015 10:53:55 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `jsong`
-- ----------------------------
DROP TABLE IF EXISTS `jsong`;
CREATE TABLE `jsong` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `stitle` text NOT NULL,
  `sartist` text NOT NULL,
  `salbum` text NOT NULL,
  `scover` text NOT NULL,
  `smp3` text NOT NULL,
  `stag` text NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=168 DEFAULT CHARSET=gbk;

-- ----------------------------
--  Table structure for `juser`
-- ----------------------------
DROP TABLE IF EXISTS `juser`;
CREATE TABLE `juser` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lastlogtime` datetime DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

SET FOREIGN_KEY_CHECKS = 1;
