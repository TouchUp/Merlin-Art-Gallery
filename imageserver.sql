-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2015 at 05:50 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`pkey`, `code`, `name`, `artist`, `price`, `height`, `width`, `bio`, `sold`, `others`, `doby`, `dobm`, `dobd`, `plocation`, `pyear`, `country`, `media`, `subject`) VALUES
(140, '51', 'lolwut', 'artist1', '99.00', 5.0000, 5.0000, 'None', 1, 'kek', 1994, 0, 1, '', 2005, 'Singapore', 2, 2),
(141, '50', 'The Last Supper', 'Leonardo da Vinci', '99.00', 460.0000, 880.0000, 'he Last Supper (Italian: Il Cenacolo or L''Ultima Cena) is a late 15th-century mural painting by Leonardo da Vinci in the refectory of the Convent of Santa Maria delle Grazie, Milan. It is one of the world''s most famous paintings, and one of the most studied, scrutinized, and satirized.', 1, '', 1452, 0, 0, 'singapore', 1499, '', 1, 1),
(142, 'a24d', 'Mona Lisa', 'Leonardo da Vinci', '2.00', 76.2000, 53.3400, 'The Mona Lisa (Monna Lisa or La Gioconda in Italian; La Joconde in French) is a half-length portrait of a woman by the Italian artist Leonardo da Vinci, which has been acclaimed as "the best known, the most visited, the most written about, the most sung about, the most parodied work of art in the world".', 2, '', 0, 0, 0, '', 1506, '', 2, 1),
(143, '3', 'Guernica', 'Pablo Picasso', '10.00', 349.0000, 776.0000, 'Guernica is a mural-sized oil painting on canvas by Spanish artist Pablo Picasso completed by June 1937. The painting, which uses a palette of gray, black, and white, is known as one of the most moving and powerful anti-war paintings in history. Standing at 11 feet tall and 25.6 feet wide, the large mural shows the suffering of people, animals, and buildings wrenched by violence and chaos.', 2, '', 0, 0, 0, 'Singapore', 1937, '', 1, 3),
(144, '4', 'Girl with a Pearl Earring', 'Johannes Vermeer', '99.00', 44.5000, 39.0000, 'Girl with a Pearl Earring (Dutch: Meisje met de parel) is an oil painting by 17th-century Dutch painter Johannes Vermeer. It is a tronie of a girl with a headscarf and a pearl earring. The painting has been in the collection of the Mauritshuis in The Hague since 1902.', 1, '', 0, 0, 0, '', 1665, '', 1, 3),
(145, '53', 'A4 Paper', 'Dae Koon', '1.00', 21.0000, 29.7000, 'None', 1, 'None', 1996, 7, 12, 'Singapore', 2015, 'Singapore', 3, 1),
(146, '5423', 'The Scream', 'Edvard Munch', '500000.00', 91.0000, 73.5000, 'The Scream (Norwegian: Skrik) is the popular name given to each of four versions of a composition, created as both paintings and pastels, by the Expressionist artist Edvard Munch between 1893 and 1910. Der Schrei der Natur (The Scream of Nature) is the title Munch gave to these works, all of which show a figure with an agonized expression against a landscape with a tumultuous orange sky. Arthur Lubow has described The Scream as "an icon of modern art, a Mona Lisa for our time."', 2, '', 1863, 12, 12, 'Singapore', 1893, 'Norwegian', 1, 2),
(147, '1', 'The Starry night', 'Vincent van Gogh', '909090.00', 73.6600, 92.0800, 'The Starry Night is an oil on canvas by the Dutch post-impressionist painter Vincent van Gogh. Painted in June, 1889, it depicts the view from the east-facing window of his asylum room at Saint-RÃ©my-de-Provence, just before sunrise, with the addition of an idealized village. It has been in the permanent collection of the Museum of Modern Art in New York City since 1941, acquired through the Lillie P. Bliss Bequest. It is regarded as among Van Gogh''s finest works, and one of the most recognized monuments in the history of Western culture.', 2, '', 1853, 3, 30, 'Singapore', 1889, 'Netherlands', 1, 1),
(148, '2', 'American Gothic', 'Grant Wood', '23000.00', 74.3000, 61.6000, 'American Gothic is a painting by Grant Wood in the collection of the Art Institute of Chicago. Wood''s inspiration came from what is now known as the American Gothic House, and his decision to paint the house along with "the kind of people I fancied should live in that house." The painting shows a farmer standing beside his spinster daughter. The figures were modeled by the artist''s sister and their dentist. The woman is dressed in a colonial print apron evoking 19th-century Americana, and the couple are in the traditional roles of men and women, the man''s pitchfork symbolizing hard labor, and the flowers over the woman''s right shoulder suggesting domesticity. The plants on the porch of the house are mother-in-law''s tongue and geranium, which are the same plants as in Wood''s 1929 portrait of his mother, Woman with Plants.', 1, '', 1891, 2, 13, 'Singapore', 1930, 'American', 1, 2),
(149, '5', 'The Persistence of Memory', 'Salvador DalÃ­', '85400.00', 24.0000, 33.0000, 'The Persistence of Memory (Spanish: La persistencia de la memoria; Catalan: La persistÃ¨ncia de la memÃ²ria) is a 1931 painting by artist Salvador DalÃ­, and is one of his most recognizable works.\n\nFirst shown at the Julien Levy Gallery in 1932, the painting has been in the collection of the Museum of Modern Art (MoMA) in New York City since 1934 which received it from an anonymous donor. It is widely recognized and frequently referenced in popular culture, though it is commonly better known by the more descriptive (though incorrect) titles, ''The Soft Watches'' or ''The Melting Watches''.', 1, '', 1904, 5, 11, 'Singapore', 1931, 'Spanish', 1, 3),
(150, '6', 'The Night Watch', 'Rembrandt van Rijn', '765550.00', 363.0000, 437.0000, 'Militia Company of District II under the Command of Captain Frans Banninck Cocq, also known as The Shooting Company of Frans Banning Cocq and Willem van Ruytenburch, but commonly referred to as The Night Watch (Dutch: De Nachtwacht), is a 1642 painting by Rembrandt van Rijn.\n\nThe painting may be more properly titled by its long since forgotten name The Company of captain Frans Banning Cocq and lieutenant Willem van Ruytenburch preparing to march out. In the 18th century the painting became known as the Night Watch. It is prominently displayed in the Rijksmuseum, Amsterdam, the Netherlands, as the best known painting in its collection. The Night Watch is a world renowned example of Baroque art.', 1, '', 1606, 7, 15, 'Singapore', 1642, 'Dutch', 1, 1),
(152, '7', 'Napoleon Crossing the Alps', 'Jacques-Louis David', '583500.00', 261.0000, 221.0000, 'Napoleon Crossing the Alps (also known as Napoleon at the Saint-Bernard Pass or Bonaparte Crossing the Alps) is the title given to the five versions of an oil on canvas equestrian portrait of Napoleon Bonaparte painted by the French artist Jacques-Louis David between 1801 and 1805. Initially commissioned by the king of Spain, the composition shows a strongly idealized view of the real crossing that Napoleon and his army made across the Alps through the Great St. Bernard Pass in May 1800.', 2, '', 1748, 8, 30, 'Singapore', 1801, 'French', 1, 2);

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
-- Table structure for table `setups`
--

CREATE TABLE IF NOT EXISTS `setups` (
`pkey` int(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `pictures` varchar(3000) DEFAULT NULL,
  `display` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setups`
--

INSERT INTO `setups` (`pkey`, `name`, `pictures`, `display`) VALUES
(7, 'asdf', '143_142_141', '1_1_1_0_0_0_0_0_0_0_18_3');

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
-- Indexes for table `setups`
--
ALTER TABLE `setups`
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
MODIFY `pkey` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `mediaid`
--
ALTER TABLE `mediaid`
MODIFY `pkey` smallint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `setups`
--
ALTER TABLE `setups`
MODIFY `pkey` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subjectid`
--
ALTER TABLE `subjectid`
MODIFY `pkey` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
