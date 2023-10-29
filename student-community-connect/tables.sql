-- MySQL dump 10.13  Distrib 5.6.28, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: design_lab
-- ------------------------------------------------------
-- Server version	5.6.28-0ubuntu0.15.04.1

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
-- Table structure for table `Achievement`
--

DROP TABLE IF EXISTS `Achievement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Achievement` (
  `collegeName` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Achievement`
--

LOCK TABLES `Achievement` WRITE;
/*!40000 ALTER TABLE `Achievement` DISABLE KEYS */;
INSERT INTO `Achievement` VALUES ('IEM','100% Placement','sanchitcv@gmail.com'),('Heritage','6 Star Coder','sanchitcv@gmail.com');
/*!40000 ALTER TABLE `Achievement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Event`
--

DROP TABLE IF EXISTS `Event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Event` (
  `eventName` varchar(255) NOT NULL,
  `eventType` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `organizer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Event`
--

LOCK TABLES `Event` WRITE;
/*!40000 ALTER TABLE `Event` DISABLE KEYS */;
INSERT INTO `Event` VALUES ('IEMCO 6','technical','Codechef event','coder_harshad@gmail.com');
/*!40000 ALTER TABLE `Event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GiveCoaching`
--

DROP TABLE IF EXISTS `GiveCoaching`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GiveCoaching` (
  `location` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `fees` int(11) NOT NULL,
  `daysPerWeek` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GiveCoaching`
--

LOCK TABLES `GiveCoaching` WRITE;
/*!40000 ALTER TABLE `GiveCoaching` DISABLE KEYS */;
INSERT INTO `GiveCoaching` VALUES ('IA Block','computer',1200,3,'evening','abhi28.jha@gmail.com'),('Purnia','math',350,1,'morning','abhi28.jha@gmail.com'),('Purnia','math',400,2,'afternoon','abhi28.jha@gmail.com');
/*!40000 ALTER TABLE `GiveCoaching` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `JobVacancy`
--

DROP TABLE IF EXISTS `JobVacancy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `JobVacancy` (
  `location` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL,
  `daysPerWeek` int(11) NOT NULL,
  `hoursPerDay` int(11) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `JobVacancy`
--

LOCK TABLES `JobVacancy` WRITE;
/*!40000 ALTER TABLE `JobVacancy` DISABLE KEYS */;
INSERT INTO `JobVacancy` VALUES ('Sealdah','appdevelopment',3500,7,1,'abhi28.jha@gmail.com'),('Bangalore','webdevelopment',3500,1,7,'abhi28.jha@gmail.com'),('IA Block','webdevelopment',3500,4,2,'abhi28.jha@gmail.com'),('Sealdah','appdevelopment',1200,3,1,'abhi28.jha@gmail.com');
/*!40000 ALTER TABLE `JobVacancy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `NeedItem`
--

DROP TABLE IF EXISTS `NeedItem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `NeedItem` (
  `itemName` varchar(255) NOT NULL,
  `itemType` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `NeedItem`
--

LOCK TABLES `NeedItem` WRITE;
/*!40000 ALTER TABLE `NeedItem` DISABLE KEYS */;
INSERT INTO `NeedItem` VALUES ('CTCI','books','abhi28.jha@gmail.com'),('Mechanical 1st Sem','notes','abhi28.jha@gmail.com'),('TFIOS','books','abhi28.jha@gmail.com');
/*!40000 ALTER TABLE `NeedItem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `NeedJob`
--

DROP TABLE IF EXISTS `NeedJob`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `NeedJob` (
  `location` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `workingHours` int(11) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `NeedJob`
--

LOCK TABLES `NeedJob` WRITE;
/*!40000 ALTER TABLE `NeedJob` DISABLE KEYS */;
INSERT INTO `NeedJob` VALUES ('IA Block','webdevelopment',3,'abhi28.jha@gmail.com'),('Sealdah','appdevelopment',2,'abhi28.jha@gmail.com');
/*!40000 ALTER TABLE `NeedJob` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `NeedPG`
--

DROP TABLE IF EXISTS `NeedPG`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `NeedPG` (
  `pgType` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `rent` int(11) NOT NULL,
  `vacancy` int(11) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `NeedPG`
--

LOCK TABLES `NeedPG` WRITE;
/*!40000 ALTER TABLE `NeedPG` DISABLE KEYS */;
INSERT INTO `NeedPG` VALUES ('female','IA Block',6500,1,'abhi28.jha@gmail.com');
/*!40000 ALTER TABLE `NeedPG` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PGVacancy`
--

DROP TABLE IF EXISTS `PGVacancy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PGVacancy` (
  `pgName` varchar(255) NOT NULL,
  `pgType` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `rent` int(11) NOT NULL,
  `vacancy` int(11) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PGVacancy`
--

LOCK TABLES `PGVacancy` WRITE;
/*!40000 ALTER TABLE `PGVacancy` DISABLE KEYS */;
INSERT INTO `PGVacancy` VALUES ('PG 3','female','garia',80,123,'abhi28.jha@gmail.com'),('PG 1','male','IA Block',4500,2,'abhi28.jha@gmail.com'),('PG 1','male','IA Block',4500,2,'abhi28.jha@gmail.com'),('PG 1','male','IA Block',7500,1,'abhi28.jha@gmail.com'),('PG 1','female','IA Block',7500,1,'abhi28.jha@gmail.com');
/*!40000 ALTER TABLE `PGVacancy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SellItem`
--

DROP TABLE IF EXISTS `SellItem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SellItem` (
  `itemName` varchar(255) NOT NULL,
  `itemType` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `itemPrice` int(11) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SellItem`
--

LOCK TABLES `SellItem` WRITE;
/*!40000 ALTER TABLE `SellItem` DISABLE KEYS */;
INSERT INTO `SellItem` VALUES ('6th Sem Networking Notes','notes',1,500,'abhi28.jha@gmail.com'),('CLRS','books',3,1000,'abhi28.jha@gmail.com'),('Palace Of Illusions','books',1,300,'abhi28.jha@gmail.com');
/*!40000 ALTER TABLE `SellItem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TakeCoaching`
--

DROP TABLE IF EXISTS `TakeCoaching`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TakeCoaching` (
  `location` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `numOfStudents` int(11) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TakeCoaching`
--

LOCK TABLES `TakeCoaching` WRITE;
/*!40000 ALTER TABLE `TakeCoaching` DISABLE KEYS */;
INSERT INTO `TakeCoaching` VALUES ('Bangalore','commerce',2,'abhi28.jha@gmail.com'),('Purnia','math',1,'abhi28.jha@gmail.com'),('IA Block','computer',10,'abhi28.jha@gmail.com');
/*!40000 ALTER TABLE `TakeCoaching` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `name` varchar(255) NOT NULL,
  `emailID` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `collegeName` varchar(255) DEFAULT NULL,
  `organizerName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`emailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES ('Abhinav Jha','abhi28.jha@gmail.com','1234',22,'male','student','IA 114','IEM',''),('Harshad','coder_harshad@gmail.com','4321',22,'male','eventorganizer','','','IEMCO Managers'),('Pooja Jha','pooja@gmail.com','abhi',21,'female','eventorganizer','','','Purnia Events'),('Prakash Nath Jha','prakashecdrid@gmail.com','1234',21,'male','student','268/2 Roynagar Bansdroni near, Kolkata','Iem',''),('Rohit ','rohit.aanand@gmail.com','1234',23,'male','cr','','IEM',''),('Sanchit','sanchitcv@gmail.com','1234',22,'male','cr','','IEM','');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-11 11:52:46
