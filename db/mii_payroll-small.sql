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
/* CREATE DATABASE /*!32312 IF NOT EXISTS*/`mii_payroll` /*!40100 DEFAULT CHARACTER SET latin1 */;

/* USE `mii_payroll`;

/*Table structure for table `absensi` */

DROP TABLE IF EXISTS `absensi`;

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Absensi',
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'ID. Karyawan',
  `id_shift` int(11) DEFAULT NULL COMMENT 'ID. Shift',
  `tgl_absensi` date DEFAULT NULL COMMENT 'Tgl. Absensi',
  `jam_mulai` time DEFAULT NULL COMMENT 'Jam Mulai',
  `jam_berakhir` time DEFAULT NULL COMMENT 'Jam Berakhir',
  `id_tipe_absensi` int(11) DEFAULT NULL COMMENT 'ID. Tipe Absensi',
  PRIMARY KEY (`id_absensi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `absensi` */

LOCK TABLES `absensi` WRITE;

UNLOCK TABLES;

/*Table structure for table `absensi_summary` */

DROP TABLE IF EXISTS `absensi_summary`;

CREATE TABLE `absensi_summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `id_penggajian` int(11) DEFAULT NULL COMMENT 'ID. Penggajian',
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'ID. Karyawan',
  `tgl` date DEFAULT NULL COMMENT 'Tgl',
  `bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') DEFAULT NULL COMMENT 'Bulan',
  `tahun` varchar(4) DEFAULT NULL COMMENT 'Tahun',
  `hadir` int(11) DEFAULT '0' COMMENT 'Kehadiran',
  `absen` int(11) DEFAULT '0' COMMENT 'Absen',
  `cuti` int(11) DEFAULT '0' COMMENT 'Cuti',
  `sakit` int(11) DEFAULT '0' COMMENT 'Sakit',
  `ijin` int(11) DEFAULT '0' COMMENT 'Ijin',
  `lain` int(11) DEFAULT '0' COMMENT 'Lainnnya',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=417 DEFAULT CHARSET=latin1;

/*Data for the table `absensi_summary` */

LOCK TABLES `absensi_summary` WRITE;

insert  into `absensi_summary`(`id`,`id_penggajian`,`id_karyawan`,`tgl`,`bulan`,`tahun`,`hadir`,`absen`,`cuti`,`sakit`,`ijin`,`lain`) values (351,8,1,'2017-09-12','Agustus','2017',25,0,0,0,0,0),(352,8,2,'2017-09-12','Agustus','2017',22,0,0,0,0,0),(353,8,3,'2017-09-12','Agustus','2017',21,0,0,0,0,0),(354,8,4,'2017-09-12','Agustus','2017',24,0,0,0,0,0),(355,8,5,'2017-09-12','Agustus','2017',21,0,0,0,0,0),(356,8,6,'2017-09-12','Agustus','2017',21,0,0,0,0,0),(357,8,7,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(358,8,8,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(359,8,9,'2017-09-12','Agustus','2017',24,0,0,0,0,0),(360,8,10,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(361,8,11,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(362,8,12,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(363,8,13,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(364,8,14,'2017-09-12','Agustus','2017',25,0,0,0,0,0),(365,8,15,'2017-09-12','Agustus','2017',21,0,0,0,0,0),(366,8,16,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(367,8,17,'2017-09-12','Agustus','2017',24,0,0,0,0,0),(368,8,18,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(369,8,19,'2017-09-12','Agustus','2017',24,0,0,0,0,0),(370,8,20,'2017-09-12','Agustus','2017',20,0,0,0,0,0),(371,8,21,'2017-09-12','Agustus','2017',23,0,0,0,0,0),(372,8,22,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(373,8,23,'2017-09-12','Agustus','2017',26,0,0,0,0,0),(374,8,24,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(375,8,25,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(376,8,26,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(377,8,27,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(378,8,28,'2017-09-12','Agustus','2017',5,0,0,0,0,0),(379,8,29,'2017-09-12','Agustus','2017',23,0,0,0,0,0),(380,8,30,'2017-09-12','Agustus','2017',24,0,0,0,0,0),(381,8,31,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(382,8,32,'2017-09-12','Agustus','2017',17,0,0,0,0,0),(383,8,33,'2017-09-12','Agustus','2017',25,0,0,0,0,0),(384,8,34,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(385,8,35,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(386,8,36,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(387,8,37,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(388,8,38,'2017-09-12','Agustus','2017',23,0,0,0,0,0),(389,8,39,'2017-09-12','Agustus','2017',24,0,0,0,0,0),(390,8,40,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(391,8,41,'2017-09-12','Agustus','2017',24,0,0,0,0,0),(392,8,42,'2017-09-12','Agustus','2017',24,0,0,0,0,0),(393,8,43,'2017-09-12','Agustus','2017',22,0,0,0,0,0),(394,8,44,'2017-09-12','Agustus','2017',21,0,0,0,0,0),(395,8,45,'2017-09-12','Agustus','2017',23,0,0,0,0,0),(396,8,46,'2017-09-12','Agustus','2017',24,0,0,0,0,0),(397,8,47,'2017-09-12','Agustus','2017',22,0,0,0,0,0),(398,8,48,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(399,8,49,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(400,8,50,'2017-09-12','Agustus','2017',0,0,0,0,0,0),(401,8,51,'2017-09-12','Agustus','2017',25,0,0,0,0,0),(402,8,52,'2017-09-12','Agustus','2017',24,0,0,0,0,0),(403,8,53,'2017-09-12','Agustus','2017',25,0,0,0,0,0),(404,8,54,'2017-09-12','Agustus','2017',23,0,0,0,0,0),(405,8,55,'2017-09-12','Agustus','2017',23,0,0,0,0,0),(406,8,56,'2017-09-12','Agustus','2017',24,0,0,0,0,0),(407,8,57,'2017-09-12','Agustus','2017',24,0,0,0,0,0),(408,8,58,'2017-09-12','Agustus','2017',22,0,0,0,0,0),(409,8,59,'2017-09-12','Agustus','2017',22,0,0,0,0,0),(410,8,60,'2017-09-12','Agustus','2017',23,0,0,0,0,0),(411,8,61,'2017-09-12','Agustus','2017',23,0,0,0,0,0),(412,8,62,'2017-09-12','Agustus','2017',24,0,0,0,0,0),(413,8,63,'2017-09-12','Agustus','2017',23,0,0,0,0,0),(414,8,64,'2017-09-12','Agustus','2017',24,0,0,0,0,0),(415,8,65,'2017-09-12','Agustus','2017',26,0,0,0,0,0),(416,8,66,'2017-09-12','Agustus','2017',24,0,0,0,0,0);

UNLOCK TABLES;

/*Table structure for table `cuti` */

DROP TABLE IF EXISTS `cuti`;

CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Cuti',
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'ID. Karyawan',
  `id_tipe_cuti` int(11) DEFAULT NULL COMMENT 'ID. Tipe Cuti',
  `tgl_mulai_cuti` date DEFAULT NULL COMMENT 'Tgl. Mulai Cuti',
  `tgl_berakhir_cuti` date DEFAULT NULL COMMENT 'Tgl. Berakhir Cuti',
  PRIMARY KEY (`id_cuti`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cuti` */

LOCK TABLES `cuti` WRITE;

UNLOCK TABLES;

/*Table structure for table `cuti_detail` */

DROP TABLE IF EXISTS `cuti_detail`;

CREATE TABLE `cuti_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `id_cuti` int(11) DEFAULT NULL COMMENT 'ID Cuti',
  `status_cuti` enum('Check','Approve','Cancel','Denied') DEFAULT NULL COMMENT 'Status Cuti',
  `user_confirm` int(11) DEFAULT NULL COMMENT 'User Konfirmasi',
  `insert_date` datetime DEFAULT NULL COMMENT 'Tgl Insert',
  `note_cuti` tinytext COMMENT 'Keterangan',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cuti_detail` */

LOCK TABLES `cuti_detail` WRITE;

UNLOCK TABLES;

/*Table structure for table `dept` */

DROP TABLE IF EXISTS `dept`;

CREATE TABLE `dept` (
  `id_dept` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Department',
  `nm_dept` varchar(25) DEFAULT NULL COMMENT 'Nama Department',
  `id_perusahaan` int(11) DEFAULT NULL COMMENT 'Perusahaan',
  PRIMARY KEY (`id_dept`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dept` */

LOCK TABLES `dept` WRITE;

UNLOCK TABLES;

/*Table structure for table `informasi_pribadi` */

DROP TABLE IF EXISTS `informasi_pribadi`;

CREATE TABLE `informasi_pribadi` (
  `id_info` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Informasi',
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'ID. Karyawan',
  `nama` varchar(35) DEFAULT NULL COMMENT 'Nama Lengkap',
  `panggilan` varchar(25) DEFAULT NULL COMMENT 'Nama Panggilan',
  `jk` enum('Male','Female') DEFAULT NULL COMMENT 'Jenis Kelamin',
  `tmp_lahir` varchar(35) DEFAULT NULL COMMENT 'Tempat Lahir',
  `tgl_lahir` date DEFAULT NULL COMMENT 'Tgl. Lahir',
  `alamat` tinytext COMMENT 'Alamat',
  `no_telp` varchar(22) DEFAULT NULL COMMENT 'No. Telp',
  `email` varchar(35) DEFAULT NULL COMMENT 'Email',
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

/*Data for the table `informasi_pribadi` */

LOCK TABLES `informasi_pribadi` WRITE;

insert  into `informasi_pribadi`(`id_info`,`id_karyawan`,`nama`,`panggilan`,`jk`,`tmp_lahir`,`tgl_lahir`,`alamat`,`no_telp`,`email`) values (1,1,'Kholil','Kholil','Male',NULL,'1991-04-16',NULL,NULL,NULL),(2,2,'Akhmad Khoiruzzad','Akhmad','Male',NULL,'1988-10-08',NULL,NULL,NULL),(3,3,'Rini Purnamasari','Rini','Female',NULL,'1988-12-26',NULL,NULL,NULL),(4,4,'Ari Kurniasih','Ari','Female',NULL,'1996-01-30',NULL,NULL,NULL),(5,5,'Fathkurrohman','Fatur','Male',NULL,'1987-01-18',NULL,NULL,NULL),(6,6,'M. Abdul Gafur','Gafur','Male',NULL,'1986-07-12',NULL,NULL,NULL),(7,7,'Ruspandi','Pandi','Male',NULL,'1995-07-24',NULL,NULL,NULL),(8,8,'Karsum Sumyadi','Karsum','Male',NULL,'1982-10-28',NULL,NULL,NULL),(9,9,'Yudhi Agung Saputro','Yudhi','Male',NULL,'1993-08-20',NULL,NULL,NULL),(10,10,'Wahyu Karuniati','Wahyu','Female',NULL,'1994-03-02',NULL,NULL,NULL),(11,11,'Zubaedah Mukti','Mukti','Female',NULL,'1996-10-22',NULL,NULL,NULL),(12,12,'Sri Ratna Wulan ','Wulan','Female',NULL,'1997-09-15',NULL,NULL,NULL),(13,13,'Kris Monika Sari','Monika','Female',NULL,'1998-04-21',NULL,NULL,NULL),(14,14,'Yunus Suhendar','Yunus','Male',NULL,'1988-10-10',NULL,NULL,NULL),(15,15,'Niki Rahayu','Niki','Female',NULL,'1996-09-07',NULL,NULL,NULL),(16,16,'Haris Hamdani','Haris','Male',NULL,'1997-10-10',NULL,NULL,NULL),(17,17,'Aditya Gunawan','Adit','Male',NULL,'1997-08-19',NULL,NULL,NULL),(18,18,'Hendro Yohanda','Hendro','Male',NULL,'1994-02-25',NULL,NULL,NULL),(19,19,'Herry Budianto','Herry','Male',NULL,'1995-06-16',NULL,NULL,NULL),(20,20,'Dimas Hardipratama','Dimas','Male',NULL,'1997-05-04',NULL,NULL,NULL),(21,21,'Dinar Mahpudin','Dinar','Male',NULL,'1995-06-23',NULL,NULL,NULL),(22,22,'Abdul Somad','Somad','Male',NULL,'1991-06-01',NULL,NULL,NULL),(23,23,'Chasan Basori','Basori','Male',NULL,'1984-10-20',NULL,NULL,NULL),(24,24,'Nabilia Umma H.F','Nabil','Female',NULL,'1997-08-30',NULL,NULL,NULL),(25,25,'Yeni Aprilia','Yeni','Female',NULL,'1998-04-04',NULL,NULL,NULL),(26,26,'Aep Rohandi','Aep','Male',NULL,'1996-04-07',NULL,NULL,NULL),(27,27,'Agus Solihudin','Agus','Male',NULL,'1995-08-21',NULL,NULL,NULL),(28,28,'Yusuf','Yusuf','Male',NULL,'1995-02-13',NULL,NULL,NULL),(29,29,'Annisa Nur Aini','Annisa','Female',NULL,'1998-06-20',NULL,NULL,NULL),(30,30,'Ari Jaka Pratama','Jaka','Male',NULL,'1995-11-29',NULL,NULL,NULL),(31,31,'Dede Suhaya','Dede','Male',NULL,'1996-02-06',NULL,NULL,NULL),(32,32,'Dudung','Dudung','Male',NULL,'1996-11-15',NULL,NULL,NULL),(33,33,'Siti Nurohmah','Siti','Female',NULL,'1998-09-27',NULL,NULL,NULL),(34,34,'Nyai Nur Syifah','Nyai','Female',NULL,'1998-05-08',NULL,NULL,NULL),(35,35,'Putri Oktavia','Putri','Female',NULL,'1998-10-21',NULL,NULL,NULL),(36,36,'Sinta Carolin','Sinta','Female',NULL,'1998-08-03',NULL,NULL,NULL),(37,37,NULL,'Syamsul','Male',NULL,NULL,NULL,NULL,NULL),(38,38,'Ade Yulianto','Ade','Male',NULL,'1991-06-13',NULL,NULL,NULL),(39,39,'Anggraeni Saputri','Anggraeni','Female',NULL,'1998-01-22',NULL,NULL,NULL),(40,40,'Rezza Shertiani','Rezza','Female',NULL,'1996-05-25',NULL,NULL,NULL),(41,41,'Dedi Ardiyanto','Dedi','Male',NULL,'1998-01-17',NULL,NULL,NULL),(42,42,'Herma Triyana','Herma','Female',NULL,'1996-10-05',NULL,NULL,NULL),(43,43,'Novi Apiani','Novi','Female',NULL,'1998-04-26',NULL,NULL,NULL),(44,44,'R. Anugrah Ramadhan','Anugrah','Male',NULL,'1997-01-19',NULL,NULL,NULL),(45,45,'Suhaendi','Endi','Male',NULL,'1996-03-10',NULL,NULL,NULL),(46,46,'Riki Sugiarto','Riki','Male',NULL,'1997-04-08',NULL,NULL,NULL),(47,47,'Nofi Indriyani','Nofi','Female',NULL,'1998-08-12',NULL,NULL,NULL),(48,48,'Aldin Fauzi','Aldin','Male',NULL,'1997-12-08',NULL,NULL,NULL),(49,49,'Badri','Badri','Male',NULL,'1998-09-10',NULL,NULL,NULL),(50,50,'Ficki Latif Eriyanto','Latif','Male',NULL,'1998-07-24',NULL,NULL,NULL),(51,51,'Hardiyanto','Hardi','Male',NULL,'1998-05-14',NULL,NULL,NULL),(52,52,'Vicky Achmad Alrizal','Singgih','Male',NULL,'1998-03-18',NULL,NULL,NULL),(53,53,'Singgih Ariyan','Vicky','Male',NULL,'1998-05-20',NULL,NULL,NULL),(54,54,'Ahmad Mulyadi','Mulyadi','Male',NULL,'1998-07-16',NULL,NULL,NULL),(55,55,'Ariska Prasetyo','Aris','Male',NULL,'1996-10-06',NULL,NULL,NULL),(56,56,'Endang Srilipur Ati','Endang Sri','Female',NULL,'1998-03-26',NULL,NULL,NULL),(57,57,'Pitri Nurpajar','Pitri','Female',NULL,'1999-01-14',NULL,NULL,NULL),(58,58,'Vera Kartika Salu','Vera','Female',NULL,'1998-11-21',NULL,NULL,NULL),(59,59,'Endang Wijianto','Endang','Male',NULL,'1987-11-22',NULL,NULL,NULL),(60,60,'Atin Supriatin','Atin','Male',NULL,'1997-09-08',NULL,NULL,NULL),(61,61,'Ersih','Ersih','Female',NULL,'1997-05-01',NULL,NULL,NULL),(62,62,'Indra Suryana Putra','Indra','Male',NULL,'1998-10-24',NULL,NULL,NULL),(63,63,'Ninda Yuni Sergiyant','Ninda','Female',NULL,'1998-06-28',NULL,NULL,NULL),(64,64,'Nurhayati','Nur','Female',NULL,'1997-09-27',NULL,NULL,NULL),(65,8,'Karsum Sumyadi','Karsum','Male',NULL,'1984-10-28',NULL,NULL,NULL),(66,66,'Iwa Hadinata','Iwa','Male',NULL,'1988-12-11',NULL,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `nm_jabatan` varchar(35) DEFAULT NULL COMMENT 'Nama Jabatan',
  `id_perusahaan` int(11) DEFAULT NULL COMMENT 'ID Perusahaan',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `jabatan` */

LOCK TABLES `jabatan` WRITE;

insert  into `jabatan`(`id`,`nm_jabatan`,`id_perusahaan`) values (1,'Admin',1),(2,'Driver',1),(3,'FAC, HR, DC',1),(4,'GA, Purc, WH',1),(5,'Leader Prod',1),(6,'Leader QC, QA',1),(7,'Leader WH',1),(8,'Prod',1),(9,'Prod, PPIC, HR',1),(10,'QC',1),(11,'QC, QA',1),(12,'QC/QA',1),(13,'WH',1);

UNLOCK TABLES;

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `nik` varchar(8) DEFAULT NULL COMMENT 'NIK',
  `status` enum('Magang','Probation','Karyawan Kontrak','Karyawan Tetap','Resign') DEFAULT NULL COMMENT 'Status',
  `id_perusahaan` int(11) DEFAULT NULL COMMENT 'ID Perusahaan',
  `id_jabatan` int(11) DEFAULT NULL COMMENT 'ID Jabatan',
  `tgl_bergabung` date DEFAULT NULL COMMENT 'Tgl. Bergabung',
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

/*Data for the table `karyawan` */

LOCK TABLES `karyawan` WRITE;

insert  into `karyawan`(`id_karyawan`,`nik`,`status`,`id_perusahaan`,`id_jabatan`,`tgl_bergabung`) values (1,'T2002','Karyawan Tetap',1,4,'2012-11-16'),(2,'T2001','Karyawan Tetap',1,9,'2012-10-16'),(3,'T2018','Karyawan Tetap',1,3,'2014-03-04'),(4,'T2026','Karyawan Tetap',1,12,'2015-01-14'),(5,'T2029','Karyawan Tetap',1,5,'2015-03-02'),(6,'T2017','Karyawan Tetap',1,11,'2014-03-03'),(7,'OJT22','Karyawan Tetap',1,8,'2015-11-02'),(8,'T2030','Karyawan Tetap',1,2,'2015-06-01'),(9,'T2031','Karyawan Tetap',1,8,'2015-08-03'),(10,'T2032','Karyawan Tetap',1,8,'2015-08-10'),(11,'OJT26','Karyawan Tetap',1,8,'2015-11-23'),(12,'OJT25','Karyawan Tetap',1,8,'2015-11-23'),(13,'OJT27','Karyawan Tetap',1,8,'2016-01-04'),(14,'T2034','Karyawan Tetap',1,13,'2016-01-04'),(15,'T2035','Karyawan Tetap',1,8,'2016-02-09'),(16,'OJT28','Karyawan Tetap',1,8,'2016-02-22'),(17,'T2036','Karyawan Tetap',1,8,'2016-03-14'),(18,'T2037','Karyawan Tetap',1,8,'2016-03-14'),(19,'T2039','Karyawan Tetap',1,8,'2016-05-16'),(20,'T2040','Karyawan Tetap',1,8,'2016-05-24'),(21,'T2041','Karyawan Tetap',1,13,'2016-05-24'),(22,'T2042','Karyawan Tetap',1,7,'2016-06-01'),(23,'T2043','Karyawan Tetap',1,13,'2016-06-06'),(24,'OJT31','Karyawan Tetap',1,8,'2016-07-11'),(25,'OJT32','Karyawan Tetap',1,8,'2016-07-11'),(26,'T2044','Karyawan Tetap',1,10,'2016-07-14'),(27,'T2046','Karyawan Tetap',1,10,'2016-08-10'),(28,'T2047','Karyawan Tetap',1,8,'2016-08-10'),(29,'T2048','Karyawan Tetap',1,8,'2016-09-26'),(30,'T2049','Karyawan Tetap',1,8,'2016-09-26'),(31,'T2050','Karyawan Tetap',1,8,'2016-09-26'),(32,'T2051','Karyawan Tetap',1,8,'2016-09-26'),(33,'T2052','Karyawan Tetap',1,12,'2016-09-27'),(34,'OJT33','Karyawan Tetap',1,8,'2016-11-01'),(35,'OJT34','Karyawan Tetap',1,8,'2016-11-01'),(36,'OJT35','Karyawan Tetap',1,8,'2016-11-01'),(37,'OJT36','Karyawan Tetap',1,8,'2016-12-01'),(38,'T2053','Karyawan Tetap',1,6,'2016-12-06'),(39,'T2054','Karyawan Tetap',1,12,'2016-12-06'),(40,'T2055','Karyawan Tetap',1,1,'2016-12-06'),(41,'T2056','Karyawan Tetap',1,8,'2017-02-01'),(42,'T2057','Karyawan Tetap',1,8,'2017-02-21'),(43,'T2058','Karyawan Tetap',1,8,'2017-02-21'),(44,'T2033','Karyawan Tetap',1,8,'2017-02-21'),(45,'T2060','Karyawan Tetap',1,8,'2017-03-07'),(46,'T2061','Karyawan Tetap',1,8,'2017-03-13'),(47,'T2062','Karyawan Tetap',1,8,'2017-03-21'),(48,'OJT37','Karyawan Tetap',1,8,'2017-04-03'),(49,'OJT38','Karyawan Tetap',1,8,'2017-04-03'),(50,'OJT39','Karyawan Tetap',1,8,'2017-04-03'),(51,'OJT40','Karyawan Tetap',1,8,'2017-04-03'),(52,'OJT42','Karyawan Tetap',1,8,'2017-04-03'),(53,'OJT41','Karyawan Tetap',1,8,'2017-04-03'),(54,'T2063','Karyawan Tetap',1,8,'2017-04-10'),(55,'T2064','Karyawan Tetap',1,8,'2017-04-10'),(56,'T2065','Karyawan Tetap',1,8,'2017-04-10'),(57,'T2066','Karyawan Tetap',1,8,'2017-04-10'),(58,'T2067','Karyawan Tetap',1,8,'2017-04-10'),(59,'T2068','Karyawan Tetap',1,7,'2017-05-03'),(60,'T2069','Karyawan Tetap',1,8,'2017-06-05'),(61,'T2070','Karyawan Tetap',1,8,'2017-06-05'),(62,'T2071','Karyawan Tetap',1,8,'2017-06-05'),(63,'T2072','Karyawan Tetap',1,8,'2017-06-05'),(64,'T2073','Karyawan Tetap',1,8,'2017-06-05'),(65,'T2074','Karyawan Tetap',1,13,'2017-07-10'),(66,'T2075','Karyawan Tetap',1,13,'2017-08-01');

UNLOCK TABLES;

/*Table structure for table `karyawan_atasan` */

DROP TABLE IF EXISTS `karyawan_atasan`;

CREATE TABLE `karyawan_atasan` (
  `id_atasan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Karyawan Atasan',
  `id_karyawan_atasan` int(11) DEFAULT NULL COMMENT 'ID. Atasan',
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'ID. Karyawan',
  PRIMARY KEY (`id_atasan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `karyawan_atasan` */

LOCK TABLES `karyawan_atasan` WRITE;

insert  into `karyawan_atasan`(`id_atasan`,`id_karyawan_atasan`,`id_karyawan`) values (8,1,6);

UNLOCK TABLES;

/*Table structure for table `karyawan_dept` */

DROP TABLE IF EXISTS `karyawan_dept`;

CREATE TABLE `karyawan_dept` (
  `id_relasi` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Relasi Karyawan Department',
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'Karyawan',
  `id_dept` int(11) DEFAULT NULL COMMENT 'Department',
  PRIMARY KEY (`id_relasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `karyawan_dept` */

LOCK TABLES `karyawan_dept` WRITE;

UNLOCK TABLES;

/*Table structure for table `karyawan_finger_id` */

DROP TABLE IF EXISTS `karyawan_finger_id`;

CREATE TABLE `karyawan_finger_id` (
  `id_kfi` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `log_finger_id` varchar(15) DEFAULT NULL COMMENT 'ID Finger',
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'ID Karyawan',
  PRIMARY KEY (`id_kfi`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

/*Data for the table `karyawan_finger_id` */

LOCK TABLES `karyawan_finger_id` WRITE;

insert  into `karyawan_finger_id`(`id_kfi`,`log_finger_id`,`id_karyawan`) values (1,'333',48),(2,'334',49),(3,'335',50),(4,'336',51),(5,'337',52),(6,'338',53),(7,'339',54),(8,'340',55),(9,'341',56),(10,'342',57),(11,'343',58),(12,'344',59),(13,'346',60),(14,'347',61),(15,'348',62),(16,'349',63),(17,'350',64),(18,'351',65),(19,'352',66),(20,'33',3),(21,'25',2),(22,'23',1),(23,'53',4),(24,'59',5),(25,'60',6),(26,'94',8),(27,'98',9),(28,'105',10),(29,'73',7),(30,'110',12),(31,'109',11),(32,'113',13),(33,'114',14),(34,'115',15),(35,'161',16),(36,'163',17),(37,'164',18),(38,'167',19),(39,'199',20),(40,'200',21),(41,'201',22),(42,'202',23),(43,'203',24),(44,'205',25),(45,'206',26),(46,'240',27),(47,'241',28),(48,'247',29),(49,'248',30),(50,'249',31),(51,'250',32),(52,'251',33),(53,'267',34),(54,'268',35),(55,'269',36),(56,'276',37),(57,'323',38),(58,'324',39),(59,'325',40),(60,'326',41),(61,'327',42),(62,'328',43),(63,'329',44),(64,'330',45),(65,'331',46),(66,'332',47);

UNLOCK TABLES;

/*Table structure for table `komponen_gaji` */

DROP TABLE IF EXISTS `komponen_gaji`;

CREATE TABLE `komponen_gaji` (
  `id_komponen` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Komponen',
  `nm_komponen` varchar(35) DEFAULT NULL COMMENT 'Nama Komponen',
  `kategori_komponen` enum('Pendapatan','Potongan','Gaji Pokok') DEFAULT NULL COMMENT 'Kategori',
  `tipe` enum('-','Harian','Bulanan') DEFAULT 'Bulanan' COMMENT 'Tipe',
  PRIMARY KEY (`id_komponen`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `komponen_gaji` */

LOCK TABLES `komponen_gaji` WRITE;

insert  into `komponen_gaji`(`id_komponen`,`nm_komponen`,`kategori_komponen`,`tipe`) values (1,'Kehadiran','Pendapatan','Harian');

UNLOCK TABLES;

/*Table structure for table `komponen_gaji_karyawan` */

DROP TABLE IF EXISTS `komponen_gaji_karyawan`;

CREATE TABLE `komponen_gaji_karyawan` (
  `id_kgk` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Komponen Gaji Karyawan',
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'ID. Karyawan',
  `id_komponen` int(11) DEFAULT NULL COMMENT 'ID. Komponen',
  `nominal` decimal(10,2) DEFAULT '0.00' COMMENT 'Nominal',
  PRIMARY KEY (`id_kgk`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

/*Data for the table `komponen_gaji_karyawan` */

LOCK TABLES `komponen_gaji_karyawan` WRITE;

insert  into `komponen_gaji_karyawan`(`id_kgk`,`id_karyawan`,`id_komponen`,`nominal`) values (72,1,1,'30000.00'),(73,2,1,'30000.00'),(74,3,1,'30000.00'),(75,4,1,'30000.00'),(76,5,1,'30000.00'),(77,6,1,'30000.00'),(78,7,1,'30000.00'),(79,8,1,'30000.00'),(80,9,1,'30000.00'),(81,10,1,'30000.00'),(82,11,1,'30000.00'),(83,12,1,'30000.00'),(84,13,1,'30000.00'),(85,14,1,'30000.00'),(86,15,1,'30000.00'),(87,16,1,'30000.00'),(88,17,1,'30000.00'),(89,18,1,'30000.00'),(90,19,1,'30000.00'),(91,20,1,'30000.00'),(92,21,1,'30000.00'),(93,22,1,'30000.00'),(94,23,1,'30000.00'),(95,24,1,'30000.00'),(96,25,1,'30000.00'),(97,26,1,'30000.00'),(98,27,1,'30000.00'),(99,28,1,'30000.00'),(100,29,1,'30000.00'),(101,30,1,'30000.00'),(102,31,1,'30000.00'),(103,32,1,'30000.00'),(104,33,1,'30000.00'),(105,34,1,'30000.00'),(106,35,1,'30000.00'),(107,36,1,'30000.00'),(108,37,1,'30000.00'),(109,38,1,'30000.00'),(110,39,1,'30000.00'),(111,40,1,'30000.00'),(112,41,1,'30000.00'),(113,42,1,'30000.00'),(114,43,1,'30000.00'),(115,44,1,'30000.00'),(116,45,1,'30000.00'),(117,46,1,'30000.00'),(118,47,1,'30000.00'),(119,48,1,'30000.00'),(120,49,1,'30000.00'),(121,50,1,'30000.00'),(122,51,1,'30000.00'),(123,52,1,'30000.00'),(124,53,1,'30000.00'),(125,54,1,'30000.00'),(126,55,1,'30000.00'),(127,56,1,'30000.00'),(128,57,1,'30000.00'),(129,58,1,'30000.00'),(130,59,1,'30000.00'),(131,60,1,'30000.00'),(132,61,1,'30000.00'),(133,62,1,'30000.00'),(134,63,1,'30000.00'),(135,64,1,'30000.00'),(136,65,1,'30000.00'),(137,66,1,'30000.00');

UNLOCK TABLES;

/*Table structure for table `pendidikan` */

DROP TABLE IF EXISTS `pendidikan`;

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Pendidikan',
  `nm_pendidikan` varchar(35) DEFAULT NULL COMMENT 'Nama Pendidikan',
  `deskripsi` varchar(75) DEFAULT NULL COMMENT 'Deskripsi',
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pendidikan` */

LOCK TABLES `pendidikan` WRITE;

UNLOCK TABLES;

/*Table structure for table `penggajian` */

DROP TABLE IF EXISTS `penggajian`;

CREATE TABLE `penggajian` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Penggajian',
  `tgl` date NOT NULL COMMENT 'Tgl. Penggajian',
  `bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL COMMENT 'Bulan Penggajian',
  `tahun` varchar(4) NOT NULL COMMENT 'Tahun Penggajian',
  `id_perusahaan` int(11) NOT NULL COMMENT 'ID Perusahaan',
  `tgl_awal` date DEFAULT NULL COMMENT 'Tgl. Awal Cut Off',
  `tgl_akhir` date DEFAULT NULL COMMENT 'Tgl. Akhir Cut Off',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `penggajian` */

LOCK TABLES `penggajian` WRITE;

insert  into `penggajian`(`id`,`tgl`,`bulan`,`tahun`,`id_perusahaan`,`tgl_awal`,`tgl_akhir`) values (8,'2017-09-12','Agustus','2017',1,'2017-08-01','2017-08-31');

UNLOCK TABLES;

/*Table structure for table `penggajian_karyawan` */

DROP TABLE IF EXISTS `penggajian_karyawan`;

CREATE TABLE `penggajian_karyawan` (
  `id_pk` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Penggajian Karyawan',
  `id_penggajian` int(11) DEFAULT NULL COMMENT 'ID. Penggajian',
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'ID. Karyawan',
  `pendapatan` decimal(10,2) DEFAULT '0.00' COMMENT 'Pendapatan',
  `potongan` decimal(10,2) DEFAULT '0.00' COMMENT 'Potongan',
  `subtotal` decimal(10,2) DEFAULT '0.00' COMMENT 'Subtotal',
  `bonus` decimal(10,2) DEFAULT '0.00' COMMENT 'Bonus',
  `pajak` decimal(10,2) DEFAULT '0.00' COMMENT 'Pajak',
  `thp` decimal(10,2) DEFAULT '0.00' COMMENT 'Take Home Pay',
  PRIMARY KEY (`id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=368 DEFAULT CHARSET=latin1;

/*Data for the table `penggajian_karyawan` */

LOCK TABLES `penggajian_karyawan` WRITE;

insert  into `penggajian_karyawan`(`id_pk`,`id_penggajian`,`id_karyawan`,`pendapatan`,`potongan`,`subtotal`,`bonus`,`pajak`,`thp`) values (302,8,1,'750000.00','0.00','750000.00','0.00','0.00','750000.00'),(303,8,2,'660000.00','0.00','660000.00','0.00','0.00','660000.00'),(304,8,3,'630000.00','0.00','630000.00','0.00','0.00','630000.00'),(305,8,4,'720000.00','0.00','720000.00','0.00','0.00','720000.00'),(306,8,5,'630000.00','0.00','630000.00','0.00','0.00','630000.00'),(307,8,6,'630000.00','0.00','630000.00','0.00','0.00','630000.00'),(308,8,7,'0.00','0.00','0.00','0.00','0.00','0.00'),(309,8,8,'0.00','0.00','0.00','0.00','0.00','0.00'),(310,8,9,'720000.00','0.00','720000.00','0.00','0.00','720000.00'),(311,8,10,'0.00','0.00','0.00','0.00','0.00','0.00'),(312,8,11,'0.00','0.00','0.00','0.00','0.00','0.00'),(313,8,12,'0.00','0.00','0.00','0.00','0.00','0.00'),(314,8,13,'0.00','0.00','0.00','0.00','0.00','0.00'),(315,8,14,'750000.00','0.00','750000.00','0.00','0.00','750000.00'),(316,8,15,'630000.00','0.00','630000.00','0.00','0.00','630000.00'),(317,8,16,'0.00','0.00','0.00','0.00','0.00','0.00'),(318,8,17,'720000.00','0.00','720000.00','0.00','0.00','720000.00'),(319,8,18,'0.00','0.00','0.00','0.00','0.00','0.00'),(320,8,19,'720000.00','0.00','720000.00','0.00','0.00','720000.00'),(321,8,20,'600000.00','0.00','600000.00','0.00','0.00','600000.00'),(322,8,21,'690000.00','0.00','690000.00','0.00','0.00','690000.00'),(323,8,22,'0.00','0.00','0.00','0.00','0.00','0.00'),(324,8,23,'780000.00','0.00','780000.00','0.00','0.00','780000.00'),(325,8,24,'0.00','0.00','0.00','0.00','0.00','0.00'),(326,8,25,'0.00','0.00','0.00','0.00','0.00','0.00'),(327,8,26,'0.00','0.00','0.00','0.00','0.00','0.00'),(328,8,27,'0.00','0.00','0.00','0.00','0.00','0.00'),(329,8,28,'150000.00','0.00','150000.00','0.00','0.00','150000.00'),(330,8,29,'690000.00','0.00','690000.00','0.00','0.00','690000.00'),(331,8,30,'720000.00','0.00','720000.00','0.00','0.00','720000.00'),(332,8,31,'0.00','0.00','0.00','0.00','0.00','0.00'),(333,8,32,'510000.00','0.00','510000.00','0.00','0.00','510000.00'),(334,8,33,'750000.00','0.00','750000.00','0.00','0.00','750000.00'),(335,8,34,'0.00','0.00','0.00','0.00','0.00','0.00'),(336,8,35,'0.00','0.00','0.00','0.00','0.00','0.00'),(337,8,36,'0.00','0.00','0.00','0.00','0.00','0.00'),(338,8,37,'0.00','0.00','0.00','0.00','0.00','0.00'),(339,8,38,'690000.00','0.00','690000.00','0.00','0.00','690000.00'),(340,8,39,'720000.00','0.00','720000.00','0.00','0.00','720000.00'),(341,8,40,'0.00','0.00','0.00','0.00','0.00','0.00'),(342,8,41,'720000.00','0.00','720000.00','0.00','0.00','720000.00'),(343,8,42,'720000.00','0.00','720000.00','0.00','0.00','720000.00'),(344,8,43,'660000.00','0.00','660000.00','0.00','0.00','660000.00'),(345,8,44,'630000.00','0.00','630000.00','0.00','0.00','630000.00'),(346,8,45,'690000.00','0.00','690000.00','0.00','0.00','690000.00'),(347,8,46,'720000.00','0.00','720000.00','0.00','0.00','720000.00'),(348,8,47,'660000.00','0.00','660000.00','0.00','0.00','660000.00'),(349,8,48,'0.00','0.00','0.00','0.00','0.00','0.00'),(350,8,49,'0.00','0.00','0.00','0.00','0.00','0.00'),(351,8,50,'0.00','0.00','0.00','0.00','0.00','0.00'),(352,8,51,'750000.00','0.00','750000.00','0.00','0.00','750000.00'),(353,8,52,'720000.00','0.00','720000.00','0.00','0.00','720000.00'),(354,8,53,'750000.00','0.00','750000.00','0.00','0.00','750000.00'),(355,8,54,'690000.00','0.00','690000.00','0.00','0.00','690000.00'),(356,8,55,'690000.00','0.00','690000.00','0.00','0.00','690000.00'),(357,8,56,'720000.00','0.00','720000.00','0.00','0.00','720000.00'),(358,8,57,'720000.00','0.00','720000.00','0.00','0.00','720000.00'),(359,8,58,'660000.00','0.00','660000.00','0.00','0.00','660000.00'),(360,8,59,'660000.00','0.00','660000.00','0.00','0.00','660000.00'),(361,8,60,'690000.00','0.00','690000.00','0.00','0.00','690000.00'),(362,8,61,'690000.00','0.00','690000.00','0.00','0.00','690000.00'),(363,8,62,'720000.00','0.00','720000.00','0.00','0.00','720000.00'),(364,8,63,'690000.00','0.00','690000.00','0.00','0.00','690000.00'),(365,8,64,'720000.00','0.00','720000.00','0.00','0.00','720000.00'),(366,8,65,'780000.00','0.00','780000.00','0.00','0.00','780000.00'),(367,8,66,'720000.00','0.00','720000.00','0.00','0.00','720000.00');

UNLOCK TABLES;

/*Table structure for table `penggajian_karyawan_detail` */

DROP TABLE IF EXISTS `penggajian_karyawan_detail`;

CREATE TABLE `penggajian_karyawan_detail` (
  `id_pkd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Penggajian Karyawan Detail',
  `id_pk` int(11) DEFAULT NULL COMMENT 'ID. Penggajian Karyawan',
  `id_komponen` int(11) DEFAULT NULL COMMENT 'ID. Komponen',
  `jumlah` smallint(6) DEFAULT '0' COMMENT 'Jumlah',
  `nominal` decimal(10,2) DEFAULT '0.00' COMMENT 'Nominal',
  `subtotal` decimal(10,2) DEFAULT '0.00' COMMENT 'Subtotal',
  PRIMARY KEY (`id_pkd`)
) ENGINE=InnoDB AUTO_INCREMENT=457 DEFAULT CHARSET=latin1;

/*Data for the table `penggajian_karyawan_detail` */

LOCK TABLES `penggajian_karyawan_detail` WRITE;

insert  into `penggajian_karyawan_detail`(`id_pkd`,`id_pk`,`id_komponen`,`jumlah`,`nominal`,`subtotal`) values (391,302,1,25,'30000.00','750000.00'),(392,303,1,22,'30000.00','660000.00'),(393,304,1,21,'30000.00','630000.00'),(394,305,1,24,'30000.00','720000.00'),(395,306,1,21,'30000.00','630000.00'),(396,307,1,21,'30000.00','630000.00'),(397,308,1,0,'30000.00','0.00'),(398,309,1,0,'30000.00','0.00'),(399,310,1,24,'30000.00','720000.00'),(400,311,1,0,'30000.00','0.00'),(401,312,1,0,'30000.00','0.00'),(402,313,1,0,'30000.00','0.00'),(403,314,1,0,'30000.00','0.00'),(404,315,1,25,'30000.00','750000.00'),(405,316,1,21,'30000.00','630000.00'),(406,317,1,0,'30000.00','0.00'),(407,318,1,24,'30000.00','720000.00'),(408,319,1,0,'30000.00','0.00'),(409,320,1,24,'30000.00','720000.00'),(410,321,1,20,'30000.00','600000.00'),(411,322,1,23,'30000.00','690000.00'),(412,323,1,0,'30000.00','0.00'),(413,324,1,26,'30000.00','780000.00'),(414,325,1,0,'30000.00','0.00'),(415,326,1,0,'30000.00','0.00'),(416,327,1,0,'30000.00','0.00'),(417,328,1,0,'30000.00','0.00'),(418,329,1,5,'30000.00','150000.00'),(419,330,1,23,'30000.00','690000.00'),(420,331,1,24,'30000.00','720000.00'),(421,332,1,0,'30000.00','0.00'),(422,333,1,17,'30000.00','510000.00'),(423,334,1,25,'30000.00','750000.00'),(424,335,1,0,'30000.00','0.00'),(425,336,1,0,'30000.00','0.00'),(426,337,1,0,'30000.00','0.00'),(427,338,1,0,'30000.00','0.00'),(428,339,1,23,'30000.00','690000.00'),(429,340,1,24,'30000.00','720000.00'),(430,341,1,0,'30000.00','0.00'),(431,342,1,24,'30000.00','720000.00'),(432,343,1,24,'30000.00','720000.00'),(433,344,1,22,'30000.00','660000.00'),(434,345,1,21,'30000.00','630000.00'),(435,346,1,23,'30000.00','690000.00'),(436,347,1,24,'30000.00','720000.00'),(437,348,1,22,'30000.00','660000.00'),(438,349,1,0,'30000.00','0.00'),(439,350,1,0,'30000.00','0.00'),(440,351,1,0,'30000.00','0.00'),(441,352,1,25,'30000.00','750000.00'),(442,353,1,24,'30000.00','720000.00'),(443,354,1,25,'30000.00','750000.00'),(444,355,1,23,'30000.00','690000.00'),(445,356,1,23,'30000.00','690000.00'),(446,357,1,24,'30000.00','720000.00'),(447,358,1,24,'30000.00','720000.00'),(448,359,1,22,'30000.00','660000.00'),(449,360,1,22,'30000.00','660000.00'),(450,361,1,23,'30000.00','690000.00'),(451,362,1,23,'30000.00','690000.00'),(452,363,1,24,'30000.00','720000.00'),(453,364,1,23,'30000.00','690000.00'),(454,365,1,24,'30000.00','720000.00'),(455,366,1,26,'30000.00','780000.00'),(456,367,1,24,'30000.00','720000.00');

UNLOCK TABLES;

/*Table structure for table `penggajian_komponen` */

DROP TABLE IF EXISTS `penggajian_komponen`;

CREATE TABLE `penggajian_komponen` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Detail',
  `id_penggajian` int(11) DEFAULT NULL COMMENT 'ID. Penggajian',
  `id_komponen` int(11) DEFAULT NULL COMMENT 'ID. Komponen',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

/*Data for the table `penggajian_komponen` */

LOCK TABLES `penggajian_komponen` WRITE;

insert  into `penggajian_komponen`(`id`,`id_penggajian`,`id_komponen`) values (79,8,1);

UNLOCK TABLES;

/*Table structure for table `perusahaan` */

DROP TABLE IF EXISTS `perusahaan`;

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Perusahaan',
  `nm_pt` varchar(35) DEFAULT NULL COMMENT 'Nama Perusahaan',
  `alamat` tinytext COMMENT 'Alamat',
  `no_telp` varchar(35) DEFAULT NULL COMMENT 'No. Telp',
  `no_fax` varchar(35) DEFAULT NULL COMMENT 'No. Fax',
  `email` varchar(75) DEFAULT NULL COMMENT 'Email',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `perusahaan` */

LOCK TABLES `perusahaan` WRITE;

insert  into `perusahaan`(`id`,`nm_pt`,`alamat`,`no_telp`,`no_fax`,`email`) values (1,'PT. Matsumoto Industries Indonesia','Jl. Surya Kencana Kw. Industri Surya Cipta\r\nKutanegara, Ciampel, Kabupaten Karawang, Jawa Barat 41363',NULL,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `riwayat_pendidikan` */

DROP TABLE IF EXISTS `riwayat_pendidikan`;

CREATE TABLE `riwayat_pendidikan` (
  `id_rp` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Riwayat Pendidikan',
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'ID. Karyawan',
  `id_pendidikan` int(11) DEFAULT NULL COMMENT 'ID. Pendidikan',
  `id_tmpt_pendidikan` int(11) DEFAULT NULL COMMENT 'ID. Tempat Pendidikan',
  `thn_lulus` varchar(4) DEFAULT NULL COMMENT 'Tahun Lulus',
  PRIMARY KEY (`id_rp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `riwayat_pendidikan` */

LOCK TABLES `riwayat_pendidikan` WRITE;

UNLOCK TABLES;

/*Table structure for table `shift` */

DROP TABLE IF EXISTS `shift`;

CREATE TABLE `shift` (
  `id_shift` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Shift',
  `id_karyawan` int(11) DEFAULT NULL,
  `id_tipe_shift` int(11) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_berakhir` time DEFAULT NULL,
  PRIMARY KEY (`id_shift`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `shift` */

LOCK TABLES `shift` WRITE;

UNLOCK TABLES;

/*Table structure for table `sys_user` */

DROP TABLE IF EXISTS `sys_user`;

CREATE TABLE `sys_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `number_id` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `auth_token` varchar(255) DEFAULT NULL,
  `pass_reset` varchar(255) DEFAULT NULL,
  `pass_generated` varchar(255) DEFAULT NULL,
  `tipe_user` enum('Karyawan','Admin') DEFAULT 'Karyawan',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

/*Data for the table `sys_user` */

LOCK TABLES `sys_user` WRITE;

insert  into `sys_user`(`id`,`number_id`,`user_name`,`user_pass`,`auth_key`,`auth_token`,`pass_reset`,`pass_generated`,`tipe_user`) values (131,NULL,'admin','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,'Admin');

UNLOCK TABLES;

/*Table structure for table `tempat_pendidikan` */

DROP TABLE IF EXISTS `tempat_pendidikan`;

CREATE TABLE `tempat_pendidikan` (
  `id_tp` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Tempat Pendidikan',
  `nm_tmpt` varchar(35) DEFAULT NULL COMMENT 'Nama Tempat Pendidikan',
  `alamat` tinytext COMMENT 'Alamat',
  `no_telp` varchar(22) DEFAULT NULL COMMENT 'No. Telp',
  `no_fax` varchar(22) DEFAULT NULL COMMENT 'No. Fax',
  `email` varchar(35) DEFAULT NULL COMMENT 'Email',
  PRIMARY KEY (`id_tp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tempat_pendidikan` */

LOCK TABLES `tempat_pendidikan` WRITE;

UNLOCK TABLES;

/*Table structure for table `tipe_absensi` */

DROP TABLE IF EXISTS `tipe_absensi`;

CREATE TABLE `tipe_absensi` (
  `id_tipe_absensi` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Tipe Absensi',
  `nm_tipe_absensi` varchar(35) DEFAULT NULL COMMENT 'Nama Tipe Absensi',
  PRIMARY KEY (`id_tipe_absensi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipe_absensi` */

LOCK TABLES `tipe_absensi` WRITE;

UNLOCK TABLES;

/*Table structure for table `tipe_cuti` */

DROP TABLE IF EXISTS `tipe_cuti`;

CREATE TABLE `tipe_cuti` (
  `id_tipe_cuti` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Tipe Cuti',
  `nm_tipe_cuti` varchar(35) DEFAULT NULL COMMENT 'Nama Tipe Cuti',
  `jatah_cuti` smallint(6) DEFAULT NULL COMMENT 'Jatah Cuti',
  PRIMARY KEY (`id_tipe_cuti`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipe_cuti` */

LOCK TABLES `tipe_cuti` WRITE;

UNLOCK TABLES;

/*Table structure for table `tipe_shift` */

DROP TABLE IF EXISTS `tipe_shift`;

CREATE TABLE `tipe_shift` (
  `id_tipe_shift` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID. Tipe Shift',
  `nm_shift` varchar(35) DEFAULT NULL COMMENT 'Nama Shift',
  PRIMARY KEY (`id_tipe_shift`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipe_shift` */

LOCK TABLES `tipe_shift` WRITE;

UNLOCK TABLES;

/*Table structure for table `v_karyawan` */

DROP TABLE IF EXISTS `v_karyawan`;

/*!50001 DROP VIEW IF EXISTS `v_karyawan` */;
/*!50001 DROP TABLE IF EXISTS `v_karyawan` */;

/*!50001 CREATE TABLE  `v_karyawan`(
 `id_karyawan` int(11) ,
 `nik` varchar(8) ,
 `status` enum('Magang','Probation','Karyawan Kontrak','Karyawan Tetap','Resign') ,
 `id_perusahaan` int(11) ,
 `id_jabatan` int(11) ,
 `tgl_bergabung` date ,
 `nm_jabatan` varchar(35) ,
 `nama` varchar(35) ,
 `nm_pt` varchar(35) 
)*/;

/*Table structure for table `v_karyawan_atasan` */

DROP TABLE IF EXISTS `v_karyawan_atasan`;

/*!50001 DROP VIEW IF EXISTS `v_karyawan_atasan` */;
/*!50001 DROP TABLE IF EXISTS `v_karyawan_atasan` */;

/*!50001 CREATE TABLE  `v_karyawan_atasan`(
 `id_atasan` int(11) ,
 `id_karyawan_atasan` int(11) ,
 `id_karyawan` int(11) ,
 `nama` varchar(35) 
)*/;

/*Table structure for table `v_karyawan_finger` */

DROP TABLE IF EXISTS `v_karyawan_finger`;

/*!50001 DROP VIEW IF EXISTS `v_karyawan_finger` */;
/*!50001 DROP TABLE IF EXISTS `v_karyawan_finger` */;

/*!50001 CREATE TABLE  `v_karyawan_finger`(
 `id_kfi` int(11) ,
 `log_finger_id` varchar(15) ,
 `id_karyawan` int(11) ,
 `nama` varchar(35) 
)*/;

/*Table structure for table `v_komponen_gaji` */

DROP TABLE IF EXISTS `v_komponen_gaji`;

/*!50001 DROP VIEW IF EXISTS `v_komponen_gaji` */;
/*!50001 DROP TABLE IF EXISTS `v_komponen_gaji` */;

/*!50001 CREATE TABLE  `v_komponen_gaji`(
 `id_karyawan` int(11) ,
 `nik` varchar(8) ,
 `id_kgk` int(11) ,
 `nominal` decimal(10,2) ,
 `id_komponen` int(11) ,
 `nm_komponen` varchar(35) ,
 `kategori_komponen` enum('Pendapatan','Potongan','Gaji Pokok') 
)*/;

/*Table structure for table `v_penggajian_karyawan` */

DROP TABLE IF EXISTS `v_penggajian_karyawan`;

/*!50001 DROP VIEW IF EXISTS `v_penggajian_karyawan` */;
/*!50001 DROP TABLE IF EXISTS `v_penggajian_karyawan` */;

/*!50001 CREATE TABLE  `v_penggajian_karyawan`(
 `id_pk` int(11) ,
 `id_penggajian` int(11) ,
 `id_karyawan` int(11) ,
 `pendapatan` decimal(10,2) ,
 `potongan` decimal(10,2) ,
 `subtotal` decimal(10,2) ,
 `bonus` decimal(10,2) ,
 `pajak` decimal(10,2) ,
 `thp` decimal(10,2) ,
 `nm_jabatan` varchar(35) 
)*/;

/*Table structure for table `v_riwayat_pendidikan` */

DROP TABLE IF EXISTS `v_riwayat_pendidikan`;

/*!50001 DROP VIEW IF EXISTS `v_riwayat_pendidikan` */;
/*!50001 DROP TABLE IF EXISTS `v_riwayat_pendidikan` */;

/*!50001 CREATE TABLE  `v_riwayat_pendidikan`(
 `id_rp` int(11) ,
 `id_karyawan` int(11) ,
 `nama` varchar(35) ,
 `id_pendidikan` int(11) ,
 `nm_pendidikan` varchar(35) ,
 `id_tmpt_pendidikan` int(11) ,
 `nm_tmpt` varchar(35) ,
 `thn_lulus` varchar(4) 
)*/;

/*View structure for view v_karyawan */

/*!50001 DROP TABLE IF EXISTS `v_karyawan` */;
/*!50001 DROP VIEW IF EXISTS `v_karyawan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_karyawan` AS select `karyawan`.`id_karyawan` AS `id_karyawan`,`karyawan`.`nik` AS `nik`,`karyawan`.`status` AS `status`,`karyawan`.`id_perusahaan` AS `id_perusahaan`,`karyawan`.`id_jabatan` AS `id_jabatan`,`karyawan`.`tgl_bergabung` AS `tgl_bergabung`,`jabatan`.`nm_jabatan` AS `nm_jabatan`,`informasi_pribadi`.`nama` AS `nama`,`perusahaan`.`nm_pt` AS `nm_pt` from (((`jabatan` join `karyawan` on((`jabatan`.`id` = `karyawan`.`id_jabatan`))) join `informasi_pribadi` on((`informasi_pribadi`.`id_karyawan` = `karyawan`.`id_karyawan`))) join `perusahaan` on((`perusahaan`.`id` = `karyawan`.`id_perusahaan`))) */;

/*View structure for view v_karyawan_atasan */

/*!50001 DROP TABLE IF EXISTS `v_karyawan_atasan` */;
/*!50001 DROP VIEW IF EXISTS `v_karyawan_atasan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_karyawan_atasan` AS select `karyawan_atasan`.`id_atasan` AS `id_atasan`,`karyawan_atasan`.`id_karyawan_atasan` AS `id_karyawan_atasan`,`karyawan_atasan`.`id_karyawan` AS `id_karyawan`,`informasi_pribadi`.`nama` AS `nama` from (`informasi_pribadi` join `karyawan_atasan` on((`informasi_pribadi`.`id_karyawan` = `karyawan_atasan`.`id_karyawan_atasan`))) */;

/*View structure for view v_karyawan_finger */

/*!50001 DROP TABLE IF EXISTS `v_karyawan_finger` */;
/*!50001 DROP VIEW IF EXISTS `v_karyawan_finger` */;

/*!50001 CREATE ALGORITHM=TEMPTABLE SQL SECURITY DEFINER VIEW `v_karyawan_finger` AS select `karyawan_finger_id`.`id_kfi` AS `id_kfi`,`karyawan_finger_id`.`log_finger_id` AS `log_finger_id`,`karyawan_finger_id`.`id_karyawan` AS `id_karyawan`,`informasi_pribadi`.`nama` AS `nama` from (`informasi_pribadi` join `karyawan_finger_id` on((`informasi_pribadi`.`id_karyawan` = `karyawan_finger_id`.`id_karyawan`))) */;

/*View structure for view v_komponen_gaji */

/*!50001 DROP TABLE IF EXISTS `v_komponen_gaji` */;
/*!50001 DROP VIEW IF EXISTS `v_komponen_gaji` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_komponen_gaji` AS select `karyawan`.`id_karyawan` AS `id_karyawan`,`karyawan`.`nik` AS `nik`,`komponen_gaji_karyawan`.`id_kgk` AS `id_kgk`,`komponen_gaji_karyawan`.`nominal` AS `nominal`,`komponen_gaji`.`id_komponen` AS `id_komponen`,`komponen_gaji`.`nm_komponen` AS `nm_komponen`,`komponen_gaji`.`kategori_komponen` AS `kategori_komponen` from ((`karyawan` join `komponen_gaji_karyawan` on((`karyawan`.`id_karyawan` = `komponen_gaji_karyawan`.`id_karyawan`))) join `komponen_gaji` on((`komponen_gaji`.`id_komponen` = `komponen_gaji_karyawan`.`id_komponen`))) */;

/*View structure for view v_penggajian_karyawan */

/*!50001 DROP TABLE IF EXISTS `v_penggajian_karyawan` */;
/*!50001 DROP VIEW IF EXISTS `v_penggajian_karyawan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_penggajian_karyawan` AS select `penggajian_karyawan`.`id_pk` AS `id_pk`,`penggajian_karyawan`.`id_penggajian` AS `id_penggajian`,`penggajian_karyawan`.`id_karyawan` AS `id_karyawan`,`penggajian_karyawan`.`pendapatan` AS `pendapatan`,`penggajian_karyawan`.`potongan` AS `potongan`,`penggajian_karyawan`.`subtotal` AS `subtotal`,`penggajian_karyawan`.`bonus` AS `bonus`,`penggajian_karyawan`.`pajak` AS `pajak`,`penggajian_karyawan`.`thp` AS `thp`,`jabatan`.`nm_jabatan` AS `nm_jabatan` from ((`karyawan` join `penggajian_karyawan` on((`karyawan`.`id_karyawan` = `penggajian_karyawan`.`id_karyawan`))) join `jabatan` on((`jabatan`.`id` = `karyawan`.`id_jabatan`))) */;

/*View structure for view v_riwayat_pendidikan */

/*!50001 DROP TABLE IF EXISTS `v_riwayat_pendidikan` */;
/*!50001 DROP VIEW IF EXISTS `v_riwayat_pendidikan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_riwayat_pendidikan` AS select `riwayat_pendidikan`.`id_rp` AS `id_rp`,`riwayat_pendidikan`.`id_karyawan` AS `id_karyawan`,`informasi_pribadi`.`nama` AS `nama`,`riwayat_pendidikan`.`id_pendidikan` AS `id_pendidikan`,`pendidikan`.`nm_pendidikan` AS `nm_pendidikan`,`riwayat_pendidikan`.`id_tmpt_pendidikan` AS `id_tmpt_pendidikan`,`tempat_pendidikan`.`nm_tmpt` AS `nm_tmpt`,`riwayat_pendidikan`.`thn_lulus` AS `thn_lulus` from (((`informasi_pribadi` join `riwayat_pendidikan` on((`informasi_pribadi`.`id_karyawan` = `riwayat_pendidikan`.`id_karyawan`))) join `pendidikan` on((`pendidikan`.`id_pendidikan` = `riwayat_pendidikan`.`id_pendidikan`))) join `tempat_pendidikan` on((`tempat_pendidikan`.`id_tp` = `riwayat_pendidikan`.`id_tmpt_pendidikan`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
