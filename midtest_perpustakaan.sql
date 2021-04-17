/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.17-MariaDB : Database - midtest_perpustakaan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`midtest_perpustakaan` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `midtest_perpustakaan`;

/*Table structure for table `buku` */

DROP TABLE IF EXISTS `buku`;

CREATE TABLE `buku` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jen_buku_id` bigint(20) unsigned DEFAULT NULL,
  `id_penulis` bigint(20) DEFAULT NULL,
  `id_penerbit` bigint(20) DEFAULT NULL,
  `judul_buku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int(11) NOT NULL,
  `edisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `buku` */

insert  into `buku`(`id`,`jen_buku_id`,`id_penulis`,`id_penerbit`,`judul_buku`,`isbn`,`tahun`,`edisi`,`jumlah`,`created_at`,`updated_at`) values 
(1,4,1,17,'Boruto : Naruto next generation shapire','978-623-69-2249-4',2012,'vol. 17',11,NULL,'2021-03-27 05:45:54'),
(2,3,3,4,'Boruto : Naruto next generation 7','978-623-00-2141-1',2020,'vol. 7',14,NULL,NULL),
(3,4,5,6,'Naruto : tale of the utterly Gutsy Shinobi','978-623-00-1529-8',2020,'vol. 8',12,NULL,NULL),
(4,4,1,3,'Boruto : Naruto next generation vol. 5','978-623-00-1331-7',2020,'vol. 5',32,NULL,NULL),
(5,NULL,NULL,2,'Naruto : blood prison 1','978-623-00-0595-4',2019,'vol. 7',14,NULL,'2021-03-16 18:18:20'),
(6,2,1,2,'Boruto : Naruto next generations','978-623-00-0413-1',2019,'vol.4',19,NULL,'2021-03-16 18:30:26'),
(7,5,3,NULL,'Boruto : Naruto next generations','978-623-00-0075-1',2019,'vol.3',15,NULL,'2021-03-25 18:11:28'),
(8,NULL,NULL,NULL,'Naruto : mission: protect the waterfall village','978-602-04-9544-6',2019,'v.3',11,NULL,NULL),
(17,7,NULL,13,'Jurnal 1','298-948-7583-02-3',2019,'vol.2',9,'2021-03-15 11:59:34','2021-03-27 05:53:38'),
(19,4,2,9,'Jurnal 3','123-123-43-1232-2',2091,'vol. 8',20,'2021-03-16 18:36:11','2021-03-27 05:53:38'),
(20,5,3,11,'Cara memuaskan istri temen','696-6969-696-69',2019,'vol.4',23,'2021-03-24 18:25:28','2021-03-25 18:08:35'),
(21,5,3,12,'Cara cepat menghafal Al Quran','153-223-3132-22-4',2012,'vol. 8',22,'2021-03-24 18:27:58','2021-03-27 05:53:38'),
(22,7,6,7,'Buku gambar dinosaurus','123-342-23-1232-0',2019,'vol. 2',12,'2021-03-25 15:24:05','2021-03-25 15:24:05'),
(23,3,1,13,'Buku kisah kancil','123-345-5673-67-3',2019,'vol. 3',21,'2021-03-25 15:42:27','2021-03-25 17:55:02'),
(24,5,5,15,'Buku mantap bergambar','123-345-5673-67-3',2019,'vol. 3',21,'2021-03-25 15:43:52','2021-03-25 18:10:17'),
(25,7,3,4,'Buku bahasa bergambar','123-345-5673-67-3',2019,'vol. 3',21,'2021-03-25 15:46:39','2021-03-25 15:46:39'),
(26,9,7,6,'Buku rahasia naruto','123-456-5673-67-2',2012,'vol. 1',21,'2021-03-25 15:47:29','2021-03-25 15:47:29'),
(27,8,7,6,'Buku mantap-mantap','123-345-6786-23-4',2019,'vol. 8',21,'2021-03-25 15:49:51','2021-03-25 15:49:51'),
(28,7,2,10,'Buku resep roti','322-939-2312-83-3',2020,'vol. 3',23,'2021-03-25 15:52:35','2021-03-25 15:52:35'),
(29,9,7,4,'Buku resep roti thailand','345-232-2123-34-6',1996,'vol. 9',12,'2021-03-25 15:54:20','2021-03-25 18:10:33'),
(30,9,7,10,'Buku tutorial semesta','345-232-2123-34-6',1996,'vol. 9',11,'2021-03-25 15:54:46','2021-03-27 05:46:52'),
(32,7,NULL,3,'buku resep mie','123-343-5634-32-5',2019,'vol. 3',20,'2021-03-26 05:36:00','2021-03-27 05:46:52');

/*Table structure for table `buku_peminjam` */

DROP TABLE IF EXISTS `buku_peminjam`;

CREATE TABLE `buku_peminjam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

/*Data for the table `buku_peminjam` */

insert  into `buku_peminjam`(`id`,`id_buku`,`id_peminjam`,`created_at`,`updated_at`) values 
(8,2,5,NULL,NULL),
(9,4,5,NULL,NULL),
(10,6,5,NULL,NULL),
(11,1,6,NULL,NULL),
(12,3,6,NULL,NULL),
(13,4,6,NULL,NULL),
(35,5,2,NULL,NULL),
(36,2,2,NULL,NULL),
(37,1,7,NULL,NULL),
(38,17,7,NULL,NULL),
(39,19,7,NULL,NULL),
(40,4,1,NULL,NULL),
(41,5,1,NULL,NULL),
(42,1,8,NULL,NULL),
(43,2,8,NULL,NULL),
(45,32,9,NULL,NULL),
(46,2,9,NULL,NULL),
(47,30,10,NULL,NULL),
(48,32,10,NULL,NULL),
(49,17,11,NULL,NULL),
(50,19,11,NULL,NULL),
(51,21,11,NULL,NULL);

/*Table structure for table `buku_rakbuku` */

DROP TABLE IF EXISTS `buku_rakbuku`;

CREATE TABLE `buku_rakbuku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `buku_rakbuku` */

insert  into `buku_rakbuku`(`id`,`id_buku`,`id_rak`,`created_at`,`updated_at`) values 
(2,4,4,NULL,NULL),
(3,2,2,NULL,NULL),
(4,3,1,NULL,NULL),
(5,2,1,NULL,NULL),
(7,3,4,NULL,NULL),
(10,30,2,NULL,NULL),
(11,30,4,NULL,NULL),
(14,1,1,NULL,NULL),
(15,1,2,NULL,NULL),
(16,1,4,NULL,NULL),
(17,31,2,NULL,NULL),
(18,31,4,NULL,NULL),
(19,17,2,NULL,NULL),
(20,24,2,NULL,NULL),
(21,7,2,NULL,NULL),
(22,19,5,NULL,NULL),
(23,20,2,NULL,NULL),
(24,20,5,NULL,NULL),
(25,32,2,NULL,NULL),
(26,32,5,NULL,NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `jenis_buku` */

DROP TABLE IF EXISTS `jenis_buku`;

CREATE TABLE `jenis_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jenis_buku` */

insert  into `jenis_buku`(`id`,`nama_jenis`,`keterangan`,`created_at`,`updated_at`) values 
(2,'Si-fi','Buku yang melintas masa depan dan masa lalu',NULL,'2021-03-16 18:57:23'),
(3,'Fantasi','Buku untuk berisi hayalan',NULL,NULL),
(4,'Sejarah','Buku yang berisi penjelasan masa lalu',NULL,NULL),
(5,'Pendidikan','Buku sekolah',NULL,NULL),
(6,'Komik','Buku bergambar yang menyenangkan',NULL,NULL),
(7,'Majalah','Buku berisi berita terkini',NULL,NULL),
(8,'Otomotif','Belajar motor','2021-03-15 14:17:10','2021-03-15 14:17:10'),
(9,'Mitos','buku tahayul','2021-03-15 14:48:06','2021-03-15 14:48:06'),
(10,'Legenda','menceritakan tentang asal usul','2021-03-15 15:05:45','2021-03-15 15:05:45'),
(11,'wqe','Jenis buku Mantap','2021-03-26 12:39:41','2021-03-26 12:39:41'),
(12,'Psikopat','Buku cerita sadis','2021-03-26 12:41:31','2021-03-26 12:41:56');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2019_08_19_000000_create_failed_jobs_table',1),
(3,'2021_02_24_060813_create_buku_table',1),
(7,'2021_03_16_145011_add_jenis_id_to_buku_table',2);

/*Table structure for table `peminjam` */

DROP TABLE IF EXISTS `peminjam`;

CREATE TABLE `peminjam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_peminjam` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `peminjam` */

insert  into `peminjam`(`id`,`nama_peminjam`,`jenis_kelamin`,`agama`,`no_hp`,`alamat`,`created_at`,`updated_at`) values 
(1,'Naruto Hyuga','Laki-laki','Hindu','0828392783289','Perumahan Konoha gakure',NULL,'2021-03-25 18:12:54'),
(2,'Luffy','Laki-laki','Hindu','0817829287382','Jalan Raya East Blue',NULL,'2021-03-25 08:14:05'),
(3,'Ichigo','Laki-laki','Konghucu','0818920192829','Jalan raya soul society',NULL,'2021-03-25 08:19:40'),
(5,'Kiba Saturobi','Laki-laki','Budha','082981982829','Jalan raya ahmad sarutobi','2021-03-25 06:53:24','2021-03-25 06:53:24'),
(6,'Dewa','Laki-laki','Hindu','082920029203','mantap','2021-03-25 07:26:49','2021-03-26 06:11:52'),
(7,'Uchiha Alma','Laki-laki','Budha','0872837182232','asdsads','2021-03-25 17:27:54','2021-03-25 17:27:54'),
(8,'Makoto nagano','Perempuan','Kristen Katolik','082932930239','Jalan pelabuhan lain timur','2021-03-26 06:09:44','2021-03-26 06:09:44'),
(9,'Raikage san','Perempuan','Kristen Katolik','0829289302983','Jalan raya kumogakure','2021-03-26 17:52:02','2021-03-26 17:52:37'),
(10,'Uchiha Rika','Perempuan','Budha','0819203922812','Jalan raya 1','2021-03-27 05:46:52','2021-03-27 05:46:52'),
(11,'Kojiro hayato','Perempuan','Budha','082902930291','jalan raya Kagiro','2021-03-27 05:53:38','2021-03-27 05:53:38');

/*Table structure for table `penerbit` */

DROP TABLE IF EXISTS `penerbit`;

CREATE TABLE `penerbit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penerbit` varchar(255) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `penerbit` */

insert  into `penerbit`(`id`,`nama_penerbit`,`no_hp`,`alamat`,`created_at`,`updated_at`) values 
(1,'PT. Makmur abadi Sentosa','081564582654','Panjer',NULL,'2021-03-16 19:01:22'),
(2,'Jaya Sejadi','085632145785','Denpasar',NULL,NULL),
(3,'Lebih Makmur','084563214587','Bogor',NULL,NULL),
(4,'UD. Abadi Lestari','087968214563','Tabanan',NULL,NULL),
(5,'PT. Maha Yana','086321456987','Monang-maning',NULL,NULL),
(6,'Penerbit Alkisah','082654325658','Denpasar',NULL,NULL),
(7,'Lestari Bumi','084125756325','Gatsu',NULL,NULL),
(8,'Berseri Lestari','085456963254','Pesanggaran',NULL,NULL),
(9,'Cipta Karyadi 1','082987839473','Jimbaran','2021-03-15 14:36:11','2021-03-16 13:44:34'),
(10,'Cipta Karyadi 2','082987839473','Jimbaran','2021-03-15 14:36:19','2021-03-16 13:44:38'),
(11,'Cipta Karyadi 3','082987839473','Jimbaran','2021-03-15 14:37:20','2021-03-16 13:44:43'),
(12,'Cipta Karyadi 4','082987839473','Jimbaran','2021-03-15 14:39:10','2021-03-16 13:44:48'),
(13,'Cipta Karyadi 5','082987839473','Jimbaran','2021-03-15 14:40:19','2021-03-16 13:44:54'),
(15,'Cahaya ilmu','0829839281782','Bangli','2021-03-15 14:41:37','2021-03-15 14:41:37'),
(16,'Belajar jadi','086728392837','Jimbaran','2021-03-15 14:50:08','2021-03-15 14:50:08'),
(17,'Lembar Ilmu','082783948564','Pesanggaran','2021-03-15 15:06:18','2021-03-15 15:06:18'),
(18,'Cemara lestari','082930829382','Purwokerto','2021-03-26 13:02:32','2021-03-26 13:02:32');

/*Table structure for table `penulis` */

DROP TABLE IF EXISTS `penulis`;

CREATE TABLE `penulis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penulis` varchar(255) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `penulis` */

insert  into `penulis`(`id`,`nama_penulis`,`no_hp`,`alamat`,`created_at`,`updated_at`) values 
(1,'Budhi Arta Kusuma Giri','084632564521','Panjer',NULL,'2021-03-16 19:04:51'),
(2,'Dw Ngakan','087563251458','Gianyar',NULL,NULL),
(3,'Andika W','087965632541','Denpasar',NULL,'2021-03-24 18:24:13'),
(5,'Andrew','081236547548','Jakarta',NULL,NULL),
(6,'Nara','086325214521','Denpasar',NULL,NULL),
(7,'Nouval','087563254258','Pesanggaran',NULL,NULL),
(9,'Kusuma Dewi','082908765675','Tabanan','2021-03-15 15:34:49','2021-03-15 15:34:49');

/*Table structure for table `rakbuku` */

DROP TABLE IF EXISTS `rakbuku`;

CREATE TABLE `rakbuku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_rakbuku` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `rakbuku` */

insert  into `rakbuku`(`id`,`no_rakbuku`,`keterangan`,`created_at`,`updated_at`) values 
(1,'1','Rak 3 tingkat berwarna coklat tua',NULL,'2021-03-24 13:50:03'),
(2,'2','Rak yang berada denkat dengan meja komputer',NULL,'2021-03-24 13:58:59'),
(4,'4','Rak buku dekat dengan rak 3','2021-03-24 14:02:45','2021-03-24 14:02:45'),
(5,'5','Rak terpanjang yang ada di perpustakaan','2021-03-25 18:11:53','2021-03-25 18:11:53'),
(6,'6','Rak dengan warna hitam','2021-03-26 05:37:03','2021-03-26 13:28:07'),
(7,'7','Rak berada dekat jendela','2021-03-26 13:27:40','2021-03-26 13:27:40'),
(8,'8','Rak buku terbaru','2021-03-27 05:18:17','2021-03-27 05:18:17');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
