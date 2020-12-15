-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Tue Dec  1 15:46:47 2020 
-- * Schema: PiR/1-1 
-- *********************************************

-- Database Section
-- ________________ 

create database PiR;
use PiR;


-- Tables Section
-- _____________ 

create table buy (
     idClient int not null,
     idPrinter int not null,
     constraint ID_buy_ID primary key (idClient, idPrinter));

create table t_client (
     idClient int not null auto_increment,
     cliFirstName varchar(50) not null,
     cliLastName varchar(50) not null,
     constraint ID_t_client_ID primary key (idClient));

create table t_printer (
     idPrinter int not null auto_increment,
     priBrand varchar(50) not null,
     priModel varchar(100) not null,
     priTechnology char(1) not null,
     priSpeed tinyint not null,
     priCapacity smallint not null,
     priWeight float(1) not null,
     priResolution smallint not null,
     priHeight float(1) not null,
     priWidth float(1) not null,
     priDepth float(1) not null,
     priPrice smallint not null,
     constraint ID_t_printer_ID primary key (idPrinter));


-- Constraints Section
-- ___________________ 

alter table buy add constraint FKbuy_t_p_FK
     foreign key (idPrinter)
     references t_printer (idPrinter);

alter table buy add constraint FKbuy_t_c
     foreign key (idClient)
     references t_client (idClient);


-- Index Section
-- _____________ 

create unique index ID_buy_IND
     on buy (idClient, idPrinter);

create index FKbuy_t_p_IND
     on buy (idPrinter);

create unique index ID_t_client_IND
     on t_client (idClient);

create unique index ID_t_printer_IND
     on t_printer (idPrinter);

-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 08 Décembre 2020 à 12:29
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pir`
--
DROP DATABASE IF EXISTS pir;
CREATE DATABASE pir;
USE pir;
-- --------------------------------------------------------

--
-- Structure de la table `buy`
--

CREATE TABLE `buy` (
  `idClient` int(11) NOT NULL,
  `idPrinter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_client`
--

CREATE TABLE `t_client` (
  `idClient` int(11) NOT NULL,
  `cliFirstName` varchar(50) NOT NULL,
  `cliLastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_printer`
--

CREATE TABLE `t_printer` (
  `priBrand` varchar(50) NOT NULL,
  `priModel` varchar(100) NOT NULL,
  `priTechnology` char(50) NOT NULL,
  `priSpeed` tinyint(4) NOT NULL,
  `priCapacity` smallint(6) NOT NULL,
  `priWeight` float NOT NULL,
  `priResolution` smallint(6) NOT NULL,
  `priHeight` smallint(6) NOT NULL,
  `priWidth` smallint(6) NOT NULL,
  `priDepth` smallint(6) NOT NULL,
  `priPrice` smallint(6) NOT NULL,
  `idPrinter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_printer`
--

INSERT INTO `t_printer` (`priBrand`, `priModel`, `priTechnology`, `priSpeed`, `priCapacity`, `priWeight`, `priResolution`, `priHeight`, `priWidth`, `priDepth`, `priPrice`, `idPrinter`) VALUES
('Brother', 'DCP-L3510CDW', 'Laser/LED', 18, 250, 21.7, 600, 39, 41, 48, 305, 1),
('HP', 'M479dw Color LaserJet Pro', 'Laser/LED', 27, 300, 21.8, 600, 47, 42, 40, 395, 2),
('HP', 'M28w LaserJet Pro', 'Laser/LED', 18, 150, 5.4, 600, 26, 36, 20, 149, 3),
('HP', 'M183fw LaserJet Pro', 'Laser/LED', 16, 150, 16.3, 600, 38, 42, 34, 334, 4),
('Canon', 'PIXMA G6050 MegaTank', 'Jet d\'encre', 13, 350, 8.1, 1200, 37, 46, 20, 330, 5),
('HP', 'M283dw Color LaserJet Pro', 'Laser/LED', 21, 200, 18.7, 600, 42, 42, 33, 323, 6),
('Brother', 'MFC-L8690CDW', 'Laser/LED', 31, 300, 27.9, 600, 53, 44, 54, 459, 7),
('Brother', 'MFC-L3730CDN', 'Laser/LED', 24, 250, 24.5, 600, 48, 41, 41, 319, 8),
('Canon', 'MF744Cdw i-Sensys', 'Laser/LED', 27, 300, 26.5, 600, 47, 47, 46, 459, 9),
('HP', 'M479fdn Color LaserJet Pro', 'Laser/LED', 27, 300, 23.4, 600, 47, 42, 40, 459, 10),
('Epson', 'ET-3750 EcoTank', 'Jet d\'encre', 15, 150, 6.7, 1200, 51, 41, 32, 384, 11),
('Brother', 'MFC-L2710DW', 'Laser/LED', 30, 300, 11.8, 600, 58, 53, 44, 184, 12),
('HP', 'OfficeJet Pro 8730', 'Jet d\'encre', 20, 300, 15.2, 1200, 53, 50, 34, 287, 13),
('Epson', 'ET-3750 EcoTank Unlimited', 'Jet d\'encre', 15, 150, 6.7, 1200, 35, 38, 23, 384, 14),
('Epson', 'ET-2750 EcoTank Unlimited', 'Jet d\'encre', 10, 100, 5.5, 1440, 35, 38, 19, 315, 15),
('Brother', 'MFC-L2750DW', 'Laser/LED', 34, 300, 14.7, 600, 41, 40, 32, 329, 16),
('Brother', 'MFC-L8900CDW', 'Laser/LED', 31, 300, 28.7, 600, 53, 50, 55, 700, 17),
('HP', '477dw PageWide Pro', 'Jet d\'encre', 40, 550, 22.15, 1200, 41, 53, 47, 467, 18),
('HP', 'OfficeJet 250 Mobile All-inOne', 'Jet d\'encre', 10, 50, 2.96, 1200, 20, 38, 9, 308, 19),
('HP', 'OfficeJet Pro 7730', 'Jet d\'encre', 22, 500, 18.5, 1200, 44, 58, 39, 210, 20),
('Canon', 'MF645Cx i-Sensys', 'Laser/LED', 21, 150, 22.6, 1200, 46, 45, 41, 309, 21),
('Brother', 'MFC-L3770CDW', 'Laser/LED', 24, 280, 24.5, 600, 51, 41, 41, 415, 22),
('Epson', 'WF-4745TWF WorkForce Pro', 'Jet d\'encre', 24, 500, 12.1, 1200, 39, 43, 33, 234, 23),
('Brother', 'MFC-L2730DW', 'Laser/LED', 34, 300, 11.8, 600, 41, 40, 32, 257, 24),
('Xerox', 'VersaLink', 'Laser/LED', 20, 620, 69, 1200, 67, 59, 77, 1990, 25),
('Xerox', '6515V/DNI WorkCentre', 'Laser/LED', 28, 300, 30.7, 1200, 51, 42, 50, 426, 26),
('Lexmark', 'MC3326adwe', 'Laser/LED', 24, 250, 19.4, 600, 39, 41, 34, 283, 27),
('Lexmark', 'MC2535adwe', 'Laser/LED', 33, 250, 27.1, 1200, 59, 44, 46, 457, 28),
('Kyocera', 'ECOSYS M5521cdw', 'Laser/LED', 21, 300, 26, 1200, 43, 42, 50, 322, 29),
('OKI', 'MC883dn', 'Laser/LED', 35, 400, 64, 1200, 60, 56, 70, 1960, 30);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`idClient`,`idPrinter`),
  ADD UNIQUE KEY `ID_buy_IND` (`idClient`,`idPrinter`),
  ADD KEY `FKbuy_t_p_IND` (`idPrinter`);

--
-- Index pour la table `t_client`
--
ALTER TABLE `t_client`
  ADD PRIMARY KEY (`idClient`),
  ADD UNIQUE KEY `ID_t_client_IND` (`idClient`);

--
-- Index pour la table `t_printer`
--
ALTER TABLE `t_printer`
  ADD PRIMARY KEY (`idPrinter`),
  ADD UNIQUE KEY `ID_t_printer_IND` (`idPrinter`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_client`
--
ALTER TABLE `t_client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_printer`
--
ALTER TABLE `t_printer`
  MODIFY `idPrinter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `FKbuy_t_c` FOREIGN KEY (`idClient`) REFERENCES `t_client` (`idClient`),
  ADD CONSTRAINT `FKbuy_t_p_FK` FOREIGN KEY (`idPrinter`) REFERENCES `t_printer` (`idPrinter`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
