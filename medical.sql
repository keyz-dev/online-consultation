-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: medical
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` bigint(20) unsigned NOT NULL,
  `patient_id` bigint(20) unsigned NOT NULL,
  `slot_id` bigint(20) unsigned DEFAULT NULL,
  `status` enum('completed','cancelled','pending') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appointments_doctor_id_index` (`doctor_id`),
  KEY `appointments_patient_id_index` (`patient_id`),
  KEY `appointments_slot_id_index` (`slot_id`),
  CONSTRAINT `fk_doc_appointment` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_patient_appoint` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_slot_appoint` FOREIGN KEY (`slot_id`) REFERENCES `slots` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `availabilities`
--

DROP TABLE IF EXISTS `availabilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `availabilities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` bigint(20) unsigned NOT NULL,
  `status` enum('active','expired') NOT NULL DEFAULT 'active',
  `week_number` int(11) NOT NULL DEFAULT 6,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `availabilities_doctor_id_index` (`doctor_id`),
  CONSTRAINT `fk_doc_avail` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `availabilities`
--

LOCK TABLES `availabilities` WRITE;
/*!40000 ALTER TABLE `availabilities` DISABLE KEYS */;
/*!40000 ALTER TABLE `availabilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultations`
--

DROP TABLE IF EXISTS `consultations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` bigint(20) unsigned NOT NULL,
  `patient_id` bigint(20) unsigned NOT NULL,
  `status` enum('cancelled','completed','ongoing') NOT NULL DEFAULT 'ongoing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `consultations_doctor_id_index` (`doctor_id`),
  KEY `consultations_patient_id_index` (`patient_id`),
  CONSTRAINT `fk_doc_consult` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_patient_consul` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultations`
--

LOCK TABLES `consultations` WRITE;
/*!40000 ALTER TABLE `consultations` DISABLE KEYS */;
/*!40000 ALTER TABLE `consultations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_information`
--

DROP TABLE IF EXISTS `contact_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_information` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `icon_url` varchar(255) NOT NULL DEFAULT 'default_icon.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contact_information_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_information`
--

LOCK TABLES `contact_information` WRITE;
/*!40000 ALTER TABLE `contact_information` DISABLE KEYS */;
INSERT INTO `contact_information` VALUES (1,'phone','<i class=\"fas fa-phone\"></i>','2025-01-25 09:12:55','2025-01-25 09:12:55'),(2,'telegram','<i class=\"fa-brands fa-telegram\"></i>','2025-01-25 09:22:33','2025-01-25 09:22:33'),(3,'email','<i class=\"far fa-envelope\"></i>','2025-01-25 09:22:33','2025-01-25 09:22:33'),(4,'whatsapp','<i class=\"fa-brands fa-whatsapp\"></i>','2025-01-25 09:22:33','2025-01-25 09:22:33'),(5,'facebook','<i class=\"fa-brands fa-facebook-f\"></i>','2025-01-25 09:22:33','2025-01-25 09:22:33'),(6,'messenger','<i class=\"fa-brands fa-facebook-messenger\"></i>','2025-01-25 09:22:33','2025-01-25 09:22:33'),(7,'x-twitter','<i class=\"fa-brands fa-x-twitter\"></i>','2025-01-25 09:22:33','2025-01-25 09:22:33'),(8,'linkedin','<i class=\"fa-brands fa-linkedin\"></i>','2025-01-25 09:22:33','2025-01-25 09:22:33'),(9,'instagram','<i class=\"fa-brands fa-instagram\"></i>','2025-01-25 09:22:33','2025-01-25 09:22:33');
/*!40000 ALTER TABLE `contact_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `specialty_id` bigint(20) unsigned NOT NULL,
  `payment_id` bigint(20) unsigned NOT NULL,
  `consultation_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `experience` int(11) NOT NULL DEFAULT 0,
  `rating` int(11) NOT NULL DEFAULT 0,
  `license_number` varchar(255) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `doctors_license_number_unique` (`license_number`),
  KEY `doctors_user_id_index` (`user_id`),
  KEY `doctors_specialty_id_index` (`specialty_id`),
  KEY `doctors_payment_id_index` (`payment_id`),
  CONSTRAINT `fk_doc_payment` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_doc_specialty` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_doc_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (4,30,23,6,15000.00,12,0,'5639','Hopital psychiatrique de Yaounde','Humility is the key to greatness.','2025-02-05 13:39:11','2025-02-05 13:39:11'),(5,32,16,8,8000.00,9,0,'Kit34xau09','Joseph Merrick Baptist Hospital','Seeing is believing. Having gotten the opportunity to see the great and mighty things that God can do in the life of an individual, I strongly believe that Jesus is Lord','2025-02-05 17:41:47','2025-02-05 17:41:47'),(6,33,15,9,4000.00,3,0,'Qwsyu21hy','L\'hopital General de Etoug-Ebe','I never really imagined my self in a place where i could be a reason for someone\'s smile. This God is truly Great','2025-02-07 01:51:05','2025-02-07 01:51:05'),(7,34,14,10,12500.00,5,0,'Bit781Maopy','Yaounde District Hospital Ekoumdom','One never knows why he or she was born, they just get to hope that they\'ll discover it one day','2025-02-07 01:59:24','2025-02-07 01:59:24');
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
-- Table structure for table `health_concerns`
--

DROP TABLE IF EXISTS `health_concerns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `health_concerns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `icon_url` varchar(255) NOT NULL DEFAULT 'default_icon.png',
  `specialty_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_concern_specialty` (`specialty_id`),
  KEY `health_concerns_name_index` (`name`),
  CONSTRAINT `fk_concern_specialty` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `health_concerns`
--

LOCK TABLES `health_concerns` WRITE;
/*!40000 ALTER TABLE `health_concerns` DISABLE KEYS */;
INSERT INTO `health_concerns` VALUES (7,'Headache','symptoms/6lfXURyDU60X2qxFd4F2pm4b8Sm3OI5OIIdf7X9y.png',16,'2025-02-05 13:02:43','2025-02-05 13:02:43'),(8,'High blood','symptoms/PFIqJlXwP3kunBBL4N9KFhwduPGQW70VGZc2rWbb.png',21,'2025-02-05 13:04:21','2025-02-05 13:11:24'),(9,'fatigue','symptoms/uDhqdR7FJMS0YbPwTKOhvunhg1ZgAJpelyAoqtLE.png',15,'2025-02-05 13:04:53','2025-02-05 13:04:53'),(10,'Chest Pain','symptoms/HM8ZrULS8R9fgAq5rlz81lsv0THj935r776PpbW0.png',14,'2025-02-05 13:14:11','2025-02-05 13:14:11'),(11,'Nausea and Vomiting','symptoms/Q0etlSTV7XPOWDKhPT1D22Ol6vlHwAhQfUzV69s9.png',15,'2025-02-05 13:15:08','2025-02-05 13:15:08'),(12,'Flu','symptoms/gwCfTUJsS6TFfN34WhBwRFEIJzikigJtlGt0G6Fh.png',20,'2025-02-05 13:15:32','2025-02-05 13:15:32'),(13,'Dizziness','symptoms/kWCRJrGAOakiZskpa97tsdSSYMu5Xguw6Ns4CcqF.png',16,'2025-02-05 13:16:43','2025-02-05 13:16:43'),(14,'Tooth ache','symptoms/nAixPusEDJV94CYBtvR40WqS3vBjh61EazjamIJM.png',23,'2025-02-05 13:21:51','2025-02-05 13:22:08'),(15,'Eye Pain','symptoms/NpH6ciE6aN6OLEyHgxtqwdbjyTUpeN4WWZ8YCoe5.png',22,'2025-02-05 13:22:49','2025-02-05 13:22:49'),(16,'Rashes','symptoms/JbeqmijT05D2fYxk7SZlbLxDgABUff8xOPoyfaOz.png',17,'2025-02-05 13:28:07','2025-02-05 13:28:07');
/*!40000 ALTER TABLE `health_concerns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (28,'0001_01_01_000001_create_cache_table',1),(29,'0001_01_01_000002_create_jobs_table',1),(30,'2025_01_22_135715_create_payments_table',1),(31,'2025_01_22_135859_update_user',1),(32,'2025_01_22_140043_create_notifications_table',1),(33,'2025_01_22_140130_create_q_and_as_table',1),(34,'2025_01_22_140148_create_contact_information_table',1),(35,'2025_01_22_140202_create_specialties_table',1),(36,'2025_01_22_140209_create_doctors_table',1),(37,'2025_01_22_140256_create_patients_table',1),(38,'2025_01_22_140310_create_availabilities_table',1),(39,'2025_01_22_140332_create_slots_table',1),(40,'2025_01_22_140342_create_consultations_table',1),(41,'2025_01_22_140355_create_prescriptions_table',1),(42,'2025_01_22_142528_health_concern',1),(43,'2025_01_22_145547_appointment',1),(44,'2025_01_22_205541_create_sessions_table',1),(45,'2025_01_25_094732_create_user_contacts_table',1),(46,'2025_01_27_014634_create_testimonials_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `recipient_id` bigint(20) unsigned NOT NULL,
  `type` enum('email','sms','push') NOT NULL DEFAULT 'email',
  `status` enum('sent','unread','read','none') NOT NULL DEFAULT 'none',
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notif_recipient` (`recipient_id`),
  CONSTRAINT `fk_notif_recipient` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `document_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patients_user_id_index` (`user_id`),
  CONSTRAINT `fk_patient_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (3,22,'medical_records/KqN2065HqyxedMEMDG9PVh56ATQrUrzAkb8yoL0u.png','2025-02-04 09:18:03','2025-02-04 09:18:03'),(4,24,'medical_records/gJmTnbRufEKRP9xpCFxbxCueSMG5Aanv8Ws0652k.png','2025-02-04 09:46:05','2025-02-04 09:46:05'),(5,25,'medical_records/3QAfpUP9LblXatD3rO3Ejcetw5BDAZaobyk3mmW1.jpg','2025-02-04 09:58:30','2025-02-04 09:58:30'),(6,26,NULL,'2025-02-04 10:09:53','2025-02-04 10:09:53'),(7,27,NULL,'2025-02-04 10:20:42','2025-02-04 10:20:42'),(8,28,NULL,'2025-02-04 10:30:59','2025-02-04 10:30:59'),(9,29,'medical_records/R7aflWXw0xukoNGf2FKnTb2QOMjfNQdbnZhPakMD.jpg','2025-02-04 10:47:04','2025-02-04 10:47:04');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(255) NOT NULL,
  `type` enum('om','momo') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (6,'670215621','momo','2025-02-05 13:39:11','2025-02-05 13:39:11'),(8,'670084835','momo','2025-02-05 17:41:47','2025-02-05 17:41:47'),(9,'680614641','om','2025-02-07 01:51:05','2025-02-07 01:51:05'),(10,'682980313','momo','2025-02-07 01:59:24','2025-02-07 01:59:24');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prescriptions`
--

DROP TABLE IF EXISTS `prescriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prescriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `consultation_id` bigint(20) unsigned NOT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prescriptions_consultation_id_index` (`consultation_id`),
  CONSTRAINT `fk_consult_presc` FOREIGN KEY (`consultation_id`) REFERENCES `consultations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescriptions`
--

LOCK TABLES `prescriptions` WRITE;
/*!40000 ALTER TABLE `prescriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `prescriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `q_and_as`
--

DROP TABLE IF EXISTS `q_and_as`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `q_and_as` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `q_and_as`
--

LOCK TABLES `q_and_as` WRITE;
/*!40000 ALTER TABLE `q_and_as` DISABLE KEYS */;
INSERT INTO `q_and_as` VALUES (1,'How can I schedule a consultation via the website?','You can schedule a consultation by visiting our website, selecting a healthcare provider, and choosing an available time slot.','2025-01-28 12:37:58','2025-01-28 13:17:21'),(2,'What should I expect during my first online consultation?','During your first online consultation, you?ÇÖll discuss your medical history and current symptoms. The provider will assess your situation and recommend a treatment plan.','2025-01-28 13:18:38','2025-01-28 13:18:38'),(3,'What lifestyle changes can help manage my hypertension?','Manage hypertension by following a healthy diet, exercising regularly, reducing salt intake, limiting alcohol, and managing stress.','2025-01-28 13:19:20','2025-01-28 13:19:20'),(4,'How do I know if I need to see a doctor for my headaches?','See a doctor if your headaches are frequent, severe, or accompanied by symptoms like vision changes or nausea.','2025-01-28 13:20:33','2025-01-28 13:20:33'),(5,'What are the signs of dehydration?','Signs of dehydration include thirst, dry mouth, dark urine, fatigue, and dizziness.','2025-01-28 13:21:16','2025-01-28 13:21:16'),(6,'Can I get prescriptions during an online consultation?','Yes, if deemed appropriate, your healthcare provider can prescribe medications during your online consultation.','2025-01-28 13:21:49','2025-01-28 13:21:49'),(7,'How do I prepare for my online consultation?','Prepare by gathering your medical history, a list of current medications, and any questions you want to ask your provider.','2025-01-28 13:22:24','2025-01-28 13:22:24'),(8,'What should I do if I experience side effects from a medication?','If you experience side effects, contact your healthcare provider immediately to discuss your symptoms and potential alternatives.','2025-01-28 13:22:49','2025-01-28 13:22:49'),(9,'How can I manage anxiety using online resources?','You can manage anxiety by accessing online therapy sessions, mindfulness resources, and self-help materials available on our site.','2025-01-28 13:23:14','2025-01-28 13:23:14'),(10,'Is my personal information safe during an online consultation?','Yes, we prioritize your privacy and use secure platforms to protect your personal information during online consultations.','2025-01-28 13:23:52','2025-01-28 13:23:52');
/*!40000 ALTER TABLE `q_and_as` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
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
INSERT INTO `sessions` VALUES ('gBrKYHa7HYSXlxrDkRljAbGelJFEvq3uO5h8v9pK',27,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:134.0) Gecko/20100101 Firefox/134.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaDl2bE42a3kyWU9NS0VTczE1a0JtRHBhbzhOSVhvajN6MFM2Unp4YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC91c2VyL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjc7fQ==',1738897216),('t5tQff8XH1Z2eZFr1yph17lG94t6GtyBRQnMp8he',NULL,'192.168.43.189','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSlVGcUxPck1xNzBUTFFUQlpCQnh0ZkROOGNjb05udlQzUm12REs5QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xOTIuMTY4LjQzLjE4MDo4MDAwL2RvY3Rvci9zcGVjaWFsdHkvMjMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1738895623);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slots`
--

DROP TABLE IF EXISTS `slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slots` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `availability_id` bigint(20) unsigned NOT NULL,
  `status` enum('expired','booked','available') NOT NULL DEFAULT 'available',
  `day` varchar(255) NOT NULL,
  `start_time` time NOT NULL DEFAULT '07:49:00',
  `end_time` time NOT NULL DEFAULT '07:49:00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slots_availability_id_index` (`availability_id`),
  CONSTRAINT `fk_slot_avail` FOREIGN KEY (`availability_id`) REFERENCES `availabilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slots`
--

LOCK TABLES `slots` WRITE;
/*!40000 ALTER TABLE `slots` DISABLE KEYS */;
/*!40000 ALTER TABLE `slots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialties`
--

DROP TABLE IF EXISTS `specialties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialties` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `noun` varchar(255) NOT NULL,
  `icon_url` varchar(255) NOT NULL DEFAULT 'default_icon.png',
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `specialties_name_unique` (`name`),
  UNIQUE KEY `specialties_noun_unique` (`noun`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialties`
--

LOCK TABLES `specialties` WRITE;
/*!40000 ALTER TABLE `specialties` DISABLE KEYS */;
INSERT INTO `specialties` VALUES (14,'Cardiology','Cardiologist','cardiology.svg','The medical specialty focused on diagnosing and treating heart and vascular diseases.','2025-02-04 15:35:41','2025-02-04 15:35:41'),(15,'Gastroenterology','Gastroenterologist','gastroenterology.svg','Gastroenterology is the medical specialty focused on diagnosing and treating diseases of the gastrointestinal (GI) tract, including the esophagus, stomach, intestines, liver, and pancreas','2025-02-04 15:37:18','2025-02-04 15:37:18'),(16,'Neurology','Neurologist','neurology.svg','The branch of medicine dealing with disorders of the nervous system, including the brain and spinal cord.','2025-02-04 15:38:37','2025-02-04 15:38:37'),(17,'Dermatology','Dermatologist','dermatology.svg','The specialty concerned with the diagnosis and treatment of skin, hair, and nail disorders.','2025-02-04 15:39:39','2025-02-04 15:39:39'),(18,'Nephrology','Nephrologist','nephrology.svg','Deals with kidney function and diseases, including chronic kidney disease and kidney stones.','2025-02-04 15:40:52','2025-02-04 15:40:52'),(19,'Orthopedics','Orthopedist','orthopedics.svg','The medical field focused on diagnosing and treating musculoskeletal disorders, including bones, joints, and muscles.','2025-02-04 15:41:53','2025-02-04 15:41:53'),(20,'Pediatrics','Pediatrician','pediatrics.svg','The specialty dedicated to the medical care of infants, children, and adolescents.','2025-02-04 15:43:01','2025-02-04 15:43:01'),(21,'Hematology','Hematologist','hematology.svg','Specializes in blood disorders, including anemia, clotting disorders, and cancers like leukemia.','2025-02-04 16:17:08','2025-02-04 16:17:08'),(22,'Ophthalmology','Ophthalmologist','ophthalmology.svg','Focuses on eye health, including vision disorders and eye diseases.','2025-02-05 13:19:25','2025-02-05 13:19:25'),(23,'Dentistry','Dentist','dentistry.svg','Specializes in the diagnosis, prevention, and treatment of dental and facial irregularities, often using braces or clear aligners to straighten teeth.','2025-02-05 13:20:31','2025-02-05 13:20:31'),(24,'Oral diseases','Oral disease specialist','oral diseases.svg','Oral diseases encompass a wide range of conditions that affect the mouth and surrounding structures.','2025-02-05 13:21:15','2025-02-05 13:21:15');
/*!40000 ALTER TABLE `specialties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 3,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `testimonials_user_id_index` (`user_id`),
  CONSTRAINT `fk_user_testimonial` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_contacts`
--

DROP TABLE IF EXISTS `user_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_contacts` (
  `user_id` bigint(20) unsigned NOT NULL,
  `contact_id` bigint(20) unsigned NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`contact_id`,`value`),
  KEY `user_contacts_user_id_index` (`user_id`),
  KEY `user_contacts_contact_id_index` (`contact_id`),
  CONSTRAINT `fk_contact_doc` FOREIGN KEY (`contact_id`) REFERENCES `contact_information` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_contact_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_contacts`
--

LOCK TABLES `user_contacts` WRITE;
/*!40000 ALTER TABLE `user_contacts` DISABLE KEYS */;
INSERT INTO `user_contacts` VALUES (30,1,'620367221','2025-02-05 13:39:11','2025-02-05 13:39:11'),(27,1,'620913342','2025-02-04 10:20:42','2025-02-04 10:20:42'),(29,1,'670203723','2025-02-04 10:47:04','2025-02-04 10:47:04'),(25,1,'670809020','2025-02-04 09:58:30','2025-02-04 09:58:30'),(26,1,'671652318','2025-02-04 10:09:53','2025-02-04 10:09:53'),(24,1,'671893214','2025-02-04 09:46:05','2025-02-04 09:46:05'),(28,1,'672132891','2025-02-04 10:30:59','2025-02-04 10:30:59'),(33,1,'680614641','2025-02-07 01:51:05','2025-02-07 01:51:05'),(32,1,'681537516','2025-02-05 17:41:47','2025-02-05 17:41:47'),(18,1,'682980313','2025-02-04 06:22:32','2025-02-04 06:22:32'),(34,1,'691443727','2025-02-07 01:59:24','2025-02-07 01:59:24'),(22,1,'698823257','2025-02-04 09:18:03','2025-02-04 09:18:03'),(30,2,'620367221','2025-02-05 13:39:11','2025-02-05 13:39:11'),(34,2,'676177173','2025-02-07 01:59:24','2025-02-07 01:59:24'),(33,2,'680614641','2025-02-07 01:51:05','2025-02-07 01:51:05'),(18,3,'afanyuys@gmail.com','2025-02-04 06:22:32','2025-02-04 06:22:32'),(30,3,'brayant@gmail.com','2025-02-05 13:39:11','2025-02-05 13:39:11'),(29,3,'elegance@gmail.com','2025-02-04 10:47:04','2025-02-04 10:47:04'),(27,3,'global@gmail.com','2025-02-04 10:20:42','2025-02-04 10:20:42'),(26,3,'keyz@gmail.com','2025-02-04 10:09:53','2025-02-04 10:09:53'),(34,3,'keyzglobal0313@gmail.com','2025-02-07 01:59:24','2025-02-07 01:59:24'),(25,3,'kouna@gmail.com','2025-02-04 09:58:30','2025-02-04 09:58:30'),(33,3,'megane@gmail.com','2025-02-07 01:51:05','2025-02-07 01:51:05'),(32,3,'njeba@gmail.com','2025-02-05 17:41:47','2025-02-05 17:41:47'),(24,3,'ran@gmail.com','2025-02-04 09:46:05','2025-02-04 09:46:05'),(28,3,'test@gmail.com','2025-02-04 10:30:59','2025-02-04 10:30:59'),(22,3,'zali@gmail.com','2025-02-04 09:18:03','2025-02-04 09:18:03'),(30,4,'620367221','2025-02-05 13:39:11','2025-02-05 13:39:11'),(27,4,'620913342','2025-02-04 10:20:42','2025-02-04 10:20:42'),(18,4,'655955186','2025-02-04 06:22:32','2025-02-04 06:22:32'),(29,4,'670203723','2025-02-04 10:47:04','2025-02-04 10:47:04'),(25,4,'670608312','2025-02-04 09:58:30','2025-02-04 09:58:30'),(26,4,'671652318','2025-02-04 10:09:53','2025-02-04 10:09:53'),(24,4,'671893214','2025-02-04 09:46:05','2025-02-04 09:46:05'),(28,4,'672132891','2025-02-04 10:30:59','2025-02-04 10:30:59'),(34,4,'676177173','2025-02-07 01:59:24','2025-02-07 01:59:24'),(33,4,'680614641','2025-02-07 01:51:05','2025-02-07 01:51:05'),(32,4,'681537516','2025-02-05 17:41:47','2025-02-05 17:41:47'),(22,4,'698823257','2025-02-04 09:18:03','2025-02-04 09:18:03'),(30,5,'https://web.facebook.com/Meganeofficial/?_rdc=1&_rdr#','2025-02-05 13:39:11','2025-02-05 13:39:11');
/*!40000 ALTER TABLE `user_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `age` int(11) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `Nationality` varchar(255) NOT NULL DEFAULT 'Cameroon',
  `city` varchar(255) NOT NULL DEFAULT 'Yaounde',
  `role` enum('admin','doctor','patient') NOT NULL DEFAULT 'patient',
  `profile_image` varchar(255) NOT NULL DEFAULT 'placeholder.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (18,'Afanyuy Caleb','male',0,'$2y$12$yduJtJNtOevlJ5oJuMFUWe4u9bWSi3zSs8k9rnIj61iRiEMRBFYey','2004-04-01','Cameroon','Yaounde','admin','profile_images/qaXCAwyX8CkRrlm6gY8X8alWdfMGVgT3m54XZhM6.jpg','2025-02-04 06:22:32','2025-02-04 06:22:32'),(22,'Jonathan Zali','male',0,'$2y$12$eHUIQDGZWVUlXkh9bW4tiOfpXzr2lChbu5i75EYQ/CwA9O508.g3.','1997-07-12','China','Hong Kong','patient','profile_images/5rNbSm6MFwWYbG5mCSWkunsWzkJ8cqW6JTkHZZWc.jpg','2025-02-04 09:18:03','2025-02-04 09:18:03'),(24,'Ransom Benedict','male',0,'$2y$12$FIYXIovt3a8v1tCjA3dJWehju/VsRQ.XIhkkek21V5SC./mvBXk4e','2000-06-12','Nigeria','Portacourt','patient','profile_images/PEUk3N1gD5jf8wxQFyEFtaVrPtRi848CKfo3Vefn.jpg','2025-02-04 09:46:05','2025-02-04 09:46:05'),(25,'kouna de kouna','female',0,'$2y$12$72dTFcWZKe3//Dyrvv0lY.IhI.84wAtk7Rlt186pRY.yz/v0kZaPG','1943-12-06','Britain','Mystic Falls','patient','profile_images/baAsbDan7f9OgytzQGV0Sehr1vsr8SS2BRYtQ6ki.jpg','2025-02-04 09:58:30','2025-02-04 09:58:30'),(26,'keyz','male',0,'$2y$12$FeLmc4DdJ0HRYS4MIDk7LeYzdNuPUZc/xylpy32fKUK1Khx0HK6me','2001-03-12','Germany','Benin','patient','profile_images/8gig6GyspZVkLxfA0LkRJUTkICSwwua81x2Crrhs.jpg','2025-02-04 10:09:53','2025-02-04 10:09:53'),(27,'global','male',0,'$2y$12$f9nDMGZd4Tf50Oj74.g0ruUU.LwoslZZiduH15K5j1nOdxSv3t7Le','2001-03-12','Cameroon','Bamenda','patient','profile_images/XOAcwvkR8iFMU9U3t4Yc3EpzRpG4AmolGqR1cF0E.jpg','2025-02-04 10:20:42','2025-02-04 10:20:42'),(28,'Test patient','female',0,'$2y$12$ZdY25nujDKHQufIhwN8BvusIyTBK9V4KaMxPQ9NfvBLo8SSgk6.O2','2010-02-06','country','city','patient','profile_images/SP8KOcvrVovciYKRaWmXvMdPGDOoKWvLLhAyau6W.jpg','2025-02-04 10:30:59','2025-02-04 10:30:59'),(29,'Mc Elegance','female',0,'$2y$12$6tUXLDgEUzAzsKjIqqGcVuaP/0S5nFmFbV0jeFnZv4Ho3Rz8EEG5q','1990-03-12','UK','wellington','patient','profile_images/nggtFX2TwzaIn5P9XEa4LiRI3Uf9BMGgQe7R9pAi.jpg','2025-02-04 10:47:04','2025-02-04 10:47:04'),(30,'Brayant James','male',0,'$2y$12$DmV.oUTPoaqVGr/R7wMYsOsMHQSFUUixPHc5bLSV5XdhFMyAEqJn6','1974-03-12','Ivory Coast','Abidjan','doctor','profile_images/sZ31hpXZ2GQmUm3jIjbqQlueySHmMrLSvdnAjCNj.jpg','2025-02-05 13:39:11','2025-02-05 13:39:11'),(32,'Njeba Aiesha','female',0,'$2y$12$2O0d.bw67lN80Vr7zWDuk.GcOKju/hF.SN56PkmvZYjs/dVdOD20a','1988-06-16','Cameroon','Ndu','doctor','profile_images/PUgLp5qhu5TeFteIBX4sOttvfvhq6n5xAuq0TlfC.png','2025-02-05 17:41:47','2025-02-05 17:41:47'),(33,'Djiane Megane','female',0,'$2y$12$A33f0qyh6/I9vnQu7qxQbOyqC5Ejoq5NOj1rwWYRM9XPX7EdkhBIe','2004-03-15','Ivory Coast','Abidjan','doctor','profile_images/L3O6IENUwnpe1lvt38net0hFsyvi9NUSOzsZUrIq.webp','2025-02-07 01:51:05','2025-02-07 01:51:05'),(34,'Keyz Global','male',0,'$2y$12$UxY9JUrncXsTN9JOsoqSxeeO6Iq/PRnAyY0vQhdvi7ow8obSYp0pC','2004-01-12','Cameroon','Yaounde','doctor','profile_images/TxkKKbus0kfdtXqtm1npGHRdwxOuVWgBaj3xpV0C.png','2025-02-07 01:59:24','2025-02-07 01:59:24');
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

-- Dump completed on 2025-02-07  4:01:37
