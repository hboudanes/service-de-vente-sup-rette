-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ecom
CREATE DATABASE IF NOT EXISTS `ecom` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ecom`;

-- Dumping structure for table ecom.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `matricule` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricule` (`matricule`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table ecom.catégorie
CREATE TABLE IF NOT EXISTS `catégorie` (
  `id_cat` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `desc` char(200) DEFAULT NULL,
  `id_ad` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_cat`),
  KEY `id_ad` (`id_ad`),
  KEY `id_cat` (`id_cat`),
  CONSTRAINT `FK__admin` FOREIGN KEY (`id_ad`) REFERENCES `admin` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table ecom.client
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` char(50) NOT NULL,
  `prenom` char(50) NOT NULL,
  `email` char(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table ecom.commande
CREATE TABLE IF NOT EXISTS `commande` (
  `ID_com` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date_com` date DEFAULT NULL,
  `id_pro` int(11) unsigned DEFAULT NULL,
  `id_pan` int(11) unsigned DEFAULT NULL,
  `id_client` int(11) unsigned NOT NULL,
  `pay` int(2) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID_com`),
  KEY `id_pro` (`id_pro`),
  KEY `id_pan` (`id_pan`),
  KEY `id_client` (`id_client`),
  CONSTRAINT `FK_commande_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  CONSTRAINT `FK_commande_panier_fixe` FOREIGN KEY (`id_pan`) REFERENCES `panier_fixe` (`ID_panier`),
  CONSTRAINT `FK_commande_produit` FOREIGN KEY (`id_pro`) REFERENCES `produit` (`ID_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table ecom.panier_fixe
CREATE TABLE IF NOT EXISTS `panier_fixe` (
  `ID_panier` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Date_panier` date DEFAULT NULL,
  `id_ad` int(10) unsigned NOT NULL,
  `id_pro1` int(10) unsigned NOT NULL,
  `id_pro2` int(10) unsigned DEFAULT NULL,
  `id_pro3` int(10) unsigned DEFAULT NULL,
  `prix` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID_panier`),
  KEY `id_ad` (`id_ad`),
  KEY `id_pro2` (`id_pro2`),
  KEY `id_pro3` (`id_pro3`),
  KEY `id_pro` (`id_pro1`) USING BTREE,
  CONSTRAINT `FK_panier_fixe_admin` FOREIGN KEY (`id_ad`) REFERENCES `admin` (`id`),
  CONSTRAINT `FK_panier_fixe_produit` FOREIGN KEY (`id_pro1`) REFERENCES `produit` (`ID_pro`),
  CONSTRAINT `FK_panier_fixe_produit_2` FOREIGN KEY (`id_pro2`) REFERENCES `produit` (`ID_pro`),
  CONSTRAINT `FK_panier_fixe_produit_3` FOREIGN KEY (`id_pro3`) REFERENCES `produit` (`ID_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table ecom.pay
CREATE TABLE IF NOT EXISTS `pay` (
  `ID_pay` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Num_cart` int(25) unsigned NOT NULL,
  `prix_T` int(25) unsigned NOT NULL,
  `Date_exp` int(11) unsigned NOT NULL,
  `ID_client` int(11) unsigned NOT NULL,
  PRIMARY KEY (`ID_pay`),
  KEY `ID_client` (`ID_client`),
  CONSTRAINT `FK__client` FOREIGN KEY (`ID_client`) REFERENCES `client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table ecom.produit
CREATE TABLE IF NOT EXISTS `produit` (
  `ID_pro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `Qte` int(11) DEFAULT NULL,
  `id_ad` int(11) unsigned NOT NULL,
  `id_ca` int(11) unsigned NOT NULL,
  `prix` int(11) unsigned NOT NULL,
  `img` char(50) DEFAULT NULL,
  PRIMARY KEY (`ID_pro`),
  KEY `FK_AJOUTE` (`id_ad`),
  KEY `id_ca` (`id_ca`),
  CONSTRAINT `FK_produit_admin` FOREIGN KEY (`id_ad`) REFERENCES `admin` (`id`),
  CONSTRAINT `FK_produit_catégorie` FOREIGN KEY (`id_ca`) REFERENCES `catégorie` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
