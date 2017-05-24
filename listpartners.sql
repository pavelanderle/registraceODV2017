-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 24. kvě 2017, 15:07
-- Verze serveru: 5.6.15-log
-- Verze PHP: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `registraceodv`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `listpartners`
--

CREATE TABLE IF NOT EXISTS `listpartners` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `firmaName` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `firmaStreet` varchar(200) COLLATE utf8_czech_ci NOT NULL,
  `psc` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `ico` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `dic` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `repeatVisit` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `firmaNameWeb` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `anotaceWeb` text COLLATE utf8_czech_ci NOT NULL,
  `kontaktName` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `kontaktTel` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `kontaktEmail` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `note` text COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=6 ;

--
-- Vypisuji data pro tabulku `listpartners`
--

INSERT INTO `listpartners` (`id`, `firmaName`, `firmaStreet`, `psc`, `city`, `ico`, `dic`, `email`, `repeatVisit`, `firmaNameWeb`, `anotaceWeb`, `kontaktName`, `kontaktTel`, `kontaktEmail`, `note`) VALUES
(5, 'Pokud', 's', 's', 's', 's', 's', 's@s.cz', 'První registrace nebo oprava', 'Použít informace z předchozích účastí', 'Použít informace z předchozích účastí', 'd', 'asdasd', 'd@s.cz', 'sdasd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
