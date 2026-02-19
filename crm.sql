-- MySQL dump 10.10
--
-- Host: localhost    Database: crm_dev
-- ------------------------------------------------------
-- Server version	5.0.27

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
-- Table structure for table `activation_code`
--

DROP TABLE IF EXISTS `activation_code`;
CREATE TABLE `activation_code` (
  `activation_code_id` int(20) NOT NULL auto_increment,
  `user_id` int(20) NOT NULL default '0',
  `account_id` int(20) NOT NULL default '0',
  `activation_code_text` char(60) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `activation_code_type` enum('Password','Activation') character set utf8 collate utf8_unicode_ci NOT NULL default 'Password',
  `activation_code_create` int(20) NOT NULL default '0',
  `activation_code_expire` int(20) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`activation_code_id`),
  KEY `user_id` (`user_id`,`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activation_code`
--

LOCK TABLES `activation_code` WRITE;
/*!40000 ALTER TABLE `activation_code` DISABLE KEYS */;
/*!40000 ALTER TABLE `activation_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alert`
--

DROP TABLE IF EXISTS `alert`;
CREATE TABLE `alert` (
  `alert_id` int(20) NOT NULL auto_increment,
  `alert_create_by` int(20) NOT NULL,
  `alert_start_date` int(20) NOT NULL,
  `alert_end_date` int(20) NOT NULL,
  `alert_subject` varchar(250) NOT NULL,
  `alert_text` longtext NOT NULL,
  `alert_active` tinyint(3) NOT NULL,
  `last_modifed` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`alert_id`),
  KEY `alert_create_by` (`alert_create_by`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alert`
--

LOCK TABLES `alert` WRITE;
/*!40000 ALTER TABLE `alert` DISABLE KEYS */;
/*!40000 ALTER TABLE `alert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alert_to_employee`
--

DROP TABLE IF EXISTS `alert_to_employee`;
CREATE TABLE `alert_to_employee` (
  `alert_to_employee_id` int(20) NOT NULL auto_increment,
  `user_id` int(20) NOT NULL,
  `alert_id` int(20) NOT NULL,
  `alert_to_employee_read` tinyint(3) NOT NULL,
  `alert_to_employee_read_date` int(20) NOT NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`alert_to_employee_id`),
  KEY `user_id` (`user_id`,`alert_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alert_to_employee`
--

LOCK TABLES `alert_to_employee` WRITE;
/*!40000 ALTER TABLE `alert_to_employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `alert_to_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autobill`
--

DROP TABLE IF EXISTS `autobill`;
CREATE TABLE `autobill` (
  `autobill_id` int(20) NOT NULL auto_increment,
  `invoice_id` int(20) NOT NULL,
  `autobill_amount` float(14,2) NOT NULL,
  `autobill_create_date` int(20) NOT NULL,
  `autobill_start_date` int(20) NOT NULL,
  `autobill_due_date` int(20) NOT NULL,
  `autobill_status` enum('new','processed','failed','cancelled') NOT NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`autobill_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autobill`
--

LOCK TABLES `autobill` WRITE;
/*!40000 ALTER TABLE `autobill` DISABLE KEYS */;
/*!40000 ALTER TABLE `autobill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE `bill` (
  `bill_id` int(20) NOT NULL auto_increment,
  `vendor_id` int(20) NOT NULL default '0',
  `bill_date_create` int(20) NOT NULL default '0',
  `bill_due_date` int(20) NOT NULL default '0',
  `bill_amount_due` float(10,4) NOT NULL default '0.0000',
  `bill_amount_paid` float(10,4) default NULL,
  `bill_ref_num` varchar(100) default NULL,
  `bill_memo` text,
  `bill_paid` tinyint(4) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`bill_id`),
  KEY `vendor_id` (`vendor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

LOCK TABLES `bill` WRITE;
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
/*!40000 ALTER TABLE `bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `billing_rates`
--

DROP TABLE IF EXISTS `billing_rates`;
CREATE TABLE `billing_rates` (
  `billing_rates_id` int(20) NOT NULL auto_increment,
  `billing_rate_text` char(100) NOT NULL default '',
  `billing_rate_amount` float(10,4) default NULL,
  `billing_rate_active` tinyint(4) default '1',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`billing_rates_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_rates`
--

LOCK TABLES `billing_rates` WRITE;
/*!40000 ALTER TABLE `billing_rates` DISABLE KEYS */;
INSERT INTO `billing_rates` VALUES (1,'On-site Service No Contract',75.0000,1,'2007-03-25 15:24:46'),(2,'On-site Service Contract',65.0000,1,'2007-03-25 15:26:22'),(3,'In-House  Service',65.0000,1,'2007-03-25 15:26:45');
/*!40000 ALTER TABLE `billing_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookmark`
--

DROP TABLE IF EXISTS `bookmark`;
CREATE TABLE `bookmark` (
  `bookmark_id` int(20) NOT NULL auto_increment,
  `user_id` int(20) NOT NULL,
  `bookmark_type` enum('Web','Work Order','Lead','Account','Contact','Invoice','System','Product','Employee') NOT NULL,
  `bookmark_description` char(255) NOT NULL,
  `bookmark_type_id` int(20) NOT NULL,
  `bookmark_create_date` int(20) NOT NULL,
  `bookmark_active` tinyint(3) NOT NULL,
  PRIMARY KEY  (`bookmark_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmark`
--

LOCK TABLES `bookmark` WRITE;
/*!40000 ALTER TABLE `bookmark` DISABLE KEYS */;
/*!40000 ALTER TABLE `bookmark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calendar`
--

DROP TABLE IF EXISTS `calendar`;
CREATE TABLE `calendar` (
  `calendar_id` int(20) NOT NULL auto_increment,
  `calendar_year` int(20) NOT NULL,
  `calendar_month` int(20) NOT NULL,
  `calendar_day` int(20) NOT NULL,
  `calendar_hour` int(20) NOT NULL,
  `calendar_min` int(20) NOT NULL,
  `calendar_type` enum('start','end') NOT NULL,
  `user_id` int(20) NOT NULL,
  `calendar_title` varchar(128) NOT NULL,
  `calendar_text` text NOT NULL,
  `calendar_avtive` tinyint(3) default NULL,
  `calendar_private` int(3) default NULL,
  `calendar_event_type` enum('workorder','lead call','lead meeting','personal') NOT NULL,
  `calendar_event_id` int(20) NOT NULL,
  `calendar_start_id` int(20) NOT NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`calendar_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

LOCK TABLES `calendar` WRITE;
/*!40000 ALTER TABLE `calendar` DISABLE KEYS */;
/*!40000 ALTER TABLE `calendar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign`
--

DROP TABLE IF EXISTS `campaign`;
CREATE TABLE `campaign` (
  `campaign_id` int(20) NOT NULL auto_increment,
  `campaign_type_id` int(20) default NULL,
  `campaign_name` varchar(128) NOT NULL,
  `campaign_start_date` int(20) default NULL,
  `campaign_end_date` int(20) default NULL,
  `campaign_cost` float(15,4) default NULL,
  `campaign_description` text NOT NULL,
  `campaign_active` int(3) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`campaign_id`),
  KEY `campaign_type_id` (`campaign_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign`
--

LOCK TABLES `campaign` WRITE;
/*!40000 ALTER TABLE `campaign` DISABLE KEYS */;
/*!40000 ALTER TABLE `campaign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_type`
--

DROP TABLE IF EXISTS `campaign_type`;
CREATE TABLE `campaign_type` (
  `campaign_type_id` int(20) NOT NULL auto_increment,
  `campaign_type_text` varchar(128) NOT NULL,
  `campaign_type_active` int(3) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`campaign_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign_type`
--

LOCK TABLES `campaign_type` WRITE;
/*!40000 ALTER TABLE `campaign_type` DISABLE KEYS */;
INSERT INTO `campaign_type` VALUES (1,'Postal Mailer',1,'2007-03-26 21:50:33'),(2,'Email',1,'2007-03-26 21:50:55'),(3,'Radio Add',1,'2007-03-26 21:51:59'),(4,'TV Add',1,'2007-03-26 21:52:11'),(5,'Walk In',1,'2007-03-27 13:25:42');
/*!40000 ALTER TABLE `campaign_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(20) NOT NULL auto_increment,
  `category_name` char(64) NOT NULL default '',
  `category_image` char(64) default NULL,
  `category_parent_id` int(11) default NULL,
  `category_sort_order` int(11) default NULL,
  `category_status` tinyint(1) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`category_id`),
  KEY `category_parent_id` (`category_parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=226 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Accessories','images/category/25122.jpg',0,1,1,'2006-09-11 10:40:26'),(2,'Cabels','images/category/16045.jpg',0,5,1,'2006-09-11 10:40:26'),(3,'Controller Cards','images/category/42544.jpg',0,10,1,'2006-09-11 10:40:26'),(4,'Cameras','images/category/22664.jpg',0,15,1,'2006-09-11 10:40:26'),(5,'CPUs','images/category/27006.jpg',0,20,1,'2006-09-11 10:40:26'),(6,'Cases','images/category/29811.jpg',0,25,1,'2006-09-11 10:40:26'),(7,'Floppy Drives','images/category/353.jpg',0,25,1,'2006-09-11 10:40:26'),(8,'Fans','images/category/33753.jpg',0,30,1,'2006-09-11 10:40:26'),(9,'Hard Drives','images/category/41450.jpg',0,35,1,'2006-09-11 10:40:26'),(10,'Keyboards','images/category/35206.jpg',0,35,1,'2006-09-11 10:40:26'),(11,'Mother Boards','images/category/37716.jpg',0,40,1,'2006-09-11 10:40:26'),(12,'Mice','images/category/43127.jpg',0,45,1,'2006-09-11 10:40:26'),(13,'Modems','images/category/27490.jpg',0,50,1,'2006-09-11 10:40:26'),(14,'Memory','images/category/33975.jpg',0,55,1,'2006-09-11 10:40:26'),(15,'Memory Device','images/category/25122.jpg',0,60,1,'2006-09-11 10:40:26'),(16,'Multimedia/MP3','images/category/39733.jpg',0,65,1,'2006-09-11 10:40:26'),(17,'Monitors/LCD','images/category/26881.jpg',0,70,1,'2006-09-11 10:40:26'),(18,'Notebooks/PDA','images/category/41271.jpg',0,75,1,'2006-09-11 10:40:26'),(19,'Networking','images/category/35179.jpg',0,80,1,'2006-09-11 10:40:26'),(20,'Optical Drive','images/category/36922.jpg',0,85,1,'2006-09-11 10:40:26'),(21,'Optical Media','images/category/35483.jpg',0,90,1,'2006-09-11 10:40:26'),(22,'POS Equipment','images/category/38653.jpg',0,95,1,'2006-09-11 10:40:26'),(23,'Projector','images/category/42740.jpg',0,100,1,'2006-09-11 10:40:26'),(24,'Printers','images/category/29533.jpg',0,105,1,'2006-09-11 10:40:26'),(25,'Power Supply','images/category/35380.jpg',0,110,1,'2006-09-11 10:40:26'),(26,'Removable Drive Bay','images/category/29404.jpg',0,115,1,'2006-09-11 10:40:26'),(27,'Removable Media','images/category/23052.jpg',0,120,1,'2006-09-11 10:40:26'),(28,'Scanners','images/category/38330.jpg',0,125,1,'2006-09-11 10:40:26'),(29,'Software','images/category/40352.jpg',0,130,1,'2006-09-11 10:40:26'),(30,'Sound Cards','images/category/40473.jpg',0,135,1,'2006-09-11 10:40:26'),(31,'Speakers','images/category/37924.jpg',0,140,1,'2006-09-11 10:40:26'),(32,'Barebone Systems','images/category/38157.jpg',0,145,1,'2006-09-11 10:40:26'),(33,'Tape Back-up','images/category/29875.jpg',0,150,1,'2006-09-11 10:40:26'),(34,'UPS','images/category/21222.jpg',0,155,1,'2006-09-11 10:40:26'),(35,'VGA Cards','images/category/34339.jpg',0,160,1,'2006-09-11 10:40:26'),(36,'Zip Drive','images/category/7543.jpg',0,165,1,'2006-09-11 10:40:26'),(37,'PDA Device','images/category/22719.jpg',1,10,1,'2006-09-11 10:40:26'),(38,'Memory Heatsink','images/category/20811.jpg',1,11,1,'2006-09-11 10:40:26'),(39,'Printer Acces','images/category/43207.jpg',1,12,1,'2006-09-11 10:40:26'),(40,'Accessories','images/category/25511.jpg',1,40,1,'2006-09-11 10:40:26'),(41,'Hard Drive','images/category/26956.jpg',1,41,1,'2006-09-11 10:40:26'),(42,'Internal SCSI','images/category/33704.jpg',2,42,1,'2006-09-11 10:40:26'),(43,'Internal IDE','images/category/33704.jpg',2,43,1,'2006-09-11 10:40:26'),(44,'WD Secureconnect','images/category/33704.jpg',2,44,1,'2006-09-11 10:40:26'),(45,'External USB','images/category/33704.jpg',2,45,1,'2006-09-11 10:40:26'),(46,'I/O Cards','images/category/28103.jpg',3,46,1,'2006-09-11 10:40:26'),(47,'SCSI Controller','images/category/6799.jpg',3,47,1,'2006-09-11 10:40:26'),(48,'RAID Controller','images/category/17972.jpg',3,48,1,'2006-09-11 10:40:26'),(49,'Serial ATA Controller','images/category/39408.jpg',3,49,1,'2006-09-11 10:40:26'),(50,'Cameras','images/category/25007.jpg',4,50,1,'2006-09-11 10:40:26'),(51,'Pentium 4 S478','images/category/35189.jpg',5,51,1,'2006-09-11 10:40:26'),(52,'Pentium 4 S775/T','images/category/39691.jpg',5,52,1,'2006-09-11 10:40:26'),(53,'Celeron S478','images/category/28605.jpg',5,53,1,'2006-09-11 10:40:26'),(54,'Celeron S775/T','images/category/39545.jpg',5,54,1,'2006-09-11 10:40:26'),(55,'Xeon/Xeon MP','images/category/40411.jpg',5,56,1,'2006-09-11 10:40:26'),(56,'Intel/Banias Mobile','images/category/20138.jpg',5,56,1,'2006-09-11 10:40:26'),(57,'AMD Athlon 64 S939/S754','images/category/39729.jpg',5,57,1,'2006-09-11 10:40:26'),(58,'AMD Sempron','images/category/39127.jpg',5,58,1,'2006-09-11 10:40:26'),(59,'AMD Opteron','images/category/39991.jpg',5,59,1,'2006-09-11 10:40:26'),(60,'Mini-tower','images/category/22622.jpg',6,60,1,'2006-09-11 10:40:26'),(61,'Mid-tower','images/category/27320.jpg',6,61,1,'2006-09-11 10:40:26'),(62,'Full Tower','images/category/40748.jpg',6,62,1,'2006-09-11 10:40:26'),(63,'Desktop','images/category/27317.jpg',6,63,1,'2006-09-11 10:40:26'),(64,'Server','images/category/22269.jpg',6,64,1,'2006-09-11 10:40:26'),(65,'Booksize/Flex ATX','images/category/40997.jpg',6,65,1,'2006-09-11 10:40:26'),(66,'Rackmount','images/category/10447.jpg',6,66,1,'2006-09-11 10:40:26'),(67,'External Chassis','images/category/36597.jpg',6,67,1,'2006-09-11 10:40:26'),(68,'SCSI-Terminators','images/category/',6,68,1,'2006-09-11 10:40:26'),(69,'External SCSI/NT/Print','images/category/44463.jpg',6,69,1,'2006-09-11 10:40:26'),(70,'Hot Swap Drive Kits','images/category/28044.jpg',6,70,1,'2006-09-11 10:40:26'),(71,'Floppy Drive','images/category/10092.jpg',7,71,1,'2006-09-11 10:40:26'),(72,'Hard Drive Cooler','images/category/15882.jpg',8,72,1,'2006-09-11 10:40:26'),(73,'Chipset Cooler','images/category/15910.jpg',8,73,1,'2006-09-11 10:40:26'),(74,'Xeon CPU Fan','images/category/18879.jpg',8,74,1,'2006-09-11 10:40:26'),(75,'Pentium 4 Fan','images/category/18926.jpg',8,75,1,'2006-09-11 10:40:26'),(76,'Socket 7/A CPU Fan','images/category/16069.jpg',8,76,1,'2006-09-11 10:40:26'),(77,'Chassis/Power Supply Fan','images/category/23492.jpg',8,77,1,'2006-09-11 10:40:26'),(78,'Celeron/K6 Fan','images/category/11918.jpg',8,78,1,'2006-09-11 10:40:26'),(79,'Pentium II/III Fan','images/category/23236.jpg',8,79,1,'2006-09-11 10:40:26'),(80,'IDE Hard Disk','images/category/41633.jpg',9,80,1,'2006-09-11 10:40:26'),(81,'External Hard Disk','images/category/39175.jpg',9,81,1,'2006-09-11 10:40:26'),(82,'Notebook/Mobile HD','images/category/39529.jpg',9,82,1,'2006-09-11 10:40:26'),(83,'SCSI Hard Drive','images/category/33395.jpg',9,83,1,'2006-09-11 10:40:26'),(84,'Serial ATA Hard Drive','images/category/41632.jpg',9,84,1,'2006-09-11 10:40:26'),(85,'Cordless Keyboard','images/category/24643.jpg',10,85,1,'2006-09-11 10:40:26'),(86,'PS/2 Keyboard','images/category/32627.jpg',10,86,1,'2006-09-11 10:40:26'),(87,'AT Keyboard','images/category/4145.jpg',10,87,1,'2006-09-11 10:40:26'),(88,'USB Keyboard','images/category/27939.jpg',10,88,1,'2006-09-11 10:40:26'),(89,'Keyboard/Mice Combo','images/category/22518.jpg',10,89,1,'2006-09-11 10:40:26'),(90,'Socket 775/T-P4','images/category/40733.jpg',11,90,1,'2006-09-11 10:40:26'),(91,'Socket 478-P4','images/category/21487.jpg',11,91,1,'2006-09-11 10:40:26'),(92,'Socket 370','images/category/40812.jpg',11,92,1,'2006-09-11 10:40:26'),(93,'Xeon','images/category/26000.jpg',11,93,1,'2006-09-11 10:40:26'),(94,'Socket 939/940','images/category/41555.jpg',11,94,1,'2006-09-11 10:40:26'),(95,'Socket 754','images/category/37952.jpg',11,95,1,'2006-09-11 10:40:26'),(96,'Socket A','images/category/26447.jpg',11,96,1,'2006-09-11 10:40:26'),(97,'Opteron','images/category/40764.jpg',11,97,1,'2006-09-11 10:40:26'),(98,'Cordless Mouse','images/category/24152.jpg',12,98,1,'2006-09-11 10:40:26'),(99,'PS/2 Mouse','images/category/27685.jpg',12,99,1,'2006-09-11 10:40:26'),(100,'USB Mouse','images/category/27665.jpg',12,100,1,'2006-09-11 10:40:26'),(101,'Serial Mouse','images/category/27938.jpg',12,101,1,'2006-09-11 10:40:26'),(102,'PCMCIA/Card Bus','images/category/40821.jpg',13,102,1,'2006-09-11 10:40:26'),(103,'External Modem','images/category/41270.jpg',13,103,1,'2006-09-11 10:40:26'),(104,'Internal Modem','images/category/24558.jpg',13,104,1,'2006-09-11 10:40:26'),(105,'Rambus Memory','images/category/6976.jpg',14,105,1,'2006-09-11 10:40:26'),(106,'SIMM Memory','images/category/6976.jpg',14,106,1,'2006-09-11 10:40:26'),(107,'USB Memory','images/category/30161.jpg',14,107,1,'2006-09-11 10:40:26'),(108,'PCMCIA/Card Bus','images/category/',14,108,1,'2006-09-11 10:40:26'),(109,'DIMM Memory','images/category/23619.jpg',14,109,1,'2006-09-11 10:40:26'),(110,'DDR Registered DIMM','images/category/28552.jpg',14,110,1,'2006-09-11 10:40:26'),(111,'DDR Unbuffered DIMM','images/category/35715.jpg',14,111,1,'2006-09-11 10:40:26'),(112,'SODIMM DDR','images/category/36500.jpg',14,112,1,'2006-09-11 10:40:26'),(113,'SODIMM SDRAM','images/category/15456.jpg',14,115,1,'2006-09-11 10:40:26'),(114,'DDR2 Unbuffered','images/category/35655.jpg',14,114,1,'2006-09-11 10:40:26'),(115,'DDR2 Registered','images/category/12577.jpg',14,115,1,'2006-09-11 10:40:26'),(116,'DDR2SO-DIMM','images/category/35892.jpg',14,116,1,'2006-09-11 10:40:26'),(117,'Pen Drive 1.1+MP3','images/category/25122.jpg',15,117,1,'2006-09-11 10:40:26'),(118,'Pen Drive 1.1','images/category/33025.jpg',15,118,1,'2006-09-11 10:40:26'),(119,'Pen Drive 2.0','images/category/33425.jpg',15,119,1,'2006-09-11 10:40:26'),(120,'Smart Card','images/category/12293516.jpg',15,120,1,'2006-09-11 10:40:26'),(121,'Compact Flash','images/category/24186.jpg',15,121,1,'2006-09-11 10:40:26'),(122,'Secure Digital','images/category/24194.jpg',15,122,1,'2006-09-11 10:40:26'),(123,'Digital Video Converter','images/category/40591.jpg',16,123,1,'2006-09-11 10:40:26'),(124,'MP3 Players','images/category/27621.jpg',16,124,1,'2006-09-11 10:40:26'),(125,'LCD 15inch','images/category/26881.jpg',17,125,1,'2006-09-11 10:40:26'),(126,'LCD 17inch','images/category/38047.jpg',17,126,1,'2006-09-11 10:40:26'),(127,'LCD 18inch','images/category/25283.jpg',17,127,1,'2006-09-11 10:40:26'),(128,'LCD 19inch','images/category/42879.jpg',17,128,1,'2006-09-11 10:40:26'),(129,'LCD 20inch+','images/category/42638.jpg',17,130,1,'2006-09-11 10:40:26'),(130,'LCD 30inch+','images/category/26492.jpg',17,131,1,'2006-09-11 10:40:26'),(131,'LCD 40inch+','images/category/37923.jpg',17,131,1,'2006-09-11 10:40:26'),(132,'LCD TV 15inch','images/category/44605.jpg',17,132,1,'2006-09-11 10:40:26'),(133,'LCD TV 17inch','images/category/34929.jpg',17,133,1,'2006-09-11 10:40:26'),(134,'LCD TV 18inch','images/category/25822.jpg',17,134,1,'2006-09-11 10:40:26'),(135,'LCD TV 19inch','images/category/44644.jpg',17,135,1,'2006-09-11 10:40:26'),(136,'LCD TV 20inch','images/category/41481.jpg',17,136,1,'2006-09-11 10:40:26'),(137,'LCD TV 29inch','images/category/44300.jpg',17,137,1,'2006-09-11 10:40:26'),(138,'LCD TV 30inch+','images/category/44216.jpg',17,138,1,'2006-09-11 10:40:26'),(139,'Monitors 15inch','images/category/8849.jpg',17,139,1,'2006-09-11 10:40:26'),(140,'Monitors 17inch','images/category/16813.jpg',17,140,1,'2006-09-11 10:40:26'),(141,'Monitors 19inch','images/category/18577.jpg',17,141,1,'2006-09-11 10:40:26'),(142,'Monitors 21inch','images/category/43478.jpg',17,142,1,'2006-09-11 10:40:26'),(143,'Monitors 22inch','images/category/17213.jpg',17,143,1,'2006-09-11 10:40:26'),(144,'Monitors 23inch+','images/category/20744.jpg',17,144,1,'2006-09-11 10:40:26'),(145,'42 inch Plasma','images/category/44607.jpg',17,145,1,'2006-09-11 10:40:26'),(146,'50 inch Plasma','images/category/44607.jpg',17,146,1,'2006-09-11 10:40:26'),(147,'Monitor Accessories','images/category/24331.jpg',17,147,1,'2006-09-11 10:40:26'),(148,'Pentium III Notebook','images/category/37020.jpg',18,148,1,'2006-09-11 10:40:26'),(149,'Pentium 4 Notebook','images/category/40427.jpg',18,149,1,'2006-09-11 10:40:26'),(150,'Notebook Accessories','images/category/43531.jpg',18,150,1,'2006-09-11 10:40:26'),(151,'Pentium M Notebook','images/category/23131.jpg',18,151,1,'2006-09-11 10:40:26'),(152,'AMD Notebook','images/category/35252.jpg',18,152,1,'2006-09-11 10:40:26'),(153,'Celeron Notebook','images/category/26617.jpg',18,153,1,'2006-09-11 10:40:26'),(154,'Tablet Notebook PC','images/category/36551.jpg',18,154,1,'2006-09-11 10:40:26'),(155,'K7 Notebook','images/category/35250.jpg',18,155,1,'2006-09-11 10:40:26'),(156,'PDA','images/category/24514.jpg',18,156,1,'2006-09-11 10:40:26'),(157,'Network Att. Storage','images/category/38083.jpg',19,157,1,'2006-09-11 10:40:26'),(158,'Switches','images/category/35179.jpg',19,158,1,'2006-09-11 10:40:26'),(159,'Bluetooth Wireless','images/category/41205.jpg',19,159,1,'2006-09-11 10:40:26'),(160,'Network Accessories','images/category/22255.jpg',19,160,1,'2006-09-11 10:40:26'),(161,'Routers','images/category/15464.jpg',19,161,1,'2006-09-11 10:40:26'),(162,'Hubs','images/category/4882.jpg',19,162,1,'2006-09-11 10:40:26'),(163,'Network Adapters','images/category/41538.jpg',19,163,1,'2006-09-11 10:40:26'),(164,'Internet Appliance','images/category/product_shot.jpg',19,164,1,'2006-09-11 10:40:26'),(165,'Wireless Networking','images/category/36902.jpg',19,165,1,'2006-09-11 10:40:26'),(166,'PCMCIA/Card Bus','images/category/44244.jpg',19,166,1,'2006-09-11 10:40:26'),(167,'DVD+/-RW','images/category/40836.jpg',20,167,1,'2006-09-11 10:40:26'),(168,'Combo CDRW/DVD','images/category/25824.jpg',20,168,1,'2006-09-11 10:40:26'),(169,'Slim DVD/RW','images/category/41218.jpg',20,169,1,'2006-09-11 10:40:26'),(170,'DVD-ROM','images/category/37683.jpg',20,170,1,'2006-09-11 10:40:26'),(171,'CDRW-Internal','images/category/20612.jpg',20,171,1,'2006-09-11 10:40:26'),(172,'CDRW-External','images/category/28226.jpg',20,172,1,'2006-09-11 10:40:26'),(173,'IDE CD-ROM','images/category/9444.jpg',20,173,1,'2006-09-11 10:40:26'),(174,'SCSI CD-ROM','images/category/26775.jpg',20,174,1,'2006-09-11 10:40:26'),(175,'DVD Player','images/category/DVDPlayRecord_marq_030506.gif',20,175,1,'2006-09-11 10:40:26'),(176,'DVD-RAM Media','images/category/25009.jpg',20,176,1,'2006-09-11 10:40:26'),(177,'Slim CD-ROM','images/category/41218.jpg',20,177,1,'2006-09-11 10:40:26'),(178,'Slim Combo','images/category/41218.jpg',20,178,1,'2006-09-11 10:40:26'),(179,'Slim DVD-ROM','images/category/41218.jpg',20,179,1,'2006-09-11 10:40:26'),(180,'Barcode HW','images/category/38654.jpg',22,180,1,'2006-09-11 10:40:26'),(181,'Barcode Software','images/category/',22,181,1,'2006-09-11 10:40:26'),(182,'Printers','images/category/38755.jpg',22,182,1,'2006-09-11 10:40:26'),(183,'Scanners','images/category/38714.jpg',22,183,1,'2006-09-11 10:40:26'),(184,'Projector','images/category/38845.jpg',23,184,1,'2006-09-11 10:40:26'),(185,'Printers','images/category/27869.jpg',24,185,1,'2006-09-11 10:40:26'),(186,'PS/2 Power Supply','images/category/19127.jpg',25,186,1,'2006-09-11 10:40:26'),(187,'ATX Power Supply','images/category/37146.jpg',25,187,1,'2006-09-11 10:40:26'),(188,'Micro ATX','images/category/12255.jpg',25,188,1,'2006-09-11 10:40:26'),(189,'Redundant','images/category/11041.jpg',25,189,1,'2006-09-11 10:40:26'),(190,'Server Power Supply','images/category/40729.jpg',25,190,1,'2006-09-11 10:40:26'),(191,'NLX Power Supply','images/category/28832.jpg',25,191,1,'2006-09-11 10:40:26'),(192,'External Removable','images/category/29403.jpg',26,192,1,'2006-09-11 10:40:26'),(193,'Removable Storage Kit','images/category/23052.jpg',27,192,1,'2006-09-11 10:40:26'),(194,'Removable Storage','images/category/37037.jpg',27,193,1,'2006-09-11 10:40:26'),(195,'Scanners','images/category/38351.jpg',28,195,1,'2006-09-11 10:40:26'),(196,'Single Pack Software','images/category/30582.jpg',29,196,1,'2006-09-11 10:40:26'),(197,'CD Title','images/category/30762.jpg',29,197,1,'2006-09-11 10:40:26'),(198,'Multiple Pack Software','images/category/41790.jpg',29,198,1,'2006-09-11 10:40:26'),(199,'Other','images/category/27299.jpg',29,199,1,'2006-09-11 10:40:26'),(200,'Sound Card','images/category/40473.jpg',30,200,1,'2006-09-11 10:40:26'),(201,'Speakers','images/category/30607.jpg',31,201,1,'2006-09-11 10:40:26'),(202,'Headphones','images/category/32978.jpg',31,202,1,'2006-09-11 10:40:26'),(203,'AMD Barebone','images/category/43216.jpg',32,203,1,'2006-09-11 10:40:26'),(204,'Pentium III Barebone','images/category/26623.jpg',32,205,1,'2006-09-11 10:40:26'),(205,'Terminal Systems','images/category/24973.jpg',32,206,1,'2006-09-11 10:40:26'),(206,'Pentium 4 Barebone','images/category/35187.jpg',32,207,1,'2006-09-11 10:40:26'),(207,'Celeron Barebone','images/category/33852.jpg',32,208,1,'2006-09-11 10:40:26'),(208,'Box and Foam','images/category/27721.jpg',32,209,1,'2006-09-11 10:40:26'),(209,'Xeon Barebone','images/category/37139.jpg',32,209,1,'2006-09-11 10:40:26'),(210,'Tape Backup Acces','images/category/27094.jpg',33,210,1,'2006-09-11 10:40:26'),(211,'Internal Tape Backup','images/category/29705.jpg',33,211,1,'2006-09-11 10:40:26'),(212,'External Tape Backup','images/category/43995.jpg',33,212,1,'2006-09-11 10:40:26'),(213,'UPS','images/category/29955.jpg',34,213,1,'2006-09-11 10:40:26'),(214,'Surge Protection','images/category/741.jpg',34,214,1,'2006-09-11 10:40:26'),(215,'Video Card 16MB','images/category/39396.jpg',35,215,1,'2006-09-11 10:40:26'),(216,'Video Card 32MB','images/category/27876.jpg',35,216,1,'2006-09-11 10:40:26'),(217,'Video Card 4MB','images/category/18358.jpg',35,218,1,'2006-09-11 10:40:26'),(218,'Video Card 256MB','images/category/34364.jpg',35,218,1,'2006-09-11 10:40:26'),(219,'Video Card 128MB','images/category/32880.jpg',35,219,1,'2006-09-11 10:40:26'),(220,'Video Card 8MB','images/category/5987.jpg',35,220,1,'2006-09-11 10:40:26'),(221,'Video Card 96MB','images/category/19998.jpg',35,221,1,'2006-09-11 10:40:26'),(222,'Video Card 64MB','images/category/19398.jpg',35,222,1,'2006-09-11 10:40:26'),(223,'TV Tuner Card','images/category/34843.jpg',35,223,1,'2006-09-11 10:40:26'),(224,'IDE Zip Drive','images/category/7543.jpg',36,224,1,'2006-09-11 10:40:26'),(225,'Misc','images/category/20422.jpg',1,0,1,'2006-09-11 10:40:26');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `company_id` int(20) NOT NULL auto_increment,
  `company_name` varchar(60) NOT NULL,
  `company_website` char(100) default NULL,
  `company_create_date` int(20) NOT NULL default '0',
  `company_type` enum('Lead','Contract','Non-Contract') NOT NULL,
  `company_assgned_to` int(20) NOT NULL,
  `company_ticker_symbol` char(64) NOT NULL,
  `company_employees` int(11) NOT NULL,
  `company_ownership` char(64) NOT NULL,
  `company_industry` char(64) NOT NULL,
  `company_rating` char(64) NOT NULL,
  `company_sic_code` char(64) NOT NULL,
  `company_annual_revenue` char(64) NOT NULL,
  `company_referred_by` char(64) NOT NULL,
  `company_active` int(4) default '1',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`company_id`),
  KEY `company_assgned_to` (`company_assgned_to`),
  FULLTEXT KEY `company_name` (`company_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_address`
--

CREATE TABLE `company_address` (
  `company_address_id` int(20) NOT NULL auto_increment,
  `company_id` int(20) default NULL,
  `company_address_type` enum('Service','Billing','Shipping','Other') NOT NULL default 'Billing',
  `company_address_name` char(64) NOT NULL,
  `company_street_1` varchar(60) NOT NULL default '',
  `company_street_2` varchar(60) default NULL,
  `company_city` varchar(60) NOT NULL default '',
  `company_state` varchar(60) NOT NULL default '0',
  `company_postal_code` varchar(60) NOT NULL default '',
  `company_country` varchar(60) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`company_address_id`),
  KEY `company_id` (`company_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_address`
--

LOCK TABLES `company_address` WRITE;
/*!40000 ALTER TABLE `company_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_address_to_user`
--

DROP TABLE IF EXISTS `company_address_to_user`;
CREATE TABLE `company_address_to_user` (
  `company_address_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `last_modified` int(20) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_address_to_user`
--

LOCK TABLES `company_address_to_user` WRITE;
/*!40000 ALTER TABLE `company_address_to_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_address_to_user` ENABLE KEYS */;
UNLOCK TABLES;

CREATE TABLE `company_meeting` (
  `company_meeting_id` int(20) NOT NULL auto_increment,
  `company_id` int(20) NOT NULL,
  `company_meeting_start` int(20) default NULL,
  `company_meeting_end` int(20) default NULL,
  `company_meeting_subject` varchar(128) default NULL,
  `company_meeting_text` text NOT NULL,
  `company_meeting_created_by` int(20) default NULL,
  `company_meeting_active` int(3) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`company_meeting_id`),
  KEY `company_id` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
--
-- Table structure for table `company_contact`
--

DROP TABLE IF EXISTS `company_contact`;

CREATE TABLE `company_contact` (
  `company_contact_id` int(20) NOT NULL auto_increment,
  `company_id` int(20) default NULL,
  `company_contact_type` enum('Business Phone','Business Fax','Mobile Phone','Pager','Email','Yahoo IM','MSN IM','AOL IM','Contact Name') default NULL,
  `company_contact_value` char(100) NOT NULL default '',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`company_contact_id`),
  KEY `company_id` (`company_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_contact`
--

LOCK TABLES `company_contact` WRITE;
/*!40000 ALTER TABLE `company_contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_task`
--

DROP TABLE IF EXISTS `company_task`;
CREATE TABLE `company_task` (
  `company_task_id` int(20) NOT NULL auto_increment,
  `company_id` int(20) NOT NULL,
  `company_task_name` varchar(100) NOT NULL,
  `company_task_create` int(20) NOT NULL,
  `company_task_due` int(20) NOT NULL,
  `company_task_alarm` int(20) NOT NULL,
  `company_task_priority` tinyint(3) NOT NULL,
  `company_task_category_id` int(20) NOT NULL,
  `company_task_text` longtext NOT NULL,
  `company_task_status` enum('Active','Completed','Converted') NOT NULL,
  `company_task_create_by` int(20) NOT NULL,
  `last_modifed` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`company_task_id`),
  KEY `company_id` (`company_id`,`company_task_category_id`),
  KEY `company_task_create_by` (`company_task_create_by`),
  FULLTEXT KEY `company_task_text` (`company_task_text`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_task`
--

LOCK TABLES `company_task` WRITE;
/*!40000 ALTER TABLE `company_task` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_task` ENABLE KEYS */;
UNLOCK TABLES;


-- 
-- Table structure for table `company_task_category`
-- 

CREATE TABLE `company_task_category` (
  `company_task_category_id` int(20) NOT NULL auto_increment,
  `company_task_category_name` char(200) NOT NULL,
  PRIMARY KEY  (`company_task_category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `company_task_category`
-- 


--
-- Table structure for table `company_to_autobill`
--

DROP TABLE IF EXISTS `company_to_autobill`;
CREATE TABLE `company_to_autobill` (
  `company_to_autobill_id` int(20) NOT NULL auto_increment,
  `autobill_id` int(20) NOT NULL,
  `contract_to_company_id` int(20) NOT NULL,
  `company_id` int(20) NOT NULL,
  `company_to_autobill_active` tinyint(3) NOT NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`company_to_autobill_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_to_autobill`
--

LOCK TABLES `company_to_autobill` WRITE;
/*!40000 ALTER TABLE `company_to_autobill` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_to_autobill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_to_system`
--

DROP TABLE IF EXISTS `company_to_system`;
CREATE TABLE `company_to_system` (
  `company_id` int(20) NOT NULL default '0',
  `system_id` int(20) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_to_system`
--

LOCK TABLES `company_to_system` WRITE;
/*!40000 ALTER TABLE `company_to_system` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_to_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_to_workorder`
--

DROP TABLE IF EXISTS `company_to_workorder`;
CREATE TABLE `company_to_workorder` (
  `company_to_workorder_id` int(20) NOT NULL auto_increment,
  `company_id` int(20) NOT NULL default '0',
  `workorder_id` int(20) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`company_to_workorder_id`),
  KEY `company_id` (`company_id`),
  KEY `workorder_id` (`workorder_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_to_workorder`
--

LOCK TABLES `company_to_workorder` WRITE;
/*!40000 ALTER TABLE `company_to_workorder` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_to_workorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configure`
--

DROP TABLE IF EXISTS `configure`;
CREATE TABLE `configure` (
  `configure_id` int(20) NOT NULL auto_increment,
  `configure_name` varchar(40) NOT NULL,
  `configure_value` varchar(255) NOT NULL,
  PRIMARY KEY  (`configure_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configure`
--

LOCK TABLES `configure` WRITE;
/*!40000 ALTER TABLE `configure` DISABLE KEYS */;
INSERT INTO `configure` VALUES (1,'licenseKey','201d70355573beaae53e30da8b6e88af'),(5,'revision','r37'),(4,'major','1.9');
/*!40000 ALTER TABLE `configure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contract_to_company`
--

DROP TABLE IF EXISTS `contract_to_company`;
CREATE TABLE `contract_to_company` (
  `contract_to_company_id` int(20) NOT NULL auto_increment,
  `contract_type_id` int(20) NOT NULL,
  `company_id` int(20) NOT NULL,
  `contract_to_company_active` tinyint(20) NOT NULL,
  `contract_to_company_start_date` int(20) NOT NULL,
  `contract_to_company_term` int(20) NOT NULL,
  `contract_to_company_increament` int(11) NOT NULL,
  `contract_to_company_amount` float(10,2) NOT NULL,
  `contract_to_company_covered_labor` float(14,2) NOT NULL,
  `contract_to_company_covered_labor_rate` float(14,2) NOT NULL,
  `contract_to_company_non_covered_labor_rate` float(14,2) NOT NULL,
  `contract_to_company_call_min` float(14,2) NOT NULL,
  `contract_to_company_call_covered_rate` float(14,2) NOT NULL,
  `contract_to_company_call_non_covered_rate` float(14,2) NOT NULL,
  PRIMARY KEY  (`contract_to_company_id`),
  KEY `contract_type_id` (`contract_type_id`,`company_id`,`contract_to_company_active`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;




--
-- Table structure for table `contract_type`
--

DROP TABLE IF EXISTS `contract_type`;
CREATE TABLE `contract_type` (
  `contract_type_id` int(20) NOT NULL auto_increment,
  `contract_type_name` varchar(128) NOT NULL,
  `contract_type_text` text,
  `contract_type_rate` float(10,2) default NULL,
  `contract_type_term` int(11) default NULL,
  `contract_type_active` tinyint(3) default NULL,
  `contract_type_onsite_min` int(11) NOT NULL,
  `contract_type_call_min` int(11) NOT NULL,
  `contract_type_call_value` float(14,4) NOT NULL,
  `contract_type_increament` int(11) NOT NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`contract_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract_type`
--

LOCK TABLES `contract_type` WRITE;
/*!40000 ALTER TABLE `contract_type` DISABLE KEYS */;
INSERT INTO `contract_type` VALUES (1,'Bronze Package','Bronze Package ',95.00,12,1,60,120,1.0000,1,'2007-06-12 19:28:30'),(2,'Silver Package','Silver Package',250.00,12,1,180,120,1.0000,1,'2007-06-12 19:28:30'),(3,'Gold Package','Gold Contract',750.00,12,1,600,300,1.0000,1,'2007-06-12 19:28:30');
/*!40000 ALTER TABLE `contract_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `country_id` int(20) NOT NULL auto_increment,
  `country_code` char(10) NOT NULL default '',
  `country_text` char(100) NOT NULL default '',
  `country_active` smallint(4) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`country_id`),
  UNIQUE KEY `country_code` (`country_code`)
) ENGINE=MyISAM AUTO_INCREMENT=253 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'AF','Afghanistan',0,'0000-00-00 00:00:00'),(2,'AL','Albania',0,'0000-00-00 00:00:00'),(3,'DZ','Algeria',0,'0000-00-00 00:00:00'),(4,'AS','American Samoa',0,'0000-00-00 00:00:00'),(5,'AD','Andorra',0,'0000-00-00 00:00:00'),(6,'AO','Angola',0,'0000-00-00 00:00:00'),(7,'AI','Anguilla',0,'0000-00-00 00:00:00'),(8,'AQ','Antarctica',0,'0000-00-00 00:00:00'),(9,'AG','Antigua and Barbuda',0,'0000-00-00 00:00:00'),(10,'AR','Argentina',0,'0000-00-00 00:00:00'),(11,'AM','Armenia',0,'0000-00-00 00:00:00'),(12,'AW','Aruba',0,'0000-00-00 00:00:00'),(13,'AU','Australia',0,'0000-00-00 00:00:00'),(14,'AT','Austria',0,'0000-00-00 00:00:00'),(15,'AZ','Azerbaijan',0,'0000-00-00 00:00:00'),(16,'AP','Azores',0,'0000-00-00 00:00:00'),(17,'BS','Bahamas',0,'0000-00-00 00:00:00'),(18,'BH','Bahrain',0,'0000-00-00 00:00:00'),(19,'BD','Bangladesh',0,'0000-00-00 00:00:00'),(20,'BB','Barbados',0,'0000-00-00 00:00:00'),(21,'BY','Belarus',0,'0000-00-00 00:00:00'),(22,'BE','Belgium',0,'0000-00-00 00:00:00'),(23,'BZ','Belize',0,'0000-00-00 00:00:00'),(24,'BJ','Benin',0,'0000-00-00 00:00:00'),(25,'BM','Bermuda',0,'0000-00-00 00:00:00'),(26,'BT','Bhutan',0,'0000-00-00 00:00:00'),(27,'BO','Bolivia',0,'0000-00-00 00:00:00'),(28,'BA','Bosnia And Herzegowina',0,'0000-00-00 00:00:00'),(29,'XB','Bosnia-Herzegovina',0,'0000-00-00 00:00:00'),(30,'BW','Botswana',0,'0000-00-00 00:00:00'),(31,'BV','Bouvet Island',0,'0000-00-00 00:00:00'),(32,'BR','Brazil',0,'0000-00-00 00:00:00'),(33,'IO','British Indian Ocean Territory',0,'0000-00-00 00:00:00'),(34,'VG','British Virgin Islands',0,'0000-00-00 00:00:00'),(35,'BN','Brunei Darussalam',0,'0000-00-00 00:00:00'),(36,'BG','Bulgaria',0,'0000-00-00 00:00:00'),(37,'BF','Burkina Faso',0,'0000-00-00 00:00:00'),(38,'BI','Burundi',0,'0000-00-00 00:00:00'),(39,'KH','Cambodia',0,'0000-00-00 00:00:00'),(40,'CM','Cameroon',0,'0000-00-00 00:00:00'),(41,'CA','Canada',0,'0000-00-00 00:00:00'),(42,'CV','Cape Verde',0,'0000-00-00 00:00:00'),(43,'KY','Cayman Islands',0,'0000-00-00 00:00:00'),(44,'CF','Central African Republic',0,'0000-00-00 00:00:00'),(45,'TD','Chad',0,'0000-00-00 00:00:00'),(46,'CL','Chile',0,'0000-00-00 00:00:00'),(47,'CN','China',0,'0000-00-00 00:00:00'),(48,'CX','Christmas Island',0,'0000-00-00 00:00:00'),(49,'CC','Cocos (Keeling) Islands',0,'0000-00-00 00:00:00'),(50,'CO','Colombia',0,'0000-00-00 00:00:00'),(51,'KM','Comoros',0,'0000-00-00 00:00:00'),(52,'CG','Congo',0,'0000-00-00 00:00:00'),(53,'CD','Congo, The Democratic Republic O',0,'0000-00-00 00:00:00'),(54,'CK','Cook Islands',0,'0000-00-00 00:00:00'),(55,'XE','Corsica',0,'0000-00-00 00:00:00'),(56,'CR','Costa Rica',0,'0000-00-00 00:00:00'),(57,'CI','Cote d` Ivoire (Ivory Coast)',0,'0000-00-00 00:00:00'),(58,'HR','Croatia',0,'0000-00-00 00:00:00'),(59,'CU','Cuba',0,'0000-00-00 00:00:00'),(60,'CY','Cyprus',0,'0000-00-00 00:00:00'),(61,'CZ','Czech Republic',0,'0000-00-00 00:00:00'),(62,'DK','Denmark',0,'0000-00-00 00:00:00'),(63,'DJ','Djibouti',0,'0000-00-00 00:00:00'),(64,'DM','Dominica',0,'0000-00-00 00:00:00'),(65,'DO','Dominican Republic',0,'0000-00-00 00:00:00'),(66,'TP','East Timor',0,'0000-00-00 00:00:00'),(67,'EC','Ecuador',0,'0000-00-00 00:00:00'),(68,'EG','Egypt',0,'0000-00-00 00:00:00'),(69,'SV','El Salvador',0,'0000-00-00 00:00:00'),(70,'GQ','Equatorial Guinea',0,'0000-00-00 00:00:00'),(71,'ER','Eritrea',0,'0000-00-00 00:00:00'),(72,'EE','Estonia',0,'0000-00-00 00:00:00'),(73,'ET','Ethiopia',0,'0000-00-00 00:00:00'),(74,'FK','Falkland Islands (Malvinas)',0,'0000-00-00 00:00:00'),(75,'FO','Faroe Islands',0,'0000-00-00 00:00:00'),(76,'FJ','Fiji',0,'0000-00-00 00:00:00'),(77,'FI','Finland',0,'0000-00-00 00:00:00'),(78,'FR','France (Includes Monaco)',0,'0000-00-00 00:00:00'),(79,'FX','France, Metropolitan',0,'0000-00-00 00:00:00'),(80,'GF','French Guiana',0,'0000-00-00 00:00:00'),(81,'PF','French Polynesia',0,'0000-00-00 00:00:00'),(82,'TA','French Polynesia (Tahiti)',0,'0000-00-00 00:00:00'),(83,'TF','French Southern Territories',0,'0000-00-00 00:00:00'),(84,'GA','Gabon',0,'0000-00-00 00:00:00'),(85,'GM','Gambia',0,'0000-00-00 00:00:00'),(86,'GE','Georgia',0,'0000-00-00 00:00:00'),(87,'DE','Germany',0,'0000-00-00 00:00:00'),(88,'GH','Ghana',0,'0000-00-00 00:00:00'),(89,'GI','Gibraltar',0,'0000-00-00 00:00:00'),(90,'GR','Greece',0,'0000-00-00 00:00:00'),(91,'GL','Greenland',0,'0000-00-00 00:00:00'),(92,'GD','Grenada',0,'0000-00-00 00:00:00'),(93,'GP','Guadeloupe',0,'0000-00-00 00:00:00'),(94,'GU','Guam',0,'0000-00-00 00:00:00'),(95,'GT','Guatemala',0,'0000-00-00 00:00:00'),(96,'GN','Guinea',0,'0000-00-00 00:00:00'),(97,'GW','Guinea-Bissau',0,'0000-00-00 00:00:00'),(98,'GY','Guyana',0,'0000-00-00 00:00:00'),(99,'HT','Haiti',0,'0000-00-00 00:00:00'),(100,'HM','Heard And Mc Donald Islands',0,'0000-00-00 00:00:00'),(101,'VA','Holy See (Vatican City State)',0,'0000-00-00 00:00:00'),(102,'HN','Honduras',0,'0000-00-00 00:00:00'),(103,'HK','Hong Kong',0,'0000-00-00 00:00:00'),(104,'HU','Hungary',0,'0000-00-00 00:00:00'),(105,'IS','Iceland',0,'0000-00-00 00:00:00'),(106,'IN','India',0,'0000-00-00 00:00:00'),(107,'ID','Indonesia',0,'0000-00-00 00:00:00'),(108,'IR','Iran',0,'0000-00-00 00:00:00'),(109,'IQ','Iraq',0,'0000-00-00 00:00:00'),(110,'IE','Ireland',0,'0000-00-00 00:00:00'),(111,'EI','Ireland (Eire)',0,'0000-00-00 00:00:00'),(112,'IL','Israel',0,'0000-00-00 00:00:00'),(113,'IT','Italy',0,'0000-00-00 00:00:00'),(114,'JM','Jamaica',0,'0000-00-00 00:00:00'),(115,'JP','Japan',0,'0000-00-00 00:00:00'),(116,'JO','Jordan',0,'0000-00-00 00:00:00'),(117,'KZ','Kazakhstan',0,'0000-00-00 00:00:00'),(118,'KE','Kenya',0,'0000-00-00 00:00:00'),(119,'KI','Kiribati',0,'0000-00-00 00:00:00'),(120,'KP','Korea, Democratic People\'S Repub',0,'0000-00-00 00:00:00'),(121,'KW','Kuwait',0,'0000-00-00 00:00:00'),(122,'KG','Kyrgyzstan',0,'0000-00-00 00:00:00'),(123,'LA','Laos',0,'0000-00-00 00:00:00'),(124,'LV','Latvia',0,'0000-00-00 00:00:00'),(125,'LB','Lebanon',0,'0000-00-00 00:00:00'),(126,'LS','Lesotho',0,'0000-00-00 00:00:00'),(127,'LR','Liberia',0,'0000-00-00 00:00:00'),(128,'LY','Libya',0,'0000-00-00 00:00:00'),(129,'LI','Liechtenstein',0,'0000-00-00 00:00:00'),(130,'LT','Lithuania',0,'0000-00-00 00:00:00'),(131,'LU','Luxembourg',0,'0000-00-00 00:00:00'),(132,'MO','Macao',0,'0000-00-00 00:00:00'),(133,'MK','Macedonia',0,'0000-00-00 00:00:00'),(134,'MG','Madagascar',0,'0000-00-00 00:00:00'),(135,'ME','Madeira Islands',0,'0000-00-00 00:00:00'),(136,'MW','Malawi',0,'0000-00-00 00:00:00'),(137,'MY','Malaysia',0,'0000-00-00 00:00:00'),(138,'MV','Maldives',0,'0000-00-00 00:00:00'),(139,'ML','Mali',0,'0000-00-00 00:00:00'),(140,'MT','Malta',0,'0000-00-00 00:00:00'),(141,'MH','Marshall Islands',0,'0000-00-00 00:00:00'),(142,'MQ','Martinique',0,'0000-00-00 00:00:00'),(143,'MR','Mauritania',0,'0000-00-00 00:00:00'),(144,'MU','Mauritius',0,'0000-00-00 00:00:00'),(145,'YT','Mayotte',0,'0000-00-00 00:00:00'),(146,'MX','Mexico',0,'0000-00-00 00:00:00'),(147,'FM','Micronesia, Federated States Of',0,'0000-00-00 00:00:00'),(148,'MD','Moldova, Republic Of',0,'0000-00-00 00:00:00'),(149,'MC','Monaco',0,'0000-00-00 00:00:00'),(150,'MN','Mongolia',0,'0000-00-00 00:00:00'),(151,'MS','Montserrat',0,'0000-00-00 00:00:00'),(152,'MA','Morocco',0,'0000-00-00 00:00:00'),(153,'MZ','Mozambique',0,'0000-00-00 00:00:00'),(154,'MM','Myanmar (Burma)',0,'0000-00-00 00:00:00'),(155,'NA','Namibia',0,'0000-00-00 00:00:00'),(156,'NR','Nauru',0,'0000-00-00 00:00:00'),(157,'NP','Nepal',0,'0000-00-00 00:00:00'),(158,'NL','Netherlands',0,'0000-00-00 00:00:00'),(159,'AN','Netherlands Antilles',0,'0000-00-00 00:00:00'),(160,'NC','New Caledonia',0,'0000-00-00 00:00:00'),(161,'NZ','New Zealand',0,'0000-00-00 00:00:00'),(162,'NI','Nicaragua',0,'0000-00-00 00:00:00'),(163,'NE','Niger',0,'0000-00-00 00:00:00'),(164,'NG','Nigeria',0,'0000-00-00 00:00:00'),(165,'NU','Niue',0,'0000-00-00 00:00:00'),(166,'NF','Norfolk Island',0,'0000-00-00 00:00:00'),(167,'MP','Northern Mariana Islands',0,'0000-00-00 00:00:00'),(168,'NO','Norway',0,'0000-00-00 00:00:00'),(169,'OM','Oman',0,'0000-00-00 00:00:00'),(170,'PK','Pakistan',0,'0000-00-00 00:00:00'),(171,'PW','Palau',0,'0000-00-00 00:00:00'),(172,'PS','Palestinian Territory, Occupied',0,'0000-00-00 00:00:00'),(173,'PA','Panama',0,'0000-00-00 00:00:00'),(174,'PG','Papua New Guinea',0,'0000-00-00 00:00:00'),(175,'PY','Paraguay',0,'0000-00-00 00:00:00'),(176,'PE','Peru',0,'0000-00-00 00:00:00'),(177,'PH','Philippines',0,'0000-00-00 00:00:00'),(178,'PN','Pitcairn',0,'0000-00-00 00:00:00'),(179,'PL','Poland',0,'0000-00-00 00:00:00'),(180,'PT','Portugal',0,'0000-00-00 00:00:00'),(181,'PR','Puerto Rico',0,'0000-00-00 00:00:00'),(182,'QA','Qatar',0,'0000-00-00 00:00:00'),(183,'RE','Reunion',0,'0000-00-00 00:00:00'),(184,'RO','Romania',0,'0000-00-00 00:00:00'),(185,'RU','Russian Federation',0,'0000-00-00 00:00:00'),(186,'RW','Rwanda',0,'0000-00-00 00:00:00'),(187,'KN','Saint Kitts And Nevis',0,'0000-00-00 00:00:00'),(188,'SM','San Marino',0,'0000-00-00 00:00:00'),(189,'ST','Sao Tome and Principe',0,'0000-00-00 00:00:00'),(190,'SA','Saudi Arabia',0,'0000-00-00 00:00:00'),(191,'SN','Senegal',0,'0000-00-00 00:00:00'),(192,'XS','Serbia-Montenegro',0,'0000-00-00 00:00:00'),(193,'SC','Seychelles',0,'0000-00-00 00:00:00'),(194,'SL','Sierra Leone',0,'0000-00-00 00:00:00'),(195,'SG','Singapore',0,'0000-00-00 00:00:00'),(196,'SK','Slovak Republic',0,'0000-00-00 00:00:00'),(197,'SI','Slovenia',0,'0000-00-00 00:00:00'),(198,'SB','Solomon Islands',0,'0000-00-00 00:00:00'),(199,'SO','Somalia',0,'0000-00-00 00:00:00'),(200,'ZA','South Africa',0,'0000-00-00 00:00:00'),(201,'GS','South Georgia And The South Sand',0,'0000-00-00 00:00:00'),(202,'KR','South Korea',0,'0000-00-00 00:00:00'),(203,'ES','Spain',0,'0000-00-00 00:00:00'),(204,'LK','Sri Lanka',0,'0000-00-00 00:00:00'),(205,'NV','St. Christopher and Nevis',0,'0000-00-00 00:00:00'),(206,'SH','St. Helena',0,'0000-00-00 00:00:00'),(207,'LC','St. Lucia',0,'0000-00-00 00:00:00'),(208,'PM','St. Pierre and Miquelon',0,'0000-00-00 00:00:00'),(209,'VC','St. Vincent and the Grenadines',0,'0000-00-00 00:00:00'),(210,'SD','Sudan',0,'0000-00-00 00:00:00'),(211,'SR','Suriname',0,'0000-00-00 00:00:00'),(212,'SJ','Svalbard And Jan Mayen Islands',0,'0000-00-00 00:00:00'),(213,'SZ','Swaziland',0,'0000-00-00 00:00:00'),(214,'SE','Sweden',0,'0000-00-00 00:00:00'),(215,'CH','Switzerland',0,'0000-00-00 00:00:00'),(216,'SY','Syrian Arab Republic',0,'0000-00-00 00:00:00'),(217,'TW','Taiwan',0,'0000-00-00 00:00:00'),(218,'TJ','Tajikistan',0,'0000-00-00 00:00:00'),(219,'TZ','Tanzania',0,'0000-00-00 00:00:00'),(220,'TH','Thailand',0,'0000-00-00 00:00:00'),(221,'TG','Togo',0,'0000-00-00 00:00:00'),(222,'TK','Tokelau',0,'0000-00-00 00:00:00'),(223,'TO','Tonga',0,'0000-00-00 00:00:00'),(224,'TT','Trinidad and Tobago',0,'0000-00-00 00:00:00'),(225,'XU','Tristan da Cunha',0,'0000-00-00 00:00:00'),(226,'TN','Tunisia',0,'0000-00-00 00:00:00'),(227,'TR','Turkey',0,'0000-00-00 00:00:00'),(228,'TM','Turkmenistan',0,'0000-00-00 00:00:00'),(229,'TC','Turks and Caicos Islands',0,'0000-00-00 00:00:00'),(230,'TV','Tuvalu',0,'0000-00-00 00:00:00'),(231,'UG','Uganda',0,'0000-00-00 00:00:00'),(232,'UA','Ukraine',0,'0000-00-00 00:00:00'),(233,'AE','United Arab Emirates',0,'0000-00-00 00:00:00'),(234,'UK','United Kingdom',0,'0000-00-00 00:00:00'),(235,'GB','Great Britain',0,'0000-00-00 00:00:00'),(236,'US','United States',1,'2006-07-09 17:07:09'),(237,'UM','United States Minor Outlying Isl',0,'0000-00-00 00:00:00'),(238,'UY','Uruguay',0,'0000-00-00 00:00:00'),(239,'UZ','Uzbekistan',0,'0000-00-00 00:00:00'),(240,'VU','Vanuatu',0,'0000-00-00 00:00:00'),(241,'XV','Vatican City',0,'0000-00-00 00:00:00'),(242,'VE','Venezuela',0,'0000-00-00 00:00:00'),(243,'VN','Vietnam',0,'0000-00-00 00:00:00'),(244,'VI','Virgin Islands (U.S.)',0,'0000-00-00 00:00:00'),(245,'WF','Wallis and Furuna Islands',0,'0000-00-00 00:00:00'),(246,'EH','Western Sahara',0,'0000-00-00 00:00:00'),(247,'WS','Western Samoa',0,'0000-00-00 00:00:00'),(248,'YE','Yemen',0,'0000-00-00 00:00:00'),(249,'YU','Yugoslavia',0,'0000-00-00 00:00:00'),(250,'ZR','Zaire',0,'0000-00-00 00:00:00'),(251,'ZM','Zambia',0,'0000-00-00 00:00:00'),(252,'ZW','Zimbabwe',0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credit_card`
--

DROP TABLE IF EXISTS `credit_card`;
CREATE TABLE `credit_card` (
  `credit_card_id` int(20) NOT NULL auto_increment,
  `credit_card_type` char(100) NOT NULL,
  `credit_card_name` char(100) NOT NULL,
  `credit_card_active` int(3) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`credit_card_id`),
  KEY `credit_card_active` (`credit_card_active`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_card`
--

LOCK TABLES `credit_card` WRITE;
/*!40000 ALTER TABLE `credit_card` DISABLE KEYS */;
INSERT INTO `credit_card` VALUES (1,'visa','Visa',1,'2006-12-21 18:08:44'),(2,'mc','Master Card',1,'2006-12-21 18:09:09'),(3,'amex','Amex',1,'2006-12-21 18:09:30'),(4,'discover','Discover',1,'2006-12-21 18:09:49'),(5,'delta','Delta',0,'2006-12-21 18:10:08'),(6,'solo','Solo',0,'2006-12-21 18:10:31'),(7,'switch','Switch',0,'2006-12-21 18:10:52'),(8,'jcb','JCB',0,'2006-12-21 18:18:48'),(9,'diners','Diners',0,'2006-12-21 18:19:09'),(10,'carteblanche','Carta Blanche',0,'2006-12-21 18:26:04'),(11,'enroute','Enroute',0,'2006-12-21 18:26:28');
/*!40000 ALTER TABLE `credit_card` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cron`
--

DROP TABLE IF EXISTS `cron`;
CREATE TABLE `cron` (
  `cron_id` int(20) NOT NULL auto_increment,
  `cron_name` char(64) NOT NULL,
  `cron_start` int(20) NOT NULL,
  `cron_end` int(20) NOT NULL,
  `cron_running` tinyint(3) NOT NULL,
  PRIMARY KEY  (`cron_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cron`
--

LOCK TABLES `cron` WRITE;
/*!40000 ALTER TABLE `cron` DISABLE KEYS */;
/*!40000 ALTER TABLE `cron` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_log`
--

DROP TABLE IF EXISTS `employee_log`;
CREATE TABLE `employee_log` (
  `employee_log_id` int(20) NOT NULL auto_increment,
  `employee_id` int(20) NOT NULL,
  `employee_log_type` enum('Log In','Log Out','View','Edit','Delete','Create','Search') NOT NULL,
  `employee_log_action` char(255) NOT NULL,
  `employee_log_ipaddress` char(20) NOT NULL,
  `employee_log_browser` char(60) NOT NULL,
  `employee_log_timestamp` int(20) NOT NULL,
  `employee_log_session_id` char(60) NOT NULL,
  PRIMARY KEY  (`employee_log_id`),
  KEY `employee_id` (`employee_id`,`employee_log_type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_log`
--

LOCK TABLES `employee_log` WRITE;
/*!40000 ALTER TABLE `employee_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE `file` (
  `file_id` int(20) NOT NULL auto_increment,
  `file_type` enum('lead_id','workorder_id','company_id','invoice_id','system_id','user_id','lead_id','payment_id','campaign_id','product_id') NOT NULL,
  `file_type_id` int(20) NOT NULL,
  `file_size` float(20,2) default NULL,
  `file_name` varchar(128) NOT NULL,
  `file_description` text NOT NULL,
  `file_ext` varchar(10) default NULL,
  `file_create_date` int(20) default NULL,
  `file_upload_by` int(20) default NULL,
  `file_active` tinyint(3) default NULL,
  `file_mime_type` varchar(64) default NULL,
  `file_path` varchar(128) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`file_id`),
  KEY `file_type_id` (`file_type_id`),
  KEY `file_upload_by` (`file_upload_by`),
  KEY `file_active` (`file_active`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

LOCK TABLES `file` WRITE;
/*!40000 ALTER TABLE `file` DISABLE KEYS */;
/*!40000 ALTER TABLE `file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invocie_to_workorder`
--

DROP TABLE IF EXISTS `invocie_to_workorder`;
CREATE TABLE `invocie_to_workorder` (
  `invoice_id` int(20) NOT NULL default '0',
  `workorder_id` int(20) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  KEY `invoice_id` (`invoice_id`,`workorder_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invocie_to_workorder`
--

LOCK TABLES `invocie_to_workorder` WRITE;
/*!40000 ALTER TABLE `invocie_to_workorder` DISABLE KEYS */;
/*!40000 ALTER TABLE `invocie_to_workorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `invoice_id` int(20) NOT NULL auto_increment,
  `invoice_create_date` int(20) default NULL,
  `invoice_create_by` int(20) default NULL,
  `invoice_due_date` int(20) default NULL,
  `invoice_amount` float(10,4) default NULL,
  `invoice_tax_amount` float(10,4) NOT NULL default '0.0000',
  `invoice_shipping_amount` float(10,4) NOT NULL default '0.0000',
  `invoice_discount_amount` float(6,4) default NULL,
  `invoice_total_amount` float(10,4) default NULL,
  `invoice_status` enum('New','Un-Paid','Paid','Pending') default NULL,
  `invoice_paid_date` varchar(20) default NULL,
  `invoice_paid_amount` float(10,4) default NULL,
  `invoice_payment_type` int(4) default NULL,
  `invoice_barcode` varchar(64) default NULL,
  `invoice_payment_enter_by` int(20) default NULL,
  `invoice_memo` text,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`invoice_id`),
  KEY `invoice_create_by` (`invoice_create_by`),
  KEY `invoice_payment_type` (`invoice_payment_type`),
  KEY `invoice_payment_enter_by` (`invoice_payment_enter_by`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_item`
--

DROP TABLE IF EXISTS `invoice_item`;
CREATE TABLE `invoice_item` (
  `invoice_item_id` int(20) NOT NULL auto_increment,
  `invoice_id` int(20) NOT NULL,
  `invoice_item_date` int(20) NOT NULL,
  `account_type` enum('company_id','user_id') NOT NULL,
  `account_type_id` int(20) NOT NULL,
  `invoice_item_type` enum('Payment', 'Credit', 'Contract Labor', 'Labor', 'Product', 'Service', 'Contract', 'Support Call', 'Contract Support Call', 'Misc', 'Tax') NOT NULL,
  `invoice_item_type_id` int(20) NOT NULL,
  `invoice_item_qty` float(14,2) NOT NULL,
  `invoice_item_amount` float(14,4) NOT NULL,
  `invoice_item_description` varchar(255) NOT NULL,
  `invoice_item_line_type` enum('Debit','Credit','Payment') NOT NULL,
  `invoice_item_subtotal` float(14,4) NOT NULL,
  `last_modifed` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`invoice_item_id`),
  KEY `invoice_id` (`invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_item`
--

LOCK TABLES `invoice_item` WRITE;
/*!40000 ALTER TABLE `invoice_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_item_to_workorder`
--

DROP TABLE IF EXISTS `invoice_item_to_workorder`;
CREATE TABLE `invoice_item_to_workorder` (
  `invoice_item_id` int(20) NOT NULL,
  `workorder_id` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_item_to_workorder`
--

LOCK TABLES `invoice_item_to_workorder` WRITE;
/*!40000 ALTER TABLE `invoice_item_to_workorder` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_item_to_workorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_to_company`
--

DROP TABLE IF EXISTS `invoice_to_company`;
CREATE TABLE `invoice_to_company` (
  `invoice_id` int(20) NOT NULL default '0',
  `company_id` int(20) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  KEY `invoice_id` (`invoice_id`,`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_to_company`
--

LOCK TABLES `invoice_to_company` WRITE;
/*!40000 ALTER TABLE `invoice_to_company` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_to_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_to_user`
--

DROP TABLE IF EXISTS `invoice_to_user`;
CREATE TABLE `invoice_to_user` (
  `invoice_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  KEY `invoice_id` (`invoice_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_to_user`
--

LOCK TABLES `invoice_to_user` WRITE;
/*!40000 ALTER TABLE `invoice_to_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_to_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead`
--

DROP TABLE IF EXISTS `lead`;
CREATE TABLE `lead` (
  `lead_id` int(20) NOT NULL auto_increment,
  `lead_type_id` int(20) NOT NULL,
  `lead_status_id` int(20) NOT NULL,
  `lead_assigned_user` int(20) NOT NULL,
  `company_id` int(20) NOT NULL,
  `lead_referer` varchar(100) NOT NULL,
  `lead_campaign` int(20) NOT NULL,
  `lead_description` text NOT NULL,
  `lead_create_date` int(20) NOT NULL,
  `last_modifed` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`lead_id`),
  KEY `lead_assigned_user` (`lead_assigned_user`),
  FULLTEXT KEY `lead_description` (`lead_description`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead`
--

LOCK TABLES `lead` WRITE;
/*!40000 ALTER TABLE `lead` DISABLE KEYS */;
/*!40000 ALTER TABLE `lead` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_call`
--

DROP TABLE IF EXISTS `lead_call`;
CREATE TABLE `lead_call` (
  `lead_call_id` int(20) NOT NULL auto_increment,
  `lead_id` int(20) default NULL,
  `lead_call_subject` varchar(128) NOT NULL,
  `lead_call_text` text NOT NULL,
  `lead_call_date` int(20) default NULL,
  `lead_call_duration` int(20) default NULL,
  `lead_call_by` int(20) NOT NULL,
  `lead_call_active` tinyint(3) NOT NULL default '1',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`lead_call_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead_call`
--

LOCK TABLES `lead_call` WRITE;
/*!40000 ALTER TABLE `lead_call` DISABLE KEYS */;
/*!40000 ALTER TABLE `lead_call` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_email`
--

DROP TABLE IF EXISTS `lead_email`;
CREATE TABLE `lead_email` (
  `lead_email_id` int(20) NOT NULL auto_increment,
  `lead_id` int(20) NOT NULL,
  `mail_id` int(20) NOT NULL,
  `lead_mail_sent_by` int(20) NOT NULL,
  `lead_mail_date_sent` int(20) NOT NULL,
  `lead_email_has_reply` tinyint(3) NOT NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`lead_email_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead_email`
--

LOCK TABLES `lead_email` WRITE;
/*!40000 ALTER TABLE `lead_email` DISABLE KEYS */;
/*!40000 ALTER TABLE `lead_email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_meeting`
--

DROP TABLE IF EXISTS `lead_meeting`;
CREATE TABLE `lead_meeting` (
  `lead_meeting_id` int(20) NOT NULL auto_increment,
  `lead_id` int(20) NOT NULL,
  `lead_meeting_start` int(20) default NULL,
  `lead_meeting_end` int(20) default NULL,
  `lead_meeting_subject` varchar(128) default NULL,
  `lead_meeting_text` text NOT NULL,
  `lead_meeting_created_by` int(20) default NULL,
  `lead_meeting_active` int(3) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`lead_meeting_id`),
  KEY `lead_id` (`lead_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead_meeting`
--

LOCK TABLES `lead_meeting` WRITE;
/*!40000 ALTER TABLE `lead_meeting` DISABLE KEYS */;
/*!40000 ALTER TABLE `lead_meeting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_status`
--

DROP TABLE IF EXISTS `lead_status`;
CREATE TABLE `lead_status` (
  `lead_status_id` int(20) NOT NULL auto_increment,
  `lead_status_text` varchar(255) NOT NULL,
  `lead_status_active` int(3) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`lead_status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead_status`
--

LOCK TABLES `lead_status` WRITE;
/*!40000 ALTER TABLE `lead_status` DISABLE KEYS */;
INSERT INTO `lead_status` VALUES (1,'New',1,'2007-03-25 01:43:57'),(2,'Assigned',1,'2007-03-25 01:44:38'),(3,'In Process',1,'2007-03-25 01:44:49'),(4,'Converted',1,'2007-03-25 01:44:58'),(5,'Recycled',1,'2007-03-25 01:45:09'),(6,'Dead',1,'2007-03-25 01:45:19');
/*!40000 ALTER TABLE `lead_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_type`
--

DROP TABLE IF EXISTS `lead_type`;
CREATE TABLE `lead_type` (
  `lead_type_id` int(20) NOT NULL auto_increment,
  `lead_type_text` varchar(255) default NULL,
  `lead_type_active` int(3) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`lead_type_id`),
  KEY `lead_type_active` (`lead_type_active`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead_type`
--

LOCK TABLES `lead_type` WRITE;
/*!40000 ALTER TABLE `lead_type` DISABLE KEYS */;
INSERT INTO `lead_type` VALUES (1,'--None--',1,'2007-03-25 01:20:41'),(2,'Cold Call',1,'2007-03-25 01:22:45'),(3,'Existing Customer',1,'2007-03-25 01:22:58'),(4,'Self Generated',1,'2007-03-25 01:23:08'),(5,'Employee',1,'2007-03-25 01:23:20'),(6,'Partner',1,'2007-03-25 01:23:30'),(7,'Public Relations',1,'2007-03-25 01:23:44'),(8,'Direct Mail',1,'2007-03-25 01:23:54'),(9,'Conference',1,'2007-03-25 01:24:03'),(10,'Trade Show',1,'2007-03-25 01:24:13'),(11,'Web Site',1,'2007-03-25 01:24:24'),(12,'Word of mouth',1,'2007-03-25 01:24:35'),(13,'Email',1,'2007-03-25 01:24:44'),(14,'Campaign',1,'2007-03-25 01:24:54'),(15,'Other',1,'2007-03-25 01:25:04'),(16,'Referral',1,'2007-05-25 07:19:43'),(17,'Customer Call-In',1,'2007-05-29 06:52:56'),(18,'ANS',1,'2007-07-05 01:47:56');
/*!40000 ALTER TABLE `lead_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail`
--

DROP TABLE IF EXISTS `mail`;
CREATE TABLE `mail` (
  `mail_id` int(20) NOT NULL auto_increment,
  `mail_to_email` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `mail_to_name` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `mail_from_email` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `mail_from_name` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `mail_subject` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `mail_body` longtext character set utf8 collate utf8_unicode_ci NOT NULL,
  `mail_deliverd` int(20) NOT NULL default '0',
  `mail_creation_unixtime` int(20) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`mail_id`),
  KEY `mail_to_email` (`mail_to_email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail`
--

LOCK TABLES `mail` WRITE;
/*!40000 ALTER TABLE `mail` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacture`
--

DROP TABLE IF EXISTS `manufacture`;
CREATE TABLE `manufacture` (
  `manufacture_id` int(20) NOT NULL auto_increment,
  `manufacture_name` char(64) default NULL,
  `manufacture_image` char(64) default NULL,
  `manufacture_url` char(64) NOT NULL default '',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`manufacture_id`)
) ENGINE=MyISAM AUTO_INCREMENT=221 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacture`
--

LOCK TABLES `manufacture` WRITE;
/*!40000 ALTER TABLE `manufacture` DISABLE KEYS */;
INSERT INTO `manufacture` VALUES (1,'Winstronics',NULL,'','2006-09-11 11:11:59'),(2,'Enlight Co.',NULL,'','2006-09-11 11:11:59'),(3,'Mitsumi',NULL,'','2006-09-11 11:11:59'),(4,'Micron',NULL,'','2006-09-11 11:11:59'),(5,'Promise',NULL,'','2006-09-11 11:11:59'),(6,'ViewSonic',NULL,'','2006-09-11 11:11:59'),(7,'Supermicro',NULL,'','2006-09-11 11:11:59'),(8,'Microsoft',NULL,'','2006-09-11 11:11:59'),(9,'APC',NULL,'','2006-09-11 11:11:59'),(10,'Global',NULL,'','2006-09-11 11:11:59'),(11,'AIC',NULL,'','2006-09-11 11:11:59'),(12,'Tyan',NULL,'','2006-09-11 11:11:59'),(13,'Chen Ming',NULL,'','2006-09-11 11:11:59'),(14,'Y-Hsin (Rackmount Cabinets)',NULL,'','2006-09-11 11:11:59'),(15,'Microwise',NULL,'','2006-09-11 11:11:59'),(16,'Actiontec',NULL,'','2006-09-11 11:11:59'),(17,'In-Win',NULL,'','2006-09-11 11:11:59'),(18,'Sparkle Power Inc.',NULL,'','2006-09-11 11:11:59'),(19,'Netgear',NULL,'','2006-09-11 11:11:59'),(20,'eVGA',NULL,'','2006-09-11 11:11:59'),(21,'Cisco Systems',NULL,'','2006-09-11 11:11:59'),(22,'General',NULL,'','2006-09-11 11:11:59'),(23,'Adaptec',NULL,'','2006-09-11 11:11:59'),(24,'ASI',NULL,'','2006-09-11 11:11:59'),(25,'Linksys',NULL,'','2006-09-11 11:11:59'),(26,'Nspire',NULL,'','2006-09-11 11:11:59'),(27,'DFI',NULL,'','2006-09-11 11:11:59'),(28,'3Com',NULL,'','2006-09-11 11:11:59'),(29,'CTX International',NULL,'','2006-09-11 11:11:59'),(30,'Matrox',NULL,'','2006-09-11 11:11:59'),(31,'Apex Computer Technology',NULL,'','2006-09-11 11:11:59'),(32,'Jaton',NULL,'','2006-09-11 11:11:59'),(33,'Thermaltake',NULL,'','2006-09-11 11:11:59'),(34,'Creative Labs',NULL,'','2006-09-11 11:11:59'),(35,'Afreey',NULL,'','2006-09-11 11:11:59'),(36,'ASUSTeK',NULL,'','2006-09-11 11:11:59'),(37,'Logitech',NULL,'','2006-09-11 11:11:59'),(38,'ATI-Sapphire',NULL,'','2006-09-11 11:11:59'),(39,'Keytronic',NULL,'','2006-09-11 11:11:59'),(40,'Vantec Thermal Technologies',NULL,'','2006-09-11 11:11:59'),(41,'D-Link',NULL,'','2006-09-11 11:11:59'),(42,'Hansol',NULL,'','2006-09-11 11:11:59'),(43,'Cremax',NULL,'','2006-09-11 11:11:59'),(44,'Opti UPS',NULL,'','2006-09-11 11:11:59'),(45,'HighPoint',NULL,'','2006-09-11 11:11:59'),(46,'Western Digital',NULL,'','2006-09-11 11:11:59'),(47,'US Robotics',NULL,'','2006-09-11 11:11:59'),(48,'ConnectGear',NULL,'','2006-09-11 11:11:59'),(49,'Teac',NULL,'','2006-09-11 11:11:59'),(50,'Broadway Co.',NULL,'','2006-09-11 11:11:59'),(51,'Memory',NULL,'','2006-09-11 11:11:59'),(52,'Vastech',NULL,'','2006-09-11 11:11:59'),(53,'Optiquest',NULL,'','2006-09-11 11:11:59'),(54,'Sony',NULL,'','2006-09-11 11:11:59'),(55,'Vitex',NULL,'','2006-09-11 11:11:59'),(56,'Kingston',NULL,'','2006-09-11 11:11:59'),(57,'LG Electronics',NULL,'','2006-09-11 11:11:59'),(58,'Casedge Inc.',NULL,'','2006-09-11 11:11:59'),(59,'NTI Software',NULL,'','2006-09-11 11:11:59'),(60,'IBM',NULL,'','2006-09-11 11:11:59'),(61,'ATP',NULL,'','2006-09-11 11:11:59'),(62,'Toshiba',NULL,'','2006-09-11 11:11:59'),(63,'Intel Corporation',NULL,'','2006-09-11 11:11:59'),(64,'ASUS Notebooks',NULL,'','2006-09-11 11:11:59'),(65,'Apacer',NULL,'','2006-09-11 11:11:59'),(66,'Lian-Li',NULL,'','2006-09-11 11:11:59'),(67,'MSI (Micro Star)',NULL,'','2006-09-11 11:11:59'),(68,'Belkin',NULL,'','2006-09-11 11:11:59'),(69,'Shuttle',NULL,'','2006-09-11 11:11:59'),(70,'Maxtor',NULL,'','2006-09-11 11:11:59'),(71,'ATI-Hightech',NULL,'','2006-09-11 11:11:59'),(72,'SAMSUNG SEMICONDUCTORINC(SSI)',NULL,'','2006-09-11 11:11:59'),(73,'BenQ',NULL,'','2006-09-11 11:11:59'),(74,'Spec Research',NULL,'','2006-09-11 11:11:59'),(75,'Roxio',NULL,'','2006-09-11 11:11:59'),(76,'Hyundai/HYU',NULL,'','2006-09-11 11:11:59'),(77,'Can Technology',NULL,'','2006-09-11 11:11:59'),(78,'3DLabs',NULL,'','2006-09-11 11:11:59'),(79,'Iomega',NULL,'','2006-09-11 11:11:59'),(80,'Corsair Memory',NULL,'','2006-09-11 11:11:59'),(81,'NEC',NULL,'','2006-09-11 11:11:59'),(82,'OptoRite',NULL,'','2006-09-11 11:11:59'),(83,'XFX/Division of Pine',NULL,'','2006-09-11 11:11:59'),(84,'Verbatim',NULL,'','2006-09-11 11:11:59'),(85,'Seagate Technology',NULL,'','2006-09-11 11:11:59'),(86,'SOYO Mothboard',NULL,'','2006-09-11 11:11:59'),(87,'Athenatech',NULL,'','2006-09-11 11:11:59'),(88,'Juster',NULL,'','2006-09-11 11:11:59'),(89,'Opto Disc.',NULL,'','2006-09-11 11:11:59'),(90,'Gigabyte',NULL,'','2006-09-11 11:11:59'),(91,'Plextor',NULL,'','2006-09-11 11:11:59'),(92,'Liteon',NULL,'','2006-09-11 11:11:59'),(93,'Antec',NULL,'','2006-09-11 11:11:59'),(94,'Aopen',NULL,'','2006-09-11 11:11:59'),(95,'Samsung',NULL,'','2006-09-11 11:11:59'),(96,'Fudin',NULL,'','2006-09-11 11:11:59'),(97,'AOC/EPI',NULL,'','2006-09-11 11:11:59'),(98,'Certance',NULL,'','2006-09-11 11:11:59'),(99,'M-Systems',NULL,'','2006-09-11 11:11:59'),(100,'Simpletech',NULL,'','2006-09-11 11:11:59'),(101,'Albatron',NULL,'','2006-09-11 11:11:59'),(102,'Qtronix',NULL,'','2006-09-11 11:11:59'),(103,'Buslink',NULL,'','2006-09-11 11:11:59'),(104,'Cast Technology',NULL,'','2006-09-11 11:11:59'),(105,'Lexar Media',NULL,'','2006-09-11 11:11:59'),(106,'Crucial',NULL,'','2006-09-11 11:11:59'),(107,'PQI',NULL,'','2006-09-11 11:11:59'),(108,'Power Color Computers',NULL,'','2006-09-11 11:11:59'),(109,'I Copy 2',NULL,'','2006-09-11 11:11:59'),(110,'SanDisk',NULL,'','2006-09-11 11:11:59'),(111,'ABIT',NULL,'','2006-09-11 11:11:59'),(112,'Altec Lansing',NULL,'','2006-09-11 11:11:59'),(113,'HP Hewllett Packard',NULL,'','2006-09-11 11:11:59'),(114,'Elitegroup Computer Systems',NULL,'','2006-09-11 11:11:59'),(115,'PNY Technology',NULL,'','2006-09-11 11:11:59'),(116,'NU Technology',NULL,'','2006-09-11 11:11:59'),(117,'Quantum',NULL,'','2006-09-11 11:11:59'),(118,'Uniwill',NULL,'','2006-09-11 11:11:59'),(119,'AGneovo',NULL,'','2006-09-11 11:11:59'),(120,'Jetway',NULL,'','2006-09-11 11:11:59'),(121,'AMD',NULL,'','2006-09-11 11:11:59'),(122,'Patriot - PDP',NULL,'','2006-09-11 11:11:59'),(123,'Chenbro',NULL,'','2006-09-11 11:11:59'),(124,'A-DATA Technology',NULL,'','2006-09-11 11:11:59'),(125,'Advueu',NULL,'','2006-09-11 11:11:59'),(126,'Infineon Memory',NULL,'','2006-09-11 11:11:59'),(127,'Viking',NULL,'','2006-09-11 11:11:59'),(128,'LSI Logic',NULL,'','2006-09-11 11:11:59'),(129,'Kworld',NULL,'','2006-09-11 11:11:59'),(130,'Computer Associates',NULL,'','2006-09-11 11:11:59'),(131,'Twin Micro',NULL,'','2006-09-11 11:11:59'),(132,'Silverstone MCE Cases',NULL,'','2006-09-11 11:11:59'),(133,'American Industrial System Inc',NULL,'','2006-09-11 11:11:59'),(134,'Ahanix',NULL,'','2006-09-11 11:11:59'),(135,'XGI TECHNOLOGY',NULL,'','2006-09-11 11:11:59'),(136,'MGE/XG',NULL,'','2006-09-11 11:11:59'),(137,'Zalman',NULL,'','2006-09-11 11:11:59'),(138,'Prolink',NULL,'','2006-09-11 11:11:59'),(139,'Y.C. Cable',NULL,'','2006-09-11 11:11:59'),(140,'Aeneon',NULL,'','2006-09-11 11:11:59'),(141,'NERO',NULL,'','2006-09-11 11:11:59'),(142,'OCZ TECHNOLOGY',NULL,'','2006-09-11 11:11:59'),(143,'Clevo',NULL,'','2006-09-11 11:11:59'),(144,'SMART DISK CORP.',NULL,'','2006-09-11 11:11:59'),(145,'PC Chips',NULL,'','2006-09-11 11:11:59'),(146,'MEMOREX',NULL,'','2006-09-11 11:11:59'),(147,'ATRIX',NULL,'','2006-09-11 11:11:59'),(148,'Fujitsu',NULL,'','2006-09-11 11:11:59'),(149,'CMC Magnetics',NULL,'','2006-09-11 11:11:59'),(150,'WYSE TECHNOLOGY',NULL,'','2006-09-11 11:11:59'),(151,'Infrant Technoogies Inc.',NULL,'','2006-09-11 11:11:59'),(152,'ExcelStor Technology',NULL,'','2006-09-11 11:11:59'),(153,'Thecus Technology Corp.',NULL,'','2006-09-11 11:11:59'),(154,'Plantronics',NULL,'','2006-09-11 11:11:59'),(155,'Focus',NULL,'','2006-09-11 11:11:59'),(156,'Wasp Barcode',NULL,'','2006-09-11 11:11:59'),(157,'Powerware',NULL,'','2006-09-11 11:11:59'),(158,'NZXT',NULL,'','2006-09-11 11:11:59'),(159,'FortiGate',NULL,'','2006-09-11 11:11:59'),(160,'Pioneer',NULL,'','2006-09-11 11:11:59'),(161,'Ezonics',NULL,'','2006-09-11 11:11:59'),(162,'Veritas',NULL,'','2006-09-11 11:11:59'),(163,'Targus',NULL,'','2006-09-11 11:11:59'),(164,'AGneovo Consignment',NULL,'','2006-09-11 11:11:59'),(165,'Encore',NULL,'','2006-09-11 11:11:59'),(166,'ACE',NULL,'','2006-09-11 11:11:59'),(167,'Hitachi Global Storage',NULL,'','2006-09-11 11:11:59'),(168,'Midentiti',NULL,'','2006-09-11 11:11:59'),(169,'Belview Technologies',NULL,'','2006-09-11 11:11:59'),(170,'EnGenius',NULL,'','2006-09-11 11:11:59'),(171,'I-ROCKS',NULL,'','2006-09-11 11:11:59'),(172,'Proview',NULL,'','2006-09-11 11:11:59'),(173,'ERGOTRON',NULL,'','2006-09-11 11:11:59'),(174,'IO Gear',NULL,'','2006-09-11 11:11:59'),(175,'Garmin',NULL,'','2006-09-11 11:11:59'),(176,'Aten',NULL,'','2006-09-11 11:11:59'),(177,'TRENDnet',NULL,'','2006-09-11 11:11:59'),(178,'DIGN Lab',NULL,'','2006-09-11 11:11:59'),(179,'SVA group',NULL,'','2006-09-11 11:11:59'),(180,'Tripp-Lite',NULL,'','2006-09-11 11:11:59'),(181,'Tekram',NULL,'','2006-09-11 11:11:59'),(182,'Planar SystemsInc.',NULL,'','2006-09-11 11:11:59'),(183,'3Ware',NULL,'','2006-09-11 11:11:59'),(184,'Areca Technology Corporation',NULL,'','2006-09-11 11:11:59'),(185,'SABIO DIGITAL',NULL,'','2006-09-11 11:11:59'),(186,'KDS',NULL,'','2006-09-11 11:11:59'),(187,'AUraone Systems',NULL,'','2006-09-11 11:11:59'),(188,'ProMedia',NULL,'','2006-09-11 11:11:59'),(189,'Castlewood Systems',NULL,'','2006-09-11 11:11:59'),(190,'Buffalo Technology',NULL,'','2006-09-11 11:11:59'),(191,'DPT',NULL,'','2006-09-11 11:11:59'),(192,'Cofan USA',NULL,'','2006-09-11 11:11:59'),(193,'Edimax',NULL,'','2006-09-11 11:11:59'),(194,'American Media Systems',NULL,'','2006-09-11 11:11:59'),(195,'Arctek',NULL,'','2006-09-11 11:11:59'),(196,'Relisys/AIM',NULL,'','2006-09-11 11:11:59'),(197,'Cardkeeper TMC',NULL,'','2006-09-11 11:11:59'),(198,'Daytona',NULL,'','2006-09-11 11:11:59'),(199,'VENDOR',NULL,'','2006-09-11 11:11:59'),(200,'Koutech (K-Well)',NULL,'','2006-09-11 11:11:59'),(201,'Spectek',NULL,'','2006-09-11 11:11:59'),(202,'Nvidia',NULL,'','2006-09-11 11:11:59'),(203,'Coolsat',NULL,'','2006-09-11 11:11:59'),(204,'KFC/Smile',NULL,'','2006-09-11 11:11:59'),(205,'Elan Vital',NULL,'','2006-09-11 11:11:59'),(206,'ZONET Networking',NULL,'','2006-09-11 11:11:59'),(207,'Lexmark',NULL,'','2006-09-11 11:11:59'),(208,'BFG Technologies',NULL,'','2006-09-11 11:11:59'),(209,'Enhance Technology',NULL,'','2006-09-11 11:11:59'),(210,'Aavid',NULL,'','2006-09-11 11:11:59'),(211,'Koutech',NULL,'','2006-09-11 11:11:59'),(212,'Linkworld',NULL,'','2006-09-11 11:11:59'),(213,'ALASKA',NULL,'','2006-09-11 11:11:59'),(214,'Biostar',NULL,'','2006-09-11 11:11:59'),(215,'Hummingbird',NULL,'','2006-09-11 11:11:59'),(216,'Apple Computer',NULL,'','2006-09-11 11:11:59'),(217,'Microsoft OEM',NULL,'','2006-09-11 11:11:59'),(218,'OLEVIA',NULL,'','2006-09-11 11:11:59'),(219,'SIIG',NULL,'','2006-09-11 11:11:59'),(220,'Sigmacom Inc.',NULL,'','2006-09-11 11:11:59');
/*!40000 ALTER TABLE `manufacture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE `module` (
  `module_id` int(20) NOT NULL auto_increment,
  `module_name` char(100) NOT NULL default '',
  `module_translate_name` char(100) NOT NULL default '',
  `module_admin_menu` int(4) NOT NULL default '0',
  `module_user_menu` int(4) NOT NULL default '0',
  `module_public_menu` int(4) NOT NULL default '0',
  `module_order` int(11) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` VALUES (1,'module','Modules',1,0,0,14,'2007-03-24 01:18:22'),(2,'user','Contacts',1,0,0,1,'2007-03-24 01:16:51'),(67,'manufacture','Product Manufactures',0,0,0,0,'2007-03-24 01:24:01'),(8,'suspension','Suspension',0,0,0,0,'2007-03-24 01:41:40'),(12,'user_type','User Type',0,0,0,0,'2006-06-30 09:43:49'),(14,'company','Accounts',1,0,0,2,'2007-03-24 01:19:24'),(15,'company_address','Company Address',0,0,0,0,'2006-07-08 10:34:10'),(16,'company_contact','Company Contact',0,0,0,0,'2006-07-08 10:41:54'),(17,'user_to_company','User To Company',0,0,0,0,'2006-07-08 10:45:30'),(18,'workorder','Work Order',1,0,0,3,'2007-03-24 01:19:42'),(19,'workorder_comment','Work Order Comment',0,0,0,0,'2006-07-08 11:15:06'),(20,'workorder_note','Work Order Note',0,0,0,0,'2006-07-08 11:22:39'),(21,'user_to_workorder','User To Work Order',0,0,0,0,'2006-07-08 11:32:15'),(22,'company_to_workorder','Company To Work Order',0,0,0,0,'2006-07-08 11:39:19'),(23,'country','Country',0,0,0,0,'2006-07-08 11:44:01'),(24,'state','State',0,0,0,0,'2006-07-08 11:51:42'),(25,'billing_rates','Billing Rates',0,0,0,0,'2006-07-10 01:21:15'),(26,'workorder_status','Workorder Status',0,0,0,0,'2006-07-10 01:36:29'),(27,'workorder_history','Work Order History',0,0,0,0,'2006-07-11 01:05:11'),(28,'system','System',1,0,0,6,'2006-10-08 15:50:53'),(29,'system_manufacture','System Manufacture',0,0,0,0,'2007-03-24 01:22:56'),(30,'system_model','System Module',0,0,0,0,'2006-07-14 10:47:54'),(31,'operating_system_manufacture','Operating System Manufacture',0,0,0,0,'2006-07-16 11:38:16'),(32,'operating_system','Operating System',0,0,0,0,'2006-07-16 11:40:21'),(37,'vendor_contact','Vendor Contact',0,0,0,0,'2006-07-18 07:59:41'),(36,'vendor_address','Vendor Address',0,0,0,0,'2006-07-18 07:56:10'),(35,'vendor','Vendor',1,0,0,12,'2006-10-08 15:51:08'),(38,'bill','Bills',1,0,0,13,'2006-10-08 15:51:18'),(39,'system_to_workorder','System To Workorder',0,0,0,0,'2006-07-21 00:21:19'),(40,'wap','Wap',0,0,0,0,'2006-07-24 23:52:31'),(41,'core','Core',0,0,0,0,'2006-07-24 23:52:31'),(42,'mail','Mail',0,0,0,0,'2006-07-24 23:52:31'),(43,'contact','Contact',0,0,0,0,'2006-07-24 23:52:31'),(44,'error','Error',0,0,0,0,'2006-07-24 23:52:32'),(45,'workorder_to_system','Workorder To System',0,0,0,0,'2006-07-24 23:52:32'),(46,'setup','Setup',0,0,0,0,'2006-07-24 23:52:32'),(47,'activation_code','Activation Code',0,0,0,0,'2006-07-24 23:52:32'),(48,'page_setup','Page Setup',0,0,0,0,'2006-07-24 23:52:32'),(49,'user_to_system','User To System',0,0,0,0,'2006-07-24 23:52:32'),(50,'address','Address',0,0,0,0,'2006-07-24 23:52:32'),(51,'module_method','Module Method',0,0,0,0,'2006-07-24 23:52:32'),(52,'barcode','Barcode',0,0,0,0,'2006-07-24 23:52:32'),(53,'sessions','Sessions',0,0,0,0,'2006-07-24 23:52:32'),(54,'install','Install',0,0,0,0,'2006-07-24 23:52:32'),(55,'company_to_system','Company To System',0,0,0,0,'2006-07-24 23:52:32'),(69,'workorder_time','Workorder Time',0,0,0,0,'2006-09-13 05:29:23'),(64,'product','Products',1,0,0,8,'2006-10-08 15:50:53'),(65,'category','Product Categories',0,1,0,0,'2007-03-24 01:23:35'),(66,'product_to_category','Product To Category',0,0,0,0,'2006-09-11 09:48:19'),(68,'product_description','Product Description',0,0,0,0,'2006-09-11 10:04:01'),(70,'invoice','Invoice',1,0,0,11,'2006-10-08 15:50:53'),(71,'invoice_labor','Invoice Labor',0,0,0,0,'2006-09-30 11:55:02'),(72,'invoice_part','Invoice Part',0,0,0,0,'2006-09-30 11:58:19'),(73,'product_status','Product Status',0,0,0,0,'2006-10-08 12:16:14'),(75,'tax_class','Tax Class',0,0,0,0,'2006-10-08 16:16:49'),(76,'tax_rate','Tax Rates',0,0,0,0,'2006-10-08 16:20:21'),(77,'tax_type','Tax Type',0,0,0,0,'2006-10-08 16:26:41'),(78,'file','Files',1,0,0,15,'2007-03-24 01:18:42'),(79,'payment_option','Payment Options',0,0,0,0,'2006-10-12 10:29:27'),(80,'credit_card','Credit Cards',0,0,0,0,'2006-12-21 17:31:24'),(81,'cc_payment','Credit Card Payment',0,0,0,0,'2006-12-22 13:31:04'),(82,'check_payment','Check Payment',0,0,0,0,'2006-12-25 04:48:35'),(83,'leads','Leads',1,0,0,0,'2007-03-24 01:45:41'),(84,'lead_type','Lead Types',0,0,0,0,'2007-03-25 16:07:36'),(85,'lead_status','Lead Status',0,0,0,0,'2007-03-25 16:31:12'),(86,'campaign','Campaign',0,0,0,0,'2007-03-26 20:59:19'),(87,'campaign_type','Campaign Type',0,0,0,0,'2007-03-26 21:05:34'),(88,'lead_call','Lead Call',0,0,0,0,'2007-03-27 18:18:58'),(89,'lead_meeting','Lead Meeting',0,0,0,0,'2007-03-28 01:00:14'),(90,'lead_email','Lead Email',0,0,0,0,'2007-03-28 11:01:56'),(91,'contract_type','Contract Type',0,0,0,0,'2007-03-28 19:54:11'),(92,'calendar','Calendar',0,0,0,0,'2007-03-30 16:57:13'),(93,'note','Notes',0,0,0,0,'2007-04-02 11:57:36'),(94,'file','Files',0,0,0,0,'2007-04-02 15:12:22'),(95,'crm_group','Group',0,0,0,0,'2007-04-09 13:03:01');
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module_method`
--

DROP TABLE IF EXISTS `module_method`;
CREATE TABLE `module_method` (
  `module_method_id` int(20) NOT NULL auto_increment,
  `module_id` int(20) default NULL,
  `module_method_name` char(100) NOT NULL default '',
  `module_method_translate` char(100) NOT NULL default '',
  `module_method_admin_menu` int(4) default NULL,
  `module_method_user_menu` int(4) default NULL,
  `module_method_public_menu` int(4) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`module_method_id`),
  KEY `module_id` (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=416 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_method`
--

LOCK TABLES `module_method` WRITE;
/*!40000 ALTER TABLE `module_method` DISABLE KEYS */;
INSERT INTO `module_method` VALUES (1,1,'module:adminNewModule','Add',1,0,0,'2006-06-27 10:44:07'),(2,1,'module:search_module','Search',1,0,0,'2006-06-29 11:10:25'),(3,1,'module:view_module','View',0,0,0,'2006-06-29 11:10:10'),(4,1,'module:update_module','Update',0,0,0,'2006-06-29 11:10:10'),(5,1,'module:delete_module','Delete',0,0,0,'2006-06-29 11:10:10'),(277,67,'manufacture:delete_manufacture','delete',0,0,0,'2006-09-11 10:00:17'),(276,67,'manufacture:update_manufacture','update',0,0,0,'2006-09-11 10:00:17'),(275,67,'manufacture:view_manufacture','view',0,0,0,'2006-09-11 10:00:17'),(274,67,'manufacture:search_manufacture','search',1,0,0,'2006-09-11 10:00:17'),(273,67,'manufacture:add_manufacture','add',1,0,0,'2006-09-11 10:00:17'),(11,2,'user:admin_view_all_users','Search',1,0,0,'2006-07-29 13:26:06'),(12,2,'user:add_user','Add',1,0,0,'2006-10-04 08:33:36'),(18,8,'suspension:add_suspension','Add',1,0,0,'2006-06-28 09:35:35'),(19,8,'suspension:search_suspension','Search',1,0,0,'2006-06-28 09:35:35'),(20,8,'suspension:view_suspension','View',0,0,0,'2006-06-28 09:35:35'),(21,8,'suspension:update_suspension','Edit',0,0,0,'2006-06-28 09:35:35'),(22,8,'suspension:delete_suspension','Delete',0,0,0,'2006-06-28 09:35:35'),(38,12,'user_type:add_user_type','Add',0,0,0,'2006-06-30 09:47:27'),(39,12,'user_type:search_user_type','Search',0,0,0,'2006-06-30 09:47:27'),(40,12,'user_type:view_user_type','View',0,0,0,'2006-06-30 09:47:27'),(41,12,'user_type:update_user_type','Edit',0,0,0,'2006-06-30 09:47:27'),(42,12,'user_type:delete_user_type','Delete',0,0,0,'2006-06-30 09:47:27'),(43,14,'company:add_company','Add',1,0,0,'2006-07-08 10:26:49'),(44,14,'company:search_company','Search',1,0,0,'2006-07-08 10:26:49'),(45,14,'company:view_company','View',0,0,0,'2006-07-08 10:26:49'),(46,14,'company:update_company','Edit',0,0,0,'2006-07-08 10:26:49'),(47,14,'company:delete_company','Delete',0,0,0,'2006-07-08 10:26:49'),(48,15,'company_address:add_company_address','Add',0,0,0,'2006-07-08 10:34:10'),(49,15,'company_address:search_company_address','Search',0,0,0,'2006-07-08 10:34:10'),(50,15,'company_address:view_company_address','View',0,0,0,'2006-07-08 10:34:10'),(51,15,'company_address:update_company_address','Edit',0,0,0,'2006-07-08 10:34:10'),(52,15,'company_address:delete_company_address','Delete',0,0,0,'2006-07-08 10:34:10'),(53,16,'company_contact:add_company_contact','Add',0,0,0,'2006-07-08 10:41:54'),(54,16,'company_contact:search_company_contact','Search',0,0,0,'2006-07-08 10:41:54'),(55,16,'company_contact:view_company_contact','View',0,0,0,'2006-07-08 10:41:54'),(56,16,'company_contact:update_company_contact','Edit',0,0,0,'2006-07-08 10:41:54'),(57,16,'company_contact:delete_company_contact','Delete',0,0,0,'2006-07-08 10:41:54'),(58,17,'user_to_company:add_user_to_company','Add',0,0,0,'2006-07-08 10:45:30'),(59,17,'user_to_company:search_user_to_company','Search',0,0,0,'2006-07-08 10:45:30'),(60,17,'user_to_company:view_user_to_company','View',0,0,0,'2006-07-08 10:45:30'),(61,17,'user_to_company:update_user_to_company','Edit',0,0,0,'2006-07-08 10:45:30'),(62,17,'user_to_company:delete_user_to_company','Delete',0,0,0,'2006-07-08 10:45:30'),(63,18,'workorder:add_workorder','Add',0,0,0,'2006-07-10 11:56:08'),(64,18,'workorder:search_workorder','Search',1,0,0,'2006-07-08 11:04:04'),(65,18,'workorder:view_workorder','View',0,0,0,'2006-07-08 11:04:04'),(66,18,'workorder:update_workorder','Edit',0,0,0,'2006-07-08 11:04:04'),(67,18,'workorder:delete_workorder','Delete',0,0,0,'2006-07-08 11:04:04'),(68,19,'workorder_comment:add_workorder_comment','Add',1,0,0,'2006-07-08 11:15:06'),(69,19,'workorder_comment:search_workorder_comment','Search',1,0,0,'2006-07-08 11:15:06'),(70,19,'workorder_comment:view_workorder_comment','View',0,0,0,'2006-07-08 11:15:06'),(71,19,'workorder_comment:update_workorder_comment','Edit',0,0,0,'2006-07-08 11:15:06'),(72,19,'workorder_comment:delete_workorder_comment','Delete',0,0,0,'2006-07-08 11:15:06'),(73,20,'workorder_note:add_workorder_note','Add',1,0,0,'2006-07-08 11:22:39'),(74,20,'workorder_note:search_workorder_note','Search',1,0,0,'2006-07-08 11:22:39'),(75,20,'workorder_note:view_workorder_note','View',0,0,0,'2006-07-08 11:22:39'),(76,20,'workorder_note:update_workorder_note','Edit',0,0,0,'2006-07-08 11:22:39'),(77,20,'workorder_note:delete_workorder_note','Delete',0,0,0,'2006-07-08 11:22:39'),(78,21,'user_to_workorder:add_user_to_workorder','Add',0,0,0,'2006-07-08 11:32:15'),(79,21,'user_to_workorder:search_user_to_workorder','Search',0,0,0,'2006-07-08 11:32:15'),(80,21,'user_to_workorder:view_user_to_workorder','View',0,0,0,'2006-07-08 11:32:15'),(81,21,'user_to_workorder:update_user_to_workorder','Edit',0,0,0,'2006-07-08 11:32:15'),(82,21,'user_to_workorder:delete_user_to_workorder','Delete',0,0,0,'2006-07-08 11:32:15'),(83,22,'company_to_workorder:add_company_to_workorder','Add',0,0,0,'2006-07-08 11:39:19'),(84,22,'company_to_workorder:search_company_to_workorder','Search',0,0,0,'2006-07-08 11:39:19'),(85,22,'company_to_workorder:view_company_to_workorder','View',0,0,0,'2006-07-08 11:39:19'),(86,22,'company_to_workorder:update_company_to_workorder','Edit',0,0,0,'2006-07-08 11:39:19'),(87,22,'company_to_workorder:delete_company_to_workorder','Delete',0,0,0,'2006-07-08 11:39:19'),(88,23,'country:add_country','Add',0,0,0,'2006-07-08 11:44:01'),(89,23,'country:search_country','Search',0,0,0,'2006-07-08 11:44:01'),(90,23,'country:view_country','View',0,0,0,'2006-07-08 11:44:01'),(91,23,'country:update_country','Edit',0,0,0,'2006-07-08 11:44:01'),(92,23,'country:delete_country','Delete',0,0,0,'2006-07-08 11:44:01'),(93,24,'state:add_state','Add',0,0,0,'2006-07-08 11:51:42'),(94,24,'state:search_state','Search',0,0,0,'2006-07-08 11:51:42'),(95,24,'state:view_state','View',0,0,0,'2006-07-08 11:51:42'),(96,24,'state:update_state','Edit',0,0,0,'2006-07-08 11:51:42'),(97,24,'state:delete_state','Delete',0,0,0,'2006-07-08 11:51:42'),(98,25,'billing_rates:add_billing_rates','Add',0,0,0,'2006-07-10 01:21:15'),(99,25,'billing_rates:search_billing_rates','Search',0,0,0,'2006-07-10 01:21:15'),(100,25,'billing_rates:view_billing_rates','View',0,0,0,'2006-07-10 01:21:15'),(101,25,'billing_rates:update_billing_rates','Edit',0,0,0,'2006-07-10 01:21:15'),(102,25,'billing_rates:delete_billing_rates','Delete',0,0,0,'2006-07-10 01:21:15'),(103,26,'workorder_status:add_workorder_status','Add',0,0,0,'2006-07-10 01:36:29'),(104,26,'workorder_status:search_workorder_status','Search',0,0,0,'2006-07-10 01:36:29'),(105,26,'workorder_status:view_workorder_status','View',0,0,0,'2006-07-10 01:36:29'),(106,26,'workorder_status:update_workorder_status','Edit',0,0,0,'2006-07-10 01:36:29'),(107,26,'workorder_status:delete_workorder_status','Delete',0,0,0,'2006-07-10 01:36:29'),(108,27,'workorder_history:add_workorder_history','Add',0,0,0,'2006-07-11 01:05:11'),(109,27,'workorder_history:search_workorder_history','Search',0,0,0,'2006-07-11 01:05:11'),(110,27,'workorder_history:view_workorder_history','View',0,0,0,'2006-07-11 01:05:11'),(111,27,'workorder_history:update_workorder_history','Edit',0,0,0,'2006-07-11 01:05:11'),(112,27,'workorder_history:delete_workorder_history','Delete',0,0,0,'2006-07-11 01:05:11'),(113,28,'system:add_system','Add',0,0,0,'2006-07-14 10:39:57'),(114,28,'system:search_system','Search',1,0,0,'2006-10-07 12:27:39'),(115,28,'system:view_system','View',0,0,0,'2006-07-14 10:39:57'),(116,28,'system:update_system','Edit',0,0,0,'2006-07-14 10:39:57'),(117,28,'system:delete_system','Delete',0,0,0,'2006-07-14 10:39:57'),(118,29,'system_manufacture:add_system_manufacture','Add',1,0,0,'2006-10-08 15:30:57'),(119,29,'system_manufacture:search_system_manufacture','Search',1,0,0,'2006-10-08 15:29:30'),(120,29,'system_manufacture:view_system_manufacture','View',0,0,0,'2006-07-14 10:45:36'),(121,29,'system_manufacture:update_system_manufacture','Edit',0,0,0,'2006-07-14 10:45:36'),(122,29,'system_manufacture:delete_system_manufacture','Delete',0,0,0,'2006-07-14 10:45:36'),(123,30,'system_model:add_system_model','Add',0,0,0,'2006-07-14 10:47:54'),(124,30,'system_model:search_system_model','Search',0,0,0,'2006-07-14 10:47:54'),(125,30,'system_model:view_system_model','View',0,0,0,'2006-07-14 10:47:54'),(126,30,'system_model:update_system_model','Edit',0,0,0,'2006-07-14 10:47:54'),(127,30,'system_model:delete_system_model','Delete',0,0,0,'2006-07-14 10:47:54'),(128,31,'operating_system_manufacture:add_operating_system_manufacture','Add',0,0,0,'2006-07-16 11:38:16'),(129,31,'operating_system_manufacture:search_operating_system_manufacture','Search',0,0,0,'2006-07-16 11:38:16'),(130,31,'operating_system_manufacture:view_operating_system_manufacture','View',0,0,0,'2006-07-16 11:38:16'),(131,31,'operating_system_manufacture:update_operating_system_manufacture','Edit',0,0,0,'2006-07-16 11:38:16'),(132,31,'operating_system_manufacture:delete_operating_system_manufacture','Delete',0,0,0,'2006-07-16 11:38:16'),(133,32,'operating_system:add_operating_system','Add',0,0,0,'2006-07-16 11:40:21'),(134,32,'operating_system:search_operating_system','Search',0,0,0,'2006-07-16 11:40:21'),(135,32,'operating_system:view_operating_system','View',0,0,0,'2006-07-16 11:40:21'),(136,32,'operating_system:update_operating_system','Edit',0,0,0,'2006-07-16 11:40:21'),(137,32,'operating_system:delete_operating_system','Delete',0,0,0,'2006-07-16 11:40:21'),(138,33,'vendor:add_vendor','Add',1,0,0,'2006-07-18 07:30:38'),(139,34,'vendor:add_vendor','Add',1,0,0,'2006-07-18 07:36:09'),(140,35,'vendor:add_vendor','Add',1,0,0,'2006-07-18 07:39:27'),(141,35,'vendor:search_vendor','Search',1,0,0,'2006-07-18 07:39:27'),(142,35,'vendor:view_vendor','View',0,0,0,'2006-07-18 07:39:27'),(143,35,'vendor:update_vendor','Edit',0,0,0,'2006-07-18 07:39:27'),(144,35,'vendor:delete_vendor','Delete',0,0,0,'2006-07-18 07:39:27'),(145,36,'vendor_address:add_vendor_address','Add',1,0,0,'2006-07-18 07:56:10'),(146,36,'vendor_address:search_vendor_address','Search',1,0,0,'2006-07-18 07:56:10'),(147,36,'vendor_address:view_vendor_address','View',0,0,0,'2006-07-18 07:56:10'),(148,36,'vendor_address:update_vendor_address','Edit',0,0,0,'2006-07-18 07:56:10'),(149,36,'vendor_address:delete_vendor_address','Delete',0,0,0,'2006-07-18 07:56:10'),(150,37,'vendor_contact:add_vendor_contact','Add',0,0,0,'2006-07-18 07:59:41'),(151,37,'vendor_contact:search_vendor_contact','Search',0,0,0,'2006-07-18 07:59:41'),(152,37,'vendor_contact:view_vendor_contact','View',0,0,0,'2006-07-18 07:59:41'),(153,37,'vendor_contact:update_vendor_contact','Edit',0,0,0,'2006-07-18 07:59:41'),(154,37,'vendor_contact:delete_vendor_contact','Delete',0,0,0,'2006-07-18 07:59:41'),(155,38,'bill:add_bill','Add',1,0,0,'2006-07-18 08:05:07'),(156,38,'bill:search_bill','Search',1,0,0,'2006-07-18 08:05:07'),(157,38,'bill:view_bill','View',0,0,0,'2006-07-18 08:05:07'),(158,38,'bill:update_bill','Edit',0,0,0,'2006-07-18 08:05:07'),(159,38,'bill:delete_bill','Delete',0,0,0,'2006-07-18 08:05:07'),(160,18,'workorder:view_active','Active',1,0,0,'2006-07-19 11:25:53'),(161,39,'system_to_workorder:add_system_to_workorder','Add',0,0,0,'2006-07-21 00:21:19'),(162,39,'system_to_workorder:search_system_to_workorder','Search',0,0,0,'2006-07-21 00:21:19'),(163,39,'system_to_workorder:view_system_to_workorder','View',0,0,0,'2006-07-21 00:21:19'),(164,39,'system_to_workorder:update_system_to_workorder','Update',0,0,0,'2006-07-21 00:21:19'),(165,39,'system_to_workorder:delete_system_to_workorder','Delete',0,0,0,'2006-07-21 00:21:19'),(166,40,'wap:home','Home',0,0,0,'2006-07-25 00:02:35'),(167,41,'core:load_admin_sub_menu','Load Admin Sub Menu',0,0,0,'2006-07-25 00:02:35'),(168,41,'core:blank','Blank',0,0,0,'2006-07-25 00:02:35'),(169,41,'core:main','Main',0,0,0,'2006-07-25 00:02:35'),(170,41,'core:why','Why',0,0,0,'2006-07-25 00:02:35'),(171,2,'user:activateUser','Activateuser',0,0,0,'2006-07-25 00:02:35'),(172,2,'user:editContact','Editcontact',0,0,0,'2006-07-25 00:02:35'),(173,2,'user:newContact','Newcontact',0,0,0,'2006-07-25 00:02:35'),(174,2,'user:userLogin','Userlogin',0,0,0,'2006-07-25 00:02:35'),(175,2,'user:adminDeleteAddress','Admindeleteaddress',0,0,0,'2006-07-25 00:02:35'),(176,2,'user:suspendUser','Suspenduser',0,0,0,'2006-07-25 00:02:35'),(177,2,'user:deleteAddress','Deleteaddress',0,0,0,'2006-07-25 00:02:35'),(178,2,'user:admin_activate_user','Adminactivateuser',0,0,0,'2006-10-04 08:43:22'),(179,2,'user:adminNewUserAddress','Adminnewuseraddress',0,0,0,'2006-07-25 00:02:35'),(180,2,'user:unsuspendUser','Unsuspenduser',0,0,0,'2006-07-25 00:02:35'),(181,2,'user:adminSuspendUser','Adminsuspenduser',0,0,0,'2006-07-25 00:02:35'),(182,2,'user:adminDeleteContact','Admindeletecontact',0,0,0,'2006-07-25 00:02:35'),(183,2,'user:deleteContact','Deletecontact',0,0,0,'2006-07-25 00:02:35'),(184,2,'user:adminViewUserDetail','Adminviewuserdetail',0,0,0,'2006-07-25 00:02:35'),(185,2,'user:adminNewContact','Adminnewcontact',0,0,0,'2006-07-25 00:02:35'),(186,2,'user:editAddress','Editaddress',0,0,0,'2006-07-25 00:02:35'),(187,2,'user:newAddress','Newaddress',0,0,0,'2006-07-25 00:02:35'),(188,2,'user:userView','Userview',0,0,0,'2006-07-25 00:02:35'),(189,2,'user:adminEditAddress','Admineditaddress',0,0,0,'2006-07-25 00:02:35'),(190,2,'user:deleteUser','Deleteuser',0,0,0,'2006-07-25 00:02:35'),(191,2,'user:adminNewActivationCode','Adminnewactivationcode',0,0,0,'2006-07-25 00:02:35'),(192,14,'company:ajax_load_users','Ajax Load Users',0,0,0,'2006-07-25 00:02:35'),(193,14,'company:view_company_users','View Company Users',0,0,0,'2006-07-25 00:02:35'),(194,14,'company:ajax_fetch_company_users','Ajax Fetch Company Users',0,0,0,'2006-07-25 00:02:35'),(195,14,'company:view_company_active_workorders','View Company Active Workorders',0,0,0,'2006-07-25 00:02:35'),(196,32,'operating_system:ajax_fetch_operating_system','Ajax Fetch Operating System',0,0,0,'2006-07-25 00:02:35'),(197,44,'error:403','403',0,0,0,'2006-07-25 00:02:35'),(198,44,'error:404','404',0,0,0,'2006-07-25 00:02:35'),(199,24,'state:ajax_fetch_state','Ajax Fetch State',0,0,0,'2006-07-25 00:02:35'),(200,47,'activation_code:activation_code.sql','Activation Code.sql',0,0,0,'2006-07-25 00:02:35'),(201,18,'workorder:ajax_view_workorder_notes','Ajax View Workorder Notes',0,0,0,'2006-07-25 00:02:35'),(202,18,'workorder:view_workorder_history','View Workorder History',0,0,0,'2006-07-25 00:02:35'),(203,18,'workorder:print_workorder','Print Workorder',0,0,0,'2006-07-25 00:02:35'),(204,18,'workorder:ajax_load_by_company','Ajax Load By Company',0,0,0,'2006-07-25 00:02:35'),(205,30,'system_model:ajax_fetch_model','Ajax Fetch Model',0,0,0,'2006-07-25 00:02:35'),(206,1,'module:xml_schema','Xml Schema',0,0,0,'2006-07-25 00:02:35'),(207,51,'module_method:view_module_method','View Module Method',0,0,0,'2006-07-25 00:02:35'),(208,51,'module_method:update_module_method','Update Module Method',0,0,0,'2006-07-25 00:02:35'),(209,51,'module_method:delete_module_method','Delete Module Method',0,0,0,'2006-07-25 00:02:35'),(210,51,'module_method:search_module_method','Search Module Method',0,0,0,'2006-07-25 00:02:35'),(211,51,'module_method:add_module_method','Add Module Method',0,0,0,'2006-07-25 00:02:35'),(212,28,'system:ajax_load_by_company','Ajax Load By Company',0,0,0,'2006-07-25 00:02:35'),(213,35,'vendor:add_vendor','Add Vendor',0,0,0,'2006-07-25 00:02:35'),(214,52,'barcode:fetch_barcode','Fetch Barcode',0,0,0,'2006-07-25 00:02:35'),(215,54,'install:build_package','Build Package',0,0,0,'2006-07-25 00:02:35'),(287,69,'workorder_time:delete_workorder_time','delete',0,0,0,'2006-09-13 05:29:23'),(286,69,'workorder_time:update_workorder_time','update',0,0,0,'2006-09-13 05:29:23'),(285,69,'workorder_time:view_workorder_time','view',0,0,0,'2006-09-13 05:29:23'),(284,69,'workorder_time:search_workorder_time','search',0,0,0,'2006-09-13 05:29:23'),(283,69,'workorder_time:add_workorder_time','add',0,0,0,'2006-09-13 05:29:23'),(262,64,'product:delete_product','delete',0,0,0,'2006-09-11 09:41:06'),(261,64,'product:update_product','update',0,0,0,'2006-09-11 09:41:06'),(260,64,'product:view_product','view',0,0,0,'2007-03-24 01:30:47'),(259,64,'product:search_product','search',1,0,0,'2006-09-11 09:41:06'),(258,64,'product:add_product','add',1,0,0,'2006-09-11 09:41:06'),(267,65,'category:delete_category','delete',0,0,0,'2006-09-11 09:46:00'),(266,65,'category:update_category','update',0,0,0,'2006-09-11 09:46:00'),(265,65,'category:view_category','view',0,0,0,'2006-09-11 09:46:00'),(264,65,'category:search_category','search',1,1,1,'2006-09-11 09:46:00'),(263,65,'category:add_category','add',1,0,0,'2006-09-11 09:46:00'),(272,66,'product_to_category:delete_product_to_category','delete',0,0,0,'2006-09-11 09:48:19'),(271,66,'product_to_category:update_product_to_category','update',0,0,0,'2006-09-11 09:48:19'),(270,66,'product_to_category:view_product_to_category','view',0,0,0,'2006-09-11 09:48:19'),(269,66,'product_to_category:search_product_to_category','search',0,0,0,'2006-09-11 09:48:19'),(268,66,'product_to_category:add_product_to_category','add',0,0,0,'2006-09-11 09:48:19'),(282,68,'product_description:delete_product_description','delete',0,0,0,'2006-09-11 10:04:01'),(281,68,'product_description:update_product_description','update',0,0,0,'2006-09-11 10:04:01'),(280,68,'product_description:view_product_description','view',0,0,0,'2006-09-11 10:04:01'),(279,68,'product_description:search_product_description','search',0,0,0,'2006-09-11 10:04:01'),(278,68,'product_description:add_product_description','add',0,0,0,'2006-09-11 10:04:01'),(288,70,'invoice:add_invoice','Add',0,0,0,'2006-09-29 12:27:02'),(289,70,'invoice:search_invoice','Search',1,0,0,'2006-09-29 12:27:02'),(290,70,'invoice:view_invoice','view',0,0,0,'2006-09-29 12:27:02'),(291,70,'invoice:update_invoice','update',0,0,0,'2006-09-29 12:27:02'),(292,70,'invoice:delete_invoice','delete',0,0,0,'2006-09-29 12:27:02'),(293,71,'invoice_labor:add_invoice_labor','add',0,0,0,'2006-09-30 11:55:02'),(294,71,'invoice_labor:search_invoice_labor','search',0,0,0,'2006-09-30 11:55:02'),(295,71,'invoice_labor:view_invoice_labor','view',0,0,0,'2006-09-30 11:55:02'),(296,71,'invoice_labor:update_invoice_labor','update',0,0,0,'2006-09-30 11:55:02'),(297,71,'invoice_labor:delete_invoice_labor','delete',0,0,0,'2006-09-30 11:55:02'),(298,72,'invoice_part:add_invoice_part','add',0,0,0,'2006-09-30 11:58:19'),(299,72,'invoice_part:search_invoice_part','search',0,0,0,'2006-09-30 11:58:19'),(300,72,'invoice_part:view_invoice_part','view',0,0,0,'2006-09-30 11:58:19'),(301,72,'invoice_part:update_invoice_part','update',0,0,0,'2006-09-30 11:58:19'),(302,72,'invoice_part:delete_invoice_part','delete',0,0,0,'2006-09-30 11:58:19'),(303,73,'product_status:add_product_status','add',0,0,0,'2006-10-08 12:16:14'),(304,73,'product_status:search_product_status','search',0,0,0,'2006-10-08 12:16:14'),(305,73,'product_status:view_product_status','view',0,0,0,'2006-10-08 12:16:14'),(306,73,'product_status:update_product_status','update',0,0,0,'2006-10-08 12:16:14'),(307,73,'product_status:delete_product_status','delete',0,0,0,'2006-10-08 12:16:14'),(317,75,'tax_class:delete_tax_class','delete',0,0,0,'2006-10-08 16:16:49'),(316,75,'tax_class:update_tax_class','update',0,0,0,'2006-10-08 16:16:49'),(315,75,'tax_class:view_tax_class','view',0,0,0,'2006-10-08 16:16:49'),(314,75,'tax_class:search_tax_class','search',0,0,0,'2006-10-08 16:16:49'),(313,75,'tax_class:add_tax_class','add',0,0,0,'2006-10-08 16:16:49'),(318,76,'tax_rate:add_tax_rate','add',0,0,0,'2006-10-08 16:20:21'),(319,76,'tax_rate:search_tax_rate','search',0,0,0,'2006-10-08 16:20:21'),(320,76,'tax_rate:view_tax_rate','view',0,0,0,'2006-10-08 16:20:21'),(321,76,'tax_rate:update_tax_rate','update',0,0,0,'2006-10-08 16:20:21'),(322,76,'tax_rate:delete_tax_rate','delete',0,0,0,'2006-10-08 16:20:21'),(323,77,'tax_type:add_tax_type','add',0,0,0,'2006-10-08 16:26:41'),(324,77,'tax_type:search_tax_type','search',0,0,0,'2006-10-08 16:26:41'),(325,77,'tax_type:view_tax_type','view',0,0,0,'2006-10-08 16:26:41'),(326,77,'tax_type:update_tax_type','update',0,0,0,'2006-10-08 16:26:41'),(327,77,'tax_type:delete_tax_type','delete',0,0,0,'2006-10-08 16:26:41'),(328,78,'file:add_file','add',1,0,0,'2006-10-08 16:31:44'),(329,78,'file:search_file','search',1,0,0,'2006-10-08 16:31:44'),(330,78,'file:view_file','view',0,0,0,'2006-10-08 16:31:44'),(331,78,'file:update_file','update',0,0,0,'2006-10-08 16:31:44'),(332,78,'file:delete_file','delete',0,0,0,'2006-10-08 16:31:44'),(333,79,'payment_option:add_payment_option','add',0,0,0,'2006-10-12 10:29:27'),(334,79,'payment_option:search_payment_option','search',0,0,0,'2006-10-12 10:29:27'),(335,79,'payment_option:view_payment_option','view',0,0,0,'2006-10-12 10:29:27'),(336,79,'payment_option:update_payment_option','update',0,0,0,'2006-10-12 10:29:27'),(337,79,'payment_option:delete_payment_option','delete',0,0,0,'2006-10-12 10:29:27'),(338,80,'credit_card:add_credit_card','Add',1,0,0,'2006-12-21 17:31:24'),(339,80,'credit_card:search_credit_card','Search',0,0,0,'2006-12-21 17:31:24'),(340,80,'credit_card:view_credit_card','View',0,0,0,'2006-12-21 17:31:24'),(341,80,'credit_card:update_credit_card','Update',0,0,0,'2006-12-21 17:31:24'),(342,80,'credit_card:delete_credit_card','Delete',0,0,0,'2006-12-21 17:31:24'),(343,81,'cc_payment:add_cc_payment','Add',0,0,0,'2006-12-22 13:31:04'),(344,81,'cc_payment:search_cc_payment','Search',0,0,0,'2006-12-22 13:31:04'),(345,81,'cc_payment:view_cc_payment','View',0,0,0,'2006-12-22 13:31:04'),(346,81,'cc_payment:update_cc_payment','Update',0,0,0,'2006-12-22 13:31:04'),(347,81,'cc_payment:delete_cc_payment','Delete',0,0,0,'2006-12-22 13:31:04'),(348,82,'check_payment:add_check_payment','Add',0,0,0,'2006-12-25 04:48:35'),(349,82,'check_payment:search_check_payment','Search',0,0,0,'2006-12-25 04:48:35'),(350,82,'check_payment:view_check_payment','View',0,0,0,'2006-12-25 04:48:35'),(351,82,'check_payment:update_check_payment','Update',0,0,0,'2006-12-25 04:48:35'),(352,82,'check_payment:delete_check_payment','Delete',0,0,0,'2006-12-25 04:48:35'),(353,64,'product:browse','Browse',1,NULL,NULL,'2007-03-24 01:32:01'),(354,83,'leads:add','Add',1,NULL,NULL,'2007-03-24 01:48:04'),(355,83,'leads:search','Search',1,NULL,NULL,'2007-03-24 01:47:38'),(356,84,'lead_type:add_lead_type','Add',0,0,0,'2007-03-25 16:07:36'),(357,84,'lead_type:search_lead_type','Search',0,0,0,'2007-03-25 16:07:36'),(358,84,'lead_type:view_lead_type','View',0,0,0,'2007-03-25 16:07:36'),(359,84,'lead_type:update_lead_type','Update',0,0,0,'2007-03-25 16:07:36'),(360,84,'lead_type:delete_lead_type','Delete',0,0,0,'2007-03-25 16:07:36'),(361,85,'lead_status:add_lead_status','Add',0,0,0,'2007-03-25 16:31:12'),(362,85,'lead_status:search_lead_status','Search',0,0,0,'2007-03-25 16:31:12'),(363,85,'lead_status:view_lead_status','View',0,0,0,'2007-03-25 16:31:12'),(364,85,'lead_status:update_lead_status','Update',0,0,0,'2007-03-25 16:31:12'),(365,85,'lead_status:delete_lead_status','Delete',0,0,0,'2007-03-25 16:31:12'),(366,86,'campaign:add_campaign','Add',0,0,0,'2007-03-26 20:59:19'),(367,86,'campaign:search_campaign','Search',0,0,0,'2007-03-26 20:59:19'),(368,86,'campaign:view_campaign','View',0,0,0,'2007-03-26 20:59:19'),(369,86,'campaign:update_campaign','Update',0,0,0,'2007-03-26 20:59:19'),(370,86,'campaign:delete_campaign','Delete',0,0,0,'2007-03-26 20:59:19'),(371,87,'campaign_type:add_campaign_type','Add',0,0,0,'2007-03-26 21:05:34'),(372,87,'campaign_type:search_campaign_type','Search',0,0,0,'2007-03-26 21:05:34'),(373,87,'campaign_type:view_campaign_type','View',0,0,0,'2007-03-26 21:05:34'),(374,87,'campaign_type:update_campaign_type','Update',0,0,0,'2007-03-26 21:05:34'),(375,87,'campaign_type:delete_campaign_type','Delete',0,0,0,'2007-03-26 21:05:34'),(376,88,'lead_call:add_lead_call','Add',0,0,0,'2007-03-27 18:18:58'),(377,88,'lead_call:search_lead_call','Search',0,0,0,'2007-03-27 18:18:58'),(378,88,'lead_call:view_lead_call','View',0,0,0,'2007-03-27 18:18:58'),(379,88,'lead_call:update_lead_call','Update',0,0,0,'2007-03-27 18:18:58'),(380,88,'lead_call:delete_lead_call','Delete',0,0,0,'2007-03-27 18:18:58'),(381,89,'lead_meeting:add_lead_meeting','Add',0,0,0,'2007-03-28 01:00:14'),(382,89,'lead_meeting:search_lead_meeting','Search',0,0,0,'2007-03-28 01:00:14'),(383,89,'lead_meeting:view_lead_meeting','View',0,0,0,'2007-03-28 01:00:14'),(384,89,'lead_meeting:update_lead_meeting','Update',0,0,0,'2007-03-28 01:00:14'),(385,89,'lead_meeting:delete_lead_meeting','Delete',0,0,0,'2007-03-28 01:00:14'),(386,90,'lead_email:add_lead_email','Add',0,0,0,'2007-03-28 11:01:56'),(387,90,'lead_email:search_lead_email','Search',0,0,0,'2007-03-28 11:01:56'),(388,90,'lead_email:view_lead_email','View',0,0,0,'2007-03-28 11:01:56'),(389,90,'lead_email:update_lead_email','Update',0,0,0,'2007-03-28 11:01:56'),(390,90,'lead_email:delete_lead_email','Delete',0,0,0,'2007-03-28 11:01:56'),(391,91,'contract_type:add_contract_type','Add',0,0,0,'2007-03-28 19:54:11'),(392,91,'contract_type:search_contract_type','Search',0,0,0,'2007-03-28 19:54:11'),(393,91,'contract_type:view_contract_type','View',0,0,0,'2007-03-28 19:54:11'),(394,91,'contract_type:update_contract_type','Update',0,0,0,'2007-03-28 19:54:11'),(395,91,'contract_type:delete_contract_type','Delete',0,0,0,'2007-03-28 19:54:11'),(396,92,'calendar:add_calendar','Add',0,0,0,'2007-03-30 16:57:13'),(397,92,'calendar:search_calendar','Search',0,0,0,'2007-03-30 16:57:13'),(398,92,'calendar:view_calendar','View',0,0,0,'2007-03-30 16:57:13'),(399,92,'calendar:update_calendar','Update',0,0,0,'2007-03-30 16:57:13'),(400,92,'calendar:delete_calendar','Delete',0,0,0,'2007-03-30 16:57:13'),(401,93,'note:add_note','Add',0,0,0,'2007-04-02 11:57:36'),(402,93,'note:search_note','Search',0,0,0,'2007-04-02 11:57:36'),(403,93,'note:view_note','View',0,0,0,'2007-04-02 11:57:36'),(404,93,'note:update_note','Update',0,0,0,'2007-04-02 11:57:36'),(405,93,'note:delete_note','Delete',0,0,0,'2007-04-02 11:57:36'),(406,94,'file:add_file','Add',1,0,0,'2007-04-02 15:12:22'),(407,94,'file:search_file','Search',1,0,0,'2007-04-02 15:12:22'),(408,94,'file:view_file','View',0,0,0,'2007-04-02 15:12:22'),(409,94,'file:update_file','Update',0,0,0,'2007-04-02 15:12:22'),(410,94,'file:delete_file','Delete',0,0,0,'2007-04-02 15:12:22'),(411,95,'crm_group:add_crm_group','Add',1,0,0,'2007-04-09 13:03:01'),(412,95,'crm_group:search_crm_group','Search',1,0,0,'2007-04-09 13:03:01'),(413,95,'crm_group:view_crm_group','View',0,0,0,'2007-04-09 13:03:01'),(414,95,'crm_group:update_crm_group','Update',0,0,0,'2007-04-09 13:03:01'),(415,95,'crm_group:delete_crm_group','Delete',0,0,0,'2007-04-09 13:03:01');
/*!40000 ALTER TABLE `module_method` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE `note` (
  `note_id` int(20) NOT NULL auto_increment,
  `note_subject` char(255) NOT NULL,
  `note_text` text NOT NULL,
  `note_type` enum('company_id','invoice_id','system_id','user_id','lead_id','payment_id','campaign_id','product_id') default NULL,
  `note_type_id` int(20) default NULL,
  `note_enter_by` int(20) default NULL,
  `note_create_date` int(20) default NULL,
  `note_active` tinyint(3) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`note_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note`
--

LOCK TABLES `note` WRITE;
/*!40000 ALTER TABLE `note` DISABLE KEYS */;
/*!40000 ALTER TABLE `note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operating_system`
--

DROP TABLE IF EXISTS `operating_system`;
CREATE TABLE `operating_system` (
  `operating_system_id` int(20) NOT NULL auto_increment,
  `operating_system_manufacture_id` int(20) NOT NULL default '0',
  `operating_system_name` char(100) NOT NULL default '',
  `operating_system_active` tinyint(4) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`operating_system_id`),
  KEY `operating_system_manufacture_id` (`operating_system_manufacture_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operating_system`
--

LOCK TABLES `operating_system` WRITE;
/*!40000 ALTER TABLE `operating_system` DISABLE KEYS */;
INSERT INTO `operating_system` VALUES (1,11,'Xenix',1,'2006-07-16 12:48:32'),(2,11,'MS-DOS',1,'2006-07-16 12:51:26'),(3,11,'Windows CE',1,'2006-07-16 12:53:12'),(4,11,'Windows CE 3.0',1,'2006-07-16 12:53:40'),(5,11,'Windows Mobile',1,'2006-07-16 12:55:48'),(6,11,'Windows CE 5.0',1,'2006-07-16 12:56:02'),(7,11,'Windows 1.0',1,'2006-07-16 12:56:16'),(8,11,'Windows 2.0',1,'2006-07-16 12:56:27'),(9,11,'Windows 3.0',1,'2006-07-16 12:56:39'),(10,11,'Windows 3.1x',1,'2006-07-16 12:56:50'),(11,11,'Windows 95',1,'2006-07-16 12:57:06'),(12,11,'Windows 98',1,'2006-07-16 12:57:18'),(13,11,'Windows 98 Second Edition',1,'2006-07-16 12:57:31'),(14,11,'Windows Me',1,'2006-07-16 12:57:55'),(15,11,'OS/2',1,'2006-07-16 12:58:07'),(16,11,'Windows NT',1,'2006-07-16 12:58:18'),(17,11,'Windows NT 3.1',1,'2006-07-16 12:58:29'),(18,11,'Windows NT 3.5',1,'2006-07-16 12:58:38'),(19,11,'Windows NT 3.51',1,'2006-07-16 12:58:48'),(20,11,'Windows NT 4.0',1,'2006-07-16 12:58:58'),(21,11,'Windows 2000',1,'2006-07-16 12:59:09'),(22,11,'Windows XP Home',1,'2006-07-16 12:59:22'),(23,11,'Windows XP Profesional',1,'2006-07-16 12:59:33'),(24,11,'Windows Server 2003',1,'2006-07-16 12:59:44'),(25,11,'Windows Vista',1,'2006-07-16 12:59:58'),(26,11,'Windows XP Media',1,'2006-07-17 12:02:55'),(27,14,'Enterprise 10',1,'2006-07-18 09:58:44'),(28,14,'Desktop 10',1,'2006-07-18 09:58:56'),(29,12,'3.1',1,'2006-09-11 08:35:22'),(30,16,'5.0',1,'2006-09-15 21:33:01'),(31,16,'6.1',1,'2007-03-25 15:20:16'),(32,16,'6.2',1,'2007-03-25 15:20:32'),(33,23,'Core 1',1,'2007-06-02 15:47:13'),(34,23,'Core 2',1,'2007-06-02 15:47:32'),(35,23,'Core 3',1,'2007-06-02 15:47:42'),(36,23,'Core 4',1,'2007-06-02 15:47:53'),(37,23,'Core 5',1,'2007-06-02 15:48:06'),(38,23,'Core 6',1,'2007-06-02 15:48:17'),(39,23,'7',1,'2007-06-02 15:48:27'),(40,24,'4',1,'2007-06-02 16:00:47');
/*!40000 ALTER TABLE `operating_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operating_system_manufacture`
--

DROP TABLE IF EXISTS `operating_system_manufacture`;
CREATE TABLE `operating_system_manufacture` (
  `operating_system_manufacture_id` int(20) NOT NULL auto_increment,
  `operating_system_manufacture_name` varchar(100) NOT NULL default '',
  `operating_system_manufacture_website` varchar(100) default NULL,
  `operating_system_manufacture_active` smallint(4) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`operating_system_manufacture_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operating_system_manufacture`
--

LOCK TABLES `operating_system_manufacture` WRITE;
/*!40000 ALTER TABLE `operating_system_manufacture` DISABLE KEYS */;
INSERT INTO `operating_system_manufacture` VALUES (1,'Acorn','',0,'2007-06-02 15:48:47'),(2,'Amiga','http://www.amiga.com/',0,'2007-06-02 15:49:07'),(3,'Apple/Macintosh','http://www.apple.com',1,'2006-07-16 12:09:02'),(4,'Array Networks','http://www.arraynetworks.net/',1,'2006-07-16 12:09:34'),(5,'Atari ST','http://www.atari.st/',0,'2007-06-02 15:49:26'),(6,'Burroughs','',0,'2007-06-02 15:50:02'),(7,'Convergent Technologies','',0,'2007-06-02 15:50:20'),(8,'Be Incorporated','',0,'2007-06-02 15:49:45'),(9,'Digital/Tandem Computers/Compaq/HP','',1,'2006-07-16 12:14:52'),(10,'IBM','',1,'2006-07-16 12:15:06'),(11,'Microsoft','http://www.microsoft.com',1,'2006-07-16 12:15:27'),(12,'Debian','http://www.debian.org',1,'2006-07-16 12:16:33'),(13,'Red Hat','http://www.redhat.com',1,'2006-07-16 12:16:57'),(14,'Suse','http://www.novell.com/linux/',1,'2006-07-16 12:17:24'),(15,'BSD','',1,'2006-07-16 12:19:34'),(16,'Free BSD','',1,'2006-07-16 12:19:45'),(17,'Open BSD','',1,'2006-07-16 12:19:58'),(18,'Solaris','',1,'2006-07-16 12:20:10'),(19,'Sun Os','',1,'2006-07-16 12:20:28'),(20,'Cisco IOS','',1,'2006-07-16 12:20:42'),(21,'Cisco CATOS','',1,'2006-07-16 12:21:10'),(22,'Cisco CBOS','',1,'2006-07-16 12:21:51'),(23,'Fedora','http://fedoraproject.org/',1,'2007-06-02 15:47:03'),(24,'Cent OS','',1,'2007-06-02 16:00:39');
/*!40000 ALTER TABLE `operating_system_manufacture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_setup`
--

DROP TABLE IF EXISTS `page_setup`;
CREATE TABLE `page_setup` (
  `page_setup_id` int(20) NOT NULL auto_increment,
  `page_setup_name` varchar(100) NOT NULL default '',
  `page_setup_display_name` varchar(100) NOT NULL default '',
  `page_setup_page_title` varchar(100) NOT NULL default '',
  `page_setup_description` text NOT NULL,
  `page_setup_keywords` text NOT NULL,
  `page_setup_order` int(8) NOT NULL default '0',
  `page_setup_menu` int(4) NOT NULL default '0',
  `page_setup_active` int(4) NOT NULL default '0',
  `page_setup_static_page` int(3) NOT NULL,
  `page_views` int(20) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`page_setup_id`),
  KEY ` page_setup_menu` (`page_setup_menu`),
  KEY `page_setup_active` (`page_setup_active`),
  KEY `page_setup_order` (`page_setup_order`),
  FULLTEXT KEY ` page_setup_display_name` (`page_setup_display_name`)
) ENGINE=MyISAM AUTO_INCREMENT=400 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_setup`
--

LOCK TABLES `page_setup` WRITE;
INSERT INTO `page_setup` (`page_setup_id`, `page_setup_name`, `page_setup_display_name`, `page_setup_page_title`, `page_setup_description`, `page_setup_keywords`, `page_setup_order`, `page_setup_menu`, `page_setup_active`, `page_setup_static_page`, `page_views`, `last_modified`) VALUES 
(1, 'error:404', '', '404 Error File Not Found', 'The page you requested was not found on our system', '404,error,file,not,found,cite,software,solutions,Grants Pass,Oregon,', 0, 0, 0, 0, 559, '2006-06-11 17:01:59'),
(2, 'core:main', 'Home', 'Cite Software Solutions', 'Cite Software Solutions (CSS) was founded in 2005. Since then, we have successfully completed a wide range of projects on time\r\nand within budget. We know how to organize our efforts to complete projects of different complexity and scope, including long-term projects for large-scale enterprises and corporations, and short-term, custom projects. For every project, we do our best to remain creative and productive without sacrificing technical expertise, in order to deliver high-quality products in a reasonable amount of time and according to our customers specifications.', 'web development,php,smarty', 1, 1, 1, 0, 613, '2006-06-12 04:05:42'),
(3, 'core:why', 'Why CSS', 'Why CSS?', 'Why Chose CSS', '', 2, 0, 0, 1, 58, '2006-06-12 04:40:34'),
(4, 'portfolio:main', 'Portfolio', 'Our Portfolio', '', '', 3, 0, 0, 1, 39, '2006-06-12 16:18:58'),
(5, 'downloads:main', 'Downloads', 'Downloads', '', '', 4, 0, 0, 1, 36, '2006-06-12 15:48:34'),
(6, 'support:main', 'Support', 'Support', '', '', 5, 0, 0, 1, 36, '2006-06-12 15:49:32'),
(8, 'product:display', 'Cite CRM', 'Cite CRM', 'Customer Relations Management Package', 'Cite CRM,Customer,Relaitions,Management,Computer,Company', 0, 0, 1, 0, 21, '2006-06-17 05:12:09'),
(17, 'error:403', '403 Access Forbiden', '403 Access Forbiden', '403 Access Forbiden', '403 Access Forbiden, Cite CMS', 0, 0, 1, 0, 123, '2006-06-18 04:28:38'),
(10, 'user:new', 'Add New User', 'Add New User', 'Adds A new User to the System', '', 0, 0, 1, 0, 654, '2006-06-17 04:59:03'),
(11, 'user:activateUser', 'Activate User Account', 'Activate User Account', 'Activate your Cite Software Solutions Account', 'activate,new account,Cite Software Solutions', 0, 0, 1, 0, 70, '2006-06-17 04:59:40'),
(16, 'user:newContact', 'Add New Contact', 'Add New Contact', 'Adds a new Contact to the CMS', 'Cite CMS', 0, 0, 1, 0, 22, '2006-06-17 17:17:37'),
(12, 'user:userView', 'User Account', 'User Account', 'User Account Home Page', 'Cite CMS,', 0, 0, 1, 0, 312, '2006-06-17 04:59:16'),
(13, 'user:newAddress', 'Add New Address', 'Add New Address', 'Add a new user address', 'Cite CMS,', 0, 0, 1, 0, 31, '2006-06-17 04:59:28'),
(14, 'user:editAddress', 'Edit Address', 'Edit Address', 'Edit user address', 'Cite CMS', 0, 0, 1, 0, 21, '2006-06-17 04:48:59'),
(15, 'user:userLogin', 'Log On', 'Log On', 'Cite CMS User Log on page', '', 0, 0, 1, 0, 260, '2006-06-17 04:58:48'),
(18, 'user:adminViewAllUsers', 'View All Users', 'View All Users', 'Admin: View All Users', '', 0, 0, 1, 0, 392, '2006-06-18 04:55:43'),
(19, 'user:adminViewUserDetail', 'View User Details', 'View User Details', '', '', 0, 0, 1, 0, 257, '2006-06-20 02:12:27'),
(20, 'user:adminNewUserAddress', 'New User Address', 'New User Address', '', '', 0, 0, 1, 0, 20, '2006-06-20 02:23:16'),
(21, 'user:adminNewContact', 'New User Contact', 'New User Contact', '', '', 0, 0, 1, 0, 24, '2006-06-20 02:26:44'),
(22, 'user:adminSuspendUser', 'Suspend User', 'Suspend User', 'Suspend A user', '', 0, 0, 1, 0, 8, '2006-06-21 03:28:41'),
(24, 'module:adminNewModule', 'Develop New Module', 'Develop New Module', 'Develope new Cite CMS Module', 'Cite CMS,  Develop,New,Module', 0, 0, 1, 0, 230, '2006-06-22 04:47:25'),
(25, 'module_method:add_module_method', 'Add', 'Add', 'Add New Method', 'Cite CMS', 0, 0, 1, 0, 1, '2006-06-27 01:15:47'),
(26, 'module_method:search_module_method', 'Search', 'Search', 'View All Module Methods', '', 0, 0, 1, 0, 1, '2006-06-27 01:57:11'),
(27, 'module_method:view_module_method', 'View', 'View Module Method', 'View a module method', '', 0, 0, 1, 0, 0, '2006-06-27 01:57:34'),
(28, 'module_method:update_module_method', 'Update', 'Update', 'Edit Method', '', 0, 0, 1, 0, 126, '2006-06-27 01:57:53'),
(29, 'module_method:delete_module_method', 'Delete', 'delete', 'Delete Method', '', 0, 0, 1, 0, 0, '2006-06-27 01:58:26'),
(256, 'workorder_time:add_workorder_time', 'add', 'Add', '', '', 0, 0, 1, 0, 120, '2006-09-12 22:29:23'),
(257, 'workorder_time:search_workorder_time', 'search', 'Search', '', '', 0, 0, 1, 0, 0, '2006-09-12 22:29:23'),
(258, 'workorder_time:view_workorder_time', 'view', 'View', '', '', 0, 0, 1, 0, 6, '2006-09-12 22:29:23'),
(259, 'workorder_time:update_workorder_time', 'update', 'update', '', '', 0, 0, 1, 0, 0, '2006-09-12 22:29:23'),
(255, 'product_description:delete_product_description', 'delete', 'Delete', '', '', 0, 0, 1, 0, 0, '2006-09-11 03:04:01'),
(254, 'product_description:update_product_description', 'update', 'update', '', '', 0, 0, 1, 0, 0, '2006-09-11 03:04:01'),
(35, 'project:add_project', 'Add', 'Add', '', '', 0, 0, 1, 0, 17, '2006-06-27 04:33:16'),
(36, 'project:search_project', 'Search', 'Search', '', '', 0, 0, 1, 0, 5, '2006-06-27 04:33:16'),
(37, 'project:view_project', 'View', 'View Project', '', '', 0, 0, 1, 0, 13, '2006-06-27 04:33:16'),
(38, 'project:update_project', 'Edit', 'Delete', '', '', 0, 0, 1, 0, 12, '2006-06-27 04:33:16'),
(39, 'project:delete_project', 'Delete', '', '', '', 0, 0, 1, 0, 0, '2006-06-27 04:33:16'),
(40, 'suspension:add_suspension', 'Add', 'Add  Suspension', '', '', 0, 0, 1, 0, 0, '2006-06-28 02:35:35'),
(41, 'suspension:search_suspension', 'Search', 'Search', '', '', 0, 0, 1, 0, 13, '2006-06-28 02:35:35'),
(42, 'suspension:view_suspension', 'View', 'View Suspension', '', '', 0, 0, 1, 0, 0, '2006-06-28 02:35:35'),
(43, 'suspension:update_suspension', 'Edit', 'Delete', '', '', 0, 0, 1, 0, 0, '2006-06-28 02:35:35'),
(44, 'suspension:delete_suspension', 'Delete', '', '', '', 0, 0, 1, 0, 0, '2006-06-28 02:35:35'),
(45, 'project:add_project', 'Add', 'Add New Project', 'Add New Project to Cite Software', '', 0, 0, 1, 0, 13, '2006-06-29 03:20:48'),
(46, 'project:search_project', 'Search', 'Search Projects', 'CIte Software Projects', '', 0, 0, 1, 0, 0, '2006-06-29 03:20:48'),
(47, 'project:view_project', 'View', 'View Project', 'View A Cite Software Project', '', 0, 0, 1, 0, 0, '2006-06-29 03:20:48'),
(48, 'project:update_project', 'Update', 'Delete Project', 'Edit Cite Software Project', '', 0, 0, 1, 0, 0, '2006-06-29 03:20:48'),
(49, 'project:delete_project', 'Delete', 'Delete Project', 'Delete Project', '', 0, 0, 1, 0, 0, '2006-06-29 03:20:48'),
(50, 'project_status:add_project_status', 'Add', 'Add Project Status', 'Add A new Project Status', '', 0, 0, 1, 0, 12, '2006-06-29 03:27:52'),
(51, 'project_status:search_project_status', 'Search', 'Search Project Status', 'Search Project Status', '', 0, 0, 1, 0, 7, '2006-06-29 03:27:52'),
(52, 'project_status:view_project_status', 'View', 'View Project Status', 'View Project Status', '', 0, 0, 1, 0, 6, '2006-06-29 03:27:52'),
(53, 'project_status:update_project_status', 'Update', 'Edit Project Status', 'Edit Project Status', '', 0, 0, 1, 0, 0, '2006-06-29 03:27:52'),
(54, 'project_status:delete_project_status', 'Delete', 'Delete Project Status', 'Delete Project Status', '', 0, 0, 1, 0, 1, '2006-06-29 03:27:52'),
(55, 'module:search_module', 'View All Modules', 'View All Modules', 'View All Modules', 'Cite CMS, search, Modules', 0, 0, 1, 0, 191, '2006-06-29 04:24:26'),
(56, 'project_type:add_project_type', 'Add', 'Add Project Type', 'Add A Project Type', '', 0, 0, 1, 0, 10, '2006-06-29 16:08:26'),
(57, 'project_type:search_project_type', 'Search', 'Search Project Types', 'Search All Project Types', '', 0, 0, 1, 0, 6, '2006-06-29 16:08:26'),
(58, 'project_type:view_project_type', 'View', 'View Project Type', '', '', 0, 0, 1, 0, 10, '2006-06-29 16:08:26'),
(59, 'project_type:update_project_type', 'Edit', 'Edit Project Type', '', '', 0, 0, 1, 0, 4, '2006-06-29 16:08:26'),
(60, 'project_type:delete_project_type', 'Delete', 'Delete Project Type', '', '', 0, 0, 1, 0, 1, '2006-06-29 16:08:26'),
(61, 'user_type:add_user_type', 'Add', 'Admin: Add User Type', 'Adds a user type', 'Cite CMS, User, Type, ', 0, 0, 1, 0, 8, '2006-06-30 02:43:49'),
(62, 'user_type:search_user_type', 'Search', 'Search User Type', 'View All User Types', '', 0, 0, 1, 0, 70, '2006-06-30 02:43:49'),
(63, 'user_type:view_user_type', 'View', 'Admin: View User Type', 'View A user Type', '', 0, 0, 1, 0, 19, '2006-06-30 02:43:49'),
(64, 'user_type:update_user_type', 'Edit', 'Admin: Edit A user Type', 'Edits A user Type', '', 0, 0, 1, 0, 11, '2006-06-30 02:43:49'),
(65, 'user_type:delete_user_type', 'Delete', 'Admin: Delete A User Type', 'Deletes A user type', '', 0, 0, 1, 0, 1, '2006-06-30 02:43:49'),
(66, 'module:view_module', 'Admin: View Module', 'Admin: View Module', 'View a Module', 'Cite CMS, View, Module', 0, 0, 1, 0, 210, '2006-06-30 04:51:33'),
(67, 'module:update_module', 'Update', 'Admin: Update Module', 'Update a Module', 'Cite CMS, Update, Module', 0, 0, 1, 0, 17, '2006-06-30 04:53:59'),
(68, 'module:delete_module', 'Delete', 'Admin: Delete Module', 'Delete a module', 'Cite CMS, Delete, Module', 0, 0, 1, 0, 34, '2006-06-30 04:55:04'),
(69, 'company:add_company', 'Add', 'Add New Account', '', '', 0, 0, 1, 0, 343, '2006-07-08 03:26:49'),
(70, 'company:search_company', 'Search', 'Search For Account', '', '', 0, 0, 1, 0, 1501, '2006-07-08 03:26:49'),
(71, 'company:view_company', 'View', 'View Account', '', '', 0, 0, 1, 0, 2816, '2006-07-08 03:26:49'),
(72, 'company:update_company', 'Edit', 'Admin: Edit Company', '', '', 0, 0, 1, 0, 43, '2006-07-08 03:26:49'),
(73, 'company:delete_company', 'Delete', 'Admin: Delete Company', '', '', 0, 0, 1, 0, 2, '2006-07-08 03:26:49'),
(74, 'company_address:add_company_address', 'Add', 'Admin: Add New Company Address', '', '', 0, 0, 1, 0, 20, '2006-07-08 03:34:10'),
(75, 'company_address:search_company_address', 'Search', 'Admin: Search For Company Address', '', '', 0, 0, 1, 0, 0, '2006-07-08 03:34:10'),
(76, 'company_address:view_company_address', 'View', 'Admin: View Company Address', '', '', 0, 0, 1, 0, 7, '2006-07-08 03:34:10'),
(77, 'company_address:update_company_address', 'Edit', 'Admin: Edit Company Address', '', '', 0, 0, 1, 0, 95, '2006-07-08 03:34:10'),
(78, 'company_address:delete_company_address', 'Delete', 'Admin: Delete Company Address', '', '', 0, 0, 1, 0, 4, '2006-07-08 03:34:10'),
(79, 'company_contact:add_company_contact', 'Add', 'Admin: Add New Company Contact', '', '', 0, 0, 1, 0, 0, '2006-07-08 03:41:54'),
(80, 'company_contact:search_company_contact', 'Search', 'Admin: Search For Company Contact', '', '', 0, 0, 1, 0, 0, '2006-07-08 03:41:54'),
(81, 'company_contact:view_company_contact', 'View', 'Admin: View Company Contact', '', '', 0, 0, 1, 0, 0, '2006-07-08 03:41:54'),
(82, 'company_contact:update_company_contact', 'Edit', 'Admin: Edit Company Contact', '', '', 0, 0, 1, 0, 0, '2006-07-08 03:41:54'),
(83, 'company_contact:delete_company_contact', 'Delete', 'Admin: Delete Company Contact', '', '', 0, 0, 1, 0, 0, '2006-07-08 03:41:54'),
(84, 'user_to_company:add_user_to_company', 'Add', 'Admin: Add User to company', '', '', 0, 0, 1, 0, 162, '2006-07-08 03:45:30'),
(85, 'user_to_company:search_user_to_company', 'Search', 'Admin: Search For User to company', '', '', 0, 0, 1, 0, 0, '2006-07-08 03:45:30'),
(86, 'user_to_company:view_user_to_company', 'View', 'Admin: View User to company', '', '', 0, 0, 1, 0, 1, '2006-07-08 03:45:30'),
(87, 'user_to_company:update_user_to_company', 'Edit', 'Admin: Edit User to company', '', '', 0, 0, 1, 0, 0, '2006-07-08 03:45:30'),
(88, 'user_to_company:delete_user_to_company', 'Delete', 'Admin: Delete User to company', '', '', 0, 0, 1, 0, 17, '2006-07-08 03:45:30'),
(89, 'workorder:add_workorder', 'Add', 'Admin: New Work Order', '', '', 0, 0, 1, 0, 321, '2006-07-08 04:04:04'),
(90, 'workorder:search_workorder', 'Search', 'Workorders', '', '', 0, 0, 1, 0, 1009, '2006-07-08 04:04:04'),
(91, 'workorder:view_workorder', 'View', 'View Work Order', '', '', 0, 0, 1, 0, 2894, '2006-07-08 04:04:04'),
(92, 'workorder:update_workorder', 'Edit', 'Admin: Edit Work Order', '', '', 0, 0, 1, 0, 76, '2006-07-08 04:04:04'),
(93, 'workorder:delete_workorder', 'Delete', 'Admin: Delete Work Order', '', '', 0, 0, 1, 0, 10, '2006-07-08 04:04:04'),
(94, 'workorder_comment:add_workorder_comment', 'Add', 'Admin: Add Work Order Comment', '', '', 0, 0, 1, 0, 87, '2006-07-08 04:15:06'),
(95, 'workorder_comment:search_workorder_comment', 'Search', 'Admin: Search Work Order Comment', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:15:06'),
(96, 'workorder_comment:view_workorder_comment', 'View', 'Admin: View Work Order Comment', '', '', 0, 0, 1, 0, 10, '2006-07-08 04:15:06'),
(97, 'workorder_comment:update_workorder_comment', 'Edit', 'Admin: Edit Work Order Comment', '', '', 0, 0, 1, 0, 44, '2006-07-08 04:15:06'),
(98, 'workorder_comment:delete_workorder_comment', 'Delete', 'Admin: Delete Work Order Comment', '', '', 0, 0, 1, 0, 19, '2006-07-08 04:15:06'),
(99, 'workorder_note:add_workorder_note', 'Add', 'Admin: Add Work Order Note', '', '', 0, 0, 1, 0, 249, '2006-07-08 04:22:39'),
(100, 'workorder_note:search_workorder_note', 'Search', 'Admin: Search For Work Order Note', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:22:39'),
(101, 'workorder_note:view_workorder_note', 'View', 'Admin: View Work Order Note', '', '', 0, 0, 1, 0, 26, '2006-07-08 04:22:39'),
(102, 'workorder_note:update_workorder_note', 'Edit', 'Admin: Edit Work Order Note', '', '', 0, 0, 1, 0, 298, '2006-07-08 04:22:39'),
(103, 'workorder_note:delete_workorder_note', 'Delete', 'Admin: Delete Work Order Note', '', '', 0, 0, 1, 0, 51, '2006-07-08 04:22:39'),
(104, 'user_to_workorder:add_user_to_workorder', 'Add', 'Admin: Add User To Work Order', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:32:15'),
(105, 'user_to_workorder:search_user_to_workorder', 'Search', 'Admin: User To Work Order', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:32:15'),
(106, 'user_to_workorder:view_user_to_workorder', 'View', 'Admin: View User To Work Order', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:32:15'),
(107, 'user_to_workorder:update_user_to_workorder', 'Edit', 'Admin: Edit User To Work Order', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:32:15'),
(108, 'user_to_workorder:delete_user_to_workorder', 'Delete', 'Admin: Delete User To Work Order', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:32:15'),
(109, 'company_to_workorder:add_company_to_workorder', 'Add', 'Admin: Add Company To Work Order', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:39:19'),
(110, 'company_to_workorder:search_company_to_workorder', 'Search', 'Admin: Search Company To Work Order', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:39:19'),
(111, 'company_to_workorder:view_company_to_workorder', 'View', 'Admin: View Company To Work Order', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:39:19'),
(112, 'company_to_workorder:update_company_to_workorder', 'Edit', 'Admin: Edit Company To Work Order', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:39:19'),
(113, 'company_to_workorder:delete_company_to_workorder', 'Delete', 'Admin: Delete Company To Work Order', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:39:19'),
(114, 'country:add_country', 'Add', 'Admin: Add Country', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:44:01'),
(115, 'country:search_country', 'Search', 'Admin: Search Country', '', '', 0, 0, 1, 0, 38, '2006-07-08 04:44:01'),
(116, 'country:view_country', 'View', 'Admin: View Country', '', '', 0, 0, 1, 0, 3, '2006-07-08 04:44:01'),
(117, 'country:update_country', 'Edit', 'Admin: Edit Country', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:44:01'),
(118, 'country:delete_country', 'Delete', 'Admin: Delete Country', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:44:01'),
(119, 'state:add_state', 'Add', 'Admin: Add State', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:51:42'),
(120, 'state:search_state', 'Search', 'Admin: Search State', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:51:42'),
(121, 'state:view_state', 'View', 'Admin: View State', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:51:42'),
(122, 'state:update_state', 'Edit', 'Admin: Edit State', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:51:42'),
(123, 'state:delete_state', 'Delete', 'Admin: Delete State', '', '', 0, 0, 1, 0, 0, '2006-07-08 04:51:42'),
(124, 'billing_rates:add_billing_rates', 'Add', 'Setup: Add Billing Rates', '', '', 0, 0, 1, 0, 9, '2006-07-09 18:21:15'),
(125, 'billing_rates:search_billing_rates', 'Search', 'Setup: Search Billing Rates', '', '', 0, 0, 1, 0, 70, '2006-07-09 18:21:15'),
(126, 'billing_rates:view_billing_rates', 'View', 'Setup: View Billing Rates', '', '', 0, 0, 1, 0, 14, '2006-07-09 18:21:15'),
(127, 'billing_rates:update_billing_rates', 'Edit', 'Setup: Edit Billing Rates', '', '', 0, 0, 1, 0, 20, '2006-07-09 18:21:15'),
(128, 'billing_rates:delete_billing_rates', 'Delete', 'Setup: Delete Billing Rates', '', '', 0, 0, 1, 0, 0, '2006-07-09 18:21:15'),
(129, 'workorder_status:add_workorder_status', 'Add', 'Setup: Add Workorder Status', '', '', 0, 0, 1, 0, 24, '2006-07-09 18:36:29'),
(130, 'workorder_status:search_workorder_status', 'Search', 'Setup: Search Workorder Status', '', '', 0, 0, 1, 0, 48, '2006-07-09 18:36:29'),
(131, 'workorder_status:view_workorder_status', 'View', 'Setup: View Workorder Status', '', '', 0, 0, 1, 0, 21, '2006-07-09 18:36:29'),
(132, 'workorder_status:update_workorder_status', 'Edit', 'Setup:', '', '', 0, 0, 1, 0, 13, '2006-07-09 18:36:29'),
(133, 'workorder_status:delete_workorder_status', 'Delete', 'Setup: Delete Workorder Status', '', '', 0, 0, 1, 0, 0, '2006-07-09 18:36:29'),
(134, 'workorder_history:add_workorder_history', 'Add', 'Admin: Add Work Order History', '', '', 0, 0, 1, 0, 0, '2006-07-10 18:05:11'),
(135, 'workorder_history:search_workorder_history', 'Search', 'Admin: Search Work Order History', '', '', 0, 0, 1, 0, 0, '2006-07-10 18:05:11'),
(136, 'workorder_history:view_workorder_history', 'View', 'Admin: View Work Order History', '', '', 0, 0, 1, 0, 0, '2006-07-10 18:05:11'),
(137, 'workorder_history:update_workorder_history', 'Edit', 'Admin: Edit Work Order History', '', '', 0, 0, 1, 0, 0, '2006-07-10 18:05:11'),
(138, 'workorder_history:delete_workorder_history', 'Delete', 'Admin: Delete Work Order History', '', '', 0, 0, 1, 0, 0, '2006-07-10 18:05:11'),
(139, 'system:add_system', 'Add', 'Admin: Add System', '', '', 0, 0, 1, 0, 207, '2006-07-14 03:39:57'),
(140, 'system:search_system', 'Search', 'Search Systems', '', '', 0, 0, 1, 0, 353, '2006-07-14 03:39:57'),
(141, 'system:view_system', 'View', 'Admin: View System', '', '', 0, 0, 1, 0, 722, '2006-07-14 03:39:57'),
(142, 'system:update_system', 'Edit', 'Admin: Update System', '', '', 0, 0, 1, 0, 182, '2006-07-14 03:39:57'),
(143, 'system:delete_system', 'Delete', 'Admin: Delete System', '', '', 0, 0, 1, 0, 1, '2006-07-14 03:39:57'),
(144, 'system_manufacture:add_system_manufacture', 'Add', 'Admin: Add System', '', '', 0, 0, 1, 0, 1, '2006-07-14 03:45:36'),
(145, 'system_manufacture:search_system_manufacture', 'Search', 'Admin: Search System', '', '', 0, 0, 1, 0, 26, '2006-07-14 03:45:36'),
(146, 'system_manufacture:view_system_manufacture', 'View', 'Admin: View System', '', '', 0, 0, 1, 0, 7, '2006-07-14 03:45:36'),
(147, 'system_manufacture:update_system_manufacture', 'Edit', 'Admin: Update System', '', '', 0, 0, 1, 0, 0, '2006-07-14 03:45:36'),
(148, 'system_manufacture:delete_system_manufacture', 'Delete', 'Admin: Delete System', '', '', 0, 0, 1, 0, 0, '2006-07-14 03:45:36'),
(149, 'system_model:add_system_model', 'Add', 'Admin: Add System Model', '', '', 0, 0, 1, 0, 0, '2006-07-14 03:47:54'),
(150, 'system_model:search_system_model', 'Search', 'Admin: Search System Model', '', '', 0, 0, 1, 0, 0, '2006-07-14 03:47:54'),
(151, 'system_model:view_system_model', 'View', 'Admin: View System Model', '', '', 0, 0, 1, 0, 0, '2006-07-14 03:47:54'),
(152, 'system_model:update_system_model', 'Edit', 'Admin: Update System Model', '', '', 0, 0, 1, 0, 0, '2006-07-14 03:47:54'),
(153, 'system_model:delete_system_model', 'Delete', 'Admin: Delete System', '', '', 0, 0, 1, 0, 0, '2006-07-14 03:47:54'),
(154, 'operating_system_manufacture:add_operating_system_manufacture', 'Add', 'Admin: Add Operating System', '', '', 0, 0, 1, 0, 61, '2006-07-16 04:38:16'),
(155, 'operating_system_manufacture:search_operating_system_manufacture', 'Search', 'Admin: Search Operating System', '', '', 0, 0, 1, 0, 97, '2006-07-16 04:38:16'),
(156, 'operating_system_manufacture:view_operating_system_manufacture', 'View', 'Admin: View Operating System', '', '', 0, 0, 1, 0, 110, '2006-07-16 04:38:16'),
(157, 'operating_system_manufacture:update_operating_system_manufacture', 'Edit', 'Admin: Update Operating System', '', '', 0, 0, 1, 0, 18, '2006-07-16 04:38:16'),
(158, 'operating_system_manufacture:delete_operating_system_manufacture', 'Delete', 'Admin: Delete Operating System', '', '', 0, 0, 1, 0, 0, '2006-07-16 04:38:16'),
(159, 'operating_system:add_operating_system', 'Add', 'Admin: Add Operating System', '', '', 0, 0, 1, 0, 93, '2006-07-16 04:40:21'),
(160, 'operating_system:search_operating_system', 'Search', 'Admin: Search Operating System', '', '', 0, 0, 1, 0, 0, '2006-07-16 04:40:21'),
(161, 'operating_system:view_operating_system', 'View', 'Admin: View Operating System', '', '', 0, 0, 1, 0, 41, '2006-07-16 04:40:21'),
(162, 'operating_system:update_operating_system', 'Edit', 'Admin: Update Operating System', '', '', 0, 0, 1, 0, 1, '2006-07-16 04:40:21'),
(163, 'operating_system:delete_operating_system', 'Delete', 'Admin: Delete Operating System', '', '', 0, 0, 1, 0, 0, '2006-07-16 04:40:21'),
(164, 'vendor:add_vendor', 'Add', 'Add Vendor', '', '', 0, 0, 1, 0, 44, '2006-07-18 00:30:38'),
(165, 'vendor:add_vendor', 'Add', 'Add Vendor', '', '', 0, 0, 1, 0, 44, '2006-07-18 00:36:09'),
(166, 'vendor:add_vendor', 'Add', 'Add Vendor', '', '', 0, 0, 1, 0, 44, '2006-07-18 00:39:27'),
(167, 'vendor:search_vendor', 'Search', 'Search Vendor', '', '', 0, 0, 1, 0, 27, '2006-07-18 00:39:27'),
(168, 'vendor:view_vendor', 'View', 'View Vendor', '', '', 0, 0, 1, 0, 64, '2006-07-18 00:39:27'),
(169, 'vendor:update_vendor', 'Edit', 'Edit Vendor', '', '', 0, 0, 1, 0, 2, '2006-07-18 00:39:27'),
(170, 'vendor:delete_vendor', 'Delete', 'Delete Vendor', '', '', 0, 0, 1, 0, 0, '2006-07-18 00:39:27'),
(171, 'vendor_address:add_vendor_address', 'Add', 'Add Vendor Address', '', '', 0, 0, 1, 0, 31, '2006-07-18 00:56:10'),
(172, 'vendor_address:search_vendor_address', 'Search', 'Search Vendor Address', '', '', 0, 0, 1, 0, 0, '2006-07-18 00:56:10'),
(173, 'vendor_address:view_vendor_address', 'View', 'View Vendor Address', '', '', 0, 0, 1, 0, 0, '2006-07-18 00:56:10'),
(174, 'vendor_address:update_vendor_address', 'Edit', 'Update Vendor Address', '', '', 0, 0, 1, 0, 1, '2006-07-18 00:56:10'),
(175, 'vendor_address:delete_vendor_address', 'Delete', 'Delete Vendor Address', '', '', 0, 0, 1, 0, 0, '2006-07-18 00:56:10'),
(176, 'vendor_contact:add_vendor_contact', 'Add', 'Add Vendor Contact', '', '', 0, 0, 1, 0, 1, '2006-07-18 00:59:41'),
(177, 'vendor_contact:search_vendor_contact', 'Search', 'Search Vendor Contact', '', '', 0, 0, 1, 0, 0, '2006-07-18 00:59:41'),
(178, 'vendor_contact:view_vendor_contact', 'View', 'View Vendor Contact', '', '', 0, 0, 1, 0, 0, '2006-07-18 00:59:41'),
(179, 'vendor_contact:update_vendor_contact', 'Edit', 'Edit Vendor Contact', '', '', 0, 0, 1, 0, 0, '2006-07-18 00:59:41'),
(180, 'vendor_contact:delete_vendor_contact', 'Delete', 'Delete Vendor Contact', '', '', 0, 0, 1, 0, 0, '2006-07-18 00:59:41'),
(181, 'bill:add_bill', 'Add Bill', 'Add Bill', '', '', 2, 0, 1, 0, 3, '2006-07-18 01:05:07'),
(182, 'bill:search_bill', 'Search', 'Search Bills', '', '', 0, 0, 1, 0, 4, '2006-07-18 01:05:07'),
(183, 'bill:view_bill', 'View', 'View Bill', '', '', 0, 0, 1, 0, 0, '2006-07-18 01:05:07'),
(184, 'bill:update_bill', 'Edit', 'Edit Bill', '', '', 0, 0, 1, 0, 0, '2006-07-18 01:05:07'),
(185, 'bill:delete_bill', 'Delete', 'Delete Bill', '', '', 0, 0, 1, 0, 0, '2006-07-18 01:05:07'),
(186, 'system_to_workorder:add_system_to_workorder', 'Add', 'Add', '', '', 0, 0, 1, 0, 0, '2006-07-20 17:21:19'),
(187, 'system_to_workorder:search_system_to_workorder', 'Search', 'Search', '', '', 0, 0, 1, 0, 0, '2006-07-20 17:21:19'),
(188, 'system_to_workorder:view_system_to_workorder', 'View', 'View', '', '', 0, 0, 1, 0, 0, '2006-07-20 17:21:19'),
(189, 'system_to_workorder:update_system_to_workorder', 'Update', 'Update', '', '', 0, 0, 1, 0, 0, '2006-07-20 17:21:19'),
(190, 'system_to_workorder:delete_system_to_workorder', 'Delete', 'Delete', '', '', 0, 0, 1, 0, 0, '2006-07-20 17:21:19'),
(250, 'manufacture:delete_manufacture', 'delete', 'Delete', '', '', 0, 0, 1, 0, 0, '2006-09-11 03:00:17'),
(251, 'product_description:add_product_description', 'add', 'Add', '', '', 0, 0, 1, 0, 0, '2006-09-11 03:04:01'),
(236, 'category:add_category', 'Add Category', 'Add Category', '', '', 2, 0, 1, 0, 0, '2006-09-11 02:46:00'),
(235, 'product:delete_product', 'delete', 'Delete', '', '', 0, 0, 1, 0, 0, '2006-09-11 02:41:06'),
(234, 'product:update_product', 'update', 'update', '', '', 0, 0, 1, 0, 1, '2006-09-11 02:41:06'),
(232, 'product:search_product', 'search', 'Browse Products', '', '', 0, 0, 1, 0, 391, '2006-10-08 06:02:52'),
(231, 'product:add_product', 'add', 'Admin: Add Product', '', '', 0, 0, 1, 0, 163, '2006-10-08 07:24:53'),
(233, 'product:view_product', 'view', 'View', '', '', 0, 0, 1, 0, 155, '2006-09-11 02:41:06'),
(252, 'product_description:search_product_description', 'search', 'Search', '', '', 0, 0, 1, 0, 0, '2006-09-11 03:04:01'),
(249, 'manufacture:update_manufacture', 'update', 'Update', '', '', 0, 0, 1, 0, 1, '2006-09-11 03:00:17'),
(248, 'manufacture:view_manufacture', 'view', 'View', '', '', 0, 0, 1, 0, 3, '2006-09-11 03:00:17'),
(237, 'category:search_category', 'search', 'Search', '', '', 0, 0, 1, 0, 102, '2006-09-11 02:46:00'),
(238, 'category:view_category', 'view', 'View', '', '', 0, 0, 1, 0, 50, '2006-09-11 02:46:00'),
(239, 'category:update_category', 'update', 'update', '', '', 0, 0, 1, 0, 0, '2006-09-11 02:46:00'),
(240, 'category:delete_category', 'Delete Category', 'Delete Category', '', '', 3, 0, 1, 0, 0, '2006-09-11 02:46:00'),
(241, 'product_to_category:add_product_to_category', 'add', 'Add', '', '', 0, 0, 1, 0, 0, '2006-09-11 02:48:19'),
(242, 'product_to_category:search_product_to_category', 'search', 'Search', '', '', 0, 0, 1, 0, 0, '2006-09-11 02:48:19'),
(243, 'product_to_category:view_product_to_category', 'view', 'View', '', '', 0, 0, 1, 0, 0, '2006-09-11 02:48:19'),
(244, 'product_to_category:update_product_to_category', 'update', 'update', '', '', 0, 0, 1, 0, 0, '2006-09-11 02:48:19'),
(245, 'product_to_category:delete_product_to_category', 'delete', 'Delete', '', '', 0, 0, 1, 0, 0, '2006-09-11 02:48:19'),
(246, 'manufacture:add_manufacture', 'add', 'Add', '', '', 0, 0, 1, 0, 1, '2006-09-11 03:00:17'),
(247, 'manufacture:search_manufacture', 'search', 'Search', '', '', 0, 0, 1, 0, 6, '2006-09-11 03:00:17'),
(253, 'product_description:view_product_description', 'view', 'View', '', '', 0, 0, 1, 0, 0, '2006-09-11 03:04:01'),
(260, 'workorder_time:delete_workorder_time', 'delete', 'Delete', '', '', 0, 0, 1, 0, 0, '2006-09-12 22:29:23'),
(261, 'invoice:add_invoice', 'Add', 'Add Invoice', '', '', 0, 0, 1, 0, 0, '2006-09-29 05:27:02'),
(262, 'invoice:search_invoice', 'Search', 'Search Invoice', '', '', 0, 0, 1, 0, 332, '2006-09-29 05:27:02'),
(263, 'invoice:view_invoice', 'view', 'View Invoice', '', '', 0, 0, 1, 0, 527, '2006-09-29 05:27:02'),
(264, 'invoice:update_invoice', 'update', 'Update Invoice', '', '', 0, 0, 1, 0, 11, '2006-09-29 05:27:02'),
(265, 'invoice:delete_invoice', 'delete', 'Delete Invoice', '', '', 0, 0, 1, 0, 1, '2006-09-29 05:27:02'),
(266, 'invoice_labor:add_invoice_labor', 'add', 'Add Invoice Labor', '', '', 0, 0, 1, 0, 0, '2006-09-30 04:55:02'),
(267, 'invoice_labor:search_invoice_labor', 'search', 'Search Invoice Labor', '', '', 0, 0, 1, 0, 0, '2006-09-30 04:55:02'),
(268, 'invoice_labor:view_invoice_labor', 'view', 'View Invoice Labor', '', '', 0, 0, 1, 0, 0, '2006-09-30 04:55:02'),
(269, 'invoice_labor:update_invoice_labor', 'update', 'Update Invoice Labor', '', '', 0, 0, 1, 0, 0, '2006-09-30 04:55:02'),
(270, 'invoice_labor:delete_invoice_labor', 'delete', 'Delete Invoice Labor', '', '', 0, 0, 1, 0, 0, '2006-09-30 04:55:02'),
(271, 'invoice_part:add_invoice_part', 'add', 'Add Invoice Part', '', '', 0, 0, 1, 0, 0, '2006-09-30 04:58:19'),
(272, 'invoice_part:search_invoice_part', 'search', 'Search Invoice Part', '', '', 0, 0, 1, 0, 0, '2006-09-30 04:58:19'),
(273, 'invoice_part:view_invoice_part', 'view', 'View Invoice Part', '', '', 0, 0, 1, 0, 0, '2006-09-30 04:58:19'),
(274, 'invoice_part:update_invoice_part', 'update', 'Update Invoice Part', '', '', 0, 0, 1, 0, 0, '2006-09-30 04:58:19'),
(275, 'invoice_part:delete_invoice_part', 'delete', 'Delete Invoice Part', '', '', 0, 0, 1, 0, 0, '2006-09-30 04:58:19'),
(276, 'user:admin_view_all_users', 'Admin: View All Users', 'Admin Search Contacts', 'Displays all users for the admin', '', 0, 0, 1, 0, 168, '2006-10-06 03:52:33'),
(277, 'user:admin_view_user_detail', 'View Contact', 'View Contact', '', '', 0, 0, 1, 0, 663, '2006-10-06 15:14:29'),
(278, 'product_status:add_product_status', 'add', 'Add Product Status', '', '', 0, 0, 1, 0, 8, '2006-10-08 05:16:14'),
(279, 'product_status:search_product_status', 'search', 'Search Product Status', '', '', 0, 0, 1, 0, 19, '2006-10-08 05:16:14'),
(280, 'product_status:view_product_status', 'view', 'View Product Status', '', '', 0, 0, 1, 0, 3, '2006-10-08 05:16:14'),
(281, 'product_status:update_product_status', 'update', 'Update Product Status', '', '', 0, 0, 1, 0, 0, '2006-10-08 05:16:14'),
(282, 'product_status:delete_product_status', 'delete', 'Delete Product Status', '', '', 0, 0, 1, 0, 0, '2006-10-08 05:16:14'),
(293, 'tax_class:delete_tax_class', 'delete', 'Admin: Delete Tax Class', '', '', 0, 0, 1, 0, 0, '2006-10-08 09:16:49'),
(292, 'tax_class:update_tax_class', 'update', 'Admin: Update Tax Class', '', '', 0, 0, 1, 0, 0, '2006-10-08 09:16:49'),
(291, 'tax_class:view_tax_class', 'view', 'Admin: View Tax Class', '', '', 0, 0, 1, 0, 0, '2006-10-08 09:16:49'),
(290, 'tax_class:search_tax_class', 'search', 'Admin: Search Tax Class', '', '', 0, 0, 1, 0, 24, '2006-10-08 09:16:49'),
(289, 'tax_class:add_tax_class', 'add', 'Admin: Add Tax Class', '', '', 0, 0, 1, 0, 0, '2006-10-08 09:16:49'),
(288, 'product:admin_search_products', 'Admin: Search Products', 'Admin: Search Products', '', '', 0, 0, 1, 0, 42, '2006-10-08 07:02:32'),
(294, 'tax_rate:add_tax_rate', 'add', 'Admin: Add Tax Rates', '', '', 0, 0, 1, 0, 0, '2006-10-08 09:20:21'),
(295, 'tax_rate:search_tax_rate', 'search', 'Admin: Search Tax Rates', '', '', 0, 0, 1, 0, 1, '2006-10-08 09:20:21'),
(296, 'tax_rate:view_tax_rate', 'view', 'Admin: View Tax Rates', '', '', 0, 0, 1, 0, 0, '2006-10-08 09:20:21'),
(297, 'tax_rate:update_tax_rate', 'update', 'Admin: Update Tax Rates', '', '', 0, 0, 1, 0, 0, '2006-10-08 09:20:21'),
(298, 'tax_rate:delete_tax_rate', 'delete', 'Admin: Delete Tax Rates', '', '', 0, 0, 1, 0, 0, '2006-10-08 09:20:21'),
(299, 'tax_type:add_tax_type', 'add', 'Admin: Add Tax Type', '', '', 0, 0, 1, 0, 10, '2006-10-08 09:26:41'),
(300, 'tax_type:search_tax_type', 'search', 'Admin: Search Tax Type', '', '', 0, 0, 1, 0, 0, '2006-10-08 09:26:41'),
(301, 'tax_type:view_tax_type', 'view', 'Admin: View Tax Type', '', '', 0, 0, 1, 0, 2, '2006-10-08 09:26:41'),
(302, 'tax_type:update_tax_type', 'update', 'Admin: Update Tax Type', '', '', 0, 0, 1, 0, 0, '2006-10-08 09:26:41'),
(303, 'tax_type:delete_tax_type', 'delete', 'Admin: Delete Tax Type', '', '', 0, 0, 1, 0, 0, '2006-10-08 09:26:41'),
(304, 'file:add_file', 'add', 'Admin: Add File', '', '', 0, 0, 1, 0, 0, '2006-10-08 09:31:44'),
(305, 'file:search_file', 'search', 'Admin: Search Files', '', '', 0, 0, 1, 0, 1, '2006-10-08 09:31:44'),
(306, 'file:view_file', 'view', 'Admin: View File', '', '', 0, 0, 1, 0, 0, '2006-10-08 09:31:44'),
(307, 'file:update_file', 'update', 'Admin: Update File', '', '', 0, 0, 1, 0, 0, '2006-10-08 09:31:44'),
(308, 'file:delete_file', 'delete', 'Admin: Delete File', '', '', 0, 0, 1, 0, 3, '2006-10-08 09:31:44'),
(309, 'payment_option:add_payment_option', 'add', 'Admin: Add Payment Option', '', '', 0, 0, 1, 0, 11, '2006-10-12 03:29:27'),
(310, 'payment_option:search_payment_option', 'search', 'Admin: Search Payment Options', '', '', 0, 0, 1, 0, 19, '2006-10-12 03:29:27'),
(311, 'payment_option:view_payment_option', 'view', 'View Payment Options', '', '', 0, 0, 1, 0, 5, '2006-10-12 03:29:27'),
(312, 'payment_option:update_payment_option', 'update', 'Admin: Update Payment Option', '', '', 0, 0, 1, 0, 0, '2006-10-12 03:29:27'),
(313, 'payment_option:delete_payment_option', 'delete', 'Admin: Delete Payment Option', '', '', 0, 0, 1, 0, 0, '2006-10-12 03:29:27'),
(314, 'credit_card:add_credit_card', 'Add', 'Admin:Add Credit Card', '', '', 0, 0, 1, 0, 24, '2006-12-21 09:31:24'),
(315, 'credit_card:search_credit_card', 'Search', 'Admin:Search Credit Cards', '', '', 0, 0, 1, 0, 48, '2006-12-21 09:31:24'),
(316, 'credit_card:view_credit_card', 'View', 'Admin:VIew Credit Card', '', '', 0, 0, 1, 0, 20, '2006-12-21 09:31:24'),
(317, 'credit_card:update_credit_card', 'Update', 'Admin:Update Credit Card', '', '', 0, 0, 1, 0, 10, '2006-12-21 09:31:24'),
(318, 'credit_card:delete_credit_card', 'Delete', 'Admin:Delete Credit Card', '', '', 0, 0, 1, 0, 0, '2006-12-21 09:31:24'),
(319, 'cc_payment:add_cc_payment', 'Add', 'Admin:Add CC Payment', '', '', 0, 0, 1, 0, 0, '2006-12-22 05:31:04'),
(320, 'cc_payment:search_cc_payment', 'Search', 'Admin:Search CC Payment', '', '', 0, 0, 1, 0, 0, '2006-12-22 05:31:04'),
(321, 'cc_payment:view_cc_payment', 'View', 'Admin:View CC Payment', '', '', 0, 0, 1, 0, 0, '2006-12-22 05:31:04'),
(322, 'cc_payment:update_cc_payment', 'Update', 'Admin: Update CC Payment', '', '', 0, 0, 1, 0, 0, '2006-12-22 05:31:04'),
(323, 'cc_payment:delete_cc_payment', 'Delete', 'Admin: Delete CC Payment', '', '', 0, 0, 1, 0, 0, '2006-12-22 05:31:04'),
(324, 'check_payment:add_check_payment', 'Add', 'Admin: Add Check Payment', '', '', 0, 0, 1, 0, 0, '2006-12-24 20:48:35'),
(325, 'check_payment:search_check_payment', 'Search', 'Admin:', '', '', 0, 0, 1, 0, 0, '2006-12-24 20:48:35'),
(326, 'check_payment:view_check_payment', 'View', 'Admin: View Check Payment', '', '', 0, 0, 1, 0, 0, '2006-12-24 20:48:35'),
(327, 'check_payment:update_check_payment', 'Update', 'Admin: Update Check Payment', '', '', 0, 0, 1, 0, 0, '2006-12-24 20:48:35'),
(328, 'check_payment:delete_check_payment', 'Delete', 'Admin: Delete Check Payment', '', '', 0, 0, 1, 0, 0, '2006-12-24 20:48:35'),
(329, 'core:admin_main_menu', 'Main Menu', 'Admin: Main Menu', 'Edit Main Menu', '', 0, 0, 1, 0, 56, '2007-01-05 04:30:12'),
(330, 'core:admin_add_to_main_menu', 'Admin: Add Page To Main Menu', 'Admin: Add Page To Main Menu', '', '', 0, 0, 1, 0, 58, '2007-01-05 04:37:55'),
(331, 'lead_type:add_lead_type', 'Add', 'Add Lead Type', '', '', 0, 0, 1, 0, 36, '2007-03-25 09:07:36'),
(332, 'lead_type:search_lead_type', 'Search', 'Search Lead Types', '', '', 0, 0, 1, 0, 56, '2007-03-25 09:07:36'),
(333, 'lead_type:view_lead_type', 'View', 'View Lead Type', '', '', 0, 0, 1, 0, 17, '2007-03-25 09:07:36'),
(334, 'lead_type:update_lead_type', 'Update', 'Edit Lead Type', '', '', 0, 0, 1, 0, 0, '2007-03-25 09:07:36'),
(335, 'lead_type:delete_lead_type', 'Delete', 'Delete Lead Type', '', '', 0, 0, 1, 0, 0, '2007-03-25 09:07:36'),
(336, 'lead_status:add_lead_status', 'Add', 'Add Lead Status', '', '', 0, 0, 1, 0, 13, '2007-03-25 09:31:12'),
(337, 'lead_status:search_lead_status', 'Search', 'Search Lead Status', '', '', 0, 0, 1, 0, 23, '2007-03-25 09:31:12'),
(338, 'lead_status:view_lead_status', 'View', 'View Lead Status', '', '', 0, 0, 1, 0, 8, '2007-03-25 09:31:12'),
(339, 'lead_status:update_lead_status', 'Update', 'Edit Lead Status', '', '', 0, 0, 1, 0, 1, '2007-03-25 09:31:12'),
(340, 'lead_status:delete_lead_status', 'Delete', 'Delete Lead Status', '', '', 0, 0, 1, 0, 0, '2007-03-25 09:31:12'),
(341, 'leads:add', 'Add', 'Add New Lead', '', '', 0, 0, 1, 0, 246, '2007-03-26 07:09:01'),
(342, 'leads:search_leads', 'Search', 'Search Leads', '', '', 0, 0, 1, 0, 584, '2007-03-26 07:48:45'),
(343, 'campaign:add_campaign', 'Add', 'Add Campaign', '', '', 0, 0, 1, 0, 98, '2007-03-26 13:59:19'),
(344, 'campaign:search_campaign', 'Search', 'Search Campaign', '', '', 0, 0, 1, 0, 0, '2007-03-26 13:59:19'),
(345, 'campaign:view_campaign', 'View', 'View Campaign', '', '', 0, 0, 1, 0, 16, '2007-03-26 13:59:19'),
(346, 'campaign:update_campaign', 'Update', 'Edit Campaign', '', '', 0, 0, 1, 0, 3, '2007-03-26 13:59:19'),
(347, 'campaign:delete_campaign', 'Delete', 'Delete Campaign', '', '', 0, 0, 1, 0, 0, '2007-03-26 13:59:19'),
(348, 'campaign_type:add_campaign_type', 'Add', 'Add Campaign Type', '', '', 0, 0, 1, 0, 29, '2007-03-26 14:05:34'),
(349, 'campaign_type:search_campaign_type', 'Search', 'Search Campaign Type', '', '', 0, 0, 1, 0, 0, '2007-03-26 14:05:34'),
(350, 'campaign_type:view_campaign_type', 'View', 'View Campaign Type', '', '', 0, 0, 1, 0, 6, '2007-03-26 14:05:34'),
(351, 'campaign_type:update_campaign_type', 'Update', 'Edit Campaign Type', '', '', 0, 0, 1, 0, 0, '2007-03-26 14:05:34'),
(352, 'campaign_type:delete_campaign_type', 'Delete', 'Delete Campaign Type', '', '', 0, 0, 1, 0, 0, '2007-03-26 14:05:34'),
(353, 'leads:view_lead', 'View', 'View Lead', '', '', 0, 0, 1, 0, 921, '2007-03-27 05:35:39'),
(354, 'lead_call:add_lead_call', 'Add', 'Lead Call Add', '', '', 0, 0, 1, 0, 0, '2007-03-27 11:18:58'),
(355, 'lead_call:search_lead_call', 'Search', 'Lead Call Search', '', '', 0, 0, 1, 0, 0, '2007-03-27 11:18:58'),
(356, 'lead_call:view_lead_call', 'View', 'Lead Call View', '', '', 0, 0, 1, 0, 22, '2007-03-27 11:18:58'),
(357, 'lead_call:update_lead_call', 'Update', 'Lead Call Edit', '', '', 0, 0, 1, 0, 0, '2007-03-27 11:18:58'),
(358, 'lead_call:delete_lead_call', 'Delete', 'Lead Call Delete', '', '', 0, 0, 1, 0, 0, '2007-03-27 11:18:58'),
(359, 'lead_meeting:add_lead_meeting', 'Add', 'Add Lead Meeting', '', '', 0, 0, 1, 0, 0, '2007-03-27 18:00:14'),
(360, 'lead_meeting:search_lead_meeting', 'Search', 'Search Lead Meeting', '', '', 0, 0, 1, 0, 0, '2007-03-27 18:00:14'),
(361, 'lead_meeting:view_lead_meeting', 'View', 'View Lead Meeting', '', '', 0, 0, 1, 0, 0, '2007-03-27 18:00:14'),
(362, 'lead_meeting:update_lead_meeting', 'Update', 'Edit Lead Meeting', '', '', 0, 0, 1, 0, 0, '2007-03-27 18:00:14'),
(363, 'lead_meeting:delete_lead_meeting', 'Delete', 'Delete Lead Meeting', '', '', 0, 0, 1, 0, 0, '2007-03-27 18:00:14'),
(364, 'lead_email:add_lead_email', 'Add', 'Add Lead Email', '', '', 0, 0, 1, 0, 0, '2007-03-28 04:01:56'),
(365, 'lead_email:search_lead_email', 'Search', 'Search Lead Email', '', '', 0, 0, 1, 0, 0, '2007-03-28 04:01:56'),
(366, 'lead_email:view_lead_email', 'View', 'View Lead Email', '', '', 0, 0, 1, 0, 0, '2007-03-28 04:01:56'),
(367, 'lead_email:update_lead_email', 'Update', 'Edit  Lead Email', '', '', 0, 0, 1, 0, 0, '2007-03-28 04:01:56'),
(368, 'lead_email:delete_lead_email', 'Delete', 'Delete Lead Email', '', '', 0, 0, 1, 0, 0, '2007-03-28 04:01:56'),
(369, 'contract_type:add_contract_type', 'Add', 'Add Contract Type', '', '', 0, 0, 1, 0, 4, '2007-03-28 12:54:11'),
(370, 'contract_type:search_contract_type', 'Search', 'Search Contract Type', '', '', 0, 0, 1, 0, 204, '2007-03-28 12:54:11'),
(371, 'contract_type:view_contract_type', 'View', 'View Contract Type', '', '', 0, 0, 1, 0, 0, '2007-03-28 12:54:11'),
(372, 'contract_type:update_contract_type', 'Update', 'Edit Contract Type', '', '', 0, 0, 1, 0, 0, '2007-03-28 12:54:11'),
(373, 'contract_type:delete_contract_type', 'Delete', 'Delete Contract Type', '', '', 0, 0, 1, 0, 0, '2007-03-28 12:54:11'),
(374, 'calendar:add_calendar', 'Add', 'Add Event To Calendar', '', '', 0, 0, 1, 0, 0, '2007-03-30 09:57:13'),
(375, 'calendar:search_calendar', 'Search', 'Search Calendar', '', '', 0, 0, 1, 0, 0, '2007-03-30 09:57:13'),
(376, 'calendar:view_calendar', 'View', 'View Calendar Event', '', '', 0, 0, 1, 0, 0, '2007-03-30 09:57:13'),
(377, 'calendar:update_calendar', 'Update', 'Edit Calendar Event', '', '', 0, 0, 1, 0, 0, '2007-03-30 09:57:13'),
(378, 'calendar:delete_calendar', 'Delete', 'Delete Calendar Event', '', '', 0, 0, 1, 0, 0, '2007-03-30 09:57:13'),
(379, 'calendar:view_month', 'View Calendar', 'View Calendar', '', '', 0, 0, 1, 0, 932, '2007-03-30 21:00:37'),
(380, 'note:add_note', 'Add', 'Add Notes', '', '', 0, 0, 1, 0, 0, '2007-04-02 04:57:36'),
(381, 'note:search_note', 'Search', 'Search Notes', '', '', 0, 0, 1, 0, 0, '2007-04-02 04:57:36'),
(382, 'note:view_note', 'View', 'View  Note', '', '', 0, 0, 1, 0, 0, '2007-04-02 04:57:36'),
(383, 'note:update_note', 'Update', 'Edit  Note', '', '', 0, 0, 1, 0, 0, '2007-04-02 04:57:36'),
(384, 'note:delete_note', 'Delete', 'Delete  Note', '', '', 0, 0, 1, 0, 0, '2007-04-02 04:57:36'),
(385, 'file:add_file', 'Add', 'Add File', '', '', 0, 0, 1, 0, 0, '2007-04-02 08:12:22'),
(386, 'file:search_file', 'Search', 'Search for Files', '', '', 0, 0, 1, 0, 0, '2007-04-02 08:12:22'),
(387, 'file:view_file', 'View', 'View File', '', '', 0, 0, 1, 0, 0, '2007-04-02 08:12:22'),
(388, 'file:update_file', 'Update', 'Edit File', '', '', 0, 0, 1, 0, 0, '2007-04-02 08:12:22'),
(389, 'file:delete_file', 'Delete', 'Delete File', '', '', 0, 0, 1, 0, 3, '2007-04-02 08:12:22'),
(390, 'user:search_users', 'Search Contacts', 'Search Contacts', '', '', 0, 0, 1, 0, 374, '2007-04-05 05:20:19'),
(391, 'page=user:my_home', 'My Home', 'My Home', '', '', 0, 0, 1, 0, 0, '2007-04-07 06:00:20'),
(392, 'user:my_home', 'My Home', 'My Home', '', '', 0, 0, 1, 0, 1300, '2007-04-07 06:19:22'),
(393, 'crm_group:add_crm_group', 'Add', 'Add A Group', '', '', 0, 0, 1, 0, 6, '2007-04-09 06:03:01'),
(394, 'crm_group:search_crm_group', 'Search', 'Search Group', '', '', 0, 0, 1, 0, 0, '2007-04-09 06:03:01'),
(395, 'crm_group:view_crm_group', 'View', 'View A Group', '', '', 0, 0, 1, 0, 2, '2007-04-09 06:03:01'),
(396, 'crm_group:update_crm_group', 'Update', 'Edit Group', '', '', 0, 0, 1, 0, 0, '2007-04-09 06:03:01'),
(397, 'crm_group:delete_crm_group', 'Delete', 'Delete Group', '', '', 0, 0, 1, 0, 0, '2007-04-09 06:03:01'),
(398, 'workorder:complete_workorder', 'Complete Work Order', 'Complete Work Order', '', '', 0, 0, 0, 0, 80, '2007-06-12 07:27:43'),
(399, 'service:load_all', 'Flate Rate Services', 'Flate Rate Services', '', '', 0, 0, 1, 0, 53, '2007-09-01 06:16:19'),
(400, 'user:ajax_search_employees', 'View Employees', 'View Employees', 'View your employees', '', 0, 0, 1, 0, 1, '2007-10-03 20:05:08'),
(401, 'user:add_employee', 'Add New Employee', 'Add New Employee', '', '', 0, 0, 1, 0, 0, '2007-10-03 20:06:06'),
(402, 'user:view_employee', 'View Employee', 'View Employee', '', '', 0, 0, 1, 0, 0, '2007-10-03 21:40:35');



--
-- Table structure for table `payment_option`
--

DROP TABLE IF EXISTS `payment_option`;
CREATE TABLE `payment_option` (
  `payment_option_id` int(20) NOT NULL auto_increment,
  `payment_option_text` char(64) NOT NULL default '',
  `payment_option_active` tinyint(3) default NULL,
  `payment_option_order` smallint(8) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`payment_option_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_option`
--

LOCK TABLES `payment_option` WRITE;
/*!40000 ALTER TABLE `payment_option` DISABLE KEYS */;
INSERT INTO `payment_option` VALUES (1,'Credit Card',1,1,'2006-10-12 10:38:32'),(2,'Check',1,2,'2006-10-12 10:38:50'),(3,'Cash',1,3,'2006-10-12 10:39:18'),(4,'Gift Certificate',1,4,'2006-10-12 10:39:37'),(5,'Pay Pal',1,5,'2006-10-12 10:39:59');
/*!40000 ALTER TABLE `payment_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(20) NOT NULL auto_increment,
  `product_sku` char(32) NOT NULL default '',
  `product_upc` char(64) NOT NULL default '',
  `product_type` int(11) default NULL,
  `product_quantity` int(11) default NULL,
  `product_model` char(64) default NULL,
  `product_image` char(64) default NULL,
  `product_price` float(15,4) default NULL,
  `product_markup` float(15,4) NOT NULL default '0.0000',
  `product_virtual` tinyint(1) default NULL,
  `product_date_added` int(11) default NULL,
  `product_date_available` int(11) default NULL,
  `product_weight` float(15,4) default NULL,
  `product_status` tinyint(1) default NULL,
  `tax_class_id` int(11) default NULL,
  `manufacturer_id` int(11) default NULL,
  `product_ordered` int(11) default NULL,
  `product_quantity_order_min` int(11) default NULL,
  `product_quantity_order_units` int(11) default NULL,
  `product_priced_by_attribute` tinyint(1) default NULL,
  `product_is_free` tinyint(1) default NULL,
  `product_is_call` tinyint(1) default NULL,
  `product_is_always_free_shipping` tinyint(1) default NULL,
  `product_quantity_order_max` int(11) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`product_id`),
  KEY `product_type` (`product_type`),
  KEY `product_virtual` (`product_virtual`),
  KEY `tax_class_id` (`tax_class_id`),
  KEY `manufacturer_id` (`manufacturer_id`),
  KEY `product_sku` (`product_sku`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_description`
--

DROP TABLE IF EXISTS `product_description`;
CREATE TABLE `product_description` (
  `product_description_id` int(20) NOT NULL auto_increment,
  `product_id` int(11) default NULL,
  `product_name` varchar(64) default NULL,
  `product_description` text,
  `product_url` varchar(64) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`product_description_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_description`
--

LOCK TABLES `product_description` WRITE;
/*!40000 ALTER TABLE `product_description` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_manufacture`
--

DROP TABLE IF EXISTS `product_manufacture`;
CREATE TABLE `product_manufacture` (
  `product_manufacture_id` int(20) NOT NULL auto_increment,
  `product_manufacture_name` char(64) NOT NULL default '',
  `product_manufacture_image` char(64) default NULL,
  `product_manufacture_url` char(64) default NULL,
  `product_manufacture_view` int(20) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`product_manufacture_id`)
) ENGINE=MyISAM AUTO_INCREMENT=221 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_manufacture`
--

LOCK TABLES `product_manufacture` WRITE;
/*!40000 ALTER TABLE `product_manufacture` DISABLE KEYS */;
INSERT INTO `product_manufacture` VALUES (1,'Winstronics',NULL,NULL,NULL,'2007-06-08 13:34:05'),(2,'Enlight Co.',NULL,NULL,NULL,'2007-06-08 13:34:05'),(3,'Mitsumi',NULL,NULL,NULL,'2007-06-08 13:34:05'),(4,'Micron',NULL,NULL,NULL,'2007-06-08 13:34:05'),(5,'Promise',NULL,NULL,NULL,'2007-06-08 13:34:05'),(6,'ViewSonic',NULL,NULL,NULL,'2007-06-08 13:34:05'),(7,'Supermicro',NULL,NULL,NULL,'2007-06-08 13:34:05'),(8,'Microsoft',NULL,NULL,NULL,'2007-06-08 13:34:05'),(9,'APC',NULL,NULL,NULL,'2007-06-08 13:34:05'),(10,'Global',NULL,NULL,NULL,'2007-06-08 13:34:05'),(11,'AIC',NULL,NULL,NULL,'2007-06-08 13:34:05'),(12,'Tyan',NULL,NULL,NULL,'2007-06-08 13:34:05'),(13,'Chen Ming',NULL,NULL,NULL,'2007-06-08 13:34:05'),(14,'Y-Hsin (Rackmount Cabinets)',NULL,NULL,NULL,'2007-06-08 13:34:05'),(15,'Microwise',NULL,NULL,NULL,'2007-06-08 13:34:05'),(16,'Actiontec',NULL,NULL,NULL,'2007-06-08 13:34:05'),(17,'In-Win',NULL,NULL,NULL,'2007-06-08 13:34:05'),(18,'Sparkle Power Inc.',NULL,NULL,NULL,'2007-06-08 13:34:05'),(19,'Netgear',NULL,NULL,NULL,'2007-06-08 13:34:05'),(20,'eVGA',NULL,NULL,NULL,'2007-06-08 13:34:05'),(21,'Cisco Systems',NULL,NULL,NULL,'2007-06-08 13:34:05'),(22,'General',NULL,NULL,NULL,'2007-06-08 13:34:05'),(23,'Adaptec',NULL,NULL,NULL,'2007-06-08 13:34:05'),(24,'ASI',NULL,NULL,NULL,'2007-06-08 13:34:05'),(25,'Linksys',NULL,NULL,NULL,'2007-06-08 13:34:05'),(26,'Nspire',NULL,NULL,NULL,'2007-06-08 13:34:05'),(27,'DFI',NULL,NULL,NULL,'2007-06-08 13:34:05'),(28,'3Com',NULL,NULL,NULL,'2007-06-08 13:34:05'),(29,'CTX International',NULL,NULL,NULL,'2007-06-08 13:34:05'),(30,'Matrox',NULL,NULL,NULL,'2007-06-08 13:34:05'),(31,'Apex Computer Technology',NULL,NULL,NULL,'2007-06-08 13:34:05'),(32,'Jaton',NULL,NULL,NULL,'2007-06-08 13:34:05'),(33,'Thermaltake',NULL,NULL,NULL,'2007-06-08 13:34:05'),(34,'Creative Labs',NULL,NULL,NULL,'2007-06-08 13:34:05'),(35,'Afreey',NULL,NULL,NULL,'2007-06-08 13:34:05'),(36,'ASUSTeK',NULL,NULL,NULL,'2007-06-08 13:34:05'),(37,'Logitech',NULL,NULL,NULL,'2007-06-08 13:34:05'),(38,'ATI-Sapphire',NULL,NULL,NULL,'2007-06-08 13:34:05'),(39,'Keytronic',NULL,NULL,NULL,'2007-06-08 13:34:05'),(40,'Vantec Thermal Technologies',NULL,NULL,NULL,'2007-06-08 13:34:05'),(41,'D-Link',NULL,NULL,NULL,'2007-06-08 13:34:05'),(42,'Hansol',NULL,NULL,NULL,'2007-06-08 13:34:05'),(43,'Cremax',NULL,NULL,NULL,'2007-06-08 13:34:05'),(44,'Opti UPS',NULL,NULL,NULL,'2007-06-08 13:34:05'),(45,'HighPoint',NULL,NULL,NULL,'2007-06-08 13:34:05'),(46,'Western Digital',NULL,NULL,NULL,'2007-06-08 13:34:05'),(47,'US Robotics',NULL,NULL,NULL,'2007-06-08 13:34:05'),(48,'ConnectGear',NULL,NULL,NULL,'2007-06-08 13:34:05'),(49,'Teac',NULL,NULL,NULL,'2007-06-08 13:34:05'),(50,'Broadway Co.',NULL,NULL,NULL,'2007-06-08 13:34:05'),(51,'Memory',NULL,NULL,NULL,'2007-06-08 13:34:05'),(52,'Vastech',NULL,NULL,NULL,'2007-06-08 13:34:05'),(53,'Optiquest',NULL,NULL,NULL,'2007-06-08 13:34:05'),(54,'Sony',NULL,NULL,NULL,'2007-06-08 13:34:05'),(55,'Vitex',NULL,NULL,NULL,'2007-06-08 13:34:05'),(56,'Kingston',NULL,NULL,NULL,'2007-06-08 13:34:05'),(57,'LG Electronics',NULL,NULL,NULL,'2007-06-08 13:34:05'),(58,'Casedge Inc.',NULL,NULL,NULL,'2007-06-08 13:34:05'),(59,'NTI Software',NULL,NULL,NULL,'2007-06-08 13:34:05'),(60,'IBM',NULL,NULL,NULL,'2007-06-08 13:34:05'),(61,'ATP',NULL,NULL,NULL,'2007-06-08 13:34:05'),(62,'Toshiba',NULL,NULL,NULL,'2007-06-08 13:34:05'),(63,'Intel Corporation',NULL,NULL,NULL,'2007-06-08 13:34:05'),(64,'ASUS Notebooks',NULL,NULL,NULL,'2007-06-08 13:34:05'),(65,'Apacer',NULL,NULL,NULL,'2007-06-08 13:34:05'),(66,'Lian-Li',NULL,NULL,NULL,'2007-06-08 13:34:05'),(67,'MSI (Micro Star)',NULL,NULL,NULL,'2007-06-08 13:34:05'),(68,'Belkin',NULL,NULL,NULL,'2007-06-08 13:34:05'),(69,'Shuttle',NULL,NULL,NULL,'2007-06-08 13:34:05'),(70,'Maxtor',NULL,NULL,NULL,'2007-06-08 13:34:05'),(71,'ATI-Hightech',NULL,NULL,NULL,'2007-06-08 13:34:05'),(72,'SAMSUNG SEMICONDUCTORINC(SSI)',NULL,NULL,NULL,'2007-06-08 13:34:05'),(73,'BenQ',NULL,NULL,NULL,'2007-06-08 13:34:05'),(74,'Spec Research',NULL,NULL,NULL,'2007-06-08 13:34:05'),(75,'Roxio',NULL,NULL,NULL,'2007-06-08 13:34:05'),(76,'Hyundai/HYU',NULL,NULL,NULL,'2007-06-08 13:34:05'),(77,'Can Technology',NULL,NULL,NULL,'2007-06-08 13:34:05'),(78,'3DLabs',NULL,NULL,NULL,'2007-06-08 13:34:05'),(79,'Iomega',NULL,NULL,NULL,'2007-06-08 13:34:05'),(80,'Corsair Memory',NULL,NULL,NULL,'2007-06-08 13:34:05'),(81,'NEC',NULL,NULL,NULL,'2007-06-08 13:34:05'),(82,'OptoRite',NULL,NULL,NULL,'2007-06-08 13:34:05'),(83,'XFX/Division of Pine',NULL,NULL,NULL,'2007-06-08 13:34:05'),(84,'Verbatim',NULL,NULL,NULL,'2007-06-08 13:34:05'),(85,'Seagate Technology',NULL,NULL,NULL,'2007-06-08 13:34:05'),(86,'SOYO Mothboard',NULL,NULL,NULL,'2007-06-08 13:34:05'),(87,'Athenatech',NULL,NULL,NULL,'2007-06-08 13:34:05'),(88,'Juster',NULL,NULL,NULL,'2007-06-08 13:34:05'),(89,'Opto Disc.',NULL,NULL,NULL,'2007-06-08 13:34:05'),(90,'Gigabyte',NULL,NULL,NULL,'2007-06-08 13:34:05'),(91,'Plextor',NULL,NULL,NULL,'2007-06-08 13:34:05'),(92,'Liteon',NULL,NULL,NULL,'2007-06-08 13:34:05'),(93,'Antec',NULL,NULL,NULL,'2007-06-08 13:34:05'),(94,'Aopen',NULL,NULL,NULL,'2007-06-08 13:34:05'),(95,'Samsung',NULL,NULL,NULL,'2007-06-08 13:34:05'),(96,'Fudin',NULL,NULL,NULL,'2007-06-08 13:34:05'),(97,'AOC/EPI',NULL,NULL,NULL,'2007-06-08 13:34:05'),(98,'Certance',NULL,NULL,NULL,'2007-06-08 13:34:05'),(99,'M-Systems',NULL,NULL,NULL,'2007-06-08 13:34:05'),(100,'Simpletech',NULL,NULL,NULL,'2007-06-08 13:34:05'),(101,'Albatron',NULL,NULL,NULL,'2007-06-08 13:34:05'),(102,'Qtronix',NULL,NULL,NULL,'2007-06-08 13:34:05'),(103,'Buslink',NULL,NULL,NULL,'2007-06-08 13:34:05'),(104,'Cast Technology',NULL,NULL,NULL,'2007-06-08 13:34:05'),(105,'Lexar Media',NULL,NULL,NULL,'2007-06-08 13:34:05'),(106,'Crucial',NULL,NULL,NULL,'2007-06-08 13:34:05'),(107,'PQI',NULL,NULL,NULL,'2007-06-08 13:34:05'),(108,'Power Color Computers',NULL,NULL,NULL,'2007-06-08 13:34:05'),(109,'I Copy 2',NULL,NULL,NULL,'2007-06-08 13:34:05'),(110,'SanDisk',NULL,NULL,NULL,'2007-06-08 13:34:05'),(111,'ABIT',NULL,NULL,NULL,'2007-06-08 13:34:05'),(112,'Altec Lansing',NULL,NULL,NULL,'2007-06-08 13:34:05'),(113,'HP Hewllett Packard',NULL,NULL,NULL,'2007-06-08 13:34:05'),(114,'Elitegroup Computer Systems',NULL,NULL,NULL,'2007-06-08 13:34:05'),(115,'PNY Technology',NULL,NULL,NULL,'2007-06-08 13:34:05'),(116,'NU Technology',NULL,NULL,NULL,'2007-06-08 13:34:05'),(117,'Quantum',NULL,NULL,NULL,'2007-06-08 13:34:05'),(118,'Uniwill',NULL,NULL,NULL,'2007-06-08 13:34:05'),(119,'AGneovo',NULL,NULL,NULL,'2007-06-08 13:34:05'),(120,'Jetway',NULL,NULL,NULL,'2007-06-08 13:34:05'),(121,'AMD',NULL,NULL,NULL,'2007-06-08 13:34:05'),(122,'Patriot - PDP',NULL,NULL,NULL,'2007-06-08 13:34:05'),(123,'Chenbro',NULL,NULL,NULL,'2007-06-08 13:34:05'),(124,'A-DATA Technology',NULL,NULL,NULL,'2007-06-08 13:34:05'),(125,'Advueu',NULL,NULL,NULL,'2007-06-08 13:34:05'),(126,'Infineon Memory',NULL,NULL,NULL,'2007-06-08 13:34:05'),(127,'Viking',NULL,NULL,NULL,'2007-06-08 13:34:05'),(128,'LSI Logic',NULL,NULL,NULL,'2007-06-08 13:34:05'),(129,'Kworld',NULL,NULL,NULL,'2007-06-08 13:34:05'),(130,'Computer Associates',NULL,NULL,NULL,'2007-06-08 13:34:05'),(131,'Twin Micro',NULL,NULL,NULL,'2007-06-08 13:34:05'),(132,'Silverstone MCE Cases',NULL,NULL,NULL,'2007-06-08 13:34:05'),(133,'American Industrial System Inc',NULL,NULL,NULL,'2007-06-08 13:34:05'),(134,'Ahanix',NULL,NULL,NULL,'2007-06-08 13:34:05'),(135,'XGI TECHNOLOGY',NULL,NULL,NULL,'2007-06-08 13:34:05'),(136,'MGE/XG',NULL,NULL,NULL,'2007-06-08 13:34:05'),(137,'Zalman',NULL,NULL,NULL,'2007-06-08 13:34:05'),(138,'Prolink',NULL,NULL,NULL,'2007-06-08 13:34:05'),(139,'Y.C. Cable',NULL,NULL,NULL,'2007-06-08 13:34:05'),(140,'Aeneon',NULL,NULL,NULL,'2007-06-08 13:34:05'),(141,'NERO',NULL,NULL,NULL,'2007-06-08 13:34:05'),(142,'OCZ TECHNOLOGY',NULL,NULL,NULL,'2007-06-08 13:34:05'),(143,'Clevo',NULL,NULL,NULL,'2007-06-08 13:34:05'),(144,'SMART DISK CORP.',NULL,NULL,NULL,'2007-06-08 13:34:05'),(145,'PC Chips',NULL,NULL,NULL,'2007-06-08 13:34:05'),(146,'MEMOREX',NULL,NULL,NULL,'2007-06-08 13:34:05'),(147,'ATRIX',NULL,NULL,NULL,'2007-06-08 13:34:05'),(148,'Fujitsu',NULL,NULL,NULL,'2007-06-08 13:34:05'),(149,'CMC Magnetics',NULL,NULL,NULL,'2007-06-08 13:34:05'),(150,'WYSE TECHNOLOGY',NULL,NULL,NULL,'2007-06-08 13:34:05'),(151,'Infrant Technoogies Inc.',NULL,NULL,NULL,'2007-06-08 13:34:05'),(152,'ExcelStor Technology',NULL,NULL,NULL,'2007-06-08 13:34:05'),(153,'Thecus Technology Corp.',NULL,NULL,NULL,'2007-06-08 13:34:05'),(154,'Plantronics',NULL,NULL,NULL,'2007-06-08 13:34:05'),(155,'Focus',NULL,NULL,NULL,'2007-06-08 13:34:05'),(156,'Wasp Barcode',NULL,NULL,NULL,'2007-06-08 13:34:05'),(157,'Powerware',NULL,NULL,NULL,'2007-06-08 13:34:05'),(158,'NZXT',NULL,NULL,NULL,'2007-06-08 13:34:05'),(159,'FortiGate',NULL,NULL,NULL,'2007-06-08 13:34:05'),(160,'Pioneer',NULL,NULL,NULL,'2007-06-08 13:34:05'),(161,'Ezonics',NULL,NULL,NULL,'2007-06-08 13:34:05'),(162,'Veritas',NULL,NULL,NULL,'2007-06-08 13:34:05'),(163,'Targus',NULL,NULL,NULL,'2007-06-08 13:34:05'),(164,'AGneovo Consignment',NULL,NULL,NULL,'2007-06-08 13:34:05'),(165,'Encore',NULL,NULL,NULL,'2007-06-08 13:34:05'),(166,'ACE',NULL,NULL,NULL,'2007-06-08 13:34:05'),(167,'Hitachi Global Storage',NULL,NULL,NULL,'2007-06-08 13:34:05'),(168,'Midentiti',NULL,NULL,NULL,'2007-06-08 13:34:05'),(169,'Belview Technologies',NULL,NULL,NULL,'2007-06-08 13:34:05'),(170,'EnGenius',NULL,NULL,NULL,'2007-06-08 13:34:05'),(171,'I-ROCKS',NULL,NULL,NULL,'2007-06-08 13:34:05'),(172,'Proview',NULL,NULL,NULL,'2007-06-08 13:34:05'),(173,'ERGOTRON',NULL,NULL,NULL,'2007-06-08 13:34:05'),(174,'IO Gear',NULL,NULL,NULL,'2007-06-08 13:34:05'),(175,'Garmin',NULL,NULL,NULL,'2007-06-08 13:34:05'),(176,'Aten',NULL,NULL,NULL,'2007-06-08 13:34:05'),(177,'TRENDnet',NULL,NULL,NULL,'2007-06-08 13:34:05'),(178,'DIGN Lab',NULL,NULL,NULL,'2007-06-08 13:34:05'),(179,'SVA group',NULL,NULL,NULL,'2007-06-08 13:34:05'),(180,'Tripp-Lite',NULL,NULL,NULL,'2007-06-08 13:34:05'),(181,'Tekram',NULL,NULL,NULL,'2007-06-08 13:34:05'),(182,'Planar SystemsInc.',NULL,NULL,NULL,'2007-06-08 13:34:05'),(183,'3Ware',NULL,NULL,NULL,'2007-06-08 13:34:05'),(184,'Areca Technology Corporation',NULL,NULL,NULL,'2007-06-08 13:34:05'),(185,'SABIO DIGITAL',NULL,NULL,NULL,'2007-06-08 13:34:05'),(186,'KDS',NULL,NULL,NULL,'2007-06-08 13:34:05'),(187,'AUraone Systems',NULL,NULL,NULL,'2007-06-08 13:34:05'),(188,'ProMedia',NULL,NULL,NULL,'2007-06-08 13:34:05'),(189,'Castlewood Systems',NULL,NULL,NULL,'2007-06-08 13:34:05'),(190,'Buffalo Technology',NULL,NULL,NULL,'2007-06-08 13:34:05'),(191,'DPT',NULL,NULL,NULL,'2007-06-08 13:34:05'),(192,'Cofan USA',NULL,NULL,NULL,'2007-06-08 13:34:05'),(193,'Edimax',NULL,NULL,NULL,'2007-06-08 13:34:05'),(194,'American Media Systems',NULL,NULL,NULL,'2007-06-08 13:34:05'),(195,'Arctek',NULL,NULL,NULL,'2007-06-08 13:34:05'),(196,'Relisys/AIM',NULL,NULL,NULL,'2007-06-08 13:34:05'),(197,'Cardkeeper TMC',NULL,NULL,NULL,'2007-06-08 13:34:05'),(198,'Daytona',NULL,NULL,NULL,'2007-06-08 13:34:05'),(199,'VENDOR',NULL,NULL,NULL,'2007-06-08 13:34:05'),(200,'Koutech (K-Well)',NULL,NULL,NULL,'2007-06-08 13:34:05'),(201,'Spectek',NULL,NULL,NULL,'2007-06-08 13:34:05'),(202,'Nvidia',NULL,NULL,NULL,'2007-06-08 13:34:05'),(203,'Coolsat',NULL,NULL,NULL,'2007-06-08 13:34:05'),(204,'KFC/Smile',NULL,NULL,NULL,'2007-06-08 13:34:05'),(205,'Elan Vital',NULL,NULL,NULL,'2007-06-08 13:34:05'),(206,'ZONET Networking',NULL,NULL,NULL,'2007-06-08 13:34:05'),(207,'Lexmark',NULL,NULL,NULL,'2007-06-08 13:34:05'),(208,'BFG Technologies',NULL,NULL,NULL,'2007-06-08 13:34:05'),(209,'Enhance Technology',NULL,NULL,NULL,'2007-06-08 13:34:05'),(210,'Aavid',NULL,NULL,NULL,'2007-06-08 13:34:05'),(211,'Koutech',NULL,NULL,NULL,'2007-06-08 13:34:05'),(212,'Linkworld',NULL,NULL,NULL,'2007-06-08 13:34:05'),(213,'ALASKA',NULL,NULL,NULL,'2007-06-08 13:34:05'),(214,'Biostar',NULL,NULL,NULL,'2007-06-08 13:34:05'),(215,'Hummingbird',NULL,NULL,NULL,'2007-06-08 13:34:05'),(216,'Apple Computer',NULL,NULL,NULL,'2007-06-08 13:34:05'),(217,'Microsoft OEM',NULL,NULL,NULL,'2007-06-08 13:34:05'),(218,'OLEVIA',NULL,NULL,NULL,'2007-06-08 13:34:05'),(219,'SIIG',NULL,NULL,NULL,'2007-06-08 13:34:05'),(220,'Sigmacom Inc.',NULL,NULL,NULL,'2007-06-08 13:34:05');
/*!40000 ALTER TABLE `product_manufacture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_status`
--

DROP TABLE IF EXISTS `product_status`;
CREATE TABLE `product_status` (
  `product_status_id` int(20) NOT NULL auto_increment,
  `product_status_text` char(60) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`product_status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_status`
--

LOCK TABLES `product_status` WRITE;
/*!40000 ALTER TABLE `product_status` DISABLE KEYS */;
INSERT INTO `product_status` VALUES (1,'In Stock','2006-10-08 12:30:35'),(2,'Discontinuing','2006-10-08 12:53:13'),(3,'Out Of Stock','2006-10-08 12:53:13');
/*!40000 ALTER TABLE `product_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_to_category`
--

DROP TABLE IF EXISTS `product_to_category`;
CREATE TABLE `product_to_category` (
  `product_to_category_id` int(20) NOT NULL auto_increment,
  `product_id` int(11) default NULL,
  `category_id` int(11) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`product_to_category_id`),
  KEY `product_id` (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_to_category`
--

LOCK TABLES `product_to_category` WRITE;
/*!40000 ALTER TABLE `product_to_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_to_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_to_system`
--

DROP TABLE IF EXISTS `product_to_system`;
CREATE TABLE `product_to_system` (
  `product_id` int(20) NOT NULL default '0',
  `system_id` int(20) NOT NULL default '0',
  `workorder_id` int(20) NOT NULL default '0',
  `product_to_system_qty` int(11) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP,
  KEY `product_id` (`product_id`,`system_id`),
  KEY `workorder_id` (`workorder_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_to_system`
--

LOCK TABLES `product_to_system` WRITE;
/*!40000 ALTER TABLE `product_to_system` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_to_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_to_workorder`
--

DROP TABLE IF EXISTS `product_to_workorder`;
CREATE TABLE `product_to_workorder` (
  `product_id` int(20) NOT NULL default '0',
  `workorder_id` int(20) NOT NULL default '0',
  `product_to_workorder_description` varchar(200) NOT NULL,
  `product_to_workorder_qty` int(10) NOT NULL default '0',
  `product_to_workorder_amount` float(14,4) NOT NULL,
  `product_to_workorder_sub_total` float(14,4) NOT NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  KEY `product_id` (`product_id`,`workorder_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_to_workorder`
--

LOCK TABLES `product_to_workorder` WRITE;
/*!40000 ALTER TABLE `product_to_workorder` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_to_workorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `service_id` int(20) NOT NULL auto_increment,
  `service_name` char(255) NOT NULL,
  `service_amount` float(14,2) NOT NULL,
  `service_active` tinyint(3) NOT NULL,
  `last_modifed` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1,'Remove Dust From System',7.00,1,'2007-09-01 14:07:55'),(2,'Data Backup',35.00,1,'2007-09-01 14:08:48');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `sesskey` varchar(32) character set latin1 collate latin1_bin NOT NULL default '',
  `expiry` int(11) unsigned NOT NULL default '0',
  `expireref` varchar(64) default '',
  `data` longtext,
  PRIMARY KEY  (`sesskey`),
  KEY `expiry` (`expiry`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE `state` (
  `state_id` int(20) NOT NULL auto_increment,
  `country_id` int(20) NOT NULL default '0',
  `state_code` char(10) NOT NULL default '',
  `state_active` tinyint(4) NOT NULL default '1',
  `state_text` char(100) NOT NULL default '',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`state_id`),
  UNIQUE KEY `state_code` (`state_code`),
  KEY `country_id` (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (1,236,'AL',1,'Alabama','2006-07-09 17:06:04'),(2,236,'AK',1,'Alaska','2006-07-09 17:06:04'),(3,236,'AZ',1,'Arizona','2006-07-09 17:06:04'),(4,236,'AR',1,'Arkansas','2006-07-09 17:06:04'),(5,236,'CA',1,'California','2006-07-09 17:06:04'),(6,236,'CO',1,'Colorado','2006-07-09 17:06:04'),(7,236,'CT',1,'Connecticut','2006-07-09 17:06:04'),(8,236,'DE',1,'Delaware','2006-07-09 17:06:04'),(9,236,'FL',1,'Florida','2006-07-09 17:06:04'),(10,236,'GA',1,'Georgia','2006-07-09 17:06:04'),(11,236,'HI',1,'Hawaii','2006-07-09 17:06:04'),(12,236,'ID',1,'Idaho','2006-07-09 17:06:04'),(13,236,'IL',1,'Illinois','2006-07-09 17:06:04'),(14,236,'IN',1,'Indiana','2006-07-09 17:06:04'),(15,236,'IA',1,'Iowa','2006-07-09 17:06:04'),(16,236,'KS',1,'Kansas','2006-07-09 17:06:04'),(17,236,'KY',1,'Kentucky','2006-07-09 17:06:04'),(18,236,'LA',1,'Louisiana','2006-07-09 17:06:04'),(19,236,'ME',1,'Maine','2006-07-09 17:06:04'),(20,236,'MD',1,'Maryland','2006-07-09 17:06:04'),(21,236,'MA',1,'Massachusetts','2006-07-09 17:06:04'),(22,236,'MI',1,'Michigan','2006-07-09 17:06:04'),(23,236,'MN',1,'Minnesota','2006-07-09 17:06:04'),(24,236,'MS',1,'Mississippi','2006-07-09 17:06:04'),(25,236,'MO',1,'Missouri','2006-07-09 17:06:04'),(26,236,'MT',1,'Montana','2006-07-09 17:06:04'),(27,236,'NE',1,'Nebraska','2006-07-09 17:06:04'),(28,236,'NV',1,'Nevada','2006-07-09 17:06:04'),(29,236,'NH',1,'New Hampshire','2006-07-09 17:06:04'),(30,236,'NJ',1,'New Jersey','2006-07-09 17:06:04'),(31,236,'NM',1,'New Mexico','2006-07-09 17:06:04'),(32,236,'NY',1,'New York','2006-07-09 17:06:04'),(33,236,'NC',1,'North Carolina','2006-07-09 17:06:04'),(34,236,'ND',1,'North Dakota','2006-07-09 17:06:04'),(35,236,'OH',1,'Ohio','2006-07-09 17:06:04'),(36,236,'OK',1,'Oklahoma','2006-07-09 17:06:04'),(37,236,'OR',1,'Oregon','2006-07-09 17:06:04'),(38,236,'PA',1,'Pennsylvania','2006-07-09 17:06:04'),(39,236,'RI',1,'Rhode Island','2006-07-09 17:06:04'),(40,236,'SC',1,'South Carolina','2006-07-09 17:06:04'),(41,236,'SD',1,'South Dakota','2006-07-09 17:06:04'),(42,236,'TN',1,'Tennessee','2006-07-09 17:06:04'),(43,236,'TX',1,'Texas','2006-07-09 17:06:04'),(44,236,'UT',1,'Utah','2006-07-09 17:06:04'),(45,236,'VT',1,'Vermont','2006-07-09 17:06:04'),(46,236,'VA',1,'Virginia','2006-07-09 17:06:04'),(47,236,'WA',1,'Washington','2006-07-09 17:06:04'),(48,236,'WV',1,'West Virginia','2006-07-09 17:06:04'),(49,236,'WI',1,'Wisconsin','2006-07-09 17:06:04'),(50,236,'WY',1,'Wyoming','2006-07-09 17:06:04');
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `support_calls`
--

DROP TABLE IF EXISTS `support_calls`;
CREATE TABLE `support_calls` (
  `support_call_id` int(20) NOT NULL auto_increment,
  `support_call_num_min` int(10) NOT NULL,
  `support_call_type` enum('company_id','user_id') NOT NULL,
  `support_call_type_id` int(20) NOT NULL,
  `support_call_enter_by` int(20) NOT NULL,
  `support_call_start` int(20) NOT NULL,
  `support_call_stop` int(20) NOT NULL,
  `support_call_notes` text NOT NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`support_call_id`),
  KEY `support_call_type_id` (`support_call_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support_calls`
--

LOCK TABLES `support_calls` WRITE;
/*!40000 ALTER TABLE `support_calls` DISABLE KEYS */;
/*!40000 ALTER TABLE `support_calls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suspension_reason`
--

DROP TABLE IF EXISTS `suspension_reason`;
CREATE TABLE `suspension_reason` (
  `suspension_reason_id` int(20) NOT NULL auto_increment,
  `suspension_reason_text` char(200) NOT NULL default '',
  `suspension_reason_active` int(4) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`suspension_reason_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suspension_reason`
--

LOCK TABLES `suspension_reason` WRITE;
/*!40000 ALTER TABLE `suspension_reason` DISABLE KEYS */;
INSERT INTO `suspension_reason` VALUES (1,'Billing Failure',1,'2006-06-27 22:35:18'),(4,'User Canceled',1,'2006-06-27 23:04:00'),(3,'User No longer Wants Service',1,'2006-06-27 22:35:29'),(5,'Cost to much',1,'2006-06-27 23:04:50'),(6,'Does Not have features needed',1,'2006-06-27 23:05:23');
/*!40000 ALTER TABLE `suspension_reason` ENABLE KEYS */;
UNLOCK TABLES;


-- 
-- Database: `citecrm_demo`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `user_to_suspension`
-- 
CREATE TABLE `user_to_suspension` (
  `user_to_suspension_id` int(20) NOT NULL auto_increment,
  `user_id` int(20) NOT NULL,
  `user_to_suspension_reaseon` text NOT NULL,
  `user_to_suspension_by` int(20) NOT NULL,
  `user_to_suspension_date` int(20) NOT NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_to_suspension_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- Table structure for table `system`
--

DROP TABLE IF EXISTS `system`;
CREATE TABLE `system` (
  `system_id` int(20) NOT NULL auto_increment,
  `system_serial_num` varchar(100) NOT NULL default '',
  `system_manufacture_id` int(20) default NULL,
  `system_model_id` char(100) default NULL,
  `operating_system_manufacture_id` int(20) NOT NULL default '0',
  `operating_system_id` int(20) NOT NULL default '0',
  `system_name` varchar(100) NOT NULL default '',
  `system_ip_address` varchar(20) NOT NULL default '',
  `system_host_name` varchar(50) NOT NULL default '',
  `system_purchase_date` int(20) NOT NULL default '0',
  `system_purchase_price` float(10,4) NOT NULL default '0.0000',
  `system_waranty_text` text NOT NULL,
  `system_warenty_expire_date` int(20) NOT NULL default '0',
  `system_active` tinyint(4) default '1',
  `system_last_service` int(20) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`system_id`),
  KEY `system_manufacture_id` (`system_manufacture_id`),
  KEY `system_model_id` (`system_model_id`),
  KEY `operating_system_id` (`operating_system_id`),
  KEY `operating_system_manufacture_id` (`operating_system_manufacture_id`),
  KEY `system_serial_num` (`system_serial_num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system`
--

LOCK TABLES `system` WRITE;
/*!40000 ALTER TABLE `system` DISABLE KEYS */;
/*!40000 ALTER TABLE `system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_manufacture`
--

DROP TABLE IF EXISTS `system_manufacture`;
CREATE TABLE `system_manufacture` (
  `system_manufacture_id` int(20) NOT NULL auto_increment,
  `manufacture_abrv` char(100) NOT NULL default '',
  `manufacture_name` char(100) NOT NULL default '',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`system_manufacture_id`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_manufacture`
--

LOCK TABLES `system_manufacture` WRITE;
/*!40000 ALTER TABLE `system_manufacture` DISABLE KEYS */;
INSERT INTO `system_manufacture` VALUES (1,'ABI','ABIT','2006-06-01 09:41:26'),(2,'ACE','Acer','2006-06-01 09:41:54'),(3,'ADP','Adaptec','2006-06-01 09:41:54'),(4,'AGF','Agfa','2006-06-01 09:41:54'),(5,'AIP','AIPTEK','2006-06-01 09:41:54'),(6,'ALW','Alienware','2006-06-01 09:41:54'),(7,'AOP','AOpen','2006-06-01 09:41:54'),(8,'APP','Apple','2006-06-01 09:41:54'),(9,'ARG','Argus','2006-06-01 09:41:54'),(10,'RIO','Arima/Rioworks','2006-06-01 09:41:54'),(11,'AST','AST','2006-06-01 09:41:54'),(12,'ASU','ASUS','2006-06-01 09:41:54'),(13,'ATT','AT&T/NCR','2006-06-01 09:41:54'),(14,'AVX','Audiovox','2006-06-01 09:41:54'),(15,'AVC','Averatec','2006-06-01 09:41:54'),(16,'BEN','BenQ','2006-06-01 09:41:54'),(17,'BIO','Biostar','2006-06-01 09:41:54'),(18,'BRO','Brother','2006-06-01 09:41:54'),(19,'CAN','Canon','2006-06-01 09:41:54'),(20,'CAS','Casio','2006-06-01 09:41:54'),(21,'CHT','Chaintech','2006-06-01 09:41:54'),(22,'CIS','Cisco','2006-06-01 09:41:54'),(23,'CLR','ClearCube','2006-06-01 09:41:54'),(24,'CLV','Clevo','2006-06-01 09:41:54'),(25,'CPL','Compal','2006-06-01 09:41:54'),(26,'HEW','Compaq','2006-07-16 14:15:50'),(27,'CON','Contax','2006-06-01 09:41:54'),(28,'CRE','Creative','2006-06-01 09:41:54'),(29,'DEL','Dell','2006-06-01 09:41:54'),(30,'DFI','DFI','2006-06-01 09:41:54'),(31,'DFR','Digi-Frame','2006-06-01 09:41:54'),(32,'DEC','Digital','2006-06-01 09:41:54'),(33,'DPD','Dopod','2006-06-01 09:41:54'),(34,'DXG','DXG','2006-06-01 09:41:54'),(35,'ETN','E-TEN','2006-06-01 09:41:54'),(36,'ECS','EliteGroup (ECS)','2006-06-01 09:41:54'),(37,'EMA','eMachines','2006-06-01 09:41:54'),(38,'EPO','Epox','2006-06-01 09:41:54'),(39,'EPS','Epson','2006-06-01 09:41:54'),(40,'EVE','Everex','2006-06-01 09:41:54'),(41,'FIC','FIC','2006-06-01 09:41:54'),(42,'FOX','Foxconn','2006-06-01 09:41:54'),(43,'FJI','Fuji','2006-06-01 09:41:54'),(44,'FUJ','Fujitsu-Siemens','2006-06-01 09:41:54'),(45,'GAR','Garmin','2006-06-01 09:41:54'),(46,'GTW','Gateway','2006-06-01 09:41:54'),(47,'GIG','Gigabyte','2006-06-01 09:41:54'),(48,'HIT','Hitachi','2006-06-01 09:41:54'),(49,'HEW','HP/Compaq','2006-06-01 09:41:54'),(50,'HTC','HTC','2006-06-01 09:41:54'),(51,'IMT','I-Mate','2006-06-01 09:41:54'),(52,'IBM','IBM','2006-06-01 09:41:54'),(53,'INO','Innostream','2006-06-01 09:41:54'),(54,'INT','Intel','2006-06-01 09:41:54'),(55,'IUC','Iwill','2006-06-01 09:41:54'),(56,'JEN','Jenoptik','2006-06-01 09:41:54'),(57,'JVC','JVC','2006-06-01 09:41:54'),(58,'KDC','Kodak','2006-06-01 09:41:54'),(59,'KON','Konica Minolta','2006-06-01 09:41:54'),(60,'KYC','Kyocera','2006-06-01 09:41:54'),(61,'LAR','Largan','2006-06-01 09:41:54'),(62,'LEI','Leica','2006-06-01 09:41:54'),(63,'LEN','Lenovo','2006-06-01 09:41:54'),(64,'LEO','Leo','2006-06-01 09:41:54'),(65,'LEX','Lexmark','2006-06-01 09:41:54'),(66,'LG','LG Electronics','2006-06-01 09:41:54'),(67,'LGT','Logitech','2006-06-01 09:41:54'),(68,'MAG','Magnex','2006-06-01 09:41:54'),(69,'MXD','MAXDATA','2006-06-01 09:41:54'),(70,'MTC','MiTAC','2006-06-01 09:41:54'),(71,'MIT','Mitsubishi','2006-06-01 09:41:54'),(72,'MCP','Motion Computing','2006-06-01 09:41:54'),(73,'MOT','Motorola','2006-06-01 09:41:54'),(74,'MIC','MPC/Micron','2006-06-01 09:41:54'),(75,'MSI','MSI','2006-06-01 09:41:54'),(76,'MUS','Mustek','2006-06-01 09:41:54'),(77,'NCD','NCD','2006-06-01 09:41:54'),(78,'NEC','NEC','2006-06-01 09:41:54'),(79,'NIK','Nikon','2006-06-01 09:41:54'),(80,'NXV','Nixvue','2006-06-01 09:41:54'),(81,'NOK','Nokia','2006-06-01 09:41:54'),(82,'MMO','O2','2006-06-01 09:41:54'),(83,'OKI','Okidata','2006-06-01 09:41:54'),(84,'OLI','Olivetti','2006-06-01 09:41:54'),(85,'OLM','Olympus','2006-06-01 09:41:54'),(86,'ORG','Orange','2006-06-01 09:41:54'),(87,'ORE','Oregon Scientific','2006-06-01 09:41:54'),(88,'PAK','Packard Bell','2006-06-01 09:41:54'),(89,'PLM','Palm','2006-06-01 09:41:54'),(90,'PAN','Panasonic','2006-06-01 09:41:54'),(91,'PNC','Pantech & Curitel','2006-06-01 09:41:54'),(92,'PAR','PARS','2006-06-01 09:41:54'),(93,'PEN','Pentax','2006-06-01 09:41:54'),(94,'PHI','Philips/Magnavox','2006-06-01 09:41:54'),(95,'POL','Polaroid','2006-06-01 09:41:54'),(96,'PRA','Praktica','2006-06-01 09:41:54'),(97,'PRT','Pretec','2006-06-01 09:41:54'),(98,'PSI','Psion','2006-06-01 09:41:54'),(99,'QDI','QDI','2006-06-01 09:41:54'),(100,'QTK','Qtek','2006-06-01 09:41:54'),(101,'RCA','RCA','2006-06-01 09:41:54'),(102,'RND','Reynolds','2006-06-01 09:41:54'),(103,'RIC','Ricoh','2006-06-01 09:41:54'),(104,'ROL','Rollei','2006-06-01 09:41:54'),(105,'RZN','Rozinn','2006-06-01 09:41:54'),(106,'SAB','Sabio','2006-06-01 09:41:54'),(107,'SAG','Sagem','2006-06-01 09:41:54'),(108,'SAM','Samsung','2006-06-01 09:41:54'),(109,'SAN','Sanyo','2006-06-01 09:41:54'),(110,'SAP','Sapphire','2006-06-01 09:41:54'),(111,'SEN','Sendo','2006-06-01 09:41:54'),(112,'SIL','SGI','2006-06-01 09:41:54'),(113,'SHA','Sharp','2006-06-01 09:41:54'),(114,'SHT','Shuttle','2006-06-01 09:41:54'),(115,'SIE','Siemens Nixdorf','2006-06-01 09:41:54'),(116,'SIG','Sigma','2006-06-01 09:41:54'),(117,'SIP','SiPix','2006-06-01 09:41:54'),(118,'SNP','Snap Appliance','2006-06-01 09:41:54'),(119,'SON','Sony','2006-06-01 09:41:54'),(120,'SOT','SOTEC','2006-06-01 09:41:54'),(121,'SOY','SOYO','2006-06-01 09:41:54'),(122,'SLM','Spacelabs Medical','2006-06-01 09:41:54'),(123,'SUN','Sun','2006-06-01 09:41:54'),(124,'SMI','Supermicro','2006-06-01 09:41:54'),(125,'TNG','Tatung','2006-06-01 09:41:54'),(126,'TOM','TomTom','2006-06-01 09:41:54'),(127,'TOS','Toshiba','2006-06-01 09:41:54'),(128,'TRU','Trust','2006-06-01 09:41:54'),(129,'TWH','Twinhead','2006-06-01 09:41:54'),(130,'TYN','Tyan Computers','2006-06-01 09:41:54'),(131,'UMX','UMAX','2006-06-01 09:41:54'),(132,'VAD','Vadem','2006-06-01 09:41:54'),(133,'VIA','Via','2006-06-01 09:41:54'),(134,'VDC','VideoChip','2006-06-01 09:41:54'),(135,'VSN','ViewSonic','2006-06-01 09:41:54'),(136,'VIV','Vivitar','2006-06-01 09:41:54'),(137,'VOD','Vodafone','2006-06-01 09:41:54'),(138,'VPT','VuPoint','2006-06-01 09:41:54'),(139,'WIN','WinBook','2006-06-01 09:41:54'),(140,'XCT','xcute','2006-06-01 09:41:54'),(141,'XER','Xerox','2006-06-01 09:41:54'),(142,'YAS','Yashica','2006-06-01 09:41:54'),(143,'ZEN','Zenith','2006-06-01 09:41:54'),(144,'Linksys','Linksys','2007-06-02 19:23:16'),(145,'Netgear','Netgear','2007-06-02 19:30:12');
/*!40000 ALTER TABLE `system_manufacture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_model`
--

DROP TABLE IF EXISTS `system_model`;
CREATE TABLE `system_model` (
  `system_model_id` int(20) NOT NULL auto_increment,
  `system_manufacture_id` int(20) NOT NULL default '0',
  `system_model_name` char(100) NOT NULL default '',
  `system_full_name` char(100) NOT NULL default '',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`system_model_id`),
  KEY `system_manufacture_id` (`system_manufacture_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_model`
--

LOCK TABLES `system_model` WRITE;
/*!40000 ALTER TABLE `system_model` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_to_workorder`
--

DROP TABLE IF EXISTS `system_to_workorder`;
CREATE TABLE `system_to_workorder` (
  `system_to_workorder_id` int(20) NOT NULL auto_increment,
  `system_id` int(20) NOT NULL default '0',
  `workorder_id` int(20) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`system_to_workorder_id`),
  KEY `system_id` (`system_id`),
  KEY `workorder_id` (`workorder_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_to_workorder`
--

LOCK TABLES `system_to_workorder` WRITE;
/*!40000 ALTER TABLE `system_to_workorder` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_to_workorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tax_class`
--

DROP TABLE IF EXISTS `tax_class`;
CREATE TABLE `tax_class` (
  `tax_class_id` int(20) NOT NULL auto_increment,
  `tax_class_title` varchar(64) NOT NULL default '',
  `tax_class_description` text NOT NULL,
  `tax_type` int(20) NOT NULL default '0',
  `tax_class_active` tinyint(3) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`tax_class_id`),
  KEY `tax_type` (`tax_type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax_class`
--

LOCK TABLES `tax_class` WRITE;
/*!40000 ALTER TABLE `tax_class` DISABLE KEYS */;
/*!40000 ALTER TABLE `tax_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tax_rate`
--

DROP TABLE IF EXISTS `tax_rate`;
CREATE TABLE `tax_rate` (
  `tax_rate_id` int(20) NOT NULL auto_increment,
  `tax_rate_zone_id` int(20) NOT NULL default '0',
  `tax_class_id` int(20) NOT NULL default '0',
  `tax_rate_priority` int(4) default NULL,
  `tax_rate_value` float(10,4) default NULL,
  `tax_rate_description` text,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`tax_rate_id`),
  KEY `tax_rate_zone_id` (`tax_rate_zone_id`),
  KEY `tax_class_id` (`tax_class_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax_rate`
--

LOCK TABLES `tax_rate` WRITE;
/*!40000 ALTER TABLE `tax_rate` DISABLE KEYS */;
/*!40000 ALTER TABLE `tax_rate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tax_type`
--

DROP TABLE IF EXISTS `tax_type`;
CREATE TABLE `tax_type` (
  `tax_type_id` int(20) NOT NULL auto_increment,
  `tax_type_text` char(60) NOT NULL default '',
  `tax_type_active` tinyint(3) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`tax_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax_type`
--

LOCK TABLES `tax_type` WRITE;
/*!40000 ALTER TABLE `tax_type` DISABLE KEYS */;
INSERT INTO `tax_type` VALUES (1,'Sales',1,'2006-10-09 11:24:16'),(2,'Service',1,'2006-10-09 11:24:30');
/*!40000 ALTER TABLE `tax_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(20) NOT NULL auto_increment,
  `user_type_id` int(20) NOT NULL default '0',
  `user_admin` int(4) NOT NULL default '0',
  `user_perms` int(20) NOT NULL,
  `user_status` enum('Active','Pending','Suspended','Closed') NOT NULL default 'Active',
  `user_password` char(100) NOT NULL,
  `user_first_name` char(50) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `user_last_name` char(50) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `user_email` char(100) NOT NULL,
  `user_create_date` int(20) NOT NULL default '0',
  `user_activation_date` int(20) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_id`),
  KEY `user_type` (`user_type_id`),
  KEY `user_status` (`user_status`),
  KEY `user_admin` (`user_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_address`
--

DROP TABLE IF EXISTS `user_address`;
CREATE TABLE `user_address` (
  `address_id` int(20) NOT NULL auto_increment,
  `address_type` enum('Home','Billing','Shipping') NOT NULL default 'Home',
  `user_id` int(20) NOT NULL default '0',
  `account_id` int(20) NOT NULL default '0',
  `address_street` char(100) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `address_street_2` char(100) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `address_city` char(100) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `address_state` char(100) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `address_postal_code` char(50) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `address_country` char(100) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `address_date_create` int(20) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`address_id`),
  KEY `user_id` (`user_id`),
  KEY `account_id` (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_address`
--

LOCK TABLES `user_address` WRITE;
/*!40000 ALTER TABLE `user_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_contact`
--

DROP TABLE IF EXISTS `user_contact`;
CREATE TABLE `user_contact` (
  `contact_id` int(20) NOT NULL auto_increment,
  `user_id` int(20) NOT NULL default '0',
  `account_id` int(20) NOT NULL default '0',
  `contact_type` enum('Primary Phone','Secondary Phone','Mobile Phone','Pager','Email','Yahoo IM','MSN IM','AOL IM','Extension','Fax','ICQ IM') NOT NULL,
  `contact_value` char(100) character set utf8 collate utf8_unicode_ci NOT NULL default '',
  `contact_create_date` int(20) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`contact_id`),
  KEY `user_id` (`user_id`,`account_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_contact`
--

LOCK TABLES `user_contact` WRITE;
/*!40000 ALTER TABLE `user_contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_to_company`
--

DROP TABLE IF EXISTS `user_to_company`;
CREATE TABLE `user_to_company` (
  `user_to_company_id` int(20) NOT NULL auto_increment,
  `user_id` int(20) default NULL,
  `company_id` int(20) default NULL,
  `user_to_company_primary` int(3) NOT NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_to_company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_to_company`
--

LOCK TABLES `user_to_company` WRITE;
/*!40000 ALTER TABLE `user_to_company` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_to_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_to_system`
--

DROP TABLE IF EXISTS `user_to_system`;
CREATE TABLE `user_to_system` (
  `user_id` int(20) NOT NULL default '0',
  `system_id` int(20) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_to_system`
--

LOCK TABLES `user_to_system` WRITE;
/*!40000 ALTER TABLE `user_to_system` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_to_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_to_workorder`
--

DROP TABLE IF EXISTS `user_to_workorder`;
CREATE TABLE `user_to_workorder` (
  `user_to_workorder_id` int(20) NOT NULL auto_increment,
  `user_id` int(20) NOT NULL default '0',
  `workorder_id` int(20) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_to_workorder_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_to_workorder`
--

LOCK TABLES `user_to_workorder` WRITE;
/*!40000 ALTER TABLE `user_to_workorder` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_to_workorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `user_type_id` int(20) NOT NULL auto_increment,
  `user_type_text` varchar(100) NOT NULL default '',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

LOCK TABLES `user_type` WRITE;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` VALUES (1,'Employee','2006-07-10 00:49:17'),(2,'Customer','2007-05-04 01:52:46'),(3,'Account Contact','2007-05-04 01:53:01');
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
CREATE TABLE `vendor` (
  `vendor_id` int(20) NOT NULL auto_increment,
  `vendor_name` char(60) default NULL,
  `vendor_website` char(100) default NULL,
  `vendor_create_date` int(20) default NULL,
  `vendor_active` tinyint(4) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`vendor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

LOCK TABLES `vendor` WRITE;
/*!40000 ALTER TABLE `vendor` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor_address`
--

DROP TABLE IF EXISTS `vendor_address`;
CREATE TABLE `vendor_address` (
  `vendor_address_id` int(20) NOT NULL auto_increment,
  `vendor_id` int(20) default NULL,
  `vendor_address_type` enum('Home','Business','Billing','Shipping') NOT NULL default 'Home',
  `vendor_street_1` char(60) NOT NULL default '',
  `vendor_street_2` char(60) default NULL,
  `vendor_city` char(60) NOT NULL default '',
  `vendor_state_id` int(20) NOT NULL default '0',
  `vendor_postal_code` char(20) NOT NULL default '',
  `vendor_country_id` int(20) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`vendor_address_id`),
  KEY `vendor_id` (`vendor_id`),
  KEY `vendor_state_id` (`vendor_state_id`),
  KEY `vendor_country_id` (`vendor_country_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_address`
--

LOCK TABLES `vendor_address` WRITE;
/*!40000 ALTER TABLE `vendor_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendor_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor_contact`
--

DROP TABLE IF EXISTS `vendor_contact`;
CREATE TABLE `vendor_contact` (
  `vendor_contact_id` int(20) NOT NULL auto_increment,
  `vendor_id` int(20) default NULL,
  `vendor_contact_type` enum('Personal Phone','Business Phone','Mobile Phone','Pager','Email','Yahoo IM','MSN IM','AOL IM') default NULL,
  `vendor_contact_value` char(200) default NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`vendor_contact_id`),
  KEY `vendor_id` (`vendor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_contact`
--

LOCK TABLES `vendor_contact` WRITE;
/*!40000 ALTER TABLE `vendor_contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendor_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workorder`
--

DROP TABLE IF EXISTS `workorder`;
CREATE TABLE `workorder` (
  `workorder_id` int(20) NOT NULL auto_increment,
  `workorder_open_date` int(20) NOT NULL default '0',
  `workorder_status` int(20) NOT NULL default '0',
  `workorder_active` smallint(4) NOT NULL default '0',
  `workorder_create_by` int(20) NOT NULL default '0',
  `workorder_assigned_to` int(20) default NULL,
  `workorder_scope` varchar(100) NOT NULL default '',
  `workorder_desription` longtext,
  `workorder_start_time` int(20) NOT NULL default '0',
  `workorder_end_time` int(20) NOT NULL default '0',
  `workorder_close_date` int(20) NOT NULL default '0',
  `workorder_close_by` int(20) NOT NULL default '0',
  `workorder_resolution` longtext,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`workorder_id`),
  KEY `workorder_create_by` (`workorder_create_by`),
  KEY `workorder_assigned_to` (`workorder_assigned_to`),
  KEY `workorder_close_by` (`workorder_close_by`),
  KEY ` workorder_start_time` (`workorder_start_time`),
  KEY ` workorder_end_time` (`workorder_end_time`),
  KEY `workorder_status` (`workorder_status`),
  KEY `workorder_active` (`workorder_active`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workorder`
--

LOCK TABLES `workorder` WRITE;
/*!40000 ALTER TABLE `workorder` DISABLE KEYS */;
/*!40000 ALTER TABLE `workorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workorder_history`
--

DROP TABLE IF EXISTS `workorder_history`;
CREATE TABLE `workorder_history` (
  `workorder_history_id` int(20) NOT NULL auto_increment,
  `workorder_id` int(20) NOT NULL default '0',
  `user_id` int(20) NOT NULL default '0',
  `workorder_history_text` tinytext NOT NULL,
  `workorder_history_create_date` int(20) NOT NULL default '0',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`workorder_history_id`),
  KEY `workorder_id` (`workorder_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workorder_history`
--

LOCK TABLES `workorder_history` WRITE;
/*!40000 ALTER TABLE `workorder_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `workorder_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workorder_note`
--

DROP TABLE IF EXISTS `workorder_note`;
CREATE TABLE `workorder_note` (
  `workorder_note_id` int(20) NOT NULL auto_increment,
  `workorder_id` int(20) NOT NULL default '0',
  `workorder_note_create_by` int(20) NOT NULL default '0',
  `workorder_subject` char(100) NOT NULL,
  `workorder_note_text` longtext NOT NULL,
  `workorder_note_no_update` tinyint(3) NOT NULL default '0',
  `workorder_active` tinyint(3) NOT NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`workorder_note_id`),
  KEY `workorder_id` (`workorder_id`),
  KEY `workorder_note_create_by` (`workorder_note_create_by`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workorder_note`
--

LOCK TABLES `workorder_note` WRITE;
/*!40000 ALTER TABLE `workorder_note` DISABLE KEYS */;
/*!40000 ALTER TABLE `workorder_note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workorder_status`
--

DROP TABLE IF EXISTS `workorder_status`;
CREATE TABLE `workorder_status` (
  `workorder_status_id` int(20) NOT NULL auto_increment,
  `workorder_status_text` char(100) NOT NULL default '',
  `workorder_status_order` smallint(6) NOT NULL default '0',
  `workorder_status_active` tinyint(4) default '1',
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`workorder_status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workorder_status`
--

LOCK TABLES `workorder_status` WRITE;
/*!40000 ALTER TABLE `workorder_status` DISABLE KEYS */;
INSERT INTO `workorder_status` VALUES (1,'New',1,1,'2006-10-11 12:01:31'),(2,'Assigned',2,1,'2006-10-11 12:01:31'),(3,'Waiting For Parts',6,1,'2006-10-11 12:01:31'),(4,'On Hold',3,1,'2006-10-11 12:01:31'),(5,'Completed',7,1,'2007-06-19 14:05:37'),(6,'Suspended',4,1,'2006-10-11 12:01:31'),(7,'Completed',8,1,'2006-10-11 12:01:31'),(8,'Waiting For Customer Aproval',5,1,'2006-10-11 12:01:31');
/*!40000 ALTER TABLE `workorder_status` ENABLE KEYS */;
UNLOCK TABLES;

-- 
-- Table structure for table `workorder_service`
-- 

CREATE TABLE `workorder_service` (
  `workorder_service_id` int(20) NOT NULL auto_increment,
  `workorder_id` int(20) NOT NULL,
  `workorder_service_qty` int(11) NOT NULL,
  `workorder_service_description` varchar(60) NOT NULL,
  `workorder_service_amount` float(14,2) NOT NULL,
  `workorder_service_total` float(14,2) NOT NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`workorder_service_id`),
  KEY `workorder_id` (`workorder_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `workorder_time`
--

DROP TABLE IF EXISTS `workorder_time`;
CREATE TABLE `workorder_time` (
  `workorder_time_id` int(20) NOT NULL auto_increment,
  `workorder_id` int(20) default NULL,
  `user_id` int(20) default NULL,
  `workorder_time_start` int(20) default NULL,
  `workorder_time_end` int(20) default NULL,
  `workorder_time_description` text NOT NULL,
  `workorder_time_total` float(14,4) NOT NULL default '0.0000',
  `workorder_time_rate` float(14,4) NOT NULL,
  `workorder_time_labor_type` enum('Contract Labor','Labor') NOT NULL,
  `workorder_time_amount` float(14,2) NOT NULL,
  `last_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`workorder_time_id`),
  KEY `workorder_id` (`workorder_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workorder_time`
--

LOCK TABLES `workorder_time` WRITE;
/*!40000 ALTER TABLE `workorder_time` DISABLE KEYS */;
/*!40000 ALTER TABLE `workorder_time` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2007-09-25 20:19:58
