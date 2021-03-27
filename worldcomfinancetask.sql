-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 01:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `worldcomfinancetask`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `name` text NOT NULL,
  `code` text NOT NULL,
  `postalCode` varchar(20) NOT NULL,
  `index` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`name`, `code`, `postalCode`, `index`) VALUES
('Brazil', 'BR', '01000-000', 1),
('France', 'FR', '01000', 2),
('Holland', 'NL', '1000', 3),
('Italy', 'IT', '00010', 4),
('Japan', 'JP', '100-0001', 5),
('Mexico', 'MX', '01000', 6),
('Phillippines', 'PH', '0400', 7),
('Russia', 'RU', '101000', 8),
('Spain', 'ES', '01001', 9),
('Sweden', 'SE', '10005', 10),
('Spain', 'ES', '52080', 14),
('Spain', 'ES', '01002', 15);

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `place` varchar(28) NOT NULL,
  `Cname` varchar(28) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`place`, `Cname`, `latitude`, `longitude`) VALUES
('Amsterdam', 'Holland', '52.374', '4.8897'),
('Borgo Santa Maria', 'Italy', '42.1531', '12.6809'),
('Casape', 'Italy', '41.9083', '12.8859'),
('Gallicano Nel Lazio', 'Italy', '41.8724', '12.8181'),
('Marcellina', 'Italy', '42.0263', '12.8067'),
('Melilla', 'Spain', '35.3167', '-2.95'),
('Monteflavio', 'Italy', '42.1092', '12.8297'),
('Montelibretti', 'Italy', '42.1354', '12.7381'),
('Montorio Romano', 'Italy', '42.1392', '12.8067'),
('Moricone', 'Italy', '42.1122', '12.775'),
('Poli', 'Italy', '41.8899', '12.893'),
('Pontelucano', 'Italy', '41.9595', '12.777'),
('San Gregorio Da Sassola', 'Italy', '41.9181', '12.8717'),
('San Polo Dei Cavalieri', 'Italy', '42.0108', '12.8411'),
('Setteville', 'Italy', '41.9449', '12.6513'),
('Setteville Di Guidonia', 'Italy', '41.9449', '12.6513'),
('Villa Adriana', 'Italy', '41.9549', '12.773'),
('Vitoria-Gasteiz', 'Spain', '42.85', '-2.6667');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place`(20));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `index` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
