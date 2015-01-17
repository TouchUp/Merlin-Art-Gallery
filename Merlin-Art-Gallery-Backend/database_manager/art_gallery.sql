-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2015 at 03:55 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`key` int(4) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`key`, `code`, `name`, `artist`, `price`, `cmheight`, `cmwidth`, `inheight`, `inwidth`, `bio`, `sold`, `others`, `image`, `flocation`, `fname`) VALUES
(137, '55', 'New Painting', 'Artist', '800', 20, 20, '5.000', '5.000', 'Bio', 1, 'Other info', 0x2e2e2f73616d706c6564617461, 'carbotanimation.png', ''),
(139, '4', 'New Painting', 'Artist', '0', 0, 0, '0.000', '0.000', 'Bio', 1, 'Other info', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `key` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=140;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
