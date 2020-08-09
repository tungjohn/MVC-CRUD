/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mvc1

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-07-17 11:02:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(255) DEFAULT NULL,
  `author_price` varchar(255) DEFAULT NULL,
  `author_desc` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Records of authors
-- ----------------------------
INSERT INTO `authors` VALUES ('1', 'Cody Oneil', '1.jpg', 'Eius voluptatibus it');
INSERT INTO `authors` VALUES ('2', 'Eve Harris', '2.jpg', 'Molestiae est moles');
INSERT INTO `authors` VALUES ('3', 'Sacha Mcknight', '3.jpg', 'Iusto sed necessitat');
INSERT INTO `authors` VALUES ('4', 'Herrod Morse', '4.jpg', 'Quos reprehenderit d');
INSERT INTO `authors` VALUES ('5', 'Zachery Duncan', '5.jpg', 'Eaque sit quia ut li');
INSERT INTO `authors` VALUES ('6', 'Holmes Suarez', '6.jpg', 'Fugiat pariatur Ius');
