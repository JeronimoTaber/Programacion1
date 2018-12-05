-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: transporte
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.16.04.1

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
-- Table structure for table `auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditoria` (
  `auditoria_id` int(4) NOT NULL AUTO_INCREMENT,
  `fecha_acceso` date DEFAULT NULL,
  `user` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `response_time` float NOT NULL DEFAULT '0' COMMENT 'tiempo en milisegundos',
  `endpoint` varchar(150) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`auditoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria`
--

LOCK TABLES `auditoria` WRITE;
/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
INSERT INTO `auditoria` VALUES (1,'2018-12-04','per',0.067575,'localhost/programacion1/trabajofinal/sistema_transporte/select.php/POST','2018-12-04 23:39:16'),(2,'2018-12-04','per',0.0585411,'localhost/programacion1/trabajofinal/sistema_transporte/select.php/POST','2018-12-04 23:39:34'),(3,'2018-12-04','per',0.060565,'localhost/programacion1/trabajofinal/sistema_transporte/select.php/POST','2018-12-04 23:39:42'),(4,'2018-12-04','per',0.0539911,'localhost/programacion1/trabajofinal/sistema_transporte/select.php/POST','2018-12-04 23:39:52'),(5,'2018-12-04','per',0.0604699,'localhost/programacion1/trabajofinal/sistema_transporte/select.php/POST','2018-12-04 23:40:10'),(6,'2018-12-04','Invalid_user',0.000460863,'localhost/programacion1/trabajofinal/vehiculo/select.php/PUT','2018-12-04 23:40:31'),(7,'2018-12-04','per',0.067636,'localhost/programacion1/trabajofinal/vehiculo/select.php/PUT','2018-12-04 23:40:38'),(8,'2018-12-04','per',0.22246,'localhost/programacion1/trabajofinal/vehiculo/select.php/POST','2018-12-04 23:40:53'),(9,'2018-12-04','per',0.345973,'localhost/programacion1/trabajofinal/vehiculo/select.php/POST','2018-12-04 23:41:28'),(10,'2018-12-04','per',0.0581481,'localhost/programacion1/trabajofinal/vehiculo/select.php/POST','2018-12-04 23:42:00'),(11,'2018-12-04','Invalid_user',0.000617027,'localhost/programacion1/trabajofinal/chofer/select.php/POST','2018-12-04 23:42:31'),(12,'2018-12-04','per',0.060101,'localhost/programacion1/trabajofinal/chofer/select.php/POST','2018-12-04 23:42:38'),(13,'2018-12-04','per',0.129638,'localhost/programacion1/trabajofinal/chofer/select.php/POST','2018-12-04 23:42:59'),(14,'2018-12-04','per',0.183205,'localhost/programacion1/trabajofinal/chofer/select.php/POST','2018-12-04 23:43:25'),(15,'2018-12-04','per',0.00137115,'localhost/programacion1/trabajofinal/chofer/select.php/POST','2018-12-04 23:45:26'),(16,'2018-12-04','per',0.046397,'localhost/programacion1/trabajofinal/chofer/select.php/POST','2018-12-04 23:45:33'),(17,'2018-12-04','per',0.056891,'localhost/programacion1/trabajofinal/vehiculo/select.php/POST','2018-12-04 23:51:23'),(18,'2018-12-04','per',0.0517039,'localhost/programacion1/trabajofinal/vehiculo/select.php/POST','2018-12-04 23:52:22'),(19,'2018-12-04','per',0.0815861,'localhost/programacion1/trabajofinal/vehiculo/select.php/PUT','2018-12-04 23:52:31'),(20,'2018-12-04','per',0.0625579,'localhost/programacion1/trabajofinal/vehiculo/select.php/PUT','2018-12-04 23:52:42'),(21,'2018-12-04','per',0.2067,'localhost/programacion1/trabajofinal/vehiculo/select.php/PUT','2018-12-04 23:52:52'),(22,'2018-12-04','per',0.190124,'localhost/programacion1/trabajofinal/vehiculo/select.php/PUT','2018-12-04 23:53:06'),(23,'2018-12-04','per',0.00141096,'localhost/programacion1/trabajofinal/chofer/select.php/PUT','2018-12-04 23:53:16'),(24,'2018-12-04','per',0.00131297,'localhost/programacion1/trabajofinal/chofer/select.php/PUT','2018-12-04 23:53:23');
/*!40000 ALTER TABLE `auditoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chofer`
--

DROP TABLE IF EXISTS `chofer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chofer` (
  `chofer_id` int(4) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `documento` decimal(11,0) NOT NULL DEFAULT '0',
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `vehiculo_id` int(4) DEFAULT NULL,
  `sistema_id` int(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chofer_id`),
  UNIQUE KEY `documento` (`documento`),
  KEY `vehiculo_id` (`vehiculo_id`),
  KEY `sistema_id` (`sistema_id`),
  CONSTRAINT `chofer_ibfk_1` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculo` (`vehiculo_id`),
  CONSTRAINT `chofer_ibfk_2` FOREIGN KEY (`sistema_id`) REFERENCES `sistema_transporte` (`sistema_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chofer`
--

LOCK TABLES `chofer` WRITE;
/*!40000 ALTER TABLE `chofer` DISABLE KEYS */;
INSERT INTO `chofer` VALUES (1,'Videau','David',26907032,'davis@gmail.com',1,1,'2018-12-04 20:42:38','2018-12-04 23:42:38'),(2,'Taber','Jeronimo',39380965,'jerotaber@gmail.com',1,2,'2018-12-04 20:42:59','2018-12-04 23:42:59'),(3,'Isaguirre','Fernando',39372681,'fernando@gmail.com',2,2,'2018-12-04 20:43:25','2018-12-04 23:43:25'),(4,'Soria','Andres',40374294,'fandres@gmail.com',3,1,'2018-12-04 20:45:33','2018-12-04 23:45:33');
/*!40000 ALTER TABLE `chofer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sistema_transporte`
--

DROP TABLE IF EXISTS `sistema_transporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sistema_transporte` (
  `sistema_id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `pais_procedencia` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sistema_id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sistema_transporte`
--

LOCK TABLES `sistema_transporte` WRITE;
/*!40000 ALTER TABLE `sistema_transporte` DISABLE KEYS */;
INSERT INTO `sistema_transporte` VALUES (1,'uber','eeuu','2018-12-04 20:39:16','2018-12-04 23:39:16'),(2,'taxi','argentina','2018-12-04 20:39:34','2018-12-04 23:39:34'),(3,'cabifi','españa','2018-12-04 20:39:42','2018-12-04 23:39:42'),(4,'uber pool','eeuu','2018-12-04 20:39:52','2018-12-04 23:39:52'),(5,'remis','argentina','2018-12-04 20:40:10','2018-12-04 23:40:10');
/*!40000 ALTER TABLE `sistema_transporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sistema_vehiculo`
--

DROP TABLE IF EXISTS `sistema_vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sistema_vehiculo` (
  `sistemavehiculo_id` int(4) NOT NULL AUTO_INCREMENT,
  `vehiculo_id` int(4) DEFAULT NULL,
  `sistema_id` int(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sistemavehiculo_id`),
  UNIQUE KEY `vehiculo_id` (`vehiculo_id`,`sistema_id`),
  KEY `sistema_id` (`sistema_id`),
  CONSTRAINT `sistema_vehiculo_ibfk_1` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculo` (`vehiculo_id`),
  CONSTRAINT `sistema_vehiculo_ibfk_2` FOREIGN KEY (`sistema_id`) REFERENCES `sistema_transporte` (`sistema_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sistema_vehiculo`
--

LOCK TABLES `sistema_vehiculo` WRITE;
/*!40000 ALTER TABLE `sistema_vehiculo` DISABLE KEYS */;
INSERT INTO `sistema_vehiculo` VALUES (5,1,1,'2018-12-04 20:40:53','2018-12-04 23:40:53'),(6,1,2,'2018-12-04 20:40:53','2018-12-04 23:40:53'),(7,1,3,'2018-12-04 20:40:53','2018-12-04 23:40:53'),(8,1,4,'2018-12-04 20:40:53','2018-12-04 23:40:53'),(9,2,1,'2018-12-04 20:41:28','2018-12-04 23:41:28'),(10,2,2,'2018-12-04 20:41:28','2018-12-04 23:41:28'),(11,2,4,'2018-12-04 20:41:28','2018-12-04 23:41:28'),(12,3,1,'2018-12-04 20:42:00','2018-12-04 23:42:00');
/*!40000 ALTER TABLE `sistema_vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(4) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'user',
  `username` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'user','jeronimo','$2y$10$dKn6pEJOMJ6mZmXu6W5HTO1EUuEauo2oQmq.s11thQy8IYGEG5EJ2','2018-11-25 17:15:31','2018-11-25 20:15:31'),(3,'admin','jeroxo','$2y$10$jlXag9S9ZzKuSQyU1kxcMuZ5zPgtjLsjKIe4SMhzYjzJ3VrWp058.','2018-11-26 18:04:10','2018-12-02 19:42:08'),(4,'user','david','$2y$10$BP9QcX9p686pCDItMLzWhe.fYJOq8AMAYWMg8uIZ0VtgmTvnm3FM2','2018-11-29 17:16:41','2018-11-29 20:16:41'),(5,'user','jero','$2y$10$cdRF6IOhbUzSg3xvfyVc3OkTEsY9SqfobYYlgFCBBqHRq7dCgu.sy','2018-12-01 21:06:40','2018-12-01 23:06:40'),(6,'user','fernando','$2y$10$qWiOsX9sLyrWMiLyIbAuiOFulrsj2J265ZavSbxTPMgdpuBIYWAT2','2018-12-01 21:08:03','2018-12-01 23:08:03'),(7,'user','andres','$2y$10$Uw7XEfszXklc1Zip6qGBLuhC3IujSa07TDsAGEIRd/Tpyeme1fvOO','2018-12-01 21:09:34','2018-12-01 23:09:34'),(9,'user','jaja','$2y$10$C/07xpcQN5plw3RHR9VSr.QQ1uXFUjSHokvKmNzvwV9jZpDqY6nEq','2018-12-01 21:13:16','2018-12-01 23:13:16'),(10,'user','jeje','$2y$10$ga5O3ls.8Slz9VosseJwa..WjzR.5xWrGSz05wEf8n3Gsk0HxUCGK','2018-12-01 21:13:40','2018-12-01 23:13:40'),(11,'user','sasa','$2y$10$tdEqM6iXw46Sga9BoK2GGOvuzOe9CiaxDQOdsOCbHOZpKkMdfdR7C','2018-12-01 21:13:59','2018-12-01 23:13:59'),(12,'admin','nombre','$2y$10$PTLV7Ur0uacbx5Q//1o1xu22dNYJNDT6/lVsxM58hhBexCtGQAZF6','2018-12-01 21:14:31','2018-12-02 19:42:30'),(13,'user','jerox','$2y$10$qEO/owozPhbtjaLG0iLSAuV7CnAiyT3Gsixg.Uth9KlKd1s5wN.eG','2018-12-01 21:14:47','2018-12-01 23:14:47'),(14,'user','pe','$2y$10$Y.i2fQnSc2R6gxYdaX0.SefCcoggqoS5pWu/I86jw2wF4rrWRNci6','2018-12-01 21:17:55','2018-12-01 23:17:55'),(15,'user','lala','$2y$10$TsfGwdIzsd/IfYfPoAI3oOlGMw/4rS08rr/ra0JZo2jZvSbPssNYC','2018-12-01 21:19:50','2018-12-01 23:19:50'),(24,'admin','ferchu','$2y$10$QfERikD.IC.Q5iheq0zDier5gzNqZti9Wzpdy3wtYc0s/HwiXgzYi','2018-12-02 17:27:40','2018-12-02 19:27:40'),(26,'user','sd','$2y$10$0Pgm2.py0cw5NfsrtfFYHejvPcR4CfLf7zx2MdF6VZRypfF4Ax/1C','2018-12-02 17:39:34','2018-12-02 19:39:34'),(31,'admin','per','$2y$10$d4iW2VWMW7IbNrm0yziELehQnJYg4zg6kRCVW2SG/duNqBd3YUdxy','2018-12-03 16:22:14','2018-12-03 18:22:14'),(32,'admin','rogelio','$2y$10$ftNQEEL3bgHKlVitICY67eysfXGBezy6V2EGB2TReveRmM1I2Cx16','2018-12-03 20:54:59','2018-12-03 22:54:59'),(33,'admin','malena','$2y$10$vhERBMB5ToY.JN.QHTWYYuck/YmYJCR0/v9bBi6cYTVl.Yk7R3TeC','2018-12-03 20:59:54','2018-12-03 23:02:19');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculo` (
  `vehiculo_id` int(4) NOT NULL AUTO_INCREMENT,
  `patente` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `anho_patente` smallint(2) NOT NULL DEFAULT '0',
  `anho_fabricacion` smallint(2) NOT NULL DEFAULT '0',
  `marca` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `modelo` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`vehiculo_id`),
  UNIQUE KEY `patente` (`patente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES (1,'LEZ236',2010,1999,'BMW','x5','2018-12-04 20:40:53','2018-12-04 23:40:53'),(2,'ARG264',2004,2000,'BMW','x5','2018-12-04 20:41:28','2018-12-04 23:41:28'),(3,'ARS264',2010,1999,'BMW','x5','2018-12-04 20:42:00','2018-12-04 23:52:52');
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-04 21:00:56
