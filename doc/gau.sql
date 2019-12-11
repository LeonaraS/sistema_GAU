-- MySQL dump 10.13  Distrib 5.7.26, for Win64 (x86_64)
--
-- Host: localhost    Database: gau
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Table structure for table `areaverde`
--

DROP TABLE IF EXISTS `areaverde`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areaverde` (
  `idareaverde` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_areaverde_idtipo_areaverde` int(10) unsigned NOT NULL,
  `funcionario_idfuncionario` int(10) unsigned NOT NULL,
  `area` float NOT NULL,
  PRIMARY KEY (`idareaverde`),
  KEY `areaverde_FKIndex1` (`funcionario_idfuncionario`),
  KEY `areaverde_FKIndex2` (`tipo_areaverde_idtipo_areaverde`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areaverde`
--

LOCK TABLES `areaverde` WRITE;
/*!40000 ALTER TABLE `areaverde` DISABLE KEYS */;
INSERT INTO `areaverde` VALUES (1,1,1,50),(3,3,2,35),(4,3,2,35),(5,2,2,99),(9,2,1,150.18);
/*!40000 ALTER TABLE `areaverde` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arvore`
--

DROP TABLE IF EXISTS `arvore`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arvore` (
  `idarvore` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `areaverde_idareaverde` int(10) unsigned NOT NULL,
  `funcionario_idfuncionario` int(10) unsigned NOT NULL,
  `matriz` char(1) NOT NULL,
  `altura` float NOT NULL,
  `largura` float NOT NULL,
  `data_poda` date NOT NULL,
  `eliminacao` char(1) NOT NULL,
  `fitossanidade` text NOT NULL,
  `observacao` text,
  PRIMARY KEY (`idarvore`),
  KEY `arvore_FKIndex1` (`funcionario_idfuncionario`),
  KEY `arvore_FKIndex2` (`areaverde_idareaverde`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arvore`
--

LOCK TABLES `arvore` WRITE;
/*!40000 ALTER TABLE `arvore` DISABLE KEYS */;
INSERT INTO `arvore` VALUES (1,1,1,'n',5,5,'2012-12-01','n','boas condições','data proxima poda em 20/12/2020'),(2,1,2,'n',9.9,6.6,'2001-12-01','n','nada consta','nada consta'),(3,2,3,'s',20.01,12.5,'2018-02-01','n','nada consta','nada consta'),(4,1,1,'n',6.39,12.98,'2000-12-10','n',' hauhau','teste');
/*!40000 ALTER TABLE `arvore` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bairro`
--

DROP TABLE IF EXISTS `bairro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bairro` (
  `idbairro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `populacao` int(10) unsigned NOT NULL,
  `zona` varchar(10) NOT NULL,
  PRIMARY KEY (`idbairro`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bairro`
--

LOCK TABLES `bairro` WRITE;
/*!40000 ALTER TABLE `bairro` DISABLE KEYS */;
INSERT INTO `bairro` VALUES (1,'Brasil Novo',5600,'Norte'),(2,'Novo Buritizal',8941,'Sul');
/*!40000 ALTER TABLE `bairro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `botanica`
--

DROP TABLE IF EXISTS `botanica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `botanica` (
  `idbotanica` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `arvore_idarvore` int(10) unsigned NOT NULL,
  `muda_idmuda` int(10) unsigned NOT NULL,
  `nome_popular` varchar(20) NOT NULL,
  `nome_cientifico` varchar(30) NOT NULL,
  `nativa` char(1) NOT NULL,
  `frutifera` char(1) NOT NULL,
  `exotica` char(1) NOT NULL,
  PRIMARY KEY (`idbotanica`),
  KEY `botanica_FKIndex1` (`muda_idmuda`),
  KEY `botanica_FKIndex2` (`arvore_idarvore`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `botanica`
--

LOCK TABLES `botanica` WRITE;
/*!40000 ALTER TABLE `botanica` DISABLE KEYS */;
INSERT INTO `botanica` VALUES (1,1,1,'Coqueiro','real palmiris','s','s','s');
/*!40000 ALTER TABLE `botanica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `idcargo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`idcargo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Engen. Florestal'),(2,'teste');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidadao`
--

DROP TABLE IF EXISTS `cidadao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidadao` (
  `idcidadao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `cpf_cnpj` varchar(14) NOT NULL,
  `rg` varchar(10) NOT NULL,
  `fone_fixo` varchar(10) NOT NULL,
  `celular` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(40) NOT NULL,
  PRIMARY KEY (`idcidadao`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidadao`
--

LOCK TABLES `cidadao` WRITE;
/*!40000 ALTER TABLE `cidadao` DISABLE KEYS */;
INSERT INTO `cidadao` VALUES (1,'Lucas de Sousa','01589632044','1526ap','32591048','991586300','lsousa@gmail.com','e7d80ffeefa212b7c5c55700e4f7193e'),(3,'Juvenal Juvêncio','63289577401','15698ap','34108977','987560156','juvencio@hotmail.com','e7d80ffeefa212b7c5c55700e4f7193e'),(10,'Luis André Oliveira','01263204510','895060ap','35209633','987456325','lu_oliveira@meta.edu,br','e7d80ffeefa212b7c5c55700e4f7193e'),(5,'Luan Norton Banks','80456201299','9850ap','32258977','991048879','banksluan@live.com','e7d80ffeefa212b7c5c55700e4f7193e'),(6,'Cláudia Castro Alves','63298956322','7890ap','34159877','991478966','alvesclaudia@live.com','e7d80ffeefa212b7c5c55700e4f7193e'),(9,'Luis André Oliveira','01263204510','895060ap','35209633','987456325','lu_oliveira@meta.edu,br','e7d80ffeefa212b7c5c55700e4f7193e'),(8,'Antonio André Oliveira','33344455588','99400ap','44550233','991156699','tonho_oliveira@gmail.com','c370daca2aebfc52cb1cfa6ccb7df526');
/*!40000 ALTER TABLE `cidadao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `idendereco` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `servico_idservico` int(10) unsigned NOT NULL,
  `bairro_idbairro` int(10) unsigned NOT NULL,
  `infracao_idinfracao` int(10) unsigned NOT NULL,
  `areaverde_idareaverde` int(10) unsigned NOT NULL,
  `cidadao_idcidadao` int(10) unsigned NOT NULL,
  `CEP` int(11) DEFAULT NULL,
  `logradouro` varchar(50) NOT NULL,
  `numero` smallint(5) unsigned NOT NULL,
  `ponto_referencia` varchar(40) NOT NULL,
  PRIMARY KEY (`idendereco`),
  KEY `endereco_FKIndex1` (`cidadao_idcidadao`),
  KEY `endereco_FKIndex2` (`areaverde_idareaverde`),
  KEY `endereco_FKIndex3` (`infracao_idinfracao`),
  KEY `endereco_FKIndex4` (`bairro_idbairro`),
  KEY `endereco_FKIndex5` (`servico_idservico`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,2,1,1,1,1,68901335,'Avenida Professora Cora de Carvalho',2445,'Praça Nossa Sra de Fátima');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario` (
  `idfuncionario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cargo_idcargo` int(10) unsigned NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cpf` char(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `data_nascto` date NOT NULL,
  PRIMARY KEY (`idfuncionario`),
  KEY `funcionario_FKIndex1` (`cargo_idcargo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (1,1,'Cláudio Marquezini Chagas','63209911410','marq_claudio@gmail.com','senha123','2000-12-10');
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infracao`
--

DROP TABLE IF EXISTS `infracao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infracao` (
  `idinfracao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `funcionario_idfuncionario` int(10) unsigned NOT NULL,
  `nome_razao` varchar(60) NOT NULL,
  `cpf_cnpj` varchar(14) NOT NULL,
  `fone` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `data_infracao` date NOT NULL,
  `observacao` text NOT NULL,
  PRIMARY KEY (`idinfracao`),
  KEY `infracao_FKIndex1` (`funcionario_idfuncionario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infracao`
--

LOCK TABLES `infracao` WRITE;
/*!40000 ALTER TABLE `infracao` DISABLE KEYS */;
INSERT INTO `infracao` VALUES (1,1,'Luis da Silva Linhares','01589632045','32230010','lsilva2016@gmail.com','2019-10-12','derrubada de árvores indevida');
/*!40000 ALTER TABLE `infracao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `muda`
--

DROP TABLE IF EXISTS `muda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `muda` (
  `idmuda` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `funcionario_idfuncionario` int(10) unsigned NOT NULL,
  `quantidade` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`idmuda`),
  KEY `muda_FKIndex1` (`funcionario_idfuncionario`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `muda`
--

LOCK TABLES `muda` WRITE;
/*!40000 ALTER TABLE `muda` DISABLE KEYS */;
INSERT INTO `muda` VALUES (1,1,604),(2,2,32),(3,1,80);
/*!40000 ALTER TABLE `muda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projeto`
--

DROP TABLE IF EXISTS `projeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projeto` (
  `idprojeto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `funcionario_idfuncionario` int(10) unsigned NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `implantacao` varchar(15) NOT NULL,
  `descricao` text NOT NULL,
  `responsavel` varchar(30) NOT NULL,
  PRIMARY KEY (`idprojeto`),
  KEY `projeto_FKIndex1` (`funcionario_idfuncionario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projeto`
--

LOCK TABLES `projeto` WRITE;
/*!40000 ALTER TABLE `projeto` DISABLE KEYS */;
INSERT INTO `projeto` VALUES (1,1,'Reforma canteiro Padre Julio','1 mes','plantio de especies paisagisticas na rotatoria do araxá','Eng. Flávio');
/*!40000 ALTER TABLE `projeto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requerimento`
--

DROP TABLE IF EXISTS `requerimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requerimento` (
  `idrequerimento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `funcionario_idfuncionario` int(10) unsigned NOT NULL,
  `cidadao_idcidadao` int(10) unsigned NOT NULL,
  `copia_rg` blob NOT NULL,
  `copia_cpf` blob NOT NULL,
  `comp_residencia` blob NOT NULL,
  `autorizacao` blob,
  `data_reqto` date NOT NULL,
  PRIMARY KEY (`idrequerimento`),
  KEY `requerimento_FKIndex2` (`cidadao_idcidadao`),
  KEY `requerimento_FKIndex3` (`funcionario_idfuncionario`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requerimento`
--

LOCK TABLES `requerimento` WRITE;
/*!40000 ALTER TABLE `requerimento` DISABLE KEYS */;
INSERT INTO `requerimento` VALUES (1,1,1,_binary '611.png',_binary 'doubt.png',_binary 'down.png',_binary 'up.png','2019-10-29'),(2,1,1,_binary '611.png',_binary 'doubt.png',_binary 'down.png',_binary 'up.png','2019-10-29'),(3,1,3,'','','','','2019-11-04'),(4,2,8,'','','','','2019-11-04'),(5,3,9,'','','','','2019-11-04'),(6,1,6,'','','','','2019-11-04'),(7,1,1,_binary 'Culinária.jpg','','','','2019-11-05');
/*!40000 ALTER TABLE `requerimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servico`
--

DROP TABLE IF EXISTS `servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servico` (
  `idservico` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `requerimento_idrequerimento` int(10) unsigned NOT NULL,
  `eliminacao_externa` char(1) DEFAULT NULL,
  `quant_elim_ext` smallint(5) DEFAULT NULL,
  `eliminacao_interna` char(1) DEFAULT NULL,
  `quant_elim_int` smallint(5) DEFAULT NULL,
  `poda_externa` char(1) DEFAULT NULL,
  `quant_poda_ext` smallint(5) DEFAULT NULL,
  `poda_interna` char(1) DEFAULT NULL,
  `quant_poda_int` smallint(5) unsigned DEFAULT NULL,
  `justificativa` text NOT NULL,
  PRIMARY KEY (`idservico`),
  KEY `servico_FKIndex1` (`requerimento_idrequerimento`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servico`
--

LOCK TABLES `servico` WRITE;
/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
INSERT INTO `servico` VALUES (1,1,'s',1,'s',2,'s',2,'s',1,'fungos no tronco'),(2,2,'s',1,'s',1,'s',1,'s',1,'ooo'),(3,3,'s',5,'s',5,'s',5,'s',5,'wyvubqy'),(4,0,NULL,0,NULL,0,NULL,0,'s',2,'Galhos muito longos avançando pelo quintal'),(5,0,NULL,0,NULL,0,NULL,0,'s',1,'pq sim'),(6,0,'s',2,'n',0,'n',0,'n',0,'árvores muito velhas e sem galhos quase'),(7,7,'s',7,'s',7,'s',7,'s',7,'quero');
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_areaverde`
--

DROP TABLE IF EXISTS `tipo_areaverde`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_areaverde` (
  `idtipo_areaverde` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(15) NOT NULL,
  PRIMARY KEY (`idtipo_areaverde`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_areaverde`
--

LOCK TABLES `tipo_areaverde` WRITE;
/*!40000 ALTER TABLE `tipo_areaverde` DISABLE KEYS */;
INSERT INTO `tipo_areaverde` VALUES (1,'Jardim'),(2,'Praça'),(3,'Parque'),(4,'Cemitério'),(5,'Rotatória'),(6,'Passeio público'),(7,'Canteiro'),(8,'Área Privada'),(9,'Zoológico'),(10,'Horto'),(11,'Bioparque'),(12,'Ravina');
/*!40000 ALTER TABLE `tipo_areaverde` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-05 15:08:46
