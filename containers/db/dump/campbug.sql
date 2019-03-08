-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: campbug
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'nasu','admin@test.jp','$2y$10$vpPZZEOlwGoKmcjuvbA.wecqEYtpyPSXko.kiWpITHev5TNEDq3Jy','1bHMdZT8g50hQocclGiHTAvoBx1wDFcKOLpOuGbNggknHwCEkDnw4C7LrAWC',NULL,'2019-02-21 01:26:45','2019-02-21 01:26:45');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `big_categories`
--

DROP TABLE IF EXISTS `big_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `big_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `big_categories`
--

LOCK TABLES `big_categories` WRITE;
/*!40000 ALTER TABLE `big_categories` DISABLE KEYS */;
INSERT INTO `big_categories` VALUES (1,'アパレル',NULL,'2019-02-28 04:06:38','2019-02-28 04:06:38'),(2,'テント',NULL,'2019-02-28 04:06:38','2019-02-28 04:06:38'),(3,'その他',NULL,'2019-02-28 04:06:38','2019-02-28 04:06:38'),(4,'ついで',NULL,'2019-02-28 04:06:38','2019-02-28 04:06:38'),(5,'あああ',NULL,'2019-02-28 04:06:38','2019-02-28 04:06:38'),(6,'いいい',NULL,'2019-02-28 04:06:38','2019-02-28 04:06:38');
/*!40000 ALTER TABLE `big_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand_groups`
--

DROP TABLE IF EXISTS `brand_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand_groups`
--

LOCK TABLES `brand_groups` WRITE;
/*!40000 ALTER TABLE `brand_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `brand_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_group_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_katakana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'1','test','テスト',NULL,'2019-02-28 03:59:20','2019-02-28 03:59:20'),(2,'2','asob','アソビ',NULL,'2019-02-28 03:59:20','2019-02-28 03:59:20'),(3,'3','Factotum','ファクトタム',NULL,'2019-02-28 03:59:20','2019-02-28 03:59:20'),(4,'4','GAP','ギャップ',NULL,'2019-02-28 03:59:20','2019-02-28 03:59:20');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `big_category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,3,'アウター',NULL,'2019-02-28 04:07:36','2019-02-28 04:07:36'),(2,4,'いいテント',NULL,'2019-02-28 04:07:36','2019-02-28 04:07:36'),(3,5,'ライター',NULL,'2019-02-28 04:07:36','2019-02-28 04:07:36'),(4,6,'薪割り',NULL,'2019-02-28 04:07:36','2019-02-28 04:07:36');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_has_gears`
--

DROP TABLE IF EXISTS `category_has_gears`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_has_gears` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `gear_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_has_gears`
--

LOCK TABLES `category_has_gears` WRITE;
/*!40000 ALTER TABLE `category_has_gears` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_has_gears` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gear_profiles`
--

DROP TABLE IF EXISTS `gear_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gear_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gear_id` int(11) NOT NULL,
  `have_count` int(11) NOT NULL DEFAULT '0',
  `want_count` int(11) NOT NULL DEFAULT '0',
  `fav_count` int(11) NOT NULL DEFAULT '0',
  `thander_avg` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gear_profiles`
--

LOCK TABLES `gear_profiles` WRITE;
/*!40000 ALTER TABLE `gear_profiles` DISABLE KEYS */;
INSERT INTO `gear_profiles` VALUES (1,10,0,0,0,0,'2019-03-08 07:20:46','2019-03-08 07:04:23','2019-03-08 07:20:46');
/*!40000 ALTER TABLE `gear_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gears`
--

DROP TABLE IF EXISTS `gears`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gears` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gear_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gears`
--

LOCK TABLES `gears` WRITE;
/*!40000 ALTER TABLE `gears` DISABLE KEYS */;
INSERT INTO `gears` VALUES (1,1,1,'ギアフォー','dファファdf','gear_images/Ks5ZdncOsTfgrhQwhLvp9XbWrqsSsH9yk5rSzSGV.png',NULL,'2019-03-08 08:42:01','2019-02-25 08:09:06','2019-03-08 08:42:01'),(2,1,1,'テストギア','あああああああああああああああああああああ','gear_images/jXZnAf2mQXSSFTaZhik5lGdCsnBWLqjZ703iB1il.png',NULL,'2019-03-08 08:42:27','2019-02-26 01:17:35','2019-03-08 08:42:27'),(3,1,1,'スーパーギア','おおおおおおおおおおおおおおおおおおおおおお','gear_images/rfdiuBtIV15FiwhMmOK9no7l6YGC2UHK2ayu31cJ.png',NULL,NULL,'2019-02-26 01:18:29','2019-02-26 01:18:29'),(4,1,1,'オーバーギア','いいいいいいいいいいいいいいいいいいいい','gear_images/P0PX6HuSKhUgsaeu6b9Pd2CNOpltxAACg4GvdTqT.jpeg',NULL,NULL,'2019-02-26 01:19:55','2019-02-26 01:19:55'),(5,1,1,'ギアギア','ええええええええええええええええええええええええええ','gear_images/tK9ypXs15zO5zqObmsSLDQel6Ax2aTSiqDb3UtA5.png',NULL,NULL,'2019-02-26 01:20:41','2019-02-26 01:20:41'),(6,3,3,'aappccc','test','gear_images/u3sbDEZLQT2fmcDTfnALTEjCy7IYfxoy255B77Xq.png',NULL,NULL,'2019-03-07 06:39:07','2019-03-07 06:39:07'),(7,1,4,'大きいテスト寝袋','ああああ','gear_images/Vp3KRLsup7LX14objsWcqqbbLMH44umDTIHylZKz.png',NULL,NULL,'2019-03-07 06:39:56','2019-03-07 06:39:56'),(8,4,1,'モンクレー','ああああ','gear_images/QmxSgo66JJxMInmvjwLpGWqFkjFBqyiNJiPzbH3i.jpeg',NULL,NULL,'2019-03-07 06:40:36','2019-03-07 06:40:36'),(9,2,2,'Pコート','ええええええ','gear_images/mLohg4DVh8n04NgmrGa7IpYwTbTGuwwB0rv2rDnj.png',NULL,'2019-03-08 07:21:36','2019-03-07 06:41:41','2019-03-08 07:21:36'),(10,2,3,'oreore','fdafadfa','gear_images/IUfZ6uwMNwun44T45Ok1xDZZHiPnuIJR6vN3brQA.jpeg',NULL,'2019-03-08 07:21:17','2019-03-08 07:04:23','2019-03-08 07:21:17');
/*!40000 ALTER TABLE `gears` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES (1,3,'ダウン',NULL,'2019-02-28 04:08:33','2019-02-28 04:08:33'),(2,3,'コート',NULL,'2019-02-28 04:08:33','2019-02-28 04:08:33'),(3,4,'大きいテント',NULL,'2019-02-28 04:08:33','2019-02-28 04:08:33'),(4,4,'寝袋',NULL,'2019-02-28 04:08:33','2019-02-28 04:08:33');
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (3,'2014_10_12_000000_create_users_table',1),(4,'2014_10_12_100000_create_password_resets_table',1),(5,'2019_02_21_011149_create_admin_table',2),(12,'2019_02_25_042250_create_genre_table',4),(13,'2019_02_25_042324_create_category_table',4),(16,'2019_02_25_055200_create_big_category_table',6),(18,'2019_02_25_015236_create_gear_table',7),(20,'2019_02_25_042229_create_brand_table',8),(21,'2019_02_28_034624_create_brand_group_table',9),(23,'2019_03_08_065022_create_category_has_gear_table',11),(24,'2019_03_08_064644_create_gear_profile_table',12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_verified_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_mail_verified_hash_unique` (`mail_verified_hash`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'adaf','pri_test@test.jp','b107482b-e0aa-41ac-ac9d-332d61cc71f7',NULL,'$2y$10$EJlRTGd9TzNbCugWHCB4JOmPihkOPdMDtoqF9FKqfQaTSWFeG/20e',NULL,'2019-02-19 03:00:18','2019-02-19 03:00:18'),(2,'abcd','fadfadf@aa.jp','23fe6256-c753-42ef-8981-76c831c68542',NULL,'$2y$10$Q3JRW0Swj83EMXw0tIL87O8Q80WqhfnJIPYcK1qE0CrhZk46FcFXS',NULL,'2019-02-19 03:10:47','2019-02-19 03:10:47'),(3,'abcd','fadfdfdf@aa.jp','15900ab3-7a74-4946-8afb-b75b870d8ff1',NULL,'$2y$10$2d4GR43AtPaiAg0kWy6wKev.2cNTep0.r/R1r2cp6OeN7yP9zRlia',NULL,'2019-02-19 03:12:05','2019-02-19 03:12:05'),(4,'testtesttest','fdafadf@test.jp','feb224fe-4792-4b4d-99b1-b678c94f0660',NULL,'$2y$10$JywhPpi0DRR4.pOJ6t4ZVeHpf7LoEI/y9ARSRS3J3ncS6ejJrM2m2',NULL,'2019-02-26 06:15:09','2019-02-26 06:15:09');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-08  9:20:52
