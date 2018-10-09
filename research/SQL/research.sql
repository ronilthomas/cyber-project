-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 13, 2018 at 11:13 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research`
--

-- --------------------------------------------------------

--
-- Table structure for table `tradusers`
--

CREATE TABLE `tradusers` (
  `userid` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(55) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tradusers`
--

INSERT INTO `tradusers` (`userid`, `username`, `password`, `email`, `active`) VALUES
(1, 'hayden', '$2y$10$t5j8RwX/P7PJOJoJvWivnuGVCNnPRlDDb4p15CVlw9w8AznWLNgmW', 'hayden@gmail.com', 0),
(2, 'nester', '$2y$10$U8VKjJFeAxDvqgVYaNfObObt3/4hv6NdpNYfvmcqJnQh8mWaBrpjK', 'nester@yahoo.com', 0),
(3, 'marie', '$2y$10$3RvpYdkkCH6Sn34B49.T0.//LvZ3P04Uj7kMTE.WDwH7o0snapBSW', 'marie@gmail.com', 0),
(4, 'sarah', '$2y$10$Gq7m7ZhGRf7N40Nl72mw0OuA3ZvPGzNr29bp7D8QJZ/nedQNojjcu', 'sarah@hotmail.com', 0),
(5, 'centra', '$2y$10$1JbPtwowPqjufuqs.F1PRuBYHmdUn2WaczMUyIgPHnFsas1D4RawW', 'centra@gmail.com', 0),
(6, 'sarah', '$2y$10$ZTrrHcX6EQ6pa.qj0W0UBut2w4RRpf0hjHVfTqtHPzrcHoV1Ovb8e', 'sarah@hotmail.com', 0),
(7, 'anthony', '$2y$10$f2MyMD5v/dCAZFPmWWxCSufFzMhQTMaRn9AoVomHPtEZKvCUJKZ7K', 'anthony@gmail.com', 0),
(8, 'donna', '$2y$10$TJtEtTbJ/EEyiIX967fRG.HSg/LQFh7htU8IX0s3G2LOTdlw.sZ8K', 'donna@h.com', 0),
(9, 'markov', '$2y$10$q6LtPJUryKrFPjlvGDDF4.gLrKdDgMBslmV17v85.GhgTjWN/oQru', 'markov@gmail.com', 0),
(10, 'tomtom', '$2y$10$MPMPn9ySenhMi0D0ijuaf.PHnFCEUGWTvaGw0qi/3Cn5eynuFuIv6', 'tomtom@gmail.com', 0),
(11, 'kevin', '$2y$10$GQTe6x2oy/iI717poQtH1OKXL6lzCjUFnxmX9njT9ScvA0vpG2Que', 'kevin@hotmail.com', 0),
(12, 'bretlee', '$2y$10$.9CN9JObSxINhzXAiAm7OO.OJcjpzbALPmb/3izme.sCmNo8ZGLl2', 'bretlee@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `active`) VALUES
(1, 'Thomas', 'thomas@gmail.com', 0),
(2, 'Ronil', 'ronil@yahoo.com', 0),
(3, 'George', 'george@gmail.com', 0),
(4, 'Jacob', 'jacob@hotmail.com', 0),
(5, 'centra', 'centra@gmail.com', 0),
(6, 'martin', 'martin@yahoo.com', 0),
(7, 'alison', 'alison@gmail.com', 0),
(8, 'patrick', 'patrick@yahoo.com', 0),
(9, 'jason', 'jason@gmail.com', 0),
(10, 'pascal', 'pascal@hotmail.com', 0),
(11, 'christian', 'christian@gmail.com', 0),
(12, 'esther', 'esther@gmail.com', 0),
(13, 'thomas', 'thomas@gmail.com', 0),
(14, 'thomas', 'thomas@gmail.com', 0),
(15, 'rishi', 'rishi@gmail.com', 0),
(16, 'tesco', 'tesco@gmail.com', 0),
(17, 'brett', 'brett@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tradusers`
--
ALTER TABLE `tradusers`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tradusers`
--
ALTER TABLE `tradusers`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
