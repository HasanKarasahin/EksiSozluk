CREATE DATABASE  IF NOT EXISTS `eksisozlukdb` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `eksisozlukdb`;
-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: eksisozlukdb
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `altmenu`
--

DROP TABLE IF EXISTS `altmenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `altmenu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu` varchar(225) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `altmenu`
--

LOCK TABLES `altmenu` WRITE;
/*!40000 ALTER TABLE `altmenu` DISABLE KEYS */;
INSERT INTO `altmenu` VALUES (1,'iletişim'),(2,'kullanım koşulları'),(3,'gizlilik politikamız'),(4,'sss'),(5,'istatistikler'),(6,'sub-etha'),(7,'twitter'),(8,'facebook');
/*!40000 ALTER TABLE `altmenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `badi`
--

DROP TABLE IF EXISTS `badi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `badi` (
  `takipeden` int NOT NULL,
  `takipedilen` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `badi`
--

LOCK TABLES `badi` WRITE;
/*!40000 ALTER TABLE `badi` DISABLE KEYS */;
INSERT INTO `badi` VALUES (17,16),(17,19),(19,17),(17,18),(18,17),(19,18),(18,19);
/*!40000 ALTER TABLE `badi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `basliklartbl`
--

DROP TABLE IF EXISTS `basliklartbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `basliklartbl` (
  `BaslikId` int NOT NULL AUTO_INCREMENT,
  `BaslikAdi` varchar(225) CHARACTER SET utf16 COLLATE utf16_turkish_ci NOT NULL,
  `KatagoriId` int NOT NULL,
  PRIMARY KEY (`BaslikId`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basliklartbl`
--

LOCK TABLES `basliklartbl` WRITE;
/*!40000 ALTER TABLE `basliklartbl` DISABLE KEYS */;
INSERT INTO `basliklartbl` VALUES (1,'Aykut Kocaman Fenerde',1),(2,'beymen\'de indirimle 675 tl\'ye düşen anahtarlık',2),(3,'2017 sonunda pkk\'nın tamamen bitecek olması',3),(6,'Van Persie Gol Orucunu Bozdu',1),(7,'Rte ne istiyor',3),(8,'İlk yerli otomotiv satişi',4),(10,'Aşik Oluyorum',2),(11,'Nerde Eski bayramlar',2),(12,'Futbolum katillleri',1),(13,'Evet mi Hayir mi',3),(14,'Porche',4),(24,'arabalar',4),(25,'lan',2);
/*!40000 ALTER TABLE `basliklartbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `denemetbl`
--

DROP TABLE IF EXISTS `denemetbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `denemetbl` (
  `asdasd1` int NOT NULL,
  `asdasd2` int NOT NULL,
  `asdasdasd` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `denemetbl`
--

LOCK TABLES `denemetbl` WRITE;
/*!40000 ALTER TABLE `denemetbl` DISABLE KEYS */;
INSERT INTO `denemetbl` VALUES (1,1,1);
/*!40000 ALTER TABLE `denemetbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `katagoritbl`
--

DROP TABLE IF EXISTS `katagoritbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `katagoritbl` (
  `KatagoriId` int NOT NULL AUTO_INCREMENT,
  `KatagoriAdi` varchar(225) CHARACTER SET utf16 COLLATE utf16_turkish_ci NOT NULL,
  PRIMARY KEY (`KatagoriId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `katagoritbl`
--

LOCK TABLES `katagoritbl` WRITE;
/*!40000 ALTER TABLE `katagoritbl` DISABLE KEYS */;
INSERT INTO `katagoritbl` VALUES (1,'spor'),(2,'ilişkiler'),(3,'siyaset'),(4,'otomotiv');
/*!40000 ALTER TABLE `katagoritbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mesajlar`
--

DROP TABLE IF EXISTS `mesajlar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `mesajlar` (
  `MesajId` int NOT NULL AUTO_INCREMENT,
  `AliciId` int NOT NULL,
  `GondericiId` int NOT NULL,
  `MesajGun` int NOT NULL,
  `MesajAy` int NOT NULL,
  `MesajYil` int NOT NULL,
  `Mesaj` varchar(225) CHARACTER SET utf16 COLLATE utf16_turkish_ci NOT NULL,
  `zaman` time NOT NULL,
  `gorulme` int NOT NULL,
  PRIMARY KEY (`MesajId`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mesajlar`
--

LOCK TABLES `mesajlar` WRITE;
/*!40000 ALTER TABLE `mesajlar` DISABLE KEYS */;
INSERT INTO `mesajlar` VALUES (2,14,17,7,4,2017,'Nasilsin inşallah','21:05:00',0),(3,14,17,7,4,2017,'Cevap versene kardes','21:08:10',0),(4,17,14,7,4,2017,'Burdayim burdayim','21:18:00',0),(5,14,17,7,4,2017,'Ne yaptin','22:25:17',0),(6,14,17,7,4,2017,'Ne yaptin','22:25:17',0),(7,14,17,7,4,2017,'Ne yaptin','22:25:17',0),(10,14,17,7,4,2017,'Laaan','22:25:17',0),(11,14,17,7,4,2017,'Laaan','22:25:17',0),(12,14,17,7,4,2017,'Reis Naber','22:25:17',0),(13,14,17,7,4,2017,'Nasil gidiyor','22:25:17',0),(14,14,17,7,4,2017,'hahahaa','22:25:17',0),(15,14,17,7,4,2017,'Hasasdasdads','22:25:17',0),(16,14,17,7,4,2017,'Hasan','22:25:17',0),(17,14,17,7,4,2017,'Naber','22:25:17',0),(18,14,17,7,4,2017,'sfdsfsdf','22:25:17',0),(19,14,17,7,4,2017,'lan ibne nerdesin','22:25:17',0),(20,14,17,7,4,2017,'ffdgdfg','22:25:17',0),(21,16,17,7,4,2017,'Nerdesin panpa','22:25:17',0),(22,16,17,7,4,2017,'Nasil Gidiyor','22:25:17',0),(23,15,17,7,4,2017,'Reis nerdesin','22:25:17',0),(24,14,17,7,4,2017,'laaan\r\n','22:25:17',0),(25,14,17,7,4,2017,'meraba','22:25:17',0),(26,16,17,7,4,2017,'sdfsdfsdf','22:25:17',0),(27,15,17,7,4,2017,'lklk','22:25:17',0),(28,15,17,7,4,2017,'jkljkl','22:25:17',0),(29,19,17,7,4,2017,'Hİ GUYS','22:25:17',0),(30,18,17,7,4,2017,'faruk kanka','22:25:17',0),(31,18,17,7,4,2017,'nasilsin','22:25:17',0),(32,18,17,7,4,2017,'naberr','22:25:17',0),(33,17,19,7,4,2017,'lan','22:25:17',0),(34,17,19,7,4,2017,'kankaa','22:25:17',0),(35,17,19,7,4,2017,'naber','22:25:17',0),(36,19,17,7,4,2017,'efendim','22:25:17',0),(37,17,19,7,4,2017,'nasilsin','22:25:17',0),(38,19,17,7,4,2017,'yess','22:25:17',0),(39,19,17,7,4,2017,'deneme123','22:25:17',0),(40,17,19,7,4,2017,'lan','22:25:17',0),(41,19,17,7,4,2017,'nasilsin lan','22:25:17',0),(42,18,17,7,4,2017,'kanka','22:25:17',0),(43,17,18,7,4,2017,'hahahaaa','22:25:17',0),(44,17,19,7,4,2017,'zaaaaaaa','22:25:17',0),(45,18,19,7,4,2017,'merhaba kardes','22:25:17',0),(46,19,18,7,4,2017,'merhabana merhaba kardes','22:25:17',0),(47,18,19,7,4,2017,'nasiilsin','22:25:17',0),(48,19,18,7,4,2017,'naptin','22:25:17',0),(49,16,18,7,4,2017,'baksana sen bir','22:25:17',0),(50,16,17,7,4,2017,'lan','22:25:17',0),(51,16,17,7,4,2017,'Deneme1','22:25:17',0),(52,17,21,7,4,2017,'selam','22:25:17',0),(53,21,17,7,4,2017,'ve aleykümselam kardeş','22:25:17',0),(54,17,21,7,4,2017,'Nasılsın iyi misin?','22:25:17',1),(55,21,17,7,4,2017,'Çok şükür','22:25:17',0);
/*!40000 ALTER TABLE `mesajlar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ustmenu`
--

DROP TABLE IF EXISTS `ustmenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `ustmenu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu` varchar(225) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `oturum` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ustmenu`
--

LOCK TABLES `ustmenu` WRITE;
/*!40000 ALTER TABLE `ustmenu` DISABLE KEYS */;
INSERT INTO `ustmenu` VALUES (9,'bugün',1),(10,'gündem',0),(11,'tarihte bugün',0),(12,'badi',1),(13,'Şükela!',1),(14,'Çok Kötü',1),(15,'çaylaklar',1),(16,'spor',0),(17,'ilişkiler',0),(18,'siyaset',0),(19,'otomotiv',0),(21,'video',0);
/*!40000 ALTER TABLE `ustmenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uyelertbl`
--

DROP TABLE IF EXISTS `uyelertbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `uyelertbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nick` varchar(225) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(225) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(225) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `gun` varchar(225) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ay` varchar(225) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yil` varchar(225) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yetki` int DEFAULT '0',
  `ban` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uyelertbl`
--

LOCK TABLES `uyelertbl` WRITE;
/*!40000 ALTER TABLE `uyelertbl` DISABLE KEYS */;
INSERT INTO `uyelertbl` VALUES (16,'the irlandali','4585185','mars@outlook.com','28','02','1976',0,1),(17,'Necati','4585185','necati@hotmail.com','10','ocak','1996',2,0),(19,'Eren','4585185','asdasd@hotmail.com','12','12','1212',1,0),(20,'test1','4585185','test@hotmail.com','1','ocak','2017',0,0),(21,'test2','4585185','test2@hotmail.com','1','ocak','2017',0,0);
/*!40000 ALTER TABLE `uyelertbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yorumbegeni`
--

DROP TABLE IF EXISTS `yorumbegeni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `yorumbegeni` (
  `BaslikId` int NOT NULL,
  `YorumId` int NOT NULL,
  `YazarId` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yorumbegeni`
--

LOCK TABLES `yorumbegeni` WRITE;
/*!40000 ALTER TABLE `yorumbegeni` DISABLE KEYS */;
INSERT INTO `yorumbegeni` VALUES (2,28,17),(2,29,17),(2,31,17),(2,32,17),(2,38,17),(2,46,17),(8,34,19),(13,11,19);
/*!40000 ALTER TABLE `yorumbegeni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yorumdislike`
--

DROP TABLE IF EXISTS `yorumdislike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `yorumdislike` (
  `BaslikId` int NOT NULL,
  `YorumId` int NOT NULL,
  `YazarId` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yorumdislike`
--

LOCK TABLES `yorumdislike` WRITE;
/*!40000 ALTER TABLE `yorumdislike` DISABLE KEYS */;
INSERT INTO `yorumdislike` VALUES (8,40,17),(13,91,17),(13,37,17),(13,82,17),(13,90,17),(13,92,17),(13,93,17);
/*!40000 ALTER TABLE `yorumdislike` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yorumlartbl`
--

DROP TABLE IF EXISTS `yorumlartbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `yorumlartbl` (
  `YorumId` int NOT NULL AUTO_INCREMENT,
  `Yorum` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `YorumTarih` year NOT NULL,
  `YorumAy` int NOT NULL,
  `YorumGun` int NOT NULL,
  `YorumSaati` time NOT NULL,
  `YazarId` int NOT NULL,
  `BaslikId` int NOT NULL,
  PRIMARY KEY (`YorumId`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yorumlartbl`
--

LOCK TABLES `yorumlartbl` WRITE;
/*!40000 ALTER TABLE `yorumlartbl` DISABLE KEYS */;
INSERT INTO `yorumlartbl` VALUES (8,'Seviyorsan git konuş kanka',2016,8,12,'18:27:14',16,10),(11,'asdasdasd',2017,9,15,'20:05:21',16,13),(12,'asdasdasd',2017,3,17,'08:25:25',16,14),(22,'robin kral',2017,4,4,'00:03:11',17,6),(24,'cabuk burayi terket',2017,4,4,'00:09:06',17,12),(26,'aaaaaaaaaa',2017,4,4,'00:15:23',17,11),(27,'Merhaba',2017,4,4,'00:25:51',17,1),(28,'Beymen',2017,4,4,'00:26:31',17,2),(31,'indirim',2017,4,5,'23:43:46',17,2),(32,'guzel',2017,4,5,'23:45:29',17,2),(34,'Hasan',2017,4,5,'23:52:55',17,8),(35,'fener',2017,4,5,'23:54:09',17,6),(36,'asdasd',2017,4,5,'23:56:17',17,10),(37,'hasan',2017,4,5,'23:56:27',17,13),(38,'merhaba',2017,4,6,'00:02:51',17,2),(39,'hasan',2017,4,6,'00:06:44',17,6),(40,'DENEME123',2017,4,6,'00:07:19',17,8),(43,'krall',2017,4,6,'00:10:54',17,10),(46,'asdasdasd',2017,4,6,'03:39:13',17,2),(50,'helallalala',2017,4,6,'03:41:20',17,8),(51,'klklkl',2017,4,10,'00:35:22',17,10),(55,'sdfsdfsdf',2017,4,21,'09:58:55',17,3),(56,'selam',2017,4,21,'10:18:57',17,3),(57,'ghgh',2017,4,21,'10:34:43',17,3),(58,'yorum1',2017,5,5,'01:03:32',17,6),(59,'yorum2',2017,5,5,'01:03:40',17,6),(60,'yorum3',2017,5,5,'01:03:44',17,6),(61,'yorum4',2017,5,5,'01:03:48',17,6),(62,'yorum5',2017,5,5,'01:03:52',17,6),(63,'yorum6',2017,5,5,'01:03:55',17,6),(66,'yorum9',2017,5,5,'01:04:10',17,6),(67,'yorum10',2017,5,5,'01:04:15',17,6),(68,'yorum11',2017,5,5,'01:04:21',17,6),(69,'yorum12',2017,5,5,'01:04:25',17,6),(70,'yorum13',2017,5,5,'01:04:31',17,6),(71,'yorum14',2017,5,5,'01:04:35',17,6),(72,'yorum15',2017,5,5,'01:04:40',17,6),(73,'yorum20',2017,5,5,'01:04:45',17,6),(75,'yorum22',2017,5,5,'01:04:54',17,6),(76,'yorum23',2017,5,5,'01:04:59',17,6),(78,'yorum25',2017,5,5,'01:05:09',17,6),(80,'dfdf',2017,5,9,'02:36:12',17,3),(81,'eren burada',2017,5,10,'14:27:54',19,6),(82,'deneme',2017,5,10,'14:28:36',19,13),(83,'ÇKJNÇM.ÖÇ',2017,5,10,'15:15:32',19,6),(84,'SDDFSDF',2017,5,10,'15:16:37',19,7),(85,'denem1',2017,5,10,'15:39:28',17,3),(86,'adasd',2017,5,11,'01:49:25',19,7),(89,'merhaba',2017,5,12,'02:04:42',17,2),(90,'Hasan',2017,5,13,'15:37:42',17,13),(91,'deneme1',2017,5,13,'15:59:06',17,13),(92,'deneme2',2017,5,13,'16:02:18',17,13),(93,'deneme1',2017,5,13,'16:02:24',17,13),(94,'deneme3',2017,5,13,'16:02:41',17,13),(95,'deneme4',2017,5,13,'16:02:49',17,13),(96,'deneme5',2017,5,13,'16:06:08',17,13),(97,'ccok sey ıstıyor',2017,5,13,'16:10:54',17,7),(98,'alalala',2017,5,13,'16:11:02',17,7),(99,'asdasd',2017,5,13,'16:11:05',17,7),(100,'adsasda',2017,5,13,'16:11:11',17,7),(101,'asdasdasd',2017,5,13,'16:11:16',17,7),(102,'asdasdasd',2017,5,13,'16:11:21',17,7),(103,'oley',2017,5,13,'16:13:39',17,1),(104,'oley1',2017,5,13,'16:13:45',17,1),(105,'oley2',2017,5,13,'16:13:50',17,1),(106,'oley3',2017,5,13,'16:13:55',17,1),(107,'oley4',2017,5,13,'16:14:01',17,1),(108,'oley5',2017,5,13,'16:14:06',17,1),(109,'bir',2017,5,13,'20:56:55',17,14),(110,'iki',2017,5,13,'20:57:00',17,14),(111,'uc',2017,5,13,'20:57:04',17,14),(112,'dort',2017,5,13,'20:57:09',17,14),(113,'uzunyorum uzunyorum uzunyorum uzunyorum uzunyorum uzunyorum uzunyorum uzunyorum uzunyorum uzunyorum uzunyorum',2017,5,14,'01:41:29',19,14),(114,'derbeder',2017,5,14,'15:23:50',19,10),(115,'biladerrr',2017,5,14,'15:24:02',19,10),(116,'nerdeler burdalar',2017,5,14,'15:24:11',19,10),(117,'zibam',2017,5,14,'15:24:17',19,10),(118,'wwerder bremen',2017,5,14,'15:24:25',19,10),(119,'trbzonspor',2017,5,14,'15:24:32',19,10),(120,'deneme',2017,5,17,'03:28:02',17,13),(121,'deneme',2017,5,17,'03:28:17',17,13),(122,'deneme',2017,5,17,'03:28:30',17,13),(123,'hasan karasahin',2017,5,17,'15:14:44',17,13),(124,'verder bremen',2017,5,17,'15:15:00',17,10),(125,'yes',2017,5,17,'15:15:22',17,10),(126,'hahshahdhshdasdasd',2017,5,17,'15:15:27',17,10),(127,'adasdasdasdasd',2017,5,17,'15:15:30',17,10),(128,'zabam',2017,5,17,'15:15:34',17,10),(129,'celal atalar',2017,5,17,'15:15:40',17,10),(130,'kın',2017,5,17,'15:15:45',17,10),(131,'g',2017,5,17,'15:15:49',17,10),(132,'asdadasdasdasd',2017,5,17,'15:15:54',17,10),(135,'arabadeneme',2017,5,17,'16:15:06',17,24),(136,'asdasd',2017,5,17,'16:22:44',17,25),(137,'Bu ne yaaaa',2021,3,27,'23:26:39',21,13);
/*!40000 ALTER TABLE `yorumlartbl` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-29  1:14:15
