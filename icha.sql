-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 12:33 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icha`
--

-- --------------------------------------------------------

--
-- Table structure for table `ichaorder`
--

CREATE TABLE `ichaorder` (
  `idOr` int(11) NOT NULL,
  `dateOrder` date NOT NULL,
  `idMenu` int(11) NOT NULL,
  `idMem` int(11) NOT NULL,
  `payWith` text COLLATE utf8_unicode_ci NOT NULL,
  `topping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ichaorder`
--

INSERT INTO `ichaorder` (`idOr`, `dateOrder`, `idMenu`, `idMem`, `payWith`, `topping`) VALUES
(1, '2019-10-24', 1, 3, 'cash', 4),
(2, '2019-10-29', 2, 3, 'cash', 4),
(3, '2019-10-25', 8, 2, 'cash', 11),
(4, '2019-10-25', 9, 2, 'cash', 11),
(5, '2019-10-25', 10, 1, 'cash', 11),
(6, '2019-10-29', 7, 2, 'cash', 12),
(7, '2019-10-25', 7, 2, 'cash', 4),
(8, '2019-10-25', 8, 1, 'cash', 12),
(9, '2019-10-30', 10, 3, 'free', 15),
(10, '2019-10-25', 2, 2, 'free', 11),
(11, '2019-10-30', 2, 1, 'free', 11),
(12, '2019-10-30', 3, 2, 'cash', 0),
(13, '2019-10-30', 6, 2, 'cash', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `idLog` int(11) NOT NULL,
  `user` text COLLATE utf8_unicode_ci NOT NULL,
  `dateLog` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `idMem` int(11) NOT NULL,
  `user` text COLLATE utf8_unicode_ci NOT NULL,
  `pin` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `point` int(11) NOT NULL DEFAULT '0',
  `date_signin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idMem`, `user`, `pin`, `point`, `date_signin`) VALUES
(1, 'NumWan', '230', 2, '2019-10-25'),
(2, 'NiceIt', '119', 4, '2019-10-25'),
(3, 'JoyIT', '089', 2, '2019-10-25'),
(9, 'nit', '214', 1, '2019-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `IdMenu` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `kind` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `point` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`IdMenu`, `name`, `kind`, `price`, `point`) VALUES
(0, ' ', ' topping', 0, 1),
(1, 'à¸Šà¸²à¸™à¸¡à¸¡à¸­à¸¥à¸•à¹Œ', 'chanom', 25, 1),
(2, 'à¸Šà¸²à¸™à¸¡à¹„à¸‚à¹ˆà¸¡à¸¸à¸', 'chanom', 20, 1),
(3, 'à¸Šà¸²à¸™à¸¡à¸Šà¹‡à¸­à¸à¹‚à¸à¹à¸¥à¸•', 'chanom', 25, 1),
(4, 'à¸šà¸¸à¸', 'topping', 5, 0),
(5, 'à¸Šà¸²à¸¥à¸´à¹‰à¸™à¸ˆà¸µà¹ˆ', 'chanom', 20, 1),
(6, 'à¸Šà¸²à¹„à¸—à¸¢à¹„à¸‚à¹ˆà¸¡à¸¸à¸', 'chanom', 20, 1),
(7, 'à¸Šà¸²à¸™à¸¡à¹‚à¸à¹‚à¸à¹‰', 'chanom', 25, 1),
(8, 'à¸Šà¸²à¸à¸¸à¸«à¸¥à¸²à¸š', 'chanom', 20, 1),
(9, 'à¸Šà¸ªà¸™à¸¡à¸ªà¸•à¸­à¹€à¸šà¸­à¸£à¹Œà¸£à¸µà¹ˆ', 'chanom', 25, 1),
(10, 'à¸Šà¸²à¹€à¸‚à¸µà¸¢à¸§à¸Šà¸²à¸™à¸¡', 'chanom', 25, 1),
(11, 'à¸ªà¸²à¸¢à¸£à¸¸à¹‰à¸‡', 'topping', 5, 0),
(12, 'à¸Ÿà¸£à¸¸à¹Šà¸•à¸•à¸µà¹‰', 'topping', 5, 0),
(13, 'à¹„à¸‚à¹ˆà¸¡à¸¸à¸', 'topping', 5, 0),
(14, 'à¹„à¸‚à¹ˆà¸¡à¸¸à¸à¹‚à¸¢à¹€à¸à¸£à¸´à¹Œà¸•', 'topping', 5, 0),
(15, 'à¹„à¸‚à¹ˆà¸¡à¸¸à¸à¸¥à¸´à¹‰à¸™à¸ˆà¸µà¹ˆ', 'topping', 5, 0),
(16, 'à¹„à¸‚à¹ˆà¸¡à¸¸à¸à¸¥à¸´à¹‰à¸™à¸ˆà¸µà¹ˆ', 'topping', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `idOwn` int(11) NOT NULL,
  `user` text COLLATE utf8_unicode_ci NOT NULL,
  `pass` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`idOwn`, `user`, `pass`, `status`) VALUES
(1, 'ichaAdmin', '12345', 'Administator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ichaorder`
--
ALTER TABLE `ichaorder`
  ADD PRIMARY KEY (`idOr`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLog`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idMem`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`IdMenu`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`idOwn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ichaorder`
--
ALTER TABLE `ichaorder`
  MODIFY `idOr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `idMem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `IdMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `idOwn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
