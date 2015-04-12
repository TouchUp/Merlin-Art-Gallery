-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2015 at 03:16 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imageserver`
--
CREATE DATABASE IF NOT EXISTS `imageserver`;
  USE `imageserver`;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`pkey` int(8) NOT NULL,
  `code` varchar(15) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `artist` varchar(64) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `height` float(8,4) DEFAULT NULL,
  `width` float(8,4) DEFAULT NULL,
  `bio` text,
  `sold` tinyint(1) NOT NULL DEFAULT '0',
  `others` varchar(20) DEFAULT NULL,
  `doby` smallint(5) DEFAULT NULL,
  `dobm` tinyint(2) DEFAULT NULL,
  `dobd` tinyint(2) DEFAULT NULL,
  `plocation` varchar(20) DEFAULT NULL,
  `pyear` smallint(6) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `media` smallint(5) DEFAULT '1',
  `subject` smallint(5) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`pkey`, `code`, `name`, `artist`, `price`, `height`, `width`, `bio`, `sold`, `others`, `doby`, `dobm`, `dobd`, `plocation`, `pyear`, `country`, `media`, `subject`) VALUES
(140, '51', 'lolwut', 'artist1', '99.00', 5.0000, 5.0000, 'None', 0, 'kek', 1994, 0, 1, '', 2005, 'Singapore', 2, 2),
(141, '50', 'The Last Supper', 'Leonardo da Vinci', '99.00', 460.0000, 880.0000, 'None', 0, '', 1452, 0, 0, 'singapore', 0, '', 1, 1),
(142, 'a24d', 'Mona Lisa', 'Leonardo da Vinci', '2.00', 76.2000, 53.3400, 'The Mona Lisa (Monna Lisa or La Gioconda in Italian; La Joconde in French) is a half-length portrait of a woman by the Italian artist Leonardo da Vinci, which has been acclaimed as "the best known, the most visited, the most written about, the most sung about, the most parodied work of art in the world".', 2, '', 0, 0, 0, '', 0, '', 2, 1),
(143, '3', 'Guernica', 'Pablo Picasso', '10.00', 349.0000, 776.0000, 'None', 2, '', 0, 0, 0, 'Singapore', 0, '', 1, 3),
(144, '4', 'Girl with a Pearl Earring', 'Johannes Vermeer', '99.00', 44.5000, 39.0000, 'None', 0, '', 0, 0, 0, '', 0, '', 1, 3),
(145, '53', 'A4 Paper', 'Dae Koon', '1.00', 21.0000, 29.7000, 'None', 0, 'None', 1996, 7, 12, 'Singapore', 2015, 'Singapore', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mediaid`
--

CREATE TABLE IF NOT EXISTS `mediaid` (
`pkey` smallint(5) NOT NULL,
  `media` varchar(15) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mediaid`
--

INSERT INTO `mediaid` (`pkey`, `media`) VALUES
(1, 'oil'),
(2, 'brush'),
(3, 'random'),
(5, 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `subjectid`
--

CREATE TABLE IF NOT EXISTS `subjectid` (
`pkey` int(5) NOT NULL,
  `subject` varchar(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectid`
--

INSERT INTO `subjectid` (`pkey`, `subject`) VALUES
(1, 'scenery'),
(2, 'person'),
(3, 'random'),
(8, 'objects');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`pkey`);

--
-- Indexes for table `mediaid`
--
ALTER TABLE `mediaid`
 ADD PRIMARY KEY (`pkey`);

--
-- Indexes for table `subjectid`
--
ALTER TABLE `subjectid`
 ADD PRIMARY KEY (`pkey`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `pkey` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `mediaid`
--
ALTER TABLE `mediaid`
MODIFY `pkey` smallint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subjectid`
--
ALTER TABLE `subjectid`
MODIFY `pkey` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
