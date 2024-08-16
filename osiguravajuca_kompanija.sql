-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2024 at 07:28 PM
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
-- Database: `osiguravajuca_kompanija`
--

-- --------------------------------------------------------

--
-- Table structure for table `isplate`
--

CREATE TABLE `isplate` (
  `id` int(11) NOT NULL,
  `id_stete` int(11) NOT NULL,
  `datum_isplate` date NOT NULL,
  `iznos_isplate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `isplate`
--

INSERT INTO `isplate` (`id`, `id_stete`, `datum_isplate`, `iznos_isplate`) VALUES
(1, 1, '2024-05-02', 2400.00),
(2, 1, '2024-05-11', 2400.00),
(3, 1, '2024-05-12', 3600.00),
(4, 1, '2024-05-01', 2100.00),
(5, 1, '2024-05-30', 1600.00);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) NOT NULL,
  `prezime` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `datum_registracije` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `email`, `lozinka`, `datum_registracije`) VALUES
(13, 'vlada', '', 'vlada@gmail.com', '$2y$10$VsX8pDOUJ7Dd.FZGh/.lqujH9dFuhDbrV2QThxMTliz/UOIa6tYhq', '2024-05-24 14:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `osiguranici`
--

CREATE TABLE `osiguranici` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) NOT NULL,
  `prezime` varchar(100) NOT NULL,
  `jmbg` varchar(13) NOT NULL,
  `datum_rodjenja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `osiguranici`
--

INSERT INTO `osiguranici` (`id`, `ime`, `prezime`, `jmbg`, `datum_rodjenja`) VALUES
(1, 'Marko', 'Petrović', '010198478956', '1998-01-01'),
(2, 'Ana', 'Jovanović', '250695123456', '1995-06-25'),
(3, 'Stefan', 'Nikolić', '030378965412', '1978-03-03'),
(4, 'Jovana', 'Stojanović', '110490654789', '1990-04-11'),
(5, 'Milica', 'Đorđević', '071287963258', '1987-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `polisa`
--

CREATE TABLE `polisa` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `opis_polise` text DEFAULT NULL,
  `slika_polise` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `polisa`
--

INSERT INTO `polisa` (`id`, `naziv`, `opis_polise`, `slika_polise`) VALUES
(1, 'Osiguranje domaćinstva', 'Nikad sami u domu', 'img/osiguranjedomacinstva.jpg'),
(2, 'Osiguranje automobila', 'Nikad sami u vožnji', 'img/osiguranjeauta.jpg'),
(3, 'Putno osiguranje', 'Nikad sami na putovanju', 'img/putnoosiguranje.jpg'),
(4, 'Životno osiguranje', 'Nikad sami u životu', 'img/zivotnoosiguranje.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stete`
--

CREATE TABLE `stete` (
  `id` int(11) NOT NULL,
  `datum_stete` date NOT NULL,
  `vreme_stete` time NOT NULL,
  `mesto` varchar(255) NOT NULL,
  `drzava` varchar(255) NOT NULL,
  `povredjeni` enum('Da','Ne') NOT NULL,
  `ime` varchar(255) DEFAULT NULL,
  `prezime` varchar(255) DEFAULT NULL,
  `jmbg` varchar(13) DEFAULT NULL,
  `telefon` varchar(15) DEFAULT NULL,
  `opis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stete`
--

INSERT INTO `stete` (`id`, `datum_stete`, `vreme_stete`, `mesto`, `drzava`, `povredjeni`, `ime`, `prezime`, `jmbg`, `telefon`, `opis`) VALUES
(1, '2024-08-24', '12:03:00', 'Kragujevac', 'Srbija', 'Da', 'Petar', 'Petrovic', '12322555', '06928833333333', 'Branikasdasaddf'),
(11, '2024-08-16', '04:54:00', '5454', '54354', 'Da', '345', '1', '1', '1', '1'),
(13, '2024-09-05', '04:44:00', '44', '4', 'Da', '4', '42', '4', '4', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `isplate`
--
ALTER TABLE `isplate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stete` (`id_stete`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `osiguranici`
--
ALTER TABLE `osiguranici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jmbg` (`jmbg`);

--
-- Indexes for table `polisa`
--
ALTER TABLE `polisa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stete`
--
ALTER TABLE `stete`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `isplate`
--
ALTER TABLE `isplate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `osiguranici`
--
ALTER TABLE `osiguranici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `polisa`
--
ALTER TABLE `polisa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stete`
--
ALTER TABLE `stete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `isplate`
--
ALTER TABLE `isplate`
  ADD CONSTRAINT `isplate_ibfk_1` FOREIGN KEY (`id_stete`) REFERENCES `stete` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
