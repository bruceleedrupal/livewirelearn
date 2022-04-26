-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: livewirelearn
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ch_favorites`
--

DROP TABLE IF EXISTS `ch_favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ch_favorites` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `favorite_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ch_favorites`
--

LOCK TABLES `ch_favorites` WRITE;
/*!40000 ALTER TABLE `ch_favorites` DISABLE KEYS */;
/*!40000 ALTER TABLE `ch_favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ch_messages`
--

DROP TABLE IF EXISTS `ch_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ch_messages` (
  `id` bigint NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint NOT NULL,
  `to_id` bigint NOT NULL,
  `body` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ch_messages`
--

LOCK TABLES `ch_messages` WRITE;
/*!40000 ALTER TABLE `ch_messages` DISABLE KEYS */;
INSERT INTO `ch_messages` VALUES (1658420357,'user',1,2,'dsafads',NULL,1,'2022-04-21 20:39:36','2022-04-21 21:25:08'),(2009549656,'user',1,2,'','{\"new_name\":\"832e688e-0d83-42e8-94de-1869c670d9be.jpg\",\"old_name\":\"BlueberrySalad-1-768x768.jpg\"}',1,'2022-04-21 22:15:17','2022-04-21 22:37:08'),(2112251858,'user',1,2,'fds',NULL,1,'2022-04-21 20:31:16','2022-04-21 20:31:16'),(2228565058,'user',1,1,'df',NULL,1,'2022-04-21 20:31:51','2022-04-21 20:31:52'),(2514887409,'user',2,1,'','{\"new_name\":\"519b0d1c-b14f-457d-9dfc-0e80b9e5ab68.png\",\"old_name\":\"\\u4eba\\u8138\\u80fd\\u529b\\u6982\\u89c8_20190619192844.png\"}',1,'2022-04-21 21:25:25','2022-04-21 21:25:25');
/*!40000 ALTER TABLE `ch_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_page_media`
--

DROP TABLE IF EXISTS `image_page_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `image_page_media` (
  `media_id` bigint unsigned NOT NULL,
  `page_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`media_id`,`page_id`),
  KEY `image_page_media_page_id_foreign` (`page_id`),
  CONSTRAINT `image_page_media_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE,
  CONSTRAINT `image_page_media_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_page_media`
--

LOCK TABLES `image_page_media` WRITE;
/*!40000 ALTER TABLE `image_page_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `image_page_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fileable_id` bigint DEFAULT NULL,
  `fileable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'file',
  `filename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (1,'2022/04/15/62590c7aeed00886.jpg',NULL,NULL,1,'image','BlueberrySalad-1-768x768.jpg'),(5,'2022/04/22/62626b91489ee754.jpg',NULL,NULL,1,'image','BlueberrySalad-1-768x768.jpg'),(11,'2022/04/22/62629f4adbfa8281.png',NULL,NULL,1,'image','avatar-g25d035076_640.png'),(12,'2022/04/22/6262aeffdca7a842.jpg',NULL,NULL,1,'image','animal-gc8441b6ec_1280.jpg'),(13,'2022/04/22/6262af07e348e108.jpg',NULL,NULL,1,'image','animal-gc8441b6ec_1280.jpg'),(14,'2022/04/22/6262af2b1bd39549.jpg',NULL,NULL,1,'image','animal-gc8441b6ec_1280.jpg'),(36,'2022/04/23/62635d468b771563.jpg',NULL,NULL,1,'file','1821107257.jpg'),(39,'2022/04/23/62635e26ab457516.jpg',NULL,NULL,1,'image','1821107257.jpg'),(44,'2022/04/23/626380688f74f181.jpg',NULL,NULL,1,'image','1821107257.jpg'),(45,'2022/04/23/62638079069ac579.jpg',NULL,NULL,1,'image','1821107257.jpg'),(48,'2022/04/23/626381748f3be832.jpg',NULL,NULL,1,'image','1821107257.jpg'),(49,'2022/04/23/626381ba23d33947.jpg',NULL,NULL,1,'image','1821107257.jpg'),(50,'2022/04/23/62638228f2c1c531.jpg',NULL,NULL,1,'image','animal-gc8441b6ec_1280.jpg'),(52,'2022/04/23/626382dfae193858.jpg',NULL,NULL,1,'image','1821107257.jpg'),(53,'2022/04/23/626383b888977799.jpg',NULL,NULL,1,'image','1821107257.jpg'),(54,'2022/04/23/6263ce4e7ce2d896.jpg',NULL,NULL,1,'image','animal-gc8441b6ec_1280.jpg'),(56,'2022/04/23/6263d0848eb88950.jpg',NULL,NULL,1,'image','animal-gc8441b6ec_1280.jpg'),(70,'2022/04/23/6264213e17b81362.jpg',NULL,NULL,1,'image','animal-gc8441b6ec_1280.jpg'),(71,'2022/04/23/62642207c50c6473.jpg',NULL,NULL,1,'image','animal-gc8441b6ec_1280.jpg'),(73,'2022/04/23/626424728523a348.png',NULL,NULL,1,'image','images.png'),(74,'2022/04/23/6264255a34285149.jpg',NULL,NULL,1,'image','1630817592.jpg'),(75,'2022/04/23/626425d0146e6984.jpg',NULL,NULL,1,'image','1821107257.jpg'),(76,'2022/04/23/626425da36b9f538.jpg',NULL,NULL,1,'image','1821107257.jpg'),(77,'2022/04/23/62642670614fe539.jpg',NULL,NULL,1,'image','1630817592.jpg'),(78,'2022/04/23/626426b6b1af8445.jpg',NULL,NULL,1,'image','animal-gc8441b6ec_1280.jpg'),(80,'2022/04/23/6264271fdffbf791.jpg',NULL,NULL,1,'image','1630817592.jpg'),(82,'2022/04/23/626428f20df87725.jpg',NULL,NULL,1,'image','animal-gc8441b6ec_1280.jpg'),(83,'2022/04/23/626429989e01c945.jpg',NULL,NULL,1,'image','1630817592.jpg'),(84,'2022/04/23/62642a4a44108360.png',NULL,NULL,1,'image','images.png'),(87,'2022/04/23/62642ed97051d788.png',NULL,NULL,1,'image','images.png'),(90,'2022/04/23/62642ff6a19a5843.jpg',NULL,NULL,1,'image','1821107257.jpg'),(93,'2022/04/23/626433214c022300.jpg',NULL,NULL,1,'image','1630817592.jpg'),(94,'2022/04/23/6264340801988663.jpg',NULL,NULL,1,'image','1630817592.jpg'),(96,'2022/04/23/626434f5290ad548.jpg',NULL,NULL,1,'image','1630817592.jpg'),(97,'2022/04/23/626434fcb212c722.jpg',NULL,NULL,1,'image','1821107257.jpg');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2020_05_21_100000_create_teams_table',1),(7,'2020_05_21_200000_create_team_user_table',1),(8,'2020_05_21_300000_create_team_invitations_table',1),(9,'2022_04_10_103802_create_sessions_table',1),(10,'2022_01_26_003724_create_media_table',2),(11,'2022_04_11_121608_create_pages_table',2),(12,'0000_00_00_000000_create_websockets_statistics_entries_table',3),(13,'2022_04_22_999999_add_active_status_to_users',4),(14,'2022_04_22_999999_add_avatar_to_users',4),(15,'2022_04_22_999999_add_dark_mode_to_users',4),(16,'2022_04_22_999999_add_messenger_color_to_users',4),(17,'2022_04_22_999999_create_favorites_table',4),(18,'2022_04_22_999999_create_messages_table',4),(19,'2022_03_04_095650_create_image_post_media_table',5),(20,'2022_04_22_071911_alter_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cover_media_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pages_cover_media_id_foreign` (`cover_media_id`),
  CONSTRAINT `pages_cover_media_id_foreign` FOREIGN KEY (`cover_media_id`) REFERENCES `media` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (3,'dfdasfdasfasfas','dfdasfdasfasfasssssss','<p><img class=\"image_resized\" style=\"width:67.79%;\" src=\"/storage/2022/04/15/62590cf15dcb4473.jpg\"></p><p>fdsaf</p>','2022-04-11 20:09:41','2022-04-23 02:29:46',NULL),(5,'cxvcaa','cxvcaa','<p>vcxvfdsafdsfstest</p>','2022-04-11 20:49:35','2022-04-14 22:07:30',NULL),(6,'dasfads','dasfadsfdsaf','<p>fsdafasaaaa</p>','2022-04-11 20:50:56','2022-04-11 20:50:56',NULL),(7,'dsfas','dsfasfdsafa','<p>new test</p><p>&nbsp;</p>','2022-04-11 20:53:39','2022-04-15 00:18:04',NULL),(8,'dd','ddadd','<p>ssssssssaaaaaaaaaaaaaaaaaaa</p>','2022-04-11 20:53:50','2022-04-11 20:53:50',NULL),(9,'测试2','测试2','<p>testfsdf</p>','2022-04-11 23:05:03','2022-04-11 23:05:03',NULL),(10,'afas','afasfdsf','<p>fds</p>','2022-04-14 15:58:22','2022-04-14 15:58:22',NULL),(11,'测试 ','测试 ','<p>塔顶地</p>','2022-04-23 08:08:54','2022-04-23 08:08:54',NULL),(12,'fsda','fsda','<p>fas</p>','2022-04-23 08:21:30','2022-04-23 08:21:30',NULL),(13,'dsfsdaf','dsfsdaf','<p>dsafdsfdsafas</p>','2022-04-23 09:16:12','2022-04-23 09:16:12',NULL);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('MHo0fn2CKryQ147LHC5XuGn6kl5i45N8RAufYyoj',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.60 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSVNoYlV1RnVGeFBzVUtoa2FjMExEVVVxeG84YzZCT213QW5zUGVWbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9saXZld2lyZWxlYXJuLnRlc3QvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1650960605);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_invitations`
--

DROP TABLE IF EXISTS `team_invitations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_invitations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`),
  CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_invitations`
--

LOCK TABLES `team_invitations` WRITE;
/*!40000 ALTER TABLE `team_invitations` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_invitations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_user`
--

DROP TABLE IF EXISTS `team_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_user`
--

LOCK TABLES `team_user` WRITE;
/*!40000 ALTER TABLE `team_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,1,'brucelee\'s Team',1,'2022-04-10 02:44:11','2022-04-10 02:44:11'),(2,1,'李宇凡的Team',0,'2022-04-10 03:40:41','2022-04-10 03:40:41');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `messenger_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#2180f3',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'brucelee','brucelee.drupal@gmail.com',NULL,'$2y$10$XZZRRe9pAeKLnAi.riD40OxoUqHI4.fUDDyibqT4WhYboGwQBObqu',NULL,NULL,NULL,'i3ZF1YAx63dNiV04XMLTbJaJwakh4hVdPQQAnxyUlmwna4Tharzdd3dJwKbI',2,NULL,'2022-04-10 02:44:11','2022-04-21 23:24:51',0,'brucelee.jpeg',0,'#2180f3'),(2,'customer service','122077550@qq.com',NULL,'$2y$10$XZZRRe9pAeKLnAi.riD40OxoUqHI4.fUDDyibqT4WhYboGwQBObqu',NULL,NULL,NULL,'b3Kq0u6YVG7YIsJKSWWtMvB7ORz8yFBxyztR8jNulNS26D7rRFAjqf0Eq7Nk',2,NULL,'2022-04-10 02:44:11','2022-04-21 22:37:07',1,'brucelee.jpeg',0,'#2180f3'),(3,'brucele2e.drupal@gmail.com','brucele2e.drupal@gmail.com',NULL,'$2y$10$0AtF41MphbyVYCeL0B.wRe2uq460qq4tUmrBeolfVTynh.3AbeQ.G',NULL,NULL,NULL,NULL,NULL,NULL,'2022-04-25 20:26:00','2022-04-25 20:26:00',0,'avatar.png',0,'#2180f3'),(5,'brucelee.aaa@gmail.com','brucelee.aaa@gmail.com',NULL,'$2y$10$Aco2oWB4PX6z9D23EWHz0uL9MRA9YsJL/o5MDdFBP2C/Me54bZhty',NULL,NULL,NULL,NULL,NULL,NULL,'2022-04-25 22:56:12','2022-04-25 22:56:12',0,'avatar.png',0,'#2180f3');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `websockets_statistics_entries`
--

DROP TABLE IF EXISTS `websockets_statistics_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `websockets_statistics_entries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `app_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int NOT NULL,
  `websocket_message_count` int NOT NULL,
  `api_message_count` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `websockets_statistics_entries`
--

LOCK TABLES `websockets_statistics_entries` WRITE;
/*!40000 ALTER TABLE `websockets_statistics_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `websockets_statistics_entries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-26 16:36:53
