-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: parking
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `automovil_parking`
--

DROP TABLE IF EXISTS `automovil_parking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `automovil_parking` (
  `automovil_id` bigint unsigned NOT NULL,
  `parking_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`automovil_id`),
  KEY `parking_automovil_parking_id_foreign` (`parking_id`),
  CONSTRAINT `parking_automovil_automovil_id_foreign` FOREIGN KEY (`automovil_id`) REFERENCES `automovils` (`id`) ON DELETE CASCADE,
  CONSTRAINT `parking_automovil_parking_id_foreign` FOREIGN KEY (`parking_id`) REFERENCES `parkings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `automovil_parking`
--

LOCK TABLES `automovil_parking` WRITE;
/*!40000 ALTER TABLE `automovil_parking` DISABLE KEYS */;
INSERT INTO `automovil_parking` VALUES (1,1,'2020-09-15 05:19:08','2020-09-15 05:19:08');
/*!40000 ALTER TABLE `automovil_parking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `automovils`
--

DROP TABLE IF EXISTS `automovils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `automovils` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre_prop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos_prop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` int NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_auto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `hora_ingreso` time NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `parking_asigned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `documento_UNIQUE` (`documento`),
  UNIQUE KEY `placas_UNIQUE` (`placas`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `automovils`
--

LOCK TABLES `automovils` WRITE;
/*!40000 ALTER TABLE `automovils` DISABLE KEYS */;
INSERT INTO `automovils` VALUES (1,'Milton','Martinez Bacca',159465798,'BMW Z3 SERIE 6','CVY - 000','negro','Familiar pequeño','2020-09-13','10:32:00','2020-09-13','16:01:00','AO-1','2020-09-14 18:17:29','2020-09-15 10:03:27'),(2,'Oscar Mauricio','Mendez',798465132,'AUDI A8','CNB - 077','blanco','Familiar pequeño','2020-09-12','11:21:00','2020-09-12','18:02:00','AS-1','2020-09-14 18:19:02','2020-09-15 10:03:19');
/*!40000 ALTER TABLE `automovils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bicicleta_parking`
--

DROP TABLE IF EXISTS `bicicleta_parking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bicicleta_parking` (
  `bicicleta_id` bigint unsigned NOT NULL,
  `parking_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bicicleta_id`),
  KEY `parking_bicicleta_parking_id_foreign` (`parking_id`) /*!80000 INVISIBLE */,
  CONSTRAINT `parking_bicicleta_bicicleta_id_foreign` FOREIGN KEY (`bicicleta_id`) REFERENCES `bicicletas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `parking_bicicleta_parking_id_foreign` FOREIGN KEY (`parking_id`) REFERENCES `parkings` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bicicleta_parking`
--

LOCK TABLES `bicicleta_parking` WRITE;
/*!40000 ALTER TABLE `bicicleta_parking` DISABLE KEYS */;
/*!40000 ALTER TABLE `bicicleta_parking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bicicletas`
--

DROP TABLE IF EXISTS `bicicletas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bicicletas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre_prop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos_prop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` int NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_marco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_cicla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `hora_ingreso` time NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `parking_asigned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `documento_UNIQUE` (`documento`),
  UNIQUE KEY `num_marco_UNIQUE` (`num_marco`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bicicletas`
--

LOCK TABLES `bicicletas` WRITE;
/*!40000 ALTER TABLE `bicicletas` DISABLE KEYS */;
INSERT INTO `bicicletas` VALUES (1,'Daniel Hernesto','Carvajal Perez',164579816,'GW FLAMMA','6F165798457','blanco y negro','De ruta','2020-09-14','11:27:00','2020-09-14','12:00:00','B-1','2020-09-14 21:28:07','2020-09-15 11:40:36'),(2,'Gabriel','Carvajal Rodriguez',164978132,'GER','7G134657984','azul claro y negra','Todo terreno','2020-09-14','13:39:00','2020-09-14','14:40:00','B-2','2020-09-14 21:39:34','2020-09-15 11:41:01');
/*!40000 ALTER TABLE `bicicletas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (4,'2014_10_12_000000_create_users_table',1),(5,'2014_10_12_100000_create_password_resets_table',1),(6,'2019_08_19_000000_create_failed_jobs_table',1),(7,'2020_09_13_130226_create_roles_table',2),(8,'2020_09_14_001900_create_automoviles_table',3),(9,'2020_09_14_004703_create_automoviles_table',4),(10,'2020_09_14_004703_create_automovils_table',5),(11,'2020_09_14_124953_create_motos_table',5),(12,'2020_09_14_130945_create_bicicletas_table',6),(13,'2020_09_14_190422_create_parkings_table',7),(14,'2020_09_14_190451_create_tarifas_table',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moto_parking`
--

DROP TABLE IF EXISTS `moto_parking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moto_parking` (
  `moto_id` bigint unsigned NOT NULL,
  `parking_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`moto_id`),
  KEY `parking_moto_parking_id_foreign` (`parking_id`),
  CONSTRAINT `parking_moto_moto_id_foreign` FOREIGN KEY (`moto_id`) REFERENCES `motos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `parking_moto_parking_id_foreign` FOREIGN KEY (`parking_id`) REFERENCES `parkings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moto_parking`
--

LOCK TABLES `moto_parking` WRITE;
/*!40000 ALTER TABLE `moto_parking` DISABLE KEYS */;
/*!40000 ALTER TABLE `moto_parking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motos`
--

DROP TABLE IF EXISTS `motos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `motos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre_prop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos_prop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` int NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_moto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `hora_ingreso` time NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `parking_asigned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `documento_UNIQUE` (`documento`),
  UNIQUE KEY `placas_UNIQUE` (`placas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motos`
--

LOCK TABLES `motos` WRITE;
/*!40000 ALTER TABLE `motos` DISABLE KEYS */;
INSERT INTO `motos` VALUES (1,'Jose Elias','Martinez Bacca',165198798,'YAMAHA SZ15RR','DPZ - 727','rojo y negro','Trail','2020-09-13','13:17:00','2020-09-13','15:47:00','MO-1','2020-09-14 19:18:17','2020-09-15 10:48:04'),(3,'Alejandro','Mendoza Diaz',765732714,'AKT AK110 NV','BBG - 789','Negro','Naked','2020-09-13','10:43:00','2020-09-13','13:49:00','MS-1','2020-09-14 19:43:51','2020-09-15 10:48:37');
/*!40000 ALTER TABLE `motos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parkings`
--

DROP TABLE IF EXISTS `parkings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parkings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parkings`
--

LOCK TABLES `parkings` WRITE;
/*!40000 ALTER TABLE `parkings` DISABLE KEYS */;
INSERT INTO `parkings` VALUES (1,'AO-1',0,'2020-09-15 02:13:41','2020-09-15 10:01:58'),(2,'AO-2',NULL,'2020-09-15 02:13:52','2020-09-15 03:17:25'),(3,'AO-3',NULL,'2020-09-15 02:14:01','2020-09-15 03:17:34'),(4,'AO-4',NULL,'2020-09-15 02:14:09','2020-09-15 03:17:42'),(5,'AO-5',NULL,'2020-09-15 02:14:16','2020-09-15 03:17:51'),(6,'AS-1',0,'2020-09-15 02:14:23','2020-09-15 10:04:28'),(7,'AS-2',NULL,'2020-09-15 02:14:30','2020-09-15 02:14:30'),(8,'AS-3',NULL,'2020-09-15 02:14:36','2020-09-15 02:15:19'),(9,'AS-4',NULL,'2020-09-15 02:14:42','2020-09-15 02:14:42'),(10,'AS-5',NULL,'2020-09-15 02:14:52','2020-09-15 02:14:52'),(12,'MO-1',0,'2020-09-15 03:18:46','2020-09-15 10:49:06'),(13,'MO-2',NULL,'2020-09-15 03:20:04','2020-09-15 03:20:04'),(14,'MO-3',NULL,'2020-09-15 03:20:17','2020-09-15 03:20:17'),(15,'MO-4',NULL,'2020-09-15 03:20:56','2020-09-15 03:20:56'),(16,'MO-5',NULL,'2020-09-15 03:21:05','2020-09-15 03:21:32'),(17,'MO-6',NULL,'2020-09-15 03:21:41','2020-09-15 03:21:41'),(18,'MO-7',NULL,'2020-09-15 03:21:48','2020-09-15 03:21:48'),(19,'MO-8',NULL,'2020-09-15 03:21:53','2020-09-15 03:21:53'),(20,'MO-9',NULL,'2020-09-15 03:22:01','2020-09-15 03:22:01'),(21,'MO-10',NULL,'2020-09-15 03:22:09','2020-09-15 03:22:09'),(22,'MS-1',0,'2020-09-15 03:22:47','2020-09-15 10:49:33'),(23,'MS-2',NULL,'2020-09-15 03:22:56','2020-09-15 03:22:56'),(24,'MS-3',NULL,'2020-09-15 03:23:04','2020-09-15 03:23:04'),(25,'MS-4',NULL,'2020-09-15 03:23:10','2020-09-15 03:23:10'),(26,'MS-5',NULL,'2020-09-15 03:23:16','2020-09-15 03:23:16'),(27,'MS-6',NULL,'2020-09-15 03:23:22','2020-09-15 03:23:22'),(28,'MS-7',NULL,'2020-09-15 03:23:27','2020-09-15 03:23:27'),(29,'MS-8',NULL,'2020-09-15 03:23:33','2020-09-15 03:23:33'),(30,'MS-9',NULL,'2020-09-15 03:23:38','2020-09-15 03:23:38'),(31,'MS-10',NULL,'2020-09-15 03:23:44','2020-09-15 03:23:44'),(32,'B-1',0,'2020-09-15 03:24:16','2020-09-15 11:41:53'),(33,'B-2',0,'2020-09-15 03:24:23','2020-09-15 11:42:02'),(34,'B-3',NULL,'2020-09-15 03:24:30','2020-09-15 03:24:30'),(35,'B-4',NULL,'2020-09-15 03:24:36','2020-09-15 03:24:36'),(36,'B-5',NULL,'2020-09-15 03:24:42','2020-09-15 03:24:42'),(37,'B-6',NULL,'2020-09-15 03:24:47','2020-09-15 03:24:47'),(38,'B-7',NULL,'2020-09-15 03:24:53','2020-09-15 03:24:53'),(39,'B-8',NULL,'2020-09-15 03:24:58','2020-09-15 03:24:58'),(40,'B-9',NULL,'2020-09-15 03:25:03','2020-09-15 03:25:03'),(41,'B-10',NULL,'2020-09-15 03:25:10','2020-09-15 03:25:10');
/*!40000 ALTER TABLE `parkings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,'2020-09-13 05:00:00','2020-09-14 04:21:27'),(2,2,'2020-09-14 02:16:27','2020-09-14 04:23:56');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_estado` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador','1',1,'2020-09-13 05:00:00','2020-09-13 05:00:00'),(2,'Usuario','2',1,'2020-09-13 05:00:00','2020-09-13 05:00:00'),(4,'Usuario_2','3',0,'2020-09-15 01:46:23','2020-09-15 01:58:14');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarifa_automovil`
--

DROP TABLE IF EXISTS `tarifa_automovil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tarifa_automovil` (
  `automovil_id` bigint unsigned NOT NULL,
  `tarifa_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`automovil_id`),
  KEY `tarifa_automovil_tarifa_id_foreign` (`tarifa_id`),
  CONSTRAINT `tarifa_automovil_automovil_id_foreign` FOREIGN KEY (`automovil_id`) REFERENCES `automovils` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tarifa_automovil_tarifa_id_foreign` FOREIGN KEY (`tarifa_id`) REFERENCES `tarifas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifa_automovil`
--

LOCK TABLES `tarifa_automovil` WRITE;
/*!40000 ALTER TABLE `tarifa_automovil` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarifa_automovil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarifa_bicicleta`
--

DROP TABLE IF EXISTS `tarifa_bicicleta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tarifa_bicicleta` (
  `bicicleta_id` bigint unsigned NOT NULL,
  `tarifa_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bicicleta_id`),
  KEY `tarifa_bicicleta_tarifa_id_foreign` (`tarifa_id`),
  CONSTRAINT `tarifa_bicicleta_bicicleta_id_foreign` FOREIGN KEY (`bicicleta_id`) REFERENCES `bicicletas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tarifa_bicicleta_tarifa_id_foreign` FOREIGN KEY (`tarifa_id`) REFERENCES `tarifas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifa_bicicleta`
--

LOCK TABLES `tarifa_bicicleta` WRITE;
/*!40000 ALTER TABLE `tarifa_bicicleta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarifa_bicicleta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarifa_moto`
--

DROP TABLE IF EXISTS `tarifa_moto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tarifa_moto` (
  `moto_id` bigint unsigned NOT NULL,
  `tarifa_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`moto_id`),
  KEY `tarifa_moto_tarifa_id_foreign` (`tarifa_id`),
  CONSTRAINT `tarifa_moto_moto_id_foreign` FOREIGN KEY (`moto_id`) REFERENCES `motos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tarifa_moto_tarifa_id_foreign` FOREIGN KEY (`tarifa_id`) REFERENCES `tarifas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifa_moto`
--

LOCK TABLES `tarifa_moto` WRITE;
/*!40000 ALTER TABLE `tarifa_moto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarifa_moto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarifas`
--

DROP TABLE IF EXISTS `tarifas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tarifas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tipo_vehiculo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarifa_fija` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifas`
--

LOCK TABLES `tarifas` WRITE;
/*!40000 ALTER TABLE `tarifas` DISABLE KEYS */;
INSERT INTO `tarifas` VALUES (1,'Automoviles','110','2020-09-15 02:58:15','2020-09-15 02:58:15'),(2,'Motos','77','2020-09-15 03:07:23','2020-09-15 03:07:23'),(3,'Bicicletas','10','2020-09-15 03:14:09','2020-09-15 03:14:09');
/*!40000 ALTER TABLE `tarifas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_estado` int DEFAULT NULL,
  `documento` int DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Carlos Humberto','Ortiz','Admin',1,1050798456,'$2y$10$oiAnTEqYHtQEL3SR6asnXODpPBkzadHYXnNoCCoenLAjMeRGKPX/O',NULL,'2020-09-13 06:41:06','2020-09-14 04:21:27'),(2,'Jordi Esteban','Garzón Trujillo','Usuario',1,NULL,'$2y$10$4limcuV6WAJUp/vWezhmDe8K5Z4Q.4BWKTG4csr3ONueZ/DT2QLeu',NULL,'2020-09-14 02:16:27','2020-09-14 04:23:56');
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

-- Dump completed on 2020-09-15 22:51:44
