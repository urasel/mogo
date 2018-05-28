/*
SQLyog Ultimate - MySQL GUI v8.21 
MySQL - 5.5.5-10.1.9-MariaDB : Database - wwwinfom_logicaldb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `recipe_categories` */

DROP TABLE IF EXISTS `recipe_categories`;

CREATE TABLE `recipe_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `bn_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `isactive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `recipe_categories` */

LOCK TABLES `recipe_categories` WRITE;

insert  into `recipe_categories`(`id`,`name`,`bn_name`,`isactive`) values (1,NULL,'আচার',1),(2,NULL,'ইফতারি',1),(3,NULL,'ঈদ স্পেসিয়াল',1),(4,NULL,'ঈদ-উল-ফিতর',1),(5,NULL,'কাবাব',1),(6,NULL,'খিচুড়ি',1),(7,NULL,'চাইনিজ খাবার',1),(8,NULL,'টক ঝাল মিষ্টি',1),(9,NULL,'ডাল',1),(10,NULL,'ডাল (ছোলা)',1),(11,NULL,'ডাল (মসুর)',1),(12,NULL,'ডাল (মুগ)',1),(13,NULL,'ডিম',1),(14,NULL,'ডিম মাছ মাংস',1),(15,NULL,'থাই খাবার',1),(16,NULL,'পানীয়',1),(17,NULL,'পানীয় (পাঞ্চ)',1),(18,NULL,'পিঠা',1),(19,NULL,'পোলাও',1),(20,NULL,'ফল বাহার',1),(21,NULL,'বিরিয়ানী',1),(22,NULL,'বেকিং',1),(23,NULL,'বেকিং (রুটি)',1),(24,NULL,'ভর্তা',1),(25,NULL,'ভাজি',1),(26,NULL,'মাংস',1),(27,NULL,'মাংস (খাসির)',1),(28,NULL,'মাংস (গরু)',1),(29,NULL,'মাংস [ মুরগি ]',1),(30,NULL,'মাইক্রোওয়েভ',1),(31,NULL,'মাছ',1),(32,NULL,'মাছ (ইলিশ)',1),(33,NULL,'মাছ (রুপচাঁন্দা)',1),(34,NULL,'মাছ যেকোন মাছ',1),(35,NULL,'মিষ্টান্ন',1),(36,NULL,'শবে বরাত',1),(37,NULL,'শাক সবজি ফল',1),(38,NULL,'শাক সবজি ফল (নিরামিষ)',1),(39,NULL,'সবজি',1),(40,NULL,'সামুদ্রিক খাবার',1),(41,NULL,'সালাদ',1),(42,NULL,'সুপ',1),(43,NULL,'স্নাক্স',1),(44,NULL,'আন্যান্য',1);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
