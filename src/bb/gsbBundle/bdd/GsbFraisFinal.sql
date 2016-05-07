-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: gsb_frais
-- ------------------------------------------------------
-- Server version	5.5.46-0+deb7u1

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
-- Table structure for table `Etat`
--

DROP TABLE IF EXISTS `Etat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Etat` (
  `id` varchar(2) NOT NULL,
  `libelle` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Etat`
--

LOCK TABLES `Etat` WRITE;
/*!40000 ALTER TABLE `Etat` DISABLE KEYS */;
INSERT INTO `Etat` VALUES ('CL','Saisie clôturée'),('CR','Fiche créée, saisie en cours'),('RB','Remboursée'),('VA','Validée et mise en paiement');
/*!40000 ALTER TABLE `Etat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FicheFraisForfait`
--

DROP TABLE IF EXISTS `FicheFraisForfait`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FicheFraisForfait` (
  `idFicheFrais` int(11) NOT NULL AUTO_INCREMENT,
  `nomVisiteur` varchar(30) DEFAULT NULL,
  `prenomVisiteur` varchar(30) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `mois` int(11) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `repasMidi` int(11) DEFAULT NULL,
  `nuitee` int(11) DEFAULT NULL,
  `etape` int(11) DEFAULT NULL,
  `km` int(11) DEFAULT NULL,
  `prixRepasMidi` float DEFAULT NULL,
  `prixNuitee` float DEFAULT NULL,
  `prixEtape` float DEFAULT NULL,
  `prixKm` float DEFAULT NULL,
  PRIMARY KEY (`idFicheFrais`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FicheFraisForfait`
--

LOCK TABLES `FicheFraisForfait` WRITE;
/*!40000 ALTER TABLE `FicheFraisForfait` DISABLE KEYS */;
INSERT INTO `FicheFraisForfait` VALUES (27,NULL,NULL,14,3,2016,1,1,1,0,25,80,110,0),(28,NULL,NULL,23,4,2016,2,2,2,2,50,160,220,1.24),(29,NULL,NULL,23,4,2016,2,2,2,222,50,160,220,137.64);
/*!40000 ALTER TABLE `FicheFraisForfait` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FicheFraisHorsForfait`
--

DROP TABLE IF EXISTS `FicheFraisHorsForfait`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FicheFraisHorsForfait` (
  `idFicheFraisHorsForfait` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `libelle` varchar(200) DEFAULT NULL,
  `qte` int(11) DEFAULT NULL,
  `prixUnitaire` float DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `nomVisiteur` varchar(50) DEFAULT NULL,
  `prenomVisiteur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idFicheFraisHorsForfait`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FicheFraisHorsForfait`
--

LOCK TABLES `FicheFraisHorsForfait` WRITE;
/*!40000 ALTER TABLE `FicheFraisHorsForfait` DISABLE KEYS */;
INSERT INTO `FicheFraisHorsForfait` VALUES (1,'2011-01-01','fgfg',66,9,594,NULL,NULL),(2,'2011-01-01','fgfg',66,9,594,NULL,NULL),(3,'2011-01-01','fgfg',66,9,594,NULL,NULL),(4,'2011-01-01','gyugyu',1,4,4,NULL,NULL),(5,'2011-01-01','Essence',20,1.23,24.6,NULL,NULL),(6,'2011-01-01','Essence',11,1.3,13.65,NULL,NULL),(7,'2011-01-01','Essence',66,1.3,85.8,NULL,NULL);
/*!40000 ALTER TABLE `FicheFraisHorsForfait` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FraisForfait`
--

DROP TABLE IF EXISTS `FraisForfait`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FraisForfait` (
  `id` varchar(3) NOT NULL,
  `libelle` varchar(20) DEFAULT NULL,
  `montant` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FraisForfait`
--

LOCK TABLES `FraisForfait` WRITE;
/*!40000 ALTER TABLE `FraisForfait` DISABLE KEYS */;
INSERT INTO `FraisForfait` VALUES ('ETP','Forfait Etape',110.00),('KM','Frais Kilométrique',0.62),('NUI','Nuitée Hôtel',80.00),('REP','Repas Restaurant',25.00);
/*!40000 ALTER TABLE `FraisForfait` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Visiteur`
--

DROP TABLE IF EXISTS `Visiteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Visiteur` (
  `id` varchar(4) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `mdp` varchar(20) DEFAULT NULL,
  `adresse` varchar(30) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Visiteur`
--

LOCK TABLES `Visiteur` WRITE;
/*!40000 ALTER TABLE `Visiteur` DISABLE KEYS */;
INSERT INTO `Visiteur` VALUES ('a131','Villechalane','Louis','lvillachane','jux7g','8 rue des Charmes','46000','Cahors','2005-12-21'),('a17','Andre','David','dandre','oppg5','1 rue Petit','46200','Lalbenque','1998-11-23'),('a55','Bedos','Christian','cbedos','gmhxd','1 rue Peranud','46250','Montcuq','1995-01-12'),('a93','Tusseau','Louis','ltusseau','ktp3s','22 rue des Ternes','46123','Gramat','2000-05-01'),('b13','Bentot','Pascal','pbentot','doyw1','11 allée des Cerises','46512','Bessines','1992-07-09'),('b16','Bioret','Luc','lbioret','hrjfs','1 Avenue gambetta','46000','Cahors','1998-05-11'),('b19','Bunisset','Francis','fbunisset','4vbnd','10 rue des Perles','93100','Montreuil','1987-10-21'),('b25','Bunisset','Denise','dbunisset','s1y1r','23 rue Manin','75019','paris','2010-12-05'),('b28','Cacheux','Bernard','bcacheux','uf7r3','114 rue Blanche','75017','Paris','2009-11-12'),('b34','Cadic','Eric','ecadic','6u8dc','123 avenue de la République','75011','Paris','2008-09-23'),('b4','Charoze','Catherine','ccharoze','u817o','100 rue Petit','75019','Paris','2005-11-12'),('b50','Clepkens','Christophe','cclepkens','bw1us','12 allée des Anges','93230','Romainville','2003-08-11'),('b59','Cottin','Vincenne','vcottin','2hoh9','36 rue Des Roches','93100','Monteuil','2001-11-18'),('c14','Daburon','François','fdaburon','7oqpv','13 rue de Chanzy','94000','Créteil','2002-02-11'),('c3','De','Philippe','pde','gk9kx','13 rue Barthes','94000','Créteil','2010-12-14'),('c54','Debelle','Michel','mdebelle','od5rt','181 avenue Barbusse','93210','Rosny','2006-11-23'),('d13','Debelle','Jeanne','jdebelle','nvwqq','134 allée des Joncs','44000','Nantes','2000-05-11'),('d51','Debroise','Michel','mdebroise','sghkb','2 Bld Jourdain','44000','Nantes','2001-04-17'),('e22','Desmarquest','Nathalie','ndesmarquest','f1fob','14 Place d Arc','45000','Orléans','2005-11-12'),('e24','Desnost','Pierre','pdesnost','4k2o5','16 avenue des Cèdres','23200','Guéret','2001-02-05'),('e39','Dudouit','Frédéric','fdudouit','44im8','18 rue de l église','23120','GrandBourg','2000-08-01'),('e49','Duncombe','Claude','cduncombe','qf77j','19 rue de la tour','23100','La souteraine','1987-10-10'),('e5','Enault-Pascreau','Céline','cenault','y2qdu','25 place de la gare','23200','Gueret','1995-09-01'),('e52','Eynde','Valérie','veynde','i7sn3','3 Grand Place','13015','Marseille','1999-11-01'),('f21','Finck','Jacques','jfinck','mpb3t','10 avenue du Prado','13002','Marseille','2001-11-10'),('f39','Frémont','Fernande','ffremont','xs5tq','4 route de la mer','13012','Allauh','1998-10-01'),('f4','Gest','Alain','agest','dywvt','30 avenue de la mer','13025','Berre','1985-11-01');
/*!40000 ALTER TABLE `Visiteur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-02  0:35:22
