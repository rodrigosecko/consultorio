/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : activosfijos

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 03/05/2019 15:50:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activos
-- ----------------------------
DROP TABLE IF EXISTS `activos`;
CREATE TABLE `activos`  (
  `activo_id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `costo` double(40, 2) NULL DEFAULT NULL,
  `auxiliar_id` int(10) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `fecha_incorporacion` date NOT NULL COMMENT 'Fecha que se compro\r\n',
  `estado` int(11) NOT NULL COMMENT 'Estado del registro dentro la tabla:persona',
  `observaciones` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT 1 COMMENT 'Estado del registro dentro la tabla:persona',
  `usu_creacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fecha_creacion` datetime(0) NOT NULL COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fecha_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fecha_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`activo_id`) USING BTREE,
  INDEX `grupo_id`(`grupo_id`) USING BTREE,
  INDEX `auxiliar_id`(`auxiliar_id`) USING BTREE,
  CONSTRAINT `activos_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`grupo_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `activos_ibfk_2` FOREIGN KEY (`auxiliar_id`) REFERENCES `auxiliar` (`auxiliar_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for asignacion
-- ----------------------------
DROP TABLE IF EXISTS `asignacion`;
CREATE TABLE `asignacion`  (
  `asignacion_id` int(11) NOT NULL AUTO_INCREMENT,
  `activo_id` int(11) NOT NULL,
  `empleado_id` int(11) NULL DEFAULT NULL,
  `fecha_asign` date NULL DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT 1 COMMENT 'Estado del registro dentro la tabla:persona',
  `usu_creacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fecha_creacion` datetime(0) NOT NULL COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fecha_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fecha_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`asignacion_id`) USING BTREE,
  INDEX `activo_id`(`activo_id`) USING BTREE,
  INDEX `empleado_id`(`empleado_id`) USING BTREE,
  CONSTRAINT `asignacion_ibfk_1` FOREIGN KEY (`activo_id`) REFERENCES `activos` (`activo_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `asignacion_ibfk_2` FOREIGN KEY (`empleado_id`) REFERENCES `persona` (`persona_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for auxiliar
-- ----------------------------
DROP TABLE IF EXISTS `auxiliar`;
CREATE TABLE `auxiliar`  (
  `auxiliar_id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `grupo_id` int(11) NULL DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT 1 COMMENT 'Estado del registro dentro la tabla:persona',
  `usu_creacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fecha_creacion` datetime(0) NOT NULL COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fecha_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fecha_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`auxiliar_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1001 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of auxiliar
-- ----------------------------
INSERT INTO `auxiliar` VALUES (158, 'CONVERSOR', 24, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (239, 'MUEBLE PARA TELEVISO', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (242, 'EQUIPO DE SONIDO', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (244, 'MESCLADORA SONIDO', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (253, 'COMPACTERA CD', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (304, 'TRANSFORMADOR DE CORRIENTE', 24, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (317, 'PEDESTALES', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (327, 'GLOBO TERRAQUEO', 6, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (377, 'REGULADOR', 24, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (412, 'RECEPTOR', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (434, 'TITIRITERO', 6, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (435, 'PiZARRA', 6, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (445, 'MESCLADORA DE DISCOS', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (447, 'PODER', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (448, 'PEDESTAL', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (457, 'POLICOPIADORA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (497, 'MAQUINA ESCRIBIR', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (528, 'MUEBLE PARA TELEVISOR', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (539, 'CABALLETE', 6, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (540, 'TRAMPOLIN', 6, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (541, 'MESCLADORA', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (542, 'COMPACTERA', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (543, 'PODER DE SONIDO', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (549, 'PIZA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (555, 'INVERSOR', 24, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (556, 'PLAQUETA', 24, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (569, 'PLATILLOS', 6, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (575, 'EDIFICACION', 1, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (577, 'PUPITRE', 6, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (589, 'TROMPETA', 6, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (590, 'BARITONO', 6, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (591, 'TAMBOR', 6, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (592, 'BOMBO', 6, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (593, 'PLATILLO', 6, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (608, 'BLANCO', 15, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (611, 'CUNA DE INTERNACION', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (612, 'MESA DE PLANCHAR', 20, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (613, 'SOFA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (623, 'LICUADORA', 3, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (624, 'EXPRIMIDORA', 3, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (625, 'FILTRO DE AGUA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (631, 'MINICOMPONENTE', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (633, 'MEGAFONO', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (636, 'SILLON DENTAL', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (637, 'COMPRESOR DENTAL', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (638, 'RAYOS X', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (640, 'SOPORTE', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (642, 'ECOGRAFO', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (643, 'IMPRESORA ESPECIAL', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (644, 'DOPLER FETAL', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (647, 'TENSIOMETRO', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (648, 'ESTUFA', 3, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (652, 'BRONCO ASPIRADOR', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (653, 'CONTROLADOR ESPECIAL', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (654, 'COLCHON TERMICO', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (655, 'CAJA TOMA PAP', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (656, 'CAJA LEGRADO', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (657, 'CAJA DE PARTO', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (658, 'RESUCITADOR', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (661, 'SOPORTE DE PARTO', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (662, 'DETECTOR DE BILLETES', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (667, 'PIZARRA ESPECIAL', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (669, 'FREEZER ESPECIAL', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (670, 'VACIO', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (671, 'ESTANDARTE', 36, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (672, 'ECRAM', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (673, 'STAT FAX', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (674, 'LECTOR DE ELISAS', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (675, 'VORTEX', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (676, 'TIMER', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (677, 'PIPETA', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (678, 'MICROSCOPIO', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (679, 'CONTADOR HEMATOLOGICO', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (680, 'PORTA PIPETA', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (681, 'ESTUFA DE CULTIVO', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (682, 'ESTUFA DE ESTERILIZACION', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (683, 'BAÑO MARIA', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (684, 'CENTRIFUGADORA', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (685, 'SILLA TOMA DE MUESTRA', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (686, 'CASILLERO', 20, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (692, 'FREEZER', 20, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (696, 'HORNO', 3, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (697, 'AGITADOR', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (721, 'SLLA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (730, 'TARIMA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (733, 'CAMA INTERNACION', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (734, 'BIOMNBO', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (745, 'DOPPLEX', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (751, 'ROCIADORA', 13, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (755, 'RADIO DE COMUNICACIONES', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (756, 'REGULADOR ENERGIA', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (764, 'TRANSFORMADOR ENERGIA', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (769, 'MESA DE CURACIONES', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (775, 'HELADERA ESPECIAL', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (776, 'ESTERILIZADOR', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (778, 'CATRE DE INTERNACION', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (780, 'ROPERO', 20, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (783, 'TANQUE DE OXIGENO', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (784, 'CAMILLA GINEGOLOGICA', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (785, 'MESA ESPECIAL', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (800, 'CAMILLA DE EXAMINACION', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (806, 'CAMILLA GINECOLOGICA', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (812, 'DISPENSADOR', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (814, 'REGULADOR DE ENERGIA', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (821, 'REFRIGERADOR', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (830, 'CAMILLA DE INSPECCION', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (832, 'NEBULIZADOR', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (834, 'SILLON ODONTOLOGICO', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (835, 'COMPRESORA AIRE', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (836, 'TURBINA', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (853, 'AUTOCLAVE', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (859, 'EDIFICIOS', 1, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (867, 'BANCO', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (869, 'BALANZA', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (870, 'BIOMBO', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (871, 'CARRO DE CURACIONES', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (872, 'CAMILLA', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (873, 'GRADILLA', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (874, 'DOPLER', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (875, 'HELADERA', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (876, 'CATRE', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (877, 'SILLA DE RUEDAS', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (878, 'VELADOR', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (879, 'PORTA SUEROS', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (880, 'LAMPARA', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (882, 'ESTUFA ELECTRICA', 24, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (895, 'BUZON', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (896, 'MUEBLE PARA COMPUTADORA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (897, 'GABETERO', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (902, 'UPS', 15, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (903, 'SCANNER', 15, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (906, 'TERMOVENTILADORA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (909, 'LECTOR DE HUELLAS', 15, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (911, 'TRANSFORMADOR', 15, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (912, 'CUADRO', 36, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (913, 'MUEBLE DE AVISOS', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (914, 'RIFLE', 36, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (915, 'CAMARA FOTOGRAFICA', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (916, 'GPS', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (917, 'SILLON', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (918, 'TABURETE', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (919, 'CALCULADORA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (920, 'HANDYS', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (921, 'ESTACION TOTAL', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (922, 'TRIPODE', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (923, 'PORTA PRIMA', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (924, 'PRISMA', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (925, 'BALANZA DE PRESICION', 3, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (926, 'CORTADORA CESPED', 3, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (927, 'CAMARA FILMADORA', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (928, 'BICICLETA', 3, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (931, 'VHS', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (932, 'PANEL SOLAR', 24, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (933, 'CARGADOR DE BATERIA', 24, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (934, 'FUMIGADORA', 3, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (935, 'CONVERSOR ENERGIA PARA RADIO', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (937, 'CODIFICADOR', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (938, 'PARLANTE', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (939, 'COCINA', 3, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (940, 'TALLIMETRO', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (941, 'MOTOR GENERADOR', 24, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (942, 'MESA MEDIA HEXAGONAL', 6, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (943, 'TRANSMISOR DE TV', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (945, 'ARCO OXIGENO', 3, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (946, 'TALADRO', 3, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (947, 'AMOLADORA', 3, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (948, 'MEDIDOR DE PRESION', 3, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (949, 'PRENSA HIDRAULICA', 3, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (950, 'GATA HIDRAULICA', 3, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (951, 'KIT DE HERRAMIENTAS', 3, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (952, 'CAMA DE INTERNACION', 4, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (953, 'SILLA ESPECIAL', 6, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (954, 'EDIFICIO', 1, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (955, 'TERRENO', 34, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (956, 'VAGONETA', 8, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (957, 'MOTOCICLETA', 8, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (958, 'CAMIONETA', 8, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (959, 'TRACTOR AGRICOLA', 11, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (960, 'TRACTOR ORUGA', 10, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (961, 'TRACTOR RETROEXCAVADORA', 10, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (962, 'COMPRESORA', 10, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (963, 'MARTILLO', 10, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (964, 'HUB', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (965, 'GILLOTINA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (972, 'LIVING', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (973, 'SILLA GIRATORIA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (974, 'MAQUINA DE ESCRIBIR', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (975, 'ANILLADORA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (976, 'GUILLOTINA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (977, 'FOTOCOPIADORA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (978, 'PIZARRA', 6, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (981, 'IMPRESORA', 15, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (982, 'ESTABILIZADOR', 15, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (983, 'COMPUTADORA PORTATIL', 15, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (984, 'ESTABILIZADOR DE FOTOCOPIADORA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (985, 'RADIO', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (986, 'PROYECTORA', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (987, 'CAMARA', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (988, 'CUADRATRACK', 8, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (989, 'ESCRITORIO', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (990, 'ESTANTE', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (991, 'VITRINA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (992, 'SILLA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (993, 'MESA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (994, 'MUEBLE DE COMPUTADORA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (995, 'BANQUETA', 2, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (996, 'TELEVISOR', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (997, 'PROYECTOR', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (998, 'DVD', 5, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (999, 'CPU', 15, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `auxiliar` VALUES (1000, 'MONITOR', 15, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);

-- ----------------------------
-- Table structure for bajas
-- ----------------------------
DROP TABLE IF EXISTS `bajas`;
CREATE TABLE `bajas`  (
  `baja_id` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_baja` date NOT NULL,
  `activo_id` int(11) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1 COMMENT 'Estado del registro dentro la tabla:persona',
  `usu_creacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fecha_creacion` datetime(0) NOT NULL COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fecha_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fecha_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`baja_id`) USING BTREE,
  INDEX `activo_id`(`activo_id`) USING BTREE,
  CONSTRAINT `bajas_ibfk_1` FOREIGN KEY (`activo_id`) REFERENCES `activos` (`activo_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for cargos
-- ----------------------------
DROP TABLE IF EXISTS `cargos`;
CREATE TABLE `cargos`  (
  `cargo_id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT 1 COMMENT 'Estado del registro dentro la tabla:persona',
  `usu_creacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fecha_creacion` datetime(0) NOT NULL COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fecha_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fecha_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`cargo_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cargos
-- ----------------------------
INSERT INTO `cargos` VALUES (1, 'Gerente General', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `cargos` VALUES (2, 'Jefe de Unidad', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `cargos` VALUES (4, 'Encargado de Sistemas', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `cargos` VALUES (20, 'Tecnico en Desarrollo de Sistemas IV', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);

-- ----------------------------
-- Table structure for credencial
-- ----------------------------
DROP TABLE IF EXISTS `credencial`;
CREATE TABLE `credencial`  (
  `credencial_id` int(11) NOT NULL AUTO_INCREMENT,
  `persona_perfil_id` int(11) NULL DEFAULT NULL,
  `rol_id` int(11) NULL DEFAULT NULL,
  `usuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `contrasenia` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `url` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `usu_creacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fecha_creacion` datetime(0) NOT NULL COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fecha_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fecha_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`credencial_id`) USING BTREE,
  INDEX `fk_credencial_persona_perfil`(`persona_perfil_id`) USING BTREE,
  INDEX `fk_credencial_rol`(`rol_id`) USING BTREE,
  CONSTRAINT `credencial_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rol_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of credencial
-- ----------------------------
INSERT INTO `credencial` VALUES (3, 8, 6, 'admin', '12345', '0', NULL, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `credencial` VALUES (10, 1, 6, 'cristian', '', '0', NULL, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `credencial` VALUES (18, 79, 6, 'elmer.secko', '6751497', NULL, NULL, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `credencial` VALUES (19, 79, 6, 'elmer.secko', '6751497', NULL, NULL, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `credencial` VALUES (20, 79, 6, 'elmer.secko', '6751497', NULL, NULL, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `credencial` VALUES (21, NULL, NULL, 'elmer.secko', '6751497', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2019-04-25 23:03:00', NULL, NULL);

-- ----------------------------
-- Table structure for depreciacion
-- ----------------------------
DROP TABLE IF EXISTS `depreciacion`;
CREATE TABLE `depreciacion`  (
  `depreciacion_id` int(11) NOT NULL,
  `activo_id` int(11) NULL DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT 1 COMMENT 'Estado del registro dentro la tabla:persona',
  `usu_creacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fecha_creacion` datetime(0) NOT NULL COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fecha_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fecha_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`depreciacion_id`) USING BTREE,
  INDEX `activo_id`(`activo_id`) USING BTREE,
  CONSTRAINT `depreciacion_ibfk_1` FOREIGN KEY (`activo_id`) REFERENCES `activos` (`activo_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for devolucion
-- ----------------------------
DROP TABLE IF EXISTS `devolucion`;
CREATE TABLE `devolucion`  (
  `devolucion_id` int(11) NOT NULL AUTO_INCREMENT,
  `activo_id` int(11) NOT NULL,
  `empleado_id` int(11) NULL DEFAULT NULL,
  `fecha_devolucion` date NULL DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT 1 COMMENT 'Estado del registro dentro la tabla:persona',
  `motivo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usu_creacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fecha_creacion` datetime(0) NOT NULL COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fecha_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fecha_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`devolucion_id`) USING BTREE,
  INDEX `activo_id`(`activo_id`) USING BTREE,
  INDEX `empleado_id`(`empleado_id`) USING BTREE,
  CONSTRAINT `devolucion_ibfk_1` FOREIGN KEY (`activo_id`) REFERENCES `activos` (`activo_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `devolucion_ibfk_2` FOREIGN KEY (`empleado_id`) REFERENCES `persona` (`persona_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for empresa
-- ----------------------------
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa`  (
  `empresa_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `nit` int(50) NOT NULL,
  `ciudad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `telefono` int(20) NOT NULL,
  `fecha_creacion_emp` date NOT NULL,
  `activo` int(2) NOT NULL DEFAULT 1,
  `usu_creacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fecha_creacion` datetime(0) NOT NULL COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fecha_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fecha_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`empresa_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of empresa
-- ----------------------------
INSERT INTO `empresa` VALUES (1, 'Constructora Consorcio Ryuno Noeval', 'Av. McaI. Santa Cruz - Edif. La Primera - P.8 Bloque A', 2147483647, 'la paz', 2900444, '2019-04-05', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);

-- ----------------------------
-- Table structure for estado
-- ----------------------------
DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado`  (
  `estado_id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`estado_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of estado
-- ----------------------------
INSERT INTO `estado` VALUES (1, 'NUEVO');
INSERT INTO `estado` VALUES (2, 'BUENO');
INSERT INTO `estado` VALUES (3, 'REGULAR');
INSERT INTO `estado` VALUES (4, 'MALO');
INSERT INTO `estado` VALUES (5, 'OBSOLETO/PESIMO');

-- ----------------------------
-- Table structure for grupo
-- ----------------------------
DROP TABLE IF EXISTS `grupo`;
CREATE TABLE `grupo`  (
  `grupo_id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `vida_util` int(10) NULL DEFAULT NULL,
  `coeficiente` double(255, 2) NULL DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT 1 COMMENT 'Estado del registro dentro la tabla:persona',
  `usu_creacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fecha_creacion` datetime(0) NOT NULL COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fecha_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fecha_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`grupo_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of grupo
-- ----------------------------
INSERT INTO `grupo` VALUES (1, 'EDIFICACIONES', 40, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (2, 'MUEBLES Y ENSERES DE OFICINA', 10, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (3, 'MAQUINARIA EN GENERAL', 8, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (4, 'EQUIPO MEDICO Y DE LABORATORIO', 8, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (5, 'EQUIPO DE COMUNICACIONES', 8, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (6, 'EQUIPO EDUCACIONAL Y RECREATIVO', 8, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (7, 'BARCOS Y LANCHAS EN GENERAL', 10, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (8, 'VEHICULOS AUTOMOTORES', 5, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (9, 'AVIONES', 5, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (10, 'MAQUINARIA PARA LA CONSTRUCCION', 5, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (11, 'MAQUINARIA AGRICOLA', 4, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (12, 'ANIMALES DE TRABAJO', 4, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (13, 'HERRAMIENTAS EN GENERAL', 4, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (14, 'REPRODUCTORES Y HEMBRAS DE PEDIGREE', 8, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (15, 'EQUIPOS DE COMPUTACION', 4, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (16, 'CANALES DE REGADIO Y POZOS', 20, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (17, 'ESTANQUES, BAÑADEROS Y ABREVADEROS', 10, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (18, 'ALAMBRADOS, TRANQUERAS Y VALLAS', 10, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (19, 'VIVIENDAS PARA EL PERSONAL', 20, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (20, 'MUEBLES Y ENSERES EN VIVIENDAS DE PERSONAL', 10, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (21, 'SILOS, ALMACENES Y GALPONES', 20, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (22, 'TINGLADOS Y COBERTIZOS DE MADERA', 5, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (23, 'TINGLADOS Y COBERTIZOS DE METAL', 10, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (24, 'INSTALACION DE ELECTRIFICACION Y TELEFONIA RURAL', 10, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (25, 'CAMINOS INTERIORES', 10, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (26, 'CAÑA DE AZUCAR', 5, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (27, 'VIDES', 8, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (28, 'FRUTALES', 10, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (29, 'POZOS PETROLEROS', 5, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (30, 'LINEAS DE RECOLECCION DE LA INDUSTRIA PETROLERA', 5, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (31, 'EQUIPOS DE CAMPO DE LA INDUSTRIA PETROLERA', 8, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (32, 'PLANTA DE PROCESAMIENTO DE LA INDUSTRIA PETROLERA', 8, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (33, 'DUCTOS DE LA INDUSTRIA PETROLERA', 10, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (34, 'TERRENOS', 0, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (35, 'OTROS ACTIVOS FIJOS', 0, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (36, 'ACTIVOS INTANGIBLES', 5, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `grupo` VALUES (37, 'EQUIPO E INSTALACIONES', 8, NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona`  (
  `persona_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla:persona',
  `nombres` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'Nombre o nombres de la persona',
  `paterno` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'Apellido paterno de la persona',
  `materno` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'Apellido paterno de la persona',
  `ci` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'Cedula de identidad de la persona',
  `fec_nacimiento` date NOT NULL COMMENT 'Fecha de nacimiento de la persona',
  `telefono` int(11) NOT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `fec_incorporacion` date NOT NULL,
  `cargo_id` int(11) NULL DEFAULT NULL,
  `unidad_id` int(11) NULL DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT 1 COMMENT 'Estado del registro dentro la tabla:persona',
  `padre_id` int(11) NULL DEFAULT NULL,
  `nivel` int(11) NULL DEFAULT NULL,
  `usu_creacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fecha_creacion` datetime(0) NOT NULL COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fecha_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fecha_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`persona_id`) USING BTREE,
  INDEX `cargo_id`(`cargo_id`) USING BTREE,
  INDEX `unidad_id`(`unidad_id`) USING BTREE,
  CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`cargo_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`unidad_id`) REFERENCES `unidad` (`unidad_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 81 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin COMMENT = 'Tabla:persona que guarda los datos de las personas involucradas con el sistema' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of persona
-- ----------------------------
INSERT INTO `persona` VALUES (1, 'CRISTIAN', 'CHAMBY', 'SALINAS', '9112739', '1992-10-20', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (4, 'Jacqueline Ninosca', 'Hinojosa', 'Villegas', '8304382', '1992-03-10', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (20, 'Pedro', 'Torrez', 'Vargas', '2587413', '2000-06-10', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (22, 'Ricardo', 'Vargas', 'Tapia', '5471236', '2001-05-10', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (25, 'Pablo', 'Duran', 'Ramos', '9865742', '1995-03-10', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (26, 'Jose Jose', 'Perez', 'Perez', '78784079', '1992-03-12', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (33, 'stefania', 'cordero', 'maydana', '10913746', '1993-07-13', 0, '', '0000-00-00', 20, 1, 1, 60, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (41, 'marco', 'chamby', 'quiroga', '32132132', '1970-01-12', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (43, 'Gonzalo', 'Teran', 'Vega', '2258963', '1988-01-28', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (44, 'pedro ariel', 'fernandez', 'ali', '7896542', '1990-02-01', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (45, 'Ruth', 'Conde', 'Sarzuri', '8574963', '1998-10-10', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (48, 'Administrador', 'Administrador', 'Administrador', '985452112', '1981-02-10', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (53, 'Rocio', 'Medina', 'Montes', '9874563', '2000-04-10', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (54, 'Luis', 'Tarqui', 'Luna', '1234567', '1980-08-10', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (57, 'libia', 'salinas', 'cuajara', '9845632', '1980-02-24', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (60, 'Fabianny', 'Vega', 'Peralta', '4332051', '1900-01-01', 0, '', '0000-00-00', 20, 1, 1, 0, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (61, 'Milton', 'Romero', 'Burgos', '1236547', '1992-12-12', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (71, 'Renato', 'Gonzales', 'Ortuño', '6547893', '1996-06-13', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (72, 'julio', 'alvarez', 'alvarez', '87878778', '1980-10-13', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (73, 'grover', 'aliaga', 'aliaga', '78787878', '1980-12-12', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (75, 'Pablo', 'Gutierrez', 'Flores', '98745632', '2011-11-11', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (76, 'Jhonny', 'Mendoza', 'Machicado', '8965741', '1990-11-12', 0, '', '0000-00-00', 20, 1, 1, 0, 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (78, 'aldo Mauricio', 'Secko', 'Flores', '6751497', '2019-04-21', 222232323, 'calle san jose #59 Zona Vino Tinto', '2019-04-21', 20, 1, 1, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (79, 'Elmer Rodrigo', 'Secko', 'Flores', '6751497', '2019-04-21', 6531111, 'Calle San Jose #59 Zona Vino Tiinto', '2019-04-21', 20, 1, 1, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `persona` VALUES (80, 'Elmer Rodrigo', 'Secko', 'Flores', '6751497', '2019-04-14', 666, 'Calle San Jose #59 Zona Vino Tiinto', '2019-04-21', 2, 1, 1, NULL, NULL, NULL, NULL, NULL, '2019-04-25 23:03:00', NULL, NULL);

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol`  (
  `rol_id` int(11) NOT NULL,
  `rol` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `activo` int(11) NOT NULL,
  `usu_creacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fecha_creacion` datetime(0) NOT NULL COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fecha_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fecha_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`rol_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO `rol` VALUES (0, 'Ninguno', 0, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `rol` VALUES (1, 'Leer', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `rol` VALUES (2, 'Escribir', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `rol` VALUES (3, 'Crear', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `rol` VALUES (4, 'Guardar ', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `rol` VALUES (5, 'Navegar', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `rol` VALUES (6, 'Aprobar', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `rol` VALUES (7, 'Todo', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);

-- ----------------------------
-- Table structure for unidad
-- ----------------------------
DROP TABLE IF EXISTS `unidad`;
CREATE TABLE `unidad`  (
  `unidad_id` int(11) NOT NULL AUTO_INCREMENT,
  `padre_id` int(11) NOT NULL,
  `nombre_unidad` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `empresa_id` int(11) NULL DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT 1 COMMENT 'Estado del registro dentro la tabla:persona',
  `nivel` int(255) NULL DEFAULT NULL,
  `usu_creacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que creo el registro dentro la tabla:persona',
  `usu_modificacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que modifico el registro dentro la tabla:persona',
  `usu_eliminacion` int(11) NULL DEFAULT NULL COMMENT 'Usuario que elimino el registro dentro la tabla:persona',
  `fecha_creacion` datetime(0) NOT NULL COMMENT 'Fecha que se creo el registro dentro la tabla:persona',
  `fecha_modificacion` datetime(0) NULL DEFAULT NULL COMMENT 'Fecha que se modifico el registro dentro la tabla:persona',
  `fecha_eliminacion` datetime(0) NULL DEFAULT NULL COMMENT 'fecha que se elimino el registro dentro la tabla:persona',
  PRIMARY KEY (`unidad_id`) USING BTREE,
  INDEX `empresa_id`(`empresa_id`) USING BTREE,
  CONSTRAINT `unidad_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`empresa_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of unidad
-- ----------------------------
INSERT INTO `unidad` VALUES (1, 1, 'Despacho', NULL, 1, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `unidad` VALUES (2, 1, 'almacen', NULL, 1, 2, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `unidad` VALUES (3, 1, 'contabilidad', NULL, 1, 2, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `unidad` VALUES (4, 1, 'sistemas', NULL, 1, 2, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `unidad` VALUES (5, 4, 'desarrollo', NULL, 1, 3, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `unidad` VALUES (6, 1, 'recursos humanos', NULL, 1, 2, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
