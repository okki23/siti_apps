-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: db_siti
-- ------------------------------------------------------
-- Server version	5.7.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `m_barang`
--

DROP TABLE IF EXISTS `m_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_barang` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) DEFAULT NULL,
  `id_kategori` varchar(255) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `qty` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_barang`
--

LOCK TABLES `m_barang` WRITE;
/*!40000 ALTER TABLE `m_barang` DISABLE KEYS */;
INSERT INTO `m_barang` VALUES (1,'Sabun','3','OK','8'),(3,'Kue','2','OK','10');
/*!40000 ALTER TABLE `m_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_jabatan`
--

DROP TABLE IF EXISTS `m_jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_jabatan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_jabatan`
--

LOCK TABLES `m_jabatan` WRITE;
/*!40000 ALTER TABLE `m_jabatan` DISABLE KEYS */;
INSERT INTO `m_jabatan` VALUES (1,'Mandor'),(3,'Kenek');
/*!40000 ALTER TABLE `m_jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_kategori`
--

DROP TABLE IF EXISTS `m_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_kategori` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_kategori`
--

LOCK TABLES `m_kategori` WRITE;
/*!40000 ALTER TABLE `m_kategori` DISABLE KEYS */;
INSERT INTO `m_kategori` VALUES (2,'Padat'),(3,'Cair');
/*!40000 ALTER TABLE `m_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_pegawai`
--

DROP TABLE IF EXISTS `m_pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telp` text,
  `alamat` text,
  `email` varchar(100) DEFAULT NULL,
  `id_jabatan` int(10) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_pegawai`
--

LOCK TABLES `m_pegawai` WRITE;
/*!40000 ALTER TABLE `m_pegawai` DISABLE KEYS */;
INSERT INTO `m_pegawai` VALUES (1,'234324','Okki Setyawan','034234','Bekasi','okkisetyawan@gmail.com',1,NULL),(2,'8923423','Joni','0242349','Buaran','okkisetyawan@gmail.com',3,NULL),(3,'5665','Rudi','932834','Jakarta','rudi@mail.com',1,NULL);
/*!40000 ALTER TABLE `m_pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_sub_kategori`
--

DROP TABLE IF EXISTS `m_sub_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_sub_kategori` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(10) DEFAULT NULL,
  `nama_sub_kategori` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_sub_kategori`
--

LOCK TABLES `m_sub_kategori` WRITE;
/*!40000 ALTER TABLE `m_sub_kategori` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_sub_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_user`
--

DROP TABLE IF EXISTS `m_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_pegawai` varchar(255) DEFAULT NULL,
  `level` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_user`
--

LOCK TABLES `m_user` WRITE;
/*!40000 ALTER TABLE `m_user` DISABLE KEYS */;
INSERT INTO `m_user` VALUES (1,'admin','0cc175b9c0f1b6a831c399e269772661 ','99',1),(2,'rudi','YQ==','3',1),(3,'ruru','YQ==','3',1);
/*!40000 ALTER TABLE `m_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_keluar`
--

DROP TABLE IF EXISTS `t_keluar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_keluar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_barang` int(10) DEFAULT NULL,
  `trans_out` int(10) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `user_insert` int(10) DEFAULT NULL,
  `date_insert` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_keluar`
--

LOCK TABLES `t_keluar` WRITE;
/*!40000 ALTER TABLE `t_keluar` DISABLE KEYS */;
INSERT INTO `t_keluar` VALUES (1,1,5,'ok',3,'2021-09-15 08:50:33');
/*!40000 ALTER TABLE `t_keluar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_masuk`
--

DROP TABLE IF EXISTS `t_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_masuk` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_barang` int(10) DEFAULT NULL,
  `trans_in` int(10) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `user_insert` int(10) DEFAULT NULL,
  `date_insert` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_masuk`
--

LOCK TABLES `t_masuk` WRITE;
/*!40000 ALTER TABLE `t_masuk` DISABLE KEYS */;
INSERT INTO `t_masuk` VALUES (1,1,10,'OK',1,'2021-09-10 15:53:23');
/*!40000 ALTER TABLE `t_masuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_siti'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-15 16:01:24
