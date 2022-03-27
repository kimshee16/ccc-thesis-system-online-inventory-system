-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 08:31 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccc_inventorysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

CREATE TABLE `activitylog` (
  `id` int(20) NOT NULL,
  `personincharge` varchar(100) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activitylog`
--

INSERT INTO `activitylog` (`id`, `personincharge`, `activity`, `datetime`) VALUES
(111, 'Lielanie Barrion', 'Login', '2019-03-28 00:54:25'),
(112, 'Lielanie Barrion', 'Login', '2019-03-28 16:34:56'),
(113, 'Lielanie Barrion', 'Login', '2019-03-28 16:35:35'),
(114, 'Kim Yves Ramirez', 'Login', '2019-03-28 16:35:53'),
(115, 'Lielanie Barrion', 'Login', '2019-03-28 16:36:13'),
(116, 'Lielanie Barrion', 'Login', '2019-03-29 00:10:43'),
(117, 'Lielanie Barrion', 'Login', '2019-03-29 00:42:17'),
(118, 'Kristian Alcantara', 'Login', '2019-03-29 00:42:36'),
(119, 'Lielanie Barrion', 'Login', '2019-03-29 00:44:39'),
(120, 'Kristian Alcantara', 'Login', '2019-03-29 01:01:26'),
(121, 'Lielanie Barrion', 'Login', '2019-03-29 01:02:03'),
(122, 'Lielanie Barrion', 'Approve equipment borrow request', '2019-03-29 01:09:35'),
(123, 'Lielanie Barrion', 'Approve equipment borrow request', '2019-03-29 01:09:43'),
(124, 'Lielanie Barrion', 'Approve equipment borrow request', '2019-03-29 01:09:53'),
(125, 'Lielanie Barrion', 'Login', '2019-03-29 01:13:09'),
(126, 'Kim Yves Ramirez', 'Login', '2019-03-29 01:17:06'),
(127, 'Lielanie Barrion', 'Login', '2019-03-29 01:17:27'),
(128, 'Lielanie Barrion', 'Approve equipment borrow request', '2019-03-29 01:47:10'),
(129, 'Kristian Alcantara', 'Login', '2019-03-29 02:23:15'),
(130, 'Lielanie Barrion', 'Login', '2019-03-29 02:23:44'),
(131, 'Kim Yves Ramirez', 'Login', '2019-03-29 11:00:35'),
(132, 'Lielanie Barrion', 'Login', '2019-03-29 11:01:11'),
(133, 'Lielanie Barrion', 'Login', '2019-03-29 11:04:41'),
(134, 'Lielanie Barrion', 'Approve equipment borrow request', '2019-03-29 11:10:43'),
(135, 'Lielanie Barrion', 'Approve equipment borrow request', '2019-03-29 11:13:56'),
(136, 'Kristian Alcantara', 'Login', '2019-03-29 11:19:40'),
(137, 'Lielanie Barrion', 'Login', '2019-03-29 11:20:09'),
(138, 'Lielanie Barrion', 'Login', '2019-03-29 11:26:31'),
(139, 'Lielanie Barrion', 'Login', '2019-03-29 12:04:04'),
(140, 'Kim Yves Ramirez', 'Login', '2019-03-29 12:07:36'),
(141, 'Lielanie Barrion', 'Login', '2019-03-29 12:08:13'),
(142, 'Kim Yves Ramirez', 'Login', '2019-03-29 13:20:02'),
(143, 'Kristian Alcantara', 'Login', '2019-03-29 13:21:24'),
(144, 'Jayvee Banal', 'Login', '2019-03-29 13:23:33'),
(145, 'Lielanie Barrion', 'Login', '2019-03-29 13:23:53'),
(146, 'Kristian Alcantara', 'Login', '2019-03-29 13:28:05'),
(147, 'Lielanie Barrion', 'Login', '2019-03-29 13:38:39'),
(148, 'Lielanie Barrion', 'Login', '2019-03-29 13:42:11'),
(149, 'Lielanie Barrion', 'Login', '2019-03-29 14:15:14'),
(150, 'Lielanie Barrion', 'Login', '2019-03-29 14:21:42'),
(151, 'Kristian Alcantara', 'Login', '2019-03-29 14:49:00'),
(152, 'Lielanie Barrion', 'Login', '2019-03-29 14:49:28'),
(153, 'Lielanie Barrion', 'Login', '2019-03-29 14:53:06'),
(154, 'Kristian Alcantara', 'Login', '2019-03-29 14:54:07'),
(155, 'Lielanie Barrion', 'Login', '2019-03-29 14:56:24'),
(156, 'Kristian Alcantara', 'Login', '2019-03-29 15:06:01'),
(157, 'Kristian Alcantara', 'Login', '2019-03-29 15:11:06'),
(158, 'Lielanie Barrion', 'Login', '2019-03-29 15:11:35'),
(159, 'Kristian Alcantara', 'Login', '2019-03-29 15:17:45'),
(160, 'Lielanie Barrion', 'Login', '2019-03-29 15:18:16'),
(161, 'Kristian Alcantara', 'Login', '2019-03-29 15:18:50'),
(162, 'Lielanie Barrion', 'Login', '2019-03-29 15:19:36'),
(163, 'Lielanie Barrion', 'Generate barcode for personnels', '2019-03-29 15:20:58'),
(164, 'Kristian Alcantara', 'Login', '2019-03-29 15:21:42'),
(165, 'Tian', 'Login', '2019-03-29 15:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `borrowitem`
--

CREATE TABLE `borrowitem` (
  `id` int(20) NOT NULL,
  `itemborrowed` varchar(50) NOT NULL,
  `itemcode` varchar(50) NOT NULL,
  `quantity` int(20) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `personincharge` varchar(50) NOT NULL,
  `idnum` varchar(50) NOT NULL,
  `daterequested` datetime NOT NULL,
  `dateapproved` datetime NOT NULL,
  `datetobeclaimed` datetime NOT NULL,
  `approvedby` varchar(100) NOT NULL,
  `dateclaimed` datetime NOT NULL,
  `datereturned` datetime NOT NULL,
  `b_status` int(10) NOT NULL COMMENT '0=pending 1=approved 2=claimed 3=returned'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowitem`
--

INSERT INTO `borrowitem` (`id`, `itemborrowed`, `itemcode`, `quantity`, `reason`, `personincharge`, `idnum`, `daterequested`, `dateapproved`, `datetobeclaimed`, `approvedby`, `dateclaimed`, `datereturned`, `b_status`) VALUES
(13, 'Printer-HP Deskjet 2515', '1000001', 1, 'Printing purposes', 'Jayvee Banal', '2015-00453', '2018-12-22 10:22:43', '2018-12-31 12:35:13', '2019-01-03 12:35:13', 'Lielanie Barrion', '2019-01-05 01:45:33', '2019-01-05 01:47:29', 3),
(18, 'Projector-Optima', '1000003', 1, 'Event', 'Kim Yves Ramirez', '2011-00117', '2019-03-11 09:17:40', '2019-03-21 09:54:16', '2019-03-24 09:54:16', 'Lielanie Barrion', '2019-03-26 03:40:42', '2019-03-26 03:41:44', 3),
(19, 'Projector-ACER', '0', 1, 'Event', 'Jayvee Banal', '0', '2019-03-26 03:36:16', '2019-03-27 15:41:49', '2019-03-30 15:41:49', 'Lielanie Barrion', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(20, 'Printer-HP Deskjet 2515', '0', 1, 'Printing exams', 'Kim Yves Ramirez', '0', '2019-03-28 04:36:07', '2019-03-28 16:36:21', '2019-03-29 16:36:21', 'Lielanie Barrion', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(22, 'Projector-Optima', '0', 1, 'Event', 'Kristian Alcantara', '0', '2019-03-29 01:01:52', '2019-03-29 11:15:19', '2019-03-30 11:15:19', 'Lielanie Barrion', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dept_request`
--

CREATE TABLE `dept_request` (
  `id` int(20) NOT NULL,
  `name_desc` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `personincharge` varchar(50) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `daterequested` datetime NOT NULL,
  `r_status` int(11) NOT NULL COMMENT '0=pending 1=approved 2=rejected'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_request`
--

INSERT INTO `dept_request` (`id`, `name_desc`, `quantity`, `unit`, `personincharge`, `purpose`, `daterequested`, `r_status`) VALUES
(8, 'Zonrox, 1L', 1, 'btls', 'Kim Yves Ramirez', 'Cleaning', '2019-03-29 01:17:21', 1),
(9, 'Muriatic, 1L', 1, 'btls', 'Kim Yves Ramirez', 'Cleaning', '2019-03-29 11:01:04', 1),
(10, 'Zonrox, 1L', 1, 'btls', 'Kristian Alcantara', 'Cleaning', '2019-03-29 11:20:04', 1),
(11, 'Muriatic, 1L', 5, 'btls', 'Kristian Alcantara', 'Cleaning', '2019-03-29 01:22:55', 1),
(12, 'Zonrox, 1L', 1, 'btls', 'Kristian Alcantara', 'Cleaning', '2019-03-29 03:11:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fixedassets`
--

CREATE TABLE `fixedassets` (
  `id` int(20) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `quantity` int(20) NOT NULL,
  `location` varchar(50) NOT NULL,
  `personincharge` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fixedassets`
--

INSERT INTO `fixedassets` (`id`, `barcode`, `itemname`, `description`, `quantity`, `location`, `personincharge`, `status`) VALUES
(1, '1000001', 'Printer-HP Deskjet 2515', 'equipment', 1, 'VPA', 'Lielanie Barrion', 'functioning'),
(2, '1000002', 'Projector-ACER', 'equipment', 1, 'VPAA', 'Ronald Gonzales', 'functioning'),
(3, '1000003', 'Projector-Optima', 'equipment', 1, 'VPA', 'Lielanie Barrion', 'functioning');

-- --------------------------------------------------------

--
-- Table structure for table `fixedassets_receive`
--

CREATE TABLE `fixedassets_receive` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `quantity` int(20) NOT NULL,
  `receiving_date` date NOT NULL,
  `receiver_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fixedassets_request`
--

CREATE TABLE `fixedassets_request` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `quantity` int(20) NOT NULL,
  `requesting_date` date NOT NULL,
  `requestor_name` varchar(100) NOT NULL,
  `req_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fixedassets_unreceive`
--

CREATE TABLE `fixedassets_unreceive` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `quantity` int(50) NOT NULL,
  `person_to_receive` varchar(100) NOT NULL,
  `posting_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventorydate`
--

CREATE TABLE `inventorydate` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventorydate`
--

INSERT INTO `inventorydate` (`id`, `date`) VALUES
(1, '2019-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(22) NOT NULL,
  `name` varchar(50) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pswd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `uname`, `pswd`) VALUES
(1, 'Lielanie Barrion', 'admin', '1234'),
(2, 'Kim Ramirez', 'ramirezkimyves', 'sheenahkim16');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` int(11) NOT NULL,
  `office` varchar(500) NOT NULL,
  `personincharge` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `office`, `personincharge`) VALUES
(1, 'Office of the President', 'Phoebe Sese'),
(2, 'VPA', 'Lielanie Barrion'),
(3, 'VPAA', 'Ronald Gonzales'),
(4, 'Registrar', 'Mary Rose Montano'),
(5, 'OSA', 'Arlou Fernando'),
(6, 'DCE', 'Arwie Fernando'),
(7, 'DASTE', 'Neil Aligam'),
(8, 'DBE', 'Ellen Almoro');

-- --------------------------------------------------------

--
-- Table structure for table `personincharge`
--

CREATE TABLE `personincharge` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `idnum` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpnum` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personincharge`
--

INSERT INTO `personincharge` (`id`, `name`, `position`, `dept`, `idnum`, `username`, `password`, `email`, `cpnum`) VALUES
(1, 'Kim Yves Ramirez', 'student', 'DCE', '2011-00117', 'kimshee', 'sheenah', 'ramirezkyl@gmail.com', '09168414946'),
(2, 'Jayvee Banal', 'student', 'DCE', '2015-00453', 'jayvee', 'jayvee', 'jayveebanal@gmail.com', '09165243216'),
(3, 'Kristian Alcantara', 'Professor', 'DCE', '2015-00654', 'tian', 'tian', 'kristianalcantara@gmail.com', '09066541234'),
(5, 'Joshua Malibong', 'Director', 'DCE', '2015-00131', 'joshua', '1111', 'joshuamalibong@gmail.com', '09156231234'),
(6, 'Tian', 'Director', 'DASTE', '1001-00001', 'tiane', 'tiane', 'tian@yahoo.com', '09111231234');

-- --------------------------------------------------------

--
-- Table structure for table `physical_inventory`
--

CREATE TABLE `physical_inventory` (
  `id` int(20) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `quantity` int(20) NOT NULL,
  `location` varchar(50) NOT NULL,
  `personincharge` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `inventorydate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `physical_inventory`
--

INSERT INTO `physical_inventory` (`id`, `barcode`, `name`, `description`, `quantity`, `location`, `personincharge`, `status`, `inventorydate`) VALUES
(1, '1000001', 'Printer-HP Deskjet 2515', 'equipment', 1, 'Office of the President', 'Phoebe Sese', 'functioning', '2019-03-26'),
(3, '1000002', 'Projector-ACER', 'equipment', 2, 'Office of the President', 'Phoebe Sese', 'functioning', '2019-03-26'),
(4, '1000003', 'Projector-Optima', 'equipment', 2, 'Office of the President', 'Phoebe Sese', 'functioning', '2019-03-26'),
(5, '1000003', 'Projector-Optima', 'equipment', 2, 'VPA', 'Lielanie Barrion', 'functioning', '2019-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `requester_status`
--

CREATE TABLE `requester_status` (
  `id` int(20) NOT NULL,
  `personincharge` varchar(50) NOT NULL,
  `ar_status` varchar(500) NOT NULL,
  `supplyorequipment` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reserveday`
--

CREATE TABLE `reserveday` (
  `id` int(11) NOT NULL,
  `numday` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserveday`
--

INSERT INTO `reserveday` (`id`, `numday`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` int(20) NOT NULL,
  `name_desc` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `itemcode` varchar(50) NOT NULL,
  `batchnumber` int(100) NOT NULL,
  `location` varchar(500) NOT NULL,
  `receivingperson` varchar(500) NOT NULL,
  `receivingdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `name_desc`, `unit`, `quantity`, `itemcode`, `batchnumber`, `location`, `receivingperson`, `receivingdate`) VALUES
(13, 'Muriatic, 1L', 'btls', 0, '1000001', 1, 'VPA', 'Lielanie Barrion', '2019-03-28'),
(15, 'Muriatic, 1L', 'btls', 4, '1000001', 2, 'VPA', 'Lielanie Barrion', '2019-03-28'),
(16, 'Zonrox, 1L', 'btls', 27, '1000001', 1, 'VPA', 'Lielanie Barrion', '2019-03-28'),
(17, 'Zonrox, 1L', 'btls', 30, '1000001', 2, 'VPA', 'Lielanie Barrion', '2019-03-28'),
(20, 'Zonrox, 1L', 'btls', 27, '1000001', 1, 'DCE', 'Kim Yves Ramirez', '2019-03-29'),
(21, 'Muriatic, 1L', 'btls', 0, '1000001', 1, 'DCE', 'Kim Yves Ramirez', '2019-03-29'),
(22, 'Zonrox, 1L', 'btls', 27, '1000001', 1, 'DCE', 'Kristian Alcantara', '2019-03-29'),
(23, 'Muriatic, 1L', 'btls', 5, '1000001', 1, 'DCE', 'Kristian Alcantara', '2019-03-29'),
(24, 'Zonrox, 1L', 'btls', 1, '1000001', 1, 'DCE', 'Kristian Alcantara', '2019-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `supplies_receive`
--

CREATE TABLE `supplies_receive` (
  `id` int(11) NOT NULL,
  `name_desc` varchar(100) NOT NULL,
  `quantity` int(20) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `receiving_date` date NOT NULL,
  `receiver_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplies_receive`
--

INSERT INTO `supplies_receive` (`id`, `name_desc`, `quantity`, `unit`, `receiving_date`, `receiver_name`) VALUES
(15, 'Muriatic, 1L', 6, 'btls', '2019-03-28', 'Lielanie Barrion'),
(17, 'Muriatic, 1L', 4, 'btls', '2019-03-28', 'Lielanie Barrion'),
(18, 'Zonrox, 1L', 30, 'btls', '2019-03-28', 'Lielanie Barrion'),
(19, 'Zonrox, 1L', 30, 'btls', '2019-03-28', 'Lielanie Barrion');

-- --------------------------------------------------------

--
-- Table structure for table `supplies_request`
--

CREATE TABLE `supplies_request` (
  `id` int(11) NOT NULL,
  `name_desc` varchar(100) NOT NULL,
  `quantity` int(20) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `requesting_date` date NOT NULL,
  `requestor_name` varchar(100) NOT NULL,
  `req_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplies_request`
--

INSERT INTO `supplies_request` (`id`, `name_desc`, `quantity`, `unit`, `requesting_date`, `requestor_name`, `req_status`) VALUES
(15, 'Zonrox, 1L', 60, 'btls', '2019-03-28', 'Lielanie Barrion', 'received'),
(16, 'Muriatic, 1L', 10, 'btls', '2019-03-28', 'Lielanie Barrion', 'received');

-- --------------------------------------------------------

--
-- Table structure for table `supplies_unreceive`
--

CREATE TABLE `supplies_unreceive` (
  `id` int(20) NOT NULL,
  `name_desc` varchar(100) NOT NULL,
  `quantity` int(50) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `posting_date` date NOT NULL,
  `person_to_receive` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitylog`
--
ALTER TABLE `activitylog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowitem`
--
ALTER TABLE `borrowitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept_request`
--
ALTER TABLE `dept_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixedassets`
--
ALTER TABLE `fixedassets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixedassets_receive`
--
ALTER TABLE `fixedassets_receive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixedassets_request`
--
ALTER TABLE `fixedassets_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixedassets_unreceive`
--
ALTER TABLE `fixedassets_unreceive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventorydate`
--
ALTER TABLE `inventorydate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personincharge`
--
ALTER TABLE `personincharge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physical_inventory`
--
ALTER TABLE `physical_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requester_status`
--
ALTER TABLE `requester_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserveday`
--
ALTER TABLE `reserveday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies_receive`
--
ALTER TABLE `supplies_receive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies_request`
--
ALTER TABLE `supplies_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies_unreceive`
--
ALTER TABLE `supplies_unreceive`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitylog`
--
ALTER TABLE `activitylog`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `borrowitem`
--
ALTER TABLE `borrowitem`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `dept_request`
--
ALTER TABLE `dept_request`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `fixedassets`
--
ALTER TABLE `fixedassets`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fixedassets_receive`
--
ALTER TABLE `fixedassets_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fixedassets_request`
--
ALTER TABLE `fixedassets_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fixedassets_unreceive`
--
ALTER TABLE `fixedassets_unreceive`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventorydate`
--
ALTER TABLE `inventorydate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `personincharge`
--
ALTER TABLE `personincharge`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `requester_status`
--
ALTER TABLE `requester_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `reserveday`
--
ALTER TABLE `reserveday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `supplies_receive`
--
ALTER TABLE `supplies_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `supplies_request`
--
ALTER TABLE `supplies_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `supplies_unreceive`
--
ALTER TABLE `supplies_unreceive`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
