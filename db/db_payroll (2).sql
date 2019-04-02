/*
SQLyog Ultimate v11.5 (64 bit)
MySQL - 10.1.10-MariaDB : Database - db_payroll
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_payroll` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_payroll`;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `absensi` */

insert  into `absensi`(`id_absensi`,`id_karyawan`,`id_shift`,`tgl_absensi`,`jam_mulai`,`jam_berakhir`,`id_tipe_absensi`) values (1,12,NULL,NULL,NULL,NULL,NULL),(2,12,NULL,NULL,NULL,NULL,NULL),(3,11,NULL,NULL,NULL,NULL,NULL),(4,13,0,NULL,NULL,NULL,NULL),(5,1,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `cuti` */

DROP TABLE IF EXISTS `cuti`;

CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Cuti',
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'ID. Karyawan',
  `id_tipe_cuti` int(11) DEFAULT NULL COMMENT 'ID. Tipe Cuti',
  `tgl_mulai_cuti` date DEFAULT NULL COMMENT 'Tgl. Mulai Cuti',
  `tgl_berakhir_cuti` date DEFAULT NULL COMMENT 'Tgl. Berakhir Cuti',
  PRIMARY KEY (`id_cuti`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `cuti` */

insert  into `cuti`(`id_cuti`,`id_karyawan`,`id_tipe_cuti`,`tgl_mulai_cuti`,`tgl_berakhir_cuti`) values (2,72,1,'2016-12-01','2016-12-01');

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

/*Table structure for table `informasi_pribadi` */

DROP TABLE IF EXISTS `informasi_pribadi`;

CREATE TABLE `informasi_pribadi` (
  `id_info` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Informasi',
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'ID. Karyawan',
  `nama` varchar(35) DEFAULT NULL COMMENT 'Nama',
  `tmp_lahir` varchar(35) DEFAULT NULL COMMENT 'Tempat Lahir',
  `tgl_lahir` date DEFAULT NULL COMMENT 'Tgl. Lahir',
  `alamat` tinytext COMMENT 'Alamat',
  `no_telp` varchar(22) DEFAULT NULL COMMENT 'No. Telp',
  `email` varchar(35) DEFAULT NULL COMMENT 'Email',
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

/*Data for the table `informasi_pribadi` */

insert  into `informasi_pribadi`(`id_info`,`id_karyawan`,`nama`,`tmp_lahir`,`tgl_lahir`,`alamat`,`no_telp`,`email`) values (1,1,'I IBAD ALI TN, SE, MM','bumiayu','1965-07-01','Tropika III, Tropikana\r\nCikarang Baru','081280008800',''),(2,2,'DEWI SRI MULYATINI',NULL,NULL,NULL,NULL,NULL),(3,3,'HJ. NURWASIAH',NULL,NULL,NULL,NULL,NULL),(4,4,'SERA NABILA',NULL,NULL,NULL,NULL,NULL),(5,5,'FARAH ELSANI',NULL,NULL,NULL,NULL,NULL),(6,6,'SYIFA RAHMATIKA',NULL,NULL,NULL,NULL,NULL),(7,7,'SOFANI AMRIF, SE, MM',NULL,NULL,NULL,NULL,NULL),(8,8,'ASEP JALALUDIN, S.KOM, MM',NULL,NULL,NULL,NULL,NULL),(9,9,'ADIE KUSNA,W, M.Kom',NULL,NULL,NULL,NULL,NULL),(10,8,'IWAN MULYANA S.KOM',NULL,NULL,NULL,NULL,NULL),(11,11,'ILMAN KADORI, S.Kom',NULL,NULL,NULL,NULL,NULL),(12,12,'ANA INDAH SARI',NULL,NULL,NULL,NULL,NULL),(13,13,'RIANA RAHMAWATI','','2016-12-08','test aja dah','',''),(14,14,'FATMA FAUZIAH',NULL,NULL,NULL,NULL,NULL),(15,15,'IMAM SOLICHIN S',NULL,NULL,NULL,NULL,NULL),(16,16,'FITRIANI',NULL,NULL,NULL,NULL,NULL),(17,17,'ASEP SAEPUDIN, S.KOM',NULL,NULL,NULL,NULL,NULL),(18,18,'MUHAMMAD SHEPTYANZ CHASTALINO',NULL,NULL,NULL,NULL,NULL),(20,20,'WANDA ATMAJA',NULL,NULL,NULL,NULL,NULL),(21,21,'BUDI MULYANTO',NULL,NULL,NULL,NULL,NULL),(22,22,'RAHMATULLAH',NULL,NULL,NULL,NULL,NULL),(23,23,'AAN',NULL,NULL,NULL,NULL,NULL),(24,24,'MISWADI, S.Kom',NULL,NULL,NULL,NULL,NULL),(25,25,'BEI HARIRA IRAWAN, S.Kom, MM, M.Kom',NULL,NULL,NULL,NULL,NULL),(26,26,'HUBAN KABIR, S.Kom, M.Kom',NULL,NULL,NULL,NULL,NULL),(27,27,'EFRIZAL ZAIDA, S.KOM, MM, M.KOM',NULL,NULL,NULL,NULL,NULL),(28,28,'EMILY FITRI, MM',NULL,NULL,NULL,NULL,NULL),(29,29,'SUTAN FAISAL, M.Kom',NULL,NULL,NULL,NULL,NULL),(30,30,'NURSEHA',NULL,NULL,NULL,NULL,NULL),(31,31,'Iwan Mulyana, M.Kom','','2016-12-12','','',''),(32,32,'I IBAD ALI TAKRIM, SE, MM',NULL,NULL,NULL,NULL,NULL),(33,33,'DEWI SRI MULYATINI, A.MD',NULL,NULL,NULL,NULL,NULL),(34,34,'AHMAD MUZNI, A.Md',NULL,NULL,NULL,NULL,NULL),(35,35,'HERI YUNIAWAN PRASETYO, S.Kom',NULL,NULL,NULL,NULL,NULL),(36,36,'HARIZAH, S.Kom',NULL,NULL,NULL,NULL,NULL),(37,37,'PERMATA ASHARTY, S.Ip',NULL,NULL,NULL,NULL,NULL),(38,38,'JAKA SUTAMA',NULL,NULL,NULL,NULL,NULL),(39,39,'MUHAMMAD ABDUL ROSYID',NULL,NULL,NULL,NULL,NULL),(40,40,'MASTURI',NULL,NULL,NULL,NULL,NULL),(41,41,'URIP HADI SAPUTRA',NULL,NULL,NULL,NULL,NULL),(42,42,'AHMAD SOHBAR HADWIGUNA',NULL,NULL,NULL,NULL,NULL),(43,43,'MULYANA',NULL,NULL,NULL,NULL,NULL),(44,44,'RINANTO',NULL,NULL,NULL,NULL,NULL),(45,45,'MUHAMMAD NURKARIM',NULL,NULL,NULL,NULL,NULL),(46,46,'FEBRIAN ADAM',NULL,NULL,NULL,NULL,NULL),(47,47,'SADIMAN',NULL,NULL,NULL,NULL,NULL),(48,48,'SAKIR',NULL,NULL,NULL,NULL,NULL),(49,49,'MANSUR',NULL,NULL,NULL,NULL,NULL),(50,50,'M. SANUSI',NULL,NULL,NULL,NULL,NULL),(51,46,'EDI SUDARNO',NULL,NULL,NULL,NULL,NULL),(52,52,'UJANG SUGIARTO',NULL,NULL,NULL,NULL,NULL),(53,53,'SARTIKA AFRESIA KUMALA DEWI',NULL,NULL,NULL,NULL,NULL),(54,54,'EDI SUDARNO',NULL,NULL,NULL,NULL,NULL),(63,63,'DEWI SRI MULYATINI, A.MD',NULL,NULL,NULL,NULL,NULL),(64,64,'BARYANTO',NULL,NULL,NULL,NULL,NULL),(65,65,'SARTIKA AFRESIA KUMALA DEWI',NULL,NULL,NULL,NULL,NULL),(66,66,'SUTIKNO',NULL,NULL,NULL,NULL,NULL),(67,67,'HAJI DOEL',NULL,NULL,NULL,NULL,NULL),(68,68,'ARYONO',NULL,NULL,NULL,NULL,NULL),(69,69,'SUHENDRA ADI PUTRA',NULL,NULL,NULL,NULL,NULL),(70,70,'MUHAMAD DARWAN',NULL,NULL,NULL,NULL,NULL),(71,71,'SAEPUL',NULL,NULL,NULL,NULL,NULL),(72,72,'KOMARI',NULL,NULL,NULL,NULL,NULL),(73,73,'TAMIN',NULL,NULL,NULL,NULL,NULL),(74,74,'MUHAMMAD FAJRUL AL FALAQ',NULL,NULL,NULL,NULL,NULL),(75,75,'MUHAMMAD FAJAR ASIDIQ',NULL,NULL,NULL,NULL,NULL),(76,76,'SAHILI',NULL,NULL,NULL,NULL,NULL),(77,77,'HENDRIK PRAYITNO',NULL,NULL,NULL,NULL,NULL),(78,78,'HERLINA',NULL,NULL,NULL,NULL,NULL),(79,79,'IDA FARIDA',NULL,NULL,NULL,NULL,NULL),(80,19,'Lisman Tua Sihotang','','2016-12-08','test alamat','','');

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `nm_jabatan` varchar(35) DEFAULT NULL COMMENT 'Nama Jabatan',
  `id_perusahaan` int(11) DEFAULT NULL COMMENT 'ID Perusahaan',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

/*Data for the table `jabatan` */

insert  into `jabatan`(`id`,`nm_jabatan`,`id_perusahaan`) values (1,'KETUA YAYASAN',1),(2,'SEKERTARIS YAYASAN',1),(3,'BENDAHARA YAYASAN',1),(4,'ANGGOTA YAYASAN',1),(5,'MARKETING',1),(6,'LPPM',1),(7,'PJM',1),(8,'PRODI SI',1),(9,'BAAK',1),(10,'FO',1),(11,'HRD',1),(12,'PUSKOM',1),(13,'SECURITY',1),(14,'OB',1),(15,'DOSEN TETAP',1),(16,'DIREKTUR',3),(17,'MARKETING',3),(18,'OFFICE MANAGER',3),(19,'DESIGN',3),(20,'FINANCE',3),(21,'STAFF',3),(22,'SOUND & EQP',3),(23,'MASSANGER',3),(24,'OB',3),(25,'DECORATION',3),(26,'MAINTENANCE',3),(27,'DRIVER',3),(28,'TENDA',3),(29,'SECURITY',3),(30,'MARKETING',2),(31,'MANAGER',2),(32,'ADMINISTRASI',2),(33,'KEPALA KOKI',2),(34,'KOKI',2),(35,'ASISTEN KOKI',2),(36,'CUCI PIRING',2),(37,'HELPER',2),(38,'OB',2),(39,'TENDA',2),(40,'BARTENDER',2),(41,'WAITRESS',2);

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
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

/*Data for the table `karyawan` */

insert  into `karyawan`(`id_karyawan`,`nik`,`status`,`id_perusahaan`,`id_jabatan`,`tgl_bergabung`) values (1,'000001','Karyawan Tetap',1,1,'2016-12-12'),(2,'000002','Karyawan Tetap',1,2,'2016-12-12'),(3,'000003','Karyawan Tetap',1,3,'2016-12-12'),(4,'000004','Karyawan Tetap',1,4,'2016-12-12'),(5,'000005','Karyawan Tetap',1,4,'2016-12-12'),(6,'000006','Karyawan Tetap',1,4,'2016-12-12'),(7,'990401','Karyawan Tetap',1,5,'2016-12-12'),(8,'131068','Karyawan Tetap',1,6,'2016-12-12'),(9,'1306531','Karyawan Tetap',1,7,'2016-12-12'),(11,'1306551','Karyawan Tetap',1,9,'2016-12-12'),(12,'1','Karyawan Tetap',1,9,'2016-12-01'),(13,'140886','Karyawan Tetap',1,10,'2016-12-12'),(14,'130966','Karyawan Tetap',1,10,'2016-12-12'),(15,'100120','Karyawan Tetap',1,11,'2016-12-12'),(16,'130967','Karyawan Tetap',1,10,'2016-12-12'),(17,'120246','Karyawan Tetap',1,12,'2016-12-12'),(18,'140684','Karyawan Tetap',1,12,'2016-12-12'),(19,'6','Karyawan Tetap',1,12,'2016-12-01'),(20,'150292','Karyawan Tetap',1,13,'2016-12-12'),(21,'150293','Karyawan Tetap',1,13,'2016-12-12'),(22,'140482','Karyawan Tetap',1,14,'2016-12-12'),(23,'5','Karyawan Tetap',1,14,'2016-12-01'),(24,'1306631','Karyawan Tetap',1,15,'2016-12-01'),(25,'1306532','Karyawan Tetap',1,15,'2016-12-01'),(26,'151133','Karyawan Tetap',1,15,'2016-12-01'),(27,'2','Karyawan Tetap',1,15,'2016-12-01'),(28,'3','Karyawan Tetap',1,15,'2016-12-01'),(29,'4','Karyawan Tetap',1,15,'2016-12-01'),(30,'140481','Karyawan Tetap',1,10,'2016-12-01'),(31,'131068','Karyawan Tetap',1,8,'2016-12-12'),(32,'000001','Karyawan Tetap',3,16,'2016-12-01'),(33,'000002','Karyawan Tetap',3,17,'2016-12-01'),(34,'040104','Karyawan Tetap',3,18,'2016-12-01'),(35,'100322','Karyawan Tetap',3,19,'2016-12-01'),(36,'110941','Karyawan Tetap',3,20,'2016-12-01'),(37,'131071','Karyawan Tetap',3,21,'2016-12-01'),(38,'7','Karyawan Tetap',3,21,'2016-12-01'),(39,'040305','Karyawan Tetap',3,22,'2016-12-01'),(40,'000703','Karyawan Tetap',3,23,'2016-12-01'),(41,'130454','Karyawan Tetap',3,24,'2016-12-01'),(42,'130250','Karyawan Tetap',3,25,'2016-12-01'),(43,'110537','Karyawan Tetap',3,26,'2016-12-01'),(44,'120948','Karyawan Tetap',3,27,'2016-12-01'),(45,'150595','Karyawan Tetap',3,27,'2016-12-01'),(46,'100826','Karyawan Tetap',3,28,'2016-12-01'),(47,'110433','Karyawan Tetap',3,28,'2016-12-01'),(48,'131072','Karyawan Tetap',3,28,'2016-12-01'),(49,'080211','Karyawan Tetap',3,28,'2016-12-01'),(50,'150897','Karyawan Tetap',3,28,'2016-12-01'),(52,'100119','Karyawan Tetap',3,29,'2016-12-01'),(53,'120245','Karyawan Tetap',3,21,'2016-12-01'),(54,'111042','Karyawan Tetap',3,17,'2016-12-01'),(63,'10','Karyawan Tetap',2,30,'2016-12-01'),(64,'1603102','Karyawan Tetap',2,31,'2016-12-01'),(65,'11','Karyawan Tetap',2,32,'2016-12-01'),(66,'1603110','Karyawan Tetap',2,33,'2016-12-01'),(67,'1604112','Karyawan Tetap',2,34,'2016-12-01'),(68,'1603105','Karyawan Tetap',2,35,'2016-12-01'),(69,'1604110','Karyawan Tetap',2,35,'2016-12-01'),(70,'1603109','Karyawan Tetap',2,36,'2016-12-01'),(71,'1603108','Karyawan Tetap',2,37,'2016-12-01'),(72,'12','Karyawan Tetap',2,38,'2016-12-01'),(73,'13','Karyawan Tetap',2,38,'2016-12-01'),(74,'150188','Karyawan Tetap',2,39,'2016-12-01'),(75,'150190','Karyawan Tetap',2,39,'2016-12-01'),(76,'1603107','Karyawan Tetap',2,40,'2016-12-01'),(77,'1603106','Karyawan Tetap',2,40,'2016-12-01'),(78,'1603104','Karyawan Tetap',2,41,'2016-12-01'),(79,'1603103','Karyawan Tetap',2,41,'2016-12-01');

/*Table structure for table `karyawan_atasan` */

DROP TABLE IF EXISTS `karyawan_atasan`;

CREATE TABLE `karyawan_atasan` (
  `id_atasan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Karyawan Atasan',
  `id_karyawan_atasan` int(11) DEFAULT NULL COMMENT 'ID. Atasan',
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'ID. Karyawan',
  PRIMARY KEY (`id_atasan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `karyawan_atasan` */

insert  into `karyawan_atasan`(`id_atasan`,`id_karyawan_atasan`,`id_karyawan`) values (2,9,19),(4,1,3);

/*Table structure for table `komponen_gaji` */

DROP TABLE IF EXISTS `komponen_gaji`;

CREATE TABLE `komponen_gaji` (
  `id_komponen` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Komponen',
  `nm_komponen` varchar(35) DEFAULT NULL COMMENT 'Nama Komponen',
  `kategori_komponen` enum('Pendapatan','Potongan') DEFAULT NULL COMMENT 'Kategori',
  PRIMARY KEY (`id_komponen`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `komponen_gaji` */

insert  into `komponen_gaji`(`id_komponen`,`nm_komponen`,`kategori_komponen`) values (1,'Gaji Pokok','Pendapatan'),(2,'Tunjangan Jabatan','Pendapatan'),(3,'Tunjangan Anak','Pendapatan'),(4,'Tunjangan Kehadiran','Pendapatan'),(5,'Tunjangan Ibadah','Pendapatan'),(6,'Uang Makan','Pendapatan'),(7,'Uang Transport','Pendapatan'),(8,'Potongan Kasbon','Potongan'),(9,'Potongan Kehadiran','Potongan');

/*Table structure for table `komponen_gaji_karyawan` */

DROP TABLE IF EXISTS `komponen_gaji_karyawan`;

CREATE TABLE `komponen_gaji_karyawan` (
  `id_kgk` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Komponen Gaji Karyawan',
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'ID. Karyawan',
  `id_komponen` int(11) DEFAULT NULL COMMENT 'ID. Komponen',
  `nominal` decimal(10,2) DEFAULT '0.00' COMMENT 'Nominal',
  PRIMARY KEY (`id_kgk`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

/*Data for the table `komponen_gaji_karyawan` */

insert  into `komponen_gaji_karyawan`(`id_kgk`,`id_karyawan`,`id_komponen`,`nominal`) values (1,3,1,'500000.00'),(2,19,1,'0.00'),(3,1,1,'12000000.00'),(4,1,6,'15000.00'),(5,1,7,'15000.00'),(6,1,3,'300000.00'),(7,2,1,'12000000.00'),(8,2,3,'300000.00'),(9,2,6,'15000.00'),(10,2,7,'15000.00'),(11,4,1,'6000000.00'),(12,5,1,'6000000.00'),(13,6,1,'6000000.00'),(14,7,1,'3000000.00'),(15,7,6,'15000.00'),(16,7,7,'15000.00'),(17,7,4,'100000.00'),(18,8,1,'2000000.00'),(19,8,6,'15000.00'),(20,8,7,'15000.00'),(21,9,1,'600000.00'),(22,9,2,'400000.00'),(23,9,6,'62500.00'),(24,9,7,'62500.00'),(25,31,1,'600000.00'),(26,31,2,'400000.00'),(27,31,6,'93750.00'),(28,31,7,'93750.00'),(29,11,1,'3000000.00'),(30,11,6,'15000.00'),(31,11,7,'15000.00'),(32,13,1,'1320000.00'),(33,13,6,'15000.00'),(34,13,7,'15000.00'),(35,14,1,'1430000.00'),(36,14,6,'15000.00'),(37,14,7,'15000.00'),(38,15,1,'2024550.00'),(39,15,6,'15000.00'),(40,15,7,'15000.00'),(41,15,3,'100000.00'),(42,15,8,'250000.00'),(43,16,1,'1430000.00'),(44,16,6,'15000.00'),(45,16,7,'15000.00'),(46,17,1,'2750000.00'),(47,17,6,'15000.00'),(48,17,7,'15000.00'),(49,18,1,'1575000.00'),(50,18,6,'15000.00'),(51,18,7,'15000.00'),(52,20,1,'1110000.00'),(53,20,6,'15000.00'),(54,20,7,'15000.00'),(55,20,3,'200000.00'),(56,20,4,'100000.00'),(57,21,1,'1240000.00'),(58,21,6,'15000.00'),(59,21,7,'15000.00'),(60,21,3,'200000.00'),(61,21,4,'100000.00'),(62,22,1,'1071000.00'),(63,22,6,'15000.00'),(64,22,7,'15000.00');

/*Table structure for table `pendidikan` */

DROP TABLE IF EXISTS `pendidikan`;

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Pendidikan',
  `nm_pendidikan` varchar(35) DEFAULT NULL COMMENT 'Nama Pendidikan',
  `deskripsi` varchar(75) DEFAULT NULL COMMENT 'Deskripsi',
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `pendidikan` */

insert  into `pendidikan`(`id_pendidikan`,`nm_pendidikan`,`deskripsi`) values (1,'KB','Kelompok Bermain'),(2,'TK','Taman Kanak Kanak'),(3,'SD','Sekolah Dasar'),(4,'SLTP','Sekolah Lanjutan Tingkat Pertama'),(5,'SLTA','Sekolah Lanjutan Tingkat Atas'),(6,'D3','Diploma'),(7,'S1','Strata Satu'),(8,'S2','Master'),(9,'S3','Doktor');

/*Table structure for table `penggajian` */

DROP TABLE IF EXISTS `penggajian`;

CREATE TABLE `penggajian` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Penggajian',
  `tgl` date NOT NULL COMMENT 'Tgl. Penggajian',
  `bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL COMMENT 'Bulan Penggajian',
  `tahun` varchar(4) NOT NULL COMMENT 'Tahun Penggajian',
  `id_perusahaan` int(11) NOT NULL COMMENT 'ID Perusahaan',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `penggajian` */

insert  into `penggajian`(`id`,`tgl`,`bulan`,`tahun`,`id_perusahaan`) values (1,'2016-12-01','Desember','2016',1),(2,'2016-12-01','Desember','2016',2),(3,'2016-12-01','Desember','2016',3);

/*Table structure for table `penggajian_karyawan` */

DROP TABLE IF EXISTS `penggajian_karyawan`;

CREATE TABLE `penggajian_karyawan` (
  `id_pk` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Penggajian Karyawan',
  `id_penggajian` int(11) DEFAULT NULL COMMENT 'ID. Penggajian',
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'ID. Karyawan',
  `pendapatan` decimal(10,2) DEFAULT '0.00' COMMENT 'Pendapatan',
  `potongan` decimal(10,2) DEFAULT '0.00' COMMENT 'Potongan',
  PRIMARY KEY (`id_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `penggajian_karyawan` */

insert  into `penggajian_karyawan`(`id_pk`,`id_penggajian`,`id_karyawan`,`pendapatan`,`potongan`) values (1,3,32,'0.00','0.00'),(2,3,33,'0.00','0.00'),(3,3,34,'0.00','0.00'),(4,3,35,'0.00','0.00'),(5,3,36,'0.00','0.00'),(6,3,37,'0.00','0.00'),(7,3,38,'0.00','0.00'),(8,3,39,'0.00','0.00'),(9,3,40,'0.00','0.00'),(10,3,41,'0.00','0.00'),(11,3,42,'0.00','0.00'),(12,3,43,'0.00','0.00'),(13,3,44,'0.00','0.00'),(14,3,45,'0.00','0.00'),(15,3,46,'0.00','0.00'),(16,3,47,'0.00','0.00'),(17,3,48,'0.00','0.00'),(18,3,49,'0.00','0.00'),(19,3,50,'0.00','0.00'),(20,3,46,'0.00','0.00'),(21,3,52,'0.00','0.00'),(22,3,53,'0.00','0.00'),(23,3,54,'0.00','0.00');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penggajian_karyawan_detail` */

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `perusahaan` */

insert  into `perusahaan`(`id`,`nm_pt`,`alamat`,`no_telp`,`no_fax`,`email`) values (1,'Media Informatika Cendekia','','','',''),(2,'Restoran Gecok','','','',''),(3,'Event Organizer Seirah','','','','');

/*Table structure for table `riwayat_pendidikan` */

DROP TABLE IF EXISTS `riwayat_pendidikan`;

CREATE TABLE `riwayat_pendidikan` (
  `id_rp` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Riwayat Pendidikan',
  `id_info` int(11) DEFAULT NULL COMMENT 'ID. Informasi',
  `id_pendidikan` int(11) DEFAULT NULL COMMENT 'ID. Pendidikan',
  `id_tmpt_pendidikan` int(11) DEFAULT NULL COMMENT 'ID. Tempat Pendidikan',
  `thn_lulus` varchar(4) DEFAULT NULL COMMENT 'Tahun Lulus',
  PRIMARY KEY (`id_rp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `riwayat_pendidikan` */

/*Table structure for table `sheet1$` */

DROP TABLE IF EXISTS `sheet1$`;

CREATE TABLE `sheet1$` (
  `Jabatan` varchar(255) DEFAULT NULL,
  `PT` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sheet1$` */

insert  into `sheet1$`(`Jabatan`,`PT`) values ('KETUA YAYASAN',1),('SEKERTARIS YAYASAN',1),('BENDAHARA YAYASAN',1),('ANGGOTA YAYASAN',1),('MARKETING',1),('LPPM',1),('PJM',1),('PRODI SI',1),('BAAK',1),('FO',1),('HRD',1),('PUSKOM',1),('SECURITY',1),('OB',1),('DOSEN TETAP',1),('DIREKTUR',3),('MARKETING',3),('OFFICE MANAGER',3),('DESIGN',3),('FINANCE',3),('STAFF',3),('SOUND & EQP',3),('MASSANGER',3),('OB',3),('DECORATION',3),('MAINTENANCE',3),('DRIVER',3),('TENDA',3),('SECURITY',3),('MARKETING',2),('MANAGER',2),('ADMINISTRASI',2),('KEPALA KOKI',2),('KOKI',2),('ASISTEN KOKI',2),('CUCI PIRING',2),('HELPER',2),('OB',2),('TENDA',2),('BARTENDER',2),('WAITRESS',2);

/*Table structure for table `sheet2$` */

DROP TABLE IF EXISTS `sheet2$`;

CREATE TABLE `sheet2$` (
  `NIK` varchar(255) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `JABATAN` varchar(255) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_pt` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sheet2$` */

insert  into `sheet2$`(`NIK`,`NAMA`,`JABATAN`,`id_jabatan`,`id_pt`) values ('000001','I IBAD ALI TN, SE, MM','KETUA YAYASAN',1,1),('000002','DEWI SRI MULYATINI','SEKERTARIS YAYASAN',2,1),('000003','HJ. NURWASIAH','BENDAHARA YAYASAN',3,1),('000004','SERA NABILA','ANGGOTA YAYASAN',4,1),('000005','FARAH ELSANI','ANGGOTA YAYASAN',4,1),('000006','SYIFA RAHMATIKA','ANGGOTA YAYASAN',4,1),('990401','SOFANI AMRIF, SE, MM','MARKETING',5,1),('131068','ASEP JALALUDIN, S.KOM, MM','LPPM',6,1),('1306531','ADIE KUSNA,W, M.Kom','PJM',7,1),('131068','IWAN MULYANA S.KOM','PRODI SI',8,1),('1306551','ILMAN KADORI, S.Kom','BAAK',9,1),('1','ANA INDAH SARI','BAAK',9,1),('140886','RIANA RAHMAWATI','FO',10,1),('130966','FATMA FAUZIAH','FO',10,1),('100120','IMAM SOLICHIN S','HRD',11,1),('130967','FITRIANI','FO',10,1),('120246','ASEP SAEPUDIN, S.KOM','PUSKOM',12,1),('140684','MUHAMMAD SHEPTYANZ CHASTALINO','PUSKOM',12,1),('6','LISMAN TUA SIHOTANG','PUSKOM',12,1),('150292','WANDA ATMAJA','SECURITY',13,1),('150293','BUDI MULYANTO','SECURITY',13,1),('140482','RAHMATULLAH','OB',14,1),('5','AAN','OB',14,1),('1306631','MISWADI, S.Kom','DOSEN TETAP',15,1),('1306532','BEI HARIRA IRAWAN, S.Kom, MM, M.Kom','DOSEN TETAP',15,1),('151133','HUBAN KABIR, S.Kom, M.Kom','DOSEN TETAP',15,1),('2','EFRIZAL ZAIDA, S.KOM, MM, M.KOM','DOSEN TETAP',15,1),('3','EMILY FITRI, MM','DOSEN TETAP',15,1),('4','SUTAN FAISAL, M.Kom','DOSEN TETAP',15,1),('140481','NURSEHA','FO',10,1),('1512101','RUDI','OB',14,1);

/*Table structure for table `sheet3$` */

DROP TABLE IF EXISTS `sheet3$`;

CREATE TABLE `sheet3$` (
  `NIK` varchar(255) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `JABATAN` varchar(255) DEFAULT NULL,
  `id_pt` int(11) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sheet3$` */

insert  into `sheet3$`(`NIK`,`NAMA`,`JABATAN`,`id_pt`,`id_jabatan`) values ('000001','I IBAD ALI TAKRIM, SE, MM','DIREKTUR',3,16),('000002','DEWI SRI MULYATINI, A.MD','MARKETING',3,17),('040104','AHMAD MUZNI, A.Md','OFFICE MANAGER',3,18),('100322','HERI YUNIAWAN PRASETYO, S.Kom','DESIGN',3,19),('110941','HARIZAH, S.Kom','FINANCE',3,20),('131071','PERMATA ASHARTY, S.Ip','STAFF',3,21),('7','JAKA SUTAMA','STAFF',3,21),('040305','MUHAMMAD ABDUL ROSYID','SOUND & EQP',3,22),('000703','MASTURI','MASSANGER',3,23),('130454','URIP HADI SAPUTRA','OB',3,24),('130250','AHMAD SOHBAR HADWIGUNA','DECORATION',3,25),('110537','MULYANA','MAINTENANCE',3,26),('120948','RINANTO','DRIVER',3,27),('150595','MUHAMMAD NURKARIM','DRIVER',3,27),('100826','FEBRIAN ADAM','TENDA',3,28),('110433','SADIMAN','TENDA',3,28),('131072','SAKIR','TENDA',3,28),('080211','MANSUR','TENDA',3,28),('150897','M. SANUSI','TENDA',3,28),('100826','EDI SUDARNO','SECURITY',3,29),('100119','UJANG SUGIARTO','SECURITY',3,29),('120245','SARTIKA AFRESIA KUMALA DEWI','STAFF',3,21),('111042','EDI SUDARNO','MARKETING',3,17);

/*Table structure for table `sheet4$` */

DROP TABLE IF EXISTS `sheet4$`;

CREATE TABLE `sheet4$` (
  `NIK` double DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `JABATAN` varchar(255) DEFAULT NULL,
  `id_pt` int(11) DEFAULT '2',
  `id_jabatan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sheet4$` */

insert  into `sheet4$`(`NIK`,`NAMA`,`JABATAN`,`id_pt`,`id_jabatan`) values (10,'DEWI SRI MULYATINI, A.MD','MARKETING',2,30),(1603102,'BARYANTO','MANAGER',2,31),(11,'SARTIKA AFRESIA KUMALA DEWI','ADMINISTRASI',2,32),(1603110,'SUTIKNO','KEPALA KOKI',2,33),(1604112,'HAJI DOEL','KOKI',2,34),(1603105,'ARYONO','ASISTEN KOKI',2,35),(1604110,'SUHENDRA ADI PUTRA','ASISTEN KOKI',2,35),(1603109,'MUHAMAD DARWAN','CUCI PIRING',2,36),(1603108,'SAEPUL','HELPER',2,37),(12,'KOMARI','OB',2,38),(13,'TAMIN','OB',2,38),(150188,'MUHAMMAD FAJRUL AL FALAQ','TENDA',2,39),(150190,'MUHAMMAD FAJAR ASIDIQ','TENDA',2,39),(1603107,'SAHILI','BARTENDER',2,40),(1603106,'HENDRIK PRAYITNO','BARTENDER',2,40),(1603104,'HERLINA','WAITRESS',2,41),(1603103,'IDA FARIDA','WAITRESS',2,41);

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
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=latin1;

/*Data for the table `sys_user` */

insert  into `sys_user`(`id`,`number_id`,`user_name`,`user_pass`,`auth_key`,`auth_token`,`pass_reset`,`pass_generated`,`tipe_user`) values (3,NULL,'000001','04fc711301f3c784d66955d98d399afb',NULL,NULL,NULL,NULL,'Karyawan'),(4,NULL,'000002','768c1c687efe184ae6dd2420710b8799',NULL,NULL,NULL,NULL,'Karyawan'),(5,NULL,'000003','f7a5c99c58103f6b65c451efd0f81826',NULL,NULL,NULL,NULL,'Karyawan'),(6,NULL,'000004','75891c215fa472036c240d83dddd8b74',NULL,NULL,NULL,NULL,'Karyawan'),(7,NULL,'000005','b69b712f7bd6757ddcda59959c89a2b1',NULL,NULL,NULL,NULL,'Karyawan'),(8,NULL,'000006','58b2c53441a9db19e159bec686d685d8',NULL,NULL,NULL,NULL,'Karyawan'),(9,NULL,'990401','4e7a3b8d0d9602d78e577e4ea054c395',NULL,NULL,NULL,NULL,'Karyawan'),(10,NULL,'131068','75861df61ecd4e6b108d8f6f18f736fe',NULL,NULL,NULL,NULL,'Karyawan'),(11,NULL,'1306531','999e957a35d2e8d5b18dde7854346aa7',NULL,NULL,NULL,NULL,'Karyawan'),(12,NULL,'131068','75861df61ecd4e6b108d8f6f18f736fe',NULL,NULL,NULL,NULL,'Karyawan'),(13,NULL,'1306551','c027463cc2438c3288b3e4ea81a283c1',NULL,NULL,NULL,NULL,'Karyawan'),(14,NULL,'1','c4ca4238a0b923820dcc509a6f75849b',NULL,NULL,NULL,NULL,'Karyawan'),(15,NULL,'140886','a4c6e8605604e887d599b15b84899de3',NULL,NULL,NULL,NULL,'Karyawan'),(16,NULL,'130966','8d863a559ac2d9fba0dfa98649e55637',NULL,NULL,NULL,NULL,'Karyawan'),(17,NULL,'100120','be7eb3f6fdca3ee99b77d8aeac5ed216',NULL,NULL,NULL,NULL,'Karyawan'),(18,NULL,'130967','05ab9a4fa54858c701819c57f455b279',NULL,NULL,NULL,NULL,'Karyawan'),(19,NULL,'120246','c8c472f3e8e8d6ef7fb951bd3ea1d707',NULL,NULL,NULL,NULL,'Karyawan'),(20,NULL,'140684','51d3e5bc93ceaa3eb3ab12ad40e120c6',NULL,NULL,NULL,NULL,'Karyawan'),(21,NULL,'6','1679091c5a880faf6fb5e6087eb1b2dc',NULL,NULL,NULL,NULL,'Karyawan'),(22,NULL,'150292','0578294a14fae8ac90f4609ae2844eda',NULL,NULL,NULL,NULL,'Karyawan'),(23,NULL,'150293','93bafa227464733e7147e7701fd9b038',NULL,NULL,NULL,NULL,'Karyawan'),(24,NULL,'140482','22e2ea1a6cb4b1e08ce6d5d762b3dcf3',NULL,NULL,NULL,NULL,'Karyawan'),(25,NULL,'5','e4da3b7fbbce2345d7772b0674a318d5',NULL,NULL,NULL,NULL,'Karyawan'),(26,NULL,'1306631','17849db960842b2caa1819ab3ffcda2e',NULL,NULL,NULL,NULL,'Karyawan'),(27,NULL,'1306532','26667f359875c3c120bfdf48f2f1ed4c',NULL,NULL,NULL,NULL,'Karyawan'),(28,NULL,'151133','c91648689dba55afef0bc9d0901b4c1d',NULL,NULL,NULL,NULL,'Karyawan'),(29,NULL,'2','c81e728d9d4c2f636f067f89cc14862c',NULL,NULL,NULL,NULL,'Karyawan'),(30,NULL,'3','eccbc87e4b5ce2fe28308fd9f2a7baf3',NULL,NULL,NULL,NULL,'Karyawan'),(31,NULL,'4','a87ff679a2f3e71d9181a67b7542122c',NULL,NULL,NULL,NULL,'Karyawan'),(32,NULL,'140481','10519b65a196f32c0f4399dded5949dd',NULL,NULL,NULL,NULL,'Karyawan'),(33,NULL,'1512101','cb1aeb1dbbe39d355361da3542608ac6',NULL,NULL,NULL,NULL,'Karyawan'),(34,NULL,'000001','04fc711301f3c784d66955d98d399afb',NULL,NULL,NULL,NULL,'Karyawan'),(35,NULL,'000002','768c1c687efe184ae6dd2420710b8799',NULL,NULL,NULL,NULL,'Karyawan'),(36,NULL,'040104','eff1cec3ed4fe0d9b42a56ce415d8f98',NULL,NULL,NULL,NULL,'Karyawan'),(37,NULL,'100322','6356b89c805af38f50e1d80a4710f1ef',NULL,NULL,NULL,NULL,'Karyawan'),(38,NULL,'110941','44a4d6d54614864233056e6477871a03',NULL,NULL,NULL,NULL,'Karyawan'),(39,NULL,'131071','aa963bfc51c8bfcfdb6d0bc1dcb402f4',NULL,NULL,NULL,NULL,'Karyawan'),(40,NULL,'7','8f14e45fceea167a5a36dedd4bea2543',NULL,NULL,NULL,NULL,'Karyawan'),(41,NULL,'040305','4a781d387a45938e45ca470cee581749',NULL,NULL,NULL,NULL,'Karyawan'),(42,NULL,'000703','5517ade02bfe4bda1e012d245eef11ee',NULL,NULL,NULL,NULL,'Karyawan'),(43,NULL,'130454','c0a24109065435d7e654750124207a1d',NULL,NULL,NULL,NULL,'Karyawan'),(44,NULL,'130250','fa05b79106e4496b0f8d681d08286a12',NULL,NULL,NULL,NULL,'Karyawan'),(45,NULL,'110537','1238a915ce384f21335c72bf7025da27',NULL,NULL,NULL,NULL,'Karyawan'),(46,NULL,'120948','bd413e0b093307ff6f515bf6ac5b72e6',NULL,NULL,NULL,NULL,'Karyawan'),(47,NULL,'150595','1a4cdd9c8bc3e2110ce9cc53af6111ea',NULL,NULL,NULL,NULL,'Karyawan'),(48,NULL,'100826','3aa6d30b728a734861eb60d7a1840f6c',NULL,NULL,NULL,NULL,'Karyawan'),(49,NULL,'110433','543709a55561c29018c2156f2915d2fc',NULL,NULL,NULL,NULL,'Karyawan'),(50,NULL,'131072','f7de594e1d11e06450f211067665ff17',NULL,NULL,NULL,NULL,'Karyawan'),(51,NULL,'080211','8e7eef100a91aa3df87be9204a513a61',NULL,NULL,NULL,NULL,'Karyawan'),(52,NULL,'150897','6dc138a89ba1cb9e1b7e07fb339524bc',NULL,NULL,NULL,NULL,'Karyawan'),(53,NULL,'100826','3aa6d30b728a734861eb60d7a1840f6c',NULL,NULL,NULL,NULL,'Karyawan'),(54,NULL,'100119','febfa0e1f5030ced4d19cadf64d21d5a',NULL,NULL,NULL,NULL,'Karyawan'),(55,NULL,'120245','9947b3d4e77cbf0f0fd072c8e9f67fc1',NULL,NULL,NULL,NULL,'Karyawan'),(56,NULL,'111042','f49a07df99be4bc5f8342734e451241e',NULL,NULL,NULL,NULL,'Karyawan'),(57,NULL,'10','d3d9446802a44259755d38e6d163e820',NULL,NULL,NULL,NULL,'Karyawan'),(58,NULL,'1603102','372a6bdcc9d41533324a9d0dd15f0539',NULL,NULL,NULL,NULL,'Karyawan'),(59,NULL,'11','6512bd43d9caa6e02c990b0a82652dca',NULL,NULL,NULL,NULL,'Karyawan'),(60,NULL,'1603110','23626c319fc10e323c9cc47eb410fb63',NULL,NULL,NULL,NULL,'Karyawan'),(61,NULL,'1604112','f03779ddb111bb7a2e66aeb0f3407d54',NULL,NULL,NULL,NULL,'Karyawan'),(62,NULL,'1603105','b8887f019fa9f8a04ab776585011fff7',NULL,NULL,NULL,NULL,'Karyawan'),(63,NULL,'1604110','189d8721bc3729e399fbf64318c549ec',NULL,NULL,NULL,NULL,'Karyawan'),(64,NULL,'1603109','b5b4528755c45768b00ef18cb5856f73',NULL,NULL,NULL,NULL,'Karyawan'),(65,NULL,'1603108','dd4010c859925a116941951b441afc58',NULL,NULL,NULL,NULL,'Karyawan'),(66,NULL,'12','c20ad4d76fe97759aa27a0c99bff6710',NULL,NULL,NULL,NULL,'Karyawan'),(67,NULL,'13','c51ce410c124a10e0db5e4b97fc2af39',NULL,NULL,NULL,NULL,'Karyawan'),(68,NULL,'150188','2e5eea1a6969b694c8a791dd863f4ae7',NULL,NULL,NULL,NULL,'Karyawan'),(69,NULL,'150190','282cd52413cf7424513e21083aba4f99',NULL,NULL,NULL,NULL,'Karyawan'),(70,NULL,'1603107','d43b8f7e394321fa1130b8c6caa44e05',NULL,NULL,NULL,NULL,'Karyawan'),(71,NULL,'1603106','6dea2f39b57fc4f330c230d7ba695130',NULL,NULL,NULL,NULL,'Karyawan'),(72,NULL,'1603104','9f815f99d0831d4d86ef3ca00d0113b8',NULL,NULL,NULL,NULL,'Karyawan'),(73,NULL,'1603103','3d714c50b3982508506799e9d6db5fc1',NULL,NULL,NULL,NULL,'Karyawan'),(130,NULL,'admin','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,'Admin');

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

/*Table structure for table `tipe_absensi` */

DROP TABLE IF EXISTS `tipe_absensi`;

CREATE TABLE `tipe_absensi` (
  `id_tipe_absensi` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Tipe Absensi',
  `nm_tipe_absensi` varchar(35) DEFAULT NULL COMMENT 'Nama Tipe Absensi',
  PRIMARY KEY (`id_tipe_absensi`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tipe_absensi` */

insert  into `tipe_absensi`(`id_tipe_absensi`,`nm_tipe_absensi`) values (1,'Hadir'),(2,'Ijin'),(3,'Cuti'),(4,'Sakit'),(5,'Mangkir');

/*Table structure for table `tipe_cuti` */

DROP TABLE IF EXISTS `tipe_cuti`;

CREATE TABLE `tipe_cuti` (
  `id_tipe_cuti` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID. Tipe Cuti',
  `nm_tipe_cuti` varchar(35) DEFAULT NULL COMMENT 'Nama Tipe Cuti',
  `jatah_cuti` smallint(6) DEFAULT NULL COMMENT 'Jatah Cuti',
  PRIMARY KEY (`id_tipe_cuti`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tipe_cuti` */

insert  into `tipe_cuti`(`id_tipe_cuti`,`nm_tipe_cuti`,`jatah_cuti`) values (1,'Tahunan',12),(2,'Khusus',0);

/*Table structure for table `tipe_shift` */

DROP TABLE IF EXISTS `tipe_shift`;

CREATE TABLE `tipe_shift` (
  `id_tipe_shift` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID. Tipe Shift',
  `nm_shift` varchar(35) DEFAULT NULL COMMENT 'Nama Shift',
  PRIMARY KEY (`id_tipe_shift`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tipe_shift` */

insert  into `tipe_shift`(`id_tipe_shift`,`nm_shift`) values (1,'Non Shift'),(2,'Shift 1'),(3,'Shift 2');

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
 `nama` varchar(35) 
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

/*Table structure for table `v_komponen_gaji` */

DROP TABLE IF EXISTS `v_komponen_gaji`;

/*!50001 DROP VIEW IF EXISTS `v_komponen_gaji` */;
/*!50001 DROP TABLE IF EXISTS `v_komponen_gaji` */;

/*!50001 CREATE TABLE  `v_komponen_gaji`(
 `id_karyawan` int(11) ,
 `nik` varchar(8) ,
 `id_kgk` int(11) ,
 `nominal` decimal(10,2) ,
 `nm_komponen` varchar(35) ,
 `kategori_komponen` enum('Pendapatan','Potongan') 
)*/;

/*View structure for view v_karyawan */

/*!50001 DROP TABLE IF EXISTS `v_karyawan` */;
/*!50001 DROP VIEW IF EXISTS `v_karyawan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_karyawan` AS select `karyawan`.`id_karyawan` AS `id_karyawan`,`karyawan`.`nik` AS `nik`,`karyawan`.`status` AS `status`,`karyawan`.`id_perusahaan` AS `id_perusahaan`,`karyawan`.`id_jabatan` AS `id_jabatan`,`karyawan`.`tgl_bergabung` AS `tgl_bergabung`,`informasi_pribadi`.`nama` AS `nama` from (`informasi_pribadi` join `karyawan` on((`informasi_pribadi`.`id_karyawan` = `karyawan`.`id_karyawan`))) */;

/*View structure for view v_karyawan_atasan */

/*!50001 DROP TABLE IF EXISTS `v_karyawan_atasan` */;
/*!50001 DROP VIEW IF EXISTS `v_karyawan_atasan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_karyawan_atasan` AS select `karyawan_atasan`.`id_atasan` AS `id_atasan`,`karyawan_atasan`.`id_karyawan_atasan` AS `id_karyawan_atasan`,`karyawan_atasan`.`id_karyawan` AS `id_karyawan`,`informasi_pribadi`.`nama` AS `nama` from (`informasi_pribadi` join `karyawan_atasan` on((`informasi_pribadi`.`id_karyawan` = `karyawan_atasan`.`id_karyawan_atasan`))) */;

/*View structure for view v_komponen_gaji */

/*!50001 DROP TABLE IF EXISTS `v_komponen_gaji` */;
/*!50001 DROP VIEW IF EXISTS `v_komponen_gaji` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_komponen_gaji` AS select `karyawan`.`id_karyawan` AS `id_karyawan`,`karyawan`.`nik` AS `nik`,`komponen_gaji_karyawan`.`id_kgk` AS `id_kgk`,`komponen_gaji_karyawan`.`nominal` AS `nominal`,`komponen_gaji`.`nm_komponen` AS `nm_komponen`,`komponen_gaji`.`kategori_komponen` AS `kategori_komponen` from ((`karyawan` join `komponen_gaji_karyawan` on((`karyawan`.`id_karyawan` = `komponen_gaji_karyawan`.`id_karyawan`))) join `komponen_gaji` on((`komponen_gaji`.`id_komponen` = `komponen_gaji_karyawan`.`id_komponen`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
