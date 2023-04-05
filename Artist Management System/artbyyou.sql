-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2023 at 12:18 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artbyyou`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `AboutID` int(11) NOT NULL,
  `HomePage` text NOT NULL,
  `Story` text NOT NULL,
  `AboutImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`AboutID`, `HomePage`, `Story`, `AboutImage`) VALUES
(1, 'A community of artists coming together to share personal work and consignment pieces for the general public. Do you have what it takes? ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Allart.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `ArtistID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `ArtistImage` varchar(50) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`ArtistID`, `Name`, `ArtistImage`, `Type`, `Description`) VALUES
(1, 'Shabana Apa', 'files/artists/Shabana_Apa.png', 'Painter', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout'),
(2, 'Marcy Angelo', 'files/artists/Marcy_Angelo.png', 'Painter', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some for'),
(3, 'Kyle Furero', 'files/artists/Kyle_Furero.png', 'Photographer', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.'),
(4, 'Alice Flicing', 'files/artists/Alice_Flicing.png', 'Photographer', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout'),
(5, 'Karen loupe', 'files/artists/Karen_loupe.png', 'Photographer', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.'),
(6, 'Gary Margo', 'files/artists/Gary_Margo.png', 'Painter', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some for'),
(7, 'Supez Garret', 'files/artists/Supez_Garret.png', 'Crafts', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout'),
(8, 'Lin Xuang', 'files/artists/Lin_Xuang.png', 'Photographer', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.'),
(9, 'Jenna Ogetto', 'files/artists/Jenna_Ogetto.png', 'Photographer', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.'),
(10, 'Philip Granger', 'files/artists/Philip_Granger.png', 'Photographer', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.');

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `ArtID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `ArtImage` varchar(50) NOT NULL,
  `ThemeID` int(11) NOT NULL,
  `ArtistID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artwork`
--

INSERT INTO `artwork` (`ArtID`, `Title`, `ArtImage`, `ThemeID`, `ArtistID`) VALUES
(1, 'Pot RBW', 'files/Paintings/painting (1).jpg', 5, 2),
(2, 'Sky Water Earth', 'files/Paintings/painting (3).jpg', 5, 2),
(3, 'Paper Spill', 'files/Paintings/painting (5).jpg', 5, 2),
(4, 'Rainbow on a Paper', 'files/Paintings/painting (7).jpg', 5, 2),
(5, 'Plates for decor', 'files/Crafts/craft (1).jpg', 2, 1),
(6, 'Base for Vase', 'files/Crafts/craft (10).jpg', 2, 1),
(7, 'Bowls Earth', 'files/Crafts/craft (5).jpg', 2, 1),
(8, 'Blue Vase', 'files/Crafts/craft (7).jpg', 2, 1),
(9, 'Violet Horizon', 'files/Flowers/flower (2).jpg', 3, 3),
(10, 'Sunny Sunflower', 'files/Flowers/flower (4).jpg', 3, 3),
(11, 'Roses Are White?', 'files/Flowers/flower (8).jpg', 3, 3),
(12, 'Flowers in forest', 'files/Flowers/flower (10).jpg', 3, 3),
(13, 'Sea Beach Calm', 'files/Water/water (1).jpg', 4, 4),
(14, 'bigfish water', 'files/Water/water (3).jpg', 4, 4),
(15, 'RockRockRock', 'files/Water/water (5).jpg', 4, 4),
(16, 'BW Boat', 'files/Water/water (7).jpg', 4, 4),
(17, 'Italy View', 'files/Architecture/architecture (1).jpg', 6, 5),
(18, 'Curve Arch', 'files/Architecture/architecture (3).jpg', 6, 5),
(19, 'DT Sun', 'files/Architecture/architecture (5).jpg', 6, 5),
(20, 'RBW seaside', 'files/Architecture/architecture (7).jpg', 6, 5),
(21, 'CR Clr', 'files/Paintings/painting (2).jpg', 5, 6),
(22, 'Sea Mix', 'files/Paintings/painting (4).jpg', 5, 6),
(23, 'Spill', 'files/Paintings/painting (6).jpg', 5, 6),
(24, 'Rainbow Mix', 'files/Paintings/painting (8).jpg', 5, 6),
(25, 'BW Plates & Glasses', 'files/Crafts/craft (2).jpg', 2, 7),
(26, 'Wine Pitchers', 'files/Crafts/craft (4).jpg', 2, 7),
(27, 'Making', 'files/Crafts/craft (8).jpg', 2, 7),
(28, 'Glasses', 'files/Crafts/craft (6).jpg', 2, 7),
(29, 'Glaciers', 'files/Water/water (2).jpg', 4, 8),
(30, 'Boat View', 'files/Water/water (4).jpg', 4, 8),
(31, 'Umbrella Corp', 'files/Water/water (6).jpg', 4, 8),
(32, 'Hammer Head', 'files/Water/water (8).jpg', 4, 8),
(33, 'Goldie', 'files/Animals/animal (1).jpg', 1, 3),
(35, 'Wolf White', 'files/Animals/animal (12).jpg', 1, 9),
(36, 'Pek Pek', 'files/Animals/animal (17).jpg', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `UserID` int(11) NOT NULL,
  `ArtistID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`UserID`, `ArtistID`, `Username`, `Password`) VALUES
(1, 1, 'Shabana', 'abc123'),
(2, 8, 'Lin', 'abc123'),
(3, 4, 'Alice', 'abc123'),
(4, 5, 'Karen', 'abc123'),
(5, 6, 'Gary', 'abc123'),
(6, 2, 'Marcy', 'abc123'),
(7, 3, 'Kyle', 'abc123'),
(8, 7, 'Supez', 'abc123'),
(9, 9, 'Jenna', 'abc123'),
(10, 10, 'Philip', 'abc123');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `ThemeID` int(11) NOT NULL,
  `Theme` varchar(100) NOT NULL,
  `ThemeImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`ThemeID`, `Theme`, `ThemeImage`) VALUES
(1, 'Animals', 'files\\Animals\\animal (3).jpg'),
(2, 'Crafts', 'files\\Crafts\\craft (1).jpg'),
(3, 'Flowers', 'files\\Flowers\\flower (3).jpg'),
(4, 'Water', 'files\\Water\\water (2).jpg'),
(5, 'Paintings', 'files\\Paintings\\painting (3).jpg'),
(6, 'Architecture ', 'files\\Architecture\\architecture (5).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`AboutID`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`ArtistID`);

--
-- Indexes for table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`ArtID`),
  ADD KEY `FK1` (`ArtistID`),
  ADD KEY `FK2` (`ThemeID`);

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `FK3` (`ArtistID`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`ThemeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `AboutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `ArtistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `artwork`
--
ALTER TABLE `artwork`
  MODIFY `ArtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `signin`
--
ALTER TABLE `signin`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `ThemeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artwork`
--
ALTER TABLE `artwork`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`ArtistID`) REFERENCES `artists` (`ArtistID`),
  ADD CONSTRAINT `FK2` FOREIGN KEY (`ThemeID`) REFERENCES `themes` (`ThemeID`);

--
-- Constraints for table `signin`
--
ALTER TABLE `signin`
  ADD CONSTRAINT `FK3` FOREIGN KEY (`ArtistID`) REFERENCES `artists` (`ArtistID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
