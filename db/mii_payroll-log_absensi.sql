/*
SQLyog Ultimate v11.5 (64 bit)
MySQL - 5.6.19 : Database - mii_payroll
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mii_payroll` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mii_payroll`;

/*Table structure for table `log_absensi` */

DROP TABLE IF EXISTS `log_absensi`;

CREATE TABLE `log_absensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `log_match_id` int(11) DEFAULT '1' COMMENT 'Match Id',
  `log_finger_id` varchar(15) DEFAULT '1' COMMENT 'ID Finger',
  `log_fulldate` datetime DEFAULT NULL COMMENT 'Full Tgl',
  `log_type` tinyint(4) DEFAULT '1' COMMENT 'Tipe Absensi',
  `log_date` date DEFAULT NULL COMMENT 'Tgl',
  `log_time` time DEFAULT NULL COMMENT 'Jam',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=191749 DEFAULT CHARSET=latin1;

/*Data for the table `log_absensi` */

LOCK TABLES `log_absensi` WRITE;


UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;