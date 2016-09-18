/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.6.24 : Database - db_mithari2016
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_mithari2016` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_mithari2016`;

/*Table structure for table `anggotapolsek` */

DROP TABLE IF EXISTS `anggotapolsek`;

CREATE TABLE `anggotapolsek` (
  `NRP` char(10) NOT NULL,
  `Nama_Anggota` varchar(30) NOT NULL,
  `Alamat` text,
  `no_HP` varchar(16) DEFAULT NULL,
  `Jabatan` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`NRP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `anggotapolsek` */

insert  into `anggotapolsek`(`NRP`,`Nama_Anggota`,`Alamat`,`no_HP`,`Jabatan`) values ('1224234151','Mithari','kemiling','08972258144','BRIPDA'),('160012331','Josri Jonatan ','Jalan Ikan Tongkol, Bandarlampung','089922440001','AIPDA'),('160012332','Manurung Silalahat','Jalan Radin intan no 33A, Bandarlampung','085700001002','AKP'),('160012333','Made Wayan ','Jalan ZA. Pagar Alam no 6, Bandarlampung','082212344321','Komisaris ');

/*Table structure for table `grafikpelayanan` */

DROP TABLE IF EXISTS `grafikpelayanan`;

CREATE TABLE `grafikpelayanan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `SangatPuas` int(11) DEFAULT NULL,
  `Puas` int(11) DEFAULT NULL,
  `kurangpuas` int(11) DEFAULT NULL,
  `tidakpuas` int(11) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `grafikpelayanan` */

insert  into `grafikpelayanan`(`id`,`SangatPuas`,`Puas`,`kurangpuas`,`tidakpuas`,`tanggal`) values (1,1,NULL,NULL,NULL,'2016-09-01 10:50:09'),(2,NULL,1,NULL,NULL,'2016-09-01 12:09:25'),(3,NULL,1,NULL,NULL,'2016-09-01 12:09:27'),(4,NULL,1,NULL,NULL,'2016-09-01 12:09:28'),(5,1,NULL,NULL,NULL,'2016-09-01 12:09:30'),(6,NULL,NULL,NULL,1,'2016-09-01 12:54:29'),(7,NULL,NULL,1,NULL,'2016-09-01 12:54:31'),(8,NULL,NULL,NULL,1,'2016-09-01 12:54:32'),(9,NULL,1,NULL,NULL,'2016-09-01 12:54:34'),(10,1,NULL,NULL,NULL,'2016-09-01 12:54:35'),(11,NULL,NULL,NULL,1,'2016-09-01 13:06:44'),(12,NULL,1,NULL,NULL,'2016-09-01 13:06:47'),(13,NULL,1,NULL,NULL,'2016-09-01 14:45:54'),(14,NULL,1,NULL,NULL,'2016-09-01 14:45:57'),(15,1,NULL,NULL,NULL,'2016-09-01 14:45:58'),(16,NULL,NULL,NULL,1,'2016-09-01 14:46:00'),(17,NULL,NULL,1,NULL,'2016-09-01 14:46:02'),(18,NULL,1,NULL,NULL,'2016-09-06 12:35:56');

/*Table structure for table `masyarakat` */

DROP TABLE IF EXISTS `masyarakat`;

CREATE TABLE `masyarakat` (
  `Nktp` char(16) NOT NULL,
  `Npaspor` char(9) DEFAULT NULL,
  `rsj` char(20) DEFAULT NULL,
  `Nama` varchar(30) DEFAULT NULL,
  `tempat` varchar(20) DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `jenisKelamin` varchar(10) DEFAULT NULL,
  `alamat` text,
  `pekerjaan` varchar(30) DEFAULT NULL,
  `no_hp` varchar(16) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `Kebangsaan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Nktp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `masyarakat` */

insert  into `masyarakat`(`Nktp`,`Npaspor`,`rsj`,`Nama`,`tempat`,`tanggallahir`,`jenisKelamin`,`alamat`,`pekerjaan`,`no_hp`,`agama`,`Kebangsaan`) values ('11121309','-','-','Yogi Perdiansyah, S.Si','Kotabumi','1995-09-19','Laki-Laki','Jalan Terusan Kotabumi, Lampung Utara','Wirausaha','-','Islam','Indonesia'),('12133143','-','-','Nina Siregar, S.T','Bandarlampung','1997-11-17','Perempuan','Jalan Ikan tenggiri no 4, Rajabasa','PNS','-','Kristiani','Indonesia'),('13312115','-','-','Aini Rahmayati, S.kom','Sekuting','1995-11-12','Perempuan','Jalan Cemara no 4, Bandarlampung ','Pegawai','-','Islam','Indonesia'),('13312299','-',NULL,'Mahatir Mohamad','Waykanan','1995-01-21','Laki-Laki','Jalan Pelita2, No 33 A, Bandarlampung','Wirausaha','-','Islam','Indonesia'),('1331229ss','-','jhjss','Mahatir Mohamad','Waykanan','1995-01-21','Laki-Laki','Jalan Pelita2, No 33 A, Bandarlampung','Wirausaha',NULL,NULL,NULL);

/*Table structure for table `pelaporan` */

DROP TABLE IF EXISTS `pelaporan`;

CREATE TABLE `pelaporan` (
  `no_laporan` char(50) NOT NULL,
  `no_pengaduan` char(50) DEFAULT NULL,
  PRIMARY KEY (`no_laporan`),
  KEY `no_pengaduan` (`no_pengaduan`),
  CONSTRAINT `pelaporan_ibfk_1` FOREIGN KEY (`no_pengaduan`) REFERENCES `pengaduan` (`no_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pelaporan` */

insert  into `pelaporan`(`no_laporan`,`no_pengaduan`) values ('LP/001-BI/VII/2016/LPG/POLRESTA BALAM/SEKTOR TKB','TBL/B-1/001/VII/2016/LPG/RESTA BALAM/SEKTOR TKB'),('LP/002-BI/VII/2016/LPG/POLRESTA BALAM/SEKTOR TKB','TBL/B-1/002/VII/2016/LPG/RESTA BALAM/SEKTOR TKB');

/*Table structure for table `pengaduan` */

DROP TABLE IF EXISTS `pengaduan`;

CREATE TABLE `pengaduan` (
  `no_pengaduan` char(50) NOT NULL,
  `Nktp` char(16) DEFAULT NULL,
  `tempat_kejadian` text,
  `apaterjadi` text,
  `terlapor` varchar(20) DEFAULT NULL,
  `saksi` varchar(20) DEFAULT NULL,
  `tindakpidanana` varchar(20) DEFAULT NULL,
  `bukti` text,
  `uraian` text,
  `waktukejadian` text,
  `tanggal` date DEFAULT NULL,
  `hari` char(10) DEFAULT NULL,
  `pukul` char(5) DEFAULT NULL,
  PRIMARY KEY (`no_pengaduan`),
  KEY `Nktp` (`Nktp`),
  CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`Nktp`) REFERENCES `masyarakat` (`Nktp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengaduan` */

insert  into `pengaduan`(`no_pengaduan`,`Nktp`,`tempat_kejadian`,`apaterjadi`,`terlapor`,`saksi`,`tindakpidanana`,`bukti`,`uraian`,`waktukejadian`,`tanggal`,`hari`,`pukul`) values ('TBL/B-1/001/VII/2016/LPG/RESTA BALAM/SEKTOR TKB','13312115','Jalan Lintas Sumatra, Didepan Yayasan Al-Kautsar','Pembegalan','-','-','Pembegalan','-','Pada saat Hari Sabtu tanggal 27 Agustus sekira pukul 03:00 WIB telah terjadi tindakan pembegalan terhadap sepedah motor saya (Pelapor), di Jalan Lintas Sumatra, didepan Yayasan Alkautsar. ciri ciri pembegalan : membawa 2 senjata pistol rakitan dengan dua buah celurit.. berdasarkan hal tersebut saya mengalami beberapa kerugian materil sebesar 10 juta. motor yang dibegar merupakan motor merek yamaha vixion dengan no polisi BE 8129 CF tahun 2013.','Pada saat Hari Sabtu tanggal 27 Agustus sekira pukul 03:00 WIB','2016-08-31','Rabu','05:47'),('TBL/B-1/002/VII/2016/LPG/RESTA BALAM/SEKTOR TKB','13312299','Jalan Za Pagar alam no 6-9, Bandar lampung','Penganiayaan','Ibnu A','Aries Pirnando, Jefr','Penganiayaan','Foto memar hasil penganiayaan','Pada Hari Kamis Tanggal 31 Agustus Sekira Pukul 05:00, di Jalan Za Pagar alam no 6-9, Bandar lampung. terjadi pemukulan yang dilakukan oleh oknum dosen yang bernama Ibnu A. pemukulan ini disaksikan oleh beberapa teman saya. akibat dari kejadian ini saya mengalami kerugian fisik berupa memar-memar dan materi berupa pengeluaran dari tempat kerja saya','Pada Hari Kamis Tanggal 31 Agustus Sekira Pukul 05:00','2016-08-31','Rabu','05:52');

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `id_Pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `NRP` char(10) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id_Pengguna`),
  KEY `pengguna_ibfk_1` (`NRP`),
  CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`NRP`) REFERENCES `anggotapolsek` (`NRP`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `pengguna` */

insert  into `pengguna`(`id_Pengguna`,`NRP`,`username`,`password`,`level`) values (13,NULL,'tes','tes',NULL),(16,NULL,'tes','28b662d883b6d76fd96e4ddc5e9ba780','1'),(17,NULL,'te','569ef72642be0fadd711d6a468d68ee1','1'),(18,NULL,'tes','28b662d883b6d76fd96e4ddc5e9ba780','2'),(19,NULL,'tes','28b662d883b6d76fd96e4ddc5e9ba780','2'),(20,NULL,'ts','4d682ec4eed27c53849758bc13b6e179','1'),(26,'1224234151','Mitha','827ccb0eea8a706c4c34a16891f84e7b','user'),(27,'1224234151','admin','21232f297a57a5a743894a0e4a801fc3','admin');

/*Table structure for table `skck` */

DROP TABLE IF EXISTS `skck`;

CREATE TABLE `skck` (
  `nSKCK` char(47) NOT NULL,
  `Nktp` char(16) DEFAULT NULL,
  `TanggalDikeluarkan` date DEFAULT NULL,
  `Keperluan` text,
  `DiindonesiaSejak` date DEFAULT NULL,
  `DiindonesiaHingga` date DEFAULT NULL,
  `BelakuMulai` date DEFAULT NULL,
  `BelakuSampai` date DEFAULT NULL,
  `NRP` char(10) DEFAULT NULL,
  PRIMARY KEY (`nSKCK`),
  KEY `Nktp` (`Nktp`),
  KEY `NRP` (`NRP`),
  CONSTRAINT `skck_ibfk_2` FOREIGN KEY (`Nktp`) REFERENCES `masyarakat` (`Nktp`),
  CONSTRAINT `skck_ibfk_3` FOREIGN KEY (`NRP`) REFERENCES `anggotapolsek` (`NRP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `skck` */

insert  into `skck`(`nSKCK`,`Nktp`,`TanggalDikeluarkan`,`Keperluan`,`DiindonesiaSejak`,`DiindonesiaHingga`,`BelakuMulai`,`BelakuSampai`,`NRP`) values ('SKCK/YANMAS/001/VII/2016/UNIT INTELKAM','11121309','2016-08-31','Mendafar Pekerjaan','1990-03-01','2025-12-19','2016-08-31','2018-08-31','160012331'),('SKCK/YANMAS/002/VII/2016/UNIT INTELKAM','13312115','2016-08-31','sda','1983-04-02','2028-06-19','2016-08-31','2028-11-17','160012332'),('SKCK/YANMAS/003/IX/2016/UNIT INTELKAM','1331229ss','2016-09-06','jkj','1994-03-03','2028-10-19','2016-09-06','2028-12-19','160012331');

/*Table structure for table `suratjalan` */

DROP TABLE IF EXISTS `suratjalan`;

CREATE TABLE `suratjalan` (
  `noSurat` char(30) NOT NULL,
  `Tanggal` date DEFAULT NULL,
  `Nktp` char(16) DEFAULT NULL,
  `KetIDentitsKendaraan` text,
  `Berlaku` date DEFAULT NULL,
  `Hari` char(10) DEFAULT NULL,
  `pukul` char(4) DEFAULT NULL,
  PRIMARY KEY (`noSurat`),
  KEY `Nktp` (`Nktp`),
  CONSTRAINT `suratjalan_ibfk_1` FOREIGN KEY (`Nktp`) REFERENCES `masyarakat` (`Nktp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `suratjalan` */

insert  into `suratjalan`(`noSurat`,`Tanggal`,`Nktp`,`KetIDentitsKendaraan`,`Berlaku`,`Hari`,`pukul`) values ('SKJ/001/VII/2016/LPG/SEKTA TKB','2016-08-31','12133143','Merek Kendaraan : HINO, CC: 2500, Warna : HIJAU, Nomor Kendaraan : BE 7709E MM','2026-12-18','Rabu','05:4'),('SKJ/002/VII/2016/LPG/SEKTA TKB','2016-08-31','13312299','sa','2028-12-18','Rabu','09:2');

/*Table structure for table `visum` */

DROP TABLE IF EXISTS `visum`;

CREATE TABLE `visum` (
  `no_visum` char(25) NOT NULL,
  `rumahsakit` varchar(30) DEFAULT NULL,
  `alamat` text,
  `tanggal` date DEFAULT NULL,
  `no_laporan` char(50) DEFAULT NULL,
  PRIMARY KEY (`no_visum`),
  KEY `no_laporan` (`no_laporan`),
  CONSTRAINT `visum_ibfk_1` FOREIGN KEY (`no_laporan`) REFERENCES `pelaporan` (`no_laporan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `visum` */

insert  into `visum`(`no_visum`,`rumahsakit`,`alamat`,`tanggal`,`no_laporan`) values ('R/001/VII/2016/RESKRIM','Rumah Sakit Abdul Muluk','Jalan ZA Pagar Alam, Bandarlampung','2016-08-31','LP/002-BI/VII/2016/LPG/POLRESTA BALAM/SEKTOR TKB'),('R/002/VII/2016/RESKRIM','saaaaaaaaaaa','asssssssss','2016-08-31','LP/001-BI/VII/2016/LPG/POLRESTA BALAM/SEKTOR TKB');

/*Table structure for table `v_pengaduan` */

DROP TABLE IF EXISTS `v_pengaduan`;

/*!50001 DROP VIEW IF EXISTS `v_pengaduan` */;
/*!50001 DROP TABLE IF EXISTS `v_pengaduan` */;

/*!50001 CREATE TABLE  `v_pengaduan`(
 `no_pengaduan` char(50) ,
 `Nktp` char(16) ,
 `tempat_kejadian` text ,
 `apaterjadi` text ,
 `terlapor` varchar(20) ,
 `saksi` varchar(20) ,
 `tindakpidanana` varchar(20) ,
 `bukti` text ,
 `uraian` text ,
 `waktukejadian` text ,
 `tanggalpengaduan` date ,
 `hari` char(10) ,
 `jam` char(5) ,
 `no_laporan` char(50) ,
 `Npaspor` char(9) ,
 `rsj` char(20) ,
 `Nama` varchar(30) ,
 `tempat` varchar(20) ,
 `tanggal` int(2) ,
 `tahun` int(4) ,
 `bulan` int(2) ,
 `jenisKelamin` varchar(10) ,
 `alamat` text ,
 `pekerjaan` varchar(30) ,
 `no_hp` varchar(16) ,
 `Kebangsaan` varchar(20) ,
 `agama` varchar(10) 
)*/;

/*Table structure for table `v_pengguna` */

DROP TABLE IF EXISTS `v_pengguna`;

/*!50001 DROP VIEW IF EXISTS `v_pengguna` */;
/*!50001 DROP TABLE IF EXISTS `v_pengguna` */;

/*!50001 CREATE TABLE  `v_pengguna`(
 `id_Pengguna` int(11) ,
 `username` varchar(100) ,
 `password` varchar(100) ,
 `level` varchar(11) ,
 `Nama_Anggota` varchar(30) ,
 `nrp` char(10) 
)*/;

/*Table structure for table `v_skck` */

DROP TABLE IF EXISTS `v_skck`;

/*!50001 DROP VIEW IF EXISTS `v_skck` */;
/*!50001 DROP TABLE IF EXISTS `v_skck` */;

/*!50001 CREATE TABLE  `v_skck`(
 `nSKCK` char(47) ,
 `TanggalDikeluarkan` date ,
 `keperluan` text ,
 `BelakuMulai` date ,
 `BelakuSampai` date ,
 `Nktp` char(16) ,
 `Nama` varchar(30) ,
 `alamat` text ,
 `jenisKelamin` varchar(10) ,
 `no_hp` varchar(16) ,
 `Npaspor` char(9) ,
 `pekerjaan` varchar(30) ,
 `rsj` char(20) ,
 `tanggallahir` date ,
 `tempat` varchar(20) ,
 `NRP` char(10) ,
 `Nama_Anggota` varchar(30) ,
 `Jabatan` varchar(10) 
)*/;

/*Table structure for table `v_suratjalan` */

DROP TABLE IF EXISTS `v_suratjalan`;

/*!50001 DROP VIEW IF EXISTS `v_suratjalan` */;
/*!50001 DROP TABLE IF EXISTS `v_suratjalan` */;

/*!50001 CREATE TABLE  `v_suratjalan`(
 `noSurat` char(30) ,
 `tanggal` date ,
 `Hari` char(10) ,
 `pukul` char(4) ,
 `KetIDentitsKendaraan` text ,
 `Berlaku` date ,
 `Nktp` char(16) ,
 `alamat` text ,
 `jenisKelamin` varchar(10) ,
 `Nama` varchar(30) ,
 `no_hp` varchar(16) ,
 `Npaspor` char(9) ,
 `pekerjaan` varchar(30) ,
 `rsj` char(20) ,
 `tanggallahir` date ,
 `tempat` varchar(20) 
)*/;

/*Table structure for table `v_visum` */

DROP TABLE IF EXISTS `v_visum`;

/*!50001 DROP VIEW IF EXISTS `v_visum` */;
/*!50001 DROP TABLE IF EXISTS `v_visum` */;

/*!50001 CREATE TABLE  `v_visum`(
 `no_visum` char(25) ,
 `rumahsakit` varchar(30) ,
 `alamat` text ,
 `tanggal` date ,
 `no_laporan` char(50) ,
 `no_pengaduan` char(50) ,
 `Nktp` char(16) ,
 `tindakpidanana` varchar(20) ,
 `tanggalpengaduan` date ,
 `hari` char(10) ,
 `jam` char(5) ,
 `Nama` varchar(30) ,
 `tempat` varchar(20) ,
 `tanggallahir` date ,
 `jenisKelamin` varchar(10) ,
 `alamat1` text ,
 `pekerjaan` varchar(30) ,
 `agama` varchar(10) 
)*/;

/*View structure for view v_pengaduan */

/*!50001 DROP TABLE IF EXISTS `v_pengaduan` */;
/*!50001 DROP VIEW IF EXISTS `v_pengaduan` */;

/*!50001 CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pengaduan` AS (select `pengaduan`.`no_pengaduan` AS `no_pengaduan`,`pengaduan`.`Nktp` AS `Nktp`,`pengaduan`.`tempat_kejadian` AS `tempat_kejadian`,`pengaduan`.`apaterjadi` AS `apaterjadi`,`pengaduan`.`terlapor` AS `terlapor`,`pengaduan`.`saksi` AS `saksi`,`pengaduan`.`tindakpidanana` AS `tindakpidanana`,`pengaduan`.`bukti` AS `bukti`,`pengaduan`.`uraian` AS `uraian`,`pengaduan`.`waktukejadian` AS `waktukejadian`,`pengaduan`.`tanggal` AS `tanggalpengaduan`,`pengaduan`.`hari` AS `hari`,`pengaduan`.`pukul` AS `jam`,`pelaporan`.`no_laporan` AS `no_laporan`,`masyarakat`.`Npaspor` AS `Npaspor`,`masyarakat`.`rsj` AS `rsj`,`masyarakat`.`Nama` AS `Nama`,`masyarakat`.`tempat` AS `tempat`,dayofmonth(`masyarakat`.`tanggallahir`) AS `tanggal`,year(`masyarakat`.`tanggallahir`) AS `tahun`,month(`masyarakat`.`tanggallahir`) AS `bulan`,`masyarakat`.`jenisKelamin` AS `jenisKelamin`,`masyarakat`.`alamat` AS `alamat`,`masyarakat`.`pekerjaan` AS `pekerjaan`,`masyarakat`.`no_hp` AS `no_hp`,`masyarakat`.`Kebangsaan` AS `Kebangsaan`,`masyarakat`.`agama` AS `agama` from ((`masyarakat` join `pengaduan` on((`pengaduan`.`Nktp` = `masyarakat`.`Nktp`))) join `pelaporan` on((`pelaporan`.`no_pengaduan` = `pengaduan`.`no_pengaduan`)))) */;

/*View structure for view v_pengguna */

/*!50001 DROP TABLE IF EXISTS `v_pengguna` */;
/*!50001 DROP VIEW IF EXISTS `v_pengguna` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pengguna` AS (select `pengguna`.`id_Pengguna` AS `id_Pengguna`,`pengguna`.`username` AS `username`,`pengguna`.`password` AS `password`,`pengguna`.`level` AS `level`,`anggotapolsek`.`Nama_Anggota` AS `Nama_Anggota`,`pengguna`.`NRP` AS `nrp` from (`anggotapolsek` join `pengguna` on((`pengguna`.`NRP` = `anggotapolsek`.`NRP`)))) */;

/*View structure for view v_skck */

/*!50001 DROP TABLE IF EXISTS `v_skck` */;
/*!50001 DROP VIEW IF EXISTS `v_skck` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_skck` AS (select `skck`.`nSKCK` AS `nSKCK`,`skck`.`TanggalDikeluarkan` AS `TanggalDikeluarkan`,`skck`.`Keperluan` AS `keperluan`,`skck`.`BelakuMulai` AS `BelakuMulai`,`skck`.`BelakuSampai` AS `BelakuSampai`,`masyarakat`.`Nktp` AS `Nktp`,`masyarakat`.`Nama` AS `Nama`,`masyarakat`.`alamat` AS `alamat`,`masyarakat`.`jenisKelamin` AS `jenisKelamin`,`masyarakat`.`no_hp` AS `no_hp`,`masyarakat`.`Npaspor` AS `Npaspor`,`masyarakat`.`pekerjaan` AS `pekerjaan`,`masyarakat`.`rsj` AS `rsj`,`masyarakat`.`tanggallahir` AS `tanggallahir`,`masyarakat`.`tempat` AS `tempat`,`anggotapolsek`.`NRP` AS `NRP`,`anggotapolsek`.`Nama_Anggota` AS `Nama_Anggota`,`anggotapolsek`.`Jabatan` AS `Jabatan` from ((`skck` join `masyarakat` on((`skck`.`Nktp` = `masyarakat`.`Nktp`))) join `anggotapolsek` on((`skck`.`NRP` = `anggotapolsek`.`NRP`)))) */;

/*View structure for view v_suratjalan */

/*!50001 DROP TABLE IF EXISTS `v_suratjalan` */;
/*!50001 DROP VIEW IF EXISTS `v_suratjalan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_suratjalan` AS (select `suratjalan`.`noSurat` AS `noSurat`,`suratjalan`.`Tanggal` AS `tanggal`,`suratjalan`.`Hari` AS `Hari`,`suratjalan`.`pukul` AS `pukul`,`suratjalan`.`KetIDentitsKendaraan` AS `KetIDentitsKendaraan`,`suratjalan`.`Berlaku` AS `Berlaku`,`masyarakat`.`Nktp` AS `Nktp`,`masyarakat`.`alamat` AS `alamat`,`masyarakat`.`jenisKelamin` AS `jenisKelamin`,`masyarakat`.`Nama` AS `Nama`,`masyarakat`.`no_hp` AS `no_hp`,`masyarakat`.`Npaspor` AS `Npaspor`,`masyarakat`.`pekerjaan` AS `pekerjaan`,`masyarakat`.`rsj` AS `rsj`,`masyarakat`.`tanggallahir` AS `tanggallahir`,`masyarakat`.`tempat` AS `tempat` from (`suratjalan` join `masyarakat` on((`suratjalan`.`Nktp` = `masyarakat`.`Nktp`)))) */;

/*View structure for view v_visum */

/*!50001 DROP TABLE IF EXISTS `v_visum` */;
/*!50001 DROP VIEW IF EXISTS `v_visum` */;

/*!50001 CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_visum` AS (select `visum`.`no_visum` AS `no_visum`,`visum`.`rumahsakit` AS `rumahsakit`,`visum`.`alamat` AS `alamat`,`visum`.`tanggal` AS `tanggal`,`visum`.`no_laporan` AS `no_laporan`,`pengaduan`.`no_pengaduan` AS `no_pengaduan`,`pengaduan`.`Nktp` AS `Nktp`,`pengaduan`.`tindakpidanana` AS `tindakpidanana`,`pengaduan`.`tanggal` AS `tanggalpengaduan`,`pengaduan`.`hari` AS `hari`,`pengaduan`.`pukul` AS `jam`,`masyarakat`.`Nama` AS `Nama`,`masyarakat`.`tempat` AS `tempat`,`masyarakat`.`tanggallahir` AS `tanggallahir`,`masyarakat`.`jenisKelamin` AS `jenisKelamin`,`masyarakat`.`alamat` AS `alamat1`,`masyarakat`.`pekerjaan` AS `pekerjaan`,`masyarakat`.`agama` AS `agama` from (((`masyarakat` join `pengaduan` on((`pengaduan`.`Nktp` = `masyarakat`.`Nktp`))) join `pelaporan` on((`pelaporan`.`no_pengaduan` = `pengaduan`.`no_pengaduan`))) join `visum` on((`visum`.`no_laporan` = `pelaporan`.`no_laporan`)))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
