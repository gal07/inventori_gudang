/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.1.30-MariaDB : Database - inventori_gudang
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inventori_gudang` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `inventori_gudang`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `harga` decimal(18,0) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`id`,`nama_barang`,`jenis`,`stock`,`harga`,`picture`,`active`) values 
(3,'Pensil 5B Aasus','Alat Perkantoran',48,15000,'20190922123956.jpg',1),
(8,'Pensil 5B Aasus','Alat Elektronik',89,50000,'20190923112313.jpg',1),
(9,'Asus ROG 2000','Alat Elektronik',52,2000000,'20200104072550.jpg',1),
(10,'Firebase','Alat Elektronik',55,450000,'20200921053433.jpg',1),
(11,'Mouse Gaming HP M160','Alat Elektronik',5,160000,'20201226023057.jpg',1),
(12,'Mouse Gaming AULA DPI 2100','Alat Elektronik',90,70000,'20201226052816.jpg',1),
(13,'Mouse Gaming Red Dragon M920','Alat Elektronik',55,100000,'20201226055752.jpg',1);

/*Table structure for table `barang_out` */

DROP TABLE IF EXISTS `barang_out`;

CREATE TABLE `barang_out` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_barang` int(5) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `own_by` varchar(25) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang_out` */

/*Table structure for table `gudang` */

DROP TABLE IF EXISTS `gudang`;

CREATE TABLE `gudang` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `gudang` */

insert  into `gudang`(`id`,`nama`) values 
(1,'Gudang Jakarta'),
(2,'Gudang Bekasi');

/*Table structure for table `inven_gudang` */

DROP TABLE IF EXISTS `inven_gudang`;

CREATE TABLE `inven_gudang` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `id_gudang` int(5) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `qty` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gudangConstraint` (`id_gudang`),
  KEY `barangConstraint` (`id_barang`),
  CONSTRAINT `barangConstraint` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gudangConstraint` FOREIGN KEY (`id_gudang`) REFERENCES `gudang` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `inven_gudang` */

insert  into `inven_gudang`(`id`,`id_gudang`,`id_barang`,`qty`) values 
(1,1,3,20),
(2,1,12,63);

/*Table structure for table `jenis_report` */

DROP TABLE IF EXISTS `jenis_report`;

CREATE TABLE `jenis_report` (
  `id` int(5) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jenis_report` */

insert  into `jenis_report`(`id`,`name`) values 
(1,'Barang Masuk'),
(2,'Barang Keluar');

/*Table structure for table `report` */

DROP TABLE IF EXISTS `report`;

CREATE TABLE `report` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_barang` int(6) DEFAULT NULL,
  `quantity` int(6) DEFAULT NULL,
  `action_by` varchar(100) DEFAULT NULL,
  `jenis_report` int(1) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `report` */

insert  into `report`(`id`,`id_barang`,`quantity`,`action_by`,`jenis_report`,`waktu`) values 
(1,9,50,'galih',1,'2020-01-04'),
(2,9,2,'galih',2,'2020-01-04'),
(3,10,5,'galih',1,'2020-09-21'),
(4,10,50,'galih',2,'2020-09-21'),
(5,11,20,'gudang1',1,'2020-12-26'),
(6,11,45,'gudang1',2,'2020-12-26'),
(7,12,100,'gudang1',1,'2020-12-26'),
(8,13,100,'gudang1',1,'2020-12-26'),
(9,13,25,'gudang1',2,'2020-12-26'),
(10,13,25,'gudang1',2,'2020-12-26'),
(11,13,12,'gudang1',1,'2020-12-26'),
(12,13,7,'gudang1',2,'2020-12-26'),
(13,12,10,'gudang1',2,'2020-12-26');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(1) NOT NULL,
  `gudang` int(5) DEFAULT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDPARENT` (`gudang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`telepon`,`password`,`role`,`gudang`,`status`) values 
(1,'galih','galih@mail.com','0991288384','123456',1,0,1),
(2,'gudang1','gg@mail.com','08823774823','123456',2,0,1),
(3,'admin1','ASVA@gmail.com','2312312','678678678',2,0,1),
(4,'nm1','nn@nn.com','08891277388','12345',2,0,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
