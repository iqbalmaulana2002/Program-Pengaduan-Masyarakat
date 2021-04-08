# Host: localhost  (Version 5.5.5-10.4.11-MariaDB)
# Date: 2021-04-08 08:55:36
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "masyarakat"
#

DROP TABLE IF EXISTS `masyarakat`;
CREATE TABLE `masyarakat` (
  `nik` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nik`),
  UNIQUE KEY `masyarakat_username_unique` (`username`),
  UNIQUE KEY `masyarakat_email_unique` (`email`),
  UNIQUE KEY `masyarakat_telp_unique` (`telp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "masyarakat"
#

INSERT INTO `masyarakat` VALUES ('111','Naufal Nur Hidayat','nopal','$2y$10$hhAAGs9NRNnaaa0mfx45qePclKxM6mEV.MsY5hAHOPG1ca3/v5ig.','naufal.gen13@gmail.com','111','2021-04-02 07:27:41','2021-04-02 07:27:41'),('1234567890123456','Sartrio Waluyo','satrios','$2y$10$MwA7BRnNWo/kXnjT4.qNxOUP5czeW92THNY2uxFWgxj/DE2MgY5Ra','iqbalmaulana162002@gmail.com','1234567890123','2021-04-02 17:43:34','2021-04-02 17:43:34'),('222','Rahardian Prasetyo','tyos','$2y$10$LR7x0KzggOaF9XtMoZF/E.RcIIHUEG8BXq9ee2bJaySEqkbXzXIAe','ariobna8404@gmail.com','222','2021-04-02 07:28:19','2021-04-02 07:28:19'),('555','Achmad Abimayu','abi','$2y$10$yfp.lTYGukNgj8FtuePgIO7HSSmty8b3FT.ZKqY6/dTWhkfDP9sU2','mayua2108@gmail.com','555','2021-04-07 03:25:02','2021-04-07 03:25:02');

#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_petugas_table',1),(2,'2021_03_13_225752_create_masyarakat_table',1),(3,'2021_03_13_233209_create_pengaduan_table',1),(4,'2021_03_14_045830_create_tanggapan_table',1);

#
# Structure for table "pengaduan"
#

DROP TABLE IF EXISTS `pengaduan`;
CREATE TABLE `pengaduan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_laporan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "pengaduan"
#

INSERT INTO `pengaduan` VALUES (1,'2021-04-02','222','Lampu mati','asdladioadlk aiosdoadlklkadlkh sadasd asdads','1617349218-img-pengaduan.png','selesai','2021-04-02 07:40:18','2021-04-02 19:59:43'),(3,'2021-04-02','111','asdad','jjkadskjsd ajdhslsadio ioasdiodqw rwqiofals asidqwldkna.','1617393288-img-pengaduan.jpg','selesai','2021-04-02 19:54:48','2021-04-05 08:00:05'),(5,'2021-04-04','1234567890123456','Jalan Ancur','asnm,zoas\r\nasdnaisdulknlkalldlsaiod\r\nasudisadhaduidhad\r\n\r\nasdusaiudhjknsand aosuhuco8a ihno O7& r7 F y9feuafij jfajfd hJ FUa8f9 Af ha u uasdahsd j audiasduh i  diUSAIU uaHdaosjd hua\r\ndsajh ia diusadjdsjajoiioquinmdsanan c ahjsa jsa k asj kI JHSADuyugAIH J ilAiy lua jkasd qtw ydsughj a ,mcxcpok almcc a c a cccxikjb\r\n\r\nadna adaIJLll AIailqwouryjv\r\naadnmda asduijij','1617509567-img-pengaduan.jpg','selesai','2021-04-04 04:12:47','2021-04-07 03:58:50'),(6,'2021-04-04','1234567890123456','alkjsdiadowhjkd','asdlknandnsadksahh\r\nsansadnbkjdsakjahlkadslkjsalkjlkjd\r\nasdjsakj\r\n\r\nakjdskajdsalklkalkjdlkjdlkjlkjdlkj\r\n\r\n\r\naskjdsakjd\r\nsakjdasadlklklkjdla','1617510382-img-pengaduan.jpg','proses','2021-04-04 04:26:22','2021-04-05 18:10:59'),(7,'2021-04-06','111','salkdsallkh','klsaiodaisd\r\nczxkjc','1617613669-img-pengaduan.jpg','proses','2021-04-05 09:07:49','2021-04-07 15:40:35'),(8,'2021-04-06','111','nmnmd','dsa,mnmnmnmnm\r\njdajdsnmnm','1617613692-img-pengaduan.jpg','proses','2021-04-05 09:08:12','2021-04-07 02:02:08'),(9,'2021-04-06','1234567890123456','nmasd','nmsadmsadndsadoiqwd','1617613729-img-pengaduan.jpg','selesai','2021-04-05 09:08:49','2021-04-05 17:39:25'),(10,'2021-04-06','1234567890123456','iiuui','asdadskjkhlk','1617613753-img-pengaduan.jpg','proses','2021-04-05 09:09:13','2021-04-05 18:01:24'),(17,'2021-04-07','1234567890123456','pohon tumbang','asdkjkjsaduiads\r\njkzjcmnca\r\ndasjdoihjlnm,','1617764801-img-pengaduan.jpg','0','2021-04-07 03:06:41','2021-04-07 03:06:41'),(18,'2021-04-07','555','jalan rusak','sadlakdskj\r\nasdkjdasdjkjld','1617765952-img-pengaduan.jpg','proses','2021-04-07 03:25:52','2021-04-07 03:27:16');

#
# Structure for table "petugas"
#

DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `petugas_username_unique` (`username`),
  UNIQUE KEY `petugas_email_unique` (`email`),
  UNIQUE KEY `petugas_telp_unique` (`telp`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "petugas"
#

INSERT INTO `petugas` VALUES (1,'Iqbal Maulana','iqbal','$2y$10$hhAAGs9NRNnaaa0mfx45qePclKxM6mEV.MsY5hAHOPG1ca3/v5ig.','iqbalmaulana162002@gmail.com','081219451912','admin','2021-04-02 07:27:59','2021-04-07 01:09:40'),(2,'Andreeee','andre','$2y$10$OZ4xfngscG/AgIBkUbh3f.DB0dnSZC.xsZZ43KotHaoxENi/BCNCC','andre@gmail.com','222','petugas','2021-04-02 17:39:06','2021-04-02 17:39:06'),(3,'Ario Bakti Nur Akbar','arios','$2y$10$MwA7BRnNWo/kXnjT4.qNxOUP5czeW92THNY2uxFWgxj/DE2MgY5Ra','arios@gmail.com','333','petugas','2021-04-06 07:01:10','2021-04-06 07:01:10');

#
# Structure for table "tanggapan"
#

DROP TABLE IF EXISTS `tanggapan`;
CREATE TABLE `tanggapan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "tanggapan"
#

INSERT INTO `tanggapan` VALUES (1,1,'2021-04-02','sudah selesai ya bang',1,'2021-04-02 19:48:24','2021-04-02 19:59:43'),(4,5,'2021-04-07','sudah selesai yoo',1,'2021-04-05 08:01:07','2021-04-07 03:58:50'),(5,6,'2021-04-05','znmc',2,'2021-04-05 08:37:54','2021-04-05 18:10:58'),(7,9,'2021-04-05','asdasd',2,'2021-04-05 17:36:14','2021-04-05 17:39:25'),(8,10,'2021-04-05','skjdsjkdsa,a \r\n\r\nsadkajsd\r\nasdaksdkj',2,'2021-04-05 17:58:00','2021-04-05 18:01:24'),(9,8,'2021-04-07','yo\r\nyo\r\nyo',1,'2021-04-07 02:02:07','2021-04-07 02:02:07'),(10,18,'2021-04-07','ok',1,'2021-04-07 03:27:16','2021-04-07 03:27:16'),(11,7,'2021-04-07','mantap gak??? hehhehe :D',1,'2021-04-07 15:40:35','2021-04-07 15:40:35');
