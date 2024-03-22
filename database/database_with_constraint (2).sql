-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: electronic_supermarket
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounts` (
  `account_id` int NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT (now()),
  `updated_at` datetime DEFAULT (now()),
  `is_active` tinyint(1) DEFAULT '1',
  `accountscol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `phone_number` (`phone_number`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  CONSTRAINT `check_created_bigger_updated_accounts` CHECK ((`created_at` <= `updated_at`))
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,'0988722521','thien123','hien@gmail.com','2024-03-21 10:39:51','2024-03-21 10:39:51',1,NULL),(2,'0988722522','qhuy123','huy@gmail.com','2024-03-21 10:39:51','2024-03-21 10:39:51',1,NULL),(3,'0988722523','mloc123','loc@gmail.com','2024-03-21 10:39:51','2024-03-21 10:39:51',1,NULL),(4,'0988722524','hphong123','phong@gmail.com','2024-03-21 10:39:51','2024-03-21 10:39:51',1,NULL),(5,'0988722525','tlan123','lan@gmail.com','2024-03-21 10:39:51','2024-03-21 10:39:51',1,NULL),(6,'0988722526','tlieu123','lieu@gmail.com','2024-03-21 10:39:51','2024-03-21 10:39:51',1,NULL),(7,'0988722527','tlai123','lai@gmail.com','2024-03-21 10:39:51','2024-03-21 10:39:51',1,NULL),(8,'0988722528','chuong123','camhuong@gmail.com','2024-03-21 10:39:51','2024-03-21 10:39:51',1,NULL),(9,'11111111','123','customer1@gmail.com','2024-03-21 10:39:51','2024-03-21 10:39:51',1,NULL),(10,'22222222','123','customer2@gmail.com','2024-03-21 10:39:51','2024-03-21 10:39:51',1,NULL);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(100) DEFAULT '' COMMENT 'Ex: SANYO, TOSHIBA,...',
  `brand_logo` varchar(300) DEFAULT '',
  `supplier_id` int NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`brand_id`),
  UNIQUE KEY `brand_name` (`brand_name`),
  KEY `brands_ibfk_1` (`supplier_id`),
  CONSTRAINT `brands_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Apple','',1,1),(2,'Samsung','',2,1),(3,'Xiaomi','',3,1),(4,'OPPO','',4,1),(5,'Acer','',5,1),(6,'HP','',6,1),(7,'ASUS','',7,1),(8,'Lenovo','',8,1),(9,'AVA+','',9,1),(10,'Xmobile','',10,1),(11,'Baseus','',11,1),(12,'JBL','',12,1),(13,'Sony','',13,1),(14,'Logitech','',14,1),(15,'Genius','',15,1),(16,'Corsair','',16,1),(17,'Dareu','',17,1),(18,'Rapoo','',18,1);
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT '' COMMENT 'Ex: Tủ lạnh, máy giặt,...',
  `category_logo` varchar(300) DEFAULT '',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Điện thoại','',1),(2,'Laptop','',1),(3,'Smartwatch','',1),(4,'Sạc dự phòng','',1),(5,'Tai nghe Bluetooth','',1),(6,'Loa','',1),(7,'Chuột máy tính','',1),(8,'Bàn phím','',1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contracts`
--

DROP TABLE IF EXISTS `contracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contracts` (
  `contract_id` int NOT NULL AUTO_INCREMENT,
  `staff_id` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  PRIMARY KEY (`contract_id`),
  KEY `staff_id` (`staff_id`),
  CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contracts`
--

LOCK TABLES `contracts` WRITE;
/*!40000 ALTER TABLE `contracts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contracts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `customer_fullname` varchar(100) NOT NULL DEFAULT '',
  `role_id` int NOT NULL DEFAULT '5',
  `account_id` int NOT NULL,
  `gender` tinyint(1) DEFAULT '0' COMMENT 'Male: 0, Female: 1',
  `address` varchar(200) DEFAULT '' COMMENT 'Địa chỉ của khách hàng',
  `date_of_birth` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`customer_id`),
  KEY `customers_ibfk_1` (`role_id`),
  KEY `account_id` (`account_id`),
  CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`),
  CONSTRAINT `check_gender_customers` CHECK (((`gender` = 0) or (`gender` = 1))),
  CONSTRAINT `check_role_customers` CHECK ((`role_id` = 5))
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Nguyễn Thị Lan',5,5,1,'Quận 1, Thành Phố Hồ Chí Minh','2003-06-12',1),(2,'Nguyễn Thị Liễu',5,6,1,'Quận 2, Thành Phố Hồ Chí Minh','2003-04-12',1),(3,'Nguyễn Thị Lài',5,7,1,'Quận 3, Thành Phố Hồ Chí Minh','2004-02-11',1),(4,'Nguyễn Thị Cẩm Hường',5,8,1,'Quận 4, Thành Phố Hồ Chí Minh','2001-05-11',1),(5,'customer1',5,9,1,'209 THD','2002-10-10',1),(6,'customer2',5,10,1,'310 TDD','2010-02-02',1);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `decentralizations`
--

DROP TABLE IF EXISTS `decentralizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `decentralizations` (
  `decentralization_id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `module_id` int NOT NULL,
  `function_id` int NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`decentralization_id`),
  UNIQUE KEY `decentralizations_index_0` (`role_id`,`module_id`,`function_id`),
  KEY `decentralizations_ibfk_2` (`module_id`),
  KEY `decentralizations_ibfk_3` (`function_id`),
  CONSTRAINT `decentralizations_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  CONSTRAINT `decentralizations_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `modules` (`module_id`),
  CONSTRAINT `decentralizations_ibfk_3` FOREIGN KEY (`function_id`) REFERENCES `functions` (`function_id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `decentralizations`
--

LOCK TABLES `decentralizations` WRITE;
/*!40000 ALTER TABLE `decentralizations` DISABLE KEYS */;
INSERT INTO `decentralizations` VALUES (1,1,1,1,1),(2,1,1,2,1),(3,1,1,3,1),(4,1,1,4,1),(5,1,1,5,1),(6,1,2,1,1),(7,1,2,2,1),(8,1,2,3,1),(9,1,2,4,1),(10,1,2,5,1),(11,1,3,1,1),(12,1,3,2,1),(13,1,3,3,1),(14,1,3,4,1),(16,1,4,1,1),(17,1,4,2,1),(18,1,4,3,1),(19,1,4,4,1),(21,1,5,1,1),(22,1,5,2,1),(23,1,5,3,1),(24,1,5,4,1),(26,1,6,1,1),(27,1,6,2,1),(28,1,6,3,1),(29,1,6,4,1),(31,1,7,1,1),(32,1,7,2,1),(33,1,7,3,1),(34,1,7,4,1),(36,1,8,1,1),(37,1,8,2,1),(38,1,8,3,1),(39,1,8,4,1),(41,1,9,1,1),(42,1,9,2,1),(43,1,9,3,1),(44,1,9,4,1),(46,1,10,1,1),(47,1,10,2,1),(48,1,10,3,1),(49,1,10,4,1),(51,1,11,1,1),(52,1,11,2,1),(53,1,11,3,1),(54,1,11,4,1),(56,1,12,1,1),(57,1,12,2,1),(58,1,12,3,1),(59,1,12,4,1),(61,2,1,1,1),(62,2,1,2,1),(63,2,1,3,1),(64,2,1,4,1),(65,2,1,5,1),(66,2,2,1,1),(67,2,2,2,1),(68,2,2,3,1),(69,2,2,4,1),(70,2,2,5,1),(71,2,3,1,1),(72,2,3,2,1),(73,2,3,3,1),(74,2,3,4,1),(76,2,4,1,1),(77,2,4,2,1),(78,2,4,3,1),(79,2,4,4,1),(81,2,5,1,1),(82,2,5,2,1),(83,2,5,3,1),(84,2,5,4,1),(86,2,6,1,1),(87,2,6,2,1),(88,2,6,3,1),(89,2,6,4,1),(91,2,7,1,1),(92,2,7,2,1),(93,2,7,3,1),(94,2,7,4,1),(96,2,8,1,1),(97,2,8,2,1),(98,2,8,3,1),(99,2,8,4,1),(101,2,9,1,1),(102,2,9,2,1),(103,2,9,3,1),(104,2,9,4,1),(106,2,10,1,1),(107,2,10,5,1),(108,2,11,1,1),(109,2,11,2,1),(110,2,11,3,1),(111,2,11,4,1),(112,3,1,1,1),(113,3,1,2,1),(114,3,1,3,1),(115,3,1,5,1),(116,3,2,5,1),(117,3,3,1,1),(118,3,3,2,1),(119,3,3,3,1),(120,3,4,1,1),(121,3,9,1,1),(122,3,9,2,1),(123,3,9,3,1),(124,3,9,4,1),(125,3,10,5,1),(126,4,1,5,1),(127,4,2,5,1),(128,4,4,1,1),(129,4,4,2,1),(130,4,4,3,1),(131,4,4,4,1),(132,4,5,1,1),(133,4,5,2,1),(134,4,5,3,1),(135,4,5,4,1),(136,4,6,1,1),(137,4,7,1,1),(138,4,7,2,1),(139,4,7,3,1),(140,4,7,4,1),(141,4,8,1,1),(142,4,8,2,1),(143,4,8,3,1),(144,4,8,4,1),(145,4,10,5,1);
/*!40000 ALTER TABLE `decentralizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `export_details`
--

DROP TABLE IF EXISTS `export_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `export_details` (
  `export_detail_id` int NOT NULL AUTO_INCREMENT,
  `export_id` int NOT NULL,
  `shipment_id` int NOT NULL,
  `unit_price_export` decimal(10,2) DEFAULT '0.00',
  `quantity_export` int DEFAULT '0',
  PRIMARY KEY (`export_detail_id`),
  KEY `export_id` (`export_id`),
  CONSTRAINT `export_details_ibfk_1` FOREIGN KEY (`export_id`) REFERENCES `exports` (`export_id`),
  CONSTRAINT `export_details_ibfk_2` FOREIGN KEY (`export_detail_id`) REFERENCES `shipments` (`shipment_id`),
  CONSTRAINT `check_export_quantity_export_details` CHECK ((`quantity_export` > 0))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `export_details`
--

LOCK TABLES `export_details` WRITE;
/*!40000 ALTER TABLE `export_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `export_details` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `calculate_total_price_export_insert` AFTER INSERT ON `export_details` FOR EACH ROW BEGIN
    UPDATE `exports`
    SET `exports`.total_price = (
        SELECT SUM(unit_price_export * quantity_export)
        FROM export_details
        WHERE export_id = NEW.export_id
    )
    WHERE export_id = NEW.export_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `calculate_total_price_export_update` AFTER UPDATE ON `export_details` FOR EACH ROW BEGIN
    UPDATE `exports`
    SET `exports`.total_price = (
        SELECT SUM(unit_price_export * quantity_export)
        FROM export_details
        WHERE export_id = NEW.export_id
    )
    WHERE export_id = NEW.export_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `exports`
--

DROP TABLE IF EXISTS `exports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exports` (
  `export_id` int NOT NULL AUTO_INCREMENT,
  `staff_id` int NOT NULL,
  `order_id` int NOT NULL,
  `export_date` datetime DEFAULT (now()),
  `total_price` decimal(10,2) DEFAULT '0.00' COMMENT 'Không tự sinh đc như mysql',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`export_id`),
  KEY `exports_ibfk_1` (`staff_id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `exports_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`),
  CONSTRAINT `exports_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exports`
--

LOCK TABLES `exports` WRITE;
/*!40000 ALTER TABLE `exports` DISABLE KEYS */;
/*!40000 ALTER TABLE `exports` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `check_role_export_insert` BEFORE INSERT ON `exports` FOR EACH ROW BEGIN
    DECLARE role_id INT;
    SELECT `staffs`.`role_id` INTO role_id FROM `staffs` WHERE `staff_id` = NEW.staff_id;
    IF NOT role_id IN (1,2,4) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: role_id of staff must be 1, 2, or 4';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `check_role_export_update` BEFORE UPDATE ON `exports` FOR EACH ROW BEGIN
    DECLARE role_id INT;
    SELECT `staffs`.`role_id` INTO role_id FROM `staffs` WHERE `staff_id` = NEW.staff_id;
    IF NOT role_id IN (1,2,4) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: role_id of staff must be 1, 2, or 4';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `functions`
--

DROP TABLE IF EXISTS `functions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `functions` (
  `function_id` int NOT NULL AUTO_INCREMENT,
  `function_name` varchar(100) DEFAULT '',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`function_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `functions`
--

LOCK TABLES `functions` WRITE;
/*!40000 ALTER TABLE `functions` DISABLE KEYS */;
INSERT INTO `functions` VALUES (1,'Xem',1),(2,'Thêm',1),(3,'Sửa',1),(4,'Xóa',1),(5,'Quản lý thông tin cá nhân',1);
/*!40000 ALTER TABLE `functions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guarantees`
--

DROP TABLE IF EXISTS `guarantees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guarantees` (
  `guarantee_id` int NOT NULL AUTO_INCREMENT,
  `serial_number` int NOT NULL,
  `start_date` date DEFAULT (now()),
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`guarantee_id`),
  KEY `serial_number` (`serial_number`),
  CONSTRAINT `guarantees_ibfk_1` FOREIGN KEY (`serial_number`) REFERENCES `product_details` (`serial_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guarantees`
--

LOCK TABLES `guarantees` WRITE;
/*!40000 ALTER TABLE `guarantees` DISABLE KEYS */;
/*!40000 ALTER TABLE `guarantees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imports`
--

DROP TABLE IF EXISTS `imports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imports` (
  `import_id` int NOT NULL AUTO_INCREMENT,
  `staff_id` int NOT NULL,
  `import_date` datetime DEFAULT (now()),
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`import_id`),
  KEY `imports_ibfk_1` (`staff_id`),
  CONSTRAINT `imports_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imports`
--

LOCK TABLES `imports` WRITE;
/*!40000 ALTER TABLE `imports` DISABLE KEYS */;
/*!40000 ALTER TABLE `imports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `like_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `customer_id` int NOT NULL,
  PRIMARY KEY (`like_id`),
  UNIQUE KEY `likes_index_1` (`product_id`,`customer_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modules` (
  `module_id` int NOT NULL AUTO_INCREMENT,
  `module_name` varchar(200) DEFAULT '',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'Tài khoản',1),(2,'Nhân viên',1),(3,'Khách hàng',1),(4,'Sản phẩm',1),(5,'Nhà cung cấp',1),(6,'Kho hàng',1),(7,'Nhập hàng',1),(8,'Xuất hàng',1),(9,'Hóa đơn',1),(10,'Lương',1),(11,'Thống kê',1),(12,'Phân quyền',1);
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `options` (
  `option_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `ram` int DEFAULT NULL COMMENT 'GB',
  `rom` int DEFAULT NULL COMMENT 'GB',
  `chip` varchar(200) DEFAULT NULL,
  `color` varchar(11) DEFAULT NULL,
  `battery` int DEFAULT NULL COMMENT 'mAh',
  `screen` float DEFAULT NULL COMMENT 'inch',
  `wh` int DEFAULT NULL COMMENT 'Công suất tiêu thụ điện khi sạc',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`option_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `options_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `order_detail_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `number_of_products` int DEFAULT '1' COMMENT 'Phải > 0',
  `color_of_product` varchar(20) DEFAULT '',
  PRIMARY KEY (`order_detail_id`),
  KEY `order_details_ibfk_1` (`order_id`),
  KEY `order_details_ibfk_2` (`product_id`),
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  CONSTRAINT `check_number_of_product_order_details` CHECK ((`number_of_products` > 0)),
  CONSTRAINT `check_price_order_details` CHECK ((`price` >= 0))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (1,1,1,34990000.00,1,'Đen'),(2,1,9,500000.00,2,'Đen');
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `calculate_total_money_order_insert` AFTER INSERT ON `order_details` FOR EACH ROW BEGIN
    UPDATE `orders`
    SET `orders`.total_money = (
        SELECT SUM(number_of_products * price)
        FROM order_details
        WHERE order_id = NEW.order_id
    )
    WHERE order_id = NEW.order_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `calculate_total_money_order_update` AFTER UPDATE ON `order_details` FOR EACH ROW BEGIN
    UPDATE `orders`
    SET `orders`.total_money = (
        SELECT SUM(number_of_products * price)
        FROM order_details
        WHERE order_id = NEW.order_id
    )
    WHERE order_id = NEW.order_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `staff_id` int NOT NULL,
  `account_id` int NOT NULL,
  `receiver_name` varchar(100) DEFAULT '' COMMENT 'Có thể giấu tên',
  `email_of_receiver` varchar(100) NOT NULL,
  `phone_number_of_receiver` varchar(20) NOT NULL,
  `note` varchar(100) DEFAULT '',
  `order_date` datetime DEFAULT (now()),
  `status_of_order` enum('Pending','Processing','Shipped','Delivered','Cancelled') DEFAULT 'Pending',
  `total_money` decimal(10,2) DEFAULT '0.00',
  `shipping_method` varchar(100) DEFAULT '',
  `shipping_address` varchar(200) NOT NULL,
  `shipping_date` datetime DEFAULT NULL,
  `tracking_number` varchar(100) DEFAULT '',
  `payment_method` varchar(100) DEFAULT '',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`order_id`),
  KEY `orders_ibfk_1` (`account_id`),
  KEY `staff_id` (`staff_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`),
  CONSTRAINT `check_email_format_orders` CHECK (regexp_like(`email_of_receiver`,_utf8mb4'^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,6}$')),
  CONSTRAINT `check_phone_number_orders` CHECK (regexp_like(`phone_number_of_receiver`,_utf8mb4'^0[0-9]{9}$'))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,3,5,'Anh Hiển','thehien@gmail.com','0786705877','Tặng anh Hiển','2024-03-21 10:41:53','Pending',35990000.00,'express','Nghĩa Địa Gia Đôi','2024-05-07 19:34:36','70L1-13579','COD',1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `check_account_order_insert` BEFORE INSERT ON `orders` FOR EACH ROW BEGIN
    DECLARE role_id INT;
    SELECT `customers`.`role_id` INTO role_id FROM `customers` WHERE `account_id` = NEW.account_id;
    IF role_id IS NULL THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: Account ID not found in customers';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `check_shipping_date_order_insert` BEFORE INSERT ON `orders` FOR EACH ROW BEGIN
    IF (NEW.shipping_date <= CURDATE()) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: Shipping_date must bigger current date';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `check_role_staff_order_insert` BEFORE INSERT ON `orders` FOR EACH ROW BEGIN
    DECLARE role_id INT;
    SELECT `staffs`.`role_id` INTO role_id FROM `staffs` WHERE `staff_id` = NEW.staff_id;
    IF NOT role_id IN (1,2,3) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: role_id of staff must be 1, 2, or 3';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `check_account_order_update` BEFORE UPDATE ON `orders` FOR EACH ROW BEGIN
    DECLARE role_id INT;
    SELECT `customers`.`role_id` INTO role_id FROM `customers` WHERE `account_id` = NEW.account_id;
    IF role_id IS NULL THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: Account ID not found in customers';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `check_shipping_date_order_update` BEFORE UPDATE ON `orders` FOR EACH ROW BEGIN
    IF (NEW.shipping_date <= CURDATE()) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: Shipping_date must bigger current date';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `check_role_staff_order_update` BEFORE UPDATE ON `orders` FOR EACH ROW BEGIN
    DECLARE role_id INT;
    SELECT `staffs`.`role_id` INTO role_id FROM `staffs` WHERE `staff_id` = NEW.staff_id;
    IF NOT role_id IN (1,2,3) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: role_id of staff must be 1, 2, or 3';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_details` (
  `serial_number` int NOT NULL,
  `product_id` int NOT NULL,
  `sold` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`serial_number`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_details`
--

LOCK TABLES `product_details` WRITE;
/*!40000 ALTER TABLE `product_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `product_image_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `image_url` varchar(300) DEFAULT '' COMMENT 'Phải có ít nhất 1 ảnh mặc định',
  PRIMARY KEY (`product_image_id`),
  KEY `product_images_ibfk_1` (`product_id`),
  CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(350) NOT NULL,
  `brand_id` int NOT NULL,
  `category_id` int NOT NULL,
  `price` decimal(10,2) DEFAULT '0.00' COMMENT 'Phải >= 0',
  `guarantee` int DEFAULT '0',
  `thumbnail` varchar(300) DEFAULT '' COMMENT 'Phải có ảnh mặc định',
  `description` longtext,
  `created_at` datetime DEFAULT (now()),
  `updated_at` datetime DEFAULT (now()),
  `average_rating` float DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`product_id`),
  KEY `products_ibfk_1` (`brand_id`),
  KEY `products_ibfk_2` (`category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`),
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  CONSTRAINT `check_created_bigger_updated_products` CHECK ((`created_at` <= `updated_at`)),
  CONSTRAINT `check_guarantee_products` CHECK ((`guarantee` >= 0)),
  CONSTRAINT `check_price_products` CHECK ((`price` > 0))
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'iPhone 15 Pro Max RAM 8GB/ROM 256GB',1,1,34990000.00,12,'smartphone/iPhone_15_Pro_Max.jpg','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(2,'Samsung Galaxy S23 FE 5G RAM 8GB/ROM 128GB',2,1,14890000.00,12,'smartphone/samsung_galaxy_s23_fe_5g.jpeg','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(3,'Xiaomi Redmi Note 13 RAM 6GB/ROM 128GB',3,1,4890000.00,18,'smartphone/xiaomi_redmi_note_13.jpg','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(4,'OPPO A57 RAM 4GB/ROM 128GB',4,1,4990000.00,12,'smartphone/oppo_a57.jpg','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(5,'Acer Aspire 5 A514 54 5127 i5 1135G7 (NX.A28SV.007) RAM 8GB/SSD 512GB',5,2,15490000.00,12,'laptop/acer_aspire_a514_54_5127_i5.jpg','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(6,'HP Pavilion 15 eg2062TX i5 1235U (7C0W7PA) RAM 8GB/SSD 512GB',6,2,20590000.00,12,'laptop/hp_pavilion_15_eg2062tx_i5.jpg','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(7,'Asus TUF Gaming F15 FX507ZC4 i5 12500H (HN074W) RAM 8GB/SSD 512GB',7,2,23990000.00,24,'laptop/asus_tuf_gaming_f15_fx507zc4_i5.jpg','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(8,'Lenovo Gaming Legion 5 16IRH8 i5 13500H (82YA00BSVN) RAM 16GB/SSD 512',8,2,36990000.00,36,'laptop/lenovo_legion_5_16irh8_i5.jpg','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(9,'AVA+ 15W JP399',9,4,500000.00,12,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(10,'Xmobile 20W DS223B',10,4,890000.00,12,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(11,'Baseus Comet 22.5W PPMD10 kèm cáp Lightning và Type C',11,4,1100000.00,12,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(12,'Apple Watch SE 2023 GPS 40mm viền nhôm dây thể thao',1,3,6390000.00,12,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(13,'Samsung Galaxy Watch5 Pro LTE 45mm dây silicone',2,3,12990000.00,12,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(14,'Xiaomi Redmi Watch 4 47.5mm dây silicone',3,3,2690000.00,12,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(15,'Tai nghe Bluetooth AirPods Pro Gen 2 MagSafe Charge (USB-C) Apple MTJV3',1,5,6200000.00,12,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(16,'Tai nghe Bluetooth True Wireless Xiaomi Redmi Buds 5 Pro',3,5,1990000.00,12,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(17,'Tai nghe Bluetooth True Wireless AVA+ FreeGo A20',9,5,290000.00,12,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(18,'Loa Bluetooth JBL Pulse 5',12,6,6690000.00,12,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(19,'Loa Bluetooth Sony SRS-XB13',13,6,1290000.00,12,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(20,'Loa Bluetooth AVA+ FreeGo F13',9,6,450000.00,12,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(21,'Chuột Không Dây Silent Rapoo B2S',18,7,200000.00,24,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(22,'Chuột Không dây DareU LM106G',17,7,150000.00,24,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(23,'Chuột Có dây Gaming Corsair M55 RGB Pro',16,7,890000.00,24,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(24,'Chuột Có dây Gaming Genius Scorpion M700',15,7,490000.00,12,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(25,'Bàn phím Bluetooth Logitech K380',14,8,750000.00,12,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1),(26,'Bàn Phím Có Dây DareU EK87',17,8,650000.00,24,'','Đây là mô tả sản phẩm','2024-03-21 10:40:44','2024-03-21 10:40:44',0,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `review_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `rating` float DEFAULT NULL,
  `comment` longtext,
  `review_date` datetime DEFAULT (now()),
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`review_id`),
  KEY `product_id` (`product_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin',1),(2,'Nhân viên quản lý',1),(3,'Nhân viên bán hàng',1),(4,'Nhân viên kho',1),(5,'Khách hàng',1);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipments`
--

DROP TABLE IF EXISTS `shipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipments` (
  `shipment_id` int NOT NULL AUTO_INCREMENT,
  `import_id` int NOT NULL,
  `product_id` int NOT NULL,
  `unit_price_import` decimal(10,2) DEFAULT '0.00' COMMENT 'Phải > 0',
  `quantity` int DEFAULT '0' COMMENT 'Phải > giá trị tối thiểu của 1 lô hàng',
  `remain` int DEFAULT '0' COMMENT 'Phải bé 1 số lượng cụ thể thì mới nhập thêm lô',
  `sku_id` int NOT NULL,
  `mfg` date DEFAULT NULL,
  `exp` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`shipment_id`),
  KEY `shipments_ibfk_1` (`product_id`),
  KEY `import_id` (`import_id`),
  KEY `sku_id` (`sku_id`),
  CONSTRAINT `shipments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  CONSTRAINT `shipments_ibfk_2` FOREIGN KEY (`import_id`) REFERENCES `imports` (`import_id`),
  CONSTRAINT `shipments_ibfk_3` FOREIGN KEY (`sku_id`) REFERENCES `skus` (`sku_id`),
  CONSTRAINT `check_mfg_shipments` CHECK ((`mfg` < `exp`)),
  CONSTRAINT `check_quantity_shipments` CHECK ((`quantity` > 0)),
  CONSTRAINT `check_remain_shipments` CHECK (((`remain` >= 0) and (`remain` <= `quantity`))),
  CONSTRAINT `check_unit_price_import_shipments` CHECK ((`unit_price_import` > 0))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipments`
--

LOCK TABLES `shipments` WRITE;
/*!40000 ALTER TABLE `shipments` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipments` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `check_exp_shipment_insert` BEFORE INSERT ON `shipments` FOR EACH ROW BEGIN
    IF (NEW.exp <= CURDATE()) THEN
        SET NEW.is_active = 0;
    ELSE 
        SET NEW.is_active = 1;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `check_exp_shipment_update` BEFORE UPDATE ON `shipments` FOR EACH ROW BEGIN
    IF (NEW.exp <= CURDATE()) THEN
        SET NEW.is_active = 0;
    ELSE 
        SET NEW.is_active = 1;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `skus`
--

DROP TABLE IF EXISTS `skus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `skus` (
  `sku_id` int NOT NULL AUTO_INCREMENT,
  `sku_code` varchar(100) DEFAULT '' COMMENT 'Phải đủ số lượng ký tự của 1 sku code, nếu có enum về color thì sẽ dễ quản lý hơn',
  `product_id` int NOT NULL,
  `option_id` int NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`sku_id`),
  UNIQUE KEY `sku_code` (`sku_code`),
  KEY `skus_ibfk_1` (`product_id`),
  KEY `option_id` (`option_id`),
  CONSTRAINT `skus_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  CONSTRAINT `skus_ibfk_2` FOREIGN KEY (`option_id`) REFERENCES `options` (`option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skus`
--

LOCK TABLES `skus` WRITE;
/*!40000 ALTER TABLE `skus` DISABLE KEYS */;
/*!40000 ALTER TABLE `skus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staffs` (
  `staff_id` int NOT NULL AUTO_INCREMENT,
  `account_id` int NOT NULL,
  `staff_fullname` varchar(100) NOT NULL,
  `role_id` int NOT NULL,
  `gender` tinyint(1) DEFAULT '0' COMMENT 'Male: 0, Female: 1',
  `entry_date` date DEFAULT (now()),
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`staff_id`),
  KEY `staffs_ibfk_1` (`role_id`),
  KEY `account_id` (`account_id`),
  CONSTRAINT `staffs_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  CONSTRAINT `staffs_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`),
  CONSTRAINT `check_fullname_staffs` CHECK (regexp_like(`staff_fullname`,_utf8mb4'^[a-zA-z áàảãạÁÀẢÃẠăắằặẳẵĂẮẰẲẴẶâấầẩẫậÂẤẦẨẪẬéèẻẽẹÉÈẺẼẸêếềểễệÊẾỂỄỆíìỉĩịÍÌỈĨỊúùủũụÚÙỦŨỤưứừửữựƯỨỪỬỮỰóòỏõọÓÒỎÕỌôốồổỗộÔỐỒỔỖỘơớờởỡợƠỚỜỞỠỢđĐýỳỷỹỵÝỲỶỸỴ]+$'))
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffs`
--

LOCK TABLES `staffs` WRITE;
/*!40000 ALTER TABLE `staffs` DISABLE KEYS */;
INSERT INTO `staffs` VALUES (1,1,'Lê Nguyễn Thế Hiển',1,0,'2024-03-21',1),(2,2,'Võ Quốc Huy',2,0,'2024-03-21',1),(3,3,'Khổng Minh Lộc',3,0,'2024-03-21',1),(4,4,'Lâm Hồng Phong',4,0,'2024-03-21',1);
/*!40000 ALTER TABLE `staffs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statistics`
--

DROP TABLE IF EXISTS `statistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `statistics` (
  `statistic_id` int NOT NULL AUTO_INCREMENT,
  `statistic_name` varchar(200) NOT NULL COMMENT 'Dùng các function, trigger, procedure, view,... Để tạo ra các dữ liệu muốn thống kê',
  `value` longtext NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`statistic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistics`
--

LOCK TABLES `statistics` WRITE;
/*!40000 ALTER TABLE `statistics` DISABLE KEYS */;
/*!40000 ALTER TABLE `statistics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suppliers` (
  `supplier_id` int NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(200) NOT NULL,
  `phone_number_of_supplier` varchar(20) NOT NULL,
  `address_of_supplier` varchar(200) NOT NULL,
  `email_of_supplier` varchar(100) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`supplier_id`),
  UNIQUE KEY `phone_number_of_supplier` (`phone_number_of_supplier`),
  UNIQUE KEY `email_of_supplier` (`email_of_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'Apple Store Việt Nam','0918001192','268 Lý Thường Kiệt, Phường 14, Quận 10, Thành phố Hồ Chí Minh','applestorevn@gmail.com',1),(2,'Galaxy Store Việt Nam','0918001193','280 Đ. An Dương Vương, Phường 4, Quận 5, Thành phố Hồ Chí Minh','galaxystorevn@gmail.com',1),(3,'Xiaomi Store Việt Nam','0918001194','217 Đ. Hồng Bàng, Phường 11, Quận 5, Thành phố Hồ Chí Minh','mistorevn@gmail.com',1),(4,'OPPO Store Việt Nam','0918001195','01 Võ Văn Ngân, Linh Chiểu, Thủ Đức, Thành phố Hồ Chí Minh','oppostorevn@gmail.com',1),(5,'Acer Store Việt Nam','0918001196','704-05/37 Đ. Tôn Đức Thắng, Ward, Quận 1, Thành phố Hồ Chí Minh','acerstorevn@gmail.com',1),(6,'HP Store Việt Nam','0918001197','475A Đ. Điện Biên Phủ, Phường 25, Bình Thạnh, Thành phố Hồ Chí Minh','hpstorevn@gmail.com',1),(7,'ASUS Store Việt Nam','0918001198','196 Pasteur, Phường 6, Quận 3, Thành phố Hồ Chí Minh','asusstorevn@gmail.com',1),(8,'Lenovo Store Việt Nam','0918001199','55 Giải Phóng, Đồng Tâm, Hai Bà Trưng, Hà Nội','lenovostorevn@gmail.com',1),(9,'AVA+ Store Việt Nam','0918001200','136 Xuân Thủy, Dịch Vọng Hậu, Cầu Giấy, Hà Nội','avaplusstorevn@gmail.com',1),(10,'Xmobile Store Việt Nam','0918001201','Khu phố 6, TP Thủ Đức, Thành phố Hồ Chí Minh','xmobilestorevn@gmail.com',1),(11,'Baseus Store Việt Nam','0918001202','227 Đ. Nguyễn Văn Cừ, Phường 4, Quận 5, Thành phố Hồ Chí Minh','baseusstorevn@gmail.com',1),(12,'JBL Store Việt Nam','0918001203','12 Nguyễn Văn Bảo, Phường 4, Gò Vấp, Thành phố Hồ Chí Minh','jblstorevn@gmail.com',1),(13,'Sony Store Việt Nam','0918001204','97 Võ Văn Tần, Phường 6, Quận 3, Thành phố Hồ Chí Minh','sonystorevn@gmail.com',1),(14,'Logitech Store Việt Nam','0918001205','10-12 Đ. Đinh Tiên Hoàng, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh','logitechstorevn@gmail.com',1),(15,'Genius Store Việt Nam','0918001206','19 Đ. Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Thành phố Hồ Chí Minh','geniusstorevn@gmail.com',1),(16,'Corsair Store Việt Nam','0918001207','665-667-669 Đ. Điện Biên Phủ, Phường 1, Quận 3, Thành phố Hồ Chí Minh','corsairstorevn@gmail.com',1),(17,'Dareu Store Việt Nam','0918001208','180 Đ. Cao Lỗ, Phường 4, Quận 8, Thành phố Hồ Chí Minh','dareustorevn@gmail.com',1),(18,'Rapoo Store Việt Nam','0918001209','104 Đ. Nguyễn Văn Trỗi, Phường 8, Phú Nhuận, Thành phố Hồ Chí Minh','rapoostorevn@gmail.com',1);
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timesheet_details`
--

DROP TABLE IF EXISTS `timesheet_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timesheet_details` (
  `timesheet_detail_id` int NOT NULL AUTO_INCREMENT,
  `timesheet_id` int NOT NULL,
  `total_salary` decimal(10,2) NOT NULL,
  PRIMARY KEY (`timesheet_detail_id`),
  KEY `timesheet_id` (`timesheet_id`),
  CONSTRAINT `timesheet_details_ibfk_1` FOREIGN KEY (`timesheet_id`) REFERENCES `timesheets` (`timesheet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timesheet_details`
--

LOCK TABLES `timesheet_details` WRITE;
/*!40000 ALTER TABLE `timesheet_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `timesheet_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timesheets`
--

DROP TABLE IF EXISTS `timesheets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timesheets` (
  `timesheet_id` int NOT NULL AUTO_INCREMENT,
  `contract_id` int NOT NULL,
  `month` int NOT NULL,
  `year` int NOT NULL,
  `days_worked` int NOT NULL,
  `days_off` int NOT NULL,
  `days_late` int NOT NULL,
  PRIMARY KEY (`timesheet_id`),
  KEY `contract_id` (`contract_id`),
  CONSTRAINT `timesheets_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contracts` (`contract_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timesheets`
--

LOCK TABLES `timesheets` WRITE;
/*!40000 ALTER TABLE `timesheets` DISABLE KEYS */;
/*!40000 ALTER TABLE `timesheets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'electronic_supermarket'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-22 12:06:52
