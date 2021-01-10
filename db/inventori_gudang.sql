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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `harga` decimal(18,0) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `softdelete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`id`,`nama_barang`,`jenis`,`stock`,`harga`,`picture`,`active`,`softdelete`) values 
(65,'Asus Rog M15','Alat Elektronik',0,9000000,'test.img',1,0),
(66,'Acer M9280','Alat Elektronik',0,8900000,'test.img',1,0),
(67,'Tempered GlasS Samsung Galaxy S3','Alat Elektronik',0,80000,'test.img',1,0),
(68,'Usb Flashdisk Kingston 16gb ','Alat Elektronik',0,90000,'test.img',1,0),
(69,'Speaker Bluetooth Inpods V1','Alat Elektronik',0,100000,'test.img',1,0);

/*Table structure for table `barang_out` */

DROP TABLE IF EXISTS `barang_out`;

CREATE TABLE `barang_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `own_by` varchar(25) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang_out` */

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `country` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

/*Data for the table `customers` */

insert  into `customers`(`id`,`FirstName`,`LastName`,`phone`,`address`,`city`,`country`) values 
(1,'Carine ','Schmitt','40.32.2555','54, rue Royale','Nantes','France'),
(2,'Jean','King','7025551838','8489 Strong St.','Las Vegas','USA'),
(3,'Peter','Ferguson','03 9520 4555','636 St Kilda Road','Melbourne','Australia'),
(4,'Janine ','Labrune','40.67.8555','67, rue des Cinquante Otages','Nantes','France'),
(5,'Jonas ','Bergulfsen','07-98 9555','Erling Skakkes gate 78','Stavern','Norway'),
(6,'Susan','Nelson','4155551450','5677 Strong St.','San Rafael','USA'),
(7,'Zbyszek ','Piestrzeniewicz','(26) 642-7555','ul. Filtrowa 68','Warszawa','Poland'),
(8,'Roland','Keitel','+49 69 66 90 2555','Lyonerstr. 34','Frankfurt','Germany'),
(9,'Julie','Murphy','6505555787','5557 North Pendale Street','San Francisco','USA'),
(10,'Kwai','Lee','2125557818','897 Long Airport Avenue','NYC','USA'),
(11,'Diego ','Freyre','(91) 555 94 44','C/ Moralzarzal, 86','Madrid','Spain'),
(12,'Christina ','Berglund','0921-12 3555','Berguvsvägen  8','Luleå','Sweden'),
(13,'Jytte ','Petersen','31 12 3555','Vinbæltet 34','Kobenhavn','Denmark'),
(14,'Mary ','Saveley','78.32.5555','2, rue du Commerce','Lyon','France'),
(15,'Eric','Natividad','+65 221 7555','Bronz Sok.','Singapore','Singapore'),
(16,'Jeff','Young','2125557413','4092 Furth Circle','NYC','USA'),
(17,'Kelvin','Leong','2155551555','7586 Pompton St.','Allentown','USA'),
(18,'Juri','Hashimoto','6505556809','9408 Furth Circle','Burlingame','USA'),
(19,'Wendy','Victorino','+65 224 1555','106 Linden Road Sandown','Singapore','Singapore'),
(20,'Veysel','Oeztan','+47 2267 3215','Brehmen St. 121','Bergen','Norway  '),
(21,'Keith','Franco','2035557845','149 Spinnaker Dr.','New Haven','USA'),
(22,'Isabel ','de Castro','(1) 356-5555','Estrada da saúde n. 58','Lisboa','Portugal'),
(23,'Martine ','Rancé','20.16.1555','184, chaussée de Tournai','Lille','France'),
(24,'Marie','Bertrand','(1) 42.34.2555','265, boulevard Charonne','Paris','France'),
(25,'Jerry','Tseng','6175555555','4658 Baden Av.','Cambridge','USA'),
(26,'Julie','King','2035552570','25593 South Bay Ln.','Bridgewater','USA'),
(27,'Mory','Kentary','+81 06 6342 5555','1-6-20 Dojima','Kita-ku','Japan'),
(28,'Michael','Frick','2125551500','2678 Kingston Rd.','NYC','USA'),
(29,'Matti','Karttunen','90-224 8555','Keskuskatu 45','Helsinki','Finland'),
(30,'Rachel','Ashworth','(171) 555-1555','Fauntleroy Circus','Manchester','UK'),
(31,'Dean','Cassidy','+353 1862 1555','25 Maiden Lane','Dublin','Ireland'),
(32,'Leslie','Taylor','6175558428','16780 Pompton St.','Brickhaven','USA'),
(33,'Elizabeth','Devon','(171) 555-2282','12, Berkeley Gardens Blvd','Liverpool','UK'),
(34,'Yoshi ','Tamuri','(604) 555-3392','1900 Oak St.','Vancouver','Canada'),
(35,'Miguel','Barajas','6175557555','7635 Spinnaker Dr.','Brickhaven','USA'),
(36,'Julie','Young','6265557265','78934 Hillside Dr.','Pasadena','USA'),
(37,'Brydey','Walker','+612 9411 1555','Suntec Tower Three','Singapore','Singapore'),
(38,'Frédérique ','Citeaux','88.60.1555','24, place Kléber','Strasbourg','France'),
(39,'Mike','Gao','+852 2251 1555','Bank of China Tower','Central Hong Kong','Hong Kong'),
(40,'Eduardo ','Saavedra','(93) 203 4555','Rambla de Cataluña, 23','Barcelona','Spain'),
(41,'Mary','Young','3105552373','4097 Douglas Av.','Glendale','USA'),
(42,'Horst ','Kloss','0372-555188','Taucherstraße 10','Cunewalde','Germany'),
(43,'Palle','Ibsen','86 21 3555','Smagsloget 45','Århus','Denmark'),
(44,'Jean ','Fresnière','(514) 555-8054','43 rue St. Laurent','Montréal','Canada'),
(45,'Alejandra ','Camino','(91) 745 6555','Gran Vía, 1','Madrid','Spain'),
(46,'Valarie','Thompson','7605558146','361 Furth Circle','San Diego','USA'),
(47,'Helen ','Bennett','(198) 555-8888','Garden House','Cowes','UK'),
(48,'Annette ','Roulet','61.77.6555','1 rue Alsace-Lorraine','Toulouse','France'),
(49,'Renate ','Messner','069-0555984','Magazinweg 7','Frankfurt','Germany'),
(50,'Paolo ','Accorti','011-4988555','Via Monte Bianco 34','Torino','Italy'),
(51,'Daniel','Da Silva','+33 1 46 62 7555','27 rue du Colonel Pierre Avia','Paris','France'),
(52,'Daniel ','Tonini','30.59.8555','67, avenue de l\'Europe','Versailles','France'),
(53,'Henriette ','Pfalzheim','0221-5554327','Mehrheimerstr. 369','Köln','Germany'),
(54,'Elizabeth ','Lincoln','(604) 555-4555','23 Tsawassen Blvd.','Tsawassen','Canada'),
(55,'Peter ','Franken','089-0877555','Berliner Platz 43','München','Germany'),
(56,'Anna','O\'Hara','02 9936 8555','201 Miller Street','North Sydney','Australia'),
(57,'Giovanni ','Rovelli','035-640555','Via Ludovico il Moro 22','Bergamo','Italy'),
(58,'Adrian','Huxley','+61 2 9495 8555','Monitor Money Building','Chatswood','Australia'),
(59,'Marta','Hernandez','6175558555','39323 Spinnaker Dr.','Cambridge','USA'),
(60,'Ed','Harrison','+41 26 425 50 01','Rte des Arsenaux 41 ','Fribourg','Switzerland'),
(61,'Mihael','Holz','0897-034555','Grenzacherweg 237','Genève','Switzerland'),
(62,'Jan','Klaeboe','+47 2212 1555','Drammensveien 126A','Oslo','Norway  '),
(63,'Bradley','Schuyler','+31 20 491 9555','Kingsfordweg 151','Amsterdam','Netherlands'),
(64,'Mel','Andersen','030-0074555','Obere Str. 57','Berlin','Germany'),
(65,'Pirkko','Koskitalo','981-443655','Torikatu 38','Oulu','Finland'),
(66,'Catherine ','Dewey','(02) 5554 67','Rue Joseph-Bens 532','Bruxelles','Belgium'),
(67,'Steve','Frick','9145554562','3758 North Pendale Street','White Plains','USA'),
(68,'Wing','Huang','5085559555','4575 Hillside Dr.','New Bedford','USA'),
(69,'Julie','Brown','6505551386','7734 Strong St.','San Francisco','USA'),
(70,'Mike','Graham','+64 9 312 5555','162-164 Grafton Road','Auckland  ','New Zealand'),
(71,'Ann ','Brown','(171) 555-0297','35 King George','London','UK'),
(72,'William','Brown','2015559350','7476 Moss Rd.','Newark','USA'),
(73,'Ben','Calaghan','61-7-3844-6555','31 Duncan St. West End','South Brisbane','Australia'),
(74,'Kalle','Suominen','+358 9 8045 555','Software Engineering Center','Espoo','Finland'),
(75,'Philip ','Cramer','0555-09555','Maubelstr. 90','Brandenburg','Germany'),
(76,'Francisca','Cervantes','2155554695','782 First Street','Philadelphia','USA'),
(77,'Jesus','Fernandez','+34 913 728 555','Merchants House','Madrid','Spain'),
(78,'Brian','Chandler','2155554369','6047 Douglas Av.','Los Angeles','USA'),
(79,'Patricia ','McKenna','2967 555','8 Johnstown Road','Cork','Ireland'),
(80,'Laurence ','Lebihan','91.24.4555','12, rue des Bouchers','Marseille','France'),
(81,'Paul ','Henriot','26.47.1555','59 rue de l\'Abbaye','Reims','France'),
(82,'Armand','Kuger','+27 21 550 3555','1250 Pretorius Street','Hatfield','South Africa'),
(83,'Wales','MacKinlay','64-9-3763555','199 Great North Road','Auckland','New Zealand'),
(84,'Karin','Josephs','0251-555259','Luisenstr. 48','Münster','Germany'),
(85,'Juri','Yoshido','6175559555','8616 Spinnaker Dr.','Boston','USA'),
(86,'Dorothy','Young','6035558647','2304 Long Airport Avenue','Nashua','USA'),
(87,'Lino ','Rodriguez','(1) 354-2555','Jardim das rosas n. 32','Lisboa','Portugal'),
(88,'Braun','Urs','0452-076555','Hauptstr. 29','Bern','Switzerland'),
(89,'Allen','Nelson','6175558555','7825 Douglas Av.','Brickhaven','USA'),
(90,'Pascale ','Cartrain','(071) 23 67 2555','Boulevard Tirou, 255','Charleroi','Belgium'),
(91,'Georg ','Pipps','6562-9555','Geislweg 14','Salzburg','Austria'),
(92,'Arnold','Cruz','+63 2 555 3587','15 McCallum Street','Makati City','Philippines'),
(93,'Maurizio ','Moroni','0522-556555','Strada Provinciale 124','Reggio Emilia','Italy'),
(94,'Akiko','Shimamura','+81 3 3584 0555','2-2-8 Roppongi','Minato-ku','Japan'),
(95,'Dominique','Perrier','(1) 47.55.6555','25, rue Lauriston','Paris','France'),
(96,'Rita ','Müller','0711-555361','Adenauerallee 900','Stuttgart','Germany'),
(97,'Sarah','McRoy','04 499 9555','101 Lambton Quay','Wellington','New Zealand'),
(98,'Michael','Donnermeyer',' +49 89 61 08 9555','Hansastr. 15','Munich','Germany'),
(99,'Maria','Hernandez','2125558493','5905 Pompton St.','NYC','USA'),
(100,'Alexander ','Feuer','0342-555176','Heerstr. 22','Leipzig','Germany'),
(101,'Dan','Lewis','2035554407','2440 Pompton St.','Glendale','USA'),
(102,'Martha','Larsson','0695-34 6555','Åkergatan 24','Bräcke','Sweden'),
(103,'Sue','Frick','4085553659','3086 Ingle Ln.','San Jose','USA'),
(104,'Roland ','Mendel','7675-3555','Kirchgasse 6','Graz','Austria'),
(105,'Leslie','Murphy','2035559545','567 North Pendale Street','New Haven','USA'),
(106,'Yu','Choi','2125551957','5290 North Pendale Street','NYC','USA'),
(107,'Martín ','Sommer','(91) 555 22 82','C/ Araquil, 67','Madrid','Spain'),
(108,'Sven ','Ottlieb','0241-039123','Walserweg 21','Aachen','Germany'),
(109,'Violeta','Benitez','5085552555','1785 First Street','New Bedford','USA'),
(110,'Carmen','Anton','+34 913 728555','c/ Gobelas, 19-1 Urb. La Florida','Madrid','Spain'),
(111,'Sean','Clenahan','61-9-3844-6555','7 Allen Street','Glen Waverly','Australia'),
(112,'Franco','Ricotti','+39 022515555','20093 Cologno Monzese','Milan','Italy'),
(113,'Steve','Thompson','3105553722','3675 Furth Circle','Burbank','USA'),
(114,'Hanna ','Moos','0621-08555','Forsterstr. 57','Mannheim','Germany'),
(115,'Alexander ','Semenov','+7 812 293 0521','2 Pobedy Square','Saint Petersburg','Russia'),
(116,'Raanan','Altagar,G M','+ 972 9 959 8555','3 Hagalim Blv.','Herzlia','Israel'),
(117,'José Pedro ','Roel','(95) 555 82 82','C/ Romero, 33','Sevilla','Spain'),
(118,'Rosa','Salazar','2155559857','11328 Douglas Av.','Philadelphia','USA'),
(119,'Sue','Taylor','4155554312','2793 Furth Circle','Brisbane','USA'),
(120,'Thomas ','Smith','(171) 555-7555','120 Hanover Sq.','London','UK'),
(121,'Valarie','Franco','6175552555','6251 Ingle Ln.','Boston','USA'),
(122,'Tony','Snowden','+64 9 5555500','Arenales 1938 3\'A\'','Auckland  ','New Zealand');

/*Table structure for table `gudang` */

DROP TABLE IF EXISTS `gudang`;

CREATE TABLE `gudang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `softdelete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `gudang` */

insert  into `gudang`(`id`,`nama`,`status`,`softdelete`) values 
(12,'Gudang Jepang',1,0),
(13,'Gudang Indonesia',1,0),
(14,'Gudang Surabaya',1,0);

/*Table structure for table `inven_gudang` */

DROP TABLE IF EXISTS `inven_gudang`;

CREATE TABLE `inven_gudang` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_gudang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `softdelete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gudangConstraint` (`id_gudang`),
  KEY `barangConstraint` (`id_barang`),
  CONSTRAINT `barangConstraint` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gudangConstraint` FOREIGN KEY (`id_gudang`) REFERENCES `gudang` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `inven_gudang` */

insert  into `inven_gudang`(`id`,`id_gudang`,`id_barang`,`qty`,`status`,`softdelete`) values 
(13,12,65,55,1,0),
(14,13,65,1,1,0),
(15,12,66,123,1,0),
(16,13,66,10,1,0),
(17,12,67,1000,1,0),
(18,13,67,10,1,0),
(19,12,68,40,1,0),
(20,13,68,0,1,0),
(21,12,69,100,1,0),
(22,13,69,100,1,0),
(23,14,69,0,1,0);

/*Table structure for table `jenis_report` */

DROP TABLE IF EXISTS `jenis_report`;

CREATE TABLE `jenis_report` (
  `id` int(11) NOT NULL,
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `action_by` varchar(100) NOT NULL,
  `jenis_report` int(11) NOT NULL,
  `waktu` date NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `report` */

insert  into `report`(`id`,`id_barang`,`quantity`,`action_by`,`jenis_report`,`waktu`,`id_gudang`,`description`) values 
(1,66,10,'david',1,'2021-01-09',13,NULL),
(2,65,10,'david',1,'2021-01-09',13,NULL),
(3,67,10,'david',1,'2021-01-09',13,NULL),
(4,66,100,'fahri',1,'2021-01-09',12,NULL),
(5,65,100,'fahri',1,'2021-01-09',12,NULL),
(6,67,100,'fahri',1,'2021-01-09',12,NULL),
(7,65,45,'fahri',2,'2021-01-09',12,NULL),
(8,67,900,'fahri',1,'2021-01-09',12,NULL),
(9,68,10,'fahri',1,'2021-01-10',12,NULL),
(10,66,23,'fahri',1,'2021-01-10',12,NULL),
(11,69,100,'fahri',1,'2021-01-10',12,NULL),
(12,65,3,'budi',2,'2021-01-10',13,NULL),
(13,65,3,'budi',2,'2021-01-10',13,NULL),
(14,65,3,'budi',2,'2021-01-10',13,'Mutasi Gudang'),
(15,69,100,'budi',1,'2021-01-10',13,'barang datang dari pembelian kuartal 1'),
(16,68,30,'fahri',1,'2021-01-10',12,'Usb barang masuk dari pembelian kuratal ke 2');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `gudang` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `softdelete` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDPARENT` (`gudang`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`telepon`,`password`,`role`,`gudang`,`status`,`softdelete`) values 
(1,'galih','galih@mail.com','0991288384','123456',1,0,1,0),
(10,'fahri','fahri@gmail.com','0817273881','123456',2,12,1,0),
(11,'dani','dani@mail.com','08773128818','123456',2,12,1,0),
(12,'budi','budi99@gmail.com','08772838188','123456',2,13,1,0),
(13,'david','daviid@gmail.com','0988278288','123456',2,13,1,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
