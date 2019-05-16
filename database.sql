-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2019 at 09:01 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tweedehands_fiets`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesoires`
--

CREATE TABLE `accesoires` (
  `accesoireID` int(11) NOT NULL,
  `accesoireNaam` varchar(20) NOT NULL,
  `accesoireFoto` varchar(20) NOT NULL,
  `accesoirePrijs` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `acties`
--

CREATE TABLE `acties` (
  `actieID` int(11) NOT NULL,
  `actieNaam` varchar(50) NOT NULL,
  `actiePercentage` int(11) NOT NULL,
  `actiePrijs` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `beoordeling`
--

CREATE TABLE `beoordeling` (
  `beoordelingID` int(11) NOT NULL,
  `beoordelingScore` decimal(2,1) NOT NULL,
  `beoordelingNaam` varchar(20) NOT NULL,
  `beoordelingAanvulling` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beoordeling`
--

INSERT INTO `beoordeling` (`beoordelingID`, `beoordelingScore`, `beoordelingNaam`, `beoordelingAanvulling`) VALUES
(1, '5.0', 'Sander', 'Helemaal toppie');

-- --------------------------------------------------------

--
-- Table structure for table `bestellingen`
--

CREATE TABLE `bestellingen` (
  `bestellingID` int(11) NOT NULL,
  `fietsID` int(11) NOT NULL,
  `klantID` int(11) NOT NULL,
  `bestellingDatumBesteld` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bestellingen`
--

INSERT INTO `bestellingen` (`bestellingID`, `fietsID`, `klantID`, `bestellingDatumBesteld`) VALUES
(1, 0, 0, '2019-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `categorieen`
--

CREATE TABLE `categorieen` (
  `categorieID` int(11) NOT NULL,
  `categorieNaam` varchar(30) NOT NULL,
  `categorieBeschrijving` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorieen`
--

INSERT INTO `categorieen` (`categorieID`, `categorieNaam`, `categorieBeschrijving`) VALUES
(1, 'Mannen fietsen', 'Normale fietsen voor het mannelijk geslacht'),
(2, 'Vrouwen fietsen', 'Normale fietsen voor het vrouwelijk geslacht'),
(3, 'Kinder fietsen', 'Fietsen voor kinderen'),
(4, 'Unisex fietsen', 'Fietsen voor beide geslachten'),
(5, 'Vouw fietsen', 'Opvouwbare fietsen, voor bijvoorbeeld in de trein'),
(6, 'Elektrische mannen fietsen', 'Normale elektrische fietsen en speed pedelecs voor mannen'),
(7, 'Elektrische vrouwen fietsen', 'Normale elektrische fietsen en speed pedelecs voor vrouwen'),
(8, 'Driewiel fietsen', 'Fiets met drie wielen; elektrisch en gewoon'),
(9, 'Lig fietsen', 'Fiets met een liggende zitting'),
(10, 'Tandem fietsen', 'Fietsen met twee zittingen in verschillende configuraties');

-- --------------------------------------------------------

--
-- Table structure for table `fietsen`
--

CREATE TABLE `fietsen` (
  `fietsID` int(11) NOT NULL,
  `fietsNaam` varchar(100) NOT NULL,
  `fietsMerk` varchar(20) NOT NULL,
  `fietsModel` varchar(30) NOT NULL,
  `fietsFramemaat` int(11) NOT NULL,
  `fietsAantalVersnellingen` int(2) NOT NULL,
  `fietsBeschrijving` varchar(535) NOT NULL,
  `fietsPrijs` decimal(6,2) NOT NULL,
  `staatID` int(2) NOT NULL,
  `categorieID` int(2) NOT NULL,
  `actieID` int(5) NOT NULL,
  `fietsStatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fietsen`
--

INSERT INTO `fietsen` (`fietsID`, `fietsNaam`, `fietsMerk`, `fietsModel`, `fietsFramemaat`, `fietsAantalVersnellingen`, `fietsBeschrijving`, `fietsPrijs`, `staatID`, `categorieID`, `actieID`, `fietsStatus`) VALUES
(1, 'Nette Koga Myata', 'Koga', 'Myata', 59, 8, 'Zeer nette koga myata', '400.00', 1, 1, 0, 'verkocht');

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

CREATE TABLE `klanten` (
  `klantID` int(11) NOT NULL,
  `klantVoornaam` varchar(30) NOT NULL,
  `klantVoorvoegsels` varchar(10) NOT NULL,
  `klantAchternaam` varchar(50) NOT NULL,
  `klantEmail` varchar(200) NOT NULL,
  `klantTelefoon` varchar(10) NOT NULL,
  `klantWachtwoord` varchar(535) NOT NULL,
  `klantStraat` varchar(50) NOT NULL,
  `klantHuisnr` varchar(4) NOT NULL,
  `klantPlaats` varchar(20) NOT NULL,
  `klantPostcode` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klanten`
--

INSERT INTO `klanten` (`klantID`, `klantVoornaam`, `klantVoorvoegsels`, `klantAchternaam`, `klantEmail`, `klantTelefoon`, `klantWachtwoord`, `klantStraat`, `klantHuisnr`, `klantPlaats`, `klantPostcode`) VALUES
(1, 'Wouter', '', 'Gosseling', 'wouter.gosseling@student.graafschapcollege.nl', '0612220568', '1234', 'Doctor Ariënsstraat', '29', 'Ulft', '7071AH'),
(2, 'Ben', '', 'Weersink', 'ben.weersink@student.graafschapcollege.nl', '0655445995', '1234', 'Nijmansedijk', '10', 'Zelhem', '7021JB'),
(3, 'Lisa', '', 'Diks', 'lisa.diks@student.graafschapcollege.nl', '0631542582', '1234', '', '', '', ''),
(4, 'Sander', '', 'Weide', 'sander.weide@student.graafschapcollege.nl', '0624648462', '1234', '', '', '', ''),
(5, 'Thomas', 'den', 'Otter', 't.denotter@graafschapcollege.nl', '0653891697', '1234', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `staat`
--

CREATE TABLE `staat` (
  `staatID` int(11) NOT NULL,
  `staatNaam` varchar(15) NOT NULL,
  `staatBeschrijving` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesoires`
--
ALTER TABLE `accesoires`
  ADD PRIMARY KEY (`accesoireID`);

--
-- Indexes for table `acties`
--
ALTER TABLE `acties`
  ADD PRIMARY KEY (`actieID`);

--
-- Indexes for table `beoordeling`
--
ALTER TABLE `beoordeling`
  ADD PRIMARY KEY (`beoordelingID`);

--
-- Indexes for table `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`bestellingID`);

--
-- Indexes for table `categorieen`
--
ALTER TABLE `categorieen`
  ADD PRIMARY KEY (`categorieID`);

--
-- Indexes for table `fietsen`
--
ALTER TABLE `fietsen`
  ADD PRIMARY KEY (`fietsID`);

--
-- Indexes for table `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`klantID`);

--
-- Indexes for table `staat`
--
ALTER TABLE `staat`
  ADD PRIMARY KEY (`staatID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesoires`
--
ALTER TABLE `accesoires`
  MODIFY `accesoireID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acties`
--
ALTER TABLE `acties`
  MODIFY `actieID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beoordeling`
--
ALTER TABLE `beoordeling`
  MODIFY `beoordelingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `bestellingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categorieen`
--
ALTER TABLE `categorieen`
  MODIFY `categorieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fietsen`
--
ALTER TABLE `fietsen`
  MODIFY `fietsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `klanten`
--
ALTER TABLE `klanten`
  MODIFY `klantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staat`
--
ALTER TABLE `staat`
  MODIFY `staatID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
