-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2022 at 06:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `navigasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` varchar(30) NOT NULL,
  `suhu` varchar(6) NOT NULL,
  `kelembaban` varchar(6) NOT NULL,
  `alarm` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `suhu`, `kelembaban`, `alarm`) VALUES
('dvor/dme_mak', '0', '0', '0'),
('dvor/dme_mks', '0', '0', '0'),
('gp/dme_03', '0', '0', '0'),
('gp/dme_13', '0', '0', '0'),
('gp/dme_21', '0', '0', '0'),
('loc_03', '30.80', '65.00', '1'),
('loc_13', '0', '0', '0'),
('loc_21', '0', '0', '0'),
('mm_03', '0', '0', '0'),
('mm_13', '0', '0', '0'),
('mm_21', '0', '0', '0'),
('radar', '0', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
