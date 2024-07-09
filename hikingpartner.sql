-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 09:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hikingpartner`
--

-- --------------------------------------------------------

--
-- Table structure for table `admini`
--

CREATE TABLE `admini` (
  `adminId` int(10) NOT NULL,
  `korisnickoIme` varchar(250) NOT NULL,
  `lozinka` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admini`
--

INSERT INTO `admini` (`adminId`, `korisnickoIme`, `lozinka`) VALUES
(1, 'nemanja', 'jedan');

-- --------------------------------------------------------

--
-- Table structure for table `aktivnosti`
--

CREATE TABLE `aktivnosti` (
  `aktivnostId` int(11) NOT NULL,
  `nazivAktivnosti` varchar(250) NOT NULL,
  `datumPocetka` date NOT NULL,
  `trajanje` time NOT NULL,
  `opis` varchar(250) NOT NULL,
  `lokacija` varchar(250) NOT NULL,
  `tipAktivnostiId` int(10) NOT NULL,
  `korisnikId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aktivnosti`
--

INSERT INTO `aktivnosti` (`aktivnostId`, `nazivAktivnosti`, `datumPocetka`, `trajanje`, `opis`, `lokacija`, `tipAktivnostiId`, `korisnikId`) VALUES
(6, 'dawda', '2024-06-21', '06:22:08', 'dawda', 'dwad', 2, 7),
(7, 'dwad', '2024-06-20', '08:18:00', 'dadawd', 'Cacak', 1, 7),
(8, 'sada', '2024-06-30', '03:21:00', 'sada', 'Beograd', 1, 7),
(9, 'novo', '2024-06-28', '02:17:00', 'najnovije', 'Kraljevo', 2, 7),
(10, 'novi dan', '2024-06-25', '03:05:00', 'dan posle sutra', 'Beograd', 3, 7),
(15, 'moranje', '2024-06-21', '04:20:00', 'moranje2', 'Cacak', 1, 7),
(16, 'pet', '2024-07-01', '02:00:00', 'pet', 'Kragujevac', 3, 7),
(17, 'dan', '2024-07-25', '11:14:00', 'dandan', 'Beograd', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `clanoviaktivnosti`
--

CREATE TABLE `clanoviaktivnosti` (
  `clanoviAktivnostiId` int(11) NOT NULL,
  `korisnikId` int(10) NOT NULL,
  `aktivnostId` int(10) NOT NULL,
  `naziv` varchar(250) NOT NULL,
  `pridruzeniClan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clanoviaktivnosti`
--

INSERT INTO `clanoviaktivnosti` (`clanoviAktivnostiId`, `korisnikId`, `aktivnostId`, `naziv`, `pridruzeniClan`) VALUES
(4, 7, 16, 'pet', 'Marko Milanovic'),
(5, 7, 10, 'novi dan', 'Marko Milanovic'),
(6, 12, 6, 'dawda', 'Marko Milanovic'),
(7, 12, 8, 'sada', 'Marko Milanovic'),
(8, 12, 10, 'novi dan', 'janko'),
(9, 12, 15, 'moranje', 'janko'),
(10, 12, 7, 'dwad', 'janko'),
(11, 7, 9, 'novo', 'Marko Milanovic'),
(12, 12, 16, 'pet', 'janko'),
(13, 12, 9, 'novo', 'janko'),
(14, 12, 17, 'dan', 'Marko Milanovic'),
(15, 7, 7, 'dwad', 'Marko Milanovic');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnikId` int(10) NOT NULL,
  `imePrezime` varchar(250) NOT NULL,
  `mejlAdresa` varchar(250) NOT NULL,
  `sifra` varchar(250) NOT NULL,
  `telefon` varchar(250) NOT NULL,
  `pol` varchar(250) NOT NULL,
  `interesovanje` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnikId`, `imePrezime`, `mejlAdresa`, `sifra`, `telefon`, `pol`, `interesovanje`) VALUES
(7, 'Marko Milanovic', 'marko@gmail.com', 'jedan', '0621592166', 'muski', 'planinarenje'),
(12, 'janko', 'janko@gmail.com', 'dva', '12354376545', 'zenski', 'biciklizam');

--
-- Triggers `korisnik`
--
DELIMITER $$
CREATE TRIGGER `after_korisnik_delete` AFTER DELETE ON `korisnik` FOR EACH ROW BEGIN
    DELETE FROM aktivnosti WHERE korisnikId = OLD.korisnikId;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tipaktivnosti`
--

CREATE TABLE `tipaktivnosti` (
  `tipId` int(10) NOT NULL,
  `naziv` varchar(250) NOT NULL,
  `opis` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipaktivnosti`
--

INSERT INTO `tipaktivnosti` (`tipId`, `naziv`, `opis`) VALUES
(1, 'Trcanje', 'Trail trcanje, polumaraton, maraton, frtalj maraton, ultramaraton'),
(2, 'Planinarenje', 'Planinarenje u globalnom smislu, jutarnje, vecernje, visoke nadmorske visine, niske, amatersko i profesionalno planinarenje'),
(3, 'Biciklizam', 'Amaterska voznja bicikla, organizovane trke, lige Srbije u biciklizmu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admini`
--
ALTER TABLE `admini`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `aktivnosti`
--
ALTER TABLE `aktivnosti`
  ADD PRIMARY KEY (`aktivnostId`),
  ADD KEY `FK_tipAktivnostiId` (`tipAktivnostiId`),
  ADD KEY `FK_korisnikId` (`korisnikId`);

--
-- Indexes for table `clanoviaktivnosti`
--
ALTER TABLE `clanoviaktivnosti`
  ADD PRIMARY KEY (`clanoviAktivnostiId`),
  ADD KEY `FK_korisnikIdClan` (`korisnikId`),
  ADD KEY `FK_aktivnostIdClan` (`aktivnostId`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnikId`);

--
-- Indexes for table `tipaktivnosti`
--
ALTER TABLE `tipaktivnosti`
  ADD PRIMARY KEY (`tipId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admini`
--
ALTER TABLE `admini`
  MODIFY `adminId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aktivnosti`
--
ALTER TABLE `aktivnosti`
  MODIFY `aktivnostId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `clanoviaktivnosti`
--
ALTER TABLE `clanoviaktivnosti`
  MODIFY `clanoviAktivnostiId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnikId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tipaktivnosti`
--
ALTER TABLE `tipaktivnosti`
  MODIFY `tipId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktivnosti`
--
ALTER TABLE `aktivnosti`
  ADD CONSTRAINT `FK_korisnikId` FOREIGN KEY (`korisnikId`) REFERENCES `korisnik` (`korisnikId`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_tipAktivnostiId` FOREIGN KEY (`tipAktivnostiId`) REFERENCES `tipaktivnosti` (`tipId`);

--
-- Constraints for table `clanoviaktivnosti`
--
ALTER TABLE `clanoviaktivnosti`
  ADD CONSTRAINT `FK_aktivnostIdClan` FOREIGN KEY (`aktivnostId`) REFERENCES `aktivnosti` (`aktivnostId`),
  ADD CONSTRAINT `FK_korisnikIdClan` FOREIGN KEY (`korisnikId`) REFERENCES `korisnik` (`korisnikId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
