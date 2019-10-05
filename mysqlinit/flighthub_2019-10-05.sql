# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.27)
# Database: flighthub
# Generation Time: 2019-10-05 16:54:53 +0000
# ************************************************************

-- Create Database if not EXISTS
CREATE DATABASE IF NOT EXISTS flighthub;

USE flighthub;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Airlines
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Airlines`;

CREATE TABLE `Airlines` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(124) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Airlines` WRITE;
/*!40000 ALTER TABLE `Airlines` DISABLE KEYS */;

INSERT INTO `Airlines` (`id`, `code`, `name`)
VALUES
	(1,'AC','Air Canada');

/*!40000 ALTER TABLE `Airlines` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Airports
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Airports`;

CREATE TABLE `Airports` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(124) NOT NULL DEFAULT '',
  `city` varchar(255) NOT NULL,
  `city_code` varchar(124) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `country_code` varchar(124) NOT NULL DEFAULT '',
  `region_code` varchar(124) NOT NULL DEFAULT '',
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `timezone` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Airports` WRITE;
/*!40000 ALTER TABLE `Airports` DISABLE KEYS */;

INSERT INTO `Airports` (`id`, `code`, `city`, `city_code`, `name`, `country_code`, `region_code`, `latitude`, `longitude`, `timezone`)
VALUES
	(1,'YUL','Montreal','YMQ','Pierre Elliott Trudeau International','CA','QC',45.4577,-73.7499,'America/Montreal'),
	(2,'YVR','Vancouver','YVR','Vancouver International','CA','BC',49.1947,-123.179,'America/Vancouver');

/*!40000 ALTER TABLE `Airports` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Flights
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Flights`;

CREATE TABLE `Flights` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `airline` varchar(124) NOT NULL DEFAULT '',
  `number` varchar(255) NOT NULL DEFAULT '',
  `departure_airport` varchar(124) NOT NULL DEFAULT '',
  `departure_time` varchar(255) NOT NULL DEFAULT '',
  `arrival_airport` varchar(124) NOT NULL DEFAULT '',
  `arrival_time` varchar(255) NOT NULL DEFAULT '',
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Flights` WRITE;
/*!40000 ALTER TABLE `Flights` DISABLE KEYS */;

INSERT INTO `Flights` (`id`, `airline`, `number`, `departure_airport`, `departure_time`, `arrival_airport`, `arrival_time`, `price`)
VALUES
	(1,'AC','301','YUL','07:35','YVR','10:05',273.23),
	(2,'AC','302','YVR','11:30','YUL','19:11',220.63);

/*!40000 ALTER TABLE `Flights` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
