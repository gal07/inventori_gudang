-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: inventori_gudang
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.3

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
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `barang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `harga` decimal(18,0) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `active` int DEFAULT NULL,
  `softdelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES (65,'Asus Rog M15','Alat Elektronik',0,9000000,'test.img',1,0),(66,'Acer M9280','Alat Elektronik',0,8900000,'test.img',1,0),(67,'Tempered GlasS Samsung Galaxy S3','Alat Elektronik',0,80000,'test.img',1,0);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barang_out`
--

DROP TABLE IF EXISTS `barang_out`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `barang_out` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_barang` int DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `own_by` varchar(25) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang_out`
--

LOCK TABLES `barang_out` WRITE;
/*!40000 ALTER TABLE `barang_out` DISABLE KEYS */;
/*!40000 ALTER TABLE `barang_out` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gudang`
--

DROP TABLE IF EXISTS `gudang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gudang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `status` int NOT NULL,
  `softdelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gudang`
--

LOCK TABLES `gudang` WRITE;
/*!40000 ALTER TABLE `gudang` DISABLE KEYS */;
INSERT INTO `gudang` VALUES (12,'Gudang Jepang',1,0),(13,'Gudang Indonesia',1,0);
/*!40000 ALTER TABLE `gudang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inven_gudang`
--

DROP TABLE IF EXISTS `inven_gudang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inven_gudang` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `id_gudang` int NOT NULL,
  `id_barang` int NOT NULL,
  `qty` int NOT NULL,
  `status` int NOT NULL,
  `softdelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gudangConstraint` (`id_gudang`),
  KEY `barangConstraint` (`id_barang`),
  CONSTRAINT `barangConstraint` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gudangConstraint` FOREIGN KEY (`id_gudang`) REFERENCES `gudang` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inven_gudang`
--

LOCK TABLES `inven_gudang` WRITE;
/*!40000 ALTER TABLE `inven_gudang` DISABLE KEYS */;
INSERT INTO `inven_gudang` VALUES (13,12,65,55,1,0),(14,13,65,10,1,0),(15,12,66,100,1,0),(16,13,66,10,1,0),(17,12,67,1000,1,0),(18,13,67,10,1,0);
/*!40000 ALTER TABLE `inven_gudang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_report`
--

DROP TABLE IF EXISTS `jenis_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_report` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_report`
--

LOCK TABLES `jenis_report` WRITE;
/*!40000 ALTER TABLE `jenis_report` DISABLE KEYS */;
INSERT INTO `jenis_report` VALUES (1,'Barang Masuk'),(2,'Barang Keluar');
/*!40000 ALTER TABLE `jenis_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `report` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_barang` int NOT NULL,
  `quantity` int NOT NULL,
  `action_by` varchar(100) NOT NULL,
  `jenis_report` int NOT NULL,
  `waktu` date NOT NULL,
  `id_gudang` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` VALUES (1,66,10,'david',1,'2021-01-09',13),(2,65,10,'david',1,'2021-01-09',13),(3,67,10,'david',1,'2021-01-09',13),(4,66,100,'fahri',1,'2021-01-09',12),(5,65,100,'fahri',1,'2021-01-09',12),(6,67,100,'fahri',1,'2021-01-09',12),(7,65,45,'fahri',2,'2021-01-09',12),(8,67,900,'fahri',1,'2021-01-09',12);
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int NOT NULL,
  `gudang` int DEFAULT NULL,
  `status` int NOT NULL,
  `softdelete` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDPARENT` (`gudang`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'galih','galih@mail.com','0991288384','123456',1,0,1,0),(10,'fahri','fahri@gmail.com','0817273881','123456',2,12,1,0),(11,'dani','dani@mail.com','08773128818','123456',2,12,1,0),(12,'budi','budi99@gmail.com','08772838188','123456',2,13,1,0),(13,'david','daviid@gmail.com','0988278288','123456',2,13,1,0);
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

-- Dump completed on 2021-01-09 16:25:44
