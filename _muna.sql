/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50734 (5.7.34)
 Source Host           : localhost:3306
 Source Schema         : _muna

 Target Server Type    : MySQL
 Target Server Version : 50734 (5.7.34)
 File Encoding         : 65001

 Date: 09/10/2022 23:07:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bantuan
-- ----------------------------
DROP TABLE IF EXISTS `bantuan`;
CREATE TABLE `bantuan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bantuan
-- ----------------------------
BEGIN;
INSERT INTO `bantuan` (`id`, `nama`, `jenis`, `jumlah`, `created_at`, `updated_at`) VALUES (1, 'BLT', 'uang', 1000000, '2022-10-09 10:14:30', '2022-10-09 10:14:30');
INSERT INTO `bantuan` (`id`, `nama`, `jenis`, `jumlah`, `created_at`, `updated_at`) VALUES (3, 'Beras', 'Kg', 1000, '2022-10-09 10:32:45', '2022-10-09 10:33:10');
COMMIT;

-- ----------------------------
-- Table structure for kelompok
-- ----------------------------
DROP TABLE IF EXISTS `kelompok`;
CREATE TABLE `kelompok` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `komoditi` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `desa` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kelompok
-- ----------------------------
BEGIN;
INSERT INTO `kelompok` (`id`, `nama`, `komoditi`, `alamat`, `desa`, `created_at`, `updated_at`) VALUES (1, 'tani padi', 'padi', 'jl .....', 'alung', '2022-10-09 09:50:53', '2022-10-09 09:50:53');
COMMIT;

-- ----------------------------
-- Table structure for keluhan
-- ----------------------------
DROP TABLE IF EXISTS `keluhan`;
CREATE TABLE `keluhan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelompok_id` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `isi` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of keluhan
-- ----------------------------
BEGIN;
INSERT INTO `keluhan` (`id`, `kelompok_id`, `tgl`, `isi`, `created_at`, `updated_at`) VALUES (1, 1, '2022-10-09', '11111', '2022-10-09 14:44:51', '2022-10-09 14:45:28');
COMMIT;

-- ----------------------------
-- Table structure for penyuluh
-- ----------------------------
DROP TABLE IF EXISTS `penyuluh`;
CREATE TABLE `penyuluh` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `jkel` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of penyuluh
-- ----------------------------
BEGIN;
INSERT INTO `penyuluh` (`id`, `nama`, `jkel`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES (1, 'adi ray', 'L', '09876545678', 'jl manarap', '2022-10-09 09:58:51', '2022-10-09 09:59:27');
COMMIT;

-- ----------------------------
-- Table structure for permohonan
-- ----------------------------
DROP TABLE IF EXISTS `permohonan`;
CREATE TABLE `permohonan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelompok_id` int(11) DEFAULT NULL,
  `penyuluh_id` int(11) DEFAULT NULL,
  `bantuan_id` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permohonan
-- ----------------------------
BEGIN;
INSERT INTO `permohonan` (`id`, `kelompok_id`, `penyuluh_id`, `bantuan_id`, `tgl`, `created_at`, `updated_at`) VALUES (1, 1, 1, 1, '2022-10-10', '2022-10-09 10:31:03', '2022-10-09 10:31:03');
COMMIT;

-- ----------------------------
-- Table structure for role_users
-- ----------------------------
DROP TABLE IF EXISTS `role_users`;
CREATE TABLE `role_users` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  UNIQUE KEY `role_users_user_id_role_id_unique` (`user_id`,`role_id`) USING BTREE,
  KEY `role_users_role_id_foreign` (`role_id`) USING BTREE,
  CONSTRAINT `role_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of role_users
-- ----------------------------
BEGIN;
INSERT INTO `role_users` (`user_id`, `role_id`) VALUES (1, 1);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (1, 'superadmin', '2020-12-23 23:17:35', '2020-12-23 23:17:35');
COMMIT;

-- ----------------------------
-- Table structure for tanggapan
-- ----------------------------
DROP TABLE IF EXISTS `tanggapan`;
CREATE TABLE `tanggapan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `keluhan_id` int(11) DEFAULT NULL,
  `penyuluh_id` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `tindaklanjut` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tanggapan
-- ----------------------------
BEGIN;
INSERT INTO `tanggapan` (`id`, `keluhan_id`, `penyuluh_id`, `tgl`, `tindaklanjut`, `created_at`, `updated_at`) VALUES (1, 1, 1, '2022-10-10', 'ok', '2022-10-09 14:54:51', '2022-10-09 14:54:51');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL,
  `password_superadmin` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `api_token` varchar(255) DEFAULT NULL,
  `last_session` varchar(255) DEFAULT NULL,
  `change_password` int(1) unsigned DEFAULT '0' COMMENT '0: belum, 1: sudah',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_username_unique` (`username`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_superadmin`, `remember_token`, `created_at`, `updated_at`, `api_token`, `last_session`, `change_password`) VALUES (1, 'superadmin', NULL, 'superadmin', '2022-10-09 18:03:37', '$2y$10$3k7FLC2TkBzYnumOyiv7BOmTOsTzzJHb3/p4aKcBUoGonp4Jij0Wu', NULL, 'ZJgHX6SrJiShHc5jNh8BTOjBp3vZ03tQvNkxEzEsrzoDxLfbLnOYfG15npez', '2022-10-09 18:03:37', '2022-10-09 18:03:37', NULL, NULL, 0);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
