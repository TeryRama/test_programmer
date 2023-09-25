/*
 Navicat Premium Data Transfer

 Source Server         : localMysql
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : test

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 25/09/2023 10:52:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id_kategori` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'L QUEENLY', '2023-09-24 09:27:19', '2023-09-24 09:27:19');
INSERT INTO `kategori` VALUES (2, 'L MTH AKSESORIS (IM)', '2023-09-24 09:34:29', '2023-09-24 09:34:29');
INSERT INTO `kategori` VALUES (3, 'L MTH TABUNG (LK)', '2023-09-24 09:34:29', '2023-09-24 09:34:29');
INSERT INTO `kategori` VALUES (4, 'SP MTH SPAREPART (LK)', '2023-09-24 09:34:29', '2023-09-24 09:34:29');
INSERT INTO `kategori` VALUES (5, 'CI MTH TINTA LAIN (IM)', '2023-09-24 09:34:29', '2023-09-24 09:34:29');
INSERT INTO `kategori` VALUES (6, 'L MTH AKSESORIS (LK)', '2023-09-24 09:34:29', '2023-09-24 09:34:29');
INSERT INTO `kategori` VALUES (7, 'S MTH STEMPEL (IM)', '2023-09-24 09:34:29', '2023-09-24 09:34:29');

-- ----------------------------
-- Table structure for produk
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk`  (
  `id_produk` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` decimal(15, 2) NOT NULL,
  `id_kategori` int UNSIGNED NULL DEFAULT NULL,
  `id_status` int UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_produk`) USING BTREE,
  INDEX `kategori_id`(`id_kategori` ASC) USING BTREE,
  INDEX `status_id`(`id_status` ASC) USING BTREE,
  CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES (1, 'ALCOHOL GEL POLISH CLEANSER GP-CLN01', 12500.00, 1, 1, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (2, 'ALUMUNIUM FOIL ALL IN ONE BULAT 23mm IM', 1000.00, 2, 1, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (3, 'ALUMUNIUM FOIL ALL IN ONE BULAT 30mm IM', 1000.00, 2, 1, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (4, 'ALUMUNIUM FOIL ALL IN ONE SHEET 250mm IM', 12500.00, 2, 2, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (5, 'ALUMUNIUM FOIL HDPE/PE BULAT 23mm IM', 12500.00, 2, 1, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (6, 'ALUMUNIUM FOIL HDPE/PE BULAT 30mm IM', 1000.00, 2, 1, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (7, 'ALUMUNIUM FOIL HDPE/PE SHEET 250mm IM', 13000.00, 2, 2, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (8, 'ALUMUNIUM FOIL PET SHEET 250mm IM', 1000.00, 2, 2, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (9, 'ARM PENDEK MODEL U', 13000.00, 2, 1, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (10, 'ARM SUPPORT KECIL', 13000.00, 3, 2, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (11, 'ARM SUPPORT KOTAK PUTIH', 13000.00, 2, 2, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (12, 'ARM SUPPORT PENDEK POLOS', 13000.00, 3, 1, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (13, 'ARM SUPPORT S IM', 1000.00, 2, 2, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (14, 'ARM SUPPORT T (IMPORT)', 13000.00, 2, 1, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (15, 'ARM SUPPORT T - MODEL 1 ( LOKAL )', 10000.00, 3, 1, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (16, 'BLACK LASER TONER FP-T3 (100gr)', 13000.00, 2, 2, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (17, 'BODY PRINTER CANON IP2770', 500.00, 4, 1, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (18, 'BODY PRINTER T13X', 15000.00, 4, 1, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (19, 'BOTOL 1000ML BLUE KHUSUS UNTUK EPSON R1800/R800 - 4180 IM (T054920)', 10000.00, 5, 1, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (20, 'BOTOL 1000ML CYAN KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4120 IM (T054220)', 10000.00, 5, 2, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (21, 'BOTOL 1000ML GLOSS OPTIMIZER KHUSUS UNTUK EPSON R1800/R800/R1900/R2000/IX7000/MG6170 - 4100 IM (T054020)', 1500.00, 5, 1, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (22, 'BOTOL 1000ML L.LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0599 IM', 1500.00, 5, 2, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (23, 'BOTOL 1000ML LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0597 IM', 1500.00, 5, 2, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (24, 'BOTOL 1000ML MAGENTA KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4140 IM (T054320)', 1000.00, 5, 1, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (25, 'BOTOL 1000ML MATTE BLACK KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 3503 IM (T054820)', 1500.00, 5, 2, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (26, 'BOTOL 1000ML ORANGE KHUSUS UNTUK EPSON R1900/R2000 IM - 4190 (T087920)', 1500.00, 5, 1, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (27, 'BOTOL 1000ML RED KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4170 IM (T054720)', 1000.00, 5, 2, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (28, 'BOTOL 1000ML YELLOW KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4160 IM (T054420)', 1500.00, 5, 2, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (29, 'BOTOL KOTAK 100ML LK', 1000.00, 6, 1, '2023-09-24 11:36:42', '2023-09-24 11:36:42');
INSERT INTO `produk` VALUES (30, 'BOTOL 10ML IM', 1000.00, 7, 2, '2023-09-24 11:36:42', '2023-09-24 11:36:42');

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `id_status` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_status`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (1, 'bisa dijual', '2023-09-24 09:34:29', '2023-09-24 09:34:29');
INSERT INTO `status` VALUES (2, 'tidak bisa dijual', '2023-09-24 09:34:29', '2023-09-24 09:34:29');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
