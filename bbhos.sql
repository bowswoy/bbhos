/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80018
 Source Host           : 127.0.0.1:3306
 Source Schema         : bbhos

 Target Server Type    : MySQL
 Target Server Version : 80018
 File Encoding         : 65001

 Date: 21/01/2020 18:51:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for attachment
-- ----------------------------
DROP TABLE IF EXISTS `attachment`;
CREATE TABLE `attachment` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `a_name` varchar(255) NOT NULL COMMENT 'ชื่อไฟล์',
  `a_filename` varchar(255) NOT NULL COMMENT 'ชื่อไฟล์ในระบบ',
  `a_type` varchar(8) NOT NULL COMMENT 'ประเภท',
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
  `c_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `c_name` varchar(255) DEFAULT '' COMMENT 'ชื่อหมวดหมู่',
  `c_status` int(1) DEFAULT '1' COMMENT 'สถานะ',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
BEGIN;
INSERT INTO `category` VALUES (1, 'เกี่ยวกับโรงพยาบาล', 1);
INSERT INTO `category` VALUES (2, 'ข่าวสาร/ประชาสัมพันธ์', 1);
INSERT INTO `category` VALUES (3, 'ประกาศนียบัตร', 1);
INSERT INTO `category` VALUES (4, 'ข่าวจัดซื้อจัดจ้าง', 1);
INSERT INTO `category` VALUES (5, 'ข่าวรับสมัครงาน', 1);
COMMIT;

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
  `n_title` varchar(512) NOT NULL COMMENT 'หัวข้อ/เรื่อง',
  `n_datetime` datetime DEFAULT NULL COMMENT 'วันที่',
  `n_views` int(11) DEFAULT '1' COMMENT 'จำนวนเข้าชม',
  `n_ispin` int(1) DEFAULT '0' COMMENT 'ปักหมุด',
  `n_thumbnail` varchar(255) DEFAULT NULL COMMENT 'ภาพประกอบ',
  `n_body` text NOT NULL COMMENT 'เนื้อหา',
  `n_last_update` datetime DEFAULT NULL COMMENT 'แก้ไขล่าสุด',
  `n_status` int(1) DEFAULT '1' COMMENT 'สถานะ',
  `c_id` int(11) DEFAULT NULL COMMENT 'หมวดหมู่ข่าว',
  `u_id` int(11) DEFAULT NULL COMMENT 'ผู้เขียน',
  PRIMARY KEY (`n_id`),
  KEY `fk_news_user_1` (`u_id`),
  KEY `fk_news_category_1` (`c_id`),
  CONSTRAINT `fk_news_category_1` FOREIGN KEY (`c_id`) REFERENCES `category` (`c_id`),
  CONSTRAINT `fk_news_user_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
BEGIN;
INSERT INTO `news` VALUES (1, 'ฝุ่นยังวิกฤต! กทม.สั่งปิดโรงเรียน 437 แห่ง เลื่อนเวลาทำงานข้าราชการในสังกัด', '2020-01-21 11:35:14', 1, 0, NULL, 'ฝุ่นยังวิกฤต! กทม.สั่งปิดโรงเรียน 437 แห่ง เลื่อนเวลาทำงานข้าราชการในสังกัด\r\n\r\nร.ต.อ.พงศกร กล่าวต่อว่า คาดว่าพรุ่งนี้ ฝุ่นในกทม.ยังวิกฤต โดยพื้นที่ในกทม.ยังอยู่ในสีเหลืองและส้มอยู่ ดังนั้น กทม. จึงออก 4 มาตรการ ได้แก่ 1.กทม.จะเป็นหน่วยงานนำร่องที่จะเหลื่อมเวลาการทำงานโดยจะให้ข้าราชการทุกหน่วยงานในสังกัดกทม. เหลื่อมเวลาการทำงานเป็น 10.00-18.00 น. เพื่อลดความหนาแน่นของการจราจร ซึ่งจะส่งผลให้ช่วยลด PM 2.5 ที่ออกมาจากรถยนต์ได้มากขึ้น', '2020-01-21 11:35:41', 1, 2, 1);
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `u_usr` varchar(32) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `u_pwd` varchar(255) NOT NULL COMMENT 'รหัสผ่าน',
  `u_fullname` varchar(255) DEFAULT NULL COMMENT 'ชื่อ - สกุล',
  `u_position` varchar(255) DEFAULT NULL COMMENT 'ตำแหน่ง',
  `u_department` varchar(255) DEFAULT NULL COMMENT 'หน่วยงาน',
  `u_lastlogin` datetime DEFAULT NULL COMMENT 'ใช้งานล่าสุด',
  `u_status` int(1) DEFAULT '1' COMMENT 'สถานะ',
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_usr` (`u_usr`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES (1, 'puwanai.s', 'e10adc3949ba59abbe56e057f20f883e', 'นายภูวนัย แสงพล', 'นักพัฒนาระบบ', 'เว็บครีเอชั่นดอทไอเอ็นดอททีเอช', '2020-01-01 20:12:12', 1);
INSERT INTO `user` VALUES (2, 'sirinat.j', 'e10adc3949ba59abbe56e057f20f883e', 'นางสาวสิรินาถ เจือบุญ', 'นักทดสอบระบบ', 'เว็บครีเอชั่นดอทไอเอ็นดอททีเอช', '2020-01-01 20:12:12', 1);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
