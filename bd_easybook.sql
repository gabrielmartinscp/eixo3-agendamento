-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_easybook
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `atendimentos`
--

DROP TABLE IF EXISTS `atendimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atendimentos` (
  `idatendimentos` int NOT NULL AUTO_INCREMENT,
  `idhorario` int NOT NULL,
  `idcliente` int NOT NULL,
  `estado` enum('solicitado','confirmado','realizado','cancelado') NOT NULL DEFAULT 'solicitado',
  `deletado` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`idatendimentos`),
  KEY `idhorario_idx` (`idhorario`),
  KEY `idcliente_idx` (`idcliente`),
  CONSTRAINT `idcliente` FOREIGN KEY (`idcliente`) REFERENCES `usuarios` (`idusuarios`),
  CONSTRAINT `idhorario` FOREIGN KEY (`idhorario`) REFERENCES `horarios` (`idhorarios`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendimentos`
--

LOCK TABLES `atendimentos` WRITE;
/*!40000 ALTER TABLE `atendimentos` DISABLE KEYS */;
INSERT INTO `atendimentos` VALUES (4,4,1,'solicitado',0);
/*!40000 ALTER TABLE `atendimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliacoes`
--

DROP TABLE IF EXISTS `avaliacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avaliacoes` (
  `idavaliacoes` int NOT NULL,
  `idatendimento` int NOT NULL,
  `estrelas` enum('1','2','3','4','5') NOT NULL,
  `texto` text,
  `deletado` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`idavaliacoes`),
  KEY `idatendimento_idx` (`idatendimento`),
  CONSTRAINT `idatendimento` FOREIGN KEY (`idatendimento`) REFERENCES `atendimentos` (`idatendimentos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacoes`
--

LOCK TABLES `avaliacoes` WRITE;
/*!40000 ALTER TABLE `avaliacoes` DISABLE KEYS */;
INSERT INTO `avaliacoes` VALUES (0,4,'5','teste abc',0);
/*!40000 ALTER TABLE `avaliacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horarios` (
  `idhorarios` int NOT NULL AUTO_INCREMENT,
  `duracao_em_minutos` int NOT NULL,
  `data` date NOT NULL,
  `ordem_no_dia` int NOT NULL,
  `limite_de_clientes` int NOT NULL DEFAULT '1',
  `idprestador` int NOT NULL,
  `horario_inicial` varchar(5) DEFAULT NULL,
  `deletado` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`idhorarios`),
  KEY `idprestador_idx` (`idprestador`),
  CONSTRAINT `idprestador` FOREIGN KEY (`idprestador`) REFERENCES `prestadores` (`idprestadores`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
INSERT INTO `horarios` VALUES (4,15,'2023-10-10',1,1,1,'08:33',0);
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestadores`
--

DROP TABLE IF EXISTS `prestadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prestadores` (
  `idprestadores` int NOT NULL AUTO_INCREMENT,
  `foto_de_capa` tinytext,
  `foto_01` tinytext,
  `foto_02` tinytext,
  `foto_03` tinytext,
  `foto_04` tinytext,
  `foto_05` tinytext,
  `descricao` text,
  `aceita_avaliacoes` enum('sim','não') NOT NULL DEFAULT 'sim',
  `idusuarios` int NOT NULL,
  `deletado` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`idprestadores`),
  UNIQUE KEY `idusuarios_UNIQUE` (`idusuarios`),
  CONSTRAINT `usuario` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestadores`
--

LOCK TABLES `prestadores` WRITE;
/*!40000 ALTER TABLE `prestadores` DISABLE KEYS */;
INSERT INTO `prestadores` VALUES (1,'teste','teste','teste','teste','teste','teste','teste','sim',1,0);
/*!40000 ALTER TABLE `prestadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idusuarios` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `tipo` enum('prestador','cliente') DEFAULT NULL,
  `foto_perfil` tinytext,
  `deletado` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'teste','teste','teste','cliente','teste',0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-09 18:43:21
