<<<<<<< HEAD
/*
Navicat MySQL Data Transfer

Source Server         : localhost_test
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : classmanagement

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2016-06-12 19:07:25
*/
=======

>>>>>>> 0223b849bb362fb87d84cbd94e8a51b91f134348

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `user` varchar(16) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('admin', '96e79218965eb72c92a549dd5a330112');

-- ----------------------------
-- Table structure for `class`
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `building` varchar(2) NOT NULL COMMENT '栋',
  `room` varchar(3) NOT NULL COMMENT '课室号',
  `size` tinyint(1) NOT NULL COMMENT '容纳人数,1:50人，2：100人，3：150人',
  `type` tinyint(1) NOT NULL COMMENT '1:实验室，2：课室',
  `usage` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('1', 'A', '201', '1', '1', '班会');
INSERT INTO `class` VALUES ('2', 'A', '202', '1', '1', '班会');
INSERT INTO `class` VALUES ('3', 'A', '203', '1', '1', '班会');
INSERT INTO `class` VALUES ('4', 'A', '204', '1', '1', '班会');
INSERT INTO `class` VALUES ('5', 'A', '205', '1', '1', '班会');
INSERT INTO `class` VALUES ('6', 'A', '206', '1', '1', '班会');
INSERT INTO `class` VALUES ('7', 'A', '207', '2', '1', '讲座');
INSERT INTO `class` VALUES ('8', 'A', '208', '2', '1', '讲座');
INSERT INTO `class` VALUES ('9', 'A', '209', '1', '1', '班会');
INSERT INTO `class` VALUES ('10', 'A', '210', '1', '1', '班会');
INSERT INTO `class` VALUES ('11', 'A', '211', '1', '1', '班会');
INSERT INTO `class` VALUES ('12', 'A', '212', '1', '1', '班会');
INSERT INTO `class` VALUES ('13', 'A', '213', '1', '1', '班会');
INSERT INTO `class` VALUES ('14', 'A', '214', '1', '1', '班会');
INSERT INTO `class` VALUES ('15', 'A', '215', '3', '1', '年级会');
INSERT INTO `class` VALUES ('16', 'A', '301', '1', '1', '班会');
INSERT INTO `class` VALUES ('17', 'A', '302', '1', '1', '班会');
INSERT INTO `class` VALUES ('18', 'A', '303', '1', '1', '班会');
INSERT INTO `class` VALUES ('19', 'A', '304', '1', '1', '班会');
INSERT INTO `class` VALUES ('20', 'A', '305', '1', '1', '班会');
INSERT INTO `class` VALUES ('21', 'A', '306', '1', '1', '班会');
INSERT INTO `class` VALUES ('22', 'A', '307', '2', '1', '讲座');
INSERT INTO `class` VALUES ('23', 'A', '308', '2', '1', '讲座');
INSERT INTO `class` VALUES ('24', 'A', '309', '1', '1', '班会');
INSERT INTO `class` VALUES ('25', 'A', '310', '1', '1', '班会');
INSERT INTO `class` VALUES ('26', 'A', '311', '1', '1', '班会');
INSERT INTO `class` VALUES ('27', 'A', '312', '1', '1', '班会');
INSERT INTO `class` VALUES ('28', 'A', '313', '1', '1', '班会');
INSERT INTO `class` VALUES ('29', 'A', '314', '1', '1', '班会');
INSERT INTO `class` VALUES ('30', 'A', '315', '3', '1', '年级会');
INSERT INTO `class` VALUES ('31', 'A', '101', '1', '1', '班会');
INSERT INTO `class` VALUES ('32', 'A', '102', '1', '1', '班会');
INSERT INTO `class` VALUES ('33', 'A', '103', '1', '1', '班会');
INSERT INTO `class` VALUES ('34', 'A', '104', '1', '1', '班会');
INSERT INTO `class` VALUES ('35', 'A', '105', '1', '1', '班会');
INSERT INTO `class` VALUES ('36', 'A', '106', '1', '1', '班会');
INSERT INTO `class` VALUES ('37', 'A', '107', '2', '1', '讲座');
INSERT INTO `class` VALUES ('38', 'A', '108', '2', '1', '讲座');
INSERT INTO `class` VALUES ('39', 'A', '109', '1', '1', '班会');
INSERT INTO `class` VALUES ('40', 'A', '110', '1', '1', '班会');
INSERT INTO `class` VALUES ('41', 'A', '111', '1', '1', '班会');
INSERT INTO `class` VALUES ('42', 'A', '112', '1', '1', '班会');
INSERT INTO `class` VALUES ('43', 'A', '113', '1', '1', '班会');
INSERT INTO `class` VALUES ('44', 'A', '114', '1', '1', '班会');
INSERT INTO `class` VALUES ('45', 'A', '401', '1', '1', '班会');
INSERT INTO `class` VALUES ('46', 'A', '402', '1', '1', '班会');
INSERT INTO `class` VALUES ('47', 'A', '403', '1', '1', '班会');
INSERT INTO `class` VALUES ('48', 'A', '404', '1', '1', '班会');
INSERT INTO `class` VALUES ('49', 'A', '405', '1', '1', '班会');
INSERT INTO `class` VALUES ('50', 'A', '406', '1', '1', '班会');
INSERT INTO `class` VALUES ('51', 'A', '407', '2', '1', '讲座');
INSERT INTO `class` VALUES ('52', 'A', '408', '2', '1', '讲座');
INSERT INTO `class` VALUES ('53', 'A', '409', '1', '1', '班会');
INSERT INTO `class` VALUES ('54', 'A', '410', '1', '1', '班会');
INSERT INTO `class` VALUES ('55', 'A', '411', '1', '1', '班会');
INSERT INTO `class` VALUES ('56', 'A', '412', '1', '1', '班会');
INSERT INTO `class` VALUES ('57', 'A', '413', '1', '1', '班会');
INSERT INTO `class` VALUES ('58', 'A', '414', '1', '1', '班会');
INSERT INTO `class` VALUES ('59', 'A', '415', '3', '1', '年级会');
INSERT INTO `class` VALUES ('60', 'A', '501', '1', '1', '班会');
INSERT INTO `class` VALUES ('61', 'A', '502', '1', '1', '班会');
INSERT INTO `class` VALUES ('62', 'A', '503', '1', '1', '班会');
INSERT INTO `class` VALUES ('63', 'A', '504', '1', '1', '班会');
INSERT INTO `class` VALUES ('64', 'A', '505', '1', '1', '班会');
INSERT INTO `class` VALUES ('65', 'A', '506', '1', '1', '班会');
INSERT INTO `class` VALUES ('66', 'A', '507', '2', '1', '讲座');
INSERT INTO `class` VALUES ('67', 'A', '508', '2', '1', '讲座');
INSERT INTO `class` VALUES ('68', 'A', '509', '1', '1', '班会');
INSERT INTO `class` VALUES ('69', 'A', '510', '1', '1', '班会');
INSERT INTO `class` VALUES ('70', 'A', '511', '1', '1', '班会');
INSERT INTO `class` VALUES ('71', 'A', '512', '1', '1', '班会');
INSERT INTO `class` VALUES ('72', 'A', '513', '1', '1', '班会');
INSERT INTO `class` VALUES ('73', 'A', '514', '1', '1', '班会');
INSERT INTO `class` VALUES ('74', 'A', '515', '3', '1', '年级会');
INSERT INTO `class` VALUES ('75', 'A', '203', '1', '2', '实验课');
INSERT INTO `class` VALUES ('76', 'A', '204', '1', '2', '实验课');
INSERT INTO `class` VALUES ('77', 'A', '205', '1', '2', '实验课');
INSERT INTO `class` VALUES ('78', 'A', '206', '3', '2', '实验课');
INSERT INTO `class` VALUES ('79', 'A', '303', '1', '2', '实验课');
INSERT INTO `class` VALUES ('80', 'A', '304', '1', '2', '实验课');
INSERT INTO `class` VALUES ('81', 'A', '305', '1', '2', '实验课');
INSERT INTO `class` VALUES ('82', 'A', '306', '3', '2', '实验课');
INSERT INTO `class` VALUES ('83', 'A', '403', '1', '2', '实验课');
INSERT INTO `class` VALUES ('84', 'A', '404', '1', '2', '实验课');
INSERT INTO `class` VALUES ('85', 'A', '405', '1', '2', '实验课');
INSERT INTO `class` VALUES ('86', 'A', '406', '3', '2', '实验课');
INSERT INTO `class` VALUES ('87', 'A', '503', '1', '2', '实验课');
INSERT INTO `class` VALUES ('88', 'A', '504', '1', '2', '实验课');
INSERT INTO `class` VALUES ('89', 'A', '505', '1', '2', '实验课');
INSERT INTO `class` VALUES ('90', 'A', '506', '3', '2', '实验课');

-- ----------------------------
-- Table structure for `course`
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `class_id` int(11) NOT NULL,
  `week` varchar(1) NOT NULL COMMENT '星期',
  `time` varchar(16) NOT NULL COMMENT '时间:时间，上午，下午，晚上',
  PRIMARY KEY (`class_id`,`week`,`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', '1', '上午');
INSERT INTO `course` VALUES ('1', '1', '下午');
INSERT INTO `course` VALUES ('1', '2', '上午');
INSERT INTO `course` VALUES ('1', '2', '下午');
INSERT INTO `course` VALUES ('1', '3', '上午');
INSERT INTO `course` VALUES ('1', '3', '下午');
INSERT INTO `course` VALUES ('1', '4', '上午');
INSERT INTO `course` VALUES ('1', '4', '下午');
INSERT INTO `course` VALUES ('2', '1', '上午');
INSERT INTO `course` VALUES ('2', '1', '晚上');
INSERT INTO `course` VALUES ('2', '2', '上午');
INSERT INTO `course` VALUES ('2', '2', '晚上');
INSERT INTO `course` VALUES ('2', '3', '上午');
INSERT INTO `course` VALUES ('2', '3', '晚上');
INSERT INTO `course` VALUES ('2', '4', '上午');
INSERT INTO `course` VALUES ('2', '4', '晚上');
INSERT INTO `course` VALUES ('3', '1', '上午');
INSERT INTO `course` VALUES ('3', '1', '下午');
INSERT INTO `course` VALUES ('3', '2', '上午');
INSERT INTO `course` VALUES ('3', '2', '下午');
INSERT INTO `course` VALUES ('3', '3', '上午');
INSERT INTO `course` VALUES ('3', '3', '下午');
INSERT INTO `course` VALUES ('3', '4', '上午');
INSERT INTO `course` VALUES ('3', '4', '下午');
INSERT INTO `course` VALUES ('4', '1', '上午');
INSERT INTO `course` VALUES ('4', '1', '下午');
INSERT INTO `course` VALUES ('4', '2', '上午');
INSERT INTO `course` VALUES ('4', '2', '下午');
INSERT INTO `course` VALUES ('4', '3', '上午');
INSERT INTO `course` VALUES ('4', '3', '下午');
INSERT INTO `course` VALUES ('4', '4', '上午');
INSERT INTO `course` VALUES ('4', '4', '下午');
INSERT INTO `course` VALUES ('5', '1', '下午');
INSERT INTO `course` VALUES ('5', '1', '晚上');
INSERT INTO `course` VALUES ('5', '2', '下午');
INSERT INTO `course` VALUES ('5', '2', '晚上');
INSERT INTO `course` VALUES ('5', '3', '下午');
INSERT INTO `course` VALUES ('5', '3', '晚上');
INSERT INTO `course` VALUES ('5', '4', '下午');
INSERT INTO `course` VALUES ('5', '4', '晚上');
INSERT INTO `course` VALUES ('6', '1', '上午');
INSERT INTO `course` VALUES ('6', '2', '上午');
INSERT INTO `course` VALUES ('6', '3', '上午');
INSERT INTO `course` VALUES ('6', '4', '上午');
INSERT INTO `course` VALUES ('7', '1', '下午');
INSERT INTO `course` VALUES ('7', '2', '下午');
INSERT INTO `course` VALUES ('7', '3', '下午');
INSERT INTO `course` VALUES ('7', '4', '下午');
INSERT INTO `course` VALUES ('8', '1', '上午');
INSERT INTO `course` VALUES ('8', '2', '上午');
INSERT INTO `course` VALUES ('8', '3', '上午');
INSERT INTO `course` VALUES ('8', '4', '上午');
INSERT INTO `course` VALUES ('9', '1', '晚上');
INSERT INTO `course` VALUES ('9', '2', '晚上');
INSERT INTO `course` VALUES ('9', '3', '晚上');
INSERT INTO `course` VALUES ('9', '4', '晚上');
INSERT INTO `course` VALUES ('10', '1', '下午');
INSERT INTO `course` VALUES ('10', '2', '下午');
INSERT INTO `course` VALUES ('10', '3', '下午');
INSERT INTO `course` VALUES ('10', '4', '下午');
INSERT INTO `course` VALUES ('11', '1', '上午');
INSERT INTO `course` VALUES ('11', '2', '上午');
INSERT INTO `course` VALUES ('11', '3', '上午');
INSERT INTO `course` VALUES ('11', '4', '上午');
INSERT INTO `course` VALUES ('12', '1', '下午');
INSERT INTO `course` VALUES ('12', '2', '下午');
INSERT INTO `course` VALUES ('12', '3', '下午');
INSERT INTO `course` VALUES ('12', '4', '下午');
INSERT INTO `course` VALUES ('13', '1', '上午');
INSERT INTO `course` VALUES ('13', '2', '上午');
INSERT INTO `course` VALUES ('13', '3', '上午');
INSERT INTO `course` VALUES ('13', '4', '上午');
INSERT INTO `course` VALUES ('14', '1', '下午');
INSERT INTO `course` VALUES ('14', '2', '下午');
INSERT INTO `course` VALUES ('14', '3', '下午');
INSERT INTO `course` VALUES ('14', '4', '下午');
INSERT INTO `course` VALUES ('15', '1', '晚上');
INSERT INTO `course` VALUES ('15', '2', '晚上');
INSERT INTO `course` VALUES ('15', '3', '晚上');
INSERT INTO `course` VALUES ('15', '4', '晚上');
INSERT INTO `course` VALUES ('16', '1', '上午');
INSERT INTO `course` VALUES ('16', '2', '上午');
INSERT INTO `course` VALUES ('16', '3', '上午');
INSERT INTO `course` VALUES ('16', '4', '上午');
INSERT INTO `course` VALUES ('17', '1', '下午');
INSERT INTO `course` VALUES ('17', '2', '下午');
INSERT INTO `course` VALUES ('17', '3', '下午');
INSERT INTO `course` VALUES ('17', '4', '下午');
INSERT INTO `course` VALUES ('18', '1', '上午');
INSERT INTO `course` VALUES ('18', '2', '上午');
INSERT INTO `course` VALUES ('18', '3', '上午');
INSERT INTO `course` VALUES ('18', '4', '上午');
INSERT INTO `course` VALUES ('19', '1', '晚上');
INSERT INTO `course` VALUES ('19', '2', '晚上');
INSERT INTO `course` VALUES ('20', '1', '下午');
INSERT INTO `course` VALUES ('20', '2', '下午');
INSERT INTO `course` VALUES ('21', '1', '上午');
INSERT INTO `course` VALUES ('21', '2', '上午');
INSERT INTO `course` VALUES ('22', '1', '下午');
INSERT INTO `course` VALUES ('22', '2', '下午');
INSERT INTO `course` VALUES ('23', '1', '上午');
INSERT INTO `course` VALUES ('23', '2', '上午');
INSERT INTO `course` VALUES ('24', '1', '下午');
INSERT INTO `course` VALUES ('24', '2', '下午');
INSERT INTO `course` VALUES ('25', '1', '晚上');
INSERT INTO `course` VALUES ('25', '2', '晚上');
INSERT INTO `course` VALUES ('26', '1', '上午');
INSERT INTO `course` VALUES ('26', '2', '上午');
INSERT INTO `course` VALUES ('27', '1', '下午');
INSERT INTO `course` VALUES ('27', '2', '下午');
INSERT INTO `course` VALUES ('28', '1', '上午');
INSERT INTO `course` VALUES ('28', '2', '上午');
INSERT INTO `course` VALUES ('29', '1', '晚上');
INSERT INTO `course` VALUES ('29', '2', '晚上');
INSERT INTO `course` VALUES ('30', '1', '下午');
INSERT INTO `course` VALUES ('30', '2', '下午');
INSERT INTO `course` VALUES ('31', '1', '上午');
INSERT INTO `course` VALUES ('31', '2', '上午');
INSERT INTO `course` VALUES ('32', '1', '下午');
INSERT INTO `course` VALUES ('32', '2', '下午');
INSERT INTO `course` VALUES ('33', '1', '上午');
INSERT INTO `course` VALUES ('33', '2', '上午');
INSERT INTO `course` VALUES ('34', '1', '下午');
INSERT INTO `course` VALUES ('34', '2', '下午');
INSERT INTO `course` VALUES ('35', '1', '晚上');
INSERT INTO `course` VALUES ('35', '2', '晚上');

-- ----------------------------
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `date` date NOT NULL COMMENT '申请日期',
  `time` varchar(16) NOT NULL COMMENT '时间，上午，下午，晚上',
  `name` varchar(16) NOT NULL COMMENT '申请人',
  `num` varchar(11) NOT NULL COMMENT '学生号',
  `phone` varchar(11) NOT NULL,
  `email` varchar(26) NOT NULL,
  `check` tinyint(1) DEFAULT '1' COMMENT '审核意见，1为审核中，2为通过，3为不通过',
  `reason` varchar(200) DEFAULT NULL COMMENT '申请理由',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('1', '1', '2016-06-06', '上午', '黎子健', '20141002496', '18826103989', '1364137942@qq.com', '3', '计算机网络补课用');
INSERT INTO `order` VALUES ('2', '1', '2016-06-16', '下午', '黎子健', '20141002496', '18826103989', '1364137942@qq.com', '2', '开班会，急急急');
