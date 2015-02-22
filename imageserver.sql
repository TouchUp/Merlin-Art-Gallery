-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2015 at 07:08 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`pkey`, `code`, `name`, `artist`, `price`, `height`, `width`, `bio`, `sold`, `others`, `doby`, `dobm`, `dobd`, `plocation`, `pyear`, `country`, `media`, `subject`) VALUES
(140, '51', 'lolwut', 'artist1', '99.00', 50.0100, 9.0000, '', 0, 'kek', 0, 0, 1, '', 2005, 'Singapore', 2, 2),
(141, '50', 'The Last Supper', 'Leonardo da Vinci', '99.00', 54.0000, 1.0000, '', 0, '', 9, 0, 0, 'singapore', 0, '', 3, 1),
(142, 'a24d', 'Mona Lisa', 'Leonardo da Vinci', '2.00', 0.0000, 40.0100, '', 0, '', 0, 0, 0, '', 0, '', 3, 4),
(143, '3', 'Guernica', 'Pablo Picasso', '10.00', 0.0000, 0.0000, '', 0, '', 0, 0, 0, 'Singapore', 0, '', 1, 3),
(144, '4', 'Girl with a Pearl Earring', 'Johannes Vermeer', '99.00', 0.0000, 0.0000, '', 0, '', 0, 0, 0, '', 0, '', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mediaid`
--

CREATE TABLE IF NOT EXISTS `mediaid` (
`pkey` smallint(5) NOT NULL,
  `media` varchar(15) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
(8, 'object');

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
MODIFY `pkey` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=183;
--
-- AUTO_INCREMENT for table `mediaid`
--
ALTER TABLE `mediaid`
MODIFY `pkey` smallint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subjectid`
--
ALTER TABLE `subjectid`
MODIFY `pkey` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
