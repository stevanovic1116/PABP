SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `isplate` (
  `id` int(11) NOT NULL,
  `id_stete` int(11) NOT NULL,
  `datum_isplate` date NOT NULL,
  `iznos_isplate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `osiguranici` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) NOT NULL,
  `prezime` varchar(100) NOT NULL,
  `jmbg` varchar(13) NOT NULL,
  `datum_rodjenja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `polise` (
  `id` int(11) NOT NULL,
  `broj_polise` varchar(20) NOT NULL,
  `id_osiguranika` int(11) NOT NULL,
  `datum_izdavanja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `stete` (
  `id` int(11) NOT NULL,
  `broj_stete` varchar(20) NOT NULL,
  `id_polise` int(11) NOT NULL,
  `datum_stete` date NOT NULL,
  `iznos_stete` decimal(10,2) NOT NULL,
  `opis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
ALTER TABLE `isplate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stete` (`id_stete`);
ALTER TABLE `osiguranici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jmbg` (`jmbg`);
ALTER TABLE `polise`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `broj_polise` (`broj_polise`),
  ADD KEY `id_osiguranika` (`id_osiguranika`);
ALTER TABLE `stete`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `broj_stete` (`broj_stete`),
  ADD KEY `id_polise` (`id_polise`);
ALTER TABLE `isplate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `osiguranici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `polise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `stete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `isplate`
  ADD CONSTRAINT `isplate_ibfk_1` FOREIGN KEY (`id_stete`) REFERENCES `stete` (`id`);
ALTER TABLE `polise`
  ADD CONSTRAINT `polise_ibfk_1` FOREIGN KEY (`id_osiguranika`) REFERENCES `osiguranici` (`id`);
ALTER TABLE `stete`
  ADD CONSTRAINT `stete_ibfk_1` FOREIGN KEY (`id_polise`) REFERENCES `polise` (`id`);
COMMIT;