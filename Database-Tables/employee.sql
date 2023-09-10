-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 10, 2023 at 02:25 AM
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
  `SIN_expiration` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `firstname`, `middlename`, `lastname`, `preferredname`, `gender`, `birthdate`, `country`, `province`, `city`, `address`, `unit`, `postalcode`, `email`, `mobile`, `homephone`, `SIN`, `SIN_expiration`, `UID`, `position`, `payclass`, `status`, `region`, `home_store`, `language`, `start_date`, `last_update`) VALUES
(1, 'A', '', 'Z', 'AAZ', 'Male', '1990-12-12', 'Canada', 'Quebec', 'Brossard', '1234 Random', '', 'J4J-1N1', 'kevin.chan@realfruitbubbletea.com', '514-561-0897', '', '265303625', 'N/A', 'QC199612', 'Store Manager', 'Hourly', 'Active', 'QUEBEC', 'MCP', 'English, French', '2020-03-28', '2023-09-07 12:07:10'),
(2, 'B', '', 'X', 'BBX', 'Male', '2000-07-10', 'Canada', 'Quebec', 'Montreal', '1234 Random', '', 'J4J-4J4', 'sam.chan@realfruitbubbletea.com', '514-812-2262', '', '265300624', 'N/A', 'QC200007', 'Cashier/Bartender', 'Hourly', 'Active', 'QUEBEC', 'FPC', 'English, French', '2022-03-28', '2023-09-07 12:07:02'),
(3, 'C', '', 'C', 'CCC', 'Male', '1990-01-10', 'Canada', 'Ontario', 'Montreal', '123 Random', '', 'A1A-1A1', 'li.chan@realfruitbubbletea.com', '514-552-5252', '', '265300625', '2023-12-08', 'QC199001', 'Store Manager', 'Hourly', 'Inactive', 'SW2', 'LR', 'English, Other', '2020-12-01', '2023-09-08 00:07:59'),
(4, 'D', '', 'V', 'DVD', 'Male', '1993-07-03', 'Canada', 'Quebec', 'Montreal', '1345 Random', '1', 'S2S-2S2', 'hi.chan@realfruitbubbletea.com', '514-200-2000', '', '889988998', 'N/A', 'VU811174', 'Store Manager', 'Hourly', 'Active', 'CENTRAL', '#39', 'English, Other', '2021-02-10', '2023-09-07 14:25:37'),
(5, 'E', '', 'B', 'EB', 'Male', '2000-02-18', 'United-States', 'New Jersey', 'Westly', '223 Random', '', '12232', 'p.chan@realfruitbubbletea.com', '', '', '789789789', '2023-12-20', 'MC670712', 'Cashier/Bartender', 'Hourly', 'Active', 'USA', 'CHM', 'English', '2020-10-10', '2023-09-07 14:28:53'),
(6, 'F', '', 'N', 'FN', 'Male', '2000-08-28', 'United-States', 'New Jersey', 'Brossard', '23 Random', '', '22344', 'm.chan@realfruitbubbletea.com', '', '', '789456456', 'N/A', 'PQ719794', 'Cashier/Bartender', 'Hourly', 'Active', 'USA', 'CHM', 'English', '2020-01-01', '2023-09-07 19:12:59'),
(7, 'G', '', 'M', 'GM', 'Female', '1990-12-12', 'Canada', 'Ontario', 'Brossard', '33 Rdandom', '', 'O4O-1N4', 'b.chan@realfruitbubbletea.com', '', '', '123321456', 'N/A', 'OW874562', 'Accounting', 'Hourly', 'Active', 'OTTAWA', 'BSC', 'English, Other', '2023-03-28', '2023-09-07 19:20:18'),
(8, 'Q', '', 'Q', 'QQ', 'Other', '1992-10-10', 'United-States', 'New Jersey', 'Asd', '10 Asr', '', '12345', 'QQ@realfruitbubbletea.com', '', '', '789785777', 'N/A', 'VS556028', 'Cashier/Bartender', 'Hourly', 'Inactive', 'USA', 'WBC', 'English', '2023-04-13', '2023-09-07 19:21:00'),
(9, 'Q', '', 'Q', 'Q2', 'Male', '2000-01-20', 'Canada', 'Ontario', 'Ard', '11 Laurebt', '', 'T4T-4T4', 'qq.@realfruitbubbletea.com', '', '', '565202565', 'N/A', 'GC424111', 'Accounting', 'Hourly', 'Active', 'CENTRAL', '#18', 'English, Other', '2023-04-15', '2023-09-07 19:23:53'),
(10, 'W', '', 'W', 'W2', 'Female', '1990-04-23', 'Canada', 'Ontario', 'ASD', '12 Str', '', 'A2A-2A2', 'WW@realfruitbubbletea.com', '', '', '505625505', 'N/A', 'GD668953', 'Multi-Unit Manager', 'Hourly', 'Active', 'CENTRAL', 'MKV', 'English, Other', '2023-04-15', '2023-09-07 19:24:19'),
(11, 'P', '', 'L', 'PL', 'Female', '2003-10-10', 'Canada', 'Ontario', 'SD', '805 PODS', '', 'O3O-3O3', 'pl@realfruitbubbletea.com', '', '', '707869823', 'N/A', 'NG913937', 'Human Resource', 'Hourly', 'Active', 'SW1', 'RW', 'English', '2023-04-15', '2023-09-07 19:25:45'),
(12, 'OP', 'O', 'P', 'OPPO', 'Other', '2000-02-20', 'Canada', 'Ontario', 'Toronto', '234 Richmond', '', 'F5F-5F5', 'oppo@realfruitbubbletea.com', '', '', '250303560', '2023-12-10', 'XG874039', 'Cashier/bartender', 'Hourly', 'Active', 'CENTRAL', 'AG', 'English, Other', '2023-09-08', '2023-09-08 00:59:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
