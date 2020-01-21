/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80018
 Source Host           : 127.0.0.1:3306
 Source Schema         : bbhost

 Target Server Type    : MySQL
 Target Server Version : 80018
 File Encoding         : 65001

 Date: 20/01/2020 14:06:39
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for attachment
-- ----------------------------
DROP TABLE IF EXISTS `attachment`;
CREATE TABLE `attachment` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `a_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อไฟล์',
  `a_filename` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อไฟล์ในระบบ',
  `a_type` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ประเภท',
  `a_size` double DEFAULT NULL COMMENT 'ขนาด',
  `a_status` int(1) DEFAULT '1' COMMENT 'สถานะ',
  `a_order` int(11) DEFAULT NULL COMMENT 'การเรียง',
  `n_id` int(11) DEFAULT NULL COMMENT 'ข่าว',
  PRIMARY KEY (`a_id`),
  KEY `fk_attachment_news_1` (`n_id`),
  CONSTRAINT `fk_attachment_news_1` FOREIGN KEY (`n_id`) REFERENCES `news` (`n_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) DEFAULT NULL,
  `c_status` int(1) DEFAULT '1',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `l_detail` varchar(255) DEFAULT NULL,
  `l_datetime` datetime DEFAULT NULL,
  `l_url` varchar(255) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`l_id`),
  KEY `fk_log_user_1` (`u_id`),
  CONSTRAINT `fk_log_user_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `n_title` varchar(512) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'หัวข้อ/เรื่อง',
  `n_datetime` datetime DEFAULT NULL COMMENT 'วันที่',
  `n_views` int(11) DEFAULT '1' COMMENT 'จำนวนเข้าชม',
  `n_ispin` int(1) DEFAULT '1' COMMENT 'ปักหมุด',
  `n_body` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'เนื้อหา',
  `n_last_update` datetime DEFAULT NULL COMMENT 'แก้ไขล่าสุด',
  `n_status` int(1) DEFAULT '1' COMMENT 'สถานะ',
  `c_id` int(11) DEFAULT NULL COMMENT 'หมวดหมู่ข่าว',
  `u_id` int(11) DEFAULT NULL COMMENT 'ผู้เขียน',
  PRIMARY KEY (`n_id`),
  KEY `fk_news_user_1` (`u_id`),
  KEY `fk_news_category_1` (`c_id`),
  CONSTRAINT `fk_news_category_1` FOREIGN KEY (`c_id`) REFERENCES `category` (`c_id`),
  CONSTRAINT `fk_news_user_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `u_usr` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อผู้ใช้',
  `u_pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รหัสผ่าน',
  `u_fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'ชื่อ - สกุล',
  `u_position` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'ตำแหน่ง',
  `u_department` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'หน่วยงาน',
  `u_lastlogin` datetime DEFAULT NULL COMMENT 'ใช้งานล่าสุด',
  `u_status` int(1) DEFAULT '1' COMMENT 'สถานะ',
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_usr` (`u_usr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
