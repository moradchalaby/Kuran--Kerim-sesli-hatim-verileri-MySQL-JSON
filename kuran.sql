/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50542
Source Host           : localhost:3306
Source Database       : kuran

Target Server Type    : MYSQL
Target Server Version : 50542
File Encoding         : 65001

Date: 2015-04-25 14:57:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ayetler
-- ----------------------------
DROP TABLE IF EXISTS `ayetler`;
CREATE TABLE `ayetler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sureid` int(11) DEFAULT NULL,
  `link` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for sureler
-- ----------------------------
DROP TABLE IF EXISTS `sureler`;
CREATE TABLE `sureler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sure` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
