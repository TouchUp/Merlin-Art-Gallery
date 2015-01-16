-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2015 at 02:47 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `artgallery`

CREATE DATABASE IF NOT EXISTS `artgallery`;

USE `artgallery`;   
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`PRIMARY_ID` int(11) NOT NULL,
  `code` text NOT NULL,
  `name` text NOT NULL,
  `artist` text NOT NULL,
  `price` int(11) NOT NULL,
  `cmheight` int(11) NOT NULL,
  `cmwidth` int(11) NOT NULL,
  `inheight` int(11) NOT NULL,
  `inwidth` int(11) NOT NULL,
  `bio` text NOT NULL,
  `sold` tinyint(1) NOT NULL,
  `others` text NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`PRIMARY_ID`, `code`, `name`, `artist`, `price`, `cmheight`, `cmwidth`, `inheight`, `inwidth`, `bio`, `sold`, `others`, `image`) VALUES
(2, '0', 'ahhh', 'asdf', 500, 30, 30, 15, 15, 'asdf', 0, 'aaaaaaaa', ''),
(3, '1', 'asdf', 'aaa', 50, 50, 60, 15, 15, 'asdf', 1, 'asdfasdf', ''),
(4, '', 'New Image', '', 0, 0, 0, 0, 0, '', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`PRIMARY_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `PRIMARY_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
