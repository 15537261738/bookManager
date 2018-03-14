/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : bookmanager

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-03-14 13:26:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `book`
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `isbn` varchar(32) DEFAULT NULL,
  `add_time` varchar(32) DEFAULT NULL,
  `suncco_no` varchar(32) DEFAULT NULL,
  `price` float DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book
-- ----------------------------
INSERT INTO `book` VALUES ('1', '经济学原理', '00001', '1520918171', '', '121.9', '0');
INSERT INTO `book` VALUES ('2', '高等数学', '00002', '1520922574', '', '38.5', '0');
INSERT INTO `book` VALUES ('3', '工程数学之线性代数', '00003', '1520923221', '', '21.8', '0');
INSERT INTO `book` VALUES ('4', '西方经济学', '00004', '1520923560', null, '32.4', '0');

-- ----------------------------
-- Table structure for `person`
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `suncco_no` varchar(32) DEFAULT NULL,
  `type` int(11) DEFAULT '0',
  `email` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of person
-- ----------------------------

-- ----------------------------
-- Table structure for `record`
-- ----------------------------
DROP TABLE IF EXISTS `record`;
CREATE TABLE `record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` varchar(32) DEFAULT NULL,
  `person_id` varchar(32) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `borrow_time` varchar(32) DEFAULT NULL,
  `remand_time` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of record
-- ----------------------------
INSERT INTO `record` VALUES ('1', '1', '14031110216', '1', '1520927674', '1526198074');
INSERT INTO `record` VALUES ('2', '2', '14031110216', '1', '1520927674', '1526198074');
