-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2021 at 07:31 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ambulance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `Admin_name` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `Admin_name`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `v_id` varchar(6) NOT NULL,
  `area` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`v_id`, `area`) VALUES
('V001', 'hauz village'),
('V001', 'rak village'),
('v004', 'ghipr'),
('v004', 'hhh village');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `d_id` int(11) NOT NULL,
  `driver_name` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `v_id` varchar(4) NOT NULL,
  `assist_name` varchar(20) NOT NULL,
  `contact` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`d_id`, `driver_name`, `Password`, `city`, `state`, `country`, `v_id`, `assist_name`, `contact`) VALUES
(1001, 'akhil', 'akhil1001', 'chennai', 'tamil nadu', 'india', 'V001', 'raju', '1234567890'),
(1002, 'saurabh', 'saurabh1002', 'coimbatore', 'tamilnadu', 'india', 'V003', 'shiva', '0000000111'),
(1004, 'king', 'king1004', 'tirchy', 'tamilnadu', 'india', 'v004', 'poiuyt', '3939390202'),
(1005, 'ramesh', 'ramesh1005', 'vellore', 'tamilnadu', 'india', 'V007', 'amarnath', '5647839201'),
(1003, 'raghul', 'raghul1003', 'pondicherry', 'pondicherry', 'india', 'V009', 'qwerty', '9999999991'),
(1010, 'yt', 'yt123', 'cuddalore', 'tamilnadu', 'india', 'V012', 'hsdghsdu', '778898889');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `h_id` varchar(6) NOT NULL,
  `h_user` varchar(15) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `hospital_name` varchar(100) NOT NULL,
  `h_contact` varchar(11) NOT NULL,
  `area` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `beds` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`h_id`, `h_user`, `Password`, `hospital_name`, `h_contact`, `area`, `city`, `state`, `country`, `pin`, `beds`) VALUES
('505', 'hospital', 'hospital', 'Health aid hospital', '1600565789', 'hauz village', 'chennai', 'tamil nadu', 'india', '5467382', 1000),
('506', 'hello', 'hello', 'hello health line hosspital', '0101901090', 'kjh', 'hjklo', 'koko', 'inin', '797979', 9),
('510', 'life', 'life', 'lifeline hospital', '09090909090', 'anna salai', 'vellore', 'tamilnadu', 'india', '111111', 108);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `v_id` varchar(4) NOT NULL,
  `v_no` varchar(15) NOT NULL,
  `last_service` date NOT NULL,
  `action` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`v_id`, `v_no`, `last_service`, `action`) VALUES
('V001', 'TN BX1234', '2021-07-15', 'IN SERVICE'),
('V003', 'tn th 9090', '2021-06-20', 'IN SERVICE'),
('v004', 'bt fd 5409', '2021-08-07', 'IN SERVICE'),
('V007', 'py bt 4321', '2021-06-28', 'AVAILABLE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD UNIQUE KEY `v_id` (`v_id`,`area`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`v_id`),
  ADD UNIQUE KEY `d_id` (`d_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD UNIQUE KEY `h_id` (`h_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`v_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
