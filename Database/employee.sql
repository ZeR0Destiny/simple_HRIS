-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 20, 2023 at 12:37 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rfbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `preferredname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `country` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `province` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `city` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `postalcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `homephone` varchar(255) NOT NULL,
  `SIN` varchar(255) NOT NULL,
  `SIN_exipration` varchar(255) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `payclass` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `region` varchar(255) NOT NULL,
  `home_store` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `SIN` (`SIN`),
  UNIQUE KEY `UID` (`UID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `firstname`, `middlename`, `lastname`, `preferredname`, `gender`, `birthdate`, `country`, `province`, `city`, `address`, `unit`, `postalcode`, `email`, `mobile`, `homephone`, `SIN`, `SIN_exipration`, `UID`, `position`, `payclass`, `status`, `region`, `home_store`, `language`, `start_date`, `last_update`) VALUES
(1, 'A', '', 'Z', 'AAZ', 'Male', '1996-12-13', 'Canada', 'Quebec', 'Brossard', '1345 Croissant Saturne', '', 'J4X-1N4', 'kevin.chan@realfruitbubbletea.com', '514-561-0897', '450-671-0897', '265303625', 'N/A', 'QC199612', 'Store Manager', 'Hourly', 'Active', 'Quebec', '', 'English', '2020-03-28', '2023-08-18 00:00:00'),
(2, 'B', '', 'X', 'BBX', 'Male', '2000-07-10', 'Canada', 'Quebec', 'Brossard', '1345 Croissant Saturne', '', 'J4X-1N4', 'sam.chan@realfruitbubbletea.com', '514-812-2262', '', '265300624', 'N/A', 'QC200007', 'Cashier/Bartender', 'Hourly', 'Active', 'Quebec', '', 'English, French', '2022-03-28', '2023-08-18 00:00:00'),
(3, 'C', '', 'C', 'CCC', 'Male', '1990-01-10', 'United-States', 'Quebec', 'Montreal', '123 Croissant', '', '25252', 'li.chan@realfruitbubbletea.com', '514-552-5252', '', '265300625', '2023-12-08', 'QC199001', 'Store Manager', 'Salary', 'Inactive', 'Quebec', '', 'French, Other', '2020-12-01', '2023-08-18 00:00:00'),
(4, 'D', '', 'V', 'DVD', 'Male', '1993-07-03', 'Canada', 'Quebec', 'Brossard', '1345 Croissant Saturne', '', 'J4X-1N4', 'hi.chan@realfruitbubbletea.com', '514-200-2000', '', '889988998', 'N/A', 'VU811174', 'Store Manager', 'Hourly', 'Inactive', 'Ontario', '', 'English', '2021-02-10', '2023-08-18 00:00:00'),
(5, 'E', '', 'B', '', 'Male', '2000-02-18', 'United-States', 'Quebec', 'Brossard', '1345 Croissant Saturne', '', '12345', 'p.chan@realfruitbubbletea.com', '', '', '789789789', '2023-12-20', 'MC670712', 'Cashier/Bartender', 'Hourly', 'Active', 'Ontario', '', 'English', '2020-10-10', '2023-08-18 00:00:00'),
(6, 'F', '', 'N', '', 'Male', '2000-08-28', 'Canada', 'Quebec', 'Brossard', '1345 Croissant Saturne', '', 'J4X-1N4', 'm.chan@realfruitbubbletea.com', '', '', '789456456', '0000-00-00', 'PQ719794', 'Cashier/Bartender', 'Hourly', 'Active', 'USA', '', '', '2020-01-01', '2023-08-18 00:00:00'),
(7, 'G', '', 'M', '', 'Female', '1990-12-12', 'Canada', 'Quebec', 'Brossard', '1345 Croissant Saturne', '', 'J4X-1N4', 'b.chan@realfruitbubbletea.com', '', '', '123321456', '0000-00-00', 'OW874562', '', 'Hourly', 'Active', 'Ontario', '', '', '2023-03-28', '2023-08-18 00:00:00'),
(8, 'Q', '', 'Q', '', 'Female', '1992-10-10', 'United-States', 'Asd', 'Asd', '10 Asr', '', '12345', 'QQ@realfruitbubbletea.com', '', '', '789785777', '0000-00-00', 'VS556028', 'Cashier/Bartender', 'Hourly', 'Active', 'Ottawa', '', '', '2023-04-13', '2023-08-18 00:00:00'),
(9, 'Q', '', 'Q', '', 'Male', '2000-01-20', 'Canada', 'Adc', 'Ard', '11 Laurebt', '', 'A2A-2D4', 'qq.@realfruitbubbletea.com', '', '', '565202565', '0000-00-00', 'GC424111', '', 'Hourly', 'Active', '', '', '', '2023-04-15', '2023-08-18 00:00:00'),
(10, 'W', '', 'W', '', 'Female', '1990-04-23', 'Canada', 'ASD', 'ASD', '12 Str', '', 'A2A-2A2', 'WW@realfruitbubbletea.com', '', '', '505625505', '0000-00-00', 'GD668953', '', 'Hourly', 'Active', '', '', '', '2023-04-15', '2023-08-18 00:00:00'),
(11, 'P', '', 'L', '', 'Female', '2003-10-10', 'United-States', 'SD', 'SD', '805 PODS', '', '442568', 'pl@realfruitbubbletea.com', '', '', '707869823', '0000-00-00', 'NG913937', '', 'Hourly', 'Active', '', '', '', '2023-04-15', '2023-08-18 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
