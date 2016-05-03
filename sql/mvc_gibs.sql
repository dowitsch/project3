-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 16. Juni 2009 um 21:34
-- Server Version: 5.1.33
-- PHP-Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `mvc_gibs`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kontakte`
--

CREATE TABLE IF NOT EXISTS `kontakte` (
  `kid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `vorname` varchar(30) NOT NULL,
  `strasse` varchar(128) NOT NULL,
  `plz` int(11) NOT NULL,
  `ort` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `tpriv` varchar(50) NOT NULL,
  `tgesch` varchar(50) NOT NULL,
  PRIMARY KEY (`kid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
