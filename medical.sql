-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: medical
-- ------------------------------------------------------
-- Server version	8.0.40

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
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` bigint unsigned NOT NULL,
  `patient_id` bigint unsigned NOT NULL,
  `slot_id` bigint unsigned DEFAULT NULL,
  `status` enum('completed','cancelled','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
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

/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;

--
-- Table structure for table `availabilities`
--

DROP TABLE IF EXISTS `availabilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `availabilities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` bigint unsigned NOT NULL,
  `status` enum('active','expired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `week_number` int NOT NULL DEFAULT '6',
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

/*!40000 ALTER TABLE `availabilities` DISABLE KEYS */;
/*!40000 ALTER TABLE `availabilities` ENABLE KEYS */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;

--
-- Table structure for table `consultations`
--

DROP TABLE IF EXISTS `consultations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consultations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` bigint unsigned NOT NULL,
  `patient_id` bigint unsigned NOT NULL,
  `status` enum('cancelled','completed','ongoing') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ongoing',
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

/*!40000 ALTER TABLE `consultations` DISABLE KEYS */;
/*!40000 ALTER TABLE `consultations` ENABLE KEYS */;

--
-- Table structure for table `contact_information`
--

DROP TABLE IF EXISTS `contact_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_information` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_icon.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contact_information_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_information`
--

/*!40000 ALTER TABLE `contact_information` DISABLE KEYS */;
INSERT INTO `contact_information` VALUES (1,'phone','<i class=\"fas fa-phone\"></i>','2025-01-25 09:12:55','2025-01-25 09:12:55'),(2,'telegram','<i class=\"fa-brands fa-telegram\"></i>','2025-01-25 09:22:33','2025-01-25 09:22:33'),(3,'email','<i class=\"far fa-envelope\"></i>','2025-01-25 09:22:33','2025-01-25 09:22:33'),(4,'whatsapp','<i class=\"fa-brands fa-whatsapp\"></i>','2025-01-25 09:22:33','2025-01-25 09:22:33'),(5,'facebook','<i class=\"fa-brands fa-facebook-f\"></i>','2025-01-25 09:22:33','2025-01-25 09:22:33'),(6,'messenger','<i class=\"fa-brands fa-facebook-messenger\"></i>','2025-01-25 09:22:33','2025-01-25 09:22:33'),(7,'x-twitter','<i class=\"fa-brands fa-x-twitter\"></i>','2025-01-25 09:22:33','2025-01-25 09:22:33'),(8,'linkedin','<i class=\"fa-brands fa-linkedin\"></i>','2025-01-25 09:22:33','2025-01-25 09:22:33'),(9,'instagram','<i class=\"fa-brands fa-instagram\"></i>','2025-01-25 09:22:33','2025-01-25 09:22:33');
/*!40000 ALTER TABLE `contact_information` ENABLE KEYS */;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `specialty_id` bigint unsigned NOT NULL,
  `payment_id` bigint unsigned NOT NULL,
  `consultation_fee` decimal(10,2) NOT NULL DEFAULT '0.00',
  `experience` int NOT NULL DEFAULT '0',
  `rating` int NOT NULL DEFAULT '0',
  `license_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (3,17,4,5,1200.00,5,0,'Ky231Nuiu','Mbankomo General Hospital','It really is a hopeful when you help out the miserable','2025-01-30 08:11:38','2025-01-30 08:11:38');
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

--
-- Table structure for table `health_concerns`
--

DROP TABLE IF EXISTS `health_concerns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `health_concerns` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_icon.png',
  `specialty_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_concern_specialty` (`specialty_id`),
  KEY `health_concerns_name_index` (`name`),
  CONSTRAINT `fk_concern_specialty` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `health_concerns`
--

/*!40000 ALTER TABLE `health_concerns` DISABLE KEYS */;
INSERT INTO `health_concerns` VALUES (2,'Flu','flu.svg',7,'2025-01-28 11:10:45','2025-01-28 11:10:45'),(4,'Gastric','gastric.svg',2,'2025-01-28 11:13:53','2025-01-28 11:13:53'),(5,'Eye pains','eye pains.svg',10,'2025-01-28 11:51:15','2025-01-28 11:51:15'),(6,'Headache','headache.svg',7,'2025-01-28 11:52:59','2025-01-28 11:52:59');
/*!40000 ALTER TABLE `health_concerns` ENABLE KEYS */;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (28,'0001_01_01_000001_create_cache_table',1),(29,'0001_01_01_000002_create_jobs_table',1),(30,'2025_01_22_135715_create_payments_table',1),(31,'2025_01_22_135859_update_user',1),(32,'2025_01_22_140043_create_notifications_table',1),(33,'2025_01_22_140130_create_q_and_as_table',1),(34,'2025_01_22_140148_create_contact_information_table',1),(35,'2025_01_22_140202_create_specialties_table',1),(36,'2025_01_22_140209_create_doctors_table',1),(37,'2025_01_22_140256_create_patients_table',1),(38,'2025_01_22_140310_create_availabilities_table',1),(39,'2025_01_22_140332_create_slots_table',1),(40,'2025_01_22_140342_create_consultations_table',1),(41,'2025_01_22_140355_create_prescriptions_table',1),(42,'2025_01_22_142528_health_concern',1),(43,'2025_01_22_145547_appointment',1),(44,'2025_01_22_205541_create_sessions_table',1),(45,'2025_01_25_094732_create_user_contacts_table',1),(46,'2025_01_27_014634_create_testimonials_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `recipient_id` bigint unsigned NOT NULL,
  `type` enum('email','sms','push') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'email',
  `status` enum('sent','unread','read','none') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
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

/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `document_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patients_user_id_index` (`user_id`),
  CONSTRAINT `fk_patient_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('om','momo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (5,'676177173','om','2025-01-30 08:11:38','2025-01-30 08:11:38');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;

--
-- Table structure for table `prescriptions`
--

DROP TABLE IF EXISTS `prescriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prescriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `consultation_id` bigint unsigned NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

/*!40000 ALTER TABLE `prescriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `prescriptions` ENABLE KEYS */;

--
-- Table structure for table `q_and_as`
--

DROP TABLE IF EXISTS `q_and_as`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `q_and_as` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `q_and_as`
--

/*!40000 ALTER TABLE `q_and_as` DISABLE KEYS */;
INSERT INTO `q_and_as` VALUES (1,'How can I schedule a consultation via the website?','You can schedule a consultation by visiting our website, selecting a healthcare provider, and choosing an available time slot.','2025-01-28 12:37:58','2025-01-28 13:17:21'),(2,'What should I expect during my first online consultation?','During your first online consultation, you?ÇÖll discuss your medical history and current symptoms. The provider will assess your situation and recommend a treatment plan.','2025-01-28 13:18:38','2025-01-28 13:18:38'),(3,'What lifestyle changes can help manage my hypertension?','Manage hypertension by following a healthy diet, exercising regularly, reducing salt intake, limiting alcohol, and managing stress.','2025-01-28 13:19:20','2025-01-28 13:19:20'),(4,'How do I know if I need to see a doctor for my headaches?','See a doctor if your headaches are frequent, severe, or accompanied by symptoms like vision changes or nausea.','2025-01-28 13:20:33','2025-01-28 13:20:33'),(5,'What are the signs of dehydration?','Signs of dehydration include thirst, dry mouth, dark urine, fatigue, and dizziness.','2025-01-28 13:21:16','2025-01-28 13:21:16'),(6,'Can I get prescriptions during an online consultation?','Yes, if deemed appropriate, your healthcare provider can prescribe medications during your online consultation.','2025-01-28 13:21:49','2025-01-28 13:21:49'),(7,'How do I prepare for my online consultation?','Prepare by gathering your medical history, a list of current medications, and any questions you want to ask your provider.','2025-01-28 13:22:24','2025-01-28 13:22:24'),(8,'What should I do if I experience side effects from a medication?','If you experience side effects, contact your healthcare provider immediately to discuss your symptoms and potential alternatives.','2025-01-28 13:22:49','2025-01-28 13:22:49'),(9,'How can I manage anxiety using online resources?','You can manage anxiety by accessing online therapy sessions, mindfulness resources, and self-help materials available on our site.','2025-01-28 13:23:14','2025-01-28 13:23:14'),(10,'Is my personal information safe during an online consultation?','Yes, we prioritize your privacy and use secure platforms to protect your personal information during online consultations.','2025-01-28 13:23:52','2025-01-28 13:23:52');
/*!40000 ALTER TABLE `q_and_as` ENABLE KEYS */;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('5ArWalwq0b9RKJshwCs1lBBuQLD5uDhU1AIOtLGU',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoidFJ5blVwSXIzbVMxYTZhZlFFbjZ6WXZoallZc3M3OFN0ZldMVnd4YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zcGVjaWFsdGllcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1738610900),('a4o1vS4Lpf0PseVp1CnABNFByDqvdBxVYdJHc4lA',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUExKMzJIbHVKV1JHM2RkYTF0Q2ZTVUNPWnc4VGs5ZFlHUFIwTUltYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1738572213);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

--
-- Table structure for table `slots`
--

DROP TABLE IF EXISTS `slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slots` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `availability_id` bigint unsigned NOT NULL,
  `status` enum('expired','booked','available') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

/*!40000 ALTER TABLE `slots` DISABLE KEYS */;
/*!40000 ALTER TABLE `slots` ENABLE KEYS */;

--
-- Table structure for table `specialties`
--

DROP TABLE IF EXISTS `specialties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `specialties` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_icon.png',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `specialties_name_unique` (`name`),
  UNIQUE KEY `specialties_noun_unique` (`noun`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialties`
--

/*!40000 ALTER TABLE `specialties` DISABLE KEYS */;
INSERT INTO `specialties` VALUES (2,'Gastroenterology','Gastroenterologist','gastroenterology.svg','Gastroenterology is the medical specialty focused on diagnosing and treating diseases of the gastrointestinal (GI) tract, including the esophagus, stomach, intestines, liver, and pancreas','2025-01-28 09:12:09','2025-01-28 09:12:09'),(3,'Cardiology','Cardiologist','cardiology.svg','The medical specialty focused on diagnosing and treating heart and vascular diseases.','2025-01-28 09:27:08','2025-01-28 09:27:08'),(4,'Neurology','Neurologist','neurology.svg','The branch of medicine dealing with disorders of the nervous system, including the brain and spinal cord.','2025-01-28 09:39:14','2025-01-28 09:39:14'),(5,'Dermatology','Dermatologist','dermatology.svg','The specialty concerned with the diagnosis and treatment of skin, hair, and nail disorders.','2025-01-28 09:55:28','2025-01-28 09:55:28'),(6,'Orthopedics','Orthopedist','orthopedics.svg','The medical field focused on diagnosing and treating musculoskeletal disorders, including bones, joints, and muscles.','2025-01-28 09:58:24','2025-01-28 09:58:24'),(7,'Pediatrics','Pediatrician','pediatrics.svg','The specialty dedicated to the medical care of infants, children, and adolescents.','2025-01-28 10:00:07','2025-01-28 10:00:07'),(8,'Hematology','Hermatologist','hematology.svg','Specializes in blood disorders, including anemia, clotting disorders, and cancers like leukemia.','2025-01-28 10:07:05','2025-01-28 10:07:05'),(9,'Nephrology','Nephrologist','nephrology.svg','Deals with kidney function and diseases, including chronic kidney disease and kidney stones.','2025-01-28 10:09:41','2025-01-28 10:09:41'),(10,'Ophthalmology','Ophthalmologist','ophthalmology.svg','Focuses on eye health, including vision disorders and eye diseases.','2025-01-28 10:12:56','2025-01-28 10:12:56'),(11,'Oncology','Oncologist','oncology.svg','Specializes in cancer diagnosis, treatment, and research.','2025-01-28 10:14:26','2025-01-28 10:14:26'),(12,'Dentistry','Dentist','dentistry.svg','Specializes in the diagnosis, prevention, and treatment of dental and facial irregularities, often using braces or clear aligners to straighten teeth.','2025-01-28 10:18:55','2025-01-28 10:19:26'),(13,'Oral diseases','Oral disease specialist','oral diseases.svg','Oral diseases encompass a wide range of conditions that affect the mouth and surrounding structures.','2025-01-28 10:21:15','2025-01-28 10:21:15');
/*!40000 ALTER TABLE `specialties` ENABLE KEYS */;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `rating` int NOT NULL DEFAULT '3',
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
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

/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;

--
-- Table structure for table `user_contacts`
--

DROP TABLE IF EXISTS `user_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_contacts` (
  `user_id` bigint unsigned NOT NULL,
  `contact_id` bigint unsigned NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

/*!40000 ALTER TABLE `user_contacts` DISABLE KEYS */;
INSERT INTO `user_contacts` VALUES (12,1,'682980313','2025-01-26 13:07:46','2025-01-26 13:07:46'),(17,1,'691443727','2025-01-30 08:11:38','2025-01-30 08:11:38'),(17,2,'682980313','2025-01-30 08:11:38','2025-01-30 08:11:38'),(17,3,'afanyuys@gmail.com','2025-01-30 08:11:38','2025-01-30 08:11:38'),(12,3,'keyzglobal0313@gmail.com','2025-01-26 13:07:46','2025-01-26 13:07:46'),(12,4,'655955186','2025-01-26 13:07:46','2025-01-26 13:07:46'),(17,4,'676177173','2025-01-30 08:11:38','2025-01-30 08:11:38'),(17,5,'https://web.facebook.com/profile.php?id=61550895611069','2025-01-30 08:11:38','2025-01-30 08:11:38');
/*!40000 ALTER TABLE `user_contacts` ENABLE KEYS */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `Nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cameroon',
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yaounde',
  `role` enum('admin','doctor','patient') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'patient',
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'placeholder.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (12,'keyz dev','male',0,'$2y$12$LwMQOQiJQFTp2zozfZSsIum6NPcj9t2iQAgliL5Y25HK6df/.LfFe','2004-01-05','Cameroon','Yaounde','admin','profile_images/b6J6onUR1ocmwde3bm6kWHtce21LJOeO8oCaSbQT.jpg','2025-01-26 13:07:46','2025-01-26 13:07:46'),(17,'Afanyuy Caleb','male',0,'$2y$12$XnB5uzsmw3wY7ceOIr9yeOLXla.S3EZCYU6jm2w.Mh4UwvxZMZ10m','2001-04-03','Cameroon','Yaounde','doctor','profile_images/qiGS5QHyGoi7UdeEFngIF5b0qfg68GKKMyW5fUgs.jpg','2025-01-30 08:11:38','2025-01-30 08:11:38');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Dumping routines for database 'medical'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-04  6:52:50
