-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: ig
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `ig_article_article`
--

DROP TABLE IF EXISTS `ig_article_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ig_article_article` (
  `art_id` int NOT NULL,
  `us_id` char(255) DEFAULT NULL,
  `art_view_num` int DEFAULT NULL,
  `art_title` char(255) DEFAULT NULL,
  `art_content` text,
  `art_com_num` int DEFAULT NULL,
  `art_rev_date` date DEFAULT NULL,
  PRIMARY KEY (`art_id`),
  KEY `FK_IG_Article_Publish` (`us_id`),
  CONSTRAINT `FK_IG_Article_Publish` FOREIGN KEY (`us_id`) REFERENCES `ig_user_user` (`us_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ig_article_article`
--

LOCK TABLES `ig_article_article` WRITE;
/*!40000 ALTER TABLE `ig_article_article` DISABLE KEYS */;
INSERT INTO `ig_article_article` VALUES (2,'1911440',13,'sadad','asdad',1,'2021-11-23'),(3,'1911440',1,'asdada','asdasda',1,'2021-11-23'),(4,'1911440',0,'qqq','qqq',1,'2021-11-27');
/*!40000 ALTER TABLE `ig_article_article` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `ig_article_article_AFTER_UPDATE` AFTER UPDATE ON `ig_article_article` FOR EACH ROW BEGIN
update ig_article_viparticle set ig_article_viparticle.art_title=new.art_title,
ig_article_viparticle.art_content=new.art_content,ig_article_viparticle.art_view_num=new.art_view_num,
ig_article_viparticle.art_com_num=new.art_com_num
where ig_article_viparticle.art_id=new.art_id;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `ig_article_article_BEFORE_DELETE` BEFORE DELETE ON `ig_article_article` FOR EACH ROW BEGIN
delete from ig_user_read where ig_user_read.art_id=old.art_id;
delete from ig_article_comments where ig_article_comments.art_id=old.art_id;
delete from ig_article_classify where ig_article_classify.art_id=old.art_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ig_article_category`
--

DROP TABLE IF EXISTS `ig_article_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ig_article_category` (
  `cate_id` int NOT NULL,
  `cate_name` char(20) DEFAULT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ig_article_category`
--

LOCK TABLES `ig_article_category` WRITE;
/*!40000 ALTER TABLE `ig_article_category` DISABLE KEYS */;
INSERT INTO `ig_article_category` VALUES (1,'test'),(2,'vip'),(3,'a'),(4,'1321'),(5,'gg'),(6,'1'),(7,'adsa'),(8,'s打算a'),(9,'saasd'),(10,'ssss'),(11,'sadasdasd'),(12,'asdasd'),(13,'asdad'),(14,'sadadad'),(15,'sadasdasds'),(16,'ssssss'),(17,'asdadsad'),(18,'asaas'),(19,'1111'),(20,'2'),(21,'adasda'),(22,'asdasda'),(23,'msy'),(24,'11'),(25,'5'),(26,'zyl'),(27,'42424'),(28,'7257272'),(29,'111'),(30,'777'),(31,'88'),(32,'kkk'),(33,'nonono'),(34,'xxx'),(35,'aaa'),(36,'qqq');
/*!40000 ALTER TABLE `ig_article_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ig_article_classify`
--

DROP TABLE IF EXISTS `ig_article_classify`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ig_article_classify` (
  `art_id` int NOT NULL,
  `cate_id` int NOT NULL,
  PRIMARY KEY (`art_id`,`cate_id`),
  KEY `FK_IG_Article_Classify2` (`cate_id`),
  CONSTRAINT `FK_IG_Article_Classify` FOREIGN KEY (`art_id`) REFERENCES `ig_article_article` (`art_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_IG_Article_Classify2` FOREIGN KEY (`cate_id`) REFERENCES `ig_article_category` (`cate_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ig_article_classify`
--

LOCK TABLES `ig_article_classify` WRITE;
/*!40000 ALTER TABLE `ig_article_classify` DISABLE KEYS */;
INSERT INTO `ig_article_classify` VALUES (2,21),(3,22),(4,36);
/*!40000 ALTER TABLE `ig_article_classify` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ig_article_comments`
--

DROP TABLE IF EXISTS `ig_article_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ig_article_comments` (
  `com_id` int NOT NULL,
  `art_id` int DEFAULT NULL,
  `us_id` char(255) DEFAULT NULL,
  `com_content` text,
  `com_username` char(255) DEFAULT NULL,
  `com_date` date DEFAULT NULL,
  PRIMARY KEY (`com_id`),
  KEY `FK_IG_Article_Commentsof` (`art_id`),
  KEY `FK_IG_User_Comment` (`us_id`),
  CONSTRAINT `FK_IG_Article_Commentsof` FOREIGN KEY (`art_id`) REFERENCES `ig_article_article` (`art_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_IG_User_Comment` FOREIGN KEY (`us_id`) REFERENCES `ig_user_user` (`us_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ig_article_comments`
--

LOCK TABLES `ig_article_comments` WRITE;
/*!40000 ALTER TABLE `ig_article_comments` DISABLE KEYS */;
INSERT INTO `ig_article_comments` VALUES (1,4,'1911440','感谢观看','lxb','2021-11-27');
/*!40000 ALTER TABLE `ig_article_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ig_article_viparticle`
--

DROP TABLE IF EXISTS `ig_article_viparticle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ig_article_viparticle` (
  `art_id` int NOT NULL,
  `us_id` char(255) DEFAULT NULL,
  `art_view_num` int DEFAULT NULL,
  `art_title` char(255) DEFAULT NULL,
  `art_content` text,
  `art_com_num` int DEFAULT NULL,
  `art_rev_date` date DEFAULT NULL,
  `vart_contribution` int DEFAULT NULL,
  PRIMARY KEY (`art_id`),
  CONSTRAINT `FK_IG_Article_Herit` FOREIGN KEY (`art_id`) REFERENCES `ig_article_article` (`art_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ig_article_viparticle`
--

LOCK TABLES `ig_article_viparticle` WRITE;
/*!40000 ALTER TABLE `ig_article_viparticle` DISABLE KEYS */;
INSERT INTO `ig_article_viparticle` VALUES (2,'1911440',13,'sadad','asdad',1,'2021-11-23',5),(3,'1911440',0,'asdada','asdasda',1,'2021-11-23',5),(4,'1911440',0,'qqq','qqq',1,'2021-11-27',5);
/*!40000 ALTER TABLE `ig_article_viparticle` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `ig_article_viparticle_BEFORE_INSERT` BEFORE INSERT ON `ig_article_viparticle` FOR EACH ROW BEGIN
insert into ig_article_article values(new.art_id,new.us_id,new.art_view_num,new.art_title,new.art_content,new.art_com_num,new.art_rev_date);
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `ig_article_viparticle_AFTER_INSERT` AFTER INSERT ON `ig_article_viparticle` FOR EACH ROW BEGIN
insert into ig_user_publishvip values(new.us_id,new.art_id);
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `ig_article_viparticle_BEFORE_DELETE` BEFORE DELETE ON `ig_article_viparticle` FOR EACH ROW BEGIN
delete from ig_user_publishvip where ig_user_publishvip.art_id=old.art_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ig_user_message`
--

DROP TABLE IF EXISTS `ig_user_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ig_user_message` (
  `us1_id` int NOT NULL,
  `us_id` char(255) DEFAULT NULL,
  `us1_name` char(20) DEFAULT NULL,
  `us1_content` text,
  `us1_date` date DEFAULT NULL,
  PRIMARY KEY (`us1_id`),
  KEY `FK_IG_User_LMess` (`us_id`),
  CONSTRAINT `FK_IG_User_LMess` FOREIGN KEY (`us_id`) REFERENCES `ig_user_user` (`us_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ig_user_message`
--

LOCK TABLES `ig_user_message` WRITE;
/*!40000 ALTER TABLE `ig_user_message` DISABLE KEYS */;
INSERT INTO `ig_user_message` VALUES (2,'1911440','lxb','hello','2021-11-24'),(3,'1911440','lxb','hello world','2021-11-24'),(5,'1911440','lxb','alalalalalal','2021-11-25'),(6,'1911440','lxb','asdasdasdasdasdasddsas','2021-11-25'),(7,'1911440','lxb','import numpy as np\r\nsd\r\n','2021-11-25'),(8,'1911440','lxb','test publish','2021-11-25'),(20,'123456','123','ass','2021-11-26'),(21,'1911440','lxb','1111','2021-11-26'),(22,'1911440','lxb','sdadasdadas','2021-11-27'),(23,'1911440','lxb','777777777777777777777777777777777','2021-11-27'),(24,'1911440','lxb','777777777777777777777777777777777777','2021-11-27'),(25,'1911440','lxb','7777777777777777777777777777777777777777','2021-11-27'),(26,'1911440','lxb','777777777777777777777777777777','2021-11-27'),(27,'1911440','lxb','66666666666666666666666666666666666666','2021-11-27'),(28,'1911440','lxb','6666666666666666666666666666666666666666666666','2021-11-27'),(29,'1911440','lxb','gggggggggggggggggggggggggggggggggggggggggggggggggg','2021-11-27'),(30,'1911440','lxb','zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz','2021-11-27'),(31,'1911440','lxb','xvxvxvcxv','2021-11-27'),(32,'1911440','lxb','sssssssssssssssssssssssssss','2021-11-27'),(33,'1911440','lxb','kkkkkkkkkkkkkkkkkkkkkkkkkkkk','2021-11-27'),(34,'1911440','lxb','qweqeqeq','2021-11-27'),(35,'1911440','lxb','gggggggggggggggggggggggggggggggg','2021-11-27'),(36,'1911440','lxb','qwer','2021-11-27'),(37,'1911440','lxb','a接W','2021-11-27'),(38,'1911440','lxb','shit bro','2021-11-27'),(39,'1911440','lxb','0..00.0.0.0.','2021-11-27'),(40,'1911440','lxb','酷酷酷酷酷酷酷酷酷酷酷酷酷酷酷酷酷','2021-11-27');
/*!40000 ALTER TABLE `ig_user_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ig_user_publishvip`
--

DROP TABLE IF EXISTS `ig_user_publishvip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ig_user_publishvip` (
  `us_id` char(255) NOT NULL,
  `art_id` int NOT NULL,
  PRIMARY KEY (`us_id`,`art_id`),
  KEY `FK_IG_User_Publishvip2` (`art_id`),
  CONSTRAINT `FK_IG_User_Publishvip` FOREIGN KEY (`us_id`) REFERENCES `ig_user_vipuser` (`us_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_IG_User_Publishvip2` FOREIGN KEY (`art_id`) REFERENCES `ig_article_viparticle` (`art_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ig_user_publishvip`
--

LOCK TABLES `ig_user_publishvip` WRITE;
/*!40000 ALTER TABLE `ig_user_publishvip` DISABLE KEYS */;
INSERT INTO `ig_user_publishvip` VALUES ('1911440',4);
/*!40000 ALTER TABLE `ig_user_publishvip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ig_user_read`
--

DROP TABLE IF EXISTS `ig_user_read`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ig_user_read` (
  `us_id` char(255) NOT NULL,
  `art_id` int NOT NULL,
  PRIMARY KEY (`us_id`,`art_id`),
  KEY `FK_IG_User_Read2` (`art_id`),
  CONSTRAINT `FK_IG_User_Read` FOREIGN KEY (`us_id`) REFERENCES `ig_user_user` (`us_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_IG_User_Read2` FOREIGN KEY (`art_id`) REFERENCES `ig_article_article` (`art_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ig_user_read`
--

LOCK TABLES `ig_user_read` WRITE;
/*!40000 ALTER TABLE `ig_user_read` DISABLE KEYS */;
INSERT INTO `ig_user_read` VALUES ('1911440',2);
/*!40000 ALTER TABLE `ig_user_read` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ig_user_user`
--

DROP TABLE IF EXISTS `ig_user_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ig_user_user` (
  `us_id` char(255) NOT NULL,
  `us_name` char(20) DEFAULT NULL,
  `us_mail` char(255) DEFAULT NULL,
  `us_password` char(255) DEFAULT NULL,
  `us_contribution` int DEFAULT NULL,
  PRIMARY KEY (`us_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ig_user_user`
--

LOCK TABLES `ig_user_user` WRITE;
/*!40000 ALTER TABLE `ig_user_user` DISABLE KEYS */;
INSERT INTO `ig_user_user` VALUES ('123456','123','123456@qq.com','123456',0),('1911440','lxb','1911440@qq.com','1911440',0);
/*!40000 ALTER TABLE `ig_user_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `ig_user_user_BEFORE_DELETE` BEFORE DELETE ON `ig_user_user` FOR EACH ROW BEGIN
delete from ig_user_message where ig_user_message.us_id=old.us_id;
delete from ig_user_read where ig_user_read.us_id=old.us_id;
delete from ig_article_article where ig_article_article.us_id=old.us_id;
delete from ig_article_comments where ig_article_comments.us_id=old.us_id;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ig_user_vipuser`
--

DROP TABLE IF EXISTS `ig_user_vipuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ig_user_vipuser` (
  `us_id` char(255) NOT NULL,
  `us_name` char(20) DEFAULT NULL,
  `us_mail` char(255) DEFAULT NULL,
  `us_password` char(255) DEFAULT NULL,
  `us_contribution` int DEFAULT NULL,
  `vs_level` int DEFAULT NULL,
  PRIMARY KEY (`us_id`),
  CONSTRAINT `FK_IG_User_Herit` FOREIGN KEY (`us_id`) REFERENCES `ig_user_user` (`us_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ig_user_vipuser`
--

LOCK TABLES `ig_user_vipuser` WRITE;
/*!40000 ALTER TABLE `ig_user_vipuser` DISABLE KEYS */;
INSERT INTO `ig_user_vipuser` VALUES ('1911440','lxb','1911440@qq.com','1911440',0,5);
/*!40000 ALTER TABLE `ig_user_vipuser` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `ig_user_vipuser_BEFORE_INSERT` BEFORE INSERT ON `ig_user_vipuser` FOR EACH ROW BEGIN
insert into ig_user_user values(new.us_id,new.us_name,new.us_mail,new.us_password,new.us_contribution);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping events for database 'ig'
--

--
-- Dumping routines for database 'ig'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-27 16:08:23
