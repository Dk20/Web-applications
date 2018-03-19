# Sequel Pro dump
# Version 1191
# http://code.google.com/p/sequel-pro
#
# Host: localhost (MySQL 5.4.3-beta)
# Database: library
# Generation Time: 2009-12-06 20:27:41 +0800
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Author
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Author`;

CREATE TABLE `Author` (
  `auth_id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`auth_id`),
  UNIQUE KEY `auth_name` (`auth_name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `Author` WRITE;
/*!40000 ALTER TABLE `Author` DISABLE KEYS */;
INSERT INTO `Author` (`auth_id`,`auth_name`)
VALUES
	(1,'Thirumoolar'),
	(2,'Thiruvalluvar'),
	(3,'Swami Vivekanandar'),
	(4,'திருமூலர்');

/*!40000 ALTER TABLE `Author` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table book
# ------------------------------------------------------------

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book` (
  `book_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `slno` varchar(15) CHARACTER SET utf8 NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `media_type` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publication` text COLLATE utf8_unicode_ci,
  `edition` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `total_holding` int(4) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `related_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `book_remark` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`book_id`),
  UNIQUE KEY `slno` (`slno`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` (`book_id`,`slno`,`title`,`media_type`,`author`,`publication`,`edition`,`year`,`pages`,`total_holding`,`location`,`category`,`sub_category`,`related_name`,`book_remark`)
VALUES
	(1,'ram','ram','Magazine','Thiruvalluvar','hdjhfjk','','2009',0,0,'','Devotion','Devotion','',''),
	(2,'SITH 1.006','à®¤à®¿à®°à¯à®®à®¨à¯à®¤à®¿à®°à®®à¯ à®¤à¯Šà®•à¯à®¤à®¿ 2','Book','Thirumoolar','à®ªà®´à®©à®¿à®¯à®ªà¯à®ªà®¾ à®ªà®¿à®°à®¤à®°à¯à®¸à¯','4à®®à¯','1994',422,1,'Sithantham','Devotion','Sacred Script','',''),
	(3,'SITH 1.005','à®¤à®¿à®°à¯à®®à®¨à¯à®¤à®¿à®°à®®à¯ à®¤à¯Šà®•à¯à®¤à®¿ 1','Book','Thirumoolar','à®ªà®´à®©à®¿à®¯à®ªà¯à®ªà®¾ à®ªà®¿à®°à®¤à®°à¯à®¸à¯','4à®®à¯','1994',422,1,'Sithantham','Devotion','Sacred Script','',''),
	(4,'SITH 1.001','à®¤à®¿à®°à¯à®®à®¨à¯à®¤à®¿à®°à®®à¯ à®®à¯à®¤à®±à¯ à®ªà®•à¯à®¤à®¿','Book','Thirumoolar','à®¤à®¿à®°à¯à®¨à¯†à®²à¯à®µà¯‡à®²à®¿ à®¤à¯†à®©à¯à®©à®¿à®¨à¯à®¤à®¿à®¯ à®šà¯ˆà®µà®šà®¿à®¤à¯à®¤à®¾à®¨à¯à®¤ à®¨à¯‚à®±à¯à®ªà®¤à®¿à®ªà¯à®ªà¯ à®•à®´à®•à®®à¯','6à®µà®¤à¯','1979',500,1,'Sithantham','Devotion','Sacred Script','',''),
	(5,'003','Trial2','CD','Swami Vivekanandar','w','w','2000',300,3,'Thiruvasak','à®•à®£à®•à¯à®•à¯','à®¤à®®à®¿à®´à¯','',''),
	(6,'002','Thirukural','Book','Swami Vivekanandar','1','2','2003',4,5,'Sithantham','Devotion','à®¤à®®à®¿à®´à¯','','8'),
	(7,'SITH 1.002','à®¤à®¿à®°à¯à®®à®¨à¯à®¤à®¿à®°à®®à¯ à®‡à®°à®£à¯à®Ÿà®¾à®®à¯ à®ªà®•à¯à®¤à®¿','Book','Thirumoolar','à®¤à®¿à®°à¯à®¨à¯†à®²à¯à®µà¯‡à®²à®¿ à®¤à¯†à®©à¯à®©à®¿à®¨à¯à®¤à®¿à®¯ à®šà¯ˆà®µà®šà®¿à®¤à¯à®¤à®¾à®¨à¯à®¤ à®¨à¯‚à®±à¯à®ªà®¤à®¿à®ªà¯à®ªà¯ à®•à®´à®•à®®à¯','6à®µà®¤à¯','1979',500,1,'Sithantham','Devotion','Sacred Script','',''),
	(8,'trial-003','trial','Book','Thiruvalluvar','nil','4th','1970',800,1,'Samayam','à®¤à®®à®¿à®´à¯','Sacred Script','','');

/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name` (`cat_name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`cat_id`,`cat_name`)
VALUES
	(2,'à®…à®®à¯à®®à®¾33'),
	(3,'Devotion'),
	(4,'Sacred Script'),
	(5,'trial'),
	(6,'à®•à®£à®•à¯à®•à¯'),
	(7,'à®¤à®®à®¿à®´à¯'),
	(8,'trial2');

/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table loan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `loan`;

CREATE TABLE `loan` (
  `loan_id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_book_slno` varchar(255) DEFAULT NULL,
  `loan_mem_name` varchar(50) DEFAULT NULL,
  `loan_date` date DEFAULT NULL,
  `loan_return_date` date DEFAULT NULL,
  `loan_status` tinytext,
  `loan_return_stats` tinytext,
  `loan_return_mem_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`loan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

LOCK TABLES `loan` WRITE;
/*!40000 ALTER TABLE `loan` DISABLE KEYS */;
INSERT INTO `loan` (`loan_id`,`loan_book_slno`,`loan_mem_name`,`loan_date`,`loan_return_date`,`loan_status`,`loan_return_stats`,`loan_return_mem_name`)
VALUES
	(1,'','S1234567P','0000-00-00','2009-12-06','Returned',NULL,'1234'),
	(2,'','S1234567P','0000-00-00','2009-12-06','Returned',NULL,'1234'),
	(3,'','1234','0000-00-00','2009-12-06','Returned',NULL,'1234'),
	(4,'','1234','2009-12-06','2009-12-06','Returned',NULL,'1234'),
	(5,'SITH001','S1234567P','2009-12-06','0000-00-00','Returned',NULL,'1234'),
	(6,'SITH001','S1234567P','2009-12-12','0000-00-00','Returned',NULL,'1234'),
	(7,'ram2','1234','0000-00-00','0000-00-00','Returned',NULL,'S1234567P'),
	(8,'SITH001','S1234567P','2009-12-06','0000-00-00','Returned',NULL,'1234'),
	(9,'SITH001','1234','2009-12-06','0000-00-00','Returned',NULL,'1234'),
	(10,'SITH001','S1234567P','2009-12-06','0000-00-00','Returned',NULL,'1234'),
	(11,'003','S1234567P','2009-12-06',NULL,'On Loan',NULL,NULL),
	(12,'SITH 1.001','S1234567P','2009-12-06','0000-00-00','Returned',NULL,'S1234567P'),
	(13,'SITH 1.002','S1234567P','2009-12-06',NULL,'On Loan',NULL,NULL),
	(14,'SITH 1.005','S1234567P','2009-12-06',NULL,'On Loan',NULL,NULL),
	(15,'SITH 1.001','S1234567P','2009-12-06','0000-00-00','Returned',NULL,'S1234567P');

/*!40000 ALTER TABLE `loan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table location
# ------------------------------------------------------------

DROP TABLE IF EXISTS `location`;

CREATE TABLE `location` (
  `loc_id` int(11) NOT NULL AUTO_INCREMENT,
  `loc_name` varchar(255) NOT NULL,
  PRIMARY KEY (`loc_id`),
  UNIQUE KEY `loc_name` (`loc_name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` (`loc_id`,`loc_name`)
VALUES
	(1,'Sithantham'),
	(2,'Samayam'),
	(3,'Thiruvasakam'),
	(4,'à®¤à¯‡à®µà®¾à®°à®®à¯');

/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table member
# ------------------------------------------------------------

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `reader_id` int(11) NOT NULL AUTO_INCREMENT,
  `nric` varchar(12) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sex` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dob` date NOT NULL,
  `address` text CHARACTER SET utf8,
  `homephone` int(12) NOT NULL,
  `mobilephone` int(12) NOT NULL,
  `nationality` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `singstatus` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mem_remark` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`reader_id`),
  UNIQUE KEY `NRIC` (`nric`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` (`reader_id`,`nric`,`fname`,`lname`,`sex`,`dob`,`address`,`homephone`,`mobilephone`,`nationality`,`singstatus`,`mem_remark`)
VALUES
	(1,'S1234567P','Vadivel','Ramsankar','M','1975-03-01','',66187824,90559524,'Others','Others','fjdskhjkdsjkdshkdkkks'),
	(2,'1234','trial12','trial23','F','2009-10-12','Block 105,\r\n#02-394,\r\nBedokReservoir Road,\r\nSingapore',901,901,'Singaporean','Singapore Citizen','this is a trial'),
	(3,'','','','','0000-00-00','',0,0,'','','0');

/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;





/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
