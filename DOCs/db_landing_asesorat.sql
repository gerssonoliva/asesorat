/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : localhost:3306
 Source Schema         : db_landing_asesorat

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 31/08/2020 10:52:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for suscriptor
-- ----------------------------
DROP TABLE IF EXISTS `suscriptor`;
CREATE TABLE `suscriptor`  (
  `suscriptor_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `carrera` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `celular` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `grado` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `estado` smallint NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`suscriptor_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of suscriptor
-- ----------------------------
INSERT INTO `suscriptor` VALUES (5, 'Gerson Oliva Remigio', 'Ing. de Sistemas', '969281666', 'Bachiller', 'gerssonoliva@gmail.com', 1, '2020-08-29 13:08:06');
INSERT INTO `suscriptor` VALUES (6, 'Brayan Oliva Remigio', 'Ing. Civil subido desde server', '987654321', 'Bachiller', 'brayanoliva@gmail.com', 1, '2020-08-29 13:08:22');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apellidos` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `estado` smallint NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Armando', 'Pisfil Puemape', 'armandoaepp@gmail.com', '7b64d09060db17ca6b96c0af99575903', 1, '2018-07-05 15:07:03');
INSERT INTO `user` VALUES (2, 'Asesorat', 'Chiclayo', 'asesoratchiclayo@gmail.com', '60a0de1b687288bed0e4263e692d049e', 1, '0000-00-00 00:00:00');

SET FOREIGN_KEY_CHECKS = 1;
