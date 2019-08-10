/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : consultorio

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 10/08/2019 13:18:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cita
-- ----------------------------
DROP TABLE IF EXISTS `cita`;
CREATE TABLE `cita`  (
  `id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `id_doctor` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha` datetime(0) NOT NULL,
  PRIMARY KEY (`id_cita`) USING BTREE,
  INDEX `id_doctor`(`id_doctor`) USING BTREE,
  INDEX `id_paciente`(`id_paciente`) USING BTREE,
  CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctor` (`id_doctor`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for credencial
-- ----------------------------
DROP TABLE IF EXISTS `credencial`;
CREATE TABLE `credencial`  (
  `credencial_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '(PK) Llave primaria de la tabla:credencial',
  `id_doctor` int(11) NOT NULL COMMENT '(FK) Llave foranea de la tabla:persona_perfil',
  `rol_id` int(11) NOT NULL COMMENT '(FK) Llave foranea de la tabla:rol',
  `usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de usuario para acceder al sistema',
  `contrasenia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Contraseña para acceder al sistema',
  `avatar` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Representacion grafica de alguna persona',
  `activo` int(11) NOT NULL DEFAULT 1 COMMENT 'Estado del registro dentro la tabla:credencial',
  PRIMARY KEY (`credencial_id`) USING BTREE,
  INDEX `fk_credencial_rol`(`rol_id`) USING BTREE,
  INDEX `doctor_id`(`id_doctor`) USING BTREE,
  CONSTRAINT `credencial_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctor` (`id_doctor`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci COMMENT = 'Tabla:persona_perfil que guarda la relacion entre las tablas persona y perfil' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of credencial
-- ----------------------------
INSERT INTO `credencial` VALUES (1, 1, 6, 'admin', '12345', '', 1);
INSERT INTO `credencial` VALUES (2, 1, 1, 'asd', '1111', NULL, 0);
INSERT INTO `credencial` VALUES (3, 1, 1, 'asd', '666', NULL, 0);
INSERT INTO `credencial` VALUES (4, 11, 1, 'df', '12313131', NULL, 1);

-- ----------------------------
-- Table structure for doctor
-- ----------------------------
DROP TABLE IF EXISTS `doctor`;
CREATE TABLE `doctor`  (
  `id_doctor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ap_paterno` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ap_materno` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ci` int(11) NOT NULL,
  `id_especialidad` int(1) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `activo` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_doctor`) USING BTREE,
  INDEX `id_especialidad`(`id_especialidad`) USING BTREE,
  CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of doctor
-- ----------------------------
INSERT INTO `doctor` VALUES (1, 'admin', 'admin', 'admin', 12345, 2, 12345687, 'asd', 1);
INSERT INTO `doctor` VALUES (2, 'rodrigos', 'xds', 'xds', 123131310, 1, 684247660, 'Av. McaI. Santa Cruz - Edif. La Primera - P.8 Bloque A', 1);
INSERT INTO `doctor` VALUES (11, 'df', 'df', 'df', 12313131, 2, 68424766, 'Av. McaI. Santa Cruz - Edif. La Primera - P.8 Bloque A', 0);

-- ----------------------------
-- Table structure for especialidad
-- ----------------------------
DROP TABLE IF EXISTS `especialidad`;
CREATE TABLE `especialidad`  (
  `id_especialidad` int(3) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  INDEX `id_esp`(`id_especialidad`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of especialidad
-- ----------------------------
INSERT INTO `especialidad` VALUES (1, 'Endodoncia');
INSERT INTO `especialidad` VALUES (2, 'Cirugía oral y maxilofacial');
INSERT INTO `especialidad` VALUES (3, 'Radiología oral y maxilofacial');
INSERT INTO `especialidad` VALUES (4, 'Ortodoncia');
INSERT INTO `especialidad` VALUES (5, 'Prostodoncia');
INSERT INTO `especialidad` VALUES (6, 'Odontopediatría');
INSERT INTO `especialidad` VALUES (7, 'Periodoncia');
INSERT INTO `especialidad` VALUES (8, 'Patología oral y maxilofacial');

-- ----------------------------
-- Table structure for historial
-- ----------------------------
DROP TABLE IF EXISTS `historial`;
CREATE TABLE `historial`  (
  `id_historial` int(11) NOT NULL AUTO_INCREMENT,
  `id_doctor` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `costo` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `diagnostico` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tratamiento` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_historial`) USING BTREE,
  INDEX `id_doctor`(`id_doctor`) USING BTREE,
  INDEX `id_paciente`(`id_paciente`) USING BTREE,
  CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctor` (`id_doctor`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for paciente
-- ----------------------------
DROP TABLE IF EXISTS `paciente`;
CREATE TABLE `paciente`  (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ap_paterno` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ap_materno` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ci` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `activo` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_paciente`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of paciente
-- ----------------------------
INSERT INTO `paciente` VALUES (1, 'rodrigo', 'secko', 'flores', 6751497, 123456, 'av baltazar', '2019-08-08', 1);
INSERT INTO `paciente` VALUES (2, 'xd', 'xd', 'xd', 12313131, 68424766, 'Av. McaI. S', '0000-00-00', 0);

SET FOREIGN_KEY_CHECKS = 1;
