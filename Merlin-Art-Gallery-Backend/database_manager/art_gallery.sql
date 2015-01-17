-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2015 at 06:07 AM
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
  `price` varchar(15) DEFAULT NULL,
  `cmheight` int(7) DEFAULT NULL,
  `cmwidth` int(7) DEFAULT NULL,
  `inheight` decimal(7,3) DEFAULT NULL,
  `inwidth` decimal(7,3) DEFAULT NULL,
  `bio` text,
  `sold` tinyint(1) NOT NULL DEFAULT '0',
  `others` varchar(20) DEFAULT NULL,
  `image` longblob,
  `flocation` varchar(150) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`pkey`, `code`, `name`, `artist`, `price`, `cmheight`, `cmwidth`, `inheight`, `inwidth`, `bio`, `sold`, `others`, `image`, `flocation`, `fname`) VALUES
(140, '55', 'lolwut', 'artist1', '1000', 30, 0, '0.000', '0.000', '50', 50, '30', 0x2e2e2f73616d706c65, '../../sampledata', 'carbotanimation.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`pkey`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `pkey` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=141;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
