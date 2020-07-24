/*
Navicat MySQL Data Transfer

Source Server         : MiCumunidad
Source Server Version : 50647
Source Host           : 107.180.41.254:3306
Source Database       : newscol

Target Server Type    : MYSQL
Target Server Version : 50647
File Encoding         : 65001

Date: 2020-07-23 19:50:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for noticias
-- ----------------------------
DROP TABLE IF EXISTS `noticias`;
CREATE TABLE `noticias` (
  `not_clave_int` int(11) NOT NULL AUTO_INCREMENT,
  `not_titulo` varchar(100) NOT NULL,
  `not_imagen` text NOT NULL,
  `not_texto` text NOT NULL,
  `not_palabras` text NOT NULL,
  PRIMARY KEY (`not_clave_int`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `usu_clave_int` int(11) NOT NULL AUTO_INCREMENT,
  `usu_usuario` varchar(20) NOT NULL,
  `usu_clave` varchar(20) NOT NULL,
  `usu_correo` varchar(200) NOT NULL,
  PRIMARY KEY (`usu_clave_int`),
  UNIQUE KEY `usu_usuario` (`usu_usuario`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
