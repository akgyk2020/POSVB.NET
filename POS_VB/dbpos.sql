/*
 Navicat Premium Data Transfer

 Source Server         : app_db_POS
 Source Server Type    : MariaDB
 Source Server Version : 100407
 Source Host           : localhost:3306
 Source Schema         : dbpos

 Target Server Type    : MariaDB
 Target Server Version : 100407
 File Encoding         : 65001

 Date: 11/07/2021 00:16:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2021_07_04_061950_create_product_table', 2);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('akgbs@gmail.com', '$2y$10$xalJ4lLGjDD43PQjRNZ0De9SZTxmB3vnjCA/YBXBUFH5xAGcLHvyS', '2021-07-08 08:33:13');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `plu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_id` varchar(151) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `discount_price` int(20) NULL DEFAULT NULL,
  `price_1` int(20) NULL DEFAULT NULL,
  `price_2` int(20) NULL DEFAULT NULL,
  `price_3` int(20) NULL DEFAULT NULL,
  `user_id` int(8) NULL DEFAULT NULL,
  `supp_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (1, '101', 'A', 'Scanner', 'b2567ad1d0f378e00a92c43fedfe8e39', 'Scanner', 20, 1000, 50, 100, 200, 300, 1, 3, '2021-07-04 10:33:51', '2021-07-04 10:33:51');
INSERT INTO `product` VALUES (2, '102', 'B', 'Keyboard', 'b2567ad1d0f378e00a92c43fedfe8e39', 'Keyboard', 90, 2000, 100, 200, 400, 600, 1, 3, '2021-07-04 10:45:32', '2021-07-04 10:45:32');
INSERT INTO `product` VALUES (3, '103', 'C', 'Handphone', 'b2567ad1d0f378e00a92c43fedfe8e39', 'Handphone', 2, 7000, 350, 700, 1400, 2100, 1, 3, '2021-07-04 10:46:05', '2021-07-04 10:46:05');
INSERT INTO `product` VALUES (4, '104', 'A', 'Baru Buat', 'b2567ad1d0f378e00a92c43fedfe8e39', 'Baru Buat', 5, 45000, 2250, 4500, 9000, 13500, 1, 2, '2021-07-04 10:48:21', '2021-07-04 10:48:21');
INSERT INTO `product` VALUES (5, '105', 'C', 'Mouse', '3e5007deda83429744b450121bf5da65', 'Mouse', 2, 44000, 2200, 4400, 8800, 13200, 1, 2, '2021-07-04 10:46:05', '2021-07-04 10:46:05');
INSERT INTO `product` VALUES (6, '106', 'B', 'LCD', '3e5007deda83429744b450121bf5da65', 'LCD', 2, 12000, 600, 1200, 2400, 3600, 1, 1, '2021-07-04 10:46:05', '2021-07-04 10:46:05');
INSERT INTO `product` VALUES (7, '107', 'C', 'Digital scanner', '3e5007deda83429744b450121bf5da65', 'Digital scanner', 2, 7500, 375, 750, 1500, 2250, 1, 1, '2021-07-04 10:46:05', '2021-07-04 10:46:05');
INSERT INTO `product` VALUES (8, '108', 'D', 'DVD Blank', '3e5007deda83429744b450121bf5da65', 'DVD Blank', 10, 23000, 1150, 2300, 4600, 6900, 1, 1, '2021-07-04 14:01:04', '2021-07-04 14:01:04');
INSERT INTO `product` VALUES (9, '3', '4', '5', '3e5007deda83429744b450121bf5da65', '6', 7, 8, 9, 10, 11, 12, 1, 2, '2021-07-07 07:05:25', '2021-07-07 07:05:25');
INSERT INTO `product` VALUES (10, '1', '1', '1', '8c6be3c957e83b58d51b4d583bb11fe0', '1', 1, 1, 1, 1, 1, 1, 1, 1, '2021-07-09 23:24:30', '2021-07-09 23:24:30');

-- ----------------------------
-- Table structure for product_xx
-- ----------------------------
DROP TABLE IF EXISTS `product_xx`;
CREATE TABLE `product_xx`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `plu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(14) NOT NULL,
  `price` int(14) NOT NULL,
  `discount_price` int(20) NULL DEFAULT NULL,
  `price_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `price_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `price_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_id` int(8) NULL DEFAULT NULL,
  `supp_id` int(11) NULL DEFAULT NULL,
  `tag_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_xx
-- ----------------------------
INSERT INTO `product_xx` VALUES (1, '101', 'Scanner', 'b2567ad1d0f378e00a92c43fedfe8e39', 'b2567ad1d0f378e00a92c43fedfe8e39', 18, 2000000, 20, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-04 10:33:51', '2021-07-04 10:33:51');
INSERT INTO `product_xx` VALUES (2, '102', 'Keyboard', '5d9cc257534dc5f6f81fbba1f1446392', '5d9cc257534dc5f6f81fbba1f1446392', 90, 90, 90, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-04 10:45:32', '2021-07-04 10:45:32');
INSERT INTO `product_xx` VALUES (3, '103', 'name', '09081c4eb8623070c4e32cbf79109fa2', '09081c4eb8623070c4e32cbf79109fa2', 10, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-04 10:46:05', '2021-07-04 10:46:05');
INSERT INTO `product_xx` VALUES (4, '104', 'Baru Buat', '3e5007deda83429744b450121bf5da65', '3e5007deda83429744b450121bf5da65', 30, 4, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-04 10:48:21', '2021-07-04 10:48:21');
INSERT INTO `product_xx` VALUES (5, '105', 'Mouse', '09081c4eb8623070c4e32cbf79109fa2', '09081c4eb8623070c4e32cbf79109fa2', 15, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-04 10:46:05', '2021-07-04 10:46:05');
INSERT INTO `product_xx` VALUES (6, '106', 'LCD', '09081c4eb8623070c4e32cbf79109fa2', '09081c4eb8623070c4e32cbf79109fa2', 100, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-04 10:46:05', '2021-07-04 10:46:05');
INSERT INTO `product_xx` VALUES (7, '107', 'name', '09081c4eb8623070c4e32cbf79109fa2', '09081c4eb8623070c4e32cbf79109fa2', 1000, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-04 10:46:05', '2021-07-04 10:46:05');
INSERT INTO `product_xx` VALUES (8, '108', 'Harys', '8e138568c558fb2121fb06cc0dde15ae', 'Rifai', 100, 2345, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-04 14:01:04', '2021-07-04 14:01:04');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dept` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `active` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'haris rifai', 'akgbs@gmail.com', '1', '2', '1', NULL, '$2y$10$djhV6lZtuqosfji7dX3QweqGy6ys0dfGsxhnz37ZjW4MLL5NrvpwO', NULL, '2021-07-04 04:25:59', '2021-07-04 04:25:59');
INSERT INTO `users` VALUES (2, 'Moh Haris Rifai ST', 'garmen.yk@gmail.com', '2', '2', '1', NULL, '$2y$10$55zLk9nT.JC7ImFZqM6KpObI789CmUlY65gjbNzB14ExlbovvqPKe', NULL, '2021-07-07 06:01:50', '2021-07-07 06:01:50');
INSERT INTO `users` VALUES (3, 'd', 'd@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$gXEx.v6v4lBADahVibviCew0gkeZtdtP2ehKB/bzr9vfHRkmh.an2', NULL, '2021-07-10 17:14:34', '2021-07-10 17:14:34');

SET FOREIGN_KEY_CHECKS = 1;
